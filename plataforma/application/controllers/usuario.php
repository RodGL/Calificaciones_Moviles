<?php

/**
 * Description of usuario
 *
 * @author Fabiola Santes Rodríguez
 * @version 1.0
 */
class Usuario extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Usuario() {
        parent::__construct();
        //Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
        //Carga el modelo en application|models
        $this->load->model('usuarioModel');
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
        $data['datos'] = $this->usuarioModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['edoscivil'] = $this->usuarioModel->edoscivil();
        $this->load->view('usuario/lista_usuario.php', $data);
    }

    function nuevo() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        $data['datos'] = $this->usuarioModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['edoscivil'] = $this->usuarioModel->edoscivil();
        $this->load->view('usuario/add_usuario.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idusuario Identificador del .
     */
    function activa($idusuario) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        //Verifica que el idUsuario no venga vacío
        $this->load->model('usuarioModel');
        if (isset($idusuario)) {
            $this->usuarioModel->activa($idusuario); //Invoca el método del modelo
        }
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idusuario Identificador del .
     */
    function desactiva($idusuario) {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }
        //Verifica que el idUsuario no venga vacío
        //  $this->load->helper('url');
        $this->load->model('usuarioModel');
        if (isset($idusuario)) {
            $this->usuarioModel->desactiva($idusuario); //Invoca el método del modelo
        }
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método para insertar un registro en la Base de datos.
     */
    function insert() {
        /*if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }*/
        $usuario = new UsuarioPojo();
        
        $usuario->setIduser($this->input->post('iduser'));
        $usuario->setUser($this->input->post('user'));
        $usuario->setPassword(sha1($this->input->post('password')));
        $usuario->setPerfil($this->input->post('perfil'));
        $usuario->setNombre($this->input->post('nombre'));
        $usuario->setAppaterno($this->input->post('appaterno'));
        $usuario->setApmaterno($this->input->post('apmaterno'));
        $usuario->setFechanac($this->input->post('fechanac'));
        $usuario->setSexo($this->input->post('sexo'));
        $usuario->setCurp($this->input->post('curp'));
        $usuario->setImss($this->input->post('imss'));
        $usuario->setEdocivil($this->input->post('edocivil'));
        $usuario->setDescripcion($this->input->post('descripcion'));
        $usuario->setEstatus($this->input->post('estatus'));
        
        $this->load->model('usuarioModel');
        if ($this->usuarioModel->insert($usuario) == true) {
            $this->index();
        } else {
            $this->nuevo();
        }
    }

    function extrae($idusuario) {
      /*  if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }*/
        $data['datos'] = $this->usuarioModel->extrae($idusuario);
        $data['css'] = $this->css;
        $data['base'] = $this->base;

        $data['edoscivil'] = $this->usuarioModel->edoscivil();
        //$data['deptos'] = $this->usuarioModel->deptos();
        $this->load->view('usuario/modifica_usuario.php', $data);
    }

    function consulta($idusuario) {
      /*  if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }*/
        $data['base'] = $this->base;
        $data['css'] = $this->css;
        $data['datos'] = $this->usuarioModel->extrae($idusuario);


        $data['edoscivil'] = $this->usuarioModel->edoscivil();
       // $data['deptos'] = $this->usuarioModel->deptos();

        $this->load->view('usuario/consulta_usuario.php', $data);
    }

    function modifica() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'login');
        }

        $usuario = new UsuarioPojo();
        
        $usuario->setIduser($this->input->post('iduser'));
        $usuario->setUser($this->input->post('user'));
        //$usuario->setPassword($this->input->post('password'));
        $usuario->setPassword(sha1($this->input->post('password')));
        $usuario->setPerfil($this->input->post('perfil'));
        $usuario->setNombre($this->input->post('nombre'));
        $usuario->setAppaterno($this->input->post('appaterno'));
        $usuario->setApmaterno($this->input->post('apmaterno'));
        $usuario->setFechanac($this->input->post('fechanac'));
        $usuario->setSexo($this->input->post('sexo'));
        $usuario->setCurp($this->input->post('curp'));
        $usuario->setImss($this->input->post('imss'));
        $usuario->setEdocivil($this->input->post('edocivil'));
        $usuario->setDescripcion($this->input->post('descripcion'));
        $usuario->setEstatus($this->input->post('estatus'));


        $this->load->model('usuarioModel');
        $this->usuarioModel->update($usuario);
        $this->index();
    }

}

?>