<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personales extends CI_Controller {

    var $prefix = "personales";

    public function __construct() {
        parent::__construct();
       
    }

    public function index() {         
        $obj = new Departamento();
        $dpto = $obj->get();
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart','dpto'));
    }

    function datatable() {
        $this->datatables->select('pe.id as id ,pe.per_nombre as per_nombre, pe.per_apepa as per_apepa, pe.per_apema as per_apema,'
                . 'pe.per_direccion as per_direccion,pe.per_telefono as per_telefono, pe.per_dni as per_dni ,pe.per_estado as per_estado,di.distrito as distrito')
                ->unset_column('id')        
                ->add_column('actions', get_check('$1'), 'id')
                ->from('personal pe')
                ->join('distrito di','di.id = pe.per_distrito','inner')
                ->where('pe.per_estado',1);
        echo $this->datatables->generate();
    }

    public function json_getpersonales_id() {

        $id = $this->input->post('id');
        $obj = new Personal();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }
    
     public function json_provincias() {

        $id = $this->input->post('id');
        $prov = new Provincia();
        $prov->where('id_depa', $id);
        $prov->get();
        $prov->all_to_array();

        $results = array();
        foreach ($prov as $o) {
            $results[] = $o->to_json(array('id', 'provincia'), TRUE);
        }
        print '[' . join(',', $results) . ']';
    }

    public function json_distritos() {

        $id = $this->input->post('id');
        $prov = new Distrito();
        $prov->where('id_prov', $id);
        $prov->get();
        $prov->all_to_array();

        $results = array();
        foreach ($prov as $o) {
            $results[] = $o->to_json(array('id', 'distrito'), TRUE);
        }
        print '[' . join(',', $results) . ']';
    }


    public function save(){
             if ($this->input->post()) {
            
            $obj = new Personal();
            if($this->input->post("id") !== ""){
                $obj->where('id', $this->input->post('id'))->get();
            }
            $obj->per_apepa = strtoupper($this->input->post("per_apepa"));
            $obj->per_apema = strtoupper($this->input->post("per_apema"));         
            $obj->per_nombre = strtoupper($this->input->post("per_nombre"));
            $obj->per_direccion = strtoupper($this->input->post("per_direccion"));
            $obj->per_telefono = trim($this->input->post("per_telefono"));
            $obj->per_dni = $this->input->post("per_dni");
            $obj->per_distrito = $this->input->post("per_distrito");
            $obj->prov_id = $this->input->post("prov_id");
              $obj->depa_id = $this->input->post("depa_id");
            $obj->per_estado = 1;

            if($obj->save()){
                print json_encode(array("say"=>"yes"));
            }else{
               
                $errores = $obj->error->all;
                print json_encode($errores);
            }
        }
    }

       public function delete(){
        $id = $_POST["id"];
        $obj = new Personal();
        $obj->where('id', $id)->get();
        $obj->per_estado = 0;
        if($obj->save()){
             $res =  array("say"=>"yes");
        }else{
             $res =  array("say"=>"no");
        }
        print json_encode($res);
    }


}

