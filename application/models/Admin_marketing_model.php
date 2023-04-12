<?php defined('BASEPATH') or exit('No direct script access allowed');
/**  
 *  Institucion: Posgrado
 *  Sistema: PSG
 *  Módulo: Marketing
 *  Descripción: (del controlador) 
 *  @author: jhonatan flores team psg
 *  Fecha: 13/05/2020
 **/
class Admin_marketing_model extends PSG_Model
{
    private $cadena;
    private $passw;
    private $longitud;

    public function __construct()
    {
        parent::__construct();
        $this->cadena = "ABCDEFGHIJLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $this->passw = "";
    }

    /**
     * Descripción  : 
     * 1.-  se encarga de generar un nombre aleatorio con la longitud dada
     * objetivo : para dar nombre a los archivos que se suben al servidor y no se dupliquen
     */
    public function GenerarP($long)
    {
        $longitud = strlen($this->cadena);
        $this->longitud = $long;

        for ($i = 0; $i <= $this->longitud; $i++) {
            $aleatorio = mt_rand(0, $longitud - 1);
            $this->passw .= substr($this->cadena, $aleatorio, 1);
        }

        $pass = $this->passw;
        $this->passw = "";

        return $pass;
    }

    // listar imagenes programa **
    public function listar_programa($condicion)
    {
        $this->db->select('*');
        $this->db->from('planificacion_programa pp');
        $this->db->join(
            'gestion ge',
            'ge.id_gestion = pp.id_gestion'
        );
        $this->db->join(
            'unidad ua',
            'ua.id_unidad = pp.id_unidad'
        );
        $this->db->join(
            'sede ss',
            'ss.id_sede = ua.id_sede'
        );
        $this->db->join(
            'tipo_programa tp',
            'tp.id_tipo_programa = pp.id_tipo_programa'
        );
        $this->db->join(
            'grado_academico ga',
            'ga.id_grado_academico = pp.id_grado_academico'
        );
        $this->db->where($condicion);
        return $this->db->get()->row();
    }


    // listar imagenes de una publicacion **
    public function listar_imagenes($condicion)
    {
        $this->db->select('*');
        $this->db->from('multimedia_publicacion mp');
        $this->db->join(
            'multimedia m',
            'm.id_multimedia = mp.id_multimedia'
        );
        $this->db->where($condicion);
        // $this->db->where("mp.img_principal= '1' OR mp.img_principal= '0'");
        // return $query = $this->db->get()->result();
        $query = $this->db->get();
        // return $query->num_rows();
        if ($query->num_rows() <= 1) {
            return $query->row();
        } else {
            return $query->result();
        }
    }

    // listar pdf **
    public function listar_pdf($condicion)
    {
        $this->db->select('*');
        $this->db->from('multimedia_publicacion mp');
        $this->db->join(
            'multimedia m',
            'm.id_multimedia = mp.id_multimedia'
        );
        $this->db->where($condicion);
        $this->db->where('mp.img_principal', 2);
        return $this->db->get()->row();
    }

    // eliminar un dato de una tabla **
    public function eliminar_fila_tabla($tabla, $condicion)
    {
        return ($this->db->delete($tabla, $condicion)) ? TRUE : $this->db->error;
    }

    public function listar_incripciones_participante($condicion = null, $orden = '')
    {
        $this->db->select('pe.id_persona,
        pe.paterno,
        pe.materno,
        pe.nombre,
        pe.ci,
        pe.estado_persona,
        pe.expedido,
        i.id_persona,
        i.id_planificacion_programa,
        i.fecha_inscripcion,
        i.numero_deposito_matricula,
        i.fecha_deposito_matricula,
        i.numero_deposito_cuota_inicial,
        i.fecha_deposito_inicial,
        i.fecha_revision,
        i.fecha_confirmacion,
        i.estado_inscripcion,
        pr.gestion_programa,
        pr.nombre_programa,
        pr.estado_programa,
        pr.nombre_tipo_programa,
        pr.descripcion_grado_academico,
        pr.numero_version,
        pr.nombre_unidad,
        pr.tipo_unidad,
        pr.denominacion_sede,
        pr.denominacion_programa,
        pr.descripcion_sede,
        pr.objetivo_programa,
        pr.abreviatura,
        pr.id_publicacion,
        m.ruta_archivo');
        $this->db->from('persona pe');
        $this->db->join('inscripcion i', 'i.id_persona = pe.id_persona');
        $this->db->join('vista_programas pr', 'pr.id_planificacion_programa = i.id_planificacion_programa');
        $this->db->join('multimedia_publicacion mp', 'pr.id_publicacion = mp.id_publicacion');
        $this->db->join('multimedia m', 'm.id_multimedia = mp.id_multimedia');

        if (is_array($condicion)) {
            $this->db->where($condicion);
            return $this->db->get();
        }
        return $this->db->get();
    }
}
