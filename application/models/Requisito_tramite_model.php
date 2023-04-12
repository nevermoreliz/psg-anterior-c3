<?php defined('BASEPATH') or exit('No direct script access allowed');

class Requisito_tramite_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listar_tramite()
    {
        $this->db->where('estado_tramite', 'REGISTRADO');
        $this->db->order_by('id_tramite', 'desc');
        $query = $this->db->get('tramite');
        return $query->result_array();
    }
    public function listar_requisito()
    {
        $this->db->where('estado_requisito', 'REGISTRADO');
        $query = $this->db->get('psg_requisito');
        return $query->result_array();
    }

    public function listar_requisito_tramite($id_requisito, $id_tramite)
    {
        $this->db->select('*');
        $this->db->from('psg_requisito_tramite rt');
        $this->db->join('psg_tramite t', 't.id_tramite = rt.id_tramite');
        //$this->db->where($condicion);
        $this->db->where_in('rt.id_requisito', $id_requisito);
        $this->db->where_in('rt.id_tramite', $id_tramite);
        //$this->db->where_in('estado_requisito_tramite', 'REGISTRADO');
        // $this->db->order_by($orden);
        return $this->db->get()->row_array();
    }
    public function psg_requisito_tramite($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                if (!is_null($condicion)) {
                    return $this->db->get_where('requisito_tramite', $condicion)->result_array();
                } else
                    return $this->db->get('requisito_tramite')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('requisito_tramite', $datos)) ? $this->db->insert_id('tramite_administrativo.id_requisito_tramite') : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('requisito_tramite', $condicion)) ? TRUE : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('requisito_tramite', $datos, $condicion)) ? TRUE : $this->db->error();
                break;
        }
    }
    public function insertar_nuevo_tramite($accion, $condicion = null, $datos = null, $buscar = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('tramite', $condicion)->result_array() : $this->db->get('tramite')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('tramite', $datos) ? $this->db->insert_id(('tramite_administrativo.psg_tramite_id_tramite_seq')) : $this->db->error());
                break;
            case 'update':
                return ($this->db->update('tramite', $datos, $condicion)) ? true : $this->db->error();
                break;
        }
    }
}
