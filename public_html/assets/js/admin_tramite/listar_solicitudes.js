/** @format */

$(document).ready(function () {
	var tbl_listar_solicitudes = $('#tbl_listar_solicitudes')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			autoWidth: true,
			searching: true,
			language: {
				url: '/assets/plugins/datatables/Spanish.json',
			},

			order: [[0, 'desc']],
			ajax: '/admin_tramite/ajax_listar_solicitudes/',
			dom: 'ftrip',
			lengthMenu: [
				[10, 20, 30, 50, 100, -1],
				[10, 20, 30, 50, 100, 'Todo'],
			],
			columnDefs: [
				{
					searchable: false,
					orderable: false,
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						return (
							'<div class="btn-group"> <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Acciones </button> <div class="dropdown-menu animated flipInY" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;"> ' +
							'<a class="dropdown-item small" data-value="' +
							data[0] +
							'" id="revisar_requisitos"><i class="fa fa-check-circle-o"></i> Revisar Requisitos</a>' +
							(data[4] != null ? '<a class="dropdown-item small" data-id-solicitud="' + data[0] + '" data-value="' + data[5] + '" id="imprimir_solicitud"><i class="fa fa-print"></i> Imprimir Solicitud</a>' : '') +
							' </div> </div>'
						);
					},
				},
				{
					searchable: false,
					orderable: false,
					data: null,
					targets: 2,
					render: function (data, type, row, meta) {
						return (
							'<span class="badge badge-pill badge-info small">Fecha de Solicitud</span><br>' +
							moment(data[2]).format('D MMMM YYYY, h:mm:ss a') +
							'<br><span class="badge badge-pill badge-warning small">Fecha de Recepción</span><br>' +
							(data[3] === null ? 'Aun no se Recepciono' : moment(data[3]).format('D MMMM YYYY, h:mm:ss a')) +
							'<br><span class="badge badge-pill badge-danger small">Fecha de Entrega</span><br>' +
							(data[4] === null ? 'Aun no se Entrego' : moment(data[4]).format('D MMMM YYYY, h:mm:ss a'))
						);
					},
				},
				{
					searchable: false,
					orderable: false,
					visible: false,
					targets: 3,
				},
				{
					searchable: false,
					orderable: false,
					visible: false,
					targets: 4,
				},
				{
					searchable: false,
					orderable: false,
					visible: false,
					targets: 5,
				},
			],
		})
		.on('click', '#revisar_requisitos', function (event) {
			$.ajax({
				url: '/admin_tramite/revisar_requisitos',
				type: 'post',
				data: { id_solicitud_tramite: $(this).attr('data-value') },
				dataType: 'html',
			}).done(function (respuesta) {
				parametrosModal('#modal', 'Revisar la Solicitud', 'modal-xl', false, false);
				$('#modal-body').html(respuesta);
			});
		})
		.on('click', '#imprimir_solicitud', function (event) {
			var win = window.open(window.location.origin + '/admin_tramite/ReporteFormularioDocente/13692/5', '_blank');
			return;
			$.ajax({
				url: '/admin_tramite/GenerarReporteFormularioDocente',
				type: 'post',
				data: { id_persona: $(this).attr('data-value'), id_solicitud: $(this).attr('data-id-solicitud') },
			}).done(function (respuesta) {});
		});
	$('#tbl_listar_solicitudes').css('font-size', 12);
	tbl_listar_solicitudes.columns.adjust().draw();
});
