<?php defined('BASEPATH') or exit('No direct script access allowed');
class Reporte_notas_posgraduante extends FPDF
{
    //var $datos_programa_;
    var $titulo_;
    public function __construct($titulo = null)
    {
        parent::__construct();
        $this->titulo_ = $titulo;
    }
    public function Header()
    {
        $this->Image(APPPATH . '../public_html/img/upea.png', 20, 4.5, 15, 'jpg');
        $this->Image(APPPATH . '../public_html/img/posgrado.png', 170, 10, 30, 11, 'png', '');
        $this->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
        $this->AddFont('helvetica', 'I', 'helvetica.php');
        $this->SetTextColor(0, 0, 0); //Color del texto: Negro
        $this->SetFont('EdwardianScriptITC', 'I', 30);
        $this->Ln(5);
        $this->Cell(0, 0, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');  // $this->Cell(ANCHO, ALTO, 'UNIVERSIDAD PUBLICA DE EL ALTO', margen, 1=seguido, 'alineacion'); 
        $this->Ln(4);
        $this->SetFont('Arial', 'I', 6);
        $this->Cell(0, 2, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y Autonoma por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
        $this->Cell(0, 0, '        ________________________________________________________________________________________________________________________________________________________', 0, 1, 'C');
        $this->Ln(2);
        //$this->SetTopMargin(15);
        $this->SetLeftMargin(20);
        $this->SetRightMargin(19);
        $this->SetAutoPageBreak(1, 20);
    }
    function Footer()
    {
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 6);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'R');
        $this->AliasNbPages();
    }
    public function encabezado_posgraduante($lista_programa_modulo_paralelo_fila = null)
    {
        $this->Ln(4);
        $this->SetFont('Arial', 'I', 15);
        $this->Cell(0, 3, utf8_decode($this->titulo_), 0, 1, 'C', 0);
        $this->Ln(2);
        $this->SetFont('Arial', 'I', 7);
        $this->datos_encabezado($lista_programa_modulo_paralelo_fila);
        $this->Ln(4);
        $this->SetTextColor(255, 255, 255, 255); //Color de texto
        $this->SetFillColor(14, 10, 87, 0.75); //Color de relleno    
        $this->SetDrawColor(235, 238, 245, 1); //Color de borde
        $this->Cell(10, 5, utf8_decode('Nro'), 'L R B', 0, 'L', 1);
        $this->Cell(20, 5, utf8_decode('C.I.'), 'L R B', 0, 'L', 1);
        $this->Cell(20, 5, utf8_decode('R.U.'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('PATERNO'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('MATERNO'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('NOMBRES'), 'L R B', 0, 'L', 1);
        $this->Cell(15, 5, utf8_decode('CEL'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('CORREO ELECTRÓNICO'), 'L R B', 1, 'L', 1);
    }
    public function encabezado_docente($lista_programa_modulo_paralelo_fila = null)
    {
        $this->Ln(4);
        $this->SetFont('Arial', 'I', 15);
        $this->Cell(0, 3, utf8_decode($this->titulo_), 0, 1, 'C', 0);
        $this->Ln(2);
        $this->SetFont('Arial', 'I', 7);
        $this->datos_encabezado($lista_programa_modulo_paralelo_fila);
        $this->Ln(4);
        $this->SetTextColor(255, 255, 255, 255); //Color de texto
        $this->SetFillColor(14, 10, 87, 0.75); //Color de relleno    
        $this->SetDrawColor(235, 238, 245, 1); //Color de borde
        $this->Cell(10, 5, utf8_decode('Nro'), 'L R B', 0, 'L', 1);
        $this->Cell(20, 5, utf8_decode('C.I.'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('PATERNO'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('MATERNO'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('NOMBRES'), 'L R B', 0, 'L', 1);
        $this->Cell(15, 5, utf8_decode('CEL'), 'L R B', 0, 'L', 1);
        $this->Cell(30, 5, utf8_decode('CORREO ELECTRÓNICO'), 'L R B', 1, 'L', 1);
    }
    public function datos_encabezado($lista_programa_modulo_paralelo_fila = null)
    {
        if (!empty($lista_programa_modulo_paralelo_fila)) {
            $this->Cell(30, 3, utf8_decode('Programa'), 0, 0, 'L', 0);
            $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->nombre_programa), 0, 1, 'L', 0);
            $this->Cell(30, 3, utf8_decode('Grado - Modalidad'), 0, 0, 'L', 0);
            $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->descripcion_grado_academico . ' ' . $lista_programa_modulo_paralelo_fila->nombre_tipo_programa), 0, 1, 'L', 0);
            if (isset($lista_programa_modulo_paralelo_fila->nombre_modulo_programa)) {
                $this->Cell(30, 3, utf8_decode('Modulo Programa'), 0, 0, 'L', 0);
                $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->nombre_modulo_programa), 0, 1, 'L', 0);
            }
            if (isset($lista_programa_modulo_paralelo_fila->numero_modulo)) {
                $this->Cell(30, 3, utf8_decode('Numero Modulo'), 0, 0, 'L', 0);
                $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->numero_modulo), 0, 1, 'L', 0);
            }
            $this->Cell(30, 3, utf8_decode('Unidad - Sede'), 0, 0, 'L', 0);
            $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->nombre_unidad), 0, 1, 'L', 0);
            $this->Cell(30, 3, utf8_decode('Versión'), 0, 0, 'L', 0);
            $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->numero_version), 0, 1, 'L', 0);
            if (isset($lista_programa_modulo_paralelo_fila->paralelo)) {
                $this->Cell(30, 3, utf8_decode('Paralelo'), 0, 0, 'L', 0);
                $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->paralelo), 0, 1, 'L', 0);
            }
            if (isset($lista_programa_modulo_paralelo_fila->turno)) {
                $this->Cell(30, 3, utf8_decode('Turno'), 0, 0, 'L', 0);
                $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->turno), 0, 1, 'L', 0);
            }
            if (isset($lista_programa_modulo_paralelo_fila->nombre_docente)) {
                $this->Cell(30, 3, utf8_decode('Docente'), 0, 0, 'L', 0);
                $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->nombre_docente . ' ' . $lista_programa_modulo_paralelo_fila->paterno_docente . ' ' . $lista_programa_modulo_paralelo_fila->materno_docente), 0, 1, 'L', 0);
            }
            $this->Cell(30, 3, utf8_decode('Fecha'), 0, 0, 'L', 0);
            $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->fecha_inicio), 0, 0, 'L', 0);
            $this->Cell(30, 3, utf8_decode($lista_programa_modulo_paralelo_fila->fecha_fin), 0, 0, 'L', 0);
            $this->Cell(50, 3, utf8_decode($lista_programa_modulo_paralelo_fila->fecha_registro_programa), 0, 1, 'L', 0);
        }
    }
    public function lista_posgraduante($datos_programa = null, $lista_posgraduante = null)
    {
        $this->AddPage('P', 'letter');
        $this->encabezado_posgraduante($datos_programa);
        $this->AliasNbPages();
        $this->SetFillColor(229, 229, 229); // DEFINE EL COLOR// Se define el formato de fuente: Arial, negritas, tamaño 9
        $this->SetLineWidth(0);
        //$this->SetFont('Arial', 'B', 10);


        $this->SetTextColor(0, 0, 0, 0); //Color de texto
        $this->SetFillColor(255, 255, 255, 255); //Color de relleno    
        $this->SetDrawColor(235, 238, 245, 1); //Color de borde
        if (!empty($lista_posgraduante)) {
            $x = 1;
            foreach ($lista_posgraduante as $lista_posgraduante_fila) {
                $this->AjustCell(10, 5, utf8_decode($x++), 1, 0, 'L', 1);
                $this->AjustCell(20, 5, utf8_decode($lista_posgraduante_fila->ci . ' ' . $lista_posgraduante_fila->expedido), 1, 0, 'L', 1);
                $this->AjustCell(20, 5, utf8_decode($lista_posgraduante_fila->registro_universitario), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->paterno), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->materno), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->nombre), 1, 0, 'L', 1);
                $this->AjustCell(15, 5, utf8_decode($lista_posgraduante_fila->celular), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->email), 1, 1, 'L', 1);
            }
        }
        echo base64_encode($this->Output('S'));
    }
    /* public function lista_posgraduante_paralelo($lista_programa_modulo_paralelo = null, $lista_posgraduante_paralelo = null)
    {

        
        if (!empty($lista_programa_modulo_paralelo)) {
            $x = 1;
            foreach ($lista_programa_modulo_paralelo as $lista_programa_modulo_paralelo_fila) {
                $this->AddPage('P', 'letter');
                $this->encabezado_posgraduante($lista_programa_modulo_paralelo_fila);
                $lista_posgraduante_paralelos = $lista_posgraduante_paralelo[$lista_programa_modulo_paralelo_fila->id_asignacion_modulo_programa];
                if (!empty($lista_posgraduante_paralelos)) {
                    $this->SetTextColor(0, 0, 0, 0); //Color de texto
                    $this->SetFillColor(255, 255, 255, 255); //Color de relleno    
                    $this->SetDrawColor(235, 238, 245, 1); //Color de borde
                    foreach ($lista_posgraduante_paralelos as $lista_posgraduante_paralelo_fila) {
                        $this->AjustCell(10, 5, utf8_decode($x++), 1, 0, 'L', 1);
                        $this->AjustCell(20, 5, utf8_decode($lista_posgraduante_paralelo_fila->ci . ' ' . $lista_posgraduante_paralelo_fila->expedido), 1, 0, 'L', 1);
                        $this->AjustCell(20, 5, utf8_decode($lista_posgraduante_paralelo_fila->registro_universitario), 1, 0, 'L', 1);
                        $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_paralelo_fila->paterno), 1, 0, 'L', 1);
                        $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_paralelo_fila->materno), 1, 0, 'L', 1);
                        $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_paralelo_fila->nombre), 1, 0, 'L', 1);
                        $this->AjustCell(15, 5, utf8_decode($lista_posgraduante_paralelo_fila->celular), 1, 0, 'L', 1);
                        $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_paralelo_fila->email), 1, 1, 'L', 1);
                    }
                }
                $this->SetTextColor(0, 0, 0, 0); //Color de texto
            }
        }
        echo base64_encode($this->Output('S'));
    }*/
    public function lista_docente($datos_programa = null, $lista_posgraduante = null)
    {
        $this->AddPage('P', 'letter');
        $this->encabezado_docente($datos_programa);
        $this->AliasNbPages();
        $this->SetFillColor(229, 229, 229); // DEFINE EL COLOR// Se define el formato de fuente: Arial, negritas, tamaño 9
        $this->SetLineWidth(0);
        //$this->SetFont('Arial', 'B', 10);


        $this->SetTextColor(0, 0, 0, 0); //Color de texto
        $this->SetFillColor(255, 255, 255, 255); //Color de relleno    
        $this->SetDrawColor(235, 238, 245, 1); //Color de borde
        if (!empty($lista_posgraduante)) {
            $x = 1;
            foreach ($lista_posgraduante as $lista_posgraduante_fila) {
                $this->AjustCell(10, 5, utf8_decode($x++), 1, 0, 'L', 1);
                $this->AjustCell(20, 5, utf8_decode($lista_posgraduante_fila->ci . ' ' . $lista_posgraduante_fila->expedido), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->paterno), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->materno), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->nombre), 1, 0, 'L', 1);
                $this->AjustCell(15, 5, utf8_decode($lista_posgraduante_fila->celular), 1, 0, 'L', 1);
                $this->AjustCell(30, 5, utf8_decode($lista_posgraduante_fila->email), 1, 1, 'L', 1);
            }
        }
        echo base64_encode($this->Output('S'));
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
