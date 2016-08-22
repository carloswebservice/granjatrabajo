
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
                    <h2>Reporte de caja </h2>
                </header>

                <form class="smart-form" id="form_cajita">
                    <fieldset>
                        <div class="row">
                            <section class="col col-2">
                                 <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                    <input type="text" id="fecha" name="fecha" placeholder="Fecha" class="datepicker hasDatepicker" data-dateformat="dd/mm/yy">
                                 </label>
                            </section>
                            <section class="col col-2">
                                <label class="input"> <i class="icon-prepend">C</i>
                                    <input type="text" id="cantidad" name="cantidad" placeholder="Cantidad">
                                </label>
                            </section>
                            <section class="col col-2">
                                <label class="select">
                                    <select id="tipo"  name="tipo" >
                                        <option value="" >Tipo</option>
                                        <option value="Mayor" >Mayor</option>
                                        <option value="Menor" >Menor</option>
                                    </select> 
                                    <i></i> 
                                </label>
                            </section>
                            <section class="col col-2">
                                <label class="input"> <i class="icon-prepend">E</i>
                                    <input type="text" id="estado" name="estado" placeholder="Estado">
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="input"> <i class="icon-prepend">D</i>
                                    <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion">
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-2">
                                <label class="input"> <i class="icon-prepend">S/.</i>
                                    <input type="text" name="ingreso" id="ingreso" placeholder="Monto Ingreso" >                             
                                </label>
                            </section>
                            <section class="col col-1"></section>
                            <section class="col col-2">
                                <label class="input"> <i class="icon-prepend">S/.</i>
                                    <input type="text" id="compra"  name="compra" placeholder="Monto Compra">
                                </label>
                            </section>
                            <section class="col col-2">
                                <label class="input"> <i class="icon-prepend">S/.</i>
                                    <input type="text" id="medicina"  name="medicina" placeholder="Monto Medicina">
                                </label>
                            </section>
                            <section class="col col-2">
                                <label class="input"> <i class="icon-prepend">S/.</i>
                                    <input type="text" id="transporte"  name="transporte" placeholder="Monto Transporte">
                                </label>
                            </section>
                            <section class="col col-1"></section>
                            <section class="col col-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm" onclick="guardarcaja()"> <i class="fa fa-save"></i> Guardar</button>
                                </div>
                            </section>
                        </div>  
                    </fieldset>
                </form>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->

                    <div class="widget-body no-padding">                
                        <iframe id="iframe-bonis"
                            src=""
                            style="width: 100%; height:500px;">
                        </iframe>
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
