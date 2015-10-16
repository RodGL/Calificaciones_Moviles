<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ugPojo
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class UsuariogrupoPojo{
//Propiedades de un curso
    private $idug;
    private $usuario;
    private $grupo;
    
    /**
     * Constructor default.
     */
    function __construct() {
        
    }
    function getIdug() {
        return $this->idug;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function setIdug($idug) {
        $this->idug = $idug;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }


}
