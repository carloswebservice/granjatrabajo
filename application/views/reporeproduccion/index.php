
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
                    <h2>Reporte de reproduccion </h2>

                </header>
                <select class="form-control" id="year">
                    <option value="">--SELECCIONE AÑO PARICIONES--</option>
                    <?php for($i=2015;$i<=2020;$i++): ?>
                        <option value="<?php print $i; ?>" ><?php print $i; ?></option>
                    <?php endfor;  ?>
                </select>
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
