<div class="card">
  <div class="card-body">
    <div class="table-responsive m-t-40">
      <table id="myTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Módulo</th>
            <th>Paralelo -  Docente</th>
            <th>Nota</th>
            <th>Archivo</th>
            <th>Lista</th>
            <th>Acta</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($lista_modulo_programa)) {
            //$numero = 1;
            foreach ($lista_modulo_programa as $lista_modulo_programa_fila) {
              $datos_asignacion_modulo_programa = $lista_paralelo_modulo[$lista_modulo_programa_fila->id_modulo_programa];
              //$explode_nombre_modulo_programa = explode(' ', $lista_modulo_programa_fila->nombre_modulo_programa);
          ?>
              <tr>
                <td><?php echo $lista_modulo_programa_fila->nombre_modulo_programa ?></td>
                <td>
                  <!--select class="" style="width: 100%;" id="id_asignacion_modulo_programa_<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>"-->
                  <?php
                  if (!empty($datos_asignacion_modulo_programa)) {
                    foreach ($datos_asignacion_modulo_programa as $datos_asignacion_modulo_programa_fila) {
                  ?>
                      <div class="switch">
                        <label><?php echo $datos_asignacion_modulo_programa_fila->paralelo . ' ' . $datos_asignacion_modulo_programa_fila->turno ?>
                          <input type="checkbox" class="id_asignacion_modulo_programa_checbox" id="id_asignacion_modulo_programa_<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>" value="<?php echo $datos_asignacion_modulo_programa_fila->id_asignacion_modulo_programa ?>"><span class="lever"></span><?php echo 'Lic.: '.$datos_asignacion_modulo_programa_fila->paterno . ' ' . $datos_asignacion_modulo_programa_fila->materno . ' ' . $datos_asignacion_modulo_programa_fila->nombre ?></label>
                      </div>
                  <?php }
                  } ?>

                </td>
                <td><button type="button" class="btn-xs waves-effect waves-light btn-info" id="adicionar_nota" name="adicionar_nota" data-id_gestion_programa_modulo="<?php echo $id_gestion ?>" value="<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>"><i class="fa fa-pencil-square-o"></i> Adicionar Nota</button></td>
                <td>
                  <form id="form_archivo_excel_<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>" style="padding-right: 0px!important;padding-left: 0px!important;">
                    <input type="file" id="archivo_excel_<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>" name="archivo_excel" class="hide" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,text/comma-separated-values, text/csv, application/csv" />
                    <button type="button" class="btn-xs waves-effect waves-light btn-info col-lg-12" id="subir_nota_archivo" name="subir_nota_archivo" data-id_gestion_programa_modulo="<?php echo $id_gestion ?>" value="<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>"><i class="fa fa-cloud-upload"></i> Subir Archivo Excel</button>
                  </form>
                </td>
                <td><button type="button" class="btn-xs waves-effect waves-light btn-info" id="lista_posgraduante_excel" name="lista_posgraduante_excel" data-id_gestion_programa_modulo="<?php echo $id_gestion ?>" value="<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>"><i class="fa fa-file-excel-o"></i> Lista Posgraduante</button></td>
                <td><button type="button" class="btn-xs waves-effect waves-light btn-secondary col-lg-12" id="acta_calificacion" name="acta_calificacion" data-id_gestion_programa_modulo="<?php echo $id_gestion ?>" value="<?php echo $lista_modulo_programa_fila->id_modulo_programa ?>"><i class="fa fa-file-pdf-o"></i> Acta de Calificación</button></td>
              </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="contenido_notas_posgraduente_nota"></div>
<script>
  $('#myTable').DataTable();
  $("#titulo_modal_posgraduante").html('<?php echo '<strong>' . $datos_planificacion_programa->descripcion_grado_academico . ' ' . $datos_planificacion_programa->nombre_programa . '</strong><br> <strong> Version: </strong>' . $datos_planificacion_programa->numero_version . '<br> <strong>Modalidad: </strong>' . $datos_planificacion_programa->nombre_tipo_programa ?>');
</script>