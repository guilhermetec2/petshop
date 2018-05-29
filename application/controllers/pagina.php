<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Pagina extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->view('template/header');
        $this->load->view('template/home');
        $this->load->view('template/footer');
    }

    public function admin(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/home');
        $this->load->view('template/adm/footer');
    }

    public function login_admin(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('session_model');

        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/login_admin');
        }
        else 
        {
            $usuario['email'] = $this->input->post('email');
            $usuario['senha'] = $this->input->post('senha');
            $retorno = $this->session_model->valida_login($usuario);
            
            if($retorno)
                redirect('pagina/admin');
        } 
    }

    public function logout(){

        session_destroy();
        redirect('pagina/login_admin');
    }
}