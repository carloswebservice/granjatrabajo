<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Horariodocentes extends CI_Controller {

    var $prefix = "horariodocentes";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $prefsmart =$this->prefix;
        $cursos = new Curso();
        $cursos = $cursos->where("estado","A")->get();
        
        $this->load->view('/'.$prefsmart.'/index',  compact('prefsmart','cursos'));
    }
    
    // SEDE     
    // FACULTAD  
    // CARRERA    
    // CICLO                                    
    // GRUPO (BECA 18 ,FIN DE SEMANA ,NORMAL)  
    // SEGUIMIENTO DE ADMINISTRADOR             
  
    
    public function repo(){
        
        //echo "<pre>";
        //print_r($_POST);
        //exit();
        
        $doc = new Docente();
        $doc = $doc->where("id",$_SESSION["id_usuario"])->get();
        
       
        
        
        $html = "";
        
        if(!isset($_POST["horario"])){
            echo "debe llenar su horario";
            exit();
        }else{
            if($_POST["cursos"] == "" ){
                echo "debe llenar los cursos a dictar";
                exit();
            }
        }
        
        $cursillos = $_POST["cursos"];
        //print_r($cursillos);exit();
        
        
        $html = $html.'<h3>FICHA DE DOCENTES DE LA UNIVERSIDAD CIENTIFICA DEL PERU</h3>'
                . '<table width="100%" ><tr>'
                . '<td><strong>FACULTAD Y CARRERA DIRIGIDA</strong></td>'
                . '<td>...................................................................</td>'
                . '</tr>'
               . '<tr>'
                . '<td><strong>MAESTRIA</strong></td>'
                . '<td>'.$doc->maestria.'</td>'
                . '</tr><tr>'
                . '<td><strong>DOCTORADO</strong></td>'
                . '<td>'.$doc->doctorado.'</td>'
                . '</tr><tr>'
                . '<td><strong>TITULO OBTENIDO</strong></td>'
                . '<td>'.$doc->tituloobtenido.'</td>'
                . '</tr><tr>'
                . '<td><strong>NOMBRE Y APELLIDO</strong></td>'
                . '<td>'.$doc->nombres.' '.$doc->apellidos.'</td></tr></table><br><br/>';
        
        
        $html = $html.'<table  border="1" width="100%" >
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>LUNES</th>   
                                    <th>MARTES</th>
                                    <th>MIERCOLES</th>
                                    <th>JUEVES</th>
                                    <th>VIERNES</th> 
                                    <th>SABADO</th>
                                    <th>DOMINGO</th>  
                                </tr>
                            </thead>
                            <tbody>
                                                         
                                <tr>
                                    <td><stron>07:00 - 07:50 am</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("1-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                
                                <tr>
                                    <td><stron>07:50 - 08:40 am</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("2-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                
                                <tr>
                                    <td><stron>08:40 - 09:30 am</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("3-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                
                                 <tr>
                                    <td><stron>09:30 - 10:20 am</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("4-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                
                                <tr>
                                    <td><stron>10:20 - 11:10 am</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("5-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                
                                 <tr>
                                    <td><stron>11:10 - 12:00 am</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("6-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                
                                 <tr>
                                    <td><stron>12:00 - 12:50 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("7-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                
                                  <tr>
                                    <td><stron>01:00 - 01:50 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("8-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                  <tr>
                                    <td><stron>01:50 - 02:40 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("9-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                 <tr>
                                    <td><stron>02:40 - 03:30 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("10-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>03:30 - 04:20 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("11-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>04:20 - 05:10 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("12-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>05:10 - 06:00 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("13-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>06:40 - 06:50 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("14-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>06:50 - 07:40 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("15-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>07:40 - 08:30 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("16-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>08:30 - 09:20 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("17-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>09:20 - 10:10 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("18-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>10:10 - 11:00 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("19-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                                   <tr>
                                    <td><stron>11:00 - 11:50 pm</stron></td>';
                                    
                                   for($i=1;$i<=7;$i++){
                                       if(in_array("20-".$i, $_POST["horario"])){
                                        $html = $html.'<td  style="background-color:blue;" ></td>';   
                                       
                                       }else{
                                            $html = $html."<td></td>";   
                                       }
                                   }         
        
                                 
                           $html= $html.'</tr>
                            </tbody>
                        </table><br/><br/>';
        
                           
                           
                           
        $html = $html.'<table border="1" width="100%" >';
        $html = $html."<tr>"
                . '<td align="baseline" ><h3>CURSOS POR DICTAR</h3></td>'
                . "<td>";
                
        foreach ($cursillos as $val){
            $html = $html.$val."<br/>";
        }
        
        $html = $html."</td></tr>";
        $html = $html."</table>";
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Miller Rivera');
        $pdf->SetTitle('Reporte mi hprario');
        $pdf->SetSubject('HORARIOS');
        $pdf->SetKeywords('horarios,dioses');

        $subtitulobebe = "Mi horario";

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


        $pdf->AddPage();



        $pdf->writeHTML($html, true, 0, true, 0);


        $nombre_archivo = utf8_decode("reportemihorario.pdf");
        $pdf->Output($nombre_archivo, 'I');


    

    }


}

