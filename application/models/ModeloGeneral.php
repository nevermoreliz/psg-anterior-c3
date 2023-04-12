<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModeloGeneral extends CI_Model
{
    function Insertar($tabla, $datos)
    {
        $this->db->insert($tabla, $datos);
        if ($this->db->affected_rows() > 0) {
            $id = 0;
            try {
                $id = $this->db->insert_id();
            } catch (Exception $err) {
                $id = 0;
            }
            return $id;
        } else {
            return null;
        }
    }

    function Actualizar($tabla, $datos, $id_identificador, $id)
    {
        $this->db->where($id_identificador, $id);
        $this->db->update($tabla, $datos);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Actualizar2Paramentros($tabla, $datos, $id_identificador1, $id1, $id_identificador2, $id2)
    {
        $this->db->where($id_identificador1, $id1);
        $this->db->where($id_identificador2, $id2);
        $this->db->update($tabla, $datos);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Eliminar($tabla, $id_descriptivo, $id)
    {
        $consulta = "UPDATE " . $tabla . " SET estado = 'INACTIVO'  WHERE  " . $tabla . "." . $id_descriptivo . " = " . $id . ";";
        $query = $this->db->query($consulta);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return null;
        }
    }

    /*
    ACTUALIZAR EL MONTO TOTAL DEL FORMULARIO 01
    */
    function ActualizarMontoTotal($id_responsable_informacion, $id_formulario_02, $monto_total)
    {
        $consulta = "UPDATE epsilion_formulario_01, epsilion_formulario_02
                    SET epsilion_formulario_01.monto_total ='$monto_total'
                    WHERE
                    epsilion_formulario_02.id_formulario_01 = epsilion_formulario_01.id_formulario_01 AND
                    epsilion_formulario_02.estado = 'ACTIVO' AND
                    epsilion_formulario_02.estado = 'ACTIVO' AND
                    epsilion_formulario_01.id_formulario_responsable_informacion = '$id_responsable_informacion' AND
                    epsilion_formulario_02.id_formulario_02 = '$id_formulario_02'";
        $query = $this->db->query($consulta);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return null;
        }
    }

    /**
     * FUNCCION PARA LA ELIMINACION DE LA RAIZ
     */

    function Eliminacion($tabla, $id_descriptivo, $id)
    {
        $this->db->where($id_descriptivo, $id);
        $this->db->delete($tabla);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function CorrelativoFormulario($tipo_formulario = '002')
    {
        $this->db->select_max('correlativo_formulario');
        $query = $this->db->get_where('financiero.psg_emision_formulario', array('tipo_formulario' => $tipo_formulario));
        $correlativo_formulario = $query->row_array()['correlativo_formulario'];
        return (is_null($correlativo_formulario) ? 1 : intval($correlativo_formulario) + 1);
    }
}
