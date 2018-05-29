<?php
class Produto_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_produto($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('produto');
            return $query->result_array();
        }

        $query = $this->db->get_where('produto', array('idproduto' => $id));
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->where('idproduto', $id);

        $query = $this->db->get('produto');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_produto()
    {
        $this->load->helper('url');
        $this->load->model('categoria_model');
        $this->load->model('marca_model');

        $nomecategoria = $this->input->post('nomecategoria');
        $nomemarca = $this->input->post('nomemarca');

        if(isset($nomecategoria)){
            $data = array(
                'nomecategoria' => $nomecategoria
            );
            $this->categoria_model->set_categoria($data);
            $idcategoria = $this->db->insert_id();
        }
        else{
            $idcategoria = $this->input->post('idcategoria');
        }

        if(isset($nomemarca)){
            $data = array(
                'nomemarca' => $nomemarca,
                'idfornecedor' => $this->input->post('idfornecedor')
            );
            $this->marca_model->set_marca($data);
            $idmarca = $this->db->insert_id();
        }
        else{
            $idmarca = $this->input->post('idmarca');
        }

        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'preco' => $this->input->post('preco'),
            'qtdminima' => $this->input->post('qtdminima'),
            'idcategoria' => $idcategoria,
            'idmarca' => $idmarca,
            'idtipopet' => $this->input->post('idtipopet'),
        );
        return $this->db->insert('produto', $data);
    }

    function update_produto($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idproduto', $id);
        return $this->db->update('produto', $data);
    }

    function excluir_produto($id) 
    {
        if(is_null($id))
            return false;
        $this->db->where('idproduto', $id);
        return $this->db->delete('produto');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/produto/editar_produto')."/".$data[$i]['idproduto'];
          $data[$i]['excluir_url'] = base_url('index.php/produto/excluir_produto')."/".$data[$i]['idproduto'];
        }
        return $data;
      } else {
        return false;
      }
    }
}