<div class="row page-titles">
  <div class="col-md-12 align-self-center">
    <h3 class="font-weight-bold text-center text-themecolor">D&Iacute;AS FESTIVOS</h3>
  </div>

  <div class="container-fluid">
    <div class="row">
      <!-- Column -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="d-flex flex-wrap">
                  <div>
                    <h6 class="card-title">
                      <a class="btn waves-effect waves-light btn-primary text-white" id="btn_agregar_dia_festivo">
                        <i class="fa fa-plus-square"></i>
                        Agregar
                      </a>
                    </h6>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div id="earning">
                  <div class="table-responsive">
                    <table id="tabla_listar_dias_festivos" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>fecha</th>
                          <th>descripci&oacute;n</th>
                          <th>estado</th>
                          <th>acciones</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal agregar o editar dia festivo -->
<div class="modal" id="dias-festivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div id="modal-dialog" class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="dias-festivos-header" class="modal-header bg-warning">
        <h5 id="dias-festivos-title" class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="dias-festivos-body" class="modal-body">

      </div>
    </div>
  </div>
</div>