<?php defined('BASEPATH') or exit('No direct script access allowed');

class Docente_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listar_programa_docente($id_docente = null, $inicio = null, $limite = null)
    {
        $sql = "SELECT
        pp.nombre_programa,
        pp.id_planificacion_programa,
        g.id_gestion,
        g.gestion,
        pp.numero_version,
        pp.fecha_inicio,
        pp.fecha_fin,
        tp.nombre_tipo_programa,
        ga.descripcion_grado_academico,
        amp.id_asignacion_modulo_programa,
        amp.fecha_inicio_nota,
        amp.fecha_fin_nota,
        amp.fecha_inicio_rezadado,
        amp.fecha_fin_rezadado,
        amp.paralelo,
        amp.turno,
        mp.nombre_modulo_programa        
        FROM
        academico.psg_modulo_programa mp
        INNER JOIN academico.psg_asignacion_modulo_programa amp
            ON mp.id_modulo_programa = amp.id_modulo_programa
        INNER JOIN academico.psg_planificacion_programa pp
            ON mp.id_planificacion_programa = pp.id_planificacion_programa
        INNER JOIN academico.psg_gestion g
            ON pp.id_gestion = g.id_gestion
        INNER JOIN academico.psg_tipo_programa tp
            ON pp.id_tipo_programa = tp.id_tipo_programa
        INNER JOIN academico.psg_grado_academico ga
            ON pp.id_grado_academico = ga.id_grado_academico
        WHERE
        amp.id_persona = '$id_docente'
        AND pp.estado_programa <> 'ELIMINADO'
        GROUP BY
        pp.nombre_programa,
        pp.id_planificacion_programa,
        g.id_gestion,
        g.gestion,
        pp.numero_version,
        pp.fecha_inicio,
        pp.fecha_fin,
        tp.nombre_tipo_programa,
        ga.descripcion_grado_academico,
        amp.paralelo,
        amp.turno,
        mp.nombre_modulo_programa,
        amp.id_asignacion_modulo_programa
        ORDER BY
        g.gestion DESC LIMIT '$limite' OFFSET '$inicio'";
        //echo $sql; //exit;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }
}
