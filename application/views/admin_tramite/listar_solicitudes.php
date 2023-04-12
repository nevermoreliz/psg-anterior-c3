<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h3 class="text-themecolor">Listado de todas las solicitudes </h3>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive m-t-0">
                <table id="tbl_listar_solicitudes" class="display nowrap table table-hover table-striped table-bordered"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Acciones</th>
                            <th>Fechas</th>
                            <th>Fecha de Recepción</th>
                            <th>Fecha de Entrega</th>
                            <th>CI</th>
                            <th>Nombre Completo</th>
                            <th>Estado</th>
                            <th>Referencia</th>
                            <th>Tipo Tramite</th>
                            <th>Gestión</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nº</th>
                            <th>Acciones</th>
                            <th>Fechas</th>
                            <th>Fecha de Recepción</th>
                            <th>Fecha de Entrega</th>
                            <th>CI</th>
                            <th>Nombre Completo</th>
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
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="overflow-y: scroll;">
    <div id="modal-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal-header" class="modal-header">
                <h5 id="modal-title" class="modal-title"></h5>
                <button id="modal-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body" class="modal-body">
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>