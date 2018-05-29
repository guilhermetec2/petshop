<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Categoria extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('categoria_model');
    }

     public function cadastro_categoria(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('categoria_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomecategoria', 'Nome da Categoria', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_categoria');
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $this->categoria_model->set_categoria();
            redirect('categoria/buscar_categoria');
        }           
    }

    public function buscar_categoria(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('categoria_model');

        $data = $this->categoria_model->get_categoria();
        $data['categorias'] = $this->categoria_model->formatar($data);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/buscar_categoria',$data);
        $this->load->view('template/adm/footer'); 
    }

    public function editar_categoria(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('categoria_model');
        $this->load->helper('form');

        $id = $this->uri->segment(3);

        $data['categoria'] = $this->categoria_model->getById($id);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/editar_categoria',$data);
        $this->load->view('template/adm/footer'); 
    }

    public function atualizar_categoria(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('categoria_model');

        $data   = $this->input->post();
        $status = $this->categoria_model->update_categoria($data['idcategoria'],$data);

        if(!$status)
        {
            echo "NÃO ATUALIZOU!";
        }
        else
        {
            redirect('categoria/buscar_categoria');
        }
    }

     public function excluir_categoria(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('categoria_model');

        $id = $this->uri->segment(3);
        $status = $this->categoria_model->excluir_categoria($id);

        if($status){
            redirect('categoria/buscar_categoria');
        }else{
            echo "NÃO FOI POSSIVEL EXCLUIR!";
        }
     }
}