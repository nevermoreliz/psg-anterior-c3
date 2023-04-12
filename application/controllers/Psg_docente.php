<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
                                 * @author: Jhonatan Team PSG
                                 * Institucion: Posgrado
                 * Sistema: PSG
 * Módulo: Kardex Docentes
 * Descripcion: El objetivo de este controlador es: Realizar todo tipo de cambios en el personal Docente de POSGRADO
 **/

class Psg_docente extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('persona_model');
        $this->load->model('psg_docente_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    /**
     * Uso: Se encarga de retornar toda una lista de Docentes que son parte de la unidad
     * Retorna: HTML
     */
    public function listar_docentes()
    {
        if ($this->input->is_ajax_request()) {
            $this->templater->view_horizontal_admin('/psg_docente/listar_docentes', $this->data);
        }
    }

    /**
     * Uso: Principalmente lo usara un DataTable con una llamada AJAX para listar todo el contenido de la vista psg_persona
     * Retorna: JSON
     */
    public function ajax_listar_docentes()
    {
        if ($this->input->is_ajax_request()) {

            $table = 'persona p, docente d';
            $primaryKey = 'p.id_persona';
            $where = 'p.id_persona = d.id_persona';

            $columns = [
                ['db' => 'p.ci', 'alias' => 'p_ci', 'dt' => 0],
                ['db' => 'p.nombre', 'alias' => 'p_nombre', 'dt' => 2],
                ['db' => 'p.paterno', 'alias' => 'p_paterno', 'dt' => 3],
                ['db' => 'p.materno', 'alias' => 'p_materno', 'dt' => 4],
                ['db' => 'p.fecha_nacimiento', 'alias' => 'p_fecha_nac', 'dt' => 5],
                ['db' => 'p.celular', 'alias' => 'p_cel', 'dt' => 6],
                ['db' => 'p.id_persona_u', 'alias' => 'id_p_u', 'dt' => 7],
                ['db' => 'p.expedido', 'alias' => 'p_exp', 'dt' => 8],
                ['db' => 'p.id_persona', 'alias' => 'id_p', 'dt' => 9],
                ['db' => 'p.email', 'alias' => 'p_email', 'dt' => 10]
            ];
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
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
            $this->data['persona'] = $this->persona_model->persona('select', array('ci' => $this->input->post('ci')), NULL);
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
     * Funcion: Se encarga de mostrar una vista con los campos necesarios para insertar datos kardex del docente
     * Quien lo LLama: Una llamada AJAX
     * Retorna: HTML
     */
    public function campos_kardex_docente($id_persona = null)
    {
        if ($this->input->is_ajax_request()) {
            if (is_null($this->input->post('id_persona'))) {
                $id_persona = $this->usuario['id_persona'];
            }else{
                $id_persona = $this->input->post('id_persona');
            }
            // $id_persona = $this->input->post('id_persona');
            // $persona = $this->psg_docente_model->datos_persona($id_persona);
            $persona = $this->persona_model->persona(
                'select',
                array(
                    'id_persona' => $id_persona
                ),
                null
            );
            $client = new GuzzleHttp\Client();
            $respuesta = $client->request('GET', 'https://posgrado.upea.bo/api/sic/docencia_pregrado/' . $persona[0]['ci']);
            $datos = json_decode($respuesta->getBody(TRUE)->getContents());
            $this->data['docencia_pregrado'] = $datos;
            // var_dump($this->data['docencia_pregrado']);
            // exit();           

            // ELEMENTOS QUE SE USAN PARA LA PARTE DE DOCNEICA ACADEMICA DE POSTGRADO
            // $this->data['id_persona'] = $this->input->post('id_persona');
            $this->data['id_persona'] = $id_persona;

            // LA PARTE DE 4 : DOCENTE EXTERNO
            $this->data['listar_ejecicio_docente_externo' ]= $this->psg_docente_model->docencia_externo('select',['id_persona'=>$id_persona],null);
            // echo '<pre>';
            // var_dump($this->data['listar_ejecicio_docente_externo']);
            // echo '</pre>';
            // exit();
             //LA PARTE DE 5. EJERCICIO DE DOCENCIA DE POSGRADO 
             $this->data['lista_ejercicio_docencia_posgrado'] = $this->psg_docente_model->listar_ejercicio_persona_posgrado($id_persona);

            //  LISTA DE EMISION DE FORMULARIOS
            $this->data['formularios_emitidos'] = $this->psg_docente_model->Formularios_emitidos('002', $id_persona);


            $this->templater->view_horizontal_admin('/psg_docente/campos_kardex_docente', $this->data);
        }
    }

    /** Bloque docente externo */

    public function listar_ajax_docente_externo_pre_grado()
    {
        if ($this->input->is_ajax_request()) {

            $table = 'docencia_externo de, unidad_academica ua';
            $primaryKey = 'de.id_docencia_externo';
            $where = " de.id_unidad_academica = ua.id_unidad_academica AND de.estado_docencia_externo = 'ACTIVO' AND de.id_persona=".$this->input->get('id_persona') ;

            $columns = [
                ['db' => 'de.id_docencia_externo', 'alias' => 'de_idde', 'dt' => 0],
                ['db' => 'ua.abreviatura', 'alias' => 'ua_abrev', 'dt' => 3],
                ['db' => 'de.descripcion_docencia_externo', 'alias' => 'de_dde', 'dt' => 4],
                ['db' => 'de.carga_horaria', 'alias' => 'de_ch', 'dt' => 5],
                ['db' => 'de.fecha_inicio_docencia', 'alias' => 'de_fid', 'dt' => 6],
                ['db' => 'de.fecha_fin_docencia', 'alias' => 'id_ffd', 'dt' => 7],
                ['db' => 'ua.nombre_unidad_academica', 'alias' => 'ua_idnua', 'dt' => 9],
                ['db' => 'de.id_persona', 'alias' => 'de_idp', 'dt' => 10],
                ['db' => 'de.id_unidad_academica', 'alias' => 'de_idua', 'dt' => 11],
                ['db' => 'de.area_docencia_docente_externo', 'alias' => 'de_adde', 'dt' => 12]
                // ['db' => 'de.id_docencia_externo', 'alias' => 'de_idde', 'dt' => 0],
                // ['db' => 'ua.abreviatura', 'alias' => 'ua_abrev', 'dt' => 2],
                // ['db' => 'de.descripcion_docencia_externo', 'alias' => 'de_dde', 'dt' => 3],
                // ['db' => 'de.carga_horaria', 'alias' => 'de_ch', 'dt' => 4],
                // ['db' => 'de.fecha_inicio_docencia', 'alias' => 'de_fid', 'dt' => 5],
                // ['db' => 'de.fecha_fin_docencia', 'alias' => 'id_ffd', 'dt' => 6],
                // ['db' => 'ua.nombre_unidad_academica', 'alias' => 'ua_idnua', 'dt' => 7],
                // ['db' => 'de.id_persona', 'alias' => 'de_idp', 'dt' => 8],
                // ['db' => 'de.id_unidad_academica', 'alias' => 'de_idua', 'dt' => 9],
                // ['db' => 'de.area_docencia_docente_externo', 'alias' => 'de_adde', 'dt' => 10]
            ];

            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));

        }
    }

    public function campos_docente_externo_pre_grado()
    {
        if ($this->input->is_ajax_request()) {
            $id_persona = $this->input->post('id_persona');
            $this->data['listar_unidad_academica'] = $this->psg_docente_model->unidad_academica(
                'select',

                array('estado_unidad_academica' => 'ACTIVO'),
                null
            );
            $this->data['id_persona'] = $id_persona;
            $this->templater->view_horizontal_admin('/psg_docente/modal_kardex_docente/modal_docente_externo_pre_grado', $this->data);
        }
    }

    public function insertar_campos_docente_externo_pre_grado()
    {
        if ($this->input->is_ajax_request()) {

               /**
             * Se procede a llamar a la libreria para la validacion de los campos
             */
            $this->load->library('form_validation');

            /**
             * Se procede a poner las reglas de validacion propias de Codeigniter
             */
            $this->form_validation->set_rules('id_persona', 'id_persona', 'required');
            $this->form_validation->set_rules('id_unidad_academica', 'id_unidad_academica', 'required');
            $this->form_validation->set_rules('carga_horaria', 'carga_horaria', 'required');
            $this->form_validation->set_rules('fecha_inicio_docencia', 'fecha_inicio_docencia', 'required');
            $this->form_validation->set_rules('fecha_fin_docencia', 'fecha_fin_docencia', 'required');
            $this->form_validation->set_rules('area_docencia_docente_externo', 'area_docencia_docente_externo', 'required');
            $this->form_validation->set_rules('descripcion_docencia_externo', 'descripcion_docencia_externo', 'required');

            if ($this->form_validation->run() == FALSE) {
                /**En caso de que los campos no pasen la validacion se procede a retornar un objeto JSON con los campos erroneos*/
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {


                $fecha_incio_docencia = $this->input->post('fecha_inicio_docencia');
                $fecha_fin_docencia = $this->input->post('fecha_fin_docencia');!

                $datos_form_docente_externo_pre_grado = array(
                    'id_persona' => $this->input->post('id_persona'),
                    'id_unidad_academica' => $this->input->post('id_unidad_academica'),
                    'carga_horaria' => $this->input->post('carga_horaria'),
                    'horario' => "",
                    'turno' => "",
                    'fecha_inicio_docencia' => date('Y-m-d', strtotime(empty($fecha_incio_docencia) ? NULL : $fecha_incio_docencia)),
                    'fecha_fin_docencia' => date('Y-m-d', strtotime(empty($fecha_fin_docencia) ? NULL : $fecha_fin_docencia)),
                    'tipo_docencia_externo' => "",
                    'area_docencia_docente_externo' => trim(mb_convert_case($this->input->post('area_docencia_docente_externo'), MB_CASE_UPPER)),
                    'descripcion_docencia_externo' => trim(mb_convert_case($this->input->post('descripcion_docencia_externo'), MB_CASE_UPPER)),
                    'respaldo_digital_externo' => "",
                    'estado_docencia_externo' => "ACTIVO"
                );

                // var_dump($datos_form_docente_externo_pre_grado);
                // exit();
                $id_docencia_externo = $this->psg_docente_model->docencia_externo(
                    'insert',
                    null,
                    $datos_form_docente_externo_pre_grado
                );

                /** Despues de insertar el registro nos devuelve el id insertado O un error que pudo haber ocurrido en Base de Datos
                 * Se procede a revisar que sea un numero, si lo es enviamos un JSON de retorno para mostrar una alerta de que se a insertado exitosamente el registro
                 */
                if (is_numeric($id_docencia_externo)){
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        'exito' => $id_docencia_externo
                    )));
                }else{
                    /**
                 * En el caso de que no se un numero se retorna un objeto JSON con el error de base de datos
                 */
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        'error' => 'Error al insertar nuevo registro (' . $id_docencia_externo . ').'
                    )));
                }
            }
        }
    }

    public function eliminar_campos_docente_externo_pre_grado()
    {
        if ($this->input->is_ajax_request()) {
            $elimino_correcto= $this->psg_docente_model->docencia_externo(
                'delete',
                array('id_docencia_externo'=>$this->input->post('id_docencia_externo')),
                null
            );
        }
    }
    
    /** fin Bloque docente externo */

    
    function ConsultarPrograma()
    {
        // var_dump($_REQUEST);
        
        
        if ($this->input->post()) {
            $id_gestion = $this->input->post("id_gestion");
  
            $resultado_programa = $this->psg_docente_model->ConsultarPrograma($id_gestion);
            if (!empty($resultado_programa)) {
                echo json_encode($resultado_programa);
            } else {
                echo "error";
            }
         

        } else {
            show_404();
        }
    }

    public function listar_ajax_ejercicio_docencia_posgrado()
    {
        if ($this->input->is_ajax_request()) {

            $table = 'docencia_interno di, planificacion_programa pp,gestion g,unidad u';
            $primaryKey = 'di.id_docencia_interno';
            $where = " pp.id_planificacion_programa = di.id_planificacion_programa AND g.id_gestion = pp.id_gestion AND u.id_unidad = pp.id_unidad AND di.id_persona=".$this->input->get('id_persona') ;

            $columns = [
                ['db' => 'di.id_docencia_interno', 'alias' => 'a', 'dt' => 0],
                ['db' => 'g.gestion', 'alias' => 'b', 'dt' => 3],
                ['db' => 'u.nombre_unidad', 'alias' => 'b1', 'dt' => 4],
                ['db' => 'pp.nombre_programa', 'alias' => 'c', 'dt' => 5],
                ['db' => 'di.nombre_modulo', 'alias' => 'd', 'dt' => 6],
                ['db' => 'di.paralelo', 'alias' => 'e', 'dt' => 7],
                ['db' => 'di.carga_horaria', 'alias' => 'f', 'dt' => 8],
                ['db' => 'di.fecha_inicio', 'alias' => 'g', 'dt' => 10],
                ['db' => 'di.fecha_fin', 'alias' => 'h', 'dt' => 11]

                // ['db' => 'di.id_docencia_interno', 'alias' => 'a', 'dt' => 0],
                // ['db' => 'g.gestion', 'alias' => 'b', 'dt' => 2],
                // ['db' => 'pp.nombre_programa', 'alias' => 'c', 'dt' => 3],
                // ['db' => 'di.nombre_modulo', 'alias' => 'd', 'dt' => 4],
                // ['db' => 'di.paralelo', 'alias' => 'e', 'dt' => 5],
                // ['db' => 'di.carga_horaria', 'alias' => 'f', 'dt' => 6],
                // ['db' => 'di.fecha_inicio', 'alias' => 'g', 'dt' => 7],
                // ['db' => 'di.fecha_fin', 'alias' => 'h', 'dt' => 8]
                // ['db' => 'di.fecha_fin', 'alias' => 'i', 'dt' => 11]
            ];

            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));

        }
    }

    public function campos_ejercicio_docencia_posgrado()
    {
        if ($this->input->is_ajax_request()) {
            $this->data['lista_programa'] = $this->psg_docente_model->planificacion_programa(
                'select',
                array(
                    'estado_programa'=>'ACTIVO'
                ),
                null
            );
            $this->data['lista_gestion'] = $this->psg_docente_model->gestion(
                'select',
                array(
                    'estado_gestion'=>'ACTIVO'
                ),
                null
            );
            $this->data['lista_tipo_modulo'] = $this->psg_docente_model->tipo_modulo(
                'select',
              null,
              null
            );
            $id_persona = $this->input->post('id_persona');
            $this->data['id_persona'] = $id_persona;

            $this->templater->view_horizontal_admin('/psg_docente/modal_kardex_docente/modal_ejercicio_docencia_posgrado', $this->data);
        }
    }


    public function insertar_campos_ejercicio_docencia_posgrado()
    {
        if ($this->input->is_ajax_request()) {

            /**
          * Se procede a llamar a la libreria para la validacion de los campos
          */
         $this->load->library('form_validation');

         /**
          * Se procede a poner las reglas de validacion propias de Codeigniter
          */
        //  $this->form_validation->set_rules('id_planificacion_programa', 'id_planificacion_programa', 'required');
        //  $this->form_validation->set_rules('id_tipo_modulo', 'id_tipo_modulo', 'required');
        //  $this->form_validation->set_rules('nombre_modulo', 'nombre_modulo', 'required');
        //  $this->form_validation->set_rules('numero_modulo', 'numero_modulo', 'required');
        //  $this->form_validation->set_rules('nro_nombramiento', 'nro_nombramiento', 'required');
        //  $this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'required');
        //  $this->form_validation->set_rules('fecha_fin', 'fecha_fin', 'required');
        //  $this->form_validation->set_rules('carga_horaria', 'carga_horaria', 'required');
        //  $this->form_validation->set_rules('descripcion_docencia_interno', 'descripcion_docencia_interno', 'required');
        //  $this->form_validation->set_rules('modalidad_ingreso', 'modalidad_ingreso', 'required');
        //  $this->form_validation->set_rules('paralelo', 'paralelo', 'required');
        //  $this->form_validation->set_rules('turno', 'turno', 'required');
         $this->form_validation->set_rules('lugar_clases', 'lugar_clases', 'required');

         if ($this->form_validation->run() == FALSE) {
             /**En caso de que los campos no pasen la validacion se procede a retornar un objeto JSON con los campos erroneos*/
             $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
         } else {


             $fecha_inicio = $this->input->post('fecha_inicio');
             $fecha_fin = $this->input->post('fecha_fin');

             $datos_form_ejercicio_docencia_posgrado = array(
                 'id_persona' => $this->input->post('id_persona'),
                //  'id_unidad_academica' => $this->input->post('id_unidad_academica'),
                 'carga_horaria' => $this->input->post('carga_horaria'),
                //  'horario' => "",
                 'turno' => $this->input->post('turno'),

                 "fecha_inicio" => date('Y-m-d', strtotime(empty($fecha_inicio) ? NULL : $fecha_inicio)),
                 "fecha_fin" => date('Y-m-d', strtotime(empty($fecha_fin) ? NULL : $fecha_fin)),
                 'tipo_docencia_interno' => $this->input->post('tipo_docencia_interno'),
                // 'asignatura' => "",
                // 'area_docencia_docente_interno' => "",
                // 'respaldo_digital' => "",
                'descripcion_docencia_interno' => trim(mb_convert_case($this->input->post('descripcion_docencia_interno'), MB_CASE_UPPER)),
                'estado_docencia_interno' => "ACTIVO",
                'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                'id_tipo_modulo' => $this->input->post('id_tipo_modulo'),
                'numero_modulo' => $this->input->post('numero_modulo'),
                'nombre_modulo' => trim(mb_convert_case($this->input->post('nombre_modulo'), MB_CASE_UPPER)),
                'nro_nombramiento' => $this->input->post('nro_nombramiento'),
                'modalidad_ingreso' =>$this->input->post('modalidad_ingreso') ,
                'paralelo' => $this->input->post('paralelo'),
                'lugar_clases' => trim(mb_convert_case($this->input->post('lugar_clases'), MB_CASE_UPPER)),
             );

             // var_dump($datos_form_ejercicio_docencia_posgrado);
             // exit();
             $id_docencia_interno = $this->psg_docente_model->docencia_interno(
                 'insert',
                 null,
                 $datos_form_ejercicio_docencia_posgrado
             );

             /** Despues de insertar el registro nos devuelve el id insertado O un error que pudo haber ocurrido en Base de Datos
              * Se procede a revisar que sea un numero, si lo es enviamos un JSON de retorno para mostrar una alerta de que se a insertado exitosamente el registro
              */
             if (is_numeric($id_docencia_interno)){
                 $this->output->set_content_type('application/json')->set_output(json_encode(array(
                     'exito' => $id_docencia_interno
                 )));
             }else{
                 /**
              * En el caso de que no se un numero se retorna un objeto JSON con el error de base de datos
              */
                 $this->output->set_content_type('application/json')->set_output(json_encode(array(
                     'error' => 'Error al insertar nuevo registro (' . $id_docencia_interno . ').'
                 )));
             }
         }
     }
    }

    /** Elimina tanto para ejercicio docencia y coordinacion posgrado */
    public function eliminar_campos_ejercicio_docencia_posgrado()
    {
        if ($this->input->is_ajax_request()) {
            $elimino_correcto= $this->psg_docente_model->docencia_interno(
                'delete',
                array('id_docencia_interno'=>$this->input->post('id_docencia_interno')),
                null
            );
        }
    }

    public function campos_ejercicio_coordinacion_posgrado()
    {
        if ($this->input->is_ajax_request()) {
            $this->data['lista_programa'] = $this->psg_docente_model->planificacion_programa(
                'select',
                array(
                    'estado_programa'=>'ACTIVO'
                ),
                null
            );
            $this->data['lista_gestion'] = $this->psg_docente_model->gestion(
                'select',
                array(
                    'estado_gestion'=>'ACTIVO'
                ),
                null
            );
            $this->data['lista_tipo_modulo'] = $this->psg_docente_model->tipo_modulo(
                'select',
              null,
              null
            );
            $id_persona = $this->input->post('id_persona');
            $this->data['id_persona'] = $id_persona;

            $this->templater->view_horizontal_admin('/psg_docente/modal_kardex_docente/modal_ejercicio_coordinacion_posgrado', $this->data);
        }
    }

    public function insertar_campos_ejercicio_coordinacion_posgrado()
    {
        if ($this->input->is_ajax_request()) {

            /**
          * Se procede a llamar a la libreria para la validacion de los campos
          */
         $this->load->library('form_validation');

         /**
          * Se procede a poner las reglas de validacion propias de Codeigniter
          */
         $this->form_validation->set_rules('id_planificacion_programa', 'id_planificacion_programa', 'required');
        //  $this->form_validation->set_rules('id_tipo_modulo', 'id_tipo_modulo', 'required');
        //  $this->form_validation->set_rules('nombre_modulo', 'nombre_modulo', 'required');
        //  $this->form_validation->set_rules('numero_modulo', 'numero_modulo', 'required');
        //  $this->form_validation->set_rules('nro_nombramiento', 'nro_nombramiento', 'required');
        //  $this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'required');
        //  $this->form_validation->set_rules('fecha_fin', 'fecha_fin', 'required');
        //  $this->form_validation->set_rules('carga_horaria', 'carga_horaria', 'required');
        //  $this->form_validation->set_rules('descripcion_docencia_interno', 'descripcion_docencia_interno', 'required');
        //  $this->form_validation->set_rules('modalidad_ingreso', 'modalidad_ingreso', 'required');
        //  $this->form_validation->set_rules('paralelo', 'paralelo', 'required');
        //  $this->form_validation->set_rules('turno', 'turno', 'required');
        //  $this->form_validation->set_rules('lugar_clases', 'lugar_clases', 'required');

         if ($this->form_validation->run() == FALSE) {
             /**En caso de que los campos no pasen la validacion se procede a retornar un objeto JSON con los campos erroneos*/
             $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
         } else {


             $fecha_inicio = $this->input->post('fecha_inicio');
             $fecha_fin = $this->input->post('fecha_fin');

             $datos_form_ejercicio_coordinacion_posgrado = array(
                 'id_persona' => $this->input->post('id_persona'),
                //  'id_unidad_academica' => $this->input->post('id_unidad_academica'),
                 'carga_horaria' => $this->input->post('carga_horaria'),
                //  'horario' => "",
                //  'turno' => $this->input->post('turno'),
                 "fecha_inicio" => date('Y-m-d', strtotime(empty($fecha_inicio) ? NULL : $fecha_inicio)),
                 "fecha_fin" => date('Y-m-d', strtotime(empty($fecha_fin) ? NULL : $fecha_fin)),
                 'tipo_docencia_interno' => $this->input->post('tipo_docencia_interno'),
                // 'asignatura' => "",
                // 'area_docencia_docente_interno' => "",
                // 'respaldo_digital' => "",
                'descripcion_docencia_interno' =>'De '.date('Y-m-d', strtotime(empty($fecha_inicio) ? NULL : $fecha_inicio)). ' a ' .date('Y-m-d', strtotime(empty($fecha_fin) ? NULL : $fecha_fin)).' . ' . trim(mb_convert_case($this->input->post('descripcion_docencia_interno'), MB_CASE_UPPER)),
                'estado_docencia_interno' => "ACTIVO",
                'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                // 'id_tipo_modulo' => $this->input->post('id_tipo_modulo'),
                // 'numero_modulo' => $this->input->post('numero_modulo'),
                // 'nombre_modulo' => trim(mb_convert_case($this->input->post('nombre_modulo'), MB_CASE_UPPER)),
                'nro_nombramiento' => $this->input->post('nro_nombramiento'),
                'modalidad_ingreso' =>'INVITADO' ,
                // 'paralelo' => $this->input->post('paralelo'),
                // 'lugar_clases' => trim(mb_convert_case($this->input->post('lugar_clases'), MB_CASE_UPPER)),
             );

             // var_dump($datos_form_ejercicio_docencia_posgrado);
             // exit();
             $id_docencia_interno = $this->psg_docente_model->docencia_interno(
                 'insert',
                 null,
                 $datos_form_ejercicio_coordinacion_posgrado
             );

             /** Despues de insertar el registro nos devuelve el id insertado O un error que pudo haber ocurrido en Base de Datos
              * Se procede a revisar que sea un numero, si lo es enviamos un JSON de retorno para mostrar una alerta de que se a insertado exitosamente el registro
              */
             if (is_numeric($id_docencia_interno)){
                 $this->output->set_content_type('application/json')->set_output(json_encode(array(
                     'exito' => $id_docencia_interno
                 )));
             }else{
                 /**
              * En el caso de que no se un numero se retorna un objeto JSON con el error de base de datos
              */
                 $this->output->set_content_type('application/json')->set_output(json_encode(array(
                     'error' => 'Error al insertar nuevo registro (' . $id_docencia_interno . ').'
                 )));
             }
         }
     }
    }
    // SECCION PARA AGREGAR NUEVO DOCENTE
    
    public function vista_nuevo_docente()
    {
        if ($this->input->is_ajax_request()) {
            $this->data['lista_programa'] = $this->psg_docente_model->planificacion_programa(
                'select',
                array(
                    'estado_programa'=>'ACTIVO'
                ),
                null
            );

            $this->data['lista_gestion'] = $this->psg_docente_model->gestion(
                'select',
                array(
                    'estado_gestion'=>'ACTIVO'
                ),
                null
            );
            
            $this->data['lista_tipo_modulo'] = $this->psg_docente_model->tipo_modulo(
                'select',
              null,
              null
            );
            
            $this->data['lista_persona_no_docente']=$this->psg_docente_model->listar_personas_no_docentes();
            
            $id_persona = $this->input->post('id_persona');
            
            $this->data['id_persona'] = $id_persona;

            $this->templater->view_horizontal_admin('/psg_docente/modal_kardex_docente/vista_nuevo_docente', $this->data);
        }
    }

    public function listar_ajax_personas_no_docentes()
    {
        if ($this->input->is_ajax_request()) {

            if ($this->input->is_ajax_request()) {
                $table = 'persona';
                $primaryKey = 'id_persona';

                $columns = array(
                    ['db' => 'id_persona', 'alias' => 'id_persona', 'dt' => 0],
                    ['db' => 'ci', 'alias' => 'ci', 'dt' => 2],
                    ['db' => "concat(nombre,'<br>',paterno,' ',materno)", 'alias' => 'nombre', 'dt' => 3], 
                    // ['db' => 'nombre', 'alias' => 'nombre', 'dt' => 3],                     
                    ['db' => 'email', 'alias' => 'email', 'dt' => 4],
                    ['db' => 'celular', 'alias' => 'celular', 'dt' => 5],
                );

                // $columns = array(
                //     array('db' => 'id_persona', 'dt' => 0),
                //     array('db' => 'ci', 'dt' => 2),
                //     array('db' => 'nombre', 'dt' => 3),
                //     // array('db' => "concat(nombre,paterno)", 'dt' => 3),
                //     array('db' => 'paterno', 'dt' => 4),                    
                //     array('db' => 'email', 'dt' => 5),
                //     array('db' => 'celular', 'dt' => 6)
                // );
                
                $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
                $this->output->set_content_type('application/json')->set_output(json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)));
                }
    
        }
    }

    // FIN SECCION PARA AGREGAR NUEVO DOCENTE

}