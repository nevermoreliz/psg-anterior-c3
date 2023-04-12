<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin_marketing extends PSG_Controller
{

    //  inicializar variable de Carpeta o ruta base de la vista del modulo
    var $ruta_carpeta_vista;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_marketing_model');
        $this->load->helper('form');

        // inicializar ruta carpeta
        $this->ruta_carpeta_vista = '/admin_marketing/';
    }

    /**
     * Descripción  : 
     * esta funcion index se encarga de mostrar 
     * la pagina por defecto de la administracion
     */
    public function index()
    {

        if ($this->input->is_ajax_request()) {

            $this->load->model('marketing_model');
            // actualizar estado_publicacion si la fecha ya esta pasado
            foreach ($this->marketing_model->listar_publicacion() as $publicacion) {

                if (date('Y-m-d') > $publicacion->fecha_fin_publicidad) {
                    // por verdad significa que ya no esta vigente
                    $this->sql_psg->modificar_tabla('publicacion', ['estado_publicacion' => 'FINALIZADO'], ['id_publicacion' => $publicacion->id_publicacion]);
                }
            }




            $this->templater->view_horizontal_admin('principal/index');
        } else {
            exit('No direct script access allowed');
        }
    }

    /**
     * Descripción  : 
     * esta funcion se encarga de mostrar 
     * la pagina o la vista que se encuentra en views/admin_marketing/listar_publicacion
     */
    public function listar_publicacion()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->model('marketing_model');

            // actualizar estado_publicacion si la fecha ya esta pasado
            foreach ($this->marketing_model->listar_publicacion() as $publicacion) {


                if (date('Y-m-d') > $publicacion->fecha_fin_publicidad) {
                    // por verdad significa que ya no esta vigente
                    $this->sql_psg->modificar_tabla('publicacion', ['estado_publicacion' => 'FINALIZADO'], ['id_publicacion' => $publicacion->id_publicacion]);
                }
            }

            $this->templater->view_horizontal_admin('admin_marketing/listar_publicacion');
        }
    }

    /**
     * Descripción  : 
     * esta funcion se encarga de mostrar 
     * la pagina o la vista que se encuentra en views/admin_marketing/listar_publicacion
     * donde recive datos por ajax y los muestra en el Datatable de la vista
     */
    public function publicacion_programa_listar_ajax()
    {
        if ($this->input->is_ajax_request()) {
            /* $table = 'vista_programas_publicados'; */
            $table = 'vista_programas';
            $primaryKey = 'id_planificacion_programa';
            // $where = "(estado_programa = 'PROPUESTO' OR estado_programa = 'APROBADO' OR estado_programa = 'ACTIVO' OR estado_programa='REGISTRADO' ) AND gestion_programa = " . date('yy');
            $where = "(estado_programa = 'ACTIVO' OR estado_programa = 'APROBADO' OR estado_programa = 'ACTIVO')";
            $columns = array(
                ['db' => 'id_planificacion_programa', 'alias' => 'id_planificacion_prog', 'dt' => 0],
                ['db' => 'id_publicacion', 'alias' => 'id_pub', 'dt' => 1],

                ['db' => "concat(nombre_programa,'<br>VERSION - ',numero_version,', ',gestion_programa, ' (', descripcion_grado_academico,', ',nombre_tipo_programa,')<br>',nombre_unidad,', ',tipo_unidad,', ',denominacion_sede,'.')", 'alias' => 'nom_completo_prog', 'dt' => 3],
                ['db' => 'estado_publicacion', 'alias' => 'tipo_pub_vista', 'dt' => 4],

            );

            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);

            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
    }

    /* funciones para mostrar y envio de datos modales */

    /**
     * Descripción  : 
     * 1.-  esta funcion se encarga de mostrar 
     *      la vista que se encuentra en views/admin_marketing/campos_publicacion para la parte de p
     * 2.-  envio de datos al formulario en una variable data[] y pasarlo a la vista
     */
    public function campos_publicacion()

    {
        // recivir datos de javascript y asignar a las variables
        $this->data['id_planificacion_programa'] = $this->input->post('id_planificacion_programa');
        $this->data['id_publicacion'] = $this->input->post('id_publicacion');
        // echo $this->data['id_planificacion_programa'];
        // exit;

        // consulta si un programa tiene una publicacion para la pagina
        $this->data['listar_publicacion'] = $this->sql_psg->listar_tabla('publicacion', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], null, 'row');
        // var_dump($this->data['listar_publicacion']);
        // exit();

        // listar datos de un programa
        $this->data['listar_planificacion_programa'] = $this->admin_marketing_model->listar_programa(
            array('id_planificacion_programa' => $this->input->post('id_planificacion_programa'))
        );
        // var_dump($this->data['listar_planificacion_programa']);
        // exit();

        //listar todas las etiquetas para un programa
        $this->data['listar_etiqueta_programa'] = $this->sql_psg->listar_tabla('etiqueta', null, 'id_etiqueta asc', null);
        // var_dump($this->data['listar_etiqueta_programa']);
        // exit();

        // mardar datos a la vista correspondiente ruta_base "inicializado en constructor variable ruta_carpeta_vista"
        // $this->vista('campos_publicacion', $this->data);
        $this->templater->view_horizontal_admin('admin_marketing/campos_publicacion', $this->data);
    }

    /**
     * Descripción  : 
     * 1.-  esta función se encarga de mostrar 
     *      la vista que se encuentra en views/admin_marketing/campos_publicacion_editar
     *      para la parte de edición o modificación de los datos
     * 2.-  envio de datos al formulario en una variable data[] y pasarlo a la vista
     */
    public function campos_publicacion_editar()
    {
        $this->data['id_planificacion_programa'] = $this->input->post('id_planificacion_programa');
        $this->data['id_publicacion'] = $this->input->post('id_publicacion');


        // listar datos de la tabla publicacion
        $this->data['listar_publicacion'] = $this->sql_psg->listar_tabla('publicacion', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], null, 'row');
        // var_dump($this->data['listar_publicacion']);
        // exit();

        $this->data['listar_planificacion_programa'] = $this->sql_psg->listar_tabla('planificacion_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], null, 'row');
        // var_dump($this->data['listar_planificacion_programa']);
        // exit();


        $this->data['listar_imagen_principal_publicacion'] = $this->admin_marketing_model->listar_imagenes(['id_publicacion' => $this->input->post('id_publicacion'), 'mp.img_principal' => 1]);
        // var_dump($this->data['listar_imagen_principal_publicacion']);
        // exit();


        $this->data['listar_imagenes_adicionales_publicacion'] = $this->admin_marketing_model->listar_imagenes(['id_publicacion' => $this->input->post('id_publicacion'), 'mp.img_principal' => 0]);
        // var_dump($this->data['listar_imagen_principal_publicacion']);
        // exit();

        // listar o verificar si tiene un pdf un programa
        $this->data['listar_pdf_programa'] = $this->admin_marketing_model->listar_pdf(['id_publicacion' => $this->input->post('id_publicacion')]);
        // $this->data['listar_pdf_programa'] = $this->admin_marketing_model->listar_pdf(['id_publicacion' => $this->input->post('id_publicacion'), 'img_principal' => 2]);
        // var_dump($this->data['listar_pdf_programa']);
        // exit();

        // lista todas las etiquetas existentes de la base de datos
        $this->data['listar_etiquetas'] = $this->sql_psg->listar_tabla('etiqueta', null, 'id_etiqueta asc', null);
        // var_dump($this->data['listar_etiquetas']);
        // exit();

        // lista las etiquetas que tiene un porgrama
        $this->data['listar_etiquetas_programa'] = $this->sql_psg->listar_tabla('etiqueta_planificacion_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], 'id_etiqueta asc', null);
        // var_dump($this->data['listar_etiquetas_programa']);
        // exit();

        // mardar datos a la vista correspondiente ruta_base "inicializado en constructor variable ruta_carpeta_vista"
        $this->vista('campos_publicacion_editar', $this->data);
        // $this->templater->view_horizontal_admin('admin_marketing/campos_publicacion_editar', $this->data);
    }

    /* fin funciones para mostrar y envio de datos modales */

    /** BLOQUE INSERTAR UNA PUBLICACIÓN */

    /**
     * Descripción  : 
     * 1.-  esta funcion se encarga de de hacer validacion de datos, de parte del back-end
     * 2.-  recivir datos por post del archivo campos_publicacion.js
     * 3.-  el proceso de insertar a la base de datos en las tablas detalle_programa, publicacion,      
     *      archivo, multimedia
     */
    public function publicacion_insertar()
    {

        if ($this->input->is_ajax_request()) {


            $this->load->library('form_validation');
            $this->load->helper('file');

            $this->form_validation->set_rules('img_principal', 'img_principal', 'callback_file_check[img_principal, imagen como principal del programa ,jpg jpeg png JPG JPEG PNG]');

            $this->form_validation->set_rules('fecha_inicio_publicidad', 'fecha_inicio_publicidad', 'required');
            $this->form_validation->set_rules('fecha_fin_publicidad', 'fecha_fin_publicidad', 'required');
            // $this->form_validation->set_rules('fecha_fin_descuento', 'fecha_fin_descuento', 'callback_date_valid');
            // $this->form_validation->set_rules('fecha_fin_descuento', 'fecha_fin_inscripcion', 'callback_date_valid[][');
            $this->form_validation->set_rules('celular_ref', 'celular_ref', 'required');
            // $this->form_validation->set_rules('telefono_ref', 'telefono_ref', 'required');
            $this->form_validation->set_rules('duracion', 'duracion', 'required|numeric|is_natural');
            $this->form_validation->set_rules('creditaje', 'creditaje', 'required|numeric|is_natural');
            $this->form_validation->set_rules('resumen', 'resumen', 'required');
            $this->form_validation->set_rules('objetivo_programa', 'objetivo_programa', 'required');
            // $this->form_validation->set_rules('titulacion_intermedia', 'titulacion_intermedia', 'required');
            // $this->form_validation->set_rules('dirigido_a', 'dirigido_a', 'required');
            $this->form_validation->set_rules('requisitos', 'requisitos', 'required');
            $this->form_validation->set_rules('contenido', 'contenido', 'required');
            $this->form_validation->set_rules('estado_publicacion', 'estado_publicacion', 'required');

            if ($this->form_validation->run() == false) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {


                /**
                 * BLOQUE TABLA PUBLICACION
                 */

                // datos para insertar a la tabla publicacion
                $data_tbl_publicacion = array(
                    'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                    'fecha_inicio_publicidad' => $this->input->post('fecha_inicio_publicidad'),
                    'fecha_fin_publicidad' => $this->input->post('fecha_fin_publicidad'),
                    'fecha_fin_inscripcion' => $this->input->post('fecha_fin_inscripcion'),
                    'fecha_fin_descuento' => $this->input->post('fecha_fin_descuento'),
                    'id_usuario' => $this->usuario['id_persona'],
                    'fecha_registro_publicidad' => date('Y-m-d'),
                    'url_facebook' => empty($this->input->post('url_facebook')) ? 'https://www.facebook.com/Estudia-En-Posgrado-UPEA-128794501288356' : $this->input->post('url_facebook'),
                    'url_whatsapp' => $this->input->post('url_whatsapp'),
                    'url_youtube' => empty($this->input->post('url_youtube')) ? 'https://www.youtube.com/watch?v=Jj2SPtZtXNA' : $this->input->post('url_youtube'),
                    'estado_publicacion' => $this->input->post('estado_publicacion')
                );
                // var_dump($data_tbl_publicacion);
                // exit;

                // insertar datos respectivos a la tabla publicacion
                $id_publicacion = $this->sql_psg->insertar_tabla('publicacion', $data_tbl_publicacion);
                // var_dump($id_publicacion);
                // exit;

                /** BLOQUE DETALLE DE UN PROGRAMA */

                // datos recuperados para actualizar en la tabla planificacion_persona 
                $datos_detalle_programa = array(
                    // 'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                    // 'titulacion_intermedia' => str_replace("\r\n", "<br>", $this->input->post('titulacion_intermedia')),

                    // paso 1 del wizard-forms
                    'celular_ref' => $this->input->post('celular_ref'),
                    'telefono_ref' => $this->input->post('telefono_ref'),
                    // paso 2 del wizard-forms
                    'descuento_individual' => (empty($this->input->post('descuento_individual'))) ? '0' : $this->input->post('descuento_individual'),
                    'descuento_grupal' => (empty($this->input->post('descuento_grupal'))) ? '0' : $this->input->post('descuento_grupal'),
                    // paso 3 del wizard-forms
                    // 'horario' => $this->input->post('horario'),
                    'creditaje' => $this->input->post('creditaje'),
                    'duracion' => $this->input->post('duracion'),
                    'resumen' => $this->input->post('resumen'),
                    'objetivo_programa' => $this->input->post('objetivo_programa'),
                    'titulacion_intermedia' => $this->input->post('titulacion_intermedia'),
                    'dirigido_a' => $this->input->post('dirigido_a'),
                    // paso 4 del wizard-forms
                    'requisitos' => $this->input->post('requisitos'),
                    // paso 5 del wizard-forms
                    'contenido' => $this->input->post('contenido')
                );
                // var_dump($datos_detalle_programa);
                // exit;                

                // actualizar tabla planificacion_programa con los detalles 
                $estado_detalle_programa = $this->sql_psg->modificar_tabla('planificacion_programa', $datos_detalle_programa, ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]);
                // var_dump($estado_detalle_programa);
                // exit;                

                /**
                 * BLOQUE IMAGEN PRINCIPAL
                 */
                if (!empty($_FILES['img_principal'])) {
                    // $ruta = Direccion donde se guardara la imagen principal del programa a publicar
                    $ruta = 'img/img_publicaciones';

                    $archivo_principal = $this->subir(
                        $ruta,
                        array(
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size' => '20240',
                            'file_name' => $id_publicacion . '_' . date('Ymd_His')
                        ),
                        'img_principal',
                        $_FILES['img_principal']
                    );
                    // var_dump($archivo_principal);
                    // exit;

                    if (isset($archivo_principal)) {
                        $img_principal = $archivo_principal[0];
                        // var_dump($img_principal);

                        // datos para insertar a la tabla multimedia
                        $datos_multi = array(
                            'nombre_archivo' => $img_principal['file_name'],
                            'extension_archivo' => $img_principal['file_ext'],
                            'fecha_registro' => date('Y-m-d'),
                            'id_usuario' => $this->usuario['id_persona'],
                            'tamano_archivo' =>  str_replace(',', '.', $img_principal['file_size']),
                            'ruta_archivo' => $ruta . '/' . $img_principal['file_name'],
                            // 'etiqueta' => '',
                            'estado_archivo' => 'REGISTRADO',
                        );
                        // var_dump($datos_multi);
                        // exit;

                        // insertar a la tabla multimedia 
                        $id_multi = $this->sql_psg->insertar_tabla('multimedia', $datos_multi);
                        // var_dump($id_multi);
                        // exit;        

                        // datos para insertar a la tabla multimedia_publicacion
                        $datos_multi_publicacion = array(
                            'id_publicacion' => $id_publicacion,
                            'id_multimedia' => $id_multi,
                            'img_principal' => 1,
                            'id_usuario' => $this->usuario['id_persona'],
                            'estado_multimedia_publicacion' => 'REGISTRADO'
                        );
                        // var_dump($datos_multi_publicacion);
                        // exit;

                        //insertar a la tabla  
                        $id_multi_publicacion = $this->sql_psg->insertar_tabla('multimedia_publicacion', $datos_multi_publicacion);
                        // var_dump($id_multi_publicacion);
                        // exit;   
                    }
                }

                /**BLOQUE PARA PDF */

                if (!empty($_FILES['pdf_programa'])) {
                    // $ruta = Direccion donde se guardara el pdf del programa a publicar
                    // echo "no deberia entrar aqui";
                    $ruta = 'img/pdf_programa';

                    $archivo_pdf_programa = $this->subir(
                        $ruta,
                        array(
                            'allowed_types' => 'pdf',
                            'max_size' => '20240',
                            'file_name' => $id_publicacion . '_' . $this->input->post('id_planificacion_programa') . '_pdf_' . date('Ymd_His')
                        ),
                        'pdf_programa',
                        $_FILES['pdf_programa']
                    );
                    // var_dump($archivo_pdf_programa);
                    // exit;

                    $datos_multi_pdf = array(
                        'nombre_archivo' => $archivo_pdf_programa[0]['file_name'],
                        'extension_archivo' => $archivo_pdf_programa[0]['file_ext'],
                        'fecha_registro' => date('Y-m-d'),
                        'id_usuario' => $this->usuario['id_persona'],
                        'tamano_archivo' =>  str_replace(',', '.', $archivo_pdf_programa[0]['file_size']),
                        'ruta_archivo' => $ruta . '/' . $archivo_pdf_programa[0]['file_name'],
                        // 'etiqueta' => '',
                        'estado_archivo' => 'REGISTRADO',
                    );
                    // var_dump($datos_multi_pdf);
                    // exit;

                    // insertar a la tabla multimedia
                    $id_multi_pdf = $this->sql_psg->insertar_tabla('multimedia', $datos_multi_pdf);
                    // var_dump($id_multi_pdf);
                    // exit;     

                    // datos para insertar a la tabla multimedia_publicacion
                    $datos_multi_publicacion_pdf = array(
                        'id_publicacion' => $id_publicacion,
                        'id_multimedia' => $id_multi_pdf,
                        'img_principal' => 2,
                        'id_usuario' => $this->usuario['id_persona'],
                        'estado_multimedia_publicacion' => 'REGISTRADO'
                    );
                    // var_dump($datos_multi_publicacion_pdf);
                    // exit;

                    //insertar a la tabla multimedia_publicacion 
                    $id_multi_publicacion_pdf = $this->sql_psg->insertar_tabla('multimedia_publicacion', $datos_multi_publicacion_pdf);
                    // var_dump($id_multi_publicacion);
                    // exit;   
                }


                /** BLOQUE IMAGENES ADICIONALES */

                if (isset($_FILES) && !empty($_FILES)) {
                    $files = array_filter($_FILES, function ($item) {
                        return $item["name"][0] != "";
                    });
                    // var_dump($_FILES);
                    // var_dump($files);
                    // exit;                    

                    $revertir_array = array_reverse($files);
                    // (!empty($_FILES['pdf_programa']) ? 2 : 1)
                    foreach (array_slice($revertir_array, ((!empty($_FILES['pdf_programa'])) ? 2 : 1)) as  $file) {
                        // mostrar datos en devtools de la variavle $file
                        // var_dump($file);

                        $tmp_name = $file["tmp_name"];
                        $nombre_archivo = $file["name"];
                        $extension_archivo = explode("/", $file['type']);
                        $nuevo_nombre = $id_publicacion . '__' . $this->admin_marketing_model->GenerarP(10) . '.' . $extension_archivo[1];
                        // $path = 'img/uploads/';
                        $ruta_archivo = 'img/img_publicaciones/';
                        $size = $file["size"];

                        // datos para insertar a la tabla multimedia (imagenes adicionales
                        $datos_multimedia = array(
                            'nombre_archivo' => $nuevo_nombre,
                            'extension_archivo' => $extension_archivo[1],
                            'fecha_registro' => date('Y-m-d'),
                            'id_usuario' =>  $this->usuario['id_persona'],
                            'tamano_archivo' => $size,
                            'ruta_archivo' => $ruta_archivo . '/' . $nuevo_nombre,
                            'estado_archivo' => 'REGISTRADO',
                        );

                        // insertar imagenes adicionales a talba multimedia
                        $id_multimedia = $this->sql_psg->insertar_tabla('multimedia', $datos_multimedia);



                        if (is_numeric($id_multimedia)) {
                            $id = $id_multimedia;
                            $data["all_ids"]["id_$id"]["id"] = $id;
                            $data["all_ids"]["id_$id"]["name"] = $nuevo_nombre;
                            move_uploaded_file($tmp_name, $ruta_archivo . '/' . $nuevo_nombre);
                        }

                        // datos para insertar a la tabla multimedia_publicacion (imagenes adicionales)
                        $datos_multimedia_publicacion = array(
                            'id_publicacion' => $id_publicacion,
                            'id_multimedia' => $id_multimedia,
                            'id_usuario' => $this->usuario['id_persona'],
                            'img_principal' => 0,
                        );

                        //insertar imagenes adicionales en la tabla multimedia_publicacion
                        $id_multimedia_publicacion = $this->sql_psg->insertar_tabla('multimedia_publicacion', $datos_multimedia_publicacion);
                    }
                }


                /**BLOQUE DE ETIQUETAS PARA UN PROGRAMA */

                if ($this->input->post('id_etiqueta') != '') {
                    // separar en un array un string limite (,) del string de la variable id_etiqueta
                    $array_etiqueta = explode(",", $this->input->post('id_etiqueta'));

                    //recorrer elementos de array de la bariable array_etiqueta 
                    foreach ($array_etiqueta as $etiqueta) {

                        // recuperar datos para insertar a la tabla etiqueta_planificacion_programa
                        $datos_etiqueta_planificacion_programa = array(
                            'id_etiqueta' => $etiqueta,
                            'id_planificacion_programa' => $this->input->post('id_planificacion_programa')
                        );
                        // var_dump($datos_etiqueta_planificacion_programa);
                        // exit;        

                        // insertar a la tabla etiqueta_planificacion_programa
                        $id_etiqueta_planificacion_programa = $this->sql_psg->insertar_tabla('etiqueta_planificacion_programa', $datos_etiqueta_planificacion_programa);
                        // var_dump($id_etiqueta_planificacion_programa);
                        // exit;        
                    }
                }

                /** BLOQUE DE DONDE MOSTRAR LOS ERRORES */
                if (
                    is_numeric($id_publicacion)
                    && ($estado_detalle_programa == true)

                ) {
                    $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array(
                            'exito' => $id_publicacion,
                            'exito_detalle' => $estado_detalle_programa,

                        )));
                } else {
                    $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array(
                            'error' => 'Error al insertar nuevo registro(' . $id_publicacion . ').',
                            'error_detalle' => 'Error al insertar un nuevo registro(' . $estado_detalle_programa . ').',

                        )));
                }

                /* fin seccion de errores */
            }
        }
    }

    /** BLOQUE ACTUALZIAR UNA PUBLICACIÓN */

    /**
     * Descripción  : 
     * 1.-  esta funcion se encarga de de hacer validacion de datos, de parte del back-end
     * 2.-  recivir datos por post del archivo campos_publicacion_editar.js
     * 3.-  el proceso de modificacion a la base de datos en las tablas detalle_programa,
     *       publicacion, archivo, multimedia
     */
    public function publicacion_actualizar()
    {
        // var_dump($_FILES['img_principal']['name']);
        // var_dump($_FILES);
        // var_dump(empty($_FILES['img_principal']['name']));
        // exit;

        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');



            $this->form_validation->set_rules('img_principal', 'img_principal', (empty($_FILES['img_principal']['name'])) ? '' : 'callback_file_check[img_principal, imagen como principal del programa ,jpg jpeg png JPG JPEG PNG]');
            // $this->form_validation->set_rules('img_principal', 'img_principal',  'callback_file_check[img_principal,imagen como principal del programa]');

            $this->form_validation->set_rules('fecha_inicio_publicidad', 'fecha_inicio_publicidad', 'required');
            $this->form_validation->set_rules('fecha_fin_publicidad', 'fecha_fin_publicidad', 'required');
            $this->form_validation->set_rules('celular_ref', 'celular_ref', 'required');
            // $this->form_validation->set_rules('telefono_ref', 'telefono_ref', 'required');
            $this->form_validation->set_rules('duracion', 'duracion', 'required');
            $this->form_validation->set_rules('creditaje', 'creditaje', 'required');
            $this->form_validation->set_rules('resumen', 'resumen', 'required');
            $this->form_validation->set_rules('objetivo_programa', 'objetivo_programa', 'required');
            // $this->form_validation->set_rules('titulacion_intermedia', 'titulacion_intermedia', 'required');
            // $this->form_validation->set_rules('dirigido_a', 'dirigido_a', 'required');
            $this->form_validation->set_rules('requisitos', 'requisitos', 'required');
            $this->form_validation->set_rules('contenido', 'contenido', 'required');
            $this->form_validation->set_rules('estado_publicacion', 'estado_publicacion', 'required');

            if ($this->form_validation->run() == false) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {

                /** BLOQUE TABLA PUBLICACION */
                /** Descripcion :
                 *  pregunta al actualizar la tabla publicacion si la fecha_fin_publicidad
                 *  es mayor a la fecha actual 
                 *  POR VERDAD : actualiza con el mismo tipo_publicacion y el estado_publicacion
                 *  lo pone en true para volver al programa vigente
                 *  POR FALSO : actualiza los datos de la publicacion pero si la fecha_fin_publicidad es menor 
                 *  o igual a la fecha actual se pone el estado_publicacion en falso y el
                 *  tipo_publicacion en Inactivo
                 */

                if ($this->input->post('fecha_fin_publicidad') >= date('Y-m-d')) {
                    // recuperar datos para actualizar a la tabla publicacion
                    $datos_publicacion = array(
                        'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                        'fecha_fin_inscripcion' =>  $this->input->post('fecha_fin_inscripcion'),
                        'fecha_inicio_publicidad' => $this->input->post('fecha_inicio_publicidad'),
                        'fecha_fin_publicidad' =>  $this->input->post('fecha_fin_publicidad'),
                        'fecha_fin_descuento' =>  $this->input->post('fecha_fin_descuento'),
                        'id_usuario' =>  $this->usuario['id_persona'],
                        'fecha_registro_publicidad' =>  date('Ymd'),
                        'url_facebook' =>  $this->input->post('url_facebook'),
                        'url_whatsapp' =>  $this->input->post('url_whatsapp'),
                        'url_youtube' =>  $this->input->post('url_youtube'),
                        'estado_publicacion' => $this->input->post('estado_publicacion'),
                    );
                    // var_dump($datos_publicacion);
                    // exit();

                    // actualizar tabla publicacion
                    $publicacion_correcto = $this->sql_psg->modificar_tabla('publicacion', $datos_publicacion, ['id_publicacion' => $this->input->post('id_publicacion')]);
                    // var_dump($publicacion_correcto);
                    // exit();
                } else {
                    // recuperar datos para actualizar a la tabla publicacion
                    $datos_publicacion = array(
                        'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                        'fecha_fin_inscripcion' =>  $this->input->post('fecha_fin_inscripcion'),
                        'fecha_inicio_publicidad' => $this->input->post('fecha_inicio_publicidad'),
                        'fecha_fin_publicidad' =>  $this->input->post('fecha_fin_publicidad'),
                        'fecha_fin_descuento' =>  $this->input->post('fecha_fin_descuento'),
                        'id_usuario' =>  $this->usuario['id_persona'],
                        'fecha_registro_publicidad' =>  date('Ymd'),
                        'url_facebook' =>  $this->input->post('url_facebook'),
                        'url_whatsapp' =>  $this->input->post('url_whatsapp'),
                        'url_youtube' =>  $this->input->post('url_youtube'),
                        'estado_publicacion' => 'FINALIZADO',
                    );
                    // var_dump($datos_publicacion);
                    // exit();

                    // actualizar tabla publicacion
                    $publicacion_correcto = $this->sql_psg->modificar_tabla('publicacion', $datos_publicacion, ['id_publicacion' => $this->input->post('id_publicacion')]);
                    // var_dump($publicacion_correcto);
                    // exit();
                }
                /* fin seccion tabla publicacion */

                /** BLOQUE DE ACTUALIZAR DETALLE DE PROGRAMA EN TABLA PLANIFICACION PROGRAMA */
                // datos recuperados para actualizar en la tabla planificacion_persona 
                $datos_detalle_programa = array(
                    // 'id_planificacion_programa' => $this->input->post('id_planificacion_programa'),
                    // 'titulacion_intermedia' => str_replace("\r\n", "<br>", $this->input->post('titulacion_intermedia')),
                    // paso 1 del wizard-forms
                    'celular_ref' => $this->input->post('celular_ref'),
                    'telefono_ref' => $this->input->post('telefono_ref'),
                    // paso 2 del wizard-forms
                    'descuento_individual' => (empty($this->input->post('descuento_individual'))) ? '0' : $this->input->post('descuento_individual'),
                    'descuento_grupal' => (empty($this->input->post('descuento_grupal'))) ? '0' : $this->input->post('descuento_grupal'),
                    // paso 3 del wizard-forms
                    // 'horario' => $this->input->post('horario'),
                    // 'horario' => str_replace("\r\n", "<br>", $this->input->post('horario')),,
                    'creditaje' => $this->input->post('creditaje'),
                    'duracion' => $this->input->post('duracion'),
                    'resumen' => $this->input->post('resumen'),
                    'objetivo_programa' => $this->input->post('objetivo_programa'),
                    'titulacion_intermedia' => str_replace("\r\n", "<br>", $this->input->post('titulacion_intermedia')),
                    'dirigido_a' => $this->input->post('dirigido_a'),
                    // paso 4 del wizard-forms
                    'requisitos' => $this->input->post('requisitos'),
                    // paso 5 del wizard-forms
                    'contenido' => $this->input->post('contenido')
                );
                // var_dump($datos_detalle_programa);
                // exit;                  

                // actualizar tabla planificacion_programa con los detalles 
                $estado_detalle_programa = $this->sql_psg->modificar_tabla('planificacion_programa', $datos_detalle_programa, ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]);
                // var_dump($estado_detalle_programa);
                // exit;


                // si hay cambios en los archivos de un programa entrara si no hay cambios saltara a otro proceso
                if (!empty($_FILES)) {
                    /* echo "actualizar img_principal </br>"; */
                    /* seccion imagen principal */

                    // si imagen principal esta vacio quiere actualizar imagenes adicionales
                    if (empty($_FILES['img_principal'])) {

                        /** BLOQUE DE ARCHIVO PDF */
                        if (!empty($_FILES['pdf_programa'])) {
                            // configuracion para subir un archivo pdf al servidor
                            $ruta_pdf = 'img/pdf_programa';
                            $archivo_pdf_programa = $this->subir(
                                $ruta_pdf,
                                array(
                                    'allowed_types' => 'pdf',
                                    'max_size' => '20240',
                                    'file_name' => $this->input->post('id_publicacion') . '_' . $this->input->post('id_planificacion_programa') . '_pdf_' . date('Ymd_His')
                                ),
                                'pdf_programa',
                                $_FILES['pdf_programa']
                            );
                            // var_dump($archivo_pdf_programa);
                            // exit();

                            // buscar o seleccionar el archivo pdf a remplazar del programa
                            $pdf_programa = $this->admin_marketing_model->listar_pdf(['id_publicacion' => $this->input->post('id_publicacion')]);
                            // var_dump($pdf_programa);
                            // exit();

                            // si la consulta $pdf_programa es null significa que no tiene un archivo pdf el programa 
                            if ($pdf_programa == null) {
                                // por verdad hay que insertar un pdf ya que no existe para actualizarlo

                                $datos_multi_pdf = array(
                                    'nombre_archivo' => $archivo_pdf_programa[0]['file_name'],
                                    'extension_archivo' => $archivo_pdf_programa[0]['file_ext'],
                                    'fecha_registro' => date('Y-m-d'),
                                    'id_usuario' => $this->usuario['id_persona'],
                                    'tamano_archivo' =>  str_replace(',', '.', $archivo_pdf_programa[0]['file_size']),
                                    'ruta_archivo' => $ruta_pdf . '/' . $archivo_pdf_programa[0]['file_name'],
                                    // 'etiqueta' => '',
                                    'estado_archivo' => 'REGISTRADO',
                                );
                                // var_dump($datos_multi_pdf);
                                // exit;

                                // insertar a la tabla multimedia
                                $id_multi_pdf = $this->sql_psg->insertar_tabla('multimedia', $datos_multi_pdf);
                                // var_dump($id_multi_pdf);
                                // exit;     

                                // datos para insertar a la tabla multimedia_publicacion
                                $datos_multi_publicacion_pdf = array(
                                    'id_publicacion' => $this->input->post('id_publicacion'),
                                    'id_multimedia' => $id_multi_pdf,
                                    'img_principal' => 2,
                                    'id_usuario' => $this->usuario['id_persona'],
                                    'estado_multimedia_publicacion' => 'REGISTRADO'
                                );
                                // var_dump($datos_multi_publicacion_pdf);
                                // exit;

                                //insertar a la tabla multimedia_publicacion 
                                $id_multi_publicacion_pdf = $this->sql_psg->insertar_tabla('multimedia_publicacion', $datos_multi_publicacion_pdf);
                                // var_dump($id_multi_publicacion);
                                // exit;

                            } else {
                                /** por false significa que existe un archivo pdf del programa y necesitamos actualizarlo */
                                // eliminar el archivo pdf del programa del servidor 
                                unlink('img/pdf_programa/' . $pdf_programa->nombre_archivo);

                                // recuperar datos de archivo pdf de un programa para actualizar la tabla multimedia
                                $datos_multi_pdf = array(
                                    'nombre_archivo' => $archivo_pdf_programa[0]['file_name'],
                                    'extension_archivo' => $archivo_pdf_programa[0]['file_ext'],
                                    'fecha_registro' => date('Y-m-d'),
                                    'id_usuario' =>  $this->usuario['id_persona'],
                                    'tamano_archivo' =>  str_replace(',', '.', $archivo_pdf_programa[0]['file_size']),
                                    'ruta_archivo' => $ruta_pdf . '/' . $archivo_pdf_programa[0]['file_name'],
                                    // 'etiqueta' => 'ACTIVO',
                                    'estado_archivo' => 'REGISTRADO',
                                );
                                // var_dump($datos_archivo_imagen_principal);
                                // exit;  

                                // actualizar archivo pdf de un programa en la tabla multimedia 
                                $estado_multi_pdf = $this->sql_psg->modificar_tabla('multimedia', $datos_multi_pdf, ['id_multimedia' => $pdf_programa->id_multimedia]);
                                // var_dump($estado_detalle_programa);
                                // exit;             
                            }
                        }

                        /** BLOQUE DE IMAGENES ADICIONALES */
                        if (isset($_FILES) && !empty($_FILES)) {
                            $files = array_filter($_FILES, function ($item) {
                                return $item["name"][0] != "";
                            });
                            // var_dump($files);
                            // exit;

                            $revertir_array = array_reverse($files);
                            foreach (array_slice($revertir_array, ((!empty($_FILES['pdf_programa'])) ? 1 : 0)) as  $file) {

                                // var_dump($file);

                                $tmp_name = $file["tmp_name"];
                                $nombre_archivo = $file["name"];
                                $extension_archivo = explode("/", $file['type']);
                                $nuevo_nombre = $this->input->post('id_publicacion') . '__' . $this->admin_marketing_model->GenerarP(10) . '.' . $extension_archivo[1];
                                // $path = 'img/uploads/';
                                $ruta_archivo = 'img/img_publicaciones/';
                                $tamano_archivo = $file["size"];

                                // recuperar datos de archivos adicionales para insertar 
                                $datos_multimedia = array(
                                    'nombre_archivo' => $nuevo_nombre,
                                    'extension_archivo' => $extension_archivo[1],
                                    'fecha_registro' => date('Y-m-d'),
                                    'id_usuario' =>  $this->usuario['id_persona'],
                                    'tamano_archivo' => $tamano_archivo,
                                    'ruta_archivo' => $ruta_archivo . '/' . $nuevo_nombre,
                                    // 'etiqueta' => '',
                                    'estado_archivo' => 'REGISTRADO',
                                );
                                // var_dump($datos_multimedia);
                                // exit();

                                // insertar imagenes adicionales a un programa
                                $id_multimedia = $this->sql_psg->insertar_tabla('multimedia', $datos_multimedia);

                                // asegurar que se inserto correctamente y si es numero para insertar las imagenes adicionales 
                                // y mover de la ruta temporal a la ruta indicada
                                if (is_numeric($id_multimedia)) {
                                    $id = $id_multimedia;
                                    $data["all_ids"]["id_$id"]["id"] = $id;
                                    $data["all_ids"]["id_$id"]["name"] = $nuevo_nombre;
                                    move_uploaded_file($tmp_name, $ruta_archivo . '/' . $nuevo_nombre);
                                }

                                // recuperar datos para asigar las imagenes adicionales a una publicacion
                                $datos_multi_publicacion = array(
                                    'id_publicacion' => $this->input->post('id_publicacion'),
                                    'id_multimedia' => $id_multimedia,
                                    'img_principal' => 0,
                                );
                                // var_dump($datos_multi_publicacion);
                                // exit();

                                // insertar datos imagenes adicionales a una publicacion a la tabla multimedia_publicacion
                                $id_multi_publicacion = $this->sql_psg->insertar_tabla('multimedia_publicacion', $datos_multi_publicacion);
                                // var_dump($id_multi_publicacion);
                                // exit();
                            }
                        }
                    } else {
                        /* echo "estas en else"; */
                        // $ruta = 'img/uploads';
                        $ruta = 'img/img_publicaciones';
                        $archivo_principal = $this->subir(
                            $ruta,
                            array(
                                'allowed_types' => 'jpg|jpeg|png',
                                'max_size' => '20240',
                                'file_name' => $this->input->post('id_publicacion') . '__' . date('Ymd_His')
                            ),
                            'img_principal',
                            $_FILES['img_principal']
                        );
                        // var_dump($archivo_principal);
                        // exit();

                        if (isset($archivo_principal)) {
                            $img_principal = $archivo_principal[0];

                            // listar imagen principal de un programa
                            $imagenes_programa = $this->admin_marketing_model->listar_imagenes(['id_publicacion' => $this->input->post('id_publicacion'), 'mp.img_principal' => 1]);
                            // var_dump($imagenes_programa);
                            // exit();

                            // eliminar el archivo del servidor 
                            #unlink('img/img_publicaciones/' . $imagenes_programa->nombre_archivo);

                            // recuperar datos de archivo imagen_principal de un programa de tabla multimedia
                            $datos_multi = array(
                                'nombre_archivo' => $img_principal['file_name'],
                                'extension_archivo' => $img_principal['file_ext'],
                                'fecha_registro' => date('Y-m-d'),
                                'id_usuario' =>  $this->usuario['id_persona'],
                                'tamano_archivo' =>  str_replace(',', '.', $img_principal['file_size']),
                                'ruta_archivo' => $ruta . '/' . $img_principal['file_name'],
                                // 'etiqueta' => 'ACTIVO',
                                'estado_archivo' => 'REGISTRADO',
                            );
                            // var_dump($datos_archivo_imagen_principal);
                            // exit;                

                            // actualizar archivo imagen principal en la tabla multimedia 
                            $estado_multi = $this->sql_psg->modificar_tabla('multimedia', $datos_multi, ['id_multimedia' => $imagenes_programa->id_multimedia]);
                            // var_dump($estado_detalle_programa);
                            // exit;                                            
                        }

                        /** BLOQUE DE ARCHIVO PDF */
                        if (!empty($_FILES['pdf_programa'])) {
                            // configuracion para subir un archivo pdf al servidor
                            $ruta_pdf = 'img/pdf_programa';
                            $archivo_pdf_programa = $this->subir(
                                $ruta_pdf,
                                array(
                                    'allowed_types' => 'pdf',
                                    'max_size' => '20240',
                                    'file_name' => $this->input->post('id_publicacion') . '_' . $this->input->post('id_planificacion_programa') . '_pdf_' . date('Ymd_His')
                                ),
                                'pdf_programa',
                                $_FILES['pdf_programa']
                            );
                            // var_dump($archivo_pdf_programa);
                            // exit;

                            // buscar o seleccionar el archivo pdf a remplazar del programa
                            $pdf_programa = $this->admin_marketing_model->listar_pdf(['id_publicacion' => $this->input->post('id_publicacion')]);
                            // var_dump($pdf_programa);
                            // exit();

                            // eliminar el archivo pdf del programa del servidor 
                            unlink('img/pdf_programa/' . $pdf_programa->nombre_archivo);

                            // recuperar datos de archivo pdf de un programa para actualizar la tabla multimedia
                            $datos_multi_pdf = array(
                                'nombre_archivo' => $archivo_pdf_programa[0]['file_name'],
                                'extension_archivo' => $archivo_pdf_programa[0]['file_ext'],
                                'fecha_registro' => date('Y-m-d'),
                                'id_usuario' =>  $this->usuario['id_persona'],
                                'tamano_archivo' =>  str_replace(',', '.', $archivo_pdf_programa[0]['file_size']),
                                'ruta_archivo' => $ruta_pdf . '/' . $archivo_pdf_programa[0]['file_name'],
                                // 'etiqueta' => 'ACTIVO',
                                'estado_archivo' => 'REGISTRADO',
                            );
                            // var_dump($datos_archivo_imagen_principal);
                            // exit;  

                            // actualizar archivo pdf de un programa en la tabla multimedia 
                            $estado_multi_pdf = $this->sql_psg->modificar_tabla('multimedia', $datos_multi_pdf, ['id_multimedia' => $pdf_programa->id_multimedia]);
                            // var_dump($estado_detalle_programa);
                            // exit;                
                        }

                        /** BLOQUE IMAGENES ADICIONALES */
                        /* seccion imagenes adicionales */
                        if (isset($_FILES) && !empty($_FILES)) {
                            $files = array_filter($_FILES, function ($item) {
                                return $item["name"][0] != "";
                            });

                            $revertir_array = array_reverse($files);

                            foreach (array_slice($revertir_array, ((!empty($_FILES['pdf_programa'])) ? 2 : 1)) as  $file) {

                                // var_dump($file);

                                $tmp_name = $file["tmp_name"];
                                $nombre_archivo = $file["name"];
                                $extension_archivo = explode("/", $file['type']);
                                $nuevo_nombre = $this->input->post('id_publicacion') . '__' . $this->admin_marketing_model->GenerarP(10) . '.' . $extension_archivo[1];
                                // $path = 'img/uploads/';
                                $ruta_archivo = 'img/img_publicaciones/';
                                $tamano_archivo = $file["size"];

                                // recuperar datos de archivos adicionales para insertar 
                                $datos_multimedia = array(
                                    'nombre_archivo' => $nuevo_nombre,
                                    'extension_archivo' => $extension_archivo[1],
                                    'fecha_registro' => date('Y-m-d'),
                                    'id_usuario' =>  $this->usuario['id_persona'],
                                    'tamano_archivo' => $tamano_archivo,
                                    'ruta_archivo' => $ruta_archivo . '/' . $nuevo_nombre,
                                    // 'etiqueta' => '',
                                    'estado_archivo' => 'REGISTRADO',
                                );
                                // var_dump($datos_multimedia);
                                // exit();

                                // insertar imagenes adicionales a un programa
                                $id_multimedia = $this->sql_psg->insertar_tabla('multimedia', $datos_multimedia);

                                // asegurar que se inserto correctamente y si es numero para insertar las imagenes adicionales 
                                // y mover de la ruta temporal a la ruta indicada
                                if (is_numeric($id_multimedia)) {
                                    $id = $id_multimedia;
                                    $data["all_ids"]["id_$id"]["id"] = $id;
                                    $data["all_ids"]["id_$id"]["name"] = $nuevo_nombre;
                                    move_uploaded_file($tmp_name, $ruta_archivo . '/' . $nuevo_nombre);
                                }

                                // recuperar datos para asigar las imagenes adicionales a una publicacion
                                $datos_multi_publicacion = array(
                                    'id_publicacion' => $this->input->post('id_publicacion'),
                                    'id_multimedia' => $id_multimedia,
                                    'img_principal' => 0,
                                );
                                // var_dump($datos_multi_publicacion);
                                // exit();

                                // insertar datos imagenes adicionales a una publicacion a la tabla multimedia_publicacion
                                $id_multi_publicacion = $this->sql_psg->insertar_tabla('multimedia_publicacion', $datos_multi_publicacion);
                                // var_dump($id_multi_publicacion);
                                // exit();
                            }
                        }
                    }
                    /* fin seccion imagenes adicionales */
                    /* fin seccion imagen principal */
                }


                /** BLOQUE DE ETIQUETAS DE UN PROGRAMA */

                // listar las etiquetas de un programa
                $etiqueta_planificacion_programa = $this->sql_psg->listar_tabla('etiqueta_planificacion_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')], null, null);
                // var_dump($etiqueta_planificacion_programa);
                // exit();

                // declaramos un array vacio para llenar las etiquetas de un programa
                $array_etiqueta_programa = array();

                //recorremos las etiquetas de un programa y los asignamos los valores a la variable $array_etiqueta_programa vacia  
                foreach ($etiqueta_planificacion_programa as $etiqueta_programa) {
                    $array_etiqueta_programa[] = $etiqueta_programa->id_etiqueta;
                }
                // var_dump($array_etiqueta_programa);
                // exit();


                // une un array en un string separado por (,)
                $etiquetas_programa = implode(",", $array_etiqueta_programa);
                // var_dump($etiquetas_programa);
                // exit();

                // var_dump($etiquetas_programa != $this->input->post('id_etiqueta'));
                // exit;
                if ($etiquetas_programa != $this->input->post('id_etiqueta')) {

                    // echo "eliminar e insertar etiquetas";
                    if (!empty($etiqueta_planificacion_programa)) {
                        foreach ($etiqueta_planificacion_programa as $etiqueta_programa) {
                            // var_dump($etiqueta_programa);

                            // eliminar una etiqueta y verificar su estado si es TRUE
                            $estado_eliminado_etiqueta = $this->admin_marketing_model->eliminar_fila_tabla('psg_etiqueta_planificacion_programa', ['id_planificacion_programa' => $this->input->post('id_planificacion_programa')]);
                        }
                    }

                    // convertir en un array un string que nos envia un input limite(,)
                    $array_etiqueta = explode(",", $this->input->post('id_etiqueta'));

                    foreach ($array_etiqueta as $etiqueta) {
                        // var_dump($etiqueta);

                        // recoje las etiquetas de un programa 
                        $datos_etiqueta_programa = array(
                            'id_etiqueta' => $etiqueta,
                            'id_planificacion_programa' => $this->input->post('id_planificacion_programa')
                        );
                        // var_dump($datos_etiqueta_programa);
                        // exit;

                        // insertar a la tabla psg_etiqueta_planificacion_programa
                        $id_multi_pdf = $this->sql_psg->insertar_tabla('etiqueta_planificacion_programa', $datos_etiqueta_programa);
                        // var_dump($id_multi_pdf);
                        // exit;     
                    }
                }

                /** BLOQUE MANDAR ERRORES A JS */
                /* seccion de errores */
                if ($publicacion_correcto == TRUE && $estado_detalle_programa == TRUE) {

                    # code...
                    $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array(
                            'exito' => $publicacion_correcto,
                            'exito_detalle' => $estado_detalle_programa
                        )));
                } else {

                    $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array(
                            'error' => 'Error al actualizar el registro(' . $publicacion_correcto . ').',
                            'error_detalle' => 'Error al actualizar el  registro(' . $estado_detalle_programa . ').'
                        )));
                }
                /* fin seccion de errores */
            }
        }
    }

    /**
     * Descripción de la funcion  : Se encarga de subir multiples archivos al servidor
     * Descripción de los parametros :
     * ruta                 : directorio donde se almacenara los archivos ejemplo("img/uploads") 
     * configuraciones		: las configuraciones como ser path,size, etc y tiene que estar en un array.
     * nombre_input_file    : el nombre que se le asigno al atributo "name=nombre[]" de un input de tipo * file
     * archivos             : aqui el array que contiene el $_FILES['nombre_input_file']
     */
    public function subir_archivos_multipes($ruta, $configuraciones, $nombre_input_file, $archivos)
    {
        $this->load->library('upload', $configuraciones);

        $archivos_subidos = array();
        $archivos_erroneos = '';

        $files = count($archivos['name']);
        for ($i = 0; $i < $files; $i++) {

            $_FILES[$nombre_input_file]['name'] = $archivos['name'][$i];
            $_FILES[$nombre_input_file]['type'] = $archivos['type'][$i];
            $_FILES[$nombre_input_file]['tmp_name'] = $archivos['tmp_name'][$i];
            $_FILES[$nombre_input_file]['error'] = $archivos['error'][$i];
            $_FILES[$nombre_input_file]['size'] = $archivos['size'][$i];
            $configuraciones['upload_path'] = $ruta;

            $this->upload->initialize($configuraciones);
            if ($this->upload->do_upload($nombre_input_file)) {
                $archivos_subidos[] = $this->upload->data();
            } else {
                $archivos_erroneos .= strip_tags($this->upload->display_errors()) . '<br>' . $archivos['name'][$i] . '</b><br>';
            }
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
            $archivos_erroneos .= strip_tags($this->upload->display_errors()) . '<br>' . $archivos['name'] . '</b><br>';
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

    /**
     * Descripción  : 
     * 1.-  esta función se encarga de eliminar las imagenes adicionales tanto del servidor como de la *      base de datos 
     */
    public function eliminar_imagenes()
    {
        if (isset($_POST["id"])) {

            $id = $_POST["id"];

            // listar imagen adicional de un programa
            $obtuvo_la_imagen = $this->admin_marketing_model->listar_imagenes(['m.id_multimedia' => $id]);
            // var_dump($obtuvo_la_imagen->nombre_archivo);
            // exit();


            if ($obtuvo_la_imagen) {

                // obtener el nombre del archivo
                $imagen = $obtuvo_la_imagen->nombre_archivo;
                // var_dump($imagen);
                // exit();

                // eliminar imagen adicional de la tabla multimedia_publicacion
                $eliminoImagen = $this->admin_marketing_model->eliminar_fila_tabla('multimedia_publicacion', ['id_multimedia' => $id]);
                // var_dump($eliminoImagen);
                // exit();

                // eliminar imagen adicional de la tabla multimedia
                $eliminoImagenMultimedia = $this->admin_marketing_model->eliminar_fila_tabla('multimedia', ['id_multimedia' => $id]);
                // var_dump($eliminoImagenMultimedia);
                // exit();

                if ($eliminoImagen) {
                    //Lo eliminamos del servidor
                    if (unlink("img/img_publicaciones/$imagen")) {
                        die("true");
                    } else {
                        die("Hubo un error, por favor, contacta al administrador.");
                    }
                } else {
                    die("Hubo un error, por favor, contacta al administrador.");
                }
            } else {
                die("Hubo un error, por favor, contacta al administrador.");
            }
        }
    }
}
