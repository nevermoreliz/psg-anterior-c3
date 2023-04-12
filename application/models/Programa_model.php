<?php defined('BASEPATH') or exit('No direct script access allowed');

class Programa_model extends PSG_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla multimedia_persona.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * $this->output->enable_profiler(TRUE);
     * print_r($this->db->last_query());
     * 
     */

    public function planificacion_programa($accion, $condicion = null, $datos = null, $buscar = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('planificacion_programa', $condicion) : $this->db->get('planificacion_programa');
                break;
            case 'insert':
                return ($this->db->insert('planificacion_programa', $datos) ? $this->db->insert_id(('academico.psg_planificacion_programa_id_planificacion_programa_seq')) : $this->db->error());
                break;
            case 'update':
                return ($this->db->update('planificacion_programa', $datos, $condicion)) ? true : $this->db->error();
                break;
            case 'delete':
                return ($this->db->delete('planificacion_programa', $condicion)) ? true : $this->db->error();
                break;
            case 'search':
                $this->db->where("unaccent(lower(nombre_programa)) like unaccent('%" . mb_convert_case(trim($buscar['cadena']), MB_CASE_LOWER) . "%')");
                unset($buscar['cadena']);
                $this->db->where($buscar);
                return $this->db->get('planificacion_programa')->result_array();
                break;
        }
    }

    public function modulo_programa($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('modulo_programa', $condicion)->result_array() : $this->db->get('modulo_programa')->result_array();
                break;
            case 'insert':
                return ($this->db->insert('modulo_programa', $datos) ? $this->db->insert_id(('academico.psg_modulo_programa_id_modulo_programa_seq')) : $this->db->error());
                break;
            case 'update':
                return ($this->db->update('modulo_programa', $datos, $condicion)) ? true : $this->db->error();
                break;
        }
    }

    public function tipo_programa($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('tipo_programa', $condicion)->result_array() : $this->db->get('tipo_programa')->result_array();
                break;
        }
    }
    public function gestion($accion, $condicion = null, $datos = null, $orden = '')
    {
        $this->db->order_by($orden);
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('gestion', $condicion)->result_array() : $this->db->get('gestion')->result_array();
                break;
        }
    }

    public function unidad($accion, $condicion = null, $datos = null, $orden = '')
    {
        $this->db->order_by($orden);
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('unidad', $condicion)->result_array() : $this->db->get('unidad')->result_array();
                break;
        }
    }

    public function grado_academico($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('grado_academico', $condicion)->result_array() : $this->db->get('grado_academico')->result_array();
                break;
        }
    }

    public function tipo_modulo($accion, $condicion = null, $datos = null)
    {
        switch ($accion) {
            case 'select':
                return is_array($condicion) ? $this->db->get_where('tipo_modulo', $condicion)->result_array() : $this->db->get('tipo_modulo')->result_array();
                break;
        }
    }
    public function listar_archivo_inscripcion($condicion, $orden = 'm.fecha_registro desc')
    {
        $this->db->select('*');
        $this->db->from('multimedia_planificacion_programa mpp');
        $this->db->join('multimedia m', 'm.id_multimedia = mpp.id_multimedia');

        if (is_array($condicion)) {
            $this->db->where($condicion);
        }
        $this->db->order_by($orden);
        return $this->db->get();
    }
    public function matriculados_programa($condicion = null)
    {
        $this->db->select('  p.id_persona,p.ci, p.expedido, p.paterno, p.materno, p.nombre, p.fecha_nacimiento, mg.registro_universitario,p.genero, p.celular, pp.id_planificacion_programa')
            ->from('persona p')
            ->join('posgraduante po', 'po.id_persona = p.id_persona')
            ->join('matricula_gestion mg', 'mg.id_persona = po.id_persona')
            ->join('planificacion_programa pp', 'pp.id_planificacion_programa = mg.id_planificacion_programa');
        $this->db->order_by('p.paterno, p.materno, p.nombre');
        return is_array($condicion) ? $this->db->where($condicion)->get() : $this->db->get();
    }

    public function listar_unidades($condicion, $orden = 'a.nombre_unidad desc')
    {
        $this->db->select('*');
        $this->db->order_by($orden);
        $this->db->from('administrativo.psg_unidad a');
        $this->db->join('administrativo.psg_sede b', 'a.id_sede = b.id_sede', 'left');
        return is_array($condicion) ? $this->db->where($condicion)->get() : $this->db->get();
    }

    public function gestion_matriculados_programa($condicion)
    {
        $this->db->select("*");
        $this->db->from('academico.psg_matricula_gestion a');
        $this->db->join('academico.psg_gestion b', 'a.id_gestion = b.id_gestion');
        return is_array($condicion) ? $this->db->where($condicion)->get() : $this->db->get();
    }

    public function asignaciones_modulo_docente($condicion = null, $condicion_negada = null, $orden = '')
    {
        $this->db->select('*');
        $this->db->from('planificacion_programa ppr');
        $this->db->join('modulo_programa mp', 'mp.id_planificacion_programa = ppr.id_planificacion_programa');
        $this->db->join('asignacion_modulo_programa amp', 'amp.id_modulo_programa = mp.id_modulo_programa', 'left');
        $this->db->join('grado_academico pga', 'pga.id_grado_academico = ppr.id_grado_academico');
        $this->db->join('psg_tipo_programa ptp', 'ptp.id_tipo_programa = ppr.id_tipo_programa');
        $this->db->join('persona pe', 'pe.id_persona = amp.id_persona', 'left');

        if (is_array($condicion) && is_array($condicion_negada)) {
            $this->db->or_where($condicion_negada);
            $this->db->where($condicion);
        } elseif (is_array($condicion)) $this->db->where($condicion);
        else $this->db->or_where($condicion_negada);
        $this->db->order_by($orden);
        return $this->db->get();
    }

    public function listado_programa_modulos($condicion)
    {
        $this->db->select('ppr.id_planificacion_programa,ppr.id_programa,ppr.id_gestion,ppr.id_unidad,ppr.id_tipo_programa,
                            ppr.id_grado_academico,ppr.nombre_programa,ppr.mencion_programa,ppr.numero_version,ppr.nominacion_titulo,
                            ppr.fecha_inicio,ppr.fecha_fin,ppr.costo_colegiatura,ppr.costo_matricula,ppr.descripcion_programa,
                            ppr.observacion_programa,ppr.id_usuario,ppr.fecha_registro_programa,ppr.estado_programa,b.nombre_tipo_programa,
                            b.estado_tipo_programa,c.jerarquia,c.abreviatura,c.descripcion_grado_academico,c.categoria_grado,
                            c.estado_grado,d.gestion,d.fecha_inicio_gestion,d.fecha_fin_gestion,d.descripcion_gestion,
                           
                            e.nombre_unidad,e.tipo_unidad,e.descripcion,e.id_sede,
                            e.id_usuario,e.fecha_registro_unidad,e.estado_unidad,f.denominacion_sede,f.descripcion_sede,
                            f.latitud,f.longitud,
                            (SELECT count(id_planificacion_programa) FROM "academico".psg_modulo_programa where id_planificacion_programa=ppr.id_planificacion_programa) as total,
                            (SELECT Count(mg.id_matricula_gestion)  FROM  academico.psg_planificacion_programa AS pp  INNER JOIN academico.psg_matricula_gestion AS mg ON mg.id_planificacion_programa = pp.id_planificacion_programa  WHERE pp.id_planificacion_programa=ppr.id_planificacion_programa) as matriculados');
        $this->db->from('academico.psg_planificacion_programa ppr');
        // $this->db->group_by('id_planificacion_programa');
        $this->db->join('academico.psg_tipo_programa b', 'ppr.id_tipo_programa = b.id_tipo_programa', 'left');
        $this->db->join("academico.psg_grado_academico c", "ppr.id_grado_academico = c.id_grado_academico", 'left');
        $this->db->join("academico.psg_gestion d", "ppr.id_gestion = d.id_gestion", 'left');
        //$this->db->join("academico.psg_modulo_programa g", "ppr.id_planificacion_programa = g.id_planificacion_programa", 'left');
        $this->db->join("administrativo.psg_unidad e", "ppr.id_unidad = e.id_unidad", 'left');
        $this->db->join("administrativo.psg_sede f", "e.id_sede = f.id_sede", 'left');
        $this->db->where($condicion);
        $this->db->order_by("fecha_registro_programa,gestion", "desc");

        return  $this->db->get()->result_array();
    }


    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla requisito_programa.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * 
     */
    public function requisito_programa($accion, $condicion, $datos)
    {
        switch ($accion) {
            case 'select':
                if (is_array($condicion)) {
                    $this->db->select('pp.id_planificacion_programa, pp.nombre_programa, rp.*, r.*');
                    $this->db->from('planificacion_programa pp');
                    $this->db->join('requisito_programa rp', 'rp.id_planificacion_programa = pp.id_planificacion_programa');
                    $this->db->join('requisito r', 'rp.id_requisito = r.id_requisito');
                    $this->db->join('tipo_requisito tp', 'tp.id_tipo_requisito = rp.id_tipo_requisito');
                    $this->db->where($condicion);
                    $this->db->order_by('estado_requisito', 'DESC');
                    return $this->db->get()->result_array();
                } else {
                    $this->db->select('pp.id_planificacion_programa, pp.nombre_programa, rp.*, r.*');
                    $this->db->from('planificacion_programa pp');
                    $this->db->join('requisito_programa rp', 'rp.id_planificacion_programa = pp.id_planificacion_programa');
                    $this->db->join('requisito r', 'rp.id_requisito = r.id_requisito');
                    $this->db->join('tipo_requisito tp', 'tp.id_tipo_requisito = rp.id_tipo_requisito');
                    $this->db->where($condicion);
                    $this->db->order_by('estado_requisito', 'DESC');
                    return $this->db->get()->result_array();
                }
                break;
            case 'insert':
                return ($this->db->insert('requisito_programa', $datos) ? $this->db->insert_id('administrativo.psg_requisito_programa_id_requisito_programa_seq') : $this->db->error());
                break;
            case 'update':
                return ($this->db->update('requisito_programa', $datos, $condicion)) ? TRUE : $this->db->error();
                break;
            case 'delete':
                break;
        }
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla requisito.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * 
     */
    public function requisito($accion, $condicion, $datos)
    {
        switch ($accion) {
            case 'select':
                if (is_array($condicion)) {
                    return $this->db->get_where('requisito', $condicion)->result_array();
                } else {
                    return $this->db->get('requisito')->result_array();
                }
                break;
            case 'insert':
                return ($this->db->insert('requisito', $datos) ? $this->db->insert_id('administrativo.psg_requisito_id_requisito_seq') : $this->db->error());
                break;
            case 'update':
                return ($this->db->update('requisito', $datos, $condicion)) ? TRUE : $this->db->error();
                break;
            case 'delete':
                break;
        }
    }

    /**
     * Uso      : Todas las funciones insert, delete, select, update a la tabla tipo_requisito.
     * Retorna  : Array
     * Campos   : $accion      : Se recibe un parametro de insert, delete, select, update. Hacia la tabla.
     *            $condicion   : Se recibe un array con las condiciones where que mandan desde el Controlador.
     *            $datos       : Se reciben datos si es para un insert o un update.
     * Error    : Si existiese un error de base de datos retorna  $this->db->error()
     * 
     */
    public function tipo_requisito($accion, $condicion, $datos)
    {
        switch ($accion) {
            case 'select':
                if (is_array($condicion)) {
                    return $this->db->get_where('tipo_requisito', $condicion)->result_array();
                } else {
                    return $this->db->get('tipo_requisito')->result_array();
                }
                break;
        }
    }

    public function listar_gestiones($condicion, $orden)
    {
        $this->db->where('estado_gestion', 'REGISTRADO');
        $this->db->order_by('id_gestion', 'desc');

        $query = $this->db->get('gestion');
        return $query->result_array();
    }

    public function listar_tipos_programas()
    {
        $this->db->where('estado_tipo_programa', 'ACTIVO');
        $query = $this->db->get('tipo_programa');
        return $query->result_array();
    }

    public function listar_grados_academicos()
    {
        $query = $this->db->get('grado_academico');
        return $query->result_array();
    }

    public function listar_programas_version()
    {
        $this->db->select('pp.nombre_programa , pp.numero_version , ga.descripcion_grado_academico');
        $this->db->from('planificacion_programa pp');
        $this->db->join('grado_academico ga', 'pp.id_grado_academico = ga.id_grado_academico');
        $this->db->order_by('pp.nombre_programa');
        return $this->db->get()->result_array();
    }

    public function insertar_programa($datos)
    {
        $this->db->insert('planificacion_programa', $datos);
        return $this->db->insert_id('academico.psg_planificacion_programa_gestio_id_planificacion_programa_seq');
    }

    public function reporte_listado_programa_modulos()
    {
        $this->db->select('ppr.id_planificacion_programa,ppr.id_programa,ppr.id_gestion, d.gestion ,ppr.id_unidad,ppr.id_tipo_programa,
                            ppr.id_grado_academico,ppr.nombre_programa,ppr.mencion_programa,ppr.numero_version,ppr.nominacion_titulo,
                            ppr.fecha_inicio,ppr.fecha_fin,ppr.costo_colegiatura,ppr.costo_matricula,ppr.descripcion_programa,
                            ppr.observacion_programa,ppr.id_usuario,ppr.fecha_registro_programa,ppr.estado_programa,b.nombre_tipo_programa,
                            b.estado_tipo_programa,c.jerarquia,c.abreviatura,c.descripcion_grado_academico,c.categoria_grado,
                            c.estado_grado,d.gestion,d.fecha_inicio_gestion,d.fecha_fin_gestion,d.descripcion_gestion,
                           
                            e.nombre_unidad,e.tipo_unidad,e.descripcion,e.id_sede,
                            e.id_usuario,e.fecha_registro_unidad,e.estado_unidad,f.denominacion_sede,f.descripcion_sede,
                            f.latitud,f.longitud,
                            (SELECT count(id_planificacion_programa) FROM "academico".psg_modulo_programa where id_planificacion_programa=ppr.id_planificacion_programa) as total,
                            (SELECT Count(mg.id_matricula_gestion)  FROM  academico.psg_planificacion_programa AS pp  INNER JOIN academico.psg_matricula_gestion AS mg ON mg.id_planificacion_programa = pp.id_planificacion_programa  WHERE pp.id_planificacion_programa=ppr.id_planificacion_programa) as matriculados');
        $this->db->from('academico.psg_planificacion_programa ppr');
        // $this->db->group_by('id_planificacion_programa');
        $this->db->join('academico.psg_tipo_programa b', 'ppr.id_tipo_programa = b.id_tipo_programa', 'left');
        $this->db->join("academico.psg_grado_academico c", "ppr.id_grado_academico = c.id_grado_academico", 'left');
        $this->db->join("academico.psg_gestion d", "ppr.id_gestion = d.id_gestion", 'left');
        //$this->db->join("academico.psg_modulo_programa g", "ppr.id_planificacion_programa = g.id_planificacion_programa", 'left');
        $this->db->join("administrativo.psg_unidad e", "ppr.id_unidad = e.id_unidad", 'left');
        $this->db->join("administrativo.psg_sede f", "e.id_sede = f.id_sede", 'left');
        $this->db->order_by("fecha_registro_programa,gestion", "desc");

        return  $this->db->get();
    }
    public function reporte_listado_matriculados()
    {
        $this->db->select('mg.numero_matricula , mg.fecha_matriculacion , p.paterno, p.materno, p.nombre, pp.nombre_programa, pp.numero_version');
        $this->db->from('principal.psg_persona p');
        $this->db->join('academico.psg_posgraduante po', 'po.id_persona = p.id_persona');
        $this->db->join('academico.psg_matricula_gestion mg', 'mg.id_persona = po.id_persona');
        $this->db->join('academico.psg_planificacion_programa pp', 'pp.id_planificacion_programa = mg.id_planificacion_programa');
        $this->db->order_by('pp.nombre_programa, p.paterno, p.materno, p.nombre');
        $this->db->limit(50);
        return $this->db->get();
    }
}
