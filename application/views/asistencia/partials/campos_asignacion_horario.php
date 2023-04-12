<?= form_open('', array('id' => 'frm_asignacion_horario')) ?>

<div class="form-group row">
  <label for="turno" class="col-md-3 col-form-label">Horarios:</label>
  <div class="col-md-12">
    <select name="id_tipo_horario" id="id_tipo_horario" class="custom-select">
      <?php
      echo "<option value=''>-- Seleccione horario --</option>";
      if (isset($asignacion_horario)) {
        for ($i = 0; $i < count($horarios); $i++) {
      ?>

          <option value="<?= $horarios[$i]["id_tipo_horario"] ?>" <?= $asignacion_horario[0]['id_tipo_horario'] == $horarios[$i]['id_tipo_horario'] ? "selected" : "" ?>>
            <?= ($horarios[$i]["turno"] == "MT" ? 'MEDIO TIEMPO' : 'TIEMPO COMPLETO') . " -- " . $horarios[$i]["tipo_marcado"] . " -- " . $horarios[$i]["hora_inicio"] . " -- " . $horarios[$i]["hora_fin"] ?>
          </option>

      <?php
        }
      } else {

        for ($i = 0; $i < count($horarios); $i++) {
          echo "<option value=" . $horarios[$i]["id_tipo_horario"] . ">" . ($horarios[$i]["turno"] == "MT" ? 'MEDIO TIEMPO' : 'TIEMPO COMPLETO') . " -- " . $horarios[$i]["tipo_marcado"] . " -- " . $horarios[$i]["hora_inicio"] . " -- " . $horarios[$i]["hora_fin"] . "</option>";
        }
      }
      ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="turno" class="col-md-3 col-form-label">Usuario:</label>
  <div class="col-md-12">
    <select name="id_cargo_unidad" id="id_cargo_unidad" class="custom-select">
      <?php
      echo "<option value=''>-- Seleccione usuario --</option>";
      if (isset($asignacion_horario)) {

        for ($i = 0; $i < count($usuarios); $i++) { ?>
          <option value="<?= $usuarios[$i]["id_cargo_unidad"] ?>" <?= $asignacion_horario[0]['id_cargo_unidad'] == $usuarios[$i]['id_cargo_unidad'] ? "selected" : "" ?>>
            <?= $usuarios[$i]["nombre"] . " " . $usuarios[$i]["paterno"] . " " . $usuarios[$i]["materno"] . " -- " . $usuarios[$i]["ci"] . " " . $usuarios[$i]["expedido"] ?>
          </option>
      <?php
        }
      } else {

        for ($i = 0; $i < count($usuarios); $i++) {
          echo "<option value=" . $usuarios[$i]["id_cargo_unidad"] . ">" . $usuarios[$i]["nombre"] . " " . $usuarios[$i]["paterno"] . " " . $usuarios[$i]["materno"] . " -- " . $usuarios[$i]["ci"] . " " . $usuarios[$i]["expedido"] . "</option>";
        }
      }
      ?>
    </select>
    <input type="hidden" id="id_asignacion_horario" name="id_asignacion_horario" value="<?= isset($asignacion_horario) ? $asignacion_horario[0]['id_asignacion_horario'] : "" ?>">
  </div>
</div>

<div class="form-group m-t-40 row">
  <div class="col-md-12 text-right">
    <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
    <button type="submit" id="btn-guardar-horario" class="btn btn-primary">
      <?= isset($asignacion_horario) ? "Actualizar" : "Guardar" ?>
    </button>
  </div>
</div>
</form>