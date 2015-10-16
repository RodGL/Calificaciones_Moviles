<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Admin extends CI_Controller {
    
    var $base; //URL base http://faby.esy.es/plataforma
    var $css; //ruta del archivo de hoja de estilo
    
    public function __construct() {
        parent::__construct();
        $this->base = $this->config->item('base_url');
        $this->css = $this->config->item('css');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }
    
    public function index()
    {
        $data['css'] = $this->css;
        $data['base'] = $this->base;
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
        {
            redirect(base_url().'login');
        }
         //$data['css'] = $this->css;
        //$this->load->view('admin_view',$data);
        $this->load->view('admin_view', $data);
    }
}