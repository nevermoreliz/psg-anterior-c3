/** @format */
/** */
$(document).ready(function () {
	// ejemplo de mostrar un boton
	// var permiso = [];
	// $.get('/auth/ajax_es_autententificado').done(function (respuesta) {
	// 	permiso = respuesta.exito.nombre_grupo == false ? false : (respuesta.exito.nombre_grupo).split(",");
	// 	if (permiso.includes("POSGRADUANTE")) {
	// 		console.log('entro');
	// 	}
	// })

	var tabla_listar_personas = $("#tabla_listar_personas")
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			language: {
				url: "/assets/plugins/datatables/Spanish.json",
			},
			ajax: "/psg_docente/ajax_listar_docentes",
			dom: "Bfrtip",
			buttons: ["copy", "csv", "excel", "pdf", "print"],
			columnDefs: [{
					searchable: true,
					orderable: true,
					targets: 0,
					data: null,
					render: function (data, type, row, meta) {
						return data[0] + " " + data[8];
					},
				},

				{
					searchable: false,
					orderable: false,
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						return (
							`<div class ="btn-group" >
								<button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Acci&oacute;n
								</button>								
								<div class="dropdown-menu animated flipInY">
									<a id="datos_personales" style="cursor:default" class="dropdown-item small datos_personales" 
									data-value="` + data[0] + `" title="Ir a los datos personales del docente">
										<i class="fa fa-user-circle-o"> </i> Datos Personales
									</a>
									<a id="formacion_academica" style="cursor:default" class="dropdown-item small formacion_academica" data-value = "` + data[0] + `" data-id-persona="` + data[9] + `"	title="Ir a toda la informacion academica del docente">
										<i class="fa fa-graduation-cap"> </i> Formaci&oacute;n Acad&eacute;mica
									</a>
									<a id="kardex_docente" style="cursor:default" class="dropdown-item small kardex_docente" data-value = "` + data[0] + `" data-id-persona="` + data[9] + `"	title="Ir a Kardex docente">
										<i class="ti-folder"> </i>Kardex Docente
									</a>							
								</div>								
							</div> `
						);

						// return '<a data-value="' + data[0] + '" class="btn btn-sm btn-warning " data-toggle="tooltip" title="Ir a Kardex del docente"><i class="ti-folder"> </i>Kardex Docente</a>';
					},
				},
			],
		})
		.on("click", "a.datos_personales", function (event) {
			$.ajax({
				method: "POST",
				url: "/persona/campos_datos_personales",
				data: {
					ci: event.target.getAttribute("data-value"),
				},
				dataType: "html",
			}).done(function (response) {
				parametrosModal("#modal", "Actualizar Datos", "modal-xl", false, true);
				$("#modal-body").html(response);
			});
		}).on("click", "a.formacion_academica", function (event) {
			$.ajax({
				method: "get",
				url: "/persona/listar_grados_academicos_persona",
				data: {
					ci: event.target.getAttribute("data-value"),
					id_persona: event.target.getAttribute("data-id-persona"),
				},
				dataType: "html",
			}).done(function (response) {
				parametrosModal("#modal_grados_academicos_persona", "FORMACION ACAD&Eacute;MICA", "modal-xl", true, true);
				$("#modal_grados_academicos_persona-body").html(response);
			});
		})
		.on("click", "a.kardex_docente", function (event) {
			$.ajax({
				method: "POST",
				url: "/psg_docente/campos_kardex_docente",
				data: {
					ci: event.target.getAttribute("data-value"),
					id_persona: event.target.getAttribute("data-id-persona"),
				},
				dataType: "html",
			}).done(function (response) {
				parametrosModal("#modal_docente_kardex", "EJERCICIO DE DOCENCIA Y COORDINACI&Oacute;N", "modal-xl", true, true);
				$("#modal_docente_kardex-body").html(response);
			});
		});

	$('#btn_insertar_nuevo_docente').on('click', function (e) {
		$.ajax({
			url: '/psg_docente/vista_nuevo_docente',
		}).done(function (respuesta) {
			parametrosModal('#modal_nuevo_docente', 'Insertar Nuevo Docente', 'modal-xl', true, true);
			$('#modal_nuevo_docente-body').html(respuesta);
		});
	});

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
});