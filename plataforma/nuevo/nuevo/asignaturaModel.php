<?php

require_once 'IModeloAbstracto.php';
require 'pojo/asignaturaPojo.php';

/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */
class AsignaturaModel extends CI_Model {

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
     * @param <String> $idasignatura
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idasignatura = '') {
        $qry = null;
        if (empty($idasignatura)) { //verifica si hay una usuario en específico
            $qry = $this->db->get('asignatura'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('asignatura', array('id_asignatura' => $idasignatura));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $asignatura = new AsignaturaPojo();

            $asignatura->setId_asignatura($reg->id_asignatura);
            $asignatura->setNombre($reg->nombre);
            $asignatura->setCuatrimestre($reg->cuatrimestre);
            $asignatura->setDescripcion($reg->descripcion);
            $asignatura->setEstatus($reg->estatus);
            array_push($data, $asignatura);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param AsignaturaPojo $usuario El objeto depto
     */
    public function insert($asignatura) {
        if ($asignatura instanceof AsignaturaPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "id_asignatura" => $asignatura->getId_asignatura(),
                "nombre" => $asignatura->getNombre(),
                "cuatrimestre" => $asignatura->getCuatrimestre(),
                "descripcion" => $asignatura->getDescripcion(),
                "estatus" => $asignatura->getEstatus()
            );
            /* $var_a_validar = $usuario->getUsername();
              $var_a_validar1 = $usuario->getNocontrol();
              $var_a_validar2 = $usuario->getCurp();
              $existe = mysql_num_rows(mysql_query("SELECT username FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar'"));
              $existe1 = mysql_num_rows(mysql_query("SELECT nocontrol FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar1'"));
              $existe2 = mysql_num_rows(mysql_query("SELECT curp FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar2'")); */
            //if ($existe == 0 & $existe1 == 0 & $existe2) {
            $comando = $this->db->insert_string("asignatura", $datos);
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
     * @param <type> $idasignatura Identificador del depto.
     */
    public function desactiva($idasignatura) {
//Verifica que no vaya vacío.
        if (isset($idasignatura)) {
            $stmtDelete = "UPDATE `asignatura` SET `estatus`= 2  where id_asignatura = " . $idasignatura;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idasignatura) {
//Verifica que no vaya vacío.
        if (isset($idasignatura)) {
            $stmtDelete = "UPDATE `asignatura` SET `estatus`= 1  where id_asignatura = " . $idasignatura;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param AsignaturaPojo $usuario
     */
    public function update($asignatura) {
        if ($asignatura instanceof AsignaturaPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                //"iduser" => $usuario->getIduser(),
                "nombre" => $asignatura->getNombre(),
                "cuatrimestre" => $asignatura->getCuatrimestre(),
                "descripcion" => $asignatura->getDescripcion(),
                "estatus" => $asignatura->getEstatus()
            );

            $where = "id_asignatura = " . $asignatura->getId_asignatura();
            $comando = $this->db->update_string('asignatura', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Método que devuelve un depto  en especifico
     * @param type $idasignatura
     * @return array
     */
    public function extrae($idasignatura) {
        $this->db->select('*');
        $this->db->from('asignatura');
        $this->db->where('id_asignatura', $idasignatura);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $asignatura = new AsignaturaPojo();
            $asignatura->setId_asignatura($reg->id_asignatura);
            $asignatura->setNombre($reg->nombre);
            $asignatura->setCuatrimestre($reg->cuatrimestre);
            $asignatura->setDescripcion($reg->descripcion);
            $asignatura->setEstatus($reg->estatus);
            array_push($data, $asignatura);
        }

        return $data;
    }
    
    public function cuatrimestres() {
        $this->db->order_by('idcuatrimestre', 'asc');
        $cuatrimestres = $this->db->get('cuatrimestre');
        if ($cuatrimestres->num_rows() > 0) {
            return $cuatrimestres->result();
        }
    }

}




?>
