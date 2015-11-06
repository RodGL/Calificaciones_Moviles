<?php

require_once 'IModeloAbstracto.php';
require 'pojo/unidadPojo.php';

/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */
class UnidadModel extends CI_Model {

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
     * @param <String> $idunidad
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idunidad = '') {
        $qry = null;
        if (empty($idunidad)) { //verifica si hay una usuario en específico
            $qry = $this->db->get('unidad'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('unidad', array('id_unidad' => $idunidad));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $unidad = new UnidadPojo();

            $unidad->setId_unidad($reg->id_unidad);
            $unidad->setNombre($reg->nombre);
            $unidad->setDescripcion($reg->descripcion);
            $unidad->setEstatus($reg->estatus);
            array_push($data, $unidad);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param UnidadPojo $usuario El objeto depto
     */
    public function insert($unidad) {
        if ($unidad instanceof UnidadPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "id_unidad" => $unidad->getId_unidad(),
                "nombre" => $unidad->getNombre(),
                "descripcion" => $unidad->getDescripcion(),
                "estatus" => $unidad->getEstatus()
            );
            /* $var_a_validar = $usuario->getUsername();
              $var_a_validar1 = $usuario->getNocontrol();
              $var_a_validar2 = $usuario->getCurp();
              $existe = mysql_num_rows(mysql_query("SELECT username FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar'"));
              $existe1 = mysql_num_rows(mysql_query("SELECT nocontrol FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar1'"));
              $existe2 = mysql_num_rows(mysql_query("SELECT curp FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar2'")); */
            //if ($existe == 0 & $existe1 == 0 & $existe2) {
            $comando = $this->db->insert_string("unidad", $datos);
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
     * @param <type> $idunidad Identificador del depto.
     */
    public function desactiva($idunidad) {
//Verifica que no vaya vacío.
        if (isset($idunidad)) {
            $stmtDelete = "UPDATE `unidad` SET `estatus`= 2  where id_unidad = " . $idunidad;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idunidad) {
//Verifica que no vaya vacío.
        if (isset($idunidad)) {
            $stmtDelete = "UPDATE `unidad` SET `estatus`= 1  where id_unidad = " . $idunidad;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param UnidadPojo $usuario
     */
    public function update($unidad) {
        if ($unidad instanceof UnidadPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                //"iduser" => $usuario->getIduser(),
                "nombre" => $unidad->getNombre(),
                "descripcion" => $unidad->getDescripcion(),
                "estatus" => $unidad->getEstatus()
            );

            $where = "id_unidad = " . $unidad->getId_unidad();
            $comando = $this->db->update_string('unidad', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Método que devuelve un depto  en especifico
     * @param type $idunidad
     * @return array
     */
    public function extrae($idunidad) {
        $this->db->select('*');
        $this->db->from('unidad');
        $this->db->where('id_unidad', $idunidad);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $unidad = new UnidadPojo();
            $unidad->setId_unidad($reg->id_unidad);
            $unidad->setNombre($reg->nombre);
            $unidad->setDescripcion($reg->descripcion);
            $unidad->setEstatus($reg->estatus);
            array_push($data, $unidad);
        }

        return $data;
    }

}

?>
