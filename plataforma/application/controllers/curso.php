<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of curso
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class Curso extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Curso() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');

//Carga el modelo en application|models
        $this->load->model('cursoModel');

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
        $data['datos'] = $this->cursoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de curso';

        // $data['right']=  $this->load->view('curso/lista_curso.php','', true);
//Carga la vista de application|views|curso|lista_curso.php
        // $this->load->view('plantilla.php', $data);


        $this->load->view('curso/lista_curso.php', $data);
    }

    function nuevo() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->cursoModel->query();
       $data['css'] = $this->css;
        $data['base'] = $this->base;

        $this->load->view('curso/add_curso.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idcurso Identificador del .
     */
    function activa($idcurso) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idCurso no venga vacío
        //  $this->load->helper('url');
        $this->load->model('cursoModel');
        if (isset($idcurso)) {
            $this->cursoModel->activa($idcurso); //Invoca el método del modelo
        }
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idcurso Identificador del .
     */
    function desactiva($idcurso) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idCurso no venga vacío
        //  $this->load->helper('url');
        $this->load->model('cursoModel');
        if (isset($idcurso)) {
            $this->cursoModel->desactiva($idcurso); //Invoca el método del modelo
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
        $curso = new CursoPojo();
        $curso->setIdcurso($this->input->post('idcurso'));
        $curso->setNombre($this->input->post('nombre'));
        $curso->setDescripcion($this->input->post('descripcion'));
        $this->load->model('cursoModel');
        if ($this->cursoModel->insert($curso) == true) {
            $this->index();
        } else {
            $this->nuevo();
        }
    }

    function extrae($idcurso) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->cursoModel->extrae($idcurso);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $this->load->view('curso/modifica_curso.php', $data);
    }

    function consulta($idcurso) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->cursoModel->extrae($idcurso);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $this->load->view('curso/consulta_curso.php', $data);
    }

    function modifica() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        // $this->load->helper('url');
        $curso = new CursoPojo();
        $curso->setIdcurso($this->input->post('idcurso'));
        $curso->setNombre($this->input->post('nombre'));
        $curso->setDescripcion($this->input->post('descripcion'));
        $this->load->model('cursoModel');
        $this->cursoModel->update($curso);
        $this->index();
    }

}

?>