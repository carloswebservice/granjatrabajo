<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->layout->setLayout('templatepanel');
              if($_SESSION["is_logued"]){
                    //echo "se logueo";
              }else{
                    redirect(base_url());
              }
        }
    
	public function index()
	{
            $this->layout->view('index');
	}
        public function vienvenida()
	{
            $this->load->view('/panel/index');
	}
        
        public function action($param){
            $paramx = $param;
            $this->load->view('/panel/param',  compact("paramx"));
        }
        
}