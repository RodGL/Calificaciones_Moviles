<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/participantePojo.php'; //busca el archivo grupo_pojo
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author Fabiola Santes Rodríguez santesrodriguezfabiola@gmail.com
 * @version 1.0
 */
class ParticipanteModel extends CI_Model  {

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
     * @param <String> $idGrupo
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($id = '') {
        $qry = null;
        if (empty($id)) { //verifica si hay una área en específico
            $qry = $this->db->get('1211100255_participante'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('1211100255_participante', array('idParticipante' => $id));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $participante = new ParticipantePojo();
            $participante->setId($reg->id);
            $participante->setNocontrol($reg->nocontrol);
            $participante->setNombre($reg->nombre);
            $participante->setAppaterno($reg->appaterno);
            $participante->setApmaterno($reg->apmaterno);
            $participante->setCurp($reg->curp);
            $participante->setSexo($reg->sexo);
            $participante->setIdedocivil($reg->idedocivil);
            $participante->setIdgrupo($reg->idgrupo);
            $participante->setEmail($reg->email);
            $participante->setTelefono($reg->telefono);
            $participante->setEstado($reg->estado);
            array_push($data, $participante);
        }
        return $data;
    }

    /**
     * Método que permite agregar un grupo a la BD.
     *
     * @param ParticipantePojo $participante El objeto grupo
     */
    public function insert($participante) {
        if ($participante instanceof ParticipantePojo) { //Verifica si es un grupo a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "id" => $participante->getId(),
                "nocontrol" => $participante->getNocontrol(),
                "nombre" => $participante->getNombre(),
                "appaterno" => $participante->getAppaterno(),
                "apmaterno" => $participante->getApmaterno(),
                "curp" => $participante->getCurp(),
                "sexo" => $participante->getSexo(),
                "idedocivil" => $participante->getIdedocivil(),
                "idgrupo" => $participante->getIdgrupo(),
                "email" => $participante->getEmail(),
                "telefono" => $participante->getTelefono()
            );

            $var_a_validar = $participante->getNocontrol();
            $var_a_validar1 = $participante->getCurp();

            $existe = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_participante WHERE nocontrol LIKE '$var_a_validar'"));
            $existe2 = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_participante WHERE curp LIKE '$var_a_validar1'"));

            if ($existe == 0 & $existe2 == 0) {

                $comando = $this->db->insert_string("1211100255_participante", $datos);
                $this->db->query($comando);
                return true;
            } else {

                echo '<script language="javascript">alert("No puede insertar participantes  con el mismo No. de Control y/o Curp, favor de verifiar datos ");</script>';
                return false;
            }
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $id Identificador del grupo.
     */
    public function desactiva($id) {
//Verifica que no vaya vacío.
        if (isset($id)) {
            $stmtDelete = "UPDATE `1211100255_participante` SET `estado`= 2  where id = " . $id;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($id) {
//Verifica que no vaya vacío.
        if (isset($id)) {
            $stmtDelete = "UPDATE `1211100255_participante` SET `estado`= 1  where id = " . $id;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param ParticipantePojo $participante
     */
    public function update($participante) {
        if ($participante instanceof ParticipantePojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "id" => $participante->getId(),
                "nocontrol" => $participante->getNocontrol(),
                "nombre" => $participante->getNombre(),
                "appaterno" => $participante->getAppaterno(),
                "apmaterno" => $participante->getApmaterno(),
                "curp" => $participante->getCurp(),
                "sexo" => $participante->getSexo(),
                "idedocivil" => $participante->getIdedocivil(),
                "idgrupo" => $participante->getIdgrupo(),
                "email" => $participante->getEmail(),
                "telefono" => $participante->getTelefono()
            );
            $where = "id = " . $participante->getId();
                $comando = $this->db->update_string('1211100255_participante', $datos, $where);
                $this->db->query($comando);


           // $var_a_validar = $participante->getNocontrol();
            //$var_a_validar1 = $participante->getCurp();

            //$existe = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_participante WHERE nocontrol LIKE '$var_a_validar'"));
            //$existe2 = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_participante WHERE curp LIKE '$var_a_validar1'"));

            /*if ($existe == 0 & $existe2 == 0) {

                
              //  return true;
            } else {

              //  echo '<script language="javascript">alert("No puede poner participantes  con el mismo No. de Control y/o Curp, favor de verifiar datos ");</script>';
                //return false;
            }*/
        }
    }

    /**
     * Método que devuelve un grupo  en especifico
     * @param type $id
     * @return array
     */
    public function extrae($id) {
        $this->db->select('*');
        $this->db->from('1211100255_participante');
        $this->db->where('id', $id);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $participante = new ParticipantePojo();
            $participante->setId($reg->id);
            $participante->setNocontrol($reg->nocontrol);
            $participante->setNombre($reg->nombre);
            $participante->setAppaterno($reg->appaterno);
            $participante->setApmaterno($reg->apmaterno);
            $participante->setCurp($reg->curp);
            $participante->setSexo($reg->sexo);
            $participante->setIdedocivil($reg->idedocivil);
            $participante->setIdgrupo($reg->idgrupo);
            $participante->setEmail($reg->email);
            $participante->setTelefono($reg->telefono);

            array_push($data, $participante);
        }

        return $data;
    }

    public function edoscivil() {
        $this->db->order_by('idedocivil', 'asc');
        $edoscivil = $this->db->get('1211100255_edocivil');
        if ($edoscivil->num_rows() > 0) {
            return $edoscivil->result();
        }
    }

    public function grupos() {
        $this->db->order_by('idgrupo', 'asc');
        $grupos = $this->db->get('1211100255_grupo');
        if ($grupos->num_rows() > 0) {
            return $grupos->result();
        }
    }

}

?>