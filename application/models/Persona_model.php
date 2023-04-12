<?php defined('BASEPATH') or exit('No direct script access allowed');

class Persona_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Uso      : Se usara principalmente para extraer que longitud tiene un campo de una tabla
     * Retorna  : Array
     * Campos   : $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     */
    public function estructura_tabla($esquema, $tabla)
    {
        return $this->db->query("SELECT column_name, data_type,character_maximum_length FROM information_schema.columns WHERE table_schema = '$esquema' AND table_name   = '$tabla';")->result_array();
    }
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
                    $this->db->from('grado_academico_persona gap');
                    // $this->db->join('modalidad_titulacion mt', 'mt.id_modalidad_titulacion = gap.id_modalidad_titulacion');
                    // $this->db->join('tipo_documento_academico tda', 'tda.id_tipo_documento_academico = gap.id_tipo_documento_academico');
                    // $this->db->join('grado_academico ga', 'ga.id_grado_academico = gap.id_grado_academico');
                    // $this->db->join('unidad_academica ua', 'ua.id_unidad_academica = gap.id_unidad_academica');
                    // $this->db->join('multimedia_persona mp', 'mp.id_multimedia_persona = gap.id_respaldo_digital', 'left');
                    // $this->db->join('multimedia m', 'm.id_multimedia = mp.id_multimedia', 'left');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else
                    return $this->db->get('grado_academico_persona')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('grado_academico_persona', $datos)) ? $this->db->insert_id('academico.psg_grado_academico_persona_id_grado_academico_persona_seq') : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('grado_academico_persona', $condicion)) ? TRUE : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('grado_academico_persona', $datos, $condicion)) ? TRUE : $this->db->error();
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
     * Uso      : Todas las funciones insert, delete, select, update a la tabla Persona.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * 
     */
    public function persona($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('persona',  $condicion)->result_array() : $this->db->get('persona')->result_array();
                break;
            case 'update':
                return ($this->db->update('persona', $datos, $condicion)) ? true : $this->db->error();
                break;
        }
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla multimedia.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * $this->db->last_query(); 
     * TODO: modelo funcional
     */
    public function multimedia($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('multimedia',  $condicion, 1)->row_array() : $this->db->get('vista_persona')->result_array();
                break;
            case 'update':
                return ($this->db->update('multimedia', $datos, $condicion)) ? TRUE : $this->db->error();
                break;
            case 'insert':
                return ($this->db->insert('multimedia', $datos)) ? $this->db->insert_id('psg_multimedia_id_multimedia_seq') : $this->db->error();
                break;
            case 'delete':

                return ($this->db->delete('multimedia', $condicion)) ? TRUE : $this->db->error;

                break;
        }
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla multimedia_persona.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * 
     */
    public function multimedia_requisito_presentado_persona($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                $this->db->select('*');
                $this->db->from('multimedia_requisito_presentado_persona mrpp');
                $this->db->join('multimedia m', 'm.id_multimedia = mrpp.id_multimedia');
                $this->db->where($condicion);
                $this->db->order_by('fecha_registro', 'DESC');
                return $this->db->get()->result_array();
                break;
            case 'update':
                return ($this->db->update('multimedia_requisito_presentado_persona', $datos, $condicion)) ? TRUE : $this->db->error();
                break;
            case 'insert':
                return ($this->db->insert('multimedia_requisito_presentado_persona', $datos)) ? $this->db->insert_id('psg_multimedia_requisito_pres_id_multimedia_requisito_prese_seq') : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('multimedia_requisito_presentado_persona', $condicion)) ? TRUE : $this->db->error;

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

    public function tipo_capacitacion($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('tipo_capacitacion');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else
                    return $this->db->get('tipo_capacitacion')->result_array();
                break;

            case 'insert':
                return ($this->db->insert('tipo_capacitacion', $datos)) ? $this->db->insert_id('academico.psg_tipo_capacitacion_id_tipo_capacitacion_seq') : $this->db->error();
                break;

            case 'update':
                break;

            case 'delete':
                break;
        }
    }

    public function capacitacion_persona($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('capacitacion_persona');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('capacitacion_persona')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('capacitacion_persona', $datos)) ? $this->db->insert_id('academico.psg_capacitacion_persona_id_capacitacion_persona_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('capacitacion_persona', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('capacitacion_persona', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    public function idioma($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('idioma');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('idioma')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('idioma', $datos)) ? $this->db->insert_id('academico.psg_idioma_id_idioma_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('idioma', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('idioma', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    public function idioma_persona($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('idioma_persona');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('idioma_persona')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('idioma_persona', $datos)) ? $this->db->insert_id('academico.psg_idioma_persona_id_idioma_persona_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('idioma_persona', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('idioma_persona', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    public function tipo_producion_intelectual($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('tipo_producion_intelectual');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('tipo_producion_intelectual')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('tipo_producion_intelectual', $datos)) ? $this->db->insert_id('academico.psg_tipo_producion_intelectua_id_tipo_producion_intelectual_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('tipo_producion_intelectual', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('tipo_producion_intelectual', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    public function produccion_intelectual_persona($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('produccion_intelectual_persona');
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('produccion_intelectual_persona')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('produccion_intelectual_persona', $datos)) ? $this->db->insert_id('academico.producion_intelectual_persona_id_produccion_intelectual_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('produccion_intelectual_persona', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('produccion_intelectual_persona', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    /**TODO: esto es funcional */
    public function listar_respaldo_digital_grado_academico_persona($condicion)
    {
        // $this->db->select('*');
        $this->db->select('p.id_persona , p.ci, p.nombre, m.nombre_archivo,mgap.id_multimedia_grado_academico_persona,m.id_multimedia, m.ruta_archivo, m.estado_archivo');
        $this->db->from('persona p');
        $this->db->join('grado_academico_persona gap', 'gap.id_persona = p.id_persona');
        $this->db->join('multimedia_grado_academico_persona mgap', 'mgap.id_grado_academico_persona = gap.id_grado_academico_persona');
        $this->db->join('multimedia m', 'm.id_multimedia = mgap.id_multimedia');
        $this->db->where($condicion);
        $this->db->order_by('m.fecha_registro', 'DESC');

        return $this->db->get()->result_array();
    }
}
