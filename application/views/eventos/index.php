
<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">
        <div class="col-md-1">
            <div class="jarviswidget" id="wid-id-9" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
                <header>
                    <center> <i class="fa fa-hand-o-up"></i></center>
                </header>

                <!-- widget div-->
                <div>
                    <a onclick="addxaction('<?php echo $prefsmart; ?>')"  data-original-title="Agregar" data-placement="left" rel="tooltip" class="btn btn-primary btn-block"><i class="fa fa-plus"></i></a>
                    <div style="clear:both;margin-top: 5px;"></div>
                   <!-- <a onclick="viewaction('<?php// echo $prefsmart; ?>')" data-original-title="Ver" data-placement="left" rel="tooltip" class="btn btn-success btn-block"><i class="fa fa-eye"></i></a>
                    <div style="clear:both;margin-top: 5px;"></div> -->
<!--                    <a onclick="editaction()" data-original-title="Editar" data-placement="left" rel="tooltip" class="btn btn-warning btn-block"><i class="fa fa-edit"></i></a>
                    <div style="clear:both;margin-top: 5px;"></div>
                    <a onclick="deleteaction()" data-original-title="Eliminar" data-placement="left" rel="tooltip" class="btn btn-danger btn-block"><i class="fa fa-trash-o"></i></a>-->
                    <br/>
                </div>


            </div>
            <!-- end widget -->
        </div>
        <div class="col-md-11">
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

                        <table  id="datatables-<?php echo $prefsmart; ?>" class="table tablecuriosity table-striped table-bordered table-hover" width="100%" >
                            <thead>
                                <tr>
                                    <th rowspan="2">RP</th>
                                    <th rowspan="2">NOMBRE</th>
                                    <th colspan="12"  ><center><a href="#eventos/index/<?php echo (int)$anio-1; ?>" class="btn btn-xs btn-danger" ><i class="fa fa-chevron-circle-left" ></i></a> &nbsp;&nbsp;&nbsp;&nbsp; AÑO <?php echo $anio; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="#eventos/index/<?php echo (int)$anio+1; ?>"  class="btn btn-xs btn-danger" ><i class="fa fa-chevron-circle-right" ></i></a></center></th>
                                </tr>
                                <tr class="text-info" >
                                    <th>ENE</th>
                                    <th>FEB</th>
                                    <th>MAR</th>
                                    <th>ABR</th>
                                    <th>MAY</th>
                                    <th>JUN</th>
                                    <th>JUL</th>
                                    <th>AGO</th>
                                    <th>SEP</th>
                                    <th>OCT</th>
                                    <th>NOV</th>
                                    <th>DIC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ani as $a): ?>
                                <tr>
                                    <td><input type="radio" name="selrow" class="selrow" value="<?php echo $a->id; ?>" > <?php echo $a->ani_rp; ?></td>
                                    <td><?php echo $a->ani_nombre; ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,1); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,2); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,3); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,4); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,5); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,6); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,7); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,8); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,9); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,10); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,11); ?></td>
                                    <td><?php get_data_evento($a->id,(int)$anio,12); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->
             <?php
                        $atributos = array('id' => 'form-'.$prefsmart,"class"=>"smart-form");
                        echo form_open(base_url().$prefsmart."/save", $atributos);
             ?>

                <fieldset>
                    <div class="row">
                           <section>
                            <label class="label">EVENTO</label>
                            <label class="select">
                                <select id="input-evento_id"  name="evento_id" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($eventos as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->eve_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i> </label>

                        </section>
                    </div>
                    <div id="form-load"></div>
                    <input type="hidden" id="input-animal_id" name="animal_id" value="">
                    <input type="hidden" id="input-id" name="id" value="">
                </fieldset>
            </form>



        </div>

    </div>

</section>
<script type="text/javascript" > var curiosityprefix = "<?php echo $prefsmart; ?>"; </script>
<script type="text/javascript">

</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/modulos/<?php echo $prefsmart; ?>.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/js/curiositylive.js" ></script>
