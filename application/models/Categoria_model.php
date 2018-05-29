<?php
class Categoria_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_categoria($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('categoria');
            return $query->result_array();
        }

        $query = $this->db->get_where('categoria', array('idcategoria' => $id));
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->where('idcategoria', $id);

        $query = $this->db->get('categoria');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_categoria($data = null)
    {
        $this->load->helper('url');

        if(is_null($data)){
            $data = array(
                'nomecategoria' => $this->input->post('nomecategoria')
            );
        }
        return $this->db->insert('categoria', $data);
    }

    function update_categoria($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idcategoria', $id);
        return $this->db->update('categoria', $data);
    }

    function excluir_categoria($id) 
    {
        if(is_null($id))
            return false;
        $this->db->where('idcategoria', $id);
        return $this->db->delete('categoria');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/categoria/editar_categoria')."/".$data[$i]['idcategoria'];
          $data[$i]['excluir_url'] = base_url('index.php/categoria/excluir_categoria')."/".$data[$i]['idcategoria'];
        }
        return $data;
      } else {
        return false;
      }
    }
}