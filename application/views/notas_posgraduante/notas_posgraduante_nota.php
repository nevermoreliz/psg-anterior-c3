<br>
<h4 class="card-title titulo_modal_posgraduante"><span class="font-weight-bold">Modulo : </span> <?php echo $datos_planificacion_asignacion_modulo_programa->nombre_modulo_programa ?></h4>
<h4 class="card-title titulo_modal_posgraduante"><span class="font-weight-bold">Nro :</span> <?php echo $datos_planificacion_asignacion_modulo_programa->numero_modulo ?></h4>
<h4 class="card-title titulo_modal_posgraduante"><span class="font-weight-bold">Paralelo : </span> <?php echo $datos_planificacion_asignacion_modulo_programa->paralelo ?></h4>
<h4 class="card-title titulo_modal_posgraduante"><span class="font-weight-bold">Docente :</span> <?php echo $datos_persona_docente->paterno . ' ' . $datos_persona_docente->materno . ' ' . $datos_persona_docente->nombre . ' - ' . $datos_persona_docente->ci . ' ' . $datos_persona_docente->expedido ?></h4>
<?php
$fecha_inicio_nota = $datos_planificacion_asignacion_modulo_programa->fecha_inicio_nota;
$fecha_fin_nota = $datos_planificacion_asignacion_modulo_programa->fecha_fin_nota;
$fecha_inicio_rezadado = $datos_planificacion_asignacion_modulo_programa->fecha_inicio_rezadado;
$fecha_fin_rezadado = $datos_planificacion_asignacion_modulo_programa->fecha_fin_rezadado;
$cerrar_input = '';
if (es(['DOCENTE_POSGRADO'])) {
  if (!($fecha_inicio_nota <= date('Y-m-d') && $fecha_fin_nota >= date('Y-m-d'))) {
    $cerrar_input = 'disabled="disabled"';
  } elseif ($fecha_inicio_nota == '' || $fecha_fin_nota == '') {
    $cerrar_input = 'disabled="disabled"';
  }
}
$mensaje_fecha = 'Adicionar nota se habilitara en fecha: ' . $fecha_inicio_nota;
$mensaje_color = "warning";
if ($fecha_inicio_nota <= date('Y-m-d') && $fecha_fin_nota >= date('Y-m-d')) {
  $mensaje_fecha = 'Adicionar nota finalizará en fecha: <strong>' . $fecha_fin_nota . '</strong>';
  $mensaje_color = "success";
} elseif ($fecha_inicio_rezadado <= date('Y-m-d') && $fecha_fin_rezadado >= date('Y-m-d')) {
  $mensaje_fecha = '<strong>Rezagado</strong><br> Adicionar nota finalizará en fecha: <strong>' . $fecha_fin_rezadado . '</strong>';
  $mensaje_color = "success";
  $cerrar_input = '';
} elseif (date('Y-m-d') > $fecha_fin_nota && date('Y-m-d') > $fecha_inicio_nota) {
  $mensaje_fecha = 'Adicionar nota finalizó en fecha: ' . $fecha_fin_nota;
  $mensaje_color = "error";
  if($fecha_inicio_nota == '' || $fecha_fin_nota == '')
  {
    $mensaje_fecha = 'Sin fecha para adicionar nota.';
    $mensaje_color = "warning";
  }
}
?>

<div class="card">
  <div class="card-body">
    <div class="jq-toast-single jq-has-icon jq-icon-<?php echo  $mensaje_color ?> div_modulo">
      <h2 class="jq-toast-heading"><?php echo  $mensaje_fecha ?></h2>
    </div>
    <input type="hidden" id="id_asignacion_modulo_programa" name="id_asignacion_modulo_programa" value="<?php echo $datos_planificacion_asignacion_modulo_programa->id_asignacion_modulo_programa ?>">


    <div class="table-responsive m-t-40">
      <table id="notas_posgraduante_nota" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nro</th>
            <th>Nro Folio</th>
            <th>CI</th>
            <th>R.U.</th>
            <th>Nombres</th>
            <th>Final Modulo</th>
            <th>Final Modulo</th>
            <th>Observación</th>
            <th>Inscripción</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($lista_posgraduante)) {
            $x = 1;
            foreach ($lista_posgraduante as $lista_posgraduante_fila) {
              $nota_final_modulo = $lista_posgraduante_fila->nota_final_modulo;
          ?>
              <tr>
                <td><?php echo $x++ ?></td>
                <td><?php echo $lista_posgraduante_fila->nro_folio ?></td>
                <td><?php echo $lista_posgraduante_fila->ci . ' ' . $lista_posgraduante_fila->expedido ?></td>
                <td><?php echo $lista_posgraduante_fila->registro_universitario ?></td>
                <td><?php echo $lista_posgraduante_fila->paterno . ' ' . $lista_posgraduante_fila->materno . ' ' . $lista_posgraduante_fila->nombre ?></td>
                <td>
                  <div id="<?php echo 'progres_' . $lista_posgraduante_fila->id_persona ?>">
                    <?php
                    if (empty($nota_final_modulo) || $nota_final_modulo <= 33) {
                      $color = 'danger';
                    } elseif ($nota_final_modulo >= 34 && $nota_final_modulo <= 66) {
                      $color = 'warning';
                    } else {
                      $color = 'success';
                    }
                    ?>
                    <div class="progress m-t-10">
                      <div class="progress-bar bg-<?php echo  $color ?>" style="width: <?php echo $nota_final_modulo ?>%; height:15px;" role="progressbar"><?php echo $nota_final_modulo ?>%</div>
                    </div>

                  </div>
                </td>
                <td>
                  <?php
                  echo '<input type="number" class="form-control" autocomplete="off" id="nota_final_modulo" name="nota_final_modulo" data-id_persona_posgraduante="' . $lista_posgraduante_fila->id_persona . '" value="' . $nota_final_modulo . '" ' . $cerrar_input . '/>';
                  ?>
                </td>
                <td>
                  <?php
                  echo '<input type="text" class="form-control" autocomplete="off" id="observacion_inscripcion" name="observacion_inscripcion" data-id_persona_posgraduante="' . $lista_posgraduante_fila->id_persona . '" value="' . $lista_posgraduante_fila->observacion_inscripcion . '" ' . $cerrar_input . '/>';
                  ?>
                </td>
                <td><?php echo $lista_posgraduante_fila->fecha_inscripcion ?></td>
                <td><?php echo $lista_posgraduante_fila->estado_inscripcion_modulo ?></td>
              </tr>
          <?php
            }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
if (!empty($registro_no_corresponde)) { ?>
  <div class="card">
    <div class="card-body">
      <h1 class="text-danger">Los Posgraduantes que intenta migrar no estan matriculados, por tanto no se puede subir al servidor...</h1>
      <div class="table-responsive m-t-40">
        <table id="posgraduantes_no_matriculados" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nro</th>
              <th>CI</th>
              <th>Nombres</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $y = 1;
            foreach ($registro_no_corresponde as $registro_no_corresponde_fila) {
            ?>
              <tr>
                <td><?php echo $y++ ?></td>
                <td><?php echo $registro_no_corresponde_fila->ci . ' ' . $registro_no_corresponde_fila->expedido ?></td>
                <td><?php echo $registro_no_corresponde_fila->paterno . ' ' . $registro_no_corresponde_fila->materno . ' ' . $registro_no_corresponde_fila->nombre ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('#posgraduantes_no_matriculados').DataTable({
      lengthMenu: [
        [10, 20, 30, 50, 100, -1],
        [10, 20, 30, 50, 100, 'Todo']
      ],
      iDisplayLength: -1,
      /* paging: false*/
    });
  </script>
<?php } ?>