<div class="row">
            <section>
                    <label class="label">REPRODUCTORR</label>
                            <label class="select">
                                <select id="input-ser_reproductor"  name="ser_reproductor" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($rep as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->rep_rp); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">PERSONAL</label>
                            <label class="select">
                                <select id="input-ser_personal"  name="ser_personal" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($per as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->per_nombre." ".$d->per_apema." ".$d->per_apepa); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>


<div class="row">
            <section>
                    <label class="label">TIPO SERVICIO</label>
                            <label class="select">
                                <select id="input-ser_tipo_servicio"  name="ser_tipo_servicio" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($tps as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo $d->tps_descripcion; ?></option>
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