
var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	j(document).on('ready',function(){

		/* Flecha Navegar Hacia arriba de la página */
		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			j("#arrow-up-page").on('click',function(e){
				e.preventDefault(); /* Detener evento por defecto */
				j('html,body').animate({
					scrollTop: 0
				}, 900 );
			});	
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  SLIDEBAR VERSION MOBILE  -----|*/
		/*|----------------------------------------------------------------------|*/

		var mySlidebars = new j.slidebars({
			disableOver       : 568, // integer or false
			hideControlClasses: true, // true or false
			scrollLock        : false, // true or false
			siteClose         : true, // true or false
		});

		//Eventos

		//Abrir contenedor izquierda
		j("#toggle-left-nav").on('click',function(){
			mySlidebars.slidebars.toggle('left');
		});

		//Abrir contenedor derecha
		j("#toggle-right-nav").on('click',function(){
			mySlidebars.slidebars.toggle('right');
		});
		

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME  LIBRERIA REVslider -----|*/
		/*|----------------------------------------------------------------------|*/
		if ( j.fn.cssOriginal!=undefined)   // CHECK IF fn.css already extended
        j.fn.css =  j.fn.cssOriginal;

		j("#carousel-home").revolution({
			delay         : 6000, 
			fullWidth     : "on",
			navigationType: 'none',
			onHoverStop   : "off",
			startheight   : 490,
		}); 

		/*|----------------------------------------------------------------------|*/
		/*|-----  EVENTOS FLECHAS CAROUSEL COMUNES  -----|*/
		/*|----------------------------------------------------------------------|*/		
		j(".arrow__common-slider").on('click',function(e){ e.preventDefault(); });


		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL TESTIMONIOS HOME  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_home_testimonio = j('#pageInicio__testimonio__gallery');
		carousel_home_testimonio.owlCarousel({
			autoplay       : true,
			autoplayTimeout: 5000,
			dots           : true,
			fluidSpeed     : 2000,
			items          : 1,
			lazyLoad       : false,
			loop           : true,
			margin         : 0,
			mouseDrag      : false,
			nav            : false,
			responsiveClass: true,
			smartSpeed     : 2000,		
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL SERVICIOS HOME  -----|*/
		/*|----------------------------------------------------------------------|*/

		var carousel_home_service = j('#pageInicio__services__gallery');
		carousel_home_service.owlCarousel({
			autoplay       : true,
			autoplayTimeout: 5000,
			dots           : true,
			fluidSpeed     : 2000,
			items          : 4,
			lazyLoad       : false,
			loop           : true,
			margin         : 27,
			mouseDrag      : false,
			nav            : false,
			responsiveClass: true,
			smartSpeed     : 2000,		
		});

		/* Eventos de flechas */
		j("#arrow__serv--prev").on('click',function(e){
			carousel_home_service.trigger('prev.owl.carousel', [700]);
		});
		j("#arrow__serv--next").on('click',function(e){
			carousel_home_service.trigger('next.owl.carousel', [700]);
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL CLIENTES  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_clientes = j('#carousel-clientes');
		carousel_clientes.owlCarousel({
			items          : 4,
			lazyLoad       : false,
			loop           : true,
			margin         : 100,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			fluidSpeed     : 2000,
			smartSpeed     : 2000,
			responsive:{
		        320:{
		            items: 2
		        },
		      	640:{
		            items: 4
		        },
	    	}			
		});

		/* Eventos de flechas */
		j("#arrow__cliente--prev").on('click',function(e){
			carousel_clientes.trigger('prev.owl.carousel', [700]);
		});
		j("#arrow__cliente--next").on('click',function(e){
			carousel_clientes.trigger('next.owl.carousel', [700]);
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL ARTICULOS - PORTADA  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_blog = j('#carousel-blog');
		carousel_blog.owlCarousel({
			items          : 3,
			lazyLoad       : false,
			loop           : true,
			margin         : 19,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			fluidSpeed     : 2000,
			smartSpeed     : 2000,
			responsive:{
		        320:{
		            items: 1
		        },
		      	640:{
		            items: 3
		        },
	    	}			
		});

		/* Eventos de flechas */
		j("#arrow__blog--prev").on('click',function(e){
			carousel_blog.trigger('prev.owl.carousel', [700]);
		});
		j("#arrow__blog--next").on('click',function(e){
			carousel_blog.trigger('next.owl.carousel', [700]);
		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL SERVICIOS - PAGINA SERVICIOS  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_service = j('#carousel-single-servicio');
		carousel_service.owlCarousel({
			items          : 3,
			lazyLoad       : false,
			loop           : true,
			margin         : 7,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			fluidSpeed     : 2000,
			smartSpeed     : 2000,
			responsive:{
		        320:{
		            items: 1
		        },
		      	640:{
		            items: 3
		        },
	    	}			
		});

		/* Eventos de flechas */
		j("#demo__arrows--prev").on('click',function(e){
			carousel_service.trigger('prev.owl.carousel', [900]);
		});
		j("#demo__arrows--next").on('click',function(e){
			carousel_service.trigger('next.owl.carousel', [900]);
		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  ISOTOPE DE PROYECTOS   -----|*/
		/*|----------------------------------------------------------------------|*/

		var container_proyectos = j("#portafolio-proyectos");
		if( container_proyectos.length ){
			//Isotope
			container_proyectos.isotope({
				// options
				itemSelector: '.item-proyecto',
				layoutMode  : 'fitRows',
			});

			//Filtros
			j('.filter-button-group').on( 'click', 'button', function() {
			 	var filterValue = j(this).attr('data-filter');
				container_proyectos.isotope({ filter: filterValue });
				//activar elemento actual
				j('.filter-button-group button').removeClass('active');
				j(this).addClass('active');

				//Si no encuentra contenido
				if ( !container_proyectos.data('isotope').filteredItems.length ) {
				    j('#message-proyecto').fadeIn('slow');
				} else { j('#message-proyecto').fadeOut('fast'); }
				
			});
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  FANCYBOX GALERIAS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j("a.gallery-fancybox").fancybox({
			'overlayShow'  :	false,
			'speedIn'      :	600, 
			'speedOut'     :	200, 
			'transitionIn' :	'elastic',
			'transitionOut':	'elastic',
		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL DE GALERÍAS   -----|*/
		/*|----------------------------------------------------------------------|*/		

		var carousel_gallery = j(".js-carousel-gallery");
		if( carousel_gallery.length ){
			carousel_gallery.owlCarousel({
				autoplay       : true,
				autoplayTimeout: 2500,
				dots           : true,			
				fluidSpeed     : 2000,
				items          : 1,
				lazyLoad       : false,
				loop           : true,
				margin         : 0,
				mouseDrag      : false,
				nav            : false,
				responsiveClass: true,
				smartSpeed     : 2000,
			});			
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  TABS SECCION BLOG ARTICULOS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j(".group-buttons-tabs a").on('click',function(e){
			e.preventDefault();

			/* Activar elemento activo */
			j(".group-buttons-tabs a").removeClass('active');
			j(this).addClass('active');

			/* Mostrar contenedor respectivo */
			var container = j(this).attr('href');
			if( container.length ){
				/* Ocultar los otros contenedores */
				j(".articles-features__item").slideUp( 'fast' );
				j(container).delay(300).fadeIn(900);
			}
		});

		/*|-------------------------------------------------------------|*/
		/*|-----  TABS SECCIÓN PREGUNTAS  ------|*/
		/*|--------------------------------------------------------------|*/	

		j(".pagePreguntas__section .panel .panel-heading .panel-title a")
		.on('click',function(){
			//Quitar todas las clases activas
			j(".pagePreguntas__section .panel .panel-heading .panel-title a")
			.removeClass('active');
			//Agregar la clase activa al elemento actual
			j(this).addClass('active');
		});	

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/

		j('#form-contacto').parsley();

		/*j(document).on('submit', j('#form-contacto') , function(e){
			e.preventDefault();
			//Subir el formulario mediante ajax
			j.post( url + '/email/enviar.php', 
			{ 
				nombre : j("#input_name").val(),
				email  : j("#input_email").val(),
				message: j("#input_consulta").val(),
			},function(data){
				alert( data );

				j("#input_name").val("");
				j("#input_email").val("");
				j("#input_consulta").val("");
			});			
		});*/

		/*|-------------------------------------------------------------|*/
		/*|-----  ENVIAR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/

		/* Formulario de Suscripción */
		if( j("#form__suscribirse").length )
		{
			j("#form__suscribirse").on('submit',function(e){
				e.preventDefault(); //prevenir evento default
			j.post( url + '/email/enviar.php', 
			{ 
				nombre : j("#input_name").val(),
				email  : j("#input_email").val(),
				message: j("#input_consulta").val(),
			},function(data){
				alert( data );

				j("#input_name").val("");
				j("#input_email").val("");
				j("#input_consulta").val("");
			});	
			});
		}

	});

	/* ------------ Eventos Scroll ------------------------ */
	j(window).on('scroll',function(){

		/* Determinar la altura del navegador */
		var alt_window = j(window).height();

		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			//Si el scroll del navegador es mayor que la posicion de 300 pixeles
			if( j('body').scrollTop() > 300 ){
				//Mostrar flecha de dirección hacia arriba
				j("#arrow-up-page").fadeIn('slow');
			}else{ 
				/* Si no Ocultar esta flecha */ j("#arrow-up-page").fadeOut('slow');
			}
		}

	});

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);