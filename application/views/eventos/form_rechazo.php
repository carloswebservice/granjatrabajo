<div class="row">
            <section>
                    <label class="label">CAUSA RECHAZO</label>
                            <label class="select">
                                <select id="input-rec_causa_rechazo"  name="rec_causa_rechazo" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($car as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->car_descripcion); ?></option>
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