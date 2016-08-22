<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    var $prefix = "usuarios";

    public function __construct() {
        parent::__construct();
        if($_SESSION["is_logued"]){
            //echo "se logueo";
        }else{
            redirect(base_url());
        }
    }

    public function index() {         
        $obj = new Perfil();
        $perfiles = $obj->where("estado", "A")->get();
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart','perfiles'));
    }

    function datatable() {
        $this->datatables->select('su.id as id,su.usu_nombre as usu_nombre,su.usu_apellidos as usu_apellidos,'
                . 'su.usu_usuario as usu_usuario,su.estado as estado,sp.per_descripcion as perfil')
                ->unset_column('id')        
                ->add_column('actions', get_check('$1'), 'id')
                ->from('seguridad.usuarios su')
                ->join('seguridad.perfiles sp','su.perfil_id = sp.id','inner')
                ->where('su.estado',"A");
        echo $this->datatables->generate();
    }

    public function json_getusuarios_id() {

        $id = $this->input->post('id');
        $obj = new Usuario();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
             if ($this->input->post()) {
            
            $obj = new Usuario();
            if($this->input->post("id") !== ""){
                $obj->where('id', $this->input->post('id'))->get();
            }
            $obj->usu_nombre = strtoupper($this->input->post("usu_nombre"));
            $obj->usu_apellidos = strtoupper($this->input->post("usu_apellidos"));         
            $obj->usu_usuario = strtoupper($this->input->post("usu_usuario"));
            $obj->usu_password = strtoupper($this->input->post("usu_password"));
            $obj->perfil_id = $this->input->post("perfil_id");
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
        $obj = new Usuario();
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

