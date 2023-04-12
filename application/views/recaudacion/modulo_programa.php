<?php if (isset($id_planificacion_programa)) : ?>
    <input name="id_planificacion_programa" type="hidden" value="<?= $id_planificacion_programa ?>">
<?php endif ?>
<div id="campos_modulo_programa"></div>
<div class="d-flex flex-row-reverse" id="contenedor_modulo">
    <div class="col-md-2">
        <button type="button" class="btn btn-rounded btn-block btn-info btn-sm" id="agregar_modulo"><i class="mdi mdi-plus-circle"></i> Nuevo Modulo</button>
    </div>
</div>
<div class="table-responsive m-t-0">
    <table id="tbl_modulo_programa" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <th></th>
                <th>Tipo Modulo</th>
                <th>Nombre Modulo</th>
                <th>Numero Modulo</th>
                <th>Horas Academicas</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <td>#</td>
                <th></th>
                <th>Tipo Modulo</th>
                <th>Nombre Modulo</th>
                <th>Numero Modulo</th>
                <th>Horas Academicas</th>
                <th>Estado</th>
            </tr>
        </tfoot>
    </table>
</div>