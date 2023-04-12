<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
                                                                                                                 * @author: Team PSG
                                                                                                                 * Institucion: Posgrado
                                                                                                                 * Sistema: PSG
                                                             * Módulo: Persona
                                                             * Descripcion: El objetivo de este controlador es: Realizar todo tipo de cambios en el personal de POSGRADO
 **/

class Persona extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('persona_model');
        $this->load->model('tramite_model');
    }

    /**
     * Uso: Se encarga de retornar toda una lista de personas que son parte de la unidad
     * Retorna: HTML
     */
    public function listar_personas()
    {
        if ($this->input->is_ajax_request()) {
            $this->templater->view_horizontal_admin('/persona/listar_personas', $this->data);
        }
    }

    /**
     * Uso: Principalmente lo usara un DataTable con una llamada AJAX para listar todo el contenido de la vista psg_persona
     * Retorna: JSON
     */
    public function ajax_listar_personas()
    {
        if ($this->input->is_ajax_request()) {
            $tables = 'psg_persona pe full join psg_pais p on p.id_pais = pe.id_pais_nacionalidad';
            $primaryKey = 'id_persona';
            // $where = 'id_persona = 2';
            $columns = array(
                array('db' => 'id_persona', 'dt' => 0),
                array('db' => 'nombre', 'dt' => 2),
                array('db' => 'paterno', 'dt' => 3),
                array('db' => 'ci', 'dt' => 4),
                array('db' => 'email', 'dt' => 5),
                array('db' => 'celular', 'dt' => 6)
            );
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::super_complex($_GET, $sql_details, $tables, $primaryKey, $columns)));
        }
    }

    /**
     * Funcion: Se encarga de mostrar una vista con los campos necesarios para editar datos personales
     * Quien lo LLama: Una llamada AJAX
     * Retorna: HTML
     */
    public function campos_datos_personales()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['persona'] = $this->persona_model->persona('select', $this->input->post(), NULL);
            $this->data['paises'] = $this->persona_model->pais('select', NULL, NULL, NULL);
            $this->data['unidades_academicas'] = $this->persona_model->unidad_academica('select', NULL, NULL, NULL);

            /** 
             * Ahora se procede a comprobar que los datos extraidos de la base de datos sean diferentes de NULL.
             */
            if ($this->data['persona'] !== NULL && $this->data['paises'] !== NULL && $this->data['unidades_academicas'] !== NULL) {
                $this->templater->view_horizontal_admin('/persona/campos_datos_personales', $this->data);
            } else
                /**
                 * En el caso de que un array sea NULL procedemos devolver el error
                 */
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Error al obtener el datos')));
        }
    }

    /**
     * Funcion: Se encarga de verificar numero ci que no haya caracteres invalidos
     * Quien lo LLama: Una llamada AJAX
     * Retorna: JSON
     */
    public function verificar_ci()
    {
        if ($this->input->is_ajax_request()) {
            /**
             * Se procede a llamar a la libreria para la validacion de los campos
             */
            $this->load->library('form_validation');

            /**
             * Se procede a poner las reglas de validacion propias de Codeigniter
             */
            $this->form_validation->set_rules('ci', 'ci', 'required|numeric|min_length[7]|max_length[8]');

            if ($this->form_validation->run() == FALSE) {
                /**En caso de que los campos no pasen la validacion se procede a retornar un objeto JSON con los campos erroneos*/
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $this->data['persona'] = $this->persona_model->persona('select', array('ci' => $this->input->post('ci')), NULL);
                /** 
                 * Ahora se procede a comprobar que los datos extraidos de la base de datos sean diferentes de NULL.
                 */
                if ($this->data['persona'] !== NULL) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => TRUE)));
                } else
                    /**
                     * En el caso de que un array sea NULL procedemos devolver el error
                     */
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Error al obtener el datos')));
                /**En caso de que los campos pasen la validacion se procede a retornar un objeto JSON confirmando el ci esta correcto*/
            }
        }
    }

    /**
     * Funcion          : Lista todos los Grados Academicos de una sola persona
     * Quien lo LLama   : Una llamada AJAX
     * Retorna          : Especificamente un DataTable()
     */
    public function ajax_listar_grados_academicos()
    {
        if ($this->input->is_ajax_request()) {

            $table = 'grado_academico_persona gap, modalidad_titulacion mt, tipo_documento_academico tda, grado_academico ga, unidad_academica ua';
            $primaryKey = 'id_grado_academico_persona';
            $where = "mt.id_modalidad_titulacion = gap.id_modalidad_titulacion and 
            tda.id_tipo_documento_academico = gap.id_tipo_documento_academico and 
            ga.id_grado_academico = gap.id_grado_academico and 
            ua.id_unidad_academica = gap.id_unidad_academica and gap.estado_grado_academico != 'ELIMINADO'  and 
            id_persona = " . $this->input->get('id_persona');

            $columns = [
                ['db' => 'id_grado_academico_persona', 'dt' => 0],
                ['db' => 'gap.descripcion_grado_academico', 'alias' => 'gap', 'dt' => 2],
                ['db' => 'nombre_unidad_academica', 'dt' => 3],
                ['db' => 'fecha_emision', 'dt' => 4],
                ['db' => 'estado_grado_academico', 'dt' => 5],
                ['db' => 'numero_titulo', 'dt' => 6],
                ['db' => 'observacion', 'dt' => 7],

            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    /**
     * Funcion: Se encarga de recibir datos de una Persona y hace una actualizacion con los datos
     * Quien lo LLama: Una llamada AJAX
     * Retorna: JSON
     */
    public function actualizar_datos_personales()
    {
        if ($this->input->is_ajax_request()) {
            /**
             * Se procede a llamar a la libreria para la validacion de los campos
             */
            $this->load->library('form_validation');

            /**
             * Se procede a poner las reglas de validacion propias de Codeigniter
             */
            $this->form_validation->set_rules('ci', 'ci', 'max_length[20]');
            $this->form_validation->set_rules('expedido', 'expedido', 'max_length[5]');
            $this->form_validation->set_rules('tipo_documento', 'tipo documento', 'max_length[5]');
            $this->form_validation->set_rules('nombre', 'nombre', 'max_length[50]');
            $this->form_validation->set_rules('paterno', 'paterno', 'max_length[50]');
            $this->form_validation->set_rules('materno', 'materno', 'max_length[50]');

            $this->form_validation->set_rules('genero', 'genero', 'max_length[12]');
            $this->form_validation->set_rules('estado_civil', 'estado civil', 'max_length[13]');
            $this->form_validation->set_rules('id_pais_nacionalidad', 'id_pais_nacionalidad', 'numeric|max_length[2]');
            $this->form_validation->set_rules('domicilio', 'domicilio', 'max_length[200]');
            $this->form_validation->set_rules('lugar_nacimiento', 'lugar nacimiento', 'max_length[100]');
            $this->form_validation->set_rules('email', 'email', 'valid_email|max_length[50]');
            $this->form_validation->set_rules('oficio_trabajo', 'oficio trabajo', 'max_length[50]');
            $this->form_validation->set_rules('telefono', 'telefono', 'numeric|max_length[50]');
            $this->form_validation->set_rules('celular', 'celular', 'numeric|max_length[15]');
            $this->form_validation->set_rules('id_caja_salud', 'id caja salud', 'numeric|max_length[19]');
            $this->form_validation->set_rules('caja_salud_numero_asegurado', 'caja salud numero asegurado', 'max_length[255]');
            $this->form_validation->set_rules('id_afp', 'id afp', 'numeric|max_length[19]');
            $this->form_validation->set_rules('afp_numero_nua', 'afp numero nua', 'max_length[45]');
            $this->form_validation->set_rules('id_banco', 'caja salud numero asegurado', 'numeric|max_length[19]');
            $this->form_validation->set_rules('numero_cuenta_bancaria', 'numero cuenta bancaria', 'numeric|max_length[19]');

            if ($this->form_validation->run() == FALSE) {
                /**En caso de que los campos no pasen la validacion se procede a retornar un objeto JSON con los campos erroneos*/
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {


                /**Si los campos pasan la validacion se procede a actualizar el registro */

                if (es(['POSGRADUANTE', 'DOCENTE_POSGRADO'])) {
                    $correcto = $this->persona_model->persona('update', array(
                        'ci' => $this->input->post('ci'),
                        'expedido' => $this->input->post('expedido'),
                        'tipo_documento' => $this->input->post('tipo_documento'),
                        'nombre' => $this->input->post('nombre'),
                        'paterno' => $this->input->post('paterno'),
                        'materno' => $this->input->post('materno'),
                        'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
                    ), $this->input->post());
                } else {
                    $correcto = $this->persona_model->persona('update', array('ci' => $this->input->post('ci')), $this->input->post());
                }


                /** Despues de actualizar el registro nos devuelve TRUE si ha actualizado O un error que pudo haber ocurrido en Base de Datos
                 * Se procede a revisar que sea un TRUE, si lo es enviamos un JSON de retorno para mostrar una alerta de que se a actualizado exitosamente el registro
                 */
                if ($correcto == TRUE)
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => $correcto)));
                else
                    /**
                     * En el caso de que no sea un TRUE se retorna un objeto JSON con el error de base de datos
                     */
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Error al actualizar el registro (' . $correcto . ').')));
            }
        }
    }

    /**
     * Uso: Se llamara por un js AJAX para llenar los campos de un grado academico de una persona
     * Retorna: HTML
     * 
     */
    public function campos_grados_academicos()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['persona'] = $this->persona_model->persona('select', array('id_persona' => $this->input->post('id_persona')), NULL);
            $this->data['tipos_documentos_academicos'] = $this->persona_model->tipo_documento_academico('select', NULL, NULL);
            $this->data['unidades_academicas'] = $this->persona_model->unidad_academica('select', NULL, NULL);
            $this->data['modalidades_titulacion'] = $this->persona_model->modalidad_titulacion('select', NULL, NULL);
            $this->data['grados_academicos'] = $this->persona_model->grado_academico('select', NULL, NULL);


            $this->templater->view_horizontal_admin('persona/campos_grados_academicos', $this->data);
        }
    }

    /**
     * Uso: Se llamara por un js AJAX para editar los campos de un grado academico de una persona
     * Retorna: HTML
     * 
     */
    public function campos_grados_academicos_editar()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['persona'] = $this->persona_model->persona('select', array('id_persona' => $this->input->post('id_persona')), NULL);
            $this->data['tipos_documentos_academicos'] = $this->persona_model->tipo_documento_academico('select', NULL, NULL);
            $this->data['unidades_academicas'] = $this->persona_model->unidad_academica('select', NULL, NULL);
            $this->data['modalidades_titulacion'] = $this->persona_model->modalidad_titulacion('select', NULL, NULL);
            $this->data['grados_academicos'] = $this->persona_model->grado_academico('select', NULL, NULL);
            $this->data['grados_academicos_persona'] = $this->persona_model->grado_academico_persona(
                'select',
                array('gap.id_persona' => $this->input->post('id_persona'), 'gap.id_grado_academico_persona' => $this->input->post('id_grado_academico_persona')),
                NULL
            );

            // $this->data['respaldos_grado_academico_persona'] = $this->persona_model->multimedia_persona(
            //     'select',
            //     array(
            //         'mp.id_grado_academico_persona' => $this->input->post('id_grado_academico_persona')
            //     ),
            //     NULL
            // );

            $this->data['respaldos_grado_academico_persona'] = $this->persona_model->listar_respaldo_digital_grado_academico_persona(
                array(
                    'p.id_persona' => intval($this->input->post('id_persona')),
                    'gap.id_grado_academico_persona' => intval($this->input->post('id_grado_academico_persona'))
                )
            );

            $this->templater->view_horizontal_admin('persona/campos_grados_academicos', $this->data);
        }
    }

    /**
     * Uso: Se recibe campos de un AJAX para agregar un nuevo grado academico de una persona
     * Retorna: JSON
     */
    public function insertar_grados_academicos()
    {
        if ($this->input->is_ajax_request()) {
            /**
             * Se procede a llamar a la libreria para la validacion de los campos
             */
            $this->load->library('form_validation');

            /**
             * Se procede a poner las reglas de validacion propias de Codeigniter
             */
            $this->form_validation->set_rules('id_persona', 'id_persona', 'required|numeric');
            $this->form_validation->set_rules('id_unidad_academica', 'id_unidad_academica', 'required|numeric');
            $this->form_validation->set_rules('id_grado_academico', 'id_grado_academico', 'required|numeric');
            $this->form_validation->set_rules('id_tipo_documento_academico', 'id_tipo_documento_academico', 'required|numeric');
            $this->form_validation->set_rules('numero_titulo', 'Numero Titulo', 'required|max_length[30]');
            $this->form_validation->set_rules('id_modalidad_titulacion', 'id_modalidad_titulacion', 'required|numeric');
            $this->form_validation->set_rules('fecha_emision', 'Fecha Emision', 'required');
            $this->form_validation->set_rules('descripcion_grado_academico_persona', 'Descripcion', 'max_length[300]');
            // $this->form_validation->set_rules('id_respaldo_digital', 'Respaldo Digital', 'required|numeric|is_natural_no_zero', array('is_natural_no_zero' => 'El campo %s es obligatorio.'));
            $this->form_validation->set_rules('observacion', 'Observación', 'max_length[130]');

            if ($this->form_validation->run() == FALSE) {
                /**En caso de que los campos no pasen la validacion se procede a retornar un objeto JSON con los campos erroneos*/
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {

                /** registrar */
                $data_form_campos_academicos = array(
                    'id_unidad_academica' => $this->input->post('id_unidad_academica'),
                    // 'id_persona' => $this->input->post('id_persona'),
                    'id_persona' => intval($this->input->post('id_persona')),
                    'id_grado_academico' => $this->input->post('id_grado_academico'),
                    'id_tipo_documento_academico' => $this->input->post('id_tipo_documento_academico'),
                    'numero_titulo' => $this->input->post('numero_titulo'),
                    'id_modalidad_titulacion' => $this->input->post('id_modalidad_titulacion'),
                    'descripcion_grado_academico' => $this->input->post('descripcion_grado_academico_persona'),
                    'observacion' => $this->input->post('observacion'),
                    'fecha_emision' => $this->input->post('fecha_emision'),
                    'respaldo_digital' => 'si',
                    'fecha_registro_grado' => date('Y-m-d'),
                    'id_usuario' => $this->usuario['id_persona'],
                    'estado_grado_academico' => 'REGISTRADO',
                );

                /**Si los campos pasan la validacion se procede a insertar el nuevo registro */

                $id_grado_academico_persona = $this->persona_model->grado_academico_persona('insert', NULL, $data_form_campos_academicos);

                $ruta = 'img/respaldo_grado_academico_persona';
                $configuraciones =  array(
                    'allowed_types' => 'jpg|jpeg|png|doc|docx|JGP|JPEG|PNG',
                    'max_size' => '20240',
                    'file_name' => $id_grado_academico_persona . '_' . $this->input->post('id_persona') . '_RGAP_' . date('Ymd_His')
                );
                $respaldos_digitales_grados_academicos =   $this->subir_archivos_multipes($ruta, $configuraciones, 'respaldo', $_FILES['respaldo']);

                foreach ($respaldos_digitales_grados_academicos as $respaldo) {

                    $id_multimedia = $this->persona_model->multimedia(
                        'insert',
                        null,
                        array(
                            'nombre_archivo' => $respaldo['file_name'],
                            'extension_archivo' => $respaldo['file_ext'],
                            'fecha_registro' => date('Y-m-d'),
                            'id_usuario' => $this->usuario['id_persona'],
                            'tamano_archivo' =>  str_replace(',', '.', $respaldo['file_size']),
                            'ruta_archivo' => $ruta . '/' . $respaldo['file_name'],
                            'estado_archivo' => 'REGISTRADO',
                        )
                    );

                    $datos_multimedia_grado_academico_persona = array(
                        'id_multimedia' => $id_multimedia,
                        'id_grado_academico_persona' => $id_grado_academico_persona,
                        'id_usuario' => $this->usuario['id_persona'],
                        'fecha_revision' => date('Y-m-d'),
                        'estado_multimedia_grado_academico_persona' => 'REGISTRADO',
                    );
                    $id_multimedia_persona = $this->sql_psg->insertar_tabla('multimedia_grado_academico_persona', $datos_multimedia_grado_academico_persona);
                }

                /** Despues de insertar el registro nos devuelve el id insertado O un error que pudo haber ocurrido en Base de Datos
                 * Se procede a revisar que sea un numero, si lo es enviamos un JSON de retorno para mostrar una alerta de que se a insertado exitosamente el registro
                 */
                if (is_numeric($id_grado_academico_persona))
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => $id_grado_academico_persona)));
                else
                    /**
                     * En el caso de que no se un numero se retorna un objeto JSON con el error de base de datos
                     */
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Error al insertar nuevo registro (' . $id_grado_academico_persona . ').')));
            }
        }
    }

    /**
     * Uso: Se recibe datos de una AJAX para agregar un nuevo grado academico de una persona
     * Retorna: JSON
     * 
     */
    public function eliminar_grados_academicos()
    {
        if ($this->input->is_ajax_request()) {
            /** Selecciona todas las imagenes de un grado_academico_persona registrado */
            // $respaldos_grado_academico_persona = $this->persona_model->multimedia_persona(
            //     'select',
            //     array(
            //         'mp.id_grado_academico_persona' => $this->input->post('id_grado_academico_persona')
            //     ),
            //     NULL
            // );

            $respaldos_grado_academico_persona = $this->persona_model->listar_respaldo_digital_grado_academico_persona(
                array(
                    'gap.id_grado_academico_persona' => intval($this->input->post('id_grado_academico_persona'))
                )
            );
            // echo '<pre>';
            // // var_dump($respaldos_grado_academico_persona);
            // // var_dump($this->input->post('id_grado_academico_persona'));
            // echo '</pre>';

            // exit();

            foreach ($respaldos_grado_academico_persona as $respaldo_grado_academico_persona) {

                /** elimina los archivos del servidor */
                // unlink('img/respaldo_grado_academico_persona/' . $respaldo_grado_academico_persona['nombre_archivo']);

                /** Descripcion: eliminara todas los archivos asociados al grado academico
                 * de la persona
                 */
                // $this->persona_model->multimedia_persona(
                //     'delete',
                //     array(
                //         'id_multimedia_persona' => $respaldo_grado_academico_persona['id_multimedia_persona']
                //     ),
                //     null
                // );
                $this->sql_psg->modificar_tabla('multimedia_grado_academico_persona', ['estado_multimedia_grado_academico_persona' => 'ELIMINADO'], ['id_multimedia_grado_academico_persona' => $respaldo_grado_academico_persona['id_multimedia_grado_academico_persona']]);

                /** Descripcion: elimina los archivos respetivos de la tabla multimedia */
                // $this->persona_model->multimedia(
                //     'delete',
                //     array(
                //         'id_multimedia' => $respaldo_grado_academico_persona['id_multimedia']
                //     ),
                //     null
                // );
                $this->sql_psg->modificar_tabla('multimedia', ['estado_archivo' => 'ELIMINADO'], ['id_multimedia' => $respaldo_grado_academico_persona['id_multimedia']]);
            }

            /** Elimina un registro de grado academico persona */
            // $this->persona_model->grado_academico_persona('delete', array('id_grado_academico_persona' => $this->input->post('id_grado_academico_persona')), NULL);

            $this->sql_psg->modificar_tabla('grado_academico_persona', ['estado_grado_academico' => 'ELIMINADO'], ['id_grado_academico_persona' => $this->input->post('id_grado_academico_persona')]);
        }
    }

    /**
     * Uso: ACTUALIZAR los campos de grado academico persona 
     * Retorna: JSON
     */
    public function actualizar_grados_academicos()
    {
        if ($this->input->is_ajax_request()) {

            /**
             * Se procede a llamar a la libreria para la validacion de los campos
             */
            $this->load->library('form_validation');

            /**
             * Se procede a poner las reglas de validacion propias de Codeigniter
             */
            $this->form_validation->set_rules('id_unidad_academica', 'id_unidad_academica', 'required|numeric');
            $this->form_validation->set_rules('id_grado_academico', 'id_grado_academico', 'required|numeric');
            $this->form_validation->set_rules('id_tipo_documento_academico', 'id_tipo_documento_academico', 'required|numeric');
            $this->form_validation->set_rules('numero_titulo', 'Numero Titulo', 'required|max_length[30]');
            $this->form_validation->set_rules('id_modalidad_titulacion', 'id_modalidad_titulacion', 'required|numeric');
            $this->form_validation->set_rules('fecha_emision', 'Fecha Emision', 'required');
            $this->form_validation->set_rules('descripcion_grado_academico_persona', 'Descripcion', 'max_length[300]');
            // $this->form_validation->set_rules('id_respaldo_digital', 'Respaldo Digital', 'required|numeric|is_natural_no_zero', array('is_natural_no_zero' => 'El campo %s es obligatorio.'));

            $this->form_validation->set_rules('observacion', 'Observación', 'max_length[130]');

            if ($this->form_validation->run() == FALSE) {
                /**En caso de que los campos no pasen la validacion se procede a retornar un objeto JSON con los campos erroneos*/
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                /**Si los campos pasan la validacion se procede a actualizar el registro */
                // datos que se actualizaran
                $data_form_campos_academicos = array(
                    'id_unidad_academica' => $this->input->post('id_unidad_academica'),
                    // 'id_persona' => $this->input->post('id_persona'),
                    'id_persona' => intval($this->input->post('id_persona')),
                    'id_grado_academico' => $this->input->post('id_grado_academico'),
                    'id_tipo_documento_academico' => $this->input->post('id_tipo_documento_academico'),
                    'numero_titulo' => $this->input->post('numero_titulo'),
                    'id_modalidad_titulacion' => $this->input->post('id_modalidad_titulacion'),
                    'descripcion_grado_academico' => $this->input->post('descripcion_grado_academico_persona'),
                    'observacion' => $this->input->post('observacion'),
                    'fecha_emision' => $this->input->post('fecha_emision'),
                    'respaldo_digital' => 'si',
                    'fecha_registro_grado' => date('Y-m-d'),
                    'id_usuario' => $this->usuario['id_persona'],
                    'estado_grado_academico' => 'REGISTRADO',
                );


                $correcto = $this->persona_model->grado_academico_persona(
                    'update',
                    array('id_grado_academico_persona' => $this->input->post('id_grado_academico_persona')),
                    $data_form_campos_academicos
                );

                /** Selecciona todas las imagenes de un grado_academico_persona registrado */
                $respaldos_grado_academico_persona = $this->persona_model->listar_respaldo_digital_grado_academico_persona(
                    array(
                        'p.id_persona' => intval($this->input->post('id_persona')),
                        'gap.id_grado_academico_persona' => intval($this->input->post('id_grado_academico_persona'))
                    )
                );
                // var_dump($respaldos_grado_academico_persona);
                // var_dump($_FILES['respaldo']['name'][0]);

                if ($_FILES['respaldo']['name'][0] != "") {
                    if (empty($respaldos_grado_academico_persona)) {
                        // echo 'insertar imagen por que no hay';
                        // var_dump($_FILES['respaldo']);

                        /** Descripcion : realiza las configuraciones de la ruta y los tipos de formatos que resivira los archivos
                         *  y guardamos en una variable los archivos que se subieron del metodo subir_archivos_multiples
                         */
                        $ruta = 'img/respaldo_grado_academico_persona';
                        $configuraciones =  array(
                            'allowed_types' => 'gif|jpg|jpeg|png|doc|docx',
                            'max_size' => '20240',
                            'file_name' => $this->input->post('id_grado_academico_persona') . '_' . $this->input->post('id_persona') . '_RGAP_' . date('Ymd_His')
                        );
                        $nuevos_respaldos_grado_academico_persona =   $this->subir_archivos_multipes($ruta, $configuraciones, 'respaldo', $_FILES['respaldo']);
                        // var_dump($respaldos_grado_academico_persona);
                        // exit;

                        foreach ($nuevos_respaldos_grado_academico_persona as $nuevo_respaldo) {

                            $id_multimedia = $this->persona_model->multimedia(
                                'insert',
                                null,
                                array(
                                    'nombre_archivo' => $nuevo_respaldo['file_name'],
                                    'extension_archivo' => $nuevo_respaldo['file_ext'],
                                    'fecha_registro' => date('Y-m-d'),
                                    'id_usuario' => $this->usuario['id_persona'],
                                    'tamano_archivo' =>  str_replace(',', '.', $nuevo_respaldo['file_size']),
                                    'ruta_archivo' => $ruta . '/' . $nuevo_respaldo['file_name'],
                                    // 'etiqueta' => null,
                                    'estado_archivo' => 'REGISTRADO',
                                )
                            );

                            $datos_multimedia_grado_academico_persona = array(
                                'id_multimedia' => $id_multimedia,
                                'id_grado_academico_persona' => $this->input->post('id_grado_academico_persona'),
                                'estado_multimedia_grado_academico_persona' => 'REGISTRADO'
                            );

                            $id_multimedia_persona = $this->sql_psg->insertar_tabla('multimedia_grado_academico_persona', $datos_multimedia_grado_academico_persona);
                        }
                    } else {
                        /** Descripcion foreach ; elimina las imagenes de respaldo grado academico persona 
                         *  de las tablas multimedia y multimedia persona y elimina los archivos del servidor
                         */
                        // echo '<pre>';
                        // var_dump($respaldos_grado_academico_persona);
                        // echo '</pre>';
                        // exit();

                        foreach ($respaldos_grado_academico_persona as $respaldo_grado_academico_persona) {
                            /** Elimina los archivos del servidor */
                            // unlink('img/respaldo_grado_academico_persona/' . $respaldo_grado_academico_persona['nombre_archivo']);
                            if ($respaldo_grado_academico_persona['estado_archivo'] != 'ELIMINADO') {
                                rename("img/respaldo_grado_academico_persona/" . $respaldo_grado_academico_persona['nombre_archivo'], "img/respaldo_grado_academico_persona/" . "antiguo_" . $respaldo_grado_academico_persona['nombre_archivo']);
                            }

                            $this->sql_psg->modificar_tabla('multimedia_grado_academico_persona', ['estado_multimedia_grado_academico_persona' => 'ELIMINADO'], ['id_multimedia_grado_academico_persona' => $respaldo_grado_academico_persona['id_multimedia_grado_academico_persona']]);

                            if ($respaldo_grado_academico_persona['estado_archivo'] != 'ELIMINADO') {
                                $this->sql_psg->modificar_tabla('multimedia', ['estado_archivo' => 'ELIMINADO', 'nombre_archivo' => 'antiguo_' . $respaldo_grado_academico_persona['nombre_archivo']], ['id_multimedia' => $respaldo_grado_academico_persona['id_multimedia']]);
                            }
                        }

                        /** Descripcion : realiza las configuraciones de la ruta y los tipos de formatos que resivira los archivos
                         *  y guardamos en una variable los archivos que se subieron del metodo subir_archivos_multiples
                         */
                        $ruta = 'img/respaldo_grado_academico_persona';
                        $configuraciones =  array(
                            'allowed_types' => 'gif|jpg|jpeg|png|doc|docx',
                            'max_size' => '20240',
                            'file_name' => $this->input->post('id_grado_academico_persona') . '_' . $this->input->post('id_persona') . '_RGAP_' . date('Ymd_His')
                        );
                        $nuevos_respaldos_grado_academico_persona =   $this->subir_archivos_multipes($ruta, $configuraciones, 'respaldo', $_FILES['respaldo']);

                        /** Descripcion foreach: inserta las nuevas imagenes de los respaldos grado academico persona
                         *  en las tablas multimedia y multimedia-persona
                         */
                        foreach ($nuevos_respaldos_grado_academico_persona as $nuevo_respaldo) {

                            $id_multimedia = $this->persona_model->multimedia(
                                'insert',
                                null,
                                array(
                                    'nombre_archivo' => $nuevo_respaldo['file_name'],
                                    'extension_archivo' => $nuevo_respaldo['file_ext'],
                                    'fecha_registro' => date('Y-m-d'),
                                    'id_usuario' => $this->usuario['id_persona'],
                                    'tamano_archivo' =>  str_replace(',', '.', $nuevo_respaldo['file_size']),
                                    'ruta_archivo' => $ruta . '/' . $nuevo_respaldo['file_name'],
                                    'estado_archivo' => 'REGISTRADO',
                                )
                            );

                            $id_multimedia_persona = $this->sql_psg->insertar_tabla('multimedia_grado_academico_persona', [
                                'id_multimedia' => $id_multimedia,
                                'id_grado_academico_persona' => intval($this->input->post('id_grado_academico_persona')),
                                'id_usuario' => $this->usuario['id_persona'],
                                'estado_multimedia_grado_academico_persona' => 'REGISTRADO'
                            ]);
                        }
                    }
                }


                /** Despues de actualizar el registro nos devuelve TRUE si ha actualizado O un error que pudo haber ocurrido en Base de Datos
                 * Se procede a revisar que sea un TRUE, si lo es enviamos un JSON de retorno para mostrar una alerta de que se a actualizado exitosamente el registro
                 */
                if ($correcto == TRUE)
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('exito' => $correcto)));
                else
                    /**
                     * En el caso de que no sea un TRUE se retorna un objeto JSON con el error de base de datos
                     */
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Error al actualizar el registro (' . $correcto . ').')));
            }
        }
    }

    /**
     * Funcion:Retorna una vista HTML listando todos los grados academicos con su respaldo digitales de una persona
     * Quien lo LLama: Una llamada AJAX
     * Retorna: HTML
     */
    public function listar_grados_academicos_persona()
    {

        // var_dump($this->input->post());
        // var_dump($_REQUEST);
        // $id_persona = $this->usuario['id_persona'];
        // $ci = $this->usuario['ci'];
        // var_dump(intval($id_persona));
        // var_dump('ci ' . $ci);
        // var_dump($this->usuario);
        // $a = $this->persona_model->persona('select', $this->input->post(), NULL);
        // var_dump($this->persona_model->persona('select', $this->input->post(), NULL));
        // var_dump(empty($this->input->post()));
        // var_dump($a[0]['ci']);
        // exit();
        if ($this->input->is_ajax_request()) {
            // $id_persona = $this->usuario['id_persona'];
            if (empty($this->input->post())) {
                $id_persona = intval($this->usuario['id_persona']);
                $selec_ci = $this->persona_model->persona(
                    'select',
                    array(
                        'id_persona' => $id_persona,

                    ),
                    NULL
                );
                $ci = $selec_ci[0]['ci'];
            } else {
                $ci = $this->input->post('ci');
                $id_persona = $this->input->post('id_persona');
            }

            // var_dump('ci ' . $ci . ' idpersona ' . $id_persona);

            $this->load->helper(array('form', 'url'));
            // $this->data['persona'] = $this->persona_model->persona('select', $this->input->post(), NULL);
            $this->data['persona'] = $this->persona_model->persona(
                'select',
                array(
                    'ci' => $ci,
                    'id_persona' => $id_persona,

                ),
                NULL
            );
            $this->data['paises'] = $this->persona_model->pais('select', NULL, NULL, NULL);
            $this->data['unidades_academicas'] = $this->persona_model->unidad_academica('select', NULL, NULL, NULL);


            /** 
             * Ahora se procede a comprobar que los datos extraidos de la base de datos sean diferentes de NULL.
             */
            if ($this->data['persona'] !== NULL && $this->data['paises'] !== NULL && $this->data['unidades_academicas'] !== NULL) {
                $this->templater->view_horizontal_admin('/persona/listar_grados_academicos_persona', $this->data);
            } else
                /**
                 * En el caso de que un array sea NULL procedemos devolver el error
                 */
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 'Error al obtener el datos')));
        }

        // $this->templater->view_horizontal_admin('persona/listar_grados_academicos_persona', $this->data);
    }

    /**
     * Funcion:Retorna una vista HTML listando todos los archivos o respaldo digitales de una persona
     * Quien lo LLama: Una llamada AJAX
     * Retorna: HTML
     */
    public function vista_respaldo_digital()
    {

        $this->data['id_grado_academico_persona'] = $this->input->post('id_grado_academico_persona');
        $this->data['id_persona'] = $this->input->post('id_persona');

        $this->data['respaldos_digitales'] = $this->persona_model->listar_respaldo_digital_grado_academico_persona(
            array(
                'p.id_persona' => intval($this->input->post('id_persona')),
                'gap.id_grado_academico_persona' => intval($this->input->post('id_grado_academico_persona'))
            )
        );

        $this->templater->view_horizontal_admin('persona/vista_respaldo_digital', $this->data);
    }

    /**
     * Funcion: Retorna una vista HTML listando todos los archivos de una persona
     * Quien lo LLama: Una llamada AJAX
     * Retorna: HTML
     */
    public function listar_archivos()
    {
        $this->data['multimedias_persona'] = $this->tramite_model->multimedia_persona('select', $this->input->post());
        $this->templater->view_horizontal_admin('persona/seleccionar_archivo', $this->data);
    }

    public function subir_archivos()
    {
        $this->data['multimedias_persona'] = $this->tramite_model->multimedia_persona('select', $this->input->post());
        $this->templater->view_horizontal_admin('persona/subir_archivo', $this->data);
    }


    /**
     * Funcion: Se encarga se subir los archivos que se envien por el DropZone
     * Quien lo LLama: Una llamada AJAX
     * Retorna: JSON
     * show_404();
     */
    public function guardar_archivo()
    {
        if ($this->input->is_ajax_request()) {
            $config['upload_path'] = 'img/uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '51200‬';
            $config['file_name'] = "{$this->input->get('id_persona')}_{$this->input->get('etiqueta')}_" . time() . "_" . date("Y-m-d H-i-s");

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('archivo')) {
                $id_multimedia = $this->persona_model->multimedia('insert', NULL, array(
                    'nombre_archivo' =>  $this->upload->data('file_name'),
                    'extension_archivo' => $this->upload->data('file_ext'),
                    'id_usuario' => $this->input->cookie('id_persona'),
                    'tamano_archivo' => str_replace(',', '.', $this->upload->data('file_size')),
                    'ruta_archivo' => $config['upload_path'] . $this->upload->data('file_name'),
                    'etiqueta' => $this->input->get('etiqueta')
                ));
                is_numeric($id_multimedia) ? $id_multimedia_requisito_presentado_persona = $this->persona_model->multimedia_requisito_presentado_persona(
                    'insert',
                    NULL,
                    array(
                        'id_multimedia' => $id_multimedia,
                        'id_usuario' => $this->input->cookie('id_persona'),
                        'estado_multimedia_requisito_presentado_persona' => 'REGISTRADO'
                    )
                ) : false;
                is_numeric($id_multimedia_requisito_presentado_persona)
                    ? $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true, 'id_multimedia_requisito_presentado_persona' => $id_multimedia_requisito_presentado_persona, 'extension_archivo' => $this->upload->data('file_ext')]))
                    : $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El archivo no se guardo' . $id_multimedia_requisito_presentado_persona]));
            } else {
                $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
            }
        }
    }
    /**
     * Funcion: Se encarga se subir los archivos que se envien por el DropZone
     * Quien lo LLama: Una llamada AJAX
     * Retorna: JSON
     */
    public function eliminar_archivo()
    {
        $this->tramite_model->multimedia_persona('update', $this->input->post(), array('estado' => 'INACTIVO'));
    }

    // agregado por jhonatan

    /**
     * Funcion          : Lista todos los Grados Academicos de una sola persona
     * Quien lo LLama   : Una llamada AJAX
     * Retorna          : Especificamente un DataTable()
     */
    public function ajax_listar_capacitacion()
    {
        if ($this->input->is_ajax_request()) {


            $table = 'capacitacion_persona cp, tipo_capacitacion tc ';
            $primaryKey = 'cp.id_capacitacion_persona';
            $where = 'cp.id_tipo_capacitacion = tc.id_tipo_capacitacion and cp.id_persona = ' . $this->input->get('id_persona');
            $columns = [
                ['db' => 'cp.id_capacitacion_persona', 'alias' => 'id_cp', 'dt' => 0],
                ['db' => 'cp.nombre_capacitacion', 'alias' => 'np', 'dt' => 2],
                ['db' => 'cp.institucion_capacitacion', 'alias' => 'ic', 'dt' => 3],
                ['db' => 'cp.fecha_capacitacion', 'alias' => 'fc', 'dt' => 4],
                ['db' => 'cp.estado_capacitacion_persona', 'alias' => 'ec', 'dt' => 5],
                ['db' => 'cp.observacion_capacitacion', 'alias' => 'ocp', 'dt' => 6]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    public function campos_capacitacion_persona()
    {

        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->data['tipos_capacitacion'] = $this->persona_model->tipo_capacitacion(
                'select',
                null,
                null
            );
            $this->data['persona'] = $this->persona_model->persona('select', array('id_persona' => $this->input->post('id_persona')), NULL);

            $this->templater->view_horizontal_admin('persona/campos_capacitacion_persona', $this->data);
        }
    }

    public function actualizar_campos_capacitacion_persona()
    {

        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));

            // listar tipos de capacitacion que existe en la base de datos
            $this->data['tipos_capacitacion'] = $this->persona_model->tipo_capacitacion(
                'select',
                null,
                null
            );
            // listar datos de la persona 
            $this->data['persona'] = $this->persona_model->persona(
                'select',
                array('id_persona' => $this->input->post('id_persona')),
                NULL
            );

            // listar datos de la capacitacion de la persona
            $this->data['capacitacion_persona'] = $this->persona_model->capacitacion_persona(
                'select',
                array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_capacitacion_persona' => $this->input->post('id_capacitacion_persona')
                ),
                null
            );

            $this->templater->view_horizontal_admin('persona/campos_capacitacion_persona', $this->data);
        }
    }

    public function insertar_capacitacion_persona()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_tipo_capacitacion', 'Tipo Capacitacion', 'required');
            $this->form_validation->set_rules('fecha_capacitacion', 'Fecha Capacitacion', 'required|callback_date_valid');
            $this->form_validation->set_rules('nombre_capacitacion', 'Nombre Capacitacion', 'required');
            $this->form_validation->set_rules('institucion_capacitacion', 'Institucion capacitacion', 'required');
            $this->form_validation->set_rules('horas_capacitacion', 'Horas Capacitacion', 'required|numeric');
            $this->form_validation->set_rules('modalidad_capacitacion', 'Modalidad Capacitacion', 'required');
            $this->form_validation->set_rules('calidad_participacion', 'Calidad Participacion', 'required');
            $this->form_validation->set_rules('descripcion_capacitacion', 'Descripcion Capacitacion', 'required');
            $this->form_validation->set_rules('observacion_capacitacion', 'Observacion Capacitacion', 'required');
            $this->form_validation->set_rules('estado_capacitacion_persona', 'Estado Capacitacion', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $datos_form_capacitacion_persona = array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_tipo_capacitacion' => $this->input->post('id_tipo_capacitacion'),
                    'fecha_capacitacion' => $this->input->post('fecha_capacitacion'),
                    'nombre_capacitacion' => mb_convert_case($this->input->post('nombre_capacitacion'), MB_CASE_UPPER),
                    'institucion_capacitacion' => mb_convert_case($this->input->post('institucion_capacitacion'), MB_CASE_UPPER),
                    'horas_capacitacion' => $this->input->post('horas_capacitacion'),
                    'modalidad_capacitacion' => $this->input->post('modalidad_capacitacion'),
                    'calidad_participacion' => mb_convert_case($this->input->post('calidad_participacion'), MB_CASE_UPPER),
                    'descripcion_capacitacion' => mb_convert_case($this->input->post('descripcion_capacitacion'), MB_CASE_UPPER),
                    'observacion_capacitacion' => mb_convert_case($this->input->post('observacion_capacitacion'), MB_CASE_UPPER),
                    'estado_capacitacion_persona' => $this->input->post('estado_capacitacion_persona'),
                );

                // var_dump($datos_form_capacitacion_persona);
                // exit;

                $id_capacitacion_persona = $this->persona_model->capacitacion_persona(
                    'insert',
                    null,
                    $datos_form_capacitacion_persona
                );
                if (is_numeric($id_capacitacion_persona))
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $id_capacitacion_persona]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al insetar el Programa (' . $id_capacitacion_persona . ').']));
            }
        }
    }

    public function actualizar_capacitacion_persona()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_tipo_capacitacion', 'Tipo Capacitacion', 'required');
            $this->form_validation->set_rules('fecha_capacitacion', 'Fecha Capacitacion', 'required|callback_date_valid');
            $this->form_validation->set_rules('nombre_capacitacion', 'Nombre Capacitacion', 'required');
            $this->form_validation->set_rules('institucion_capacitacion', 'Institucion capacitacion', 'required');
            $this->form_validation->set_rules('horas_capacitacion', 'Horas Capacitacion', 'required|numeric');
            $this->form_validation->set_rules('modalidad_capacitacion', 'Modalidad Capacitacion', 'required');
            $this->form_validation->set_rules('calidad_participacion', 'Calidad Participacion', 'required');
            $this->form_validation->set_rules('descripcion_capacitacion', 'Descripcion Capacitacion', 'required');
            $this->form_validation->set_rules('observacion_capacitacion', 'Observacion Capacitacion', 'required');
            $this->form_validation->set_rules('estado_capacitacion_persona', 'Estado Capacitacion', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {

                $datos_form_capacitacion_persona = array(
                    // 'id_persona' => $this->input->post('id_persona'),
                    // 'id_tipo_capacitacion' => $this->input->post('id_tipo_capacitacion'),
                    'fecha_capacitacion' => $this->input->post('fecha_capacitacion'),
                    'nombre_capacitacion' => mb_convert_case($this->input->post('nombre_capacitacion'), MB_CASE_UPPER),
                    'institucion_capacitacion' => mb_convert_case($this->input->post('institucion_capacitacion'), MB_CASE_UPPER),
                    'horas_capacitacion' => $this->input->post('horas_capacitacion'),
                    'modalidad_capacitacion' => $this->input->post('modalidad_capacitacion'),
                    'calidad_participacion' => mb_convert_case($this->input->post('calidad_participacion'), MB_CASE_UPPER),
                    'descripcion_capacitacion' => mb_convert_case($this->input->post('descripcion_capacitacion'), MB_CASE_UPPER),
                    'observacion_capacitacion' => mb_convert_case($this->input->post('observacion_capacitacion'), MB_CASE_UPPER),
                    'estado_capacitacion_persona' => $this->input->post('estado_capacitacion_persona'),
                );

                // var_dump($this->input->post('id_capacitacion_persona'));
                // exit;
                $correcto = $this->persona_model->capacitacion_persona(
                    'update',
                    array(
                        'id_persona' => $this->input->post('id_persona'),
                        'id_capacitacion_persona' => $this->input->post('id_capacitacion_persona')
                    ),
                    $datos_form_capacitacion_persona
                );

                if ($correcto == true)
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al actualizar el Programa (' . $correcto . ').']));
            }
        }
    }

    public function eliminar_capacitacion_persona()
    {

        if ($this->input->is_ajax_request()) {


            $correcto = $this->persona_model->capacitacion_persona(
                'delete',
                array(
                    'id_capacitacion_persona' => $this->input->post('id_capacitacion_persona'),
                ),
                null
            );
            if ($correcto == true)
                $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
            else
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al Eliminar el Programa (' . $correcto . ').']));
        }
    }

    // BLOQUE DE IDIOMA PERSONA
    /**
     * Funcion          : Lista todos los Grados Academicos de una sola persona
     * Quien lo LLama   : Una llamada AJAX
     * Retorna          : Especificamente un DataTable()
     */
    public function ajax_listar_idioma_persona()
    {
        if ($this->input->is_ajax_request()) {
            $table = 'idioma_persona ip, idioma i ';
            $primaryKey = 'ip.id_idioma_persona';
            $where = 'ip.id_idioma = i.id_idioma and ip.id_persona = ' . $this->input->get('id_persona');
            $columns = [
                ['db' => 'ip.id_idioma_persona', 'alias' => 'id_ip', 'dt' => 0],
                ['db' => 'i.descripcion_idioma', 'alias' => 'id', 'dt' => 2],
                ['db' => 'ip.nivel_idioma', 'alias' => 'ni', 'dt' => 3],
                ['db' => 'ip.descripcion_idioma', 'alias' => 'di', 'dt' => 4],
                ['db' => 'ip.estado_idioma_persona', 'alias' => 'eip', 'dt' => 5]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    public function campos_idioma_persona()
    {

        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            // lista todas los idiomas disponibles en la base de datos
            $this->data['tipos_idioma'] = $this->persona_model->idioma(
                'select',
                null,
                null
            );
            // lista los datos de la persona
            $this->data['persona'] = $this->persona_model->persona('select', array('id_persona' => $this->input->post('id_persona')), NULL);

            $this->templater->view_horizontal_admin('persona/campos_idioma_persona', $this->data);
        }
    }
    public function actualizar_campos_idioma_persona()
    {

        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            // lista todas los idiomas disponibles en la base de datos
            $this->data['tipos_idioma'] = $this->persona_model->idioma(
                'select',
                null,
                null
            );
            // lista los datos de la persona
            $this->data['persona'] = $this->persona_model->persona('select', array('id_persona' => $this->input->post('id_persona')), NULL);

            // listar datos idioma de la persona
            $this->data['idioma_persona'] = $this->persona_model->idioma_persona(
                'select',
                array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_idioma_persona' => $this->input->post('id_idioma_persona')
                ),
                null
            );

            $this->templater->view_horizontal_admin('persona/campos_idioma_persona', $this->data);
        }
    }

    public function insertar_idioma_persona()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_idioma', 'Idioma', 'required');
            $this->form_validation->set_rules('nivel_idioma', 'Nivel Idioma', 'required');
            $this->form_validation->set_rules('descripcion_idioma', 'Descripci&oacute;n', 'required');
            $this->form_validation->set_rules('estado_idioma_persona', 'Estado', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $datos_form_idioma_persona = array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_idioma' => $this->input->post('id_idioma'),
                    'nivel_idioma' => $this->input->post('nivel_idioma'),
                    'descripcion_idioma' => mb_convert_case($this->input->post('descripcion_idioma'), MB_CASE_UPPER),
                    'fecha_registro_idioma' => date('Y-m-d'),
                    'id_usuario' =>  $this->usuario['id_persona'],
                    'estado_idioma_persona' => $this->input->post('estado_idioma_persona'),
                );

                // var_dump($datos_form_idioma_persona);
                // exit;

                $id_idioma_persona = $this->persona_model->idioma_persona(
                    'insert',
                    null,
                    $datos_form_idioma_persona
                );
                if (is_numeric($id_idioma_persona))
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $id_idioma_persona]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al insetar el Programa (' . $id_idioma_persona . ').']));
            }
        }
    }

    public function actualizar_idioma_persona()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_idioma', 'Idioma', 'required');
            $this->form_validation->set_rules('nivel_idioma', 'Nivel Idioma', 'required');
            $this->form_validation->set_rules('descripcion_idioma', 'Descripci&oacute;n', 'required');
            $this->form_validation->set_rules('estado_idioma_persona', 'Estado', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {

                $datos_form_idioma_persona = array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_idioma' => $this->input->post('id_idioma'),
                    'nivel_idioma' => $this->input->post('nivel_idioma'),
                    'descripcion_idioma' => mb_convert_case($this->input->post('descripcion_idioma'), MB_CASE_UPPER),
                    'fecha_registro_idioma' => date('Y-m-d'),
                    'id_usuario' =>  $this->usuario['id_persona'],
                    'estado_idioma_persona' => $this->input->post('estado_idioma_persona'),
                );

                // var_dump($this->input->post('id_capacitacion_persona'));
                // exit;
                $correcto = $this->persona_model->idioma_persona(
                    'update',
                    array(
                        'id_persona' => $this->input->post('id_persona'),
                        'id_idioma_persona' => $this->input->post('id_idioma_persona')
                    ),
                    $datos_form_idioma_persona
                );

                if ($correcto == true)
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al actualizar el Programa (' . $correcto . ').']));
            }
        }
    }

    public function eliminar_idioma_persona()
    {

        if ($this->input->is_ajax_request()) {


            $correcto = $this->persona_model->idioma_persona(
                'delete',
                array(
                    'id_idioma_persona' => $this->input->post('id_idioma_persona'),
                ),
                null
            );
            if ($correcto == true)
                $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
            else
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al Eliminar el Programa (' . $correcto . ').']));
        }
    }

    // BLOQUE PRODUCCION INTELECTUAL DE LA PERSONA
    /**
     * Funcion          : Lista todos los Grados Academicos de una sola persona
     * Quien lo LLama   : Una llamada AJAX
     * Retorna          : Especificamente un DataTable()
     */
    public function ajax_listar_produccion_intelectual_persona()
    {
        if ($this->input->is_ajax_request()) {
            $table = 'produccion_intelectual_persona pip, tipo_producion_intelectual tpi';
            $primaryKey = 'pip.id_produccion_intelectual';
            $where = 'pip.id_tipo_produccion_intelectual = tpi.id_tipo_produccion_intelectual and pip.id_persona = ' . $this->input->get('id_persona');
            $columns = [
                ['db' => 'pip.id_produccion_intelectual', 'alias' => 'id_ip', 'dt' => 0],
                ['db' => 'tpi.tipo', 'alias' => 'tipo', 'dt' => 2],
                ['db' => 'pip.titulo_produccion', 'alias' => 'id', 'dt' => 3],
                ['db' => 'pip.anio_edicion', 'alias' => 'ni', 'dt' => 4],
                // ['db' => 'pip.descripcion_produccion', 'alias' => 'di', 'dt' => 4],
                ['db' => 'pip.estado_produccion', 'alias' => 'eip', 'dt' => 5],
                ['db' => 'pip.observacion_produccion', 'alias' => 'op', 'dt' => 6]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    public function campos_produccion_intelectual_persona()
    {

        if ($this->input->is_ajax_request()) {

            $this->load->helper(array('form', 'url'));
            // lista todas los idiomas disponibles en la base de datos
            $this->data['tipos_produccion_intelectual'] = $this->persona_model->tipo_producion_intelectual(
                'select',
                null,
                null
            );
            // lista los datos de la persona
            $this->data['persona'] = $this->persona_model->persona('select', array('id_persona' => $this->input->post('id_persona')), NULL);

            $this->templater->view_horizontal_admin('persona/campos_produccion_intelectual_persona', $this->data);
        }
    }

    public function actualizar_campos_produccion_intelectual_persona()
    {

        if ($this->input->is_ajax_request()) {

            $this->load->helper(array('form', 'url'));
            // lista todas los idiomas disponibles en la base de datos
            $this->data['tipos_produccion_intelectual'] = $this->persona_model->tipo_producion_intelectual(
                'select',
                null,
                null
            );
            // lista los datos de la persona
            $this->data['persona'] = $this->persona_model->persona('select', array('id_persona' => $this->input->post('id_persona')), NULL);

            // listar datos produccion intelectual de la persona
            $this->data['produccion_intelectual_persona'] = $this->persona_model->produccion_intelectual_persona(
                'select',
                array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_produccion_intelectual' => $this->input->post('id_produccion_intelectual')
                ),
                null
            );

            $this->templater->view_horizontal_admin('persona/campos_produccion_intelectual_persona', $this->data);
        }
    }

    public function insertar_produccion_intelectual_persona()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_tipo_produccion_intelectual', 'Tipo Producci&oacute;n Intelectual', 'required');
            $this->form_validation->set_rules('titulo_produccion', 'Titulo Producci&oacute;n Intelectual', 'required');
            $this->form_validation->set_rules('editorial_publicacion', 'Editorial Publicaci&oacute;n', 'required');
            $this->form_validation->set_rules('anio_edicion', 'Año Edición', 'required');
            $this->form_validation->set_rules('numero_paginas', 'Numero Paginas', 'required|numeric');
            // $this->form_validation->set_rules('descripcion_produccion', 'Descripción produccion', 'required');
            // $this->form_validation->set_rules('observacion_produccion', 'Observacion_producción', 'required');
            $this->form_validation->set_rules('estado_produccion', 'Estado', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                // llenamos en un array los datos del formulario form_produccion_intelectual_persona
                $datos_form_produccion_intelectual_persona = array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_tipo_produccion_intelectual' => $this->input->post('id_tipo_produccion_intelectual'),
                    'titulo_produccion' =>  mb_convert_case($this->input->post('titulo_produccion'), MB_CASE_UPPER),
                    'editorial_publicacion' => mb_convert_case($this->input->post('editorial_publicacion'), MB_CASE_UPPER),
                    'anio_edicion' => $this->input->post('anio_edicion'),
                    'numero_paginas' =>  $this->input->post('numero_paginas'),
                    'descripcion_produccion' => mb_convert_case($this->input->post('descripcion_produccion'), MB_CASE_UPPER),
                    'observacion_produccion' => mb_convert_case($this->input->post('observacion_produccion'), MB_CASE_UPPER),
                    'estado_produccion' => $this->input->post('estado_produccion'),
                );

                // var_dump($datos_form_produccion_intelectual_persona);
                // exit;

                $id_produccion_intelectual = $this->persona_model->produccion_intelectual_persona(
                    'insert',
                    null,
                    $datos_form_produccion_intelectual_persona
                );
                if (is_numeric($id_produccion_intelectual))
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $id_produccion_intelectual]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al insetar el Programa (' . $id_produccion_intelectual . ').']));
            }
        }
    }

    public function actualizar_produccion_intelectual_persona()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_tipo_produccion_intelectual', 'Tipo Producci&oacute;n Intelectual', 'required');
            $this->form_validation->set_rules('titulo_produccion', 'Titulo Producci&oacute;n Intelectual', 'required');
            $this->form_validation->set_rules('editorial_publicacion', 'Editorial Publicaci&oacute;n', 'required');
            $this->form_validation->set_rules('anio_edicion', 'Año Edición', 'required');
            $this->form_validation->set_rules('numero_paginas', 'Numero Paginas', 'required|numeric');
            // $this->form_validation->set_rules('descripcion_produccion', 'Descripción produccion', 'required');
            // $this->form_validation->set_rules('observacion_produccion', 'Observacion_producción', 'required');
            $this->form_validation->set_rules('estado_produccion', 'Estado', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {

                // llenamos en un array los datos del formulario form_produccion_intelectual_persona
                $datos_form_produccion_intelectual_persona = array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_tipo_produccion_intelectual' => $this->input->post('id_tipo_produccion_intelectual'),
                    'titulo_produccion' =>  mb_convert_case($this->input->post('titulo_produccion'), MB_CASE_UPPER),
                    'editorial_publicacion' => mb_convert_case($this->input->post('editorial_publicacion'), MB_CASE_UPPER),
                    'anio_edicion' => $this->input->post('anio_edicion'),
                    'numero_paginas' =>  $this->input->post('numero_paginas'),
                    'descripcion_produccion' => mb_convert_case($this->input->post('descripcion_produccion'), MB_CASE_UPPER),
                    'observacion_produccion' => mb_convert_case($this->input->post('observacion_produccion'), MB_CASE_UPPER),
                    'estado_produccion' => $this->input->post('estado_produccion'),
                );

                // var_dump($this->input->post('id_capacitacion_persona'));
                // exit;
                $correcto = $this->persona_model->produccion_intelectual_persona(
                    'update',
                    array(
                        'id_persona' => $this->input->post('id_persona'),
                        'id_produccion_intelectual' => $this->input->post('id_produccion_intelectual')
                    ),
                    $datos_form_produccion_intelectual_persona
                );

                if ($correcto == true)
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al actualizar el Programa (' . $correcto . ').']));
            }
        }
    }

    public function eliminar_produccion_intelectual_persona()
    {

        if ($this->input->is_ajax_request()) {


            $correcto = $this->persona_model->produccion_intelectual_persona(
                'delete',
                array(
                    'id_produccion_intelectual' => $this->input->post('id_produccion_intelectual'),
                ),
                null
            );
            if ($correcto == true)
                $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
            else
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al Eliminar el Programa (' . $correcto . ').']));
        }
    }

    // BLOQUE DE PERFIL DE USUARIO (FUNCIONES NECESARIOAS)
    public function vista_perfil()
    {
        // $this->data['usuario'] = $this->usuario;
        // $this->campos_datos_personales_perfil_usuario($this->usuario['id_persona']);
        // $this->templater->view_horizontal_admin('persona/perfil_usuario', $this->data);

        if ($this->input->is_ajax_request()) {

            $this->data['usuario'] = $this->usuario;
            $this->data['datos_persona'] = $this->persona_model->persona(
                'select',
                array('id_persona' => $this->usuario['id_persona']),
                null
            );
            // var_dump($this->data['datos_persona'][0]['id_persona']);
            // exit();
            $this->data['aea'] = esta_completo_datos_participante($this->data['datos_persona'][0]['id_persona']);

            $this->templater->view_horizontal_admin('persona/perfil_usuario', $this->data);
        }
    }

    public function vista_perfil_campos_datos_personales()
    {
        $this->load->helper('form');
        $this->data['usuario'] = $this->usuario;
        $this->load->model('persona_model');
        $this->data['datos_persona'] = $this->persona_model->persona(
            'select',
            array('id_persona' => $this->usuario['id_persona']),
            null
        );
        $this->data['paises'] = $this->persona_model->pais('select', NULL, NULL, NULL);
        $this->templater->view_horizontal_admin('persona/formulario_perfil_usuario/campos_datos_personales', $this->data);
    }

    public function vista_perfil_campos_datos_bancarios()
    {
        $this->load->helper(array('form', 'url'));
        $this->data['usuario'] = $this->usuario;
        $this->load->model('persona_model');
        $this->data['datos_persona'] = $this->persona_model->persona(
            'select',
            array('id_persona' => $this->usuario['id_persona']),
            null
        );
        $this->data['paises'] = $this->persona_model->pais('select', NULL, NULL, NULL);
        $this->templater->view_horizontal_admin('persona/formulario_perfil_usuario/campos_datos_bancarios', $this->data);
    }

    public function vista_perfil_campos_datos_afp()
    {
        $this->load->helper(array('form', 'url'));
        $this->data['usuario'] = $this->usuario;
        $this->load->model('persona_model');
        $this->data['datos_persona'] = $this->persona_model->persona(
            'select',
            array('id_persona' => $this->usuario['id_persona']),
            null
        );
        $this->data['paises'] = $this->persona_model->pais('select', NULL, NULL, NULL);
        $this->templater->view_horizontal_admin('persona/formulario_perfil_usuario/campos_datos_afp', $this->data);
    }

    public function vista_perfil_campos_datos_seguro_medico()
    {
        $this->load->helper(array('form', 'url'));
        $this->data['usuario'] = $this->usuario;
        $this->load->model('persona_model');
        $this->data['datos_persona'] = $this->persona_model->persona(
            'select',
            array('id_persona' => $this->usuario['id_persona']),
            null
        );
        $this->data['paises'] = $this->persona_model->pais('select', NULL, NULL, NULL);
        $this->templater->view_horizontal_admin('persona/formulario_perfil_usuario/campos_datos_seguro_medico', $this->data);
    }


    public function vista_perfil_campos_formacion_academica()
    {
        $this->data['usuario'] = $this->usuario;
        $this->load->model('persona_model');
        $this->data['datos_persona'] = $this->persona_model->persona(
            'select',
            array('id_persona' => $this->usuario['id_persona']),
            null
        );
        $this->data['paises'] = $this->persona_model->pais('select', NULL, NULL, NULL);
        $this->templater->view_horizontal_admin('persona/formulario_perfil_usuario/campos_formacion_academica_persona', $this->data);
    }
    // fin agregado por jhonatan
}
