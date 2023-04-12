$(document).ready(function() {
  capturar_evento_tecla_beca();

  capturar_evento_tecla_pasante();

  jQuery("#reportrange").daterangepicker(
    {
      ranges: {
        Hoy: [moment(), moment()],
        Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
        "Últimos 7 días": [moment().subtract(6, "days"), moment()],
        "Últimos 30 días": [moment().subtract(29, "days"), moment()],
        "Este mes": [moment().startOf("month"), moment().endOf("month")],
        "Último mes": [
          moment()
            .subtract(1, "month")
            .startOf("month"),
          moment()
            .subtract(1, "month")
            .endOf("month")
        ]
      },
      start: moment(),
      end: moment(),
      locale: {
        separator: " - ",
        applyLabel: "Aplicar",
        cancelLabel: "Cancelar",
        fromLabel: "de",
        toLabel: "hasta",
        customRangeLabel: "Rango personalizado"
      }
    },
    function(start, end) {
      $("#reportrange span").html(
        start.format("DD-MM-YYYY") +
          ' <i class="fa fa-minus"></i> ' +
          end.format("DD-MM-YYYY")
      );

      fechaInicial = start.format("YYYY-MM-DD");

      fechaFinal = end.format("YYYY-MM-DD");
    }
  );

  // Capturar teclado evento b con flecha arriba
  function capturar_evento_tecla_beca() {
    window.addEventListener(
      "keyup",
      function(event) {
        if (event.code == "ArrowUp") {
          $("#tipo_marcado").val("BECA");
        }
      },
      false
    );
  }

  // Capturar teclado evento b con flecha abajo
  function capturar_evento_tecla_pasante() {
    window.addEventListener(
      "keyup",
      function(event) {
        if (event.code == "ArrowDown") {
          $("#tipo_marcado").val("PASANTE");
        }
      },
      false
    );
  }
});
