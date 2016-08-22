
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
                    <a onclick="addaction('<?php echo $prefsmart; ?>')"  data-original-title="Agregar" data-placement="left" rel="tooltip" class="btn btn-primary btn-block"><i class="fa fa-plus"></i></a>
                    <div style="clear:both;margin-top: 5px;"></div>
                   <!-- <a onclick="viewaction('<?php// echo $prefsmart; ?>')" data-original-title="Ver" data-placement="left" rel="tooltip" class="btn btn-success btn-block"><i class="fa fa-eye"></i></a>
                    <div style="clear:both;margin-top: 5px;"></div> -->
                    <a onclick="editaction()" data-original-title="Editar" data-placement="left" rel="tooltip" class="btn btn-warning btn-block"><i class="fa fa-edit"></i></a>
                    <div style="clear:both;margin-top: 5px;"></div>
                    <a onclick="deleteaction()" data-original-title="Eliminar" data-placement="left" rel="tooltip" class="btn btn-danger btn-block"><i class="fa fa-trash-o"></i></a>
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
                                    <th><center><i class="fa fa-check-circle"></i></center></th>                                   
                                    <th>RP</th>
                                    <th>NOMBRE</th>
                                    <th>RP PADRE</th>
                                    <th>RP MADRE</th>
                                    <th>FECHA NACIMIENTO</th>
                                    <th>TIPO REGISTRO</th>
                                    <th>RAZA</th>
                                    <th>PROVEEDOR</th>
                                    <th>SEXO</th>
                                </tr>
                            </thead>
                            <tbody>
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
                        <section class="col-md-6">
                            <label class="input">
                                <input type="text" id="input-ani_rp" name="ani_rp" placeholder="RP ANIMAL" >
                            </label>
                        </section>
                        
                        <section class="col-md-6">
                            <label class="input">
                                <input type="text" id="input-ani_nombre" name="ani_nombre" placeholder="NOMBRE" >
                            </label>
                        </section>
                    </div>
                    
                    <div class="row" >
                         <div class="col-md-6" >
                        <section>
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-ani_padre" name="ani_padre" placeholder="RP PADRE" >
                            </label>
                        </section>
                         </div>
                        <div class="col-md-6">
                        <section>
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-ani_madre" name="ani_madre" placeholder="RP MADRE" >
                            </label>
                        </section>
                        </div>
                    </div>
                 
                    <div class="row">
                        <section>
                             <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                 <input type="text"  id="input-ani_fechanac"  name="ani_fechanac" placeholder="FECHA NACIMIENTO" class="datepicker" >
                             </label>
                        </section>
                    </div>
                    <div class="row">
                        <section>
                            <label class="select">
                                <select id="input-ani_tiporeg"  name="ani_tiporeg" >
                                    <option value="" >TIPO REGISTRO</option>
                                    <?php foreach ($tiporeg as $d): ?>                                       
                                        <option value="<?php echo $d->id; ?>"><?php echo $d->tiporeg_descripcion; ?></option>                                       
                                    <?php endforeach; ?>
                                </select> <i></i> </label>

                        </section>
                    </div>
                    <div class="row">
                        <section class="col-md-6">
                            <label class="select">
                                <select id="input-ani_raza"  name="ani_raza" >
                                    <option value="" >RAZA</option>
                                    <?php foreach ($raz as $d): ?>                                       
                                        <option value="<?php echo $d->id; ?>"><?php echo $d->raz_descripcion; ?></option>                                       
                                    <?php endforeach; ?>
                                </select> <i></i> </label>

                        </section>
                        
                         <section class="col-md-6">
                            <label class="select">
                                <select id="input-ani_sexo"  name="ani_sexo" >
                                    <option value="" >SEXO</option>
                                    <?php foreach ($scr as $d): ?>                                       
                                        <option value="<?php echo $d->scr_id; ?>"><?php echo $d->scr_descripcion; ?></option>                                       
                                    <?php endforeach; ?>
                                </select> <i></i> </label>

                        </section>
                    </div>
                   <div class="row" >
                        <section>
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-ani_proveedor" name="ani_proveedor" placeholder="PROVEEDOR" >
                            </label>
                        </section>
                   </div>
                     <div class="row" >
                        <section>
                            <label class="input"> 
                                <input type="text" id="input-ani_descripcion" name="ani_descripcion" placeholder="DESCRIPCION" >
                            </label>
                        </section>
                   </div>
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
