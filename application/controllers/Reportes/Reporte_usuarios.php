<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "/libraries/Fpdf_psg.php";
class Reporte_usuarios extends Fpdf_psg
{
	var $CI;
	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
	}

	public function listar($datos)
	{
		$this->AddFont('Rubik-Regular','','Rubik-Regular.php');
		$this->AddFont('Rubik-Medium','','Rubik-Medium.php');
		$this->SetFont('Rubik-Medium', '', 10);

		$width = $this->getWidth($datos['datos'],$datos['keys']);
		$type_cell = $this->getTypeCell($datos['datos']);
		$type_cell_keys = $this->getTypeCellKeys($datos['keys']);
		$orientacion = $this->getOrientation($width);

		$this->AddPage($orientacion, 'Letter',0,false);
		$this->SetWidths($width);
		$this->SetTypeCell($type_cell_keys);
		$this->SetFillColor(229, 229, 229);
		$this->Row($datos['keys'], 'DF');

		

		$this->SetFont('Rubik-Regular', '', 9);
		
		for ($i=0; $i < count($datos['datos']); $i++) { 
			$this->SetTypeCell($type_cell[$i]);
			$this->Row($datos['datos'][$i]);
		}
		
		$this->Output();
	}

	public function solicitud($datos)
	{
		$text ="<p1>Mediante la presente me es muy grato dirigirme ante su autoridad, haciéndole llegar 
				mis más cordiales saludos, y éxitos en la labor que desempeña.</p1>
				<p2>El motivo de la presente es para solicitar a su autoridad LA ACTUALIZACIÓN DE NÚMERO DE CUENTA BANCARIA; puesto que los docentes ya se encuentran registrados en su sistema de recursos humanos, sin números de cuenta bancaria. Sin embargo, ellos son docentes de Posgrado donde presentaron su baucher para su posterior pago.</p2>
				<p3>Adjunto fotocopias de baucher de los docentes que figuran con el caso mencionado de la siguiente persona:</p3>
				<h3>".$datos['nombre']." ".$datos['paterno']." ".$datos['materno']." ".$datos['ci']." ".$datos['expedido']." con número de cuenta: ".$datos['numero_cuenta_bancaria']."</h3>
				<p4>Sin otro particular, esperando contar con una respuesta favorable, me despido reiterándole mis consideraciones más distingidas</p4>";
		setlocale(LC_ALL,"es_ES");
		$fecha = strftime("%B del %Y");

		$this->AddPage('P','Letter');
		$this->SetFont('Helvetica','',12);
		$this->SetStyle('p','Helvetica','',12,'0,0,0');
		$this->SetStyle('p1','Helvetica','',12,'0,0,0',8);
		$this->SetStyle('p2','Helvetica','',12,'0,0,0',0);
		$this->SetStyle('p3','Helvetica','',12,'0,0,0',0);
		$this->SetStyle('p4','Helvetica','',12,'0,0,0',0);
		$this->SetStyle('h3','Helvetica','B',12,'0,0,0',0);

		$this->Cell(0,5,'El Alto, '.$fecha,0,1,'R');
		$this->Ln(10);
		$this->Cell(0,7,utf8_decode('Señor:'),0,1,'L');
		$this->Cell(0,7,'M. Sc. Vidal Ticona',0,1,'L');
		$this->SetFont('Helvetica','B',12);
		$this->Cell(0,7,'DIRECTOR DE RRHH - UPEA',0,1,'l');
		$this->SetFont('Helvetica','',12);
		$this->Cell(0,7,'Presente. -',0,1,'L');
		$this->Ln(8);
		$this->SetFont('Helvetica','BU',12);
		$this->Cell(0,5,utf8_decode('REF.: SOLICITUD DE ACTUALIZACIÓN DE DATOS BANCARIOS'),0,1,'R');
		$this->Ln(10);

		$this->WriteTag(0,5,utf8_decode($text),0,'J');
		$this->Ln(8);
		$this->Cell(0,5,'Atentamente.',0,1,'L');
		$this->Ln(15);
		$this->Cell(0,2,'...................................................................',0,1,'C');
		$this->Cell(0,5,'M. Sc Richard Jorge Torrez Juaniquina',0,1,'C');

		$this->Output();
	}
}
