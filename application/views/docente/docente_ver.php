<div class="container-fluid" id="contenido_pagina">
    <?php echo $html_programa_docente; ?>
    <div id="iniciar_datos"></div>
    <div id="iniciar_datos_message"></div>
</div>
<!-- Modal -->
<div class="modal bs-example-modal-lg" id="modal_docente" width="100%" height="1000px">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title titulo_modal_posgraduante">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;" id="titulo_modal_posgraduante"></font>
                    </font>
                </h4>
                <div class="button-group">
                    <button type="button" class="btn btn-warning btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-mail-reply-all"></i> </button>
                    <button type="button" class="btn btn-danger btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>
                </div>
            </div>

            <!--div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Cerca</font>
          </font>
        </button>
      </div-->
            <div class="modal-body" id="contenido_datos_docente">
            </div>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>