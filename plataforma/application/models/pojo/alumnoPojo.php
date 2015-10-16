<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumno
 *
 * @author Fabiola Santes Rodríguez
 */
class AlumnoPojo {
    //propiedades de un alumno
    private $usuario;
    private $nocontrol;
    private $grupo;
    private $area;
    private $nivel;
    private $grado;
    private $situacion;
    private $estatus;
    
    public function __construct() {
        
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function getNocontrol() {
        return $this->nocontrol;
    }

    function getCurp() {
        return $this->curp;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function getArea() {
        return $this->area;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getGrado() {
        return $this->grado;
    }

    function getSituacion() {
        return $this->situacion;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setNocontrol($nocontrol) {
        $this->nocontrol = $nocontrol;
    }

    function setCurp($curp) {
        $this->curp = $curp;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setGrado($grado) {
        $this->grado = $grado;
    }

    function setSituacion($situacion) {
        $this->situacion = $situacion;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }




}
