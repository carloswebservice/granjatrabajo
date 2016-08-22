<div class="row">
            <section>
                    <label class="label">TIPO ANALISIS</label>
                            <label class="select">
                                <select id="input-ana_tipo_analisis"  name="ana_tipo_analisis" >
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
                    <label class="label">RESULTADO ANALISIS</label>
                            <label class="select">
                                <select id="input-ana_resultado_analisis"  name="ana_resultado_analisis" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($res as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->res_descripcion); ?></option>
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