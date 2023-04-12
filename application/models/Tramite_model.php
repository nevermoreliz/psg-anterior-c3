<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tramite_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla Grado Academico Persona.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     */
    public function solicitud_tramite($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('solicitud_tramite', $condicion)->result_array() : $this->db->get('solicitud_tramite')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('solicitud_tramite', $datos)) ? $this->db->insert_id('tramite_administrativo.psg_solicitud_tramite_id_solicitud_tramite_seq') : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('solicitud_tramite', $datos, $condicion)) ? true : $this->db->error();
                break;
        }
    }

    public function tramite($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('tramite', $condicion)->result_array() : $this->db->get('tramite')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('tramite', $datos)) ? $this->db->insert_id('tramite_administrativo.psg_tramite_id_tramite_seq') : $this->db->error();
                break;
        }
    }

    public function requisito_presentado_persona($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('requisito_presentado_persona', $condicion)->result_array() : $this->db->get('requisito_presentado_persona')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('requisito_presentado_persona', $datos)) ? $this->db->insert_id('tramite_administrativo.psg_requisito_presentado_pers_id_requisito_presentado_perso_seq') : $this->db->error();
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
    public function multimedia_persona($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('multimedia_persona', $condicion)->result_array() : $this->db->get('multimedia_persona')->result_array();

                break;
            case 'update':
                return ($this->db->update('multimedia_persona', $datos, $condicion)) ? true : $this->db->error();
                break;
            case 'insert':
                return ($this->db->insert('multimedia_persona', $datos)) ? $this->db->insert_id('psg_multimedia_persona_id_multimedia_persona_seq') : $this->db->error();
                break;
        }
    }

    public function multimedia_requisito_presentado_persona($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('multimedia_requisito_presentado_persona', $condicion)->result_array() : $this->db->get('multimedia_requisito_presentado_persona')->result_array();
                break;
            case 'update':
                return ($this->db->update('multimedia_requisito_presentado_persona', $datos, $condicion)) ? true : $this->db->error();
                break;
            case 'insert':
                return ($this->db->insert('multimedia_requisito_presentado_persona', $datos)) ? $this->db->insert_id('psg_multimedia_requisito_pres_id_multimedia_requisito_prese_seq') : $this->db->error();
                break;
        }
    }

    public function multimedia($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('multimedia', $condicion)->result_array() : $this->db->get('multimedia')->result_array();
                break;
        }
    }
    public function emision_formulario($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('emision_formulario', $condicion)->result_array() : $this->db->get('emision_formulario')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('emision_formulario', $datos)) ? $this->db->insert_id('financiero.psg_emision_formulario_id_emision_formulario_seq') : $this->db->error();
                break;
        }
    }
    public function gestion($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('gestion', $condicion)->result_array() : $this->db->get('gestion')->result_array();
                break;
        }
    }

    public function requisito_tramite($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('requisito_tramite', $condicion)->result_array() : $this->db->get('requisito_tramite')->result_array();
                break;
        }
    }

    public function detalle_tramite_grupo($condicion = null, $condicion_negada = null, $orden = '')
    {
        $this->db->select('*');
        $this->db->from('grupo g');
        $this->db->join('tramite_grupo tg', 'tg.id_grupo = g.id_grupo');
        $this->db->join('tramite t', 't.id_tramite = tg.id_tramite');

        if (is_array($condicion) && is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
            $this->db->where($condicion);
        }
        if (is_array($condicion)) {
            $this->db->where($condicion);
        }
        if (is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
        }

        $this->db->order_by($orden);
        return $this->db->get()->result_array();
    }

    public function detalle_requisitos_tramite($condicion = null, $condicion_negada = null, $orden = '')
    {
        $this->db->select('*');
        $this->db->from('tramite t');
        $this->db->join('requisito_tramite rt', 'rt.id_tramite = t.id_tramite');
        $this->db->join('requisito r', 'r.id_requisito = rt.id_requisito');


        if (is_array($condicion) && is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
            $this->db->where($condicion);
        }
        if (is_array($condicion)) {
            $this->db->where($condicion);
        }
        if (is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
        }

        $this->db->order_by($orden);
        return $this->db->get()->result_array();
        // return  $this->db->last_query();
    }


    public function detalle_requisitos_presentado_persona($condicion = null, $condicion_negada = null, $orden = '')
    {
        $this->db->select('*');
        $this->db->from('requisito_presentado_persona rpp');
        $this->db->join('requisito_tramite rt', 'rt.id_requisito_tramite = rpp.id_requisito_tramite');
        $this->db->join('requisito r', 'r.id_requisito = rt.id_requisito');

        if (is_array($condicion) && is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
            $this->db->where($condicion);
        }
        if (is_array($condicion)) {
            $this->db->where($condicion);
        }
        if (is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
        }

        $this->db->order_by($orden);
        return $this->db->get()->result_array();
    }

    public function detalle_estado_solicitud($condicion = null, $en = null, $orden = '')
    {
        $this->db->select('p.id_persona');
        $this->db->from('solicitud_tramite s');
        $this->db->join('persona p', 'p.id_persona = s.id_persona');


        if (is_array($condicion) && is_array($en)) {
            $this->db->where_in('estado_solicitud', $en);
            $this->db->where($condicion);
        } elseif (is_array($condicion)) {
            $this->db->where($condicion);
        } elseif (is_array($en)) {
            $this->db->where_in('estado_solicitud', $en);
        }

        $this->db->order_by($orden);
        return $this->db->get()->result_array();
    }



    public function respaldos_digitales($condicion = null,  $condicion_en = null, $orden = '')
    {
        $this->db->select('*');
        $this->db->from('multimedia_requisito_presentado_persona mrpp');
        $this->db->join('multimedia m', 'm.id_multimedia = mrpp.id_multimedia');
        if (is_array($condicion) && is_array($condicion_en)) {
            $this->db->where($condicion);
            $this->db->where_in('id_multimedia_requisito_presentado_persona', $condicion_en);
        } elseif (is_array($condicion)) {
            $this->db->where($condicion);
        } elseif (is_array($condicion_en)) {
            $this->db->where_in('id_multimedia_requisito_presentado_persona', $condicion_en);
        }
        $this->db->order_by($orden);
        return $this->db->get()->result_array();
    }
}
