<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Planificación Programa</h3>
    </div>
    <div class="">
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">Exporte los datos, presionando <button type="button" id="imprimir_programas" class="btn btn-warning btn-sm btn-rounded"><i class="fa fa-print"></i> Imprimir <b>(Alt + p)</b></button></h6>
                <div id="page-content" class="row">
                    <div class="col-md-1">
                        <label class="font-weight-bold" for="id_gestion_cmb">Gesti&oacute;n</label>
                        <select id="id_gestion_cmb" class="form-control form-control-sm">
                            <option value="">Todos</option>
                            <?php foreach ($gestiones as $key => $gestion) : ?>
                                <option value="<?= $gestion['id_gestion'] ?>"><?= $gestion['gestion'] ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="font-weight-bold" for="id_grado_academico_cmb">Grado</label>
                        <select id="id_grado_academico_cmb" class="form-control form-control-sm">
                            <option value="">Todos</option>
                            <?php foreach ($grados_academicos as $key => $value) : ?>
                                <option value="<?= $value['id_grado_academico'] ?>"><?= $value['descripcion_grado_academico'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="font-weight-bold" for="id_tipo_programa_cmb">Modalidad</label>
                        <select id="id_tipo_programa_cmb" class="form-control form-control-sm">
                            <option value="">Todos</option>
                            <<?php foreach ($tipos_programas as $key => $value) : ?> <option value="<?= $value['id_tipo_programa'] ?>"><?= $value['nombre_tipo_programa'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label class="font-weight-bold" for="version_cmb">Versi&oacute;n</label>
                        <select id="version_cmb" class="form-control form-control-sm">
                            <option value="">Sin Version</option>

                            <?php foreach ($versiones as $key => $value) : ?>
                                <option value="<?= $value->numero_version ?>"><?= $value->numero_version  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if (es(['SUPERADMIN', 'TECNICO_CEFORPI'])) : ?>
                        <div class="col-md-4">
                            <label class="font-weight-bold" for="buscar">Buscar</label>
                            <input type="text" id="buscar" class="form-control form-control-sm text-uppercase" />
                        </div>
                    <?php else : ?>
                        <div class="col-md-6">
                            <label class="font-weight-bold" for="buscar">Buscar</label>
                            <input type="text" id="buscar" class="form-control form-control-sm text-uppercase" />
                        </div>
                    <?php endif; ?>

                    <?php if (es(['SUPERADMIN', 'TECNICO_CEFORPI'])) : ?>
                        <div class="col-md-2">
                            <div class="form-group mb-2 col-sm-12">
                                <label class="font-weight-bold" for="agregar">Agregar</label>
                                <button id="agregar_programa" class="btn btn-rounded btn-block btn-info btn-sm"><i class="mdi mdi-plus-circle"></i> Nuevo Programa</button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="table-responsive m-t-0">
                    <table id="tbl_listar_programas" class="table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Acci&oacute;n</th>
                                <th>Gestión</th>
                                <th>Grado Modalidad</th>
                                <th>Programa</th>
                                <th>Versión</th>
                                <th>Unidad Sede</th>
                                <th>Fechas</th>
                                <th>Carga Horaria Total</th>
                                <th>Nro Mod.</th>
                                <th>Nro Mat.</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Acci&oacute;n</th>
                                <th>Gestión</th>
                                <th>Grado Modalidad</th>
                                <th>Programa</th>
                                <th>Versión</th>
                                <th>Unidad Sede</th>
                                <th>Fechas</th>
                                <th>Carga Horaria Total</th>
                                <th>Nro Mod.</th>
                                <th>Nro Mat.</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
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
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>

<div class="modal" id="modulo-programa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modulo-programa-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modulo-programa-header" class="modal-header">
                <h5 id="modulo-programa-title" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modulo-programa-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>