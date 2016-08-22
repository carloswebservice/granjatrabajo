
<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">
       
        <div class="col-md-12">
            <!-- NEW WIDGET START -->


            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Registro de <?php echo ucfirst($prefsmart); ?> </h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->

                    <div class="widget-body no-padding">
                        
                        <form id="formbb" >
                        <table  id="datatables-<?php echo $prefsmart; ?>" class="table tablecuriosity table-striped table-bordered table-hover" width="100%" >
                            <thead>
                                <tr colspan="4"  >
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                        <input type="text"  id="input-fecha"  name="efecha" placeholder="FECHA" value="<?php print $fecha; ?>" class="datepicker" data-dateformat='dd/mm/yy'>
                                    </label>
                                </tr>
                                <tr>
                                    <th >RP</th>
                                    <th >NOMBRE</th>
                                    <th   >CONTROL 1</th>
                                    <th   >CONTROL 2</th>
                                </tr>                             
                            </thead>
                            
                            <tbody>
                                <?php $sum1 = 0;$sum2 = 0; ?>
                                <?php foreach ($ani as $a): ?>
                                    <?php $xd1 = 0; 
                                    if(get_data_control($a->id,$fecha,1) !== "ju"){ 
                                        $xd1 = get_data_control($a->id,$fecha,1); 
                                        
                                    } $sum1 = $sum1 + $xd1; ?>
                                
                                    <?php $xd2 = 0; 
                                    if(get_data_control($a->id,$fecha,2) !== "ju"){ 
                                        $xd2 = get_data_control($a->id,$fecha,2); 
                                        
                                    } $sum2 = $sum2 + $xd2; ?>
                                <tr>
                                    <td><input type="hidden" name="verf[]" value="<?php if(get_data_control($a->id,$fecha,1) == "ju" && get_data_control($a->id,$fecha,2) == "ju" ){echo "si";}else{echo "no";} ?>" /><input type="hidden" name="id[]" value="<?php print $a->id; ?>" /><?php echo $a->ani_rp; ?></td>
                                    <td><?php echo $a->ani_nombre; ?></td>
                                    <td><input type="text" name="control1[]" value="<?php print $xd1; ?>" /></td>
                                    <td><input type="text" name="control2[]" value="<?php print  $xd2; ?>" /></td>                                    
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" style="text-align:right">Total:</th>
                                    <th><?php print $sum1; ?></th>
                                    <th><?php print $sum2; ?></th>
                                </tr>
                            </tfoot>
                            
                            
                        </table>
                            <center><button class="btn btn-info"  type="button" id="grababb" >Guardar Cambios</button></center>
                            </br>
                        </form>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->
          



        </div>

    </div>

</section>
<script type="text/javascript" > var curiosityprefix = "<?php echo $prefsmart; ?>"; </script>
<script type="text/javascript">

</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/modulos/<?php echo $prefsmart; ?>.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/js/curiositylive.js" ></script>
