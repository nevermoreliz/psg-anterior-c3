<?php defined('BASEPATH') or exit('No direct script access allowed');

class Psg_docente_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
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
                if ($condicion == null) {
                    return $this->db->get('unidad_academica')->result_array();
                } else {
                    $this->db->where($condicion);
                    $this->db->order_by('tipo_unidad_academica', 'desc');
                    $this->db->order_by('nombre_unidad_academica');
                    return $this->db->get('unidad_academica')->result_array();
                }

                break;
        }
    }


    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla psg_publicacion.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert, delete o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     */
    public function docencia_externo($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('docencia_externo');
                    // $this->db->join(
                    //     'planificacion_programa programa',
                    //     'programa.id_planificacion_programa = pub.id_planificacion_programa'
                    // );
                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('docencia_externo')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('docencia_externo', $datos)) ? $this->db->insert_id('academico.psg_docencia_externo_id_docencia_externo_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('docencia_externo', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('docencia_externo', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }



    public function planificacion_programa($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('planificacion_programa');

                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('planificacion_programa')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('planificacion_programa', $datos)) ? $this->db->insert_id('academico.psg_planificacion_programa_gestio_id_planificacion_programa_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('planificacion_programa', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('planificacion_programa', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    public function gestion($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('id_gestion,gestion');
                    $this->db->from('gestion');

                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('gestion')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('gestion', $datos)) ? $this->db->insert_id('academico.psg_gestion_id_gestion_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('gestion', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('gestion', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    public function tipo_modulo($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('tipo_modulo');

                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('tipo_modulo')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('tipo_modulo', $datos)) ? $this->db->insert_id('academico.psg_tipo_modulo_id_tipo_modulo_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('tipo_modulo', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('tipo_modulo', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }

    public function docencia_interno($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {

            case 'select':

                if (!is_null($condicion)) {
                    $this->db->select('*');
                    $this->db->from('docencia_interno');

                    $this->db->where($condicion);
                    return $this->db->get()->result_array();
                } else {
                    return $this->db->get('docencia_interno')->result_array();
                }

                break;

            case 'insert':

                return ($this->db->insert('docencia_interno', $datos)) ? $this->db->insert_id('academico.psg_docencia_interno_id_docencia_interno_seq') : $this->db->error;

                break;

            case 'delete':

                return ($this->db->delete('docencia_interno', $condicion)) ? TRUE : $this->db->error;

                break;

            case 'update':

                return ($this->db->update('docencia_interno', $datos, $condicion)) ? TRUE : $this->db->error;

                break;

            default:

                echo "No entro en ningun caso";
                break;
        }
    }




    function Formularios_emitidos($tipo_formulario, $id_persona)
    {
        $this->db->select('id_emision_formulario, id_persona, tipo_formulario, correlativo_formulario, 
         monto_formulario, fecha_emision_formulario, id_usuario, estado_formulario');
        $this->db->from('financiero.psg_emision_formulario');

        $this->db->where('tipo_formulario ', $tipo_formulario);
        $this->db->where('id_persona ', $id_persona);
        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) return $resultado->result_array();
        else return null;

        // return $this->db->get()->result_array();


        //     $consulta = "SELECT
        //                 id_emision_formulario, id_persona, tipo_formulario, correlativo_formulario, 
        //    monto_formulario, fecha_emision_formulario, id_usuario, estado_formulario
        //                 FROM
        //                 financiero.psg_emision_formulario
        //                 WHERE tipo_formulario = '$tipo_formulario' AND id_persona = '$id_persona'
        //                 ORDER BY correlativo_formulario ASC";
        //     $query = $this->db->query($consulta);
        //     if ($query->num_rows() > 0) return $query->result_array();
        // else return null;
    }


    // funciones con consultas con mas de una tabla

    public function listar_ejercicio_persona_posgrado($id_persona)
    {
        $this->db->select('
        di.id_persona,
        di.carga_horaria,
        di.turno,
        di.fecha_inicio,
        di.fecha_fin,
        di.tipo_docencia_interno,
        di.descripcion_docencia_interno,
        di.estado_docencia_interno,
        di.id_planificacion_programa,
        pp.nombre_programa,
        di.id_tipo_modulo,
        di.numero_modulo,
        di.nombre_modulo,
        di.nro_nombramiento,
        di.modalidad_ingreso,
        di.paralelo,
        di.lugar_clases,
        pp.id_unidad,
        u.nombre_unidad,
        pp.id_gestion,
        g.gestion,
        ');
        $this->db->from('docencia_interno di');
        $this->db->join(
            'planificacion_programa pp',
            'pp.id_planificacion_programa = di.id_planificacion_programa'
        );
        $this->db->join(
            'gestion g',
            'g.id_gestion = pp.id_gestion'
        );
        $this->db->join(
            'unidad u',
            'u.id_unidad = pp.id_unidad'
        );

        $this->db->where('id_persona', $id_persona);
        return $this->db->get()->result_array();
    }

    public function ConsultarPrograma($id_gestion = 'todo')
    {

        $this->db->select('pp.id_planificacion_programa, pp.nombre_programa, tp.id_tipo_programa, tp.nombre_tipo_programa, pp.estado_programa,pp id_gestion, pp.numero_version');
        $this->db->from('psg_planificacion_programa pp');
        $this->db->join(
            'psg_tipo_programa tp',
            'tp.id_tipo_programa = pp.id_tipo_programa'
        );
        $this->db->where('pp.estado_programa', 'ACTIVO');
        ($id_gestion != 'todo' ? $this->db->where('pp.id_gestion', $id_gestion) : "");
        // return $this->db->get()->result_array();
        $resultado = $this->db->get();
        if ($resultado->num_rows() > 0) return $resultado->result_array();
        else return null;
    }

    public function listar_personas_no_docentes()
    {
        $this->db->select("p.id_persona, p.id_persona_u, p.ci, p.expedido, p.tipo_documento, p.nombre, p.paterno, p.materno, concat(p.paterno,' ',p.materno) as apellidos, p.email, p.celular");
        $this->db->from('persona p');
        $this->db->join(
            'docente d',
            'd.id_persona = p.id_persona',
            'left'
        );
        $this->db->where('d.id_persona', null);
        $query = $this->db->get();
        return $query->result_array();
    }
}
