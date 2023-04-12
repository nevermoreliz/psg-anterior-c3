<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Nuestros Tramites en Línea</h3>
    </div>
    <!-- <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
            <li class="breadcrumb-item active"> Seleccionar tramite</li>
        </ol>
    </div> -->
</div>
<div class="container-fluid">
    <?php foreach ($tramites as $key => $value) : ?>
        <div class="row card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle">Seleccione que tramite desea realizar</h6>
                <div id="accordion2" role="tablist" class="minimal-faq" aria-multiselectable="true">
                    <div class="alert alert-info small">
                        <h4 class="text-info"><i class="fa fa-exclamation-circle"></i> Tramites dirigidos a <?= rol_texto($key, true) ?></h4>
                        Estos trámites van dirigidos hacia los <?= rol_texto($key, true) ?> de Posgrado.
                    </div>
                    <?php foreach ($value as $k => $val) : ?>
                        <div class="card-header list-group-item" role="tab" id="headingOne<?= $val['id_tramite'] ?>">
                            <div class="row">
                                <div class="col-xl-10 seleccionar_tramite" data-value="<?= $val['id_tramite'] ?>">
                                    <li class="list-group-item"> <a class="link collapsed font-weight-bold" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne<?= $val['id_tramite'] ?>" aria-expanded="false" aria-controls="collapseOne<?= $val['id_tramite'] ?>">
                                            <?= $val['nombre_tramite'] ?>
                                            <small class="small text-right text-danger"> <?= empty($val['requisitos']) ? '(Sin requisitos)' : '(Ver requisitos)' ?></small>
                                        </a>
                                    </li>
                                </div>
                                <div class="col-xl-2">
                                    <button class="btn btn-rounded btn-block btn-info btn-sm solicitar_tramite" data-value="<?= $val['id_tramite'] ?>"><i class="mdi mdi-plus-circle"></i> Solicitar este Tramite</button>
                                </div>
                            </div>
                            <div id="collapseOne<?= $val['id_tramite'] ?>" class="collapse" role="tabpanel" aria-labelledby="headingOne<?= $val['id_tramite'] ?>">
                                <div class="card-body">
                                    <?php foreach ($val['requisitos'] as $i => $v) : ?>
                                        <p class="text-danger p--10"> <span class="text-dark"><?= $i + 1 ?>.</span> <?= $v['descripcion_requisito'] ?></p>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        </div>
    <?php endforeach ?>
</div>