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
class Depto extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Depto() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');

//Carga el modelo en application|models
        $this->load->model('deptoModel');

        //Session
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    /**
     * Función default.
     */
    function index() {
//Datos que se desplegarán en la vist
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->deptoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de depto';

        // $data['right']=  $this->load->view('depto/lista_depto.php','', true);
//Carga la vista de application|views|curso|lista_curso.php
        // $this->load->view('plantilla.php', $data);


        $this->load->view('depto/lista_depto.php', $data);
    }

    function nuevo() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->deptoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;

        $this->load->view('depto/add_depto.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $iddepto Identificador del .
     */
    function activa($iddepto) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idDepto no venga vacío
        //  $this->load->helper('url');
        $this->load->model('deptoModel');
        if (isset($iddepto)) {
            $this->deptoModel->activa($iddepto); //Invoca el método del modelo
        }
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $iddepto Identificador del .
     */
    function desactiva($iddepto) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idDepto no venga vacío
        //  $this->load->helper('url');
        $this->load->model('deptoModel');
        if (isset($iddepto)) {
            $this->deptoModel->desactiva($iddepto); //Invoca el método del modelo
        }
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método para insertar un registro en la Base de datos.
     */
    function insert() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $depto = new DeptoPojo();
        $depto->setIddepto($this->input->post('iddepto'));
        $depto->setNombre($this->input->post('nombre'));
        $depto->setDescripcion($this->input->post('descripcion'));
        $this->load->model('deptoModel');
        if ($this->deptoModel->insert($depto) == true) {
            $this->index();
        } else {
            $this->nuevo();
        }
    }

    function extrae($iddepto) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->deptoModel->extrae($iddepto);
        $data['base'] = $this->base;
        $data['css'] = $this->css;
        $this->load->view('depto/modifica_depto.php', $data);
    }

    function consulta($iddepto) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->deptoModel->extrae($iddepto);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $this->load->view('depto/consulta_depto.php', $data);
    }

    function modifica() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        // $this->load->helper('url');
        $depto = new DeptoPojo();
        $depto->setIddepto($this->input->post('iddepto'));
        $depto->setNombre($this->input->post('nombre'));
        $depto->setDescripcion($this->input->post('descripcion'));
        $this->load->model('deptoModel');
        $this->deptoModel->update($depto);
        $this->index();
    }

}

?>