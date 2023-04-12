<div class="row page-titles">
  <div class="col-md-12 align-self-center">
    <h3 class="font-weight-bold text-center text-themecolor">TARJETA DE ASISTENCIA</h3>
  </div>

  <div class="container-fluid">
    <div class="row">
      <!-- Column -->
      <div class="col-md-3">&nbsp;</div>
      <div class="col-md-6 col-xs-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="d-flex flex-wrap">
                </div>
              </div>
              <div class="col-12">
                <div id="earning" style="height: 355px;">

                  <form class="form-horizontal p-t-20" id="form_tarjeta_asistencia">
                    <div class="form-group row">
                      <label for="cargo" class="col-sm-3 control-label">Cargo:</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <select name="cargo" id="cargo" class="form-control" required>
                            <option value="">-- Seleccione su cargo --</option>
                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                            <option value="BECA">BECA</option>
                            <option value="PASANTE">PASANTE</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ci" class="col-sm-3 control-label">C.I.:</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <input type="number" class="form-control" id="ci" name="ci">
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                              C.I.
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row m-b-0">
                      <div class="offset-sm-3 col-sm-9 ">
                        <button type="submit" class="btn btn-info waves-effect waves-light"> <i class="fa fa-print"></i> Imprimir</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para imprimir la tarjeta de asistencia -->
<div class="modal" data-backdrop="static" data-keyboard="false" id="imprimir_tarjeta_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg rounded" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">TARJETA DE ASISTENCIA</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div style="height: 500px" class="modal-body">
        <iframe id="tarjeta_pdf" width="100%" height="100%" src=""></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary cerrar" data-dismiss="modal" aria-label="Close">Cerrar</button>
      </div>
    </div>

  </div>
</div>