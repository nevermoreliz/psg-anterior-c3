<?php defined('BASEPATH') or exit('No direct script access allowed');
/** 
 * Institucion: Unidad de Posgrado
 * Sistema: 
 * Módulo: Asistencia
 * Descripcion: Controlador del módulo de asistencia
 * @author: Marlien Ruth Quispe Tola, Juan Carlos Condori Zapana
 * Fecha: 10/05/2020
 */

class Asistencia extends PSG_Controller
{
  var $usuario;
  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->usuario = autentificado();
    if (!$this->usuario) {
      $this->session->set_flashdata('info', 'Escriba su Nombre de Usuario y su Clave de Acceso, para verificar su identidad.');
      redirect(base_url('login'));
    }
    $this->data['usuario'] = $this->usuario;
    $this->load->model('asistencia_model');
    $this->load->library('reportes');
  }

  /* ------------------------------------------------------ */
  /*                        Horarios                        */
  /* ------------------------------------------------------ */

  /**
   * Uso: Carga el listado de horarios del sistema
   * Retorna: Vista asistencia horarios
   */
  public function horarios()
  {
    $this->templater->view_horizontal_admin('asistencia/horarios', $this->data);
  }

  /**
   * Uso: Principalmente su uso es para llenar los datos a la tabla horarios
   * Retorna: JSON
   */
  public function ajax_listar_horarios()
  {
    if ($this->input->is_ajax_request()) {
      $table = "tipo_horario";
      $primaryKey = "id_tipo_horario";
      $columns = array(
        array('db' => 'id_tipo_horario', 'dt' => 0),
        array('db' => 'turno', 'dt'           => 1),
        array('db' => 'tipo_marcado', 'dt'    => 2),
        array('db' => 'hora_inicio', 'dt'     => 3),
        array('db' => 'hora_fin', 'dt'        => 4),
        array('db' => 'carga_horaria', 'dt'   => 5),
        array('db' => 'estado', 'dt'          => 6)
      );
      $sql_details = array(
        'user' => $this->db->username,
        'pass' => $this->db->password,
        'db' => $this->db->database,
        'host' => $this->db->hostname
      );

      $this->output->set_content_type('application/json')
        ->set_output(
          json_encode(
            SSP::simple(
              $_GET,
              $sql_details,
              $table,
              $primaryKey,
              $columns
            )
          )
        );
    }
  }

  /**
   * Funcion: Se encarga de mostrar una vista con los campos necesarios para guardar tipo horario
   * Llamada desde: AJAX
   * Retorna: HTML
   */
  public function campos_tipo_horario()
  {
    if ($this->input->is_ajax_request()) {

      # Se llama a la libreria para validar los campos
      $this->load->library('form_validation');

      if ($this->input->post()['id_tipo_horario'] != null) {
        $this->data['tipo_horario'] = $this->asistencia_model->tipo_horario(
          'select',
          array('id_tipo_horario' => $this->input->post('id_tipo_horario')),
          NULL
        );
      } else {
        $this->data['tipo_horario'] = null;
      }

      $this->templater->view('/asistencia/partials/campos_tipo_horario', $this->data);
    }
  }

  /**
   * Descripción   : La funcion se encarga de guardar o editar tipo_horario
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function guardar_tipo_horario()
  {

    if ($this->input->is_ajax_request()) {

      # Llamamos a la libreria form validation para la validación de los campos
      $this->load->library('form_validation');

      # Se valida los campos definiendo reglas para cada campo
      if (is_null($this->input->post()['id_tipo_horario'])) {
        $this->form_validation->set_rules("id_tipo_horario", "id_tipo_horario", "required|numeric");
      }
      $this->form_validation->set_rules("turno", "Turno", "required|max_length[30]");
      $this->form_validation->set_rules("tipo_marcado", "Tipo Marcado", "required|max_length[30]");
      $this->form_validation->set_rules("hora_inicio", "Hora Entrada", "required");
      $this->form_validation->set_rules("hora_fin", "Hora Salida", "required");
      $this->form_validation->set_rules("carga_horaria", "Carga horaria", "required|numeric");

      if ($this->form_validation->run() == false) {

        # Si falla la validación de los campos falla retorna JSON con los campos
        # que no cumplen las reglas
        $this->output->set_content_type('aplication/json')->set_output(json_encode(array(
          "errors" => validation_errors()
        )));
      } else {

        # Primero se formatea los datos
        $data = array(
          "turno" => $this->input->post()['turno'],
          "tipo_marcado" => $this->input->post()['tipo_marcado'],
          "hora_inicio" => $this->input->post()['hora_inicio'],
          "hora_fin" => $this->input->post()['hora_fin'],
          "carga_horaria" => $this->input->post()['carga_horaria'],
        );

        # INSERTAMOS TIPO HORARIO
        # Si existe el id_tipo_horario
        if ($this->input->post()['id_tipo_horario'] == "") {

          $id_tipo_horario = $this->asistencia_model->tipo_horario("insert", null, $data);

          if (is_numeric($id_tipo_horario)) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'exito' => "Tipo horario agregado correctamente"
            )));
          } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'error' => "Error al insertar tipo horario"
            )));
          }
        } else {
          # ACTUALIZAMOS TIPO HORARIO
          $id_tipo_horario = $this->asistencia_model->tipo_horario(
            "update",
            array("id_tipo_horario" => $this->input->post()['id_tipo_horario']),
            $data
          );

          if ($id_tipo_horario) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'exito' => "Tipo horario actualizado correctamente"
            )));
          } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'error' => "Error al actualizar tipo horario"
            )));
          }
        }
      }
    }
  }

  /**
   * Descripción   : La funcion se encarga de activar o desactivar tipo_horario
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function estado_tipo_horario()
  {
    $estado = "";
    $this->input->post()['estado'] == 'f' ? $estado = "Desactivado" : $estado = "Activado";

    $respuesta = $this->asistencia_model->tipo_horario(
      "estado",
      array('id_tipo_horario' => $this->input->post()['id_tipo_horario']),
      array('estado' => $this->input->post()['estado'])
    );
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        "exito" => "Tipo horario " . $estado . " correctamente"
      )));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        'error' => "Error al " . $estado . " el tipo horario"
      )));
    }
  }

  /* -------------------- Fin horarios -------------------- */

  /* ------------------------------------------------------ */
  /*                    Asignar horarios                    */
  /* ------------------------------------------------------ */

  /**
   * Uso: Carga el listado de asignacion de horarios
   * Retorna: Vista asistencia asignacion_horario
   */
  public function asignacion_horario()
  {
    $this->templater->view_horizontal_admin('asistencia/asignacion_horario', $this->data);
  }

  /**
   * Uso: Principalmente su uso es para llenar los datos a la tabla asignacion horarios
   * Retorna: JSON
   */
  public function ajax_listar_asignacion_horario()
  {
    if ($this->input->is_ajax_request()) {
      $table = "vista_asistencia_datos";
      $primaryKey = "id_asignacion_horario";
      $columns = array(
        array('db' => 'id_asignacion_horario', 'dt' => 0),
        array('db' => 'nombre_completo',  'dt'      => 1),
        array('db' => 'ci',   'dt'                  => 2),
        array('db' => 'turno',     'dt'             => 3),
        array('db' => 'hora_inicio',     'dt'       => 4),
        array('db' => 'hora_fin',     'dt'          => 5),
        array('db' => 'tipo_marcado',     'dt'      => 6),
        array('db' => 'estado',     'dt'            => 7)
      );
      $sql_details = array(
        'user' => $this->db->username,
        'pass' => $this->db->password,
        'db' => $this->db->database,
        'host' => $this->db->hostname
      );

      $this->output->set_content_type('application/json')
        ->set_output(
          json_encode(
            SSP::simple(
              $_GET,
              $sql_details,
              $table,
              $primaryKey,
              $columns
            )
          )
        );
    }
  }

  /**
   * Funcion: Se encarga de mostrar una vista con los campos necesarios para guardar asignacion horario
   * Llamada desde: AJAX
   * Retorna: HTML
   */
  public function campos_asignacion_horario()
  {
    if ($this->input->is_ajax_request()) {

      # Se llama a la libreria para validar los campos
      $this->load->library('form_validation');

      if ($this->input->post()['id_asignacion_horario'] != null) {

        $this->data['asignacion_horario'] = $this->asistencia_model->asignacion_horario(
          'select',
          array('id_asignacion_horario' => $this->input->post('id_asignacion_horario')),
          NULL
        );
      } else {
        $this->data['asignacion_horario'] = null;
      }
      # Obteniendo tipo horarios activos
      $this->data['horarios'] = $this->asistencia_model->tipo_horario("select", array("estado" => "t"), null);

      # Listar usuarios
      $this->data['usuarios'] = $this->asistencia_model->listar_usuarios();

      $this->templater->view('/asistencia/partials/campos_asignacion_horario', $this->data);
    }
  }

  /**
   * Descripción   : La funcion se encarga de guardar o editar asignacion horario
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function guardar_asignacion_horario()
  {

    if ($this->input->is_ajax_request()) {

      # Llamamos a la libreria form validation para la validación de los campos
      $this->load->library('form_validation');

      # Se valida los campos definiendo reglas para cada campo
      if (is_null($this->input->post()['id_asignacion_horario'])) {
        $this->form_validation->set_rules("id_asignacion_horario", "id_asignacion_horario", "required|numeric");
      }
      $this->form_validation->set_rules("id_tipo_horario", "Horario", "required|numeric");
      $this->form_validation->set_rules("id_cargo_unidad", "Usuario", "required|numeric");

      if ($this->form_validation->run() == false) {
        # Si falla la validación de los campos falla retorna JSON con los campos
        # que no cumplen las reglas
        $this->output->set_content_type('aplication/json')->set_output(json_encode(array(
          "errors" => validation_errors()
        )));
      } else {

        # Primero se formatea los datos
        $data = array(
          "id_tipo_horario" => $this->input->post()['id_tipo_horario'],
          "id_cargo_unidad" => $this->input->post()['id_cargo_unidad']
        );

        # INSERTAMOS ASIGNACIÓN HORARIO
        # Si id_asignacion_horario es nulo
        if ($this->input->post()['id_asignacion_horario'] == "") {

          $respuesta = $this->asistencia_model->asignacion_horario("insert", null, $data);

          if (is_numeric($respuesta)) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'exito' => "Asignación de horario agregado correctamente para el usuario"
            )));
          } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'error' => "Error al insertar asignación horario"
            )));
          }
        } else {

          # ACTUALIZAMOS ASIGNACIÓN HORARIO
          $respuesta = $this->asistencia_model->asignacion_horario(
            "update",
            array("id_asignacion_horario" => $this->input->post()['id_asignacion_horario']),
            $data
          );

          if ($respuesta) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'exito' => "Asignación de horario actualizado correctamente"
            )));
          } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'error' => "Error al actualizar asignación de horario"
            )));
          }
        }
      }
    }
  }

  /**
   * Descripción   : La funcion se encarga de activar o desactivar asignacion horario
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function estado_asignacion_horario()
  {
    $estado = "";
    $this->input->post()['estado'] == 'f' ? $estado = "Desactivado" : $estado = "Activado";

    $respuesta = $this->asistencia_model->asignacion_horario(
      "estado",
      array('id_asignacion_horario' => $this->input->post()['id_asignacion_horario']),
      array('estado' => $this->input->post()['estado'])
    );
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        "exito" => "Asignación horario " . $estado . " correctamente"
      )));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        'error' => "Error al " . $estado . " la asignación de horario"
      )));
    }
  }

  /**
   * Descripción   : La funcion se encarga de eliminar una  asignacion horario
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function eliminar_asignacion_horario()
  {
    $respuesta = $this->asistencia_model->asignacion_horario(
      "delete",
      array('id_asignacion_horario' => $this->input->post()['id_asignacion_horario']),
      null
    );
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        "exito" => "Asignación horario eliminado correctamente"
      )));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        'error' => "Error al eliminar la asignación de horario"
      )));
    }
  }

  /* ---------------- Fin asignar horarios ---------------- */



  /* ------------------------------------------------------ */
  /*                      Días festivos                     */
  /* ------------------------------------------------------ */

  /**
   * Uso: Carga el listado de dias festivos
   * Retorna: Vista dias festivos
   */
  public function dias_festivos()
  {
    $this->templater->view_horizontal_admin('asistencia/dias_festivos', $this->data);
  }

  /**
   * Uso: Principalmente su uso es para llenar los datos a la tabla dias festivos
   * Retorna: JSON
   */
  public function ajax_listar_dias_festivos()
  {
    if ($this->input->is_ajax_request()) {
      $table = "dias_festivos";
      $primaryKey = "id_dias_festivos";
      $columns = array(
        array('db' => 'id_dias_festivos', 'dt' => 0),
        array('db' => 'fecha',  'dt'           => 1),
        array('db' => 'descripcion',   'dt'    => 2),
        array('db' => 'estado',     'dt'       => 3)
      );
      $sql_details = array(
        'user' => $this->db->username,
        'pass' => $this->db->password,
        'db' => $this->db->database,
        'host' => $this->db->hostname
      );

      $this->output->set_content_type('application/json')
        ->set_output(
          json_encode(
            SSP::simple(
              $_GET,
              $sql_details,
              $table,
              $primaryKey,
              $columns
            )
          )
        );
    }
  }

  /**
   * Funcion: Se encarga de mostrar una vista con los campos necesarios para guardar dia festivo
   * Llamada desde: AJAX
   * Retorna: HTML
   */
  public function campos_dias_festivos()
  {
    if ($this->input->is_ajax_request()) {

      # Se llama a la libreria para validar los campos
      $this->load->library('form_validation');

      if ($this->input->post()['id_dias_festivos'] != null) {
        $this->data['dia_festivo'] = $this->asistencia_model->dias_festivos(
          'select',
          array('id_dias_festivos' => $this->input->post('id_dias_festivos')),
          NULL
        );
      } else {
        $this->data['dia_festivo'] = null;
      }

      $this->templater->view('/asistencia/partials/campos_dias_festivos', $this->data);
    }
  }

  /**
   * Descripción   : La funcion se encarga de guardar o editar un dia festivo
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function guardar_dia_festivo()
  {

    if ($this->input->is_ajax_request()) {

      # Llamamos a la libreria form validation para la validación de los campos
      $this->load->library('form_validation');

      # Se valida los campos definiendo reglas para cada campo
      if (is_null($this->input->post()['id_dias_festivos'])) {
        $this->form_validation->set_rules("id_dias_festivos", "id_dias_festivos", "required|numeric");
      }
      $this->form_validation->set_rules("fecha", "Fecha", "required");
      $this->form_validation->set_rules("descripcion", "Descripción", "required|max_length[150]");

      if ($this->form_validation->run() == false) {
        # Si falla la validación de los campos falla retorna JSON con los campos
        # que no cumplen las reglas
        $this->output->set_content_type('aplication/json')->set_output(json_encode(array(
          "errors" => validation_errors()
        )));
      } else {

        # Primero se formatea los datos
        $data = array(
          "fecha" => $this->input->post()['fecha'],
          "descripcion" => $this->input->post()['descripcion']
        );

        # INSERTAMOS ASIGNACIÓN HORARIO
        # Si id_dias_festivos es nulo
        if ($this->input->post()['id_dias_festivos'] == "") {

          $respuesta = $this->asistencia_model->dias_festivos("insert", null, $data);

          if (is_numeric($respuesta)) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'exito' => "Día festivo agregado correctamente!!!"
            )));
          } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'error' => "Error al insertar día festivo"
            )));
          }
        } else {

          # ACTUALIZAMOS ASIGNACIÓN HORARIO
          $respuesta = $this->asistencia_model->dias_festivos(
            "update",
            array("id_dias_festivos" => $this->input->post()['id_dias_festivos']),
            $data
          );

          if ($respuesta) {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'exito' => "Día festivo actualizado correctamente"
            )));
          } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array(
              'error' => "Error al actualizar día festivo"
            )));
          }
        }
      }
    }
  }

  /**
   * Descripción   : La funcion se encarga de activar o desactivar un dia festivo
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function estado_dia_festivo()
  {
    $estado = "";
    $this->input->post()['estado'] == 'f' ? $estado = "Desactivado" : $estado = "Activado";

    $respuesta = $this->asistencia_model->dias_festivos(
      "estado",
      array('id_dias_festivos' => $this->input->post()['id_dias_festivos']),
      array('estado' => $this->input->post()['estado'])
    );
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        "exito" => "Día festivo " . $estado . " correctamente"
      )));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        'error' => "Error al " . $estado . " el día festivo"
      )));
    }
  }

  /**
   * Descripción   : La funcion se encarga de eliminar un dia festivo
   * LLamada desde : AJAX
   * Retorna      : JSON
   */
  public function eliminar_dia_festivo()
  {
    $respuesta = $this->asistencia_model->dias_festivos(
      "delete",
      array('id_dias_festivos' => $this->input->post()['id_dias_festivos']),
      null
    );
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        "exito" => "Día festivo eliminado correctamente"
      )));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        'error' => "Error al eliminar la día festivo"
      )));
    }
  }

  /* ------------------ Fin días festivos ----------------- */


  /* ------------------------------------------------------ */
  /*              Generar tarjeta de asistencia             */
  /* ------------------------------------------------------ */

  /**
   * Retorna: Vista para generar la tarjeta de asistencia
   */
  public function generar_tarjeta()
  {
    $this->templater->view_horizontal_admin('asistencia/generar_tarjeta', $this->data);
  }

  /**
   * Uso: Se verifica si el usuario esta registrado por ci
   * Retorna : JSON con msg exito
   */
  public function verificar_registro_ci()
  {
    $respuesta = $this->asistencia_model->buscar_usuario_asignado(array("ci" => $this->input->post()["ci"]));
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(
        array(
          'msg' => "exito"
        )
      ));
    }
  }

  /**
   * Uso  :  Imprimir tarjeta de asistencia
   */
  public function reporte_tarjeta_asistencia()
  {
    $data = $this->asistencia_model->buscar_usuario_asignado(array('ci' => $_GET['data']));
    $this->reportes->imprimir_tarjeta_asistencia($data, $_GET['cargo']);
  }
  /* -------- Fin de generar tarjeta de asistencia -------- */

  /* ------------------------------------------------------ */
  /*           Reportes de asistencia de usuarios           */
  /* ------------------------------------------------------ */
  /**
   * Uso: Carga el listado de asignacion de horarios
   * Retorna: Vista asistencia asignacion_horario
   */
  public function reporte_asistencia()
  {
    $this->templater->view_horizontal_admin('asistencia/reporte_asistencia', $this->data);
  }

  /**
   * Uso: Se verifica si el usuario esta registrado por codigo_archivo personal
   * Retorna : JSON con msg exito
   */
  public function verificar_registro_codigo_personal()
  {
    $respuesta = $this->asistencia_model->buscar_usuario_asignado(
      array(
        "codigo_archivo_personal" => strtoupper(trim($this->input->post()["codigo_archivo_personal"]))
      )
    );
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(
        array(
          'msg' => "exito"
        )
      ));
    }
  }

  /**
   * Uso  : Genera reporte de asistencia 
   */
  public function reporte_asistencia_usuario()
  {

    $data = strtoupper(trim($_GET['data']));
    $fechaInicial = $_GET['fechaInicial'];
    $fechaFinal = $_GET['fechaFinal'];
    $tipo_marcado = $_GET['tipo_marcado'];

    // Se obtiene datos del usuario
    $header = $this->asistencia_model->buscar_usuario_asignado(array('codigo_archivo_personal' => $data));

    // Se obtiene todas las asistencia segun requiera el usuario 
    $data = $this->asistencia_model->listar_reporte_usuario($data, $tipo_marcado, $fechaInicial, $fechaFinal);

    if (count($data) > 0) {

      $this->reportes->imprimir_reporte_asistencia($data, $header);
    } else {
      $data = null;
      $this->reportes->imprimir_reporte_asistencia($data, $header);
    }
  }

  /* ------ Fin de reporte de asistencia de usuarios ------ */

  /* ------------------------------------------------------ */
  /*                   Marcado de usuarios                  */
  /* ------------------------------------------------------ */

  /**
   * Uso: Carga el listado de asignacion de horarios
   * Retorna: Vista asistencia asignacion_horario
   */
  public function marcado()
  {
    $this->templater->view_horizontal_admin('asistencia/marcado', $this->data);
  }

  /**
   * Uso : Verifica sus asignacion de hararios del usuario
   * Retorna : JSON con sus asignaciones
   */

  public function verificar_asignaciones_horario()
  {
    $respuesta = $this->asistencia_model->buscar_asignacion_horario(
      array(
        "codigo_archivo_personal" => strtoupper(trim($this->input->post('codigo_archivo_personal'))),
        "estado" => "t"
      )
    );

    if (count($respuesta) == 1) {
      $this->output->set_content_type('application/json')->set_output(json_encode(
        array(
          'asignaciones'          => count($respuesta),
          "tipo_marcado"          => $respuesta[0]['tipo_marcado'],
          "id_asignacion_horario" => $respuesta[0]['id_asignacion_horario'],
          "turno"                 => $respuesta[0]['turno'],

        )
      ));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(
        array(
          'asignaciones' => count($respuesta)
        )
      ));
    }
  }

  /**
   * Uso : Busca Id asignacion horario
   * Retorna : JSON
   */
  public function buscar_id_asignacion_horario()
  {
    $respuesta = $this->asistencia_model->buscar_asignacion_horario($this->input->post());
    $this->output->set_content_type('application/json')->set_output(json_encode(
      array(
        "id_asignacion_horario" => $respuesta[0]['id_asignacion_horario'],
        "hora_inicio" => $respuesta[0]['hora_inicio'],
        "hora_fin" => $respuesta[0]['hora_fin'],
        "turno" => $respuesta[0]['turno']
      )
    ));
  }

  /**
   * Uso : Se verifica si el usuario ha marcado
   * retorna :  json
   */
  public function verificar_marcado_usuario()
  {
    // Verificar si el usuario ha marcado
    $registros = $this->asistencia_model->verificar_si_el_usuario_ha_marcado($this->input->post());

    //Verificar el horario de entrada y salida
    $horas = $this->asistencia_model->verificar_hora_marcado($this->input->post('id_asignacion_horario'));


    if (count($registros) == 1) {
      // Se devuelve un JSON especificando que el usuario ha marcado y no la salida
      $this->output->set_content_type('application/json')->set_output(json_encode(
        array(
          'numero_registros' => count($registros),
          'id_fecha_asistencia' => $registros[0]['id_fecha_asistencia'],
          'hora_entrada' => $horas[0]['hora_inicio'],
          'hora_salida' => $horas[0]['hora_fin']
        )
      ));
    } else {
      // Se devuelve un JSON especificando que el no ha marcado
      $this->output->set_content_type('application/json')->set_output(json_encode(
        array(
          'numero_registros' => 0,
          'id_fecha_asistencia' => null,
          'hora_entrada' => $horas[0]['hora_inicio'],
          'hora_salida' => $horas[0]['hora_fin']
        )
      ));
    }
  }

  /**
   * Uso : Marcado de entrada de usuario
   * Retorna : JSON
   */
  public function marcado_entrada()
  {
    if ($this->input->is_ajax_request()) {
      $respuesta = $this->asistencia_model->insertar_marcado($this->input->post());
      if (is_numeric($respuesta)) {
        $this->output->set_content_type('application/json')->set_output(json_encode(array(
          'exito' => "Su entrada se ha registrado correctamente!!!"
        )));
      } else {
        $this->output->set_content_type('application/json')->set_output(json_encode(array(
          'error' => "Error al registrar la entrada"
        )));
      }
    }
  }

  /**
   * Uso : marcado de salida
   * Retorna : JSON 
   */
  public function marcado_salida()
  {
    if ($this->input->is_ajax_request()) {
      $respuesta = $this->asistencia_model->marcado_salida($this->input->post());
      if ($respuesta) {
        $this->output->set_content_type('application/json')->set_output(json_encode(array(
          'exito' => "Salida registrado correctamente!!!"
        )));
      } else {
        $this->output->set_content_type('application/json')->set_output(json_encode(array(
          'error' => "Error al registrar la salida!!!"
        )));
      }
    }
  }

  /* --------------- Fin marcado de usuarios -------------- */

  /* ------------------------------------------------------ */
  /*              Completar actividades diarias             */
  /* ------------------------------------------------------ */
  public function completar_actividades()
  {
    $this->templater->view_horizontal_admin('asistencia/completar_actividades', $this->data);
  }

  /* ---------- Fin completar actividades diarias --------- */



  /* ------------------------------------------------------ */
  /*                         Permiso                        */
  /* ------------------------------------------------------ */
  public function permiso()
  {
    $this->templater->view_horizontal_admin('asistencia/permiso', $this->data);
  }

  /**
   * uso:  Reporte permiso
   */
  public function reporte_permiso()
  {
    $codigo_archivo_personal = $_GET['cod'];
    $fecha = $_GET['fecha'];
    $tipo_marcado = $_GET['tipo_marcado'];
    $motivo = strtolower(trim($_GET['motivo']));

    // Se obtiene datos del usuario
    $user = $this->asistencia_model->buscar_asignacion_horario(array('codigo_archivo_personal' => $codigo_archivo_personal, 'tipo_marcado' => $tipo_marcado));

    $this->reportes->imprimir_reporte_permiso($fecha, $user, $tipo_marcado, $motivo);
  }

  /**
   * Uso : insertar permiso
   * Retorna : JSON
   */
  public function agregar_permiso()
  {
    if ($this->input->is_ajax_request()) {

      $datos = array(
        'id_asignacion_horario' => $_POST['id_asignacion_horario'],
        'ingreso' => $_POST['fecha'],
        'salida' => $_POST['fecha'],
        'descripcion' => 'PERMISO'
      );

      $respuesta = $this->asistencia_model->guardar_permiso($datos);
      if (is_numeric($respuesta)) {
        $this->output->set_content_type('application/json')->set_output(json_encode(array(
          'exito' => "Permiso registrado correctamente!!!"
        )));
      } else {
        $this->output->set_content_type('application/json')->set_output(json_encode(array(
          'error' => "Error al solicitar permiso!!!"
        )));
      }
    }
  }

  /**
   * Uso: Busca el id_fecha_asistencia para eliminar
   * Retorna: JSON
   */
  public function buscar_permiso()
  {
    // var_dump($this->input->post());
    $condicion = array(
      'id_asignacion_horario' => $this->input->post('id_asignacion_horario'),
      'descripcion' => "PERMISO",
      'tipo_marcado' => $this->input->post('tipo_marcado'),
      'fecha' => $this->input->post('fecha'),
    );

    $respuesta = $this->asistencia_model->buscar_fecha_permiso($condicion);
    if (count($respuesta) == 1) {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        'id_fecha_asistencia' => $respuesta[0]["id_fecha_asistencia"]
      )));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        'error' => "Error al cancelar permiso!!!"
      )));
    }
  }

  /**
   * Uso: eliminar el permiso solicitado
   * Retorna: JSON
   */
  public function eliminar_permiso()
  {
    $respuesta = $this->asistencia_model->eliminar_fecha_permiso($this->input->post());
    if ($respuesta) {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        "exito" => "Dia de permiso cancelado correctamente"
      )));
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode(array(
        "error" => "Dia de permiso no pudo ser cancelado"
      )));
    }
  }
  /* --------------------- Fin permiso -------------------- */
}
