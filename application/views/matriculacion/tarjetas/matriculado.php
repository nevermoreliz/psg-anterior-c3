<div class='col-md-6 col-lg-6 col-xlg-4' id="<?= $posgraduante['id_persona'] + $posgraduante['id_planificacion_programa'] ?>">
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h3 class="box-title m-b-0"><?= $posgraduante['nombre'] ?> <?= $posgraduante['paterno'] ?> <?= $posgraduante['materno'] ?></h3> <small><?= $posgraduante['ci'] . ' ' . $posgraduante['expedido'] ?></small>
                <address>
                    <?= $posgraduante['descripcion_grado_academico'] ?> <?= $posgraduante['nombre_programa'] ?> <?= $posgraduante['nombre_tipo_programa'] ?>
                    <br>
                    <b>VERSI&Oacute;N:</b> <?= $posgraduante['numero_version'] ?>
                    <br>
                    <b>SEDE:</b> <?= $posgraduante['denominacion_sede'] ?> - <?= $posgraduante['nombre_unidad'] ?>
                    <br>
                    <?php if (isset($posgraduante['matriculas'])) : ?>
                        <p class="text-info font-weight-bold">MATRICULADO</p>
                    <?php else : ?>
                        <p class="text-info font-weight-bold"><?= $posgraduante['estado_inscripcion'] ?></p>
                    <?php endif ?>
                </address>
            </div>
        </div>
        <?php if (isset($posgraduante['matriculas'])) : ?>
            <div id="accordion2" role="tablist" class="minimal-faq p-b-10" aria-multiselectable="true" style="max-height: 951.500px;">
                <?php foreach ($posgraduante['matriculas'] as $key => $value) : ?>
                    <div class="pl-1 pb-1 pr-1">
                        <div class="list-group-item text-center badge label-light-info" role="tab" id="headingOne<?= $value['id_matricula_gestion'] ?>">
                            <div class="row">
                                <div class="col-xl-8 col-sm-8 col-md-8">
                                    <h5 class="mb-0">
                                        <a class="link collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne<?= $value['id_matricula_gestion'] ?>" aria-expanded="false" aria-controls="collapseOne<?= $value['id_matricula_gestion'] ?>">
                                            <small class="small text-right font-weight-bold">
                                                <i class="mdi mdi-cards-playing-outline"></i> Ver Matricula de <?= $value['gestion'] ?>
                                            </small>
                                        </a>
                                    </h5>
                                </div>
                                <div class="col-xl-2 col-sm-2 col-md-2">
                                    <button type="button" class="btn btn-rounded btn-warning btn-sm editar-matricula" data-id-persona="<?= $posgraduante['id_persona'] ?>" data-id-planificacion-programa="<?= $posgraduante['id_planificacion_programa'] ?>" data-id-matricula-gestion="<?= $value['id_matricula_gestion'] ?>"><i class="mdi mdi-table-edit"></i></button>
                                </div>
                                <div class="col-xl-2 col-sm-2 col-md-2">
                                    <button type="button" class="btn btn-rounded btn-danger btn-sm matriculacion_imprimir_matricula" data-id-matricula-gestion="<?= $value['id_matricula_gestion'] ?>"><i class="mdi mdi-printer"></i></button>
                                </div>

                            </div>
                        </div>
                        <div id="collapseOne<?= $value['id_matricula_gestion'] ?>" class="collapse small" role="tabpanel" aria-labelledby="headingOne<?= $value['id_matricula_gestion'] ?>" style="">
                            <div class="card-body">
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <small class="text-muted">Fecha Matriculación: </small>
                                    <h6 class="font-weight-bold"><?= $value['fecha_matriculacion'] ?></h6>
                                </li>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <small class="text-muted">Reg. Universitario: </small>
                                    <h6 class="font-weight-bold"> <?= $value['registro_universitario'] ?></h6>
                                </li>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <small class="text-muted">Categoria: </small>
                                    <h6 class="font-weight-bold"><?= $value['categoria'] ?></h6>
                                </li>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <small class="text-muted">Año Ingreso: </small>
                                    <h6 class="font-weight-bold"><?= $value['anio_ingreso'] ?></h6>
                                </li>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <small class="text-muted">Numero Serie: </small>
                                    <h6 class="font-weight-bold"><?= $value['numero_serie'] ?></h6>
                                </li>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <small class="text-muted">Estado Matricula: </small>
                                    <h6 class="font-weight-bold"> <?= $value['estado_matricula'] ?></h6>
                                </li>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else : ?>
            <div id="accordion2" role="tablist" class="minimal-faq p-b-10" aria-multiselectable="true" style="max-height: 951.500px;">
                <div class="pl-1 pb-1 pr-1">
                    <div class="list-group-item text-center badge label-light-info" role="tab" id="headingOne<?= $posgraduante['id_inscripcion'] ?>">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-md-12">
                                <h5 class="mb-0">
                                    <a class="link collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne<?= $posgraduante['id_inscripcion'] ?>" aria-expanded="false" aria-controls="collapseOne<?= $posgraduante['id_inscripcion'] ?>">
                                        <small class="small text-right font-weight-bold">
                                            <i class="mdi mdi-cards-playing-outline"></i> Ver Respaldos
                                        </small>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne<?= $posgraduante['id_inscripcion'] ?>" class="collapse small" role="tabpanel" aria-labelledby="headingOne<?= $posgraduante['id_inscripcion'] ?>" style="">
                        <div class="card-body">
                            <li class='list-group-item d-flex justify-content-between align-items-center'>
                                <small class="text-muted">Fecha Registro: </small>
                                <h6 class="font-weight-bold"><?= $posgraduante['fecha_inscripcion'] ?></h6>
                            </li>
                            <li class='list-group-item d-flex justify-content-between align-items-center'>
                                <small class="text-muted">Numero Deposito Matrícula: </small>
                                <h6 class="font-weight-bold"><?= $posgraduante['numero_deposito_matricula'] ?></h6>
                            </li>

                            <?php if (isset($posgraduante['respaldos']['DEPOSITO_MATRICULA']->ruta_archivo)) : ?>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <small class="text-muted">Respaldo Deposito Matrícula: </small>
                                    <h6 class="font-weight-bold"></h6>
                                    <a href="<?= $posgraduante['respaldos']['DEPOSITO_MATRICULA']->ruta_archivo ?>" target="_blank"><span class="badge badge-pill badge-warning">Ver</span></a>
                                </li>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <?php if (isset($botones[3])) : ?>
                    <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-file-pdf"></i> Acción
                    </button>
                    <div class="dropdown-menu">
                        <?php foreach ($botones as $key => $value) : ?>
                            <?php if ($value !== null) : ?>
                                <?php if (!$value[4]) : ?>
                                    <a class="dropdown-item small click" data-estado-inscripcion="<?= $value[0] ?>" data-url="<?= is_array($value[2]) ? $value[2][0] : $value[2] ?>" data-tipo="<?= is_array($value[2]) ? $value[2][1] : null ?>" data-id-p="<?= $posgraduante['id_persona'] ?>" data-id-pp="<?= $posgraduante['id_planificacion_programa'] ?>">
                                        <i class="<?= $value[3] ?>"></i> <?= $value[1] ?></u>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <?php if (isset($botones[0])) : ?>
                    <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-warning click" data-estado-inscripcion="<?= $botones[0][0] ?>" data-url="<?= is_array($botones[0][3]) ? $botones[0][3][1] : $botones[0][3] ?>" data-id-p="<?= $posgraduante['id_persona'] ?>" data-id-pp="<?= $posgraduante['id_planificacion_programa'] ?>" data-nombre="<?= $botones[0][1] ?>">
                        <i class="<?= $botones[0][2] ?>"></i> <?= $botones[0][1] ?>
                    </button>
                <?php endif; ?>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <?php if (isset($botones[1])) : ?>
                    <?php if ($botones[1] !== null) : ?>
                        <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-primary click" data-url="<?= is_array($botones[1][3]) ? $botones[1][3][1] : $botones[1][3] ?>" data-id-p="<?= $posgraduante['id_persona'] ?>"><?= $botones[1][1] ?>
                            <i class="<?= $botones[1][2] ?>"></i>
                        </button>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>