<?php defined('BASEPATH') or exit('No direct script access allowed');

class Matriculacion_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // FIXME: Metodo para devolver respaldos como Dep. Matricula, Dep. Couta Inicial
    public function respaldo_pagos($condicion = null, $condicion_negada = null, $orden = '')
    {
        $this->db->select('m.nombre_archivo, m.ruta_archivo, m.etiqueta');
        $this->db->from('inscripcion i');
        $this->db->join('multimedia_pago_programa mpp', 'mpp.id_inscripcion = i.id_inscripcion');
        $this->db->join('multimedia m', 'm.id_multimedia = mpp.id_multimedia');

        if (is_array($condicion) && is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
            $this->db->where($condicion);
        }
        if (is_array($condicion)) {
            $this->db->where($condicion);
        }
        if (is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
        }
        $this->db->order_by($orden);
        return $this->db->get()->result();
    }
    public function gestion_vigente()
    {
        $this->db->order_by('gestion DESC');
        $this->db->where('estado_gestion', 'ACTIVO');
        return $this->db->get('gestion');
    }

    public function datos_posgraduante($condicion = null, $orden = '')
    {
        $this->db->distinct();
        $this->db->select('pe.id_persona, pe.paterno, pe.materno, pe.nombre, pe.ci, pe.estado_persona, pe.expedido,
        pp.id_planificacion_programa, pp.gestion_programa, pp.descripcion_grado_academico, pp.nombre_programa, pp.nombre_tipo_programa,pp.denominacion_sede,pp.nombre_unidad,pp.numero_version')
            ->from('persona pe')
            ->join('posgraduante pg', 'pg.id_persona = pe.id_persona')
            ->join('matricula_gestion mg', 'mg.id_persona = pg.id_persona')
            ->join('vista_programas pp', 'pp.id_planificacion_programa = mg.id_planificacion_programa')
            ->group_by('pe.id_persona, pe.paterno, pe.materno, pe.nombre, pe.ci, pe.estado_persona, pe.expedido,
        pp.id_planificacion_programa, pp.gestion_programa, pp.descripcion_grado_academico, pp.nombre_programa, pp.nombre_tipo_programa,pp.denominacion_sede,pp.nombre_unidad,pp.numero_version');
        if (is_array($condicion)) {
            $this->db->where($condicion);
            return $this->db->get();
        }
        return $this->db->get();
    }

    // FIXME: Metodo para devolver el Historial de Matriculaciones de un posgraduante 
    public function datos_matriculacion($condicion = null, $orden = 'mg.id_matricula_gestion DESC')
    {
        $this->db->select('mg.id_matricula_gestion,mg.id_planificacion_programa,mg.numero_matricula,mg.registro_universitario,mg.fecha_matriculacion,mg.numero_serie,mg.anio_ingreso,mg.categoria,mg.estado_matricula,mg.id_gestion, g.gestion')
            ->from('persona pe')
            ->join('posgraduante p', 'p.id_persona = pe.id_persona')
            ->join('matricula_gestion mg', 'mg.id_persona = p.id_persona')
            ->join('vista_programas pp', 'pp.id_planificacion_programa = mg.id_planificacion_programa')
            ->join('gestion g', 'g.id_gestion = mg.id_gestion')
            ->where($condicion);
        $this->db->order_by($orden);
        return $this->db->get();
    }

    public function datos_inscrito($condicion = null, $orden = '')
    {
        $this->db->select('pe.id_persona,pe.paterno,pe.materno,pe.nombre,pe.ci,pe.estado_persona,pe.expedido,pe.fecha_nacimiento,pe.lugar_nacimiento,pe.celular,pe.email,pe.oficio_trabajo, pe.domicilio,pe.telefono,pe.genero,pe.estado_civil,
        pa.nombre_pais,
        i.id_inscripcion,i.id_persona,i.id_planificacion_programa,i.fecha_inscripcion,i.numero_deposito_matricula,i.fecha_deposito_matricula,i.numero_deposito_cuota_inicial,i.fecha_inscripcion,i.fecha_deposito_inicial,i.fecha_revision,i.fecha_confirmacion,i.estado_inscripcion,
        pr.gestion_programa,pr.nombre_programa,pr.estado_programa,pr.nombre_tipo_programa,pr.descripcion_grado_academico,pr.numero_version,pr.nombre_unidad,pr.tipo_unidad,pr.denominacion_sede,pr.denominacion_programa,pr.descripcion_sede,pr.objetivo_programa,pr.abreviatura');
        $this->db->from('persona pe');
        $this->db->join('inscripcion i', 'i.id_persona = pe.id_persona');
        $this->db->join('pais pa', 'pa.id_pais = pe.id_pais_nacionalidad', 'left');
        $this->db->join('vista_programas pr', 'pr.id_planificacion_programa = i.id_planificacion_programa');
        if (is_array($condicion)) {
            $this->db->where($condicion);
            return $this->db->get();
        }
        return $this->db->get();
    }

    public function listar_archivo_inscripcion($condicion = null, $condicion_no_en = null, $orden = '')
    {
        $this->db->select('m.id_multimedia, m.nombre_archivo, m.ruta_archivo, m.etiqueta, m.estado_archivo, mp.id_multimedia_persona, mpp.id_multimedia_pago_programa');
        $this->db->from('inscripcion i');
        $this->db->join('persona p', 'p.id_persona = i.id_persona');
        $this->db->join('multimedia_persona mp', 'mp.id_persona = p.id_persona', 'left');
        $this->db->join('multimedia_pago_programa mpp', 'mpp.id_inscripcion = i.id_inscripcion', 'left');
        $this->db->join('multimedia m', 'm.id_multimedia = mpp.id_multimedia', 'left');

        if (is_array($condicion) && is_array($condicion_no_en)) {
            $this->db->where_not_in($condicion_no_en[0], $condicion_no_en[1]);
            $this->db->where($condicion);
        }
        if (is_array($condicion)) {
            $this->db->where($condicion);
        }
        if (is_array($condicion_no_en)) {
            $this->db->where_not_in($condicion_no_en[0], $condicion_no_en[1]);
        }

        return $this->db->get()->result();
    }
    public function matriculas_gestion($condicion = null, $orden = 'mg.id_gestion DESC')
    {
        $this->db->select('(SELECT p.id_gestion FROM academico.psg_planificacion_programa p WHERE p.id_planificacion_programa = mg.id_planificacion_programa) gestion_creacion');
        $this->db->select('mg.id_gestion');
        $this->db->from('matricula_gestion mg');
        $this->db->where($condicion);
        $this->db->order_by($orden);
        return $this->db->get();
    }

    public function formacion_academica($condicion = null)
    {
        $this->db->select('*');
        $this->db->from('grado_academico_persona gap');
        $this->db->join('unidad_academica ua', 'ua.id_unidad_academica = gap.id_unidad_academica');
        $this->db->join('grado_academico ga', 'ga.id_grado_academico = gap.id_grado_academico');
        $this->db->join('modalidad_titulacion mt', 'mt.id_modalidad_titulacion = gap.id_modalidad_titulacion');
        if (is_array($condicion)) {
            return $this->db->where($condicion)->get();
        } else $this->db->get();
    }



    // FIXME: Metodo para devolver los Datos de la Matricula de un posgraduante 
    public function datos_matricula($condicion = null, $condicion_negada = null, $orden = ' mg.id_planificacion_programa, mg.fecha_matriculacion DESC')
    {
        $this->db->select('*')
            ->from('matricula_gestion mg')
            ->join('pago_programa pap', 'mg.id_matricula_gestion = (pap.id_pago_programa + 4)', 'left')
            ->join('posgraduante p', 'p.id_persona = mg.id_persona')
            ->join('persona per', 'per.id_persona = p.id_persona')
            ->join('vista_programas pr', 'pr.id_planificacion_programa = mg.id_planificacion_programa')
            ->join('gestion g', 'g.id_gestion = mg.id_gestion')
            ->where($condicion);
        $this->db->order_by($orden);
        return $this->db->get()->row();
    }

    public function registro_universitario_correlativo()
    {
        $this->db->select_max('CAST(registro_universitario AS integer)', 'registro_universitario');
        $this->db->where('CAST(registro_universitario AS integer) > 14000');
        $query = $this->db->get('academico.psg_matricula_gestion');
        return $query->row();
    }

    public function matricula_correlativo()
    {
        $this->db->select_max('CAST(numero_matricula AS integer)', 'numero_matricula');
        $this->db->where('CAST(numero_matricula AS integer) > ' . (intval(date('Y')) * 100000));
        $query = $this->db->get('matricula_gestion');
        return $query->row();
    }
    // FIXME: Metodo para buscar posgraduantes con sus respectivos Programas
    public function buscar($buscar_registros = null, $limite = null, $inicio = null)
    {
        $buscar_campo = array("pp.nombre_programa", "pp.numero_version ", "pp.estado_programa", "g.gestion::varchar", "ga.descripcion_grado_academico", "tp.nombre_tipo_programa", "pe.ci", "pe.expedido", "pe.nombre", "pe.paterno", "pe.materno", "pe.genero", "pe.estado_civil", "pe.domicilio", "pe.lugar_nacimiento", "pe.fecha_nacimiento::text", "pe.email", "pe.oficio_trabajo", "pe.telefono", "pe.celular");
        $buscar_registros = strtoupper($buscar_registros);
        $sql = "SELECT pe.id_persona, pp.id_planificacion_programa,concat('matriculado') as tipo
        FROM principal.psg_persona pe
        join academico.psg_posgraduante p on p.id_persona = pe.id_persona
        join(select * from academico.psg_matricula_gestion group by id_planificacion_programa,id_matricula_gestion) mg on mg.id_persona = p.id_persona
        join academico.psg_planificacion_programa pp on pp.id_planificacion_programa = mg.id_planificacion_programa
        JOIN academico.psg_gestion g on g.id_gestion = pp.id_gestion
        LEFT JOIN academico.psg_grado_academico ga ON pp.id_grado_academico= ga.id_grado_academico
        LEFT JOIN academico.psg_tipo_programa tp ON pp.id_tipo_programa= tp.id_tipo_programa
        LEFT JOIN administrativo.psg_unidad u ON u.id_unidad = pp.id_unidad
        WHERE (1=1)";
        $sql = trim($sql) . buscador_semantico($buscar_registros, $buscar_campo) . " group by pp.id_planificacion_programa ,pe.id_persona ORDER BY pe.id_persona DESC  LIMIT '$limite' OFFSET '$inicio'";
        return  $this->db->query($sql)->result_array();
    }

    // FIXME: Metodo para buscar posgraduantes con sus respectivos Programas
    public function buscar_inscritos($buscar_registros = null, $limite = null, $inicio = null)
    {
        $buscar_campo = array("pp.nombre_programa", "pp.numero_version ", "pp.estado_programa", "g.gestion::varchar", "ga.descripcion_grado_academico", "tp.nombre_tipo_programa", "pe.ci", "pe.expedido", "pe.nombre", "pe.paterno", "pe.materno", "pe.estado_civil", "pe.domicilio", "pe.lugar_nacimiento", "pe.fecha_nacimiento::text", "pe.email", "pe.oficio_trabajo", "pe.telefono", "pe.celular");
        $buscar_registros = strtoupper($buscar_registros);
        $sql = "SELECT pe.id_persona, pp.id_planificacion_programa,concat('inscrito') as tipo
        FROM principal.psg_persona pe
        join public.psg_inscripcion i on i.id_persona = pe.id_persona
        join academico.psg_planificacion_programa pp on pp.id_planificacion_programa = i.id_planificacion_programa
        JOIN academico.psg_gestion g on g.id_gestion = pp.id_gestion
        JOIN academico.psg_grado_academico ga ON pp.id_grado_academico= ga.id_grado_academico
        JOIN academico.psg_tipo_programa tp ON pp.id_tipo_programa= tp.id_tipo_programa
        JOIN administrativo.psg_unidad u ON u.id_unidad = pp.id_unidad
        WHERE (1=1)";

        $sql = trim($sql) . buscador_semantico($buscar_registros, $buscar_campo) . " and (i.estado_inscripcion = 'REGISTRADO' or i.estado_inscripcion = 'CONFIRMADO' or i.estado_inscripcion = 'INSCRITO' or i.estado_inscripcion = 'OBSERVADO') ORDER BY i.fecha_inscripcion DESC  LIMIT '$limite' OFFSET '$inicio'";
        return  $this->db->query($sql)->result_array();
    }
}
