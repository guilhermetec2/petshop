<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Produto extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('produto_model');
    }

     public function cadastro_produto(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('produto_model');
        $this->load->model('categoria_model');
        $this->load->model('marca_model');
        $this->load->model('tipopet_model');
        $this->load->model('fornecedor_model');

        $data['categorias'] = $this->categoria_model->get_categoria();
        $data['marcas'] = $this->marca_model->get_marca();
        $data['tipopets'] = $this->tipopet_model->get_tipopet();
        $data['fornecedores'] = $this->fornecedor_model->get_fornecedor();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome do produto', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_produto',$data);
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $this->produto_model->set_produto();
            redirect('produto/buscar_produto');
        }       
    }

    public function buscar_produto(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('produto_model');

        $data = $this->produto_model->get_produto();
        $data['produtos'] = $this->produto_model->formatar($data);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/buscar_produto',$data);
        $this->load->view('template/adm/footer');
    }

    public function editar_produto(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('produto_model');
        $this->load->model('categoria_model');
        $this->load->model('marca_model');
        $this->load->model('tipopet_model');
        $this->load->helper('form');

         $id = $this->uri->segment(3);

        $data['categorias'] = $this->categoria_model->get_categoria();
        $data['marcas'] = $this->marca_model->get_marca();
        $data['tipopets'] = $this->tipopet_model->get_tipopet();
        $data['produto'] = $this->produto_model->getById($id);

       

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/editar_produto',$data);
        $this->load->view('template/adm/footer');
    }

     public function atualizar_produto(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('produto_model');

         $data   = $this->input->post();
         $status = $this->produto_model->update_produto($data['idproduto'],$data);

        if(!$status)
        {
            echo "NÃO ATUALIZOU!";
        }
        else
        {
            redirect('produto/buscar_produto');
        }
     }

     public function excluir_produto(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('produto_model');

        $id = $this->uri->segment(3);
        $status = $this->produto_model->excluir_produto($id);

        if($status){
			redirect('produto/buscar_produto');
		}else{
			echo "NÃO FOI POSSIVEL EXCLUIR!";
		}
     }
}