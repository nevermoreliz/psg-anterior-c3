/** @format */
/** */
$(document).ready(function () {
	var tabla_listar_personas = $('#tabla_listar_personas')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			language: {
				url: '/assets/plugins/datatables/Spanish.json',
			},
			ajax: '/persona/ajax_listar_personas',
			dom: "<row<B>><'row'<'col-md-9'l><'col-sm-12 col-md-3'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [
				{
					title: 'Universidad Pública de El Alto',
					titteAttr: 'Universidad Pública de El Alto',
					extend: 'pdf',
					orientation: 'landscape',
					className: 'btn-sm btn-success',
					text: '<i class="fa fa-file-pdf-o"></i> <u>P</u>DF',
					pageSize: 'LETTER',
					exportOptions: {
						modifier: {
							page: 'current',
						},
					},
					key: {
						key: 'p',
						altKey: true,
					},
					exportOptions: {
						columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					},
				},
				{
					extend: 'copy',
					className: 'btn-sm btn-success',
					text: '<i class="fa fa-copy"></i> <u>C</u>OPIAR',
					exportOptions: {
						modifier: {
							page: 'current',
						},
					},
					key: {
						key: 'c',
						altKey: true,
					},
					exportOptions: {
						columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					},
				},
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
				{
					title: 'Reporte Planificación Programas',
					extend: 'print',
					className: 'btn-sm btn-success',
					text: 'IMPRIMIR',
					text: '<i class="fa fa-print"></i> <u>I</u>MPRIMIR',
					key: {
						key: 'i',
						altKey: true,
					},
					exportOptions: {
						columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					},
				},
			],

			columnDefs: [
				{
					searchable: false,
					orderable: false,
					visible: true,
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						return (
							`<div class="btn-group"> <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Acción </button> <div class="dropdown-menu animated flipInY" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;"> ` +
							`<a class="dropdown-item small" data-value="` +
							data[4] +
							`" id="editar_persona"><i class="mdi mdi-tooltip-edit"></i> Editar Persona</a> <a class="dropdown-item small" data-value="` +
							data[4] +
							`" data-id-persona="` +
							data[0] +
							`" id="respaldo_digital"><i class="fa fa-save"></i> Respaldo Digital</a> <a class="dropdown-item small" data-value="` +
							data[4] +
							`" data-id-persona="` +
							data[0] +
							`" id="imprimir_tenencia"><i class="fa fa-print"></i> Imprimir Tenencia</a> </div> </div>`
						);
					},
				},
			],
		})
		.on('click', '#editar_persona', function (event) {
			$.ajax({
				method: 'POST',
				url: '/persona/campos_datos_personales',
				data: {
					ci: event.target.getAttribute('data-value').trim(),
				},
				dataType: 'html',
			}).done(function (response) {
				parametrosModal('#modal', 'Actualizar Datos', 'modal-lg', false, true);
				$('#modal-body').html(response);
			});
		})
		.on('click', '#respaldo_digital', function (event) {
			$.ajax({
				method: 'POST',
				url: '/archivo_digital',
				data: {
					ci: event.target.getAttribute('data-value').trim(),
					id_persona: event.target.getAttribute('data-id-persona').trim(),
				},
				dataType: 'html',
			}).done(function (response) {
				parametrosModal('#modal', 'Respaldos Digitales', 'modal-lg', false, true);
				$('#modal-body').html(response);
			});
		})
		.on('click', '#imprimir_tenencia', function (event) {
			$.ajax({
				method: 'post',
				url: '/archivo_digital/archivo_digital_imprimir',
				data: {
					ci: event.target.getAttribute('data-value').trim(),
					id_persona: event.target.getAttribute('data-id-persona').trim(),
				},
			}).done(function (response) {
				parametrosModal('#reporte', 'Imprimir Respaldos Digitales', 'modal-xl', true, true);
				$('#representar_reporte').attr('src', response);
			});
		});
});
