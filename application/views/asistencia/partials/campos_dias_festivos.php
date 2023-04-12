<?= form_open('', array('id' => 'frm_dias_festivos')) ?>

<div class="form-group row">
  <label for="fecha" class="col-md-3 col-form-label">Fecha: </label>
  <div class="input-group col-md-12">
    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="yyyy-mm-dd" value="<?= isset($dia_festivo) ? $dia_festivo[0]['fecha'] : "" ?>">
    <div class="input-group-append">
      <span class="input-group-text"><i class="icon-calender"></i></span>
    </div>
  </div>
</div>

<div class="form-group row">
  <label for="descripcion" class="col-md-3 col-form-label">Descripción: </label>
  <div class="col-md-12">
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese descripción del día festivo"><?= isset($dia_festivo) ? $dia_festivo[0]['descripcion'] : "" ?></textarea>
  </div>
  <input type="hidden" name="id_dias_festivos" id="id_dias_festivos" value="<?= isset($dia_festivo) ? $dia_festivo[0]['id_dias_festivos'] : "" ?>">
</div>

<div class="form-group m-t-40 row">
  <div class="col-md-12 text-right">
    <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
    <button type="submit" id="btn-guardar-dia-festivo" class="btn btn-primary"> <?= isset($dia_festivo) ? 'Actualizar' : 'Guardar' ?> </button>
  </div>
</div>
</form>