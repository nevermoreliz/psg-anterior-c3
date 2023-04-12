<?php if ($elemento == 1) : ?>
    <?php foreach ($multimedias_persona as $key => $multimedia_persona) : ?>
        <li class="list-group-item justify-content-between align-items-center text-center">
            <div class="row">
                <div class="col-1">
                    <?php if (
                        $multimedia_persona['extension_archivo'] == '.jpg' ||
                        $multimedia_persona['extension_archivo'] == '.png' ||
                        $multimedia_persona['extension_archivo'] == '.gif' ||
                        $multimedia_persona['extension_archivo'] == '.jpeg' ||
                        $multimedia_persona['extension_archivo'] == '.jfif'
                    ) : ?>
                        <i class="fa fa-image" title="El archivo es una Imagen"></i>

                    <?php elseif (
                        $multimedia_persona['extension_archivo'] == '.doc' ||
                        $multimedia_persona['extension_archivo'] == '.docx'
                    ) : ?>
                        <i class="fa fa-file-word-o" title="El archivo es un documento Word"></i>
                    <?php elseif ($multimedia_persona['extension_archivo'] == '.pdf') : ?>
                        <i class="fa fa-file-pdf-o" title="El archivo es un documento Pdf"></i>
                    <?php elseif ($multimedia_persona['extension_archivo'] == '.rar' || $multimedia_persona['extension_archivo'] == '.zip') : ?>
                        <i class="fa fa-file-zip-o" title="Es un archivo Comprimido"></i>
                    <?php endif ?>
                </div>
                <div class="col-8">
                    <p class="text" title="<?= $multimedia_persona['nombre_archivo'] ?>"><?= $multimedia_persona['nombre_archivo'] ?></p>
                </div>
                <div class="col-1">
                    <?php if (
                        $multimedia_persona['extension_archivo'] == '.jpg' ||
                        $multimedia_persona['extension_archivo'] == '.png' ||
                        $multimedia_persona['extension_archivo'] == '.gif' ||
                        $multimedia_persona['extension_archivo'] == '.jpeg' ||
                        $multimedia_persona['extension_archivo'] == '.jfif'
                    ) : ?>
                        <a class="image-popup-vertical-fit" href="<?= base_url($multimedia_persona['ruta_archivo']) ?>">
                            <i class="fa fa-eye" title="Ver"></i>
                        </a>
                    <?php else : ?>
                        <a target="_blank" href="<?= base_url($multimedia_persona['ruta_archivo']) ?>"><i class="fa  fa-cloud-download" title="Descargar <?= $multimedia_persona['nombre_archivo'] ?>"></i></a>
                    <?php endif ?>
                </div>
                <div class="col-1">
                    <!-- <i class="fa fa-times-circle-o" title="Eliminar"></i> -->
                </div>
            </div>
        </li>
    <?php endforeach; ?>

<?php elseif ($elemento == 2) : ?>
    <div class="row text-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <h6 class="card-subtitle"></h6>

                    <div class="row">
                        <?php foreach ($multimedias_persona as $key => $multimedia_persona) : ?>
                            <div class="col-md-2">
                                <div class="card crop">
                                    <?php if (
                                        $multimedia_persona['extension_archivo'] == '.jpg' ||
                                        $multimedia_persona['extension_archivo'] == '.png' ||
                                        $multimedia_persona['extension_archivo'] == '.gif' ||
                                        $multimedia_persona['extension_archivo'] == '.jpeg' ||
                                        $multimedia_persona['extension_archivo'] == '.jfif'
                                    ) : ?>

                                        <img src="<?= base_url($multimedia_persona['ruta_archivo']) ?>" class="img img-responsive crop" alt="<?= $multimedia_persona['nombre_archivo'] ?>">
                                        <div class="parent-container">
                                            <a class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url($multimedia_persona['ruta_archivo']) ?>">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                            <!-- <a class="eliminar_archivo btn default btn-outline text-danger" data-value="<?= $multimedia_persona['id_multimedia'] ?>" data-name="<?= $multimedia_persona['nombre_archivo'] ?>" href="javascript:void(0);">
                                                <i class=" icon-close"></i>
                                            </a>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <a class="seleccionar_archivo" data-value="<?= $multimedia_persona['id_multimedia'] ?>" data-name="<?= $multimedia_persona['nombre_archivo'] ?>" data-type="<?= $multimedia_persona['extension_archivo'] ?>" href="javascript:void(0);">
                                                        <i class="icon-plus"></i> Seleccionar
                                                    </a>
                                                </div>
                                            </div> -->
                                        </div>
                                    <?php else : ?>
                                        <div class="parent-container">
                                            <?php if (
                                                $multimedia_persona['extension_archivo'] == '.doc' ||
                                                $multimedia_persona['extension_archivo'] == '.docx'
                                            ) : ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="small"><?= $multimedia_persona['nombre_archivo'] ?></p>
                                                        <i class="h3 mdi mdi-file-word"></i>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <?php if ($multimedia_persona['extension_archivo'] == '.pdf') : ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="small"> <?= $multimedia_persona['nombre_archivo'] ?></p> <i class="h3 mdi mdi-file-pdf"></i>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <?php if ($multimedia_persona['extension_archivo'] == '.rar' || $multimedia_persona['extension_archivo'] == '.zip') : ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="small"><?= $multimedia_persona['nombre_archivo'] ?></p>
                                                                <i class="h3 fa fa-file-zip-o"></i>
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="small"><?= $multimedia_persona['nombre_archivo'] ?></p>
                                                                <i class="h3 mdi mdi-file-outline"></i>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>

                                                <?php endif ?>
                                            <?php endif ?>

                                            <!-- <a class="eliminar_archivo btn default btn-outline text-danger" data-value="<?= $multimedia_persona['id_multimedia'] ?>" data-name="<?= $multimedia_persona['nombre_archivo'] ?>" href="javascript:void(0);">
                                                <i class=" icon-close"></i>
                                            </a>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <a class="seleccionar_archivo" data-value="<?= $multimedia_persona['id_multimedia'] ?>" data-name="<?= $multimedia_persona['nombre_archivo'] ?>" data-type="<?= $multimedia_persona['extension_archivo'] ?>" href="javascript:void(0);">
                                                        <i class="icon-plus"></i> Seleccionar
                                                    </a>
                                                </div>
                                            </div> -->
                                        </div>
                                    <?php endif ?>

                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>