<?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_revisar_requisitos', 'enctype' => 'multipart/form-data']); ?>

<?php if (isset($solicitud_tramite[0]['id_solicitud_tramite'])) : ?>
    <input type="hidden" name="id_solicitud_tramite" value="<?= $solicitud_tramite[0]['id_solicitud_tramite'] ?>">
<?php endif; ?>
<div class="row small">
    <div class="col-md-12">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" value="<?= isset($solicitud[0]['referencia_solicitud']) ? $solicitud[0]['referencia_solicitud'] : '' ?>" disabled>
            <span class="bar"></span>
            <label for="referencia_solicitud">Referencia de la Solicitud</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group m-b-40">
            <textarea class="form-control" disabled><?= isset($solicitud[0]['descripcion_solicitud']) ? $solicitud[0]['descripcion_solicitud'] : '' ?>   </textarea>
            <span class="bar"></span>
            <label for="descripcion_solicitud">Descripcion de la Solicitud</label>
        </div>
    </div>
</div>

<?php foreach ($requisitos_respaldos as $key => $value) : ?>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <p class="text-justify text-danger"> <span class="text-dark font-weight-bold"><?= $key + 1 ?>.</span> <?= $value['descripcion_requisito'] ?></p>
        </div>
    </div>
    <div class="row col-xl-12 col-md-12 contenedor_respaldos">
        <?php foreach ($value['respaldos'] as $key => $val) : ?>
            <?php if ($val['extension_archivo'] == '.doc' || $val['extension_archivo'] == '.docx') : ?>
                <span class="badge badge-pill badge-warning"><?= $val['nombre_archivo'] ?><a href="<?= base_url($val['ruta_archivo']) ?>"><span class="badge badge-pill badge-info">Descargar</span></a>
                    <a href="https://docs.google.com/gview?url=<?= base_url($val['ruta_archivo']) ?>" target="_blank"><span class="badge badge-pill badge-danger">Ver</span>
                    </a>
                </span>
            <?php elseif ($val['extension_archivo'] == '.pdf') : ?>
                <span class="badge badge-pill badge-warning"><?= $val['nombre_archivo'] ?><a href="<?= base_url($val['ruta_archivo']) ?>" target="_blank"><span class="badge badge-pill badge-info">Descargar</span></a></span>
            <?php else : ?>
                <span class="badge badge-pill badge-warning"> <a class="text-dark" href="<?= base_url($val['ruta_archivo']) ?>"><?= $val['nombre_archivo'] ?><span class="badge badge-pill badge-danger">Ver</span></a> </span>
            <?php endif; ?>
        <?php endforeach ?>
    </div>
    <hr>
<?php endforeach ?>
<div class="row small">
    <div class="col-md-12">
        <div class="form-group has-warning m-b-40">
            <textarea class="form-control" name="descripcion_solicitud"></textarea>
            <span class="bar"></span>
            <label for="descripcion_solicitud">¿Desea agregar un comentario general sobre los requisitos?</label>
        </div>
    </div>
</div>
<div class="d-flex flex-row-reverse form-actions">
    <div class="row col-xl-3">
        <div class="form-group has-error m-b-40 w-100">
            <select class="form-control p-0" name="estado_solicitud" id="estado_solicitud">
                <?php if (isset($solicitud[0]['estado_solicitud'])) : ?>
                    <?php foreach (['RECIBIDO', 'ENTREGADO', 'REGISTRADO'] as $key => $value) : ?>
                        <option value="<?= $value ?>" <?= $solicitud[0]['estado_solicitud'] == $value ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach (['RECIBIDO', 'ENTREGADO', 'REGISTRADO'] as $key => $value) : ?>
                        <option value="<?= $value ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="estado_solicitud">Estado Requisito</label>
        </div>
    </div>
</div>
<div class="d-flex flex-row-reverse form-actions">
    <div class="col-xl-2 col-md-12">
        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
    </div>
    <div class="col-xl-2 col-md-12">
        <button type="submit" class="btn btn-rounded btn-block btn-info btn-sm" id="actualizar_solicitud"><i class="mdi mdi-plus-circle"></i> Aceptar</button>
    </div>
</div>
<?= form_close() ?>