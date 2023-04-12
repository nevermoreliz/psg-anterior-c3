<!-- miga de pan lado Derecha -->
<div class="row page-titles mb-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Detalle Programa</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
            <li class="breadcrumb-item">Detalle</li>
            <!-- <li class="breadcrumb-item active"> <?= mb_convert_case($publicacion_detalle->nombre_programa, MB_CASE_TITLE_SIMPLE); ?></li> -->
            <li class="breadcrumb-item active"> <?= strtoupper($publicacion_detalle->nombre_programa) ?></li>
        </ol>
    </div>

</div>
<!-- End miga de pan lado Derecha -->

<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Start Page Content -->

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">

            <div class="efecto_sticky">

                <div class="card">
                    <img class="card-img-top img-responsive" src="<?= base_url('img/img_publicaciones/' . $publicacion_detalle->nombre_archivo) ?>" alt="Card image cap">
                    <div class="card-body text-center">
                        <center>
                            <h4 class="font-normal"><?= $publicacion_detalle->descripcion_grado_academico ?> EN:</h4>
                            <p class="m-b-0 m-t-10"><?= $publicacion_detalle->nombre_programa ?>
                            </p>
                        </center>

                        <div class="row">
                            <?php if ($publicacion_detalle->estado_publicacion == 'PUBLICADO') : ?>

                                <div class="col-md-6 btn-sm btn_inscribete_modal " style="padding-right: 0;">
                                    <a target="__blank" href="<?= base_url('marketing/inscripcion_programa/' . $publicacion_detalle->id_publicacion) ?>">
                                        <div class="btn btn-block btn-info ">
                                            <div class="animated infinite pulse">
                                                <i class="fa fa-pencil-square-o "> </i> Inscríbete ahora
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6 btn-sm btn_mas_info_modal" style="padding-left: 0;" data-denominacion="" data-id="">
                                    <a href="javascript:void(0)" id="btn_inscripcion" data-id="<?= $publicacion_detalle->id_publicacion ?>" data-denominacion="<?= $publicacion_detalle->nombre_programa ?>">
                                        <div class="btn btn-block btn-warning ">
                                            <div>
                                                <i class="fa fa-info-circle "></i> Mas información
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            <?php else : ?>

                                <div class="col-md-12 btn-sm btn_mas_info_modal" style="padding-left: 0;" data-denominacion="" data-id="">
                                    <a href="javascript:void(0)" id="btn_inscripcion" data-id="<?= $publicacion_detalle->id_publicacion ?>" data-denominacion="<?= $publicacion_detalle->nombre_programa ?>">
                                        <div class="btn btn-block btn-warning ">
                                            <div>
                                                <i class="fa fa-info-circle "></i> Mas información
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif ?>
                        </div>

                        <!-- <a class="btn  btn-outline-info btn-rounded waves-effect waves-light m-t-20" href="">M&aacute;s informaci&oacute;n</a> -->

                    </div>
                </div>

                <div class="card ">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-secondary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3>
                        </div>

                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-info">Bs. <?= $publicacion_detalle->costo_matricula ?> </h3>
                            <h5 class="text-muted m-b-0">Costo Matr&iacute;cula</h5>
                        </div>

                    </div>
                </div>

                <div class="card ">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-secondary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3>
                        </div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-info">Bs. <?= $publicacion_detalle->costo_colegiatura ?> </h3>
                            <h5 class="text-muted m-b-0">Costo Colegiatura</h5>
                        </div>
                    </div>
                </div>

                <div class="card ">
                    <div class="card-body text-left">
                        <h4 class="card-title">Contacto</h4>
                        <ul class="feeds">
                            <li>
                                <div class="bg-light-info"> <i class="fa fa-whatsapp"></i></div>
                                <a href="tel:+591<?= $publicacion_detalle->celular_ref ?>">
                                    (+591) <?= $publicacion_detalle->celular_ref ?> </a> <span class="text-muted">WhatsApp</span>
                            </li>
                            <li>
                                <div class="bg-light-success"><i class="icon-phone"></i> </div><a href="tel:+2<?= $publicacion_detalle->telefono_ref ?>"> (2)
                                    <?= $publicacion_detalle->telefono_ref ?> </a><span class="text-muted">Telefono(s)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7 ">
            <div class="card ">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">


                    <li class="nav-item text-center  "> <a class="nav-link active" data-toggle="tab" href="#datos_generales" role="tab">Datos Generales</a> </li>
                    <li class="nav-item text-center "> <a class="nav-link" data-toggle="tab" href="#requisitos" role="tab">Requisitos</a> </li>
                    <li class="nav-item text-center  "> <a class="nav-link" data-toggle="tab" href="#curriculum" role="tab">Contenido</a> </li>


                </ul>
                <!-- Tab panes -->
                <div class="tab-content">




                    <div class="tab-pane active  " id="datos_generales" role="tabpanel">
                        <!-- carusel de imagenes -->

                        <div class="col-lg-12" style="padding: 0;width:10 ;height:10 ">

                            <!-- <video src="../assets/video/Maestría_en_Educación_Superior.mp4" poster="presentacion.jpg" controls width="100%" height="auto" autoplay></video> -->


                            <!-- <iframe width="100%" height="450" src="https://www.youtube.com/embed/iYHbFNuvVko" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->


                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/yFcsta4UWZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <!-- fin carusel de imagenes -->


                        <div class="card-body">


                            <div class="row text-center">


                                <div class="col-md-3 col-xs-6 b-r"> <strong> <i class="icon-graduation "></i>
                                        Modalidad</strong>
                                    <br>
                                    <p class="text-muted"><?= $publicacion_detalle->nombre_tipo_programa ?> </p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong> <i class="fa fa-calendar"></i>
                                        Duración</strong>
                                    <br>
                                    <p class="text-muted"> <?= $publicacion_detalle->duracion ?> Meses</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong><i class="icon-clock"></i> Carga
                                        horaria</strong>
                                    <br>
                                    <p class="text-muted"><?= $publicacion_detalle->creditaje ?> Horas</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong> <i class="icon-note  "></i>
                                        Inscripciones</strong>
                                    <br>
                                    <p class="text-muted">Hasta: <?= $publicacion_detalle->fecha_fin_publicidad ?> </p>
                                </div>
                            </div>


                            <?php if (!empty($publicacion_detalle->resumen)) : ?>
                                <h4 class="font-medium m-t-30">Introducci&oacute;n</h4>
                                <p class="m-t-30"><?= str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $publicacion_detalle->resumen) ?></p>
                            <?php endif ?>

                            <?php if (!empty($publicacion_detalle->objetivo_programa)) : ?>
                                <h4 class="font-medium m-t-30">Objetivos del programa</h4>
                                <p class="m-t-30"><?= str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $publicacion_detalle->objetivo_programa) ?></p>
                            <?php endif ?>

                            <?php if (!empty($publicacion_detalle->titulacion_intermedia)) : ?>
                                <h4 class="font-medium m-t-30">Titulacion Intermedia</h4>

                                <p class="m-t-30"><?= str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $publicacion_detalle->titulacion_intermedia) ?></p>
                            <?php endif ?>

                            <?php if (!empty($publicacion_detalle->dirigido_a)) : ?>
                                <!-- falta el campo dirigido a: -->
                                <h4 class="font-medium m-t-30">Dirigido a:</h4>
                                <p class="m-t-30"><?= str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $publicacion_detalle->dirigido_a) ?> </p>
                            <?php endif ?>

                        </div>



                    </div>

                    <div class="tab-pane" id="requisitos" role="tabpanel">
                        <div class="card-body">


                            <?php if (strip_tags($publicacion_detalle->requisitos) != '') { ?>
                                <?= $publicacion_detalle->requisitos ?>
                            <?php } else {  ?>
                                <center>
                                    <p>Requisitos no Cargados</p>
                                </center>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="tab-pane" id="curriculum" role="tabpanel">
                        <!-- <div class="card-body">
                            <h4 class="font-medium m-t-30">Contenido minimo</h4>
                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                        </div> -->

                        <div class="card-body">

                            <?php if (strip_tags($publicacion_detalle->contenido) != '') { ?>

                                <?= $publicacion_detalle->contenido ?>
                            <?php } else {  ?>
                                <center>
                                    <p>Contenido no Cargado</p>
                                </center>
                            <?php } ?>

                        </div>

                    </div>

                    <!-- <div class="tab-pane" id="requisitos" role="tabpanel">
                        <div class="card-body">

                            <p class="m-t-0">1.- fotocopia</p>
                            <p class="m-t-0">2.- fotocopia</p>
                            <p class="m-t-0">3.- fotocopia</p>
                            <p class="m-t-0">4.- fotocopia</p>
                            <p class="m-t-0">5.- fotocopia</p>
                            <p class="m-t-0">6.- fotocopia</p>
                            <p class="m-t-0">7.- fotocopia</p>
                            <p class="m-t-0">7.- fotocopia</p>
                            <p class="m-t-0">8.- fotocopia</p>


                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->

    <!-- End PAge Content -->


    <!-- Right sidebar -->

    <!-- .right-sidebar -->

    <!-- <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
            </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->

    <!-- End Right sidebar -->

</div>

<!-- End Container fluid  -->




<!-- Modal -->
<div class="modal" id="detalle_programa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="detalle_programa-dialog" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="detalle_programa-header" class="modal-header bg-color-psg">
                <h5 id="detalle_programa-title" class="modal-title font-weight-bold text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="detalle_programa-body" class="modal-body">
            </div>

        </div>
    </div>
</div>

<div id="detalle_programa_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: 00;border: none;">

            <div id="detalle_programa_login-body" class="">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>