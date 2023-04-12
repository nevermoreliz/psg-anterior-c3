$(document).ready(function () {
	var tbl_modulo_programa = $('#tbl_modulo_programa')
		.DataTable({
			responsive: true,
			processing: false,
			searching: false,
			serverSide: true,
			ordering: false,
			language: {
				url: '/assets/plugins/datatables/Spanish.json',
			},
			ajax: {
				url: '/programa/programa_modulo_listar_ajax',
				data: { id_planificacion_programa: $('[name="id_planificacion_programa"]').val() },
			},
			columnDefs: [
				{
					searchable: false,
					orderable: false,
					visible: true,
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						return (
							'<div class="btn-group"> <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Acci&oacute;n </button> <div class="dropdown-menu animated flipInY" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;"> ' +
							'<a class="dropdown-item small" data-value="' +
							data[0] +
							'" id="editar_modulo"><i class="mdi mdi-tooltip-edit"></i> Editar</a><a class="dropdown-item small" data-value="' +
							data[0] +
							'" id="eliminar_modulo"><i class="mdi mdi-delete"></i> Eliminar</a> </div> </div>'
						);
					},
				},
			],
			dom: 'frt',
		})
		.on('click', '#editar_modulo', function (event) {
			// $('#contenedor_modulo').hide().css('visibility', 'hidden');
			$.post(
				'/programa/programa_modulo_editar',
				{ id_modulo_programa: event.target.getAttribute('data-value'), id_planificacion_programa: $('[name="id_planificacion_programa"]').val() },
				function (respuesta) {
					parametrosModal('#modulo-programa', 'EDITANDO EL MODULO DE ' + respuesta.datos.nombre_programa, 'modal-xl', true, 'static');
					$('#modulo-programa-body').html(respuesta.vista);
				},
				'json'
			).fail(function (jqXHR, textStatus) {
				swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
			});
		})
		.on('click', '#eliminar_modulo', function (event) {
			swal(
				{
					title: '¿Esta seguro de eliminar el Modulo?',
					text: 'Este cambio no podrá ser revertido',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'Aceptar',
					cancelButtonText: 'Cancelar',
					closeOnConfirm: false,
				},
				function () {
					$.post(
						'/programa/programa_modulo_eliminar',
						{ id_modulo_programa: event.target.getAttribute('data-value'), estado_modulo_programa: 'ELIMINADO' },
						function (r) {
							if (typeof r.exito !== 'undefined') {
								tbl_modulo_programa.draw();
								swal('INFORMACIÓN', r.exito, 'success');
							} else swal({ html: true, title: 'INFORMACIÓN', text: r.error, type: 'error' });
						},
						'json'
					).fail(function (jqXHR, textStatus) {
						swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
					});
				}
			);
		});
	$('#agregar_modulo').on('click', function (e) {
		// $('#contenedor_modulo').hide().css('visibility', 'hidden');
		$.post('/programa/programa_modulo_agregar', { id_planificacion_programa: $('[name="id_planificacion_programa"]').val() }, function (r) {
			if (typeof r.exito !== 'undefined') {
				parametrosModal('#modulo-programa', 'ADICIONANDO MODULOS A ' + r.datos.nombre_programa, 'modal-xl', true, 'static');
				$('#modulo-programa-body').html(r.vista);
			} else swal('INFORMACIÓN', r.error, 'error');
		}).fail(function (jqXHR, textStatus) {
			swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
		});
	});
});
