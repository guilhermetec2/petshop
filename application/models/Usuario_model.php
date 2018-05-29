<?php
class Usuario_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_usuario($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('usuario');
            return $query->result_array();
        }

        $query = $this->db->get_where('usuario', array('idusuario' => $id));
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->where('idusuario', $id);

        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

    public function get_by_email($email) 
    {
        $this->db->where('emailusuario', $email);

        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return null;
        }
    }

     public function set_usuario($data=null)
    {
        $this->load->helper('url');

        if(is_null($data)){
            $data = array(
                'nomeusuario' => $this->input->post('nomeusuario'),
                'cpf' => $this->input->post('cpf'),
                'cargo' => $this->input->post('cargo'),
                'emailusuario' => $this->input->post('email'),
                'senhausuario' => $this->input->post('senha')
            );
        }

        $this->db->insert('usuario', $data);
        $idusuario = $this->db->insert_id();

        if($this->input->post('emailsenha'))
        {
            $dados = array(
                'nomeusuario' => $this->input->post('nomeusuario'),
                'emailusuario' => $this->input->post('email'),
                'idusuario' => $idusuario
            );

            $this->enviar_email($dados);
        }
        
    }

    function update_usuario($id, $data)
    {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('idusuario', $id);
        return $this->db->update('usuario', $data);
    }

    function excluir_usuario($id) 
    {
        if(is_null($id))
            return false;
        $this->db->where('idusuario', $id);
        return $this->db->delete('usuario');
    }

     function formatar($data){
      if($data){
        for($i = 0; $i < count($data); $i++){
          $data[$i]['editar_url'] = base_url('index.php/usuario/editar_usuario')."/".$data[$i]['idusuario'];
          $data[$i]['excluir_url'] = base_url('index.php/usuario/excluir_usuario')."/".$data[$i]['idusuario'];
        }
        return $data;
      } else {
        return false;
      }
    }

    function enviar_email($dados)
    {
        $this->load->library('email');

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '41f291d62ac386',
            'smtp_pass' => 'a0f9ed882b4fe5',
            'crlf' => "\r\n",
            'newline' => "\r\n",
            'mailtype' => 'html'
        );
        $this->email->initialize($config);

        $this->email->from('petshop@email.com.br', 'PetShop');
        $this->email->to($dados['emailusuario']);

        $this->email->subject('Cadastro de senha PetShop');
        $this->email->message($this->load->view('template/adm/email_template',$dados, TRUE));

        $this->email->send();
    }
}