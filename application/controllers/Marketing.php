<?php defined('BASEPATH') or exit('No direct script access allowed');
/**  
 *  Institucion: Posgrado
 *  Sistema: PSG
 *  Módulo: Marketing
 *  Descripción: (del controlador) este controlador: Respondera a eventos
 *  (usualmente acciones del usuario) e invoca peticiones al 'modelo: Marketing_model'
 *  cuando se hace alguna solicitud sobre la información
 *  @author: jhonatan flores team psg
 *  Fecha: 13/05/2020
 **/
// class Marketing extends PSG_Controller
class Marketing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('marketing_model');
        $this->load->model('persona_model');
        $this->load->model('auth_model');
        $this->load->helper('form');
    }

    /**
     *  Descripción del método:
     *  invoca el contenido para la pagina principal  
     **/
    public function index()
    {
        /**
         * Descripcion foreach :
         * Comprueba si alguna publicacion ya no es vigente y lo cambia estado_publicacion
         * a FINALIZADO,si sigue vigente no hace nada
         */

        foreach ($this->marketing_model->listar_publicacion() as $publicacion) {

            if (date('Y-m-d') > $publicacion->fecha_fin_publicidad) {

                $this->sql_psg->modificar_tabla('publicacion', ['estado_publicacion' => 'FINALIZADO'], ['id_publicacion' => $publicacion->id_publicacion]);
            }
        }

        /** lista todas las publicaciones que son vigentes */
        $this->data['afiches'] = $this->marketing_model->listar_publicacion(
            "(pub.estado_publicacion='PUBLICADO' OR pub.estado_publicacion='INFORMACIONES') AND mp.img_principal=1"
        );
        // var_dump($this->data['afiches']);
        // exit();

        /** lista todas las etiquetas */
        $this->data['listar_etiquetas'] = $this->marketing_model->listar_etiquetas();
        // var_dump($this->data['listar_etiquetas']);
        // exit();

        // enviar datos a la vista index de Views/Marketing/index.php
        $this->templater->view_horizontal('marketing/index', $this->data);
    }

    // detalle programa
    /**
     *  Descripción del método:
     *  invoca el contenido al ingresar a un programa
     **/
    public function detalle_programa($nombre_tipo_programa, $id_publicacion)
    {

        // var_dump($descripcion_grado_academico);
        // var_dump($nombre_tipo_programa);
        // var_dump($id_publicacion);
        // var_dump($ci);
        // exit;

        if ($nombre_tipo_programa == 'no-escolarizado') {
            $nombre_tipo_programa = 'no escolarizado';
        }

        // convierte en mayusculas los parametros recibidos de tipo de programa
        $mayusculas_tipo_progama = mb_convert_case($nombre_tipo_programa, MB_CASE_UPPER);
        // var_dump($mayusculas_tipo_progama);
        // exit();

        /**
         * listar datos de una publicacion con estados "PUBLICADO" O "INFORMACIONES" y con imagne principal tambien igualando
         * los parametros que nos mandan para asegurar que es el programa que quiere ver el detalle 
         */
        $listar_publicaciones = $this->marketing_model->listar_publicacion(
            "(pub.estado_publicacion = 'PUBLICADO' OR pub.estado_publicacion = 'INFORMACIONES') AND mp.img_principal = 1 AND pub.id_publicacion = $id_publicacion AND tp.nombre_tipo_programa = '$mayusculas_tipo_progama'"
        );
        // echo '<pre>';
        // var_dump($listar_publicaciones);
        // echo '</pre>';
        // exit();

        /** sacamos el campo estado_publicacion en una variable */
        $estado_publicacion = $listar_publicaciones[0]->estado_publicacion;
        // echo '<pre>';
        // var_dump($estado_publicacion);
        // echo '</pre>';
        // exit();

        /** Descripcion :
         *  realiza la verificacion si el campo estado_publicacion es True de la publicacion,
         *  POR VERDAD : realzamos la consulta al modelo marketing_model la publicacion del programa,
         *  y las imagenes
         *  POR FALSO : como no hay una pubicacion vigente se redirecciona a la pagina principal
         */
        if ($estado_publicacion != 'FINALIZADO' || $estado_publicacion != 'OBSERVADO') {



            $this->data['id_publicacion'] = $id_publicacion;
            // var_dump($id_publicacion);
            // exit();

            // campos prueba para la inscripcion
            $this->data['publicacion_detalle'] = $listar_publicaciones[0];
            // echo '<pre>';
            // var_dump($this->data['publicacion_detalle']);
            // echo '</pre>';
            // exit;

            $this->templater->view_horizontal('marketing/detalle_programa', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
        // $this->templater->view_horizontal('marketing/detalle_programa', $this->data);

    }

    // fin detalle programa

    // bloque modal
    /**
     *  Descripción del método:
     *  invoca el contenido al ingresar a un programa
     **/
    public function campos_interesado()
    {
        if ($this->input->is_ajax_request()) {
            /** Descripcion :
             *  realiza una consulta al modelo y selecciona una publicacion con estado_publicacion en True y los 
             *  valores que nos envia a la funcion con los campos respectivos
             */
            // $idp = $this->input->post('idp');
            $id_publicacion = $this->input->post('idp');
            // var_dump($id_publicacion);
            // exit();

            // listar datos de una publicacion para el modal
            $listar_publicaciones = $this->marketing_model->listar_publicacion(
                "pub.id_publicacion = $id_publicacion AND ((pub.estado_publicacion='PUBLICADO' OR pub.estado_publicacion='INFORMACIONES') AND mp.img_principal=1)"
            );
            // echo '<pre>';
            // var_dump($listar_publicaciones);
            // echo '</pre>';
            // exit();

            $this->data['publicacion_detalle'] = $listar_publicaciones;
            $this->data['denominacion'] = $this->input->post('d');
            $this->data['id_publicacion'] = $this->input->post('idp');
            $this->templater->view_horizontal('marketing/modales/modal_interesado', $this->data);
        }
    }

    // formularios bloque

    /** Descripcion : tiene la funcion de insertar un nuevo interesado, a un programa diferente
     *  y actualizar si vuelve a pedir mas informacion en el mismo programa
     * TODO:funcional
     */
    public function enviar_mas_informacion_interesados()
    {
        $this->load->library('form_validation');

        /** seccion de validacion de formularios */
        $this->form_validation->set_rules('email', 'email', 'valid_email|trim');
        $this->form_validation->set_rules('celular', 'celular', 'required|numeric|trim');

        if ($this->form_validation->run() == false) {

            $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
        } else {

            $email = $this->input->post('email');
            // var_dump($email);
            // exit();
            // TODO: si llena el correo electronico enviarle un correo electronico 

            $celular = $this->input->post('celular');
            // var_dump($celular);
            // exit();

            // var_dump($this->marketing_model->listar_publicacion(array('pub.id_publicacion' => $this->input->post('idp'))));
            // exit;
            //diplomado en (nombre_programa) version - V , En su modalidad (semi presencial)
            $id_publicacion = $this->input->post('idp');
            // $programa_publicado = $this->marketing_model->listar_publicacion(array('pub.id_publicacion' => $this->input->post('idp')));
            $programa_publicado = $this->marketing_model->listar_publicacion("pub.id_publicacion = $id_publicacion AND (pub.estado_publicacion='PUBLICADO' OR pub.estado_publicacion='INFORMACIONES') AND mp.img_principal=1");
            // var_dump($programa_publicado);
            // exit();

            // sacamos el nombre del programa en una variable
            $nombre_programa = $programa_publicado[0]->nombre_programa;

            // sacamos el grado academico del programa
            $grado_academico = $programa_publicado[0]->descripcion_grado_academico;

            // descripcion del programa
            $descripcion_publicacion_programa = "VERSION - " . $programa_publicado[0]->numero_version . ", " . $programa_publicado[0]->gestion  . " EN SU MODALIDAD (" . $programa_publicado[0]->nombre_tipo_programa . ")";

            // sacamos en la variable la descripcionde la sede del programa
            $sede_unidad_descripcion = $programa_publicado[0]->tipo_unidad . ": " .  $programa_publicado[0]->nombre_unidad . ", " . $programa_publicado[0]->denominacion_sede;

            // http://posgrado.upea.bo/diplomado/semi-presencial/1
            // url del programa amigable para direccionar
            $url_detalle_programa = base_url(mb_convert_case((($grado_academico == 'MAESTRÍA') ? 'maestria' : $grado_academico) . '/' . str_replace(" ", "-", $programa_publicado[0]->nombre_tipo_programa) . '/' . $this->input->post('idp'), MB_CASE_LOWER));

            // mensajes motivasionales
            $mensajes_motivasionales_array = array(
                'La paciencia puede ser vista como una capacidad que permite aprenderlo todo. (anonimo)',
                'Visualizar el “yo ideal” es una buena manera de motivarse, así que merece la pena recordar esta frase de Edison. (anonimo)',
                'Que nadie detenga tu conocimiento. (Posgrado U.P.E.A)',
            );

            // cargamos en una variable aleatoreamente a la variable
            $random_mensaje_motivacional = $mensajes_motivasionales_array[rand(0, count($mensajes_motivasionales_array))];

            // mensaje que se enviara al numero de whatsapp
            $mensaje = "$random_mensaje_motivacional %0ACapacítate y mejora tus conocimientos, inscribiéndote a nuestro programa: %0A$grado_academico EN *$nombre_programa* %0A$descripcion_publicacion_programa %0A$sede_unidad_descripcion %0AMás Información %0A$url_detalle_programa %0AGracias por Visitarnos No pierdas la oportunidad";

            // url api whatsapp para enviar el mensaje a un numero
            $url_whatsapp = "https://api.whatsapp.com/send?phone=591$celular&text=$mensaje";

            /* seccion de errores */
            if (!empty($celular)) {
                $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'url' => $url_whatsapp,
                    )));
            } else {
                $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'error' => 'Error al intentar enviar mensajes.',
                    )));
            }
            /* fin seccion de errores */
        }
    }

    // fin formularios bloque

    public function insertar_campos_preinscripcion()
    {

        $this->load->library('form_validation');
        /** seccion de validacion de formularios */
        $this->form_validation->set_rules('ci', 'ci', 'required|min_length[5]|max_length[20]|callback_ci_validation');
        $this->form_validation->set_rules('img_ci_delante', 'Imagen de Carnet de Identidad (ANVERSO)', 'callback_file_check[img_ci_delante, Fotografía o imagen del CI anverso , jpg jpeg png JPG JPEG PNG]');
        $this->form_validation->set_rules('img_ci_atras', 'Imagen de Carnet de Identidad (REVERSO)', 'callback_file_check[img_ci_atras, Fotografía o imagen del CI reverso , jpg jpeg png JPG JPEG PNG]');

        $this->form_validation->set_rules('expedido', 'expedido', 'required|callback_expedido_validation');
        $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[50]');
        $this->form_validation->set_rules('paterno', 'paterno', 'required|max_length[50]');
        $this->form_validation->set_rules('materno', 'materno', 'required|max_length[50]');
        $this->form_validation->set_rules('genero', 'genero', 'required|callback_genero_validation');

        // $this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required');
        $this->form_validation->set_rules('diax', 'dia', 'required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('mesx', 'mes', 'required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('aniox', 'aniox', 'required|numeric|is_natural_no_zero');

        $this->form_validation->set_rules('lugar_nacimiento', 'lugar_nacimiento', 'required');
        $this->form_validation->set_rules('ciudad_donde_vive', 'ciudad_donde_vive', 'required');
        $this->form_validation->set_rules('domicilio', 'domicilio', 'required');
        $this->form_validation->set_rules('id_pais_nacionalidad', 'id_pais_nacionalidad', 'required');

        // no existe campo en tabla persona externa
        $this->form_validation->set_rules('estado_civil', 'estado_civil', 'required|callback_estado_civil_validation');

        $this->form_validation->set_rules('oficio_trabajo', 'oficio_trabajo', 'required');
        $this->form_validation->set_rules('celular', 'celular', 'required|numeric|is_natural|max_length[8]|min_length[8]');
        $this->form_validation->set_rules('telefono', 'telefono', 'numeric|is_natural|max_length[10]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        // no existe campo en tabla persona externa
        // $this->form_validation->set_rules('grado_academico', 'grado_academico', 'required');
        // $this->form_validation->set_rules('profesion', 'profesion', 'required');
        // $this->form_validation->set_rules('area_especializacion', 'area_especializacion', 'required');
        $this->form_validation->set_rules('img_diploma_academico', 'Imagen Diploma', 'callback_file_check[img_diploma_academico, Fotografía o imagen del Diploma ,jpg jpeg png JPG JPEG PNG]');

        $this->form_validation->set_rules('img_dep_matricula', 'Imagen deposito Matricula', 'callback_file_check[img_dep_matricula, Fotografía o imagen del Depósito de la matricula ,jpg jpeg png JPG JPEG PNG]');
        $this->form_validation->set_rules('numero_deposito_matricula', 'nro_deposito_matricula', 'required|numeric|is_natural|max_length[40]');
        $this->form_validation->set_rules('fecha_deposito_matricula', 'fecha_deposito_matricula', 'required|callback_date_valid[f_deposito]');

        if (!empty($this->input->post('img_dep_cuota_ini')) || !empty($this->input->post('numero_deposito_cuota_inicial')) || !empty($this->input->post('fecha_deposito_inicial'))) {
            $this->form_validation->set_rules('img_dep_cuota_ini', 'Imagen deposito cuota inicial', 'callback_file_check[img_dep_cuota_ini, Fotografía o imagen del Depósito de cuota inicial ,jpg jpeg png JPG JPEG PNG]');
            $this->form_validation->set_rules('numero_deposito_cuota_inicial', 'nro_deposito_cuota_ini', 'required|numeric|is_natural|max_length[40]');
            $this->form_validation->set_rules('fecha_deposito_inicial', 'fecha_deposito_inicial', 'required|callback_date_valid');
        }



        if ($this->form_validation->run() == false) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
        } else {
            $programa_a_registrarse = $this->marketing_model->comprobar_programa(['id_publicacion' => $this->input->post('id_publicacion')]);
            $datos_persona_programa_interesado = $this->marketing_model->persona_inscrita(
                [
                    'p.ci' => $this->input->post('ci'),
                    'ins.id_planificacion_programa' => $programa_a_registrarse->id_planificacion_programa
                ]
            );

            $persona = $this->sql_psg->listar_tabla('persona', ['ci' => $this->input->post('ci')], null, 'row');

            if (empty($persona)) {

                $datos_persona = array(
                    'ci' => $this->input->post('ci'),
                    'expedido' => $this->input->post('expedido'),
                    // 'tipo_documento' => $this->input->post('tipo_documento'),
                    'tipo_documento' => 'CI',
                    'nombre' => mb_convert_case($this->input->post('nombre'), MB_CASE_UPPER),
                    'paterno' => mb_convert_case($this->input->post('paterno'), MB_CASE_UPPER),
                    'materno' => mb_convert_case($this->input->post('materno'), MB_CASE_UPPER),
                    // 'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
                    'fecha_nacimiento' => $this->input->post('aniox') . '-' . $this->input->post('mesx') . '-' . $this->input->post('diax'),
                    'genero' => $this->input->post('genero'),
                    'estado_civil' => $this->input->post('estado_civil'),
                    'id_pais_nacionalidad' => $this->input->post('id_pais_nacionalidad'),
                    'domicilio' => mb_convert_case($this->input->post('domicilio'), MB_CASE_UPPER),
                    'lugar_nacimiento' => mb_convert_case($this->input->post('lugar_nacimiento'), MB_CASE_UPPER),
                    // 'imagen_persona' => $this->input->post('imagen_persona'),
                    'email' => $this->input->post('email'),
                    'oficio_trabajo' => mb_convert_case($this->input->post('oficio_trabajo'), MB_CASE_UPPER),
                    'telefono' => $this->input->post('telefono'),
                    'celular' => $this->input->post('celular'),
                    'estado_persona' => 'REGISTRADO',
                    // 'ciudad_donde_vive' => $this->input->post('ciudad_donde_vive'),
                    'fecha_registro_persona' =>  date('Y-m-d H:i:s'),
                );

                $id_persona = $this->sql_psg->insertar_tabla('persona', $datos_persona);

                // datos de una persona nueva preinscribiendose a un programa
                $datos_preinscripcion = array(
                    'id_persona' => $id_persona,
                    'id_planificacion_programa' => $programa_a_registrarse->id_planificacion_programa,
                    'fecha_inscripcion' => date('Y-m-d H:i:s'),
                    'numero_deposito_matricula' => $this->input->post('numero_deposito_matricula'),
                    'fecha_deposito_matricula' => $this->input->post('fecha_deposito_matricula'),
                    'numero_deposito_cuota_inicial' => empty($this->input->post('numero_deposito_cuota_inicial')) ? null : $this->input->post('numero_deposito_cuota_inicial'),
                    'fecha_deposito_inicial' => empty($this->input->post('fecha_deposito_inicial')) ? null : $this->input->post('fecha_deposito_inicial'),
                    'estado_inscripcion' => 'REGISTRADO', //preinscrito = Registrado
                    // 'id_usuario' => $this->usuario['id_persona']
                );


                // insertar a la tabla psg_inscripcion a un nuevo posgraduante
                $id_preinscripcion = $this->sql_psg->insertar_tabla('inscripcion', $datos_preinscripcion);
                // var_dump($id_preinscripcion);
                // exit();

                // insertar imagenes ci atras y adelante
                $ruta = 'img/inscripciones';
                $carnet_delante = $this->subir(
                    $ruta,
                    array(
                        'allowed_types' => 'jpg|jpeg|png|',
                        'max_size' => '30240',
                        'file_name' => $id_persona . '_ci_delante_' . date('Ymd_His')
                    ),
                    'img_ci_delante',
                    $_FILES['img_ci_delante']
                );

                $datos_multimedia_ci_delante = array(
                    'nombre_archivo' => $carnet_delante[0]['file_name'],
                    'extension_archivo' => $carnet_delante[0]['file_ext'],
                    'fecha_registro' => date('Y-m-d'),
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'tamano_archivo' =>  str_replace(',', '.', $carnet_delante[0]['file_size']),
                    'ruta_archivo' => $ruta . '/' . $carnet_delante[0]['file_name'],
                    'etiqueta' => 'CI_ANVERSO',
                    'estado_archivo' => 'REGISTRADO',
                );

                $id_multi_ci_delante = $this->sql_psg->insertar_tabla('multimedia', $datos_multimedia_ci_delante);

                // inserta la foto de ci anverso a la tabla multimedia_persona
                $id_multi_persona_ci_delante = $this->sql_psg->insertar_tabla('psg_multimedia_persona', [
                    'id_multimedia' => $id_multi_ci_delante,
                    'id_persona' => $id_persona,
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'estado_multimedia_persona' => 'REGISTRADO'
                ]);

                /** BLOQUE DE IMAGEN CI REVERSO */
                $ruta = 'img/inscripciones';
                $carnet_atras = $this->subir(
                    $ruta,
                    array(
                        'allowed_types' => 'jpg|jpeg|png|',
                        'max_size' => '30240',
                        'file_name' => $id_persona . '_ci_atras_' . date('Ymd_His')
                    ),
                    'img_ci_atras',
                    $_FILES['img_ci_atras']
                );

                // recuperar datos para la tabla multimedia 
                $datos_multimedia_ci_atras = array(
                    'nombre_archivo' => $carnet_atras[0]['file_name'],
                    'extension_archivo' => $carnet_atras[0]['file_ext'],
                    'fecha_registro' => date('Y-m-d'),
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'tamano_archivo' =>  str_replace(',', '.', $carnet_atras[0]['file_size']),
                    'ruta_archivo' => $ruta . '/' . $carnet_atras[0]['file_name'],
                    'etiqueta' => 'CI_REVERSO',
                    'estado_archivo' => 'REGISTRADO',
                );
                // var_dump($datos_multimedia_ci_atras);
                // exit();

                // insertar archivo de la foto ci reverso en tabla multimedia
                $id_multimedia_ci_atras = $this->sql_psg->insertar_tabla('multimedia', $datos_multimedia_ci_atras);
                // var_dump($id_multimedia_ci_atras);
                // exit();

                // asociar archivo multimedia con una persona
                $id_multi_persona_ci_atras = $this->sql_psg->insertar_tabla('multimedia_persona', [
                    'id_multimedia' => $id_multimedia_ci_atras,
                    'id_persona' => $id_persona,
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'estado_multimedia_persona' => 'REGISTRADO'
                ]);
                // var_dump($id_multi_persona_ci_atras);
                // exit();

                /** BLOQUE DE INSERTAR IMAGEN TITULO ACADEMICO */
                $ruta = 'img/inscripciones';
                $titulo_academico = $this->subir(
                    $ruta,
                    array(
                        'allowed_types' => 'jpg|jpeg|png|',
                        'max_size' => '30240',
                        'file_name' => $id_persona . '_diploma_academico_' . date('Ymd_His')
                    ),
                    'img_diploma_academico',
                    $_FILES['img_diploma_academico']
                );

                // datos de un archivo y ponerlos en tabla multimedia
                $datos_multimedia_diploma_academico = array(
                    'nombre_archivo' => $titulo_academico[0]['file_name'],
                    'extension_archivo' => $titulo_academico[0]['file_ext'],
                    'fecha_registro' => date('Y-m-d'),
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'tamano_archivo' =>  str_replace(',', '.', $titulo_academico[0]['file_size']),
                    'ruta_archivo' => $ruta . '/' . $titulo_academico[0]['file_name'],
                    'etiqueta' => 'DIPLOMA',
                    'estado_archivo' => 'REGISTRADO',
                );
                // var_dump($datos_multimedia_diploma_academico);
                // exit();

                // insertar archivo de diploma academico de posgraduante para comprobar datos en tabla multimedia
                $id_multimedia_diploma_academico = $this->sql_psg->insertar_tabla('multimedia', $datos_multimedia_diploma_academico);
                // var_dump($id_multimedia_diploma_academico);
                // exit();

                // asociar archivo multimedia con una persona
                $id_multimedia_persona_diploma_academico = $this->sql_psg->insertar_tabla('multimedia_persona', [
                    'id_multimedia' => $id_multimedia_diploma_academico,
                    'id_persona' => $id_persona,
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'estado_multimedia_persona' => 'REGISTRADO'
                ]);
                // var_dump($id_multimedia_persona_diploma_academico);
                // exit();

                // insertar deposito bancario matricula
                /** BLOQUE DEPOSITO MATRICULA */
                $ruta = 'img/inscripciones';
                $deposito_matricula = $this->subir(
                    $ruta,
                    array(
                        'allowed_types' => 'jpg|jpeg|png|',
                        'max_size' => '30240',
                        'file_name' => $id_persona . '_' . $programa_a_registrarse->id_planificacion_programa . '_deposito_matricula_' . date('Ymd_His')
                    ),
                    'img_dep_matricula',
                    $_FILES['img_dep_matricula']
                );

                $datos_multi_deposito_matricula = array(
                    'nombre_archivo' => $deposito_matricula[0]['file_name'],
                    'extension_archivo' => $deposito_matricula[0]['file_ext'],
                    'fecha_registro' => date('Y-m-d'),
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'tamano_archivo' =>  str_replace(',', '.', $deposito_matricula[0]['file_size']),
                    'ruta_archivo' => $ruta . '/' . $deposito_matricula[0]['file_name'],
                    'etiqueta' => 'DEPOSITO_MATRICULA',
                    'estado_archivo' => 'REGISTRADO',
                );

                // insertar archivo comprobante deposito matricula de posgraduante para comprobar datos en tabla multimedia
                $id_multi_deposito_matricula = $this->sql_psg->insertar_tabla('multimedia', $datos_multi_deposito_matricula);
                // var_dump($id_multi_deposito_matricula);
                // exit();

                // asociar archivo de comprobacion de deposito bancario de matricula con una persona y el programa a inscribirse
                $id_multimedia_pago_programa_deposito_matricula = $this->sql_psg->insertar_tabla('multimedia_pago_programa', [
                    'id_multimedia' => $id_multi_deposito_matricula,
                    'id_inscripcion' => $id_preinscripcion,
                    // 'id_usuario' => $this->usuario['id_persona'],
                    'estado_multimedia_pago_programa' => 'REGISTRADO'
                ]);
                // var_dump($id_multimedia_persona_deposito_matricula);
                // exit();

                // insertar deposito bancario cuota inicial
                /** BLOQUE DEPOSITO BANCARIO CUOTA INICIAL */

                if ($_FILES['img_dep_cuota_ini']['name'] != "") {
                    $ruta = 'img/inscripciones';
                    $deposito_primera_cuota = $this->subir(
                        $ruta,
                        array(
                            'allowed_types' => 'jpg|jpeg|png|',
                            'max_size' => '30240',
                            'file_name' => $id_persona . '_' . $programa_a_registrarse->id_planificacion_programa . '_deposito_primera_cuota_' . date('Ymd_His')
                        ),
                        'img_dep_cuota_ini',
                        $_FILES['img_dep_cuota_ini']
                    );

                    $datos_multi_deposito_primera_cuota = array(
                        'nombre_archivo' => $deposito_primera_cuota[0]['file_name'],
                        'extension_archivo' => $deposito_primera_cuota[0]['file_ext'],
                        'fecha_registro' => date('Y-m-d'),
                        // 'id_usuario' => $this->usuario['id_persona'],
                        'tamano_archivo' =>  str_replace(',', '.', $deposito_primera_cuota[0]['file_size']),
                        'ruta_archivo' => $ruta . '/' . $deposito_primera_cuota[0]['file_name'],
                        'etiqueta' => 'DEPOSITO_CUOTA_INICIAL',
                        'estado_archivo' => 'REGISTRADO',
                    );

                    // insertar archivo comprobante deposito cuota inicial de posgraduante para comprobar datos en tabla multimedia
                    $id_multi_deposito_primera_cuota = $this->sql_psg->insertar_tabla('multimedia', $datos_multi_deposito_primera_cuota);
                    // var_dump($id_multi_deposito_primera_cuota);
                    // exit();

                    // asociar archivo de comprobacion de deposito bancario de cuota inicial con una persona y el programa a inscribirse
                    $id_multimedia_pago_programa_deposito_primera_cuota = $this->sql_psg->insertar_tabla('multimedia_pago_programa', [
                        'id_multimedia' => $id_multi_deposito_primera_cuota,
                        'id_inscripcion' => $id_preinscripcion,
                        // 'id_usuario' => $this->usuario['id_persona'],
                        'estado_multimedia_pago_programa' => 'REGISTRADO'
                    ]);
                    // var_dump($id_multimedia_pago_programa_deposito_primera_cuota);
                    // exit();
                }
            } else {
                echo "la persona existe pero esta en el mismo programa?";
            }

            /* seccion de errores */
            if (is_numeric($id_persona)) {
                $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'exito' => $id_persona,
                        // 'exito_detalle' => $id_detalle_programa,
                        /*  'aya' => $data */
                    )));
            } else {
                $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'error' => 'Error al insertar nuevo registro(' . $id_persona . ').',
                        // 'error' => 'Error al insertar un nuevo registro(' . $id_detalle_programa . ').'
                    )));
            }
            /* fin seccion de errores */
        }
    }

    public function inscripcion_programa($id_publicacion)
    {
        /**
         * listar datos de una publicacion con estados "PUBLICADO" O "INFORMACIONES" y con imagne principal tambien igualando
         * los parametros que nos mandan para asegurar que es el programa que quiere ver el detalle 
         */
        $listar_publicaciones = $this->marketing_model->listar_publicacion(
            "(pub.estado_publicacion = 'PUBLICADO' OR pub.estado_publicacion = 'INFORMACIONES') AND mp.img_principal = 1 AND pub.id_publicacion = $id_publicacion"
        );
        // echo '<pre>';
        // var_dump($listar_publicaciones);
        // echo '</pre>';
        // exit();

        /** sacamos el campo estado_publicacion en una variable */
        $estado_publicacion = $listar_publicaciones[0]->estado_publicacion;
        // echo '<pre>';
        // var_dump($estado_publicacion);
        // echo '</pre>';
        // exit();

        /** Descripcion :
         *  realiza la verificacion si el campo estado_publicacion es True de la publicacion,
         *  POR VERDAD : realzamos la consulta al modelo marketing_model la publicacion del programa,
         *  y las imagenes
         *  POR FALSO : como no hay una pubicacion vigente se redirecciona a la pagina principal
         */
        if ($estado_publicacion != 'FINALIZADO' || $estado_publicacion != 'OBSERVADO') {

            // campos prueba para la inscripcion
            if (
                $this->input->post('ci')
                // && $this->input->post('fecha_nacimiento')
                // && $this->input->post('nombre_completo')
            ) {
                $persona = verificar_datos_personales('persona', [
                    ['dato' => $this->input->post('ci'), 'columnas' => ['ci'], 'dividir' => false, 'expresion' => 'like'],
                    // ['dato' => $this->input->post('fecha_nacimiento'), 'columnas' => ['fecha_nacimiento']],
                    // ['dato' => mb_convert_case($this->input->post('nombre_completo'), MB_CASE_UPPER), 'columnas' => ['nombre', 'paterno', 'materno'], 'dividir' => true],
                ], '*');

                // var_dump($persona);
                // exit();
                if (count($persona) == 1) {
                    $this->input->set_cookie('id_publicacion', $id_publicacion,  '0');
                    redirect(base_url('/login'));
                } else if (count($persona) > 1)
                    echo 'Anbiguiedad encontrada';
                else if (count($persona) == 0) {
                    // redirect(base_url($descripcion_grado_academico . '/' . $nombre_tipo_programa . '/' . $id_publicacion . '/' . $this->input->post('ci')));
                    $this->templater->view_horizontal('marketing/detalle_programa');
                }
            }

            $this->data['ci'] =  $this->input->post('ci');
            // var_dump($ci);
            // exit();

            $this->data['id_publicacion'] = $id_publicacion;
            // var_dump($id_publicacion);
            // exit();

            // campos prueba para la inscripcion
            $this->data['publicacion_detalle'] = $listar_publicaciones[0];
            // echo '<pre>';
            // var_dump($this->data['publicacion_detalle']);
            // echo '</pre>';
            // exit;

            // listar datos de una persona
            $this->data['datos_persona'] = $this->sql_psg->listar_tabla('persona', ['ci' => $this->input->post('ci')], null, 'row');
            // var_dump($this->data['datos_persona']);
            // exit();

            // listar datos de una persona ya inscrita en un programa 

            $this->data['datos_persona_preinscrito'] = $this->marketing_model->persona_inscrita([
                'p.ci' => $this->data['ci'],
                'ins.id_planificacion_programa' => $listar_publicaciones[0]->id_planificacion_programa
            ]);
            // var_dump($this->data['datos_persona_preinscrito']);
            // exit();



            // exportar modelo persona_model 
            $this->load->model('persona_model');

            // listar paises de la base de datos
            $this->data['id_pais'] = $this->persona_model->pais(
                'select',
                null,
                null,
                null
            );
            // echo '<pre>';
            // var_dump($this->data['id_pais']);
            // echo '</pre>';
            // exit();



            $this->templater->view_horizontal('marketing/inscripcion_programa', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function verificar_usuario_persona()
    {
        // var_dump($this->input->post('repetir_ci'));
        // exit();

        if (
            $this->input->post('ci')
            // && $this->input->post('fecha_nacimiento')
            // && $this->input->post('nombre_completo')
        ) {

            $persona = verificar_datos_personales('persona', [
                ['dato' => $this->input->post('ci'), 'columnas' => ['ci'], 'dividir' => false, 'expresion' => 'like'],
                // ['dato' => $this->input->post('fecha_nacimiento'), 'columnas' => ['fecha_nacimiento']],
                // ['dato' => mb_convert_case($this->input->post('nombre_completo'), MB_CASE_UPPER), 'columnas' => ['nombre', 'paterno', 'materno'], 'dividir' => true],
            ], '*');

            // var_dump($persona);
            // exit();

            if (count($persona) == 1) {
                // $this->input->set_cookie('id_publicacion', $id_publicacion,  '0');
                $resultado = true;
                // redirect(base_url('/login'));
            } else if (count($persona) > 1) {
                // echo 'Anbiguiedad encontrada';
                $resultado = false;
            } else if (count($persona) == 0) {
                // redirect(base_url($descripcion_grado_academico . '/' . $nombre_tipo_programa . '/' . $id_publicacion . '/' . $this->input->post('ci')));
                // echo 'es nuevo el postulante';
                $resultado = false;
            }

            $this->output->set_content_type('application/json')->set_output(json_encode(
                [
                    'exito' => 'mensaje',
                    'mensaje' => 'No mires ',
                    'resultado' => $resultado,
                    'vista' => $this->load->view('marketing/modales/modal_iniciar_sesion', [], true)
                ]
            ));
        }
    }

    public function vista_mensaje()
    {
        // if ($this->input->is_ajax_request()) {
        $this->data['id_planificacion_programa'] = $this->encryption->encrypt(rawurlencode(str_replace(' ', '+', $this->input->post('id_planificacion_programa'))));
        // var_dump($this->input->post('id_planificacion_programa'));
        // exit();
        $this->data['id_persona'] = $this->encryption->encrypt(rawurlencode(str_replace(' ', '+', $this->sql_psg->listar_tabla('persona', ['ci' => $this->input->post('ci_persona')], null, 'row')->id_persona)));

        $this->output->set_content_type('application/json')->set_output(json_encode(
            [
                'exito' => true,
                'id_persona' => $this->data['id_persona'],
                'id_planificacion_programa' => $this->data['id_planificacion_programa'],

            ]
        ));
        // }
    }

    public function instrucciones_posgraduante()
    {

        $this->templater->view_horizontal('marketing/mensaje');

        // }
    }

    public function matriculacion_imprimir()
    {
        // return var_dump($this->encryption->decrypt($this->input->post('id_persona')));
        // exit();
        $this->load->model('matriculacion_model');
        require_once APPPATH . '/controllers/Reportes/Reporte_matriculacion.php';
        $this->reporte = new Reporte_matriculacion();

        $id_persona = $this->encryption->decrypt((str_replace(' ', '+', $this->input->post('id_persona'))));
        $id_planificacion_programa = $this->encryption->decrypt(str_replace(' ', '+', $this->input->post('id_planificacion_programa')));

        //aea
        // var_dump($this->input->post('id_persona')); 

        // var_dump($this->input->post('id_planificacion_programa'));
        // var_dump($id_persona);
        // var_dump($id_planificacion_programa);

        if (is_numeric($id_persona) && is_numeric($id_planificacion_programa)) {

            $datos_inscripcion = $this->matriculacion_model->datos_inscrito(['pe.id_persona' => $id_persona, 'pr.id_planificacion_programa' => $id_planificacion_programa])->row_array();

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
                                    ['pregrado' => $this->matriculacion_model->formacion_academica(['gap.id_persona' => $id_persona, 'gap.id_grado_academico' => 6])->result_array()],
                                    ['postgrado' => $this->matriculacion_model->formacion_academica(['gap.id_persona' => $id_persona, 'gap.id_grado_academico !=' => 6])->result_array()]
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
            else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El posgraduante no se encuentra registrado como inscrito.']));
        } else $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'No se encontro el programa solicitado, por favor intente más tarde']));
    }

    /**
     * Descripción de la funcion  : Se encarga de subir un archivos al servidor
     * Descripción de los parametros :
     * ruta                 : directorio donde se almacenara los archivos ejemplo("img/uploads") 
     * configuraciones		: las configuraciones como ser path,size, etc y tiene que estar en un array.
     * nombre_input_file    : el nombre que se le asigno al atributo "name=nombre" de un input de tipo *                        file
     * archivos             : aqui el array que contiene el $_FILES['nombre_input_file']
     */
    public function subir($ruta, $configuraciones, $nombre_input_file, $archivos)
    {
        $this->load->library('upload', $configuraciones);

        $archivos_subidos = array();
        $archivos_erroneos = '';

        $_FILES[$nombre_input_file]['name'] = $archivos['name'];
        $_FILES[$nombre_input_file]['type'] = $archivos['type'];
        $_FILES[$nombre_input_file]['tmp_name'] = $archivos['tmp_name'];
        $_FILES[$nombre_input_file]['error'] = $archivos['error'];
        $_FILES[$nombre_input_file]['size'] = $archivos['size'];
        $configuraciones['upload_path'] = $ruta;

        $this->upload->initialize($configuraciones);
        if ($this->upload->do_upload($nombre_input_file)) {
            $archivos_subidos[] = $this->upload->data();
        } else {
            $archivos_erroneos .= strip_tags($this->upload->display_errors()) . '<br>' . $archivos['name'] . '</.><br>';
        }

        if (isset($archivos_erroneos[0])) {
            foreach ($archivos_subidos as $key => $archivo_subido) {
                unlink($ruta . $archivo_subido['file_name']);
            }
            return $archivos_erroneos;
        } else {
            return $archivos_subidos;
        }
    }

    /** Descripcion : funcion de validacion para Form_validation
     *  de que un campo solo tenga letras Mayusculas y minusculas con acentos
     */
    function alpha_dash_space($texto)
    {
        if (!preg_match('/^[a-zA-ZáéíóúàèìòùÁÉÍÓÚÀÈÌÒÙ\s]+$/', $texto)) {
            $this->form_validation->set_message('alpha_dash_space', '
            El campo solo puede contener caracteres alfabéticos y espacios en blanco');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /** Descripcion : funcion de validacion para Form_validation
     *  de que un campo solo tenga letras (Mayusculas, minusculas) sin acentos y numeros
     */
    public function ci_validation($ci)
    {
        if (!preg_match('/^[0-9a-zA-Z-]+$/', $ci)) {
            $this->form_validation->set_message('ci_validation', '
            El campo solo puede contener caracteres Alfanumérico sin acentuación y exclusiva el caracter(-) para el complemento');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /** Descripcion : funcion de validacion para Form_validation
     *  verifica que la extension de un carnet de identidad sean las abreviaturas correctas
     */
    public function expedido_validation($expedido)
    {
        if (!preg_match('/^[LP|CH|CB|OR|PT|TJ|SC|BE|PD]+$/i', $expedido)) {
            $this->form_validation->set_message('expedido_validation', '
            El campo expedido solo puede contener los datos dados en el formulario QUE HACES!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function genero_validation($expedido)
    {
        if (!preg_match('/^[M|F]+$/i', $expedido)) {
            $this->form_validation->set_message('expedido_validation', '
            El campo genero solo puede contener los datos del formulario');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function estado_civil_validation($expedido)
    {
        if (!preg_match('/^[SOLTERO|CASADO|DIVORCIADO|VIUDO|CONVIVIENTE]+$/i', $expedido)) {
            $this->form_validation->set_message('expedido_validation', '
            El campo expedido solo puede contener los datos dados en el formulario QUE HACES!');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    function date_valid($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);

        if ($d && $d->format('Y-m-d') === $date) {
            return true;
        } else {
            $this->form_validation->set_message('date_valid', 'El campo {field} no es una fecha válida');
            return false;
        }
    }

    public function file_check($str, $param)
    {
        $param = preg_split('/,/', $param);
        $file_name = $param[0];
        if (!empty($_FILES[$file_name]['name'])) {
            if (isset($_FILES[$file_name]['name']) && $_FILES[$file_name]['name'] != "") {
                if (in_array(pathinfo($_FILES[$file_name]['name'], PATHINFO_EXTENSION), explode(' ', $param[2]))) {
                    return true;
                } else {
                    $this->form_validation->set_message('file_check', 'El archivo ' . pathinfo($_FILES[$file_name]['name'], PATHINFO_FILENAME) . ' debe pertenecer a una de estas extensiones ' . $param[2]);
                    return false;
                }
            }
        } else {
            $this->form_validation->set_message('file_check', 'Seleccione un archivo ' . $param[1]);
            return false;
        }
        var_dump(pathinfo($_FILES[$file_name]['name'], PATHINFO_EXTENSION));
    }

    public function form_validacion()
    {
        // var_dump($descripcion_grado_academico);
        // var_dump($nombre_tipo_programa);
        // var_dump($id_publicacion);
        // exit;
        // recibir datos de detalle_programa.js
        $this->data['ci'] = $this->input->post('ci');
        $id_publicacion = $this->input->post('id_publicacion');
        $this->data['id_publicacion'] = $this->input->post('id_publicacion');
        $descripcion_grado_academico = $this->input->post('descripcion_grado_academico');
        $nombre_tipo_programa = $this->input->post('nombre_tipo_programa');

        if ($descripcion_grado_academico == 'maestria' or $descripcion_grado_academico == 'maestr%C3%ADa') {
            $descripcion_grado_academico = 'maestría';
        }
        if ($nombre_tipo_programa == 'no-escolarizado') {
            $nombre_tipo_programa = 'no escolarizado';
        }
        // $nombre_tipo_programa = mb_convert_case(str_replace("-", " ", $nombre_tipo_programa), MB_CASE_UPPER);
        // var_dump($descripcion_grado_academico);
        // var_dump($nombre_tipo_programa);
        // exit;

        /** Descripcion :
         *  realiza una consulta al modelo y selecciona una publicacion con estado_publicacion en True y los 
         *  valores que nos envia a la funcion con los campos respectivos
         */

        // convierte en mayusculas los parametros recibidos de grado academico
        $mayusculas_grado_academico = mb_convert_case($descripcion_grado_academico, MB_CASE_UPPER);
        // var_dump($mayusculas_grado_academico);
        // exit();

        // convierte en mayusculas los parametros recibidos de tipo de programa
        $mayusculas_tipo_progama = mb_convert_case($nombre_tipo_programa, MB_CASE_UPPER);
        // var_dump($mayusculas_tipo_progama);
        // exit();

        $listar_publicaciones = $this->marketing_model->listar_publicacion(
            "(pub.estado_publicacion = 'PUBLICADO' OR pub.estado_publicacion = 'INFORMACIONES') AND mp.img_principal = 1 AND pub.id_publicacion = $id_publicacion AND ga.descripcion_grado_academico = '$mayusculas_grado_academico' AND tp.nombre_tipo_programa = '$mayusculas_tipo_progama'"
        );
        $this->data['publicacion_detalle'] = $listar_publicaciones[0];
        $this->templater->view_horizontal('marketing/modales/modal_confirmar_datos', $this->data);
    }
}
