<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resulta extends CI_Controller {

    var $prefix = "resulta";

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
        $this->datatables->select('id,res_descripcion,res_abreviatura,res_estado')
                ->unset_column('id')
             //   ->add_column('logo', '<div style="height:30px;width:110px;"><img style="height:95%;" src="'.base_url()."public/img/empresultado_analisiss/".'$1" /></div>','logo')
                //->add_column('actions', get_buttons('$1','empresultado_analisiss'), 'id')
                ->add_column('actions', get_check('$1'), 'id')
                ->from("resultado_analisis")
                ->where('res_estado',1);
        echo $this->datatables->generate();
    }

    public function json_getresulta_id() {

        $id = $this->input->post('id');
        $obj = new Resultadoanalisis();
        $res = $obj->where('id', $id)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
        if ($this->input->post()) {
           
            $obj = new Resultadoanalisis();
            $tbl = $obj->table;
            $act = "insertar";
            if($this->input->post("id") !== ""){
                $act = "editar";
                $obj->where('id', $this->input->post('id'))->get();
            }
            $obj->res_descripcion = strtoupper($this->input->post("res_descripcion"));
            $obj->res_abreviatura = strtoupper($this->input->post("res_abreviatura"));
            $obj->res_estado = 1;

            if($obj->save()){
                $newobl = new Log();
                $newobl->log_usuario = $_SESSION["id_usuario"];
                $newobl->log_tabla = $tbl;
                $newobl->log_fecha = date('Y-m-d H:m:s');
                $newobl->log_accion = $act;
                $newobl->save();
                print json_encode(array("say"=>"yes"));
            }else{

                $errores = $obj->error->all;
                print json_encode($errores);
            }
        }
    }

    public function delete(){
        $id = $_POST["id"];
        $obj = new Resultadoanalisis();
        $obj->where('id', $id)->get();
        $obj->res_estado = 0;
        if($obj->save()){
                $newobl = new Log();
                $newobl->log_usuario = $_SESSION["id_usuario"];
                $newobl->log_tabla = "resultado_analisis";
                $newobl->log_fecha = date('Y-m-d H:m:s');
                $newobl->log_accion = "elimino";
                $newobl->save();
             $res =  array("say"=>"yes");
        }else{
             $res =  array("say"=>"no");
             
        }
        print json_encode($res);
    }


}

