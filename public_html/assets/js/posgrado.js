window.loading = $('.preload').hide();
$(document)
	.ajaxStart(function () {
		loading.show();
	})
	.ajaxStop(function () {
		loading.hide();
	})
	.ready(function () {
		$('aside.psg-main').on('click', 'a.link-menu', function (event) {
			event.preventDefault();
			event.stopPropagation();
			let enlace = $(this);
			let contenedor = $('.' + (enlace.data('dest') === undefined ? 'psg-contenedor' : enlace.data('dest')));
			let url = $(this).attr('href');
			let n = url.indexOf('.upea.bo');
			url = url.substring(n === -1 ? 0 : n + 8);
			if (url !== '') {
				$.ajax({
					method: 'POST',
					url: (url.substring(0, 1) === '/' ? '' : '/') + url,
				}).done(function (resultado) {
					$('#sidebarnav li.active, #sidebarnav a.active').removeClass('active');
					enlace.addClass('active').parents('li').addClass('active');
					contenedor.hide(0).html(resultado).fadeIn('slow');
				});
			} else {
				contenedor.html('<div class="alert alert-warning"><i class="fa fa-warning"></i> No se encuentra disponible el contenido solicitado.</div>');
			}
			if (screen.width < 768) {
				$('.mdi-close').click();
			}
		});
		setInterval(function () {
			const ahora = new Date();
			$('label#ahora').html('<i class="fa fa-clock-o"></i> ' + (ahora.getHours() < 10 ? '0' : '') + ahora.getHours() + ':' + (ahora.getMinutes() < 10 ? '0' : '') + ahora.getMinutes() + ':' + (ahora.getSeconds() < 10 ? '0' : '') + ahora.getSeconds());
		}, 1000);

		window.alertaSimple = function (title, message, position, icon, hideAfter) {
			/**
			 * title: Titúlo de alerta
			 * message:  Mensaje de la alerta
			 * icon: info, warning, success, error
			 * position : top-right, top-left
			 * hideAfter: Tiempo de alerta
			 */

			$.toast({
				heading: title,
				text: message,
				position: position,
				loaderBg: '#ff6849',
				icon: icon,
				hideAfter: hideAfter,
				stack: 6,
			});
		};
		window.parametrosModal = function (idModal, titulo, tamano, onEscape, backdrop) {
			$(idModal + '-title').html(titulo);
			$(idModal + '-dialog').removeClass('modal-lg');
			$(idModal + '-dialog').removeClass('modal-xl');
			$(idModal + '-dialog').addClass(tamano);
			$(idModal).modal({
				backdrop: backdrop,
				keyboard: onEscape,
				focus: true,
				show: true,
			});
		};
		window.retornarCookie = function (nombre) {
			const value = `; ${document.cookie}`;
			const parts = value.split(`; ${nombre}=`);
			if (parts.length === 2) return parts.pop().split(';').shift();
			else return null;
		};
		window.agregarCookie = function (nombre, valor, dias) {
			var expires = '';
			if (dias) {
				var date = new Date();
				date.setTime(date.getTime() + dias * 24 * 60 * 60 * 1000);
				expires = '; expires=' + date.toUTCString();
			}
			document.cookie = nombre + '=' + (valor || '45') + expires + '; path=/';
		};
		window.eliminarCookie = function (nombre) {
			agregarCookie(nombre, '', -1);
		};
	})
	.on('keydown', function (e) {
		if ((e.which || e.keyCode) === 116) e.preventDefault();
	});