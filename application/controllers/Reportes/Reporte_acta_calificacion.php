<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Reporte_acta_calificacion extends FPDF
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('modelo_planificar_convocatoria');
	}

	public function Header()
	{
		$this->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
		//$this->AddFont('Erinal', 'I', 'Erinal.php');
		//$this->AddFont('Episode', 'I', 'Episode.php');
		// $this->AddFont('Splash', 'I', 'Splash.php');
		$this->AddFont('helvetica', 'I', 'helvetica.php');
		$this->Image(APPPATH . '../public_html/img/upea.png', 20, 4.5, 15, 'jpg');
		$this->SetTextColor(0, 0, 0); //Color del texto: Negro
		$this->SetFont('EdwardianScriptITC', 'I', 38);
		$this->Cell(0, 5, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');  // $this->Cell(ANCHO, ALTO, 'UNIVERSIDAD PUBLICA DE EL ALTO', margen, 1=seguido, 'alineacion'); 
		$this->SetFont('Arial', 'I', 6);
		$this->Cell(0, 9, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y Autonoma por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
		$this->SetFont('Arial', 'B', 16);
		$this->Cell(0, 2, utf8_decode('POSGRADO'), 0, 1, 'C');
		$this->Cell(0, 10, utf8_decode('ACTA DE CALIFICACIONES'), 0, 1, 'C');
	}

	public function Footer()
	{
		$this->SetY(-25);
		$this->SetFont('Arial', '', 8);
		$this->Ln();
		$this->SetFillColor(100, 150, 90);

		/* $this->SetDrawColor(105, 105, 105);
        $this->Rect('0', '262', '220', '6', 'FD'); //vertical
        //$this->Rect('0','195','220','6','FD'); //horizontal
        //$this->Image('img/cabecera.jpg','0','260','220','25','JPG');
        $this->SetTextColor(255, 255, 255);
        $this->Cell(0, 0, '____________________________________________________________________________________________________________', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 8, 'Dir.: Av. Sucre A s/n Villa Esperanza. Telf.:(591-2)2-844177 - Fax.:(591-2)2-845800. www.epea.edu.bo', 0, 0, 'C');
        $this->Ln(9);
        $this->SetTextColor(0, 0, 0);*/
		/*$this->SetFont('Arial', 'I', 5);
        $this->Cell(0, 0, utf8_decode('Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'C');*/
		$this->Cell(0, 12, utf8_decode('NOTA: El llenado de las Actas de Calificaciones debe ser computarizado, sin alterar el formato de las celdas.'), 0, 0, 'L');
	}
	public function acta_calificacion_posgraduante($data = null)
	{
		$datos_planificacion_asignacion_modulo_programa = $data['datos_planificacion_asignacion_modulo_programa'];
		$datos_persona_docente = $data['datos_persona_docente'];
		$lista_posgraduante = $data['lista_posgraduante'];
		$nro_resolucion = $data['nro_resolucion'];
		//session_start();
		// ob_start();
		// ini_set("session.auto_start", 0); //$this->load->library('fpdf');
		//$this->SetTopMargin(15);
		$this->SetLeftMargin(20);
		$this->SetRightMargin(19);
		$this->SetAutoPageBreak(1, 20);
		$this->AddPage('P', 'legal');
		$this->AliasNbPages();
		$this->SetFillColor(229, 229, 229); // DEFINE EL COLOR// Se define el formato de fuente: Arial, negritas, tamaño 9
		$this->SetLineWidth(0);
		//$this->SetFont('Arial', 'B', 10);
		$this->SetFont('Arial', 'B', 10);
		$tam = 5;
		$bordeCelda = 0;
		$this->AjustCell(120, $tam, utf8_decode('Posgrado: ' . $datos_planificacion_asignacion_modulo_programa->descripcion_grado_academico), $bordeCelda, 1, 'L');
		$this->AjustCell(66, $tam, utf8_decode('Programa: ' . $datos_planificacion_asignacion_modulo_programa->nombre_programa), $bordeCelda, 1, 'L');
		$this->AjustCell(120, $tam, utf8_decode('Modulo: ' . $datos_planificacion_asignacion_modulo_programa->numero_modulo), $bordeCelda, 0, 'L');
		$this->AjustCell(66, $tam, utf8_decode('Modalidad: ' . $datos_planificacion_asignacion_modulo_programa->nombre_tipo_programa), $bordeCelda, 1, 'L');
		$this->AjustCell(120, $tam, utf8_decode('Docente: ' . $datos_persona_docente->abreviatura . ' ' . $datos_persona_docente->paterno . ' ' . $datos_persona_docente->materno . ' ' . $datos_persona_docente->nombre), $bordeCelda, 0, 'L');
		$this->AjustCell(66, $tam, utf8_decode('Resolución CEFORPI N°: ' . $nro_resolucion), $bordeCelda, 1, 'L');
		$this->AjustCell(120, $tam, utf8_decode('Nombramiento Docente Posgrado: DPG-CA-VCR-' . $datos_planificacion_asignacion_modulo_programa->nro_nombramiento . '/' . $datos_planificacion_asignacion_modulo_programa->gestion), $bordeCelda, 0, 'L');
		$this->AjustCell(41, $tam, utf8_decode('Paralelo: ' . $datos_planificacion_asignacion_modulo_programa->paralelo), $bordeCelda, 1, 'L');
		$this->AjustCell(60, $tam, utf8_decode('Fecha de Inicio: ' . $datos_planificacion_asignacion_modulo_programa->fecha_inicio), $bordeCelda, 0, 'L');
		$this->AjustCell(60, $tam, utf8_decode('Fecha de Conclusión: ' . $datos_planificacion_asignacion_modulo_programa->fecha_fin), $bordeCelda, 0, 'L');
		$this->AjustCell(40, $tam, utf8_decode('Gestión: ' . $datos_planificacion_asignacion_modulo_programa->gestion), $bordeCelda, 0, 'L');
		$this->SetFont('Arial', 'B', 6);
		$this->Cell(20, $tam, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', $bordeCelda, 1, 'R');
		$bordeCelda = 1;
		$amLetra = 9;
		$setY = 66;
		/*ENCABEZADO DE LA TABLA*/
		$tamNum = 10;
		$this->SetFont('Arial', 'B', $amLetra);
		$this->AjustCell(8, $tamNum, utf8_decode('N°'), $bordeCelda, 0, 'C');
		$this->AjustCell(88, $tam, utf8_decode('NÓMINA'), $bordeCelda, 1, 'C');
		$amLetra = 6.5;
		$this->SetFont('Arial', 'B', $amLetra);
		$this->setX(28);
		$this->AjustCell(28, $tam, utf8_decode('APELLIDO PATERNO'), $bordeCelda, 0, 'C');
		$this->AjustCell(28, $tam, utf8_decode('APELLIDO MATERNO'), $bordeCelda, 0, 'C');
		$this->AjustCell(32, $tam, utf8_decode('NOMBRE(S)'), $bordeCelda, 0, 'C');

		$this->setY($setY);
		$this->setX(116);
		$this->MultiCell(25, 5, utf8_decode('N° DE CEDULA DE IDENTIDAD'), $bordeCelda, 'C', 0);
		$this->setY($setY);
		$this->setX(141);
		$this->AjustCell(7, $tamNum, utf8_decode('EXP.'), $bordeCelda, 0, 'C');
		$this->MultiCell(10, 3.3, utf8_decode('C.F s/100 Pts.'), $bordeCelda, 'C', 0);
		$this->setY($setY);
		$this->setX(158);
		$this->AjustCell(30, $tamNum, utf8_decode('CALIFICACION LITERAL'), $bordeCelda, 0, 'C');
		$this->AjustCell(20, $tamNum, utf8_decode('RESULTADO'), $bordeCelda, 1, 'C');
		$numero = 1;
		if (!empty($lista_posgraduante)) {
			foreach ($lista_posgraduante as $lista_posgraduante_fila) {
				$nota_final_modulo = $lista_posgraduante_fila->nota_final_modulo;
				$nota_final_literal = (!empty($nota_final_modulo)) ? numero_literal($nota_final_modulo, '', '', true) : '';
				$this->AjustCell(8, $tam, utf8_decode($numero++), $bordeCelda, 0, 'C');
				$this->AjustCell(28, $tam, utf8_decode($lista_posgraduante_fila->paterno), $bordeCelda, 0, 'L');
				$this->AjustCell(28, $tam, utf8_decode($lista_posgraduante_fila->materno), $bordeCelda, 0, 'L');
				$this->AjustCell(32, $tam, utf8_decode($lista_posgraduante_fila->nombre), $bordeCelda, 0, 'L');
				$this->AjustCell(25, $tam, utf8_decode($lista_posgraduante_fila->ci), $bordeCelda, 0, 'R');
				$this->AjustCell(7, $tam, utf8_decode($lista_posgraduante_fila->expedido), $bordeCelda, 0, 'C');
				$this->AjustCell(10, $tam, utf8_decode($nota_final_modulo), $bordeCelda, 0, 'C');
				$this->AjustCell(30, $tam, utf8_decode($nota_final_literal), $bordeCelda, 0, 'L');
				$this->AjustCell(20, $tam, utf8_decode(estado_nota_final_modulo($nota_final_modulo)), $bordeCelda, 1, 'C');
			}
		}





		echo base64_encode($this->Output('S'));
	}
	public function nombre_mes($mes)
	{
		setlocale(LC_TIME, 'spanish');
		$mesResul = strftime("%B", mktime(0, 0, 0, $mes, 1, 2000));
		return $mesResul;
	}
	function AjustCell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
	{
		$TamanoInicial = $this->FontSizePt;
		$TamanoLetra = $this->FontSizePt;
		$Decremento = 0.5;
		while ($this->GetStringWidth($txt) > $w)
			$this->SetFontSize($TamanoLetra -= $Decremento);
		$this->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
		$this->SetFontSize($TamanoInicial);
	}
}
