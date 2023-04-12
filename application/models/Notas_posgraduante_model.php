<?php defined('BASEPATH') or exit('No direct script access allowed');

class Notas_posgraduante_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function contar_modulos($id_planificacion_programa = null)
    {
        $sql = "SELECT Count( id_modulo_programa) as cantidad 
        FROM psg_modulo_programa
        WHERE id_planificacion_programa = '$id_planificacion_programa' 
        AND estado_modulo_programa <> 'ELIMINADO'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->row()->cantidad;
        else return null;
    }
    public function contar_matriculados($id_planificacion_programa = null)
    {
        $sql = "SELECT Count( id_matricula_gestion) as cantidad_matriculado 
        FROM psg_matricula_gestion
        WHERE id_planificacion_programa = '$id_planificacion_programa' 
        AND estado_matricula <> 'ELIMINADO'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->row()->cantidad_matriculado;
        else return null;
    }
    public function contar_inscritos($id_planificacion_programa = null)
    {
        $sql = "SELECT Count( im.id_asignacion_modulo_programa) as cantidad_inscrito 
        FROM psg_asignacion_modulo_programa amp 
        JOIN psg_inscripcion_modulo im ON amp.id_asignacion_modulo_programa = im.id_asignacion_modulo_programa 
        JOIN psg_modulo_programa mp ON amp.id_modulo_programa = mp.id_modulo_programa 
        WHERE id_planificacion_programa = '$id_planificacion_programa'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->row()->cantidad_inscrito;
        else return null;
    }
    public function lista_posgraduante($id_planificacion_programa = null, $id_gestion = null)
    {
        $sql = "SELECT p.id_persona, 
        p.ci, 
        p.expedido,
        p.nombre,
        p.paterno,
        p.materno,
        p.email,
        p.celular,
        mg.id_planificacion_programa,
        mg.registro_universitario 
        FROM psg_posgraduante po 
        JOIN psg_matricula_gestion mg ON po.id_persona = mg.id_persona 
        JOIN psg_persona p ON po.id_persona = p.id_persona 
        JOIN psg_planificacion_programa pp ON mg.id_planificacion_programa = pp.id_planificacion_programa 
        WHERE mg.id_planificacion_programa = '$id_planificacion_programa' 
        AND mg.id_gestion='$id_gestion'
        AND mg.estado_matricula <> 'ELIMINADO' 
        GROUP BY p.id_persona, 
        mg.id_planificacion_programa,
        mg.registro_universitario
        ORDER BY p.paterno ASC, p.materno ASC, 
        p.nombre ASC, p.expedido ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }
    public function lista_docente($id_modulo_programa)
    {
        $sql = "SELECT
        p.ci,
        p.expedido,
        p.nombre,
        p.paterno,
        p.materno,
        p.celular,
        p.email,
        amp.paralelo,
        amp.turno
    FROM
        principal.psg_persona p
        INNER JOIN academico.psg_docente
         ON p.id_persona = academico.psg_docente.id_persona
        INNER JOIN academico.psg_asignacion_modulo_programa amp
         ON academico.psg_docente.id_persona = amp.id_persona
    WHERE
        amp.id_modulo_programa = '$id_modulo_programa'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }
    public function listar_modulo_programa($id_planificacion_programa = null)
    {
        $sql = "SELECT
        mp.id_modulo_programa,
        mp.id_planificacion_programa,
        mp.nombre_modulo_programa,
        tm.descripcion_tipo_modulo,
        mp.numero_modulo,
        mp.horas_academicas,
        mp.descripcion_modulo_programa
        FROM
        academico.psg_tipo_modulo tm
        INNER JOIN academico.psg_modulo_programa mp ON tm.id_tipo_modulo = mp.id_tipo_modulo
        WHERE
        id_planificacion_programa = '$id_planificacion_programa'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }
    public function modulo_programa($id_asignacion_modulo_programa = null)
    {
        $sql = "SELECT
        mp.id_planificacion_programa,
        mp.id_modulo_programa,
        pp.cantidad_minima_paralelo,
        pp.cantidad_maxima_paralelo
        FROM
        academico.psg_modulo_programa mp
        INNER JOIN academico.psg_asignacion_modulo_programa amp ON mp.id_modulo_programa = amp.id_modulo_programa
        INNER JOIN academico.psg_planificacion_programa  pp ON mp.id_planificacion_programa = pp.id_planificacion_programa
        WHERE
        amp.id_asignacion_modulo_programa = '$id_asignacion_modulo_programa'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->row();
        else return null;
    }
    public function vefificar_inscripcion($id_modulo_programa = null, $id_persona = null)
    {
        $sql = "SELECT
        amp.id_modulo_programa,
        im.id_persona
        FROM
        academico.psg_asignacion_modulo_programa amp
        INNER JOIN academico.psg_inscripcion_modulo im ON amp.id_asignacion_modulo_programa = im.id_asignacion_modulo_programa
        WHERE
        amp.id_modulo_programa = '$id_modulo_programa'
        AND im.id_persona = '$id_persona'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->row();
        else return null;
    }
    public function lista_posgraduante_inscripcion($id_asignacion_modulo_programa, $id_gestion = null)
    {
        $sql = "SELECT
        im.id_inscripcion_modulo,
        im.fecha_inscripcion,
        im.trabajo_aula,
        im.trabajo_investigacion,
        im.trabajo_final,
        im.nota_final_modulo,
        im.nro_folio,
        im.fecha_registro_inscripcion,
        im.observacion_inscripcion,
        im.estado_inscripcion_modulo,
        p.id_persona,
        p.ci,
        p.expedido,
        p.nombre,
        p.paterno,
        p.materno,
        p.celular,
        mg.registro_universitario
        FROM
        academico.psg_inscripcion_modulo im
        INNER JOIN academico.psg_posgraduante pt ON im.id_persona = pt.id_persona
        INNER JOIN principal.psg_persona p ON pt.id_persona = p.id_persona
        INNER JOIN academico.psg_matricula_gestion mg ON pt.id_persona = mg.id_persona
        WHERE
	    (im.estado_inscripcion_modulo = 'REGISTRADO'
        AND mg.estado_matricula <> 'ELIMINADO') 
        AND im.id_asignacion_modulo_programa = '$id_asignacion_modulo_programa'        
        AND mg.id_gestion='$id_gestion'
        ORDER BY p.paterno ASC, 
        p.materno ASC, 
        p.nombre ASC, 
        p.expedido ASC
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }
}
