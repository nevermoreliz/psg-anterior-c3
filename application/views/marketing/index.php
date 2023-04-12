<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->

<header>
    <div class="">
        <!-- <h4 class="card-title">With captions</h4>
    <h6 class="card-subtitle">Add captions to your slides easily with the <code>.carousel-caption</code></h6> -->
        <div id="carouselExampleIndicators3" class="carousel slide pointer-event" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators3" data-slide-to="0" class=""></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="1" class="active"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item">
                    <img class="img-responsive img-responsivo-agregado" src="<?= base_url('img/sobre_nosotros/banner1.jpg') ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="javascript:void(0)" class="pruebaclick">
                            <h3 class="text-white"><i class="ti-mouse"></i></h3>
                        </a>
                        <a href="javascript:void(0)" class="pruebaclick" style="color: white;">
                            <p>Click para deslizar a las ofertas acad&eacute;micas</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="img-responsive img-responsivo-agregado" src="<?= base_url('img/sobre_nosotros/banner2.jpg') ?>" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="javascript:void(0)" class="pruebaclick">
                            <h3 class="text-white"><i class="ti-mouse"></i></h3>
                        </a>
                        <a href="javascript:void(0)" class="pruebaclick" style="color: white;">
                            <p>Click para deslizar a las ofertas acad&eacute;micas</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="img-responsive img-responsivo-agregado" src="<?= base_url('img/sobre_nosotros/banner3.jpg') ?>" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="javascript:void(0)" class="pruebaclick">
                            <h3 class="text-white"><i class="ti-mouse"></i></h3>
                        </a>
                        <a href="javascript:void(0)" class="pruebaclick" style="color: white;">
                            <p>Click para deslizar a las ofertas acad&eacute;micas</p>
                        </a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</header>

<!-- <div class="page-wrapper"> -->
<div class=" page-wrapper" style="padding-top: 0;">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles" style="padding-top: 20px;">
        <div class="col-md-12 align-self-center">
            <center>
                <h3 class="text-themecolor">OFERTA ACADÉMICA VIGENTE</h3>
            </center>
        </div>
        <!-- <div class="col-md-7 align-self-center stickyside">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#1">Diplomado</a></li>
                <li class="breadcrumb-item active"><a href="#2">Maestría</a></li>
                <li class="breadcrumb-item active"><a href="#3">Doctorado</a></li>
            </ol>
        </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- nav red social -->

    <div class="social-bar" style="z-index: 9;">
        <a href="https://www.facebook.com/Estudia-En-Posgrado-UPEA-128794501288356/?ref=bookmarks" target="_blank">
            <div class="social-bar__item social-bar__fb">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </div>
        </a>

        <a href="https://twitter.com/posgradoupea" target="_blank">
            <div class="social-bar__item social-bar__twitter">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </div>
        </a>

        <a href="https://www.youtube.com/channel/UCk9-wr2u8t1Kc-5B3Cvp45Q" target="_blank">
            <div class="social-bar__item social-bar__youtube" style="background-color: red;">
                <i class="fa fa-youtube" aria-hidden="true"></i>
            </div>
        </a>

        <a href="https://www.linkedin.com/in/posgrado-upea-9324581a3/" target="_blank">
            <div class="social-bar__item social-bar__linkedin">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </div>
        </a>

        <a href="https://www.instagram.com/upeaposgrado/" target="_blank">
            <div class="social-bar__item social-bar__instagram">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
        </a>

        <!-- <a href="#">
            <div class="social-bar__item social-bar__printerest">
                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
            </div>
        </a> -->
    </div>
    <!-- nav red social -->

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid" style="display:block;">

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <!-- BLOQUE DE TECNICO MEDIO -->
        <?php
        $i = 0;
        foreach ($afiches as $afiche) :
            if ($afiche->descripcion_grado_academico == 'TÉCNICO MEDIO') $i++;
        endforeach ?>
        <!-- <?= $i ?> -->

        <?php if ($i > 0) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="3">
                            <h4 class="card-title">TÉCNICO MEDIO</h4>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'VIRTUAL' and $afiche->descripcion_grado_academico == 'TÉCNICO MEDIO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO MEDIO') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-medio/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'TÉCNICO MEDIO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>SEMI-PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO MEDIO') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-medio/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'TÉCNICO MEDIO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">
                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO MEDIO') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-medio/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>
                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'TÉCNICO MEDIO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO MEDIO') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-medio/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- FIN BLOQUE DE TECNICO MEDIO -->

        <!-- BLOQUE DE TECNICO SUPERIOR -->
        <?php
        $i = 0;
        foreach ($afiches as $afiche) :
            if ($afiche->descripcion_grado_academico == 'TÉCNICO SUPERIOR') $i++;
        endforeach ?>
        <!-- <?= $i ?> -->

        <?php if ($i > 0) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="3">
                            <h4 class="card-title">TÉCNICO SUPERIOR</h4>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'VIRTUAL' and $afiche->descripcion_grado_academico == 'TÉCNICO SUPERIOR') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO SUPERIOR') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-superior/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'TÉCNICO SUPERIOR') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>SEMI-PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO SUPERIOR') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-superior/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'TÉCNICO SUPERIOR') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">
                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO SUPERIOR') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-superior/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>
                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'TÉCNICO SUPERIOR') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'TÉCNICO SUPERIOR') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", 'tecnico-superior/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- FIN BLOQUE DE TECNICO SUPERIOR -->

        <!-- BLOQUE DE TECNICO LICENCIATURA -->
        <?php
        $i = 0;
        foreach ($afiches as $afiche) :
            if ($afiche->descripcion_grado_academico == 'LICENCIATURA') $i++;
        endforeach ?>
        <!-- <?= $i ?> -->

        <?php if ($i > 0) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="3">
                            <h4 class="card-title">LICENCIATURA</h4>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'VIRTUAL' and $afiche->descripcion_grado_academico == 'LICENCIATURA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'LICENCIATURA') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'LICENCIATURA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>SEMI-PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'LICENCIATURA') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'LICENCIATURA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">
                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'LICENCIATURA') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>
                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'LICENCIATURA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'LICENCIATURA') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- FIN BLOQUE DE LICENCIATURA -->

        <!-- BLOQUE DIPLOMADO -->
        <div class="row ">
            <div class="col-12">
                <div class="card ">
                    <div class="card-body">
                        <h4 class="card-title " id="1">DIPLOMADOS</h4>
                        <?php
                        $i = 0;
                        foreach ($afiches as $afiche) :
                            if ($afiche->descripcion_grado_academico == 'DIPLOMADO') $i++;
                        endforeach ?>
                        <!-- <?= $i ?> -->
                        <?php if ($i > 0) : ?>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if (($afiche->nombre_tipo_programa == 'VIRTUAL') and ($afiche->descripcion_grado_academico == 'DIPLOMADO')) $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DIPLOMADO') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <!-- <?= var_dump(empty($afiche->descuento_individual)); ?> -->
                                        <!-- <?= $afiche->fecha_fin_descuento ?> -->
                                        <div class="col-lg-4 col-md-6 ">
                                            <div class="card card_border_personalizado ">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar  el-overlay-1 hola  ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>

                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black; ">

                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">

                                                            <!-- <div class="stat-value">Contacto</div>
                                                            <div class="">
                                                                <a class="btn btn-sm btn-secondary btn-outline" data-container="body" title="Popover title1" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">


                                                                    <i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?>
                                                                </a>
                                                            </div> -->

                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class="">
                                                                <!-- <a class="btn btn-sm btn-secondary btn-outline" data-container="body" title="Popover title1" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">


                                                                    <i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?>
                                                                </a> -->
                                                                <a style="cursor: help;" data-container="body" title="Coordinador" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">


                                                                    <i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?>
                                                                </a>
                                                            </div>

                                                            <!-- <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div> -->
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">
                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'DIPLOMADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong> SEMI-PRESENCIAL</strong></span>
                                </h6>

                            <?php endif ?>
                            <!-- <?= $i ?> -->
                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DIPLOMADO') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card card_border_personalizado ">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar  el-overlay-1 hola  ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'DIPLOMADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong> PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->
                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DIPLOMADO') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card card_border_personalizado ">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar  el-overlay-1 hola  ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'DIPLOMADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong> ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->
                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DIPLOMADO') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card card_border_personalizado ">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar  el-overlay-1 hola  ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'DIPLOMADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>NO ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->
                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DIPLOMADO') and ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card card_border_personalizado ">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar  el-overlay-1 hola  ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                        <?php else : ?>
                            <center>
                                <p> NO SE ENCONTRARON DIPLOMADOS VIGENTES</p>
                            </center>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN BLOQUE DIPLOMADO -->

        <!-- BLOQUE DE ESPECIALIDAD -->
        <?php
        $i = 0;
        foreach ($afiches as $afiche) :
            if ($afiche->descripcion_grado_academico == 'ESPECIALIDAD') $i++;
        endforeach ?>
        <!-- <?= $i ?> -->

        <?php if ($i > 0) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="3">
                            <h4 class="card-title">ESPECIALIDAD</h4>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'VIRTUAL' and $afiche->descripcion_grado_academico == 'ESPECIALIDAD') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'ESPECIALIDAD') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'ESPECIALIDAD') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>SEMI-PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'ESPECIALIDAD') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'ESPECIALIDAD') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'ESPECIALIDAD') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'ESPECIALIDAD') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'ESPECIALIDAD') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'ESPECIALIDAD') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>NO ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'ESPECIALIDAD') and ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- FIN BLOQUE DE ESPECIALIDAD -->

        <!-- BLOQUE MAESTRIA -->
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="2">MAESTRÍA</h4>
                        <?php
                        $i = 0;
                        foreach ($afiches as $afiche) :
                            if ($afiche->descripcion_grado_academico == 'MAESTRÍA') $i++;
                        endforeach ?>
                        <!-- <?= $i ?> -->
                        <?php if ($i > 0) : ?>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'VIRTUAL' and $afiche->descripcion_grado_academico == 'MAESTRÍA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'MAESTRÍA') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <?php
                                                        // $ma quitamos el tilde de la palabra maestría para el url
                                                        $ma = str_replace("Í", "I", $afiche->descripcion_grado_academico);
                                                        ?>
                                                        <a target="_blank" href="<?php echo base_url(strtolower($ma) . '/' . mb_convert_case(str_replace(" ", "-", $afiche->nombre_tipo_programa), MB_CASE_LOWER) . '/' . $afiche->id_publicacion) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>

                                                    <div class="card_item_campo card_item clearfix">

                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'MAESTRÍA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>SEMI-PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'MAESTRÍA') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <?php
                                                        // $ma quitamos el tilde de la palabra maestría para el url
                                                        $ma = str_replace("Í", "I", $afiche->descripcion_grado_academico);
                                                        ?>
                                                        <a target="_blank" href="<?php echo base_url(strtolower($ma) . '/' . mb_convert_case(str_replace(" ", "-", $afiche->nombre_tipo_programa), MB_CASE_LOWER) . '/' . $afiche->id_publicacion) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />

                                                        </a>

                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'MAESTRÍA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'MAESTRÍA') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <?php
                                                        // $ma quitamos el tilde de la palabra maestría para el url
                                                        $ma = str_replace("Í", "I", $afiche->descripcion_grado_academico);
                                                        ?>
                                                        <a target="_blank" href="<?php echo base_url(strtolower($ma) . '/' . mb_convert_case(str_replace(" ", "-", $afiche->nombre_tipo_programa), MB_CASE_LOWER) . '/' . $afiche->id_publicacion) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />

                                                        </a>

                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'MAESTRÍA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'MAESTRÍA') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <?php
                                                        // $ma quitamos el tilde de la palabra maestría para el url
                                                        $ma = str_replace("Í", "I", $afiche->descripcion_grado_academico);
                                                        ?>
                                                        <a target="_blank" href="<?php echo base_url(strtolower($ma) . '/' . mb_convert_case(str_replace(" ", "-", $afiche->nombre_tipo_programa), MB_CASE_LOWER) . '/' . $afiche->id_publicacion) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>



                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'MAESTRÍA') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>NO ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'MAESTRÍA') and ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <?php
                                                        // $ma quitamos el tilde de la palabra maestría para el url
                                                        $ma = str_replace("Í", "I", $afiche->descripcion_grado_academico);
                                                        ?>
                                                        <a target="_blank" href="<?php echo base_url(strtolower($ma) . '/' . mb_convert_case(str_replace(" ", "-", $afiche->nombre_tipo_programa), MB_CASE_LOWER) . '/' . $afiche->id_publicacion) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">




                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>

                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>

                                                        </div>
                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>


                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>



                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                        <?php else : ?>
                            <center>
                                <p> NO SE ENCONTRARON MAESTRIAS VIGENTES</p>
                            </center>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN BLOQUE MAESTRIA -->

        <!-- BLOQUE DOCTORADO -->
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="3">
                        <h4 class="card-title">DOCTORADO</h4>
                        <?php
                        $i = 0;
                        foreach ($afiches as $afiche) :
                            if ($afiche->descripcion_grado_academico == 'DOCTORADO') $i++;
                        endforeach ?>
                        <!-- <?= $i ?> -->
                        <?php if ($i > 0) : ?>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'VIRTUAL' and $afiche->descripcion_grado_academico == 'DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DOCTORADO') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong></strong>SEMI-PRESENCIAL</b></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DOCTORADO') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DOCTORADO') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DOCTORADO') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>NO ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'DOCTORADO') and ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                        <?php else : ?>
                            <center>
                                <p> NO SE ENCONTRARON DOCTORADO VIGENTES</p>
                            </center>
                        <?php endif ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- FIN BLOQUE DOCTORADO -->

        <!-- BLOQUE DE POST DOCTORADO -->
        <?php
        $i = 0;
        foreach ($afiches as $afiche) :
            if ($afiche->descripcion_grado_academico == 'POST DOCTORADO') $i++;
        endforeach ?>
        <!-- <?= $i ?> -->

        <?php if ($i > 0) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="3">
                            <h4 class="card-title">POST DOCTORADO</h4>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'VIRTUAL' and $afiche->descripcion_grado_academico == 'POST DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>VIRTUAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'POST DOCTORADO') and ($afiche->nombre_tipo_programa == 'VIRTUAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL' and $afiche->descripcion_grado_academico == 'POST DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>SEMI-PRESENCIAL</span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'POST DOCTORADO') and ($afiche->nombre_tipo_programa == 'SEMI-PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'PRESENCIAL' and $afiche->descripcion_grado_academico == 'POST DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>PRESENCIAL</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'POST DOCTORADO') and ($afiche->nombre_tipo_programa == 'PRESENCIAL')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>

                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'POST DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'POST DOCTORADO') and ($afiche->nombre_tipo_programa == 'ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>


                            <?php
                            $i = 0;
                            foreach ($afiches as $afiche) :
                                if ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO' and $afiche->descripcion_grado_academico == 'POST DOCTORADO') $i++;
                            endforeach ?>
                            <?php if ($i > 0) : ?>
                                <h6 class="card-subtitle">En su Modalidad :
                                    <span class="badge badge-danger btn btn-secondary"><i class="fa fa-hashtag"> </i><strong>NO ESCOLARIZADO</strong></span>
                                </h6>
                            <?php endif ?>
                            <!-- <?= $i ?> -->

                            <div class="row el-element-overlay">

                                <?php foreach ($afiches as $afiche) : ?>
                                    <?php if (date('Y-m-d') >= $afiche->fecha_inicio_publicidad and date('Y-m-d') <= $afiche->fecha_fin_publicidad and ($afiche->descripcion_grado_academico === 'POST DOCTORADO') and ($afiche->nombre_tipo_programa == 'NO ESCOLARIZADO')) { ?>

                                        <div class="col-lg-4 col-md-6 ">

                                            <div class="card" style="border-bottom-left-radius: 20px 20px;  border-bottom-right-radius: 20px 20px;">

                                                <div class="el-card-item ">

                                                    <?php if ($afiche->descuento_individual != 0 || $afiche->descuento_grupal != 0) : ?>
                                                        <div class=" ribbon ribbon <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'ribbon-info' : 'ribbon-default' ?> " style="z-index: 9;top: -1px;left: 0px;border-top-left-radius: 10px;opacity: 0.8;<?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? 'background: #f00;' : '' ?>">
                                                            <span class="mytooltip tooltip-effect-5">
                                                                <span class="tooltip-item2 text-white pulse animated infinite">
                                                                    <!-- <i class="fa fa-money " style="color: white;"></i> -->
                                                                    <!-- <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                        echo 'fa fa-users';
                                                                                    } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                        echo 'fa fa-user-o ';
                                                                                    } else {
                                                                                        echo 'fa fa-money';
                                                                                    } ?>" style="color: white;"></i> -->
                                                                    Descuento
                                                                </span>
                                                                <span class="tooltip-content4 clearfix" <?= (date('Y-m-d') <= $afiche->fecha_fin_descuento) ? '' : 'style="background: #ef0000;' ?> ">
                                                                    <span class=" tooltip-text2">
                                                                    <center>
                                                                        <?php if (date('Y-m-d') <= $afiche->fecha_fin_descuento) { ?>

                                                                            <strong>
                                                                                <!-- <i class="fa fa-money"></i>  -->
                                                                                <i class="<?php if ($afiche->descuento_individual != 0 && $afiche->descuento_grupal != 0) {
                                                                                                echo 'fa fa-money';
                                                                                            } ?>" style="color: white;"></i>
                                                                                <u> DESCUENTOS </u>
                                                                            </strong>
                                                                            <br>
                                                                            <?php if ($afiche->descuento_grupal != 0) : ?>
                                                                                Descuento a grupos de 5 personas <i class="fa fa-users"></i> :
                                                                                <br>
                                                                                Bs. <strong><?= $afiche->descuento_grupal ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <?php if ($afiche->descuento_individual != 0) : ?>
                                                                                Descuento individual <i class="fa fa-user-o"></i> : Bs. <strong> <?= $afiche->descuento_individual ?></strong>
                                                                                <br>
                                                                            <?php endif ?>
                                                                            <!-- <a href="http://en.wikipedia.org/wiki/Euclid">Wikipedia</a> -->
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <strong>
                                                                            <!-- <i class="fa fa-money"></i>  -->
                                                                            <i class="<?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) {
                                                                                            echo 'fa fa-users';
                                                                                        } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) {
                                                                                            echo 'fa fa-user-o ';
                                                                                        } else {
                                                                                            echo 'fa fa-money';
                                                                                        } ?>" style="color: white;"></i>
                                                                            <u>
                                                                                <?php if ($afiche->descuento_individual == 0 && $afiche->descuento_grupal != 0) { ?>
                                                                                    DECUENTO GRUPAL
                                                                                <?php } elseif ($afiche->descuento_individual != 0 && $afiche->descuento_grupal == 0) { ?>
                                                                                    DECUENTO INDIVIDUAL
                                                                                <?php } else { ?>
                                                                                    DECUENTOS FINALIZADOS
                                                                                <?php } ?>
                                                                            </u>
                                                                        </strong>
                                                                        <br>
                                                                        finalizado el <b><?= $afiche->fecha_fin_descuento ?></b>
                                                                    </center>
                                                                <?php } ?>
                                                                </span>
                                                            </span>
                                                            </span>

                                                            <!-- <i class="fa fa-money "></i> -->
                                                        </div>
                                                    <?php endif ?>

                                                    <div class="el-card-avatar el-overlay-1 ">
                                                        <a target="_blank" href="<?php echo base_url(mb_convert_case(str_replace(" ", "-", $afiche->descripcion_grado_academico . '/' . $afiche->nombre_tipo_programa . '/' . $afiche->id_publicacion), MB_CASE_LOWER)) ?>">
                                                            <img style="cursor: pointer;" src="<?= base_url('img/img_publicaciones/' . $afiche->nombre_archivo) ?>" alt="user " />
                                                        </a>
                                                    </div>


                                                    <div class="card_item_campo card_item clearfix">
                                                        <div class="one-third arreglo" style=" color:black;">
                                                            <div class="stat-value">Versión</div>
                                                            <div class=""> <?= $afiche->numero_version ?> </div>
                                                        </div>

                                                        <div class="one-third arreglo" style="color:black;">
                                                            <div class="stat-value">Codigo</div>
                                                            <div class="">P-<?= $afiche->id_planificacion_programa ?></div>
                                                        </div>

                                                        <div class="one-third no-border arreglo" style="color:black; ">
                                                            <div class="stat-value">Contacto</div>
                                                            <div class=""><i class="fa fa-whatsapp "></i> <?= $afiche->celular_ref ?> </div>
                                                        </div>
                                                    </div>

                                                    <div class="el-overlay-1">

                                                        <div class="row ">
                                                            <?php if ($afiche->estado_publicacion == 'PUBLICADO') { ?>

                                                                <div id="as" class="col-md-6  btn_inscribete_modal" style="padding-right: 0;">
                                                                    <a target="__blank" href="<?php echo base_url('marketing/inscripcion_programa/' . $afiche->id_publicacion) ?>">
                                                                        <div class="btn btn-block btn-info ">
                                                                            <div class="animated infinite pulse">
                                                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="col-md-6 btn_mas_info_modal" style="padding-left: 0;" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } else { ?>

                                                                <div class="col-md-12 btn_mas_info_modal" data-denominacion="<?= $afiche->descripcion_grado_academico . ' EN ' . $afiche->nombre_programa . ' Mod. ' . $afiche->nombre_tipo_programa . ' Versión ' . $afiche->numero_version; ?>" data-id="<?= $afiche->id_publicacion ?>">
                                                                    <a data-toggle="modal" data-target="#modal">
                                                                        <div class="btn btn-block btn-warning  ">
                                                                            <div>
                                                                                <i class="fa fa-info-circle "></i> Mas información
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                        </div>


                                                        <div class="card_item_campo card_item clearfix">
                                                            <div class="one-third" style="width: 50%; color:black;">
                                                                <div class="stat"> <?= $afiche->costo_matricula ?> <sup>Bs.</sup>
                                                                </div>
                                                                <div class="stat-value">Matricula</div>
                                                            </div>
                                                            <a class="  btn-outline image-popup-vertical-fit  " href="https://kaosenlared.net/wp-content/uploads/2020/03/IMG-20200316-WA0023.jpg">
                                                                <div class="one-third no-border" style="width: 50%;color:black;">
                                                                    <div class="stat"><?= $afiche->costo_colegiatura ?>
                                                                        <sup>Bs.</sup>
                                                                    </div>
                                                                    <div class="stat-value">Colegiatura</div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                        <div class="card-header etiquetas">
                                                            <div class=" ">AREAS RELACIONADAS
                                                                <?php foreach ($listar_etiquetas as $etiqueta) : ?>
                                                                    <?php if ($etiqueta->id_planificacion_programa == $afiche->id_planificacion_programa) { ?>
                                                                        <a href="">
                                                                            <span class="badge badge-danger btn btn-secondary">
                                                                                <!-- derecho -->
                                                                                <i class="fa fa-hashtag"></i>
                                                                                <?= $etiqueta->nombre_etiqueta ?>
                                                                            </span>
                                                                        </a>
                                                                <?php }
                                                                endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                <?php }
                                endforeach ?>

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- FIN BLOQUE DE POST DOCTORADO -->





        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<!-- nav red social footer responsive -->
<ul class="flex-container">
    <li class="twitter"><a target="_blank" href="https://twitter.com/posgradoupea"><i class="fa fa-twitter fa-1x" role="button"></i></a></li>
    <li class="facebook"><a target="_blank" href="https://www.facebook.com/Estudia-En-Posgrado-UPEA-128794501288356/?ref=bookmarks"><i class="fa fa-facebook fa-1x" role="button"></i></a></li>
    <li class="linkedin"><a target="_blank" href="https://www.linkedin.com/in/posgrado-upea-9324581a3/"><i class="fa fa-linkedin fa-1x" role="button"></i></a></li>
    <li class="instagram" style="background: #e4405f;"><a target="_blank" href="https://www.instagram.com/upeaposgrado/"><i class="fa fa-instagram fa-1x" role="button"></i></a></li>
    <li class="youtube" style="background: red;"><a target="_blank" href="https://www.youtube.com/channel/UCk9-wr2u8t1Kc-5B3Cvp45Q"><i class="fa fa-youtube fa-1x" role="button"></i></a></li>
</ul>
<!-- end nav red social footer responsive -->

<!-- modal mas informacion -->
<div class="modal" id="modal" abindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal-header" class="modal-header bg-color-psg ">
                <h5 id="modal-title" class="modal-title text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body" class="modal-body">

            </div>
            <div class="modal-footer">
                <div class="col-lg-8 button-group">
                    <a href="https://www.facebook.com/Estudia-En-Posgrado-UPEA-128794501288356/?ref=bookmarks" target="_blank"><button class="btn btn-facebook waves-effect waves-light" type="button"> <i class="fa fa-facebook"></i> </button></a>
                    <a href="https://twitter.com/posgradoupea" target="_blank"><button class="btn btn-twitter waves-effect waves-light" type="button"> <i class="fa fa-twitter"></i> </button></a>
                    <!-- <a href="" target="_blank"><button class="btn btn-googleplus waves-effect waves-light" type="button"> <i class="fa fa-google-plus"></i> </button></a> -->
                    <a href="https://www.linkedin.com/in/posgrado-upea-9324581a3/" target="_blank"><button class="btn btn-linkedin waves-effect waves-light" type="button"> <i class="fa fa-linkedin"></i> </button></a>
                    <a href="https://www.instagram.com/upeaposgrado/" target="_blank"><button class="btn btn-instagram waves-effect waves-light" type="button"> <i class="fa fa-instagram"></i> </button></a>
                    <!-- <a href="" target="_blank"><button class="btn btn-pinterest waves-effect waves-light" type="button"> <i class="fa fa-pinterest"></i> </button></a> -->
                    <!-- <a href="" target="_blank"><button class="btn btn-dribbble waves-effect waves-light" type="button"> <i class="fa fa-dribbble"></i> </button></a> -->
                    <a href="https://www.youtube.com/channel/UCk9-wr2u8t1Kc-5B3Cvp45Q" target="_blank"><button class="btn btn-youtube waves-effect waves-light" type="button"> <i class="fa fa-youtube"></i> </button></a>
                </div>
                <div>
                    <b>Num Cuenta Bancaria:</b> 10000004713025
                </div>
                <div>
                    <img style="width: 40px;" src="<?= base_url('img/uploads/banco-union.jpg') ?>" alt="">
                </div>


            </div>
        </div>
    </div>
</div>
<!-- fin modal mas informacion -->


<!-- modal compartir-->
<div class="modal" id="modal-btn-compartir" abindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal-dialog" class="modal-dialog" role="document">
        <div class="modal-content">

            <div id="modal-btn-compartir-body" class="modal-body compartir">

            </div>


        </div>

    </div>
</div>
<!-- fin modal compartir -->