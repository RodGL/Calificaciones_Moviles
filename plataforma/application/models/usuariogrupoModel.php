<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/usuariogrupoPojo.php'; //busca el archivo grupo_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para grupo.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class usuariogrupoModel extends CI_Model {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
//Carga el acceso configurada en application|config|database.php
        $this->load->database();
    }

    /**
     * Método que extrae todos los grupos.
     * @param <String> $idug
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idug = '') {
        $qry = null;
        if (empty($idug)) { //verifica si hay una área en específico
            $qry = $this->db->get('1211100255_usuario_grupo'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('1211100255_usuario_grupo', array('idug' => $idug));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $usuario_grupo = new UsuariogrupoPojo();
            $usuario_grupo->setIdug($reg->idug);
            $usuario_grupo->setUsuario($reg->usuario);
            $usuario_grupo->setGrupo($reg->grupo);
            array_push($data, $usuario_grupo);
        }
        return $data;
    }

    /**
     * Método que permite agregar un grupo a la BD.
     *
     * @param UsuariogrupoPojo $usuario_grupo El objeto grupo
     */
    public function insert($usuario_grupo) {
        if ($usuario_grupo instanceof UsuariogrupoPojo) { //Verifica si es un grupo a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idug" => $usuario_grupo->getIdug(),
                "usuario" => $usuario_grupo->getUsuario(),
                "grupo" => $usuario_grupo->getGrupo()
            );

            //$var_a_validar = $usuario_grupo->getNombre();
            //$existe = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_usuario_grupo WHERE usuario LIKE '$var_a_validar'"));
            //if ($existe == 0) {

            $comando = $this->db->insert_string("1211100255_usuario_grupo", $datos);
            $this->db->query($comando);
            return true;
            //} else {
            //  echo '<script language="javascript">alert("No puede insertar grupos con el mismo usuario");</script>';
            //return false;
            //}
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idug Identificador del grupo.
     */
    public function desactiva($idug) {
//Verifica que no vaya vacío.
        if (isset($idug)) {
            $stmtDelete = "UPDATE `1211100255_usuario_grupo` SET `status`= 2  where idug = " . $idug;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idug) {
//Verifica que no vaya vacío.
        if (isset($idug)) {
            $stmtDelete = "UPDATE `1211100255_usuario_grupo` SET `status`= 1  where idug = " . $idug;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param UsuariogrupoPojo $usuario_grupo
     */
    public function update($usuario_grupo) {
        if ($usuario_grupo instanceof UsuariogrupoPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "idug" => $usuario_grupo->getIdug(),
                "usuario" => $usuario_grupo->getUsuario(),
                "grupo" => $usuario_grupo->getGrupo()
            );

            $where = "idug = " . $usuario_grupo->getIdug();
            $comando = $this->db->update_string('1211100255_usuario_grupo', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Método que devuelve un grupo  en especifico
     * @param type $idug
     * @return array
     */
    public function extrae($idug) {
        $this->db->select('*');
        $this->db->from('1211100255_usuario_grupo');
        $this->db->where('idug', $idug);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $usuario_grupo = new UsuariogrupoPojo();

            $usuario_grupo->setIdug($reg->idug);
            $usuario_grupo->setUsuario($reg->usuario);
            $usuario_grupo->setGrupo($reg->grupo);
            array_push($data, $usuario_grupo);
        }

        return $data;
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idug Identificador del curso.
     */
    public function delete($idug) {
//Verifica que no vaya vacío.
        if (isset($idug)) {
            $stmtDelete = "Delete from 1211100255_usuario_grupo where idug = " . $idug;
            $this->db->query($stmtDelete);
        }
    }

}

?>
