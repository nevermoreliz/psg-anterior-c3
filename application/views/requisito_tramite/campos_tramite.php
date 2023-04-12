<?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_tramite', 'enctype' => 'multipart/form-data']); ?>
<div class="row small">
    <div class="col-md-4">
        <div class="form-group has-error m-b-40">
            <select class="form-control p-0" name="tipo_tramite" id="tipo_tramite">
                <?php if (isset($tramite[0]['tipo_tramite'])) : ?>
                    <?php foreach (['DOCENTE', 'POSGRADUANTE', 'ADMINISTRATIVO'] as $key => $value) : ?>
                        <option value="<?= $value ?>" <?= $tramite[0]['tipo_tramite'] == $value ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach (['DOCENTE', 'POSGRADUANTE', 'ADMINISTRATIVO'] as $key => $value) : ?>
                        <option value="<?= $value ?>"><?= $value  ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="tipo_tramite">Tipo Tramite</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="nombre_tramite" id="nombre_tramite" value="<?= isset($tramite[0]['nombre_tramite']) ? $tramite[0]['nombre_tramite'] : '' ?>">
            <span class="bar"></span>
            <label for="nombre_tramite">Nombre</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="costo_tramite" id="costo_tramite" value="<?= isset($tramite[0]['costo_tramite']) ? $tramite[0]['costo_tramite'] : '' ?>">
            <span class="bar"></span>
            <label for="costo_tramite">Costo</label>
        </div>
    </div>
</div>
<div class="d-flex flex-row-reverse form-actions">
    <div class="col-md-3">
        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-rounded btn-block btn-info btn-sm" id="<?= isset($tramite) ? 'actualizar_tramite' : 'insertar_tramite' ?>" type="submit"><i class="mdi mdi-plus-circle"></i> <?= isset($tramite) ? 'Actualizar Tramite' : 'Insertar Tramite' ?></button>
    </div>
</div>
</form>