<div class='col-lg-4 col-md-6 col-sm-12 col-xs-12'>
    <div class='card'>
        <div class='ribbon ribbon-corner ribbon-danger'><i class="small"><?= $inscrito->gestion ?></i>
            <h4 class="font-weight-bold px-md-5 text-white"><?= $inscrito->descripcion_grado_academico ?><h4>
        </div>
        <div class='ribbon ribbon-bookmark ribbon-right ribbon-warning'><?= $inscrito->ci . ' ' . $inscrito->expedido ?></div>
        <img class="card-img-top" src="img/banner_cinco.png" alt="banner">
        <div class='row text-center'>
            <!-- <div class='col-md-2 col-lg-2 text-center'>
                <a href='app-contact-detail.html'><img src='img/posgrado.png' alt='user' class='simg-responsive' style='height: 20px !important' /></a>
            </div>
            <div class='col-md-8 col-lg-9'>
                <h5 class='box-title m-b-0'><?= $inscrito->nombre ?> <?= $inscrito->paterno ?> <?= $inscrito->materno ?></h5>
            </div> -->
        </div>
        <div class='row'>
            <div class='col-md-12'>
                <ul class='list-group'>
                    <div class="card-body p-3" style="height: 140px;">
                        <small class="text-muted">Interezado:</small>
                        <h6 class="font-weight-bold"><?= $inscrito->nombre ?> <?= $inscrito->paterno ?> <?= $inscrito->materno ?></h6>
                        <small class="text-muted">Inscrito a: </small>
                        <h5><?= $inscrito->nombre_programa ?> <?= $inscrito->nombre_tipo_programa ?></h5>
                    </div>
                </ul>
            </div>
        </div>
        <div class='card-body'>
            <div class="button-group">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-warning" data-id-persona="<?= $inscrito->id_persona ?>" data-id-planificacion-programa="<?= $inscrito->id_planificacion_programa ?>"><i class="mdi mdi-check-circle-outline"></i> Aprobar</button>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-primary aprobar-matricular" data-id-persona="<?= $inscrito->id_persona ?>" data-id-planificacion-programa="<?= $inscrito->id_planificacion_programa ?>"><i class="mdi mdi-delete-circle"></i> Aprobar y Matricular</button>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-danger" data-id-persona="<?= $inscrito->id_persona ?>" data-id-planificacion-programa="<?= $inscrito->id_planificacion_programa ?>"><i class="mdi mdi-check-circle-outline"></i> Eliminar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>