<?php defined('BASEPATH') or exit('No direct script access allowed');

class Archivo_digital_model extends PSG_Model
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
    public function tipo_respaldo($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('tipo_respaldo', $condicion)->result() : $this->db->get('tipo_respaldo')->result();
                break;
            case 'insert':
                return ($this->db->insert('tipo_respaldo', $datos)) ? $this->db->insert_id('archivo_digital.psg_tipo_respaldo_id_tipo_respaldo_seq') : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('tipo_respaldo', $datos, $condicion)) ? true : $this->db->error();
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
                return is_array($condicion) ? $this->db->get_where('persona',  $condicion)->result() : $this->db->get('persona')->result();
                break;
            case 'update':
                return ($this->db->update('persona', $datos, $condicion)) ? true : $this->db->error();
                break;
        }
    }

    public function documento_presentado_persona($accion, $condicion = NULL, $datos = NULL)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ?  $this->db->get_where('documento_presentado_persona', $condicion)->result() : $this->db->get('documento_presentado_persona')->result();
                break;
            case 'insert':
                return ($this->db->insert('documento_presentado_persona', $datos)) ? $this->db->insert_id('archivo_digital.psg_documento_presentado_pers_id_documento_presentado_perso_seq') : $this->db->error();
                break;
            case 'update':
                return ($this->db->update('documento_presentado_persona', $datos, $condicion)) ? true : $this->db->error();
                break;
        }
    }

    public function detalle_tipos_respaldo_persona($condicion = null, $condicion_negada = null, $orden = '')
    {
        $this->db->select('tp.*, dpp.*, p.ci');
        $this->db->from('tipo_respaldo tp');
        $this->db->join('documento_presentado_persona dpp', 'dpp.id_tipo_respaldo = tp.id_tipo_respaldo', 'left');
        $this->db->join('persona p', 'p.id_persona = dpp.id_persona', 'left');

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
        return $this->db->get()->result();
    }
}
