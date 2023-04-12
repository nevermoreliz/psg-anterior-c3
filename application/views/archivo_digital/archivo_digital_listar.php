<div class="card">
    <div class="card-body">
        <div id="campos_requisitos">
            <?php if (isset($ci)) : ?>
                <input type="hidden" id="ci" value="<?= $ci ?>">
            <?php endif; ?>
            <?php if (isset($id_persona)) : ?>
                <input type="hidden" id="id_persona" value="<?= $id_persona ?>">
            <?php endif; ?>

            <?php foreach ($tipos_respaldo as $key => $value) : ?>
                <div class="row">
                    <div class="col-xl-10 col-md-12">
                        <p class="text-justify text-danger"> <span class="text-dark font-weight-bold"><?= $key + 1 ?>.</span> <?= $value->nombre ?></p>
                        <div id="respaldos_digitales_<?= $value->id_tipo_respaldo ?>" class="contenedor_respaldos">
                            <?php foreach ($value->respaldos as $k => $val) : ?>
                                <span class="badge badge-pill badge-warning"><?= $value->nombre_corto ?><a href="<?= base_url($val->ruta_documento) ?>" target="_blank"> <span class="badge badge-pill badge-info">Ver</span></a></span>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-12 text-center">
                        <div class="adjuntar_archivo border 
                        -warning rounded" data-valido="<?= $value->valido == 'OBLIGATORIO' ? 'true' : 'false' ?>" data-id-tipo-respaldo="<?= $value->id_tipo_respaldo ?>" data-tipo-extension="<?= $value->tipo_extension ?>" data-tamano="<?= $value->tamano ?>" data-value="<?= $value->id_tipo_respaldo ?>" data-nombre-corto="<?= $value->nombre_corto ?>" data-tiene="<?= isset($value->respaldos[0]) ? $value->respaldos[0]->id_documento_presentado_persona : '' ?>">
                            <i class="fa fa-cloud-upload"></i>
                            <br>
                            <?php if (empty($value->respaldos)) : ?>
                                <small>Subir Archivo</small>
                            <?php else : ?>
                                <small>Actualizar Archivo</small>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach ?>
        </div>
    </div>
</div>