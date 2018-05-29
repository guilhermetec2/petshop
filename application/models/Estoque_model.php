<?php
class Estoque_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_estoque($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('estoque.qtd, produto.idproduto, produto.nome, produto.qtdminima');
            $this->db->from('estoque');
            $this->db->join('produto', 'estoque.idproduto = produto.idproduto');
            $query = $this->db->get();
            return $query->result_array();
            // $query = $this->db->get('estoque');
            // return $query->result_array();
        }

        $query = $this->db->get_where('estoque', array('idproduto' => $id));
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->where('idproduto', $id);

        $query = $this->db->get('estoque');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_perda_estoque()
    {
        $this->load->helper('url');

        $idproduto = $this->input->post('idproduto');
        $qtd = $this->input->post('qtd');

        $produto = $this->getById($idproduto);

        $perda = $produto['qtd'] - $qtd;
        $qtd = ($perda < 0) ? 0 : $perda; 

        $data = array(
            'idproduto' => $idproduto,
            'qtd' => $qtd
        );
        
        return $this->update_estoque($idproduto, $data);
    }

    function update_estoque($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idproduto', $id);
        return $this->db->update('estoque', $data);
    }

    function excluir_estoque($id) 
    {
        if(is_null($id))
            return false;
        $this->db->where('idproduto', $id);
        return $this->db->delete('estoque');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/estoque/editar_estoque')."/".$data[$i]['idproduto'];
          $data[$i]['excluir_url'] = base_url('index.php/estoque/excluir_estoque')."/".$data[$i]['idproduto'];
        }
        return $data;
      } else {
        return false;
      }
    }
}