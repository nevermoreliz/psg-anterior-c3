/** @format */

var $loading = $(".preload").hide();

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

  var form = $(".validation-wizard").show();

  /*
   * Descripción :
   * incicializamos un nuevo objeto de formData
   */
  var formData = new FormData();

  $(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "slide", // fade tambien
    titleTemplate: '<span class="step">#index#</span> #title#',
    showFinishButtonAlways: true,
    enableAllSteps: true,
    enableKeyNavigation: true,

    labels: {
      finish: "Actualizar",
      next: "Siguiente",
      previous: "Anterior",
      loading: "Loading ..."

    },

    onStepChanging: function (event, currentIndex, newIndex) {
      return (
        currentIndex > newIndex ||
        (!(3 === newIndex && Number($("#age-2").val()) < 18) &&
          (currentIndex < newIndex &&
            (form.find(".body:eq(" + newIndex + ") label.error").remove(),
              form
                .find(".body:eq(" + newIndex + ") .error")
                .removeClass("error")),
            (form.validate().settings.ignore = ":disabled,:hidden"),
            form.valid()))
      );
    },

    onFinishing: function (event, currentIndex) {
      return (form.validate().settings.ignore = ":disabled"), form.valid();
    },

    onFinished: function (event, currentIndex) {
      event.preventDefault();

      /*
       * Descripción :
       * obteniendo datos del formulario que viene del archivo campos_publicacion.php
       */

      /* recuperar datos de campos hidden */

      formData.append("id_publicacion", $('[name="id_publicacion"]').val());
      formData.append("id_planificacion_programa", $('[name="id_planificacion_programa"]').val());
      // formData.append("id_detalle_programa", $('[name="id_detalle_programa"]').val());

      /* -> recuperar datos de campos hidden */

      // recuperar datos 
      formData.append('img_principal', $('input[name=img_principal]')[0].files[0]);
      formData.append('pdf_programa', $('input[name=pdf_programa]')[0].files[0]);
      formData.append('id_etiqueta', $('[name="etiqueta"]').val());

      //recuperar datos para la tabla publicacion
      formData.append('id_planificacion_programa', $('[name="id_planificacion_programa"]').val());
      formData.append('fecha_fin_inscripcion', $('[name="fecha_fin_inscripcion"]').val());
      formData.append('fecha_inicio_publicidad', $('[name="fecha_inicio_publicidad"]').val());
      formData.append('fecha_fin_publicidad', $('[name="fecha_fin_publicidad"]').val());
      formData.append('fecha_fin_descuento', $('[name="fecha_fin_descuento"]').val());
      formData.append('url_facebook', $('[name="url_facebook"]').val());
      formData.append('url_whatsapp', $('[name="url_whatsapp"]').val());
      formData.append('url_youtube', $('[name="url_youtube"]').val());
      formData.append('estado_publicacion', $('[name="estado_publicacion"]').val());


      // recuperar datos para la parte de detalles de un programa para la tabla planificacion_programa
      formData.append('descuento_individual', $('[name="descuento_individual"]').val());
      formData.append('descuento_grupal', $('[name="descuento_grupal"]').val());
      formData.append('horario', $('[name="descuento_grupal"]').val());
      formData.append('creditaje', $('[name="creditaje"]').val());
      formData.append('duracion', $('[name="duracion"]').val());
      formData.append('resumen', $('[name="resumen"]').val());
      formData.append('objetivo_programa', $('[name="objetivo_programa"]').val());
      formData.append('requisitos', $('[name="requisitos"]').val());
      formData.append('contenido', $('[name="contenido"]').val());
      formData.append('titulacion_intermedia', $('[name="titulacion_intermedia"]').val());
      formData.append('celular_ref', $('[name="celular_ref"]').val());
      formData.append('telefono_ref', $('[name="telefono_ref"]').val());
      formData.append('dirigido_a', $('[name="dirigido_a"]').val());

      $.ajax({
        type: "POST",
        url: "/admin_marketing/publicacion_actualizar",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
      })
        .done(function (data) {
          if (typeof data.exito !== "undefined") {
            swal(
              "El programa se a editado",
              'haga click en "ok" para continuar'
            );

            $("#modal_listar_publicacion").modal("hide");
            $("#tabla_listar_publicaciones").DataTable().draw();
          } else {
            // alert("estas aqui");
            alertaSimple("INFORMACIÓN", data.error, "top-right", "warning", 7000);
          }
        })
        .fail(function (jqXHR, textStatus) {
          // alert("aqui estas nub");
          alertaSimple(
            jqXHR.statusText,
            jqXHR.status,
            "top-rigth",
            "error",
            3000
          );
          console.log(jqXHR.responseText);
        });
    },
  });

  /*
   * Descripción del evento:
   * Eliminar imagenes subidas en el servidor
   * y tambien de la base de datos
   */

  $(".image-container").on("click", function (e) {
    /* $(".image-container").unbind("click"); */
    var parent = $(this).parent();
    var id = $(parent).attr("data-id");
    var data = {
      id: id,
    };
    $.post("/admin_marketing/eliminar_imagenes", data, function (res) {
      if (res == "true") {
        alert("¡Imagenes eliminadas correctamente!");
        $(parent).remove();
      } else {
        alert("Lo sentimos, hubo un error eliminando esta imagen.");
      }
    });
  });



  // -> Eliminar imagenes subidas

  /*
   * Descripción del evento:
   * inicializa el plugin select2
   */
  $("#etiqueta").select2();

  /*
   * Descripción del evento:
   * inicializa el plugin summernote
   */

  $('#requisitos').summernote({
    height: 350, // set editor height
    minHeight: null, // set minimum height of editor
    maxHeight: null, // set maximum height of editor
    focus: false // set focus to editable area after initializing summernote
  });
  $('#contenido').summernote({
    height: 350, // set editor height
    minHeight: null, // set minimum height of editor
    maxHeight: null, // set maximum height of editor
    focus: false // set focus to editable area after initializing summernote
  });

  /*
   * Descripción del evento:
   * obtiene el nombre del archivo que se selecciona
   * cada vez que haya un cambio en la imagen principal
   */
  $('#img_principal').on('change', function (e) {
    //obtener el nombre del archivo
    var fileName = e.target.files[0].name;
    var cadena = fileName.length;
    console.log(cadena);

    if (cadena < 19) {
      // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
      // pondra la del archivo
      $(this).next(".custom-file-label").html(fileName);
    } else {
      var valor = fileName.substr(0, 20);
      // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
      // pondra la del archivo
      $(this).next('.custom-file-label').html(valor + '....');
    }

  });

  /*
   * Descripción del evento:
   * envia en un formData las imagenes seleccionadas
   * y crea una previsualizacion de las imagenes
   */
  $("#archivo").change(function () {
    var files = this.files;
    console.log(this.files);
    var element;
    var supportedImages = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
    var seEncontraronElementoNoValidos = false;
    for (var i = 0; i < files.length; i++) {
      element = files[i];

      if (supportedImages.indexOf(element.type) != -1) {
        var id = getRandomString(7);
        createPreview(element, id);
        formData.append(id, element);
      } else {
        seEncontraronElementoNoValidos = true;
      }
    }
    if (seEncontraronElementoNoValidos) {
      alertaSimple(
        "ERROR",
        "Se Encontraron archivos no validos",
        "top-rigth",
        "error",
        3000
      );
    } else {
      alertaSimple(
        "EXITOSO",
        "Todos Los Archivos Se Subieron Correctamente.",
        "top-rigth",
        "info",
        4000
      );
    }
  });

  // Eliminar previsualizaciones

  /*
   * Descripción del evento:
   * elimina la imagen seleccionado del previsualizador de imagenes
   */
  $(document).on("click", ".image-container", function (e) {
    var parent = $(this).parent();
    var id = $(parent).attr("id");
    formData.delete(id);
    $(parent).remove();
  });

  // -> Eliminar previsualizaciones

  // BLOQUE PDF
  /*
   * Descripción del evento:
   * obtiene el nombre del archivo que se selecciona
   * cada vez que haya un cambio el archivo pdf
   */
  $('#pdf_programa').on('change', function (e) {
    //obtener el nombre del archivo
    var fileName = e.target.files[0].name;
    var cadena = fileName.length;
    console.log(cadena);
    console.log(fileName);

    if (cadena < 19) {
      // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
      // pondra la del archivo
      $(this).next(".custom-file-label").html(fileName);
    } else {
      var valor = fileName.substr(0, 20);
      // reemplace la etiqueta "Elija un archivo" y cuando haya un cambio lo 
      // pondra la del archivo
      $(this).next('.custom-file-label').html(valor + '....');
    }
  });



  /*
   * Descripción del evento:
   * valida los datos del formulario wizard
   */
  $(".validation-wizard").validate({
    ignore: "input[type=hidden]",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function (element, errorClass) {
      $(element).removeClass(errorClass);
    },
    unhighlight: function (element, errorClass) {
      $(element).removeClass(errorClass);
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
    },
    rules: {
      email: {
        email: !0,
      },
    },
  });
});

/* funciones adicionales */

/*
 * Descripción del evento:
 * Genera una cadena aleatoria según la longitud dada
 */
function getRandomString(length) {
  var text = "";
  var possible =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < length; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

/*
 * Descripción del evento:
 * Genera las previsualizaciones
 */
function createPreview(file, id) {
  var imgCodified = URL.createObjectURL(file);
  var img = $(
    '<div style="margin-top: 5px;" class="  col-md-3 col-sm-4 col-xs-12" id="' +
    id +
    '"><div class="image-container"> <figure> <img src="' +
    imgCodified +
    '" alt="Foto del usuario"> <figcaption> <i class="fa fa-times "></i> </figcaption> </figure> </div>  </div>'
  );
  $(img).insertBefore("#add-photo-container");
}

/* funciones adicionales */

// validar y realizar una previzualizacion el pdf
function validarext() {
  var archivo_input = document.getElementById('pdf_programa');
  var archivo_ruta = archivo_input.value;
  var extensiones_permitidas = /(.pdf|.PDF)$/i;

  if (!extensiones_permitidas.exec(archivo_ruta)) {
    alert('asegurate de no cagarla');
    archivo_input.value = '';
    return false;
  } else {
    if (archivo_input.files && archivo_input.files[0]) {
      var visor = new FileReader();
      visor.onload = function (e) {
        document.getElementById('visor_archivo').innerHTML = '<embed src="' + e.target.result + '" width="100%" height="420">';
      }
      visor.readAsDataURL(archivo_input.files[0]);
    }
  }
}