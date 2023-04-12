/** @format */

$(document).ready(function () {

    ! function (window, document, $) {
        "use strict";
        $("input,select,textarea,label").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input"), $(".touchspin"), $(".switchBootstrap");
    }(window, document, jQuery);


    // BLOQUE DE VALIDACIONES
    $('.email-inputmask').inputmask({
            mask: '*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]',
            greedy: !1,
            onBeforePaste: function (n, a) {
                return (e = e.toLowerCase()).replace('mailto:', '');
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                    cardinality: 1,
                    casing: 'lower',
                },
            },
        }),
        $('.telefono-inputmask').inputmask('9{1,10}'),
        $('.telefono-celular-inputmask').inputmask('9{1,8}'),
        $('.numeros-inputmask').inputmask('9{1,50}'),
        $('.texto-espacio-inputmask').inputmask({
            mask: '*{1,24}[ *{1,25}]',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[ A-Za-záéíóúñÁÉÍÓÚÑ]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        }),
        $('.texto-varios-espacios-inputmask').inputmask({
            mask: '*{1,24}[ *{1,25}][ *{1,25}][ *{1,25}][ *{1,25}][ *{1,25}][ *{1,25}]',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[A-Za-záéíóúàèìòùÁÉÍÓÚÀÈÌÒÙ]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        }),
        $('.texto-inputmask').inputmask({
            mask: '*{1,50}',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[ A-Za-záéíóúñÁÉÍÓÚÑ]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        }),
        $('.ci-inputmask').inputmask({
            mask: '9{1,15}[-*{1,2}]',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[0-9A-Za-zÑñ]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        });

    $("#ciudad_donde_vive").select2({
        width: '100%',
        allowClear: true,
        multiple: false,
        dropdownParent: $("#ciudad_donde_vive").parent(),
        escapeMarkup: function (m) {
            return m;
        }
    });

    // INICIALIZANDO DATAPIKER EN FECHA DE DEPOSITOS
    $('#fecha_deposito_matricula, #fecha_deposito_inicial').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        maxDate: new Date(),
        autoclose: true,
    });

    /** cuando exista cambios en los botones de tipo file mostrara una previsualizacion del archivo 
     *  y recortar el nombre del archivo si ees muy largo
     */
    $('#img_ci_delante').on("change", function (e) {
        document.getElementById('mostrar_img_ci_delante').src = window.URL.createObjectURL(this.files[0]);
        //obtener el nombre del archivo
        var fileName = e.target.files[0].name;
        var cadena = fileName.length;
        console.log(cadena);

        if (cadena < 19) {
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next(".custom-file-label").html(fileName);
        } else {
            var valor = fileName.substr(0, 20);
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next('.custom-file-label').html(valor + '....');
        }
    });



    $('#img_ci_atras').on("change", function (e) {
        document.getElementById('mostrar_img_ci_atras').src = window.URL.createObjectURL(this.files[0]);
        //obtener el nombre del archivo
        var fileName = e.target.files[0].name;
        var cadena = fileName.length;
        console.log(cadena);

        if (cadena < 19) {
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next(".custom-file-label").html(fileName);
        } else {
            var valor = fileName.substr(0, 20);
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next('.custom-file-label').html(valor + '....');
        }
    });

    $('#img_diploma_academico').on("change", function (e) {
        document.getElementById('mostrar_img_respaldo_diploma_academico').src = window.URL.createObjectURL(this.files[0]);
        //obtener el nombre del archivo
        var fileName = e.target.files[0].name;
        var cadena = fileName.length;
        console.log(cadena);

        if (cadena < 19) {
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next(".custom-file-label").html(fileName);
        } else {
            var valor = fileName.substr(0, 20);
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next('.custom-file-label').html(valor + '....');
        }
    });

    $('#img_dep_matricula').on("change", function (e) {
        document.getElementById('mostrar_img_dep_matricula').src = window.URL.createObjectURL(this.files[0]);
        //obtener el nombre del archivo
        var fileName = e.target.files[0].name;
        var cadena = fileName.length;
        console.log(cadena);

        if (cadena < 19) {
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next(".custom-file-label").html(fileName);
        } else {
            var valor = fileName.substr(0, 20);
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next('.custom-file-label').html(valor + '....');
        }

    });

    $('#img_dep_cuota_ini').on("change", function (e) {
        document.getElementById('mostrar_img_dep_cuota_ini').src = window.URL.createObjectURL(this.files[0]);
        //obtener el nombre del archivo
        var fileName = e.target.files[0].name;
        var cadena = fileName.length;
        console.log(cadena);

        if (cadena < 19) {
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next(".custom-file-label").html(fileName);
        } else {
            var valor = fileName.substr(0, 20);
            // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
            // pondra la del archivo
            $(this).next('.custom-file-label').html(valor + '....');
        }
    });

    /** fin cuando exista cambios en los botones de tipo file mostrara una previsualizacion del archivo */

    /** Notificaciónes de campos vacines formulario de inscripcion en liniea */
    // $("#enviar_inscripcion").click(function () {

    //     let isValid = true;
    //     let errores = [];

    //     if ($('#img_ci_delante').val() == '') {
    //         // alert("img_ci_delante");
    //         // alert("No selecciono una Fotografía o imagen de CI Anverso");
    //         errores.push('Seleccione una Fotografía o imagen de CI Anverso.');
    //         isValid = false;
    //     }

    //     if ($('#img_ci_atras').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("No selecciono una Fotografía o Imagen de CI Reverso");
    //         errores.push('Seleccione una Fotografía o Imagen de CI Reverso.');
    //         isValid = false;
    //     }

    //     if ($('#nombre').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo nombre esta vacio");
    //         errores.push('Escriba su nombre.');
    //         isValid = false;
    //     }

    //     if ($('#paterno').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo paterno esta vacio");
    //         errores.push('Escriba su paterno.');
    //         isValid = false;
    //     }

    //     if ($('#paterno').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo materno esta vacio");
    //         errores.push('Escriba su materno.');
    //         isValid = false;
    //     }

    //     if ($('#genero').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo genero esta vacio");
    //         errores.push('Seleccione su Genero.');
    //         isValid = false;
    //     }

    //     if ($('#fecha_nacimiento').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo fecha nacimiento esta vacio");
    //         errores.push('Escriba su fecha nacimiento.');
    //         isValid = false;
    //     }

    //     if ($('#lugar_nacimiento').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo lugar de nacimiento esta vacio");
    //         errores.push('Escriba su lugar de nacimiento.');
    //         isValid = false;
    //     }

    //     if ($('#ciudad_donde_vive').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo ciudad donde vive esta vacio");
    //         errores.push('Escriba ciudad donde vive.');
    //         isValid = false;
    //     }

    //     if ($('#domicilio').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo  Dirección donde vive esta vacio");
    //         errores.push('Escriba Dirección donde vive.');
    //         isValid = false;
    //     }

    //     if ($('#id_pais_nacionalidad').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo Nacionalidad esta vacio");
    //         errores.push('Seleccione su Nacionalidad.');
    //         isValid = false;
    //     }

    //     if ($('#estado_civil').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo estado civil esta vacio");
    //         errores.push('Seleccione su Estado Civivl.');
    //         isValid = false;
    //     }

    //     if ($('#oficio_trabajo').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo Ocupación actual esta vacio");
    //         errores.push('Escriba su Ocupación actual.');
    //         isValid = false;
    //     }

    //     if ($('#celular').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo celular esta vacio");
    //         errores.push('Escriba su Celular actual.');
    //         isValid = false;
    //     }

    //     if ($('#telefono').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo telefono esta vacio");
    //         errores.push('Escriba su numero de telefono.');
    //         isValid = false;
    //     }

    //     if ($('#email').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo Correo Electronico esta vacio");
    //         errores.push('Escriba su Correo Electronico.');
    //         isValid = false;
    //     }

    //     if ($('#img_diploma_academico').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("No selecciono una Fotografía o imagen de su Diploma Académico");
    //         errores.push('Seleccione una Fotografía o imagen de su Diploma Académico.');
    //         isValid = false;
    //     }

    //     if ($('#numero_deposito_matricula').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo numero_deposito_matricula esta vacio");
    //         errores.push('Escriba su numero deposito matricula.');
    //         isValid = false;
    //     }

    //     if ($('#fecha_deposito_matricula').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo fecha deposito matricula esta vacio");
    //         errores.push('Escriba su fecha deposito matricula.');
    //         isValid = false;
    //     }

    //     if ($('#img_dep_matricula').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("No selecciono una Fotografía o imagen de su Depósito de Matricula");
    //         errores.push('Seleccione una Fotografía o imagen de su Depósito de Matricula.');
    //         isValid = false;
    //     }

    //     if ($('#numero_deposito_cuota_inicial').val() == '') {
    //         // alert("img_ci_atras");
    //         alert("El campo numero deposito cuota inicial esta vacio");
    //         errores.push('Escriba numero deposito cuota inicial.');
    //         isValid = false;
    //     }

    //     if ($('#fecha_deposito_inicial').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("El campo fecha deposito inicial esta vacio");
    //         errores.push('Escriba fecha deposito de la cuota inicial.');
    //         isValid = false;
    //     }

    //     if ($('#img_dep_cuota_ini').val() == '') {
    //         // alert("img_ci_atras");
    //         // alert("No selecciono una Fotografía o imagen de su Depósito de la cuota inicial");
    //         errores.push('Seleccione una Fotografía o imagen de su Depósito de la cuota inicial.');
    //         isValid = false;
    //     }

    // if (isValid === false) {
    //     alertar_errores(errores);
    //     return false;
    // }

    // });

    $('#aniox, #mesx, #diax').change(function () {
        let diax = $('#diax').val();
        let mesx = $('#mesx').val();
        let aniox = $('#aniox').val();
        let error = false;
        let hoy = new Date();
        if ((mesx == 4 || mesx == 6 || mesx == 9 || mesx == 11) && diax == 31) {
            // alert("El mes " + mesx + " no tiene 31 días!");
            swal('Información!', 'El mes ' + mesx + ' no tiene 31 días!', 'info');
            error = true;
        }
        if (mesx == 2) {
            var bisiesto = aniox % 4 == 0 && (aniox % 100 != 0 || aniox % 400 == 0);
            if (diax > 29 || (diax == 29 && !bisiesto)) {
                // alert("Febrero del " + aniox + " no contiene " + diax + " dias!");
                swal('Información!', 'Febrero del ' + aniox + ' no contiene ' + diax + ' dias!', 'info');

                error = true;
            }
        }
        if (error === false) {
            let fecha_nacimiento = aniox + '/' + mesx + '/' + diax;
            if (new Date(fecha_nacimiento).getTime() > hoy.getTime()) {
                // alert('La fecha no es válida, porque supera el día de hoy.');
                swal('Información!', 'La fecha no es válida, porque supera el día de hoy.', 'info');
                error = true;
            }
        }
    });

    $("#enviar_inscripcion").click(function () {

        var validar_input = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 17, 18, 19, 20, 21];
        $(':input:not([type=hidden]),select').each(function (indice, elemento) {
            var valor = $(elemento).val();
            // console.log('El elemento con el índice ' + indice + ' contiene ' + $(elemento).val());
            if ($.inArray(indice, validar_input) != -1) {
                return focus(valor, elemento);
                // if (valor.trim() == "") {
                //     $('html').animate({
                //         scrollTop: ($(elemento).offset().top) - 145
                //     }, 1000);
                //     $(elemento).focus();

                //     return false;
                // }
            }

        });
    })

    function focus(valor, elemento) {
        if (valor.trim() == "") {
            // console.log('El elemento con el índice--- ' + indice + ' contiene ' + valor);
            $('html').animate({
                scrollTop: ($(elemento).offset().top) - 145
            }, 1000);
            $(elemento).focus();

            return false;
        }
    }

    $('#btn_inscripcion').click(function (e) {
        e.preventDefault();

        // console.log(e.currentTarget.firstElementChild.getAttribute('data-denominacion'));
        // var btn_informacion = document.getElementById('btn_informacion');
        $.ajax({
            method: "post",
            url: "/marketing/campos_interesado",
            data: {
                d: $(this).data("denominacion"),
                idp: $(this).data("id")
            },
            dataType: "html",
        }).done(function (data) {
            parametrosModal(
                "#detalle_programa",
                "<b>Mas Informaci&oacute;n",
                "modal-lg",
                false,
                'static'
            );
            $("#detalle_programa-body").html(data);
        });
    })

    $('#form_inscripcion_online').on('submit', function (e) {

        e.preventDefault();

        bootbox.confirm({
            title: `<img src = "../../assets/images/posgrado_imagen/c_upea.png" style = "width: 150px;"?>`,
            message: `

            <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="alert alert-success text-center">
                                <h4 class="pulse animated infinite"> SI LOS SIGUIENTES DATOS ESTÁN CORRECTOS, PRESIONE "CONFIRMAR E INSCRIBIRME" A <strong><u>
                                ` + $('[name="descripcion_programa_cliente"]').val() + `
                                 EN 
                                ` + $('[name="nombre_programa_cliente"]').val() + `
                                 </u></strong></h4>
                            </div>
                            <div class="row">
                                <div class=" col-md-12 col-sm-12 p-20">
                                    <h3 class="card-title ">C&eacute;dula de Indentidad</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-9">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                                                            <div id="slimtest1" style="overflow: hidden; width: auto; ">

                                                                <div class="list-group">
                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1 text-white">Comprobante CI. Anverso :</h5>
                                                                        </div>
                                                                    </a>

                                                                    <div class="zoom-gallery ">

                                                                        <div id="imagen_ci_anverso"></div>
                                                                       
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-9">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; ">
                                                            <div id="slimtest1" style="overflow: hidden; width: auto;">

                                                                <div class="list-group">
                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1 text-white">Comprobante CI. Reverso :</h5>
                                                                        </div>
                                                                    </a>

                                                                    <div class="zoom-gallery ">
                                                                        <div id="imagen_ci_reverso"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-9">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                            <div id="slimtest1" style="overflow: hidden; width: auto; height: 250px;">
                                                                <div class="list-group">

                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1">Numero de carnet :</h5>
                                                                        </div>
                                                                        <p class="mb-1">
                                                                        ` + $('[name="ci"]').val() + `
                                                                        </p>
                                                                    </a>

                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">

                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1">Expedido :</h5>
                                                                        </div>
                                                                        <p class="mb-1">` + $('[name="expedido"]').val() + `</p>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title ">Datos personales</h3>
                            <hr>
                            <div class="row">

                                <div class="col-md-4 col-sm-12 p-20">
                                    <div class="list-group">

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Nombre Completo :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="nombre"]').val() + ` ` + $('[name="paterno"]').val() + ` ` + $('[name="materno"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Genero :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="genero"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Fecha Nacimiento :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="fecha_nacimiento"]').val() + `</p>
                                        </a>


                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Lugar de Nacimiento :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="lugar_nacimiento"]').val() + `</p>
                                        </a>

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 p-20">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Ciudad donde vive :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="ciudad_donde_vive"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Dirección donde Vive :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="domicilio"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Nacionalidad :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="id_pais_nacionalidad"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Estado Civil :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="estado_civil"]').val() + `</p>
                                        </a>

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 p-20">
                                    <div class="list-group">

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Ocupación actual :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="oficio_trabajo"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Celular :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="celular"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Teléfono :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="telefono"]').val() + `</p>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Correo Electronico :</h5>
                                            </div>
                                            <p class="mb-1">` + $('[name="email"]').val() + `</p>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-4 col-sm-12 p-20">
                                    <h3 class="card-title ">Datos Acad&eacute;micos</h3>
                                    <hr>
                                    <div class="list-group">

                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1 text-white">Comprobante Diploma Académico :</h5>
                                            </div>
                                        </a>

                                        <div class="zoom-gallery ">

                                            <div id="imagen_diploma_academico"></div>

                                        </div>
                                    </div>
                                </div>

                                <div class=" col-md-8 col-sm-12 p-20">
                                    <h3 class="card-title ">Datos del Dep&oacute;sito Bancario</h3>
                                    <hr style=" margin: 0; ">
                                    <div class="row">
                                        <div class="">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-3">
                                                        <div class="zoom-gallery ">
                                                            
                                                            <div id="imagen_deposito_matricula"></div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-9">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                            <div id="slimtest1" style="overflow: hidden; width: auto; height: 250px;">

                                                                <div class="list-group">
                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1 text-white">Comprobante Dep&oacute;sito matricula :</h5>
                                                                        </div>
                                                                    </a>

                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1">Numero Dep&oacute;sito :</h5>
                                                                        </div>
                                                                        <p class="mb-1">` + $('[name="numero_deposito_matricula"]').val() + `</p>
                                                                    </a>

                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1">Fecha Dep&oacute;sito :</h5>
                                                                        </div>
                                                                        <p class="mb-1">` + $('[name="fecha_deposito_matricula"]').val() + `</p>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row m-t-10">
                                                    <div class="col-lg-6 col-md-3">
                                                        <div class="zoom-gallery ">
                                                        
                                                            <div id="imagen_deposito_cuota_inicial"></div>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-9">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                            <div id="slimtest1" style="overflow: hidden; width: auto; height: 250px;">
                                                                <div class="list-group">

                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1 text-white">Comprobante Dep&oacute;sito 1er. cuota :</h5>
                                                                        </div>
                                                                    </a>

                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1">Numero Dep&oacute;sito :</h5>
                                                                        </div>
                                                                        <p class="mb-1">` + $('[name="numero_deposito_cuota_inicial"]').val() + `</p>
                                                                    </a>

                                                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1">Fecha Dep&oacute;sito :</h5>
                                                                        </div>
                                                                        <p class="mb-1">` + $('[name="fecha_deposito_inicial"]').val() + `</p>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`,
            centerVertical: true,
            animate: false,
            size: 'xl',
            buttons: {
                confirm: {
                    label: '<i class="fa fa-check-circle-o"></i> Confirmar e Inscribirme',
                    className: 'btn btn-rounded btn-block btn-info btn-sm ',


                },
                cancel: {
                    label: '<i class="fa fa-times-circle-o"></i> Modificar',
                    className: 'btn btn-rounded btn-block btn-warning btn-sm',
                },
            },
            callback: function (result) {


                // onClick="document.getElementById(this.id).disabled=true;"
                $('.aea').attr('disabled', 'disabled')
                if (result) {
                    $.ajax({
                            type: 'POST',
                            url: '/marketing/insertar_campos_preinscripcion',
                            data: new FormData($('#form_inscripcion_online')[0]),
                            processData: false,
                            contentType: false,
                            cache: false,
                            async: false,
                            dataType: 'json'
                        })
                        .done(function (data) {
                            // $('#modal').modal('hide');
                            // window.open(window.location.origin, '_blank');
                            // window.open('https://sweetalert.js.org/guides/#advanced-examples', '_blank');
                            // swal({
                            //     title: "Inscripcion Enviada",
                            //     text: "Se redireccionara a las instrucciones para resivir su usuario y contraseña",
                            //     icon: "success",
                            //     button: "Continuar",
                            //   });

                            // setTimeout(function () {window.location.href = window.location.origin},5000);
                            // setTimeout(function () {window.open('/marketing/vista_mensaje', '_blank');},1000);

                            if (typeof data.exito !== 'undefined') {

                                swal({
                                        title: "Inscripción Realizada",
                                        text: "continuar para redireccionar a las instrucciones",
                                        icon: "success",
                                        buttons: 'continuar',
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {

                                        // setTimeout(function () {
                                        //     window.location.href = window.location.origin
                                        // }, 5000);
                                        // setTimeout(function () {
                                        // window.location.href = window.location.origin + '/marketing/vista_mensaje'
                                        // window.open('/marketing/vista_mensaje', '_blank');
                                        // }, 1000);
                                        // window.location.href = window.location.origin + '/marketing/vista_mensaje/?id_persona=' + $('#ci').val() + '&id_planificacion_programa=' + $('#id_planificacion_programa').val();

                                        $.ajax({
                                            url: '/marketing/vista_mensaje/',
                                            data: {
                                                id_planificacion_programa: $('#id_planificacion_programa').val(),
                                                ci_persona: $('#ci').val(),
                                            },
                                            type: 'post',
                                            // dataType: 'html',
                                        }).done(function (respuesta) {
                                            console.log(respuesta.id_persona);
                                            // window.location.href = window.location.origin + '/marketing/instrucciones_posgraduante/?id_persona=' + respuesta.id_persona + '&id_planificacion_programa=' + respuesta.id_planificacion_programa;

                                            window.location.href = window.location.origin + '/marketing/instrucciones_posgraduante/?token=' + respuesta.id_persona + '&key=' + respuesta.id_planificacion_programa;
                                            // $('.psg-contenedor').hide(0).html(respuesta.vista).fadeIn('slow');
                                        });

                                    });
                            } else {
                                // alert('entro .done por else');
                                alertaSimple('ADVERTENCIA', data.error, 'top-right', 'warning', 9000);
                            }

                        })
                        .fail(function (jqXHR, textStatus) {
                            // alert('entro en .fail');
                            alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                            console.log(jqXHR.responseText);
                        });
                }
            },
        });
        $('#mostrar_img_dep_matricula').clone(true, true).appendTo('#imagen_deposito_matricula');
        $('#mostrar_img_dep_cuota_ini').clone(true, true).appendTo('#imagen_deposito_cuota_inicial');

        $('#mostrar_img_ci_delante').clone(true, true).appendTo('#imagen_ci_anverso');
        $('#mostrar_img_ci_atras').clone(true, true).appendTo('#imagen_ci_reverso');
        $('#mostrar_img_respaldo_diploma_academico').clone(true, true).appendTo('#imagen_diploma_academico');

        // llevar a la pocision top del modal
        $('.bootbox-confirm').animate({
            scrollTop: $(".modal-content").offset().top
        }, 1000);


    });


    //pequenio formulario para verificar los datos para inscripcion de un nuevo 
    // $('#revision').on('click', function (e) {
    $('#form_verificacion_inscripcion').on('submit', function (e) {
        e.preventDefault();
        var formulario = document.getElementById("form_verificacion_inscripcion");
        $.ajax({
            url: '/marketing/form_validacion',
            type: 'post',
            data: {
                ci: $('[name="ci"]').val(),
                id_publicacion: $('[name="id_pub"]').val(),
                descripcion_grado_academico: $('[name="descripcion_grado_academico"]').val(),
                nombre_tipo_programa: $('[name="nombre_tipo_programa"]').val(),
            },
            dataType: 'html',
        }).done(function (respuesta) {
            parametrosModal(
                /* id del modal al que se desa llamar */
                '#detalle_programa',
                /* inserte un titulo */
                '',
                /* insertar un tamaño al modal [modal-lg, modal-sm] */
                'modal-lg',
                /* true si desea que la tecla escape cierre el Modal */
                false,
                /* true si desea que el modal solo se cierre con botones o "static"= para no evitar que cierre el modal */
                'static'
            );

            $('#detalle_programa-body').html(respuesta);
            $('#repetir_ci').focus();
        });
    });

    /**Inicializando para bloquear comandos de pegar y copiar */
    $("#ci").on('paste', function (e) {
        $("#ci").val('');
        e.preventDefault();
        // alert('Esta acción está prohibida');

    });
});


// formmas de enviar formualrio
// var formulario = document.getElementById("form_verificacion_inscripcion");
//  formulario.submit();