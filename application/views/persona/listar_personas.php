<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h3 class="text-themecolor">Personal</h3>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">Exporte los datos, Copiar, CSV, Excel, PDF & Imprimir</h6>
                <div class="table-responsive m-t-0">
                    <table id="tabla_listar_personas" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Acción</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>CI, DNI</th>
                                <th>Email</th>
                                <th>Celular</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Acción</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>CI, DNI</th>
                                <th>Email</th>
                                <th>Celular</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
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

<div class="modal" id="reporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="reporte-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="reporte-header" class="modal-header bg-color-psg">
                <h5 id="reporte-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <div id="reporte-body" class="modal-body">
                <object type="application/pdf" id="representar_reporte" style="width: 100%; height: 400px;"></object>
            </div> -->
            <!--<div id="reporte-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
            <embed type="application/pdf" id="representar_reporte" width="100%" height="1000px" style="border: none;" />
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


<div class="modal" id="grado-academico1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="grado-academico1-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="grado-academico1-header" class="modal-header bg-color-psg">
                <h5 id="grado-academico1-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="grado-academico1-body" class="modal-body">
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
            <div id="seleccionar-archivo-header" class="modal-header bg-color-psg">
                <h5 id="seleccionar-archivo-title" class="modal-title text-white"></h5>
                <button id="seleccionar-archivo-close" type="button btn-warning" class="close" data-dismiss="modal" aria-label="Close">
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