<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect(base_url('login'));
    }

    public function login()
    {
        if (autentificado()) {
            redirect(base_url('/principal'));
        } else {
            $this->templater->login();
        }
    }

    public function autentificar()
    {
        $nombre_usuario = mb_convert_case(trim($this->input->post('nombre_usuario')), MB_CASE_UPPER);
        $clave_usuario = $this->input->post('clave_usuario');
        $cookies = (is_null($this->input->post('guardar')));

        $usuario = $this->auth_model->autentificar_usuario($nombre_usuario, $clave_usuario);
        if (isset($usuario['code']) && isset($usuario['message'])) {
            if ($this->input->is_ajax_request()) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Nombre de Usuario o Clave INCORRECTA. Intente nuevamente, por favor.')));
            } else {
                $this->session->set_flashdata($usuario['code'], $usuario['message']);
                $this->terminar();
            }
        } else {
            $this->input->set_cookie('id_persona', $usuario['id_persona'], (($cookies) ? '0' : '31622400'));
            $this->session->set_userdata('nombre_grupo', $usuario['nombre_grupo']);
            if ($this->input->is_ajax_request()) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => $usuario['id_persona'])));
            } else {
                $this->session->set_flashdata('success', 'Ha ingresado correctamente al Sistema PSG.<br/>¡Bienvenid' . ($usuario['genero'] == 'M' ? 'o' : 'a') . ' ' . $usuario['nombre_completo'] . '!');
                redirect(base_url('/principal'));
            }
        }
    }
    public function ajax_es_autententificado()
    {
        if ($this->input->is_ajax_request()) {
            // var_dump(autentificado());
            // // exit;
            if (autentificado())
                $this->output->set_content_type('application/json')->set_output(json_encode(
                    ['exito' => array_merge(autentificado(), ['grupo' => $this->session->userdata('nombre_grupo', TRUE)])]
                ));
            else
                $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => autentificado()]));
        }
    }

    public function ajax_es_autentificado()
    {
        $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => array_merge(autentificado(), ['grupo' => $this->session->userdata('nombre_grupo', TRUE)])]));
         
    }
    public function acceso()
    {
        $this->session->set_userdata('nombre_grupo', $this->input->get('nombre_grupo'));
        redirect(base_url('/principal'));
    }

    public function logout()
    {
        $this->session->set_flashdata('success', 'Ha salido correctamente del Sistema.');
        $this->terminar();
    }

    public function terminar()
    {
        delete_cookie('id_persona');
        delete_cookie('nombre_grupo');
        $this->session->unset_userdata('nombre_grupo');
        redirect(base_url('login'));
    }
}
