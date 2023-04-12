<?php defined('BASEPATH') or exit('No direct script access allowed');

class ReporteFormularioDocente extends FPDF
{
    var $informacion_docente;
    var $formulario_emitido;
    var $widths;
    var $aligns;
    private $usuario;

    public function __construct($informacion_docente = NULL, $formulario_emitido = NULL)
    {
        parent::__construct();
        $this->usuario = autentificado();
        if (!$this->usuario) {
            $this->session->set_flashdata('danger', 'No cuenta con los permisos necesarios para realizar esta función.');
            redirect(base_url());
        }
        $this->informacion_docente = $informacion_docente;
        $this->formulario_emitido = $formulario_emitido;
        setlocale(LC_TIME, 'es_BO.utf8');
        $this->data['usuario'] = $this->usuario;
    }

    public function Header()
    {
        $this->Image(APPPATH . '../public_html/img/upea.png', 20, 8, 15, 'JPG');
        $this->Image(APPPATH . '../public_html/img/posgrado.png', 170, 8, 30, 11, 'PNG', '');
        $this->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('EdwardianScriptITC', 'I', 30);
        $this->Cell(0, 5, $this->epsilion_uft8('Universidad Pública de El Alto'), 0, 1, 'C');
        $this->ln(2);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(0, 1, $this->epsilion_uft8('Creada por Ley 2115 del 5 de Septiembre de 2000'), 0, 1, 'C');
        $this->Ln(2);
        $this->Cell(0, 1, $this->epsilion_uft8('Autónoma por Ley 2556 del 12 de Noviembre de 2003'), 0, 1, 'C');
        $this->Line(10, 26, 205, 26);
        $this->Ln(8);
        $this->SetFont('Times', 'I', 10);
        $this->SetXY(174, 18);
        $this->Cell(0, 4, 'FORM.REQ-DOC.DP/' . $this->formulario_emitido['tipo_formulario'] . '/' . str_pad($this->formulario_emitido['correlativo_formulario'], 4, "0", STR_PAD_LEFT), 0, 1, 'C');
        //$this->Cell(0, 20, '', 0, 1, 'R');
        $this->SetFont('Times', '', 8);
        $this->SetXY(174, 22);
        $this->Cell(0, 3, fecha_literal($this->formulario_emitido['fecha_emision_formulario'], 1), 0, 1, 'C');
        $this->Ln(1);
        //$this->Cell(0, 33, '', 0, 1, 'R');

        //$this->SetTextColor(37, 71, 106);
        //$this->SetFont('Times', '', 10);
        //$this->SetXY(100, 23);
        //$this->Cell(0, 3, $this->epsilion_uft8(' VºBº '), 0, 1, 'R');
    }

    public function ContenidoFormulariosDocente($lista_formacion_academica_posgrado, $lista_ejercicio_grado_SICOD, $lista_ejercicio_grado_docente_externo, $lista_ejercicio_docencia_posgrado, $lista_djalch_actividad_academica, $lista_djalch_actividad_laboral)
    {
        $this->SetTopMargin(10);
        $this->SetLeftMargin(10);
        $this->SetRightMargin(10);
        $this->SetAutoPageBreak(1, 20);
        $this->AddPage('P', 'Legal');
        $this->AliasNbPages();
        $this->SetFillColor(164, 176, 195);
        $this->SetLineWidth(0);
        /**TITULO DEL REPORTE */
        //$this->SetTitle('Formulario de Requisitos posgrado');
        //$this->SetSubject('Formulario de requisitos para docentes U.P.E.A. POSGRADO');
        $this->Ln(5);
        $this->SetTextColor(37, 71, 106);
        $this->SetFont('Times', 'BU', 12);
        $this->MultiCell(0, 5, $this->epsilion_uft8('FORMULARIO DE REQUISITOS PARA ADMISIÓN DE DOCENTE COORDINADOR TUTOR'), 0, 1, 'C');
        $this->MultiCell(0, 5, $this->epsilion_uft8('Y DOCENTE DE POSGRADO.'), 0, 1, 'C');
        $this->SetTextColor(0, 0, 0);
        $this->Ln(2);
        $this->SetFont('Times', 'I', 8);
        $this->MultiCell(0, 4, $this->epsilion_uft8('Son requisitos indispensables en la admisión de Docente Coordinador Tutor y Docente de Posgrado,  en base al Estatuto Organico de la UPEA,  Reglamento de Posgrado CAPITULO IX Régimen Docente, Reglamento Administrativo de Admisión Docente de Posgrado, Resolución del Honorable Concejo de CEFORPI 16/2018 de aprobación del Archivo Docente y Formulario de Requisitos para Admisión del Docente Coordinador Tutor y Docentes de Posgrado de la Universidad Pública de El Alto.'), 0, 1, 'J');
        $this->MultiCell(0, 4, $this->epsilion_uft8('(Válido únicamente para Docentes de Posgrado).'), 0, 1, 'J');
        //$this->MultiCell(0, 3, $this->epsilion_uft8('Aprobado de acuerdo a la Resolución del Honorable Consejo Universitario N°.../2018, Resolución Rectoral N°../2018, Resolución Vicerrectoral N°.../2018. '), 0, 1, 'J');

        /**
         * I. DATOS PERSONALES
         */
        $informacion_docente = $this->informacion_docente;
        //print_r($informacion_docente);exit;
        $this->SetFont('Times', 'BI', 10);
        $this->Cell(120, 5, $this->epsilion_uft8('I.- DATOS PERSONALES (Archivo Docente - POSGRADO).'), 0, 1, 'A');
        $this->SetFont('Times', 'I', 8);

        $xx = 0;
        $bs = 0;
        $x = 0;
        $num = "0";
        $can = strlen($informacion_docente->paterno);
        $es = $informacion_docente->paterno;
        $es = substr($es, strlen($es) - 1, strlen($es));
        $dad = $informacion_docente->nombre;
        $dad = substr($dad, 0, strlen($dad) - (strlen($dad) - 1));
        $ti = $informacion_docente->ci;
        $ti = substr($ti, 0, strlen($ti) - (strlen($ti) - 1));
        $this->SetTextColor(150, 150, 102);
        //$this->Cell(0, 1, 'POSGRADO-PSG' . $can . $ti . $dad . $es . '_' . $xx . '/' . $num, 0, 1, 'R');
        $this->Cell(0, 1, 'POSGRADO-PSG' . '/' . $informacion_docente->id_persona, 0, 1, 'R');
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Times', 'I', 8);
        $this->Cell(5, 5, '', 0, 0, 'L');
        $this->Cell(30, 5, 'Nombres y Apellidos', 0, 0, 'A');
        $this->Cell(5, 5, ':', 0, 0, 'A');
        $this->Cell(75, 5, $this->epsilion_uft8(strtoupper($informacion_docente->nombre) . ' ' . strtoupper($informacion_docente->paterno) . ' ' . strtoupper($informacion_docente->materno)), 0, 0, 'A');
        $this->Ln(5);
        $this->Cell(5, 5, '', 0, 0, 'L');
        $this->Cell(30, 5, $this->epsilion_uft8('Cédula de Identidad'), 0, 0, 'A');
        $this->Cell(5, 5, ':', 0, 0, 'A');
        $this->Cell(75, 5, $informacion_docente->ci . ' ' . $informacion_docente->expedido, 0, 0, 'A');
        $this->Ln(5);
        $this->Cell(5, 5, '', 0, 0, 'L');
        $this->Cell(30, 5, 'Fecha Nacimiento', 0, 0, 'A');
        $this->Cell(5, 5, ':', 0, 0, 'A');
        $this->Cell(75, 5, $informacion_docente->fecha_nacimiento, 0, 0, 'A');
        $this->Cell(30, 5, 'Telf. Referencia: ', 0, 0, 'A');
        $this->Cell(75, 5, (empty($informacion_docente->celular) ? $informacion_docente->telefono : $informacion_docente->celular), 0, 0, 'A');
        $this->SetTextColor(37, 71, 106);
        $this->SetFont('Times', 'I', 8);
        $this->Ln(-5);
        $this->Cell(0, 2, $this->epsilion_uft8(' Sello Seco '), 0, 1, 'R');
        $this->Cell(0, 2, $this->epsilion_uft8(' Posgrado '), 0, 1, 'R');
        $this->Ln(1);
        $this->SetTextColor(0, 51, 102);

        /**
         * II. FORMACION ACADEMICA DE POSGRADO
         */
        $this->SetTextColor(0, 0, 0);
        $this->Ln(7);
        $this->SetFont('Times', 'BI', 10);
        $this->Cell(120, 5, $this->epsilion_uft8('II. FORMACIÓN ACADÉMICA POSGRADO (Archivo Docente - POSGRADO).'), 0, 1, 'A');
        $this->SetFont('Times', 'I', 8);
        $this->MultiCell(0, 4, $this->epsilion_uft8('De acuerdo al Reglamento del Régimen Docente Artículo 26 Inciso 1 (Diploma Académico), Inciso 2 (Título en Provisión Nacional), Inciso 3 (Profesional Titulado de una Universidad Pública), Inciso 4 (Experiencia Profesional minima de dos años), Inciso 6 (Curso de Posgrado). Como sigue:'), 0, 1, 'J');
        $this->SetFont('Times', '', 8);
        $this->Cell(4, 5, $this->epsilion_uft8('N°'), 1, 0, 'C', true);
        $this->Cell(16, 5, $this->epsilion_uft8('Título'), 1, 0, 'C', true);
        $this->Cell(34, 5, $this->epsilion_uft8('Tipo de Título'), 1, 0, 'C', true);
        $this->Cell(20, 5, $this->epsilion_uft8('Número'), 1, 0, 'C', true);
        $this->Cell(23, 5, $this->epsilion_uft8('Fecha Emisión'), 1, 0, 'C', true);
        $this->Cell(18, 5, $this->epsilion_uft8('Procedencia'), 1, 0, 'C', true);
        $this->Cell(72, 5, $this->epsilion_uft8('Descripción de título'), 1, 0, 'C', true);
        $this->Cell(10, 5, $this->epsilion_uft8('Valor'), 1, 1, 'C', true);
        $this->SetFont('Arial', '', 6);
        //print_r($lista_formacion_academica_posgrado);exit;
        $tiempo_gestion = 0;
        $this->SetWidths(array(4, 16, 34, 20, 23, 18, 72, 10));
        $this->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
        if (!empty($lista_formacion_academica_posgrado)) {
            $fap = 1;
            foreach ($lista_formacion_academica_posgrado as $formacion_academica_posgrado) {
                if ($formacion_academica_posgrado->id_tipo_documento_academico == 2  && $formacion_academica_posgrado->id_grado_academico == 6) {
                    $datetime1 = date_create('now');
                    $datetime2 = date_create($formacion_academica_posgrado->fecha_emision);
                    $interval = date_diff($datetime1, $datetime2);
                    $tiempo_gestion = ($interval->format('%y') > $tiempo_gestion ? $interval->format('%y') : $tiempo_gestion);
                }
                $this->SetFont('Arial', '', 5);
                $this->Row(array($fap++, $this->epsilion_uft8($formacion_academica_posgrado->descripcion_grado), $this->epsilion_uft8($formacion_academica_posgrado->tipo), $this->epsilion_uft8($formacion_academica_posgrado->numero_titulo), $this->epsilion_uft8($formacion_academica_posgrado->fecha_emision), $this->epsilion_uft8($formacion_academica_posgrado->abreviatura_unidad_academica), $this->epsilion_uft8($formacion_academica_posgrado->descripcion_grado_academico), $this->epsilion_uft8('Bs 40.-')));
                $bs += 40;
            }
        } else {
            //$this->Ln();
            $this->Cell(197, 8, 'No se encontro registros sobre los titulos profesionales', 1, 1, 'C');
        }
        //$this->Ln();
        $this->Cell(210, 5, $this->epsilion_uft8('A la fecha, cuenta con ' . $tiempo_gestion . ' años de experiencia profesional, contados a partir de la extensión del Título en Provisión Nacional a nivel licenciatura.'), 0, 1, 'L');

        /**
         * III. CURRICULUM VITAE
         */
        $this->Ln(3);
        $this->SetFont('Times', 'BI', 10);
        $this->Cell(120, 5, 'III. CURRICULUM VITAE "Se muestra de acuerdo a Archivo Docente"', 0, 1, 'A');
        $this->SetFont('Times', 'I', 7);
        $this->MultiCell(0, 4, 'Art. 26 Inc. 5) e Instructivo Vicerrectoral VCR/INST/51/2014', 0, 1, 'J');
        $this->SetFont('Times', 'I', 8);
        $this->MultiCell(0, 4, $this->epsilion_uft8('En base al formato de Hoja de Vida se clasifican en diferentes  partes de las cuales se muestran en el presente formulario de requisitos. '), 0, 1, 'J');

        /**
         * IV. EJERCICIO DE LA DOCENCIA DE GRADO
         */
        $this->SetFont('Times', 'BI', 10);
        $this->Ln(3);
        $this->Cell(120, 5, $this->epsilion_uft8('IV. EJERCICIO DE LA DOCENCIA DE GRADO  (Vicerrectorado)'), 0, 1, 'A');
        $this->SetFont('Times', 'I', 8);
        $this->MultiCell(0, 3, $this->epsilion_uft8('Resolución del Honorable Consejo Universitario 075/2017.'), 0, 1, 'J');
        $this->SetFont('Times', 'I', 4.6);
        $this->Cell(0, 3, $this->epsilion_uft8('Sistema Integrado de POSGRADO - PSG'), 0, 1, 'R');
        $this->Ln(-3);
        $this->SetTextColor(0, 51, 102);
        /**SECCION DE SISTEMA DE CONTROL */
        $this->Ln(3);
        $this->SetFont('Times', 'I', 7);
        $this->Cell(30, 5, 'Sistema Control Docente', 0, 1, 'L', true);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Times', '', 8);
        $this->Cell(6, 5, 'N', 1, 0, 'C', true);
        $this->Cell(13, 5, $this->epsilion_uft8('Gestión'), 1, 0, 'C', true);
        $this->Cell(34, 5, $this->epsilion_uft8('Sede'), 1, 0, 'C', true);
        $this->Cell(130, 5, $this->epsilion_uft8('Descripción'), 1, 0, 'C', true);
        $this->Cell(15, 5, $this->epsilion_uft8('Tiempo'), 1, 1, 'C', true);
        $this->SetFont('Times', '', 6.5);
        $x = 1;
        $totalTiempo = 0;
        $casoRegis = '';
        $this->SetWidths(array(6, 13, 34, 130, 15));
        $this->SetAligns(array('C', 'C', 'C', 'C', 'C'));
        if (!empty($lista_ejercicio_grado_SICOD)) {
            foreach ($lista_ejercicio_grado_SICOD as $docencia) {
                //var_dump($docencia);exit();
                //$this->Ln();
                $this->Row(array($x++, $this->epsilion_uft8($docencia->gestion), $this->epsilion_uft8($docencia->sede), $this->epsilion_uft8($docencia->descripcion), intval($docencia->meses) . ' Meses'));
                //$this->Cell(3, 5, $x++, 1, 0, 'C');
                //$this->Cell(15, 5, $this->epsilion_uft8($docencia->gestion), 1, 0, 'C');
                //$this->Cell(35, 5, $this->epsilion_uft8($docencia->sede), 1, 0, 'L');
                ////$this->Cell(130, 5, $this->epsilion_uft8($docencia->periodo . ' Sigla ' . $docencia->sigla_asignatura . '/' . $docencia->tipo_categoria_rgs), 1, 0, 'L');
                //$this->Cell(130, 5, $this->epsilion_uft8($docencia->descripcion), 1, 0, 'L');
                ////$this->Cell(15, 5, $this->epsilion_uft8($docencia->tiempogestion), 1, 1, 'C');
                //$this->Cell(15, 5, intval($docencia->meses), 1, 1, 'C');
                $totalTiempo += intval($docencia->meses);
            }
        } else {
            $this->Cell(198, 8, 'No se encontro registros sobre la experiencia de docencia en Sistema', 1, 1, 'C');
        }
        $this->Cell(183, 5, 'TOTAL TIEMPO MESES (Experiencia en Docencia Pre-Grado)', 1, 0, 'C');
        $this->Cell(15, 5, $totalTiempo . ' Meses', 1, 1, 'C');

        /** SECCION DE DOCENTE EXTERNO */
        $this->Ln();
        $this->SetFont('Times', '', 8);
        $this->Cell(80, 5, $this->epsilion_uft8('DOCENCIA EXTERNA'), 0, 1, 'L', true);
        $this->SetFont('Times', '', 10);
        $this->Cell(3, 5, $this->epsilion_uft8('N'), 1, 0, 'C', true);
        $this->Cell(20, 5, $this->epsilion_uft8('Universidad'), 1, 0, 'C', true);
        $this->Cell(50, 5, $this->epsilion_uft8('Area/Facultad/Carrera'), 1, 0, 'C', true);
        $this->Cell(50, 5, $this->epsilion_uft8('Area Docencia / Asignatura'), 1, 0, 'C', true);
        $this->Cell(23, 5, $this->epsilion_uft8('Carga Horaria'), 1, 0, 'C', true);
        $this->Cell(20, 5, $this->epsilion_uft8('Inicio'), 1, 0, 'C', true);
        $this->Cell(20, 5, $this->epsilion_uft8('Conclusión'), 1, 0, 'C', true);
        $this->Cell(12, 5, $this->epsilion_uft8('Tiempo'), 1, 1, 'C', true);
        $this->SetFont('Times', '', 6.5);
        //print_r($lista_ejercicio_grado_docente_externo);exit;
        $totalTiempo = 0;
        if (!empty($lista_ejercicio_grado_docente_externo)) {
            $x = 0;
            $gestion = '';
            $ver = '';
            $lgdde = 1;
            foreach ($lista_ejercicio_grado_docente_externo as $ejercicio_grado_docente_externo) {
                //$this->Ln();
                $this->Cell(3, 5, $this->epsilion_uft8($lgdde++), 1, 0, 'C');
                $this->Cell(20, 5, $this->epsilion_uft8($ejercicio_grado_docente_externo->abreviatura), 1, 0, 'C');
                $this->Cell(50, 5, $this->epsilion_uft8($ejercicio_grado_docente_externo->descripcion_docencia_externo), 1, 0, 'C');
                $this->Cell(50, 5, $this->epsilion_uft8($ejercicio_grado_docente_externo->area_docencia_docente_externo), 1, 0, 'C');
                $this->Cell(23, 5, $this->epsilion_uft8($ejercicio_grado_docente_externo->carga_horaria), 1, 0, 'C');
                $this->Cell(20, 5, $this->epsilion_uft8($ejercicio_grado_docente_externo->fecha_inicio_docencia), 1, 0, 'C');
                $this->Cell(20, 5, $this->epsilion_uft8($ejercicio_grado_docente_externo->fecha_fin_docencia), 1, 0, 'C');
                $datetime1 = date_create($ejercicio_grado_docente_externo->fecha_inicio_docencia);
                $datetime2 = date_create($ejercicio_grado_docente_externo->fecha_fin_docencia);
                $interval = date_diff($datetime1, $datetime2);
                $totalTiempo += intval($interval->format('%m'));
                $this->Cell(12, 5, $this->epsilion_uft8($interval->format('%m Meses')), 1, 1, 'C');
            }
        } else {
            $this->Cell(198, 8, 'No se encontro registros sobre la experiencia de docencia anteriores o en otras Universidades', 1, 1, 'C');
        }
        $this->Cell(186, 5, 'TOTAL TIEMPO MESES (Experiencia Docencia)', 1, 0, 'C');
        $this->Cell(12, 5, $totalTiempo . ' Meses', 1, 1, 'C');

        /**
         * V. EJERCICIO DE LA DOCENCIA DE POSGRADO
         */
        $this->Ln(3);
        $this->SetFont('Times', 'BI', 10);
        //if($form->id_tipo_formulario=='1'){
        $this->Cell(0, 4, $this->epsilion_uft8('V. EJERCICIO DE LA DOCENCIA DE POSGRADO (Archivo Posgrado).'), 0, 1, 'J');
        $this->SetFont('Times', 'I', 8);
        $this->Cell(0, 4, $this->epsilion_uft8('Resolución HCU 075/2017'), 0, 1, 'J');
        //$this->Ln(3);
        $this->SetFont('Times', '', 10);
        $this->Cell(3, 5, $this->epsilion_uft8('N'), 1, 0, 'C', true);
        $this->Cell(20, 5, $this->epsilion_uft8('Gestión'), 1, 0, 'C', true);
        $this->Cell(50, 5, $this->epsilion_uft8('Área/Facultad/Carrera'), 1, 0, 'C', true);
        $this->Cell(110, 5, $this->epsilion_uft8('Descripción'), 1, 0, 'C', true);
        $this->Cell(15, 5, $this->epsilion_uft8('Horas'), 1, 1, 'C', true);

        $this->SetFont('Times', '', 6.5);
        //print_r($lista_ejercicio_docencia_posgrado);exit;
        if (!empty($lista_ejercicio_docencia_posgrado)) {
            $x = 0;
            $totalTiempoPg = 0;
            $gestion = '';
            $ver = '';
            $edp = 1;
            foreach ($lista_ejercicio_docencia_posgrado as $ejercicio_docencia_posgrado) {
                //$this->Ln();
                $this->Cell(3, 5, $this->epsilion_uft8($edp++), 1, 0, 'C');
                $this->Cell(20, 5, $this->epsilion_uft8($ejercicio_docencia_posgrado->gestion), 1, 0, 'C');
                $this->Cell(50, 5, $this->epsilion_uft8($ejercicio_docencia_posgrado->nombre_unidad), 1, 0, 'C');
                $this->CellFitSpace(110, 5, $this->epsilion_uft8($ejercicio_docencia_posgrado->nombre_programa), 1, 0, 'C');
                $this->Cell(15, 5, $this->epsilion_uft8($ejercicio_docencia_posgrado->horas_academicas), 1, 1, 'C');
                $totalTiempoPg += intval($ejercicio_docencia_posgrado->horas_academicas);
            }
            $this->Cell(183, 5, 'TOTAL HORAS ACADEMICAS (Experiencia Docencia Posgrado)', 1, 0, 'C');
            $this->Cell(15, 5, $totalTiempoPg, 1, 1, 'C');
        } else {
            $this->Cell(198, 8, 'No se encontro registros sobre docencia en Sistema de Posgrado.', 1, 1, 'C');
        }

        /**
         * VI. DECLARACION JURADA DE ACTIVIDAD LABORAL Y CARGA HORARIA
         */
        $this->Ln(3);
        $this->SetFont('Times', 'BI', 10);
        //if($form->id_tipo_formulario=='1'){
        $this->MultiCell(0, 4, $this->epsilion_uft8('VI. DECLARACION JURADA DE ACTIVIDAD LABORAL Y CARGA HORARIA.'), 0, 1, 'J');
        $bs = $bs + 10;

        $this->SetFont('Times', 'I', 8);
        $this->MultiCell(0, 4, 'Articulo 26 Inciso 10) Resolución HCU 021/2009', 0, 1, 'J');
        //$this->Cell(5, 10, '', 0, 0, 'C');
        $this->MultiCell(0, 4, $this->epsilion_uft8('A tiempo  de presentar mi postulación, JURO que la presente informacion es cierta y evidente, declaro no tener ninguna incompatibilidad con la carga horaria que impida el óptimo desarrollo de las actividades académicas.   Es cuanto firmo, en señal de constancia legal, aceptando que este documento pueda ser usado, con toda válidez, ante las instancias de gobierno universitario de la UPEA, la Comisión Sumarial Universitaria y el Tribunal de Procesos de la UPEA.'), 0, 1, 'J');
        $this->Ln(3);
        /**ACTIVIDAD ACADEMICA */
        $this->SetFont('Times', '', 10);
        $this->Cell(80, 5, $this->epsilion_uft8('ACTIVIDAD ACADÉMICA'), 0, 1, 'L', true);
        $this->Cell(3, 5, $this->epsilion_uft8('N'), 1, 0, 'C', true);
        $this->Cell(42, 5, $this->epsilion_uft8('Institución'), 1, 0, 'C', true);
        $this->Cell(30, 5, $this->epsilion_uft8('Función'), 1, 0, 'C', true);
        $this->Cell(25, 5, $this->epsilion_uft8('Materia'), 1, 0, 'C', true);
        $this->Cell(15, 5, $this->epsilion_uft8('Hrs/mes'), 1, 0, 'C', true);
        $this->Cell(70, 5, $this->epsilion_uft8('Descripción'), 1, 0, 'C', true);
        $this->Cell(13, 5, $this->epsilion_uft8('Horario'), 1, 1, 'C', true);
        $this->SetFont('Times', '', 6.5);
        //print_r($lista_djalch_actividad_academica);exit;
        if (!empty($lista_djalch_actividad_academica)) {
            //$x=0;$totalTiempo=0; $gestion=''; $ver='';
            $aa = 1;
            foreach ($lista_djalch_actividad_academica as $djalch_actividad_academica) {
                //$this->Ln();
                $this->Cell(3, 5, $this->epsilion_uft8($aa++), 1, 0, 'C');
                $this->Cell(42, 5, $this->epsilion_uft8($djalch_actividad_academica->institucion), 1, 0, 'C');
                $this->Cell(30, 5, $this->epsilion_uft8($djalch_actividad_academica->cargo), 1, 0, 'C');
                $this->Cell(25, 5, $this->epsilion_uft8($djalch_actividad_academica->materia), 1, 0, 'C');
                $this->Cell(15, 5, $this->epsilion_uft8($djalch_actividad_academica->horas_mes), 1, 0, 'C');
                $this->Cell(70, 5, $this->epsilion_uft8($djalch_actividad_academica->descripcion_experiencia_profesional), 1, 0, 'C');
                $this->Cell(13, 5, $this->epsilion_uft8($djalch_actividad_academica->horario), 1, 1, 'C');
            }
        } else {
            //$this->Cell(198,8,'No se encontro registros sobre docencia en Sistema de Posgrado.',1,1,'C');
            $this->Cell(3, 7, $this->epsilion_uft8('1'), 1, 0, 'C');
            $this->Cell(42, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(30, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(25, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(15, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(70, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(13, 7, $this->epsilion_uft8(''), 1, 1, 'C');

            $this->Cell(3, 7, $this->epsilion_uft8('2'), 1, 0, 'C');
            $this->Cell(42, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(30, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(25, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(15, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(70, 7, $this->epsilion_uft8(''), 1, 0, 'C');
            $this->Cell(13, 7, $this->epsilion_uft8(''), 1, 1, 'C');
        }

        /**ACTIVIDAD LABORAL */
        $this->Ln(3);
        $this->SetFont('Times', '', 10);
        $this->Cell(80, 5, $this->epsilion_uft8('ACTIVIDAD LABORAL'), 0, 1, 'L', true);
        $this->Cell(3, 5, $this->epsilion_uft8('N'), 1, 0, 'C', true);
        $this->Cell(42, 5, $this->epsilion_uft8('Institución'), 1, 0, 'C', true);
        $this->Cell(30, 5, $this->epsilion_uft8('Cargo'), 1, 0, 'C', true);
        $this->Cell(25, 5, $this->epsilion_uft8('Descripción'), 1, 0, 'C', true);
        $this->Cell(15, 5, $this->epsilion_uft8('Horario'), 1, 0, 'C', true);
        $this->Cell(70, 5, $this->epsilion_uft8('Descripción'), 1, 0, 'C', true);
        $this->Cell(13, 5, $this->epsilion_uft8('Horario'), 1, 1, 'C', true);
        $this->SetFont('Times', '', 6.5);
        //print_r($lista_djalch_actividad_laboral);exit;
        if (!empty($lista_djalch_actividad_laboral)) {
            //$x=0;$totalTiempo=0; $gestion=''; $ver='';
            $al = 1;
            foreach ($lista_djalch_actividad_laboral as $djalch_actividad_laboral) {
                //$this->Ln();
                $this->Cell(3, 5, $al++, 1, 0, 'C');
                $this->Cell(42, 5, $this->epsilion_uft8($djalch_actividad_laboral->institucion), 1, 0, 'C');
                $this->Cell(30, 5, $this->epsilion_uft8($djalch_actividad_laboral->cargo), 1, 0, 'C');
                $this->Cell(25, 5, $this->epsilion_uft8($djalch_actividad_laboral->descripcion_experiencia_profesional), 1, 0, 'C');
                $this->Cell(15, 5, $this->epsilion_uft8($djalch_actividad_laboral->horario), 1, 0, 'C');
                $this->Cell(70, 5, '---', 1, 0, 'C');
                $this->Cell(13, 5, '---', 1, 1, 'C');
            }
        } else {
            $this->Cell(3, 7, '1', 1, 0, 'C');
            $this->Cell(42, 7, '', 1, 0, 'C');
            $this->Cell(30, 7, '', 1, 0, 'C');
            $this->Cell(25, 7, '', 1, 0, 'C');
            $this->Cell(15, 7, '', 1, 0, 'C');
            $this->Cell(70, 7, '', 1, 0, 'C');
            $this->Cell(13, 7, '', 1, 1, 'C');

            $this->Cell(3, 7, '2', 1, 0, 'C');
            $this->Cell(42, 7, '', 1, 0, 'C');
            $this->Cell(30, 7, '', 1, 0, 'C');
            $this->Cell(25, 7, '', 1, 0, 'C');
            $this->Cell(15, 7, '', 1, 0, 'C');
            $this->Cell(70, 7, '', 1, 0, 'C');
            $this->Cell(13, 7, '', 1, 1, 'C');
        }
        $this->MultiCell(0, 4, $this->epsilion_uft8('COSTO:10Bs.-'), 0, 1, 'R');

        /**VII. DECLARACION JURADA DE LA NO EXISTENCIA DE PROCESOS ADMINISTRATIVOS CONTRA LA UNIVERSIDAD */
        $this->Ln(3);
        $this->SetFont('Times', 'BI', 10);
        $this->Cell(120, 5, $this->epsilion_uft8('VII. DECLARACION JURADA DE LA NO EXISTENCIA DE PROCESOS ADMINISTRATIVOS CONTRA LA UNIVERSIDAD '), 0, 1, 'A');
        $this->SetFont('Times', 'I', 8);
        $this->MultiCell(0, 4, $this->epsilion_uft8('Resolución CEFORPI 12/2016'), 0, 1, 'J');
        $this->MultiCell(0, 4, $this->epsilion_uft8('Declaro, en honor a la verdad, bajo juramento, no tener procesos administrativos contra de la Universidad Pública de El Alto. Esta declaración la hago con conocimiento de las sanciones administrativas y penales a las cuales me haría merecedor en caso de jurar en falso, en el marco de las leyes nacionales en vigencia.'), 0, 1, 'J');
        $this->SetFont('Times', 'I', 8);
        $this->Cell(5, 10, '', 0, 0, 'C');
        $this->MultiCell(0, 4, $this->epsilion_uft8('COSTO:50Bs.-'), 0, 1, 'R');
        $bs = $bs + 50;

        /**VIII. DECLARACION JURADA DE INCOMPATIBILIDAD*/
        $this->Ln(3);
        $this->SetFont('Times', 'BI', 10);
        $this->Cell(120, 5, $this->epsilion_uft8('VIII. DECLARACION JURADA DE INCOMPATIBILIDAD'), 0, 1, 'A');
        $this->SetFont('Times', 'I', 8);
        $this->MultiCell(0, 4, $this->epsilion_uft8('Reglamento de Posgrado Art.67'), 0, 1, 'J');
        $this->MultiCell(0, 4, $this->epsilion_uft8('Declaro, en honor a la verdad, bajo juramento, no tener incompatibilidad con el artículo 67 del Reglamento de Posgrado del Estatuto Orgánico de la Universidad Pública de El Alto.  Esta declaración la hago con conocimiento de las sanciones administrativas y penales a las cuales me haría merecedor en caso de jurar en falso,  en el marco de las leyes nacionales en vigencia.'), 0, 1, 'J');
        $this->SetFont('Times', 'I', 8);
        $this->Cell(5, 10, '', 0, 0, 'C');
        $this->MultiCell(0, 4, $this->epsilion_uft8('COSTO:20Bs.-'), 0, 1, 'R');
        $bs = $bs + 20;

        /**IX. DECLARACION JURADA VOLUNTARIA */
        $this->Ln(3);
        $this->SetFont('Times', 'BI', 10);
        $this->Cell(120, 5, $this->epsilion_uft8('IX. DECLARACION JURADA VOLUNTARIA'), 0, 1, 'A');
        $this->SetFont('Times', 'I', 8);
        //$this->MultiCell(0,4,$this->epsilion_uft8('Resolucion HCU 021/2009'),0,'J');
        //$this->Cell(5, 10, '-', 0, 0, 'C');
        $this->MultiCell(0, 4, $this->epsilion_uft8('Se denomina Declaración Jurada Voluntaria a la manifestacion personal, sea esta verbal o escrita, donde se asegura la veracidad de la información.  Como consecuencia se presume como cierto lo señalado por el declarante hasta que se pueda acreditar lo contrario.'), 0, 1, 'J');
        //$this->Cell(5, 10, '-', 0, 0, 'C');
        $this->MultiCell(0, 4, $this->epsilion_uft8('En el numeral 4° del artículo 3° de la Convención Interamericana contra la corrupción, suscrita por el Estado Boliviano en Caracas, Venezuela el 29 de marzo de 1996, y ratificada por  Ley Nº 1743 de 15 de enero de 1997, establece entre las medidas preventivas que los estados adoptarán la implantación de sistemas para la Declaraciones Juradas, por parte de las personas que desempeñan funciones publicas y administrativas.'), 0, 1, 'J');
        //$this->Cell(5, 10, '-', 0, 0, 'C');
        $this->MultiCell(0, 4, $this->epsilion_uft8('Por lo que de forma voluntaria y consciente, sin que exista presión alguna, declaro que toda la información y documentación presentada dentro del trámite administrativo para obtener el formulario de requisitos para admisión de docentes de la presente gestión son ciertos y verdaderos. Caso contrario, asumiré la responsabilidad emergente ante las autoridades competentes por ley, deslindando responsabilidad en favor de los funcionarios de la UPEA en cuanto a cualquier daño emergente.'), 0, 1, 'J');
        $this->Ln(3);
        $this->Cell(0, 0.1, '', 1, 1);
        $this->SetFont('Times', 'BI', 9);
        $this->MultiCell(0, 5, $this->epsilion_uft8('Mediante el presente formulario de requisitos para admisión de Docente Coordinador Tutor y Docente de Posgrado, doy constancia y fe de los datos llenados e impresos.'), 0, 1, 'J');

        /**SECCION DE FIRMA */
        //$this->Ln(-6);
        //$this->Ln(-20);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Times', 'BI', 10);
        $this->Ln(20);
        //	$this->Cell(180,3,'..............................................',0,1,'C');
        $this->Cell(180, 3, $this->epsilion_uft8('Firma del Interesado'), 0, 1, 'C');
        $this->Cell(180, 3, $this->epsilion_uft8($informacion_docente->ci . ' ' . $informacion_docente->expedido), 0, 1, 'C');
        $this->Cell(180, 3, $this->epsilion_uft8($informacion_docente->nombre . ' ' . $informacion_docente->paterno . ' ' . $informacion_docente->materno), 0, 1, 'C');
        $this->Image(APPPATH . '../public_html/img/posgrado.png', 170, 8, 30, 11, 'PNG', '');
        $this->Ln(3);
        $this->SetFont('Times', 'BI', 9);
        $this->MultiCell(0, 5, $this->epsilion_uft8('Los montos descritos anteriormente, definidos de acuerdo a Reglamento del Régimen Docente y Resoluciones del Honorable Concejo Universitario, Reglamento de Posgrado, Resoluciones de CEFORPI, alcanzan un monto total de Bs ' . $bs . '.-(' . numero_literal($bs) . ')'), 0, 1, 'J');
        $this->MultiCell(0, 5, $this->epsilion_uft8('Dirección Administrativa Financiera; Unidad de Tesorería y Crédito  Público de la Universidad Pública de El Alto.'), 0, 1, 'J');

        $this->SetTextColor(37, 71, 106);
        $this->SetFont('Times', 'I', 9);
        //$this->Ln(15);
        //$this->Cell(180, 3, $this->epsilion_uft8('Timbres   Sello_Tesoreria    Timbres    Sello_Tesoreria   Timbres   Sello_Tesoreria    Timbres   Sello_Tesoreria    Timbres      Sello_Tesoreria       '), 0, 1, 'C');
        $this->Cell(180, 3, $this->epsilion_uft8(''), 0, 1, 'C');
        $this->SetTextColor(37, 71, 106);
        $this->SetFont('Times', '', 8);
        $this->Ln(30);
        $this->Cell(0, 3, $this->epsilion_uft8('Sello de Posgrado'), 0, 1, 'L');
        $this->Ln(-6);
        $this->Cell(0, 3, $this->epsilion_uft8('Sello y Firma'), 0, 1, 'R');
        $this->Cell(0, 3, $this->epsilion_uft8('de Director de Posgrado'), 0, 1, 'R');
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Times', 'I', 9);
        $this->SetY(-38);
        $this->SetX(174);
        //$this->Image('http://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=' . urlencode('FORM.REQ-DOC. DP' . '/' . str_pad('003', 3, "0", STR_PAD_LEFT)) . '&.png', 170, 293, 32, 32);
        $this->Cell(0, 4, 'FORM.REQ-DOC.DP/' . $this->formulario_emitido['tipo_formulario'] . '/' . str_pad($this->formulario_emitido['correlativo_formulario'], 4, "0", STR_PAD_LEFT), 0, 1, 'C');
        //$this->Cell(0, 4, 'FORM.REQ-DOC. DP' . '/' . str_pad('003', 3, "0", STR_PAD_LEFT), 0, 1, 'R');
        $this->SetX(174);
        $this->Cell(0, 4, fecha_literal($this->formulario_emitido['fecha_emision_formulario'], 1), 0, 1, 'C');
        $this->SetFont('Times', 'I', 7);
        $this->MultiCell(0, 3, $this->epsilion_uft8('NOTA.- El presente formulario queda nulo si en él se encontrase modificaciones, alteraciones, enmiendas, raspaduras y correcciones.'), 0, 1, 'J');
        $this->Cell(0, 2, $this->epsilion_uft8('Se expide el presente Formulario sólo para uso interno de la UPEA, válido para el proceso de admisión Docente Posgrado, con vigencia de 90 dias calendario.'), 0, 1);
        $this->Ln(1);
        $this->Cell(0, 3, $this->epsilion_uft8('Usuario: ' . '___/' . $this->usuario['nombre_completo']), 0, 1, 'L');
        $this->Output('formulario003' . '' . '.pdf', 'I');
    }


    public function Footer()
    {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 6);
        $this->Line(10, 335, 208, 335);
        $this->Line(10, 336, 208, 336);
        //$this->Cell(90, 5, $this->epsilion_uft8('   ') . $this->PageNo() . $this->epsilion_uft8(' Página {nb}'), 0, 0, 'C');
        $this->Cell(66, 5, $this->epsilion_uft8('Posgrado CEFORPI UPEA'), 0, 0, 'L');
        $this->Cell(66, 5, $this->epsilion_uft8(strftime("%d de %B, %Y") . ' Hrs: ' . date("H:i:s") . ' ©PSG'), 0, 0, 'C');
        $this->Cell(66, 5, $this->epsilion_uft8('Pag. ') . $this->PageNo() . $this->epsilion_uft8('/{nb}'), 0, 0, 'R');
    }

    function epsilion_uft8($valor)
    {
        return utf8_decode($valor);
    }

    function MultiCell($w, $h, $txt, $border = 0, $ln = 0, $align = 'J', $fill = false)
    {
        if ($ln == 0) {
            $y = $this->GetY();
            $x = $this->GetX();
        }
        // Salida de texto con saltos de línea automáticos o explícitos.
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 1 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;
        $b = 0;
        if ($border) {
            if ($border == 1) {
                $border = 'LTRB';
                $b = 'LRT';
                $b2 = 'LR';
            } else {
                $b2 = '';
                if (strpos($border, 'L') !== false)
                    $b2 .= 'L';
                if (strpos($border, 'R') !== false)
                    $b2 .= 'R';
                $b = (strpos($border, 'T') !== false) ? $b2 . 'T' : $b2;
            }
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $ns = 1;
        $nl = 0;
        while ($i < $nb) {
            // Consigue el siguiente caracter
            $c = $s[$i];
            if ($c == "\n") {
                //Salto de línea explícito
                if ($this->ws > 1) {
                    $this->ws = 1;
                    $this->_out('0 Tw');
                }
                $this->Cell($w, $h, substr($s, $j, $i - $j), $b, 1, $align, $fill);
                $i++;
                $sep = -1;
                $j = 0;
                $l = 0;
                $ns = 1;
                $nl++;
                if ($border && $nl == 1)
                    $b = $b2;
                continue;
            }
            if ($c == '') {
                $sep = $i;
                $ls = $l;
                $ns++;
            }
            $l += $cw[$c];
            if ($l > $wmax) {
                // Salto de línea automático
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                    if ($this->ws > 0) {
                        $this->ws = 0;
                        $this->_out('0 Tw');
                    }
                    $this->Cell($w, $h, substr($s, $j, $i - $j), $b, 2, $align, $fill);
                } else {
                    if ($align == 'J') {
                        $this->ws = ($ns > 1) ? ($wmax - $ls) / 10 * $this->FontSize / ($ns - 1) : 0;
                        $this->_out(sprintf('%.3F Tw', $this->ws * $this->k));
                    }
                    $this->Cell($w, $h, substr($s, $j, $sep - $j), $b, 2, $align, $fill);
                    $i = $sep + 1;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $ns = 0;
                $nl++;
                if ($border && $nl == 1)
                    $b = $b2;
            } else
                $i++;
        }
        // Última parte
        if ($this->ws > 0) {
            $this->ws = 0;
            $this->_out('0 Tw');
        }
        if ($border && strpos($border, 'B') !== false)
            $b .= 'B';
        $this->Cell($w, $h, substr($s, $j, $i - $j), $b, 2, $align, $fill);
        $this->x = $this->lMargin;
        //
        if ($ln == 0) {
            $this->SetXY($x + $w, $y);
        }
    }

    //FUNCION PARA AJUSTAR TEXTO A UNA CELDA
    function CellFitSpace($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $this->CellFit($w, $h, $txt, $border, $ln, $align, $fill, $link, false, false);
    }

    function CellFit($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '', $scale = false, $force = true)
    {
        //Get string width
        $str_width = $this->GetStringWidth($txt);

        //Calculate ratio to fit cell
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $ratio = ($w - $this->cMargin * 2) / $str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit) {
            if ($scale) {
                //Calculate horizontal scaling
                $horiz_scale = $ratio * 100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET', $horiz_scale));
            } else {
                //Calculate character spacing in points
                $char_space = ($w - $this->cMargin * 2 - $str_width) / max($this->MBGetStringLength($txt) - 1, 1) * $this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET', $char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align = '';
        }

        //Pass on to Cell method
        $this->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT ' . ($scale ? '100 Tz' : '0 Tc') . ' ET');
    }

    function MBGetStringLength($s)
    {
        if ($this->CurrentFont['type'] == 'Type0') {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++) {
                if (ord($s[$i]) < 128)
                    $len++;
                else {
                    $len++;
                    $i++;
                }
            }
            return $len;
        } else
            return strlen($s);
    }



    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 3 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 3, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
}
