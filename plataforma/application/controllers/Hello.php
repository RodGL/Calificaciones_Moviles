<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hello
 *
 * @author Fabiola Santes Rodríguez
 */
class Hello extends CI_Controller{
    
    function index(){
        $this->load->view('hello.html');
        $this->load->view('hello.html');
    }
    
    function layout(){
        $datos['header']="<h1>Hola soy un encabezado</h1>";
        $datos['right']=  $this->load->view('forma.php','', true);
        $this->load->view('layout.php', $datos);
    }
}
