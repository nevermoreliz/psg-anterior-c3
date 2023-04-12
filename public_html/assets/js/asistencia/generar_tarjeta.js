/** @format */

$(document).ready(function () {
	$('#form_tarjeta_asistencia').on('submit', function (e) {
		e.preventDefault();
		e.stopPropagation();

		/**
		 * Uso : Verificamos por ci
		 * Retorna : JSON  si el usuario esta registrado
		 */
		$.ajax({
			type: 'post',
			url: '/asistencia/verificar_registro_ci',
			data: $('#form_tarjeta_asistencia').serialize(),
			dataType: 'json',
		})
			.done(function (data) {
				var data = $('#ci').val();
				var cargo = $("select[name='cargo']").val();

				$('#tarjeta_pdf').prop('src', window.location.origin + '/asistencia/reporte_tarjeta_asistencia?data=' + data + '&cargo=' + cargo);
				$('#imprimir_tarjeta_modal').modal('show');

				// Limpiamos los campos
				limpiar();
			})
			.fail(function (response) {
				$('#ci').val('');
				$('#ci').focus();
				alertaSimple(
					'Error',
					'<li>No se encuentra registrado en el sistema</li><li> O no tiene un horario asignado!!!</li>',
					'top-right',
					'error',
					4000
				);
			});
	});

	/**
	 * Uso  :   Limpiar los campos de la vista
	 */
	function limpiar() {
		$('#ci').val('');
		$('#cargo').val('');
	}
});
