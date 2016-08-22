<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perfiles extends CI_Controller {

    var $prefix = "perfiles";

    public function __construct() {
        parent::__construct();
        if($_SESSION["is_logued"]){
            //echo "se logueo";
        }else{
            redirect(base_url());
        }
    }

    public function index() {         
       
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }

    function datatable() {
        $this->datatables->select('id,per_descripcion,estado')
                ->unset_column('id')        
                ->add_column('actions', get_check('$1'), 'id')
                ->from('seguridad.perfiles')
                ->where('estado',"A");
        echo $this->datatables->generate();
    }

    public function json_getperfiles_id() {

        $id = $this->input->post('id');
        $obj = new Perfil();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
            if ($this->input->post()) {

            $obj = new Perfil();
            if ($this->input->post("id") !== "") {
                $obj->where('id', $this->input->post('id'))->get();
            }
            $obj->per_descripcion = strtoupper($this->input->post("per_descripcion"));
            $obj->estado = "A";

            if ($obj->save()) {

                if ($this->input->post("id") == "") {
                    $modulo = new Modulo();
                    $modulos = $modulo->where('estado', 'A')->get();

                    foreach ($modulos as $m) {
                        $perm = new Permiso();
                        $perm->modulo_id = $m->id;
                        $perm->perfil_id = $obj->id;
                        $perm->estado = "I";
                        $perm->save();
                    }
                }



                print json_encode(array("say" => "yes"));
            } else {

                $errores = $obj->error->all;
                print json_encode($errores);
            }
        }
    }

       public function delete(){
        $id = $_POST["id"];
        $obj = new Perfil();
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

