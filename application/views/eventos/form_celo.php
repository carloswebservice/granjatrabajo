<div class="row">
            <section>
                    <label class="label">CAUSA NO INSEMINAL</label>
                            <label class="select">
                                <select id="input-cel_causa_no_inseminal"  name="cel_causa_no_inseminal" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($cni as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->cni_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">MEDICINA GENITAL</label>
                            <label class="select">
                                <select id="input-cel_medicina_genital"  name="cel_medicina_genital" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($mdg as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->mdg_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">VIA APLICACION</label>
                            <label class="select">
                                <select id="input-cel_via_aplicacion"  name="cel_via_aplicacion" >
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