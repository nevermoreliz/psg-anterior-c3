<div class="row page-titles">
  <div class="col-md-12 align-self-center">
    <h3 class="font-weight-bold text-center text-themecolor">PERMISO</h3>
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
                <div id="earning" style="height: 500px;">

                  <form id="form_permiso">

                    <div class="form-group row">
                      <label for="fecha" class="col-lg-12 col-form-label">Fecha: </label>
                      <div class="input-group col-lg-7 p-t-10">
                        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="yyyy-mm-dd">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="icon-calender"></i></span>
                        </div>
                      </div>

                      <div class="col-lg-5 col-sm-12 p-t-10">
                        <select class="custom-select" id="tipo_marcado" name="tipo_marcado">
                          <option value="">-- Tipo marcado --</option>
                          <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                          <option value="BECA">BECA</option>
                          <option value="PASANTE">PASANTE</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="motivo" class="col-lg-12 col-form-label">Motivo: </label>
                      <div class="input-group col-lg-12">
                        <textarea name="motivo" id="motivo" rows="2" class="form-control" placeholder="por motivo de viaje, estudio,familiar,salud. etc..."></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="codigo_archivo_personal" class="col-lg-12 control-label">Código usuario:</label>
                      <div class="col-lg-12">
                        <div class="input-group">
                          <input id="codigo_archivo_personal" name="codigo_archivo_personal" type="text" class="form-control text-center text-uppercase" autofocus autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" />
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                              <i class="fa fa-key"></i>
                            </span>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="form-group row m-b-0">

                      <div class="col-sm-12 col-lg-6 p-t-10">
                        <button type="submit" class="btn btn-info waves-effect waves-light btn-block">
                          <i class="fa fa-print"></i>
                          Solicitud permiso
                        </button>
                      </div>

                      <div class="col-sm-12 col-lg-6 p-t-10">
                        <button type="button" class="btn btn-warning waves-effect waves-light pull-right btn-block btn-cancalar-permiso">
                          <i class="fa fa-times"></i>
                          Cancelar permiso
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

<!-- GENERAR PERMISO MODAL -->
<div class="modal" data-backdrop="static" data-keyboard="false" id="imprimir_permiso_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">SOLICITUD DE PERMISO</h5>
        <button type="button" class="close text-white btn-cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div style="height: 500px; width: 100%;" class="modal-body">
        <iframe id="reporte_permiso" width="100%" height="100%" src=""></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-confirmar-permiso" data-id="" data-date="" data-dismiss="modal">
          <i class="fa fa-check"></i>
          Confirmar
        </button>
        <button type="button" class="btn btn-default btn-cerrar" data-dismiss="modal" aria-label="Close">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>