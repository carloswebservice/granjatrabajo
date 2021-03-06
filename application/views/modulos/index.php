
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
                                    <th>MODULO</th>
                                    <th>URL</th>
                                    <th>ORDEN</th>
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
                        <section >
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-mod_descripcion" name="mod_descripcion" placeholder="Descripcion" >
                                <input type="hidden" id="input-id" name="id" value="">
                            </label>
                        </section>
                        <section >
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-mod_url" name="mod_url" placeholder="URL MODULO" >
                               
                            </label>
                        </section>
                   
                          <section>
                            <label class="select">
                                <select id="input-mod_padre"  name="mod_padre" >
                                    <option value="0" >MODULO PADRE</option>
                                    <?php foreach ($modulos as $d): ?>                                       
                                        <option value="<?php echo $d->id; ?>"><?php echo $d->mod_descripcion; ?></option>                                       
                                    <?php endforeach; ?>
                                </select> <i></i> </label>

                        </section>
                         <section >
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-mod_icono" name="mod_icono" placeholder="ICONO" >
                               
                            </label>
                        </section>
                         <section >
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-mod_orden" name="mod_orden" placeholder="ORDEN" >
                               
                            </label>
                        </section>
                    </div>                              
                </fieldset>
            </form>
        </div>

    </div>

</section>



<script type="text/javascript" > var curiosityprefix = "<?php echo $prefsmart; ?>"; </script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/modulos/<?php echo $prefsmart; ?>.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/js/curiositylive.js" ></script>