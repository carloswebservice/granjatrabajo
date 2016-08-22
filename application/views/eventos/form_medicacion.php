<div class="row">
            <section>
                    <label class="label">MEDICAMENTO</label>
                            <label class="select">
                                <select id="input-mec_medicamentos"  name="mec_medicamentos" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($med as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->med_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">VIA APLICACION</label>
                            <label class="select">
                                <select id="input-mec_via_aplicacion"  name="mec_via_aplicacion" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($vap as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->vap_descripcion); ?></option>
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