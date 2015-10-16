<?php

/**
 * Esta clase controladora ayudará a administrar todo sobre .
 *
 * @author Fabiola Santes Rdodriguez 
 * @version 1.0
 */
class Alumno extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    /**
     * Constructor default.
     */

    function Alumno() {
        parent::__construct();
//Extra variables de archivo application|config|config.php
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
        
//Carga el modelo en application|models
        $this->load->model('alumnoModel');
    }

    /**
     * Función default.
     */
    function index() {
//Datos que se desplegarán en la vist
        $data['datos'] = $this->alumnoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['titulo'] = 'Administración de alumnos';
        
        //$data['right']=  $this->load->view('alumno/lista_alumno.php','', true);
        //Carga la vista de application|views|alumno|lista_alumno.php
        // $this->load->view('templates/catalogos.php');
        $this->load->view('alumno/lista_alumno.php', $data);
    }

    function nuevo() {
        $data['datos'] = $this->alumnoModel->query();
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        $data['edoscivil'] = $this->alumnoModel->edoscivil();
        $this->load->view('alumno/add_alumno.php', $data);
    }

    /**
     * Método que nos permitirá hacer la eliminación de un registro de la BD.
     *
     * @param type $idAlumno Identificador del .
     */
    function delete($idAlumno) {
//Verifica que el idAlumno no venga vacío
        //  $this->load->helper('url');
        $this->load->model('alumnoModel');
        if (isset($idAlumno)) {
            $this->alumnoModel->delete($idAlumno); //Invoca el método del modelo
        }
        // redirect('alumno/index');
        $this->index(); //Invoco la opción listar
    }

    /**
     * Método para insertar un registro en la Base de datos.
     */
    function insert() {
        //$this->load->helper('url');
        // $this->load->view('alumno/add_alumno.php');
        
        $alumno = new AlumnoPojo();
        $alumno->setUsuario($this->input->post('usuario'));
        $alumno->setNocontrol($this->input->post('nocontrol'));
        $alumno->setCurp($this->input->post('curp'));
        $alumno->setGrupo($this->input->post('grupo'));
        $alumno->setArea($this->input->post('area'));
        $alumno->setNivel($this->input->post('nivel'));
        $alumno->setGrado($this->input->post('grado'));
        $alumno->setSituacion($this->input->post('situacion'));
        $alumno->setEstatus($this->input->post('estatus'));

        $this->load->model('alumnoModel');
        if ($this->alumnoModel->insert($alumno))
            ;
        //redirect('alumno/index');
        $this->index();
    }

    function extrae($idAlumno) {
        
        $data['datos'] = $this->alumnoModel->extrae($idAlumno);
        $data['base'] = $this->base;
       // $data['edoscivil'] = $this->alumnoModel->edoscivil();
        $this->load->view('alumno/modifica_alumno.php', $data);
    }

    function consulta($idAlumno) {

        $data['datos'] = $this->alumnoModel->extrae($idAlumno);
        $data['base'] = $this->base;
       // $data['edoscivil'] = $this->alumnoModel->edoscivil();
        $this->load->view('alumno/consulta_alumno.php', $data);
    }

    function modifica() {
        
        $this->load->helper('url');
        $alumno = new AlumnoPojo();
        
        $alumno->setUsuario($this->input->post('usuario'));
        $alumno->setNocontrol($this->input->post('nocontrol'));
        $alumno->setCurp($this->input->post('curp'));
        $alumno->setGrupo($this->input->post('grupo'));
        $alumno->setArea($this->input->post('area'));
        $alumno->setNivel($this->input->post('nivel'));
        $alumno->setGrado($this->input->post('grado'));
        $alumno->setSituacion($this->input->post('situacion'));
        $alumno->setEstatus($this->input->post('estatus'));
        

        $this->load->model('alumnoModel');
        if ($this->alumnoModel->update($alumno));
        redirect('alumno/index');
        
        
        
    }

}
