<?php defined('BASEPATH') or exit('No direct script access allowed');
class Matriculacion extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->is_ajax();
        $this->load->model('matriculacion_model');
        $this->load->model('inscripcion_model');
        $this->load->model('marketing_model');
        $this->ruta_carpeta_vista = '/matriculacion/matriculacion_';
        require_once APPPATH . '/controllers/Reportes/Reporte_matriculacion.php';
        $this->reporte = new Reporte_matriculacion();
    }
    public function ajax_historial_matriculaciones()
    {
        $this->data['matriculas'] = $this->matriculacion_model->datos_matriculacion(['p.id_persona' => $this->input->post('id_persona'), 'pp.id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->result();
        $this->vista('historial', $this->data);
    }

    public function matriculacion_matricula_agregar()
    {
        $this->load->helper(array('form', 'url'));
        $programa = $this->sql_psg->listar_tabla('psg_vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], 'id_planificacion_programa desc', 'row');
        $this->data['programa'] = $programa;
        $posgraduante = $this->matriculacion_model->datos_posgraduante(['pe.id_persona' => $this->input->post('id_persona')])->row_array();
        $this->data['posgraduante'] = empty($posgraduante) ? ['id_persona' => $this->input->post('id_persona')] : $posgraduante;

        $nm = $this->matriculacion_model->matricula_correlativo();
        $this->data['gestiones'] = $this->anios_matricular($this->input->post('id_planificacion_programa'), $this->input->post('id_persona'), $programa);
        $this->data['matricula_correlativo'] = (($nm->numero_matricula == NULL) ? (intval(date('Y') * 100000) + 1) : (intval($nm->numero_matricula) + 1));


        $this->output->set_content_type('application/json')->set_output(json_encode(
            [
                'exito' => true, 'vista' => $this->templater->view_horizontal_admin('/matriculacion/matriculacion_matricula_agregar', $this->data),
                'programa' => $programa
            ]
        ));
    }

    function anios_matricular($id_planificacion_programa, $id_persona): array
    {
        $this->data['gestion_vigente'] = $this->matriculacion_model->gestion_vigente()->row_array();
        $programa = $this->sql_psg->listar_tabla('psg_vista_programas', ['id_planificacion_programa' => $id_planificacion_programa], 'id_planificacion_programa desc', 'row');
        $matriculacion = $this->matriculacion_model->datos_matriculacion(['pp.id_planificacion_programa' => $id_planificacion_programa, 'p.id_persona' => $id_persona])->result_array();
        $matriculas_gestion = $this->matriculacion_model->matriculas_gestion(['id_planificacion_programa' => $id_planificacion_programa, 'id_persona' => $id_persona])->result_array();
        $gestiones = array();
        $matriculados = array();
        if (!empty($matriculas_gestion[0]['gestion_creacion'])) {
            foreach ($matriculas_gestion as $matricula_gestion)
                $matriculados[] = $matricula_gestion['id_gestion'];

            for ($i = $this->data['gestion_vigente']['id_gestion']; $i >= $matriculas_gestion[0]['gestion_creacion']; $i--)
                $gestiones[] = $i;

            $gestiones = array_diff($gestiones, $matriculados);
        } else {
            for ($i = $this->data['gestion_vigente']['id_gestion']; $i >= $programa->id_gestion_programa; $i--)
                $gestiones[] = $i;

            $gestiones = array_diff($gestiones, $matriculados);
        }
        if (empty($matriculacion)) {
            $ru = $this->matriculacion_model->registro_universitario_correlativo($programa->id_grado_academico);
            $this->data['registro_universitario_correlativo'] = (($ru->registro_universitario == NULL) ? 14001 : ($ru->registro_universitario + 1));
        } else {
            $registro_universitario_correlativo = array();
            foreach ($matriculacion as $matricula) {
                if (!(in_array($matricula['registro_universitario'], $registro_universitario_correlativo)))
                    $registro_universitario_correlativo[] = $matricula['registro_universitario'];
            }
            $this->data['registro_universitario_correlativo'] = $registro_universitario_correlativo;
        }
        return $gestiones;
    }
    public function matriculacion_matricula_editar()
    {
        $this->load->helper(array('form', 'url'));
        $this->data['matricula'] = $this->matriculacion_model->datos_matricula(['mg.id_matricula_gestion' => $this->input->post('id_matricula_gestion')]);
        $this->data['id_persona'] = $this->input->post('id_persona');
        $this->data['id_planificacion_programa'] = $this->input->post('id_planificacion_programa');

        $this->output->set_content_type('application/json')->set_output(json_encode(
            [
                'exito' => true, 'vista' => $this->templater->view_horizontal_admin('/matriculacion/matriculacion_matricula_editar', $this->data),
                'programa' => $this->data['matricula']
            ]
        ));
    }

    public function matriculacion_inscripcion_actualizar()
    {
        if ($this->sql_psg->modificar_tabla('inscripcion', $this->input->post(), ['id_persona' => $this->input->post('id_persona'), 'id_planificacion_programa' => $this->input->post('id_planificacion_programa')])) {
            $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'Se cambio el estado de inscripción exitosamente']));
        } else
            $this->output->set_content_type('application/json')->set_output(json_encode(['error' => false]));
    }



    public function verifica_matriculas_restantes()
    {
        $id_pp = $this->input->post('id_planificacion_programa');
        $id_pe = $this->input->post('id_persona');
        $datos_posgraduante = $this->matriculacion_model->datos_posgraduante(['pe.id_persona' => $id_pe, 'pp.id_planificacion_programa' => $id_pp])->row_array();
        if (isset($datos_posgraduante['descripcion_grado_academico'])) {
            $matricula = cantidad_matriculas(
                $datos_posgraduante['descripcion_grado_academico'],
                $this->matriculacion_model->datos_matriculacion(['pe.id_persona' => $id_pe, 'pp.id_planificacion_programa' => $id_pp])->result_array(),
                $this->anios_matricular($id_pp, $id_pe)
            );
            if ($matricula == null) $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true]));
            else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $matricula]));
        } else $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true]));
    }

    public function matriculacion_matricula_insertar()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_planificacion_programa', 'id_planificacion_programa', 'required|numeric|max_length[5]');
        $this->form_validation->set_rules('id_persona', 'id_persona', 'required|numeric|is_natural_no_zero|max_length[5]');
        $this->form_validation->set_rules('id_gestion', 'id_gestion', 'required|numeric|is_natural_no_zero|max_length[2]');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('numero_matricula', 'Numero Matricula', 'required|numeric');
        $this->form_validation->set_rules('numero_serie', 'Numero Serie', 'required|numeric|max_length[10]');
        $this->form_validation->set_rules('registro_universitario', 'Registro Universitario', 'required|numeric');
        $this->form_validation->set_rules('monto_deposito', 'Monto Depositado', 'required|numeric|max_length[5]|is_natural_no_zero');
        $this->form_validation->set_rules('numero_deposito', 'Nro. Comprobante Bancario', 'required|numeric|max_length[20]');
        $this->form_validation->set_rules('fecha_deposito', 'Fecha Depósito', 'required|callback_date_valid');
        if ($this->form_validation->run() == FALSE) $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
        else {
            $id_pp = $this->input->post('id_planificacion_programa');
            $id_pe = $this->input->post('id_persona');
            $programa = $this->sql_psg->listar_tabla('planificacion_programa', ['id_planificacion_programa' => $id_pp], null, 'row')->id_gestion;
            $cm = 0;
            foreach ($this->matriculacion_model->datos_matriculacion(['pe.id_persona' => $id_pe, 'pp.id_planificacion_programa' => $id_pp])->result_array() as $key => $value) {
                if ($this->input->post('id_gestion') == $value['id_gestion']) $cm++;
            }
            if ($this->verifica_matriculas_restantes() == null && $cm == 0 && intval($this->input->post('id_gestion')) >= $programa) {
                $nm = $this->matriculacion_model->matricula_correlativo();
                $posgraduante = $this->db->get_where('academico.psg_posgraduante', ['id_persona' => $id_pe, 'codigo_archivo' => $this->input->post('registro_universitario')]);
                if ($posgraduante->num_rows() === 0) {
                    $posgraduante = $this->db->get_where('academico.psg_posgraduante', array('id_persona' => $id_pe));
                    if ($posgraduante->num_rows() === 1) {
                        $this->db->update('academico.psg_posgraduante', array('codigo_archivo' => $this->input->post('registro_universitario')), array('id_persona' => $id_pe));
                    } else {
                        $this->db->insert('academico.psg_posgraduante', array('id_persona' => $id_pe, 'codigo_archivo' => $this->input->post('registro_universitario')));
                    }
                }

                if ($this->db->insert('academico.psg_matricula_gestion',  [
                    'id_planificacion_programa' => $id_pp,
                    'id_persona' => $id_pe,
                    'id_gestion' => $this->input->post('id_gestion'),
                    'numero_matricula' => intval($nm->numero_matricula) + 1,
                    'registro_universitario' => $this->input->post('registro_universitario'),
                    'fecha_matriculacion' => date('Y-m-d H:i:s'),
                    'numero_serie' => $this->input->post('numero_serie'),
                    'anio_ingreso' => $this->input->post('anio_ingreso'),
                    'categoria' => $this->input->post('categoria'),
                    'id_usuario' => $this->data['usuario']['id_persona'],
                    'estado_matricula' => 'REGISTRADO'
                ])) {
                    if ($this->db->insert('financiero.psg_pago_programa', [
                        'id_persona' => $this->input->post('id_persona'),
                        'id_tipo_pago' => $this->input->post('id_tipo_pago'),
                        'id_planificacion_programa' => $id_pp,
                        'numero_deposito' => $this->input->post('numero_deposito'),
                        'monto_deposito' => $this->input->post('monto_deposito'),
                        'fecha_deposito' => $this->input->post('fecha_deposito'),
                        'fecha_registro' => date('Y-m-d H:i:s'),
                        'estado_pago_programa' => 'REGISTRADO',
                    ])) {
                        $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'Se realizo la matriculación con éxito']));
                    } else {
                        $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $this->db->error()]));
                    }
                } else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $this->db->error()]));
            } else
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se pueden agregar mas Matriculas']));
            // else {
            //     $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se pueden agregar mas Matriculas']));
            // }
        }
    }

    public function matriculacion_imprimir_matricula()
    {
        if (is_numeric($this->input->post('id_matricula_gestion'))) {
            $datos_matricula = $this->matriculacion_model->datos_matricula(['id_matricula_gestion' => $this->input->post('id_matricula_gestion')]);
            $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'data:application/pdf;base64,' . base64_encode($this->reporte->matricula_pdf($datos_matricula)), 'datos' => $datos_matricula]));
        } else
            $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Intente nuevamente mas tarde']));
    }


    public function matriculacion_matricula_actualizar()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('numero_serie', 'Numero Serie', 'required|numeric|max_length[20]');
        $this->form_validation->set_rules('monto_deposito', 'Monto Depositado', 'required|numeric|max_length[5]|is_natural_no_zero');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('numero_deposito', 'Nro. Comprobante Bancario', 'required|numeric|max_length[20]');
        $this->form_validation->set_rules('fecha_deposito', 'Fecha Depósito', 'required|callback_date_valid');
        $this->form_validation->set_rules('fecha_matriculacion', 'Fecha Matriculacion', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
        } else {
            $datos_matricula = array(
                'numero_serie' => $this->input->post('numero_serie'),
                'fecha_matriculacion' => $this->input->post('fecha_matriculacion'),
                'categoria' => $this->input->post('categoria')
            );
            $datos_pago = array(
                'numero_deposito' => $this->input->post('numero_deposito'),
                'monto_deposito' => $this->input->post('monto_deposito'),
                'fecha_deposito' => $this->input->post('fecha_deposito'),
            );

            if ($correcto = ($this->sql_psg->modificar_tabla('matricula_gestion', $datos_matricula, ['id_matricula_gestion' => $this->input->post('id_matricula_gestion')]) && $this->sql_psg->modificar_tabla('pago_programa', $datos_pago, ['id_pago_programa' => $this->input->post('id_pago_programa')]))) {
                $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => 'La Matricula se actualizo con exito']));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al actualizar la Matricula']));
            }
        }
    }

    public function matriculacion_listar()
    {
        $this->data['gestion'] = $this->sql_psg->listar_tabla('gestion', null, 'id_gestion desc');
        $this->data['grado_academico'] = $this->sql_psg->listar_tabla('grado_academico', ['estado_grado' => 'REGISTRADO'], null);
        $this->data['tipo_programa'] = $this->sql_psg->listar_tabla('tipo_programa', ['estado_tipo_programa' => 'REGISTRADO'], null);
        $this->data['version'] = $this->sql_psg->version();
        $this->vista('listar', $this->data);
    }

    public function ajax_listar_posgraduantes()
    {
        $gestion = ($this->input->post('gestion') != "[TODOS]") ? $this->input->post('gestion') : '';
        $grado_academico = ($this->input->post('grado_academico') != "[TODOS]") ? $this->input->post('grado_academico') : '';
        $tipo_programa = ($this->input->post('tipo_programa') != "[TODOS]") ? $this->input->post('tipo_programa') : '';
        $numero_version = ($this->input->post('numero_version') != "[TODOS]") ? $this->input->post('numero_version') : '';
        $texto = strtoupper($this->input->post('texto'));
        $limite = $this->input->post('limit');
        $inicio = $this->input->post('start');
        $posgraduantes =  $this->matriculacion_model->buscar(trim($gestion) . ' ' . trim($grado_academico) . ' ' . trim($tipo_programa) . ' ' . trim($numero_version) . ' ' . trim($texto), $limite, $inicio);
        $inscritos =  $this->matriculacion_model->buscar_inscritos(trim($gestion) . ' ' . trim($grado_academico) . ' ' . trim($tipo_programa) . ' ' . trim($numero_version) . ' ' . trim($texto), $limite, $inicio);

        $this->generar_tarjeta(array_merge($inscritos, $posgraduantes));
    }

    public function buscar_tarjeta()
    {
        if ($this->input->is_ajax_request()) {
            $this->generar_tarjeta([0 => ['id_persona' => $this->input->post('id_persona'), 'id_planificacion_programa' => $this->input->post('id_planificacion_programa')]]);
        }
    }

    // FIXME: Imprimir Formularios
    public function matriculacion_imprimir()
    {
        // var_dump($this->input->post('id_planificacion_programa'));
        // var_dump($this->input->post('id_persona'));
        // var_dump($this->input->post('tipo'));
        // exit;

        if (is_numeric($this->input->post('id_persona')) && is_numeric($this->input->post('id_planificacion_programa'))) {
            $datos_inscripcion = $this->matriculacion_model->datos_inscrito(['pe.id_persona' => $this->input->post('id_persona'), 'pr.id_planificacion_programa' => $this->input->post('id_planificacion_programa')])->row_array();
            if ($datos_inscripcion != null)
                switch ($this->input->post('tipo')) {
                    case 'carta_compromiso':
                        $this->output->set_content_type('application/json')->set_output(json_encode(
                            ['exito' => 'data:application/pdf;base64,' . base64_encode($this->reporte->imprimir_carta_compromiso($datos_inscripcion))]
                        ));
                        break;
                    case 'formulario_inscripcion':
                        $this->output->set_content_type('application/json')->set_output(json_encode(
                            ['exito' => 'data:application/pdf;base64,' . base64_encode($this->reporte->formulario_inscripcion($datos_inscripcion))]
                        ));
                        break;
                    case 'formulario_01':
                        $this->output->set_content_type('application/json')->set_output(json_encode(
                            ['exito' => 'data:application/pdf;base64,' . base64_encode($this->reporte->formulario_01(
                                array_merge(
                                    $datos_inscripcion,
                                    ['pregrado' => $this->matriculacion_model->formacion_academica(['gap.id_persona' => $this->input->post('id_persona'), 'gap.id_grado_academico' => 6])->result_array()],
                                    ['postgrado' => $this->matriculacion_model->formacion_academica(['gap.id_persona' => $this->input->post('id_persona'), 'gap.id_grado_academico !=' => 6])->result_array()],
                                    ['idioma' => []]
                                )
                            ))]
                        ));
                        break;
                    case 'solicitud_inscripcion':
                        $this->output->set_content_type('application/json')->set_output(json_encode(
                            ['exito' => 'data:application/pdf;base64,' . base64_encode($this->reporte->imprimir_solicitud_inscripcion($datos_inscripcion))]
                        ));
                        break;
                }
            else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El posgraduante no se registro por via WEB']));
        } else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se encontro el programa solicitado, por favor intente más tarde']));
    }

    public function inscripcion_buscar_programa_inscritos()
    {
        // return print_r($_REQUEST);
        $gestion = ($this->input->post('gestion') != "[TODOS]") ? $this->input->post('gestion') : '';
        $grado_academico = ($this->input->post('grado_academico') != "[TODOS]") ? $this->input->post('grado_academico') : '';
        $tipo_programa = ($this->input->post('tipo_programa') != "[TODOS]") ? $this->input->post('tipo_programa') : '';
        $numero_version = ($this->input->post('numero_version') != "[TODOS]") ? $this->input->post('numero_version') : '';
        // agragado por jhonatan
        $estado_inscripcion = ($this->input->post('estado_inscripcion') != "[TODOS]") ? "and i.estado_inscripcion = '" . $this->input->post('estado_inscripcion') . "'" : '';

        $texto = strtoupper($this->input->post('texto'));
        $id_planificacion_programa = strtoupper($this->input->post('id_planificacion_programa'));
        // return var_dump($estado_inscripcion);
        $inscritos =  $this->inscripcion_model->buscar_inscritos(trim($gestion) . ' ' . trim($grado_academico) . ' ' . trim($tipo_programa) . ' ' . trim($numero_version) . ' ' . trim($texto), $id_planificacion_programa, $estado_inscripcion);
        $this->generar_tarjeta(array_merge($inscritos, []));
    }

    public function inscripcion_listar_programa_inscritos()
    {
        $this->data['gestion'] = $this->sql_psg->listar_tabla('gestion', null, 'id_gestion desc');
        $this->data['grado_academico'] = $this->sql_psg->listar_tabla('grado_academico', ['estado_grado' => 'REGISTRADO'], null);
        $this->data['tipo_programa'] = $this->sql_psg->listar_tabla('tipo_programa', ['estado_tipo_programa' => 'REGISTRADO'], null);
        $this->data['version'] = $this->sql_psg->version();
        $this->data['id_planificacion_programa'] = $this->input->post('id_planificacion_programa');
        $this->templater->view_horizontal_admin('coordinador/listar_inscritos_programa', $this->data);
    }

    public function generar_tarjeta($array)
    {
        $array_resultado = [];
        foreach ($array as $key => $value) {
            if ($this->es_posgraduante($value['id_persona'], $value['id_planificacion_programa'])) {
                $array_resultado[] = array_merge(
                    $this->matriculacion_model->datos_posgraduante(['pe.id_persona' => $value['id_persona'], 'pp.id_planificacion_programa' => $value['id_planificacion_programa']])->row_array(),
                    ['matriculas' => $this->matriculacion_model->datos_matriculacion(['pe.id_persona' => $value['id_persona'], 'pp.id_planificacion_programa' => $value['id_planificacion_programa']])->result_array()],
                    ['gestiones' => $this->anios_matricular($value['id_planificacion_programa'], $value['id_persona'])]
                );
            } else if ($this->esta_inscrito($value['id_persona'], $value['id_planificacion_programa'])) {
                $datos_inscrito = $this->matriculacion_model->datos_inscrito(['pe.id_persona' => $value['id_persona'], 'pr.id_planificacion_programa' => $value['id_planificacion_programa']])->row_array();
                $archivos_inscripcion = [];
                foreach (['CI_ANVERSO', 'CI_REVERSO', 'DEPOSITO_CUOTA_INICIAL', 'DEPOSITO_MATRICULA', 'DIPLOMA'] as $key => $value) {
                    $archivo = $this->marketing_model->listar_archivo_inscripcion(['i.id_inscripcion' => $datos_inscrito['id_inscripcion'], 'm.etiqueta' => $value], ['m.estado_archivo', ['ELIMINADO']], 'row');
                    $archivos_inscripcion[$value] = empty($archivo) ? null : $archivo;
                }
                $array_resultado[] = array_merge(
                    $datos_inscrito,
                    ['respaldos' => $archivos_inscripcion]
                );
            }
        }
        // echo json_encode($array_resultado);
        // return;
        if (!empty($array_resultado)) {
            $vista_matriculados = '';
            foreach ($array_resultado as $key => $value) {
                $vista_matriculados .= $this->load->view('/matriculacion/tarjetas/matriculado', ['posgraduante' => $value, 'botones' => estado(isset($value['matriculas']) ? 'MATRICULADO' : $value['estado_inscripcion'])], TRUE);
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true, 'vista' =>  $vista_matriculados]));
        } else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se encontraron resultados']));
    }
    private function esta_inscrito($id_persona, $id_planificacion_programa): bool
    {
        $inscrito = $this->matriculacion_model->datos_inscrito(['pe.id_persona' => $id_persona, 'pr.id_planificacion_programa' => $id_planificacion_programa])->result();
        if (count($inscrito) >= 1) return true;
        else return false;
    }

    private function es_posgraduante($id_persona, $id_planificacion_programa): bool
    {
        $matriculas = $this->matriculacion_model->datos_matriculacion(['pe.id_persona' => $id_persona, 'pp.id_planificacion_programa' => $id_planificacion_programa])->result();
        if (count($matriculas) >= 1) return true;
        else return false;
    }

    public function agregar_usuario()
    {
        $datos_persona = $this->auth_model->verificar_usuario($this->input->post('id_persona'));

        if ($datos_persona !== null) {
            $grupo_usuario = $this->insertar_grupo_usuario($this->input->post('grupos'), $this->input->post('id_persona'));
            if (is_array($grupo_usuario)) {
                return $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $grupo_usuario['mensaje']]));
            } else return $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $grupo_usuario]));;
        } else {
            $persona = $this->insertar_usuario($this->input->post('id_persona'));
            if (is_array($persona)) {
                $grupo_usuario = $this->insertar_grupo_usuario($this->input->post('grupos'), $this->input->post('id_persona'));
                is_array($grupo_usuario) ?
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $persona['mensaje'] . ' ' . $grupo_usuario['mensaje']])) :
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $grupo_usuario]));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $persona]));
            }
        }
    }

    public function insertar_usuario($id_persona)
    {
        $datos_persona = $this->sql_psg->listar_tabla('persona', ['id_persona' => $this->input->post('id_persona')], '', 'row');
        if ($datos_persona !== null) {
            $id_persona = $this->db->insert('usuario', [
                'id_usuario' => $id_persona,
                'nombre_usuario' => trim(explode(' ', $datos_persona->nombre)[0]) . trim($datos_persona->ci),
                'clave_usuario' => md5(trim($datos_persona->ci)),
                'estado_usuario' => 'ACTIVO',
            ]);
            if ($id_persona) {
                return ['mensaje' => 'Se agrego un nuevo Usuario correctamente.'];
            } else {
                return 'Error al intentar agregar un nuevo Usuario.';
            }
        }
    }

    private function insertar_grupo_usuario($nombre_grupos, $id_persona)
    {
        $grupos = [];
        foreach ($this->input->post('grupos') as $key => $value) {
            $grupo = $this->sql_psg->listar_tabla('grupo', ['nombre_grupo' => $value], '', 'row');
            if ($grupo !== null) {
                $grupos[] = $grupo;
            }
        }
        $ids_grupo_usuario = [];
        foreach ($grupos as $key => $value) {
            $datos_persona = $this->auth_model->verificar_usuario($id_persona);
            if ($datos_persona !== null) {
                if (!in_array($value->nombre_grupo, explode(', ', $datos_persona['nombre_grupo']))) {
                    $ids_grupo_usuario[] = $this->sql_psg->insertar_tabla('grupo_usuario', [
                        'id_grupo' => $value->id_grupo,
                        'id_persona' => $datos_persona['id_persona'],
                        'fecha_inicio' => date('Y-m-d'),
                        'id_usuario_registro' => $this->usuario['id_persona'],
                        'fecha_registro' => date('Y-m-d H:i:s'),
                        'ip_usuario' => '127.0.0.1',
                        'estado_grupo_usuario' => 'ACTIVO'
                    ]);
                }
            } else {
                $ids_grupo_usuario[] = $this->sql_psg->insertar_tabla('grupo_usuario', [
                    'id_grupo' => $value->id_grupo,
                    'id_persona' => $id_persona,
                    'fecha_inicio' => date('Y-m-d'),
                    'id_usuario_registro' => $this->usuario['id_persona'],
                    'fecha_registro' => date('Y-m-d H:i:s'),
                    'ip_usuario' => '127.0.0.1',
                    'estado_grupo_usuario' => 'ACTIVO'
                ]);
            }
        }
        return ['mensaje' => 'Se agrego correctamente ' . ((count($grupos) > 1) ? ' los grupos ' : ' el grupo ') . implode(',', $nombre_grupos), 'ids' => $ids_grupo_usuario];
    }
}