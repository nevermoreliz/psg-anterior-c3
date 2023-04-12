/** @format */

$(document).ready(function () {
	$('.contenedor_respaldos').magnificPopup({
		delegate: '.text-dark',
		type: 'image',
	});

	var tbl_listar_programas = $('#tbl_listar_programas')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			autoWidth: false,
			searching: false,
			language: {
				url: '/assets/plugins/datatables/Spanish.json',
			},
			columns: [
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
					data: null,
					targets: 1,
					render: function (data, type, row, meta) {
						return moment(data[1]).format('D MMMM YYYY, h:mm:ss a');
					},
				},
				{
					searchable: false,
					orderable: false,
					data: null,
					targets: 2,
					render: function (data, type, row, meta) {
						return data[2] === null ? 'Aun no se Recepciono' : moment(data[2]).format('D MMMM YYYY, h:mm:ss a');
					},
				},
				{
					searchable: false,
					orderable: false,
					data: null,
					targets: 3,
					render: function (data, type, row, meta) {
						return data[3] === null ? 'Aun no se Entrego' : moment(data[3]).format('D MMMM YYYY, h:mm:ss a');
					},
				},

				{
					searchable: true,
					orderable: true,
					targets: 4,
					data: null,
					render: function (data, type, row, meta) {
						return data[4];
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 5,
					data: null,
					render: function (data, type, row, meta) {
						return data[5];
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 6,
					data: null,
					render: function (data, type, row, meta) {
						return data[6];
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 7,
					data: null,
					render: function (data, type, row, meta) {
						return data[7];
					},
				},
			],
			order: [[0, 'desc']],
			ajax: '/admin_tramite/ajax_listar_mis_solicitudes/?id_tramite=' + '&id_persona=' + getCookie('id_persona'),
			dom: 'trp',
			lengthMenu: [
				[10, 20, 30, 50, 100, -1],
				[10, 20, 30, 50, 100, 'Todo'],
			],
		})
		.on('click', '#revisar_solicitud', function (event) {
			$.ajax({
				url: '/admin_tramite/revisar_solicitud',
				type: 'post',
				data: { id_solicitud: $(this).attr('data-value') },
				dataType: 'html',
			}).done(function (respuesta) {});
		});
	$('#tbl_listar_programas').css('font-size', 12);
	tbl_listar_programas.columns.adjust().draw();
});
function getCookie(name) {
	const value = `; ${document.cookie}`;
	const parts = value.split(`; ${name}=`);
	if (parts.length === 2) return parts.pop().split(';').shift();
	else return null;
}
