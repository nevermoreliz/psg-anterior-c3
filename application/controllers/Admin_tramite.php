<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_tramite extends PSG_Controller
{
    var $ruta_carpeta_vista;
    var $ruta_carpeta_vista_json;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloGeneral');
        $this->load->model('persona_model');
        $this->load->model('tramite_model');
        $this->load->model('ModeloPsgFormulario');
        $this->load->model('docente_mdl');
        $this->load->library('ReporteFormularioDocente');
        $this->ruta_carpeta_vista = '/admin_tramite/listar_solicitudes';
        $this->ruta_carpeta_vista_json = 'admin_tramite/campos_requisito_tramite';
    }

    /**
     * Metodo que permite listar todas las solicitudes que hacen las personas 
     */
    public function listar_solicitudes()
    {
        // if ($this->input->is_ajax_request()) {
        //     $this->templater->view_horizontal_admin('/admin_tramite/listar_solicitudes', $this->data);
        // }
        $this->vista(null, $this->data);
    }

    public function listar_tramites()
    {
        $grupos_tramite = [];
        $tramites = [];
        foreach (explode(',', $this->usuario['nombre_grupo']) as $key => $value) {
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
        $this->templater->view_horizontal_admin('admin_tramite/listar_tramites', $this->data);
    }

    public function listar_mis_solicitudes()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            /** $this->data['requisitos_tramite'] : En sgte linea verificamos si la persona tiene una solicitud pendiente */
            $this->data['tiene_solicitudes'] = $this->tramite_model->detalle_estado_solicitud(['p.id_persona' => $this->data['usuario']['id_persona']]);
            $this->templater->view_horizontal_admin('admin_tramite/listar_mis_solicitudes', $this->data);
        }
    }

    /**
     * Funcion: Retorna una vista HTML listando requisitos de un tramite
     * Quien lo LLama: Una llamada AJAX
     * Retorna: HTML
     */
    public function campos_requisito_tramite()
    {
        $this->load->helper(array('form', 'url'));
        /** $this->data['requisitos_tramite'] : En sgte linea extraemos todos los requisitos del Tramite seleccionado */
        $this->data['requisitos_tramite'] = $this->tramite_model->detalle_requisitos_tramite(['t.id_tramite' => $_REQUEST['id_tramite'], 'estado_requisito_tramite' => 'REGISTRADO']);
        if (empty($this->data['requisitos_tramite'])) {
            // $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El tramite aun no cuenta con requisitos']));
            $this->json(['error' => 'El tramite aun no cuenta con requisitos']);
        } else {
            /** $this->data['requisitos_tramite'] : En sgte linea verificamos si la persona tiene una solicitud pendiente */
            $this->data['tiene_solicitudes'] = $this->tramite_model->detalle_estado_solicitud(['id_tramite' => $_REQUEST['id_tramite'], 'p.id_persona' => $this->data['usuario']['id_persona']], ['REGISTRADO', 'OBSERVADO', 'REVISADO']);
            $this->data['id_tramite'] =  $_REQUEST['id_tramite'];
            $this->json(['exito' => true], null, $this->data);
            // $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true, 'vista' => $this->templater->view_horizontal_admin('admin_tramite/campos_requisito_tramite', $this->data)]));
        }
    }


    public function revisar_requisitos()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['solicitud_tramite'] = $this->tramite_model->solicitud_tramite('select', ['id_solicitud_tramite' => $this->input->post('id_solicitud_tramite')]);
            $requisitos_respaldos = [];
            foreach ($this->tramite_model->detalle_requisitos_presentado_persona(['rpp.id_solicitud_tramite' => $this->input->post('id_solicitud_tramite')]) as $key => $value) {
                $respaldos = ['respaldos' => $this->tramite_model->respaldos_digitales(['id_requisito_presentado_persona' => $value['id_requisito_presentado_persona']])];
                $requisitos_respaldos[] =  array_merge($value, $respaldos);
            }
            $this->data['requisitos_respaldos'] = $requisitos_respaldos;
            $this->templater->view_horizontal_admin('admin_tramite/revisar_requisitos', $this->data);
        }
    }


    public function ajax_listar_solicitud()
    {
        if ($this->input->is_ajax_request()) {
            $table = 'solicitud_tramite s, gestion g, persona p, tramite t';
            $primaryKey = 'id_solicitud_tramite';
            $where = "s.id_gestion = g.id_gestion and s.id_tramite = t.id_tramite and s.id_persona = p.id_persona and s.id_tramite = {$this->input->get('id_tramite')} and p.id_persona={$this->input->get('id_persona')}";

            $columns = [
                ['db' => 'id_solicitud_tramite', 'dt' => 0],
                ['db' => 's.fecha_registro', 'alias' => 'sol', 'dt' => 1],
                ['db' => 'fecha_recepcion', 'dt' => 2],
                ['db' => 'fecha_entrega', 'dt' => 3],
                ['db' => 'referencia_solicitud', 'dt' => 4],
                ['db' => 'tipo_tramite', 'dt' => 5],
                ['db' => 'estado_solicitud', 'dt' => 6],
                ['db' => 'gestion', 'dt' => 7]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    public function ajax_listar_solicitudes()
    {
        if ($this->input->is_ajax_request()) {
            $table = 'solicitud_tramite s, gestion g, persona p, tramite t';
            $primaryKey = 'id_solicitud_tramite';
            $where = "s.id_gestion = g.id_gestion and s.id_tramite = t.id_tramite and s.id_persona = p.id_persona";

            $columns = [
                ['db' => 'id_solicitud_tramite', 'dt' => 0],
                ['db' => 's.fecha_registro', 'alias' => 'sol', 'dt' => 2],
                ['db' => 'fecha_recepcion', 'dt' => 3],
                ['db' => 'fecha_entrega', 'dt' => 4],
                ['db' => 'p.id_persona', 'alias' => 'pe', 'dt' => 5],
                ['db' => "concat(nombre, ' <br>',paterno, ' ', materno)", 'alias' => 'p', 'dt' => 6],
                ['db' => 'estado_solicitud', 'dt' => 7],
                ['db' => 'referencia_solicitud', 'dt' => 8],
                ['db' => 'tipo_tramite', 'dt' => 9],
                ['db' => 'gestion', 'dt' => 10]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    public function ajax_listar_mis_solicitudes()
    {
        if ($this->input->is_ajax_request()) {
            $tables = 'psg_solicitud_tramite s join psg_gestion g on g.id_gestion = s.id_gestion join psg_persona p on p.id_persona = s.id_persona join psg_tramite t on t.id_tramite = s.id_tramite';
            $primaryKey = 'id_solicitud_tramite';
            $where = "p.id_persona={$this->input->get('id_persona')}";

            $columns = [
                ['db' => 'id_solicitud_tramite', 'dt' => 0],
                ['db' => 's.fecha_registro', 'alias' => 'sol', 'dt' => 1],
                ['db' => 'fecha_recepcion', 'dt' => 2],
                ['db' => 'fecha_entrega', 'dt' => 3],
                ['db' => 'referencia_solicitud', 'dt' => 4],
                ['db' => 'tipo_tramite', 'dt' => 5],
                ['db' => 'estado_solicitud', 'dt' => 6],
                ['db' => 'gestion', 'dt' => 7]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::super_complex($_GET, $sql_details, $tables, $primaryKey, $columns, $where)));
        }
    }

    public function actualizar_solicitud()
    {
        if ($this->input->is_ajax_request()) {
            $correcto = $this->tramite_model->solicitud_tramite('update', ['id_solicitud_tramite' => $this->input->post('id_solicitud_tramite')], [
                'descripcion_solicitud' => $this->input->post('descripcion_solicitud'),
                'fecha_recepcion' => date("Y-m-d H:i:s"),
                'fecha_entrega' => date("Y-m-d H:i:s"),
                'estado_solicitud' => $this->input->post('estado_solicitud')
            ]);
            if ($correcto == true)
                $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => $correcto)));
            else
                /**
             * En el caso de que no sea un TRUE se retorna un objeto JSON con el error de base de datos
             */
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Error al actualizar el registro (' . $correcto . ').')));
        }
    }
    public function listar_respaldos_digitales()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $this->tramite_model->respaldos_digitales(['estado_multimedia_requisito_presentado_persona' => 'REGISTRADO'], $this->input->get('id_multimedia_requisito_presentado_persona'))]));
        }
    }
    public function insertar_solicitud()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_tramite', 'Tramite', 'required|numeric|max_length[2]');
            $this->form_validation->set_rules('referencia_solicitud', 'Referencia de Solicitud', 'required|max_length[400]');
            $this->form_validation->set_rules('descripcion_solicitud', 'Descripcion de Solicitud', 'max_length[500]');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $solicitud_tramite = $this->tramite_model->solicitud_tramite('select');
                $id_solicitud_tramite = $this->tramite_model->solicitud_tramite('insert', null, [
                    'id_tramite' => $this->input->post('id_tramite'),
                    'id_gestion' => $this->tramite_model->gestion('select', ['gestion' => date('Y')])[0]['id_gestion'],
                    'nro_solicitud' => (isset($solicitud[array_key_last($solicitud_tramite)]['nro_solicitud'])) ? ($solicitud_tramite[array_key_last($solicitud_tramite)]['nro_solicitud']) + 1 : 1,
                    'id_persona' => $this->data['usuario']['id_persona'],
                    'referencia_solicitud' => $this->input->post('referencia_solicitud'),
                    'descripcion_solicitud' => empty(trim($this->input->post('descripcion_solicitud'))) ? null : trim($this->input->post('descripcion_solicitud')),
                    'estado_solicitud' => 'REGISTRADO'
                ]);
                if (is_numeric($id_solicitud_tramite)) {
                    unset($_POST['id_tramite']);
                    unset($_POST['referencia_solicitud']);
                    unset($_POST['descripcion_solicitud']);
                    foreach ($this->input->post() as $key => $value) {
                        if (!empty($value)) {
                            $id_requisito_presentado_persona = $this->tramite_model->requisito_presentado_persona('insert', null, [
                                'id_requisito_tramite' => $key,
                                'id_solicitud_tramite' => $id_solicitud_tramite,
                                'estado_requisito_presentado' => 'REGISTRADO'
                            ]);
                            if (is_numeric($id_requisito_presentado_persona)) {
                                foreach (explode(",", $value) as $k => $val) {
                                    $this->tramite_model->multimedia_requisito_presentado_persona('update', ['id_multimedia_requisito_presentado_persona' => $val], [
                                        'id_requisito_presentado_persona' => $id_requisito_presentado_persona
                                    ]);
                                }
                            }
                        }
                    }
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'Se agrego su solicitud']));
                }
            }
        }
    }

    function GenerarReporteFormularioDocente()
    {
        $lista_formacion_academica_posgrado = $this->ModeloPsgFormulario->ListaFormacionAcademicaPosgrado($this->input->post('id_persona'));
        $correlativo = $this->ModeloGeneral->CorrelativoFormulario('002');

        $id_emision_formulario = $this->tramite_model->emision_formulario('insert', null, [
            'id_persona' => $this->input->post('id_persona'),
            'tipo_formulario' => '002',
            'correlativo_formulario' => $correlativo,
            'monto_formulario' => (intval((is_null($lista_formacion_academica_posgrado) ? 0 : count($lista_formacion_academica_posgrado)) * 40)) + 80,
            'fecha_emision_formulario' => date('Y-m-d H:i:s'),
            'id_usuario' => $this->usuario['id_persona'],
            'id_solicitud' => $this->input->post('id_solicitud'),
            'estado_formulario' => 'ACTIVO'
        ]);
    }
    public function ReporteFormularioDocente($id_persona, $id_emision_formulario = null)
    {
        $persona = $this->docente_mdl->datos_persona($id_persona);
        //echo $id_persona.' reporte';
        //require_once APPPATH . 'controllers/Reportes/ReporteFormularioDocente.php';
        $informacion_docente = $this->ModeloPsgFormulario->ObtenerInformacionDocente($id_persona);
        $lista_formacion_academica_posgrado = $this->ModeloPsgFormulario->ListaFormacionAcademicaPosgrado($id_persona);
        $client = new GuzzleHttp\Client();
        // $respuesta = $client->request('GET', 'http://posgrado.upea.bo/api/sic/docencia_pregrado/' . $persona['ci']);
        $respuesta = $client->request('GET', 'http://posgrado.upea.bo/api/sic/docencia_pregrado/' . $informacion_docente->ci);

        $lista_ejercicio_grado_SICOD = json_decode($respuesta->getBody(TRUE)->getContents());
        //$lista_ejercicio_grado_SICOD = array();
        $lista_ejercicio_grado_docente_externo = $this->ModeloPsgFormulario->ListaEjecicioDocenciaGradoDocenteExterno($id_persona);
        $lista_ejercicio_docencia_posgrado = $this->ModeloPsgFormulario->ListaEjercicioDocenciaPosgrado($id_persona);

        //LA PARTE DE 6. DECLARACION JURADA DE ACTIVIDAD LABORAL Y CARGA HORIA
        //ACTIVIDAD ACADEMICA	
        $lista_djalch_actividad_academica = $this->ModeloPsgFormulario->ListaDJALCHActividadAcademica($id_persona);

        //ACTIVIDAD LABORAL	
        $lista_djalch_actividad_laboral = $this->ModeloPsgFormulario->ListaDJALCHActividadLaboral($id_persona);

        //EMISION DE FORMULARIO
        $formulario_emitido = $this->ModeloPsgFormulario->FormularioEmitido($id_emision_formulario);

        //print_r($informacion_docente);exit;
        $FormularioDocente = new ReporteFormularioDocente($informacion_docente, $formulario_emitido);
        $FormularioDocente->ContenidoFormulariosDocente($lista_formacion_academica_posgrado, $lista_ejercicio_grado_SICOD, $lista_ejercicio_grado_docente_externo, $lista_ejercicio_docencia_posgrado, $lista_djalch_actividad_academica, $lista_djalch_actividad_laboral);
    }
}
