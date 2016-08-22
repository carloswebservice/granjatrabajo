<div class="row">
            <section>
                    <label class="label">ESPECIFICACION DE MUERTE</label>
                            <label class="select">
                                <select id="input-mue_espec_muerte"  name="mue_espec_muerte" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($edm as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->edm_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>


 <div class="row">
                        <section>
                             <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                 <input type="text"  id="input-efecha"  name="efecha" placeholder="FECHA EVENTO" class="datepicker" data-dateformat='dd/mm/yy'>
                             </label>
                        </section>
 </div>

<script type="text/javascript" src="<?php echo base_url() ?>public/js/curiositylive.js" ></script>