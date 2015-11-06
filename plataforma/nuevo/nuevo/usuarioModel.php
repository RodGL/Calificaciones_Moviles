<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/usuarioPojo.php'; //busca el archivo depto_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para depto.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class UsuarioModel extends CI_Model {

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
            $qry = $this->db->get('usuario'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('usuario', array('idusuario' => $idusuario));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $usuario = new UsuarioPojo();
            $usuario->setIdusuario($reg->idusuario);
            $usuario->setPerfil($reg->perfil);
            $usuario->setUsername($reg->username);
            $usuario->setPassword($reg->password);
            
            $usuario->setNombre($reg->nombre);
            $usuario->setAppaterno($reg->appaterno);
            $usuario->setApmaterno($reg->apmaterno);
            $usuario->setFechanac($reg->fechanac);
            $usuario->setSexo($reg->sexo);
            $usuario->setCurp($reg->curp);
            $usuario->setImss($reg->imss);
            $usuario->setEdocivil($reg->edocivil);
            $usuario->setDescripcion($reg->descripcion);
            $usuario->setEstatus($reg->estatus);
            array_push($data, $usuario);
        }
        return $data;
    }

    /**
     * Método que permite agregar un depto a la BD.
     *
     * @param UsuarioPojo $usuario El objeto depto
     */
    public function insert($usuario) {
        if ($usuario instanceof UsuarioPojo) { //Verifica si es un depto a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idusuario" => $usuario->getIdusuario(),
                "perfil" => $usuario->getPerfil(),
                "username" => $usuario->getUsername(),
                
                "password" => $usuario->getPassword(),
                
                "nombre" => $usuario->getNombre(),
                "appaterno" => $usuario->getAppaterno(),
                "apmaterno" => $usuario->getApmaterno(),
                "fechanac" => $usuario->getFechanac(),
                "sexo" => $usuario->getSexo(),
                "curp" => $usuario->getCurp(),
                "imss" => $usuario->getImss(),
                "edocivil" => $usuario->getEdocivil(),
                "descripcion" => $usuario->getDescripcion(),
                "estatus" => $usuario->getEstatus()
            );
            /* $var_a_validar = $usuario->getUsername();
              $var_a_validar1 = $usuario->getNocontrol();
              $var_a_validar2 = $usuario->getCurp();
              $existe = mysql_num_rows(mysql_query("SELECT username FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar'"));
              $existe1 = mysql_num_rows(mysql_query("SELECT nocontrol FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar1'"));
              $existe2 = mysql_num_rows(mysql_query("SELECT curp FROM 1211100255_usuario WHERE nombre LIKE '$var_a_validar2'")); */
            //if ($existe == 0 & $existe1 == 0 & $existe2) {
            $comando = $this->db->insert_string("usuario", $datos);
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
            $stmtDelete = "UPDATE `usuario` SET `estatus`= 2  where idusuario = " . $idusuario;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idusuario) {
//Verifica que no vaya vacío.
        if (isset($idusuario)) {
            $stmtDelete = "UPDATE `usuario` SET `estatus`= 1  where idusuario = " . $idusuario;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param UsuarioPojo $usuario
     */
    public function update($usuario) {
        if ($usuario instanceof UsuarioPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                //"iduser" => $usuario->getIduser(),
                "perfil" => $usuario->getPerfil(),
                "username" => $usuario->getUsername(),
                "password" => $usuario->getPassword(),
                
                "nombre" => $usuario->getNombre(),
                "appaterno" => $usuario->getAppaterno(),
                "apmaterno" => $usuario->getApmaterno(),
                "fechanac" => $usuario->getFechanac(),
                "sexo" => $usuario->getSexo(),
                "curp" => $usuario->getCurp(),
                "imss" => $usuario->getImss(),
                "edocivil" => $usuario->getEdocivil(),
                "descripcion" => $usuario->getDescripcion(),
                "estatus" => $usuario->getEstatus()
            );

            $where = "idusuario = " . $usuario->getIdusuario();
            $comando = $this->db->update_string('usuario', $datos, $where);
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
        $this->db->from('usuario');
        $this->db->where('idusuario', $idusuario);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $usuario = new UsuarioPojo();
            $usuario->setIdusuario($reg->idusuario);
            $usuario->setPerfil($reg->perfil);
            $usuario->setUsername($reg->username);
            $usuario->setPassword($reg->password);
            
            $usuario->setNombre($reg->nombre);
            $usuario->setAppaterno($reg->appaterno);
            $usuario->setApmaterno($reg->apmaterno);
            $usuario->setFechanac($reg->fechanac);
            $usuario->setSexo($reg->sexo);
            $usuario->setCurp($reg->curp);
            $usuario->setImss($reg->imss);
            $usuario->setEdocivil($reg->edocivil);
            $usuario->setDescripcion($reg->descripcion);
            $usuario->setEstatus($reg->estatus);
            array_push($data, $usuario);
        }

        return $data;
    }

    public function edoscivil() {
        $this->db->order_by('idedocivil', 'asc');
        $edoscivil = $this->db->get('edocivil');
        if ($edoscivil->num_rows() > 0) {
            return $edoscivil->result();
        }
    }

}

?>
