<script>
    /** validacion pasar al js modal_interesado sale errores de consola no existe
     *  la funciones ,iCheck,TouchSpin,bootstrapSwitch eliminarlos para que no salga
     *  errores por consola
     */
    // !function(window, document, $) {
    //     "use strict";
    //     $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
    //         checkboxClass: "icheckbox_square-green",
    //         radioClass: "iradio_square-green"
    //     }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
    // }(window, document, jQuery);
</script>



<div class="card">

    <div class="card-body">
        <div id="navpills-2" class="tab-pane">

            <?= form_open('', array('id' => 'form_modal_interesado', 'novalidate' => 'true')); ?>
            <input type="hidden" id="idp" name="idp" value="<?= $id_publicacion ?>">

            <div class="row">


                <div class="col-md-7 m-b-20">


                    <div class="alert alert-warning"> <i class="ti-info-alt"> </i> SE ENVIARA INFORMACION A SU CORREO O NUMERO DE WHATSAPP: COSTOS, REQUISITOS. <b><u><?= $denominacion ?></u></b></div>


                    <div class="form-group">
                        <h5>Correo Electronico <span class="text-info">(Opcional)</span></h5>
                        <div class="controls">
                            <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com" data-validation-email-message="La dirección de email no es válida"> </div>
                    </div>

                    <div class="form-group">
                        <h5>Nro. Celular<span class="text-danger"> *</span></h5>
                        <div class="controls">
                            <input type="text" name="celular" id="celular" class="form-control telefono-inputmask" minlength="8" maxlength="8" required data-validation-required-message="Este campo es requerido" data-validation-minlength-message="Demasiado corto: Mínimo de '8' caracteres" data-validation-maxlength-message="Demasiado largo: Máximo de '8' caracteres"></div>
                        <div class="form-control-feedback">
                            <small>
                                <i>Ingrese solo numeros</i>
                            </small>
                        </div>
                    </div>


                    <div class="text-xs-right ">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-6 m-b-10">
                                <button type="submit" id="btn_insertar_interesado" class="btn btn-rounded btn-info btn-block">Enviar</button>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-6 m-b-10">
                                <button type="reset" class="btn btn-rounded btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-md-5">


                    <div class="alert alert-info"> <i class="fa fa-facebook-square"></i> Facebook</div>


                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v8.0" nonce="bTbVoYVl"></script>
                    <div style="width: auto;">
                        <div class="fb-page" data-href="https://www.facebook.com/Estudia-En-Posgrado-UPEA-128794501288356" data-width="380" data-hide-cover="true" data-show-facepile="true"></div>
                    </div>

                    <br>
                    <div class="alert alert-success"> <i class="fa fa-whatsapp"></i> Whatsapp</div>

                    <br>
                    <div class="alert alert-danger"> <i class="fa fa-youtube-play"></i> Youtube</div>
                    <div style="width: 100%;">
                        <script src="https://apis.google.com/js/platform.js"></script>

                        <div class="g-ytsubscribe" data-channelid="UCk9-wr2u8t1Kc-5B3Cvp45Q" data-layout="full" data-count="default"></div>
                    </div>


                </div>

            </div>

            <?= form_close() ?>
        </div>

    </div>
</div>