<?php

/**
 * Esta clase controladora ayudará a administrar todo sobre los grupos.
 *
 * @author Fabiola Santes Rdodriguez 
 * @version 1.0
 */
class Usuariogrupo extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Usuariogrupo() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');

//Carga el modelo en application|models
        $this->load->model('usuariogrupoModel');

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
        $data['datos'] = $this->usuariogrupoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de grupos';

        // $data['right']=  $this->load->view('grupo/lista_grupo.php','', true);
//Carga la vista de application|views|curso|lista_curso.php
        // $this->load->view('plantilla.php', $data);


        $this->load->view('ug/lista_ug.php', $data);
    }

    function nuevo() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->usuariogrupoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;

        $this->load->view('ug/add_ug.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idug Identificador del .
     */
    function activa($idug) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idGrupo no venga vacío
        //  $this->load->helper('url');
        $this->load->model('usuariogrupoModel');
        if (isset($idgug)) {
            $this->usuariogrupoModel->activa($idug); //Invoca el método del modelo
        }
        // redirect('grupo/index');
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idgrupo Identificador del .
     */
    function desactiva($idug) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
//Verifica que el idGrupo no venga vacío
        //  $this->load->helper('url');
        $this->load->model('usuariogrupoModel');
        if (isset($idug)) {
            $this->usuariogrupoModel->desactiva($idug); //Invoca el método del modelo
        }
        // redirect('grupo/index');
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método para insertar un registro en la Base de datos.
     */
    function insert() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $usuariogrupo = new usuariogrupoPojo();
        $usuariogrupo->setIdug($this->input->post('idug'));
        $usuariogrupo->setUsuario($this->input->post('usuario'));
        $usuariogrupo->setGrupo($this->input->post('grupo'));
        $this->load->model('usuariogrupoModel');
        if ($this->usuariogrupoModel->insert($usuariogrupo) == true) {
            $this->index();
        } else {
            $this->nuevo();
        }
        //redirect('grupo/index');
    }

    function extrae($idug) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['css'] = $this->css;
        $data['datos'] = $this->usuariogrupoModel->extrae($idug);
        $data['base'] = $this->base;
        $this->load->view('ug/modifica_ug.php', $data);
    }

    function consulta($idug) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->usuariogrupoModel->extrae($idug);
        $data['base'] = $this->base;
        $data['css'] = $this->css;
        $this->load->view('ug/consulta_ug.php', $data);
    }

    function modifica() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        // $this->load->helper('url');
        $usuariogrupo = new usuariogrupoPojo();


        $usuariogrupo->setIdug($this->input->post('idug'));
        $usuariogrupo->setUsuario($this->input->post('usuario'));
        $usuariogrupo->setGrupo($this->input->post('grupo'));

        $this->load->model('usuariogrupoModel');
        /* if ($this->usuariogrupoModel->update($usuariogrupo)==true){
          $this->index();
          }else{
          $this->nuevo();
          } */
        $this->usuariogrupoModel->update($usuariogrupo);
        $this->index();
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idug Identificador del curso.
     */
    function delete($idug) {
//Verifica que el idCurso no venga vacío
        if (isset($idug)) {
            $this->usuario_grupo->delete($idug); //Invoca el método del modelo
        }
        $this->index(); //Invoco la opción listar
    }

}

?>
