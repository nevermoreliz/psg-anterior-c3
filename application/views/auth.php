<?php if (empty($this->session->userdata('id'))) : ?>
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <!-- <img src="<?php echo base_url('assets/images/personas/persona.jpg'); ?>" alt="Nombre" class="profile-pic" /> -->
        <img src="<?= ($usuario['genero'] == "F") ? base_url('img/iconos_avatar/mujer.svg') : base_url('img/iconos_avatar/varon.svg')  ?>" alt="Nombre" class="profile-pic" />
    </a>
    <!-- cambiado el div por aside -->
    <aside class="dropdown-menu dropdown-menu-right scale-up psg-main">
        <ul class="dropdown-user">
            <li>
                <div class="dw-user-box">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4" style="margin: auto;width: auto;">
                            <div class="u-img ">
                                <!-- <img src="<?php echo base_url('assets/images/personas/persona.jpg'); ?>" alt="Nombre" style="border-radius: 100%;"> -->
                                <img src="<?= ($usuario['genero'] == "F") ? base_url('img/iconos_avatar/mujer.svg') : base_url('img/iconos_avatar/varon.svg')  ?>" alt="Nombre" style="border-radius: 100%;">
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-xl-8" style="width: 218px;">
                            <div class="u-text " style="padding-left: 0;">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <?= mb_convert_case($usuario['nombre_completo'], MB_CASE_TITLE, "UTF-8"); ?>
                                        <!-- <p class="text-muted"><?= $usuario['email'] ?></p> -->
                                        <!-- <a class=" link-menu btn btn-rounded btn-info btn-sm" href="<?php echo base_url('/persona/vista_perfil') ?>">Ver Perfil</a> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <a class=" btn btn-rounded btn-info btn-sm" href="javascript:void(0)" id="vista_datos_personales">Ver Perfil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </li>
            <!-- agregado por jhonatan -->

            <li role="separator" class="divider"></li>
            <li><a href="javascript:void(0)" id="vista_formacion_academica"><i class="icon-graduation"></i> Formaci&oacute;n Acad&eacute;mica</a></li>
            <?php if (es(array('SUPERADMIN', 'ADMINISTRADOR', 'COORDINADOR_PROGRAMA', 'DOCENTE_POSGRADO'))) : ?>
                <?php if (es(array('SUPERADMIN', 'ADMINISTRADOR', 'COORDINADOR_PROGRAMA', 'DOCENTE_POSGRADO'))) : ?>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0)" id="vista_ejercicio_docente"><i class="ti-files"></i> Ejercicio Docencia y/o Coordinador</a></li>
                <?php endif ?>
                <li role="separator" class="divider"></li>
                <li><a href="javascript:void(0)" id="vista_datos_bancarios"><i class="ti-credit-card"></i> Datos Bancarios</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="javascript:void(0)" id="vista_afp"><i class="fa fa-bank"></i> AFP</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="javascript:void(0)" id="vista_seguro_medico"><i class="fa fa-ambulance"></i> Seguro Medico</a></li>
            <?php endif ?>

            <!-- fin agregado por jhonatan -->
            <!-- <li role="separator" class="divider"></li>
            <li><a href="javascript:void(0)"><i class="ti-user"></i> Enviar Mensajes</a></li> -->
            <li role="separator" class="divider"></li>
            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Cambiar Contraseña</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i> Salir del Sistema</a></li>
        </ul>

    </aside>

    <!--fin cambiado el div por aside -->
<?php else : ?>
    <div id="modal_login" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Content is Responsive</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-link" data-toggle="modal" data-target="#modal_login"><i class="fa fa-lock"></i> Acceder</button>
<?php endif; ?>