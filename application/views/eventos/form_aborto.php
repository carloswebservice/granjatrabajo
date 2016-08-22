<div class="row">
            <section>
                    <label class="label">CAUSA ABORTO</label>
                            <label class="select">
                                <select id="input-abo_causaaborto"  name="abo_causaaborto" >
                                    <option value = "" > -- SELECCIONE --</option>
                                    <?php foreach ($cab as $d): ?>
                                        <option value="<?php echo $d->id; ?>"><?php echo  strtoupper($d->cab_descripcion); ?></option>
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