<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h3 class="text-themecolor">INSCRIPCI&Oacute;N DE PROGRAMA</h3>
    </div>

    <div class="card w-100 p-3">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#datos-personales" role="tab" aria-selected="false">
                    <span class="hidden-sm-up"><i class="mdi mdi-account-edit"></i></span>
                    <span class="hidden-xs-down">Datos Personales</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#requisitos_programa" role="tab" aria-selected="true">
                    <span class="hidden-sm-up"><i class="mdi mdi-file-lock"></i></span>
                    <span class="hidden-xs-down">Requisitos</span>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active show p-20" id="datos-personales" role="tabpanel">
            </div>
            <div class="tab-pane p-20" id="requisitos_programa" role="tabpanel">
                <div class="row">
                    <h4 class=""><?= $programa['nombre_programa'] ?></h4>
                </div>
                <div class="row">
                    <h6><i class="text-success mdi mdi-check"></i> OPCIONAL</h6>
                    <h6><i class="text-danger mdi mdi-check-all"></i> OBLIGATORIO</h6>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-check">
                            <?php foreach ($requisitos as $key => $requisito) : ?>
                                <input name="id_requisito_presentado_persona[]" value="<?= $requisito['id_requisito_programa'] ?>" id="list-<?= $requisito['id_requisito_programa'] ?>" class="form-check-input" type="checkbox">
                                <label for="list-<?= $requisito['id_requisito_programa'] ?>" class="form-check-label text-dark">
                                    <?= $requisito['categoria'] == 'OPCIONAL' ? '<i class="text-success mdi mdi-check"></i>' : '<i class="text-danger mdi mdi-check-all"></i>' ?>
                                    <?= $requisito['descripcion_requisito'] ?>
                                </label><br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal" id="usuario_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="modal-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal-header" class="modal-header">
                <h5 id="modal-title" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body" class="modal-body">

            </div>
            <!--<div id="modal-footer" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->
        </div>
    </div>
</div>

<div class="modal" id="grado-academico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="grado-academico-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="grado-academico-header" class="modal-header">
                <h5 id="grado-academico-title" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="grado-academico-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<div class="modal" id="seleccionar-archivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="seleccionar-archivo-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="seleccionar-archivo-header" class="modal-header">
                <h5 id="seleccionar-archivo-title" class="modal-title"></h5>
                <button id="seleccionar-archivo-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="seleccionar-archivo-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>