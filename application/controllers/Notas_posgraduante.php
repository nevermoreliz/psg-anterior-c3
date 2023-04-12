<?php defined('BASEPATH') or exit('No direct script access allowed');
/** 
 * Institucion: Unidad de Posgrado
 * Sistema: 
 * Módulo: Notas posgraduante
 * Descripcion: Controlador del módulo de Notas posgraduante
 * Fecha: 29/08/2020
 */
require_once APPPATH . '/controllers/Reportes/Reporte_acta_calificacion.php';
require_once APPPATH . 'controllers/Reportes/Reporte_notas_posgraduante.php';
require_once APPPATH . 'controllers/Reportes/Reporte_cerfiticado_calificacion.php';
require_once APPPATH . 'controllers/Reportes/Reporte_posgraduante_excel.php';
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;

class Notas_posgraduante extends PSG_Controller
{
    var $ruta_carpeta_vista;
    public function __construct()
    {
        parent::__construct();
        $url = $_SERVER["REQUEST_URI"];
        if (empty(strpos($url, "lista_posgraduante_excel"))) {
            $this->is_ajax();
        }
        if (!es(array('KARDEX_POSGRADO')) && !es(array('DOCENTE_POSGRADO'))) {
            redirect(base_url('/auth/terminar'));
        }
        $this->load->model('notas_posgraduante_model');
        // $this->load->helper('form');
        $this->ruta_carpeta_vista = '/notas_posgraduante/notas_posgraduante_';
    }
    public function index()
    {
        $data['gestion'] = $this->sql_psg->listar_tabla('gestion',  null, 'id_gestion desc', null);
        $data['grado_academico'] = $this->sql_psg->listar_tabla('grado_academico', ['estado_grado' => 'REGISTRADO'], null, null);
        $data['tipo_programa'] = $this->sql_psg->listar_tabla('tipo_programa', ['estado_tipo_programa' => 'REGISTRADO'], null, null);
        $data['version'] = $this->sql_psg->version();
        //TODO: metodo para llamar una vista atravez de ajax : vista('verbo', 'datos');
        //TODO: ejemplo: vista('listar',$this->data)
        //TODO: el primer parametro se concatena con una variable global $ruta_carpeta_vista.verbo, puede ver el metodo en el controlador PSG_Controller
        $this->vista('ver', $data);
    }
    public function buscar_planificacion_programa()
    {
        $texto_gestion = ($this->input->post('texto_gestion') != "[TODOS]") ? $this->input->post('texto_gestion') : '';
        $texto_grado_academico = ($this->input->post('texto_grado_academico') != "[TODOS]") ? $this->input->post('texto_grado_academico') : '';
        $texto_tipo_programa = ($this->input->post('texto_tipo_programa') != "[TODOS]") ? $this->input->post('texto_tipo_programa') : '';
        $version_programa = ($this->input->post('version_programa') != "[TODOS]") ? $this->input->post('version_programa') : '';
        $buscar_planificacion = strtoupper($this->input->post('buscar_planificacion'));
        $vigentes = strtoupper($this->input->post('vigentes'));
        $ci_docente_posgraduante = strtoupper($this->input->post('ci_docente_posgraduante'));
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');


        $texto_buscar = trim($texto_gestion) . ' ' . trim($texto_grado_academico) . ' ' . trim($texto_tipo_programa) . ' ' . trim($version_programa) . ' ' . trim($buscar_planificacion);
        $lista_planificacion_programa = $this->sql_psg->buscar_planificacion_programa(trim($texto_buscar), trim($vigentes), trim($ci_docente_posgraduante), $limit, $start);

        $nueva_lista_planificacion_programa = null;
        if (!empty($lista_planificacion_programa)) {
            foreach ($lista_planificacion_programa as $lista_planificacion_programa_fila) {
                $cantidad_inscrito = $this->notas_posgraduante_model->contar_inscritos($lista_planificacion_programa_fila->id_planificacion_programa);
                $nueva_lista_planificacion_programa[] = (object)array_merge((array)['cantidad_inscrito' => $cantidad_inscrito], (array)$lista_planificacion_programa_fila);
            }
        }
        $this->planificacion_programas($nueva_lista_planificacion_programa);
    }
    public function planificacion_programas($lista_planificacion_programa = null)
    {
        if (!empty($lista_planificacion_programa)) {
            $html = '<div class="row el-element-overlay">';
            foreach ($lista_planificacion_programa as $lista_planificacion_programa_fila) {

                $cantidad_modulo = $this->notas_posgraduante_model->contar_modulos($lista_planificacion_programa_fila->id_planificacion_programa);
                $cantidad_matriculado = $this->notas_posgraduante_model->contar_matriculados($lista_planificacion_programa_fila->id_planificacion_programa);
                // echo $cantidad_modulo;
                $estado_programa = $lista_planificacion_programa_fila->estado_programa;
                switch ($estado_programa) {
                    case 'REGISTRADO':
                        $color_estado = "warning";
                        break;
                    case 'REVISADO':
                        $color_estado = "info";
                        break;
                    case 'APROBADO':
                        $color_estado = "success";
                        break;
                    default:
                        $color_estado = "primary";
                }
                $html .= '

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class=" card">
            <div class="ribbon ribbon-corner ribbon-warning"><i class="fa">' . $lista_planificacion_programa_fila->gestion . '</i></div>
            <div class="ribbon ribbon-bookmark ribbon-right ribbon-' . $color_estado . '">' . $estado_programa . ' <span type="button" class="btn btn-xs btn-info btn-outline-primary"> <i class="icon-list"></i> Posgraduantes : ' . $lista_planificacion_programa_fila->cantidad_inscrito . ' </span></div>
            <img class="card-img-top" src="img/banner_dos.png" alt="Card image cap">
            <div class="row">
                <div class="col-md-12 col-lg-12 text-center div_programa m-t-20">
                <h5 class="box-title m-b-0"> <strong>' . $lista_planificacion_programa_fila->descripcion_grado_academico . ': </strong> ' . $lista_planificacion_programa_fila->nombre_programa . ' <strong> Version: ' . $lista_planificacion_programa_fila->numero_version . '</strong> </h5>
                <h5 class="text-info"><strong>Modalidad: </strong> ' . $lista_planificacion_programa_fila->nombre_tipo_programa . '</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    Gestión
                    <span class="text-info">[ ' . $lista_planificacion_programa_fila->gestion . ' ]</span>
                    Unidad - Sede
                    <span class="text-info">[ ' . $lista_planificacion_programa_fila->nombre_unidad . ' ]</span>
                    </li>                    
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nro Mod
                    <span class="' . (($cantidad_modulo == 0) ? 'text-danger ' : 'text-info') . '">[ ' . $cantidad_modulo . ' ]</span>
                    Nro Mat
                    <span class="text-danger text-info">[ ' . $cantidad_matriculado . ' ]</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    
                    <span class="text-info">[ ' . $lista_planificacion_programa_fila->fecha_inicio . ' ]</span>
                    <span class="text-warning">[ ' . $lista_planificacion_programa_fila->fecha_fin . ' ]</span>
                    <span class="text-info">[ ' . $lista_planificacion_programa_fila->fecha_registro_programa . ' ]</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="card-body">
            <div class="row button-group">
            <button type="button" class="btn-xs waves-effect waves-light btn-info col-lg-4" id="id_planificacion_programa_modulo" name="id_planificacion_programa_modulo" data-id_gestion_programa="' . $lista_planificacion_programa_fila->id_gestion . '" value="' . $lista_planificacion_programa_fila->id_planificacion_programa . '"><i class="mdi mdi-file-tree"></i> Modulo</button>
            <button type="button" class="btn-xs waves-effect waves-light btn-info col-lg-4" id="lista_docente" name="lista_docente" data-id_gestion_programa="' . $lista_planificacion_programa_fila->id_gestion . '" value="' . $lista_planificacion_programa_fila->id_planificacion_programa . '"><i class="mdi mdi-file-pdf"></i> Docente</button>
            <button type="button" class="btn-xs waves-effect waves-light btn-secondary col-lg-4" id="lista_posgraduante" name="lista_posgraduante" data-id_gestion_programa="' . $lista_planificacion_programa_fila->id_gestion . '" value="' . $lista_planificacion_programa_fila->id_planificacion_programa . '"><i class="mdi mdi-file-pdf"></i> Posgraduantes</button>
            <button type="button" class="btn-xs waves-effect waves-light btn-secondary col-lg-12" id="certificado_calificacion" name="certificado_calificacion" data-id_gestion_programa="' . $lista_planificacion_programa_fila->id_gestion . '" value="' . $lista_planificacion_programa_fila->id_planificacion_programa . '"><i class="mdi mdi-file-pdf"></i> Certificado de Calificaciones</button>

            </div>
            </div>
            </div>

        </div>
        ';
            }
            $html .= '</div>
        ';
            echo $html;
        } else {
            echo '';
        }
    }
    public function lista_posgraduante()
    {
        $id_planificacion_programa = $this->input->post("id_planificacion_programa");
        $id_gestion = $this->input->post("id_gestion");
        $lista_posgraduante = $this->notas_posgraduante_model->lista_posgraduante($id_planificacion_programa, $id_gestion);
        $rep = new Reporte_notas_posgraduante('LISTA DE POSGRADUANTES');
        $rep->lista_posgraduante($this->datos_pograma($id_planificacion_programa), $lista_posgraduante);
    }
    public function lista_docente()
    {
        $id_planificacion_programa = $this->input->post("id_planificacion_programa");
        $id_gestion = $this->input->post("id_gestion");
        $lista_modulos = $this->sql_psg->listar_tabla('modulo_programa', ["id_planificacion_programa" => $id_planificacion_programa], null, null);
        $liata_paralelo_turno = null;
        if (!empty($lista_modulos)) {
            foreach ($lista_modulos as $lista_modulos_fila) {
                $id_modulo_programa=$lista_modulos_fila->id_modulo_programa;
                $liata_paralelo_turno[$id_modulo_programa] = $this->notas_posgraduante_model->lista_docente($id_modulo_programa);
            }
        }
        $datos['lista_modulos'] = $lista_modulos;
        $datos['liata_paralelo_turno'] = $liata_paralelo_turno;
        $rep = new Reporte_notas_posgraduante('LISTA DE DOCENTES');
        $rep->lista_docente($this->datos_pograma($id_planificacion_programa), $datos);
    }
    public function lista_modulos()
    {
        $id_planificacion_programa = $this->input->post("id_planificacion_programa");
        $data['id_gestion'] = $this->input->post("id_gestion");
        $lista_paralelo_modulo = null;
        $data['datos_planificacion_programa'] = $this->sql_psg->planificacion_programa($id_planificacion_programa);
        $data['lista_modulo_programa'] = $lista_modulo_programa = $this->notas_posgraduante_model->listar_modulo_programa($id_planificacion_programa);
        if (!empty($lista_modulo_programa)) {
            foreach ($lista_modulo_programa as $lista_modulo_programa_fila) {
                $id_modulo_programa = $lista_modulo_programa_fila->id_modulo_programa;
                $lista_paralelo_modulo[$id_modulo_programa] = $this->sql_psg->docente_paralelo($id_modulo_programa);
            }
        }
        $data['lista_paralelo_modulo'] = $lista_paralelo_modulo;
        if (!empty($lista_paralelo_modulo))
            $this->vista('modulo_ver', $data);
        else
            echo null;
    }
    public function adicionar_nota()
    {
        $id_asignacion_modulo_programa = $this->input->post("id_asignacion_modulo_programa");
        $id_gestion = $this->input->post("id_gestion_programa_modulo");
        $data = $this->lista_posgraduantes_notas($id_asignacion_modulo_programa, $id_gestion);
        $this->vista('nota', $data);
    }
    public function subir_nota_archivo()
    {
        /* Array
        (
        [name] => reporte_inscritos_ddddddd (68).xlsx
        [type] => application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
        [tmp_name] => C:\xampp\tmp\php583C.tmp
        [error] => 0
        [size] => 8421
        )*/
        $registro_no_corresponde = null;
        $id_modulo_programa = $this->input->post("id_modulo_programa");
        $id_asignacion_modulo_programa = $this->input->post("id_asignacion_modulo_programa");
        $id_gestion = $this->input->post("id_gestion_programa_modulo");
        if (isset($_FILES['archivo_excel'])) {
            $nombre_archivo = $_FILES['archivo_excel']['name'];
            $ruta = "documentos/archivos_excel/actas_calificacion";
            if (!file_exists($ruta)) {
                if (!mkdir($ruta, 0777, true)) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => "No se puede crear una carpeta con el CI {$this->input->get('ci')}"]));
                    exit;
                }
            }
            $configuraciones =  array(
                'allowed_types' => 'xlsx|xls',
                'max_size' =>  40480,
                'file_name' => $nombre_archivo

            );
            $archivos_subidos = $this->subir_archivos_multipes($ruta, $configuraciones, '', $_FILES['archivo_excel']);
            if (is_array($archivos_subidos)) {
                $ruta_archivo = $archivos_subidos[0]['full_path'];
                $documento = IOFactory::load($ruta_archivo);

                # Recuerda que un documento puede tener múltiples hojas
                # obtener conteo e iterar
                $totalDeHojas = $documento->getSheetCount();


                # Iterar hoja por hoja
                for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {

                    # Obtener hoja en el índice que vaya del ciclo
                    $hojaActual = $documento->getSheet($indiceHoja);
                    $i = 13;
                    for ($x = 1; $x <= 40; $x++) {
                        $celda_e = $hojaActual->getCell('E' . $i);
                        $ci_persona = $celda_e->getValue();
                        $celda_g = $hojaActual->getCell('G' . $i);
                        $nota_final_modulo = $celda_g->getValue();
                        if (!empty(trim($ci_persona))) {
                            $nota_final_modulo = (is_numeric($nota_final_modulo)) ? $nota_final_modulo : null;
                            $datos_persona = $this->sql_psg->listar_tabla('persona', ["ci" => trim($ci_persona)], null, 'row');
                            if (!empty($datos_persona)) {
                                $id_persona = $datos_persona->id_persona;
                                $datos_posgraduante = $this->sql_psg->listar_tabla('posgraduante', ["id_persona" => $id_persona], null, 'row');
                                $matricula_persona_gestion = $this->sql_psg->listar_tabla('matricula_gestion', ["id_persona" => $id_persona, "id_gestion" => $id_gestion], null, 'row');
                                if (!empty($matricula_persona_gestion)) {
                                    $this->migrar_nota($id_modulo_programa, $id_asignacion_modulo_programa, $datos_posgraduante, $nota_final_modulo);
                                } else {
                                    $registro_no_corresponde[] = $datos_persona;
                                }
                            }
                        }
                        $i++;
                    }
                }
                unlink($ruta_archivo);
                $data = $this->lista_posgraduante_nota($id_asignacion_modulo_programa, $id_gestion);
                $data['registro_no_corresponde'] = $registro_no_corresponde;
                $this->vista('nota', $data);
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $archivos_subidos]));
            }
        }
    }
    public function migrar_nota($id_modulo_programa = null, $id_asignacion_modulo_programa = null, $datos_posgraduante = null, $nota_final_modulo = null)
    {
        if (!empty($datos_posgraduante)) {
            $id_persona = $datos_posgraduante->id_persona;
            //$datos_inscripcion_modulo = $this->sql_psg->listar_tabla('inscripcion_modulo', ["id_asignacion_modulo_programa" => $id_asignacion_modulo_programa, "id_persona" => $id_persona], null, 'row');
            $datos_inscripcion_modulo = $this->notas_posgraduante_model->vefificar_inscripcion($id_modulo_programa, $id_persona);
            if (empty($datos_inscripcion_modulo)) {
                $this->sql_psg->insertar_tabla('inscripcion_modulo', [
                    'id_persona' => $id_persona,
                    'id_asignacion_modulo_programa' => $id_asignacion_modulo_programa,
                    'fecha_inscripcion' => date("Y-m-d"),
                    'trabajo_aula' => null,
                    'trabajo_investigacion' => null,
                    'trabajo_final' => null,
                    'nota_final_modulo' => $nota_final_modulo,
                    'nro_folio' => null,
                    'id_usuario' => 1,
                    'fecha_registro_inscripcion' => date("Y-m-d"),
                    'observacion_inscripcion' => '',
                    'estado_inscripcion_modulo' => 'REGISTRADO'
                ]);
            }
        }
    }
    public function acta_calificacion()
    {
        $id_asignacion_modulo_programa = $this->input->post("id_asignacion_modulo_programa");
        $id_gestion = $this->input->post("id_gestion_programa_modulo");
        $data = $this->lista_posgraduantes_notas($id_asignacion_modulo_programa, $id_gestion);
        $rep = new Reporte_acta_calificacion();
        $rep->acta_calificacion_posgraduante($data);
    }
    public function lista_posgraduante_excel($id_asignacion_modulo_programa = null, $id_gestion = null)
    {
        $data = $this->lista_posgraduantes_notas($id_asignacion_modulo_programa, $id_gestion);
        $rep = new Reporte_posgraduante_excel();
        $rep->lista_posgraduante($data);
    }
    public function lista_posgraduantes_notas($id_asignacion_modulo_programa = null, $id_gestion = null)
    {
        // inscribir en la tabla inscripcion_modulo
        //--------habilitar cuando sea necesario---------//$this->inscripcion_modulo($id_asignacion_modulo_programa, $id_gestion);
        return $this->lista_posgraduante_nota($id_asignacion_modulo_programa, $id_gestion);
    }
    public function lista_posgraduante_nota($id_asignacion_modulo_programa, $id_gestion)
    {
        $data['datos_planificacion_asignacion_modulo_programa'] = $datos_planificacion_asignacion_modulo_programa = $this->sql_psg->planificacion_asignacion_modulo_programa($id_asignacion_modulo_programa);
        $data['datos_persona_docente'] = $this->sql_psg->persona_grado_academico($datos_planificacion_asignacion_modulo_programa->id_persona);
        $data['lista_posgraduante'] = $this->notas_posgraduante_model->lista_posgraduante_inscripcion($id_asignacion_modulo_programa, $id_gestion);
        $data['nro_resolucion'] = $this->sql_psg->programa_resolucion($datos_planificacion_asignacion_modulo_programa->id_planificacion_programa);
        return $data;
    }
    public function regisgrar_nota_final_modulo()
    {
        $id_asignacion_modulo_programa = $this->input->post("id_asignacion_modulo_programa");
        $id_persona = $this->input->post("id_persona_posgraduante");
        $nota_final_modulo = $this->input->post("nota_final_modulo");
        if ($nota_final_modulo >= 0 && $nota_final_modulo <= 100 && $nota_final_modulo != '') {
            $nota_final_modulo = $this->input->post("nota_final_modulo");
        } else {
            $nota_final_modulo = null;
        }
        $this->sql_psg->modificar_tabla('inscripcion_modulo', [
            'nota_final_modulo' => $nota_final_modulo
        ], ["id_persona" => $id_persona, 'id_asignacion_modulo_programa' => $id_asignacion_modulo_programa]);

        if (empty($nota_final_modulo) || $nota_final_modulo <= 33) {
            $color = 'danger';
        } elseif ($nota_final_modulo >= 34 && $nota_final_modulo <= 66) {
            $color = 'warning';
        } else {
            $color = 'success';
        }
        echo '<div class="progress m-t-10">
            <div class="progress-bar bg-' . $color . '" style="width: ' . $nota_final_modulo . '%; height:15px;" role="progressbar">' . $nota_final_modulo . '</div>
          </div>';
    }
    public function regisgrar_observacion_nota_final_modulo()
    {
        $id_asignacion_modulo_programa = $this->input->post("id_asignacion_modulo_programa");
        $id_persona = $this->input->post("id_persona_posgraduante");
        $observacion_inscripcion = $this->input->post("observacion_inscripcion");
        $this->sql_psg->modificar_tabla('inscripcion_modulo', [
            'observacion_inscripcion' => $observacion_inscripcion
        ], ["id_persona" => $id_persona, 'id_asignacion_modulo_programa' => $id_asignacion_modulo_programa]);
    }
    public function datos_pograma($id_planificacion_programa = null)
    {
        $datos_programa = $this->sql_psg->listar_tabla('planificacion_programa', ["id_planificacion_programa" => $id_planificacion_programa], null, 'row');
        if (!empty($datos_programa)) {
            $datos_grado_academico = $this->sql_psg->listar_tabla('grado_academico', ["id_grado_academico" => $datos_programa->id_grado_academico], null, 'row');
            $datos_tipo_programa = $this->sql_psg->listar_tabla('tipo_programa', ["id_tipo_programa" => $datos_programa->id_tipo_programa], null, 'row');
            $datos_unidad_sede = $this->sql_psg->listar_tabla('unidad', ["id_unidad" => $datos_programa->id_unidad], null, 'row');
            return (object)array_merge((array)$datos_programa, (array)$datos_grado_academico, (array)$datos_tipo_programa, (array)$datos_unidad_sede);
        } else return null;
    }

    /*
    * Componer inscripcion a la tabla inscripcion_modulo
    */
    public function inscripcion_modulo($id_asignacion_modulo_programa = null, $id_gestion = null)
    {
        $datos_modulo_programa = $this->notas_posgraduante_model->modulo_programa($id_asignacion_modulo_programa);
        $id_planificacion_programa = $datos_modulo_programa->id_planificacion_programa;
        $id_modulo_programa = $datos_modulo_programa->id_modulo_programa;
        $cantidad_maxima_paralelo =  $datos_modulo_programa->cantidad_maxima_paralelo;

        //$cantidad_inscrito = $this->notas_posgraduante_model->contar_inscritos($id_planificacion_programa);
        //if ($cantidad_inscrito == 0) {
        $lista_posgraduante = $this->notas_posgraduante_model->lista_posgraduante($id_planificacion_programa, $id_gestion);
        $paralelo_asignacion_modulo_programa = $this->sql_psg->listar_tabla('asignacion_modulo_programa', ["id_modulo_programa" => $id_modulo_programa], 'paralelo ASC', null);
        if (!empty($paralelo_asignacion_modulo_programa) && !empty($lista_posgraduante)) {
            $cantidad = 0;
            foreach ($paralelo_asignacion_modulo_programa as $paralelo_asignacion_modulo_programa_fila) {
                $id_asignacion_modulo_programas = $paralelo_asignacion_modulo_programa_fila->id_asignacion_modulo_programa;
                $id_modulo_programa = $paralelo_asignacion_modulo_programa_fila->id_modulo_programa;
                foreach ($lista_posgraduante as $key => $lista_posgraduante_fila) {
                    $id_persona = $lista_posgraduante_fila->id_persona;
                    $this->registrar_posgraduante_inscripcion_modulo($id_persona, $id_asignacion_modulo_programas, $id_modulo_programa);
                    if ($cantidad >= $cantidad_maxima_paralelo) {
                        $cantidad = 0;
                        break;
                    }
                    $cantidad++;
                    unset($lista_posgraduante[$key]);
                }
            }
        }
        //}
    }
    public function registrar_posgraduante_inscripcion_modulo($id_persona = null, $id_asignacion_modulo_programa = null, $id_modulo_programa = null)
    {
        $datos_inscripcion_modulo = $this->notas_posgraduante_model->vefificar_inscripcion($id_modulo_programa, $id_persona);
        if (empty($datos_inscripcion_modulo)) {
            $this->sql_psg->insertar_tabla('inscripcion_modulo', [
                'id_persona' => $id_persona,
                'id_asignacion_modulo_programa' => $id_asignacion_modulo_programa,
                'fecha_inscripcion' => date("Y-m-d"),
                'trabajo_aula' => null,
                'trabajo_investigacion' => null,
                'trabajo_final' => null,
                'nota_final_modulo' => null,
                'nro_folio' => null,
                'id_usuario' => 1,
                'fecha_registro_inscripcion' => date("Y-m-d"),
                'observacion_inscripcion' => '',
                'estado_inscripcion_modulo' => 'REGISTRADO'
            ]);
        }
    }
    public function certificado_calificacion()
    {
        $id_planificacion_programa = $this->input->post("id_planificacion_programa");
        $id_gestion = $this->input->post("id_gestion");
        $data['datos_planificacion_programa'] = $this->sql_psg->planificacion_programa($id_planificacion_programa);
       
        $datos_modulo_asignatura_nota = null;

        $lista_posgraduante = $this->notas_posgraduante_model->lista_posgraduante($id_planificacion_programa, $id_gestion);
        if (!empty($lista_posgraduante)) {
            foreach ($lista_posgraduante as $lista_posgraduante_fila) {
                $id_persona = $lista_posgraduante_fila->id_persona;
                $datos_modulo_asignatura_nota[$id_persona] = $this->sql_psg->modulo_asignatura_nota($id_planificacion_programa, $id_persona);
            }
        }
        // echo print_r($datos_modulo_asignatura_nota);
        $data['lista_posgraduante'] = $lista_posgraduante;
        $data['datos_modulo_asignatura_nota'] = $datos_modulo_asignatura_nota;
        $rep = new Reporte_cerfiticado_calificacion();
        $rep->certificado_calificacion($data);
    }
}
