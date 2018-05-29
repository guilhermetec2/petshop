<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Fornecedor extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('fornecedor_model');
    }

     public function cadastro_fornecedor(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('fornecedor_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomefornecedor', 'Nome Fornecedor', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_fornecedor');
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $this->fornecedor_model->set_fornecedor();
            redirect('fornecedor/buscar_fornecedor');
        }       
    }

    public function buscar_fornecedor(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('fornecedor_model');

        $data = $this->fornecedor_model->get_fornecedor();
        $data['fornecedores'] = $this->fornecedor_model->formatar($data);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/buscar_fornecedor',$data);
        $this->load->view('template/adm/footer');
    }

    public function editar_fornecedor(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('fornecedor_model');
        $this->load->helper('form');

        $id = $this->uri->segment(3);

        $data['fornecedor'] = $this->fornecedor_model->getById($id);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/editar_fornecedor',$data);
        $this->load->view('template/adm/footer');
    }

     public function atualizar_fornecedor(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('fornecedor_model');

         $data   = $this->input->post();
         $status = $this->fornecedor_model->update_fornecedor($data['idfornecedor'],$data);

        if(!$status)
        {
            echo "NÃO ATUALIZOU!";
        }
        else
        {
            redirect('fornecedor/buscar_fornecedor');
        }
     }

     public function excluir_fornecedor(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('fornecedor_model');

        $id = $this->uri->segment(3);
        $status = $this->fornecedor_model->excluir_fornecedor($id);

        if($status){
			redirect('fornecedor/buscar_fornecedor');
		}else{
			echo "NÃO FOI POSSIVEL EXCLUIR!";
		}
     }
}