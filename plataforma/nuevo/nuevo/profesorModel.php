<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/profesorPojo.php'; //busca el archivo depto_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class ProfesorModel extends CI_Model {

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
     * @param <String> $idusuario
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idusuario = '') {
        $qry = null;
        if (empty($idusuario)) { //verifica si hay una usuario en específico
            $qry = $this->db->get('profesor'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('profesor', array('idempleado' => $idusuario));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $profesor= new ProfesorPojo();
            $profesor->setIdempleado($reg->idempleado);
            $profesor->setUsuario($reg->usuario);
            $profesor->setEstatus($reg->estatus);
            array_push($data, $profesor);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param UsuarioPojo $usuario El objeto depto
     */
    public function insert($usuario) {
        if ($usuario instanceof ProfesorPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idempleado" => $profesor->getIdempleado(),
                "usuario" => $profesor->getUsuario(),
                "estatus" => $profesor->getEstatus()
            );
            /* $var_a_validar = $usuario->getUsername();
              $var_a_validar1 = $usuario->getNocontrol();
              $var_a_validar2 = $usuario->getCurp();
              $existe = mysql_num_rows(mysql_query("SELECT username FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar'"));
              $existe1 = mysql_num_rows(mysql_query("SELECT nocontrol FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar1'"));
              $existe2 = mysql_num_rows(mysql_query("SELECT curp FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar2'")); */
            //if ($existe == 0 & $existe1 == 0 & $existe2) {
            $comando = $this->db->insert_string("profesor", $datos);
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
     * @param <type> $idusuario Identificador del depto.
     */
    public function desactiva($idusuario) {
//Verifica que no vaya vacío.
        if (isset($idusuario)) {
            $stmtDelete = "UPDATE `profesor` SET `estatus`= 2  where idempleado = " . $idusuario;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idusuario) {
//Verifica que no vaya vacío.
        if (isset($idusuario)) {
            $stmtDelete = "UPDATE `profesor` SET `estatus`= 1  where idempleado = " . $idusuario;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param UsuarioPojo $usuario
     */
    public function update($usuario) {
        if ($usuario instanceof ProfesorPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                //"iduser" => $usuario->getIduser(),
                "usuario" => $usuario->getUsuario(),
                "estatus" => $usuario->getEstatus()
            );

            $where = "idempleado = " . $usuario->getIdempleado();
            $comando = $this->db->update_string('profesor', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Método que devuelve un depto  en especifico
     * @param type $idusuario
     * @return array
     */
    public function extrae($idusuario) {
        $this->db->select('*');
        $this->db->from('profesor');
        $this->db->where('idempleado', $idusuario);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $profesor = new ProfesorPojo();
            $profesor->setIdempleado($reg->idempleado);
            $profesor->setUsuario($reg->usuario);
            $usuario->setEstatus($reg->estatus);
            array_push($data, $usuario);
        }

        return $data;
    }

    

}

?>
