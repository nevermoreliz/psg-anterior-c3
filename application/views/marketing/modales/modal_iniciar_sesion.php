        <!-- <form class="form-horizontal form-material" id="form_iniciar_sesion" method="POST">
            <div class="alert alert-info">
                <h4 class="text-info"><i class="fa fa-exclamation-circle"></i> Usted ya es un usuario antiguo </h4>
                <p class="small">Para continuar con la inscripción proceda a ingresar con su usuario y contraseña</p>
            </div>
            <div class="form-group m-t-40">
                <div class="col-xs-12">
                    <input name="nombre_usuario" class="form-control text-uppercase" type="text" required="" placeholder="Usuario" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input name="clave_usuario" class="form-control" type="password" required="" placeholder="Contraseña">
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-rounded btn-block btn-info" id="autentificar" type="submit">Iniciar Sesión</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>¿No tienes una cuenta? <a href="#" class="text-primary m-l-5"><b>Comunicate con un Administrador de Posgrado</b></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                </div>
            </div>
        </form> -->

        <div class="login-box card">
            <div class="card-body">
                <!-- BLOQUE DE INISIAR SESSION -->
                <form class="form-horizontal form-material" id="form_iniciar_sesion" method="POST">
                    <h3 class="box-title m-b-20">Iniciar Sesi&oacute;n</h3>
                    <div class="alert alert-info">
                        <h4 class="text-info"><i class="fa fa-exclamation-circle"></i> Ya se ha creado tu cuenta anteriormente </h4>
                        <p class="small">Para continuar con la inscripción escribe tu usuario y contraseña.</p>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="nombre_usuario" placeholder="Nombre de Usuario"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="clave_usuario" placeholder="Contrase&ntilde;a"> </div>
                    </div>

                    <!-- <div class="form-group row">
                        <div class="col-md-12 font-14">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right">
                                <i class="fa fa-lock m-r-5"></i> Recuperar Contrase&ntilde;a</a>
                        </div>
                    </div> -->

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="autentificar" type="submit">Iniciar Sesi&oacute;n</button>
                        </div>
                    </div>

                </form>

                <!-- BLOQUE DE RECUPERAR CONTRASENIA -->
                <form class="form-horizontal" id="recoverform" action="http://themedesigner.in/demo/admin-press/horizontal/index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recuperar contrase&ntilde;a</h3>
                            <p class="text-muted">Ingrese su correo electrónico con el que registro su cuenta de usuario y se le enviarán las instrucciones. </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Correo Electronico"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Recuperar Contrase&ntilde;a</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $('#to-recover').on('click', function() {
                $('#form_iniciar_sesion').slideUp(), $('#recoverform').fadeIn();
            });
        </script>