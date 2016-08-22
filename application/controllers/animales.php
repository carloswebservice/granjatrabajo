w<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Animales extends CI_Controller {

    var $prefix = "animales";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $tiporeg = new Tiporegistro();
        $tiporeg = $tiporeg->where("tiporeg_estado",1)->get();
        
        $raz = new Raza();
        $raz = $raz->where("raz_estado",1)->get();
        
        $scr = new Sexo();
        $scr = $scr->where("scr_estado",1)->get();
        
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart','tiporeg','raz','scr'));
    }

    function datatable() {
        $this->datatables->select('ani.id as id,ani.ani_rp as ani_rp ,ani.ani_nombre as ani_nombre,ani.ani_padre as ani_padre,'
                . 'ani.ani_madre as ani_madre,ani.ani_fechanac as ani_fechanac,tiporeg.tiporeg_descripcion as tiporeg_descripcion,'
                . 'raz.raz_descripcion as raz_descripcion,ani.ani_proveedor as ani_proveedor, scr.scr_descripcion as scr_descripcion, ani.ani_estado')
                ->unset_column('id')     
                ->add_column('actions', get_check('$1'), 'id')
                ->from('animales as ani' )
                ->join('tipo_registro as tiporeg ', 'tiporeg.id = ani.ani_tiporeg', 'inner')
                ->join('raza as raz ', 'raz.id = ani.ani_raza', 'inner')
                ->join('sexo_cria as scr ', 'scr.scr_id = ani.ani_sexo', 'inner')
                ->where('ani.ani_estado',1);
        echo $this->datatables->generate();
    }

    public function json_getanimales_id() {

        $id = $this->input->post('id');
        $obj = new Animal();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
        if ($this->input->post()) {

            $obj = new Animal();
            if($this->input->post("id") !== ""){
                
                $obj->where('id', $this->input->post('id'))->get();
            }
            $obj->ani_rp = $this->input->post("ani_rp");
            $obj->ani_nombre = strtoupper($this->input->post("ani_nombre"));
            $obj->ani_padre = $this->input->post("ani_padre");
            $obj->ani_madre = $this->input->post("ani_madre");
            if($this->input->post("ani_fechanac") !== ""){
                $obj->ani_fechanac = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("ani_fechanac"))));
            }
            
            $obj->ani_fechareg = date('Y-m-d');
            $obj->ani_tiporeg = $this->input->post("ani_tiporeg");
            $obj->ani_raza = $this->input->post("ani_raza");
            $obj->ani_descripcion = $this->input->post("ani_descripcion");
            $obj->ani_proveedor = strtoupper($this->input->post("ani_proveedor"));
            $obj->ani_sexo = $this->input->post("ani_sexo");
            $obj->ani_estado = 1;

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
        $obj = new Animal();
        $obj->where('id', $id)->get();
        $obj->ani_estado = 0;
        if($obj->save()){
             $res =  array("say"=>"yes");
        }else{
             $res =  array("say"=>"no");
        }
        print json_encode($res);
    }


}

