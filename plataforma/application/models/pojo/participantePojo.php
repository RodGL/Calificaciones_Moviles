<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of participantePojo
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class participantePojo {
    
    private $id;
    private $nocontrol;
    private $nombre;
    private $appaterno;
    private $apmaterno;
    private $curp;
    private $sexo;
    private $idedocivil;
    private $idgrupo;
    private $email;
    private $telefono;
    private $estado;
    
    public function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getNocontrol() {
        return $this->nocontrol;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAppaterno() {
        return $this->appaterno;
    }

    function getApmaterno() {
        return $this->apmaterno;
    }

    function getCurp() {
        return $this->curp;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getIdedocivil() {
        return $this->idedocivil;
    }

    function getIdgrupo() {
        return $this->idgrupo;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNocontrol($nocontrol) {
        $this->nocontrol = $nocontrol;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAppaterno($appaterno) {
        $this->appaterno = $appaterno;
    }

    function setApmaterno($apmaterno) {
        $this->apmaterno = $apmaterno;
    }

    function setCurp($curp) {
        $this->curp = $curp;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setIdedocivil($idedocivil) {
        $this->idedocivil = $idedocivil;
    }

    function setIdgrupo($idgrupo) {
        $this->idgrupo = $idgrupo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }   
}
