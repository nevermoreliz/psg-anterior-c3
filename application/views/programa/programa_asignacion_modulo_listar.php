<h6 class="card-subtitle"></h6>
<div class="table-responsive m-t-0">
    <table id="tbl_detalle_programa" class="table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Nombre Modulo</th>
                <th>Numero Modulo</th>
                <th>Horas Academicas</th>
                <th>Docente</th>
                <th>Numero Nombramiento</th>
                <th>Fecha Emision</th>
                <th>Modalidad Docente</th>
                <th>Paralelo</th>
                <th>Turno</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($asignacion_modulo_docente as $key => $value) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $value['nombre_modulo_programa']; ?></td>
                    <td><?= $value['numero_modulo']; ?></td>
                    <td><?= $value['horas_academicas']; ?></td>
                    <td><?= $value['paterno'] . " " . $value['materno'] . " " . $value['nombre']; ?></td>
                    <td><?= $value['nro_nombramiento']; ?></td>
                    <td><?= $value['fecha_emision']; ?></td>
                    <td><?= $value['modalidad_ingreso']; ?></td>
                    <td><?= $value['paralelo']; ?></td>
                    <td><?= $value['turno']; ?></td>
                    <td><?= $value['estado_modulo_programa']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nº</th>
                <th>Nombre Modulo</th>
                <th>Numero Modulo</th>
                <th>Horas Academicas</th>
                <th>Docente</th>
                <th>Numero Nombramiento</th>
                <th>Fecha Emision</th>
                <th>Modalidad Docente</th>
                <th>Paralelo</th>
                <th>Turno</th>
                <th>Estado</th>
            </tr>
        </tfoot>
    </table>
</div>