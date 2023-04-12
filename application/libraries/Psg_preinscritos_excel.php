<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class Psg_preinscritos_excel extends Spreadsheet
{
    public function __construct()
    {
        parent::__construct();
    }

    public function publicacion_excel($preinscritos = array(), $titulo = '')
    {
        // echo '<pre>';
        // var_dump($preinscritos);

        // echo '</pre>';
        // exit();
        $this->setActiveSheetIndex(0);
        $this->getActiveSheet()->setTitle('REPORTE');
        $this->getActiveSheet()->setCellValue("A1", 'LISTADO DE INSCRITOS/INTERESADOS EN EL PROGRAMA:');
        $this->getActiveSheet()->setCellValue("A2", explode('|', $titulo)[0]);
        $this->getActiveSheet()->setCellValue("A3", explode('|', $titulo)[1]);
        $contador = 5;
        $this->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $this->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $this->getActiveSheet()->getColumnDimension('E')->setWidth(6);
        $this->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $this->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $this->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('P')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('R')->setWidth(15);
        $this->getActiveSheet()->getColumnDimension('S')->setWidth(15);
        $this->getActiveSheet()->getStyle("A" . $contador . ":R" . $contador)->getFont()->setBold(true);
        $this->getActiveSheet()->setCellValue("A" . $contador, 'NRO');
        $this->getActiveSheet()->setCellValue("B" . $contador, 'ESTADO');
        // $this->getActiveSheet()->setCellValue("C" . $contador, 'PARALELO');
        $this->getActiveSheet()->setCellValue("C" . $contador, 'FECHA');
        $this->getActiveSheet()->setCellValue("D" . $contador, 'CI');
        $this->getActiveSheet()->setCellValue("E" . $contador, 'EXP');
        $this->getActiveSheet()->setCellValue("F" . $contador, 'NOMBRES');
        $this->getActiveSheet()->setCellValue("G" . $contador, 'PATERNO');
        $this->getActiveSheet()->setCellValue("H" . $contador, 'MATERNO');
        $this->getActiveSheet()->setCellValue("I" . $contador, 'CELULAR');
        $this->getActiveSheet()->setCellValue("J" . $contador, 'CORREO');
        $this->getActiveSheet()->setCellValue("K" . $contador, 'DEPÓSITO MATRICULA');
        $this->getActiveSheet()->setCellValue("L" . $contador, 'FECHA DEPÓSITO MATRICULA');
        $this->getActiveSheet()->setCellValue("M" . $contador, 'FOTOGRAFIA DEPÓSITO MATRICULA');
        $this->getActiveSheet()->setCellValue("N" . $contador, 'DEPÓSITO COLEGIATURA');
        $this->getActiveSheet()->setCellValue("O" . $contador, 'FECHA DEPÓSITO COLEGIATURA');
        $this->getActiveSheet()->setCellValue("P" . $contador, 'FOTOGRAFIA DEPÓSITO COLEGIATURA');
        $this->getActiveSheet()->setCellValue("Q" . $contador, 'FOTOGRAFÍA CI ANVERSO');
        $this->getActiveSheet()->setCellValue("R" . $contador, 'FOTOGRAFÍA CI REVERSO');
        $this->getActiveSheet()->setCellValue("S" . $contador, 'FOTOGRAFÍA DIPLOMA ACADEMICO');
        $this->getActiveSheet()->getStyle("A" . $contador . ":S" . $contador)->getAlignment()->setWrapText(true);
        foreach ($preinscritos as $preinscrito) {
            $contador++;
            $this->getActiveSheet()->setCellValue("A" . $contador, ($contador - 5) . '');
            $this->getActiveSheet()->setCellValue("B" . $contador, $preinscrito['estado_inscripcion']);
            // $this->getActiveSheet()->setCellValue("C" . $contador, $preinscrito['paralelo']);
            $this->getActiveSheet()->setCellValue("C" . $contador, $preinscrito['fecha_inscripcion']);
            $this->getActiveSheet()->setCellValue("D" . $contador, $preinscrito['ci']);
            $this->getActiveSheet()->setCellValue("E" . $contador, $preinscrito['expedido']);
            $this->getActiveSheet()->setCellValue("F" . $contador, $preinscrito['nombre']);
            $this->getActiveSheet()->getStyle("F" . $contador)->getAlignment()->setWrapText(true);
            $this->getActiveSheet()->setCellValue("G" . $contador, $preinscrito['paterno']);
            $this->getActiveSheet()->getStyle("G" . $contador)->getAlignment()->setWrapText(true);
            $this->getActiveSheet()->setCellValue("H" . $contador, $preinscrito['materno']);
            $this->getActiveSheet()->getStyle("H" . $contador)->getAlignment()->setWrapText(true);
            $this->getActiveSheet()->setCellValue("I" . $contador, $preinscrito['celular']);
            $this->getActiveSheet()->setCellValue("J" . $contador, $preinscrito['email']);
            $this->getActiveSheet()->setCellValue("K" . $contador, $preinscrito['numero_deposito_matricula']);
            $this->getActiveSheet()->setCellValue("L" . $contador, $preinscrito['fecha_deposito_matricula']);
            $this->getActiveSheet()->setCellValue("M" . $contador, empty($preinscrito['DEPOSITO_MATRICULA']) ? 'NO' : 'SI');
            $this->getActiveSheet()->setCellValue("N" . $contador, $preinscrito['numero_deposito_cuota_inicial']);
            $this->getActiveSheet()->setCellValue("O" . $contador, $preinscrito['fecha_deposito_inicial']);
            $this->getActiveSheet()->setCellValue("P" . $contador, empty($preinscrito['DEPOSITO_CUOTA_INICIAL']) ? 'NO' : 'SI');
            $this->getActiveSheet()->setCellValue("Q" . $contador, empty($preinscrito['CI_ANVERSO']) ? 'NO' : 'SI');
            $this->getActiveSheet()->setCellValue("R" . $contador, empty($preinscrito['CI_REVERSO']) ? 'NO' : 'SI');
            $this->getActiveSheet()->setCellValue("S" . $contador, empty($preinscrito['DIPLOMA']) ? 'NO' : 'SI');
        }
        $filename = 'reporte_inscritos_' . str_replace(array(' ', '|'), '_', $titulo);
        $writer = new Xlsx($this);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
