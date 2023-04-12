<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tramite extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('persona_model');
        $this->load->model('tramite_model');
    }

    public function index()
    {
        $grupos_tramite = [];
        $tramites = [];
        foreach (['SUPERADMIN', 'ADMINISTRADOR', 'TECNICO_ACADEMICO', 'TECNICO_MATRICULADOR', 'TECNICO_RECAUDACION', 'TECNICO_DIPLOMAS', 'TECNICO_RRHH', 'TECNICO_DOCENTE', 'DIRECTOR_POSGRADO', 'COORDINADOR_PROGRAMA', 'SECRETARIA_POSGRADO', 'DOCENTE_POSGRADO', 'POSGRADUANTE', 'KARDEX_POSGRADO', 'TECNICO_AUXILIAR', 'TECNICO_EVENTOS', 'TECNICO_PROGRAMAS', 'TECNICO_TITULOS', 'AUXILIARES', 'TECNICOS', 'PUBLICADOR'] as $key => $value) {
            $grupos = $this->tramite_model->detalle_tramite_grupo(['nombre_grupo' => trim($value)]);
            if (!empty($grupos))
                $grupos_tramite[trim($value)] = $grupos;
        }
        foreach ($grupos_tramite as $key => $value) {
            $requisitos = [];
            foreach ($value as $k => $val) {
                $requisitos[] =  array_merge($val, ['requisitos' => $this->tramite_model->detalle_requisitos_tramite(['t.id_tramite' => $val['id_tramite'], 'estado_requisito_tramite' => 'REGISTRADO'])]);
            }
            $tramites[$key] = $requisitos;
        }
        $this->data['tramites'] = $tramites;
        $this->templater->view_horizontal('admin_tramite/listar_tramites', $this->data);
    }
}
