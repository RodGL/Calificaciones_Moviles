<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/deptoPojo.php'; //busca el archivo depto_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class DeptoModel extends CI_Model {

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
     * @param <String> $iddepto
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($iddepto = '') {
        $qry = null;
        if (empty($iddepto)) { //verifica si hay una área en específico
            $qry = $this->db->get('1211100255_depto'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('1211100255_depto', array('iddepto' => $iddepto));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $depto = new DeptoPojo();
            $depto->setIddepto($reg->iddepto);
            $depto->setNombre($reg->nombre);
            $depto->setDescripcion($reg->descripcion);
            $depto->setStatus($reg->status);
            array_push($data, $depto);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param DeptoPojo $depto El objeto depto
     */
    public function insert($depto) {
        if ($depto instanceof DeptoPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "iddepto" => $depto->getIddepto(),
                "nombre" => $depto->getNombre(),
                "descripcion" => $depto->getDescripcion()
            );

            $var_a_validar = $depto->getNombre();

            $existe = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_depto WHERE nombre LIKE '$var_a_validar'"));

            if ($existe == 0) {

                $comando = $this->db->insert_string("1211100255_depto", $datos);
                $this->db->query($comando);
                return true;
            } else {

                echo '<script language="javascript">alert("No puede insertar deptos con el mismo nombre");</script>';
                return false;
            }
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $iddepto Identificador del depto.
     */
    public function desactiva($iddepto) {
//Verifica que no vaya vacío.
        if (isset($iddepto)) {
            $stmtDelete = "UPDATE `1211100255_depto` SET `status`= 2  where iddepto = " . $iddepto;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($iddepto) {
//Verifica que no vaya vacío.
        if (isset($iddepto)) {
            $stmtDelete = "UPDATE `1211100255_depto` SET `status`= 1  where iddepto = " . $iddepto;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param DeptoPojo $depto
     */
    public function update($depto) {
        if ($depto instanceof DeptoPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "iddepto" => $depto->getIddepto(),
                "nombre" => $depto->getNombre(),
                "descripcion" => $depto->getDescripcion()
            );

                $where = "iddepto = " . $depto->getIddepto();
                $comando = $this->db->update_string('1211100255_depto', $datos, $where);
                $this->db->query($comando);
        }
    }
    

    /**
     * Método que devuelve un depto  en especifico
     * @param type $iddepto
     * @return array
     */
    
    public function extrae($iddepto) {
        $this->db->select('*');
        $this->db->from('1211100255_depto');
        $this->db->where('iddepto', $iddepto);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $depto = new DeptoPojo();

            $depto->setIddepto($reg->iddepto);
            $depto->setNombre($reg->nombre);
            $depto->setDescripcion($reg->descripcion);
            $depto->setStatus($reg->status);

            array_push($data, $depto);
        }

        return $data;
    }

}

?>
