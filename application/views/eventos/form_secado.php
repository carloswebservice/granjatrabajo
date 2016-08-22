<div class="row">
            <section>
                    <label class="label">MED CUARTO MAMARIO</label>
                            <label class="select">
                                <select id="input-sec_med_cuartos_mamarios"  name="sec_med_cuartos_mamarios" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($mdm as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->mdm_descripcion); ?></option>
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