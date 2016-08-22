<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth
{
	
	protected $ci;
	
	//creamos una instancia del super objeto de codeigniter
	//en el constructor para poder tenerlo disponible las veces
	//que necesitemos sin repetir la misma línea
	public function __construct()
	{
		
		$this->ci =& get_instance();
		
	}
	
	//creamos una token para nuestros formularios
	public function token()
        {
    	
            $token = md5(uniqid(rand(),true));
            $this->ci->session->set_userdata('token',$token);
            return $token;
		
        }	
	
	//función para crear sesiones
	public function crear_sesiones($email,$password)
	{
		
		$data = array('email' => $email, 'password' => $this->ci->bcrypt->hash_password($password));
		
		$this->ci->session->set_userdata($data);
		
	}
	
	//función para enviar emails al registrarse
	public function send_mail($email,$password)
	{
		
		$config['useragent'] = "CodeIgniter";
		$config['mailpath']  = "/usr/sbin/sendmail";	// Sendmail path
		$config['protocol']  = "smtp";                      // mail/sendmail/smtp
		$config['smtp_host'] = "ssl://smtp.gmail.com";		// SMTP Server.  Example: mail.earthlink.net
		$config['smtp_user'] = "millerpaulrd@gmail.com";		// SMTP Username
		$config['smtp_pass'] = "(210393RD)";		// SMTP Password
		$config['smtp_port'] = "465";		// SMTP Port
		$config['mailtype']	= "html";	// text/html  Defines email formatting
		$config['charset'] = "utf-8";	// Default char set: iso-8859-1 or us-ascii			
					
		$this->ci->load->library('email',$config);
		$this->ci->email->set_newline("\r\n");
		$this->ci->email->from('INTECI','Datos de Usuario');
                $this->ci->email->to($email);
                $this->ci->email->subject('Se ha registrado correctamente.');
                $this->ci->email->message('Sus datos de acceso:<br /><br />Email: '.$email. '<br />Password: '.$password);
                $this->ci->email->send();	
			
	}
	
	//función para cerrar sesión
	public function logout()
	{
				
		$this->ci->session->unset_userdata(array('email', 'password'));
		$this->ci->session->sess_destroy();	
		$this->ci->session->sess_create(); 
		$this->ci->session->set_flashdata('cerrada','La sessión se ha cerrado correctamente.');
		redirect(base_url('login','refresh'));			
		
	}
        
       
        public function generamenu($id)
        {
            
            $perid = "1";
            $where = array('keyperm.perfil_id'=>$perid,'modu.mod_estado'=>'A','modu.mod_idmodpadre'=>$id);                   
            $query = $this->ci->db
                    ->select('modu.id,modu.mod_descripcion as descripcion,modu.mod_url,modu.mod_idmodpadre,modu.mod_icono')
                    ->from('perfiles_modulos as keyperm ')
                    ->join('modulos as modu','keyperm.modulo_id = modu.id','inner')
                    ->join('perfiles as per','per.id = keyperm.perfil_id','inner')
                    ->where($where)
                    ->get();
            //echo $this->db->last_query();exit();
            $opt = $query->result_array();
            
            $html= "";
            
            foreach ($opt as $o){
                if($o["mod_url"] == "#"){
                    $html.="<li>";
                    $html.="<a href='#'><i class='fa fa-lg fa-fw ".$o["mod_icono"]."'></i> <span class='menu-item-parent'>".$o["descripcion"]."</span></a>";
                    $html.="<ul>";
                    $html.=$this->generamenu($o["id"]);
                    $html.="</ul>";
                    $html.="</li>";
                }else{
                    $html.="<li><a href='".$o["mod_url"]."'>".$o["descripcion"]."</a></li>";
                }
            }
            
            return $html;
        }
 
}
/*
 * end libraries/auth.php
 */