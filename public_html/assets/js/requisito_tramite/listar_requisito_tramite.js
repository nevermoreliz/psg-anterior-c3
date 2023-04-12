$(document).ready(function () {
	var id_requisito_aux = 0;
	var tabla_listar_requisito_tramite = $('#requisito_tramite')
		.DataTable({
			responsive: false,
			processing: true,
			serverSide: true,
			// scrollY: "400px",
			scrollCollapse: true,
			language: {
				url: '/assets/plugins/datatables/Spanish.json',
			},
			ajax: '/requisito_tramite/listar_requisito',
			dom: "<row<>><'row'<'col-md-9'l><'col-sm-12 col-md-3'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			lengthMenu: [
				[10, 20, 30, 50, 100, -1],
				[10, 20, 30, 50, 100, 'Todo'],
			],
			// buttons: [
			// 	{ extend: 'copy', className: 'btn btn-sm btn-default' },
			// 	{ extend: 'csv', className: 'btn btn-sm btn-default' },
			// 	{ extend: 'excel', className: 'btn btn-sm btn-default' },
			// 	{ extend: 'pdf', className: 'btn btn-sm btn-default' },
			// 	{ extend: 'print', className: 'btn btn-sm btn-default' },
			// ],
			columnDefs: [
				{
					searchable: true,
					orderable: true,
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						id_requisito_aux = data[0];
						var id_tramite = $('input:radio[name=nombre_tramite]:checked').val();
						$.post('/requisito_tramite/verificar_requisito', { id_requisito: data[0], id_tramite: id_tramite }, function (resp) {
							// Linea comentada
							// var resp = JSON.parse(resp);

							if (resp != null) {
								if (resp.estado_requisito_tramite == 'REGISTRADO') {
									$('#md_checkbox_' + data[0]).attr('checked', true);
									if (resp.tipo_requisito != '') {
										$('#md_select_' + data[0] + ' option[value=' + resp.tipo_requisito + '-' + data[0] + ']').attr('selected', true);
									}
								}
							}
						});
						return '<input type="checkbox" name="checkbox_id_requisito" id="md_checkbox_' + data[0] + '" class="chk-col-green" value="' + data[0] + '">' + '<label for="md_checkbox_' + data[0] + '"></label>';
					},
				},
				{
					searchable: true,
					orderable: true,
					targets: 2,
					data: null,
					render: function (data, type, row, meta) {
						return '<select name="select_tipo_requisito" class="form-control custom-select small" id="md_select_' + id_requisito_aux + '">' + '<option value="VACIO-' + id_requisito_aux + '">[ SELECCIONE ]</option>' + '<option value="OBLIGATORIO-' + id_requisito_aux + '">OBLIGATORIO</option>' + '<option value="OPCIONAL-' + id_requisito_aux + '">OPCIONAL</option>' + '</select>';
					},
				},
			],
		})
		.on('click', 'input[name=checkbox_id_requisito]', function (event) {
			var id_requisito = $(this).val();
			var estado = null;
			if ($(this).prop('checked')) {
				estado = true;
			}
			var id_tramite = $('input:radio[name=nombre_tramite]:checked').val();
			$.post('/requisito_tramite/registrar_requisito_tramite', { id_requisito, id_tramite, estado, tipo_requisitos: '' }, function (resp) {});
		})
		.on('change', 'select[name=select_tipo_requisito]', function (event) {
			var tipo_requisito = $(this).val();
			var id_requisito = tipo_requisito.split('-')[1];
			var tipo_requisitos = tipo_requisito.split('-')[0];
			var estado = null;

			if (tipo_requisitos != 'VACIO') {
				estado = true;
				$('#md_checkbox_' + id_requisito).prop('checked', true);
			} else {
				$('#md_checkbox_' + id_requisito).prop('checked', false);
			}
			var id_tramite = $('input:radio[name=nombre_tramite]:checked').val();
			//alert(id_requisito + '--' + id_tramite);
			$.post('/requisito_tramite/registrar_requisito_tramite', { id_requisito, id_tramite, estado, tipo_requisitos }, function (resp) {});
		});
	$('#nuevo_tramite').on('click', function (e) {
		$.ajax({
			url: '/requisito_tramite/nuevo_tramite',
		}).done(function (respuesta) {
			parametrosModal('#modal', 'Insertar un Tramite Nuevo', 'modal-lg', true, true);
			$('#modal-body').html(respuesta);
		});
	});

	$('#tramites')
		.on('input[name=nombre_tramite]')
		.change(function () {
			tabla_listar_requisito_tramite.ajax.url('/requisito_tramite/listar_requisito');
			tabla_listar_requisito_tramite.draw();
		});
	/* .on("input[name=nombre_tramite]").each(function() {
             alert($('input:radio[name=nombre_tramite]:checked').val());
         });*/
});
