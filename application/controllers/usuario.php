<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Usuario extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('usuario_model');
    }

     public function cadastro_usuario(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('usuario_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomeusuario', 'Nome usuario', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_usuario');
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $this->usuario_model->set_usuario();
            redirect('usuario/buscar_usuario');
        }       
    }

    public function cadastrar_senha_usuario(){

        $this->load->model('usuario_model');
        $this->load->model('session_model');
        $this->load->helper('form');

        $id = $this->uri->segment(3);

        $data['usuario'] = $this->usuario_model->getById($id);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/cadastrar_senha_usuario',$data);
        $this->load->view('template/adm/footer');

        $senha = $this->input->post('senhausuario');

        if(isset($senha))
        {
            $data   = $this->input->post();
            $this->usuario_model->update_usuario($data['idusuario'],$data);
            $this->session_model->set_session($data);
            redirect("pagina/admin");
        }
        
    }

    public function buscar_usuario(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('usuario_model');

        $data = $this->usuario_model->get_usuario();
        $data['usuarios'] = $this->usuario_model->formatar($data);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/buscar_usuario',$data);
        $this->load->view('template/adm/footer');
    }

    public function editar_usuario(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('usuario_model');
        $this->load->helper('form');

        $id = $this->uri->segment(3);

        $data['usuario'] = $this->usuario_model->getById($id);

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/editar_usuario',$data);
        $this->load->view('template/adm/footer');
    }

     public function atualizar_usuario(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('usuario_model');

         $data   = $this->input->post();
         $status = $this->usuario_model->update_usuario($data['idusuario'],$data);

        if(!$status)
        {
            echo "NÃO ATUALIZOU!";
        }
        else
        {
            redirect('usuario/buscar_usuario');
        }
     }

     public function excluir_usuario(){

        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('usuario_model');

        $id = $this->uri->segment(3);
        $status = $this->usuario_model->excluir_usuario($id);

        if($status){
			redirect('usuario/buscar_usuario');
		}else{
			echo "NÃO FOI POSSIVEL EXCLUIR!";
		}
     }
}