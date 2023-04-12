<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sic_mdl extends CI_Model
{
    public function  __construct()
    {
        parent::__construct();
    }

    public function docencia_pregrado($ci)
    {
        $sic = $this->load->database('dbsic', TRUE);
        $sic->where('ci', $ci);
        $sic->order_by('fecha_emision_nombramiento');
        $query = $sic->get('vista_nombramiento_docentes');
        $resultado = (($query) ? $query->result_array() : NULL);
        return $resultado;
    }

    public function docencia_pregrado_reporte($ci)
    {
        $sic = $this->load->database('dbsic', TRUE);
        $sic->where('vnd.tipo_gestion', 'R');
        $sic->where('ci', $ci);
        $sic->select("vnd.gestion, (SELECT MAX(v.sede) FROM vista_nombramiento_docentes v WHERE v.ci = vnd.ci AND v.gestion = vnd.gestion ORDER BY (DATEDIFF(MAX(v.fecha_conclusion), MIN(v.fecha_inicio))/30) DESC LIMIT 1) AS sede, GROUP_CONCAT(DISTINCT CONCAT_WS(' ', vnd.periodo, vnd.sigla_asignatura, ':', vnd.paralelo, LEFT(vnd.tipo_categoria_rgs, 3)) ORDER BY sigla_asignatura SEPARATOR ' | ') AS descripcion, (DATEDIFF(MAX(fecha_conclusion), MIN(fecha_inicio))/30) AS meses");
        $sic->group_by('vnd.gestion');
        $sic->order_by('vnd.gestion DESC');
        $query = $sic->get('vista_nombramiento_docentes AS vnd');
        $resultado = (($query) ? $query->result_array() : NULL);
        return $resultado;
    }
}
