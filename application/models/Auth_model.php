<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verificar_usuario($id_persona = NULL)
    {
        $resultado = NULL;
        if (is_numeric($id_persona)) {
            $this->db->select("u.id_persona, u.nombre_completo,per.nombre, per.paterno,per.materno,per.genero, u.email, array_to_string(array_agg(u.nombre_grupo), ',') AS nombre_grupo");
            $this->db->from('vista_usuarios AS u');
            $this->db->join('persona per', 'per.id_persona = u.id_persona');
            $this->db->where('u.id_persona', $id_persona);
            $this->db->where('u.estado_grupo_usuario', 'ACTIVO');
            $this->db->group_by("u.id_persona, u.nombre_completo, u.email,per.nombre, per.paterno,per.materno,per.genero");
            $query = $this->db->get();
            $resultado = (($query->num_rows() === 1) ? $query->row_array() : NULL);
        }
        return $resultado;
    }

    public function datos_usuario($id_persona = NULL, $nombre_grupo = TRUE)
    {
        if (is_numeric($id_persona)) {
            $this->db->order_by('id_grupo');
            $this->db->where('estado_grupo_usuario', 'ACTIVO');
            $this->db->where('id_persona', $id_persona);
            if ($nombre_grupo === TRUE) {
                $query = $this->db->get('vista_usuarios');
                $resultado = (($query) ? $query->result_array() : $this->db->error());
            } else {
                $this->db->where('nombre_grupo', $nombre_grupo);
                $query = $this->db->get('vista_usuarios');
                $resultado = (($query) ? $query->row_array() : $this->db->error());
            }
        } else {
            $resultado['code'] = 'info';
            $resultado['message'] = 'No se han encontrado registros de usuarios.';
        }
        return $resultado;
    }

    public function autentificar_usuario($usuario = '', $clave = '')
    {
        $resultado = array();
        $this->db->where('nombre_usuario', $usuario);
        $this->db->where('clave_usuario', md5($clave));
        $this->db->where('estado_grupo_usuario', 'ACTIVO');
        $this->db->order_by('id_grupo');
        if ($query = $this->db->get('vista_usuarios')) {
            if ($query->num_rows() >= 1) {
                $usuario = $query->row_array();
                $resultado = $usuario;
            } else {
                $resultado['code'] = 'warning';
                $resultado['message'] = 'Nombre de Usuario o Clave INCORRECTA. Intente nuevamente, por favor.';
            }
        } else {
            $resultado = $this->db->error();
        }
        return $resultado;
    }
}
