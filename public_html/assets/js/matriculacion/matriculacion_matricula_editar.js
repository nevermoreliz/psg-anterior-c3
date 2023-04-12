$(document).ready(function () {
	$('#fecha_deposito')
		.bootstrapMaterialDatePicker({
			weekStart: 0,
			time: false,
			maxDate: new Date(),
			autoclose: true,
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});
	$('#fecha_matriculacion')
		.bootstrapMaterialDatePicker({
			weekStart: 0,
			time: false,
			maxDate: new Date(),
			autoclose: true,
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});
});
$('.floating-labels .form-control')
	.on('focus blur', function (i) {
		$(this)
			.parents('.form-group')
			.toggleClass('focused', 'focus' === i.type || this.value.length > 0);
	})
	.trigger('blur'),
	$(function () {
		for (
			var i = window.location,
				e = $('ul#sidebarnav a')
					.filter(function () {
						return this.href == i;
					})
					.addClass('active')
					.parent()
					.addClass('active');
			;

		) {
			if (!e.is('li')) break;
			e = e.parent().addClass('in').parent().addClass('active');
		}
	});
