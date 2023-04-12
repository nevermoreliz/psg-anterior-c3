<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migracion_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function publicacion_v1($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('publicacion_v1', $condicion)->result_array() : $this->db->query('SELECT DISTINCT ON (id_planificacion_programa) *  FROM pagina.psg_publicacion_v1;')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('publicacion_v1', $datos)) ? $this->db->insert_id('pagina.psg_pagina_id_pagina_seq') : $this->db->error;
                break;
            case 'delete':
                return ($this->db->delete('publicacion_v1', $condicion)) ? true : $this->db->error;
                break;
            case 'update':
                return ($this->db->update('publicacion_v1', $datos, $condicion)) ? true : $this->db->error;
                break;
        }
    }

    public function detalle_programa($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'insert':
                return $this->db->query(($this->db->insert_string('detalle_programa', $datos) . ' ON CONFLICT (id_planificacion_programa) DO UPDATE SET id_planificacion_programa = psg_detalle_programa.id_planificacion_programa;')) ? $this->db->insert_id('marketing.psg_detalle_programa_id_detalle_programa_seq') : $this->db->error;
                break;
        }
    }
    public function publicacion($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('publicacion', $condicion)->result_array() : $this->db->get('publicacion')->result_array();
                break;

            case 'insert':
                return $this->db->query(($this->db->insert_string('publicacion', $datos) . ' ON CONFLICT (id_planificacion_programa) DO NOTHING'))
                    ? $this->db->query('select max(id_publicacion) from marketing.psg_publicacion')->row_array()['max']
                    : $this->db->error;
                break;
        }
    }
    public function archivo($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'insert':
                return ($this->db->insert('archivo', $datos)) ? $this->db->insert_id('marketing.psg_archivo_id_archivo_seq') : $this->db->error;
                break;
        }
    }
    public function multimedia($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'insert':
                return ($this->db->insert('multimedia', $datos)) ? $this->db->insert_id('public.psg_multimedia_id_multimedia_seq') : $this->db->error;
                break;
        }
    }
    public function preinscripcion($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'insert':
                return ($this->db->insert('preinscripcion', $datos)) ? $this->db->insert_id('marketing.psg_preinscripcion_id_preinscripcion_seq') : $this->db->error;
                break;
        }
    }
    public function persona_externa($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('persona_externa', $condicion)->result_array() : $this->db->get('persona_externa')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('persona_externa', $datos)) ? $this->db->insert_id('public.psg_persona_externa_id_persona_externa_seq') : $this->db->error;
                break;
        }
    }
    public function publicacion_v1_preinscripcion_v1($condicion = '', $distinto = '')
    {
        return $this->db->query('SELECT ' . $distinto . ' *  FROM pagina.psg_publicacion_v1 JOIN public.psg_preinscripcion_v1 ON psg_publicacion_v1.id_publicacion = psg_preinscripcion_v1.id_publicacion ' . $condicion)->result_array();
    }
}
