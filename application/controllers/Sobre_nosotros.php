<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @author: Jhonatan Team PSG
 * Institucion: Posgrado
 * Sistema: PSG
 * Módulo: Kardex Docentes
 * Descripcion: El objetivo de este controlador es: Realizar todo tipo de cambios en el personal Docente de POSGRADO
 **/

class Sobre_nosotros extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sobre_nosotros_model');
    }

    public function index()
    {

        $this->templater->view_horizontal('sobre_nosotros/index');
    }
}
