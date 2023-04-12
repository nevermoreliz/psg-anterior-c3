<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
require_once APPPATH . "/libraries/Fpdf_psg.php";
class Reporte_cerfiticado_calificacion extends Fpdf_psg
{
	public function __construct()
	{
		parent::__construct();
	}
	public function Header()
	{
		$this->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
		$this->AddFont('helvetica', 'I', 'helvetica.php');
		//$this->SetTextColor(0, 0, 0); //Color del texto: Negro
		$this->SetFont('Arial', 'I', 8);
		$this->SetTopMargin(15);
		$this->SetLeftMargin(10);
		$this->SetRightMargin(19);
		$this->ln(39);
	}
	public function certificado_calificacion($data = null)
	{
		$datos_planificacion_programa = $data['datos_planificacion_programa'];
		$lista_posgraduante = $data['lista_posgraduante'];
		$datos_modulo_asignatura_nota = $data['datos_modulo_asignatura_nota'];
		$fecha_inicio = explode("-", $datos_planificacion_programa->fecha_inicio);
		$fecha_fin = explode("-", $datos_planificacion_programa->fecha_fin);

		//echo print_r($datos_planificacion_programa);
		//$this->SetTopMargin(15);
		$this->SetLeftMargin(20);
		$this->SetRightMargin(19);
		$this->SetAutoPageBreak(1, 20);
		$this->AddPage('P', 'legal');
		$this->AliasNbPages();
		$this->SetFillColor(229, 229, 229);
		$this->SetLineWidth(0);

		$bordeCelda = 1;
		$tam = 6;
		if (!empty($lista_posgraduante)) {
			foreach ($lista_posgraduante as $lista_posgraduante_fila) {
				$this->ln();
				$this->AjustCell(40, $tam, utf8_decode(''), $bordeCelda, 0, 'L');
				$this->AjustCell(159, $tam, utf8_decode('CEFORPI - UPEA'), $bordeCelda, 1, 'L');
				$this->AjustCell(35, $tam, utf8_decode(''), $bordeCelda, 0, 'L');
				$this->AjustCell(164, $tam, utf8_decode($datos_planificacion_programa->descripcion_grado_academico . ' EN ' . $datos_planificacion_programa->nombre_programa . ' - VERSIÓN ' . $datos_planificacion_programa->numero_version), $bordeCelda, 1, 'L');


				$this->AjustCell(40, $tam, utf8_decode(''), $bordeCelda, 0, 'L');
				$this->AjustCell(53, $tam, utf8_decode($lista_posgraduante_fila->paterno), $bordeCelda, 0, 'C');
				$this->AjustCell(53, $tam, utf8_decode($lista_posgraduante_fila->materno), $bordeCelda, 0, 'C');
				$this->AjustCell(53, $tam, utf8_decode($lista_posgraduante_fila->nombre), $bordeCelda, 1, 'C');


				$this->ln(10);
				$this->AjustCell(66.4, $tam, utf8_decode($lista_posgraduante_fila->ci . ' ' . $lista_posgraduante_fila->expedido), $bordeCelda, 0, 'C');
				$this->AjustCell(66.4, $tam, utf8_decode($lista_posgraduante_fila->registro_universitario), $bordeCelda, 0, 'C');
				$this->AjustCell(66.4, $tam, utf8_decode($fecha_inicio[0] . ' - ' . $fecha_fin[0]), $bordeCelda, 1, 'C');


				$this->ln(22);
				$tam = 10;
				$x = 1;
				$modulo_asignatura_nota = $datos_modulo_asignatura_nota[$lista_posgraduante_fila->id_persona];
				if (!empty($modulo_asignatura_nota)) {
					foreach ($modulo_asignatura_nota as $modulo_asignatura_nota_fila) {


						$nota_final_modulo = $modulo_asignatura_nota_fila->nota_final_modulo;
						$nota_final_literal = (!empty($nota_final_modulo)) ? numero_literal($nota_final_modulo, '', '', true) : '';


						$this->AjustCell(20, $tam, utf8_decode($datos_planificacion_programa->sigla_programa . ' - ' . $x++), $bordeCelda, 0, 'C');
						$this->AjustCell(21, $tam, utf8_decode($fecha_inicio[0]), $bordeCelda, 0, 'C');
						$this->AjustCell(67, $tam, utf8_decode($modulo_asignatura_nota_fila->nombre_modulo_programa), $bordeCelda, 0, 'C');
						$this->AjustCell(20, $tam, utf8_decode($nota_final_modulo), $bordeCelda, 0, 'C');
						$this->AjustCell(37, $tam, utf8_decode($nota_final_literal), $bordeCelda, 0, 'C');
						$this->AjustCell(31, $tam, utf8_decode($modulo_asignatura_nota_fila->creditaje_modulo), $bordeCelda, 1, 'C');
						/*if($x==7)
						{
							$this->AddPage('P', 'legal');
						}*/
					}
				}
				$this->AddPage('P', 'legal');
			}
		}
		ob_end_clean();
		header("Content-Encoding: None", true);
		echo base64_encode($this->Output('S'));
	}
}
