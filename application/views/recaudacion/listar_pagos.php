<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h3 class="text-themecolor">Registro de Comprobantes de Pago</h3>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    	<button type="button" class="btn btn-success btn-sm" id="nuevo_pago">Nuevo Registro de Pago</button>
    </div></div>
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-md-2">
                        <label for="nombre_grupo">Buscar Posgraduante o Programa</label>
                        <input type="text" id="buscar" name="buscar" class="form-control" />
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="busqueda" name="busqueda"><i class="fa fa-search"></i><br/>BUSCAR</button>
                    </div>
                </div>
                <div class="table-responsive m-t-0">
                    <table id="tbl_listar_pagos" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>CI</th>
                                <th>Nombre Completo</th>
                                <th>Programa</th>
                                <th>Comprobante</th>
                                <th>Fecha Depósito</th>
                                <th>Tipo</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th> .::Acciones::.</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>CI</th>
                                <th>Nombre Completo</th>
                                <th>Programa</th>
                                <th>Comprobante</th>
                                <th>Fecha Depósito</th>
                                <th>Tipo</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th> .::Acciones::.</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal-header" class="modal-header bg-color-psg">
                <h5 id="modal-title" class="modal-title font-weight-bold text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body" class="modal-body">
            </div>
        </div>
    </div>
</div>
