<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intranet extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->layout->setLayout('templateintranet');
        }
    
	public function index()
	{
            $this->layout->view('index');
	}
        
        public function hola()
        {
            $this->layout->view('hola');
        }        
}