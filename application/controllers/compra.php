<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Compra extends CI_Controller{

    function __contruct(){
        parent::__contruct();
        $this->load->helper('url');
        $this->load->model('compra_model');
    }

     public function cadastro_compra(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('compra_model');
        $this->load->model('fornecedor_model');
        $this->load->model('produto_model');

        $data['fornecedores'] = $this->fornecedor_model->get_fornecedor();
        $data['produtos'] = $this->produto_model->get_produto();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('idproduto_0', 'Produto', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/adm/header');
            $this->load->view('template/adm/cadastro_compra',$data);
            $this->load->view('template/adm/footer');
        }
        else 
        {
            $cont = 0;
            $chaves = array_keys($this->input->post());

            foreach ($chaves as $value)
            {
               $string = explode('_',$value);
               if($string[0] == 'idproduto')
               {
                   $cont++;
               }
            }
            
            $this->compra_model->set_compra($cont);
            redirect('compra/historico_compra');
        }       
    }

    public function historico_compra(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('compra_model');
        $this->load->model('fornecedor_model');

        $data_compra = $this->compra_model->get_compra();

        $data['compras'] = array();

        foreach ($data_compra as $compra) 
        {
            $qtd  = 0;
            $valor = 0;
            $fornecedor = $this->fornecedor_model->getById($compra['idfornecedor']);
            $produtos   = $this->compra_model->get_produtos_compra($compra['idcompra']);

            foreach ($produtos as $produto) {
                $qtd = $qtd + $produto['qtd'];
                $valor = $valor + $produto['custo'];
            }

            $data['compras'][] = array(
                'idcompra' => $compra['idcompra'],
                'itens' => $qtd,
                'valor' => $valor,
                'fornecedor' => $fornecedor['nomefornecedor'],
                'idfornecedor' => $fornecedor['idfornecedor'],
                'data' => $compra['dataregistro'],
                'editar_url' => base_url('index.php/compra/editar_compra')."/".$compra['idcompra'],
                'excluir_url' => base_url('index.php/compra/excluir_compra')."/".$compra['idcompra'],
            );
        }

        $this->load->view('template/adm/header');
        $this->load->view('template/adm/historico_compra',$data);
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

     public function excluir_compra(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('compra_model');

        $id = $this->uri->segment(3);
        $status = $this->compra_model->excluir_compra($id);

        if($status){
			redirect('compra/historico_compra');
		}else{
			echo "NÃO FOI POSSIVEL EXCLUIR!";
		}
     }

     public function ajax_get_preco(){
        $this->load->model('session_model');
        $this->session_model->check_session();
        
        $this->load->model('produto_model');

        $post = $this->input->post();
        $produto   = $this->produto_model->getById($post['idproduto']);

        echo $produto['preco'];

     }

     public function ajax_add_produto(){
        $this->load->model('session_model');
        $this->session_model->check_session();

        $this->load->model('produto_model');

        $data['post']    = $this->input->post(); 
        $data['produtos'] = $this->produto_model->get_produto();

        $this->load->view('template/adm/ajax_produto',$data);
     }
}