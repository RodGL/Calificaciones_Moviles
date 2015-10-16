<?php

/**
 * Proposito
 * Definir un objeto curso de acuerdo al dominio del problema
 * Este representa una tupla u objeto curso.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */
class GrupoPojo {

//Propiedades de un curso
    private $idgrupo;
    private $nombre;
    private $descripcion;
    private $status;

    /**
     * Constructor default.
     */
    function __construct() {
        
    }

    function getIdgrupo() {
        return $this->idgrupo;
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

    function setIdgrupo($idgrupo) {
        $this->idgrupo = $idgrupo;
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
