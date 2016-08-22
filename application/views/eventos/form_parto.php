<div class="row">
            <section>
                    <label class="label">TIPO PARTO</label>
                            <label class="select">
                                <select id="input-par_tipo_parto"  name="par_tipo_parto" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($tpa as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->tpa_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">ESTADO CRIA</label>
                            <label class="select">
                                <select id="input-par_estado_cria"  name="par_estado_cria" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($etc as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->etc_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">SEXO CRIA</label>
                            <label class="select">
                                <select id="input-par_sexo_cria"  name="par_sexo_cria" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($scr as $d): ?>
                                        <option value="<?php echo $d->scr_id; ?>"><?php echo  strtoupper($d->scr_descripcion); ?></option>
                                    <?php endforeach; ?>
                                </select> <i></i>
                            </label>
            </section>
</div>

<div class="row">
            <section>
                    <label class="label">TIPO SERVICO</label>
                            <label class="select">
                                <select id="input-par_servicio"  name="par_servicio" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($tps as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->tps_descripcion); ?></option>
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