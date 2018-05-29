<?php
class Marca_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_marca($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('marca');
            return $query->result_array();
        }

        $query = $this->db->get_where('marca', array('idmarca' => $id));
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->where('idmarca', $id);

        $query = $this->db->get('marca');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_marca($data = null)
    {
        $this->load->helper('url');

        if(is_null($data)){
            $data = array(
                'nomemarca' => $this->input->post('nomemarca'),
                'idfornecedor' => $this->input->post('idfornecedor')
            );
        }
        return $this->db->insert('marca', $data);
    }

    function update_marca($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idmarca', $id);
        return $this->db->update('marca', $data);
    }

    function excluir_marca($id) 
    {
        if(is_null($id))
            return false;
        $this->db->where('idmarca', $id);
        return $this->db->delete('marca');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/marca/editar_marca')."/".$data[$i]['idmarca'];
          $data[$i]['excluir_url'] = base_url('index.php/marca/excluir_marca')."/".$data[$i]['idmarca'];
        }
        return $data;
      } else {
        return false;
      }
    }
}