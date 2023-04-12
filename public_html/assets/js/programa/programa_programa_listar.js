$(document).ready(function () {
	window.onbeforeunload = function (e) {
		// $.get('/programa/multimedia_eliminar',function(){
		eliminarCookie('ids_multimedia');
		eliminarCookie('programa_tipo_actualizacion');
		// });
	};

	var grupo = undefined;
	$.get('/auth/ajax_es_autentificado', function (r) {
		grupo = typeof r.exito.grupo !== 'undefined' ? (grupo = r.exito.grupo) : (grupo = undefined);

		var controladorTiempo = 0;
		var tbl_listar_programas = $('#tbl_listar_programas')
			.DataTable({
				responsive: true,
				processing: true,
				serverSide: true,
				autoWidth: true,
				searching: false,
				bLengthChange: false,
				language: {
					url: '/assets/plugins/datatables/Spanish.json',
				},
				// columns: [null, null, null, null, { width: 44 }, null, null, null, null, null, null, null],
				columnDefs: [
					{
						searchable: true,
						orderable: true,
						targets: 0,
						data: null,
						render: function (data, type, row, meta) {
							return data[0];
						},
					},
					{
						searchable: false,
						orderable: false,
						targets: 1,
						data: null,
						render: function (data, type, row, meta) {
							return (
								'<div class="btn-group"> <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Acción </button> <div class="dropdown-menu animated flipInY" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">' +
								(['SUPERADMIN', 'ADMINISTRADOR', 'TECNICO_CEFORPI', 'TECNICO_FINANCIERO', 'TECNICO_PROGRAMAS'].includes(grupo) ? '<a class="dropdown-item small" data-value="' + data[0] + '" id="actualizar_programa"><i class="mdi mdi-tooltip-edit"></i> Editar Programa</a>' : '') +
								'<a class="dropdown-item small" data-value="' +
								data[0] +
								'" id="adicionar_modulos"><i class="mdi mdi-plus-circle-outline"></i> Modulos del Programa</a>' +
								(['SUPERADMIN', 'TECNICO_CEFORPI'].includes(grupo) ? '<a class="dropdown-item small" data-value="' + data[0] + '" id="siguiente_version"><i class="fa fa-sign-in"></i> Crear Sig. Version</a>' : '') +
								'<a class="dropdown-item small" data-value="' +
								data[0] +
								'" id="detalle_programa"><i class="mdi mdi-table"></i> Modulos Asignados</a>' +
								(['SUPERADMIN', 'TECNICO_CEFORPI'].includes(grupo) ? '<a class="dropdown-item small" data-value="' + data[0] + '" id="imprimir_formulario_marketing"><i class="fa fa-print"></i> Imprimir Formulario de Marketing</a>' : '') +
								'<a class="dropdown-item small" data-value="' +
								data[0] +
								'" id="imprimir_modulos"><i class="fa fa-print"></i> Imprimir Modulos</a>' +
								'<a class="dropdown-item small" data-value="' +
								data[0] +
								'" id="imprimir_matriculados"><i class="fa fa-print"></i> Imprimir Matriculados</a>' +
								(['SUPERADMIN', 'TECNICO_CEFORPI'].includes(grupo) ? '<a class="dropdown-item small" data-value="' + data[0] + '" id="eliminar_programa"><i class="fa fa-times-circle-o"></i> Eliminar Programa</a>' : '') +
								'</div> </div>'
							);
						},
					},
					{
						targets: 2,
						data: null,
						orderable: false,
						render: function (data, type, row, meta) {
							return data[1];
						},
					},
					{
						targets: 3,
						data: null,
						orderable: false,
						render: function (data, type, row, meta) {
							return data[2] + '<br> ' + data[3];
						},
					},
					{
						targets: 4,
						data: null,
						orderable: false,
						width: 32,
						render: function (data, type, row, meta) {
							return data[4] + ' <br><span class="badge label-light-warning">Matricula ' + data[15] + ' - Colegiatura ' + data[14] + '</span><br><span class="badge label-light-danger">Coordinador ' + data[17] + ' - Docente ' + data[16] + '</span>';
						},
					},
					{
						orderable: false,
						targets: 5,
						data: null,
						render: function (data, type, row, meta) {
							return data[5];
						},
					},
					{
						targets: 6,
						orderable: false,
						data: null,
						render: function (data, type, row, meta) {
							return data[6] + '<br><span class="badge label-light-danger">Sede ' + data[7] + '</span>';
						},
					},
					{
						targets: 7,
						orderable: false,
						data: null,
						render: function (data, type, row, meta) {
							return (data[8] !== null ? '<span class="badge label-light-info" title="Fecha inicio del Programa">' + data[8] + '</span>' : '') + '<br>' + (data[10] !== null ? '<span class="badge label-light-warning" title="Fecha registro del Programa">' + data[10] + '</span>' : '') + '<br>' + (data[9] !== null ? '<span class="badge label-light-danger" title="Fecha fin del Programa">' + data[9] + '</span>' : '');
						},
					},
					{
						targets: 8,
						orderable: false,
						data: null,
						render: function (data, type, row, meta) {
							return data[18];
						},
					},
					{
						targets: 9,
						orderable: false,
						data: null,
						render: function (data, type, row, meta) {
							return data[12];
						},
					},
					{
						targets: 10,
						orderable: false,
						data: null,
						render: function (data, type, row, meta) {
							return data[11];
						},
					},
					{
						targets: 11,
						orderable: false,
						data: null,
						render: function (data, type, row, meta) {
							return data[13];
						},
					},
				],
				order: [[0, 'desc']],
				ajax: '/programa/programa_programa_listar_ajax/',
				// dom: "<row<>><'row'<'col-md-9'B><'col-sm-12 col-md-3'l>>" + "<'row'<'col-sm-12 col-md-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
				// lengthMenu: [
				// 	[10, 20, 30, 50, 100, -1],
				// 	[10, 20, 30, 50, 100, 'Todo'],
				// ],
				buttons: [
					// {
					// 	extend: 'copy',
					// 	className: 'btn-sm btn-success',
					// 	text: '<i class="fa fa-copy"></i> <u>C</u>OPIAR',
					// 	exportOptions: {
					// 		modifier: {
					// 			page: 'current',
					// 		},
					// 	},
					// 	key: {
					// 		key: 'c',
					// 		altKey: true,
					// 	},
					// 	exportOptions: {
					// 		columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					// 	},
					// },
					{
						extend: 'excel',
						className: 'btn-sm btn-success',
						text: '<i class="fa fa-file-excel-o"></i> EXCE<u>L</u>',
						exportOptions: {
							modifier: {
								page: 'current',
							},
						},
						key: {
							key: 'l',
							altKey: true,
						},
						exportOptions: {
							columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
						},
					},
					// {
					// 	title: 'Reporte Planificación Programas',
					// 	extend: 'print',
					// 	className: 'btn-sm btn-success',
					// 	text: 'IMPRIMIR',
					// 	text: '<i class="fa fa-print"></i> <u>I</u>MPRIMIR',
					// 	key: {
					// 		key: 'i',
					// 		altKey: true,
					// 	},
					// 	exportOptions: {
					// 		columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					// 	},
					// },
				],
			})
			.on('click', '#actualizar_programa', function (event) {
				$.post('/programa/programa_programa_editar', { id_planificacion_programa: event.target.getAttribute('data-value') }).done(function (r) {
					if (typeof r.exito !== 'undefined') {
						parametrosModal('#modal', r.datos.descripcion_grado_academico + ' ' + r.datos.nombre_programa + ' ' + r.datos.numero_version, 'modal-xl', true, 'static');
						$('#modal-body').html(r.vista);

						if (r.datos.estado_programa == 'REGISTRADO') {
							if (['SUPERADMIN', 'ADMINISTRADOR'].includes(grupo)) {
							} else if (['TECNICO_CEFORPI'].includes(grupo)) {
								bloquear_inputs(
									'#form_planificacion_programa',
									['input', 'textarea', 'select'],
									['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa'],
									['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
									true,
									true
								);
							} else if (['TECNICO_FINANCIERO'].includes(grupo)) {
								bloquear_inputs(
									'#form_planificacion_programa',
									['input', 'textarea', 'select'],
									['id_planificacion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio'],
									['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
									true,
									true
								);
							} else if (['TECNICO_PROGRAMAS'].includes(grupo)) {
								bloquear_inputs(
									'#form_planificacion_programa',
									['input', 'textarea', 'select'],
									['id_planificacion_programa', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
									['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
									true,
									true
								);
							}
						} else if (r.datos.estado_programa == 'APROBADO') {
							if (['TECNICO_FINANCIERO'].includes(grupo)) {
								if (esVacio(r.datos.haber_basico_docente) || esVacio(r.datos.haber_basico_coordinador) || esVacio(r.datos.haber_basico_coloquio)) {
									bloquear_inputs(
										'#form_planificacion_programa',
										['input', 'textarea', 'select'],
										['id_planificacion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio'],
										['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
										true,
										true
									);
								} else {
									bloquear_inputs(
										'#form_planificacion_programa',
										['input', 'textarea', 'select'],
										[],
										['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
										true,
										true
									);
									// e = $('#actualizar_planificacion_programa');
									// e.attr('disabled', 'disabled');
									// e.removeAttr('id');
									eliminar_inputs('#form_planificacion_programa', ['button'], [], ['actualizar_planificacion_programa']);
								}
							} else if (['TECNICO_PROGRAMAS'].includes(grupo)) {
								if (r.datos.numero_partida_ceub || r.datos.numero_folio_ceub || r.datos.fecha_registro_ceub) {
									bloquear_inputs(
										'#form_planificacion_programa',
										['input', 'textarea', 'select'],
										[],
										['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub']
									);
									eliminar_inputs('#form_planificacion_programa', ['button'], [], ['actualizar_planificacion_programa']);
								} else {
									bloquear_inputs(
										'#form_planificacion_programa',
										['input', 'textarea', 'select'],
										['id_planificacion_programa', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
										['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub']
									);
								}
							} else if (['SUPERADMIN', 'ADMINISTRADOR'].includes(grupo)) {
								// if (!(r.datos.numero_partida_ceub || r.datos.numero_folio_ceub || r.datos.fecha_registro_ceub) && !(r.datos.haber_basico_docente || r.datos.haber_basico_coordinador || r.datos.haber_basico_coloquio)) {
								// 	bloquear_inputs(
								// 		'#form_planificacion_programa',
								// 		['input', 'textarea', 'select'],
								// 		['id_planificacion_programa', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio'],
								// 		['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
								// 		true,
								// 		true
								// 	);
								// } else if (!(r.datos.haber_basico_docente || r.datos.haber_basico_coordinador || r.datos.haber_basico_coloquio)) {
								// 	bloquear_inputs(
								// 		'#form_planificacion_programa',
								// 		['input', 'textarea', 'select'],
								// 		['id_planificacion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio'],
								// 		['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
								// 		true,
								// 		true
								// 	);
								// } else if (!(r.datos.numero_partida_ceub || r.datos.numero_folio_ceub || r.datos.fecha_registro_ceub)) {
								// 	bloquear_inputs(
								// 		'#form_planificacion_programa',
								// 		['input', 'textarea', 'select'],
								// 		['id_planificacion_programa', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
								// 		['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
								// 		true,
								// 		true
								// 	);
								// } else {
								// 	bloquear_inputs(
								// 		'#form_planificacion_programa',
								// 		['input', 'textarea', 'select'],
								// 		[],
								// 		['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub']
								// 	);
								// 	eliminar_inputs('#form_planificacion_programa', ['button'], [], ['actualizar_planificacion_programa']);
								// }
							} else if (['TECNICO_CEFORPI'].includes(grupo)) {
								bloquear_inputs(
									'#form_planificacion_programa',
									['input', 'textarea', 'select'],
									[],
									['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub']
								);
								eliminar_inputs('#form_planificacion_programa', ['button'], [], ['actualizar_planificacion_programa']);
							} else {
								bloquear_inputs('#form_planificacion_programa', ['input', 'textarea', 'select'], [], [], true, true);
							}
							alertaSimple('ERROR', 'El Programa esta APROBADO lo que influye que tenga permisos limitados.', 'top-right', 'error', 6000);
						} else {
							bloquear_inputs(
								'#form_planificacion_programa',
								['input', 'textarea', 'select'],
								[],
								['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
								true,
								true
							);
						}
					} else {
						alertaSimple('ERROR', r.error, 'top-right', 'error', 3000);
					}
				});
			})
			.on('click', '#eliminar_programa', function (event) {
				swal(
					{
						title: '¿Esta seguro de eliminar el Programa?',
						text: 'Este cambio no podrá ser revertido',
						type: 'info',
						showCancelButton: true,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Si, Eliminar',
						cancelButtonText: 'Cancelar',
						closeOnConfirm: false,
					},
					function () {
						$.post(
							'/programa/programa_programa_eliminar',
							{ id_planificacion_programa: event.target.getAttribute('data-value') },
							function (r) {
								if (typeof r.exito !== 'undefined') {
									tbl_listar_programas.draw(false);
									swal('INFORMACIÓN', r.exito, 'success');
								} else swal('INFORMACIÓN', r.error, 'error');
							},
							'json'
						).fail(function (jqXHR, textStatus) {
							swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
						});
					}
				);
			})
			.on('click', '#detalle_programa', function (event) {
				$.post(
					'/programa/programa_asignacion_modulo_listar',
					{
						id_planificacion_programa: event.target.getAttribute('data-value'),
					},
					function (r) {
						if (typeof r.exito !== 'undefined') {
							parametrosModal('#modal', 'MODULOS DEL PROGRAMA ' + r.datos.nombre_programa, 'modal-xl', true, 'static');
							$('#modal-body').html(r.vista);
						} else swal('INFORMACIÓN', r.error, 'error');
					},
					'json'
				).fail(function (jqXHR, textStatus) {
					swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
				});
			})
			.on('click', '#adicionar_modulos', function (event) {
				var id_planificacion_programa = event.target.getAttribute('data-value');
				$.post(
					'/programa/programa_modulo_listar',
					{ id_planificacion_programa },
					function (respuesta) {
						if (typeof respuesta.exito !== 'undefined') {
							parametrosModal('#modal', 'MODULOS DE ' + respuesta.datos.nombre_programa, 'modal-xl', true, 'static');
							$('#modal-body').html(respuesta.vista);
						} else if (typeof respuesta.agregar !== 'undefined') {
							swal(
								{
									title: respuesta.agregar.titulo,
									text: respuesta.agregar.mensaje,
									type: 'info',
									showCancelButton: true,
									confirmButtonColor: '#DD6B55',
									confirmButtonText: 'Agregar Modulos',
									cancelButtonText: 'Cancelar',
									closeOnConfirm: true,
								},
								function () {
									$.post('/programa/programa_modulo_agregar', { id_planificacion_programa }, function (r) {
										if (typeof r.exito !== 'undefined') {
											$('#modal-body').html(r.vista);
											parametrosModal('#modal', 'AGREGAR MODULOS A ' + r.datos.nombre_programa, 'modal-xl', true, 'static');
										} else swal('INFORMACIÓN', r.error, 'error');
									}).fail(function (jqXHR, textStatus) {
										swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
									});
								}
							);
						}
					},
					'json'
				);
			})
			.on('click', '#imprimir_modulos', function (event) {
				$.post(
					'/programa/programa_imprimir',
					{ id_planificacion_programa: event.target.getAttribute('data-value'), tipo: 'modulos' },
					function (r) {
						if (typeof r.exito !== 'undefined') {
							parametrosModal('#modal', 'MODULOS DEL PROGRAMA ' + r.datos.nombre_programa, 'modal-xl', false, true);
							$('#modal-body').html('<embed type="application/pdf" src="' + r.pdf + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
						} else swal('INFORMACIÓN', r.error, 'error');
					},
					'json'
				).fail(function (jqXHR, textStatus, errorThrown) {
					swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
				});
			})
			.on('click', '#imprimir_matriculados', function (event) {
				$.post(
					'/programa/programa_imprimir',
					{ id_planificacion_programa: event.target.getAttribute('data-value'), tipo: 'matriculados' },
					function (r) {
						if (typeof r.exito !== 'undefined') {
							parametrosModal('#modal', 'MATRICULADOS DEL PROGRAMA ' + r.datos.nombre_programa, 'modal-xl', false, true);
							$('#modal-body').html('<embed type="application/pdf" src="' + r.pdf + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
						} else swal('INFORMACIÓN', r.error, 'error');
					},
					'json'
				).fail(function (jqXHR, textStatus, errorThrown) {
					swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
				});
			})
			.on('click', '#matriculados_programa', function (e) {
				$.post(
					'/programa/programa_matriculados_listar',
					{ id_planificacion_programa: $(this).attr('data-value') },
					function (r) {
						if (typeof r.exito !== 'undefined') {
							parametrosModal('#modal', 'MATRICULADOS DEL PROGRAMA ' + r.datos.nombre_programa, 'modal-xl', false, true);
							$('#modal-body').html(r.vista);
						} else swal('INFORMACIÓN', r.error, 'error');
					},
					'json'
				).fail(function (jqXHR, textStatus, errorThrown) {
					swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
				});
			})
			.on('click', '#actualizar_ceub', function (event) {
				$.post('/programa/programa_programa_editar', { id_planificacion_programa: event.target.getAttribute('data-value') }).done(function (respuesta) {
					if (typeof respuesta.exito !== 'undefined') {
						parametrosModal('#modal', respuesta.datos.descripcion_grado_academico + ' ' + respuesta.datos.nombre_programa + ' ' + respuesta.datos.numero_version, 'modal-xl', true, 'static');
						$('#modal-body').html(respuesta.vista);
						bloquear_inputs(
							'#form_planificacion_programa',
							['input', 'textarea', 'select'],
							['id_planificacion_programa', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub'],
							['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub']
						);
						$('#actualizar_planificacion_programa').html('<i class="fa fa-edit"></i> Actualizar CEUB');
						// agregarCookie('programa_tipo_actualizacion', 'fin_programa', 2);
					} else alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 3000);
				});
			})
			.on('click', '#siguiente_version', function (event) {
				$.post('/programa/programa_programa_agregar_siguiente', { id_planificacion_programa: event.target.getAttribute('data-value') }).done(function (respuesta) {
					if (typeof respuesta.exito !== 'undefined') {
						parametrosModal('#modal', respuesta.datos.descripcion_grado_academico + ' ' + respuesta.datos.nombre_programa + ' ' + respuesta.datos.numero_version, 'modal-xl', true, 'static');
						$('#modal-body').html(respuesta.vista);
						$('[name="sigla_programa"]').val(generarSigla($('[name="id_grado_academico"] option:selected').text(), $('[name="nombre_programa"]').val(), $('[name="id_tipo_programa"] option:selected').text(), $('[name="numero_version"]').val()));
						$('[name="sigla_programa"]').parent('.form-group').removeClass('is-empty');
						$('[name="sigla_programa"]').parent('.form-group').addClass('focused');
						if (['SUPERADMIN', 'ADMINISTRADOR'].includes(grupo)) {
							bloquear_inputs(
								'#form_planificacion_programa',
								['input', 'textarea', 'select'],
								['id_planificacion_programa', 'id_gestion', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa', 'numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio'],
								['id_planificacion_programa', 'nombre_programa', 'sigla_programa', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version'],
								true,
								true
							);
						} else if (['TECNICO_CEFORPI'].includes(grupo)) {
							bloquear_inputs('#form_planificacion_programa', ['input', 'textarea', 'select'], ['id_planificacion_programa', 'id_gestion', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa'], ['id_planificacion_programa', 'nombre_programa', 'sigla_programa', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version']);
						}

						$('#actualizar_planificacion_programa').attr('id', 'insertar_planificacion_programa');
						$('#insertar_planificacion_programa').html('<i class="mdi mdi-plus-circle"></i> Siguiente Versión');
						agregarCookie('programa_tipo_actualizacion', 'siguiente_version_programa', 2);
					} else alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 3000);
				});
			})
			.on('click', '#imprimir_formulario_marketing', function () {
				$.post('/programa/programa_imprimir', { id_planificacion_programa: $(this).data('value'), tipo: 'formulario_marketing' }, function (r) {
					if (typeof r.exito !== 'undefined') {
						parametrosModal('#modal', 'FORMULARIO DE MARKETING DEL PROGRAMA ' + r.datos.nombre_programa, 'modal-xl', true, 'static');
						$('#modal-body').html('<embed type="application/pdf" src="' + r.pdf + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
					} else swal('INFORMACIÓN', r.error, 'error');
				});
			});

		$('#tbl_listar_programas').css('font-size', 11);
		tbl_listar_programas.columns.adjust().draw();
		function bloquear_inputs(frm, tipos = [':input', ':textarea', ':select'], no_bloquear = [], no_vaciar_datos = [], eliminar_id = false, eliminar_name = false) {
			$(frm)
				.find(tipos.join(','))
				.each(function () {
					if (!no_bloquear.includes($(this).attr('name')) && $(this).attr('name') != undefined) {
						$(this).attr('disabled', true);
					}
					// console.log($(this).attr('name'));
					// console.log(jQuery.inArray($(this).attr('name'), no_vaciar_datos) !== -1);
					// if (!(jQuery.inArray($(this).attr('name'), no_vaciar_datos) !== -1) && $(this).attr('name') != undefined) {
					if (!no_vaciar_datos.includes($(this).attr('name')) && $(this).attr('name') != undefined) {
						$(this).val('');
						$(this).val('').trigger('change');
					}

					if (!no_bloquear.includes($(this).attr('name')) && $(this).attr('name') != undefined) {
						if (eliminar_id) $(this).removeAttr('id');
						if (eliminar_name) $(this).removeAttr('name');
					}

					// var input = $(this);
					// alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
				});
		}
		$('#buscar').keypress(function (e) {
			var code = e.keyCode ? e.keyCode : e.which;
			if (code == 13) {
				tbl_listar_programas.ajax.url('/programa/programa_programa_listar_ajax/?id_gestion=' + $('#id_gestion_cmb').val() + '&id_grado_academico=' + $('#id_grado_academico_cmb').val() + '&id_tipo_programa=' + $('#id_tipo_programa_cmb').val() + '&numero_version=' + $('#version_cmb').val() + '&buscar=' + $('#buscar').val());
				tbl_listar_programas.draw(false);
			}
		});

		$('#page-content')
			.on('change', '#id_gestion_cmb, #id_grado_academico_cmb, #id_tipo_programa_cmb, #version_cmb', function () {
				tbl_listar_programas.ajax.url('/programa/programa_programa_listar_ajax/?id_gestion=' + $('#id_gestion_cmb').val() + '&id_grado_academico=' + $('#id_grado_academico_cmb').val() + '&id_tipo_programa=' + $('#id_tipo_programa_cmb').val() + '&numero_version=' + $('#version_cmb').val() + '&buscar=' + $('#buscar').val());
				tbl_listar_programas.draw(false);
			})
			.on('keyup', '#buscar', function () {
				clearTimeout(controladorTiempo);
				controladorTiempo = setTimeout(recargarProgramas, 1000);
			});

		$('#agregar_programa').on('click', function (e) {
			$.ajax({
				url: '/programa/programa_programa_agregar',
			}).done(function (respuesta) {
				parametrosModal('#modal', 'AGREGAR UN NUEVO PROGRAMA', 'modal-xl', true, 'static');
				if (['SUPERADMIN'].includes(grupo)) {
					$('#modal-body').html(respuesta);
					// agregarCookie('programa_tipo_actualizacion', 'inicio_programa', 2);
				} else if (['TECNICO_CEFORPI'].includes(grupo)) {
					$('#modal-body').html(respuesta);
					// bloquear_inputs('#form_planificacion_programa', ['input', 'textarea', 'select'], ['id_planificacion_programa', 'id_gestion', 'id_unidad', 'id_tipo_programa', 'id_grado_academico', 'numero_version', 'nombre_programa', 'sigla_programa', 'fecha_inicio', 'fecha_fin', 'costo_colegiatura', 'costo_matricula', 'descuento_individual', 'creditaje', 'descripcion_programa'], [], true, true);
					eliminar_inputs('#form_planificacion_programa', ['input', 'textarea', 'select'], ['numero_partida_ceub', 'numero_folio_ceub', 'fecha_registro_ceub', 'haber_basico_docente', 'haber_basico_coordinador', 'haber_basico_coloquio']);
				}
			});
		});
		$('#imprimir_programas').on('click', function (e) {
			$.post('/programa/programa_imprimir', { id_planificacion_programa: 0, tipo: 'programas' }, function (r) {
				if (typeof r.exito !== 'undefined') {
					parametrosModal('#modal', 'REPORTE DE PROGRAMAS ', 'modal-xl', true, 'static');
					$('#modal-body').html('<embed type="application/pdf" src="' + r.pdf + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
				} else swal('INFORMACIÓN', r.error, 'error');
			});
		});

		$('#modal').on('hidden.bs.modal', function () {
			eliminarCookie('programa_tipo_actualizacion');
			$.get('/programa/multimedia_eliminar', function () {
				eliminarCookie('ids_multimedia');
			});
			tbl_listar_programas.draw(false);
			// tbl_listar_programas.ajax.reload(null, false);
		});

		function eliminar_inputs(frm, tipos = [':input', ':textarea', ':select'], eliminar_por_nombre = [], eliminar_por_id = [], elemento_padre = 'div') {
			$(frm)
				.find(tipos.join(','))
				.each(function () {
					if (eliminar_por_nombre.includes($(this).attr('name'))) {
						$(this).parent(elemento_padre).remove();
					}
					if (eliminar_por_id.includes($(this).attr('id'))) {
						$(this).parent(elemento_padre).remove();
					}
				});
		}
		window.esVacio = function (str) {
			return !str || 0 === str.length || Math.round(parseInt(str)) === 0;
		};
		window.generarSigla = function (descripcion_grado_academico, nombre_programa, nombre_tipo_programa, numero_version) {
			switch (descripcion_grado_academico) {
				case 'POST DOCTORADO':
					sigla_programa = 'PPhD';
					break;
				case 'DOCTORADO':
					sigla_programa = 'PhD';
					break;
				case 'MAESTRÍA':
					sigla_programa = 'M';
					break;
				case 'ESPECIALIDAD':
					sigla_programa = 'E';
					break;
				case 'DIPLOMADO':
					sigla_programa = 'D';
					break;
				case 'LICENCIATURA':
					sigla_programa = 'L';
					break;
				case 'TÉCNICO SUPERIOR':
					sigla_programa = 'TS';
					break;
				case 'TÉCNICO MEDIO':
					sigla_programa = 'TM';
					break;
				default:
					sigla_programa = '';
					break;
			}
			$.each(nombre_programa.split(' '), function (index, value) {
				if (jQuery.inArray(value, ['DE', 'CON', 'EN', 'Y', 'PARA', 'LA', 'E', '', 'EL', '-', 'MOD.', 'ESCOLARIZADO', '-VERSION', 'I', 'VERSION', 'NO', 'ESCOLARIADO', 'II', 'V-I']) == -1) {
					if (!isNaN(value)) sigla_programa += value;
					else sigla_programa += value.substr(0, 1);
				}
			});

			sigla_programa += '-' + nombre_tipo_programa.substr(0, 1) + '-' + numero_version;

			return sigla_programa;
		};
		function recargarProgramas() {
			tbl_listar_programas.ajax.url('/programa/programa_programa_listar_ajax/?id_gestion=' + $('#id_gestion_cmb').val() + '&id_grado_academico=' + $('#id_grado_academico_cmb').val() + '&id_tipo_programa=' + $('#id_tipo_programa_cmb').val() + '&numero_version=' + $('#version_cmb').val() + '&buscar=' + $('#buscar').val());
			tbl_listar_programas.draw();
			// $('#buscar').autocomplete({
			// 	params: {
			// 		id_gestion: $('#id_gestion_cmb').val(),
			// 		id_grado_academico: $('#id_grado_academico_cmb').val(),
			// 		id_tipo_programa: $('#id_tipo_programa_cmb').val(),
			// 		numero_version: $('#version_cmb').val(),
			// 	},
			// 	noCache: true,
			// 	serviceUrl: '/programa/programa_programa_listar_ajax_autocompletado/',
			// 	onSelect: function (suggestion) {
			// 		tbl_listar_programas.ajax.url('/programa/programa_programa_listar_ajax/?id_gestion=' + $('#id_gestion_cmb').val() + '&id_grado_academico=' + $('#id_grado_academico_cmb').val() + '&id_tipo_programa=' + $('#id_tipo_programa_cmb').val() + '&numero_version=' + $('#version_cmb').val() + '&buscar=' + $('#buscar').val());
			// 		tbl_listar_programas.draw();
			// 	},
			// 	onSearchComplete: function (query, suggestions) {
			// 		tbl_listar_programas.ajax.url('/programa/programa_programa_listar_ajax/?id_gestion=' + $('#id_gestion_cmb').val() + '&id_grado_academico=' + $('#id_grado_academico_cmb').val() + '&id_tipo_programa=' + $('#id_tipo_programa_cmb').val() + '&numero_version=' + $('#version_cmb').val() + '&buscar=' + $('#buscar').val());
			// 		tbl_listar_programas.draw();
			// 	},
			// });
		}
	});
	function recargarRespaldosPrograma(id_planificacion_programa) {
		$.post('/programa/programa_programa_respaldos_listar1', { id_planificacion_programa }).done(function (respuesta) {
			$('#archivos').html(respuesta);
		});
	}
	$(document).keydown(function (event) {
		if (event.altKey && event.key === 'p') {
			$.post('/programa/programa_imprimir', { id_planificacion_programa: 0, tipo: 'programas' }, function (r) {
				if (typeof r.exito !== 'undefined') {
					parametrosModal('#modal', 'REPORTE DE PROGRAMAS ', 'modal-xl', true, 'static');
					$('#modal-body').html('<embed type="application/pdf" src="' + r.pdf + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
				} else swal('INFORMACIÓN', r.error, 'error');
			});
		}
	});
	$(document).keydown(function (event) {
		if (event.altKey && event.key === 'o') {
			$.post('/programa/programa_imprimir', { id_planificacion_programa: 0, tipo: 'lista_matriculados' }, function (r) {
				if (typeof r.exito !== 'undefined') {
					parametrosModal('#modal', 'REPORTE DE PROGRAMAS ', 'modal-xl', true, 'static');
					$('#modal-body').html('<embed type="application/pdf" src="' + r.pdf + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
				} else swal('INFORMACIÓN', r.error, 'error');
			});
		}
	});
});
