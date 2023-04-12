<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migracion extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('migracion_model');
    }

    public function index()
    {
        ini_set("memory_limit", "2048M");
        foreach ($this->migracion_model->publicacion_v1('select') as $value) {
            $id_detalle_programa = $this->migracion_model->detalle_programa(
                'insert',
                null,
                [
                    'id_planificacion_programa' => $value['id_planificacion_programa'],
                    'creditaje' => $value['carga_horaria'],
                    'duracion' => $value['duracion'],
                    'resumen' => $value['descripcion'],
                    'objetivo_programa' => $value['objetivo_programa'],
                    'requisitos' => $value['requisitos'],
                    'titulacion_intermedia' => $value['titulacion_intermedia'],
                    'celular_ref' => $value['celular_coordinador'],
                    'id_usuario' =>  $this->input->cookie('id_persona'),
                    'contenido' => $value['temario']
                ]
            );
            $id_publicacion[] = $this->migracion_model->publicacion(
                'insert',
                null,
                [
                    'id_planificacion_programa' => $value['id_planificacion_programa'],
                    'fecha_inicio_publicidad' => $value['fecha_inicio'],
                    'fecha_fin_publicidad' => $value['fecha_fin'],
                    'id_usuario' =>  $this->input->cookie('id_persona'),
                    'tipo_publicacion' => 'PROPUESTO',
                    'estado_publicacion' => $value['estado_publicacion'] == 'ACTIVO' ? true : null
                ]
            );
        }

        $i = 0;
        foreach ($this->migracion_model->publicacion_v1('select') as $value) {
            if (is_numeric($id_publicacion[$i])) {
                $id_multimedia = $this->migracion_model->multimedia(
                    'insert',
                    null,
                    [
                        'nombre_archivo' => $value['imagen'],
                        'id_cargo_unidad_creador' =>  $this->input->cookie('id_persona'),
                        'estado_media' => 'ACTIVO',
                        'etiqueta' => 'IMAGEN_PUBLICACION',
                    ]
                );
                if (is_numeric($id_multimedia)) {
                    $id_archivo = $this->migracion_model->archivo(
                        'insert',
                        null,
                        [
                            'id_publicacion' => $id_publicacion[$i],
                            'id_multimedia' => $id_multimedia,
                            'img_principal' => 1
                        ]
                    );
                }
                $i++;
            }
        }
        foreach ($this->migracion_model->publicacion_v1_preinscripcion_v1('', 'DISTINCT ON (TRIM(carnet))') as $key => $value) {
            $id_persona_externa[] = $this->migracion_model->persona_externa(
                'insert',
                null,
                [
                    'ci' => trim($value['carnet']),
                    'expedido' => $value['expedido'],
                    'nombre' => $value['nombre'],
                    'paterno' => $value['paterno'],
                    'materno' => $value['materno'],
                    'celular' => $value['celular'],
                    'email' => $value['correo'],
                    'fecha_registro_persona_externa' => $value['fecha_registro'],
                    'fecha_nacimiento' => $value['fecha_nacimiento'],
                    'lugar_nacimiento' => $value['lugar_nacimiento'],
                    'genero' => $value['genero'],
                    'ciudad_donde_vive' => $value['ciudad_donde_vive'],
                    'domicilio' => $value['domicilio'],
                    'oficio_trabajo' => $value['oficio_trabajo'],

                ]
            );
        }

        foreach ($this->migracion_model->publicacion_v1_preinscripcion_v1() as $key => $value) {
            $id_preinscripcion = $this->migracion_model->preinscripcion(
                'insert',
                null,
                [
                    'id_planificacion_programa' => $value['id_planificacion_programa'],
                    'id_persona_externa' => $this->migracion_model->persona_externa('select', ['ci' => trim($value['carnet'])])[0]['id_persona_externa'],
                    'fecha_preinscripcion' => $value['fecha_registro'],
                    'nro_deposito_matricula' => $value['nro_deposito'],
                    'fecha_deposito_matricula' => $value['fecha_deposito'],
                    'nro_deposito_cuota_ini' => $value['nro_dep_inicial'],
                    'fecha_deposito_cuota_ini' => $value['fecha_dep_inicial'],
                    'estado_interesado' => $value['estado'],
                ]
            );
            $datos = [];
            if (isset($value['fotografia'])) $datos[] = ['fotografia' => $value['fotografia'], 'etiqueta' => 'DEPOSITO_MATRICULA'];
            if (isset($value['fotografia_ci_delante'])) $datos[] = ['fotografia' => $value['fotografia_ci_delante'], 'etiqueta' => 'CI_ADELANTE'];
            if (isset($value['fotografia_ci_atras'])) $datos[] = ['fotografia' => $value['fotografia_ci_atras'], 'etiqueta' => 'CI_ATRAS'];
            if (isset($value['fotografia_diploma'])) $datos[] = ['fotografia' => $value['fotografia_diploma'], 'etiqueta' => 'DIPLOMA'];
            if (isset($value['fotografia_dep_cuota_incial'])) $datos[] = ['fotografia' => $value['fotografia_dep_cuota_incial'], 'etiqueta' => 'DEPOSITO_CUOTA_INICIAL'];

            foreach ($datos as $key => $val) {
                $id_multimedia = $this->migracion_model->multimedia(
                    'insert',
                    null,
                    [
                        'nombre_archivo' => $val['fotografia'],
                        'id_cargo_unidad_creador' =>  $this->input->cookie('id_persona'),
                        'estado_media' => 'ACTIVO',
                        'etiqueta' => $val['etiqueta'],
                    ]
                );
                if (is_numeric($id_multimedia)) {
                    $id_archivo = $this->migracion_model->archivo(
                        'insert',
                        null,
                        [
                            'id_preinscripcion' => $id_preinscripcion,
                            'id_multimedia' => $id_multimedia,
                        ]
                    );
                }
            }
        }
    }
    private function subir_archivos($ruta, $configuraciones, $archivos)
    {
        $this->load->library('upload', $configuraciones);

        $archivos_subidos = array();
        $archivos_erroneos = '';

        for ($i = 0; $i < count($archivos['name']); $i++) {
            $_FILES['archivo']['name'] = $archivos['name'][$i];
            $_FILES['archivo']['type'] = $archivos['type'][$i];
            $_FILES['archivo']['tmp_name'] = $archivos['tmp_name'][$i];
            $_FILES['archivo']['error'] = $archivos['error'][$i];
            $_FILES['archivo']['size'] = $archivos['size'][$i];

            $configuraciones['upload_path'] = $ruta;
            $this->upload->initialize($configuraciones);

            if ($this->upload->do_upload('archivo')) {
                $archivos_subidos[] = $this->upload->data();
            } else {
                $archivos_erroneos .= strip_tags($this->upload->display_errors()) . ' <b>' . $archivos['name'][$i] . '</b><br>';
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
}
