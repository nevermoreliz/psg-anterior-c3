<div class="row">
    <div class="col-12">
        <div class="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 m-b-10">
                        <img style="width: 100%; border-radius: 17px;" src="<?= base_url($imagen_programa->ruta_archivo) ?>" alt="nombre del programa">
                    </div>
                    <div class="col-md-4 m-b-10">
                        <h3 class="card-title text-center">NOMBRE DEL PROGRAMA</h3>
                        <hr>
                        <h6 class="card-subtitle text-center" style="margin: auto;">
                            <a href="javascript:void(0)">
                                <?= $planificacion_programa->nombre_programa ?><br>
                                VERSION - <?= $planificacion_programa->numero_version ?>, <?= $planificacion_programa->gestion_programa ?>, (<?= $planificacion_programa->descripcion_grado_academico ?>, <?= $planificacion_programa->nombre_tipo_programa ?>)<br>
                                <?= $planificacion_programa->nombre_unidad ?>, <?= $planificacion_programa->tipo_unidad ?>, <?= $planificacion_programa->denominacion_sede ?>
                            </a>
                        </h6>
                    </div>
                    <div class="col-md-4 m-b-10">
                        <form id="form_verificacion_inscripcion" name="form_verificacion_inscripcion" method="POST" novalidate="">
                            <h3 class="card-title text-center">ESCRIBE EL NÚMERO DE CARNET</h3>
                            <hr>

                            <div class="d-flex justify-content-center">
                                <div class="row p-t-0 d-flex justify-content-center">
                                    <div class="col-lg-12 col-xl-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Carnet de Identidad<span class="text-danger"> *</span></label>
                                            <div class="controls">
                                                <div class="row">
                                                    <div class="col-lg-8 col-xl-8 col-md-12">
                                                        <input type="text" name="ci" id="ci" class="form-control ci-inputmask text-uppercase" maxlength="13" minlength="5" required="" data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '8' caracteres" data-validation-minlength-message="Demasiado corto: Minimo de '5' caracteres" autocomplete="off">
                                                    </div>
                                                    <div class="col-lg-4 col-xl-4 col-md-12">
                                                        <select name="expedido" id="expedido" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                            <option value="LP"> LP</option>
                                                            <option value="CH"> CH</option>
                                                            <option value="CB"> CB</option>
                                                            <option value="OR"> OR</option>
                                                            <option value="PT"> PT</option>
                                                            <option value="TJ"> TJ</option>
                                                            <option value="SC"> SC</option>
                                                            <option value="BE"> BE</option>
                                                            <option value="PD"> PD</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="help-block"></div>
                                            </div>
                                            <div class="row p-t-10">
                                                <div class="col-lg-12 col-xl-12 col-md-12">
                                                    <button type="submit" id="revision" name="revision" class="btn btn-info btn-block" data-id-planificacion-programa="<?= $planificacion_programa->id_planificacion_programa ?>">
                                                        <i class="ti-user" style="font-size: 15px;"></i> Verificar
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- <small class="form-control-feedback"> This is inline help </small> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <?= form_open('', ['class' => 'm-t-40', 'id' => 'frm_campos_inscripcion', 'novalidate' => 'true']); ?>

                <h3 class="card-title text-center">DATOS PERSONALES</h3>
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Nombre(s) <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="nombre" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                            <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Paterno <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="paterno" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                            <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Materno <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="materno" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                            <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div> -->
                        </div>
                    </div>
                </div>



                <div class="row">

                    <!--/input genero-->
                    <div class="col-md-4">
                        <div class="form-group has-success">
                            <label class="control-label">Género<span class="text-danger"> *</span></label>
                            <div class="controls">
                                <select name="genero" id="genero" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                    <option value="">
                                        SELECIONE SU GENERO </option>
                                    <option value="M">
                                        MASCULINO</option>
                                    <option value="F">
                                        FEMENINO</option>

                                </select>
                                <div class="help-block"></div>
                            </div>
                            <small class="form-control-feedback"> Seleccione su Género </small>
                        </div>
                    </div>

                    <!--/input fecha nacimiento-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Fecha Nacimiento<span class="text-danger"> *</span></label>

                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="controls">
                                        <select name="diax" id="diax" required="" data-size="6" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                    <small class="form-control-feedback"> Dia </small>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="controls">
                                        <select name="mesx" id="mesx" required="" data-size="6" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                                <?php if ($i < 10) : ?>
                                                    <option value="<?php echo '0' . $i; ?>"><?php echo mes_literal($i); ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $i; ?>"><?php echo mes_literal($i); ?></option>
                                                <?php endif ?>

                                            <?php endfor; ?>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                    <small class="form-control-feedback"> Mes </small>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <div class="controls">
                                        <select name="aniox" id="aniox" required="" data-size="8" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                            <?php for ($i = intval(date('Y') - 10); $i >= 1920; $i--) : ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                    <small class="form-control-feedback"> Año </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group has-success">
                            <label class="control-label">Ciudad donde Vives<span class="text-danger"> *</span></label>
                            <div class="controls">
                                <select name="ciudad_donde_vive" id="ciudad_donde_vive" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                    <option value=""> SELECIONE LA CIUDAD </option>
                                </select>
                                <div class="help-block"></div>
                            </div>
                            <small class="form-control-feedback"> Seleccione su Ciudad </small>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <h5> Lugar de Nacimiento (Como Indica su Carnet)<span class="text-danger"> *</span></h5>
                    <div class="controls">
                        <input type="text" name="lugar_nacimiento" class="form-control" required data-validation-required-message="This field is required">
                    </div>

                </div>

                <div class="form-group">
                    <h5>Direcci&oacute;n donde vive <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="domicilio" class="form-control" required data-validation-required-message="This field is required">
                    </div>

                </div>


                <div class="row">

                    <div class="col-lg-3 col-xl-3 col-md-12">
                        <div class="form-group has-success">
                            <label class="control-label">Nacionalidad<span class="text-danger"> *</span></label>
                            <div class="controls">
                                <select name="id_pais_nacionalidad" id="id_pais_nacionalidad" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                    <option value="">SELECCIONE </option>
                                    <?php foreach ($paises as $key => $value) : ?>
                                        <option value="<?= $value['id_pais'] ?>"><?= $value['nombre_pais'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="help-block"></div>
                            </div>
                            <small class="form-control-feedback"> Seleccione su Nacionalidad </small>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-12 ">
                        <div class="form-group has-success">
                            <label class="control-label">Estado Civil<span class="text-danger"> *</span></label>
                            <div class="controls">
                                <select name="estado_civil" id="estado_civil" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">


                                    <option value="">
                                        SELECCIONE </option>
                                    <option value="SOLTERO">
                                        SOLTERO (A)</option>
                                    <option value="CASADO">
                                        CASADO (A)</option>
                                    <option value="DIVORCIADO">
                                        DIVORCIADO (A)</option>
                                    <option value="VIUDO">
                                        VIUDO (A)</option>
                                    <option value="CONVIVIENTE">
                                        CONVIVIENTE</option>

                                </select>
                                <div class="help-block"></div>
                            </div>
                            <small class="form-control-feedback"> Seleccione su Estado Civil </small>
                        </div>
                    </div>

                    <!--/input ocupacion actual-->
                    <div class="col-lg-6 col-xl-6 col-md-12 ">
                        <div class="form-group has-success">
                            <label class="control-label">Ocupación actual<span class="text-danger"> *</span></label>
                            <div class="controls">
                                <div class="controls">
                                    <input type="text" name="oficio_trabajo" id="oficio_trabajo" class="form-control texto-varios-espacios-inputmask text-uppercase" maxlength="50" required="" data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="">
                                    <div class="help-block"></div>
                                </div>
                                <!-- <small class="form-control-feedback"> This is inline help </small> -->

                                <div class="help-block"></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row p-t-0">
                    <!--/input celular-->
                    <div class="col-lg-2 col-xl-2 col-md-6">
                        <div class="form-group">
                            <label class="control-label">Celular<span class="text-danger"> *</span></label>
                            <div class="controls">
                                <input type="text" name="celular" id="celular" class="form-control telefono-celular-inputmask text-uppercase" maxlength="8" minlength="8" required="" data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '8' caracteres" data-validation-minlength-message="Demasiado corto: Minimo de '8' digitos" autocomplete="off" value="">
                                <div class="help-block"></div>
                            </div>
                            <!-- <small class="form-control-feedback"> This is inline help </small> -->
                        </div>

                    </div>

                    <!--/input telefono-->
                    <div class=" col-lg-3 col-xl-3 col-md-6">
                        <div class="form-group ">
                            <label class="control-label">Teléfono (Opcional)</label>
                            <div class="controls">
                                <input type="text" name="telefono" id="telefono" class="form-control telefono-inputmask text-uppercase" maxlength="50" data-validation-maxlength-message="Demasiado largo: Máximo de '10' caracteres" autocomplete="off" value="">
                                <div class="help-block"></div>
                            </div>
                            <!-- <small class="form-control-feedback"> This field has error. </small> -->
                        </div>
                    </div>

                    <!--/input correo electronico-->
                    <div class="col-lg-7 col-xl-7 col-md-12">
                        <div class="form-group ">
                            <label class="control-label">Correo Electronico<span class="text-danger"> *</span></label>
                            <div class="controls">
                                <input type="text" name="email" id="email" class="form-control email-inputmask " maxlength="50" required="" data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" autocomplete="off" value="">
                                <div class="help-block"></div>
                            </div>
                            <!-- <small class="form-control-feedback"> This field has error. </small> -->
                        </div>
                    </div>

                </div>

                <h3 class="card-title text-center">DATOS DEL DEP&Oacute;SITO BANCARIO</h3>
                <hr>

                <h4 class="card-title">Registre su Depósito de Matrícula Bs. 200.00<span class="text-danger"> *</span></h4>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h5>Numero de Dep&oacute;sito <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="numero_deposito_matricula" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                            <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div> -->
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h5>Fecha de Dep&oacute;sito <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" name="fecha_deposito_matricula" class="form-control fecha_deposito_matricula" required data-validation-required-message="This field is required">
                            </div>
                            <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div> -->
                        </div>
                    </div>
                </div>

                <h4 class="card-title">Registre su Depósito de Colegiatura (1ra Cuota)<span class="text-info"> (opcional)</span></h4>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h5>Numero de Dep&oacute;sito </h5>
                            <div class="controls">
                                <input type="text" name="numero_deposito_cuota_inicial" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                            <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div> -->
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <h5>Fecha de Dep&oacute;sito </h5>
                            <div class="controls">
                                <input type="date" name="fecha_deposito_inicial" class="form-control fecha_deposito_inicial" required data-validation-required-message="This field is required">
                            </div>
                            <!-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div> -->
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-row-reverse form-actions">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar Inscripción</button>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-rounded btn-block btn-info btn-sm" id="insertar-inscripcion" data-id-planificacion-programa="<?= $planificacion_programa->id_planificacion_programa ?>"><i class="mdi mdi-plus-circle"></i> Inscribir Participante</button>
                    </div>
                </div>

                <!-- <div class="text-xs-right">
                            <button type="submit" class="btn btn-info">Registrar</button>
                            <button type="reset" class="btn btn-inverse">Cancelar</button>
                        </div> -->
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<div class="right-sidebar">
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
                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                </li>
                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                </li>
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