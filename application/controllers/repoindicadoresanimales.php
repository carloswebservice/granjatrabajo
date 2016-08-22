<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repoindicadoresanimales extends CI_Controller {

    var $prefix = "repoindicadoresanimales";

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        
        $prefsmart =$this->prefix;

        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart'));
    }

    public function secar(){ 
        $animales=$this->db->query("select id,ani_rp, ani_nombre from animales where ani_estado=1")->result_array();
        $secarpreñes = array(); $paratacto = array(); $aparir = array(); $repetidoras = array(); 
        foreach ($animales as $key => $value) {
            $partoultimo = $this->db->query("select MAX(efecha) as fecha from parto where animal_id=".$value["id"])->result_array();
            if ($partoultimo[0]["fecha"]!="") {
                $repetirservicio = $this->db->query("select count(s.animal_id) as cantidad from animales as a inner join servicio as s on(s.animal_id=a.id) where a.id=".$value["id"]." and s.efecha>'".$partoultimo[0]["fecha"]."'")->result_array();
                if ($repetirservicio[0]["cantidad"]>1) {
                    $repetidoras[]= $this->db->query("select *from animales where id=".$value["id"])->result_array();
                }
            }

            $preñada = $this->db->query("select MAX(efecha) as fecha from tacto_rectal where animal_id=".$value["id"])->result_array();
            if ($preñada[0]["fecha"]!="") {
                $preñada = $this->db->query("select tar_diagnostico_utero as dxutero from tacto_rectal where efecha='".$preñada[0]["fecha"]."' and animal_id=".$value["id"])->result_array();
                if ($preñada[0]["dxutero"]==1) {
                    $servicio = $this->db->query("select MAX(efecha) as fecha from servicio where animal_id=".$value["id"])->result_array();
                    
                    $fechaini = new DateTime(date('Y-m-d')); $fechaf = new DateTime($servicio[0]["fecha"]);
                    $diferencia = $fechaini->diff($fechaf);
                    $dias = $fechaini->diff($fechaf)->days;
                    $meses = ( $diferencia->y * 12 ) + $diferencia->m;

                    if ($meses>=7) {
                        $secarpreñes[] = $this->db->query("select *from animales where id=".$value["id"])->result_array();
                    }
                    if ($dias>=45) {
                        $paratacto[] = $this->db->query("select *from animales where id=".$value["id"])->result_array();
                    }

                    $probableparto = date ( 'Y-m-d' , strtotime ('+9 month',strtotime ($servicio[0]["fecha"])));
                    $fechaposible = new DateTime($probableparto);
                    $diasrestantes = $fechaposible->diff($fechaini)->days;
                    if ($diasrestantes<=7) {
                        $aparir[] = $this->db->query("select *from animales where id=".$value["id"])->result_array();
                    }
                }
            }
        }
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE INDICADORES ANIMALES - SECAR PREÑEZ </h3>';
        $html = $html.'<table border="1" width="100%" >';
            $html = $html.'<tr>';
            $html = $html.'    <th class="center"> RP ANIMAL </th>';
            $html = $html.'    <th class="center"> NOMBRE </th>';
            $html = $html.'    <th class="center"> FECHA NACIMIENTO </th>';
            $html = $html.'    <th class="center"> DESCRIPCION </th>';
            $html = $html.'</tr>';
        foreach ($secarpreñes as $key => $value) {
            $html = $html.'<tr>';
            $html = $html.'    <td class="center">'.$value[0]["ani_rp"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_nombre"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_fechanac"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_descripcion"].'</td>';
            $html = $html.'</tr>';
        }
        $html = $html.'</table>';

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Indicadores Animales');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE INDICADORES ANIMALES";

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
        $nombre_archivo = utf8_decode("reporteindicadoresanimales.pdf");
        $pdf->Output($nombre_archivo, 'I');    
    }

    public function tacto(){ 
        $animales=$this->db->query("select id,ani_rp, ani_nombre from animales where ani_estado=1")->result_array();
        $paratacto = array();
        foreach ($animales as $key => $value) {
            $preñada = $this->db->query("select MAX(efecha) as fecha from tacto_rectal where animal_id=".$value["id"])->result_array();
            if ($preñada[0]["fecha"]!="") {
                $preñada = $this->db->query("select tar_diagnostico_utero as dxutero from tacto_rectal where efecha='".$preñada[0]["fecha"]."' and animal_id=".$value["id"])->result_array();
                if ($preñada[0]["dxutero"]==1) {
                    $servicio = $this->db->query("select MAX(efecha) as fecha from servicio where animal_id=".$value["id"])->result_array();
                    
                    $fechaini = new DateTime(date('Y-m-d')); $fechaf = new DateTime($servicio[0]["fecha"]);
                    $diferencia = $fechaini->diff($fechaf);
                    $dias = $fechaini->diff($fechaf)->days;

                    if ($dias>=45) {
                        $paratacto[] = $this->db->query("select *from animales where id=".$value["id"])->result_array();
                    }
                }
            }
        }
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE INDICADORES ANIMALES - PARA TACTO </h3>';
        $html = $html.'<table border="1" width="100%" >';
            $html = $html.'<tr>';
            $html = $html.'    <th class="center"> RP ANIMAL </th>';
            $html = $html.'    <th class="center"> NOMBRE </th>';
            $html = $html.'    <th class="center"> FECHA NACIMIENTO </th>';
            $html = $html.'    <th class="center"> DESCRIPCION </th>';
            $html = $html.'</tr>';
        foreach ($paratacto as $key => $value) {
            $html = $html.'<tr>';
            $html = $html.'    <td class="center">'.$value[0]["ani_rp"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_nombre"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_fechanac"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_descripcion"].'</td>';
            $html = $html.'</tr>';
        }
        $html = $html.'</table>';

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Indicadores Animales');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE INDICADORES ANIMALES";

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
        $nombre_archivo = utf8_decode("reporteindicadoresanimales.pdf");
        $pdf->Output($nombre_archivo, 'I');    
    }
    
    public function aparir(){ 
        $animales=$this->db->query("select id,ani_rp, ani_nombre from animales where ani_estado=1")->result_array();
        $aparir = array();
        foreach ($animales as $key => $value) {
            $preñada = $this->db->query("select MAX(efecha) as fecha from tacto_rectal where animal_id=".$value["id"])->result_array();
            if ($preñada[0]["fecha"]!="") {
                $preñada = $this->db->query("select tar_diagnostico_utero as dxutero from tacto_rectal where efecha='".$preñada[0]["fecha"]."' and animal_id=".$value["id"])->result_array();
                if ($preñada[0]["dxutero"]==1) {
                    $servicio = $this->db->query("select MAX(efecha) as fecha from servicio where animal_id=".$value["id"])->result_array();
                    $fechaini = new DateTime(date('Y-m-d'));
                    $probableparto = date ( 'Y-m-d' , strtotime ('+9 month',strtotime ($servicio[0]["fecha"])));
                    $fechaposible = new DateTime($probableparto);
                    $diasrestantes = $fechaposible->diff($fechaini)->days;
                    if ($diasrestantes<=7) {
                        $aparir[] = $this->db->query("select *from animales where id=".$value["id"])->result_array();
                    }
                }
            }
        }
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE INDICADORES ANIMALES - A PARIR </h3>';
        $html = $html.'<table border="1" width="100%" >';
            $html = $html.'<tr>';
            $html = $html.'    <th class="center"> RP ANIMAL </th>';
            $html = $html.'    <th class="center"> NOMBRE </th>';
            $html = $html.'    <th class="center"> FECHA NACIMIENTO </th>';
            $html = $html.'    <th class="center"> DESCRIPCION </th>';
            $html = $html.'</tr>';
        foreach ($aparir as $key => $value) {
            $html = $html.'<tr>';
            $html = $html.'    <td class="center">'.$value[0]["ani_rp"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_nombre"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_fechanac"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_descripcion"].'</td>';
            $html = $html.'</tr>';
        }
        $html = $html.'</table>';

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Indicadores Animales');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE INDICADORES ANIMALES";

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
        $nombre_archivo = utf8_decode("reporteindicadoresanimales.pdf");
        $pdf->Output($nombre_archivo, 'I');    
    }

    public function repetidoras(){ 
        $animales=$this->db->query("select id,ani_rp, ani_nombre from animales where ani_estado=1")->result_array();
        $repetidoras = array(); 
        foreach ($animales as $key => $value) {
            $partoultimo = $this->db->query("select MAX(efecha) as fecha from parto where animal_id=".$value["id"])->result_array();
            if ($partoultimo[0]["fecha"]!="") {
                $repetirservicio = $this->db->query("select count(s.animal_id) as cantidad from animales as a inner join servicio as s on(s.animal_id=a.id) where a.id=".$value["id"]." and s.efecha>'".$partoultimo[0]["fecha"]."'")->result_array();
                if ($repetirservicio[0]["cantidad"]>1) {
                    $repetidoras[]= $this->db->query("select *from animales where id=".$value["id"])->result_array();
                }
            }
        }
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE INDICADORES ANIMALES - REPETIDORAS </h3>';
        $html = $html.'<table border="1" width="100%" >';
            $html = $html.'<tr>';
            $html = $html.'    <th class="center"> RP ANIMAL </th>';
            $html = $html.'    <th class="center"> NOMBRE </th>';
            $html = $html.'    <th class="center"> FECHA NACIMIENTO </th>';
            $html = $html.'    <th class="center"> DESCRIPCION </th>';
            $html = $html.'</tr>';
        foreach ($repetidoras as $key => $value) {
            $html = $html.'<tr>';
            $html = $html.'    <td class="center">'.$value[0]["ani_rp"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_nombre"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_fechanac"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_descripcion"].'</td>';
            $html = $html.'</tr>';
        }
        $html = $html.'</table>';

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Indicadores Animales');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE INDICADORES ANIMALES";

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
        $nombre_archivo = utf8_decode("reporteindicadoresanimales.pdf");
        $pdf->Output($nombre_archivo, 'I');    
    }

    public function indicaciones(){ 
        $animales=$this->db->query("select id,ani_rp, ani_nombre from animales where ani_estado=1")->result_array();
        $indicaciones = array(); 
        foreach ($animales as $key => $value) {
            $conindicaciones = $this->db->query("select *from indicaciones_especiales_evento where iee_estado=1 and animal_id=".$value["id"])->result_array();
            if (count($conindicaciones)>0) {
                $indicaciones[]= $this->db->query("select *from animales where id=".$value["id"])->result_array();
            }
        }
        
        $html = "";         
        $html = $html.'<h3>REPORTE DE INDICADORES ANIMALES - INDICACIONES DE RECHAZO</h3>';
        $html = $html.'<table border="1" width="100%" >';
            $html = $html.'<tr>';
            $html = $html.'    <th class="center"> RP ANIMAL </th>';
            $html = $html.'    <th class="center"> NOMBRE </th>';
            $html = $html.'    <th class="center"> FECHA NACIMIENTO </th>';
            $html = $html.'    <th class="center"> DESCRIPCION </th>';
            $html = $html.'</tr>';
        foreach ($indicaciones as $key => $value) {
            $html = $html.'<tr>';
            $html = $html.'    <td class="center">'.$value[0]["ani_rp"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_nombre"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_fechanac"].'</td>';
            $html = $html.'    <td class="center">'.$value[0]["ani_descripcion"].'</td>';
            $html = $html.'</tr>';
        }
        $html = $html.'</table>';

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte Indicadores Animales');
        $pdf->SetSubject('DIOS');
        $pdf->SetKeywords('reportes,dioses');

        $subtitulobebe = "REPORTE DE INDICADORES ANIMALES";

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
        $nombre_archivo = utf8_decode("reporteindicadoresanimales.pdf");
        $pdf->Output($nombre_archivo, 'I');    
    }
}

