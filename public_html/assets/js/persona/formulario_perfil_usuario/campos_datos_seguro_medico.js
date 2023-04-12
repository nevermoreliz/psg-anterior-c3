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
                .addClass('active');;

        ) {
            if (!e.is('li')) break;
            e = e.parent().addClass('in').parent().addClass('active');
        }
    });
$(document).ready(function () {
    $('#form_vista_perfil_campos_datos_seguro_medico').on('click', '#btn_modificar_vista_perfil_usuario_datos_seguro_medico', function () {
        swal({
                title: 'COMUNICADO',
                text: `Para actualizar los datos de su Seguro Medico, debe ir a nuestra oficina  central ubicado "Of 2, 4to nivel del Edificio Emblemático, Av. Sucre B, esquina Av Juan Pablo II, ciudad de El Alto" y realizar la solicitud.`,
                type: 'info',

                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Aceptar',

                closeOnConfirm: true,
            },

        );
    });
});