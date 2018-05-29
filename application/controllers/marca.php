<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Marca extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('marca_model');
    }

     public function cadastro_marca(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('marca_model');
        $this->load->model('fornecedor_model');

        $data['fornecedores'] = $this->fornecedor_model->get_fornecedor();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomemarca', 'Nome Marca', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_marca',$data);
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $this->marca_model->set_marca();
            redirect('marca/buscar_marca');
        }       
    }

    public function buscar_marca(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('marca_model');

        $data = $this->marca_model->get_marca();
        $data['marcas'] = $this->marca_model->formatar($data);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/buscar_marca',$data);
        $this->load->view('template/adm/footer');
    }

    public function editar_marca(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->helper('form');
        $this->load->model('marca_model');
        $this->load->model('fornecedor_model');
        
        $data['fornecedores'] = $this->fornecedor_model->get_fornecedor();

        $id = $this->uri->segment(3);

        $data['marca'] = $this->marca_model->getById($id);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/editar_marca',$data);
        $this->load->view('template/adm/footer');
    }

     public function atualizar_marca(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('marca_model');

         $data   = $this->input->post();
         $status = $this->marca_model->update_marca($data['idmarca'],$data);

        if(!$status)
        {
            echo "NÃO ATUALIZOU!";
        }
        else
        {
            redirect('marca/buscar_marca');
        }
     }

     public function excluir_marca(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('marca_model');

        $id = $this->uri->segment(3);
        $status = $this->marca_model->excluir_marca($id);

        if($status){
			redirect('marca/buscar_marca');
		}else{
			echo "NÃO FOI POSSIVEL EXCLUIR!";
		}
     }
}