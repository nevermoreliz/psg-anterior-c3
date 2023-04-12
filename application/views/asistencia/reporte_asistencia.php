<div class="row page-titles">
  <div class="col-md-12 align-self-center">
    <h3 class="font-weight-bold text-center text-themecolor">REPORTE DE ASISTENCIA</h3>
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
                  <div class="ml-auto">
                    <button type="button" class="btn btn-default pull-right" id="reportrange">
                      <span>
                        <i class="fa fa-calendar"></i>
                        &nbsp; Fecha&nbsp;
                      </span>

                      <i class="fa fa-caret-down"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-12 p-t-10">
                <div id="earning" style="height: 355px;">

                  <form class="form-horizontal p-t-20" id="form_reporte_asistencia">
                    <div class="form-group row">
                      <label for="codigo_archivo_personal" class="col-sm-12 control-label">Código usuario:</label>
                      <div class="col-sm-9 p-t-10">
                        <div class="input-group">
                          <input id="codigo_archivo_personal" name="codigo_archivo_personal" type="text" class="form-control text-center text-uppercase" autofocus autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" />
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                              <i class="fa fa-key"></i>
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-3 p-t-10">
                        <select class="custom-select" id="tipo_marcado" name="tipo_marcado">
                          <option value="">&nbsp;</option>
                          <option value="BECA">BECA</option>
                          <option value="PASANTE">PASANTE</option>
                        </select>

                      </div>
                    </div>
                    <div class="form-group row m-b-0">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-info waves-effect waves-light">
                          <i class="fa fa-print"></i>
                          Imprimir
                        </button>
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

<!-- GENERAR REPORTE MODAL -->
<div class="modal" data-backdrop="static" data-keyboard="false" id="imprimir_reporte_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">REPORTE DE ASISTENCIA</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div style="height: 500px; width: 100%;" class="modal-body">
        <iframe id="reporte_pdf" width="100%" height="100%" src=""></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary cerrar" data-dismiss="modal" aria-label="Close">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>