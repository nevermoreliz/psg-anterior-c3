<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reporte_archivo_digital extends FPDF
{
    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        //$this->CI->load->model('correspondencia_model');
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
        $this->Cell(0, 0, '        ____________________________________________________', 0, 1, 'C');
        $this->Ln(2);
        //$this->SetTopMargin(15);
        $this->SetLeftMargin(20);
        $this->SetRightMargin(19);
        $this->SetAutoPageBreak(1, 20);
    }

    public function imp($tipos_respaldo_persona)
    {
        $this->AddPage('P', 'Letter');
        $this->AliasNbPages();
        // $this->SetFillColor(164, 176, 195);
        $this->SetLineWidth(0);
        $this->Ln(5);
        $this->SetFont('Arial', 'BU', 12);
        $this->Cell(0, 5, utf8_decode('CERTIFICACIÓN DE TENENCIA DE DOCUMENTOS'), 0, 1, 'C');
        $this->SetFont('Arial', '', 8);
        $this->Ln(2);
        $this->MultiCell(0, 4, utf8_decode('Según la resolución CEFORPI Nº 3244/2020 aprobada en la fecha 29/01/2015 certificamos que ADALID ALANOCA RAMIREZ con CI: 9874182 cuenta con los siguientes documentos.'));
        $this->Ln(2);
        $this->Line(20, 100, 198, 100);
        $this->Ln(2);
        $this->Cell(0, 5, utf8_decode('Documentos en custodia en archivos de Posgrado'), 0, 1, 'L');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(4, 5, utf8_decode('N°'), 'B', 0, 'C');
        $this->Cell(52, 5, utf8_decode('DOCUMENTOS'), 'B', 0, 'C');
        $this->Cell(29, 5, utf8_decode('F. PRESENTACIÓN'), 'B', 0, 'C');
        $this->Cell(25, 5, utf8_decode('F. VENCIMIENTO'), 'B', 0, 'C');
        $this->Cell(55, 5, utf8_decode('OBS'), 'B', 0, 'C');
        $this->Cell(15, 5, utf8_decode('CUENTA'), 'B', 0, 'C');
        $this->SetFont('Arial', '', 8);
        if (!empty($tipos_respaldo_persona)) {
            $i = 1;
            $this->Ln(5);
            foreach ($tipos_respaldo_persona as $key => $value) {
                $this->SetFont('Arial', '', 7);
                // $this->SetFillColor(164, 176, 195);
                // $this->Cell(4, 5, $i++, 'B', 0, 'C', true,);
                // $this->Cell(155, 5, utf8_decode($value->nombre), 'B', 0, 'L', true);
                // $this->Cell(25, 5, utf8_decode(empty($value->respaldos) ? 'No' : 'Si'), 'B', 0, 'C', true);
                if (!empty($value->respaldos)) {
                    $this->Cell(4, 5, $i++, 'B', 0, 'C');
                    $this->Cell(52, 5, utf8_decode($value->nombre), 'B', 0, 'L');
                    $this->Cell(29, 5, $value->respaldos[0]->fecha_presentacion, 'B', 0, 'L');
                    $this->Cell(25, 5, $value->respaldos[0]->fecha_vencimiento, 'B', 0, 'L');
                    $this->Cell(55, 5, $value->respaldos[0]->fecha_vencimiento != '' ? ((strtotime($value->respaldos[0]->fecha_vencimiento) > strtotime(date("d-m-Y H:i:00", time()))) ? '' : 'VENCIDO') : '', 'B', 0, 'C');
                    $this->Cell(15, 5, utf8_decode(empty($value->respaldos) ? 'No' : 'Si'), 'B', 0, 'C');
                } else {
                    $this->Cell(4, 5, $i++, 'B', 0, 'C');
                    $this->Cell(52, 5, utf8_decode($value->nombre), 'B', 0, 'L');
                    $this->Cell(29, 5, '', 'B', 0, 'L');
                    $this->Cell(25, 5, '', 'B', 0, 'L');
                    $this->Cell(55, 5, '', 'B', 0, 'C');
                    $this->Cell(15, 5, utf8_decode(empty($value->respaldos) ? 'No' : 'Si'), 'B', 0, 'C');
                }
                $this->Ln(5);
                foreach ($value->respaldos as $k => $val) {
                    // $this->SetFont('Arial', '', 5);
                    // $this->SetTextColor(0, 0, 0);
                    // $this->SetWidths([4, 62, 34, 25, 70]);
                    // $this->SetAligns(['C', 'C', 'C', 'C', 'C']);
                    // $this->Row(['', 'DSKFJLJSDKJFLK S KSJDLF    SDIJFLKSDJFLKSDJFKLSDJLF KSJDLFKJSDLKFJSD   SDJFLSDKJFLKSD  SLKDJFLKSDJF DS', $val->fecha_presentacion, $val->fecha_vencimiento == null ? 'SIN VENCIMIENTO' : $val->fecha_vencimiento, '']);
                }
            }
        } else {
            $this->Cell(197, 8, 'No se encontro registros sobre los titulos profesionales', 1, 1, 'C');
        }
        return $this->Output('S');
    }
    public function Footer()
    {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 6);
        $this->Line(10, 335, 208, 335);
        $this->Line(10, 336, 208, 336);
        //$this->Cell(90, 5, utf8_decode('   ') . $this->PageNo() . utf8_decode(' Página {nb}'), 0, 0, 'C');
        $this->Cell(66, 5, utf8_decode('Posgrado CEFORPI UPEA'), 0, 0, 'L');
        $this->Cell(66, 5, utf8_decode(strftime("%d de %B, %Y") . ' Hrs: ' . date("H:i:s") . ' ©Team_PSG'), 0, 0, 'C');
        $this->Cell(66, 5, utf8_decode('Pag. ') . $this->PageNo() . utf8_decode('/{nb}'), 0, 0, 'R');
    }


    function divide_cadena($string, $corte, $pdf)
    {

        while (strlen($string) > $corte) {
            $pdf->Cell(0, 5, utf8_decode(substr($string, 0, $corte) . ' - '), 0, 1, 'R');
            $string = substr($string, $corte);
            $pdf->Cell(0);
        }
        $pdf->Cell(0, 5, utf8_decode(substr($string, 0, $corte)), 0, 1, 'R');
    }

    // Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }


    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function WriteHTML($html)
    {
        // Intérprete de HTML
        $html = str_replace("\n", ' ', $html);
        $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($a as $i => $e) {
            if ($i % 2 == 0) {
                // Text
                if ($this->HREF)
                    $this->PutLink($this->HREF, $e);
                else
                    $this->Write(5, utf8_decode($e));
            } else {
                // Etiqueta
                if ($e[0] == '/')
                    $this->CloseTag(strtoupper(substr($e, 1)));
                else {
                    // Extraer atributos
                    $a2 = explode(' ', $e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach ($a2 as $v) {
                        if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag, $attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Etiqueta de apertura
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, true);
        if ($tag == 'A')
            $this->HREF = $attr['HREF'];
        if ($tag == 'BR')
            $this->Ln(5);
        if ($tag == 'P')
            $this->Ln(7);
    }

    function CloseTag($tag)
    {
        // Etiqueta de cierre
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, false);
        if ($tag == 'A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modificar estilo y escoger la fuente correspondiente
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach (array('B', 'I', 'U') as $s) {
            if ($this->$s > 0)
                $style .= $s;
        }
        $this->SetFont('', $style);
    }

    function PutLink($URL, $txt)
    {
        // Escribir un hiper-enlace
        $this->SetTextColor(0, 0, 255);
        $this->SetStyle('U', true);
        $this->Write(5, $txt, $URL);
        $this->SetStyle('U', false);
        $this->SetTextColor(0);
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
    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }
}
