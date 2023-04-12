/** @format */

$(document).ready(function () {

    /**
     * Descripción  : Esta function se encarga de asignar Titúlo, Tamaño, onEscape a un Modal
     * titulo       : Titúlo que desea que poner a su Modal.
     * tamaño		: modal-lg, modal-sm.
     * onEscape     : true si desea que la tecla escape cierre el Modal
     * backdrop     : true si desea que el modal solo se cierre con botones
     */
    function parametrosModal(idModal, titulo, tamano, onEscape, backdrop) {
        $(idModal + "-title").html(titulo);
        $(idModal + "-dialog").addClass(tamano);
        $(idModal).modal({
            backdrop: backdrop,
            keyboard: onEscape,
            focus: false,
            show: true,
        });
    }


    $('.pruebaclick').click(function () {
        $('html').animate({
            scrollTop: ($(".page-titles").offset().top) - 100
        }, 1000);
        // $(elemento).focus();
    });



    $(".btn_mas_info_modal").on("click", function (e) {
        e.preventDefault();

        // console.log(e.currentTarget.firstElementChild.getAttribute('data-denominacion'));
        // var btn_informacion = document.getElementById('btn_informacion');
        $.ajax({
            method: "post",
            url: "/marketing/campos_interesado",
            data: {
                d: $(this).data("denominacion"),
                idp: $(this).data("id")
            },
            dataType: "html",
        }).done(function (data) {

            parametrosModal(
                "#modal",
                "<b>Mas Informaci&oacute;n",
                "modal-lg",
                false,
                true
            );
            $("#modal-body").html(data);
        });
    });

    $("#prueba2").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            method: "post",
            url: "/marketing/campos_compartir",

            dataType: "html",
        }).done(function (data) {
            parametrosModal(
                "#modal-btn-compartir",
                "Comparte la imformacion",
                "modal-lg",
                false,
                true
            );
            $("#modal-btn-compartir-body").html(data);
        });
    });
});