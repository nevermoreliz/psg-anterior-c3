<div class="row page-titles">
  <div class="col-md-12 align-self-center">
    <h3 class="font-weight-bold text-center text-themecolor"></h3>
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

                    <a href="<?php echo base_url(); ?>">
                      <img class="mx-auto d-block" style="height: 40px;" src="<?php echo base_url('assets/images/logotipo.png'); ?>" alt="POSGRADO UPEA" />
                    </a>
                    <p class="text-center">
                      Centro de Estudios y Formaci&oacute;n de Posgrado e Investigaci&oacute;n de la
                      Universidad P&uacute;blica de El Alto
                    </p>
                    <h1 class="h5 text-center">CONTROL DE ASISTENCIA</h1>
                  </div>
                </div>
              </div>
              <div class="col-12 p-t-10">
                <div id="earning" style="height: 280px;">

                  <form id="form_asistencia_marcado">

                    <div class="form-group row">
                      <label for="codigo_archivo_personal" class="col-md-12 col-form-label">Código de usuario:</label>
                      <div class="col-lg-9 p-t-10">
                        <input id="codigo_archivo_personal" name="codigo_archivo_personal" type="text" class="form-control text-center text-uppercase" autocomplete="off" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                      </div>

                      <div class="col-lg-3 p-t-10">
                        <select class="custom-select" id="tipo_marcado" name="tipo_marcado">
                          <option value="">&nbsp;</option>
                          <option value="BECA">BECA</option>
                          <option value="PASANTE">PASANTE</option>
                        </select>
                      </div>
                    </div>
                  </form>
                  <hr>
                  <div class="col-12 p-t-10 d-flex flex-row justify-content-center align-items-center">
                    <label class="label label-warning text-dark" id="ahora" style="font-size: 17px; padding: 7px 7px 7px 7px;" data-toggle="tooltip" data-placement="top" title="<?php echo fecha_literal(date('Y-m-d'), 1); ?>">
                      <i class="fa fa-clock-o"></i>
                      <?php echo date('H:i:s'); ?>
                    </label>
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