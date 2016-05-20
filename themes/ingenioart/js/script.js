
var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	j(document).on('ready',function(){

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
		/*|-----  CAROUSEL HOME -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_home = j("#carousel-home").carousel({
			interval : 5000
		});

		var i = 1;

		//eventos
		carousel_home.on('slid.bs.carousel', function ( e ) {
			if( i > 2 ){ i = 1 };
			
			var current_item = j(this).find('.active');
  			//imagen actual
  			var image_carousel = current_item.find('img');
  			//animacion de la imagen
  			if( i == 1 ){
  				image_carousel.addClass('box-expand');
  			}else{
  				image_carousel.addClass('box-contract');
  			}

  			i++;

  			//animacion de las contenidos
  			var title = current_item.find('h3');
  			title
  				.css('opacity',0)
  				.animate({ 'opacity' : '1' , 'top' : '-1em' }, 1400 );

  			var k    = 1;
  			var text = current_item.find('p');

  			text.each( function(){

  				if( k > 2 ){ k = 1 };

  				if( k == 1 ){
	  				j(this)
	  					.addClass('box-contract--fast')
	  					.animate({ 'opacity' : '1' }, 1000 );
  				}else{
  					j(this).animate({'left':'0','opacity':'1'}, 1100 );
  				}
	  			
	  			//aumentar k 
	  			k++;
  			});
		});

		carousel_home.on('slide.bs.carousel', function ( e ) {
			var current_item = j(this).find('.active');

  			//animacion de las contenidos
  			var title = current_item.find('h3');
  			title
  				.css('opacity',0)
  				.animate({ 'opacity' : '1' , 'top' : '-8em' }, 0 );

  			var k    = 1;

  			var text = current_item.find('p');

  			text.each( function(){
  				
  				if( k > 2 ){ k = 1 };

  				if( k == 1 ){
	  				j(this)
	  					.css('opacity',0)
	  					.removeClass('box-contract--fast');
  				}else{
  					j(this).css({'left':'50%','opacity':0});
  				}
	  			//aumentar k 
	  			k++;
  			});
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL SERVICIOS HOME  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_home_service = j('.ContainerSlider__servicios');
		carousel_home_service.owlCarousel({
			items          : 4,
			lazyLoad       : false,
			loop           : true,
			margin         : 20,
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

		/*--------------- EVENTOS DEL FLECHAS DEL CAROUSEL -----------------------*/
		j('.ContainerSlider__servicios__arrow').on('click',function(e){
			e.preventDefault();
		});
		//flecha izquierda
		j("#arrow-service-prev").on('click',function(){
			carousel_home_service.trigger('prev.owl.carousel', [700]);
		});		
		//flecha derecha
		j("#arrow-service-next").on('click',function(){
			carousel_home_service.trigger('next.owl.carousel', [700]);
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL CLIENTES  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_clientes = j('#carousel-clientes');
		carousel_clientes.owlCarousel({
			items          : 8,
			lazyLoad       : false,
			loop           : true,
			margin         : 20,
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
		            items: 8
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
		/*|-----  GALERIAS FANCYBOX DE FLOTAS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j("a.gallery-fancybox").fancybox({
			'overlayShow'  :	false,
			'speedIn'      :	600, 
			'speedOut'     :	200, 
			'transitionIn' :	'elastic',
			'transitionOut':	'elastic',
		});

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/

		j('#form-contacto').parsley();

		j(document).on('submit', j('#form-contacto') , function(e){
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
		});


	});
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);