<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repoanimales extends CI_Controller {

    var $prefix = "repoanimales";

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        
        $prefsmart =$this->prefix;

        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }
    public function reportxd(){ 
        $animales["animal"]=$this->db->query("select *from animales")->result_array();
        foreach ($animales["animal"] as $key => $value) {
            $query=$this->db->query("select ani_rp,ani_nombre from animales where ani_rp='".$value["ani_madre"]."'")->result_array();
            $animales["animal"][$key]["madre"]=$query;
            $query=$this->db->query("select r.rep_rp,r.rep_raza from animales as a inner join reproductor as r on(a.ani_padre=r.rep_rp) where a.id=".$value["id"])->result_array();
            $animales["animal"][$key]["padre"]=$query;
        }
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE ANIMALES </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';
            $html = $html.'<th class="center" rowspan="2">#</th>';
            $html = $html.'<th class="center" rowspan="2">RP</th>';
            $html = $html.'<th class="center" rowspan="2">Nombre</th>';
            $html = $html.'<th class="center" colspan="2">Madre</th>';
            $html = $html.'<th class="center" colspan="2">Padre</th>';
            $html = $html.'<th class="center" rowspan="2">Sexo</th>';
            $html = $html.'<th class="center" rowspan="2">Fecha Nac.</th>';
            $html = $html.'<th class="center" rowspan="2">Edad</th>';
            $html = $html.'<th class="center" rowspan="2">Descripcion</th>';
            $html = $html.'<th class="center" rowspan="2">Estado</th>';
        $html = $html.'</tr>';
        $html = $html.'<tr>';
        $html = $html.'    <th class="center">RP</th>';                                  
        $html = $html.'    <th class="center">Nombre</th>';
        $html = $html.'    <th class="center">RP</th>   ';                               
        $html = $html.'    <th class="center">Nombre</th>';
        $html = $html.'</tr>';
        
        foreach ($animales["animal"] as $key => $value) { 
            $html = $html.'<tr>';
            $html = $html.'<td class="center">'.$value["id"].'</td>';
            $html = $html.'<td class="center">'.$value["ani_rp"].'</td>';
            $html = $html.'<td class="center">'.$value["ani_nombre"].'</td>';
            if (count($value["madre"])==0) {
                $html = $html.'<td class="center">'.$value["ani_madre"].'</td>';
                $html = $html.'<td class="center"></td>';
            }else{
                foreach ($value["madre"] as $val) {
                    $html = $html.'<td class="center">'.$val["ani_rp"].'</td>';
                    $html = $html.'<td class="center">'.$val["ani_nombre"].'</td>';
                }
            }
            if (count($value["padre"])==0) {
                $html = $html.'<td class="center">'.$value["ani_padre"].'</td>';
                $html = $html.'<td class="center"></td>';
            }else{
                foreach ($value["padre"] as $val) {
                    $html = $html.'<td class="center">'.$val["rep_rp"].'</td>';
                    $html = $html.'<td class="center">'.$val["rep_raza"].'</td>';
                }
            }
            $html = $html.'<td class="center">'.$value["ani_sexo"].'</td>';
            $html = $html.'<td class="center">'.$value["ani_fechanac"].'</td>';
            $html = $html.'<td class="center">';
                            $a=0;$m=0;
                            $dif=strtotime(date('Y-m-d')) - strtotime($value["ani_fechanac"]); 
                            $dias= (int)(round($dif / 86400));
                            while ($dias >= 365) {
                                $a=$a+1; $dias = $dias - 365;
                            }
                            while ($dias >= 30) {
                                $m=$m+1; $dias = $dias - 30;
                            }
                            if ($a!=0) {
            $html = $html. $a .' Años, '.$m.' Meses y '.$dias.' Dias';
                            }else{
            $html = $html. $m.' Meses y '.$dias.' Dias';
                            }
            $html = $html.'</td>';
            $html = $html.'<td class="center">'.$value["ani_descripcion"].'</td>';
            $html = $html.'<td class="center">';
                        if($value["ani_estado"]==1){
            $html = $html.'Vivo';
                        }else{
            $html = $html.'Muerto';
                        }
            $html = $html.'</td>';
            $html = $html.'</tr>';
        }
        $html = $html.'</table>';



        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Controles por Mes');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE CONTROLES";

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

