<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModeloPsgFormulario extends CI_Model
{
    function ListaPersonas($buscar = "")
    {
        $consulta = "SELECT
                    principal.psg_persona.id_persona,
                    principal.psg_persona.id_persona_u,
                    principal.psg_persona.ci,
                    principal.psg_persona.email,
                    principal.psg_persona.expedido,
                    principal.psg_persona.nombre,
                    principal.psg_persona.paterno,
                    principal.psg_persona.materno,
                    principal.psg_persona.telefono,
                    principal.psg_persona.fecha_nacimiento,
                    principal.psg_persona.celular
                    FROM
                    principal.psg_persona
                    INNER JOIN academico.psg_docente ON principal.psg_persona.id_persona = academico.psg_docente.id_persona
                    ORDER BY fecha_registro_persona DESC";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ObtenerInformacionDocente($id_persona)
    {
        $consulta = "SELECT
                    principal.psg_persona.id_persona,
                    principal.psg_persona.id_persona_u,
                    principal.psg_persona.ci,
                    principal.psg_persona.expedido,
                    principal.psg_persona.email,
                    principal.psg_persona.nombre,
                    principal.psg_persona.paterno,
                    principal.psg_persona.materno,
                    principal.psg_persona.telefono,
                    principal.psg_persona.fecha_nacimiento,
                    principal.psg_persona.celular
                    FROM
                    principal.psg_persona
                    INNER JOIN academico.psg_docente ON principal.psg_persona.id_persona = academico.psg_docente.id_persona
                    WHERE
                    principal.psg_persona.id_persona = '$id_persona'";

        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->row();
        else return null;
    }

    function ListaTipoDocumento()
    {
        $consulta = "SELECT
                    psg_tipo_documento_academico.id_tipo_documento_academico,
                    psg_tipo_documento_academico.tipo
                    FROM
                    psg_tipo_documento_academico";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaUnidadAcademica()
    {
        $consulta = "SELECT
                    academico.psg_unidad_academica.id_unidad_academica,
                    academico.psg_unidad_academica.nombre_unidad_academica,
                    academico.psg_unidad_academica.sede_unidad_academica,
                    academico.psg_unidad_academica.tipo_unidad_academica,
                    academico.psg_unidad_academica.abreviatura
                    FROM
                    academico.psg_unidad_academica
                    WHERE
                    academico.psg_unidad_academica.estado_unidad_academica = 'ACTIVO'
                    ORDER BY
                    academico.psg_unidad_academica.tipo_unidad_academica DESC, academico.psg_unidad_academica.nombre_unidad_academica";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaGradoAcademico()
    {
        $consulta = "SELECT
                    academico.psg_grado_academico.id_grado_academico,
                    academico.psg_grado_academico.abreviatura
                    FROM
                    academico.psg_grado_academico
                    ORDER BY
                    academico.psg_grado_academico.jerarquia ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaModalidadTitulacion()
    {
        $consulta = "SELECT
                    academico.psg_modalidad_titulacion.id_modalidad_titulacion,
                    academico.psg_modalidad_titulacion.nombre_modalidad_titulacion
                    FROM
                    academico.psg_modalidad_titulacion
                    WHERE
                    academico.psg_modalidad_titulacion.estado_modalidad_titulacion = 'ACTIVO'
                    ORDER BY
                    academico.psg_modalidad_titulacion.nombre_modalidad_titulacion ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaTipoDocumentoAcademico()
    {
        $consulta = "SELECT
                    academico.psg_tipo_documento_academico.id_tipo_documento_academico,
                    academico.psg_tipo_documento_academico.tipo
                    FROM
                    academico.psg_tipo_documento_academico
                    WHERE
                    academico.psg_tipo_documento_academico.estado_tipo_documento = 'ACTIVO'";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaFormacionAcademicaPosgrado($id_persona = "")
    {
        $consulta = "SELECT
                    academico.psg_grado_academico_persona.id_grado_academico_persona,
                    academico.psg_grado_academico_persona.id_tipo_documento_academico,
                    academico.psg_tipo_documento_academico.tipo,
                    academico.psg_grado_academico_persona.numero_titulo,
                    academico.psg_grado_academico_persona.fecha_emision,
                    academico.psg_grado_academico_persona.id_unidad_academica,
                    academico.psg_unidad_academica.abreviatura AS abreviatura_unidad_academica,
                    academico.psg_grado_academico_persona.descripcion_grado_academico,
                    academico.psg_grado_academico_persona.id_grado_academico,
		    academico.psg_grado_academico.descripcion_grado_academico AS descripcion_grado,
                    academico.psg_grado_academico.abreviatura,
                    academico.psg_grado_academico_persona.id_modalidad_titulacion,
                    academico.psg_modalidad_titulacion.nombre_modalidad_titulacion,
                    academico.psg_grado_academico_persona.observacion,
                    academico.psg_grado_academico_persona.id_persona
                    FROM
                    academico.psg_grado_academico_persona
                    INNER JOIN academico.psg_unidad_academica ON academico.psg_unidad_academica.id_unidad_academica = academico.psg_grado_academico_persona.id_unidad_academica
                    INNER JOIN academico.psg_grado_academico ON academico.psg_grado_academico.id_grado_academico = academico.psg_grado_academico_persona.id_grado_academico
                    INNER JOIN academico.psg_tipo_documento_academico ON academico.psg_tipo_documento_academico.id_tipo_documento_academico = academico.psg_grado_academico_persona.id_tipo_documento_academico
                    INNER JOIN academico.psg_modalidad_titulacion ON academico.psg_modalidad_titulacion.id_modalidad_titulacion = academico.psg_grado_academico_persona.id_modalidad_titulacion
                    WHERE
                    academico.psg_grado_academico_persona.estado_grado_academico = 'ACTIVO' AND
                    academico.psg_grado_academico_persona.id_persona = '$id_persona'
                    ORDER BY
                    academico.psg_grado_academico.id_grado_academico DESC, psg_tipo_documento_academico.id_tipo_documento_academico";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaEjecicioDocenciaGradoDocenteExterno($id_persona = "")
    {
        $consulta = "SELECT
                    academico.psg_docencia_externo.id_docencia_externo,
                    academico.psg_docencia_externo.id_persona,
                    academico.psg_docencia_externo.id_unidad_academica,
                    academico.psg_unidad_academica.nombre_unidad_academica,
                    academico.psg_unidad_academica.abreviatura,
                    academico.psg_docencia_externo.descripcion_docencia_externo,
                    academico.psg_docencia_externo.carga_horaria,
                    academico.psg_docencia_externo.fecha_inicio_docencia,
                    academico.psg_docencia_externo.fecha_fin_docencia,
                    academico.psg_docencia_externo.area_docencia_docente_externo
                    FROM
                    academico.psg_docencia_externo
                    INNER JOIN academico.psg_unidad_academica ON academico.psg_unidad_academica.id_unidad_academica = academico.psg_docencia_externo.id_unidad_academica
                    WHERE
                    academico.psg_docencia_externo.estado_docencia_externo = 'ACTIVO' AND
                    academico.psg_docencia_externo.id_persona = '$id_persona'
                    ORDER BY
                    academico.psg_docencia_externo.id_docencia_externo ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaDJALCHActividadAcademica($id_persona = "")
    {
        $consulta = "SELECT
                    academico.psg_experiencia_profesional.id_experiencia_profesional,
                    academico.psg_experiencia_profesional.id_persona,
                    academico.psg_experiencia_profesional.institucion,
                    academico.psg_experiencia_profesional.cargo,
                    academico.psg_experiencia_profesional.materia,
                    academico.psg_experiencia_profesional.horas_mes,
                    academico.psg_experiencia_profesional.descripcion_experiencia_profesional,
                    academico.psg_experiencia_profesional.horario
                    FROM
                    academico.psg_experiencia_profesional
                    WHERE
                    academico.psg_experiencia_profesional.estado_experiencia_profesional = 'ACT_ACAD' AND
                    academico.psg_experiencia_profesional.id_persona = '$id_persona'
                    ORDER BY
                    academico.psg_experiencia_profesional.id_experiencia_profesional ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaDJALCHActividadLaboral($id_persona = "")
    {
        $consulta = "SELECT
                    academico.psg_experiencia_profesional.id_experiencia_profesional,
                    academico.psg_experiencia_profesional.id_persona,
                    academico.psg_experiencia_profesional.institucion,
                    academico.psg_experiencia_profesional.cargo,
                    academico.psg_experiencia_profesional.descripcion_experiencia_profesional,
                    academico.psg_experiencia_profesional.horario
                    FROM
                    academico.psg_experiencia_profesional
                    WHERE
                    academico.psg_experiencia_profesional.estado_experiencia_profesional = 'ACT_LAB' AND
                    academico.psg_experiencia_profesional.id_persona = '$id_persona'
                    ORDER BY
                    academico.psg_experiencia_profesional.id_experiencia_profesional ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaGestion()
    {
        $consulta = "SELECT
                    academico.psg_gestion.id_gestion,
                    academico.psg_gestion.gestion
                    FROM
                    academico.psg_gestion
                    WHERE
                    academico.psg_gestion.estado_gestion = 'ACTIVO'
                    ORDER BY
                    academico.psg_gestion.gestion DESC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaTipoPrograma()
    {
        $consulta = "SELECT
                    academico.psg_tipo_programa.id_tipo_programa,
                    academico.psg_tipo_programa.nombre_tipo_programa
                    FROM
                    academico.psg_tipo_programa
                    WHERE
                    academico.psg_tipo_programa.estado_tipo_programa = 'ACTIVO'";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaPrograma()
    {
        $consulta = "SELECT
                    *
                    FROM
                    academico.psg_planificacion_programa
                    WHERE
                    academico.psg_planificacion_programa.estado_programa = 'ACTIVO'";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ConsultarPrograma($id_gestion = '')
    {
        $consulta = "SELECT
                    academico.psg_planificacion_programa.id_planificacion_programa,
                    academico.psg_planificacion_programa.nombre_programa,
                    academico.psg_tipo_programa.id_tipo_programa,
                    academico.psg_tipo_programa.nombre_tipo_programa,
                    academico.psg_planificacion_programa.estado_programa,
                    academico.psg_planificacion_programa.id_gestion
                    FROM
                    academico.psg_planificacion_programa
                    INNER JOIN academico.psg_tipo_programa ON academico.psg_planificacion_programa.id_tipo_programa = academico.psg_tipo_programa.id_tipo_programa
                    WHERE
                    academico.psg_planificacion_programa.estado_programa = 'ACTIVO' 
		    " . ($id_gestion ? "AND academico.psg_planificacion_programa.id_gestion = '$id_gestion'" : "") . "
                    ORDER BY
                    academico.psg_planificacion_programa.nombre_programa ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaTipoModulo()
    {
        $consulta = "SELECT
                    academico.psg_tipo_modulo.id_tipo_modulo,
                    academico.psg_tipo_modulo.descripcion_tipo_modulo
                    FROM
                    academico.psg_tipo_modulo";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function ListaEjercicioDocenciaPosgrado($id_persona = "")
    {
        $consulta = "(SELECT
                    academico.psg_planificacion_programa.id_planificacion_programa,
                    academico.psg_planificacion_programa.id_gestion,
                    academico.psg_gestion.gestion,
                    administrativo.psg_unidad.nombre_unidad,
                    academico.psg_planificacion_programa.descripcion_programa,
                    academico.psg_asignacion_modulo_programa.fecha_inicio,
                    academico.psg_asignacion_modulo_programa.fecha_fin,
                    academico.psg_asignacion_modulo_programa.id_persona,
                    academico.psg_asignacion_modulo_programa.id_asignacion_modulo_programa,
                    academico.psg_modulo_programa.id_modulo_programa,
                    academico.psg_planificacion_programa.nombre_programa,
                    academico.psg_modulo_programa.nombre_modulo_programa,
                    academico.psg_asignacion_modulo_programa.paralelo,
                    academico.psg_modulo_programa.horas_academicas
                    FROM
                    academico.psg_asignacion_modulo_programa
                    INNER JOIN academico.psg_modulo_programa ON academico.psg_asignacion_modulo_programa.id_modulo_programa = academico.psg_modulo_programa.id_modulo_programa
                    INNER JOIN academico.psg_planificacion_programa ON academico.psg_modulo_programa.id_planificacion_programa = academico.psg_planificacion_programa.id_planificacion_programa
                    INNER JOIN academico.psg_gestion ON academico.psg_planificacion_programa.id_gestion = academico.psg_gestion.id_gestion
                    INNER JOIN administrativo.psg_unidad ON administrativo.psg_unidad.id_unidad = academico.psg_planificacion_programa.id_unidad
                    WHERE
                    academico.psg_asignacion_modulo_programa.estado_modulo_programa = 'ACTIVO' AND
                    academico.psg_asignacion_modulo_programa.id_persona = '" . $id_persona . "'
                    ORDER BY
                    academico.psg_asignacion_modulo_programa.id_asignacion_modulo_programa ASC)
                    UNION
                    (
                    SELECT
                    academico.psg_planificacion_programa.id_planificacion_programa,
                    academico.psg_planificacion_programa.id_gestion,
                    academico.psg_gestion.gestion,
                    administrativo.psg_unidad.nombre_unidad,
                    academico.psg_planificacion_programa.descripcion_programa,
                    NULL,
                    NULL,
                    administrativo.psg_asignacion_programa.id_persona,
                    administrativo.psg_asignacion_programa.id_asignacion_programa,
                    administrativo.psg_asignacion_programa.id_asignacion_programa,
                    academico.psg_planificacion_programa.nombre_programa,
                    administrativo.psg_asignacion_programa.tipo_asignacion,
                    administrativo.psg_asignacion_programa.descripcion_asignacion_programa,
                    administrativo.psg_asignacion_programa.horas_asignadas_coordinador
                    FROM
                    administrativo.psg_asignacion_programa
                    INNER JOIN academico.psg_planificacion_programa ON administrativo.psg_asignacion_programa.id_planificacion_programa = academico.psg_planificacion_programa.id_planificacion_programa
                    INNER JOIN academico.psg_gestion ON academico.psg_planificacion_programa.id_gestion = academico.psg_gestion.id_gestion
                    INNER JOIN administrativo.psg_unidad ON administrativo.psg_unidad.id_unidad = academico.psg_planificacion_programa.id_unidad
                    WHERE
                    administrativo.psg_asignacion_programa.estado_asignacion_programa = 'ACTIVO' AND
                    administrativo.psg_asignacion_programa.id_persona = '" . $id_persona . "'
                    ORDER BY
                    administrativo.psg_asignacion_programa.id_asignacion_programa ASC
                    )";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    /**
     * CURRICULUM
     */
    function Lista_tipo_capacitacion()
    {
        $consulta = "SELECT
                    academico.psg_tipo_capacitacion.id_tipo_capacitacion,
                    academico.psg_tipo_capacitacion.tipo_capacitacion
                    FROM
                    academico.psg_tipo_capacitacion
                    WHERE
                    academico.psg_tipo_capacitacion.estado_tipo_capacitacion = 'ACTIVO'
                    ORDER BY
                    academico.psg_tipo_capacitacion.tipo_capacitacion ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function Lista_capacitacion_personal($id_persona)
    {
        $consulta = "SELECT
                    academico.psg_capacitacion_persona.id_capacitacion_persona,
                    academico.psg_capacitacion_persona.id_persona,
                    academico.psg_capacitacion_persona.id_tipo_capacitacion,
                    academico.psg_tipo_capacitacion.tipo_capacitacion,
                    academico.psg_capacitacion_persona.nombre_capacitacion,
                    academico.psg_capacitacion_persona.institucion_capacitacion,
                    academico.psg_capacitacion_persona.horas_capacitacion,
                    academico.psg_capacitacion_persona.modalidad_capacitacion,
                    academico.psg_capacitacion_persona.calidad_participacion
                    FROM
                    academico.psg_capacitacion_persona
                    INNER JOIN academico.psg_tipo_capacitacion ON academico.psg_tipo_capacitacion.id_tipo_capacitacion = academico.psg_capacitacion_persona.id_tipo_capacitacion
                    WHERE
                    academico.psg_capacitacion_persona.estado_capacitacion_persona = 'ACTIVO' AND
                    academico.psg_capacitacion_persona.id_persona = '$id_persona'
                    ORDER BY
                    academico.psg_capacitacion_persona.id_capacitacion_persona ASC
                    ";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function Lista_tipo_produccion_intelectual()
    {
        $consulta = "SELECT
                    academico.psg_tipo_producion_intelectual.id_tipo_produccion_intelectual,
                    academico.psg_tipo_producion_intelectual.tipo
                    FROM
                    academico.psg_tipo_producion_intelectual
                    WHERE
                    academico.psg_tipo_producion_intelectual.estado_tipo_produccion = 'ACTIVO'
                    ORDER BY
                    academico.psg_tipo_producion_intelectual.tipo ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function Lista_produccion_intelectual($id_persona)
    {
        $consulta = "SELECT academico.psg_produccion_intelectual_persona.id_produccion_intelectual, academico.psg_produccion_intelectual_persona.id_persona, psg_produccion_intelectual_persona.id_tipo_produccion_intelectual, academico.psg_tipo_producion_intelectual.tipo, academico.psg_produccion_intelectual_persona.titulo_produccion, academico.psg_produccion_intelectual_persona.editorial_publicacion, academico.psg_produccion_intelectual_persona.anio_edicion, academico.psg_produccion_intelectual_persona.numero_paginas, psg_produccion_intelectual_persona.descripcion_produccion 
            FROM academico.psg_produccion_intelectual_persona 
            INNER JOIN academico.psg_tipo_producion_intelectual ON academico.psg_tipo_producion_intelectual.id_tipo_produccion_intelectual = psg_produccion_intelectual_persona.id_tipo_produccion_intelectual 
            WHERE academico.psg_produccion_intelectual_persona.estado_produccion = 'ACTIVO' 
            AND academico.psg_produccion_intelectual_persona.id_persona = '$id_persona' 
            ORDER BY academico.psg_produccion_intelectual_persona.id_produccion_intelectual ASC";
        //echo $consulta;exit;
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result();
        else return null;
    }

    function Formularios_emitidos($tipo_formulario, $id_persona)
    {
        $consulta = "SELECT
                    id_emision_formulario, id_persona, tipo_formulario, correlativo_formulario, 
       monto_formulario, fecha_emision_formulario, id_usuario, estado_formulario
                    FROM
                    financiero.psg_emision_formulario
                    WHERE tipo_formulario = '$tipo_formulario' AND id_persona = '$id_persona'
                    ORDER BY correlativo_formulario ASC";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->result_array();
        else return null;
    }

    function FormularioEmitido($id_emision_formulario)
    {
        $consulta = "SELECT
                    id_emision_formulario, id_persona, tipo_formulario, correlativo_formulario, 
       monto_formulario, fecha_emision_formulario, id_usuario, estado_formulario
                    FROM
                    financiero.psg_emision_formulario
                    WHERE id_emision_formulario = '$id_emision_formulario'";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) return $query->row_array();
        else return null;
    }
}
