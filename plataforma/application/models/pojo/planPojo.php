<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of planPojo
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class PlanPojo {
    //Propiedades de un curso
    private $idplan;
    private $nombre;
    private $descripcion;
    private $status;

    /**
     * Constructor default.
     */
    
    function __construct() {
        
    }
    function getIdplan() {
        return $this->idplan;
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

    function setIdplan($idplan) {
        $this->idplan = $idplan;
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
