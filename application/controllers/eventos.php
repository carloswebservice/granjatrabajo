<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eventos extends CI_Controller {

    var $prefix = "eventos";

    public function __construct() {
        parent::__construct();
    }

    public function index($anio = "2016") {
        
        $ani = new Animal();
        $ani = $ani->where("ani_estado",1)->get();
        
        $eventos = new Evento();
        $eventos = $eventos->where("eve_estado",1)->get();
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('anio','prefsmart','eventos','ani'));
    }
    
    public function form_aborto(){
        $prefsmart =$this->prefix;
        $cab = new Causaaborto();
        $cab = $cab->where("cab_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_aborto',  compact('prefsmart','cab'));
    }
    
   public function form_iee(){
        $prefsmart =$this->prefix;
        $ide = new Indiespecial();
        $ide = $ide->where("ide_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_iee',  compact('prefsmart','ide'));
    }
    
     public function form_enfermedad(){
        $prefsmart =$this->prefix;
        $tpe = new Tipoenfermedad();
        $tpe = $tpe->where("tpe_estado",1)->get();
        
        $med = new Medicamento();
        $med = $med->where("med_estado",1)->get();
        
        $vap = new Viaplicacion();
        $vap = $vap->where("vap_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_enfermedad',  compact('prefsmart','tpe','med','vap'));
    }
    
    
    public function form_medicacion(){
        $prefsmart =$this->prefix;
        $med = new Medicamento();
        $med = $med->where("med_estado",1)->get();
        
        $vap = new Viaplicacion();
        $vap = $vap->where("vap_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_medicacion',  compact('prefsmart','med','vap'));
    }
    
     public function form_rechazo(){
        $prefsmart =$this->prefix;
        $car= new Causarechazo();
        $car = $car->where("car_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_rechazo',  compact('prefsmart','car'));
    }
    
    
     public function form_secado(){
        $prefsmart =$this->prefix;
        $mdm = new Cuartomamario();
        $mdm = $mdm->where("mdm_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_secado',  compact('prefsmart','mdm'));
    }
    
    public function form_muerte(){
        $prefsmart =$this->prefix;
        $edm = new Especificacionmuerte();
        $edm = $edm->where("edm_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_muerte',  compact('prefsmart','edm'));
    }
    
     public function form_venta(){
        $prefsmart =$this->prefix;
        $edv = new Especificacionventa();
        $edv = $edv->where("edv_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_venta',  compact('prefsmart','edv'));
    }
    
    public function form_analisis(){
        $prefsmart =$this->prefix;
        $tpa = new Tipoanalisis();
        $tpa = $tpa->where("tpa_estado",1)->get();
        
        $res = new Resultadoanalisis();
        $res = $res->where("res_estado",1)->get();
        
        
        $this->load->view('/'.$prefsmart.'/form_analisis',  compact('prefsmart','tpa','res'));
    }
    
    
    public function form_tactorectal(){
        $prefsmart =$this->prefix;
        
        $dgu = new Diagnosticou();
        $dgu = $dgu->where("dgu_estado",1)->get();
        
        $efo = new Enfo();
        $efo = $efo->where("efo_estado",1)->get();
        
        $efu = new Enfu();
        $efu = $efu->where("efu_estado",1)->get();
        
        
        $mdg = new Medicinagenital();
        $mdg = $mdg->where("mdg_estado",1)->get();
        
        $vap = new Viaplicacion();
        $vap = $vap->where("vap_estado",1)->get();
        
        
        $this->load->view('/'.$prefsmart.'/form_tactorectal',  compact('prefsmart','dgu','efo','efu','mdg','vap'));
    }
    
    public function form_celo(){
        $prefsmart =$this->prefix;
        $cni = new Causanoinseminal();
        $cni = $cni->where("cni_estado",1)->get();
        
        $mdg = new Medicinagenital();
        $mdg = $mdg->where("mdg_estado",1)->get();
        
        $vap = new Viaplicacion();
        $vap = $vap->where("vap_estado",1)->get();
        
        
        $this->load->view('/'.$prefsmart.'/form_celo',  compact('prefsmart','cni','mdg','vap'));
    }
    
    public function form_servicio(){
        $prefsmart =$this->prefix;
        $rep = new Reproductor();
        $rep = $rep->where("rep_estado",1)->get();
        
        $per = new Personal();
        $per = $per->where("per_estado",1)->get();
        
        $tps = new Tiposervicio();
        $tps = $tps->where("tps_estado",1)->get();
        
        $this->load->view('/'.$prefsmart.'/form_servicio',  compact('prefsmart','rep','per','tps'));
    }
    
    public function form_parto(){
        $prefsmart =$this->prefix;

        $tpa = new Tipoparto();
        $tpa = $tpa->where("tpa_estado",1)->get();

        $etc = new Estadocria();
        $etc = $etc->where("etc_estado",1)->get();

        $scr = new Sexocria();
        $scr = $scr->where("scr_estado",1)->get();

        $tps = new Tiposervicio();
        $tps = $tps->where("tps_estado",1)->get();

        $this->load->view('/'.$prefsmart.'/form_parto',  compact('prefsmart','tpa','etc','scr','tps'));
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

    public function json_geteventos_id() {

        $e = $this->input->post('evento');
        $ref = $this->input->post('ref');
        
        switch ($e) {
            case "1":
                $obj = new Parto();                
                break;
            
            case "2":
                $obj = new Aborto();
                break;
            
            case "3":
                $obj = new Celo();
                break;
            
            case "4":
                $obj = new Servicio();
                break;
            
            case "5":
                $obj = new Muerte();
                break;
            
            case "6":
                $obj = new Venta();
                break;
            
            case "7":
                $obj = new Secado();
                break;
            
            case "8":
                $obj = new Rechazo();
                break;
            
            case "9":
                $obj = new Medicacion();
                break;
            
            case "10":
                $obj = new Indiesevento();
                break;
            
            case "11":
                $obj = new Enfermedad();
                break;
            
            case "12":
                $obj = new Analisise();
                break;
            
            case "13":
                $obj = new Tactorectal();
                break;
            default:
                break;
        }       
       
        $res = $obj->where('id', $ref)->get()->to_array();
        print json_encode($res);
    }

    public function save(){
        if ($this->input->post()) {
            
            $evento = $this->input->post("evento_id");
            $tbl = "";
            switch ($evento) {
                case "1":
                     $tbl = "parto";
                     $act = "insertar";
                     $obj = new Parto();
                     if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                         $act = "editar";
                     }
                     $obj->par_tipo_parto = $this->input->post('par_tipo_parto');
                     $obj->par_estado_cria = $this->input->post('par_estado_cria');
                     $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                     $obj->par_estado = 1;
                     $obj->par_sexo_cria = $this->input->post('par_sexo_cria');
                     $obj->par_servicio = $this->input->post('par_servicio');
                     $obj->animal_id = $this->input->post('animal_id');
                    break;
                
                case "2":
                    $tbl = "aborto";
                    $act = "insertar";
                    $obj = new Aborto();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->abo_causaaborto = $this->input->post('abo_causaaborto');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->abo_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;
                case "3":
                    $tbl = "celo";
                    $act = "insertar";
                    $obj = new Celo();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->cel_causa_no_inseminal = $this->input->post('cel_causa_no_inseminal');
                    $obj->cel_medicina_genital = $this->input->post('cel_medicina_genital');
                    $obj->cel_via_aplicacion = $this->input->post('cel_via_aplicacion');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->cel_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;
                case "4":
                    $tbl = "servicio";
                    $act = "insertar";
                    $obj = new Servicio();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->ser_reproductor = $this->input->post('ser_reproductor');
                    $obj->ser_personal = $this->input->post('ser_personal');
                    $obj->ser_tipo_servicio = $this->input->post('ser_tipo_servicio');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->ser_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;
                
                case "5":
                    $tbl = "muerte";
                    $act = "insertar";
                    $obj = new Muerte();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->mue_espec_muerte = $this->input->post('mue_espec_muerte');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->mue_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;
                
                case "6":
                    $tbl = "venta";
                    $act = "insertar";
                    $obj = new Venta();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->ven_especificacion_venta = $this->input->post('ven_especificacion_venta');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->mue_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;
                
                case "7":
                    $tbl = "secado";
                    $act = "insertar";
                    $obj = new Secado();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->sec_med_cuartos_mamarios = $this->input->post('sec_med_cuartos_mamarios');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->sec_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;
                
                case "8":
                    $tbl = "rechazo";
                    $act = "insertar";
                    $obj = new Rechazo();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->rec_causa_rechazo = $this->input->post('rec_causa_rechazo');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->rec_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;

                case "9":
                    $tbl = "medicacion";
                    $act = "insertar";
                    $obj = new Medicacion();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->mec_medicamentos = $this->input->post('mec_medicamentos');
                    $obj->mec_via_aplicacion = $this->input->post('mec_via_aplicacion');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->mec_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));
                    break;
                    
                case "10":
                    $tbl = "indicaciones_especiales_evento";
                    $act = "insertar";
                    $obj = new Indiesevento();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->iee_indicaciones_especiales = $this->input->post('iee_indicaciones_especiales');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->iee_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));   
                    break;
                    
                case "11":
                    $tbl = "enfermedad";
                    $act = "insertar";
                    $obj = new Enfermedad();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->enf_tipo_enfermedad = $this->input->post('enf_tipo_enfermedad');
                    $obj->enf_medicamentos = $this->input->post('enf_medicamentos');
                    $obj->enf_via_aplicacion = $this->input->post('enf_via_aplicacion');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->enf_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));   
                    break;
                
                case "12":
                    $tbl = "analisis";
                    $act = "insertar";
                    $obj = new Analisise();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->ana_tipo_analisis = $this->input->post('ana_tipo_analisis');
                    $obj->ana_resultado_analisis = $this->input->post('ana_resultado_analisis');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->ana_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));   
                    break;
                case "13":
                    $tbl = "tacto_rectal";
                    $act = "insertar";
                    $obj = new Tactorectal();
                    if($this->input->post("id") !== ""){
                        $obj->where('id', $this->input->post('id'))->get();
                        $act = "editar";
                    }
                    $obj->tar_diagnostico_utero = $this->input->post('tar_diagnostico_utero');
                    $obj->tar_enfermedad_utero = $this->input->post('tar_enfermedad_utero');
                    $obj->tar_enfermedad_ovario = $this->input->post('tar_enfermedad_ovario');
                    $obj->tar_medicina_genital = $this->input->post('tar_medicina_genital');
                    $obj->tar_via_aplicacion = $this->input->post('tar_via_aplicacion');
                    $obj->animal_id = $this->input->post('animal_id');
                    $obj->tar_estado = 1;
                    $obj->efecha = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha")))); 
                    break;
                default:
                    break;
            }
            if($obj->save()){
              
              $newobl = new Log();
              $newobl->log_usuario = $_SESSION["id_usuario"];
              $newobl->log_tabla = $tbl;
              $newobl->log_fecha = date('Y-m-d H:m:s');
              $newobl->log_accion = $act;
              $newobl->save();
                
                
              $tbl = "eventoanimal";
              $act = "insertar";
              $obj2 = new Eventoanimal();
              
              if($this->input->post("id") !== ""){
                  $obj2->where(array('eveani_refevento'=> $obj->id,"eveani_evento"=>$evento))->get();
                  $act = "editar";
              }else{
                  $obj2->eveani_refevento = $obj->id;
              }   
              
              $obj2->eveani_animal = $obj->animal_id;
              $obj2->eveani_evento = $evento;
              $obj2->eveani_fecha  = date('Y-m-d',strtotime(str_replace('-','/', $this->input->post("efecha"))));               
              $obj2->eveani_estado = 1;
              
              if($obj2->save()){
                   
                    $newobll = new Log();
                    $newobll->log_usuario = $_SESSION["id_usuario"];
                    $newobll->log_tabla = $tbl;
                    $newobll->log_fecha = date('Y-m-d H:m:s');
                    $newobll->log_accion = $act;
                    $newobll->save();
                  
                   $res =  array("say"=>"yes");
              }else{
                   $res =  array("say"=>"no");
              }                
             
            }else{
               $res =  array("say"=>"no");
            }
            
            print json_encode($res);
            
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

