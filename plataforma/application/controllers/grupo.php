<?php

/**
 * Esta clase controladora ayudará a administrar todo sobre los grupos.
 *
 * @author Fabiola Santes Rdodriguez 
 * @version 1.0
 */
class Grupo extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Grupo() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
        
//Carga el modelo en application|models
        $this->load->model('grupoModel');
        
        //Session
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    /**
     * Función default.
     */
    function index() {
//Datos que se desplegarán en la vist
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
        $data['datos'] = $this->grupoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de grupos';
        
       // $data['right']=  $this->load->view('grupo/lista_grupo.php','', true);
        
//Carga la vista de application|views|curso|lista_curso.php
       // $this->load->view('plantilla.php', $data);
        
        
       $this->load->view('grupo/lista_grupo.php', $data);
    }

    function nuevo() {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
        $data['datos'] = $this->grupoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        
        $this->load->view('grupo/add_grupo.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idgrupo Identificador del .
     */
    function activa($idgrupo) {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
//Verifica que el idGrupo no venga vacío
        //  $this->load->helper('url');
        $this->load->model('grupoModel');
        if (isset($idgrupo)) {
            $this->grupoModel->activa($idgrupo); //Invoca el método del modelo
        }
        // redirect('grupo/index');
        $this->index(); //Invoco la opción listar
    }
    
    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idgrupo Identificador del .
     */
    function desactiva($idgrupo) {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
//Verifica que el idGrupo no venga vacío
        //  $this->load->helper('url');
        $this->load->model('grupoModel');
        if (isset($idgrupo)) {
            $this->grupoModel->desactiva($idgrupo); //Invoca el método del modelo
        }
        // redirect('grupo/index');
        $this->index(); //Invoco la opción listar
    }
    
    

    /**
     * Método para insertar un registro en la Base de datos.
     */
    function insert() {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
        $grupo = new GrupoPojo();
        $grupo->setIdgrupo($this->input->post('idgrupo'));
        $grupo->setNombre($this->input->post('nombre'));
        $grupo->setDescripcion($this->input->post('descripcion'));
        $this->load->model('grupoModel');
        if ($this->grupoModel->insert($grupo)== true){
            $this->index();
        }else{
            $this->nuevo();
        }
        //redirect('grupo/index');
        
    }

    function extrae($idgrupo) {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
        $data['base'] = $this->base;
        $data['css'] = $this->css;
        $data['datos'] = $this->grupoModel->extrae($idgrupo);
        $this->load->view('grupo/modifica_grupo.php', $data);
        
    }

    function consulta($idgrupo) {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
        $data['base'] = $this->base;
        $data['css'] = $this->css;
        $data['datos'] = $this->grupoModel->extrae($idgrupo);
        
        
        $this->load->view('grupo/consulta_grupo.php', $data);
    }

    function modifica() {
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
       // $this->load->helper('url');
        $grupo = new GrupoPojo();
        
        
        $grupo->setIdgrupo($this->input->post('idgrupo'));
        $grupo->setNombre($this->input->post('nombre'));
        $grupo->setDescripcion($this->input->post('descripcion'));

        $this->load->model('grupoModel');
        /*if ($this->grupoModel->update($grupo)==true){
        $this->index();
        }else{
            $this->nuevo();
        }   */
        $this->grupoModel->update($grupo);
        $this->index();
    }

}
?>
