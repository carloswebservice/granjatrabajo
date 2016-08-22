<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repoeventosanimales extends CI_Controller {

    var $prefix = "repoeventosanimales";

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        
        $prefsmart =$this->prefix;

        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }
    public function reportxd(){ 
        $animales['animal']=$this->db->query("select id,ani_rp, ani_nombre from animales where ani_estado=1")->result_array();
        foreach ($animales['animal'] as $key => $value) {
            $evento=$this->db->query(
                "select ea.eveani_fecha as fecha, e.eve_descripcion as evento from animales as a inner join eventoanimal as ea on(a.id=ea.eveani_animal) inner join evento as e on (e.id=ea.eveani_evento) where a.id=".$value["id"]." order by ea.eveani_fecha"
            )->result_array();
            $animales['animal'][$key]["evento"]=$evento;
        }
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE EVENTOS ANIMALES </h3>';

        foreach ($animales["animal"] as $value) {
            $html = $html.'<center><h4> RP ANIMAL: '.$value["ani_rp"].' </center></h4>';
            $html = $html.'<center><h4> NOMBRE: '.$value["ani_nombre"].' </center></h4>';
            $html = $html.'<table border="1" width="100%" >';
            $html = $html.'<tr>';
            $html = $html.'    <th class="center"> Fecha </th>';
            $html = $html.'    <th class="center"> Evento </th>';
            $html = $html.'</tr>';
            foreach ($value["evento"] as $val) {
                $html = $html.'<tr>';
                $html = $html.'<td class="center">'.$val["fecha"] .'</td>';
                $html = $html.'<td class="center"> '. $val["evento"] .' </td>';
                $html = $html.'</tr>';
            }
            $html = $html.'</table>';
        }

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Eventos Animales');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE EVENTOS ANIMALES";

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


        $nombre_archivo = utf8_decode("reporteeventosanimales.pdf");
        $pdf->Output($nombre_archivo, 'I');
     
    }
   
}

