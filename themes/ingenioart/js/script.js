
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
		/*|-----  CAROUSEL HOME  LIBRERIA REVslider -----|*/
		/*|----------------------------------------------------------------------|*/
		if ( j.fn.cssOriginal!=undefined)   // CHECK IF fn.css already extended
        j.fn.css =  j.fn.cssOriginal;

		j("#carousel-home").revolution({
			delay         : 9000, 
			fullWidth     : "on",
			navigationType: 'none',
			onHoverStop   : "off",
			startheight   : 490,
		}); 

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