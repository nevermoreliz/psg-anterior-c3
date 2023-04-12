<?php defined('BASEPATH') or exit('No direct script access allowed');
class Sql_psg
{
    protected $CI;
    public function __construct()
    {
        $this->CI = get_instance();
    }

    public function insertar_tabla($tabla = null, $datos = null)
    {
        return ($this->CI->db->insert($tabla, $datos)) ? $this->CI->db->insert_id() : $this->CI->db->error();
    }

    /*
    * listar tablas
    */
    public function listar_tabla($tabla = null, $condicion = null, $orden = null, $row_result = null)
    {
        $this->CI->db->order_by($orden);
        if ($row_result != 'row') {
            $query = $this->CI->db->get_where($tabla, $condicion)->result();
            return $query;
        } else {
            $query =  $this->CI->db->get_where($tabla, $condicion)->row();
            return $query;
        }
    }

    /** 
     * pruebas modificar jhonatan
     */
    public function modificar_tabla($tabla, $datos, $condicion)
    {
        return ($this->CI->db->update($tabla, $datos, $condicion)) ? TRUE : $this->CI->db->error;
    }

    /*
    * listar version en romano 
    */
    public function version()
    {
        return  $this->CI->db->select('numero_version')
            ->from('planificacion_programa')
            ->where('estado_programa <>', 'ELIMINADO')
            ->order_by('numero_version', 'DESC')
            ->group_by('numero_version')
            ->get()->result();
    }

    /*
    * metodo buscador gobal
    */
    public function buscar_planificacion_programa($buscar_registros = null, $vigentes = null, $ci_docente_posgraduante = null, $limit = null, $start = null)
    {
        $sql_docente_posgraduante = "";
        $uscar_campo = array("pp.nombre_programa", "pp.numero_version ", "pp.estado_programa", "u.nombre_unidad", "g.gestion::varchar", "ga.descripcion_grado_academico", "tp.nombre_tipo_programa");
        if (!empty($ci_docente_posgraduante)) {
            $uscar_campo = array_merge($uscar_campo, array("pe.ci", "pe.nombre", "pe.paterno", "pe.materno"));
            if ($ci_docente_posgraduante == "POSGRADUANTE") {
                $sql_docente_posgraduante = " LEFT JOIN academico.psg_matricula_gestion mg ON pp.id_planificacion_programa= mg.id_planificacion_programa 
                INNER JOIN academico.psg_posgraduante p ON mg.id_persona= p.id_persona 
                INNER JOIN principal.psg_persona pe ON p.id_persona= pe.id_persona";
            } else {
                $sql_docente_posgraduante = " INNER JOIN academico.psg_modulo_programa mp ON pp.id_planificacion_programa = mp.id_planificacion_programa
                INNER JOIN academico.psg_asignacion_modulo_programa amp ON mp.id_modulo_programa = amp.id_modulo_programa
                INNER JOIN academico.psg_docente d ON amp.id_persona = d.id_persona
                INNER JOIN principal.psg_persona pe ON d.id_persona = pe.id_persona";
            }
        }
        $buscar_registros = strtoupper($buscar_registros);
        $sql = "SELECT
				pp.id_planificacion_programa,
                pp.id_gestion,
                pp.id_unidad,
                pp.id_tipo_programa,
                pp.id_grado_academico,
                pp.nombre_programa,
                pp.numero_version,
                pp.estado_programa,
                pp.fecha_inicio, 
                pp.fecha_fin, 
                pp.fecha_registro_programa,
                tp.nombre_tipo_programa,
                g.gestion,
                u.nombre_unidad,
                u.tipo_unidad,
                ga.descripcion_grado_academico
				FROM
				academico.psg_planificacion_programa pp
				INNER JOIN academico.psg_gestion g ON pp.id_gestion = g.id_gestion
                INNER JOIN academico.psg_grado_academico ga ON pp.id_grado_academico= ga.id_grado_academico
                INNER JOIN academico.psg_tipo_programa tp ON pp.id_tipo_programa= tp.id_tipo_programa
                INNER JOIN administrativo.psg_unidad u ON pp.id_unidad= u.id_unidad 
                " . $sql_docente_posgraduante . "    
                WHERE (1=1) AND 
                pp.estado_programa <> 'ELIMINADO'
                ";
        if (trim(strlen($buscar_registros)) > 0) {
            $sql .= " AND ";
            $criterios = explode(' ', $buscar_registros);
            foreach ($criterios as $item) {
                if (strlen(trim($item)) > 0) {
                    $where = "";
                    $where .= "(";
                    foreach ($uscar_campo as $field) {
                        if (strlen($where) > 1) {
                            $where .= " OR ";
                        }
                        $where .= "(" . $field . " LIKE '%" . $item . "%')";
                    }
                    $where .= ")";
                    $sql .= "(" . $where . ") AND ";
                }
            }
            if (substr($sql, strlen($sql) - 4, 3) == "AND") {
                $sql = substr($sql, 0, strlen($sql) - 4);
            }
            $sql_fecha = (!empty($vigentes)) ? " AND ('" . $vigentes . "' between pp.fecha_inicio AND pp.fecha_fin)" : '';
            $sql = trim($sql) . ' ' . trim($sql_fecha);
            $sql = trim($sql) . " ORDER BY pp.id_planificacion_programa DESC  LIMIT '$limit' OFFSET '$start'";
            // return var_dump($sql);
            $query = $this->CI->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result();
            } else return null;
        }
    }

    /*
    * medoto para buscar datos de planificacion programa
    */
    public function planificacion_programa($id_planificacion_programa = null)
    {
        $sql = "SELECT
    pp.id_planificacion_programa,
    ga.descripcion_grado_academico,
    pp.nombre_programa,
    pp.numero_version,
    pp.sigla_programa,
    pp.fecha_inicio,
	pp.fecha_fin,
    tp.nombre_tipo_programa    
    FROM
        academico.psg_tipo_programa tp
        INNER JOIN academico.psg_planificacion_programa pp
        ON tp.id_tipo_programa = pp.id_tipo_programa
        INNER JOIN academico.psg_grado_academico ga
        ON pp.id_grado_academico = ga.id_grado_academico
    WHERE
    pp.id_planificacion_programa = '$id_planificacion_programa' AND 
    pp.estado_programa <> 'ELIMINADO'";
        $query = $this->CI->db->query($sql);
        if ($query->num_rows() > 0) return $query->row();
        else return null;
    }
    /*
    *  metodo para buscar dtos de programa modulo, para el encabezado de acta de calificaciones
    */
    public function planificacion_asignacion_modulo_programa($id_asignacion_modulo_programa = null)
    {
        $sql = "SELECT
            pp.id_planificacion_programa,
            pp.id_gestion,
            pp.id_unidad,
            pp.id_tipo_programa,
            pp.id_grado_academico,
            pp.nombre_programa,
            pp.numero_version,
            pp.estado_programa,
            pp.fecha_inicio,
            pp.fecha_fin,
            pp.fecha_registro_programa,
            tp.nombre_tipo_programa,
            g.gestion,
            u.nombre_unidad,
            u.tipo_unidad,
            ga.descripcion_grado_academico,
            mp.nombre_modulo_programa,
            amp.id_asignacion_modulo_programa,
            amp.fecha_inicio_nota,
            amp.fecha_fin_nota,
            amp.fecha_inicio_rezadado,
            amp.fecha_fin_rezadado,
            amp.nro_nombramiento,
            amp.paralelo,
            amp.turno,
            amp.fecha_inicio,
            amp.fecha_fin,
            amp.id_persona,
            mp.numero_modulo
            FROM
            academico.psg_planificacion_programa pp
            INNER JOIN academico.psg_gestion g
            ON pp.id_gestion = g.id_gestion
            INNER JOIN academico.psg_grado_academico ga
            ON pp.id_grado_academico = ga.id_grado_academico
            INNER JOIN academico.psg_tipo_programa tp
            ON pp.id_tipo_programa = tp.id_tipo_programa
            INNER JOIN administrativo.psg_unidad u
            ON pp.id_unidad = u.id_unidad
            INNER JOIN academico.psg_modulo_programa mp
            ON pp.id_planificacion_programa = mp.id_planificacion_programa
            INNER JOIN academico.psg_asignacion_modulo_programa amp
            ON mp.id_modulo_programa = amp.id_modulo_programa
            WHERE
            pp.estado_programa <> 'ELIMINADO'
            AND amp.id_asignacion_modulo_programa='$id_asignacion_modulo_programa'
            ORDER BY
            pp.id_planificacion_programa ASC";
        $query = $this->CI->db->query($sql);
        if ($query->num_rows() > 0) return $query->row();
        else return null;
    }
    /*
    *  metodo para buscar persona con grado academico
    */
    public function persona_grado_academico($id_persona = null)
    {
        $sql = "SELECT
        ga.abreviatura,
        gap.id_persona,
        ga.id_grado_academico,
        ga.jerarquia,
        p.ci,
        p.expedido,
        p.nombre,
        p.paterno,
        p.materno,
        p.genero,
        p.id_persona
    FROM
        academico.psg_grado_academico ga
        INNER JOIN academico.psg_grado_academico_persona gap
         ON ga.id_grado_academico = gap.id_grado_academico
        INNER JOIN principal.psg_persona p
         ON gap.id_persona = p.id_persona
    WHERE
        gap.id_persona = '$id_persona'
    ORDER BY
        ga.jerarquia ASC
    LIMIT 1";
        $query = $this->CI->db->query($sql);
        if ($query->num_rows() > 0) return $query->row();
        else return null;
    }
    /*
    *  metodo para buscar resolucion 
    */
    public function programa_resolucion($id_planificacion_programa = null)
    {
        $sql = "SELECT
        r.nro_resolucion
        FROM
        administrativo.psg_resolucion r
        INNER JOIN administrativo.psg_programa_resolucion pr
        ON r.id_resolucion = pr.id_resolucion
        WHERE
        pr.id_planificacion_programa = '$id_planificacion_programa'";
        $query = $this->CI->db->query($sql);
        if ($query->num_rows() > 0) return $query->row()->nro_resolucion;
        else return null;
    }
    /*
    *  metodo para obtener modulos y notas 
    */
    public function modulo_asignatura_nota($id_planificacion_programa = null, $id_persona = null)
    {
        $sql = "SELECT
            academico.psg_modulo_programa.id_modulo_programa,
            academico.psg_modulo_programa.nombre_modulo_programa,
            academico.psg_modulo_programa.numero_modulo,
            academico.psg_modulo_programa.creditaje_modulo,
            (SELECT
            academico.psg_inscripcion_modulo.nota_final_modulo
            FROM
            academico.psg_asignacion_modulo_programa
            INNER JOIN academico.psg_inscripcion_modulo
                ON academico.psg_asignacion_modulo_programa.id_asignacion_modulo_programa = academico.psg_inscripcion_modulo.id_asignacion_modulo_programa
            WHERE
            academico.psg_inscripcion_modulo.id_persona = '$id_persona'
            AND academico.psg_modulo_programa.id_modulo_programa = academico.psg_asignacion_modulo_programa.id_modulo_programa) AS nota_final_modulo
            FROM
            academico.psg_modulo_programa
            WHERE
        academico.psg_modulo_programa.id_planificacion_programa = '$id_planificacion_programa'";
        $query = $this->CI->db->query($sql);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }
    /*
    * medoto para listar docente paralelo
    */
    public function docente_paralelo($id_modulo_programa = null)
    {
        $sql = "SELECT
        amp.id_asignacion_modulo_programa,
        p.nombre,
        p.paterno,
        p.materno,
        amp.paralelo,
        amp.turno
    FROM
        academico.psg_docente
        INNER JOIN academico.psg_asignacion_modulo_programa amp
         ON academico.psg_docente.id_persona = amp.id_persona
        INNER JOIN principal.psg_persona p
         ON academico.psg_docente.id_persona = p.id_persona
    WHERE
        amp.id_modulo_programa = '$id_modulo_programa'";
        $query = $this->CI->db->query($sql);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }
}
