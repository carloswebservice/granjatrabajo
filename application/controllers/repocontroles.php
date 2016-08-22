<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repocontroles extends CI_Controller {

    var $prefix = "repocontroles";

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }

    public function  repodate($date1,$date2){
        
        $sql = " SELECT a.ani_rp,a.ani_nombre, c.control1,c.control2,c.fechacontrol FROM controles c
INNER JOIN animales a ON a.id = c.animal_id
WHERE fechacontrol >= '".$date1."' AND fechacontrol <= '".$date2."' ";
        
        $xd = $this->db->query($sql);
        
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE CONTROLES POR RANGO DE FECHAS DESDE '.$date1.' HASTA '.$date2.' </h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';       
            $html = $html.'<th>RP ANIMAL</th>';
            $html = $html.'<th>NOMBRE</th>';
            $html = $html.'<th>FECHA DE CONTROL</th>';
            $html = $html.'<th>CONTROL1</th>';
            $html = $html.'<th>CONTROL2</th>';
            $html = $html.'<th>TOTAL</th>';
            $html = $html.'<th>PROMEDIO</th>';       
        $html = $html.'</tr>';
        
        $c1=0;$c2=0;$to=0;$p=0;
        foreach ($xd->result() as $v) {
            
            $c1 = $c1+(double)$v->control1;
            $c2 = $c2+(double)$v->control2;
            $to = $to+((double)$v->control1+(double)$v->control2);
            $p = $p + (((double)$v->control1+(double)$v->control2)/2);
            
            $html = $html.'<tr>';
            $html = $html.'<td><strong >'.$v->ani_rp.'</strong></td>';
            $html = $html.'<td>'.$v->ani_nombre.'</td>';
            $html = $html.'<td>'.$v->fechacontrol.'</td>';
            $html = $html.'<td>'.$v->control1.'</td>';
            $html = $html.'<td>'.$v->control2.'</td>';
            $html = $html.'<td><strong style="color:blue;" >'.((double)$v->control1+(double)$v->control2).'</strong></td>';
            $html = $html.'<td><strong style="color:orange;" >'.(((double)$v->control1+(double)$v->control2)/2).'</strong></td>';
             $html = $html.'</tr>';
        }
        
        $html = $html.'<tr bgcolor="yellow" >';
            $html = $html.'<td colspan="3" ><strong>TOTALES</strong></td>';
            $html = $html.'<td ><strong>'.$c1.'</strong></td>';
            $html = $html.'<td ><strong>'.$c2.'</strong></td>';
            $html = $html.'<td  ><strong style="color:blue;">'.$to.'</strong></td>';
            $html = $html.'<td  ><strong style="color:orange;" >'.$p.'</strong></td>';
        $html = $html.'</tr>';
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

