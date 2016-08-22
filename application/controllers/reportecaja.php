<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportecaja extends CI_Controller {

    var $prefix = "reportecaja";

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        
        $prefsmart =$this->prefix;
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }

    public function guardar(){
        $cantidad = (double)($_POST["cantidad"]);
        $compra = (double)($_POST["compra"]);
        $medicina = (double)($_POST["medicina"]);
        $transporte = (double)($_POST["transporte"]);
        $ingreso = (double)($_POST["ingreso"]);

        $total= $compra+$medicina+$transporte;

        $caja=$this->db->query("select MAX(idcaja) as ultima from caja")->result_array();
        if ($caja[0]["ultima"]=="") {
            $caja[0]["ultima"]=0;
        }
        $ultima=$this->db->query("select *from caja where idcaja=".$caja[0]["ultima"])->result_array();
        if (count($ultima)==0){
            $saldo=0;
            $saldo_total=$ingreso-$total;
        }else{
            $saldo = $ingreso+$ultima[0]["saldo_total"];
            $saldo_total = $saldo-$total;
        }

        $data = array(
           'fecha' => $_POST["fecha"],
           'cantidad' => $cantidad,
           'tipo' => $_POST["tipo"],
           'estado' => $_POST["estado"],
           'descripcion' => $_POST["descripcion"],
           'ingreso' => $ingreso,
           'saldo' => $saldo,
           'compra' => $compra,
           'medicina' => $medicina,
           'transporte' => $transporte,
           'total' => $total,
           'saldo_total' => $saldo_total
        );
        $estado= $this->db->insert('caja', $data);
        if ($estado==1) {
            echo "Correcto";
        }else{
            echo "Incorrecto";
        }
    }

    public function reportecajita(){

        $html = "";         
        $html = $html.'<h3>REPORTE DE EVENTOS POR MES</h3>';
        
        $html = $html.'<table border="1" width="100%" >';
        $html = $html.'<tr>';
             $html = $html.'<th rowspan="2">Fecha</th>';
             $html = $html.'<th rowspan="2">Cant.</th>';
             $html = $html.'<th rowspan="2">Tipo</th>';
             $html = $html.'<th rowspan="2">Estado</th>';
             $html = $html.'<th rowspan="2">Descripcion</th>';
             $html = $html.'<th rowspan="2">Ingreso</th>';
             $html = $html.'<th rowspan="2">Saldo</th>';
             $html = $html.'<th colspan="4">Egreso</th>';
             $html = $html.'<th rowspan="2">Saldo Total</th>';
         $html = $html.'</tr>';
         $html = $html.'<tr>';
             $html = $html.'<th>Compra</th>';
             $html = $html.'<th>Medicina</th>';
             $html = $html.'<th>Transporte</th>';
             $html = $html.'<th>Total</th>';
         $html = $html.'</tr>';

        $cajita=$this->db->query("select *from caja order by idcaja")->result_array();
        foreach ($cajita as $value) {
            $html = $html.'<tr>';
             $html = $html.'<td>'.$value["fecha"].'</td>';
             $html = $html.'<td>'.$value["cantidad"].'</td>';
             $html = $html.'<td>'.$value["tipo"].'</td>';
             $html = $html.'<td>'.$value["estado"].'</td>';
             $html = $html.'<td>'.$value["descripcion"].'</td>';
             $html = $html.'<td>'.$value["ingreso"].'</td>';
             $html = $html.'<td>'.$value["saldo"].'</td>';
             $html = $html.'<td>'.$value["compra"].'</td>';
             $html = $html.'<td>'.$value["medicina"].'</td>';
             $html = $html.'<td>'.$value["transporte"].'</td>';
             $html = $html.'<td>'.$value["total"].'</td>';
             $html = $html.'<td>'.$value["saldo_total"].'</td>';
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


        $nombre_archivo = utf8_decode("reportecaja.pdf");
        $pdf->Output($nombre_archivo, 'I');      
    }
   
}

