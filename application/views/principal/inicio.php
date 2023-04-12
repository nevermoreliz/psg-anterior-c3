<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> -->
<script type="text/javascript">
    $(document).ready(function() {
        var permiso_1 = [];
        $.get('/auth/ajax_es_autententificado').done(function(respuesta) {
            permiso_1 = respuesta.exito.grupo == false ? false : (respuesta.exito.grupo).split(",");
            // permiso_1 = permiso_1.map(Function.prototype.call, String.prototype.trim)
            // console.log(permiso_1);
            if ($.inArray('POSGRADUANTE', permiso_1) !== -1)
                recargar_por_rol('/marketing/index', 'POSGRADUANTE');
            else if ($.inArray('DOCENTE_POSGRADO', permiso_1) !== -1)
                recargar_por_rol('/principal/index', 'DOCENTE_POSGRADO');
            else if ($.inArray('TECNICO_MATRICULADOR', permiso_1) !== -1)
                recargar_por_rol('/principal/matriculacion_inicio', 'TECNICO_MATRICULADOR');
        });
    });

    function recargar_por_rol(url, rol) {
        $.ajax({
            url: '/principal/cambiar_vista_inicio_roles',
            dataType: 'html',
            type: 'post',
            data: {
                url: url,
                rol: rol
            }
        }).done(function(respuesta) {
            $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
        });
    }
</script>