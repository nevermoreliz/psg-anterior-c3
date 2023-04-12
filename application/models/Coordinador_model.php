<?php defined('BASEPATH') or exit('No direct script access allowed');
/**  
 *  Institucion: Posgrado
 *  Sistema: PSG
 *  Módulo: Marketing
 *  Descripción: (del controlador) 
 *  @author: jhonatan flores team psg
 *  Fecha: 13/05/2020
 **/
class Coordinador_model extends PSG_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function datos_publicaciones($id_publicacion = null, $condicion = null)
    {

        if (!is_null($id_publicacion) && is_null($condicion)) {
            $this->db->select("*,
            ( SELECT count(ins.*) AS count
            FROM psg_inscripcion ins
           WHERE ((ins.id_planificacion_programa = vp.id_planificacion_programa) AND (ins.estado_inscripcion = 'REGISTRADO'))) AS total_preinscritos,
           ( SELECT count(ins.*) AS count
            FROM psg_inscripcion ins
           WHERE ((ins.id_planificacion_programa = vp.id_planificacion_programa) AND (ins.estado_inscripcion = 'CONFIRMADO'))) AS total_confirmados,
           ( SELECT count(ins.*) AS count
            FROM psg_inscripcion ins
           WHERE ((ins.id_planificacion_programa = vp.id_planificacion_programa) AND (ins.estado_inscripcion = 'INSCRITO'))) AS total_inscritos");
            $this->db->from('vista_programas vp');
            $this->db->join(
                'multimedia_publicacion mp',
                'mp.id_publicacion = vp.id_publicacion'
            );
            $this->db->join(
                'multimedia m',
                'm.id_multimedia = mp.id_multimedia'
            );
            if (is_numeric($id_publicacion)) {

                $this->db->where(array('vp.id_publicacion' => $id_publicacion, 'mp.img_principal' => 1));
            } else {

                $this->db->where('now() BETWEEN vp.fecha_inicio_publicidad AND vp.fecha_fin_publicidad AND mp.img_principal = 1');
                if (!($id_publicacion === true)) {
                    $this->db->where('vp.id_publicacion IN (' . $id_publicacion . ')');
                }
            }
            // $query = $this->db->get('vista_programas');
            $query = $this->db->get();
            // $resultado = (($query) ? $query->result() : $this->db->error());
            $resultado = (($query) ? $query : $this->db->error());
        } elseif (!is_null($id_publicacion) && !is_null($condicion)) {
            $this->db->select("*,
            ( SELECT count(ins.*) AS count
            FROM psg_inscripcion ins
           WHERE ((ins.id_planificacion_programa = vp.id_planificacion_programa) AND (ins.estado_inscripcion = 'REGISTRADO'))) AS total_preinscritos,
           ( SELECT count(ins.*) AS count
            FROM psg_inscripcion ins
           WHERE ((ins.id_planificacion_programa = vp.id_planificacion_programa) AND (ins.estado_inscripcion = 'CONFIRMADO'))) AS total_confirmados,
           ( SELECT count(ins.*) AS count
            FROM psg_inscripcion ins
           WHERE ((ins.id_planificacion_programa = vp.id_planificacion_programa) AND (ins.estado_inscripcion = 'INSCRITO'))) AS total_inscritos");
            $this->db->from('vista_programas vp');
            $this->db->join(
                'multimedia_publicacion mp',
                'mp.id_publicacion = vp.id_publicacion'
            );
            $this->db->join(
                'multimedia m',
                'm.id_multimedia = mp.id_multimedia'
            );
            if (is_numeric($id_publicacion)) {

                $this->db->where(array('vp.id_publicacion' => $id_publicacion, 'mp.img_principal' => 1));
            } else {
                // $this->db->where('now() BETWEEN  vp.fecha_inicio_publicidad AND vp.fecha_fin_publicidad AND mp.img_principal = 1');
                $this->db->where('mp.img_principal = 1');
                if (!($id_publicacion === true)) {
                    $this->db->where("vp.id_publicacion IN (" . $id_publicacion . ") and (" . $condicion . ")");
                }
            }
            //$this->db->where($condicion);
            // $query = $this->db->get('vista_programas');
            $query = $this->db->get();
            // $resultado = (($query) ? $query->result() : $this->db->error());
            $resultado = (($query) ? $query : $this->db->error());
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function datos_preinscritos($id_publicacion = NULL)
    {
        if (is_numeric($id_publicacion)) {

            $this->db->select('*');
            $this->db->from('persona p');
            $this->db->join(
                'inscripcion ins',
                'ins.id_persona = p.id_persona'
            );
            $this->db->join(
                'publicacion pub',
                'pub.id_planificacion_programa = ins.id_planificacion_programa'
            );
            $this->db->where(['pub.id_publicacion' => $id_publicacion]);
            $query = $this->db->get();
            $resultado = (($query) ? $query : $this->db->error());
        } else {
            $resultado['code'] = 'info';
            $resultado['message'] = 'No se han encontrado programas asignados.';
        }
        return $resultado;
    }

    function actualizar_estado($datos)
    {
        if (is_array($datos)) {
            $this->db->where(array('id_preinscripcion' => $datos['id_preinscripcion']));
            $this->db->update('preinscripcion', $datos);
        }
    }

    function actualizar_paralelo($datos)
    {
        if (is_array($datos)) {
            $this->db->where(array('id_preinscripcion' => $datos['id_preinscripcion']));
            $this->db->update('preinscripcion', $datos);
        }
    }
}
