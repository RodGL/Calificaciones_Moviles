<?php

/**
 * Esta clase controladora ayudará a administrar todo sobre los participantes.
 *
 * @author Fabiola Santes Rdodriguez 
 * @version 1.0
 */
class Participante extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Participante() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
        
//Carga el modelo en application|models
        $this->load->model('participanteModel');
    }

    /**
     * Función default.
     */
    function index() {
//Datos que se desplegarán en la vist
        $data['datos'] = $this->participanteModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de participantes';
        $data['edoscivil'] = $this->participanteModel->edoscivil();
        $data['grupos'] = $this->participanteModel->grupos();
        $this->load->view('participante/lista_participante.php', $data);
    }

    function nuevo() {
        $data['datos'] = $this->participanteModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['edoscivil'] = $this->participanteModel->edoscivil();
        $data['grupos'] = $this->participanteModel->grupos();
        $this->load->view('participante/add_participante.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $id Identificador del .
     */
    function activa($id) {
//Verifica que el idParticipante no venga vacío
        //  $this->load->helper('url');
        $this->load->model('participanteModel');
        if (isset($id)) {
            $this->participanteModel->activa($id); //Invoca el método del modelo
        }
        // redirect('participante/index');
        $this->index(); //Invoco la opción listar
    }
    
    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $id Identificador del .
     */
    function desactiva($id) {
//Verifica que el idParticipante no venga vacío
        //  $this->load->helper('url');
        $this->load->model('participanteModel');
        if (isset($id)) {
            $this->participanteModel->desactiva($id); //Invoca el método del modelo
        }
        // redirect('participante/index');
        $this->index(); //Invoco la opción listar
    }
    
    

    /**
     * Método para insertar un registro en la Base de datos.
     */
    function insert() {
        $participante = new ParticipantePojo();
        $participante->setId($this->input->post('id'));
        $participante->setNocontrol($this->input->post('nocontrol'));
        $participante->setNombre($this->input->post('nombre'));
        $participante->setAppaterno($this->input->post('appaterno'));
        $participante->setApmaterno($this->input->post('apmaterno'));
        $participante->setCurp($this->input->post('curp'));
        $participante->setSexo($this->input->post('sexo'));
        $participante->setIdedocivil($this->input->post('idedocivil'));
        $participante->setIdgrupo($this->input->post('idgrupo'));
        $participante->setEmail($this->input->post('email'));
        $participante->setTelefono($this->input->post('telefono'));
        $participante->setEstado($this->input->post('estado'));
        $this->load->model('participanteModel');
        if ($this->participanteModel->insert($participante)== true){
            $this->index();
        }else{
            $this->nuevo();
        };
        //redirect('participante/index');
        
    }

    function extrae($id) {
        
        $data['datos'] = $this->participanteModel->extrae($id);
        $data['base'] = $this->base;
        $data['edoscivil'] = $this->participanteModel->edoscivil();
        $data['grupos'] = $this->participanteModel->grupos();
        $this->load->view('participante/modifica_participante.php', $data);
    }

    function consulta($id) {

        $data['datos'] = $this->participanteModel->extrae($id);
        $data['base'] = $this->base;
        $data['edoscivil'] = $this->participanteModel->edoscivil();
        $data['grupos'] = $this->participanteModel->grupos();
        $this->load->view('participante/consulta_participante.php', $data);
    }

    function modifica() {
        
       // $this->load->helper('url');
        $participante = new ParticipantePojo();
        $participante->setId($this->input->post('id'));
        $participante->setNocontrol($this->input->post('nocontrol'));
        $participante->setNombre($this->input->post('nombre'));
        $participante->setAppaterno($this->input->post('appaterno'));
        $participante->setApmaterno($this->input->post('apmaterno'));
        $participante->setCurp($this->input->post('curp'));
        $participante->setSexo($this->input->post('sexo'));
        $participante->setIdedocivil($this->input->post('idedocivil'));
        $participante->setIdgrupo($this->input->post('idgrupo'));
        $participante->setEmail($this->input->post('email'));
        $participante->setTelefono($this->input->post('telefono'));
        $participante->setEstado($this->input->post('estado'));

        $this->load->model('participanteModel');
        if ($this->participanteModel->update($participante));
        $this->index();
        
        
        
    }

}
