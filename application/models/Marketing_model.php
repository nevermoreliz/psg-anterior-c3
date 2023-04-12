<?php defined('BASEPATH') or exit('No direct script access allowed');
/**  
 *  Institucion: Posgrado
 *  Sistema: PSG
 *  Módulo: Marketing
 *  Descripción: (del controlador) 
 *  @author: jhonatan flores team psg
 *  Fecha: 13/05/2020
 **/
class Marketing_model extends PSG_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    /** Verifica si una persona ya esta inscrita a un programa TODO:funcional */
    public function persona_inscrita($condicion)
    {
        $this->db->select('*');
        $this->db->from('persona p');
        $this->db->join(
            'inscripcion ins',
            'ins.id_persona = p.id_persona'
        );
        $this->db->join(
            'planificacion_programa pp',
            'pp.id_planificacion_programa = ins.id_planificacion_programa'
        );
        $this->db->where($condicion);
        return $this->db->get()->row();
    }

    /** listar todas las publicaciones con imagen principal
     *  1.- si no tiene condicion = listara todos las publicaciones sea vigente o no
     *  2.- si tiene condicion listara segun la condicion dada (TODO:funcional)
     */
    public function listar_publicacion($condicion = null)
    {
        /* $this->db->select('*'); */
        if ($condicion == null) {
            $this->db->select(
                'pub.id_publicacion,
                 pp.id_planificacion_programa, 
                 pp.nombre_programa,
                 s.denominacion_sede,
                 pp.id_unidad,
                 ua.nombre_unidad,
                 ua.tipo_unidad,
                 pp.id_gestion,
                 g.gestion,
                 pp.id_grado_academico,
                 ga.abreviatura,
                 ga.descripcion_grado_academico,
                 pp.id_tipo_programa,
                 tp.nombre_tipo_programa,
                 pp.numero_version,
                 pp.fecha_inicio,
                 pp.fecha_fin,
                 pp.costo_matricula,
                 pp.costo_colegiatura,
                 pp.descuento_individual,
                 pp.descuento_grupal,
                 pub.fecha_fin_descuento,
                 pp.estado_programa,
                 m.nombre_archivo,
                 m.ruta_archivo,
                 pp.celular_ref,
                 pp.telefono_ref,
                 pp.horario,
                 pp.creditaje,
                 pp.dirigido_a,
                 pp.duracion,
                 pp.objetivo_programa,
                 pp.requisitos,
                 pp.contenido,
                 pp.resumen,                 
                 pp.titulacion_intermedia,
                 pub.fecha_inicio_publicidad,
                 pub.fecha_fin_publicidad,               
                 pub.estado_publicacion,'
            );
            $this->db->from('publicacion pub');
            $this->db->join(
                'planificacion_programa pp',
                'pp.id_planificacion_programa = pub.id_planificacion_programa'
            );
            $this->db->join(
                'unidad ua',
                'ua.id_unidad = pp.id_unidad'
            );
            $this->db->join(
                'sede s',
                's.id_sede = ua.id_sede'
            );
            $this->db->join(
                'gestion g',
                'g.id_gestion = pp.id_gestion'
            );
            $this->db->join(
                'tipo_programa tp',
                'tp.id_tipo_programa = pp.id_tipo_programa'
            );
            $this->db->join(
                'grado_academico ga',
                'ga.id_grado_academico = pp.id_grado_academico'
            );
            $this->db->join(
                'multimedia_publicacion mp',
                'mp.id_publicacion = pub.id_publicacion'
            );
            $this->db->join(
                'multimedia m',
                'm.id_multimedia = mp.id_multimedia'
            );
            // $this->db->join(
            //     'detalle_programa dp',
            //     'pp.id_planificacion_programa = dp.id_planificacion_programa'
            // );
            $this->db->where('mp.img_principal', 1);
            $this->db->order_by('pp.nombre_programa');
            return $this->db->get()->result();
        } else {
            $this->db->select(
                'pub.id_publicacion,
                 pp.id_planificacion_programa, 
                 pp.nombre_programa,
                 s.denominacion_sede,
                 pp.id_unidad,
                 ua.nombre_unidad,
                 ua.tipo_unidad,
                 pp.id_gestion,
                 g.gestion,
                 pp.id_grado_academico,
                 ga.abreviatura,
                 ga.descripcion_grado_academico,
                 pp.id_tipo_programa,
                 tp.nombre_tipo_programa,
                 pp.numero_version,
                 pp.fecha_inicio,
                 pp.fecha_fin,
                 pp.costo_matricula,
                 pp.costo_colegiatura,
                 pp.descuento_individual,
                 pp.descuento_grupal,
                 pub.fecha_fin_descuento,
                 pp.estado_programa,
                 m.nombre_archivo,
                 m.ruta_archivo,
                 pp.celular_ref,
                 pp.telefono_ref,
                 pp.horario,
                 pp.creditaje,
                 pp.dirigido_a,
                 pp.duracion,
                 pp.objetivo_programa,
                 pp.requisitos,
                 pp.contenido,
                 pp.resumen,                 
                 pp.titulacion_intermedia,
                 pub.fecha_inicio_publicidad,
                 pub.fecha_fin_publicidad,               
                 pub.estado_publicacion,'
            );
            $this->db->from('publicacion pub');
            $this->db->join(
                'planificacion_programa pp',
                'pp.id_planificacion_programa = pub.id_planificacion_programa'
            );
            $this->db->join(
                'unidad ua',
                'ua.id_unidad = pp.id_unidad'
            );
            $this->db->join(
                'sede s',
                's.id_sede = ua.id_sede'
            );
            $this->db->join(
                'gestion g',
                'g.id_gestion = pp.id_gestion'
            );
            $this->db->join(
                'tipo_programa tp',
                'tp.id_tipo_programa = pp.id_tipo_programa'
            );
            $this->db->join(
                'grado_academico ga',
                'ga.id_grado_academico = pp.id_grado_academico'
            );
            $this->db->join(
                'multimedia_publicacion mp',
                'mp.id_publicacion = pub.id_publicacion'
            );
            $this->db->join(
                'multimedia m',
                'm.id_multimedia = mp.id_multimedia'
            );
            // "(pub.estado_publicacion='PUBLICADO' OR pub.estado_publicacion='INFORMACIONES') AND mp.img_principal=1"
            $this->db->where($condicion);

            $this->db->order_by('pp.nombre_programa');

            return $this->db->get()->result();
        }
    }

    // condicion : resive datos en array o variable
    public function listar_imagenes_programa($condicion)
    {
        /* $this->db->select('*'); */

        $this->db->select(
            'pub.id_publicacion,
             pp.id_planificacion_programa,
             ar.img_principal, 
             m.nombre_archivo '
        );
        $this->db->from('publicacion pub');
        $this->db->join(
            'planificacion_programa pp',
            'pp.id_planificacion_programa = pub.id_planificacion_programa'
        );
        $this->db->join(
            'unidad ua',
            'ua.id_unidad = pp.id_unidad'
        );
        $this->db->join(
            'tipo_programa tp',
            'tp.id_tipo_programa = pp.id_tipo_programa'
        );
        $this->db->join(
            'grado_academico ga',
            'ga.id_grado_academico = pp.id_grado_academico'
        );
        $this->db->join(
            'archivo ar',
            'ar.id_publicacion = pub.id_publicacion'
        );
        $this->db->join(
            'multimedia m',
            'm.id_multimedia = ar.id_multimedia'
        );
        // $this->db->where('ar.id_publicacion', $id_publicacion);
        // $this->db->where('ar.img_principal', 1);
        $this->db->where($condicion);
        $this->db->order_by('pp.nombre_programa');
        return $this->db->get()->result_array();
    }

    // listar las etiquetas (TODO:funcional)
    public function listar_etiquetas()
    {
        /* $this->db->select('*'); */
        $this->db->select(
            'epp.id_etiqueta_planificacion_programa,
             epp.id_etiqueta,
             e.nombre_etiqueta,
             epp.id_planificacion_programa,
             e.estado_etiqueta'
        );

        $this->db->from('etiqueta_planificacion_programa epp');
        $this->db->join(
            'etiqueta e',
            'e.id_etiqueta = epp.id_etiqueta'
        );
        $this->db->order_by('e.nombre_etiqueta');
        return $this->db->get()->result();
    }

    public function listar_archivo_inscripcion($condicion = null, $condicion_no_en = null, $fila = 'result', $orden = '')
    {
        $this->db->select('m.id_multimedia, m.nombre_archivo, m.ruta_archivo, m.etiqueta, m.estado_archivo, mp.id_multimedia_persona, mpp.id_multimedia_pago_programa');
        $this->db->from('inscripcion i');
        $this->db->join('persona p', 'p.id_persona = i.id_persona');
        $this->db->join('multimedia_persona mp', 'mp.id_persona = p.id_persona', 'left');
        $this->db->join('multimedia_pago_programa mpp', 'mpp.id_inscripcion = i.id_inscripcion', 'left');
        // $this->db->join('multimedia m', 'm.id_multimedia = mpp.id_multimedia', 'left');
        $this->db->join('multimedia m', 'm.id_multimedia = mpp.id_multimedia OR m.id_multimedia = mp.id_multimedia ', 'left');

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

        $this->db->order_by($orden);
        if ($fila == 'row')
            return $this->db->get()->row();
        else if ($fila == 'result')
            return $this->db->get()->result();
    }



    // comprobar_programa (TODO:funcional)
    public function comprobar_programa($condicion)
    {
        $this->db->select('*');
        $this->db->from('publicacion pub');
        $this->db->join(
            'planificacion_programa programa',
            'programa.id_planificacion_programa = pub.id_planificacion_programa'
        );
        $this->db->where($condicion);
        return $this->db->get()->row();
    }
}
