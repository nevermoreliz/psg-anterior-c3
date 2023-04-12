<!-- <input type="text" ci="repetir_ci" name="repetir_ci">
<button type="button" class="btn btn-sm btn-info" ci="verificar_ci" name="verificar_cis"><i class="fa fa-pencil"></i> ENVIAR</button> -->
<!-- hola
 -->
<form id="form_confirmacion" name="form_confirmacion" method="POST" action="<?= base_url('marketing/inscripcion_programa/' . $id_publicacion) ?>">
    <form id="form_confirmacion" name="form_confirmacion" method="POST" novalidate>
        <input type="hidden" id="ci" name="ci" value="<?= $ci ?>">
        <input type="hidden" id="id_publicacion" name="id_publicacion" value="<?= $id_publicacion ?>">

        <h3 class="card-title text-center"> POR FAVOR, VUELVE A ESCRIBIR TU <b><u>NÚMERO DE CARNET DE IDENTIDAD</u></b> </h3>
        <hr>
        <div class="d-flex justify-content-center" oncopy="return false" onpaste="return false">
            <div class="row p-t-0">
                <div class="col-lg-12 col-xl-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label">Carnet de Identidad<span class="text-danger"> *</span></label>
                        <div class="controls">
                            <div class="row">
                                <div class="col-lg-6 col-xl-6 col-md-12">
                                    <input type="text" name="repetir_ci" id="repetir_ci" class="form-control ci-inputmask text-uppercase" maxlength="8" minlength="5" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '8' caracteres" data-validation-minlength-message="Demasiado corto: Minimo de '5' caracteres" autocomplete="off">
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-12">
                                    <button type="submit" id="enviar" name="enviar" class="btn btn-info"><i class="fa fa-plus"></i> Confirmar</button>
                                </div>
                            </div>
                        </div>
                        <!-- <small class="form-control-feedback"> This is inline help </small> -->
                    </div>
                </div>

                <!-- <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="form-group">
                <label class="control-label">Fecha Nacimiento<span class="text-danger"> *</span></label>
                <div class="controls">
                    <div class="row">
                        <div class="col-lg-8 col-xl-8 col-md-12">
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control texto-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" autocomplete="off">
                        </div>

                        <div class="col-lg-3 col-xl-3 col-md-12">
                            <button type="submit" id="revision" name="revision" class="btn btn-info"><i class="fa fa-plus"></i> Inscribirme</button>
                        </div>
                    </div>
                </div>
                <small class="form-control-feedback"> This is inline help </small>
            </div>
        </div> -->
            </div>
        </div>

    </form>

    <!-- Modal -->
    <div class="modal" id="confirmar_datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
        <div id="confirmar_datos-dialog" class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="confirmar_datos-header" class="modal-header bg-color-psg">
                    <h5 id="confirmar_datos-title" class="modal-title font-weight-bold text-white"></h5>
                    <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="confirmar_datos-body" class="modal-body">
                </div>
                <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
            </div>
        </div>
    </div>

    <script>
        // // modal-backdrop show
        // $('.bootbox-confirm').on('shown.bs.modal', function() {
        //     // $('#myInput').trigger('focus')
        //     alert('qu');
        // });
    </script>