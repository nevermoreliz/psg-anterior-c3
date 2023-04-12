<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Sic extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('sic_mdl');
    }

    function docencia_pregrado_get($ci)
    {
        $data = $this->sic_mdl->docencia_pregrado_reporte($ci);
        $this->response($data);
    }
}
