<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Institucion: Unidad de Posgrado
 * Sistema:
 * Módulo: Asistencia
 * Descripcion: Controlador del módulo de asistencia
 * @author: Marlien Ruth Quispe Tola, Juan Carlos Condori Zapana
 * Fecha: 10/05/2020
 */

class Asistencia_model extends PSG_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->db->query("SET search_path = public, principal, academico, administrativo, financiero, correspondencia, rrhh");
  }

  /* ------------------------------------------------------ */
  /*                      Tipo horario                      */
  /* ------------------------------------------------------ */
  public function tipo_horario($accion, $condicion = null, $datos)
  {
    switch ($accion) {
      case 'select':

        if (!is_null($condicion)) {
          return $this->db->get_where('tipo_horario', $condicion)->result_array();
        } else {
          return $this->db->get('tipo_horario')->result_array();
        }
        break;

      case 'insert':

        return ($this->db->insert('tipo_horario', $datos)) ?
          $this->db->insert_id('rrhh.psg_tipo_horario_id_tipo_horario_seq') : $this->db->error();
        break;

      case 'update':

        $this->db->where($condicion);
        return ($this->db->update('tipo_horario', $datos)) ? true : $this->db->error();
        break;

      case 'estado':

        $this->db->set($datos);
        $this->db->where($condicion);
        return ($this->db->update('tipo_horario')) ? true : $this->db->error();
        break;

      case 'delete':
        return ($this->db->delete('tipo_horario', $condicion)) ? true : $this->db->error();
        break;
    }
  }

  /* ------------------ Fin tipo horario ------------------ */


  /* ------------------------------------------------------ */
  /*                 Asignación de horarios                 */
  /* ------------------------------------------------------ */

  ##Listar usuarios
  public function listar_usuarios()
  {
    $this->db->select('id_cargo_unidad, nombre, paterno, materno, ci, expedido');
    return  $this->db->get('vista_cargo_unidad')->result_array();
  }

  public function asignacion_horario($accion, $condicion = null, $datos)
  {
    switch ($accion) {
      case 'select':

        if (!is_null($condicion)) {
          return $this->db->get_where('asignacion_horario', $condicion)->result_array();
        } else {
          return $this->db->get('asignacion_horario')->result_array();
        }
        break;

      case 'insert':

        return ($this->db->insert('asignacion_horario', $datos)) ?
          $this->db->insert_id('rrhh.psg_asignacion_horario_id_asignacion_horario_seq') : $this->db->error();
        break;

      case 'update':

        $this->db->where($condicion);
        return ($this->db->update('asignacion_horario', $datos)) ? true : $this->db->error();
        break;

      case 'estado':

        $this->db->set($datos);
        $this->db->where($condicion);
        return ($this->db->update('asignacion_horario')) ? true : $this->db->error();
        break;

      case 'delete':
        $this->db->where($condicion);
        return ($this->db->delete('asignacion_horario')) ? true : $this->db->error();
        break;
    }
  }

  /* ------------- Fin asignación de horarios ------------- */

  /* ------------------------------------------------------ */
  /*                      Días festivos                     */
  /* ------------------------------------------------------ */
  public function dias_festivos($accion, $condicion = null, $datos)
  {
    switch ($accion) {
      case 'select':

        if (!is_null($condicion)) {
          return $this->db->get_where('dias_festivos', $condicion)->result_array();
        } else {
          return $this->db->get('dias_festivos')->result_array();
        }
        break;

      case 'insert':

        return ($this->db->insert('dias_festivos', $datos)) ?
          $this->db->insert_id('rrhh.psg_dias_festivos_id_dias_festivos_seq') : $this->db->error();
        break;

      case 'update':

        $this->db->where($condicion);
        return ($this->db->update('dias_festivos', $datos)) ? true : $this->db->error();
        break;

      case 'estado':

        $this->db->set($datos);
        $this->db->where($condicion);
        return ($this->db->update('dias_festivos')) ? true : $this->db->error();
        break;

      case 'delete':
        $this->db->where($condicion);
        return ($this->db->delete('dias_festivos')) ? true : $this->db->error();
        break;
    }
  }
  /* ------------------ Fin días festivos ----------------- */



  /* ------------------------------------------------------ */
  /*              Generar tarjeta de asistencia             */
  /* ------------------------------------------------------ */
  public function buscar_usuario_asignado($condicion)
  {
    return $this->db->get_where('vista_asistencia_datos', $condicion, 1)->result_array();
  }
  /**
   *  Uso  : Lista todas las asistencia del usuario segun fecha inicial y fecha final enviado por usuario
   * Retorna : Listado de asistencias en array
   */
  public function listar_reporte_usuario($codigo, $tipo_marcado, $fechaInicial, $fechaFinal)
  {

    # Verificar el id asignacion horario
    $query = $this->db->get_where(
      "vista_asistencia_datos",
      array(
        'codigo_archivo_personal' => trim(strtoupper($codigo)),
        'tipo_marcado' => trim($tipo_marcado)
      )
    )->result_array();

    $codigo = $query[0]["id_asignacion_horario"];


    if ($fechaInicial == null && $fechaFinal == null) {

      # Devoler todos las asistencias
    } else if ($fechaInicial == $fechaFinal) {

      # Devolver un solo registro
      return $this->db->get_where("vista_asistencia", array(
        'id_asignacion_horario' => $codigo,
        'fecha' => $fechaInicial
      ))->result_array();
    } else {

      # Devolver rango de la fecha Incial y Final
      $this->db->where('fecha >=', $fechaInicial);
      $this->db->where('fecha <=', $fechaFinal);
      $this->db->where('id_asignacion_horario', $codigo);
      $query =  $this->db->get("vista_asistencia")->result_array();

      return $query;
    }
  }

  /* ----------- Fin generar tarjeta asistencia ----------- */



  /* ------------------------------------------------------ */
  /*                   Marcado de usuarios                  */
  /* ------------------------------------------------------ */
  // Retorna sus asignacion de horario de un usuario
  public function buscar_asignacion_horario($condicion)
  {
    return $this->db->get_where('vista_asistencia_datos', $condicion)->result_array();
  }

  /**
   * Uso : Verifica si el usuario ha marcado
   * retorna : array
   */
  public function verificar_si_el_usuario_ha_marcado($id_asignacion_horario)
  {
    return
      $this->db->get_where(
        'vista_asistencia',
        array(
          'id_asignacion_horario' => trim($id_asignacion_horario['id_asignacion_horario']),
          'fecha' =>  date('Y-m-d'),
          "salida" => null
        )
      )->result_array();
  }

  /**
   * Uso : guardar el marcado de usuario
   */
  public function insertar_marcado($datos)
  {
    return ($this->db->insert('fecha_asistencia', $datos)) ?
      $this->db->insert_id('rrhh.psg_fecha_asistencia_id_fecha_asistencia_seq') : $this->db->error();
  }

  /**
   * Uso: Verifica la hora de marcado y salida
   * Retorna : Array
   */
  public function verificar_hora_marcado($id_asignacion_horario)
  {
    return $this->db->get_where(
      'vista_asistencia_datos',
      array(
        'id_asignacion_horario' => $id_asignacion_horario
      ),
      1
    )->result_array();
  }

  /**
   * Uso: Marcado de la salida del usuario
   * Retorna: boolean
   */
  public function marcado_salida($id)
  {
    date_default_timezone_set('America/La_Paz');
    $this->db->set('salida', date('Y-m-d H:i:s'));
    $this->db->set('descripcion', ucfirst(strtolower(trim($id['descripcion']))));
    $this->db->where('id_fecha_asistencia', $id['id_fecha_asistencia']);
    return $this->db->update('fecha_asistencia') ? true : $this->db->error();
  }

  /* ------------- Fin de marcado de usuarios ------------- */



  /* ------------------------------------------------------ */
  /*                  Solicitud de permiso                  */
  /* ------------------------------------------------------ */
  public function guardar_permiso($datos)
  {
    return ($this->db->insert('fecha_asistencia', $datos)) ?
      $this->db->insert_id('rrhh.psg_fecha_asistencia_id_fecha_asistencia_seq') : $this->db->error();
  }

  /**
   * buscar permiso
   */
  public function buscar_fecha_permiso($condicion)
  {
    return  $this->db->get_where("vista_asistencia", $condicion)->result_array();
  }
  /**
   * Uso: Eliminar fecha asistencia permiso
   */
  public function eliminar_fecha_permiso($condicion)
  {
    $this->db->where($condicion);
    return ($this->db->delete('fecha_asistencia')) ? true : $this->db->error();
  }
  /* -------------- End solicitud de permiso -------------- */
}
