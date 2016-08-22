
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
                                    <th>APELLIDO PATERNO</th>
                                    <th>APELLIDO MATERNO</th>
                                    <th>DNI</th>
                                    <th>DISTRITO</th>
                                    <th>TELEFONO</th>
                                    <th>DIRECCION</th>
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
                                <input type="text" id="input-per_nombre" name="per_nombre" placeholder="Nombres" >
                                <input type="hidden" id="input-id" name="id" value="">
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-per_apepa" name="per_apepa" placeholder="Apellidos Pat">
                            </label>
                        </section>
                    </div>
                      <div class="row">
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" name="per_apema" id="input-per_apema" placeholder="Apellido Mat" >                             
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-per_dni"  name="per_dni" placeholder="DNI">
                            </label>
                        </section>
                    </div>
                    
                    <div class="row">
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" name="per_direccion" id="input-per_direccion" placeholder="Direccion" >                             
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                <input type="text" id="input-per_telefono"  name="per_telefono" placeholder="TELEFONO">
                            </label>
                        </section>
                    </div>
                    
                    <div class="row">
                        <section class="col col-4">
                            <label class="select">
                                <select id="input-depa_id" name="depa_id" >
                                    <option value="" >Departamento</option>
                                    <?php foreach ($dpto as $d): ?>                                       
                                        <option value="<?php echo $d->id; ?>"><?php echo $d->departamento; ?></option>                                       
                                    <?php endforeach; ?>
                                </select> <i></i> </label>
                        </section>
                        <section class="col col-4">
                            <label class="select">
                                <select id="input-prov_id" name="prov_id" >
                                    <option value="">Provincia</option>

                                </select> <i></i> </label>
                        </section>
                        <section class="col col-4">
                            <label class="select">
                                <select id="input-per_distrito" name="per_distrito" >
                                    <option value="" >Distrito</option>                                   
                                </select> <i></i> </label>
                        </section>
                    </div>
                               
                       
                    
                        
                </fieldset>
            </form>
        </div>

    </div>

</section>


<div  id="modalpermisos"  aria-hidden="true" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span >&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">ASIGNAR PERMISOS</h4>
            </div>
            <div class="modal-body">
                
                <div id="tree" style="font-size: 12px;overflow: auto;height: auto;"></div>
                <div style="text-align: center;" >
                    </br>
                    
                </div>
                <span id="load"></span>
                <br/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" id="actualizaPermisos"><i class="fa fa-refresh"></i> Actualizar Permisos</button>
                <button type="button"   class="btn btn-default" data-dismiss="modal">Cancelar</button>
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" > var curiosityprefix = "<?php echo $prefsmart; ?>"; </script>

<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.jstree.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/modulos/<?php echo $prefsmart; ?>.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/js/curiositylive.js" ></script>