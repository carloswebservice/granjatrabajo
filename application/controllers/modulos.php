<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modulos extends CI_Controller {

    var $prefix = "modulos";

    public function __construct() {
        parent::__construct();
        if($_SESSION["is_logued"]){
            //echo "se logueo";
        }else{
            redirect(base_url());
        }
    }

    public function index() {         
       
         $obj = new Modulo();
        $modulos = $obj->where("estado", "A")->where("mod_padre", "0")->get();
        
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart','modulos'));
    }

    function datatable() {
        $this->datatables->select('id,mod_descripcion,mod_url,estado,mod_orden')
                ->unset_column('id')        
                ->add_column('actions', get_check('$1'), 'id')
                ->from('seguridad.modulos')
                ->where('estado',"A");
        echo $this->datatables->generate();
    }

    public function json_getmodulos_id() {

        $id = $this->input->post('id');
        $obj = new Modulo();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
           if ($this->input->post()) {

            $obj = new Modulo();
            if ($this->input->post("id") !== "") {
                $obj->where('id', $this->input->post('id'))->get();
            }
            $obj->mod_descripcion = strtoupper($this->input->post("mod_descripcion"));
            $obj->mod_url = strtoupper($this->input->post("mod_url"));
            $obj->mod_padre = strtoupper($this->input->post("mod_padre"));
            $obj->mod_icono = strtolower($this->input->post("mod_icono"));
            $obj->mod_acceso = "".$this->input->post("mod_acceso");
            $obj->mod_orden = "".$this->input->post("mod_orden");
            $obj->estado = "A";

            if ($obj->save()) {

                if ($this->input->post("id") == "") {

                    $perfil = new Perfil();
                    $perfiles = $perfil->where('estado', 'A')->get();

                    foreach ($perfiles as $p) {
                        $perm = new Permiso();
                        $perm->modulo_id = $obj->id;
                        $perm->perfil_id = $p->id;
                        $perm->estado = "I";
                        $perm->save();
                    }
                }
                //exit();
                print json_encode(array("say" => "yes"));
            } else {

                $errores = $obj->error->all;
                print json_encode($errores);
            }
        }
    }

    
    public function delete(){
        $modulo = new Modulo();
        $modulo->where('id', $this->input->post('id'))->get();
        $modulo->estado = "I";
        if($modulo->save()){
            $res = array("say" => "yes");
        }else{
            $res = array("say" => "no");
        }
        print json_encode($res);
    }


}

