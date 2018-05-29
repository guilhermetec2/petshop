<?php
class Tipopet_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_tipopet($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('tipopet');
            return $query->result_array();
        }

        $query = $this->db->get_where('tipopet', array('idtipopet' => $id));
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->where('idtipopet', $id);

        $query = $this->db->get('tipopet');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_tipopet()
    {
        $this->load->helper('url');

        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao')
        );

        return $this->db->insert('tipopet', $data);
    }

    function update_tipopet($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idtipopet', $id);
        return $this->db->update('tipopet', $data);
    }

    function excluir_tipopet($id) 
    {
        if(is_null($id))
            return false;
        $this->db->where('idtipopet', $id);
        return $this->db->delete('tipopet');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/tipopet/editar_tipopet')."/".$data[$i]['idtipopet'];
          $data[$i]['excluir_url'] = base_url('index.php/tipopet/excluir_tipopet')."/".$data[$i]['idtipopet'];
        }
        return $data;
      } else {
        return false;
      }
    }
}