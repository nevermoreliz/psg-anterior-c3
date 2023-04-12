<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

class Docente_mdl extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function datos_persona($id_persona = NULL, $ci = NULL)
    {
        if ($id_persona === TRUE) {
            $query = $this->db->get('principal.psg_persona');
            return $query->result_array();
        } elseif (is_numeric($id_persona)) {
            $query = $this->db->get_where('principal.psg_persona', array('id_persona' => $id_persona));
            return $query->row_array();
        } elseif (!is_null($ci)) {
            $query = $this->db->get_where('principal.psg_persona', array('ci' => $ci));
            return $query->row_array();
        } else {
            return NULL;
        }
    }

    public function datos_persona_u($ci)
    {
        $sic = $this->load->database('dbsic', TRUE);
        $sic->where('ci', $ci);
        $query = $sic->get('persona');
        $resultado = (($query) ? $query->row_array() : NULL);
        return $resultado;
    }


    public function datos_docente($id_persona = NULL, $ci = NULL)
    {
        if ($id_persona === TRUE) {
            $query = $this->db->get('vista_docentes');
            $resultado = (($query) ? $query->result_array() : $this->db->error());
        } elseif (is_numeric($id_persona)) {
            $query = $this->db->get_where('academico.psg_docente', array('id_persona' => $id_persona));
            $resultado = (($query) ? $query->row_array() : $this->db->error());
        } elseif (!is_null($ci)) {
            $query = $this->db->get_where('principal.psg_persona', array('ci' => $ci));
            $resultado = (($query) ? $query->row_array() : $this->db->error());
        } else {
            $resultado['code'] = 'info';
            $resultado['message'] = 'No se han encontrado registros de posgraduantes.';
        }
        return $resultado;
    }

    public function datos_coordinador($id_persona = NULL, $ci = NULL)
    {
        if ($id_persona === TRUE) {
            $query = $this->db->get('vista_coordinadores');
            $resultado = (($query) ? $query->result_array() : $this->db->error());
        } elseif (is_numeric($id_persona)) {
            $query = $this->db->get_where('administrativo.psg_coordinador', array('id_persona' => $id_persona));
            $resultado = (($query) ? $query->row_array() : $this->db->error());
        } elseif (!is_null($ci)) {
            $query = $this->db->get_where('principal.psg_persona', array('ci' => $ci));
            $resultado = (($query) ? $query->row_array() : $this->db->error());
        } else {
            $resultado['code'] = 'info';
            $resultado['message'] = 'No se han encontrado registros de posgraduantes.';
        }
        return $resultado;
    }

    public function datos_usuario($id_persona = NULL, $id_grupo = NULL)
    {
        if (is_numeric($id_persona) && is_numeric($id_grupo)) {
            $query = $this->db->get_where('principal.psg_grupo_usuario', array('id_persona' => $id_persona, 'id_grupo' => $id_grupo));
            $resultado = (($query) ? $query->result_array() : $this->db->error());
        } else {
            $resultado['code'] = 'info';
            $resultado['message'] = 'No se han encontrado registros de posgraduantes.';
        }
        return $resultado;
    }

    public function guardar_docente_u($datos)
    {
        $sic = $this->load->database('dbsic', TRUE);
        $datos['fecha_nacimiento'] = (empty($datos['fecha_nacimiento']) ? NULL : $datos['fecha_nacimiento']);
        if (empty($datos['caja_salud_fecha_afiliacion'])) {
            unset($datos['caja_salud_fecha_afiliacion']);
        }
        $datos['fecha_registro_persona'] = date('Y-m-d H:i:s');
        foreach ($datos as $key => $dato) {
            if ($key === 'imagen_persona') {
            } elseif ($key === 'email') {
                $datos[$key] = mb_strtolower(trim($datos[$key]));
            } else {
                $datos[$key] = mb_strtoupper(trim($datos[$key]));
            }
        }
        if (empty($datos['id_persona'])) {
            return array();
        } else {
            $id_persona = $datos['id_persona'];
            $id_caja_salud = $datos['id_caja_salud'];
            $caja_salud_numero_asegurado = $datos['caja_salud_numero_asegurado'];
            $id_afp = $datos['id_afp'];
            $afp_numero_nua = $datos['afp_numero_nua'];
            $id_banco = $datos['id_banco'];
            $numero_cuenta_bancaria = $datos['numero_cuenta_bancaria'];
            unset($datos['id_persona']);
            unset($datos['id_persona_u']);
            $datos['id_grado_academico'] = ($datos['oficio_trabajo'] == 'PH.D.' ? '4' : ($datos['oficio_trabajo'] == 'M.SC.' ? '3' : '1'));
            unset($datos['oficio_trabajo']);
            $datos['fecha_nac'] = $datos['fecha_nacimiento'];
            unset($datos['fecha_nacimiento']);
            $datos['nacionalidad'] = ($datos['id_pais_nacionalidad'] == '11' ? 'BOLIVIA' : ($datos['id_pais_nacionalidad'] == '12' ? 'PERU' : ($datos['id_pais_nacionalidad'] == '13' ? 'ARGENTINA' : ($datos['id_pais_nacionalidad'] == '14' ? 'BRASIL' : ($datos['id_pais_nacionalidad'] == '15' ? 'PANAMA' : 'RUSIA')))));
            unset($datos['id_pais_nacionalidad']);
            $datos['direccion'] = $datos['domicilio'];
            unset($datos['domicilio']);
            $datos['detalle_fecha_ingreso_upea'] = 'PLANILLA POSGRADO';
            $datos['id_persona_regin'] = '0';
            $datos['provincia_localidad_vivienda'] = '-';
            $datos['bachillerato'] = '';
            if ($sic->insert('persona', $datos)) {
                $this->db->where('id_persona', $id_persona);
                $this->db->update('persona', array(
                    'id_persona_u' => $sic->insert_id(),
                    'id_caja_salud' => $id_caja_salud,
                    'caja_salud_numero_asegurado' => $caja_salud_numero_asegurado,
                    'id_afp' => $id_afp,
                    'afp_numero_nua' => $afp_numero_nua,
                    'id_banco' => $id_banco,
                    'numero_cuenta_bancaria' => $numero_cuenta_bancaria
                ));
                return $sic->insert_id();
            } else {
                $err = $sic->error();
                return $err;
            }
        }
    }

    public function guardar_docente($datos)
    {
        //var_dump($datos);
        /*if (preg_match('/^data:image\/(\w+);base64,/', $datos['imagen_persona'], $formato)) {
            $imagen = substr($datos['imagen_persona'], strpos($datos['imagen_persona'], ',') + 1);
            $datos['imagen_persona'] = date('Y_m_d_H_i_s') . '.' . strtolower($formato[1]);
        } else {
            $imagen = '';
            $datos['imagen_persona'] = 'persona.gif';
            unset($datos['imagen_persona']);
        }*/
        $datos['fecha_nacimiento'] = (empty($datos['fecha_nacimiento']) ? NULL : $datos['fecha_nacimiento']);
        if (empty($datos['caja_salud_fecha_afiliacion'])) {
            unset($datos['caja_salud_fecha_afiliacion']);
        }
        $datos['fecha_registro_persona'] = date('Y-m-d H:i:s');
        foreach ($datos as $key => $dato) {
            if ($key === 'imagen_persona') {
            } elseif ($key === 'email') {
                $datos[$key] = mb_strtolower(trim($datos[$key]));
            } else {
                $datos[$key] = mb_strtoupper(trim($datos[$key]));
            }
        }
        if (empty($datos['id_persona'])) {
            unset($datos['id_persona']);
            if ($this->db->insert('principal.psg_persona', $datos)) {
                $id_persona = $this->db->insert_id();
                if (!empty($imagen)) {
                    //file_put_contents(APPPATH . '../public_html/img/personas/' . $id_persona  . '___' . $datos['imagen_persona'], base64_decode($imagen));
                }
                $nombre_usuario = strtoupper(strpos($datos['nombre'], ' ') ? substr($datos['nombre'], 0, strpos($datos['nombre'], ' ')) : $datos['nombre']) . $datos['ci'];
                $clave_usuario = (empty($datos['fecha_nacimiento']) ? '2019-01-01' : $datos['fecha_nacimiento']);
                $this->db->insert('principal.psg_usuario', array('id_usuario' => $id_persona, 'nombre_usuario' => $nombre_usuario, 'clave_usuario' => $clave_usuario));
            } else {
                $err = $this->db->error();
                if ($err['code'] === 1062) {
                    $persona = $this->datos_persona(NULL, $datos['ci']);
                    $id_persona = $persona->id_persona;
                    $this->db->where('id_persona', $id_persona);
                    if ($this->db->update('principal.psg_persona', $datos)) {
                        if (!empty($imagen)) {
                            //file_put_contents(APPPATH . '../public_html/img/personas/' . $id_persona  . '___' . $datos['imagen_persona'], base64_decode($imagen));
                        }
                    } else {
                        $err = $this->db->error();
                        return $err;
                    }
                } else {
                    return $err;
                }
            }
            if ($this->db->insert('academico.psg_docente', array('id_persona' => $id_persona))) {
                $this->db->insert('principal.psg_grupo_usuario', array('id_grupo' => 12, 'id_persona' => $id_persona, 'id_usuario_registro' => '5676', 'fecha_registro' => date('Y-m-d H:i:s'), 'ip_usuario' => '127.0.0.1', 'estado_grupo_usuario' => 'ACTIVO'));
                return $id_persona;
            } else {
                $err = $this->db->error();
                return $err;
            }
        } else {
            $this->db->where('id_persona', $datos['id_persona']);
            if ($this->db->update('principal.psg_persona', $datos)) {
                if (!empty($datos['id_persona_u'])) {
                    $id_caja_salud = $datos['id_caja_salud'];
                    $caja_salud_numero_asegurado = $datos['caja_salud_numero_asegurado'];
                    $id_afp = $datos['id_afp'];
                    $afp_numero_nua = $datos['afp_numero_nua'];
                    $id_banco = $datos['id_banco'];
                    $numero_cuenta_bancaria = $datos['numero_cuenta_bancaria'];
                    $sic = $this->load->database('dbsic', TRUE);
                    $sic->where('id', $datos['id_persona_u']);
                    $sic->update('persona', array(
                        'id_caja_salud' => $id_caja_salud,
                        'caja_salud_numero_asegurado' => $caja_salud_numero_asegurado,
                        'id_afp' => $id_afp,
                        'afp_numero_nua' => $afp_numero_nua,
                        'id_banco' => $id_banco,
                        'numero_cuenta_bancaria' => $numero_cuenta_bancaria
                    ));
                    return $datos['id_persona_u'];
                } else {
                    if (!empty($imagen)) {
                        //file_put_contents(APPPATH . '../public_html/img/personas/' . $datos['id_persona']  . '___' . $datos['imagen_persona'], base64_decode($imagen));
                    }
                    $docente = $this->datos_docente($datos['id_persona']);
                    if (is_null($docente)) {
                        $this->db->insert('academico.psg_docente', array('id_persona' => $datos['id_persona']));
                    }
                    $usuario = $this->datos_usuario($datos['id_persona'], 12);
                    if (is_null($usuario)) {
                        $this->db->insert('principal.psg_grupo_usuario', array('id_grupo' => 12, 'id_persona' => $datos['id_persona'], 'id_usuario_registro' => '5676', 'fecha_registro' => date('Y-m-d H:i:s'), 'ip_usuario' => '127.0.0.1', 'estado_grupo_usuario' => 'ACTIVO'));
                    }
                    return $datos['id_persona'];
                }
            } else {
                $err = $this->db->error();
                return $err;
            }
        }
    }

    public function guardar_coordinador($datos)
    {
        //var_dump($datos);
        /*if (preg_match('/^data:image\/(\w+);base64,/', $datos['imagen_persona'], $formato)) {
            $imagen = substr($datos['imagen_persona'], strpos($datos['imagen_persona'], ',') + 1);
            $datos['imagen_persona'] = date('Y_m_d_H_i_s') . '.' . strtolower($formato[1]);
        } else {
            $imagen = '';
            $datos['imagen_persona'] = 'persona.gif';
            unset($datos['imagen_persona']);
        }*/
        $datos['fecha_nacimiento'] = (empty($datos['fecha_nacimiento']) ? NULL : $datos['fecha_nacimiento']);
        if (empty($datos['caja_salud_fecha_afiliacion'])) {
            unset($datos['caja_salud_fecha_afiliacion']);
        }
        $datos['fecha_registro_persona'] = date('Y-m-d H:i:s');
        foreach ($datos as $key => $dato) {
            if ($key === 'imagen_persona') {
            } elseif ($key === 'email') {
                $datos[$key] = mb_strtolower(trim($datos[$key]));
            } else {
                $datos[$key] = mb_strtoupper(trim($datos[$key]));
            }
        }
        if (empty($datos['id_persona'])) {
            unset($datos['id_persona']);
            if ($this->db->insert('principal.psg_persona', $datos)) {
                $id_persona = $this->db->insert_id();
                if (!empty($imagen)) {
                    //file_put_contents(APPPATH . '../public_html/img/personas/' . $id_persona  . '___' . $datos['imagen_persona'], base64_decode($imagen));
                }
                $nombre_usuario = strtoupper(strpos($datos['nombre'], ' ') ? substr($datos['nombre'], 0, strpos($datos['nombre'], ' ')) : $datos['nombre']) . $datos['ci'];
                $clave_usuario = (empty($datos['fecha_nacimiento']) ? '2019-01-01' : $datos['fecha_nacimiento']);
                $this->db->insert('principal.psg_usuario', array('id_usuario' => $id_persona, 'nombre_usuario' => $nombre_usuario, 'clave_usuario' => $clave_usuario));
            } else {
                $err = $this->db->error();
                if ($err['code'] === 1062) {
                    $persona = $this->datos_persona(NULL, $datos['ci']);
                    $id_persona = $persona->id_persona;
                    $this->db->where('id_persona', $id_persona);
                    if ($this->db->update('principal.psg_persona', $datos)) {
                        if (!empty($imagen)) {
                            //file_put_contents(APPPATH . '../public_html/img/personas/' . $id_persona  . '___' . $datos['imagen_persona'], base64_decode($imagen));
                        }
                    } else {
                        $err = $this->db->error();
                        return $err;
                    }
                } else {
                    return $err;
                }
            }
            if ($this->db->insert('administrativo.psg_coordinador', array('id_persona' => $id_persona))) {
                $this->db->insert('principal.psg_grupo_usuario', array('id_grupo' => 12, 'id_persona' => $id_persona, 'id_usuario_registro' => '5676', 'fecha_registro' => date('Y-m-d H:i:s'), 'ip_usuario' => '127.0.0.1', 'estado_grupo_usuario' => 'ACTIVO'));
                return $id_persona;
            } else {
                $err = $this->db->error();
                return $err;
            }
        } else {
            $this->db->where('id_persona', $datos['id_persona']);
            if ($this->db->update('principal.psg_persona', $datos)) {
                if (!empty($imagen)) {
                    //file_put_contents(APPPATH . '../public_html/img/personas/' . $datos['id_persona']  . '___' . $datos['imagen_persona'], base64_decode($imagen));
                }
                $coordinador = $this->datos_coordinador($datos['id_persona']);
                if (is_null($coordinador)) {
                    $this->db->insert('administrativo.psg_coordinador', array('id_persona' => $datos['id_persona']));
                }
                $usuario = $this->datos_usuario($datos['id_persona'], 12);
                if (is_null($usuario)) {
                    $this->db->insert('principal.psg_grupo_usuario', array('id_grupo' => 12, 'id_persona' => $datos['id_persona'], 'id_usuario_registro' => '5676', 'fecha_registro' => date('Y-m-d H:i:s'), 'ip_usuario' => '127.0.0.1', 'estado_grupo_usuario' => 'ACTIVO'));
                }
                return $datos['id_persona'];
            } else {
                $err = $this->db->error();
                return $err;
            }
        }
    }

    function guardar_nombramiento_docente($datos)
    {
        foreach ($datos as $key => $dato) {
            if ($key === 'imagen_persona') {
            } elseif ($key === 'email') {
                $datos[$key] = mb_strtolower(trim($datos[$key]));
            } elseif ($key === 'resolucion_docente') {
                $datos[$key] = trim($datos[$key]);
            } else {
                $datos[$key] = mb_strtoupper(trim($datos[$key]));
            }
        }
        if (isset($datos['id_asignacion_modulo_programa'])) {
            $id_asignacion_modulo_programa = $datos['id_asignacion_modulo_programa'];
            unset($datos['id_asignacion_modulo_programa']);
        }
        $amp = array_slice($datos, 0, 9);
        $famp = array_slice($datos, 9);
        /*var_dump($amp);
        var_dump($famp);
        var_dump($id_asignacion_modulo_programa);
        exit();*/
        $amp['id_usuario'] = $this->input->cookie('id_persona');
        if (empty($amp['nro_nombramiento'])) {
            $amp['nro_nombramiento'] = $this->correlativo_nombramiento() + 1;
        }
        if (!empty($id_asignacion_modulo_programa)) {
            $this->db->where('id_asignacion_modulo_programa', $id_asignacion_modulo_programa);
            if ($this->db->update('asignacion_modulo_programa', $amp)) {
                $famp['id_asignacion_modulo_programa'] = $id_asignacion_modulo_programa;
                $famp['asistencia'] = 'PRESENTE';
                $fechas = explode(',', $famp['fechas']);
                $horas = explode(',', $famp['horas']);
                unset($famp['fechas']);
                unset($famp['horas']);
                $resultado = false;
                $this->db->where('id_asignacion_modulo_programa', $id_asignacion_modulo_programa);
                $this->db->delete('fecha_asignacion_modulo_programa');
                foreach ($fechas as $fecha) {
                    $famp['fecha_asignada'] = $fecha;
                    $famp['horas_asignadas'] = array_shift($horas);
                    if ($this->db->insert('fecha_asignacion_modulo_programa', $famp)) {
                        $resultado = true;
                    }
                }
                return $resultado;
            } else {
                return $this->db->error();
            }
        } else {
            if ($this->db->insert('asignacion_modulo_programa', $amp)) {
                $id_asignacion_modulo_programa = $this->db->insert_id('academico.psg_asignacion_modulo_program_id_asignacion_modulo_programa_seq');
                $famp['id_asignacion_modulo_programa'] = $id_asignacion_modulo_programa;
                $famp['asistencia'] = 'PRESENTE';
                $fechas = explode(',', $famp['fechas']);
                $horas = explode(',', $famp['horas']);
                unset($famp['fechas']);
                unset($famp['horas']);
                $resultado = false;
                foreach ($fechas as $fecha) {
                    $famp['fecha_asignada'] = $fecha;
                    $famp['horas_asignadas'] = array_shift($horas);
                    if ($this->db->insert('fecha_asignacion_modulo_programa', $famp)) {
                        $resultado = true;
                    }
                }
                return $resultado;
            } else {
                return $this->db->error();
            }
        }
    }

    public function correlativo_nombramiento()
    {
        $query = $this->db->get('vista_correlativo_nombramiento');
        $resultado = $query->result_array();
        return intval($resultado[0]['nro']);
    }


    function guardar_nombramiento_coordinador($datos)
    {
        foreach ($datos as $key => $dato) {
            if ($key === 'imagen_persona') {
            } elseif ($key === 'email') {
                $datos[$key] = mb_strtolower(trim($datos[$key]));
            } elseif ($key === 'resolucion_coordinador') {
                $datos[$key] = trim($datos[$key]);
            } else {
                $datos[$key] = mb_strtoupper(trim($datos[$key]));
            }
        }
        if (isset($datos['id_asignacion_programa'])) {
            $id_asignacion_programa = $datos['id_asignacion_programa'];
            unset($datos['id_asignacion_programa']);
        }
        $ap = array_slice($datos, 0, 9);
        $fap = array_slice($datos, 9);
        if (empty($ap['nro_nombramiento'])) {
            $ap['nro_nombramiento'] = $this->correlativo_nombramiento() + 1;
        }
        if (!empty($id_asignacion_programa)) {
            $this->db->where('id_asignacion_programa', $id_asignacion_programa);
            if ($this->db->update('asignacion_programa', $ap)) {
                $fap['id_asignacion_programa'] = $id_asignacion_programa;
                $fechas = explode(',', $fap['fechas']);
                $horas = explode(',', $fap['horas']);
                unset($fap['fechas']);
                unset($fap['horas']);
                $resultado = false;
                $this->db->where('id_asignacion_programa', $id_asignacion_programa);
                $this->db->delete('fecha_asignacion_programa');
                foreach ($fechas as $fecha) {
                    $fap['fecha_asignacion'] = $fecha;
                    $fap['horas_asignadas_coordinador'] = array_shift($horas);
                    if ($this->db->insert('fecha_asignacion_programa', $fap)) {
                        $resultado = true;
                    }
                }
                return $resultado;
            } else {
                return $this->db->error();
            }
        } else {
            if ($this->db->insert('asignacion_programa', $ap)) {
                $id_asignacion_programa = $this->db->insert_id('administrativo.psg_asignacion_programa_id_asignacion_programa_seq');
                $fap['id_asignacion_programa'] = $id_asignacion_programa;
                $fechas = explode(',', $fap['fechas']);
                $horas = explode(',', $fap['horas']);
                unset($fap['fechas']);
                unset($fap['horas']);
                $resultado = false;
                foreach ($fechas as $fecha) {
                    $fap['fecha_asignacion'] = $fecha;
                    $fap['horas_asignadas_coordinador'] = array_shift($horas);
                    if ($this->db->insert('fecha_asignacion_programa', $fap)) {
                        $resultado = true;
                    }
                }
                return $resultado;
            } else {
                return $this->db->error();
            }
        }
    }
}
