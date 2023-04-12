$(document).ready(function () {
    $('.pruebaclick').click(function () {
        $('html').animate({
            scrollTop: ($(".page-titles").offset().top) - 100
        }, 1000);
        // $(elemento).focus();
    });

});