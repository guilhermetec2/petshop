<?php
class Session_model extends CI_Model {

    public function __construct()
    {
            $this->load->library('session');
            $this->load->database();
    }

    public function set_session($usuario)
    {
        $_SESSION['email'] = $usuario['emailusuario'];
        $_SESSION['idusuario']  = $usuario['idusuario'];
        $_SESSION['nomecompleto']  = $usuario['nomeusuario'];
        $nome = explode(" ", $usuario['nomeusuario']);
        $_SESSION['primeironome']  = $nome[0];
    }

    public function check_session()
    {
        $session = $_SESSION['email'];
        if( ! isset($session)){
            redirect('pagina/login_admin');       
        }
    }

    public function valida_login($usuario){
        $this->load->model('usuario_model');
        $data = $this->usuario_model->get_by_email($usuario['email']);

        if($data != null)
        {
            if($data['senhausuario'] == $usuario['senha']){
                $this->set_session($data);
                return true;
            }
            else{
                $data['msg'] = "Senha incorreta.";
            }
        }
        else{
           $data['msg'] = "Usuário não cadastrado.";
        }
         $this->load->view('template/adm/login_admin',$data);
        
    }
}