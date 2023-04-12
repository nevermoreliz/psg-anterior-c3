<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "/libraries/Fpdf_psg.php";
class Formulario extends Fpdf_psg
{
	var $CI;
	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		#$this->load->database();
		$this->SetStyle("h1", "Arial", "B", 10, "0,0,0", 0);
		$this->SetStyle("h2", "Arial", "BU", 10, "0,0,0", 0);
		$this->SetStyle("h3", "Arial", "B", 10, "0,0,0", 0);
		$this->SetStyle("h4", "Arial", "", 10, "0,0,0", 0,);
		$this->SetStyle("p", "Arial", "", 10, "0,0,0", 0);
		$this->SetStyle("a","Arial","U",9,"0,0,255",0);
	}
	public function formulario_registro($id_planificacion_programa=null)
	{
		$resolucion1 = utf8_decode('Resolución del Honorable Consejo de CEFORPI, No.016/2019/Foja 10-No.124 (Adjunto fotocopia).');
		$this->AddPage('P', 'Letter');
		$this->SetTitle('Formulario de Registro');
		$this->SetFont('Arial', 'B', 11);
		$this->Cell(0, 5, utf8_decode('COMITÉ EJECUTIVO DE LA UNIVERSIDAD BOLIVIANA'), 0, 1, 'C');
		$this->Cell(0, 5, utf8_decode('SECRETARÍA NACIONAL DE POSTGRADO Y EDUCACIÓN CONTINUA'), 0, 0, 'C');
		$this->Ln(7);

		$this->SetFont('Arial', 'B', 10);
		$this->Cell(0, 5, 'Formulario', 0, 1, 'C');
		$this->Cell(0, 5, 'Registro de Programas de Posgrado', 0, 1, 'C');
		$this->Ln(2);

		$this->Cell(0, 5, utf8_decode('I.	Información Institucional'), 0, 1, 'L');
		$this->Ln(1);

		$this->SetFont('Arial', '', 10);
		$this->Cell(12, 5, '1.1.', 1, 0, 'C');
		$this->Cell(70, 5, 'Universidad:', 1, 0, 'L');
		$this->Cell(95, 5, utf8_decode('UNIVERSIDAD PÚBLICA DE EL ALTO'), 1, 1, 'L');

		$this->Cell(12, 5, '1.2.', 1, 0, 'C');
		$this->Cell(70, 5, 'Unidad Responsable:', 1, 0, 'L');
		$this->Cell(95, 5, utf8_decode('DIRECCIÓN DE POSGRADO'), 1, 1, 'L');

		$this->Cell(12, 5, '1.3.', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Dirección:'), 1, 0, 'L');
		$this->Cell(95, 5, 'Zona Villa Esperanza, Av. Sucre s/n', 1, 1, 'L');

		$this->Cell(12, 5, '', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Teléfono/Fax:'), 1, 0, 'L');
		$this->Cell(95, 5, '2-844005', 1, 1, 'L');

		$this->Cell(12, 5, '', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Correo electrónico:'), 1, 0, 'L');
		$this->Cell(95, 5, 'posgradoceforpiupea@gmail.com', 1, 1, 'L');

		$this->SetWidths([12,70,95]);
		$this->SetAligns(['C','L','L']);
		$this->SetTypeCell(['c','c','m']);
		$this->Row([
			'',
			utf8_decode('Página web:'),
			"   http://posgrado.upea.bo/
			http://www.upeaposgrado.com/"
		]);

		$this->SetTextColor(0,0,0);
		$this->SetFont('Arial','',10);
		$this->Cell(12, 5, '1.4.', 1, 0, 'C');
		$this->Cell(70, 5, 'Responsable de la Unidad:', 1, 0, 'L');
		$this->Cell(95, 5, 'M.Sc. Richard Jorge Torrez Juaniquina ', 1, 1, 'L');

		$this->Cell(12, 5, '', 1, 0, 'C');
		$this->Cell(70, 5, 'Cargo del responsable:', 1, 0, 'L');
		$this->Cell(95, 5, 'Director de Posgrado', 1, 1, 'L');

		$this->Cell(12, 5, '', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Grado académico: (máximo)'), 1, 0, 'L');
		$this->Cell(95, 5, 'Magister', 1, 1, 'L');

		$this->Cell(12, 5, '', 1, 0, 'C');
		$this->Cell(70, 5, 'Expedido por:', 1, 0, 'L');
		$this->Cell(95, 5, utf8_decode('Universidad Amazónica de Pando'), 1, 1, 'L');

		$this->SetTypeCell(['c','c','m']);
		$this->Row([
			'1.5',
			utf8_decode('Resolución aprobación programa:'),
			$resolucion1
		]);
		$this->Ln(4);

		$this->SetFont('Arial', 'B');
		$this->Cell(0, 5, utf8_decode('II.	Información Académica'), 0, 0, 'L');
		$this->Ln(6);

		/*variables que recupera de la base de datos*/
		/**/
		// $this->db->select('*');
		// $this->db->from('planificacion_programa pp');
		// $this->db->join('modulo_programa mp','pp.id_planificacion_programa = mp.id_planificacion_programa ');
		// $this->db->where('pp.id_planificacion_programa',$id_planificacion_programa);
		// $programa_modulos = $this->db->get()->result_array();
		// foreach ($programa_modulos as $key) {
		// 	$this->Cell(80,5,$key['nombre_programa'],1,0,'C');
		// 	$this->Cell(80,5,$key['nombre_modulo_programa'],1,1,'C');
		// }
		$programa = 'DIPLOMADO EN SISTEMA DE ADMINISTRACIÓN DE BIENES Y SERVICIOS';
		// $programa = '<h1>MAESTRIA EN ENFERMERÍA MÉDICO QUIRÚRGICA</h1>

		// <h2>ESTRUCTURA PIRAMIDAL - TÍTULOS INTERMEDIOS:</h2>
		// <h3>-ESPECIALIDAD EN ENFERMERÍA MÉDICO QUIRÚRGICA(8 meses)</h3>
		// <p>Del 5 de abril de 2019 al 30 de noviembre de 2019.</p>

		// <h3>-MAESTRIA EN ENFERMERÍA MÉDICO QUIRÚRGICA (15 meses)</h3>
		// <p>Del 5 de abril de 2019 al 30 de junio de 2020.</p>
		// ';
		//$tipo_programa = 'Maestria';
		$tipo_programa = 'Diplomado';
		/**/
		$modalidad_programa = 'VIRTUAL';
		//$modalidad_programa = 'SEMIPRESENCIAL';
		//$modalidad_programa = 'PRESENCIAL';
		/**/
		$version_programa = 'I';
		/**/
		$duracion_programa = '02 de Febrero de 2021 al 30 de Mayo de 2021';
		/**/
		$responsable_programa = 'Lic. Marlene Mónica Ortega Machicado';
		/**/
		$grado_academico = 'Diplomado en Educación Superior';
		/**/
		$expedido = "Universidad Autónoma del Beni \"José Ballivian\"";
		/**/
		$requisitos = 'Para inscripción debe presentar fotocopia legalizada de Diploma Académico y Título Profesional con grado académico a nivel de Técnico Superior o Licenciatura.';
		/**/
		$objetivo = 'Formar profesionales cualificados y actualizados en el avance del conocimiento en el ámbito de la Educación Virtual, capaces de diseñar, gestionar y administrar procesos de formación en línea con calidad y dominio de los enfoques educativos, principios didácticos, estrategias educativas, recursos y herramientas propias de la educación virtual.';
		$modalidad_graduacion = 'Presentación de monografía.';
		$modalidad_graduacion = '<h1>-ESPECIALIDAD EN ENFERMERÍA MÉDICO QUIRÚRGICA</h1>
								<p>Presentación y sustentación de la Tesis de Grado.</p>
								<h1>-MAESTRIA EN ENFERMERÍA MÉDICO QUIRÚRGICA</h1>
								<p>Presentación y defensa de Tesis Magistral.</p>';
		/*///////////////////////////////////////////*/

		$this->SetFont('Arial', '', 10);
		$this->SetTypeCell(['c','c','wt']);
		$this->Row([
			'2.1',
			'Programa:',
			#remplazar por la variable $programa
			'<h4>'.utf8_decode($programa).'</h4>'
		]);

		$this->Cell(12, 5, '2.2.', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Grado Académico:'), 1, 0, 'L');
		$this->Cell(95, 5, utf8_decode($tipo_programa), 1, 1, 'L');

		$this->Cell(12, 5, '2.3.', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Versión del programa:'), 1, 0, 'L');
		$this->Cell(95, 5, $version_programa, 1, 1, 'L');

		$this->Cell(12, 5, '2.4.', 1, 0, 'C');
		$this->Cell(70, 5, 'Modalidad del programa:', 1, 0, 'L');
		$this->Cell(95, 5, $modalidad_programa, 1, 1, 'L');

		$this->SetTypeCell(['c','m','c']);
		$this->Row([
			'2.5.',
			'Lugar o sede en el que se ejecuta el programa:',
			utf8_decode('Universidad Pública de El Alto')
		]);

		$this->Cell(12, 5, '2.6.', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Duración del programa:'), 1, 0, 'L');
		$this->Cell(95, 5, $duracion_programa, 1, 1, 'L');

		$this->SetTypeCell(['c','c','m']);
		$this->Row([
			'2.7.',
			'Responsable del Programa:',
			utf8_decode($responsable_programa)
		]);

		$this->Cell(12, 5, '', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Grado Académico: (máximo)'), 1, 0, 'L');
		$this->Cell(95, 5, utf8_decode($grado_academico), 1, 1, 'L');
		
		$this->Row([
			'',
			'Expedido por:',
			utf8_decode($expedido)
		]);

		$this->Cell(12, 5, '2.8.', 1, 0, 'C');
		$this->Cell(70, 5, utf8_decode('Modalidad de admisión:'), 1, 0, 'L');
		$this->Cell(95, 5, utf8_decode('Invitación'), 1, 1, 'L');

		$this->SetAligns(['C', 'L', 'J']);
		$this->Row([
			'2.9',
			utf8_decode('Requisitos de admisión:'),
			utf8_decode($requisitos)
		]);

		$this->Row([
			'2.10.',
			'Objetivo general del programa:',
			utf8_decode($objetivo)
		]);

		$this->SetAligns(['C', 'L', 'J']);
		$this->SetTypeCell(['c', 'c', 'wt']);
		$this->Row([
			'2.11.',
			utf8_decode('Modalidad de graduación:'),
			utf8_decode($modalidad_graduacion)
		]);
		$this->Ln(4);

		$this->CheckPageBreak(10);

		$this->SetFont('Arial', 'B', 10);
		$this->Cell(0, 5, utf8_decode('III.	Plan de estudios del programa'), 0, 1, 'L');
		$this->Cell(0, 5, utf8_decode('a)	Módulos/Asignatura:'), 0, 1, 'L');
		$this->Ln(2);

		$this->modulos($tipo_programa, $modalidad_programa/*, $modulos*/);

		$this->Cell(0, 5, 'IV	Convenios:', 0, 1, 'L');
		$this->SetFont('Arial', '');
		$this->Cell(0, 5, utf8_decode('(Institución(es) con la(s) que se suscribe convenio(s) para la ejecución del programa)'), 0, 1, 'L');

		$this->SetWidths([16,70,80]);
		$this->SetAligns(['C','L','C']);
		$this->SetTypeCell(['c','c','m']);
		$this->Row([
			'4.1.',
			utf8_decode('Institución'),
			'Ninguna' ///cambiar por la variable de institucion
			]);
		$this->Row([
			'4.2.',
			'Corresponsable del programa:',
			'-'  //cambiar
		]);
		$this->Row([
			'4.3.',
			utf8_decode('Grado académico'),
			'-'  //cambiar
		]);
		$this->Row([
			'4.4',
			'Expedido por:',
			'-'  //cambiar
		]);
		$this->Ln(6);

		if ($modalidad_programa == 'VIRTUAL') {
			$this->SetFont('Arial', 'B');
			$this->Cell(0, 5, utf8_decode('V.	Información Técnica del Programa de Posgrado:'), 0, 1, 'L');
			$this->SetFont('Arial', '');
			$this->Cell(0, 5, utf8_decode('(Institución(es) con la(s) que se suscribe convenio(s) para la ejecución del programa)'), 0, 1, 'L');

			$this->SetWidths([16,85,60]);
			$this->SetAligns(['C','L','C']);
			$this->SetTypeCell(['c','m','c']);
			$this->Row([
				'5.1.',
				'Plataforma virtual utilizada por el programa con componente virtual:',
				'Moodle V.2.7'
			]);
			$this->Row([
				'5.2.',
				utf8_decode('Tipo de conexión a internet:'),
				'ADSL'
			]);
			$this->Row([
				'5.3.',
				'Ancho de banda disponible:',
				'10 MB/s'
			]);
			$this->Row([
				'5.4.',
				utf8_decode('Acceso a la plataforma (link URL, página web, etc.)'),
				'http://www.upeaposgrado.com/'
			]);
			$this->Row([
				'5.5.',
				'Responsable de la Plataforma',
				utf8_decode('Lic. Elizabeth Kantuta Siñani') ///puede cambiar
			]);
			$this->Ln(5);
		}

		$this->CheckPageBreak(60);

		$fecha = strftime("%d de %B del %Y");
		$this->Cell(0, 5, 'Lugar: El Alto', 0, 1);
		$this->Cell(0, 5, 'Fecha: ' . $fecha, 0, 1);
		$this->Cell(0, 5, utf8_decode('Responsable Unidad: M. Sc. Richard Jorge Torréz Juaniquina'), 0, 1);
		$this->Ln(10);
		$this->Cell(0, 5, 'Firma:', 0, 1);
		$this->Cell(0, 5, 'Sello institucional:', 0, 1);
		$this->Ln(15);
		$this->Cell(0, 5, utf8_decode('Fecha recepción en SNPG-CEUB:'), 0, 1);
		$this->Cell(0, 5, utf8_decode('Sello recepción:'), 0, 1);

		$fecha_hora = date('d/m/Y H:i:s');
		$nombre_archivo = 'Formulario de registro ' . $fecha_hora . '.pdf';
		$this->Output(null, $nombre_archivo, true);
	}

	public function modulos($tipo_programa, $modalidad_programa, $modulos = null)
	{
		$this->SetFillColor(229, 229, 229);
		if ($tipo_programa == 'Diplomado') {
			switch ($modalidad_programa) {
				case 'VIRTUAL':
					$this->SetFontSize(9);
					$y = $this->GetY();
					$this->Multicell(16, 5, utf8_decode('SIGLA - CÓDIGO'), 1, 'C', true);
					$x = 16 + $this->GetX();
					$this->SetXY($x, $y);
					$this->Cell(60, 10, utf8_decode('MÓDULOS'), 1, 0, 'C', true);
					$this->SetFontSize(7);
					$this->MultiCell(15, 3.334, 'Horas Trabajo Virtual', 1, 'C', true);
					$x = 75 + $x;
					$this->SetXY($x, $y);
					$this->MultiCell(19, 3.334, 'Horas  Trabajo  Independiente', 1, 'C', true);
					$x = 19 + $x;
					$this->SetXY($x, $y);
					$this->MultiCell(18, 3.334, 'Horas Trabajo Colaborativo', 1, 'C', true);
					$x = 18 + $x;
					$this->SetXY($x, $y);
					$this->MultiCell(18, 3.334, 'Horas Trabajo investigativo', 1, 'C', true);
					$x = 18 + $x;
					$this->SetXY($x, $y);
					$this->MultiCell(15, 5, 'TOTAL HORAS', 1, 'C', true);
					$x = 15 + $x;
					$this->SetXY($x, $y);
					$this->Cell(18, 10, utf8_decode('CRÉDITOS'), 1, 1, 'C', true);

					$this->SetFontSize(8);
					$this->Cell(16, 15, 'SABS-O1', 1, 0, 'C');
					$y = $this->GetY();
					$x = $this->GetX();
					$this->SetFont('Arial', '');
					$this->MultiCell(60, 5, utf8_decode('LEY 1178 (SAFCO) Y SUS SITEMAS DE ADMINISTRACIÓN Y CONTROL GUBERNAMENTAL'), 1, 'L');
					$x = 60 + $x;
					$this->SetXY($x, $y);
					$this->Cell(15, 15, '60', 1, 0, 'C');
					$this->Cell(19, 15, '40', 1, 0, 'C');
					$this->Cell(18, 15, '18', 1, 0, 'C');
					$this->Cell(18, 15, '60', 1, 0, 'C');
					$this->Cell(15, 15, '178', 1, 0, 'C');
					$this->Cell(18, 15, '4,5', 1, 1, 'C');

					$this->SetFont('Arial', 'B');
					$this->Cell(16, 15, 'SABS-O1', 1, 0, 'C');
					$y = $this->GetY();
					$x = $this->GetX();
					$this->SetFont('Arial', '');
					$this->MultiCell(60, 5, utf8_decode('LEY 1178 (SAFCO) Y SUS SITEMAS DE ADMINISTRACIÓN Y CONTROL GUBERNAMENTAL'), 1, 'L');
					$x = 60 + $x;
					$this->SetXY($x, $y);
					$this->Cell(15, 15, '60', 1, 0, 'C');
					$this->Cell(19, 15, '40', 1, 0, 'C');
					$this->Cell(18, 15, '18', 1, 0, 'C');
					$this->Cell(18, 15, '60', 1, 0, 'C');
					$this->Cell(15, 15, '178', 1, 0, 'C');
					$this->Cell(18, 15, '4,5', 1, 1, 'C');

					$this->SetFont('Arial', 'B', 10);
					$this->Cell(76, 5, 'TOTAL', 1, 0, 'R');
					$this->Cell(15, 5, '120', 1, 0, 'C');
					$this->Cell(19, 5, '80', 1, 0, 'C');
					$this->Cell(18, 5, '36', 1, 0, 'C');
					$this->Cell(18, 5, '120', 1, 0, 'C');
					$this->Cell(15, 5, '356', 1, 0, 'C');
					$this->Cell(18, 5, '9', 1, 1, 'C');
					$this->Ln(4);

					$this->SetFontSize(10);
					$this->Cell(80, 5, '3.1 Carga horaria total (HT)', 0, 0, 'L');
					$this->Cell(0, 5, '356', 0, 1, 'L');
					$this->Cell(80, 5, '3.2 Total horas presenciales (THP)', 0, 0, 'L');
					$this->Cell(0, 5, utf8_decode('.....'), 0, 1, 'L');
					$this->Cell(80, 5, '3.3 Total horas no presenciales (THNP)', 0, 0, 'L');
					$this->Cell(0, 5, '890', 0, 1, 'L');
					$this->Cell(80, 5, utf8_decode('3.4 Total créditos (1 crédito=40 horas)'), 0, 0, 'L');
					$this->Cell(0, 5, '22,5', 0, 1, 'L');
					$this->Ln(6);
					break;

				case 'SEMIPRESENCIAL':
					$this->SetFontSize(9);
					$this->SetWidths([16,70,15,19,15,18]);
					$this->SetAligns(['C','C','C','C','C','C']);
					$this->SetTypeCell(['m','c','m','m','m','c']);
					$this->Row([
						utf8_decode('SIGLA - CÓDIGO'),
						utf8_decode('MÓDULOS'),
						'Horas Aula',
						'Horas    Inv.',
						'TOTAL HORAS',
						utf8_decode('CRÉDITOS')
					],'DF');

					$this->SetFontSize(8);
					$this->SetFont('Arial', '');
					$this->Cell(16, 10, 'SABS-O1', 1, 0, 'C');
					$y = $this->GetY();
					$x = $this->GetX();
					$this->MultiCell(70, 5, utf8_decode('LEY 1178 (SAFCO) Y SUS SITEMAS DE ADMINISTRACIÓN Y CONTROL GUBERNAMENTAL'), 1, 'L');
					$x = 70 + $x;
					$this->SetXY($x, $y);
					$this->Cell(15, 10, '60', 1, 0, 'C');
					$this->Cell(19, 10, '40', 1, 0, 'C');;
					$this->Cell(15, 10, '178', 1, 0, 'C');
					$this->Cell(18, 10, '4,5', 1, 1, 'C');

					$this->Cell(16, 10, 'SABS-O1', 1, 0, 'C');
					$y = $this->GetY();
					$x = $this->GetX();
					$this->SetFont('Arial', '');
					$this->MultiCell(70, 5, utf8_decode('LEY 1178 (SAFCO) Y SUS SITEMAS DE ADMINISTRACIÓN Y CONTROL GUBERNAMENTAL'), 1, 'L');
					$x = 70 + $x;
					$this->SetXY($x, $y);
					$this->Cell(15, 10, '60', 1, 0, 'C');
					$this->Cell(19, 10, '40', 1, 0, 'C');
					$this->Cell(15, 10, '178', 1, 0, 'C');
					$this->Cell(18, 10, '4,5', 1, 1, 'C');

					$this->SetFont('Arial', 'B', 10);
					$this->Cell(86, 5, 'TOTAL', 1, 0, 'R');
					$this->Cell(15, 5, '120', 1, 0, 'C');
					$this->Cell(19, 5, '80', 1, 0, 'C');
					$this->Cell(15, 5, '356', 1, 0, 'C');
					$this->Cell(18, 5, '9', 1, 1, 'C');
					$this->Ln(4);

					$this->SetFontSize(10);
					$this->Cell(80, 5, '3.1 Carga horaria total (HT)', 0, 0, 'L');
					$this->Cell(0, 5, '356', 0, 1, 'L');
					$this->Cell(80, 5, '3.2 Total horas presenciales (THP)', 0, 0, 'L');
					$this->Cell(0, 5, utf8_decode('.....'), 0, 1, 'L');
					$this->Cell(80, 5, '3.3 Total horas no presenciales (THNP)', 0, 0, 'L');
					$this->Cell(0, 5, '890', 0, 1, 'L');
					$this->Cell(80, 5, utf8_decode('3.4 Total créditos (1 crédito=40 horas)'), 0, 0, 'L');
					$this->Cell(0, 5, '22,5', 0, 1, 'L');
					$this->Ln(6);
					break;
			}
		} elseif ($tipo_programa == 'Maestria') {
			switch ($modalidad_programa) {
				case 'PRESENCIAL':
					$this->SetFontSize(9);
					$y = $this->GetY();
					$this->Cell(12, 10, 'No.', 1, 0, 'C', true);
					$this->Multicell(16, 5, utf8_decode('SIGLA - CÓDIGO'), 1, 'C', true);
					$x = 28 + $this->GetX();
					$this->SetXY($x, $y);
					$this->Cell(63, 10, utf8_decode('MÓDULOS'), 1, 0, 'C', true);
					$this->MultiCell(15, 5, 'Horas Aula', 1, 'C', true);
					$x = 78 + $x;
					$this->SetXY($x, $y);
					$this->MultiCell(19, 5, 'Horas   Inv.', 1, 'C', true);
					$x = 19 + $x;
					$this->SetXY($x, $y);
					$this->MultiCell(18, 5, 'Horas Pract.', 1, 'C', true);
					$x = 18 + $x;
					$this->SetXY($x, $y);
					$this->MultiCell(15, 5, 'TOTAL HORAS', 1, 'C', true);
					$x = 15 + $x;
					$this->SetXY($x, $y);
					$this->Cell(18, 10, utf8_decode('CRÉDITOS'), 1, 1, 'C', true);

					$this->SetFont('Arial', '', 8);
					$this->Cell(12, 10, '60', 1, 0, 'C');
					$this->Cell(16, 10, 'MMQ - 01', 1, 0, 'C');
					$y = $this->GetY();
					$x = $this->GetX();
					$this->MultiCell(63, 5, utf8_decode('GENERALIDADES EN ENFERMERÍA MÉDICO QUIRÚRGICO'), 1, 'L');
					$x = 63 + $x;
					$this->SetXY($x, $y);

					$this->Cell(15, 10, '40', 1, 0, 'C');
					$this->Cell(19, 10, '40', 1, 0, 'C');
					$this->Cell(18, 10, '-', 1, 0, 'C');
					$this->Cell(15, 10, '80', 1, 0, 'C');
					$this->Cell(18, 10, '2', 1, 1, 'C');

					$this->SetFont('Arial', 'B');
					$this->Cell(91, 5, 'SUBTOTAL', 1, 0, 'R');
					$this->Cell(15, 5, '543', 1, 0, 'C');
					$this->Cell(19, 5, '543', 1, 0, 'C');
					$this->Cell(18, 5, '543', 1, 0, 'C');
					$this->Cell(15, 5, '543', 1, 0, 'C');
					$this->Cell(18, 5, '543', 1, 1, 'C');

					$this->Cell(91, 5, 'TOTAL', 1, 0, 'R');
					$this->Cell(15, 5, '543', 1, 0, 'C');
					$this->Cell(37, 5, '543', 1, 0, 'C');
					$this->Cell(15, 5, '543', 1, 0, 'C');
					$this->Cell(18, 5, '543', 1, 1, 'C');
					$this->Ln(2);

					$this->SetFontSize(10);
					$this->Cell(80, 5, '3.1 Carga horaria total (HT)', 0, 0, 'L');
					$this->Cell(0, 5, '356', 0, 1, 'L');
					$this->Cell(80, 5, '3.2 Total horas presenciales (THP)', 0, 0, 'L');
					$this->Cell(0, 5, utf8_decode('43'), 0, 1, 'L');
					$this->Cell(80, 5, '3.3 Total horas no presenciales (THNP)', 0, 0, 'L');
					$this->Cell(0, 5, '890', 0, 1, 'L');
					$this->Cell(80, 5, utf8_decode('3.4 Total créditos (1 crédito=40 horas)'), 0, 0, 'L');
					$this->Cell(0, 5, '22,5', 0, 1, 'L');
					$this->Ln(6);

					$this->Cell(0, 5, 'c) NOMINA DOCENTE', 0, 1, 'l');
					$this->SetFillColor(229, 229, 229);
					$this->SetFontSize(9);
					$y = $this->GetY();
					$this->Multicell(16, 4, utf8_decode('SIGLA - CÓDIGO'), 1, 'C', true);
					$x = 16 + $this->GetX();
					$this->SetXY($x, $y);
					$this->Cell(85, 8, utf8_decode('MÓDULOS'), 1, 0, 'C', true);
					$this->Cell(75, 8, 'DOCENTES', 1, 1, 'C', true);
					break;

				case 'VIRTUAL':

					break;
			}
		}
	}
}