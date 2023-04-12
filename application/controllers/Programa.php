<?php defined('BASEPATH') or exit('No direct script access allowed');
class Programa extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('programa_model');
    }

    public function programa_programa_listar()
    {
        if ($this->input->is_ajax_request()) {
            $this->data['gestiones'] = ($this->db->where(['estado_gestion' => 'ACTIVO'])->order_by('id_gestion desc')->get('gestion'))->result_array();
            $this->data['grados_academicos'] = ($this->db->get_where('grado_academico', ['estado_grado' => 'REGISTRADO']))->result_array();
            $this->data['tipos_programas'] = $this->db->get_where('tipo_programa', ['estado_tipo_programa' => 'REGISTRADO'])->result_array();

            $this->data['versiones'] = $this->sql_psg->version();
            $this->templater->view_horizontal_admin('programa/programa_programa_listar', $this->data);
        }
    }


    public function programa_programa_agregar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['gestiones'] = $this->programa_model->gestion('select', ['estado_gestion' => 'ACTIVO'], null, 'id_gestion desc');
            $this->data['unidades'] = $this->programa_model->listar_unidades(['a.estado_unidad' => 'ACTIVO'])->result_array();
            $this->data['grados_academicos'] = $this->programa_model->grado_academico('select');
            $this->data['tipos_programas'] = $this->programa_model->tipo_programa('select');

            if (es('SUPERADMIN')) {
                $this->data['ss'] = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                    'contentedor' => 1,
                    'nombre' => 'Respaldos de CEFORPI',
                    'subir_archivo' => $this->templater->view_horizontal_admin('persona/subir_archivo', ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEFORPI', 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEFORPI'])->final_output,
                    'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', ['multimedias_persona' => [], 'elemento' => 1])->final_output
                ])->final_output;
                $this->data['ww'] = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                    'contentedor' => 1,
                    'nombre' => 'Respaldos de CEUB',
                    'subir_archivo' => $this->templater->view_horizontal_admin('persona/subir_archivo', ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEUB', 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEUB'])->final_output,
                    'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', ['multimedias_persona' => [], 'elemento' => 1])->final_output
                ])->final_output;
            } else if (es('TECNICO_CEFORPI')) {
                $this->data['ss'] = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                    'contentedor' => 1,
                    'nombre' => 'Respaldos de CEFORPI',
                    'subir_archivo' => $this->templater->view_horizontal_admin('persona/subir_archivo', ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEFORPI', 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEFORPI'])->final_output,
                    'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', ['multimedias_persona' => [], 'elemento' => 1])->final_output
                ])->final_output;
            } else if (es('TECNICO_PROGRAMAS')) {
                $this->data['ww'] = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                    'contentedor' => 1,
                    'nombre' => 'Respaldos de CEUB',
                    'subir_archivo' => $this->templater->view_horizontal_admin('persona/subir_archivo', ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEUB', 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEUB'])->final_output,
                    'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', ['multimedias_persona' => [], 'elemento' => 1])->final_output
                ])->final_output;
            }
            $this->templater->view_horizontal_admin('programa/programa_programa_agregar', $this->data);
        }
    }

    public function programa_programa_agregar_siguiente()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['unidades'] = $this->programa_model->listar_unidades(['a.estado_unidad' => 'ACTIVO'])->result_array();
            $this->data['grados_academicos'] = $this->programa_model->grado_academico('select');
            $this->data['tipos_programas'] = $this->programa_model->tipo_programa('select');
            $programa = $this->programa_model->planificacion_programa('select', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array();
            // $this->data['gestiones'] = $this->programa_model->gestion('select', ['id_gestion >=' => $programa['id_gestion']], null, 'id_gestion desc');
            $this->data['gestiones'] = $this->programa_model->gestion('select', null, null, 'id_gestion desc');

            $programa = array_merge($programa, ['numero_version' => numero_romano(romano_numero($programa['numero_version']) + 1)]);
            $this->data['programa'] = $programa;
            $ss = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                'contentedor' => 1,
                'nombre' => 'Respaldos de CEFORPI',
                'subir_archivo' => $this->templater->view_horizontal_admin('persona/subir_archivo', ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEFORPI', 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEFORPI'])->final_output,
                'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', [
                    'multimedias_persona' => [], 'elemento' => 1
                ])->final_output
            ])->final_output;
            $ww = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                'contentedor' => 1,
                'nombre' => 'Respaldos de CEUB',
                'subir_archivo' => $this->templater->view_horizontal_admin(
                    'persona/subir_archivo',
                    ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEUB', 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEUB']
                )->final_output,
                'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', [
                    'multimedias_persona' => [], 'elemento' => 1
                ])->final_output
            ])->final_output;

            if (es('SUPERADMIN')) {
                $this->data['ss'] = $ss;
                $this->data['ww'] = $ww;
            } else if (es('TECNICO_CEFORPI')) {
                $this->data['ss'] = $ss;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(
                [
                    'exito' => true,
                    'vista' => ($this->templater->view_horizontal_admin('programa/programa_programa_agregar', $this->data))->final_output,
                    'datos' => $this->db->get_where('psg_vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array()
                ]
            ));
        }
    }

    public function programa_programa_editar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['gestiones'] = $this->programa_model->gestion('select', null, null, 'id_gestion desc');
            $this->data['unidades'] = $this->programa_model->listar_unidades(['a.estado_unidad' => 'ACTIVO'])->result_array();
            $this->data['grados_academicos'] = $this->programa_model->grado_academico('select');
            $this->data['tipos_programas'] = $this->programa_model->tipo_programa('select');
            $this->data['programa'] = $this->programa_model->planificacion_programa('select', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array();

            $ss = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                'contentedor' => 1,
                'nombre' => 'Respaldos de CEFORPI',
                'subir_archivo' => $this->templater->view_horizontal_admin('persona/subir_archivo', ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEFORPI&id_planificacion_programa=' . $this->data['programa']['id_planificacion_programa'], 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEFORPI'])->final_output,
                'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', [
                    'multimedias_persona' => $this->programa_model->listar_archivo_inscripcion(['id_planificacion_programa' => $this->data['programa']['id_planificacion_programa'], 'estado_archivo <>' => 'ELIMINADO', 'etiqueta' => 'PROGRAMA_RESPALDO_CEFORPI'])->result_array(), 'elemento' => 1
                ])->final_output
            ])->final_output;
            $ww = $this->templater->view_horizontal_admin('persona/contenedor_archivo', [
                'contentedor' => 1,
                'nombre' => 'Respaldos de CEUB',
                'subir_archivo' => $this->templater->view_horizontal_admin(
                    'persona/subir_archivo',
                    ['elemento' => 2, 'elemento_dropzone' => 'elemento_dropzone', 'url' => 'programa/multimedia_insertar/?etiqueta=PROGRAMA_RESPALDO_CEUB&id_planificacion_programa=' . $this->data['programa']['id_planificacion_programa'], 'acceptedFiles' => '.doc, .docx, .pdf, .png, .jpeg, .jpg', 'etiqueta' => 'PROGRAMA_RESPALDO_CEUB']
                )->final_output,
                'seleccionar_archivo' => $this->templater->view_horizontal_admin('persona/seleccionar_archivo', ['multimedias_persona' => $this->programa_model->listar_archivo_inscripcion(['id_planificacion_programa' => $this->data['programa']['id_planificacion_programa'], 'estado_archivo <>' => 'ELIMINADO', 'etiqueta' => 'PROGRAMA_RESPALDO_CEUB'])->result_array(), 'elemento' => 1])->final_output
            ])->final_output;

            if (es('SUPERADMIN')) {
                $this->data['ss'] = $ss;
                $this->data['ww'] = $ww;
            } else if (es('TECNICO_CEFORPI')) {
                $this->data['ss'] = $ss;
            } else if (es('TECNICO_PROGRAMAS')) {
                $this->data['ww'] = $ww;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(
                [
                    'exito' => true,
                    'vista' => ($this->templater->view_horizontal_admin('programa/programa_programa_agregar', $this->data))->final_output,
                    'datos' => $this->db->get_where('psg_vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array()
                ]
            ));
        }
    }
    public function programa_programa_insertar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            if (es(['SUPERADMIN', 'ADMINISTRADOR', 'TECNICO_CEFORPI'])) {
                switch ($this->input->cookie('programa_tipo_actualizacion')) {
                    case 'siguiente_version_programa':
                        $this->form_validation->set_rules('id_planificacion_programa', 'Numero del programa', 'required|numeric');
                        $this->form_validation->set_rules('id_gestion', 'Gestión', 'required|numeric|max_length[2]');
                        $this->form_validation->set_rules('sigla_programa', 'Sigla', 'max_length[20]');
                        $this->form_validation->set_rules('fecha_inicio', 'Fecha Inicio', 'required');
                        $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');
                        $this->form_validation->set_rules('costo_colegiatura', 'Costo Colegiatura', 'required|numeric|max_length[5]');
                        $this->form_validation->set_rules('costo_matricula', 'Costo Matricula', 'required|numeric|max_length[4]');
                        $this->form_validation->set_rules('descuento_individual', 'Descuento al Contado', 'numeric|max_length[5]');
                        $this->form_validation->set_rules('creditaje', 'Carga Horaria Total', 'required|numeric|max_length[5]');
                        $this->form_validation->set_rules('descripcion_programa', 'Responsable del Programa', 'required|max_length[250]');
                        if (!empty($this->input->post('haber_basico_docente')) || !empty($this->input->post('haber_basico_coordinador')) || !empty($this->input->post('haber_basico_coloquio'))) {
                            $this->form_validation->set_rules('haber_basico_docente', 'Haber Docente', 'required|numeric|max_length[5]');
                            $this->form_validation->set_rules('haber_basico_coordinador', 'Haber Coordinador', 'required|numeric|max_length[5]');
                            $this->form_validation->set_rules('haber_basico_coloquio', 'Haber Coloquio', 'required|numeric|max_length[5]');
                            $datos_haber = [
                                'haber_basico_docente' => empty($this->input->post('haber_basico_docente')) ? null : $this->input->post('haber_basico_docente'),
                                'haber_basico_coordinador' => empty($this->input->post('haber_basico_coordinador')) ? null : $this->input->post('haber_basico_coordinador'),
                                'haber_basico_coloquio' =>  empty($this->input->post('haber_basico_coloquio')) ? null : $this->input->post('haber_basico_coloquio'),
                            ];
                        }

                        if (!empty($this->input->post('numero_partida_ceub')) || !empty($this->input->post('numero_folio_ceub')) || !empty($this->input->post('fecha_registro_ceub'))) {
                            $this->form_validation->set_rules('numero_partida_ceub', 'Partida CEUB', 'required|max_length[10]');
                            $this->form_validation->set_rules('numero_folio_ceub', 'Numero folio CEUB', 'required|max_length[10]');
                            $this->form_validation->set_rules('fecha_registro_ceub', 'Fecha registro CEUB', 'required');

                            $datos_ceub = [
                                'numero_partida_ceub' => $this->input->post('numero_partida_ceub'),
                                'numero_folio_ceub' => $this->input->post('numero_folio_ceub'),
                                'fecha_registro_ceub' => $this->input->post('fecha_registro_ceub'),
                            ];
                        }

                        $programa = ($this->db->get_where('planificacion_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->row_array();

                        if (!empty($programa)) {
                            if ($this->input->post('id_gestion') != $programa['id_gestion']) {
                                $programa = array_merge($programa, ['numero_version' => numero_romano(romano_numero($programa['numero_version']) + 1)]);
                                $datos = array_merge(isset($datos_haber) ? $datos_haber : [], isset($datos_ceub) ? $datos_ceub : [], [
                                    'id_gestion' => $this->input->post('id_gestion'),
                                    'id_unidad' => $programa['id_unidad'],
                                    'id_tipo_programa' => $programa['id_tipo_programa'],
                                    'id_grado_academico' => $programa['id_grado_academico'],
                                    'numero_version' => $programa['numero_version'],
                                    'nombre_programa' => $programa['nombre_programa'],
                                    'sigla_programa' => empty($this->input->post('sigla_programa')) ? null : $this->input->post('sigla_programa'),
                                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                                    'fecha_fin' => $this->input->post('fecha_fin'),
                                    'costo_colegiatura' => $this->input->post('costo_colegiatura'),
                                    'costo_matricula' => $this->input->post('costo_matricula'),
                                    'descuento_individual' => empty($this->input->post('descuento_individual')) ? null : $this->input->post('descuento_individual'), 'creditaje' => $this->input->post('creditaje'),
                                    'descripcion_programa' => $this->input->post('descripcion_programa'),
                                    'fecha_registro_programa' => date('Y-m-d H:i:s'),
                                    'estado_programa' => 'REGISTRADO'
                                ]);
                            } else
                                return $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'No se puede crear la Siguiente Version con la misma gestion que la anterior')));
                        } else
                            return $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'No se encontro el proceso solicitado, por favor intente más tarde')));
                        break;
                    default:
                        $this->form_validation->set_rules('id_gestion', 'Gestión', 'required|numeric|max_length[2]');
                        $this->form_validation->set_rules('id_unidad', 'Unidad', 'required|numeric');
                        $this->form_validation->set_rules('id_tipo_programa', 'Modalidad', 'required|numeric');
                        $this->form_validation->set_rules('id_grado_academico', 'Grado Academico', 'required|numeric');
                        $this->form_validation->set_rules('numero_version', 'Numero Versión', 'required|max_length[10]');
                        $this->form_validation->set_rules('nombre_programa', 'Nombre Programa', 'required|max_length[250]');
                        $this->form_validation->set_rules('sigla_programa', 'Sigla', 'max_length[20]');
                        $this->form_validation->set_rules('fecha_inicio', 'Fecha Inicio', 'required');
                        $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');
                        $this->form_validation->set_rules('costo_colegiatura', 'Costo Colegiatura', 'required|numeric|max_length[5]');
                        $this->form_validation->set_rules('costo_matricula', 'Costo Matricula', 'required|numeric|max_length[4]');
                        $this->form_validation->set_rules('descuento_individual', 'Descuento al Contado', 'required|numeric|max_length[5]');
                        $this->form_validation->set_rules('creditaje', 'Carga Horaria Total', 'required|numeric|max_length[5]');
                        $this->form_validation->set_rules('descripcion_programa', 'Responsable del Programa', 'required|max_length[250]');

                        if (!empty($this->input->post('haber_basico_docente')) || !empty($this->input->post('haber_basico_coordinador')) || !empty($this->input->post('haber_basico_coloquio'))) {
                            $this->form_validation->set_rules('haber_basico_docente', 'Haber Docente', 'required|numeric|max_length[5]');
                            $this->form_validation->set_rules('haber_basico_coordinador', 'Haber Coordinador', 'required|numeric|max_length[5]');
                            $this->form_validation->set_rules('haber_basico_coloquio', 'Haber Coloquio', 'required|numeric|max_length[5]');
                            $datos_haber = [
                                'haber_basico_docente' => empty($this->input->post('haber_basico_docente')) ? null : $this->input->post('haber_basico_docente'),
                                'haber_basico_coordinador' => empty($this->input->post('haber_basico_coordinador')) ? null : $this->input->post('haber_basico_coordinador'),
                                'haber_basico_coloquio' =>  empty($this->input->post('haber_basico_coloquio')) ? null : $this->input->post('haber_basico_coloquio'),
                            ];
                        }

                        if (!empty($this->input->post('numero_partida_ceub')) || !empty($this->input->post('numero_folio_ceub')) || !empty($this->input->post('fecha_registro_ceub'))) {
                            $this->form_validation->set_rules('numero_partida_ceub', 'Partida CEUB', 'required|max_length[10]');
                            $this->form_validation->set_rules('numero_folio_ceub', 'Numero folio CEUB', 'required|max_length[10]');
                            $this->form_validation->set_rules('fecha_registro_ceub', 'Fecha registro CEUB', 'required');

                            $datos_ceub = [
                                'numero_partida_ceub' => $this->input->post('numero_partida_ceub'),
                                'numero_folio_ceub' => $this->input->post('numero_folio_ceub'),
                                'fecha_registro_ceub' => $this->input->post('fecha_registro_ceub'),
                            ];
                        }
                        $datos = array_merge(isset($datos_haber) ? $datos_haber : [], isset($datos_ceub) ? $datos_ceub : [], [
                            'id_gestion' => $this->input->post('id_gestion'),
                            'id_unidad' => $this->input->post('id_unidad'),
                            'id_tipo_programa' => $this->input->post('id_tipo_programa'),
                            'id_grado_academico' => $this->input->post('id_grado_academico'),
                            'numero_version' => $this->input->post('numero_version'),
                            'nombre_programa' => $this->input->post('nombre_programa'),
                            'sigla_programa' => empty($this->input->post('sigla_programa')) ? null : $this->input->post('sigla_programa'),
                            'fecha_inicio' => $this->input->post('fecha_inicio'),
                            'fecha_fin' => $this->input->post('fecha_fin'),
                            'costo_colegiatura' => $this->input->post('costo_colegiatura'),
                            'costo_matricula' => $this->input->post('costo_matricula'),
                            'descuento_individual' => empty($this->input->post('descuento_individual')) ? null : $this->input->post('descuento_individual'),
                            'creditaje' => $this->input->post('creditaje'),
                            'descripcion_programa' => $this->input->post('descripcion_programa'),
                            'fecha_registro_programa' => date('Y-m-d H:i:s'),
                            'estado_programa' => 'REGISTRADO'
                        ]);
                        break;
                }
                // $this->form_validation->set_rules('estado_programa', 'Estado Programa', 'required|max_length[10]');
            }


            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $correcto = $this->programa_model->planificacion_programa('insert', null, $datos);
                if (is_numeric($correcto)) {
                    $this->multimedia_planificacion_programa_insertar($correcto);
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'El Programa se actualizo correctamente', 'id_planificacion_programa' => $correcto]));
                } else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se agrego el Programa, por favor intente más tarde']));
            }
        }
    }

    public function programa_programa_actualizar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_planificacion_programa', 'Numero del programa', 'required|numeric');
            if (es(['SUPERADMIN', 'ADMINISTRADOR'])) {
                $this->form_validation->set_rules('id_gestion', 'Gestión', 'required|numeric|max_length[2]');
                $this->form_validation->set_rules('id_unidad', 'Unidad', 'required|numeric');
                $this->form_validation->set_rules('id_tipo_programa', 'Modalidad', 'required|numeric');
                $this->form_validation->set_rules('id_grado_academico', 'Grado Academico', 'required|numeric');
                $this->form_validation->set_rules('numero_version', 'Numero Versión', 'required|max_length[10]');
                $this->form_validation->set_rules('nombre_programa', 'Nombre Programa', 'required|max_length[250]');
                $this->form_validation->set_rules('sigla_programa', 'Sigla', 'max_length[20]');
                $this->form_validation->set_rules('fecha_inicio', 'Fecha Inicio', 'required');
                $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');
                $this->form_validation->set_rules('costo_colegiatura', 'Costo Colegiatura', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('costo_matricula', 'Costo Matricula', 'required|numeric|max_length[4]');
                $this->form_validation->set_rules('descuento_individual', 'Descuento al Contado', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('creditaje', 'Carga Horaria Total', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('descripcion_programa', 'Responsable del Programa', 'required|max_length[250]');

                if (!empty($this->input->post('haber_basico_docente')) || !empty($this->input->post('haber_basico_coordinador')) || !empty($this->input->post('haber_basico_coloquio'))) {
                    $this->form_validation->set_rules('haber_basico_docente', 'Haber Docente', 'required|numeric|max_length[5]');
                    $this->form_validation->set_rules('haber_basico_coordinador', 'Haber Coordinador', 'required|numeric|max_length[5]');
                    $this->form_validation->set_rules('haber_basico_coloquio', 'Haber Coloquio', 'required|numeric|max_length[5]');
                    $datos_haber = [
                        'haber_basico_docente' => empty($this->input->post('haber_basico_docente')) ? null : $this->input->post('haber_basico_docente'),
                        'haber_basico_coordinador' => empty($this->input->post('haber_basico_coordinador')) ? null : $this->input->post('haber_basico_coordinador'),
                        'haber_basico_coloquio' =>  empty($this->input->post('haber_basico_coloquio')) ? null : $this->input->post('haber_basico_coloquio'),
                    ];
                }

                if (!empty($this->input->post('numero_partida_ceub')) || !empty($this->input->post('numero_folio_ceub')) || !empty($this->input->post('fecha_registro_ceub'))) {
                    $this->form_validation->set_rules('numero_partida_ceub', 'Partida CEUB', 'required|max_length[10]');
                    $this->form_validation->set_rules('numero_folio_ceub', 'Numero folio CEUB', 'required|max_length[10]');
                    $this->form_validation->set_rules('fecha_registro_ceub', 'Fecha registro CEUB', 'required');

                    $datos_ceub = [
                        'numero_partida_ceub' => $this->input->post('numero_partida_ceub'),
                        'numero_folio_ceub' => $this->input->post('numero_folio_ceub'),
                        'fecha_registro_ceub' => $this->input->post('fecha_registro_ceub'),
                    ];
                }
                $datos = array_merge(isset($datos_haber) ? $datos_haber : [], isset($datos_ceub) ? $datos_ceub : [], [
                    'id_gestion' => $this->input->post('id_gestion'),
                    'id_unidad' => $this->input->post('id_unidad'),
                    'id_tipo_programa' => $this->input->post('id_tipo_programa'),
                    'id_grado_academico' => $this->input->post('id_grado_academico'),
                    'numero_version' => $this->input->post('numero_version'),
                    'nombre_programa' => $this->input->post('nombre_programa'),
                    'sigla_programa' => empty($this->input->post('sigla_programa')) ? null : $this->input->post('sigla_programa'),
                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                    'fecha_fin' => $this->input->post('fecha_fin'),
                    'costo_colegiatura' => $this->input->post('costo_colegiatura'),
                    'costo_matricula' => $this->input->post('costo_matricula'),
                    'descuento_individual' => empty($this->input->post('descuento_individual')) ? null : $this->input->post('descuento_individual'),
                    'creditaje' => $this->input->post('creditaje'),
                    'descripcion_programa' => $this->input->post('descripcion_programa'),
                    'fecha_registro_programa' => date('Y-m-d H:i:s'),
                    'estado_programa' => 'REGISTRADO'
                ]);
            } else if (es('TECNICO_FINANCIERO')) {
                $this->form_validation->set_rules('haber_basico_docente', 'Haber Docente', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('haber_basico_coordinador', 'Haber Coordinador', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('haber_basico_coloquio', 'Haber Coloquio', 'required|numeric|max_length[5]');
                $datos = [
                    'haber_basico_docente' => empty($this->input->post('haber_basico_docente')) ? null : $this->input->post('haber_basico_docente'),
                    'haber_basico_coordinador' => empty($this->input->post('haber_basico_coordinador')) ? null : $this->input->post('haber_basico_coordinador'),
                    'haber_basico_coloquio' =>  empty($this->input->post('haber_basico_coloquio')) ? null : $this->input->post('haber_basico_coloquio'),
                    'estado_programa' => 'APROBADO'
                ];
            } else if (es('TECNICO_PROGRAMAS')) {
                $this->form_validation->set_rules('numero_partida_ceub', 'Partida CEUB', 'required|max_length[10]');
                $this->form_validation->set_rules('numero_folio_ceub', 'Numero folio CEUB', 'required|max_length[10]');
                $this->form_validation->set_rules('fecha_registro_ceub', 'Fecha registro CEUB', 'required');

                $datos = [
                    'numero_partida_ceub' => $this->input->post('numero_partida_ceub'),
                    'numero_folio_ceub' => $this->input->post('numero_folio_ceub'),
                    'fecha_registro_ceub' => $this->input->post('fecha_registro_ceub'),
                    'estado_programa' => 'APROBADO'
                ];
            } else if (es('TECNICO_CEFORPI')) {
                $this->form_validation->set_rules('id_gestion', 'Gestión', 'required|numeric|max_length[2]');
                $this->form_validation->set_rules('id_unidad', 'Unidad', 'required|numeric');
                $this->form_validation->set_rules('id_tipo_programa', 'Modalidad', 'required|numeric');
                $this->form_validation->set_rules('id_grado_academico', 'Grado Academico', 'required|numeric');
                $this->form_validation->set_rules('numero_version', 'Numero Versión', 'required|max_length[10]');
                $this->form_validation->set_rules('nombre_programa', 'Nombre Programa', 'required|max_length[250]');
                $this->form_validation->set_rules('sigla_programa', 'Sigla', 'max_length[20]');
                $this->form_validation->set_rules('fecha_inicio', 'Fecha Inicio', 'required');
                $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');
                $this->form_validation->set_rules('costo_colegiatura', 'Costo Colegiatura', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('costo_matricula', 'Costo Matricula', 'required|numeric|max_length[4]');
                $this->form_validation->set_rules('descuento_individual', 'Descuento al Contado', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('creditaje', 'Carga Horaria Total', 'required|numeric|max_length[5]');
                $this->form_validation->set_rules('descripcion_programa', 'Responsable del Programa', 'required|max_length[250]');


                $datos = [
                    'id_gestion' => $this->input->post('id_gestion'),
                    'id_unidad' => $this->input->post('id_unidad'),
                    'id_tipo_programa' => $this->input->post('id_tipo_programa'),
                    'id_grado_academico' => $this->input->post('id_grado_academico'),
                    'numero_version' => $this->input->post('numero_version'),
                    'nombre_programa' => $this->input->post('nombre_programa'),
                    'sigla_programa' => empty($this->input->post('sigla_programa')) ? null : $this->input->post('sigla_programa'),
                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                    'fecha_fin' => $this->input->post('fecha_fin'),
                    'costo_colegiatura' => $this->input->post('costo_colegiatura'),
                    'costo_matricula' => $this->input->post('costo_matricula'),
                    'descuento_individual' => empty($this->input->post('descuento_individual')) ? null : $this->input->post('descuento_individual'),
                    'creditaje' => $this->input->post('creditaje'),
                    'descripcion_programa' => $this->input->post('descripcion_programa'),
                    'fecha_registro_programa' => date('Y-m-d H:i:s'),
                    'estado_programa' => 'REGISTRADO'
                ];
            }


            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $correcto = $this->programa_model->planificacion_programa(
                    'update',
                    ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')],
                    $datos
                );
                if ($correcto == true)
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'El Programa se actualizo correctamente']));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa no se actualizo, por favor intente más tarde']));
            }
        }
    }

    public function programa_programa_eliminar()
    {
        if ($this->input->is_ajax_request()) {
            if (!empty(($this->db->get_where('matricula_gestion', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array()))
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa no se puede eliminar porque esta vinculada con matriculas']));

            else if (!empty(($this->db->get_where('modulo_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array()))
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa no se puede eliminar porque cuenta con modulos']));

            else if (!empty(($this->db->get_where('trabajo_investigacion', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array()))
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa no se puede eliminar porque esta vinculada con trabajos de investigaci&oacute;n']));
            else if (!empty(($this->db->get_where('multimedia_planificacion_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array()))
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa no se puede eliminar porque esta vinculada con respaldos del Programa']));
            else {
                if ($this->programa_model->planificacion_programa('delete', $this->input->post()) == true)
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'El Programa se elimino correctamente']));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa no se elimino, por favor intente más tarde']));
            }
        }
    }

    public function programa_modulo_eliminar()
    {
        if ($this->input->is_ajax_request()) {
            if (is_numeric($this->input->post('id_modulo_programa'))) {
                if (empty(($this->db->get_where('asignacion_modulo_programa', ['id_modulo_programa' => $this->input->post('id_modulo_programa')]))->result_array()))
                    if ($this->db->delete('modulo_programa', ['id_modulo_programa' => $this->input->post('id_modulo_programa')])) {
                        $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'El modulo se elimino correctamente']));
                    } else
                        $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se elimino el modulo, por favor intente más tarde']));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El modulo no se puede eliminar porque ya se asigno a un Docente']));
            } else
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se encontro el modulo solicitado, por favor intente más tarde']));
        }
    }

    public function programa_asignacion_modulo_listar()
    {
        if ($this->input->is_ajax_request()) {
            $this->data['asignacion_modulo_docente'] = ($this->programa_model->asignaciones_modulo_docente(['ppr.id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array();
            if (!empty($this->data['asignacion_modulo_docente']))

                $this->output->set_content_type('application/json')->set_output(json_encode([
                    'exito' => true,
                    'vista' => ($this->templater->view_horizontal_admin('/programa/programa_asignacion_modulo_listar', $this->data))->final_output,
                    'datos' => $this->db->get_where('psg_vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array()
                ]));
            else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa aun no cuenta con Modulos']));
        }
    }

    public function programa_modulo_listar()
    {
        if ($this->input->is_ajax_request()) {
            $this->data['id_planificacion_programa'] = $this->input->post('id_planificacion_programa');
            if (empty($this->db->get_where('modulo_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->result_array()))
                $this->output->set_content_type('application/json')->set_output(json_encode(
                    ['agregar' => [
                        'titulo' => 'El Programa aun no cuenta con Modulos',
                        'mensaje' => ' ¿Desea Agregar Modulos?',
                    ]]
                ));
            else
                $this->output->set_content_type('application/json')->set_output(json_encode([
                    'exito' => true,
                    'vista' => ($this->templater->view_horizontal_admin('/programa/programa_modulo_listar', $this->data))->final_output,
                    'datos' => $this->sql_psg->listar_tabla('psg_vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], null, 'row')
                ]));
        }
    }
    // public function exist()
    // {
    //     $this->output->set_content_type('application/json')->set_output(json_encode(['func' => "alert();"]));
    // }
    public function programa_modulo_agregar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['id_planificacion_programa'] = $this->input->post('id_planificacion_programa');
            $this->data['tipos_modulo'] = $this->db->get('tipo_modulo')->result_array();
            $this->output->set_content_type('application/json')->set_output(json_encode([
                'exito' => true,
                'vista' => ($this->templater->view_horizontal_admin('/programa/formularios/programa_modulo_agregar', $this->data))->final_output,
                'datos' => $this->db->get_where('vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array()

            ]));
        }
    }

    public function programa_modulo_editar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['modulo'] = $this->programa_model->modulo_programa('select', ['id_modulo_programa' => $this->input->post('id_modulo_programa')]);
            $this->data['tipos_modulo'] = $this->programa_model->tipo_modulo('select');
            $this->output->set_content_type('application/json')->set_output(json_encode([
                'exito' => true,
                'vista' => ($this->templater->view_horizontal_admin('/programa/formularios/programa_modulo_agregar', $this->data))->final_output,
                'datos' => $this->db->get_where('vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array()

            ]));
        }
    }

    public function programa_modulo_listar_ajax()
    {
        if ($this->input->is_ajax_request()) {
            // $table = 'modulo_programa';
            $table = "(SELECT
                        *
                    FROM
                        psg_modulo_programa mp join psg_tipo_modulo tp on mp.id_tipo_modulo = tp.id_tipo_modulo 
                    ) temp";
            $primaryKey = 'id_modulo_programa';
            $where =  "id_planificacion_programa = {$this->input->get('id_planificacion_programa')}";
            $columns = [
                ['db' => 'id_modulo_programa', 'dt' => 0],
                ['db' => 'descripcion_tipo_modulo', 'dt' => 2],
                ['db' => 'nombre_modulo_programa', 'dt' => 3],
                ['db' => 'numero_modulo', 'dt' => 4],
                ['db' => 'horas_academicas', 'dt' => 5],
                ['db' => 'estado_modulo_programa', 'dt' => 6]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::super_complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }
    public function progama_modulo_insertar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_planificacion_programa', 'Id Planificacion Programa', 'required|numeric');
            $this->form_validation->set_rules('id_tipo_modulo', 'Tipo Modulo', 'required|numeric');
            $this->form_validation->set_rules('numero_modulo', 'Numero Modulo', 'required|min_length[1]|max_length[10]');
            $this->form_validation->set_rules('horas_academicas', 'Horas Academicas', 'required|numeric');
            $this->form_validation->set_rules('nombre_modulo_programa', 'Nombre Modulo', 'required|max_length[200]');
            $this->form_validation->set_rules('descripcion_modulo_programa', 'Descripci&oacute;n Modulo Programa', 'max_length[1000]');
            $this->form_validation->set_rules('estado_modulo_programa', 'Nombre Programa', 'required|max_length[250]');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                if (empty(($this->db->get_where('modulo_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa'), 'numero_modulo' =>
                $this->input->post('numero_modulo')]))->result_array())) {
                    $correcto = $this->programa_model->modulo_programa(
                        'insert',
                        null,
                        [
                            'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                            'id_tipo_modulo' => $this->input->post('id_tipo_modulo'),
                            'nombre_modulo_programa' => $this->input->post('nombre_modulo_programa'),
                            'numero_modulo' => $this->input->post('numero_modulo'),
                            'horas_academicas' => $this->input->post('horas_academicas'),
                            'descripcion_modulo_programa' => $this->input->post('descripcion_modulo_programa'),
                            'fecha_registro_modulo' => date('Y-m-d H:i:s'),
                            'id_usuario' => $this->data['usuario']['id_persona'],
                            'estado_modulo_programa' => $this->input->post('estado_modulo_programa'),
                        ]
                    );
                    if (is_numeric($correcto))
                        $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'Se agrego el Modulo correctamente']));
                    else
                        $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se agrego el Modulo, por favor intente más tarde']));
                } else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Ya existe un modulo con la versión ' . $this->input->post('numero_modulo')]));
            }
        }
    }

    public function programa_modulo_actualizar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_modulo_programa', 'Id Modulo Programa', 'required|numeric');
            $this->form_validation->set_rules('id_planificacion_programa', 'Id Planificacion Programa', 'required|numeric');
            $this->form_validation->set_rules('id_tipo_modulo', 'Tipo Modulo', 'required|numeric');
            $this->form_validation->set_rules('numero_modulo', 'Numero Modulo', 'required|min_length[1]|max_length[10]');
            $this->form_validation->set_rules('horas_academicas', 'Horas Academicas', 'required|numeric');
            $this->form_validation->set_rules('nombre_modulo_programa', 'Nombre Modulo', 'required|max_length[200]');
            $this->form_validation->set_rules('descripcion_modulo_programa', 'Descripcion Modulo Programa', 'max_length[1000]');
            $this->form_validation->set_rules('estado_modulo_programa', 'Nombre Programa', 'required|max_length[250]');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $modulos = ($this->db->get_where('modulo_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa'), 'numero_modulo' =>
                $this->input->post('numero_modulo')]))->result_array();
                if (count($modulos) <= 1) {
                    $correcto = $this->programa_model->modulo_programa(
                        'update',
                        ['id_modulo_programa' => $this->input->post('id_modulo_programa')],
                        [
                            'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                            'id_tipo_modulo' => $this->input->post('id_tipo_modulo'),
                            'nombre_modulo_programa' => $this->input->post('nombre_modulo_programa'),
                            'numero_modulo' => $this->input->post('numero_modulo'),
                            'horas_academicas' => $this->input->post('horas_academicas'),
                            'descripcion_modulo_programa' => $this->input->post('descripcion_modulo_programa'),
                            'fecha_registro_modulo' => date('Y-m-d H:i:s'),
                            'id_usuario' => $this->data['usuario']['id_persona'],
                            'estado_modulo_programa' => $this->input->post('estado_modulo_programa'),
                        ]
                    );
                    if ($correcto == true)
                        $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'Se actualizo correctamente el Modulo']));
                    else
                        $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se actualizo el Modulo, por favor intente más tarde']));
                } else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Ya existe un modulo con esta versión ' . $this->input->post('numero_modulo')]));
            }
        }
    }

    private function programa_programa_listar_ajax_autocompletado()
    {
        if ($this->input->is_ajax_request()) {
            if ($this->input->get('id_gestion') != '') {
                $buscar['id_gestion'] = $this->input->get('id_gestion');
            }
            if ($this->input->get('id_grado_academico') != '') {
                $buscar['id_grado_academico'] = $this->input->get('id_grado_academico');
            }
            if ($this->input->get('id_tipo_programa') != '') {
                $buscar['id_tipo_programa'] = $this->input->get('id_tipo_programa');
            }
            if ($this->input->get('numero_version') != '') {
                $buscar['numero_version'] = $this->input->get('numero_version');
            }
            $buscar['cadena'] = $this->input->get('query');

            $array_aux = [];
            foreach ($this->programa_model->planificacion_programa('search', null, null, $buscar) as $dat) {
                $array_aux[] = ['value' => $dat['nombre_programa'], 'data' => $dat['id_planificacion_programa']];
            }
            $return_array = ['query' => 'Unit', 'suggestions' => $array_aux];
            $this->output->set_content_type('application/json')->set_output(json_encode($return_array));
        }
    }
    public function programa_persona_listar_ajax_autocompletado()
    {
        if ($this->input->is_ajax_request()) {
            $persona = verificar_datos_personales('persona', [
                ['dato' => $this->input->get('query'), 'columnas' => ['ci'], 'dividir' => false, 'expresion' => 'or_like'],
                // ['dato' => $this->input->post('fecha_nacimiento'), 'columnas' => ['fecha_nacimiento']],
                ['dato' => mb_convert_case($this->input->get('query'), MB_CASE_UPPER), 'columnas' => ['nombre', 'paterno', 'materno'], 'dividir' => true, 'expresion' => 'or_group_start'],
            ], "id_persona, ci, concat(nombre,' ',paterno,' ',materno) as nombre_completo");


            $array_aux = [];
            foreach ($persona as $key => $dat) {
                $array_aux[] = ['value' => $dat['nombre_completo'], 'data' =>  $dat['id_persona']];
            }
            $return_array = ['query' => 'Unit', 'suggestions' => $array_aux];
            $this->output->set_content_type('application/json')->set_output(json_encode($return_array));
        }
    }
    public function programa_programa_listar_ajax()
    {
        if ($this->input->is_ajax_request()) {
            $buscar = [];
            if ($this->input->get('id_gestion') != '') {
                $buscar['id_gestion_programa'] = $this->input->get('id_gestion');
            }
            if ($this->input->get('id_grado_academico') != '') {
                $buscar['id_grado_academico'] = $this->input->get('id_grado_academico');
            }
            if ($this->input->get('id_tipo_programa') != '') {
                $buscar['id_tipo_programa'] = $this->input->get('id_tipo_programa');
            }
            if ($this->input->get('numero_version') != '') {
                $buscar['numero_version'] = $this->input->get('numero_version');
            }


            $this->db->where("unaccent(lower(nombre_programa)) like unaccent('%" . mb_convert_case(trim($this->input->get('buscar')), MB_CASE_LOWER) . "%')");
            $this->db->get_where('vista_programas', $buscar);

            $table = "(SELECT
                        *,
                        (
                        SELECT
                            count(id_planificacion_programa)
                        FROM
                            academico.psg_modulo_programa
                        where
                            id_planificacion_programa = vp.id_planificacion_programa
                        ) as total,
                        (
                        SELECT
                            count(mg.id_matricula_gestion)
                        FROM
                            academico.psg_planificacion_programa AS pp
                            INNER JOIN academico.psg_matricula_gestion AS mg ON mg.id_planificacion_programa = pp.id_planificacion_programa
                        WHERE
                            pp.id_planificacion_programa = vp.id_planificacion_programa
                        ) as matriculados
                    FROM
                        public.psg_vista_programas vp
                    ) temp";
            // $table = 'vista_programas';
            $primaryKey = 'id_planificacion_programa';
            $where =  (substr($this->db->last_query(), strpos($this->db->last_query(), 'WHERE') + 6));
            $columns = [
                ['db' => 'id_planificacion_programa', 'dt' => 0],
                ['db' => 'gestion_programa', 'dt' => 1],
                ['db' => "descripcion_grado_academico", 'dt' => 2],
                ['db' => "nombre_tipo_programa", 'dt' => 3],
                ['db' => 'nombre_programa', 'dt' => 4],
                ['db' => 'numero_version', 'dt' => 5],
                ['db' => "nombre_unidad", 'dt' => 6],
                ['db' => "denominacion_sede", 'dt' => 7],
                ['db' => 'fecha_inicio_programa', 'dt' => 8],
                ['db' => "to_char(fecha_registro_programa, 'YYYY-MM-DD')", 'alias' => 'fecha_registro_programa', 'dt' => 9],
                ['db' => 'fecha_fin_programa', 'dt' => 10],
                ['db' => 'matriculados', 'dt' => 11],
                ['db' => 'total', 'dt' => 12],
                ['db' => 'estado_programa', 'dt' => 13],
                ['db' => 'costo_colegiatura', 'dt' => 14],
                ['db' => 'costo_matricula', 'dt' => 15],
                ['db' => 'haber_basico_docente', 'dt' => 16],
                ['db' => 'haber_basico_coordinador', 'dt' => 17],
                ['db' => 'creditaje', 'dt' => 18],
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::super_complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    public function programa_imprimir()
    {
        if ($this->input->is_ajax_request()) {
            if (is_numeric($this->input->post('id_planificacion_programa')) && in_array($this->input->post('tipo'), ['modulos', 'matriculados', 'programas', 'formulario_marketing', 'lista_matriculados'])) {
                require_once APPPATH . '/controllers/Reportes/Reporte_programa.php';
                $programa = $this->db->get_where('vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array();
                if ($programa != null)
                    switch ($this->input->post('tipo')) {
                        case 'modulos':
                            $modulos = $this->programa_model->asignaciones_modulo_docente(['ppr.id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->result_array();
                            if (!empty($modulos)) {
                                $this->output->set_content_type('application/json')->set_output(json_encode(
                                    [
                                        'exito' => true,
                                        'pdf' => 'data:application/pdf;base64,' . base64_encode((new Reporte_programa())->listado_modulos_programa(array_merge($programa, ['modulos' => $modulos]))),
                                        'datos' => $programa
                                    ]
                                ));
                            } else
                                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa aun no cuenta con ningún Modulo']));

                            break;
                        case 'formulario_marketing':
                            if (empty($programa['sigla_programa'])) {
                                $this->sql_psg->modificar_tabla('planificacion_programa', ['sigla_programa' => sigla_programa($programa['descripcion_grado_academico'], $programa['nombre_programa'], $programa['nombre_tipo_programa'], $programa['numero_version'])], ['id_planificacion_programa' => $programa['id_planificacion_programa']]);
                                $programa = $this->db->get_where('vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array();
                            }
                            $this->output->set_content_type('application/json')->set_output(json_encode(
                                [
                                    'exito' => true,
                                    'pdf' => 'data:application/pdf;base64,' . base64_encode((new Reporte_programa())->formulario_marketing(array_merge(['programa' => $programa], ['usuario' => $this->usuario]))),
                                    'datos' => $programa
                                ]
                            ));
                            break;
                        case 'matriculados':
                            $matriculados = ($this->programa_model->matriculados_programa(['pp.id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array();
                            if (!empty($matriculados)) {
                                $this->output->set_content_type('application/json')->set_output(json_encode(
                                    [
                                        'exito' => true,
                                        'pdf' => 'data:application/pdf;base64,' . base64_encode((new Reporte_programa())->listado_estudiante_programa(array_merge($programa, ['matriculados' => $matriculados]))),
                                        'datos' => $programa
                                    ]
                                ));
                            } else
                                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa aun no cuenta con ningún posgraduante Matriculado']));
                            break;
                        case 'programas':
                            $programas = ($this->programa_model->reporte_listado_programa_modulos())->result_array();
                            if (!empty($programas)) {
                                $this->output->set_content_type('application/json')->set_output(json_encode(
                                    [
                                        'exito' => true,
                                        'pdf' => 'data:application/pdf;base64,' . base64_encode((new Reporte_programa())->listado_reporte_programas($programas)),
                                        'datos' => $programa
                                    ]
                                ));
                            } else
                                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'ERROR']));
                            break;
                        case 'lista_matriculados':
                            $lista_matriculados = ($this->programa_model->reporte_listado_matriculados())->result_array();
                            // return var_dump($lista_matriculados);
                            if (!empty($lista_matriculados)) {
                                $this->output->set_content_type('application/json')->set_output(json_encode(
                                    [
                                        'exito' => true,
                                        'pdf' => 'data:application/pdf;base64,' . base64_encode((new Reporte_programa())->listado_reporte_lista_matriculados($lista_matriculados)),
                                        'datos' => $lista_matriculados
                                    ]
                                ));
                            } else
                                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'ERROR']));
                            break;
                    }
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa solicitado no esta disponible']));
            } else
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se encontro el elemento solicitado, por favor intente más tarde']));
        }
    }
    public function programa_matriculados_listar()
    {
        if ($this->input->is_ajax_request()) {
            $matriculados = [];
            foreach (($this->programa_model->matriculados_programa(['pp.id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array() as $key => $value) {
                $gestion_matriculados = ($this->programa_model->gestion_matriculados_programa(['id_persona' => $value['id_persona'], 'id_planificacion_programa' => $this->input->post('id_planificacion_programa')]))->result_array();

                $gestiones = [];
                foreach ($gestion_matriculados as $i => $va) {
                    $gestiones[] = $va['gestion'];
                }
                $gestiones = array_count_values($gestiones);

                foreach ($gestion_matriculados as $k => $val) {
                    if ($gestiones[$val['gestion']] > 1)
                        $gestion_matriculados[$k]['duplicado'] = true;
                    else $gestion_matriculados[$k]['duplicado'] = false;
                }
                $matriculados[] = array_merge($value, ['matriculas' => $gestion_matriculados]);
            }
            if (!empty($matriculados)) {
                $this->data['matriculados'] = $matriculados;
                $this->output->set_content_type('application/json')->set_output(json_encode(
                    [
                        'exito' => true,
                        'vista' => ($this->templater->view_horizontal_admin('programa/programa_matriculados_listar', $this->data))->final_output,
                        'datos' => $this->db->get_where('psg_vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array()
                    ]
                ));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El Programa aun no cuenta con ningún posgraduante Matriculado']));
            }
        }
    }
    /**
     * Funcion: Retorna una vista HTML listando todos los respalos de una programa
     * Quien lo LLama: Una llamada AJAX
     * Retorna: HTML
     */
    public function programa_programa_respaldos_listar()
    {
        // var_dump($_REQUEST);
        if ($this->input->is_ajax_request()) {
            if ($this->input->post('id_planificacion_programa') !== null) {
                $this->data['multimedias_persona'] = $this->programa_model->listar_archivo_inscripcion(
                    ['id_planificacion_programa' => $this->input->post('id_planificacion_programa'), 'estado_archivo <>' => 'ELIMINADO', 'etiqueta' => $this->input->post('etiqueta')]
                )->result_array();
                // var_dump($this->data['multimedias_persona']);
                // var_dump($this->db->last_query());
            } else if ($this->input->cookie('ids_multimedia', TRUE) !== null) {
                $multimedias_persona = [];
                foreach (explode(',', $this->input->cookie('ids_multimedia', TRUE)) as $key => $value) {
                    if (is_numeric($value)) {
                        $multimedia = ($this->db->get_where('multimedia', ['id_multimedia' => $value, 'estado_archivo <>' => 'ELIMINADO', 'etiqueta' => $this->input->post('etiqueta')]))->row_array();
                        if ($multimedia !== null)
                            $multimedias_persona[] = $multimedia;
                    }
                }
                $this->data['multimedias_persona'] = $multimedias_persona;
            } else
                $this->data['multimedias_persona'] = [];
            // $this->output->set_content_type('application/json')->set_output(json_encode(
            //     ['exito' => true,    'vista' => ($this->templater->view_horizontal_admin('persona/seleccionar_archivo', array_merge($this->data, ['elemento' => 1])))->final_output,]
            // ));
            $this->templater->view_horizontal_admin('persona/seleccionar_archivo', array_merge($this->data, ['elemento' => 1]));
        }
    }

    public function multimedia_planificacion_programa_insertar($id_planificacion_programa, $id_multimedia = null)
    {
        if ($id_multimedia !== null) {
            if (is_numeric($id_multimedia)) {
                $this->db->insert('multimedia_planificacion_programa', [
                    'id_multimedia' => $id_multimedia,
                    'id_planificacion_programa' => $id_planificacion_programa,
                    'id_usuario' => $this->usuario['id_persona'],
                    'estado_multimedia_planificacion_programa' => 'REGISTRADO'
                ]);
            }
        } else if ($this->input->cookie('ids_multimedia', TRUE) !== null) {
            foreach (explode(',', $this->input->cookie('ids_multimedia', TRUE)) as $key => $value) {
                if (is_numeric($value)) {
                    $this->db->insert('multimedia_planificacion_programa', [
                        'id_multimedia' => $value,
                        'id_planificacion_programa' => $id_planificacion_programa,
                        'id_usuario' => $this->usuario['id_persona'],
                        'estado_multimedia_planificacion_programa' => 'REGISTRADO'
                    ]);
                }
            }
        }
        delete_cookie('ids_multimedia');
    }

    public function multimedia_insertar()
    {
        if ($this->input->is_ajax_request()) {
            $config['upload_path'] = 'img/pdf_programa/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240‬';
            $config['file_name'] = "{$this->input->get('etiqueta')}_" . time() . "_" . date("Y-m-d H-i-s");
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('archivo')) {
                $id_multimedia = $this->sql_psg->insertar_tabla('multimedia', array(
                    'nombre_archivo' =>  $this->upload->data('file_name'),
                    'extension_archivo' => $this->upload->data('file_ext'),
                    'id_usuario' => $this->usuario['id_persona'],
                    'tamano_archivo' => str_replace(',', '.', $this->upload->data('file_size')),
                    'ruta_archivo' => $config['upload_path'] . $this->upload->data('file_name'),
                    'etiqueta' => $this->input->get('etiqueta')
                ));

                if (is_numeric($id_multimedia)) {
                    $ids_multimedia = [];
                    // return var_dump($this->input->cookie('ids_multimedia', TRUE));
                    foreach (explode(',', $this->input->cookie('ids_multimedia', TRUE)) as $key => $value) {
                        if (!empty($value)) $ids_multimedia[] = $value;
                    }
                    $ids_multimedia[] = $id_multimedia;
                    // return var_dump($id_multimedia);
                    $this->input->set_cookie('ids_multimedia', (count($ids_multimedia) == 1) ? implode('', $ids_multimedia) : implode(',', $ids_multimedia), '0');
                    if ($this->input->get('id_planificacion_programa') !== null) {
                        // var_dump($_REQUEST);
                        // return var_dump($id_multimedia);
                        $this->multimedia_planificacion_programa_insertar($this->input->get('id_planificacion_programa'), $id_multimedia);
                        // var_dump($_REQUEST);
                    }
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'El archivo se subio correctamente, se guardo con el nombre ' . $config['file_name']]));
                } else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error']));
            } else {
                // $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $this->upload->display_errors()]));
            }
        }
    }

    public function multimedia_eliminar()
    {
        if ($this->input->is_ajax_request()) {
            if ($this->input->post('id_multimedia') !== null) {
                echo $this->input->post('id_multimedia');
            } else if ($this->input->cookie('ids_multimedia', TRUE) !== null) {
                foreach (explode(',', $this->input->cookie('ids_multimedia', TRUE)) as $key => $value) {
                    if (is_numeric($value))
                        $this->sql_psg->modificar_tabla('multimedia', ['estado_archivo' => 'ELIMINADO'], ['id_multimedia' => $value]);
                }
            }
        }
    }

    public function programa_programa_respaldos_insertar()
    {
        if ($this->input->is_ajax_request()) {
            $config['upload_path'] = 'img/pdf_programa/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240‬';
            $config['file_name'] = "{$this->input->get('id_planificacion_programa')}_{$this->input->get('etiqueta')}_" . time() . "_" . date("Y-m-d H-i-s");

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('archivo')) {
                $id_multimedia = $this->sql_psg->insertar_tabla('multimedia', array(
                    'nombre_archivo' =>  $this->upload->data('file_name'),
                    'extension_archivo' => $this->upload->data('file_ext'),
                    'id_usuario' => $this->input->cookie('id_persona'),
                    'tamano_archivo' => str_replace(',', '.', $this->upload->data('file_size')),
                    'ruta_archivo' => $config['upload_path'] . $this->upload->data('file_name'),
                    'etiqueta' => $this->input->get('etiqueta')
                ));
                is_numeric($id_multimedia) ? $id_multimedia_planificacion_programa = $this->sql_psg->insertar_tabla(
                    'multimedia_planificacion_programa',
                    array(
                        'id_multimedia' => $id_multimedia,
                        'id_planificacion_programa' => $this->input->get('id_planificacion_programa'),
                        'id_usuario' => $this->usuario['id_persona'],
                        'estado_multimedia_planificacion_programa' => 'REGISTRADO'
                    )
                ) : false;
                is_numeric($id_multimedia_planificacion_programa)
                    ? $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'El archivo se subio correctamete, se guardo con el nombre ' . $config['file_name']]))
                    : $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error']));
            } else {
                // $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $this->upload->display_errors()]));
            }
        }
    }
}
