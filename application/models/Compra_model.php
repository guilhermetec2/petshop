<?php
class Compra_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_compra($id = FALSE)
    {
        if ($id === FALSE)
        {
            // $this->db->select('compra.idfornecedor, compra_produto.*');
            // $this->db->from('compra');
            // $this->db->join('compra_produto', 'compra_produto.idcompra = compra.idcompra');
            // $query = $this->db->get();
            // return $query->result_array();
            $this->db->order_by('dataregistro', 'DESC');
            $query = $this->db->get('compra');
            return $query->result_array();
        }

        $query = $this->db->get_where('compra', array('idcompra' => $id));
        return $query->row_array();
    }

    public function get_produtos_compra($idcompra) 
    {
        $this->db->where('idcompra', $idcompra);

        $query = $this->db->get('compra_produto');

        return $query->result_array();
    }

    public function getById($id) 
    {
        $this->db->where('idcompra', $id);

        $query = $this->db->get('compra');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_compra($numProdutos)
    {
        $this->load->helper('url');
        $this->load->model('fornecedor_model');
        $date = date("Y-m-d");

        $nomefornecedor = $this->input->post('nomefornecedor');

        if( isset($nomefornecedor)){
            $data = array(
                'nomefornecedor' => $this->input->post('nomefornecedor'),
                'cnpj' => $this->input->post('cnpj'),
                'endereco' => $this->input->post('endereco'),
                'telefone' => $this->input->post('telefone'),
            );
            $this->fornecedor_model->set_fornecedor($data);
            $idfornecedor = $this->db->insert_id();
        }
        else{
            $idfornecedor = $this->input->post('idfornecedor');
        }
        
        $data = array(
            'idfornecedor' => $idfornecedor,
            'dataregistro' => $date
        );

        $this->db->insert('compra', $data);

        $idcompra = $this->db->insert_id();

        for($i = 0; $i < $numProdutos; $i++)
        {
            $data = array();

            $idproduto = $this->input->post('idproduto_'.$i);
            $preco = $this->input->post('preco_'.$i);
            $qtd   = $this->input->post('qtd_'.$i);
            $custo = $preco * $qtd;

            $this->db->where('idproduto', $idproduto);
            $query = $this->db->get('estoque');
            $estoque = $query->row_array();

            if($estoque)
            {
                $qtd = $qtd + $estoque['qtd'];
                $data = array(
                    'idproduto' => $idproduto,
                    'qtd' => $qtd
                );
                $this->db->where('idproduto', $idproduto);
                $this->db->update('estoque', $data);
            }
            else {
                $data = array(
                    'idproduto' => $idproduto,
                    'qtd' => $qtd
                );
                $this->db->insert('estoque', $data);
            }

            $data = array();

            $data = array(
                'idcompra' => $idcompra,
                'idproduto' => $idproduto,
                'qtd' => $qtd,
                'custo' => $custo
            );
            $this->db->insert('compra_produto', $data);
        }
    }

    function update_compra($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idcompra', $id);
        return $this->db->update('compra', $data);
    }

    function excluir_compra($id) 
    {
        if(is_null($id))
            return false;
        
        $this->db->where('idcompra', $id);
        $this->db->delete('compra');

        $this->db->where('idcompra', $id);
        return $this->db->delete('compra_produto');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/compra/editar_compra')."/".$data[$i]['idcompra'];
          $data[$i]['excluir_url'] = base_url('index.php/compra/excluir_compra')."/".$data[$i]['idcompra'];
        }
        return $data;
      } else {
        return false;
      }
    }
}