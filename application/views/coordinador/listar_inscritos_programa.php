<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div id="page-content" class="small">
                <div class="row">
                    <div class="col-lg-12">
                        <label class="m-t-0">Buscar</label>
                        <input type="text" id="texto" class="form-control form-control-sm text-uppercase" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <label class="m-t-0">Gestión</label>
                        <?php echo select_combo($gestion, 'gestion') ?>
                    </div>
                    <div class="col-lg-4">
                        <label class="m-t-0">Grado</label>
                        <?php echo select_combo($grado_academico, 'grado_academico') ?>
                    </div>
                    <div class="col-lg-2">
                        <label class="m-t-0">Modalidad</label>
                        <?php echo select_combo($tipo_programa, 'tipo_programa') ?>
                    </div>
                    <div class="col-lg-2">
                        <label class="m-t-0">Versi&oacute;n</label>
                        <?php echo select_combo($version, 'version') ?>
                    </div>
                    <!-- agregado por jhonatan -->
                    <div class="col-lg-2">
                        <label class="m-t-0">Tipo Inscrito</label>
                        <?php echo select_combobox(
                            (array)[
                                // (object)['estado_inscripcion' => '-'],
                                (object)['estado_inscripcion' => 'CONFIRMADO'],
                                (object)['estado_inscripcion' => 'INSCRITO']
                            ],
                            [
                                'name' => 'estado_inscripcion',
                                'id' => 'estado_inscripcion',
                                'required' => '',
                                'id_value' => 'estado_inscripcion',
                                'value' => 'estado_inscripcion',
                                'id_select' => ''
                            ]
                        ); ?>
                    </div>
                    <div class="col-lg-2" style="display: none;">
                        <label class="m-t-0">Descargas</label>

                        <button type="button" class="btn btn-block btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-files"></i> REPORTES
                        </button>
                        <div class="dropdown-menu animated flipInY dropdown-menu-right">
                            <a href="javascript:void(0)" target="_blank"><button class="dropdown-item" type="button"><i class="fa fa-file-excel-o"></i> Descargar lista en <u>EXCEL</u></button></a>
                            <a href="javascript:void(0)" target="_blank"><button class="dropdown-item" type="button"><i class="fa fa-file-pdf-o"></i> Descargar Inscritos en <u>PDF</u></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row el-element-overlay" id="datos" data-id-planificacion-programa="<?= $id_planificacion_programa ?>"></div>
    <div id="datos_vacios"></div>
</div>

<div class="modal" id="historial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="historial-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="historial-header" class="modal-header bg-color-psg">
                <h5 id="historial-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="historial-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal-header" class="modal-header bg-color-psg">
                <h5 id="modal-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
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
<div class="modal" id="grado-academico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="grado-academico-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="grado-academico-header" class="modal-header bg-color-psg">
                <h5 id="grado-academico-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
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