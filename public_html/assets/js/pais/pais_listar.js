$(document).ready(function () {
	var table = $('#tbl-paises')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			autoWidth: true,
			searching: true,
			language: {
				url: '/assets/plugins/datatables/Spanish.json',
			},
			ajax: '/pais/pais_listar_ajax',
			columnDefs: [
				{
					visible: true,
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						return (
							`<div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu animated flipInY">
                        <a class="dropdown-item editar" data-id-pais="` +
							data[0] +
							`" href="#">Editar</a>
                        <a class="dropdown-item eliminar" data-id-pais="` +
							data[0] +
							`" href="#">Eliminar</a>
                    </div>
                </div>`
						);
					},
				},
			],
			// order: [[2, 'asc']],
			// displayLength: 25,
		})
		.on('click', 'a.editar', function (event) {
			var botonFormulario = $('button[type=submit]', $('#frm-pais'));
			botonFormulario.html('Actualizar Pais');
			botonFormulario.attr('id', 'actualizar-pais');
			$.post('/pais/pais_editar', { id_pais: $(this).attr('data-id-pais') })
				.done(function (data) {
					if (typeof data.exito !== 'undefined') {
						parametrosModal('#pais', 'Editar Pais', '', false, 'static');
						$("[name='nombre_pais']").val(data.datos.nombre_pais);
						$("[name='abreviatura']").val(data.datos.abreviatura);
						$("[name='nacionalidad']").val(data.datos.nacionalidad);
						botonFormulario.attr('data-id-pais', data.datos.id_pais);
					} else {
						alertaSimple('ERROR', data.error, 'top-right', 'error', 3000);
					}
				})
				.fail(function (jqXHR, textStatus) {
					alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
					console.log(jqXHR.responseText);
				});
		})
		.on('click', 'a.eliminar', function (event) {
			id_pais = $(this).attr('data-id-pais');
			swal(
				{
					title: '¿Esta seguro de eliminar el Pais?',
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
						'/pais/pais_eliminar',
						{ id_pais },
						function (respuesta) {
							if (typeof respuesta.exito !== 'undefined') {
								$('#tbl-paises').DataTable().draw();
								swal('INFORMACIÓN', respuesta.exito, 'success');
							} else {
								swal('INFORMACIÓN', respuesta.error, 'error');
							}
						},
						'json'
					);
				}
			);
		});
	$('#agregar-pais').on('click', function () {
		limpiarCampos();
		parametrosModal('#pais', 'Agregar Pais', '', false, 'static');
		var botonFormulario = $('button[type=submit]', $('#frm-pais'));
		botonFormulario.html('Insertar Pais');
		botonFormulario.attr('id', 'insertar-pais');
	});
	$('#frm-pais').on('submit', function (event) {
		event.preventDefault();
		var botonFormulario = $('button[type=submit]', $('#frm-pais'));
		if ($(botonFormulario).attr('id') == 'actualizar-pais') {
			insertarActualizarPais('/pais/pais_actualizar', botonFormulario);
		} else if ($(botonFormulario).attr('id') == 'insertar-pais') {
			insertarActualizarPais('/pais/pais_insertar', botonFormulario);
		}
	});
});

function insertarActualizarPais(url, botonFormulario) {
	var frmDatos = new FormData($('#frm-pais')[0]);
	if ($(botonFormulario).attr('id') == 'actualizar-pais') {
		frmDatos.append('id_pais', $(botonFormulario).attr('data-id-pais'));
	}
	$.ajax({
		type: 'post',
		url: url,
		data: frmDatos,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		dataType: 'json',
	}).done(function (respuesta) {
		if (typeof respuesta.exito !== 'undefined') {
			alertaSimple('INFORMACION', respuesta.exito, 'top-right', 'info', 3000);
			$('#pais').modal('hide');
			$('#tbl-paises').DataTable().draw();
		} else alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 3000);
	});
	limpiarCampos();
}

function limpiarCampos() {
	$('input').each(function () {
		$(this).val('');
	});
}
