<?php defined('BASEPATH') or exit('No direct script access allowed');

class PSG_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db->query("SET search_path = public, principal, academico,administrativo, financiero, correspondencia, pagina, rrhh, marketing, tramite_administrativo, archivo_digital");
    }
}
