<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cursoPojp
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class CursoPojo {
    private $idcurso;
    private $nombre;
    private $descripcion;
    private $status;
    
    function __construct() {
        
    }
    
    function getIdcurso() {
        return $this->idcurso;
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

    function setIdcurso($idcurso) {
        $this->idcurso = $idcurso;
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
