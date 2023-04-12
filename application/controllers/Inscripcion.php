<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Institucion: Posgrado
 * Sistema: PSG
 * Módulo: Inscripcion de Programas
 * Descripcion: Se realizaran todos los procesos necesarios para realizar la Inscripción a un estudiante
 * @author: Team PSG
 *
 **/
class Inscripcion extends PSG_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('inscripcion_model');
        $this->load->model('persona_model');
    }

    public function inscripcion_enviar_correo()
    {
        $this->load->library('email');
        $this->email->set_newline("\r\n");

        $config['protocol'] = 'SMTP';
        $config['smtp_host'] = 'mail.upea.bo';
        $config['smtp_port'] = '25';
        $config['smtp_user'] = 'posgrado@upea.bo';
        $config['smtp_from_name'] = 'posgrado@upea.bo';
        $config['smtp_pass'] = 'Posgrado#1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['smtp_timeout'] = '4';

        $this->email->initialize($config);

        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
        $this->email->to('adalidalanoca2029@gmail.com');
        // $this->email->cc($attributes['cc']);
        // $this->email->bcc($attributes['cc']);
        $this->email->subject('subject');
        $this->email->message('message');

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     show_error($this->email->print_debugger());
        //     return false;
        // }
    }

    public function inscripcion_verificar_datos()
    {
        $this->load->model('marketing_model');
        $inscrito = $this->marketing_model->persona_inscrita(['p.id_persona' => $this->input->post('id_persona'), 'pp.id_planificacion_programa' => $this->input->post('id_planificacion_programa')]);

        if ($this->input->is_ajax_request()) {
            foreach (['CI_ANVERSO', 'CI_REVERSO', 'DEPOSITO_CUOTA_INICIAL', 'DEPOSITO_MATRICULA', 'DIPLOMA'] as $key => $value) {
                $archivo = $this->marketing_model->listar_archivo_inscripcion(
                    ['i.id_inscripcion' => $inscrito->id_inscripcion, 'm.etiqueta' => $value],
                    ['m.estado_archivo', ['ELIMINADO']],
                    'row'
                );
                $archivos_inscripcion[$value] = empty($archivo) ? null : $archivo;
            }
            $this->data['inscrito'] = $inscrito;
            $this->data['archivos_inscripcion'] = $archivos_inscripcion;
            $this->data['id_persona'] = $this->input->post('id_persona');
            $this->data['id_planificacion_programa'] = $this->input->post('id_planificacion_programa');
            $this->output->set_content_type('application/json')->set_output(json_encode(
                [
                    'exito' => true,
                    'vista' => $this->templater->view_horizontal_admin('/inscripcion/modal_verificar_datos_inscripcion', $this->data)
                ]
            ));
        }
    }

    // BLOQUE PARA LA INSCRIPCION DIRECTA
    public function inscripcion_publicaciones_listar()
    {
        if ($this->input->is_ajax_request()) {
            $this->templater->view_horizontal_admin('inscripcion/inscripcion_publicaciones_listar');
        }
    }

    public function inscripcion_publicaciones_listar_ajax()
    {
        if ($this->input->is_ajax_request()) {
            $table = "(
                SELECT 
                    pp.id_planificacion_programa,
                    pub.id_publicacion,
                    pp.nombre_programa,
                    pub.fecha_fin_inscripcion,
                    pub.estado_publicacion,
                    pp.numero_version,
                    g.gestion AS gestion_programa,
                    ga.descripcion_grado_academico,
                    tp.nombre_tipo_programa,
                    u.nombre_unidad,
                    u.tipo_unidad,
                    s.denominacion_sede
                FROM marketing.psg_publicacion AS pub
                INNER JOIN academico.psg_planificacion_programa AS pp
                ON pp.id_planificacion_programa = pub.id_planificacion_programa
                INNER JOIN academico.psg_gestion AS g
                ON g.id_gestion = pp.id_gestion
                INNER JOIN administrativo.psg_unidad AS u
                ON u.id_unidad=pp.id_unidad
                INNER JOIN administrativo.psg_sede AS s
                ON s.id_sede = u.id_sede
                INNER JOIN academico.psg_grado_academico AS ga
                ON ga.id_grado_academico = pp.id_grado_academico
                INNER JOIN academico.psg_tipo_programa AS tp
                ON tp.id_tipo_programa = pp.id_tipo_programa
            )temp";
            $primaryKey = 'id_publicacion';
            $where = "(estado_publicacion != 'ELIMINADO')";
            // $where = "estado_publicacion != 'ELIMINADO' AND gestion_programa = " . date('yy');
            $columns = array(
                ['db' => 'id_planificacion_programa', 'dt' => 0],
                ['db' => "concat(nombre_programa,'<br>VERSION - ',numero_version,', ',gestion_programa, ' (', descripcion_grado_academico,', ',nombre_tipo_programa,')<br>',nombre_unidad,', ',tipo_unidad,', ',denominacion_sede,'.')", 'alias' => 'nom_completo_prog', 'dt' => 2],
                ['db' => 'estado_publicacion', 'dt' => 3],
                ['db' => 'id_publicacion',  'dt' => 4],
            );

            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);

            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::super_complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    public function campos_formulario_inscripcion_directa()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['planificacion_programa'] = $this->sql_psg->listar_tabla('vista_programas', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], null, 'row');

            $this->load->model('admin_marketing_model');
            $this->data['imagen_programa'] = $this->admin_marketing_model->listar_imagenes("mp.id_publicacion = " . $this->input->post('id_publicacion') . " AND mp.img_principal = 1");
            $this->data['paises'] = $this->db->get('pais')->result_array();
            $this->templater->view_horizontal_admin('inscripcion/campos_formulario_inscripcion_directa', $this->data);
        }
    }

    public function inscripcion_inscripcion_verificar()

    {
        $this->load->library('form_validation');
        $id_planificacion_programa = $this->input->post('id_planificacion_programa');
        $id_persona = $this->input->post('id_persona');
        $ci = strtoupper(str_replace(' ', '', $this->input->post('ci')));
        $inscrito = ($this->db->select('*')->from('inscripcion i')->join('persona p', 'p.id_persona = i.id_persona')->where(['id_planificacion_programa' => $this->input->post('id_planificacion_programa'), 'ci' => $ci]))->get()->result_array();

        
        if (is_numeric($id_persona) && is_numeric($id_planificacion_programa)) {
            
            $this->form_validation->set_rules('numero_deposito_matricula', 'Numero deposito Matricula', 'required|numeric|max_length[20]');
            $this->form_validation->set_rules('fecha_deposito_matricula', 'Fecha deposito Matricula', 'required|callback_date_valid[f_deposito]');
            if ($this->form_validation->run() == FALSE)
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            else {
                if (empty($inscrito)) {
                    $id_inscripcion = $this->sql_psg->insertar_tabla('inscripcion', [
                        'id_persona' => $id_persona,
                        'id_planificacion_programa' => $id_planificacion_programa,
                        'fecha_inscripcion' => date('Y-m-d H:i:s'),
                        'numero_deposito_matricula' => $this->input->post('numero_deposito_matricula'),
                        'fecha_deposito_matricula' => $this->input->post('fecha_deposito_matricula'),
                        'numero_deposito_cuota_inicial' => empty($this->input->post('numero_deposito_cuota_inicial')) ? null : $this->input->post('numero_deposito_cuota_inicial'),
                        'fecha_deposito_inicial' => empty($this->input->post('numero_deposito_cuota_inicial')) ? null : $this->input->post('fecha_deposito_inicial'),
                        'estado_inscripcion' => 'REGISTRADO'
                    ]);
                    $this->output->set_content_type('application/json')->set_output(json_encode(is_numeric($id_inscripcion) ? ['exito' => 'Se agrego la inscripción correctamente'] : ['error' => 'No se agrego la inscripción, por favor intente más tarde']));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $inscrito[0]['nombre'] . ' ' . $inscrito[0]['paterno'] . ' ' . $inscrito[0]['materno'] . ' se encuentra inscrito en este Programa, se encuentra en el estado ' . $inscrito[0]['estado_inscripcion']]));
                }
            }
        } else if (is_numeric($id_planificacion_programa) && empty($this->db->get_where('persona', ['ci' => $ci])->result_array()) && empty($inscrito)) {
            // return var_dump($_REQUEST);
            // return var_dump($_REQUEST);
            $this->form_validation->set_rules('ci', 'ci', 'required|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('expedido', 'expedido', 'required');
            $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[50]');
            $this->form_validation->set_rules('paterno', 'paterno', 'required|max_length[50]');
            $this->form_validation->set_rules('materno', 'materno', 'required|max_length[50]');
            $this->form_validation->set_rules('genero', 'genero', 'required');

            $this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required|callback_date_valid[f_nacimiento]');

            $this->form_validation->set_rules('lugar_nacimiento', 'lugar_nacimiento', 'required');
            // $this->form_validation->set_rules('ciudad_donde_vive', 'ciudad_donde_vive', 'required');
            $this->form_validation->set_rules('domicilio', 'domicilio', 'required');
            $this->form_validation->set_rules('id_pais_nacionalidad', 'id_pais_nacionalidad', 'required');

            $this->form_validation->set_rules('estado_civil', 'estado_civil', 'required');

            $this->form_validation->set_rules('oficio_trabajo', 'oficio_trabajo', 'required');
            $this->form_validation->set_rules('celular', 'celular', 'required|numeric|is_natural|max_length[8]|min_length[8]');
            $this->form_validation->set_rules('telefono', 'telefono', 'numeric|is_natural|max_length[10]');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            if ($this->form_validation->run() == false)
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            else {
                $id_persona = $this->sql_psg->insertar_tabla('persona', [
                    'ci' => $this->input->post('ci'),
                    'expedido' => $this->input->post('expedido'),
                    'nombre' => $this->input->post('nombre'),
                    'paterno' => $this->input->post('paterno'),
                    'materno' => $this->input->post('materno'),
                    'genero' => $this->input->post('genero'),
                    'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
                    'lugar_nacimiento' => $this->input->post('lugar_nacimiento'),
                    'domicilio' => $this->input->post('domicilio'),
                    'id_pais_nacionalidad' => $this->input->post('id_pais_nacionalidad'),
                    'estado_civil' => $this->input->post('estado_civil'),
                    'oficio_trabajo' => $this->input->post('oficio_trabajo'),
                    'celular' => $this->input->post('celular'),
                    'telefono' => $this->input->post('telefono'),
                    'email' => $this->input->post('email')
                ]);
                if (is_numeric($id_persona)) {
                    $id_inscripcion = $this->sql_psg->insertar_tabla('inscripcion', [
                        'id_persona' => $id_persona,
                        'id_planificacion_programa' => $id_planificacion_programa,
                        'fecha_inscripcion' => date('Y-m-d H:i:s'),
                        'numero_deposito_matricula' => $this->input->post('numero_deposito_matricula'),
                        'fecha_deposito_matricula' => $this->input->post('fecha_deposito_matricula'),
                        'numero_deposito_cuota_inicial' => empty($this->input->post('numero_deposito_cuota_inicial')) ? null : $this->input->post('numero_deposito_cuota_inicial'),
                        'fecha_deposito_inicial' => empty($this->input->post('numero_deposito_cuota_inicial')) ? null : $this->input->post('fecha_deposito_inicial'),
                        'estado_inscripcion' => 'REGISTRADO'
                    ]);
                    $this->output->set_content_type('application/json')->set_output(json_encode(is_numeric($id_inscripcion) ? ['exito' => 'Se agrego la inscripción correctamente'] : ['error' => 'No se agrego la inscripción, por favor intente más tarde']));
                }
            }
        }
    }


    public function inscripcion_persona_buscar()
    {
        $ci = strtoupper(str_replace(' ', '', $this->input->post('ci')));
        $esta_inscrito = ($this->db->select('*')->from('inscripcion i')->join('persona p', 'p.id_persona = i.id_persona')->where(['id_planificacion_programa' => $this->input->post('id_planificacion_programa'), 'ci' => $ci]))->get()->result_array();

        if (empty($ci)) return $this->output->set_content_type('application/json')->set_output(json_encode([
            'info' => 'Ingrese el numero de carnet de identidad',
        ]));
        if (empty($esta_inscrito)) {
            $persona = $this->db->get_where('persona', ['ci' => $ci])->result_array();
            if (count($persona) == 1) {
                $this->output->set_content_type('application/json')->set_output(json_encode([
                    'exito' => 'Persona encontrada, los datos no pueden ser modificados',
                    'datos' => $persona[0]
                ]));
            } else if (count($persona) == 0) {
                $this->output->set_content_type('application/json')->set_output(json_encode([
                    'agregar' => 'Persona no encontrada, por favor llene todos los campos',
                ]));
            } else {
            }
        } else if (count($esta_inscrito) == 1) {
            $this->output->set_content_type('application/json')->set_output(json_encode([
                'error' => $esta_inscrito[0]['nombre'] . ' ' . $esta_inscrito[0]['paterno'] . ' ' . $esta_inscrito[0]['materno'] . ' se encuentra inscrito en este Programa, se encuentra en el estado ' . $esta_inscrito[0]['estado_inscripcion'],
            ]));
        } else if (count($esta_inscrito) > 1) {
            $this->output->set_content_type('application/json')->set_output(json_encode([
                'error' => 'Se encontraron mas de una inscripción realizada a es Programa con la misma persona, contactese con el Administrador'
            ]));
        }
    }
}
