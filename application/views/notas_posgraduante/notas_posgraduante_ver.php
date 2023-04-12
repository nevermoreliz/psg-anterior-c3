<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div id="contenido_pagina" class="row">
        <div class="col-md-12">
          <label class="m-t-0">Buscar</label>
          <input type="text" id="buscar_planificacion" name="buscar_planificacion" class="form-control form-control-sm text-uppercase" autocomplete="off"/>
        </div>
        <div class="col-md-2">
          <label class="m-t-30">Gestión</label>
          <?php echo select_combo($gestion, 'gestion') ?>
        </div>
        <div class="col-md-2">
          <label class="m-t-30">Vigentes</label>
          <div class="switch">
            <label> <input type="checkbox" id="vigentes" name="vigentes" Value="<?php echo date("Y-m-d") ?>"><span class="lever"></span></label>
          </div>
        </div>
        <div class="col-md-2">
          <label class="m-t-30">Grado</label>
          <?php echo select_combo($grado_academico, 'grado_academico') ?>
        </div>
        <div class="col-md-2">
          <label class="m-t-30">Modalidad</label>
          <?php echo select_combo($tipo_programa, 'tipo_programa') ?>
        </div>
        <div class="col-md-2">
          <label class="m-t-30">Versi&oacute;n</label>
          <?php echo select_combo($version, 'version') ?>
        </div>
        <div class="col-md-2">
          <label class="m-t-30">CI</label>
          <?php echo select_combobox((array)[(object)['ci_docente_posgraduante' => 'Posgraduante'], (object)['ci_docente_posgraduante' => 'Docente']], ['name' => 'ci_docente_posgraduante', 'id' => 'ci_docente_posgraduante', 'required' => '', 'id_value' => 'ci_docente_posgraduante', 'value' => 'ci_docente_posgraduante', 'id_select' => '']); ?>
        </div>
      </div>
    </div>
  </div>

  <div id="iniciar_datos"></div>
  <div id="iniciar_datos_message"></div>
</div>
<!-- Modal -->
<div class="modal bs-example-modal-lg" id="modal_notas_posgraduente_ver" width="100%" height="1000px">
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
      <div class="modal-body" id="contenido_notas_posgraduente_ver">
      </div>
    </div>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>