'use_strict';

var j = jQuery.noConflict();

(function($){

	j(document).on( 'ready' , function(){

		/*
		 * Evento al cambiar boton
		 */
		if( j('#btn-change-img').length )
		{
			var button_change = j('#btn-change-img');
			
			/* Control para cambiar la variación de imágenes */
			var click  = index_img = 0 ;

			button_change.on( 'click' , function(e){

				/*Referenciarse */
				var this_button = j(this);

				/*Elemento padre */
				var parent = this_button.parent('div');

				/* Elemento imagen */
				var image = parent.find('figure');

				/* Numero de Imágenes */
				var number_images = parseInt( image.attr('data-number') );

				/*Control*/
				if( number_images >= 2 )
				{
					if( click != 0 && index_img >= number_images )
					{ index_img = 1; }else{ index_img++; }

					if( click == 0 ){ index_img = 2; }

					/* Setear imagen del padre */
					parent
					.attr('style', 'background-image :url('+ image.attr( 'data-image-'+index_img ) +') ; background-size:cover' );

					/*Deshabilitar elemento boton */
					this_button.prop('disabled',true);

					/*animación crossfade*/
					image.animate({ 
						opacity  : 0
					}, { 
						duration : 'slow', 
						complete : function() {

							j(this)
		            		.css({'background-image': 'url('+ image.attr( 'data-image-'+index_img ) +')' })
		            		.animate({opacity: 1});

		            		/*habilitar elemento boton */
							this_button.prop('disabled',false);
		            	}
					});
					
				}

				/* Incrementar valores */
				click++;

			});
		}

	});

})(jQuery);