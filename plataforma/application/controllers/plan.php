<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plan
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class Plan extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Plan() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');

//Carga el modelo en application|models
        $this->load->model('planModel');

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
        $data['datos'] = $this->planModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de plan';

        $this->load->view('plan/lista_plan.php', $data);
    }

    function nuevo() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->planModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;

        $this->load->view('plan/add_plan.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idplan Identificador del .
     */
    function activa($idplan) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idPlan no venga vacío
        //  $this->load->helper('url');
        $this->load->model('planModel');
        if (isset($idplan)) {
            $this->planModel->activa($idplan); //Invoca el método del modelo
        }
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idplan Identificador del .
     */
    function desactiva($idplan) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idPlan no venga vacío
        //  $this->load->helper('url');
        $this->load->model('planModel');
        if (isset($idplan)) {
            $this->planModel->desactiva($idplan); //Invoca el método del modelo
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
        $plan = new PlanPojo();
        $plan->setIdplan($this->input->post('idplan'));
        $plan->setNombre($this->input->post('nombre'));
        $plan->setDescripcion($this->input->post('descripcion'));
        $this->load->model('planModel');
        if ($this->planModel->insert($plan) == true) {
            $this->index();
        } else {
            $this->nuevo();
        }
    }

    function extrae($idplan) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->planModel->extrae($idplan);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $this->load->view('plan/modifica_plan.php', $data);
    }

    function consulta($idplan) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->planModel->extrae($idplan);
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $this->load->view('plan/consulta_plan.php', $data);
    }

    function modifica() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        // $this->load->helper('url');
        $plan = new PlanPojo();
        $plan->setIdplan($this->input->post('idplan'));
        $plan->setNombre($this->input->post('nombre'));
        $plan->setDescripcion($this->input->post('descripcion'));
        $this->load->model('planModel');
        $this->planModel->update($plan);
        $this->index();
    }

}

?>