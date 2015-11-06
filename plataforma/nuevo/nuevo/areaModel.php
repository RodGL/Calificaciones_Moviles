<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/areaPojo.php'; //busca el archivo depto_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class AreaModel extends CI_Model {

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
     * @param <String> $idarea
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idarea = '') {
        $qry = null;
        if (empty($idarea)) { //verifica si hay una usuario en específico
            $qry = $this->db->get('area'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('area', array('id_area' => $idarea));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $area = new AreaPojo();
            
            $area->setId_area($reg->id_area);
            $area->setNombre($reg->nombre);
            $area->setDescripcion($reg->descripcion);
            $area->setEstatus($reg->estatus);
            array_push($data, $area);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param AreaPojo $usuario El objeto depto
     */
    public function insert($area) {
        if ($area instanceof AreaPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "id_area" => $area->getId_area(),
                "nombre" => $area->getNombre(),
                "descripcion" => $area->getDescripcion(),
                "estatus" => $area->getEstatus()
            );
            /* $var_a_validar = $usuario->getUsername();
              $var_a_validar1 = $usuario->getNocontrol();
              $var_a_validar2 = $usuario->getCurp();
              $existe = mysql_num_rows(mysql_query("SELECT username FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar'"));
              $existe1 = mysql_num_rows(mysql_query("SELECT nocontrol FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar1'"));
              $existe2 = mysql_num_rows(mysql_query("SELECT curp FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar2'")); */
            //if ($existe == 0 & $existe1 == 0 & $existe2) {
            $comando = $this->db->insert_string("area", $datos);
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
     * @param <type> $idarea Identificador del depto.
     */
    public function desactiva($idarea) {
//Verifica que no vaya vacío.
        if (isset($idarea)) {
            $stmtDelete = "UPDATE `area` SET `estatus`= 2  where id_area = " . $idarea;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idarea) {
//Verifica que no vaya vacío.
        if (isset($idarea)) {
            $stmtDelete = "UPDATE `area` SET `estatus`= 1  where id_area = " . $idarea;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param AreaPojo $usuario
     */
    public function update($area) {
        if ($area instanceof AreaPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                //"iduser" => $usuario->getIduser(),
                "nombre" => $area->getNombre(),
                "descripcion" => $area->getDescripcion(),
                "estatus" => $area->getEstatus()
            );

            $where = "id_area = " . $area->getId_area();
            $comando = $this->db->update_string('area', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Método que devuelve un depto  en especifico
     * @param type $idarea
     * @return array
     */
    public function extrae($idarea) {
        $this->db->select('*');
        $this->db->from('area');
        $this->db->where('id_area', $idarea);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $area = new AreaPojo();
            $area->setId_area($reg->id_area);
            $area->setNombre($reg->nombre);
            $area->setDescripcion($reg->descripcion);
            $area->setEstatus($reg->estatus);
            array_push($data, $area);
        }

        return $data;
    }

   

}

?>
