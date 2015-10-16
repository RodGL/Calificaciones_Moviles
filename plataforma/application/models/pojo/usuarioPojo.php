<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioPojo
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class UsuarioPojo {
    private $iduser;
    private $user;
    private $password;
    private $perfil;
    private $nombre;
    private $appaterno;
    private $apmaterno;
    private $fechanac;
    private $sexo;
    private $curp;
    private $imss;
    private $edocivil;
    private $descripcion;
    private $estatus;
    
    function __construct() {
        
    }
    
    function getIduser() {
        return $this->iduser;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getPerfil() {
        return $this->perfil;
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

    function getFechanac() {
        return $this->fechanac;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getCurp() {
        return $this->curp;
    }

    function getImss() {
        return $this->imss;
    }

    function getEdocivil() {
        return $this->edocivil;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIduser($iduser) {
        $this->iduser = $iduser;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
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

    function setFechanac($fechanac) {
        $this->fechanac = $fechanac;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setCurp($curp) {
        $this->curp = $curp;
    }

    function setImss($imss) {
        $this->imss = $imss;
    }

    function setEdocivil($edocivil) {
        $this->edocivil = $edocivil;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }






   
    
}
