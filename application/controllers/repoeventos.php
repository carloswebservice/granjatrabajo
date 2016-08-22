<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repoeventos extends CI_Controller {

    var $prefix = "repoeventos";

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }

    public function  repoyear($anio){
        
        $eventos = new Evento();
        $eventos = $eventos->where("eve_estado",1)->get();
        
       
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE EVENTOS POR MES</h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';
            $html = $html.'<th>&nbsp;</th>';
            $html = $html.'<th>ENE</th>';
            $html = $html.'<th>FEB</th>';
            $html = $html.'<th>MAR</th>';
            $html = $html.'<th>ABR</th>';
            $html = $html.'<th>MAY</th>';
            $html = $html.'<th>JUN</th>';
            $html = $html.'<th>JUL</th>';
            $html = $html.'<th>AGO</th>';
            $html = $html.'<th>SET</th>';
            $html = $html.'<th>OCT</th>';
            $html = $html.'<th>NOV</th>';
            $html = $html.'<th>DIC</th>';
        $html = $html.'</tr>';
        
        foreach ($eventos as $v) {
            $html = $html.'<tr>';
            $html = $html.'<td><strong>'.$v->eve_descripcion.'</strong></td>';
            $html = $html.'<td>'.$this->consultar($anio,1, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,2, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,3, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,4, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,5, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,6, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,7, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,8, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,9, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,10, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,11, $v->id).'</td>';
            $html = $html.'<td>'.$this->consultar($anio,12, $v->id).'</td>';
             $html = $html.'</tr>';
        }
       
        $html = $html.'</table>';
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Eventos por Mes');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE";

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


        $pdf->AddPage("L");



        $pdf->writeHTML($html, true, 0, true, 0);


        $nombre_archivo = utf8_decode("reporteeventospormes.pdf");
        $pdf->Output($nombre_archivo, 'I');

        
    }
   
    public  function  consultar($a,$m,$e){
        $sql = "SELECT 
            to_char(eveani_fecha,'Mon') as mon,
            extract(year from eveani_fecha) as year_indice,
            extract(month from eveani_fecha) as mont_indice,count(eveani_evento) as eve_sum 
            FROM eventoanimal
            WHERE eveani_evento = ".$e." AND 
            EXTRACT(year FROM eveani_fecha) = ".$a." AND
            EXTRACT(month FROM eveani_fecha) = ".$m."
            GROUP BY 1,2,3";
        //print $sql;
         $dtv2 = $this->db->query($sql);

        $regs = $dtv2->result_array();
        if(count($regs) >0){
             $html = $regs[0]["eve_sum"];
        }else{
            $html = '0';
        }
        //$reg = $regs[0];
        //print_r($regs);
       
        return $html;
        
    }


}

