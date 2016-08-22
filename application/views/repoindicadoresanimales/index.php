
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
                    <h2>Reporte Indicadores Animales </h2>

                </header>
                <div class="btn-group">
                    <button type="button" class="btn btn-success" id="secarpreñes">Secar Por Preñez (>=7 meses Preñez)</button>
                    <button type="button" class="btn btn-info" id="paratacto">Para Tacto (>=45 dias Preñez)</button>
                    <button type="button" class="btn btn-warning" id="aparir">A Parir (<= 7 dias Fecha Prob.Parto)</button>
                    <button type="button" class="btn btn-primary" id="repetidoras">Repetidoras (>1 Servicio Ult. Parto)</button>
                    <button type="button" class="btn btn-success" id="indirechazo">Indicaciones De Rechazo</button>
                </div>
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
