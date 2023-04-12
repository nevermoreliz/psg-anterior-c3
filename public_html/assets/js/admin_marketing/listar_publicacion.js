$(document).ready(function () {
	$('#tabla_listar_publicaciones')
		.DataTable({
			processing: true,
			serverSide: true,
			autoWidth: true,
			order: [[0, 'desc']],
			// searching: true,
			ajax: '/admin_marketing/publicacion_programa_listar_ajax',
			responsive: true,
			language: {
				url: 'assets/plugins/datatables/Spanish.json',
			},

			lengthMenu: [
				[10, 20, 30, 50, -1],
				[10, 20, 30, 50, 'Todo'],
			],

			columnDefs: [
				{
					visible: false,
					targets: [1],
					searchable: false,
				},

				{
					searchable: true,
					orderable: true,
					targets: 0,
					data: null,
					render: function (data, type, row, meta) {
						if (data[1] == null) {
							return data[0];
						} else if (data[4] == 'FINALIZADO') {
							return data[0];
						} else if (data[4] == 'OBSERVADO') {
							return `<div style="padding-right:30px;">` + data[0] + `</div><div class="notify" style="top: -5px;right: 3px;"> <span class="heartbit" ></span> <span class="point"></span> </div>`;
						} else if (data[4] == 'REGISTRADO') {
							return `<div style="padding-right:30px;">` + data[0] + `</div><div class="notify" style="top: -5px;right: 3px;"> <span class="heartbit" style="border: 5px solid #6c757d ;"></span> <span class="point bg-secondary"></span> </div>`;
						} else {
							return `<div style="padding-right:30px;">` + data[0] + `</div><div class="notify" style="top: -5px;right: 3px;"> <span class="heartbit" style="border: 5px solid #26dad2 ;"></span> <span class="point bg-success"></span> </div>`;
						}
					},
				},

				{
					searchable: true,
					orderable: true,
					targets: 2,
					data: null,
					render: function (data, type, row, meta) {
						if (data[1] == null) {
							return '<button  class="btn btn-sm btn-secondary insertar" data-programa="' + data[0] + '" data-publicacion="' + data[1] + '"><i class="fa fa-plus"></i> publicar</button> ';
						} else if (data[5] == 'FINALIZADO') {
							return (
								`<a >
									<button class="btn btn-sm btn-outline-danger" style="cursor:not-allowed;">
										<i class="fa fa-eye"></i>
									</button>
								</a> 		

								<div class="btn-group ">
                                    <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Acci&oacute;n</button>									
                                    <div class="dropdown-menu animated small flipInY">										
										<a style="cursor:default" class="dropdown-item small modificar" data-programa="` +
								data[0] +
								`" data-publicacion="` +
								data[1] +
								`"><i class="fa fa-pencil-square-o"></i> MODIFICAR</a>
									</div>									
                                </div> `
							);
						} else if (data[5] == 'OBSERVADO') {
							return (
								`<a href="../` +
								data[11] +
								`/` +
								data[6] +
								`/` +
								data[1] +
								`" target="_blank">
									<button class="btn btn-sm waves-effect waves-light btn-danger">
										<i class="fa fa-eye"></i>
									</button>
								</a> 		

								<div class="btn-group ">
                                    <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Acci&oacute;n</button>									
                                    <div class="dropdown-menu animated small flipInY">										
										<a style="cursor:default" class="dropdown-item small modificar" data-programa="` +
								data[0] +
								`" data-publicacion="` +
								data[1] +
								`"><i class="fa fa-pencil-square-o"></i> MODIFICAR</a>
									</div>									
                                </div> `
							);
						} else if (data[5] == 'REGISTRADO') {
							return (
								`<a href="../` +
								data[11] +
								`/` +
								data[6] +
								`/` +
								data[1] +
								`" target="_blank">
									<button class="btn btn-sm btn-outline-secondary">
										<i class="fa fa-eye"></i>
									</button>
								</a> 		

								<div class="btn-group ">
                                    <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Acci&oacute;n</button>									
                                    <div class="dropdown-menu animated small flipInY">										
										<a style="cursor:default" class="dropdown-item small modificar" data-programa="` +
								data[0] +
								`" data-publicacion="` +
								data[1] +
								`"><i class="fa fa-pencil-square-o"></i> MODIFICAR</a>
									</div>									
                                </div> `
							);
						} else {
							return (
								`<a href="../` +
								data[11] +
								`/` +
								data[6] +
								`/` +
								data[1] +
								`" target="_blank">								<button class="btn btn-sm btn-outline-success">
										<i class="fa fa-eye"></i>
									</button>
								</a> 
								
								<div class="btn-group ">
                                    <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acci&oacute;n</button>								
									<div class="dropdown-menu animated small flipInY">										
										<a style="cursor:default" class="dropdown-item small modificar" data-programa="` +
								data[0] +
								`" data-publicacion="` +
								data[1] +
								`"><i class="fa fa-pencil-square-o"></i> MODIFICAR</a>
									</div>									
                                </div> `
							);
						}
					},
				},
			],
		})
		.on('click', 'button.insertar', function (event) {
			$.ajax({
				method: 'POST',
				/* url: "/admin_marketing/campos_publicacion", */
				url: '/admin_marketing/campos_publicacion',
				data: {
					id_planificacion_programa: event.target.getAttribute('data-programa'),
					id_publicacion: event.target.getAttribute('data-publicacion'),
				},
				dataType: 'html',
			}).done(function (response) {
				parametrosModal(
					/* id del modal al que se desa llamar */
					'#modal_listar_publicacion',
					/* inserte un titulo */
					'Inserte los datos de la Publicación',
					/* insertar un tamaño al modal [modal-xl, modal-lg, modal-sm] */
					'modal-lg',
					/* true si desea que la tecla escape cierre el Modal */
					true,
					/* true si desea que el modal solo se cierre con botones o "static"= para no evitar que cierre el modal */
					'static'
				);
				/* poner contenido html en el contenido del modal */
				$('#modal-body-publicacion').html(response);
				// Select2 campo tipo_horario

				$('#modal_listar_publicacion-close').on('click', function () {
					$('#modal_listar_publicacion-close').unbind('click');

					alertaSimple('INFORMACI&Oacute;N', 'No Se Publico Nada', 'top-right', 'info', 4000);
					$('#tabla_listar_publicaciones').DataTable().draw(false);
				});
			});
		})
		.on('click', 'a.modificar', function (event) {
			$.ajax({
				method: 'POST',
				/* url: "/admin_marketing/campos_publicacion_editar", */
				url: '/admin_marketing/campos_publicacion_editar',
				data: {
					id_planificacion_programa: event.target.getAttribute('data-programa'),
					id_publicacion: event.target.getAttribute('data-publicacion'),
				},
				dataType: 'html',
			}).done(function (response) {
				parametrosModal(
					/* id del modal al que se desa llamar */
					'#modal_listar_publicacion',
					/* inserte un titulo */
					'Modificar la publicación',
					/* insertar un tamaño al modal [modal-lg, modal-sm] */
					'modal-lg',
					/* true si desea que la tecla escape cierre el Modal */
					false,
					/* true si desea que el modal solo se cierre con botones o "static"= para no evitar que cierre el modal */
					'static'
				);
				/* poner contenido html en el contenido del modal */
				$('#modal-body-publicacion').html(response);
			});
		});
});
