<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cursos extends CI_Controller {

    var $prefix = "cursos";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$dpto = new Departamento();
        //$dpto->get();

        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }

    function datatable() {
        $this->datatables->select('id,descripcion,estado')
                ->unset_column('id')
             //   ->add_column('logo', '<div style="height:30px;width:110px;"><img style="height:95%;" src="'.base_url()."public/img/empresas/".'$1" /></div>','logo')
                //->add_column('actions', get_buttons('$1','empresas'), 'id')
                ->add_column('actions', get_check('$1'), 'id')
                ->from($this->prefix)
                ->where('estado',"A");
        echo $this->datatables->generate();
    }

    public function json_getcursos_id() {

        $id = $this->input->post('id');
        $obj = new Curso();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
        if ($this->input->post()) {

            $obj = new Curso();
            if($this->input->post("id") !== ""){
                $obj->where('id', $this->input->post('id'))->get();
            }
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
        $obj = new Curso();
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

