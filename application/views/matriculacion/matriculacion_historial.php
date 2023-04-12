<div class="row el-element-overlay">
    <?php foreach ($matriculas as $key => $value) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="ribbon ribbon-corner ribbon-warning">
                    <!-- <i class="small"><?= $value->gestion ?></i>
                    <h4 class="font-weight-bold px-md-5 text-white"><?= $value->descripcion_grado_academico ?></h4> -->
                </div>
                <img class="card-img-top" src="img/banner_uno.png" alt="banner">
                <div class="row text-center">
                    <div class="col-md-12 col-lg-12">
                        <h5 class="box-title m-b-0"></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <p class="small m-b-0"> Fecha Matriculación a:</p>
                                <span class="font-weight-bold"><?= $value->fecha_matriculacion ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p class="small m-b-0">Numero Matricula:</p>
                                <p class="small m-b-0 font-weight-bold"><?= $value->numero_matricula ?></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p class="small m-b-0">Reg. Universitario:</p>
                                <p class="small m-b-0 font-weight-bold"><?= $value->registro_universitario ?></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p class="small m-b-0">Categoria:</p>
                                <p class="small m-b-0 font-weight-bold"><?= $value->categoria ?></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p class="small m-b-0">Año Ingreso:</p>
                                <p class="small m-b-0 font-weight-bold"><?= $value->anio_ingreso ?></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p class="small m-b-0">Est. Matricula:</p>
                                <p class="small m-b-0 font-weight-bold"><?= $value->estado_matricula ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row button-group">
                        <div class="col-md-12 col-lg-6 col-xl-6">
                            <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-warning editar-matricula" data-id-matricula-gestion="<?= $value->id_matricula_gestion ?>"><i class="mdi mdi-account-edit"></i> Editar</button>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-6">
                            <button type="button" class="btn btn-sm btn-block waves-effect waves-light btn-outline-info imprimir-matricula" data-id-matricula-gestion="<?= $value->id_matricula_gestion ?>"><i class="mdi mdi-printer"></i> Imprimir</button>
                        </div>
                        <!-- <button type="button" class="btn-xs waves-effect waves-light btn-info col-lg-6 editar-matricula"><i class="mdi mdi-delete-circle"></i> Editar</button>
                        <button type="button" class="btn-xs waves-effect waves-light btn-warning col-lg-6 imprimir-matricula" data-id-matricula-gestion="<?= $value->id_matricula_gestion ?>"><i class="mdi mdi-check-circle-outline"></i> Imprimir</button> -->
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>