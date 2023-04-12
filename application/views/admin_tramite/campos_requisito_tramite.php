<link href="<?php echo base_url('assets/plugins/dropzone-master/dist/dropzone.css'); ?>" rel="stylesheet" />
<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h3 class="text-themecolor">Listado de solicitudes del tramite <b>"<?= isset($requisitos_tramite[0]['nombre_tramite']) ? $requisitos_tramite[0]['nombre_tramite'] : '' ?>"</b> </h3>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div id="campos_requisitos" style="display: none;">
                <?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_campos_tramite', 'enctype' => 'multipart/form-data']); ?>
                <?php if ($this->input->cookie('id_persona')) : ?>
                    <input type="hidden" id="id_persona" value="<?= $this->input->cookie('id_persona') ?>">
                <?php endif; ?>
                <?php if (isset($requisitos_tramite)) : ?>
                    <input type="hidden" id="id_tramite" name="id_tramite" value="<?= $id_tramite ?>">
                <?php endif; ?>
                <div class="row small">
                    <div class="col-md-12">
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" name="referencia_solicitud" id="referencia_solicitud" value="<?= isset($requisitos_tramite[0]['nombre_tramite']) ? $requisitos_tramite[0]['nombre_tramite'] : '' ?>">
                            <span class="bar"></span>
                            <label for="referencia_solicitud">Referencia de la Solicitud</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group m-b-0">
                            <textarea class="form-control" name="descripcion_solicitud" id="descripcion_solicitud"></textarea>
                            <span class="bar"></span>
                            <label for="descripcion_solicitud">Descripcion de la Solicitud</label>
                        </div>
                    </div>
                </div>

                <?php foreach ($requisitos_tramite as $key => $value) : ?>
                    <div class="row" id="requisitos">
                        <div class="col-xl-9 col-md-12">
                            <p class="text-justify text-danger"> <span class="text-dark font-weight-bold"><?= $key + 1 ?>.</span> <?= $value['descripcion_requisito'] ?></p>
                            <input id="<?= $value['id_requisito'] ?>" type="hidden" name="<?= $value['id_requisito'] ?>" <?= $value['tipo_requisito'] == 'OBLIGATORIO' ? 'data-value="true"' : 'data-value="false"' ?>>
                            <div id="respaldos_digitales_<?= $value['id_requisito'] ?>" class="contenedor_respaldos"></div>
                        </div>
                        <div class="col-xl-3 col-md-12">
                            <?php if ($value['tipo_requisito'] == 'OBLIGATORIO') : ?>
                                <span class="badge badge-pill badge-danger">Requisito Obligatorio</span>
                            <?php else : ?>
                                <span class="badge badge-pill badge-warning">Requisito Opcional</span>
                                <input type="checkbox" id="md_checkbox_<?= $value['id_requisito'] ?>" class="chk-col-red">
                                <label for="md_checkbox_<?= $value['id_requisito'] ?>">No dispongo del Requisito</label>
                            <?php endif ?>
                            <br>

                            <?php if ($value['respaldo_digital'] == 't') : ?>
                                <div class="row add-new-photo dz-clickable adjuntar_archivo" data-value="<?= $value['id_requisito'] ?>" data-etiqueta="<?= $value['etiqueta'] ?>">
                                    <i class="icon-picture"></i>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <br>
                    <hr>
                <?php endforeach ?>
                <br>

                <div class="d-flex flex-row-reverse form-actions">

                    <div class="col-md-2">
                        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" id="cancelar_solicitud">Cancelar</button>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-rounded btn-block btn-info btn-sm" id="insertar_solicitud"><i class="mdi mdi-plus-circle"></i> Solicitar Tramite</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>

            <?php if (empty($tiene_solicitudes)) : ?>
                <div class="d-flex flex-row-reverse form-actions">
                    <div class="col-xl-2 col-md-12">
                        <button type="button" class="btn btn-rounded btn-block btn-info btn-sm" id="campos_solicitud"><i class="mdi mdi-plus-circle"></i> Iniciar Nuevo Tramite</button>
                    </div>
                </div>
            <?php else : ?>
                <div class="alert alert-info">
                    <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Su Trámite solicitado esta en proceso de Revisión</h3>
                    Usted ya ha solicitado un trámite de este tipo, espere a que concluya para solicitar otro si lo desea.
                </div>
                <!-- <p class="text-justify text-danger"><i class="fa fa-question-circle"></i> Podra solicitar nuevamente este tramite en cuanto el anterior haya concluido.</p> -->
            <?php endif ?>
            <h5>Historial de <b>"<?= isset($requisitos_tramite[0]['nombre_tramite']) ? $requisitos_tramite[0]['nombre_tramite'] : '' ?>"</b> </h5>
            <div class="table-responsive m-t-0">
                <table id="tbl_listar_programas" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nº de Solicitud</th>
                            <th>Fecha de Solicitud</th>
                            <th>Fecha de Recepción</th>
                            <th>Fecha de Entrega</th>
                            <th>Referencia</th>
                            <th>Tipo Tramite</th>
                            <th>Estado</th>
                            <th>Gestión</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nº de Solicitud</th>
                            <th>Fecha de Solicitud</th>
                            <th>Fecha de Recepción</th>
                            <th>Fecha de Entrega</th>
                            <th>Referencia</th>
                            <th>Tipo Tramite</th>
                            <th>Estado</th>
                            <th>Gestión</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/plugins/dropzone-master/dist/dropzone.js'); ?>"></script>
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