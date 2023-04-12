$(document).ready(function () {
    // $.get('/assets/puglins/jquery/jquery.min.js');
    // alert('aea');
    $('#btn_modificar_inscripcion').click(function () {

        // alert($('#btn_modificar_inscripcion').attr('data-codigo-programa'));
        // alert('asdf');

        agregarCookie('id_publicacion', $('#btn_modificar_inscripcion').attr('data-codigo-programa'), 2);

        // alert(retornarCookie('id_programa'))

        if (retornarCookie('id_publicacion')) {
            $.post('/admin_posgraduante/marketing_deposito_bancario_agregar', {
                    id_programa: retornarCookie('id_programa')
                })
                .done(function (respuesta) {
                    if (typeof respuesta.exito !== 'undefined' && respuesta.exito === 'agregar') {
                        $('.psg-contenedor').hide(0).html(respuesta.vista.final_output).fadeIn('slow');

                        // crud('/principal/marketing_deposito_bancario_insertar', window.location.origin + '/admin_marketing/campos_mis_programas');
                        crud('/admin_posgraduante/marketing_deposito_bancario_insertar', '/admin_posgraduante/campos_mis_programas');

                    } else if (typeof respuesta.exito !== 'undefined' && respuesta.exito === 'editar') {

                        $('.psg-contenedor').hide(0).html(respuesta.vista.final_output).fadeIn('slow');
                        alertaSimple('INFORMACIÓN', respuesta.mensaje, 'top-right', 'info', 8000);
                        // crud('/principal/marketing_deposito_bancario_actualizar', window.location.origin + '/admin_marketing/campos_mis_programas');

                        crud('/admin_posgraduante/marketing_deposito_bancario_actualizar', '/admin_posgraduante/campos_mis_programas');

                        $('#mostrar_img_dep_matricula').attr('src', respuesta.datos.DEPOSITO_MATRICULA.ruta_archivo);
                        $('[name="nro_deposito_matricula"]').val(respuesta.datos.numero_deposito_matricula);
                        $('[name="fecha_deposito_matricula"]').val(respuesta.datos.fecha_deposito_matricula);

                        if (respuesta.datos.DEPOSITO_CUOTA_INICIAL !== null) {
                            $('#mostrar_img_dep_cuota_ini').attr('src', respuesta.datos.DEPOSITO_CUOTA_INICIAL.ruta_archivo);
                        }

                        $('[name="nro_deposito_cuota_ini"]').val(respuesta.datos.numero_deposito_cuota_inicial);
                        $('[name="fecha_deposito_cuota_ini"]').val(respuesta.datos.fecha_deposito_inicial);

                    } else {
                        alertaSimple('ALERTA', respuesta.error, 'top-right', 'warning', 6000);
                    }
                })
                .fail(function (jqXHR, textStatus) {
                    alert('posgrado');

                    alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'warning', 3000);
                    console.log(jqXHR.responseText);
                });
        }
    })

    $('#btn_observacion_inscripcion').click(function () {
        console.log($('#btn_observacion_inscripcion').attr('data-codigo-programa'));
        $.ajax({
                type: 'POST',
                url: '/admin_posgraduante/observaciones_participante',
                // data: new FormData($('#form_promocion_red_social')[0]),
                data: {
                    id_publicacion: $(this).attr('data-codigo-programa'),
                    id_persona: $(this).attr('data-id-persona'),
                    id_planificacion_programa: $(this).attr('data-id-planificacion-programa'),
                },
                dataType: 'json',

            })
            .done(function (respuesta) {
                console.log(respuesta.datos.observacion_inscripcion);
                if (typeof respuesta.exito !== 'undefined') {

                    swal({
                            html: true,
                            title: 'TUS OBSERVACIONES',
                            text: 'Son las Siguientes :</br>' + respuesta.datos.observacion_inscripcion + '<br> Presione en el botón "ir a corregir"',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ir a corregir',
                            cancelButtonText: 'Cancelar',
                            closeOnConfirm: true,
                        },
                        function () {
                            agregarCookie('id_publicacion', $('#btn_observacion_inscripcion').attr('data-codigo-programa'), 2);

                            // alert(retornarCookie('id_programa'))

                            if (retornarCookie('id_publicacion')) {
                                $.post('/admin_posgraduante/marketing_deposito_bancario_agregar', {
                                        id_programa: retornarCookie('id_programa')
                                    })
                                    .done(function (respuesta) {
                                        if (typeof respuesta.exito !== 'undefined' && respuesta.exito === 'agregar') {
                                            $('.psg-contenedor').hide(0).html(respuesta.vista.final_output).fadeIn('slow');

                                            // crud('/principal/marketing_deposito_bancario_insertar', window.location.origin + '/admin_marketing/campos_mis_programas');
                                            crud('/admin_posgraduante/marketing_deposito_bancario_insertar', '/admin_posgraduante/campos_mis_programas');

                                        } else if (typeof respuesta.exito !== 'undefined' && respuesta.exito === 'editar') {

                                            $('.psg-contenedor').hide(0).html(respuesta.vista.final_output).fadeIn('slow');
                                            alertaSimple('INFORMACIÓN', respuesta.mensaje, 'top-right', 'info', 8000);
                                            // crud('/principal/marketing_deposito_bancario_actualizar', window.location.origin + '/admin_marketing/campos_mis_programas');

                                            crud('/admin_posgraduante/marketing_deposito_bancario_actualizar', '/admin_posgraduante/campos_mis_programas');

                                            $('#mostrar_img_dep_matricula').attr('src', respuesta.datos.DEPOSITO_MATRICULA.ruta_archivo);
                                            $('[name="nro_deposito_matricula"]').val(respuesta.datos.numero_deposito_matricula);
                                            $('[name="fecha_deposito_matricula"]').val(respuesta.datos.fecha_deposito_matricula);

                                            if (respuesta.datos.DEPOSITO_CUOTA_INICIAL !== null) {
                                                $('#mostrar_img_dep_cuota_ini').attr('src', respuesta.datos.DEPOSITO_CUOTA_INICIAL.ruta_archivo);
                                            }

                                            $('[name="nro_deposito_cuota_ini"]').val(respuesta.datos.numero_deposito_cuota_inicial);
                                            $('[name="fecha_deposito_cuota_ini"]').val(respuesta.datos.fecha_deposito_inicial);

                                        } else {
                                            alertaSimple('ALERTA', respuesta.error, 'top-right', 'warning', 6000);
                                        }
                                    })
                                    .fail(function (jqXHR, textStatus) {
                                        alert('posgrado');

                                        alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'warning', 3000);
                                        console.log(jqXHR.responseText);
                                    });
                            }
                        }
                    );




                } else {
                    // mostrar una alerta para los campos vacios con warning
                    alertaSimple('Campos Obligatorios', respuesta.error, 'top-right', 'warning', 6000);
                }
            })
            .fail(function (jqXHR, textStatus) {
                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                console.log(jqXHR.responseText);
            });

        // parametrosModal(
        //     /* id del modal al que se desa llamar */
        //     '#modal_listar_programas_participantes',
        //     /* inserte un titulo */
        //     'Observaciones del programa',
        //     /* insertar un tamaño al modal [modal-lg, modal-sm] */
        //     'modal-lg',
        //     /* true si desea que la tecla escape cierre el Modal */
        //     false,
        //     /* true si desea que el modal solo se cierre con botones */
        //     'static'
        // );


    });

});

function crud(url, destino) {
    $('#form_inscripcion_online').on('submit', function (e) {
        e.preventDefault();
        bootbox.confirm({
            title: `<img src = "../../assets/images/posgrado_imagen/c_upea.png" style = "width: 150px;"?>`,
            message: `
			<div class="row">
			<div class="col-12">
				<div class="">
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
								<div class="col-md-6 col-sm-12 p-20">
								<h3 class="card-title ">Datos del Participante</h3>
								<hr>
									<div class="list-group">
										<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
											<div class="d-flex w-100 justify-content-between">
												<h5 class="mb-1">Nombre Completo :</h5>
											</div>
											<p class="mb-1">` + $('[name="nombre_completo_usuario"]').val() + `</p>
										</a>
									</div>
								</div>						
							</div>

							<div class="row">
								<div class=" col-md-12 col-sm-12 p-20">
									<h3 class="card-title ">Datos del Dep&oacute;sito Bancario</h3>
									<hr style=" margin: 0; ">
									<div class="row">
										<div class="">
											<div class="card-body">

												<div class="row">
													<div class="col-lg-6 col-md-3" style="height: 100%;">
														<div class="zoom-gallery ">

															<div id="imagen_deposito_matricula"></div>

														</div>
													</div>

													<div class="col-lg-6 col-md-9" style="height: 200px;">
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
																		<p class="mb-1">` + $('[name="nro_deposito_matricula"]').val() + `</p>
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
													<div class="col-lg-6 col-md-3" style="height: 100%;">
														<div class="zoom-gallery ">

															<div id="imagen_deposito_cuota_inicial"></div>

														</div>
													</div>

													<div class="col-lg-6 col-md-9" style="height: 200px;">
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
																		<p class="mb-1">` + $('[name="nro_deposito_cuota_ini"]').val() + `</p>
																	</a>

																	<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
																		<div class="d-flex w-100 justify-content-between">
																			<h5 class="mb-1">Fecha Dep&oacute;sito :</h5>
																		</div>
																		<p class="mb-1">` + $('[name="fecha_deposito_cuota_ini"]').val() + `</p>
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
		</div>

				
			`,
            centerVertical: true,
            animate: false,
            size: 'lg',
            buttons: {
                confirm: {
                    label: '<i class="fa fa-check-circle-o"></i> Confirmar e Inscribirme ',
                    className: 'btn btn-rounded btn-block btn-info btn-sm',
                },
                cancel: {
                    label: '<i class="fa fa-times-circle-o"></i> Modificar',
                    className: 'btn btn-rounded btn-block btn-warning btn-sm',
                },
            },
            callback: function (result) {
                if (result) {
                    $.ajax({
                            type: 'post',
                            url: url,
                            data: new FormData($('#form_inscripcion_online')[0]),
                            processData: false,
                            contentType: false,
                            cache: false,
                            async: false,
                            dataType: 'json',
                        })
                        .done(function (respuesta) {
                            if (typeof respuesta.exito !== 'undefined') {

                                swal('INFORMACIÓN!', respuesta.exito, 'success');
                                alertaSimple('INFORMACIÓN', 'Inscripción Completada Exitosamente', 'top-right', 'info', 8000);

                                setTimeout(function () {
                                    // location.href = destino;
                                    $.ajax({
                                        url: destino,
                                        dataType: 'html',
                                    }).done(function (respuesta) {
                                        $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
                                    });
                                }, 2000);
                            } else {
                                alertaSimple('ALERTA', respuesta.error, 'top-right', 'warning', 10000);
                            }
                        })
                        .fail(function (jqXHR, textStatus) {

                            alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'warning', 3000);
                            console.log(jqXHR.responseText);
                        });
                }
            },
        });
        $('#mostrar_img_dep_matricula').clone(true, true).appendTo('#imagen_deposito_matricula');
        $('#mostrar_img_dep_cuota_ini').clone(true, true).appendTo('#imagen_deposito_cuota_inicial');

        // llevar a la pocision top del modal
        $('.bootbox-confirm').animate({
            scrollTop: $(".modal-header").offset().top - 250
        }, 1000);
    });
    $('#fecha_deposito_matricula, #fecha_deposito_cuota_ini').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        maxDate: new Date(),
        autoclose: true,
    });
    $('#img_dep_matricula').on('change', function (e) {
        document.getElementById('mostrar_img_dep_matricula').src = window.URL.createObjectURL(this.files[0]);
        var fileName = e.target.files[0].name;
        var cadena = fileName.length;

        if (cadena < 19) {
            $(this).next('.custom-file-label').html(fileName);
        } else {
            var valor = fileName.substr(0, 20);
            $(this)
                .next('.custom-file-label')
                .html(valor + '....');
        }
    });
    $('#img_dep_cuota_ini').on('change', function (e) {
        document.getElementById('mostrar_img_dep_cuota_ini').src = window.URL.createObjectURL(this.files[0]);
        var fileName = e.target.files[0].name;
        var cadena = fileName.length;

        if (cadena < 19) {
            $(this).next('.custom-file-label').html(fileName);
        } else {
            var valor = fileName.substr(0, 20);
            $(this)
                .next('.custom-file-label')
                .html(valor + '....');
        }
    });
}