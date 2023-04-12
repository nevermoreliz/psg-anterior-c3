<?php defined('BASEPATH') or exit('No direct script access allowed');
/** 
 * Institucion: Unidad de Posgrado
 * Sistema: 
 * Módulo: Notas posgraduante
 * Descripcion: Controlador del módulo de Notas posgraduante
 * Fecha: 29/08/2020
 */

class Docente extends PSG_Controller
{
    var $ruta_carpeta_vista;
    var $id_docente;
    public function __construct()
    {
        parent::__construct();
        $this->is_ajax();
        $this->ruta_carpeta_vista = '/docente/docente_';
        $this->id_docente = $this->input->cookie('id_persona', TRUE);// 4575; //6911;//4575 ,6835 ,92
        $this->load->model('docente_model');
    }
    public function index()
    {
        $listar_programa_docente = $this->docente_model->listar_programa_docente($this->id_docente, 0, 6);
        $data['html_programa_docente'] = $this->programa_docente($listar_programa_docente);
        $this->vista('ver', $data);
    }
    public function listar_programa_docente()
    {
        $inicio = $this->input->post('inicio');
        $limite = $this->input->post('limite');
        $listar_programa_docente = $this->docente_model->listar_programa_docente($this->id_docente, $inicio, $limite);
        echo $this->programa_docente($listar_programa_docente);
    }
    public function programa_docente($listar_programa_docente = null)
    {
        if (!empty($listar_programa_docente)) {
            $html = '<div class="row">';
            foreach ($listar_programa_docente as $fila_listar_programa_docente) {
                //TODO mejorar
                $mensaje_fecha = 'Adicionar nota se habilitara en fecha: ' . $fila_listar_programa_docente->fecha_inicio_nota;
                $mensaje_color = "warning";
                $fecha_inicio_nota=$fila_listar_programa_docente->fecha_inicio_nota;
                $fecha_fin_nota=$fila_listar_programa_docente->fecha_fin_nota;
                if ($fecha_inicio_nota <= date('Y-m-d') && $fecha_fin_nota >= date('Y-m-d')) {
                    $mensaje_fecha = 'Adicionar nota finalizará en fecha: <strong>' . $fecha_fin_nota . '</strong>';
                    $mensaje_color = "success";
                } elseif ($fila_listar_programa_docente->fecha_inicio_rezadado <= date('Y-m-d') && $fila_listar_programa_docente->fecha_fin_rezadado >= date('Y-m-d')) {
                    $mensaje_fecha = '<strong>Rezagado</strong> <br>Adicionar nota finalizará en fecha: <strong>' . $fecha_fin_nota . '</strong>';
                    $mensaje_color = "success";
                } elseif (date('Y-m-d') > $fecha_fin_nota && date('Y-m-d') > $fecha_inicio_nota) {
                    $mensaje_fecha = 'Adicionar nota finalizó en fecha: ' . $fecha_fin_nota;
                    $mensaje_color = "error";
                    if ($fecha_inicio_nota == '' || $fecha_fin_nota == '') {
                        $mensaje_fecha = 'Sin fecha para adicionar nota.';
                        $mensaje_color = "warning";
                    }
                }

                $html .= '<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class=" card">
                <div class="ribbon ribbon-bookmark ribbon-right ribbon-success"> Gestión : <strong>' . $fila_listar_programa_docente->gestion . '</strong></div>
                <img class="card-img-top" src="img/banner_dos.png" alt="Card image cap">
                <div class="row">
                    <div class="col-md-12 text-center div_programa m-t-20">
                    <h5 class="box-title m-b-0"> <strong>' . $fila_listar_programa_docente->descripcion_grado_academico . ': </strong> ' . $fila_listar_programa_docente->nombre_programa . ' <strong> Version: ' . $fila_listar_programa_docente->numero_version . '</strong> </h5>
                    <h5 class="text-info"><strong>Modalidad: </strong> ' . $fila_listar_programa_docente->nombre_tipo_programa . '</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item text-center div_modulo box-title">
                        <strong>' . $fila_listar_programa_docente->nombre_modulo_programa . '</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Paralelo
                        <strong class="text-info">[' . $fila_listar_programa_docente->paralelo . ']</strong>
                        turno
                        <strong class="text-info">[' . $fila_listar_programa_docente->turno . ']</strong>
                        </li>
                    </ul>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="row button-group">
                            <button type="button" class="btn-xs waves-effect waves-light btn-info col-lg-6" id="id_asignacion_modulo_programa_s" name="id_asignacion_modulo_programa_s" data-id_gestion_programa="' . $fila_listar_programa_docente->id_gestion . '" value="' . $fila_listar_programa_docente->id_asignacion_modulo_programa . '" data-titulo_programa=" <strong>' . $fila_listar_programa_docente->descripcion_grado_academico . ' ' . $fila_listar_programa_docente->nombre_programa . ' </strong><br> <strong> Version: </strong>' . $fila_listar_programa_docente->numero_version . ' <br> <strong>Modalidad: </strong>' . $fila_listar_programa_docente->nombre_tipo_programa . '"><i class="mdi mdi-file-tree"></i> Adicionar Nota</button>
                            <button type="button" class="btn-xs waves-effect waves-light btn-info col-lg-6" id="lista_posgraduante_excel" name="lista_posgraduante_excel" data-id_gestion_programa="' . $fila_listar_programa_docente->id_gestion . '" value="' . $fila_listar_programa_docente->id_asignacion_modulo_programa . '"><i class="mdi mdi-file-pdf"></i> Lista de Estudiantes</button>
                        </div>
                    </div>
                    <div class="jq-toast-single jq-has-icon jq-icon-' . $mensaje_color . ' div_modulo">
                        <h2 class="jq-toast-heading">' . $mensaje_fecha . '</h2>
                    </div>
                </div>
            </div>';
            }
            $html .= '</div>';
            return $html;
        } else return null;
    }
}
