<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controles extends CI_Controller {

    var $prefix = "controles";

    public function __construct() {
        parent::__construct();
    }

    public function index($fecha = NULL) {
       
        $sql = " SELECT DISTINCT a.id,a.ani_rp,a.ani_nombre FROM animales a WHERE a.ani_estado = 1 ";
        $cons = $this->db->query($sql);
        $ani = $cons->result();
       
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index', compact('prefsmart','fecha','ani'));
    }
    
    public function save(){
        
        foreach ($_POST["id"] as $key => $v){
            
            $obj = new Control();
            
            if($_POST["verf"][$key] == "si" ){
                    $obj->animal_id = $v;
                    $obj->control1 = $_POST["control1"][$key];
                    $obj->control2 = $_POST["control2"][$key];
                    $obj->fechacontrol = $_POST["efecha"];
                   
            }else{
                    $obj->where(array("fechacontrol" => $_POST["efecha"],"animal_id" => $v))->get();
                    $obj->control1 = $_POST["control1"][$key];
                    $obj->control2 = $_POST["control2"][$key];                    
                    
                
            }
            $obj->save();
                
           
           
        }  
        print json_encode(array("say"=>"yes"));
        
    }
    

}

