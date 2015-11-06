<?php

require_once 'IModeloAbstracto.php';
require 'pojo/programaPojo.php';

/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */
class ProgramaModel extends CI_Model {

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
     * @param <String> $idprograma
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idprograma = '') {
        $qry = null;
        if (empty($idprograma)) { //verifica si hay una usuario en específico
            $qry = $this->db->get('programa'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('programa', array('idprograma' => $idprograma));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $programa = new ProgramaPojo();

            $programa->setIdprograma($reg->idprograma);
            $programa->setNombre($reg->nombre);
            $programa->setArea($reg->area);
            $programa->setDescripcion($reg->descripcion);
            $programa->setEstatus($reg->estatus);
            array_push($data, $programa);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param ProgramaPojo $usuario El objeto depto
     */
    public function insert($programa) {
        if ($programa instanceof ProgramaPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idprograma" => $programa->getIdprograma(),
                "nombre" => $programa->getNombre(),
                "area" => $programa->getArea(),
                "descripcion" => $programa->getDescripcion(),
                "estatus" => $programa->getEstatus()
            );
            /* $var_a_validar = $usuario->getUsername();
              $var_a_validar1 = $usuario->getNocontrol();
              $var_a_validar2 = $usuario->getCurp();
              $existe = mysql_num_rows(mysql_query("SELECT username FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar'"));
              $existe1 = mysql_num_rows(mysql_query("SELECT nocontrol FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar1'"));
              $existe2 = mysql_num_rows(mysql_query("SELECT curp FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar2'")); */
            //if ($existe == 0 & $existe1 == 0 & $existe2) {
            $comando = $this->db->insert_string("programa", $datos);
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
     * @param <type> $idprograma Identificador del depto.
     */
    public function desactiva($idprograma) {
//Verifica que no vaya vacío.
        if (isset($idprograma)) {
            $stmtDelete = "UPDATE `programa` SET `estatus`= 2  where idprograma = " . $idprograma;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idprograma) {
//Verifica que no vaya vacío.
        if (isset($idprograma)) {
            $stmtDelete = "UPDATE `programa` SET `estatus`= 1  where idprograma = " . $idprograma;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param ProgramaPojo $usuario
     */
    public function update($programa) {
        if ($programa instanceof ProgramaPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                //"iduser" => $usuario->getIduser(),
                "nombre" => $programa->getNombre(),
                "area" => $programa->getArea(),
                "descripcion" => $programa->getDescripcion(),
                "estatus" => $programa->getEstatus()
            );

            $where = "idprograma = " . $programa->getIdprograma();
            $comando = $this->db->update_string('programa', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Método que devuelve un depto  en especifico
     * @param type $idprograma
     * @return array
     */
    public function extrae($idprograma) {
        $this->db->select('*');
        $this->db->from('programa');
        $this->db->where('idprograma', $idprograma);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $programa = new ProgramaPojo();
            $programa->setIdprograma($reg->idprograma);
            $programa->setNombre($reg->nombre);
            $programa->setArea($reg->area);
            $programa->setDescripcion($reg->descripcion);
            $programa->setEstatus($reg->estatus);
            array_push($data, $programa);
        }

        return $data;
    }
    
    public function areas() {
        $this->db->order_by('id_area', 'asc');
        $areas = $this->db->get('area');
        if ($areas->num_rows() > 0) {
            return $areas->result();
        }
    }

}

?>
