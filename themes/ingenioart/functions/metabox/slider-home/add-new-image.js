
var j = jQuery.noConflict();

(function($){



j(document).on('ready' , function(){

	//Contenedor al cual se agregar html dinámico
	var containerImages  = j('#content-extra-images');

	//Input Oculto al cual se setean los valores 
	var custom_field_data = j('#field_save_extra_images');

	/* Funcion botón de agregar Imágen */
	j( document ).on('click' , '#js-add-image-banner' ,function(e) {
		
		//Obtener número de elementos actuales 
		var number_elements  = custom_field_data.attr('data-number');

		e.preventDefault();

		//Mostrar Campos
		var string = '<div class="item-image">';

		string += '<label for=""> Url de Imàgen </label> <br/>'; 
		string += '<input type="hidden" id="new-image-'+number_elements+'" name="extraimages['+number_elements+'][url]" /> <br/>';

		string += '<a href="#" class="js-remove-item" data-item="'+number_elements+'">X</a>';

		string += '<a href="#" class="js-upload-new-extra-img" data-target="new-image-'+number_elements+'"> Cargar Imàgen </a>'; 

		string += '<br/>';

		string += '<label for=""> Posiciòn x de Imàgen </label> <br/>'; 
		string += '<input type="text" name="extraimages['+number_elements+'][posx]" />';
		string += ' Horizontal => ';

		string += '<br/>'; 

		string += '<label for=""> Posiciòn y de Imàgen </label> <br/>'; 
		string += '<input type="text" name="extraimages['+number_elements+'][posy]" />';
		string += 'Vertical ^';

		string += '<hr/><br/>'; 

		string += '</div>';

		containerImages.append( string );

		//actualizar el marcador de imágenes
		var i = parseInt( custom_field_data.attr('data-number') );
		custom_field_data.attr( 'data-number' , i+1 );

    });


    /* Function botòn cargar Imàgen */
    j( document ).on('click' , '.js-upload-new-extra-img' ,function(e){

    	e.preventDefault();

    	//Obtener su elemento id 
    	var button = j(this);

    	var custom_field = button.attr('data-target');

    	if( j('#'+custom_field).length )
    	{
    		//Setear campo
    		var this_field = j('#'+custom_field);

    		var frame;

    		frame = wp.media({
	            title   : 'Cargar Nueva Imágen',
	            frame   : 'post',
	            multiple: false, // set to false if you want only one image
	            library : { type : 'image'},
	            button  : { text : 'Agregar Imagen' },
       		});

        	frame.on('close',function(data) {

        		//Obtener la seleccion
            	data = frame.state().get('selection');

            	data.each(function(image){

	            	//Agregar la selección al campo 
	           	 	this_field.val( image.attributes.url );

	            	//Agregar Imágen Previa
	            	var preview = '<img src="'+image.attributes.url+'" width="100%" height="auto" />';

	            	button.closest('.item-image').find('img').remove();
	            	button.after( preview );
            	
            	});

        	});

    		//Abrir Frame
    		frame.open();
    	}

    });

    /* Function eliminar item */
    j( document ).on('click' , '.js-remove-item' ,function(e){

    	e.preventDefault();

    	//Obtener su elemento id 
    	var button = j(this);
    	var current_element = button.attr('data-item');

    	//Encontra elemento
    	var element = containerImages.find('.item-image').eq( parseInt(current_element) );

    	//Setear a vacio sus elementos y tambien remover elemento
    	element.find('input').val('');

    	element.slideUp('slow' , function(){
    		element.remove();
    	});

    	//Eliminar contador
    	var i = parseInt( custom_field_data.attr('data-number') );
		custom_field_data.attr( 'data-number' , i-1 );

    });


    /* Function eliminar todos */
     j( document ).on('click' , '#js-remove-all-banners' ,function(e){

     	e.preventDefault();

     	//Borrar y setear todos los elementos a vacio
     	var all_element = parseInt( custom_field_data.attr('data-number') );
	
		for (var i = 0; i < all_element; i++) {
			
			var element_to_remove = containerImages.find('.item-image').eq( i );
			element_to_remove.find('input').val('');

			element_to_remove.slideUp('fast');
		}

		//Finalmente dale al boton actualizar de metabox
		if( j('#publish').length ){ j('#publish').trigger( "click" ); }

     });
    



});



})(jQuery);