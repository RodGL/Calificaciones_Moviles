<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of deptoPojo
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class DeptoPojo {
    private $iddepto;
    private $nombre;
    private $descripcion;
    private $status;
    
    function __construct() {
        
    }
    
    function getIddepto() {
        return $this->iddepto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getStatus() {
        return $this->status;
    }

    function setIddepto($iddepto) {
        $this->iddepto = $iddepto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setStatus($status) {
        $this->status = $status;
    }  
}
