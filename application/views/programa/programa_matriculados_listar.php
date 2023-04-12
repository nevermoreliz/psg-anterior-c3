<div class="table-responsive m-t-0">
    <table id="tbl_modulo_programa" class="display  table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nº</th>
                <th>CI</th>
                <th>R.U.</th>
                <th>Apellidos y Nombres</th>
                <th>Fecha Nacimiento</th>
                <th>Genero</th>
                <th>Celular</th>
                <th>Gestión</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matriculados as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['ci'] ?></td>
                    <td><?= $value['registro_universitario'] ?></td>
                    <td><?= $value['paterno'] ?> <?= $value['materno'] ?> <?= $value['nombre'] ?></td>
                    <td><?= $value['fecha_nacimiento'] ?></td>
                    <td><?= $value['genero'] ?></td>
                    <td><?= $value['celular'] ?></td>
                    <td>
                        <?php foreach ($value['matriculas'] as $key => $value) : ?>
                            <span class="badge label-light-info"><?= $value['gestion'] ?></span>
                            <span class="badge label-light-warning"><?= $value['fecha_matriculacion'] ?></span>
                            <?php if ($value['duplicado']) : ?>
                                <span class="badge label-light-danger">Duplicado</span>
                            <?php endif ?>
                            <br>
                        <?php endforeach ?>
                    </td>
                <?php endforeach ?>
                </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Nº</th>
                <th>CI</th>
                <th>R.U.</th>
                <th>Apellidos y Nombres</th>
                <th>Fecha Nacimiento</th>
                <th>Genero</th>
                <th>Celular</th>
                <th>Gestión</th>
            </tr>
        </tfoot>
    </table>
</div>