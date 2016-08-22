<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reporeproduccion extends CI_Controller {

    var $prefix = "reporeproduccion";

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        
        $prefsmart =$this->prefix;

        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }
    public function reportereproduccion(){
        $Reproductoras['reproductora']=$this->db->query(
            "select id,ani_rp, ani_nombre from animales where ani_estado=1"
        )->result_array();
        foreach ($Reproductoras['reproductora'] as $key => $value) {
            $parto = $this->db->query("select count(animal_id) as nropartos from parto where animal_id=".$value["id"])->result_array();
            $Reproductoras['reproductora'][$key]["partos"] = $parto;
        }

        foreach ($Reproductoras['reproductora'] as $key => $value) {
            $servicio = $this->db->query("select count(animal_id) as nroservicio from servicio where animal_id=".$value["id"])->result_array();
            $Reproductoras['reproductora'][$key]["servicios"] = $servicio;
        }
        foreach ($Reproductoras['reproductora'] as $key => $value) {
            $parto = $this->db->query("select MAX(efecha) as fecha from parto where animal_id=".$value["id"])->result_array();
            if ($parto[0]["fecha"]!="") {
                $parto = $this->db->query("select p.efecha as parult_fecha, sc.scr_abreviatura as parult_sexo,ts.tps_abreviatura as parult_tiposerv from parto as p inner join servicio as s on(p.par_servicio=s.id) inner join tipo_servicio as ts on (s.ser_tipo_servicio=ts.id) inner join sexo_cria as sc on(p.par_sexo_cria=sc.scr_id) where p.efecha='".$parto[0]["fecha"]."' and p.animal_id=".$value["id"])->result_array();
            }else{
                $parto = $this->db->query("select ' ' as parult_fecha, ' ' as parult_sexo,' ' as parult_tiposerv")->result_array();
            }       
            $Reproductoras['reproductora'][$key]["ultimoparto"] = $parto;
        }

        foreach ($Reproductoras['reproductora'] as $key => $value) {
            $servicio = $this->db->query("select MAX(efecha) as fecha from servicio where animal_id=".$value["id"])->result_array();
            $probableparto = date ( 'Y-m-d' , strtotime ('+9 month',strtotime ($servicio[0]["fecha"])));
            if ($servicio[0]["fecha"]!="") {
                $servicio = $this->db->query("select s.efecha as ser_fecha, ts.tps_abreviatura as ser_tiposervicio,r.rep_raza as ser_reproductor from animales as a inner join servicio as s on(a.id=s.animal_id) inner join tipo_servicio as ts on (s.ser_tipo_servicio=ts.id) inner join reproductor as r on(s.ser_reproductor=r.id) where s.efecha='".$servicio[0]["fecha"]."' and s.animal_id=".$value["id"])->result_array();
            }else{
                $servicio = $this->db->query("select ' ' as ser_fecha, ' ' as ser_tiposervicio, ' ' as ser_reproductor")->result_array();
            }               
            $Reproductoras['reproductora'][$key]["servicio"] = $servicio;
            $Reproductoras['reproductora'][$key]["probableparto"] = $probableparto;
        }
        foreach ($Reproductoras['reproductora'] as $key => $value) {
            $preñada = $this->db->query("select MAX(efecha) as fecha from tacto_rectal where tar_estado=1 and animal_id=".$value["id"])->result_array();
            if ($preñada[0]["fecha"]!="") {
                $preñada = $this->db->query("select tar_diagnostico_utero as dxutero from tacto_rectal where efecha='".$preñada[0]["fecha"]."' and animal_id=".$value["id"])->result_array();
            }else{
                $preñada = $this->db->query("select 0 as dxutero")->result_array();             
            }
            $Reproductoras['reproductora'][$key]["preñada"] = $preñada;
        }

        foreach ($Reproductoras['reproductora'] as $key => $value) {
            $secas = $this->db->query("select *from secado as s inner join animales as a on(a.id=s.animal_id) where s.sec_estado=1 and a.id=".$value["id"])->result_array();
            if (count($secas)==0) {
                $ultimodia = date('Y-m-d'); 
                $primerdia=date ( 'Y-m-d' , strtotime ('-7 day' , strtotime ($ultimodia)));
                $sumcontroles = $this->db->query("select SUM(c.control1+c.control2) as suma from animales as a inner join controles as c on(a.id=c.animal_id) where a.id=".$value["id"]." and c.fechacontrol between '".$primerdia."' and '".$ultimodia."'")->result_array();
            }else{
                $sumcontroles = $this->db->query("select 'seca' as suma")->result_array();              
            }
            $Reproductoras['reproductora'][$key]["controles"] = $sumcontroles;
        }
        $alarmainseminar=""; $diaspost="";
        foreach ($Reproductoras['reproductora'] as $key => $value) {
            $secas = $this->db->query("select *from secado as s inner join animales as a on(a.id=s.animal_id) where s.sec_estado=1 and a.id=".$value["id"])->result_array();
            if (count($secas)==0) {
                $diaspost = $this->db->query("select MAX(efecha) as fecha from parto where animal_id=".$value["id"])->result_array();
                if ($diaspost[0]["fecha"]!="") {
                    $diff = strtotime(date('Y-m-d')) - strtotime($diaspost[0]["fecha"]); 
                    $diaspost = round($diff / 86400); 
                }else{
                    $diaspost = 0;
                }
                if ($diaspost>=40) {
                    $alarmainseminar="Inseminar !!";
                }else{
                    $alarmainseminar="";
                }
            }else{
                $diaspost = "seca";
                $alarmainseminar="seca";
            }
            $Reproductoras['reproductora'][$key]["diaspost"] = $diaspost;
            $Reproductoras['reproductora'][$key]["alarmainseminar"] = $alarmainseminar;
        }


        $junio=0;$julio=0;$agosto=0;$septiembre=0;$octubre=0;$noviembre=0;$diciembre=0;
        $encontrol=0;$secas=0;
        $pos_secas=0;$pos_menor25=0;$pos_menor50=0;$pos_mayor50=0;
        $sumsecas=0; $mayor8=0;$menor5=0;$entre58=0; $sumatotal=0;$suma5=0;

        foreach ($Reproductoras["reproductora"] as $value) {
            $fecha_probable= explode("-",$value["probableparto"]);
            if ($fecha_probable[1]==6) {
                $junio=$junio+1;
            }
            if ($fecha_probable[1]==7) {
                $julio=$julio+1;
            }
            if ($fecha_probable[1]==8) {
                $agosto=$agosto+1;
            }
            if ($fecha_probable[1]==9) {
                $septiembre=$septiembre+1;
            }
            if ($fecha_probable[1]==10) {
                $octubre=$octubre+1;
            }
            if ($fecha_probable[1]==11) {
                $noviembre=$noviembre+1;
            }
            if ($fecha_probable[1]==12) {
                $diciembre=$diciembre+1;
            }

            if ($value["diaspost"]=="seca") {
                $pos_secas=$pos_secas+1;
                $secas=$secas+1;
            }else{
                if ($value["diaspost"]<=25) {
                    $pos_menor25=$pos_menor25+1;
                }else{
                    if ($value["diaspost"]<=50) {
                        $pos_menor50=$pos_menor50+1;
                    }else{
                        $pos_mayor50=$pos_mayor50+1;
                    }
                }
                $encontrol=$encontrol+1;
            }
            foreach ($value["controles"] as $val) { 
                if($val["suma"]=="seca"){
                    $sumsecas = $sumsecas + 1;
                }else{
                    if ($val["suma"]>=8) {
                        $mayor8 = $mayor8+1;
                    }else{
                        if ($val["suma"]<=5) {
                            $menor5=$menor5+1;
                            $suma5=$suma5+$val["suma"];
                        }else{
                            $entre58 = $entre58+1;
                        }
                    }
                    $sumatotal=$sumatotal+$val["suma"];
                }
            }
        }

        //echo "<pre>";
        //print_r($Reproductoras); exit();
        $html = "";         
        $html = $html.'<h3>REPORTE DE REPRODUCCION ANIMALES </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';
        $html = $html.'    <th class="center" colspan="19">Registro Reproduccion</th>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
            $html = $html.'<th class="center" colspan="12">Fecha Imp. '.date('d-m-Y').'</th>';
            $html = $html.'<th class="center" colspan="7">Fecha Del X Al Y</th>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <th class="center" rowspan="2">#</th>';
        $html = $html.'    <th class="center" rowspan="2">RP</th>';
        $html = $html.'    <th class="center" rowspan="2">Nombre</th>';
        $html = $html.'    <th class="center" rowspan="2">Nro Partos</th>';
        $html = $html.'    <th class="center" rowspan="2">Nro Serv.</th>';
        $html = $html.'    <th class="center" colspan="3">Ultimo Parto</th>';
        $html = $html.'    <th class="center" colspan="4">Servicio</th>';
        $html = $html.'    <th class="center" >Probable Parto</th>';
        $html = $html.'    <th class="center" colspan="2">Controles Ultima Semana</th>';
        $html = $html.'    <th class="center" rowspan="2">Dias Post Parto</th>';
        $html = $html.'    <th class="center" >Alarma Inseminar</th>';
        $html = $html.'    <th class="center" >Condicion Control</th>';
        $html = $html.'    <th class="center" >Condicion Control</th>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
            $html = $html.'<th class="center">Fecha</th> ';                                  
            $html = $html.'<th class="center">Sexo</th>';
            $html = $html.'<th class="center">Tip. Serv.</th>';
            $html = $html.'<th class="center">Fecha</th>';
            $html = $html.'<th class="center">Tipo</th>';
            $html = $html.'<th class="center">Reproductor</th>';
            $html = $html.'<th class="center">Dx(Preñada)</th>';
            $html = $html.'<th class="center">Fecha</th>';
            $html = $html.'<th class="center">Total</th>';
            $html = $html.'<th class="center">Promedio</th>';
            $html = $html.'<th class="center"> >=40 dias post</th>';
            $html = $html.'<th class="center"> >=8 entre 5 y 8 </th>';
            $html = $html.'<th class="center"> >=6 entre 6 y 3 </th>';
        $html = $html.'</tr>';

        foreach ($Reproductoras["reproductora"] as $value) {
            $html = $html.'<tr>';
            $html = $html.'<td class="center">'.$value["id"] .'</td>';
            $html = $html.'<td class="center">'.$value["ani_rp"] .'</td>';
            $html = $html.'<td class="center">'.$value["ani_nombre"] .'</td>';
            foreach ($value["partos"] as $val) {
                $html = $html.'<td class="center">'.$val["nropartos"].'</td>';
            }
            foreach ($value["servicios"] as $val) {
                $html = $html.'<td class="center">'.$val["nroservicio"] .'</td>';
            }
            if (count($value["ultimoparto"])>0) {
                foreach ($value["ultimoparto"] as $val) { 
                    $html = $html.'<td class="center">'.$val["parult_fecha"] .'</td>';
                    $html = $html.'<td class="center">'.$val["parult_sexo"] .'</td>';
                    $html = $html.'<td class="center">'.$val["parult_tiposerv"] .'</td>';
                }
            }else{
                $html = $html.'<td class="center"> </td>';
                $html = $html.'<td class="center"> </td>';
                $html = $html.'<td class="center"> </td>';
            }
           
            foreach ($value["servicio"] as $val) {
                if ($val["ser_fecha"]==" ") {
                    $html = $html.'<td class="center"> </td>';
                    $html = $html.'<td class="center"> </td>';
                    $html = $html.'<td class="center"> </td>';
                }else{
                    $html = $html.'<td class="center">'.$val["ser_fecha"] .'</td>';
                    $html = $html.'<td class="center">'.$val["ser_tiposervicio"] .'</td>';
                    $html = $html.'<td class="center">'.$val["ser_reproductor"] .'</td>';
                }
            }
            foreach ($value["preñada"] as $val) {
                $html = $html.'<td class="center">';
                    if ($val["dxutero"]==1) { 
                        $html = $html.'SI';
                    }else{ $html = $html.'NO'; }
                $html = $html.'</td>';
                $html = $html.'<td class="center">'.$value["probableparto"].'</td>';
            }
            foreach ($value["controles"] as $val) {
                if ($val["suma"]=="") {
                    $html = $html.'<td class="center">0</td>';
                }else{
                    $html = $html.'<td class="center">'.$val["suma"].'</td>';
                }
                
                if($val["suma"]=="seca"){ $promed="seca";
                    $html = $html.'<td class="center"> seca </td>';
                }else{
                    $suma2=(double)($val["suma"]);
                    $promed=round($suma2/7,2);
                    $html = $html.'<td class="center">'.$promed.'</td>';
                }
            }
            $html = $html.'<td class="center">'.$value["diaspost"].'</td>';
            $html = $html.'<td class="center">'.$value["alarmainseminar"].'</td>';
            if ($promed=="seca") {
                $html = $html.'<td class="center"> seca </td>';
                $html = $html.'<td class="center"> seca </td>';
            }else{
                //Primer Condicion
                if ($promed>=8) {
                    $html = $html.'<td class="center"> 2 </td>';
                }else{ 
                    if ($promed>=5 && $promed<8) {
                        $html = $html.'<td class="center"> 1 </td>';
                    }else{
                        $html = $html.'<td class="center"> 0 </td>';
                    }
                }
                //Segunda Condicion
                if ($promed>=6) {
                    $html = $html.'<td class="center"> 2 </td>';
                }else{ 
                    if ($promed>=3 && $promed<6) {
                        $html = $html.'<td class="center"> 1 </td>';
                    }else{
                        $html = $html.'<td class="center"> 0 </td>';
                    }
                }
            }
            $html = $html.'</tr>';
        }
        $html = $html.'</table>';


        $html = $html.'<h3>REPORTE DE PARICIONES </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';
        $html = $html.'    <th class="center">Mes</th> <th class="center">Cantidad</th>';
        $html = $html.'</tr>';

        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Jun 2016 </td>';
        $html = $html.'    <td class="center"> '.$junio .'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Jul 2016 </td>';
        $html = $html.'    <td class="center"> '.$julio .'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Ago 2016 </td>';
        $html = $html.'    <td class="center"> '.$agosto .'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Sep 2016 </td>';
        $html = $html.'    <td class="center"> '.$septiembre .'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Oct 2016 </td>';
        $html = $html.'    <td class="center"> '.$octubre .'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Nov 2016 </td>';
        $html = $html.'    <td class="center"> '.$noviembre .'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Dic 2016 </td>';
        $html = $html.'    <td class="center"> '.$diciembre .'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <td class="center"> Total </td>';
        $html = $html.'    <td class="center"> '.($junio+$julio+$agosto+$septiembre+$octubre+$noviembre+$diciembre) .'</td>';
        $html = $html.'</tr>';
        $html = $html.'</table>';


        $html = $html.'<h3>RESUMEN </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';
        $html = $html.'    <th class="center">Condicion</th> <th class="center">Cantidad</th>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center">En Control</td>';
        $html = $html.'    <td class="center">'.$encontrol.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center">Secas</td>';
        $html = $html.'    <td class="center">'.$secas.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <th class="center"> Total</th>';
        $html = $html.'    <th class="center">'.($encontrol+$secas).'</th>';
        $html = $html.'</tr>';
        $html = $html.'</table>';


        $html = $html.'<h3>DIAS POST PARTO </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center">Secas</td>';
        $html = $html.'    <td class="center">'.$pos_secas.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> menor 25 </td>';
        $html = $html.'    <td class="center">'.$pos_menor25.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> menor 50 </td>';
        $html = $html.'    <td class="center">'.$pos_menor50.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> mayor 50 </td>';
        $html = $html.'    <td class="center">'.$pos_mayor50.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <th class="center"> Total</th>';
        $html = $html.'    <th class="center">'.($pos_secas+$pos_menor25+$pos_menor50+$pos_mayor50).'</th>';
        $html = $html.'</tr>';
        $html = $html.'</table>';

        $html = $html.'<h3> CONTROLES </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';
            $html = $html.'<th class="center">Parametro</th>  ';                                 
            $html = $html.'<th class="center">Total</th>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center">Secas</td>';
        $html = $html.'    <td class="center">'.$sumsecas.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> mayor igual a 8 </td>';
        $html = $html.'    <td class="center">'.$mayor8.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> entre 5 y 8 </td>';
        $html = $html.'    <td class="center">'.$entre58.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> menor 5 </td>';
        $html = $html.'    <td class="center">'.$menor5.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <th class="center"> Total</th>';
        $html = $html.'    <th class="center">'.($sumsecas+$mayor8+$entre58+$menor5).'</th>';
        $html = $html.'</tr>';
        $html = $html.'</table>';

        $html = $html.'<h3> TOTAL CONTROLES </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> Todas </td>';
        $html = $html.'    <td class="center">'.$sumatotal.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <td class="center"> menor 5 </td>';
        $html = $html.'    <td class="center">'.$suma5.'</td>';
        $html = $html.'</tr>';
        $html = $html.'<tr> ';
        $html = $html.'    <th class="center"> Diferencia</th>';
        $html = $html.'    <th class="center">'.($sumatotal-$suma5).'</th>';
        $html = $html.'</tr>';
        $html = $html.'</table>';
        //echo "<pre>";
        //print_r($Reproductoras); exit();

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Controles por Mes');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE REPRODUCCION";

        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE ,$subtitulobebe , array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

         $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



        $pdf->setFontSubsetting(true);


       $pdf->SetFont('helvetica', '', 9);


        $pdf->AddPage("A");



        $pdf->writeHTML($html, true, 0, true, 0);


        $nombre_archivo = utf8_decode("reportecontroles.pdf");
        $pdf->Output($nombre_archivo, 'I');

        
    }
   


}

