<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author Fabiola Santes Rodríguez santesrodriguezfabiola@gmail.com
 * @version 1.0
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo

    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
        $this->load->model('login_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('default');
    }

    public function index() {
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        switch ($this->session->userdata('perfil')) {
            case '':
                $data['token'] = $this->token();
                $this->load->view('login_view', $data);
                break;
            case 'administrador':
                redirect(base_url() . 'admin');
                break;
            case 'editor':
                redirect(base_url() . 'editor');
                break;
            case 'suscriptor':
                redirect(base_url() . 'suscriptor');
                break;
            default:
                $data['titulo'] = 'Login con roles de usuario en codeigniter';
                $this->load->view('login_view', $data);
                break;
        }
    }

    public function new_user() {
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');

            //lanzamos mensajes de error si es que los hay

            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));
                $check_user = $this->login_model->login_user($username, $password);
                if ($check_user == TRUE) {
                    $data = array(
                        'is_logued_in' => TRUE,
                        'id_usuario' => $check_user->id,
                        'perfil' => $check_user->perfil,
                        'username' => $check_user->username
                    );
                    $this->session->set_userdata($data);
                    $this->index();
                }
            }
        } else {
            redirect(base_url() . 'login');
        }
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function logout_ci() {
        $this->session->sess_destroy();
        
         redirect(base_url() . 'login');
    }

}
