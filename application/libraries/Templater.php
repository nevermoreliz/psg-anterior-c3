<?php defined('BASEPATH') or exit('No direct script access allowed');

class Templater
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    protected function vista($contenido, $data = array(), $base = "base")
    {
        if ($this->CI->input->is_ajax_request()) {
            $ajax = $this->CI->load->view($contenido, $data, TRUE);
            return $this->CI->output->set_output(css_tag($contenido) . $ajax . script_tag($contenido));
        } else {
            $data['notificaciones'] = $this->CI->load->view('notificaciones', $data, TRUE);
            $data['auth'] = $this->CI->load->view('auth', $data, TRUE);
            $data['menu'] = $this->CI->load->view('menu', $data, TRUE);

            /**El menu de administracion*/
            $data['menu_horizontal_admin'] = $this->CI->load->view('menu_horizontal_admin', $data, TRUE);

            /**El menu de pagina principal */
            $data['menu_horizontal'] = $this->CI->load->view('menu_horizontal', $data, TRUE);

            $data['contenido'] = $this->CI->load->view($contenido, $data, TRUE);
            $base = $this->CI->load->view($base, $data, TRUE);
            $this->CI->output->set_output($base);
        }
    }

    public function view($contenido, $data = array())
    {
        $this->vista($contenido, $data, 'base');
    }

    public function view_horizontal($contenido, $data = array())
    {
        $this->vista($contenido, $data, 'base_horizontal');
    }

    public function view_horizontal_admin($contenido, $data = array())
    {
        return $this->vista($contenido, $data, 'base_horizontal_admin');
    }

    public function login()
    {
        $login = $this->CI->load->view('login', NULL, TRUE);
        $this->CI->output->set_output($login);
    }
}
