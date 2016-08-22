<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            
            $this->layout->setLayout('templateweb');
            
        }
    
	public function index()
	{            
            $this->layout->view('index');
	}
        
        public function contacto()
        {
            $this->layout->view('contacto');
        }
        
         public function nosotros()
        {
            $this->layout->view('nosotros');
        } 
}