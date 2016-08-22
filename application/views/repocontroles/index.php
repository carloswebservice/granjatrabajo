
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
                    <h2>Reporte de Controles por Rangos de Fecha </h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->

                    <div class="widget-body no-padding">
                        
                        
                        <form action="" method="POST" id="formxd" class="smart-form" >
							<header>
								Seleccione Rango de Fechas
							</header>

                        <fieldset>
                            <div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="startdate" id="startdate" placeholder="Expected start date">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="finishdate" id="finishdate" placeholder="Expected finish date">
										</label>
									</section>
								</div>
                        </fieldset>
							<footer>
								<button type="button" id="reportexd" class="btn btn-primary">
									Generar
								</button>
							</footer>
						</form>

                        
                        
                        
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
