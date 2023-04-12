<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "/libraries/Fpdf_psg.php";
class Reporte_programa extends Fpdf_psg
{
    var $_tplIdx;
    var $fuentepdf;
    var $CI;
    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        // $this->CI->load->model('programa_model');
    }


    public function formulario_marketing($datos)
    {
        $this->AddPage('P', 'Letter');
        $this->SetFont('Arial', 'B', 12);
        $this->Ln(7);
        $this->Cell(0, 5, 'FORMULARIO DE ASIGNACION DE COORDINADOR DEL PROGRAMA, VERSION ' . $datos['programa']['numero_version'], 0, 6, 'C');
        $this->SetFont('Arial', '', 7);
        $this->Cell(0, 3, $datos['programa']['sigla_programa'] . '/' . date('Y'), 0, 1, 'R');
        $this->Cell(0, 3, $datos['programa']['fecha_registro_programa'], 0, 1, 'R');
        $this->Ln(2);
        $this->SetFont('Arial', 'B', 8);

        $this->Cell(0, 5, 'Datos del Solicitante', 0, 5, 'C');
        $this->SetFont('Arial', '', 8);
        foreach ([['Nombre Solicitante', ': ' . $datos['programa']['descripcion_programa']], ['Posgrado/Area/Carrera', utf8_decode(': ' . $datos['programa']['tipo_unidad'] . '/' . $datos['programa']['denominacion_sede'] . '/' . $datos['programa']['nombre_unidad'])], ['Programa/Version/Modalidad', utf8_decode(': ' . $datos['programa']['nombre_programa'] . '/' . $datos['programa']['numero_version'] . '/' . $datos['programa']['nombre_tipo_programa'])], ['Fecha Solicitud', ': ' . date('d-m-Y')], ['Celular Solicitante', ': ']] as $key => $value) {
            $this->SetFont('Arial', 'B', 8);
            $this->AjustCell(50, 5, $value[0], 0);
            $this->SetFont('Arial', '', 8);
            $this->AjustCell(126.9, 5, $value[1], 0);
            $this->Ln();
        }
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(50, 5, 'Registrado por');
        $this->SetFont('Arial', '', 8);
        $this->AjustCell(90, 5, ': ' . $datos['usuario']['nombre_completo']);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(36.9, 5, 'Firma');


        $this->SetFont('Arial', 'B', 12);
        $this->Ln(7);
        $this->Cell(0, 5, 'DATOS DE MARKETING DIGITAL (Coordinar con el Area de Sistemas y Marketing)', 0, 6, 'C');
        $this->Ln(2);
        $this->SetFont('Arial', 'B', 8);

        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, 'Afiche de Publicidad', 1, 0, 'C');
        $this->Cell(8, 5, 'Si', 1, 0, 'C');
        $this->Cell(8, 5, 'No', 1, 0, 'C');
        $this->Cell(50, 5, 'Responsable', 1, 0, 'C');
        $this->AjustCell(20, 5, 'Tiempo en Horas', 1, 0, 'C');
        $this->Cell(0, 5, 'Descripcion', 1, 0, 'C');
        $this->SetFont('Arial', '', 8);
        $this->Ln();
        foreach (['Afiche General', 'Afiche Facebook', 'Afiche Instagram', 'Video', ''] as $key => $value) {
            $this->Cell(40, 5, $value, 1);
            $this->Cell(8, 5, '[  ]', 1, 0, 'C');
            $this->Cell(8, 5, '[  ]', 1, 0, 'C');
            $this->Cell(50, 5, '', 1);
            $this->Cell(20, 5, '', 1);
            $this->Cell(0, 5, '', 1);
            $this->Ln();
        }

        $this->Ln();
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, 'Publicar', 1, 0, 'C');
        $this->Cell(8, 5, 'Si', 1, 0, 'C');
        $this->Cell(8, 5, 'No', 1, 0, 'C');
        $this->Cell(50, 5, 'Responsable', 1, 0, 'C');
        $this->AjustCell(20, 5, 'F. Inicio, Fin', 1, 0, 'C');
        $this->Cell(0, 5, 'Observacion', 1, 0, 'C');
        $this->SetFont('Arial', '', 8);
        $this->Ln();
        foreach (['posgrado.upea.bo', 'Pagina Facebook', 'Instagram', 'Twitter', 'WhatsApp', 'Otro...'] as $key => $value) {
            $this->Cell(40, 5, $value, 1);
            $this->Cell(8, 5, '[  ]', 1, 0, 'C');
            $this->Cell(8, 5, '[  ]', 1, 0, 'C');
            $this->Cell(50, 5, '', 1);
            $this->Cell(20, 5, '', 1);
            $this->Cell(0, 5, '', 1);
            $this->Ln();
        }

        $this->Ln();
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 5, 'Publicidad por paga', 0, 0, 'C');
        $this->Ln();
        $this->Cell(40, 5, '', 1);
        $this->Cell(8, 5, 'Si', 1, 0, 'C');
        $this->Cell(8, 5, 'No', 1, 0, 'C');
        $this->AjustCell(25, 5, 'Monto Asig. (Bs.-)', 1, 0, 'C');
        $this->Cell(30, 5, 'F. Inicio, Fin', 1, 0, 'C');
        $this->Cell(0, 5, 'Observacion', 1, 0, 'C');
        $this->SetFont('Arial', '', 8);
        $this->Ln();
        foreach (['Afiche Facebook', 'Afiche Instagram', 'Video Facebook', 'Video YouTube', '', ''] as $key => $value) {
            $this->Cell(40, 5, $value, 1);
            $this->Cell(8, 5, '[  ]', 1, 0, 'C');
            $this->Cell(8, 5, '[  ]', 1, 0, 'C');
            $this->Cell(25, 5, '', 1);
            $this->Cell(30, 5, '', 1);
            $this->Cell(0, 5, '', 1);
            $this->Ln();
        }
        $this->Ln(20);
        $size = ($this->GetPageWidth() - 38.9) / 3;
        $this->Cell($size, 5, '.......................................................', 0, 0, 'C');
        $this->Cell($size, 5, '.......................................................', 0, 0, 'C');
        $this->Cell($size, 5, '.......................................................', 0, 0, 'C');

        $this->Ln();
        $this->Cell($size, 5, 'Responsable Area de Sistemas y Marketing', 0, 0, 'C');
        $this->Cell($size, 5, 'Solicitante', 0, 0, 'C');
        $this->Cell($size, 5, 'VoBo', 0, 0, 'C');
        return $this->Output('S');
    }
    public function listado_programas($descarga = 'I')
    {
        $programas = $this->CI->programa_mdl->listar_programas();


        $this->AddPage('P', 'Letter');
        $this->SetFont($this->fuentepdf, 'B', 7);
        //$this->SetX(10);
        //$this->SetY(27);
        $altura = 5;
        $this->Cell(5, $altura, utf8_decode('Nro'), 1, 0, 'C');
        $this->Cell(10, $altura, utf8_decode('Gestión'), 1, 0, 'C');
        $this->Cell(20, $altura, 'Grado', 1, 0, 'C');
        $this->Cell(90, $altura, 'Nombre Programa', 1, 0, 'C');
        $this->Cell(15, $altura, 'Modalidad', 1, 0, 'C');
        $this->Cell(35, $altura, 'Organizador', 1, 0, 'C');
        $this->Cell(15, $altura, 'Sede', 1, 0, 'C');
        $this->Cell(11, $altura, 'Estado', 1, 0, 'C');
        $this->ln();
        $this->SetFont($this->fuentepdf, '', 5);
        $i = 0;
        foreach ($programas as $programa) {
            $i++;
            $this->Cell(5, $altura, $i, 1, 0, 'L');
            $this->Cell(10, $altura, $programa['gestion'], 1, 0, 'L');
            $this->Cell(20, $altura, utf8_decode($programa['descripcion_grado_academico']), 1, 0, 'L');
            $this->Cell(90, $altura, utf8_decode($programa['nombre_programa']), 1, 0, 'L');
            $this->Cell(15, $altura, $programa['nombre_tipo_programa'], 1, 0, 'L');
            $this->Cell(35, $altura, utf8_decode($programa['nombre_unidad']), 1, 0, 'L');
            $this->Cell(15, $altura, utf8_decode($programa['denominacion_sede']), 1, 0, 'L');
            $this->Cell(11, $altura, $programa['estado_programa'], 1, 0, 'L');

            $this->ln();
        }
        $this->Output('PROGRAMAS.pdf', $descarga);
    }


    public function listado_modulos_programa($datos)
    {

        $this->AddPage('P', 'Letter');
        $this->SetFont($this->fuentepdf, 'B', 8);
        //$this->SetX(10);
        //$this->SetY(27);
        $this->ln();
        $altura = 5;
        $this->Cell(130, 10, utf8_decode('REPORTE DE MODULÓS'), 1, 0, 'C');
        $this->Cell(40, 10, utf8_decode('Gestión Creación Programa:'), 1, 0, 'R');
        $this->Cell(10, 10, $datos['gestion_programa'], 1, 0, 'L');
        $this->SetFont($this->fuentepdf, 'B', 7);
        $this->ln();

        $this->SetWidths([25, 155]);
        $this->SetAligns(['R', 'L']);
        $this->Row(['Nombre Programa:', utf8_decode($datos['nombre_programa'])]);

        $this->SetWidths([25, 50, 30, 15, 20, 40]);
        $this->SetAligns(['R', 'L', 'R', 'L', 'R', 'L']);
        $this->Row([
            'Tipo Programa:', $datos['nombre_tipo_programa'], utf8_decode('Versión:'), $datos['numero_version'],
            'Grado:', utf8_decode($datos['descripcion_grado_academico'])
        ]);

        $this->SetWidths([25, 155]);
        $this->SetAligns(['R', 'L']);
        $this->Row(['Organizado por:', utf8_decode($datos['nombre_unidad'])]);

        $this->ln();
        $this->SetFont($this->fuentepdf, 'B', 8);


        $this->SetWidths([5, 46, 13, 19, 40, 14, 13, 15, 15]);
        $this->SetAligns(['C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C']);
        $this->Row([
            utf8_decode('#'), utf8_decode('Nombre Módulo'), utf8_decode('Módulo'), utf8_decode('Hrs Académicas'),
            'Docente', utf8_decode('N° Nomb'), 'Paralelo', utf8_decode('Fecha Emisión'), 'Estado'
        ]);
        $this->SetFont($this->fuentepdf, '', 7);
        $i = 0;
        foreach ($datos['modulos'] as $modulo) {
            $i++;
            $this->Row([
                $i, utf8_decode($modulo['nombre_modulo_programa']), $modulo['numero_modulo'], $modulo['horas_academicas'],
                $modulo['ci'] . " " . $modulo['expedido'] . "-" . $modulo['paterno'] . "" . $modulo['materno'] . " " . $modulo['nombre'], $modulo['nro_nombramiento'], $modulo['paralelo'], $modulo['fecha_emision'],
                $modulo['estado_modulo_programa']
            ]);
            // $this->Cell(5, $altura, $i, 1, 0, 'L');
            // $this->Cell(60, $altura, utf8_decode($modulo['nombre_modulo_programa']), 1, 0, 'L');
            // $this->Cell(10, $altura, $modulo['numero_modulo'], 1, 0, 'C');
            // $this->Cell(17, $altura, $modulo['horas_academicas'], 1, 0, 'C');
            // $this->Cell(50, $altura, $modulo['ci'] . " " . $modulo['expedido'] . "-" . $modulo['paterno'] . "" . $modulo['materno'] . " " . $modulo['nombre'], 1, 0, 'L');
            // $this->Cell(16, $altura, $modulo['nro_nombramiento'], 1, 0, 'C');
            // $this->Cell(10, $altura, $modulo['paralelo'], 1, 0, 'C');
            // $this->Cell(16, $altura, $modulo['fecha_emision'], 1, 0, 'C');
            // $this->Cell(15, $altura, $modulo['estado_modulo_programa'], 1, 0, 'L');
            // $this->Ln();
        }
        return $this->Output('S');
    }

    public function listado_estudiante_programa($datos)
    {
        $this->AddPage('P', 'Letter');
        $this->SetFont($this->fuentepdf, 'B', 7);
        //$this->SetX(10);
        //$this->SetY(27);
        $altura = 4;
        $this->ln();
        $this->Cell(25, $altura, utf8_decode($datos['descripcion_grado_academico']) . ".::", 0, 0, 'R');
        $this->Cell(95, $altura, utf8_decode($datos['nombre_programa']), 0, 0, 'L');
        $this->Cell(17, $altura, "Version .::" . $datos['numero_version'], 0, 0, 'L');
        $this->Cell(33, $altura, "Modalidad .::" . $datos['nombre_tipo_programa'], 0, 0, 'L');
        $this->Cell(20, $altura, "Gestion .::" . $datos['gestion_programa'], 0, 0, 'L');
        $this->ln();
        //$this->Cell(200, 0, "", 1, 1, 'C');
        $this->Cell(200, 2, "=================================================================================================================================", 0, 0, 'C');
        $this->ln();
        $this->ln();
        $this->Cell(5, $altura, utf8_decode('Nro'), 1, 0, 'C');
        $this->Cell(20, $altura, utf8_decode('CI'), 1, 0, 'C');
        $this->Cell(20, $altura, 'RU', 1, 0, 'C');
        $this->Cell(80, $altura, 'Apellidos y Nombre(s)', 1, 0, 'C');
        $this->Cell(25, $altura, 'Fecha Nacimiento', 1, 0, 'C');
        $this->Cell(15, $altura, 'Genero', 1, 0, 'C');
        $this->Cell(20, $altura, 'Celular', 1, 0, 'C');
        $this->ln();
        $this->SetFont($this->fuentepdf, '', 7);
        $i = 0;
        foreach ($datos['matriculados']  as $key => $value) {
            $i++;
            $this->Cell(5, $altura, $i, 1, 0, 'L');
            $this->Cell(20, $altura, $value['ci'] . " " . $value['expedido'], 1, 0, 'L');
            $this->Cell(20, $altura, utf8_decode($value['registro_universitario']), 1, 0, 'L');
            $this->Cell(80, $altura, utf8_decode($value['paterno'] . " " . $value['materno'] . " " . $value['nombre']), 1, 0, 'L');
            $this->Cell(25, $altura, $value['fecha_nacimiento'], 1, 0, 'L');
            $this->Cell(15, $altura, $value['genero'], 1, 0, 'C');
            $this->Cell(20, $altura, utf8_decode($value['celular']), 1, 0, 'L');
            $this->ln();
        }
        return $this->Output('S');
    }
    public function listado_reporte_programas($data)
    {

        $this->AddPage();
        $this->SetTitle('REPORTE DE PROGRAMAS');
        $this->SetFont($this->fuentepdf, 'B', 7);
        //$this->SetX(10);
        //$this->SetY(27);
        // $i = 0;

        $this->SetWidths([12, 52, 18, 18, 17, 13, 16, 16, 18]);
        $this->SetAligns(['C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C']);
        $this->Row([
            utf8_decode('Gestión'), 'Programa', 'Modalidad', 'Grado',
            'Colegiatura', utf8_decode('Versión'), 'Inicio', 'Final', 'Matriculados'
        ]);
        $this->SetFont($this->fuentepdf, '', 7);
        foreach ($data as $programa) {
            $this->Row([
                $programa['gestion'],
                utf8_decode($programa['nombre_programa']),
                $programa['nombre_tipo_programa'],
                utf8_decode($programa['descripcion_grado_academico']),
                $programa['costo_colegiatura'],
                $programa['numero_version'],
                $programa['fecha_inicio'],
                $programa['fecha_fin'],
                $programa['total']
            ]);
        }
        return $this->Output('S');
    }

    public function listado_reporte_lista_matriculados($data)
    {
        $this->AddPage();
        $this->SetTitle('REPORTE DE MATRICULADOS POR PROGRAMAS');
        $this->SetFont($this->fuentepdf, 'B', 8);

        // $this->Image(FCPATH.'img/membrete1.png',0,0,210, 298);

        $this->SetWidths([10, 35, 35, 35, 45, 20]);
        $this->SetAligns(['C', 'C', 'C', 'C', 'C', 'C']);
        $this->Row([
            utf8_decode('N°'), 'Ap. Paterno', 'Ap. Materno', 'Nombre', 'Programa', utf8_decode('Versión')
        ]);
        $this->SetFont($this->fuentepdf, '', 7);
        $i=0;
        foreach ($data as $matriculados) {
            $i++;
            $this->Row([
                $i, utf8_decode($matriculados['paterno']), utf8_decode($matriculados['materno']),
                utf8_decode($matriculados['nombre']), utf8_decode($matriculados['nombre_programa']), $matriculados['numero_version']
            ]);
        }
        return $this->Output('S');
    }
}
