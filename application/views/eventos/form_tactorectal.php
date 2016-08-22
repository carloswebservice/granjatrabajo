<div class="row">
            <section>
                    <label class="label">DIAGNOSTICO UTERO</label>
                            <label class="select">
                                <select id="input-tar_diagnostico_utero"  name="tar_diagnostico_utero" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($dgu as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->dgu_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">ENFERMEDAD UTERO</label>
                            <label class="select">
                                <select id="input-tar_enfermedad_utero"  name="tar_enfermedad_utero" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($efu as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->efu_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">ENFERMEDAD OVARIO</label>
                            <label class="select">
                                <select id="input-tar_enfermedad_ovario"  name="tar_enfermedad_ovario" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($efo as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->efo_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">MEDICINA GENITAL</label>
                            <label class="select">
                                <select id="input-tar_medicina_genital"  name="tar_medicina_genital" >
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
                                <select id="input-tar_via_aplicacion"  name="tar_via_aplicacion" >
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