<?php defined('BASEPATH') or exit('No direct script access allowed');

class Correspondencia_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function cargo_unidad($accion, $condicion, $datos, $busqueda)
    {
        switch ($accion) {
            case 'select':
                if (is_array($condicion))
                    return $this->db->get_where('vista_cargo_unidad', $condicion)->result_array();
                else
                    return $this->db->get('vista_cargo_unidad')->result_array();
                break;
            case 'search':
                $sql = "SELECT id_cargo_unidad, nombre_cargo from public.psg_vista_cargo_unidad WHERE nombre_cargo LIKE '%" . $busqueda . "%';";
                $query = $this->db->query($sql);
                return $query->result_array();
                break;
        }
    }
    public function tipo_documento($accion, $condicion, $datos)
    {
        switch ($accion) {
            case 'select':
                if (is_array($condicion))
                    return $this->db->get_where('tipo_documento', $condicion)->result_array();
                else
                    return $this->db->get('tipo_documento')->result_array();
                break;
        }
    }
}
