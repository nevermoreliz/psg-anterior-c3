<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('valores_enum')) {
    function valores_enum($tabla, $columna)
    {
        $CI = &get_instance();
        $type = $CI->db->query("SHOW COLUMNS FROM {$tabla} WHERE Field = '{$columna}'")->row(0)->Type;
        preg_match("/^enum\('(.*)'\)$/", $type, $matches);
        return explode("','", $matches[1]);
    }
}

if (!function_exists('autentificado')) {
    function autentificado()
    {
        $CI = &get_instance();
        $id_persona = $CI->input->cookie('id_persona', TRUE);
        $usuario = $CI->auth_model->verificar_usuario($id_persona);
        return (is_null($usuario) ? FALSE : $usuario);
    }
}

if (!function_exists('es')) {
    function es($nombre_grupo = array())
    {
        $CI = &get_instance();
        $usuario = $CI->auth_model->datos_usuario($CI->input->cookie('id_persona', TRUE), $CI->session->userdata('nombre_grupo', TRUE));
        if ($usuario != null)
            if (is_array($nombre_grupo)) {
                return in_array($usuario['nombre_grupo'], $nombre_grupo);
            } else {
                // return in_array($nombre_grupo, explode(',', preg_replace('/\s+/', '', $CI->load->get_var('usuario')['nombre_grupo'])));
                return ($usuario['nombre_grupo'] === $nombre_grupo);
            }
    }
}

if (!function_exists('css_tag')) {
    function css_tag($src = '', $type = 'text/css')
    {
        $css = '<st' . 'yle type="' . $type . '">';
        if (is_file(FCPATH . 'assets/css/' . $src . '.css')) {
            if (strpos($src, '://') === FALSE) {
                ob_start();
                require(FCPATH . 'assets/css/' . $src . '.' . 'css');
                $css .= ob_get_clean();
            }
        }
        $css .= '</st' . 'yle>';
        return $css;
    }
}


if (!function_exists('script_tag')) {
    function script_tag($src = '', $flashdata = NULL, $type = 'text/javascript')
    {
        $script = '<scr' . 'ipt type="' . $type . '">';
        if (is_file(FCPATH . 'assets/js/' . $src . '.js')) {
            if (strpos($src, '://') === FALSE) {
                ob_start();
                require(FCPATH . 'assets/js/' . $src . '.' . 'js');
                $script .= ob_get_clean();
            }
        }
        if (is_array($flashdata)) {
            foreach ($flashdata as $kmsg => $msg) {
                $script .= "$.toast({
                                icon: `<?php echo ((is_numeric({$kmsg}) || empty({$kmsg})) ? 'error' : {$kmsg}); ?>`,
                                heading: `<?php echo ((is_numeric({$kmsg}) || empty({$kmsg})) ? 'ERROR [' . {$kmsg} . ']' : 'INFORMACIÓN'); ?>`,
                                text: `<?php echo {$msg} ?>`,
                                position: `top-center`,
                                showHideTransition: `plain`,
                                allowToastClose: true,
                                loaderBg: `#FFF`,
                                hideAfter: 5000,
                                stack: 5 });";
            }
        }
        $script .= '</scr' . 'ipt>';
        return $script;
    }
}

if (!function_exists('mes_literal')) {
    function mes_literal($mes = 0)
    {
        switch (intval($mes)) {
            case 1:
                return 'ENERO';
                break;
            case 2:
                return 'FEBRERO';
                break;
            case 3:
                return 'MARZO';
                break;
            case 4:
                return 'ABRIL';
                break;
            case 5:
                return 'MAYO';
                break;
            case 6:
                return 'JUNIO';
                break;
            case 7:
                return 'JULIO';
                break;
            case 8:
                return 'AGOSTO';
                break;
            case 9:
                return 'SEPTIEMBRE';
                break;
            case 10:
                return 'OCTUBRE';
                break;
            case 11:
                return 'NOVIEMBRE';
                break;
            case 12:
                return 'DICIEMBRE';
                break;
            default:
                return '';
                break;
        }
    }
}

if (!function_exists('fecha_literal')) {
    function fecha_literal($fecha, $formato = 0)
    {
        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $infofecha = getdate(strtotime($fecha));
        if (empty($fecha)) {
            return ('');
        } else {
            switch ($formato) {
                case 1:
                    return ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'];
                    break;
                case 2:
                    return $dias[$infofecha['wday']] . ', ' . ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'];
                    break;
                case 3:
                    return $dias[$infofecha['wday']] . ', ' . ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'] . ' [Hrs. ' . ($infofecha['hours'] < 10 ? '0' : '') . $infofecha['hours'] . ':' . ($infofecha['minutes'] < 10 ? '0' : '') . $infofecha['minutes'] . ']';
                    break;
                case 5:
                    return ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'] . ' [Hrs. ' . ($infofecha['hours'] < 10 ? '0' : '') . $infofecha['hours'] . ':' . ($infofecha['minutes'] < 10 ? '0' : '') . $infofecha['minutes'] . ']';
                    break;
                case 9:
                    return ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . '/' . substr(strtolower($meses[$infofecha['mon']]), 0, 3);
                    break;
                case 10:
                    return $infofecha['year'];
                    break;
                case 20:
                    return $infofecha['mon'];
                    break;
                case 30:
                    return $infofecha['mday'];
                    break;
                default:
                    return date('Y-m-d H:i:s', strtotime($fecha));
                    break;
            }
        }
    }
}

if (!function_exists('mayusculas')) {
    function mayusculas($cadena = NULL)
    {
        $resultado = NULL;
        if (!is_null($cadena)) {
            $resultado = mb_strtoupper($cadena);
        }
        return $resultado;
    }
}
if (!function_exists('minusculas')) {
    function minusculas($cadena = NULL)
    {
        $resultado = NULL;
        if (!is_null($cadena)) {
            $resultado = mb_strtolower($cadena);
        }
        return $resultado;
    }
}


if (!function_exists('romano_numero')) {

    function romano_numero($roman)
    {
        $romans = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        );
        $result = 0;

        foreach ($romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }
        return $result;
    }
}

if (!function_exists('numero_romano')) {
    function numero_romano($integer, $upcase = true)
    {
        $table = array(
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100,
            'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9,
            'V' => 5, 'IV' => 4, 'I' => 1
        );
        $return = '';
        while ($integer > 0) {
            foreach ($table as $rom => $arb) {
                if ($integer >= $arb) {
                    $integer -= $arb;
                    $return .= ($upcase ? $rom : strtolower($rom));
                    break;
                }
            }
        }
        return $return;
    }
}

function numero_literal($num, $fem = false, $dec = true, $is_num = false)
{
    $numOriginal = $num;
    $matuni[2] = "dos";
    $matuni[3] = "tres";
    $matuni[4] = "cuatro";
    $matuni[5] = "cinco";
    $matuni[6] = "seis";
    $matuni[7] = "siete";
    $matuni[8] = "ocho";
    $matuni[9] = "nueve";
    $matuni[10] = "diez";
    $matuni[11] = "once";
    $matuni[12] = "doce";
    $matuni[13] = "trece";
    $matuni[14] = "catorce";
    $matuni[15] = "quince";
    $matuni[16] = "dieciseis";
    $matuni[17] = "diecisiete";
    $matuni[18] = "dieciocho";
    $matuni[19] = "diecinueve";
    $matuni[20] = "veinte";
    $matunisub[2] = "dos";
    $matunisub[3] = "tres";
    $matunisub[4] = "cuatro";
    $matunisub[5] = "quin";
    $matunisub[6] = "seis";
    $matunisub[7] = "sete";
    $matunisub[8] = "ocho";
    $matunisub[9] = "nove";

    $matdec[2] = "veint";
    $matdec[3] = "treinta";
    $matdec[4] = "cuarenta";
    $matdec[5] = "cincuenta";
    $matdec[6] = "sesenta";
    $matdec[7] = "setenta";
    $matdec[8] = "ochenta";
    $matdec[9] = "noventa";
    $matsub[3] = 'mill';
    $matsub[5] = 'bill';
    $matsub[7] = 'mill';
    $matsub[9] = 'trill';
    $matsub[11] = 'mill';
    $matsub[13] = 'bill';
    $matsub[15] = 'mill';
    $matmil[4] = 'millones';
    $matmil[6] = 'billones';
    $matmil[7] = 'de billones';
    $matmil[8] = 'millones de billones';
    $matmil[10] = 'trillones';
    $matmil[11] = 'de trillones';
    $matmil[12] = 'millones de trillones';
    $matmil[13] = 'de trillones';
    $matmil[14] = 'billones de trillones';
    $matmil[15] = 'de billones de trillones';
    $matmil[16] = 'millones de billones de trillones';

    $numeroFloat = explode('.', $num);
    $num = $numeroFloat[0];
    $num = trim((string)@$num);
    if ($num[0] == '-') {
        $neg = 'menos ';
        $num = substr($num, 1);
    } else
        $neg = '';
    while ($num[0] == '0')
        $num = substr($num, 1);
    if ($num[0] < '1' or $num[0] > 9)
        $num = '0' . $num;
    $zeros = true;
    $punt = false;
    $ent = '';
    $fra = '';
    for ($c = 0; $c < strlen($num); $c++) {
        $n = $num[$c];
        if (!(strpos(".,'''", $n) === false)) {
            if ($punt)
                break;
            else {
                $punt = true;
                continue;
            }
        } elseif (!(strpos('0123456789', $n) === false)) {
            if ($punt) {
                if ($n != '0')
                    $zeros = false;
                $fra .= $n;
            } else
                $ent .= $n;
        } else
            break;
    }
    $ent = '     ' . $ent;
    if ($dec and $fra and !$zeros) {
        $fin = ' coma';
        for ($n = 0; $n < strlen($fra); $n++) {
            if (($s = $fra[$n]) == '0')
                $fin .= ' cero';
            elseif ($s == '1')
                $fin .= $fem ? ' una' : ' un';
            else
                $fin .= ' ' . $matuni[$s];
        }
    } else
        $fin = '';
    if ((int)$ent === 0)
        return 'Cero ' . $fin;
    $tex = '';
    $sub = 0;
    $mils = 0;
    $neutro = false;
    while (($num = substr($ent, -3)) != '   ') {
        $ent = substr($ent, 0, -3);
        if (++$sub < 3 and $fem) {
            $matuni[1] = 'una';
            $subcent = 'as';
        } else {
            $matuni[1] = $neutro ? 'un' : 'uno';
            $subcent = 'os';
        }
        $t = '';
        $n2 = substr($num, 1);
        if ($n2 == '00') {
        } elseif ($n2 < 21)
            $t = ' ' . $matuni[(int)$n2];
        elseif ($n2 < 30) {
            $n3 = $num[2];
            if ($n3 != 0)
                $t = 'i' . $matuni[$n3];
            $n2 = $num[1];
            $t = ' ' . $matdec[$n2] . $t;
        } else {
            $n3 = $num[2];
            if ($n3 != 0)
                $t = ' y ' . $matuni[$n3];
            $n2 = $num[1];
            $t = ' ' . $matdec[$n2] . $t;
        }
        $n = $num[0];
        if ($n == 1) {
            $t = ' ciento' . $t;
            if ($is_num == true) {
                $t = ' cien';
            }
        } elseif ($n == 5) {
            $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
        } elseif ($n != 0) {
            $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
        }
        if ($sub == 1) {
        } elseif (!isset($matsub[$sub])) {
            if ($num == 1) {
                $t = ' mil';
            } elseif ($num > 1) {
                $t .= ' mil';
            }
        } elseif ($num == 1) {
            $t .= ' ' . $matsub[$sub] . '&oacute;n';
        } elseif ($num > 1) {
            $t .= ' ' . $matsub[$sub] . 'ones';
        }
        if ($num == '000')
            $mils++;
        elseif ($mils != 0) {
            if (isset($matmil[$sub]))
                $t .= ' ' . $matmil[$sub];
            $mils = 0;
        }
        $neutro = true;
        $tex = $t . $tex;
    }
    $tex = $neg . substr($tex, 1) . $fin;
    if (empty($numeroFloat[1])) {
        $numeroFloat[1] = '00';
    } else {
        $parte_decimal = (round($numOriginal, 2) - (int)$numOriginal) * 100;
    }
    $bolivianos = '/100 bolivianos';
    if ($is_num == true) {
        $bolivianos = '';
        $numeroFloat[1] = '';
    }
    if (empty($parte_decimal))
        $end_num = ucfirst($tex) . ' ' . $numeroFloat[1] . $bolivianos;
    else
        $end_num = ucfirst($tex) . ' ' . round($parte_decimal) . $bolivianos;
    return $end_num;
}
function estado_nota_final_modulo($nota = null)
{
    if (empty($nota)) {
        return 'NO SE PRESENTO';
    } else if ($nota < 51) {
        return 'REPROBADO';
    } else {
        return 'APROBADO';
    }
}

if (!function_exists('select_combo')) {
    function select_combo($lista = null, $combo)
    {
        switch ($combo) {
            case 'gestion':
                $array_id_gestion = array_column($lista, 'id_gestion');
                $id_gestion_max = max($array_id_gestion);
                return select_combobox($lista, ['name' => 'id_gestion', 'id' => 'id_gestion', 'required' => '', 'id_value' => 'id_gestion', 'value' => 'gestion', 'id_select' => '']);
                break;
            case 'grado_academico':
                return select_combobox($lista, ['name' => 'id_grado_academico', 'id' => 'id_grado_academico', 'required' => '', 'id_value' => 'id_grado_academico', 'value' => 'descripcion_grado_academico', 'id_select' => '']);
                break;
            case 'tipo_programa':
                return select_combobox($lista, ['name' => 'id_tipo_programa', 'id' => 'id_tipo_programa', 'required' => '', 'id_value' => 'id_tipo_programa', 'value' => 'nombre_tipo_programa', 'id_select' => '']);
                break;
            case 'version':
                return select_combobox($lista, ['name' => 'version_programa', 'id' => 'version_programa', 'required' => '', 'id_value' => 'numero_version', 'value' => 'numero_version', 'id_select' => '']);
                break;
            default:
                return '';
                break;
        }
    }
}

if (!function_exists('select_combobox')) {
    function select_combobox($lista = null, $config)
    {
        $config = (object)$config;
        $id_value = $config->id_value;
        $value = $config->value;
        $combo = "<select class='select2 form-control custom-select' style='width: 100%;' name='" . $config->name . "' id='" . $config->id . "' " . $config->required . ">";
        $combo .= "<option value=''>[TODOS]</option>";
        foreach ($lista as $lista_fila) {
            if ($lista_fila->$id_value != '') {
                $combo .= "<option value='" . $lista_fila->$id_value . "' " . (($lista_fila->$id_value == $config->id_select) ? 'selected="selected"' : '') . ">" . $lista_fila->$value . "</option>";
            }
        }
        $combo .= "</select>";
        return $combo;
    }
}

if (!function_exists('verificar_datos_personales')) {
    function verificar_datos_personales($tabla, $condicion, $columnas)
    {
        $CI = &get_instance();
        $CI->db->select($columnas);
        $CI->db->from($tabla);
        foreach ($condicion as $key => $value) {

            if (isset($value['dividir']) && $value['dividir']) {
                $columnas = [];
                foreach (explode(" ", $value['dato']) as $i => $v) {
                    if (!empty($v)) $columnas[] = $v;
                }
                switch ($value['expresion']) {
                    case 'group_start':
                        $CI->db->group_start();
                        break;
                    case 'or_group_start':
                        $CI->db->or_group_start();
                        break;
                    case 'not_group_start':
                        $CI->db->not_group_start();
                        break;
                    case 'or_not_group_start':
                        $CI->db->or_not_group_start();
                        break;
                    default:
                        $CI->db->group_start();
                        break;
                }
                foreach (AllPermutations(($columnas)) as $j => $jq) {;
                    $CI->db->or_like("concat(" . implode(",' ',", $value['columnas']) . ")", join(' ', $jq));
                }
                $CI->db->group_end();
            } else {
                foreach ($value['columnas'] as $k => $val) {
                    switch ($value['expresion']) {
                        case 'like':
                            $CI->db->like($val . '::text', $value['dato'], 'both', false);
                            break;
                        case 'or_like':
                            $CI->db->or_like($val . '::text', $value['dato'], 'both', false);
                            break;
                        case 'not_like':
                            $CI->db->not_like($val . '::text', $value['dato'], 'both', false);
                            break;
                        case 'or_not_like':
                            $CI->db->or_not_like($val . '::text', $value['dato'], 'both', false);
                            break;
                        default:
                            $CI->db->like($val . '::text', $value['dato'], 'both', false);
                            break;
                    }
                }
            }
        }
        // $CI->db->get();
        // return var_dump($CI->db->last_query());
        return $CI->db->get()->result_array();
    }
}
function AllPermutations($InArray, $InProcessedArray = array())
{
    $ReturnArray = array();
    foreach ($InArray as $Key => $value) {
        $CopyArray = $InProcessedArray;
        $CopyArray[$Key] = $value;
        $TempArray = array_diff_key($InArray, $CopyArray);
        if (count($TempArray) == 0) {
            $ReturnArray[] = $CopyArray;
        } else {
            $ReturnArray = array_merge($ReturnArray, AllPermutations($TempArray, $CopyArray));
        }
    }
    return $ReturnArray;
}

if (!function_exists('esta_completo_datos_participante')) {
    function esta_completo_datos_participante($id_usuario)
    {
        $CI = &get_instance();
        // agregar la consula de la tablas
        $datos_persona = $CI->sql_psg->listar_tabla('persona', ['id_persona' => $id_usuario], null, 'row');
        $datos_grado_academico_persona = $CI->sql_psg->listar_tabla('psg_grado_academico_persona', ['id_persona' => $id_usuario], null, null);
        $datos_idioma_persona = $CI->sql_psg->listar_tabla('idioma_persona', ['id_persona' => $id_usuario], null, null);
        $datos_capacitacion_persona = $CI->sql_psg->listar_tabla('capacitacion_persona', ['id_persona' => $id_usuario], null, null);

        // return $datos_grado_academico_persona;
        $array_nulos_datos_persona = [];
        foreach ($datos_persona as $key => $datos) {
            // var_dump($key . ' ' . $datos);

            if (empty($datos)) {
                if ($key == 'ci' || $key == 'expedido' || $key == 'tipo_documento' || $key == 'nombre' || $key == 'paterno' || $key == 'materno' || $key == 'fecha_nacimiento' || $key == 'genero' || $key == 'estado_civil' || $key == 'id_pais_nacionalidad' || $key == 'domicilio' || $key == 'lugar_nacimiento' || $key == 'email' || $key == 'oficio_trabajo' || $key == 'celular') {
                    $array_nulos_datos_persona['datos_personales'][$key] = 'el campo ' . $key . ' esta vacio llenelo porfavor';
                }
                if ($key == 'id_banco' || $key == 'numero_cuenta_bancaria') {
                    $array_nulos_datos_persona['datos_bancarios'][$key] = 'el campo ' . $key . ' esta vacio llenelo porfavor';
                }
                if ($key == 'id_afp' || $key == 'afp_numero_nua') {
                    $array_nulos_datos_persona['datos_afp'][$key] = 'el campo ' . $key . ' esta vacio llenelo porfavor';
                }
                if ($key == 'id_caja_salud' || $key == 'caja_salud_fecha_afiliacion' || $key == 'caja_salud_numero_asegurado') {
                    $array_nulos_datos_persona['datos_seguro_medico'][$key] = 'el campo ' . $key . ' esta vacio llenelo porfavor';
                }
                // $array_nulos_datos_persona[$key] = 'el campo ' . $key . ' es nulo o esta vacio llenelo porfavor';
            }
        }

        // return $array_nulos_datos_persona;
        return  [
            'datos_persona' => $array_nulos_datos_persona,
            'datos_grado_academico_persona' => $datos_grado_academico_persona,
            'datos_idioma_persona' => $datos_idioma_persona,
            'datos_capacitacion_persona' => $datos_capacitacion_persona,
        ];
    }
}
if (!function_exists('rol_texto')) {
    function rol_texto($str = '', $plural)
    {
        switch ($str) {
            case 'DOCENTE_POSGRADO':
                return $plural == true ? 'Docentes' : 'Docente';
                break;
            case 'POSGRADUANTE':
                return $plural == true ? 'Posgraduantes' : 'Posgraduante';
                break;
            case 'ADMINISTRADOR':
                return $plural == true ? 'Administradores' : 'Administrador';
                break;

            default:
                return $str;
                break;
        }
    }
}

if (!function_exists('cantidad_matriculas')) {
    function cantidad_matriculas($grado_academico, $cantidad, $gestiones)
    {
        $cantidad = count($cantidad);
        if (($grado_academico === 'DIPLOMADO' && $cantidad >= 1))
            return 'No se puede matricular mas de una vez en un  DIPLOMADO';

        if (($grado_academico === 'MAESTRÍA' && $cantidad >= 2))
            return 'No se puede matricular mas de 2 veces en una MAESTRÍA';
        else if ($grado_academico === 'MAESTRÍA' && empty($gestiones))
            return 'No hay mas gestiones a Matricular en esta MAESTRÍA';

        if (($grado_academico === 'DOCTORADO' && $cantidad >= 3))
            return 'No se puede matricular mas de 3 veces en un DOCTORADO';
        else if ($grado_academico === 'DOCTORADO' && empty($gestiones))
            return 'No hay mas gestiones a Matricular en este DOCTORADO';

        if (($grado_academico === 'POST DOCTORADO' && $cantidad >= 3))
            return 'No se puede matricular mas de 3 veces en un POST DOCTORADO';
        else if ($grado_academico === 'POST DOCTORADO' && empty($gestiones))
            return 'No hay mas gestiones a Matricular en este POST DOCTORADO';

        if (($grado_academico === 'ESPECIALIDAD' && $cantidad >= 1))
            return 'No se puede matricular mas de una vez en una ESPECIALIDAD';
    }
}
if (!function_exists('buscador_semantico')) {
    function buscador_semantico($buscar_registros, $buscar_campo)
    {
        $sql = '';
        if (strlen(trim($buscar_registros)) > 0) {
            $sql .= " AND ";
            foreach (explode(' ', $buscar_registros) as $item) {
                if (strlen(trim($item)) > 0) {
                    $where = "";
                    $where .= "(";
                    foreach ($buscar_campo as $field) {
                        if (strlen($where) > 1) {
                            $where .= " OR ";
                        }
                        $where .= "(" . $field . " LIKE '%" . $item . "%')";
                    }
                    $where .= ")";
                    $sql .= "(" . $where . ") AND ";
                }
            }
            if (substr($sql, strlen($sql) - 4, 3) == "AND") {
                $sql = substr($sql, 0, strlen($sql) - 4);
            }
        }
        return $sql;
    }
}
if (!function_exists('estado')) {
    function estado($estado)
    {
        if ($estado === 'REGISTRADO') return [
            ['CONFIRMADO', 'Confirmar', 'mdi mdi-check-circle-outline', 'matriculacion/matriculacion_inscripcion_actualizar', true],
            es(['SUPERADMIN']) ? ['', 'Datos', 'mdi mdi mdi-account-circle', 'persona/campos_datos_personales', true] : null,
            ['DESCARTADO', 'Descartar',  'matriculacion/matriculacion_inscripcion_actualizar', 'mdi mdi-delete', false],
            ['OBSERVADO', 'Observar', 'matriculacion/matriculacion_inscripcion_actualizar', 'mdi mdi-eye-off', false],
        ];
        else if ($estado === 'CONFIRMADO') return [
            ['INSCRITO', 'Inscribir', 'mdi mdi-check-circle-outline', 'matriculacion/matriculacion_inscripcion_actualizar', true],
            es(['SUPERADMIN']) ? ['', 'Datos', 'mdi mdi mdi-account-circle', 'persona/campos_datos_personales', true] : null,
        ];
        else if ($estado === 'INSCRITO') return [
            es(['SUPERADMIN', 'TECNICO_MATRICULADOR']) ? ['MATRICULADO', 'Matricular', 'mdi mdi-check-circle-outline', 'matriculacion/verifica_matriculas_restantes', true] : null,
            es(['SUPERADMIN']) ? ['', 'Datos', 'mdi mdi mdi-account-circle', 'persona/campos_datos_personales', true] : null,
            ['', 'Imprimir <u>Formulario de Pre Inscripción</u>', ['matriculacion/matriculacion_imprimir', 'formulario_inscripcion'], 'mdi mdi-printer', false],
            ['', 'Imprimir <u>Formulario de Inscripción</u>', ['matriculacion/matriculacion_imprimir', 'formulario_01'], 'mdi mdi-printer', false],
            ['', 'Imprimir <u>Solicitud de Inscripción</u>', ['matriculacion/matriculacion_imprimir', 'solicitud_inscripcion'], 'mdi mdi-printer', false],
            ['', 'Imprimir <u>Carta de Compromiso</u>', ['matriculacion/matriculacion_imprimir', 'carta_compromiso'], 'mdi mdi-printer', false]
        ];
        else if ($estado === 'MATRICULADO') return [
            es(['SUPERADMIN', 'TECNICO_MATRICULADOR']) ? ['MATRICULADO', 'Matricular', 'mdi mdi-check-circle-outline', 'matriculacion/verifica_matriculas_restantes', true] : null,
            es(['SUPERADMIN']) ? ['', 'Datos', 'mdi mdi mdi-account-circle', 'persona/campos_datos_personales', true] : null,
            ['', 'Imprimir <u>Formulario de Inscripción</u>', ['matriculacion/matriculacion_imprimir', 'formulario_inscripcion'], 'mdi mdi-printer', false],
            ['', 'Imprimir <u>Solicitud de Inscripción</u>', ['matriculacion/matriculacion_imprimir', 'solicitud_inscripcion'], 'mdi mdi-printer', false],
            ['', 'Imprimir <u>Carta de Compromiso</u>', ['matriculacion/matriculacion_imprimir', 'carta_compromiso'], 'mdi mdi-printer', false],
            ['', 'Imprimir <u>Formulario 01</u>', ['matriculacion/matriculacion_imprimir', 'formulario_01'], 'mdi mdi-printer', false],

        ];
    }
}

if (!function_exists('sigla_programa')) {
    function sigla_programa($descripcion_grado_academico, $nombre_programa, $nombre_tipo_programa, $numero_version)
    {
        switch ($descripcion_grado_academico) {
            case 'POST DOCTORADO':
                $sigla_programa = 'PPhD';
                break;
            case 'DOCTORADO':
                $sigla_programa = 'PhD';
                break;
            case 'MAESTRÍA':
                $sigla_programa = 'M';
                break;
            case 'ESPECIALIDAD':
                $sigla_programa = 'E';
                break;
            case 'DIPLOMADO':
                $sigla_programa = 'D';
                break;
            case 'LICENCIATURA':
                $sigla_programa = 'L';
                break;
            case 'TÉCNICO SUPERIOR':
                $sigla_programa = 'TS';
                break;
            case 'TÉCNICO MEDIO':
                $sigla_programa = 'TM';
                break;
            default:
                $sigla_programa = '';
                break;
        }

        foreach (explode(' ', $nombre_programa) as $key => $value) {
            if(!in_array(trim($value), ['DE', 'CON', 'EN', 'Y', 'PARA', 'LA', 'E', '', 'EL', '-','MOD.','ESCOLARIZADO','-VERSION','I','VERSION', 'NO','ESCOLARIADO','II','V-I'])){
                if(is_numeric($value))
                    $sigla_programa.= $value;
                else
                    $sigla_programa.= substr($value, 0,1);
            }
        }
        
        $sigla_programa.= '-'.substr($nombre_tipo_programa, 0,1).'-'.$numero_version;
        
        return $sigla_programa;
    }
}