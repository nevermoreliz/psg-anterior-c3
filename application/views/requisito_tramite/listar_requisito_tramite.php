<div class="col-12">
    <div class="card">
        <!-- .left-right-aside-column-->
        <div class="contact-page-aside">
            <!-- .left-aside-column-->
            <div class="left-aside bg-light-part">
                <ul class="list-style-none">
                    <li class="box-label"><button id="nuevo_tramite" type="button" class="btn btn-rounded btn-block btn-info btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Nuevo Tramite</button></li>
                    <!-- <hr> -->
                    <!-- <li class="box-label"><button type="button" class="btn btn-rounded btn-block btn-info btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Nuevo Requisito</button></li> -->
                    <hr>
                    <li class="box-label"><a href="javascript:void(0)">Tramites </a></li>
                    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="position-relative mt-2" style="height: 300px; overflow: auto;">
                        <div id="tramites">
                            <?php echo $listar_tramite ?>
                        </div>
                    </div>

                </ul>
            </div>
            <!-- /.left-aside-column-->
            <div class="right-aside ">
                <div class="table-responsive m-t-0">
                    <table id="requisito_tramite" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>#</td>
                                <th></th>
                                <th>Tipo requisito</th>
                                <th>Requisito</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>#</td>
                                <th></th>
                                <th>Tipo requisito</th>
                                <th>Requisito</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- .left-aside-column-->
            </div>
            <!-- /.left-right-aside-column-->
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
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>