
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
                                    <th>NOMBRES</th>   
                                    <th>APELLIDOS</th>
                                    <th>DNI</th>
                                    <th>USUARIO</th>
                                    <th>TELEFONO</th> 
                                    <th>EMAIL</th>                                   
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
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-nombres" name="nombres" placeholder="Nombres" >
                                <input type="hidden" id="input-id" name="id" value="">
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-apellidos" name="apellidos" placeholder="Apellidos">
                            </label>
                        </section>
                    </div>
                      <div class="row">
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" name="usuario" id="input-usuario" placeholder="Usuario" >                             
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="password" id="input-clave"  name="clave" placeholder="Clave">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-4">
                            <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                <input type="text" name="dni" id="input-dni" placeholder="Dni">
                            </label>
                        </section>
                        <section class="col col-4">
                            <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                <input type="email" id="input-email" name="email" placeholder="Email">
                            </label>
                        </section>
                       
                        <section class="col col-4">
                            <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                <input type="text" id="input-telefono" name="telefono" placeholder="Telefono">
                            </label>
                        </section>
                   
                    </div>
                    
                  
                        <section class="">
                            <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                <input type="text" id="input-maestria" name="maestria" placeholder="Maestria">
                            </label>
                        </section>
                    
                    
                        <section >
                            <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                <input type="text" id="input-doctorado" name="doctorado" placeholder="Doctorado">
                            </label>
                        </section>
                    
                   
                          <section >
                            <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                <input type="text" id="input-tituloobtenido" name="tituloobtenido" placeholder="Titulo Obtenido">
                            </label>
                        </section>
                    
                        
                </fieldset>
            </form>


            <form class="smart-form"  id="form-view-<?php echo $prefsmart; ?>">
                <fieldset>
                    <div class="row">
                        <section class="col col-6">
                            <div style="height:35px;">
                                <img id="view-label-logo" style="height:100%"  src="" />
                            </div>                       
                        </section>
                        <section class="col col-6">                        
                            <h3 id="view-label-razon_social"></h3>
                            <small id="view-label-rubro"></small>
                        </section>               
                    </div> 
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