$(document).ready(function () {
	var tbl_detalle_programa = $('#tbl_detalle_programa').DataTable({
		responsive: true,
		processing: false,
		autoWidth: true,
		searching: false,
		bLengthChange: false,
		ordering: false,
		language: {
			url: '/assets/plugins/datatables/Spanish.json',
		},
		order: [[0, 'asc']],
		dom: 'lftrip',
	});

	$('#tbl_detalle_programa').css('font-size', 10);
	tbl_detalle_programa.columns.adjust().draw();
});
