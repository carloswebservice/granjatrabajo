<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresas extends CI_Controller {

    var $prefix = "empresas";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dpto = new Departamento();
        $dpto->get();

        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart','dpto'));
    }

    function datatable() {
        $this->datatables->select('id,ruc,razon_social,direccion,rubro,contacto,telefono,email,motivo,logo,estado')
                ->unset_column('id')
                ->unset_column('logo')
                ->add_column('logo', '<div style="height:30px;width:110px;"><img style="height:95%;" src="'.base_url()."public/img/empresas/".'$1" /></div>','logo')
                //->add_column('actions', get_buttons('$1','empresas'), 'id')
                ->add_column('actions', get_check('$1'), 'id')
                ->from($this->prefix)
                ->where('estado',"A");
        echo $this->datatables->generate();
    }

    public function json_getempresas_id() {

        $id = $this->input->post('id');
        $prov = new Empresa();
        $prov->where('id', $id);
        $prov->get();
        $prov->all_to_array();

        $results = array();
        foreach ($prov as $o) {
            $results[] = $o->to_json(array('id', 'ruc', 'razon_social', 'direccion', 'rubro', 'contacto', 'telefono', 'email', 'motivo', 'logo', 'estado'), TRUE);
        }
        print '[' . join(',', $results) . ']';
    }

    public function json_provincias() {

        $id = $this->input->post('id');
        $prov = new Provincia();
        $prov->where('departamento_id', $id);
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
        $prov->where('provincia_id', $id);
        $prov->get();
        $prov->all_to_array();

        $results = array();
        foreach ($prov as $o) {
            $results[] = $o->to_json(array('id', 'distrito'), TRUE);
        }
        print '[' . join(',', $results) . ']';
    }

    public function add(){
       //echo "<pre>";print_r($_FILES );exit();
        if ($this->input->post()) {

        }
    }

//
//    public function add() {
//        if ($this->input->post()) {
//
//            $perfil = new Perfil();
//            $perfil->per_descripcion = $this->input->post("per_descripcion");
//
//            if ($perfil->save()) {
//                $this->session->set_flashdata('ControllerMessage', "Se a agregado el registro Exitosamente");
//                redirect(base_url() . 'perfiles', 301);
//            } else {
//                $this->session->set_flashdata('ControllerMessage', "Se a Producido un error");
//                redirect(base_url() . 'perfiles/add', 301);
//            }
//        }
//        $datos="";
//        $this->layout->view('add',  compact("datos"));
//    }
//
//    public function  edit($id){
//
//
//         if ($this->input->post()) {
//
//             $id = $this->input->post("id");
//
//             $perfil = new Perfil();
//             $perfil->where('id',$id)->get();
//
//             $perfil->per_descripcion = $this->input->post("per_descripcion");
//
//
//
//            if ($perfil->save()) {
//                $this->session->set_flashdata('ControllerMessage', "Se a Editado el registro Exitosamente");
//                redirect(base_url() . 'perfiles', 301);
//            } else {
//                $this->session->set_flashdata('ControllerMessage', "Se a Producido un error");
//                redirect(base_url() . 'perfiles/edit/'.$id, 301);
//            }
//         }
//
//         $perfil = new Perfil();
//         $datos = $perfil->where('id',$id)->get();
//
//         $this->layout->view('add',compact('datos'));
//    }
//
//    public function delete() {
//
//        if($this->input->is_ajax_request() && $this->input->post('id'))
//        {
//
//            $perfil = new Perfil();
//            $perfil->where('id',$this->input->post('id'))->get();
//
//            $perfil->per_estado = "I";
//            $perfil->save();
//
//
//        }else{
//         show_404();
//        }
//
//    }

}

// Metas semanalaes  / ->marketing
