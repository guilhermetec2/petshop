<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Estoque extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('estoque_model');
    }

     public function cadastro_perda_estoque(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('estoque_model');

        $data['estoques'] = $this->estoque_model->get_estoque();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('qtd', 'Quantidade', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_perda_estoque',$data);
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $this->estoque_model->set_perda_estoque();
            redirect('estoque/buscar_estoque');
        }       
    }

    public function buscar_estoque(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('estoque_model');

        $data['estoques'] = $this->estoque_model->get_estoque();

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/buscar_estoque',$data);
        $this->load->view('template/adm/footer');
    }

    public function editar_estoque(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->helper('form');
        $this->load->model('estoque_model');
        $this->load->model('produto_model');
        
        $data['produtos'] = $this->produto_model->get_produto();

        $id = $this->uri->segment(3);

        $data['estoque'] = $this->estoque_model->getById($id);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/editar_estoque',$data);
        $this->load->view('template/adm/footer');
    }

     public function atualizar_estoque(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('estoque_model');

         $data   = $this->input->post();
         $status = $this->marca_model->update_estoque($data['idproduto'],$data);

        if(!$status)
        {
            echo "NÃO ATUALIZOU!";
        }
        else
        {
            redirect('estoque/buscar_estoque');
        }
     }

     public function excluir_estoque(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('estoque_model');

        $id = $this->uri->segment(3);
        $status = $this->estoque_model->excluir_estoque($id);

        if($status){
			redirect('estoque/buscar_estoque');
		}else{
			echo "NÃO FOI POSSIVEL EXCLUIR!";
		}
     }
}