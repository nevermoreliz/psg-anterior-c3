  <!-- ============================================================== -->
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  <div class="">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="row page-titles">
          <div class="col-md-5 align-self-center">
              <h3 class="text-themecolor">Mi Perfil</h3>
          </div>
          <div class="col-md-7 align-self-center">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                  <li class="breadcrumb-item active">Mi Perfil</li>
              </ol>
          </div>
          <div>
              <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
          </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <!-- Row -->

          <div class="row">
              <!-- Column -->
              <div class="col-lg-4 col-xlg-3 col-md-5 ">
                  <!-- <div class="efecto_sticky"> -->
                  <div class="efecto_sticky_perfil_usuario">
                      <div class="card">
                          <div class="card-body">
                              <center class="m-t-30"> <img src="<?= ($datos_persona[0]['genero'] == "F") ? base_url('img/iconos_avatar/mujer.svg') : base_url('img/iconos_avatar/varon.svg')  ?>" class="img-circle" width="150" />
                                  <h4 class="card-title m-t-10"><?= $datos_persona[0]['nombre'] ?> <?= $datos_persona[0]['paterno']  ?> </h4>
                                  <!-- <h6 class="card-subtitle">Accoubts Manager Amix corp</h6> -->
                                  <h6 class="card-subtitle"><?= $usuario['nombre_grupo'] ?></h6>
                                  <div class="row text-center justify-content-md-center">
                                      <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                              <font class="font-medium">254</font>
                                          </a></div>
                                      <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i>
                                              <font class="font-medium">54</font>
                                          </a></div>
                                  </div>
                              </center>
                          </div>
                          <!-- <div>
                              <hr>
                          </div> -->
                          <!-- <div class="card-body">
                              <small class="text-muted">Correo Electronico </small>
                              <h6><?= $datos_persona[0]['email'] ?></h6>
                              <small class="text-muted p-t-30 db">Telefono Celular</small>
                              <h6><?= $datos_persona[0]['celular'] ?></h6>
                              <small class="text-muted p-t-30 db">Telefono fijo</small>
                              <h6><?= $datos_persona[0]['telefono'] ?></h6>
                              <small class="text-muted p-t-30 db">Direcci&oacute;n</small>
                              <h6><?= $datos_persona[0]['domicilio'] ?></h6>
                              <div class="map-box">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                              </div> <small class="text-muted p-t-30 db">Social Profile</small>
                              <br />
                              <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                              <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                              <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                          </div> -->
                      </div>

                      <div class="card ">
                          <div class="d-flex flex-row">
                              <div class="p-10 bg-danger">
                                  <h3 class="text-white box m-b-0"><i class="ti-email"></i></h3>
                              </div>
                              <div class="align-self-center m-l-20">

                                  <h3 class="m-b-0 text-info"><?= empty($datos_persona[0]['email']) ? 'Sin correo electronico' : $datos_persona[0]['email'] ?></h3>
                                  <h5 class="text-muted m-b-0">Correo Electronico</h5>
                              </div>
                          </div>
                      </div>


                      <div class="card ">
                          <div class="d-flex flex-row">
                              <div class="p-10 " style="background-color: green;">
                                  <h3 class="text-white box m-b-0"><i class="icon-screen-smartphone"></i></h3>
                              </div>

                              <div class="align-self-center m-l-20">

                                  <h3 class="m-b-0 text-info"><?= empty($datos_persona[0]['celular']) ? 'Sin numero celular' : $datos_persona[0]['celular'] ?></h3>
                                  <h5 class="text-muted m-b-0">Numero Celular</h5>
                              </div>
                          </div>
                      </div>

                      <?php if (!empty($datos_persona[0]['telefono'])) : ?>
                          <div class="card ">
                              <div class="d-flex flex-row">
                                  <div class="p-10 bg-warning">
                                      <h3 class="text-white box m-b-0"><i class=" icon-phone"></i></h3>
                                  </div>

                                  <div class="align-self-center m-l-20">
                                      <h3 class="m-b-0 text-info"><?= $datos_persona[0]['telefono'] ?></h3>
                                      <h5 class="text-muted m-b-0">Teléfono fijo</h5>
                                  </div>
                              </div>
                          </div>
                      <?php endif ?>

                      <div class="card ">
                          <div class="d-flex flex-row">
                              <div class="p-10 bg-primary">
                                  <h3 class="text-white box m-b-0"><i class="ti-location-pin"></i></h3>
                              </div>

                              <div class="align-self-center m-l-20">
                                  <h3 class="m-b-0 text-info"><?= empty($datos_persona[0]['domicilio']) ? 'Sin dirección' : $datos_persona[0]['domicilio'] ?></h3>
                                  <h5 class="text-muted m-b-0">Direcci&oacute;n</h5>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
              <!-- Column -->

              <!-- Column -->
              <div class="col-lg-8 col-xlg-9 col-md-7">
                  <div class="">
                      <div class="">
                          <!-- <h4 class="card-title m-b-40">Tab with dropdown</h4> -->
                          <div id="contenido_perfil_usuario">
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Column -->
          </div>
          <!-- Row -->
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
      <!-- ============================================================== -->

  </div>
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->

  <!-- Modal -->
  <div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal-dialog" class="modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal-header" class="modal-header">
                  <h5 id="modal-title" class="modal-title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal-body" class="modal-body">

              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>
  </div>

  <div class="modal" id="grado-academico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="grado-academico-dialog" class="modal-dialog" role="document">
          <div class="modal-content">
              <div id="grado-academico-header" class="modal-header">
                  <h5 id="grado-academico-title" class="modal-title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="grado-academico-body" class="modal-body">
              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>


  <!-- modal_docente_kardex -->
  <div class="modal" id="modal_docente_kardex" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal_docente_kardex-dialog" class="modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal_docente_kardex-header" class="modal-header bg-info">
                  <h5 id="modal_docente_kardex-title" class="modal-title text-white"></h5>
                  <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal_docente_kardex-body" class="">

              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>
  </div>

  <!-- modal_docente_externo_pre_grado -->
  <div class="modal" id="modal_docente_externo_pre_grado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal_docente_externo_pre_grado-dialog" class="modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal_docente_externo_pre_grado-header" class="modal-header bg-color-psg">
                  <h5 id="modal_docente_externo_pre_grado-title" class="modal-title text-white"></h5>
                  <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal_docente_externo_pre_grado-body" class="modal-body">
              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>

  <!-- modal_ejercicio_docencia_posgrado -->
  <div class="modal" id="modal_ejercicio_docencia_posgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal_ejercicio_docencia_posgrado-dialog" class="modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal_ejercicio_docencia_posgrado-header" class="modal-header bg-color-psg">
                  <h5 id="modal_ejercicio_docencia_posgrado-title" class="modal-title text-white"></h5>
                  <button id="modal_ejercicio_docencia_posgrado-close" type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal_ejercicio_docencia_posgrado-body" class="modal-body">
              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>

  <!-- modal_ejercicio_coordinacion_posgrado -->
  <div class="modal" id="modal_ejercicio_coordinacion_posgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal_ejercicio_coordinacion_posgrado-dialog" class="modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal_ejercicio_coordinacion_posgrado-header" class="modal-header bg-color-psg">
                  <h5 id="modal_ejercicio_coordinacion_posgrado-title" class="modal-title text-white"></h5>
                  <button id="modal_ejercicio_coordinacion_posgrado-close" type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal_ejercicio_coordinacion_posgrado-body" class="modal-body">
              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>

  <!-- modal_campos_capacitacion_persona -->
  <div class="modal" id="modal_campos_capacitacion_persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal_campos_capacitacion_persona-dialog" class="modal-dialog-centered modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal_campos_capacitacion_persona-header" class="modal-header bg-color-psg">
                  <h5 id="modal_campos_capacitacion_persona-title" class="modal-title text-white"></h5>
                  <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal_campos_capacitacion_persona-body" class="modal-body">
              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>

  <!-- modal_campos_idioma_persona -->
  <div class="modal" id="modal_campos_idioma_persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal_campos_idioma_persona-dialog" class="modal-dialog-centered modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal_campos_idioma_persona-header" class="modal-header bg-color-psg">
                  <h5 id="modal_campos_idioma_persona-title" class="modal-title text-white"></h5>
                  <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal_campos_idioma_persona-body" class="modal-body">
              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>

  <!-- modal_campos_produccion_intelectual_persona -->
  <div class="modal" id="modal_campos_produccion_intelectual_persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
      <div id="modal_campos_produccion_intelectual_persona-dialog" class="modal-dialog-centered modal-dialog" role="document">
          <div class="modal-content">
              <div id="modal_campos_produccion_intelectual_persona-header" class="modal-header bg-color-psg">
                  <h5 id="modal_campos_produccion_intelectual_persona-title" class="modal-title text-white"></h5>
                  <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="modal_campos_produccion_intelectual_persona-body" class="modal-body">
              </div>
              <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
          </div>
      </div>
  </div>