<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reportes_inscritos_programa extends FPDF
{
    var $CI = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->CI->load->model('inscripcion_model');
        $this->CI->load->model('marketing_model');
    }

    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $txt = (!empty($txt)) ? ((mb_detect_encoding($txt, 'UTF-8', false)) ? iconv('UTF-8', 'ISO-8859-1', $txt) : "") : "";
        $k = $this->k;
        if ($this->y + $h > $this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak()) {
            $x = $this->x;
            $ws = $this->ws;
            if ($ws > 0) {
                $this->ws = 0;
                $this->_out('0 Tw');
            }
            $this->AddPage($this->CurOrientation);
            $this->x = $x;
            if ($ws > 0) {
                $this->ws = $ws;
                $this->_out(sprintf('%.3F Tw', $ws * $k));
            }
        }
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $s = '';
        if ($fill || $border == 1) {
            if ($fill)
                $op = ($border == 1) ? 'B' : 'f';
            else
                $op = 'S';
            $s = sprintf('%.2F %.2F %.2F %.2F re %s ', $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
        }
        if (is_string($border)) {
            $x = $this->x;
            $y = $this->y;
            if (is_int(strpos($border, 'L')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, $x * $k, ($this->h - ($y + $h)) * $k);
            if (is_int(strpos($border, 'T')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - $y) * $k);
            if (is_int(strpos($border, 'R')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', ($x + $w) * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
            if (is_int(strpos($border, 'B')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - ($y + $h)) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
        }
        if ($txt != '') {
            if ($align == 'R')
                $dx = $w - $this->cMargin - $this->GetStringWidth($txt);
            elseif ($align == 'C')
                $dx = ($w - $this->GetStringWidth($txt)) / 2;
            elseif ($align == 'FJ') {
                $wmax = ($w - 2 * $this->cMargin);
                $this->ws = ($wmax - $this->GetStringWidth($txt)) / (substr_count($txt, ' ') === 0 ? 1 : substr_count($txt, ' '));
                $this->_out(sprintf('%.3F Tw', $this->ws * $this->k));
                $dx = $this->cMargin;
            } else
                $dx = $this->cMargin;
            $txt = str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
            if ($this->ColorFlag)
                $s .= 'q ' . $this->TextColor . ' ';
            $s .= sprintf('BT %.2F %.2F Td (%s) Tj ET', ($this->x + $dx) * $k, ($this->h - ($this->y + .5 * $h + .3 * $this->FontSize)) * $k, $txt);
            if ($this->underline)
                $s .= ' ' . $this->_dounderline($this->x + $dx, $this->y + .5 * $h + .3 * $this->FontSize, $txt);
            if ($this->ColorFlag)
                $s .= ' Q';
            if ($link) {
                if ($align == 'FJ')
                    $wlink = $wmax;
                else
                    $wlink = $this->GetStringWidth($txt);
                $this->Link($this->x + $dx, $this->y + .5 * $h - .5 * $this->FontSize, $wlink, $this->FontSize, $link);
            }
        }
        if ($s)
            $this->_out($s);
        if ($align == 'FJ') {
            //Remove word spacing
            $this->_out('0 Tw');
            $this->ws = 0;
        }
        $this->lasth = $h;
        if ($ln > 0) {
            $this->y += $h;
            if ($ln == 1)
                $this->x = $this->lMargin;
        } else
            $this->x += $w;
    }

    public function imprimir_formularios($id_planificacion_programa = NULL)
    {
        ini_set('memory_limit', '1000M');
        $inscritos = $this->CI->inscripcion_model->inscritos_programa($id_planificacion_programa);
        // echo '<pre>';
        // var_dump($inscritos);
        // echo '</pre>';
        // exit();
        $inscrito_array = [];
        foreach ($inscritos as $inscrito) {

            $archivos_inscripcion = [];
            foreach (['CI_ANVERSO', 'CI_REVERSO', 'DEPOSITO_CUOTA_INICIAL', 'DEPOSITO_MATRICULA', 'DIPLOMA'] as $key => $value) {
                $archivo = $this->CI->marketing_model->listar_archivo_inscripcion(
                    ['i.id_inscripcion' => $inscrito['id_inscripcion'], 'm.etiqueta' => $value],
                    ['m.estado_archivo', ['ELIMINADO']],
                    'row'
                );
                $archivos_inscripcion[$value] = empty($archivo) ? null : $archivo;
                // echo '<pre>';
                // var_dump($archivo);
                // var_dump($this->db->last_query());
                // echo '</pre>';
            }

            $inscrito_array[] = array_merge((array)$inscrito, $archivos_inscripcion);
        }
        // exit;
        // echo '<pre>';
        // var_dump($inscrito_array);
        // echo '</pre>';
        // exit;

        $pdf = new Reportes_inscritos_programa('P', 'mm', 'Letter');
        $pdf->AddFont('Rubik', '', 'Rubik-Regular.php');
        $pdf->AddFont('RubikB', '', 'Rubik-Medium.php');
        $pdf->SetAutoPageBreak(30);
        $pdf->SetMargins(30, 30, 20);
        $vava = 0;
        foreach ($inscrito_array as $inscrito) {
            $vava++;
            $pdf->AddPage('P', 'Letter');
            $pdf->Image('img/solicitud.jpg', 0, 0, 216, 279);
            $pdf->SetFont('RubikB', '', 12);
            $pdf->Cell(0, 5, 'DOCUMENTOS ENVIADOS PARA LA INSCRIPCIÓN EN LÍNEA', 0, 1, 'C');
            $pdf->SetFont('Rubik', 'U', 7);
            $pdf->Cell(0, 5, 'Registrado el ' . fecha_literal($inscrito['fecha_inscripcion'], 2), 0, 1, 'R');
            $pdf->SetFont('Rubik', '', 9);
            $pdf->Cell(0, 5, $inscrito['descripcion_grado_academico'] . ' EN ' . $inscrito['nombre_programa'], 1, 1, 'L');
            $pdf->Cell(0, 5, 'MOD. ' . $inscrito['nombre_tipo_programa'] . ' VERSIÓN ' . $inscrito['numero_version'] . ' [' . $inscrito['denominacion_sede'] . ']', 1, 1, 'L');
            $pdf->Cell(0, 5, 'POSGRADUANTE: ' . $inscrito['nombre'] . ' ' . $inscrito['paterno'] . ' ' . $inscrito['materno'] . ' ' . $inscrito['ci'] . ' ' . $inscrito['expedido'] . '', 1, 1, 'L');
            $pdf->Cell(83, 5, 'DEPÓSITO POR MATRÍCULA: ' . $inscrito['numero_deposito_matricula'] . '', 1, 0, 'L');
            $pdf->Cell(83, 5, 'DEPÓSITO POR COLEGIATURA: ' . $inscrito['numero_deposito_cuota_inicial'] . '', 1, 1, 'L');
            $pdf->Cell(83, 5, 'FECHA DEPÓSITO: ' . fecha_literal($inscrito['fecha_deposito_matricula'], 1), 1, 0, 'L');
            $pdf->Cell(83, 5, 'FECHA DEPÓSITO: ' . fecha_literal($inscrito['fecha_deposito_inicial'], 1), 1, 1, 'L');
            $posicion_y = 70;
            $max_alto = 0;
            if (!empty($inscrito['DEPOSITO_MATRICULA'])) {
                if (is_file(FCPATH . 'img/inscripciones/' . $inscrito['DEPOSITO_MATRICULA']->nombre_archivo)) {
                    $dimensiones = getimagesize('img/inscripciones/' . $inscrito['DEPOSITO_MATRICULA']->nombre_archivo);
                    $porcentaje = $dimensiones[0] / 83;
                    $pdf->Image('img/inscripciones/' . $inscrito['DEPOSITO_MATRICULA']->nombre_archivo, 30, $posicion_y, 83);
                    $pdf->Rect(30, $posicion_y, $dimensiones[0] / $porcentaje, $dimensiones[1] / $porcentaje);
                    $max_alto = $dimensiones[1] / $porcentaje;
                }
            }
            if (!empty($inscrito['DEPOSITO_CUOTA_INICIAL'])) {
                if (is_file(FCPATH . 'img/inscripciones/' . $inscrito['DEPOSITO_CUOTA_INICIAL']->nombre_archivo)) {
                    $dimensiones = getimagesize('img/inscripciones/' . $inscrito['DEPOSITO_CUOTA_INICIAL']->nombre_archivo);
                    $porcentaje = $dimensiones[0] / 83;
                    $pdf->Image('img/inscripciones/' . $inscrito['DEPOSITO_CUOTA_INICIAL']->nombre_archivo, 113, $posicion_y, 83);
                    $pdf->Rect(113, $posicion_y, $dimensiones[0] / $porcentaje, $dimensiones[1] / $porcentaje);
                    $max_alto = max($dimensiones[1] / $porcentaje, $max_alto);
                }
            }
            $posicion_y += $max_alto;
            if (!empty($inscrito['DIPLOMA'])) {
                if (is_file(FCPATH . 'img/inscripciones/' . $inscrito['DIPLOMA']->nombre_archivo)) {
                    $dimensiones = getimagesize('img/inscripciones/' . $inscrito['DIPLOMA']->nombre_archivo);
                    $porcentaje = $dimensiones[0] / 96;
                    $pdf->Image('img/inscripciones/' . $inscrito['DIPLOMA']->nombre_archivo, 30, $posicion_y, 96);
                    $pdf->Rect(30, $posicion_y, $dimensiones[0] / $porcentaje, $dimensiones[1] / $porcentaje);
                }
            }
            if (!empty($inscrito['CI_ANVERSO'])) {
                if (is_file(FCPATH . 'img/inscripciones/' . $inscrito['CI_ANVERSO']->nombre_archivo)) {
                    $dimensiones = getimagesize('img/inscripciones/' . $inscrito['CI_ANVERSO']->nombre_archivo);
                    $porcentaje = $dimensiones[0] / 70;
                    $pdf->Image('img/inscripciones/' . $inscrito['CI_ANVERSO']->nombre_archivo, 126, $posicion_y, 70);
                    $pdf->Rect(126, $posicion_y, $dimensiones[0] / $porcentaje, $dimensiones[1] / $porcentaje);
                    $posicion_y += $dimensiones[1] / $porcentaje;
                }
            }
            if (!empty($inscrito['CI_REVERSO'])) {
                if (is_file(FCPATH . 'img/inscripciones/' . $inscrito['CI_REVERSO']->nombre_archivo)) {
                    $dimensiones = getimagesize('img/inscripciones/' . $inscrito['CI_REVERSO']->nombre_archivo);
                    $porcentaje = $dimensiones[0] / 70;
                    $pdf->Image('img/inscripciones/' . $inscrito['CI_REVERSO']->nombre_archivo, 126, $posicion_y, 70);
                    $pdf->Rect(126, $posicion_y, $dimensiones[0] / $porcentaje, $dimensiones[1] / $porcentaje);
                }
            }
        }
        $pdf->Output('I');
    }

    function Cut_String($string, $corte, $pdf, $direction, $width)
    {
        while (strlen($string) > $corte) {
            switch (substr(substr($string, 0, $corte), -1)) {
                case ' ':
                    $pdf->Cell($width);
                    $pdf->Cell(0, 5, (substr($string, 0, $corte)), 0, 1, $direction);
                    $string = substr($string, $corte);
                    break;
                default:
                    $corte++;
                    break;
            }
        }
        $pdf->Cell($width);
        $pdf->Cell(0, 5, (substr($string, 0, $corte)), 0, 1, $direction);
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
                    $this->Write(5, ($e));
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
        foreach (array('B', 'F', 'U') as $s) {
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

    function WriteText($text)
    {
        $intPosIni = 0;
        $intPosFim = 0;
        if (strpos($text, '<') !== false && strpos($text, '[') !== false) {
            if (strpos($text, '<') < strpos($text, '[')) {
                $this->Write(7, substr($text, 0, strpos($text, '<')));
                $intPosIni = strpos($text, '<');
                $intPosFim = strpos($text, '>');
                $this->SetFont('', 'B');
                $this->Write(7, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1));
                $this->SetFont('', '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } else {
                $this->Write(7, substr($text, 0, strpos($text, '[')));
                $intPosIni = strpos($text, '[');
                $intPosFim = strpos($text, ']');
                $w = $this->GetStringWidth('a') * ($intPosFim - $intPosIni - 1);
                $this->Cell($w, $this->FontSize + 0.75, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1), 1, 0, '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            }
        } else {
            if (strpos($text, '<') !== false) {
                $this->Write(7, substr($text, 0, strpos($text, '<')));
                $intPosIni = strpos($text, '<');
                $intPosFim = strpos($text, '>');
                $this->SetFont('', 'B');
                $this->WriteText(substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1));
                $this->SetFont('', '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } elseif (strpos($text, '[') !== false) {
                $this->Write(7, substr($text, 0, strpos($text, '[')));
                $intPosIni = strpos($text, '[');
                $intPosFim = strpos($text, ']');
                $w = $this->GetStringWidth('a') * ($intPosFim - $intPosIni - 1);
                $this->Cell($w, $this->FontSize + 0.75, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1), 1, 0, '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } else {
                $this->Write(7, $text);
            }
        }
    }
}
