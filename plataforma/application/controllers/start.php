<?php

/**
 * Proposito
 * Crear un mejor controlador para comunicacion con la vista.
 *
 * @author Gabriel Barron R. gbarron@utng.edu.mx
 * @version 1.0
 */
class Start extends CI_Controller {

    var $base; //URL base
    var $css; //Hoja de estilo.

    /**
     * Constrctor default
     */

    function Start() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
    }

    /**
     * Método que invoca a nuestra vista y le pasa datos.
     * @param type $name Nombre de la persona
     */
    function hello($name) {
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Bienvenido a la programacion PHP';
        $data['texto'] = "Hola, $name, somos más dinámicos!";
        $this->load->view('testview', $data);
    }

}
