<?= form_open('', array('id' => 'frm_tipo_horario')) ?>

<div class="form-group row">
  <label for="turno" class="col-md-3 col-form-label">Turno</label>
  <div class="col-md-9">
    <select name="turno" id="turno" class="custom-select">
      <?php if (isset($tipo_horario)) {
        foreach (array(
          ""   => "-- Seleccione un turno --",
          "MT" => "MEDIO TIEMPO",
          "TC" => "TIEMPO COMPLETO"
        ) as $key => $turno) {
      ?>
          <option value="<?= $key ?>" <?= $tipo_horario[0]['turno'] == $key ? "selected" : "" ?>> <?= $turno ?> </option>
      <?php
        }
      } else {
        foreach (array(
          ""   => "-- Seleccione un turno --",
          "MT" => "MEDIO TIEMPO",
          "TC" => "TIEMPO COMPLETO"
        ) as $key => $turno) {
          echo "<option value=" . $key . ">" . $turno . "</option>";
        }
      }
      ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="tipo_marcado" class="col-md-3 col-form-label">Marcado: </label>
  <div class="col-lg-9">
    <select name="tipo_marcado" id="tipo_marcado" class="custom-select">
      <?php if (isset($tipo_horario)) {
        foreach (array(
          ''               => '-- Seleccione tipo de marcado --',
          'ADMINISTRATIVO' => 'ADMINISTRATIVO',
          'BECA'           => 'BECA',
          'PASANTE'        => 'PASANTE'
        ) as $key => $tipo_marcado) {
      ?>
          <option value="<?= $key ?>" <?= $tipo_horario[0]['tipo_marcado'] == $key ? "selected" : "" ?>> <?= $tipo_marcado ?> </option>
      <?php
        }
      } else {
        foreach (array(
          ''               => '-- Seleccione tipo de marcado --',
          'ADMINISTRATIVO' => 'ADMINISTRATIVO',
          'BECA'           => 'BECA',
          'PASANTE'        => 'PASANTE'
        ) as $key => $tipo_marcado) {
          echo "<option value=" . $key . ">" . $tipo_marcado . "</option>";
        }
      }
      ?>
    </select>
    <input type="hidden" name="id_tipo_horario" id="id_tipo_horario" value="<?= isset($tipo_horario) ? $tipo_horario[0]['id_tipo_horario'] : "" ?>">
  </div>
</div>

<div class="form-group row">
  <label for="hora_inicio" class="col-md-3 col-form-label">Entrada: </label>
  <div class="input-group clockpicker col-md-9" data-placement="bottom" data-align="top" data-autoclose="true">
    <input type="text" class="form-control" id="hora_inicio" name="hora_inicio" value="<?= isset($tipo_horario) ? $tipo_horario[0]['hora_inicio'] : "" ?>">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
    </div>
  </div>
</div>

<div class="form-group row">
  <label for="hora_fin" class="col-md-3 col-form-label">Salida: </label>
  <div class="input-group clockpicker col-md-9" data-placement="bottom" data-align="top" data-autoclose="true">
    <input type="text" class="form-control" id="hora_fin" name="hora_fin" value="<?= isset($tipo_horario) ? $tipo_horario[0]['hora_fin'] : "" ?>">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
    </div>
  </div>
</div>

<div class="form-group row">
  <label for="carga_horaria" class="col-md-3 col-form-label">Carga horaria: </label>
  <div class="col-md-9">
    <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" value="<?= isset($tipo_horario) ? $tipo_horario[0]['carga_horaria'] : "" ?>">
  </div>
</div>

<div class="form-group m-t-40 row">
  <div class="col-md-12 text-right">
    <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
    <button type="submit" id="btn-guardar-horario" class="btn btn-primary"> <?= isset($tipo_horario) ? 'Actualizar' : 'Guardar' ?> </button>
  </div>
</div>
</form>