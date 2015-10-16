<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/planPojo.php'; //busca el archivo plan_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class PlanModel extends CI_Model  {

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
     * @param <String> $idplan
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idplan = '') {
        $qry = null;
        if (empty($idplan)) { //verifica si hay una área en específico
            $qry = $this->db->get('1211100255_plan'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('1211100255_plan', array('idplan' => $idplan));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $plan = new PlanPojo();
            $plan->setIdplan($reg->idplan);
            $plan->setNombre($reg->nombre);
            $plan->setDescripcion($reg->descripcion);
            $plan->setStatus($reg->status);
            array_push($data, $plan);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param PlanPojo $plan El objeto depto
     */
    public function insert($plan) {
        if ($plan instanceof PlanPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idplan" => $plan->getIdplan(),
                "nombre" => $plan->getNombre(),
                "descripcion" => $plan->getDescripcion()
            );

            $var_a_validar = $plan->getNombre();

            $existe = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_plan WHERE nombre LIKE '$var_a_validar'"));

            if ($existe == 0) {

                $comando = $this->db->insert_string("1211100255_plan", $datos);
                $this->db->query($comando);
                return true;
            } else {

                echo '<script language="javascript">alert("No puede insertar planes de aprendizaje con el mismo nombre");</script>';
                return false;
            }
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idplan Identificador del depto.
     */
    public function desactiva($idplan) {
//Verifica que no vaya vacío.
        if (isset($idplan)) {
            $stmtDelete = "UPDATE `1211100255_plan` SET `status`= 2  where idplan = " . $idplan;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idplan) {
//Verifica que no vaya vacío.
        if (isset($idplan)) {
            $stmtDelete = "UPDATE `1211100255_plan` SET `status`= 1  where idplan = " . $idplan;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param PlanPojo $plan
     */
    public function update($plan) {
        if ($plan instanceof PlanPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "idplan" => $plan->getIdplan(),
                "nombre" => $plan->getNombre(),
                "descripcion" => $plan->getDescripcion()
            );

                $where = "idplan = " . $plan->getIdplan();
                $comando = $this->db->update_string('1211100255_plan', $datos, $where);
                $this->db->query($comando);
        }
    }
    

    /**
     * Método que devuelve un depto  en especifico
     * @param type $idplan
     * @return array
     */
    
    public function extrae($idplan) {
        $this->db->select('*');
        $this->db->from('1211100255_plan');
        $this->db->where('idplan', $idplan);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $plan = new PlanPojo();

            $plan->setIdplan($reg->idplan);
            $plan->setNombre($reg->nombre);
            $plan->setDescripcion($reg->descripcion);
            $plan->setStatus($reg->status);

            array_push($data, $plan);
        }

        return $data;
    }

}

?>
