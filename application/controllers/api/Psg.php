<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Psg extends REST_Controller
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('planificacion_programa_mdl');
    }

    function planificacion_programas_get($id_planificacion_programa = NULL, $actuales = FALSE)
    {
        $data = $this->planificacion_programa_mdl->datos_programa($id_planificacion_programa, $actuales);
        $this->response($data);
    }
}