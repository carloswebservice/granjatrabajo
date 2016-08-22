<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Docentes extends CI_Controller {

    var $prefix = "docentes";

    public function __construct() {
        parent::__construct();
        if($_SESSION["is_logued"]){
            //echo "se logueo";
        }else{
            redirect(base_url());
        }
    }

    public function index() {
        //$dpto = new Departamento();
        //$dpto->get();
     
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }

    function datatable() {
        $this->datatables->select('id,nombres,telefono,apellidos,dni,email,usuario')
                ->unset_column('id')
             //   ->add_column('logo', '<div style="height:30px;width:110px;"><img style="height:95%;" src="'.base_url()."public/img/empresas/".'$1" /></div>','logo')
                //->add_column('actions', get_buttons('$1','empresas'), 'id')
                ->add_column('actions', get_check('$1'), 'id')
                ->from('docentes' )
               // ->join()
                ->where('estado',"A");
        echo $this->datatables->generate();
    }

    public function json_getdocentes_id() {

        $id = $this->input->post('id');
        $obj = new Docente();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
        if ($this->input->post()) {

            $obj = new Docente();
            if($this->input->post("id") !== ""){
                $obj->where('id', $this->input->post('id'))->get();
                $obj->dni = $this->input->post("dni");
            }
            $obj->nombres = strtoupper($this->input->post("nombres"));
            $obj->apellidos = strtoupper($this->input->post("apellidos"));            
            $obj->email = $this->input->post("email");
            $obj->telefono = $this->input->post("telefono");
            $obj->maestria =strtoupper($this->input->post("maestria"));
            $obj->doctorado =strtoupper($this->input->post("doctorado"));
            $obj->tituloobtenido =strtoupper($this->input->post("tituloobtenido"));
            $obj->usuario = $this->input->post("usuario");
           // $obj->clave = $this->bcrypt->hash_password($this->input->post("clave"));
            $obj->clave = $this->input->post("clave");
            $obj->estado = "A";
            $obj->tipouser = "D";

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
        $obj = new Docente();
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

