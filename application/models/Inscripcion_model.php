<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inscripcion_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function estructura_tabla($condicion)
    {
        $this->db->select('table_schema, table_name, ordinal_position as position, column_name, data_type, case when character_maximum_length is not null then character_maximum_length else numeric_precision end as max_length, is_nullable,column_default as default_value')
            ->from('information_schema.columns');
        return is_array($condicion) ? $this->db->where($condicion)->get() : $this->db->get();
    }

    public function buscar_inscritos($buscar_registros = null, $id_planificacion_programa, $estado_inscripcion)
    {

        $buscar_campo = array("pp.nombre_programa", "pp.numero_version ", "pp.estado_programa", "g.gestion::varchar", "ga.descripcion_grado_academico", "tp.nombre_tipo_programa", "pe.ci", "pe.expedido", "pe.nombre", "pe.paterno", "pe.materno", "pe.estado_civil", "pe.domicilio", "pe.lugar_nacimiento", "pe.fecha_nacimiento::text", "pe.email", "pe.oficio_trabajo", "pe.telefono", "pe.celular");
        $buscar_registros = strtoupper($buscar_registros);
        $sql = "SELECT pe.id_persona, pp.id_planificacion_programa
        FROM principal.psg_persona pe
        join public.psg_inscripcion i on i.id_persona = pe.id_persona
        join academico.psg_planificacion_programa pp on pp.id_planificacion_programa = i.id_planificacion_programa
        JOIN academico.psg_gestion g on g.id_gestion = pp.id_gestion
        JOIN academico.psg_grado_academico ga ON pp.id_grado_academico= ga.id_grado_academico
        JOIN academico.psg_tipo_programa tp ON pp.id_tipo_programa= tp.id_tipo_programa
        JOIN administrativo.psg_unidad u ON u.id_unidad = pp.id_unidad
        WHERE (1=1)";

        $sql = trim($sql) . buscador_semantico($buscar_registros, $buscar_campo) . " and pp.id_planificacion_programa = $id_planificacion_programa $estado_inscripcion   ORDER BY i.fecha_inscripcion DESC";
        return  $this->db->query($sql)->result_array();
    }

    public function inscritos_programa($id_planificacion_programa = null)
    {
        $this->db->select('');
        $this->db->from('inscripcion ins');
        $this->db->join('publicacion pub', 'pub.id_planificacion_programa = ins.id_planificacion_programa');
        $this->db->join('planificacion_programa pp', 'pp.id_planificacion_programa = ins.id_planificacion_programa');
        $this->db->join('unidad u', 'u.id_unidad = pp.id_unidad');
        $this->db->join('sede s', 's.id_sede = u.id_sede');
        $this->db->join('grado_academico ga', 'ga.id_grado_academico = pp.id_grado_academico');
        $this->db->join('tipo_programa tp', 'tp.id_tipo_programa = pp.id_tipo_programa');
        $this->db->join('persona per', 'per.id_persona = ins.id_persona');
        $this->db->where_in('ins.id_planificacion_programa', $id_planificacion_programa);
        // $this->db->where_in('estado_inscrito', array('CONFIRMADO'));
        $this->db->where_in('ins.estado_inscripcion', array('CONFIRMADO', 'INSCRITO'));
        // $this->db->where_in('ins.estado_inscripcion', array('REGISTRADO', 'CONFIRMADO'));
        $this->db->order_by('ins.id_inscripcion');
        return $this->db->get()->result_array();
    }

    //TODO: ---------------------------------------------------------------------------------------------------------------------------------

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla Grado Academico Persona.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     */
    public function grado_academico_persona($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('grado_academico_persona');
                    $this->db->join('modalidad_titulacion', 'modalidad_titulacion.id_modalidad_titulacion = grado_academico_persona.id_modalidad_titulacion');
                    $this->db->join('tipo_documento_academico', 'tipo_documento_academico.id_tipo_documento_academico = grado_academico_persona.id_tipo_documento_academico');
                    $this->db->join('grado_academico', 'grado_academico.id_grado_academico = grado_academico_persona.id_grado_academico');
                    $this->db->join('unidad_academica', 'unidad_academica.id_unidad_academica = grado_academico_persona.id_unidad_academica');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else
                    return $this->db->get('grado_academico_persona')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('grado_academico_persona', $datos)) ? $this->db->insert_id('academico.psg_grado_academico_persona_id_grado_academico_persona_seq') : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('grado_academico', $datos, array('id_grado_academico' => $condicion))) ? TRUE : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('grado_academico', array('id_grado_academico' => $condicion))) ? TRUE : $this->db->error();
                break;
        }
    }
    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla Tipo Documento Academico.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     */
    public function tipo_documento_academico($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return $this->db->get('tipo_documento_academico')->result_array();
                break;
        }
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla Unidad Academica.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     */
    public function unidad_academica($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return $this->db->get('unidad_academica')->result_array();
                break;
        }
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla Unidad Academica.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     */
    public function modalidad_titulacion($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return $this->db->get('modalidad_titulacion')->result_array();
                break;
        }
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla Grado Academico.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * 
     */
    public function grado_academico($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return $this->db->get('grado_academico')->result_array();
                break;
        }
    }

    /**
     * Metodo que prueba que se eliminara posteriormente
     */
    public function error($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('grado_academico_persona');
                    $this->db->join('modalidad_titulacion', 'modalidad_titulacion.id_modalidad_titulacion = grado_academico_persona.id_modalidad_titulacion');
                    $this->db->join('tipo_documento_academico', 'tipo_documento_academico.id_tipo_documento_academico = grado_academico_persona.id_tipo_documento_academico');
                    $this->db->join('grado_academico', 'grado_academico.id_grado_academico = grado_academico_persona.id_grado_academico');
                    $this->db->join('unidad_academica', 'unidad_academica.id_unidad_academica = grado_academico_persona.id_unidad_academica');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    $this->db->select('*');
                    $this->db->from('grado_academico_persona');
                    $this->db->join('modalidad_titulacion', 'modalidad_titulacion.id_modalidad_titulacion = grado_academico_persona.id_modalidad_titulacion');
                    $this->db->join('tipo_documento_academico', 'tipo_documento_academico.id_tipo_documento_academico = grado_academico_persona.id_tipo_documento_academico');
                    $this->db->join('grado_academico', 'grado_academico.id_grado_academico = grado_academico_persona.id_grado_academico');
                    $this->db->join('unidad_academica', 'unidad_academica.id_unidad_academica = grado_academico_persona.id_unidad_academica');
                    return $this->db->get()->result_array();
                }
                break;
        }
    }


    public function planificacion_programa($accion, $condicion, $datos)
    {
        switch ($accion) {
            case 'select':
                if (is_array($condicion))
                    return $this->db->get_where('vista_programas', $condicion, 1)->row_array();
                else
                    return $this->db->get('vista_programas')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('planificacion_programa', $datos)) ? $this->db->insert_id('academico.psg_planificacion_programa_gestio_id_planificacion_programa_seq') : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('planificacion_programa', $datos, $condicion)) ? TRUE : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('planificacion_programa', $condicion)) ? TRUE : $this->db->error();
                break;
        }
    }

    public function requisito_programa($accion, $condicion, $datos)
    {
        switch ($accion) {
            case 'select':
                if (is_array($condicion)) {
                    $this->db->select('*');
                    $this->db->from('requisito_programa');
                    $this->db->join('requisito', 'requisito_programa.id_requisito = requisito.id_requisito');
                    $this->db->join('tipo_requisito', 'tipo_requisito.id_tipo_requisito = requisito_programa.id_tipo_requisito');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    $this->db->select('*');
                    $this->db->from('requisito_programa');
                    $this->db->join('requisito', 'requisito_programa.id_requisito = requisito.id_requisito');
                    return $this->db->get()->result_array();
                }
                break;
            case 'insert':
                break;
            case 'update':
                break;
            case 'delete':
                break;
            case 'search':
                break;
        }
    }

    public function persona($accion, $id_persona, $datos, $search)
    {
        switch ($accion) {
            case 'select':
                if (!is_null($id_persona))
                    return $this->db->get_where('vista_persona', $id_persona, 1)->row_array();
                else
                    return $this->db->get('vista_persona')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('persona', $datos)) ? $this->db->insert_id('principal.psg_persona_id_persona_seq') : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('persona', $datos, array('id_persona' => $id_persona))) ? TRUE : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('persona', array('id_persona' => $id_persona))) ? TRUE : $this->db->error();
                break;
            case 'search':
                $sql = "SELECT * from public.psg_vista_persona_externa WHERE nombre_completo_externo LIKE '%$search%';";
                $query = $this->db->query($sql);
                return $query->result_array();
                break;
        }
    }

    public function persona_externa($accion, $id_persona_externa, $datos, $search)
    {
        switch ($accion) {
            case 'select':
                if (!is_null($id_persona_externa))
                    return $this->db->get_where('vista_persona_externa',  $id_persona_externa, 1)->row_array();
                else
                    return $this->db->get('vista_persona_externa')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('persona_externa', $datos)) ? $this->db->insert_id('principal.psg_persona_externa_id_persona_externa_seq') : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('persona_externa', $datos, array('id_persona_externa' => $id_persona_externa))) ? TRUE : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('persona_externa', array('id_persona_externa' => $id_persona_externa))) ? TRUE : $this->db->error();
                break;
            case 'search':
                $sql = "SELECT * from public.psg_vista_persona_externa WHERE nombre_completo_externo LIKE '%$search%';";
                $query = $this->db->query($sql);
                return $query->result_array();
                break;
        }
    }

    public function externo($accion, $id_persona_externa, $datos, $search)
    {
        switch ($accion) {
            case 'select':
                break;

            case 'insert':
                return ($this->db->insert('externo', $datos)) ? $this->db->insert_id('correspondencia.externo_id_externo_seq') : $this->db->error();
                break;

            case 'update':
                break;

            case 'delete':
                break;

            case 'search':
                break;
        }
    }

    public function pais($accion, $id_pais, $datos, $search)
    {
        switch ($accion) {
            case 'select':
                if (!is_null($id_pais))
                    return $this->db->get_where('pais', array('id_pais' => $id_pais), 1)->row_array();
                else
                    return $this->db->get('pais')->result_array();
                break;

            case 'insert':
                return ($this->db->insert('externo', $datos)) ? $this->db->insert_id('correspondencia.externo_id_externo_seq') : $this->db->error();
                break;

            case 'update':
                break;

            case 'delete':
                break;

            case 'search':
                break;
        }
    }
}
