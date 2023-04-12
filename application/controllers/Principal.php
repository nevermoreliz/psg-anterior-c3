<?php defined('BASEPATH') or exit('No direct script access allowed');

class Principal extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('marketing_model');
        $this->load->model('admin_marketing_model');
    }


    public function index()
    {
        $this->load->model('marketing_model');
        /**
         * Descripcion foreach :
         * Comprueba si alguna publicacion ya no es vigente y lo cambia estado_publicacion
         * a False  y lo pone en Inactivo, si sigue vigente no hace nada
         */
        foreach ($this->marketing_model->listar_publicacion() as $publicacion) {

            if (date('Y-m-d') > $publicacion->fecha_fin_publicidad) {

                $this->sql_psg->modificar_tabla('publicacion', ['estado_publicacion' => 'FINALIZADO'], ['id_publicacion' => $publicacion->id_publicacion]);
            }
        }

        $this->templater->view_horizontal_admin('principal/index', $this->data);
        // $this->templater->view_horizontal_admin('principal/inicio', $this->data);
    }

    public function recargar_menu()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->view('menu_horizontal_admin');
        }
    }

    public function cambiar_vista_inicio_roles()
    {
        if (es(['POSGRADUANTE'])) {
            var_dump($_REQUEST);
            $this->data['afiches'] = $this->marketing_model->listar_publicacion(
                "(pub.estado_publicacion='PUBLICADO' OR pub.estado_publicacion='INFORMACIONES') AND mp.img_principal=1"
            );
            // var_dump($this->data['afiches']);
            // exit();

            /** lista todas las etiquetas */
            $this->data['listar_etiquetas'] = $this->marketing_model->listar_etiquetas();
            // var_dump($this->data['listar_etiquetas']);
            // exit();    # code...
        }

        $this->templater->view_horizontal_admin($this->input->post('url'), $this->data);
    }
}
