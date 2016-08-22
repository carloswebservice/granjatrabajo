<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Escuelas extends CI_Controller {

    var $prefix = "escuelas";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$dpto = new Departamento();
        //$dpto->get();
        $facs = new Facultad();
        $facs = $facs->where('estado',"A")->get();
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart','facs'));
    }

    function datatable() {
        $this->datatables->select('e.id as id, e.descripcion as descripcion, f.descripcion as facultad , e.estado')
                ->unset_column('id')
             //   ->add_column('logo', '<div style="height:30px;width:110px;"><img style="height:95%;" src="'.base_url()."public/img/empresas/".'$1" /></div>','logo')
                //->add_column('actions', get_buttons('$1','empresas'), 'id')
                ->add_column('actions', get_check('$1'), 'id')
                ->from('escuelas as e ' )
                ->join('facultades as f ', 'f.id = e.facultad_id', 'inner')
               // ->join()
                ->where('e.estado',"A");
        echo $this->datatables->generate();
    }

    public function json_getescuelas_id() {

        $id = $this->input->post('id');
        $obj = new Escuela();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
        if ($this->input->post()) {

            $obj = new Escuela();
            if($this->input->post("id") !== ""){
                $obj->where('id', $this->input->post('id'))->get();
            }
            $obj->facultad_id = $this->input->post("facultad_id");
            $obj->descripcion = strtoupper($this->input->post("descripcion"));
            $obj->estado = "A";

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
        $obj = new Escuela();
        $obj->where('id', $id)->get();
        $obj->estado = "I";
        if($obj->save()){
             $res =  array("say"=>"yes");
        }else{
             $res =  array("say"=>"no");
        }
        print json_encode($res);
    }


}

