<div class="">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><?= $titulo ?></h3>
        </div>
        <!-- <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item active">Contact2</li>
            </ol>
        </div> -->
        <!-- <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <h6>filtrar por</h6>
        <div class="row m-b-20">
            <div class="col-md-12">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Estado del programa -->
                        <?php if ($filtro == null) : ?>
                            Estado del programa
                        <?php elseif ($filtro == 'Ambos') : ?>
                            Ambos
                        <?php else : ?>
                            <?= $filtro ?>
                        <?php endif ?>
                    </button>
                    <div class="dropdown-menu animated flipInY">
                        <!-- <a class="dropdown-item" href="javascript:void(0)" id="todos" data-estado="Ambos">Ambos</a> -->
                        <a class="dropdown-item" href="javascript:void(0)" id="vigentes" data-estado="Vigentes">Vigentes</a>
                        <a class="dropdown-item" href="javascript:void(0)" id="finalizados" data-estado="Finalizados">Finalizados</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- .row -->

        <div class="row">
            <?php foreach ($publicaciones as $publicacion) : ?>
                <div class="col-lg-6">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="<?= base_url($publicacion->ruta_archivo) ?>" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-inline font-14">
                                <li class="p-l-0">Se mostrara hasta:
                                    <br>
                                    <a href="javascript:void(0)" class="link"><?= fecha_literal($publicacion->fecha_fin_publicidad, 1); ?></a>
                                </li>
                                <li><i class="ti-pencil-alt"></i> Preinscritos <br>
                                    <center>
                                        <span class="label label-warning"><?= $publicacion->total_preinscritos ?> </span>
                                    </center>
                                </li>
                                <li><i class=" ti-check-box"></i> Confirmados <br>
                                    <center><span class="label label-info"><?= $publicacion->total_confirmados ?> </span></center>
                                </li>
                                <li><i class="ti-id-badge"></i> Inscritos <br>
                                    <center><span class="label label-success"><?= $publicacion->total_inscritos ?> </span></center>
                                </li>
                            </ul>
                            <center>
                                PROGRAMA :
                                <br>
                                <h4 class="font-normal"><?= $publicacion->descripcion_grado_academico ?> EN <?= $publicacion->nombre_programa ?> <?= $publicacion->gestion_programa ?>, VERSI&Oacute;N <?= $publicacion->numero_version ?> </h4>
                                SEDE, UNIDAD :
                                <br>
                                <h4 class="font-normal">
                                    <?= $publicacion->denominacion_sede ?>, <?= $publicacion->tipo_unidad ?> <?= $publicacion->nombre_unidad ?>
                                </h4>

                                <p class="m-b-0 m-t-10">
                                    <?php if ($publicacion->estado_publicacion == 'PUBLICADO') {
                                        echo 'HABILITADO PARA : <br/><b>INSCRIPCIONES EN LÍNEA E INFORMACIONES</b>';
                                    } elseif ($publicacion->estado_publicacion == 'INFORMACIONES') {
                                        echo 'HABILITADO<br/><b>SOLO PARA INFORMACIONES</b>';
                                    } ?>
                                </p>

                                <!-- <?= var_dump($publicacion->estado_publicacion) ?> -->
                                <?php if ($publicacion->estado_publicacion != 'FINALIZADO') : ?>
                                    <button class="btn waves-effect btn-sm waves-light btn-rounded btn-outline-info m-t-20 btn_ver_participante" data-pp="<?= $publicacion->id_planificacion_programa ?>"><i class="icon-people"></i> Ver Participantes</button>
                                <?php endif ?>
                                <a href="<?= base_url('coordinador/publicacion_excel/' . $publicacion->id_publicacion) ?>" class="btn waves-effect btn-sm waves-light btn-rounded btn-outline-success m-t-20" id="btn_ver_participante" style="color:green;border-color:green;"> <i class="fa fa-file-excel-o"></i> Descargar Lista en EXCEL</a>
                                <?php if ($publicacion->total_inscritos > 1) : ?>
                                    <a target="_blank" href="<?= base_url('coordinador/publicacion_pdf/' . $publicacion->id_planificacion_programa) ?>" class=" btn waves-effect btn-sm waves-light btn-rounded btn-outline-danger m-t-20" id="btn_ver_participante"> <i class="fa fa-file-pdf-o"></i> Descargar Inscritos en PDF</a>
                                <?php endif ?>
                            </center>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
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
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>