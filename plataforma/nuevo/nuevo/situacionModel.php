<?php

require_once 'IModeloAbstracto.php';
require 'pojo/situacionPojo.php';

/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */
class SituacionModel extends CI_Model {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
//Carga el acceso configurada en application|config|database.php
        $this->load->database();
    }

    /**
     * Método que extrae todos los deptos.
     * @param <String> $idsituacion
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idsituacion = '') {
        $qry = null;
        if (empty($idsituacion)) { //verifica si hay una usuario en específico
            $qry = $this->db->get('situacion'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('situacion', array('id_situacion' => $idsituacion));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $situacion = new SituacionPojo();

            $situacion->setId_situacion($reg->id_situacion);
            $situacion->setNombre($reg->nombre);
            $situacion->setDescripcion($reg->descripcion);
            $situacion->setEstatus($reg->estatus);
            array_push($data, $situacion);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param SituacionPojo $usuario El objeto depto
     */
    public function insert($situacion) {
        if ($situacion instanceof SituacionPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "id_situacion" => $situacion->getId_situacion(),
                "nombre" => $situacion->getNombre(),
                "descripcion" => $situacion->getDescripcion(),
                "estatus" => $situacion->getEstatus()
            );
            /* $var_a_validar = $usuario->getUsername();
              $var_a_validar1 = $usuario->getNocontrol();
              $var_a_validar2 = $usuario->getCurp();
              $existe = mysql_num_rows(mysql_query("SELECT username FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar'"));
              $existe1 = mysql_num_rows(mysql_query("SELECT nocontrol FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar1'"));
              $existe2 = mysql_num_rows(mysql_query("SELECT curp FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar2'")); */
            //if ($existe == 0 & $existe1 == 0 & $existe2) {
            $comando = $this->db->insert_string("situacion", $datos);
            $this->db->query($comando);
            return true; /*
              } else {
              echo '<script language="javascript">alert("No puede insertar usuarios con el mismo nombre, identificador o curp '
              . '");</script>';
              return false;
              } */
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idsituacion Identificador del depto.
     */
    public function desactiva($idsituacion) {
//Verifica que no vaya vacío.
        if (isset($idsituacion)) {
            $stmtDelete = "UPDATE `situacion` SET `estatus`= 2  where id_situacion = " . $idsituacion;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idsituacion) {
//Verifica que no vaya vacío.
        if (isset($idsituacion)) {
            $stmtDelete = "UPDATE `situacion` SET `estatus`= 1  where id_situacion = " . $idsituacion;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param SituacionPojo $usuario
     */
    public function update($situacion) {
        if ($situacion instanceof SituacionPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                //"iduser" => $usuario->getIduser(),
                "nombre" => $situacion->getNombre(),
                "descripcion" => $situacion->getDescripcion(),
                "estatus" => $situacion->getEstatus()
            );

            $where = "id_situacion = " . $situacion->getId_situacion();
            $comando = $this->db->update_string('situacion', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Método que devuelve un depto  en especifico
     * @param type $idsituacion
     * @return array
     */
    public function extrae($idsituacion) {
        $this->db->select('*');
        $this->db->from('situacion');
        $this->db->where('id_situacion', $idsituacion);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $situacion = new SituacionPojo();
            $situacion->setId_situacion($reg->id_situacion);
            $situacion->setNombre($reg->nombre);
            $situacion->setDescripcion($reg->descripcion);
            $situacion->setEstatus($reg->estatus);
            array_push($data, $situacion);
        }

        return $data;
    }

}

?>
