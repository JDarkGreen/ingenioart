<?php 

/*
 * Agregar Imágenes Extra de Metabox
 * a los Tipos de Post Personalizados
 * Slider Home
 */


add_action( 'add_meta_boxes', 'fn_add_images_to_slider' );

//Función Agregar Banner
function fn_add_images_to_slider()
{
	//Array de custom post types 
	$array_cpt = ['banner'];

	add_meta_box( 'mb_add_extra_images' , 'Imagen Extra Banner Home' , 'fn_callback_extra_images' , $array_cpt , 'side' );
}


//Función CALLBACK
function fn_callback_extra_images( $post )
{ 
	//Extraer todos los post
	$data = get_post_meta( $post->ID , 'slider_home_extra_images' , true  );

	$data = !empty($data) ? $data : array();

	?>
	<!-- //Input oculto guarda valor de contador de elemento -->
	<input type="hidden" id="field_save_extra_images" data-number="<?= count($data) ?>" />
	
	<p class="description">Al agregar/eliminar elemento dar click en actualizar
	</p>

	<!-- Contenedor Agrupar Imágenes -->
	<div id="content-extra-images">
		
		<?php //Mostrar Contenido ?>
		<?php if( !empty($data) && count($data) > 0 ) : ?>
			
		<?php 
			//var_dump($data);

			$i = 0;
			foreach( $data as $image ) : ?>

			<div class="item-image">
				
				<!-- Elemento Oculto de Url de Imágen -->
				<input type="hidden" id="new-image-<?= $i ?>" name="extraimages[<?= $i ?>][url]" value="<?= $image['url'] ?>" /> <br/>
				
				<!-- Cargar Imágen -->
				<a href="#" class="js-upload-new-extra-img" data-target="new-image-<?= $i; ?>"> Cargar Imàgen </a>
				
				<!-- Remover -->
				<a href="#" class="js-remove-item" data-item="<?= $i ?>">X</a>

				<img src='<?= $image['url'] ?>' alt="" width="100%" height="auto" />

				<br/>

				<label for=""> Posiciòn x de Imàgen en px: defecto 550 </label> <br/>
				<input type="text" name="extraimages[<?= $i ?>][posx]" value="<?= $image['posx'] ?>" />
				<span class="js-icon-arrow js-left-arrow"></span>

				<br/> 

				<label for=""> Posiciòn y de Imàgen en px: defecto 40 </label> <br/> 
				<input type="text" name="extraimages[<?= $i ?>][posy]" value="<?= $image['posy'] ?>" />
				<span class="js-icon-arrow js-top-arrow"></span>

				<hr/><br/>

			</div>

		<?php $i++; endforeach; ?>

		<?php endif; ?>

	</div>

	<!-- Botón Agregar Nueva Imagen -->
	<a id="js-add-image-banner" href="#"> Agregar Nueva Imágen </a>

	<br/>

	<!-- Borrar Todo -->
	<a id="js-remove-all-banners" href="#"> Borrar Todos </a>

<?php 
}

/* Guardamos la Data */
add_action('save_post', 'fn_extra_images_save_postdata');

function fn_extra_images_save_postdata($post_id)
{
	if ( isset($_POST['extraimages']) && !empty($_POST['extraimages']) )
	{
		//Arreglo temporal que permite guardar las imágenes pero 
		//con datos seteados
		$array_temp = array();

		$i = 0;

		foreach( $_POST['extraimages'] as $item )
		{
			if( !empty($item['url']) )
			{
				$array_temp[$i]['url']  = $item['url'];	
				$array_temp[$i]['posx'] = $item['posx'];	
				$array_temp[$i]['posy'] = $item['posy'];	
			}
		
			$i++;
		}

 		update_post_meta( $post_id , 'slider_home_extra_images' , $array_temp );
 	}else{
 		update_post_meta( $post_id , 'slider_home_extra_images' , array() );
 	}
}



/*
 * LLamar A function javascript en administrador
 */


function mb_extra_images_admin_style() 
{
	//CSS
	 wp_register_style( 'custom_extra_images_css', get_template_directory_uri() . '/functions/metabox/slider-home/add-new-image.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_extra_images_css' );

    //JS
    wp_enqueue_script( 'custom_extra_images_js', get_template_directory_uri() . '/functions/metabox/slider-home/add-new-image.js' );
}

add_action( 'admin_enqueue_scripts', 'mb_extra_images_admin_style' );