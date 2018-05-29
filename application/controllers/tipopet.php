<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Tipopet extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('tipopet_model');
    }

     public function cadastro_tipopet(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('tipopet_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Título', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_tipopet');
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $this->tipopet_model->set_tipopet();
            redirect('tipopet/buscar_tipopet');
        }       
    }

    public function buscar_tipopet(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('tipopet_model');

        $data = $this->tipopet_model->get_tipopet();
        $data['tipos'] = $this->tipopet_model->formatar($data);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/buscar_tipopet',$data);
        $this->load->view('template/adm/footer');
    }

    public function editar_tipopet(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('tipopet_model');
        $this->load->helper('form');

        $id = $this->uri->segment(3);

        $data['tipo'] = $this->tipopet_model->getById($id);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/editar_tipopet',$data);
        $this->load->view('template/adm/footer');
    }

     public function atualizar_tipopet(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('tipopet_model');

         $data   = $this->input->post();
         $status = $this->tipopet_model->update_tipopet($data['idtipopet'],$data);

        if(!$status)
        {
            echo "NÃO ATUALIZOU!";
        }
        else
        {
            redirect('tipopet/buscar_tipopet');
        }
     }

     public function excluir_tipopet(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('tipopet_model');

        $id = $this->uri->segment(3);
        $status = $this->tipopet_model->excluir_tipopet($id);

        if($status){
			redirect('tipopet/buscar_tipopet');
		}else{
			echo "NÃO FOI POSSIVEL EXCLUIR!";
		}
     }
}