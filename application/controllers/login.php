<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            //$this->layout->setLayout('templateweb');
        }
    
	public function verificar()
	{   
            $user = $_POST["usuario"];
            $clave = $_POST["clave"];
            
            $conds = array("estado"=>"A","usu_usuario" => $user,"usu_password" => $clave);
            
           
                $nob = new Usuario();
                $nob = $nob->where($conds)->get();
                
                if (!empty($nob->id)) {
                     $data = array(
                        'is_logued' => TRUE,
                        'id_usuario' => $nob->id,
                        'perfil' => $nob->perfil_id,
                        'username' => $nob->usu_nombre." ".$nob->usu_apellidos
                    );
                    $this->session->set_userdata($data);
                    $array = array("say" => "yes");
                    print json_encode($array);
                }else{
                    $array = array("say" => "no");
                    print json_encode($array);
                }
            
            //$this->layout->view('index');
}

                
        
           public function delete() {
        $this->session->sess_destroy();
        redirect(base_url(), "refresh");
    }

        
}