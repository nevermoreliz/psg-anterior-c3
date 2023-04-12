<div class="row">
    <div class="col-12">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="alert alert-success text-center">
                        <h4 class="pulse animated infinite"> SI LOS SIGUIENTES DATOS ESTÁN CORRECTOS, PRESIONE "CONFIRMAR"
                            <strong>
                                <u><?= $inscrito->nombre_programa ?></u>
                            </strong>
                        </h4>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 col-sm-12 p-20">
                            <h3 class="card-title ">C&eacute;dula de Indentidad</h3>
                            <hr>
                            <div class="row">
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-9">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                                                    <div id="slimtest1" style="overflow: hidden; width: auto; ">
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1 text-white">Comprobante CI. Anverso :</h5>
                                                                </div>
                                                            </a>

                                                            <div class="zoom-gallery ">
                                                                <div id="imagen_ci_anverso">
                                                                    <?php if ($archivos_inscripcion['CI_ANVERSO'] !== null) : ?>
                                                                        <img src="<?= base_url($archivos_inscripcion['CI_ANVERSO']->ruta_archivo) ?>" alt="<?= $archivos_inscripcion['CI_ANVERSO']->nombre_archivo ?>" style="cursor:pointer; width: 100%;">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-9">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; ">
                                                    <div id="slimtest1" style="overflow: hidden; width: auto;">
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1 text-white">Comprobante CI. Reverso :</h5>
                                                                </div>
                                                            </a>
                                                            <div class="zoom-gallery">
                                                                <div id="imagen_ci_reverso">
                                                                    <?php if ($archivos_inscripcion['CI_REVERSO'] !== null) : ?>
                                                                        <img src="<?= base_url($archivos_inscripcion['CI_REVERSO']->ruta_archivo) ?>" alt="<?= $archivos_inscripcion['CI_REVERSO']->nombre_archivo ?>" style="cursor:pointer; width: 100%;">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-9">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                    <div id="slimtest1" style="overflow: hidden; width: auto; height: 250px;">
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">Numero de carnet :</h5>
                                                                </div>
                                                                <p class="mb-1">
                                                                    <?= $inscrito->ci ?>
                                                                </p>
                                                            </a>

                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">Expedido :</h5>
                                                                </div>
                                                                <p class="mb-1"><?= $inscrito->expedido ?></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title ">Datos personales</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 p-20">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Nombre Completo :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->nombre ?> <?= $inscrito->paterno ?> <?= $inscrito->materno ?></p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Genero :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->genero ?></p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Fecha Nacimiento :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->fecha_nacimiento ?></p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Lugar de Nacimiento :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->lugar_nacimiento ?></p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 p-20">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Ciudad donde vive :</h5>
                                    </div>
                                    <p class="mb-1"></p>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Dirección donde Vive :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->domicilio ?></p>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Nacionalidad :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->id_pais_nacionalidad ?></p>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Estado Civil :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->estado_civil ?></p>
                                </a>

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 p-20">
                            <div class="list-group">

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Ocupación actual :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->oficio_trabajo ?></p>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Celular :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->celular ?></p>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Teléfono :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->telefono ?></p>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Correo Electronico :</h5>
                                    </div>
                                    <p class="mb-1"><?= $inscrito->email ?></p>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-4 col-sm-12 p-20">
                            <h3 class="card-title ">Datos Acad&eacute;micos</h3>
                            <hr>
                            <div class="list-group">

                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-white">Comprobante Diploma Académico :</h5>
                                    </div>
                                </a>

                                <div class="zoom-gallery ">

                                    <div id="imagen_diploma_academico">
                                        <?php if ($archivos_inscripcion['DIPLOMA'] !== null) : ?>
                                            <img src="<?= base_url($archivos_inscripcion['DIPLOMA']->ruta_archivo) ?>" alt="<?= $archivos_inscripcion['DIPLOMA']->nombre_archivo ?>" style="cursor:pointer; width: 100%;">
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class=" col-md-8 col-sm-12 p-20">
                            <h3 class="card-title ">Datos del Dep&oacute;sito Bancario</h3>
                            <hr style=" margin: 0; ">
                            <div class="row">
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-3">
                                                <div class="zoom-gallery ">
                                                    <div id="imagen_deposito_matricula">
                                                        <?php if ($archivos_inscripcion['DEPOSITO_MATRICULA'] !== null) : ?>
                                                            <img src="<?= base_url($archivos_inscripcion['DEPOSITO_MATRICULA']->ruta_archivo) ?>" alt="<?= $archivos_inscripcion['DEPOSITO_MATRICULA']->nombre_archivo ?>" style="cursor:pointer; width: 100%;">
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-9">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                    <div id="slimtest1" style="overflow: hidden; width: auto; height: 250px;">

                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1 text-white">Comprobante Dep&oacute;sito matricula :</h5>
                                                                </div>
                                                            </a>

                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">Numero Dep&oacute;sito :</h5>
                                                                </div>
                                                                <p class="mb-1"><?= $inscrito->numero_deposito_matricula ?></p>
                                                            </a>

                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">Fecha Dep&oacute;sito :</h5>
                                                                </div>
                                                                <p class="mb-1" id="fecha_dep">

                                                                </p>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-t-10">
                                            <div class="col-lg-6 col-md-3">
                                                <div class="zoom-gallery ">

                                                    <div id="imagen_deposito_cuota_inicial">
                                                        <?php if ($archivos_inscripcion['DEPOSITO_CUOTA_INICIAL'] !== null) : ?>
                                                            <img src="<?= base_url($archivos_inscripcion['DEPOSITO_CUOTA_INICIAL']->ruta_archivo) ?>" alt="<?= $archivos_inscripcion['DEPOSITO_CUOTA_INICIAL']->nombre_archivo ?>" style="cursor:pointer; width: 100%;">
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-9">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                    <div id="slimtest1" style="overflow: hidden; width: auto; height: 250px;">
                                                        <div class="list-group">

                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1 text-white">Comprobante Dep&oacute;sito 1er. cuota :</h5>
                                                                </div>
                                                            </a>

                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">Numero Dep&oacute;sito :</h5>
                                                                </div>
                                                                <p class="mb-1"><?= $inscrito->numero_deposito_cuota_inicial ?></p>
                                                            </a>

                                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">Fecha Dep&oacute;sito :</h5>
                                                                </div>
                                                                <p class="mb-1"><?= $inscrito->fecha_deposito_inicial ?></p>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse form-actions">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-rounded btn-block btn-info btn-sm" id="confirmar-inscripcion"><i class="mdi mdi-plus-circle"></i> Confirmar</button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" id="observar-inscripcion" data-id-p="<?= $id_persona ?>" data-id-pp="<?= $id_planificacion_programa ?>"><i class="mdi mdi-plus-circle"></i> Observar</button>
                </div>
            </div>
        </div>
    </div>
</div>