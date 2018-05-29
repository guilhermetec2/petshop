<?php
class Fornecedor_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_fornecedor($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('fornecedor');
            return $query->result_array();
        }

        $query = $this->db->get_where('fornecedor', array('idfornecedor' => $id));
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->where('idfornecedor', $id);

        $query = $this->db->get('fornecedor');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_fornecedor($data=null)
    {
        $this->load->helper('url');

        if(is_null($data)){
            $data = array(
                'nomefornecedor' => $this->input->post('nomefornecedor'),
                'cnpj' => $this->input->post('cnpj'),
                'endereco' => $this->input->post('endereco'),
                'telefone' => $this->input->post('telefone'),
            );
        }

        return $this->db->insert('fornecedor', $data);
    }

    function update_fornecedor($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idfornecedor', $id);
        return $this->db->update('fornecedor', $data);
    }

    function excluir_fornecedor($id) 
    {
        if(is_null($id))
            return false;
        $this->db->where('idfornecedor', $id);
        return $this->db->delete('fornecedor');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/fornecedor/editar_fornecedor')."/".$data[$i]['idfornecedor'];
          $data[$i]['excluir_url'] = base_url('index.php/fornecedor/excluir_fornecedor')."/".$data[$i]['idfornecedor'];
        }
        return $data;
      } else {
        return false;
      }
    }
}