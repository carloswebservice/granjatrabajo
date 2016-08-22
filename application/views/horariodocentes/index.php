
<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div id='imprimeme' class="row">
        
        <div class="col-md-12">
            <!-- NEW WIDGET START -->

            <form id="form-horario" method="post" action="<?php print base_url(); ?>horariodocentes/repo" onsubmit="target_popup(this)">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Registro de Horario (Timpo Libre) </h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                   
                    <div class="widget-body no-padding">

                        <table  class="table  table-striped table-bordered table-hover" width="100%" >
                            <thead>
                                <tr>
                                    <th><center><i class="fa fa-clock-o"></i></center></th>
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
                                    <td><stron>07:00 - 07:50 am</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="1-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="1-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="1-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="1-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="1-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="1-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="1-7" /></td>
                                </tr>
                                
                                <tr>
                                    <td><stron>07:50 - 08:40 am</stron></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="2-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="2-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="2-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="2-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="2-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="2-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="2-7" /></td>
                                </tr>
                                
                                <tr>
                                    <td><stron>08:40 - 09:30 am</stron></td>
                                     <td class="print" ><input type="checkbox" name="horario[]" value="3-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="3-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="3-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="3-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="3-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="3-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="3-7" /></td>
                                </tr>
                                
                                 <tr>
                                    <td><stron>09:30 - 10:20 am</stron></td>
                                     <td class="print" ><input type="checkbox" name="horario[]" value="4-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="4-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="4-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="4-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="4-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="4-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="4-7" /></td>
                                </tr>
                                
                                <tr>
                                    <td><stron>10:20 - 11:10 am</stron></td>
                                        <td class="print" ><input type="checkbox" name="horario[]" value="5-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="5-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="5-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="5-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="5-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="5-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="5-7" /></td>
                                </tr>
                                
                                 <tr>
                                    <td><stron>11:10 - 12:00 am</stron></td>
                                <td class="print" ><input type="checkbox" name="horario[]" value="6-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="6-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="6-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="6-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="6-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="6-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="6-7" /></td>
                                </tr>
                                
                                 <tr>
                                    <td><stron>12:00 - 12:50 pm</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="7-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="7-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="7-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="7-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="7-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="7-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="7-7" /></td>
                                </tr>
                                
                                  <tr>
                                    <td><stron>01:00 - 01:50 pm</stron></td>
                                      <td class="print" ><input type="checkbox" name="horario[]" value="8-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="8-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="8-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="8-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="8-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="8-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="8-7" /></td>
                                </tr>
                                  <tr>
                                    <td><stron>01:50 - 02:40 pm</stron></td>
                                      <td class="print" ><input type="checkbox" name="horario[]" value="9-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="9-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="9-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="9-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="9-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="9-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="9-7" /></td>
                                </tr>
                                 <tr>
                                    <td><stron>02:40 - 03:30 pm</stron></td>
                                      <td class="print" ><input type="checkbox" name="horario[]" value="10-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="10-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="10-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="10-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="10-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="10-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="10-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>03:30 - 04:20 pm</stron></td>
                                     <td class="print" ><input type="checkbox" name="horario[]" value="11-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="11-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="11-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="11-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="11-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="11-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="11-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>04:20 - 05:10 pm</stron></td>
                                     <td class="print" ><input type="checkbox" name="horario[]" value="12-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="12-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="12-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="12-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="12-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="12-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="12-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>05:10 - 06:00 pm</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="13-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="13-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="13-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="13-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="13-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="13-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="13-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>06:40 - 06:50 pm</stron></td>
                                     <td class="print" ><input type="checkbox" name="horario[]" value="14-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="14-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="14-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="14-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="14-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="14-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="14-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>06:50 - 07:40 pm</stron></td>
                                     <td class="print" ><input type="checkbox" name="horario[]" value="15-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="15-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="15-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="15-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="15-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="15-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="15-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>07:40 - 08:30 pm</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="16-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="16-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="16-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="16-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="16-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="16-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="16-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>08:30 - 09:20 pm</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="17-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="17-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="17-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="17-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="17-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="17-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="17-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>09:20 - 10:10 pm</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="18-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="18-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="18-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="18-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="18-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="18-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="18-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>10:10 - 11:00 pm</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="19-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="19-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="19-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="19-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="19-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="19-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="19-7" /></td>
                                </tr>
                                   <tr>
                                    <td><stron>11:00 - 11:50 pm</stron></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="20-1" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="20-2" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="20-3" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="20-4" /></td>
                                    <td class="print" ><input type="checkbox" name="horario[]" value="20-5" /></td>
                                   <td class="print" ><input type="checkbox" name="horario[]" value="20-6" /></td>
                                  <td class="print" ><input type="checkbox" name="horario[]" value="20-7" /></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                        
                          
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

              
                    <div class="row">
                        <section class="col col-md-12">
<h3><label class="text-info">Escriba los cursos que desea llevar separados por "," ejemplo: Matematicas,Ciencias,Letras</label></h3>
                            <!-- <center>
                                <label class="textarea">    
                            <textarea name="cursos" cols="100" rows="4">
                                
                            </textarea></center>-->

                            <select name="cursos[]" class="js-example-basic-multiple form-control" multiple="multiple">
                              <?php foreach ($cursos as $c): ?>
                                <option value="<?php print $c->descripcion; ?>" ><?php print $c->descripcion; ?></option>
                              <?php endforeach; ?>
                             </select>
                            <br/><br/>
                        </section>
                        
                    </div>
                       
                        

    </div>
        <div class="col-md-12">
            <center><button id="envio" type="submit"  class="btn btn-success">IMPRIMIR HORARIO</button></center>
            
        </div>
        </form>
    </div>

</section>
<script type="text/javascript" > var curiosityprefix = "<?php echo $prefsmart; ?>"; </script>
<script type="text/javascript">
   
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/modulos/<?php echo $prefsmart; ?>.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/js/curiositylive.js" ></script>