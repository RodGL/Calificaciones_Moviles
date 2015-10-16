<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of depto
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class Test extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Test() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');

    }

    /**
     * Función default.
     */
    function index() {

        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de depto';


        $this->load->view('usuario/teset.php', $data);
    }

}

?>