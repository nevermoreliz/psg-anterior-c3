<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin_posgraduante extends PSG_Controller
{
    //  inicializar variable de Carpeta o ruta base de la vista del modulo
    var $ruta_carpeta_vista;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_marketing_model');
        $this->load->helper('form');
        $this->load->model('marketing_model');

        // inicializar ruta carpeta
        // $this->ruta_carpeta_vista = '/admin_marketing/';
    }

    /** BLOQUE CAMPOS PROGRAMAS POSGRADUANTES */
    public function campos_mis_programas()
    {
        // listar tas inscripciones en linea en cualquier estado
        if ($this->input->is_ajax_request()) {
            $this->data['listar_programas_inscritos'] = $this->admin_marketing_model->listar_incripciones_participante(['mp.img_principal' => 1, 'pe.id_persona' => $this->usuario['id_persona']])->result();
            // var_dump($this->data['listar_programas_inscritos']);
            // exit();
            // $this->session->set_flashdata($usuario['code'], $usuario['message']);
            $this->session->set_flashdata('holas mundo');

            $this->templater->view_horizontal_admin('admin_posgraduante/listar_programas_participantes', $this->data);
        }
    }



    /**
     * BLOQUE DE INSCRIPCION EN LINEA PARA USUARIOS ANTIGUOS
     */

    public function marketing_deposito_bancario_agregar()
    {

        // var_dump($this->input->cookie('id_publicacion'));

        // exit();
        $programa = $this->sql_psg->listar_tabla('publicacion', ['id_publicacion' => $this->input->cookie('id_publicacion')], '', 'row');
        // var_dump($programa);
        // exit();
        // var_dump($this->input->is_ajax_request() && is_object($programa));
        // exit();

        if ($this->input->is_ajax_request() && is_object($programa)) {
            $persona_inscrita = $this->marketing_model->persona_inscrita(
                ['ins.id_planificacion_programa' => $programa->id_planificacion_programa, 'p.id_persona' => get_cookie('id_persona')]
            );

            $this->data['publicacion_detalle'] = $this->marketing_model->listar_publicacion(['pub.id_publicacion' => get_cookie('id_publicacion')])[0];

            $this->load->helper('form');
            // agregado por jhonatan
            $this->data['nombre_completo_usuario'] = $this->usuario['nombre_completo'];
            if (empty($persona_inscrita)) {
                $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'agregar', 'vista' => $this->templater->view_horizontal_admin('/admin_posgraduante/deposito_bancario', $this->data)]));
            } else {
                if ($persona_inscrita->estado_inscripcion === 'REGISTRADO' || $persona_inscrita->estado_inscripcion === 'OBSERVADO') {
                    $this->data['id_inscripcion'] = $persona_inscrita->id_inscripcion;
                    $archivos_inscripcion = [];
                    foreach (['CI_ANVERSO', 'CI_REVERSO', 'DEPOSITO_CUOTA_INICIAL', 'DEPOSITO_MATRICULA', 'DIPLOMA'] as $key => $value) {
                        $archivo = $this->marketing_model->listar_archivo_inscripcion(['i.id_inscripcion' => $persona_inscrita->id_inscripcion, 'm.etiqueta' => $value], ['m.estado_archivo', ['ELIMINADO']], 'row');
                        $archivos_inscripcion[$value] = empty($archivo) ? null : $archivo;
                    }
                    $persona_inscrita = array_merge($archivos_inscripcion, (array)$persona_inscrita);
                    $this->output->set_content_type('application/json')->set_output(json_encode(
                        [
                            'exito' => 'editar',
                            'mensaje' => ((array)$persona_inscrita['estado_inscripcion'] == 'REGISTRADO') ? ' Usted ya se inscribió anteriormente pero aún puede modificar los campos' : 'Usted fue observado por favor revise los datos que envio',
                            'vista' => $this->templater->view_horizontal_admin('admin_posgraduante/deposito_bancario', $this->data),
                            'datos' => $persona_inscrita,

                        ]
                    ));
                } else if ($persona_inscrita->estado_inscripcion === 'REVISADO') {
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Su inscripción esta en proceso de REVISIÓN, no puede modificar los campos']));
                } else if ($persona_inscrita->estado_inscripcion === 'CONFIRMADO') {
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Su inscripción esta CONFIRMADO, no puede modificar los campos']));
                }
            }
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se encontro el programa solicitado, por favor intente más tarde']));
            // delete_cookie('id_publicacion');
        }
    }

    public function marketing_deposito_bancario_actualizar()
    {
        // var_dump(empty($_FILES['img_dep_matricula']['name']));
        // var_dump($_FILES['img_dep_matricula']['name']);
        // exit();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('img_dep_matricula', 'img_dep_matricula', (empty($_FILES['img_dep_matricula']['name'])) ? '' : 'callback_file_check[img_dep_matricula, Fotografía o imagen del Depósito de matricula ,jpg jpeg png JPG JPEG PNG]');
        $this->form_validation->set_rules('nro_deposito_matricula', 'nro_deposito_matricula', 'required|max_length[20]');
        $this->form_validation->set_rules('fecha_deposito_matricula', 'fecha_deposito_matricula', 'required|callback_date_valid[f_deposito]');

        if (!empty($_FILES['img_dep_cuota_ini']['name']) || !empty($this->input->post('nro_deposito_cuota_ini')) || !empty($this->input->post('fecha_deposito_cuota_ini'))) {

            $this->form_validation->set_rules('img_dep_cuota_ini', 'img_dep_cuota_ini', (empty($_FILES['img_dep_matricula']['name'])) ? '' : 'callback_file_check[img_dep_cuota_ini, Fotografía o imagen del Depósito de cuota inicial ,jpg jpeg png JPG JPEG PNG]');

            $this->form_validation->set_rules('nro_deposito_cuota_ini', 'nro_deposito_cuota_ini', 'required|max_length[20]');

            $this->form_validation->set_rules('fecha_deposito_cuota_ini', 'fecha_deposito_cuota_ini', 'required|callback_date_valid[f_deposito]');
        }
        $inscrito = $this->sql_psg->listar_tabla('inscripcion', ['id_inscripcion' => $this->input->post('id_inscripcion')], '', 'row');
        if ($this->form_validation->run() == false) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
        } else {
            $correcto = $this->sql_psg->modificar_tabla('inscripcion', [
                'numero_deposito_matricula' => $this->input->post('nro_deposito_matricula'),
                'fecha_deposito_matricula' => $this->input->post('fecha_deposito_matricula'),
                'numero_deposito_cuota_inicial' => empty($this->input->post('nro_deposito_cuota_ini')) ? null : $this->input->post('nro_deposito_cuota_ini'),
                'fecha_deposito_inicial' => empty($this->input->post('fecha_deposito_cuota_ini')) ? null : $this->input->post('fecha_deposito_cuota_ini'),
                'id_usuario' =>  $this->input->cookie('id_persona'),
                'estado_inscripcion' => 'REGISTRADO'
            ], ['id_inscripcion' => $inscrito->id_inscripcion]);
            if ($correcto === true) {
                $archivos_inscripcion = [];
                foreach (['DEPOSITO_CUOTA_INICIAL', 'DEPOSITO_MATRICULA'] as $key => $value) {
                    $archivo = $this->marketing_model->listar_archivo_inscripcion(['i.id_inscripcion' => $inscrito->id_inscripcion, 'm.etiqueta' => $value], ['m.estado_archivo', ['ELIMINADO']], 'row');
                    $archivos_inscripcion[$value] = empty($archivo) ? null : $archivo;
                }

                $ruta = 'img/inscripciones';

                if ($_FILES['img_dep_matricula']['name']) {
                    $deposito_matricula = $this->subir_archivos_multipes(
                        $ruta,
                        [
                            'allowed_types' => 'jpg|jpeg|png|JPG|JPEG|PNG',
                            'max_size' => '10240',
                            'file_name' => $this->input->cookie('id_persona') . '_' . $inscrito->id_planificacion_programa . '_deposito_matricula_' . date('Ymd_His')
                        ],
                        'img_dep_matricula',
                        $_FILES['img_dep_matricula']
                    );
                    if (is_array($deposito_matricula)) {
                        $id_multi_deposito_matricula = $this->sql_psg->insertar_tabla(
                            'multimedia',
                            [
                                'nombre_archivo' => $deposito_matricula[0]['file_name'],
                                'extension_archivo' => $deposito_matricula[0]['file_ext'],
                                'fecha_registro' => date('Y-m-d'),
                                'id_usuario' => $this->input->cookie('id_persona'),
                                'tamano_archivo' =>  str_replace(',', '.', $deposito_matricula[0]['file_size']),
                                'estado_archivo' => 'REGISTRADO',
                                'ruta_archivo' => $ruta . '/' . $deposito_matricula[0]['file_name'],
                                'etiqueta' => 'DEPOSITO_MATRICULA'
                            ]
                        );
                        $this->sql_psg->insertar_tabla(
                            'multimedia_pago_programa',
                            [
                                'id_multimedia' => $id_multi_deposito_matricula,
                                'id_inscripcion' => $inscrito->id_inscripcion,
                                'estado_multimedia_pago_programa' => 'REGISTRADO',
                            ]
                        );
                        $this->sql_psg->modificar_tabla('multimedia_pago_programa', ['estado_multimedia_pago_programa' => 'ELIMINADO'], ['id_multimedia_pago_programa' => $archivos_inscripcion['DEPOSITO_MATRICULA']->id_multimedia_pago_programa]);
                        $this->sql_psg->modificar_tabla('multimedia', ['estado_archivo' => 'ELIMINADO'], ['id_multimedia' => $archivos_inscripcion['DEPOSITO_MATRICULA']->id_multimedia]);
                    } else {
                        return $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => $deposito_matricula)));
                    }
                }
                if ($_FILES['img_dep_cuota_ini']['name']) {

                    $deposito_primera_cuota = $this->subir_archivos_multipes(
                        $ruta,
                        [
                            'allowed_types' => 'jpg|jpeg|png|JPG|JPEG|PNG',
                            'max_size' => '10240',
                            'file_name' => $this->input->cookie('id_persona') . '_' . $inscrito->id_planificacion_programa . '_deposito_couta_inicial_' . date('Ymd_His')
                        ],
                        'img_dep_cuota_ini',
                        $_FILES['img_dep_cuota_ini']
                    );

                    if (is_array($deposito_primera_cuota)) {

                        $id_multi_deposito_cuota_inicial =  $this->sql_psg->insertar_tabla('multimedia', [
                            'nombre_archivo' => $deposito_primera_cuota[0]['file_name'],
                            'extension_archivo' => $deposito_primera_cuota[0]['file_ext'],
                            'fecha_registro' => date('Y-m-d'),
                            'id_usuario' => $this->input->cookie('id_persona'),
                            'tamano_archivo' =>  str_replace(',', '.', $deposito_primera_cuota[0]['file_size']),
                            'etiqueta' => 'DEPOSITO_CUOTA_INICIAL',
                            'ruta_archivo' => $ruta . '/' . $deposito_primera_cuota[0]['file_name'],
                            'estado_archivo' => 'REGISTRADO'
                        ]);
                        $this->sql_psg->insertar_tabla('multimedia_pago_programa', [
                            'id_multimedia' => $id_multi_deposito_cuota_inicial,
                            'id_inscripcion' => $inscrito->id_inscripcion,
                            'estado_multimedia_pago_programa' => 'REGISTRADO',
                        ]);

                        if ($archivos_inscripcion['DEPOSITO_CUOTA_INICIAL'] != '') {
                            $this->sql_psg->modificar_tabla(
                                'multimedia_pago_programa',
                                ['estado_multimedia_pago_programa' => 'ELIMINADO'],
                                ['id_multimedia_pago_programa' => $archivos_inscripcion['DEPOSITO_CUOTA_INICIAL']->id_multimedia_pago_programa]
                            );


                            $this->sql_psg->modificar_tabla('multimedia', ['estado_archivo' => 'ELIMINADO'], ['id_multimedia' => $archivos_inscripcion['DEPOSITO_CUOTA_INICIAL']->id_multimedia]);
                        }
                    } else {
                        return $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $deposito_primera_cuota]));
                    }
                }
            } else {
                return $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'No se actualizo la inscripción, por favor intente más tarde')));
            }


            $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => 'Se actualizo su inscripción correctamente')));
            delete_cookie('id_publicacion');
        }
    }

    public function marketing_deposito_bancario_insertar()
    {
        $programa = $this->sql_psg->listar_tabla('publicacion', ['id_publicacion' => $this->input->cookie('id_publicacion')], '', 'row');
        $persona_inscrita = $this->marketing_model->persona_inscrita(['ins.id_planificacion_programa' => $programa->id_planificacion_programa, 'p.id_persona' => get_cookie('id_persona')]);
        if (empty($persona_inscrita)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('img_dep_matricula', 'img_dep_matricula', 'callback_file_check[img_dep_matricula, imagen deposito matricula ,jpg jpeg png gif JPG JPEG PNG GIF]');
            $this->form_validation->set_rules('nro_deposito_matricula', 'numero deposito matricula', 'required|numeric|is_natural_no_zero|max_length[40]|min_length[1]');
            $this->form_validation->set_rules('fecha_deposito_matricula', 'fecha deposito matricula', 'required|callback_date_valid');

            if (!empty($this->input->post('img_dep_cuota_ini')) || !empty($this->input->post('nro_deposito_cuota_ini')) || !empty($this->input->post('fecha_deposito_cuota_ini'))) {
                $this->form_validation->set_rules('img_dep_cuota_ini', 'img_dep_cuota_ini', 'callback_file_check[img_dep_cuota_ini, imagen deposito cuota inicial,jpg jpeg png gif JPG JPEG PNG GIF]');
                $this->form_validation->set_rules('nro_deposito_cuota_ini', 'numero deposito cuota inicial', 'required|numeric|is_natural_no_zero|max_length[40]|min_length[1]');
                $this->form_validation->set_rules('fecha_deposito_cuota_ini', 'fecha deposito cuota inicial', 'required|callback_date_valid');
            }


            if ($this->form_validation->run() == false) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $programa = $this->sql_psg->listar_tabla('publicacion', ['id_publicacion' => $this->input->cookie('id_publicacion')], '', 'row');

                $id_inscripcion = $this->sql_psg->insertar_tabla('inscripcion', [
                    'id_persona' => $this->input->cookie('id_persona'),
                    'id_planificacion_programa' => $programa->id_planificacion_programa,
                    'fecha_inscripcion' => date("Y-m-d H:i:s"),
                    'numero_deposito_matricula' => $this->input->post('nro_deposito_matricula'),
                    'fecha_deposito_matricula' => $this->input->post('fecha_deposito_matricula'),
                    'numero_deposito_cuota_inicial' => empty($this->input->post('nro_deposito_cuota_ini')) ? null : $this->input->post('nro_deposito_cuota_ini'),
                    'fecha_deposito_inicial' => empty($this->input->post('fecha_deposito_cuota_ini')) ? null : $this->input->post('fecha_deposito_cuota_ini'),
                    'id_usuario' =>  $this->input->cookie('id_persona'),
                    'estado_inscripcion' => 'REGISTRADO'
                ]);
                // insertar deposito bancario matricula
                $ruta = 'img/inscripciones';
                $deposito_matricula = $this->subir_archivos_multipes(
                    $ruta,
                    array(
                        'allowed_types' => 'jpg|jpeg|png|JPG|JPEG|PNG',
                        'max_size' => '10240',
                        'file_name' => $this->input->cookie('id_persona') . '_' . $programa->id_planificacion_programa . '_deposito_matricula_' . date('Ymd_His')
                    ),
                    'img_dep_matricula',
                    $_FILES['img_dep_matricula']
                );

                $id_multi_deposito_matricula = $this->sql_psg->insertar_tabla(
                    'multimedia',
                    [
                        'nombre_archivo' => $deposito_matricula[0]['file_name'],
                        'extension_archivo' => $deposito_matricula[0]['file_ext'],
                        'fecha_registro' => date('Y-m-d'),
                        'id_usuario' => $this->input->cookie('id_persona'),
                        'tamano_archivo' =>  str_replace(',', '.', $deposito_matricula[0]['file_size']),
                        'estado_archivo' => 'REGISTRADO',
                        'ruta_archivo' => $ruta . '/' . $deposito_matricula[0]['file_name'],
                        'etiqueta' => 'DEPOSITO_MATRICULA'
                    ]
                );
                $this->sql_psg->insertar_tabla(
                    'multimedia_pago_programa',
                    [
                        'id_multimedia' => $id_multi_deposito_matricula,
                        'id_inscripcion' => $id_inscripcion,
                        'estado_multimedia_pago_programa' => 'REGISTRADO',
                    ]
                );

                if ($_FILES['img_dep_cuota_ini']['name'] != "") {
                    $deposito_primera_cuota = $this->subir_archivos_multipes(
                        $ruta,
                        [
                            'allowed_types' => 'jpg|jpeg|png|JPG|JPEG|PNG',
                            'max_size' => '10240',
                            'file_name' => $this->input->cookie('id_persona') . '_' . $programa->id_planificacion_programa . '_deposito_couta_inicial_' . date('Ymd_His')
                        ],
                        'img_dep_cuota_ini',
                        $_FILES['img_dep_cuota_ini']
                    );

                    $id_multi_deposito_cuota_inicial =  $this->sql_psg->insertar_tabla('multimedia', [
                        'nombre_archivo' => $deposito_primera_cuota[0]['file_name'],
                        'extension_archivo' => $deposito_primera_cuota[0]['file_ext'],
                        'fecha_registro' => date('Y-m-d'),
                        'id_usuario' => $this->input->cookie('id_persona'),
                        'tamano_archivo' =>  str_replace(',', '.', $deposito_primera_cuota[0]['file_size']),
                        'estado_archivo' => 'REGISTRADO',
                        'ruta_archivo' => $ruta . '/' . $deposito_primera_cuota[0]['file_name'],
                        'etiqueta' => 'DEPOSITO_CUOTA_INICIAL'
                    ]);
                    $this->sql_psg->insertar_tabla('multimedia_pago_programa', [
                        'id_multimedia' => $id_multi_deposito_cuota_inicial,
                        'id_inscripcion' => $id_inscripcion,
                        'estado_multimedia_pago_programa' => 'REGISTRADO',
                    ]);
                }

                $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => 'Su inscripción se realizó correctamente')));
                delete_cookie('id_publicacion');
            }
        } else
            $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Usted ya se inscribió anteriormente en el mismo programa')));
    }

    public function observaciones_participante()
    {

        // var_dump($_REQUEST);
        // exit();
        $observacion_programa_participante = $this->sql_psg->listar_tabla('inscripcion', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa'), 'id_persona' => $this->input->post('id_persona')], null, 'row');
        // var_dump($observacion_programa_participante);
        // exit();

        $this->output->set_content_type('application/json')
            ->set_output(json_encode(array(
                'exito' => 'se realizo la consulta',
                'datos' => $observacion_programa_participante,
                // 'error_detalle' => 'Error al actualizar el  registro(' . $estado_detalle_programa . ').'
            )));
    }
}
