$(document).ready(function () {

    ! function (window, document, $) {
        "use strict";
        $("input,select,textarea,label").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input"), $(".touchspin"), $(".switchBootstrap");
    }(window, document, jQuery);

    $('.email-inputmask').inputmask({
            mask: '*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]',
            greedy: !1,
            onBeforePaste: function (n, a) {
                return (e = e.toLowerCase()).replace('mailto:', '');
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                    cardinality: 1,
                    casing: 'lower',
                },
            },
        }),
        $('.telefono-inputmask').inputmask('9{1,10}'),
        $('.telefono-celular-inputmask').inputmask('9{1,8}'),
        $('.numeros-inputmask').inputmask('9{1,50}'),
        $('.texto-espacio-inputmask').inputmask({
            mask: '*{1,24}[ *{1,25}]',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[A-Za-záéíóúàèìòùÁÉÍÓÚÀÈÌÒÙ]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        }),
        $('.texto-varios-espacios-inputmask').inputmask({
            mask: '*{1,24}[ *{1,25}][ *{1,25}][ *{1,25}][ *{1,25}][ *{1,25}][ *{1,25}]',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[A-Za-záéíóúàèìòùÁÉÍÓÚÀÈÌÒÙ]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        }),
        $('.texto-inputmask').inputmask({
            mask: '*{1,50}',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[A-Za-záéíóúàèìòùÁÉÍÓÚÀÈÌÒÙ]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        }),
        $('.ci-inputmask').inputmask({
            mask: '9{1,8}[-*{1,2}]',
            greedy: false,
            definitions: {
                '*': {
                    validator: '[0-9A-Za-z]',
                    cardinality: 1,
                    casing: 'upper',
                },
            },
        });

    $('#form_inscripcion_online').on('click', '.btn_usuario_cancelar_inscripcion', function () {
        swal({
                title: '¿Esta seguro de cancelar la Inscripción?',
                // text: 'Este cambio no podrá ser revertido',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                closeOnConfirm: false,
            },
            function () {
                eliminarCookie('id_publicacion');
                location.href = window.location.origin + '/principal';
            }
        );



    });


});