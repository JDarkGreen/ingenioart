<?php
/*
 * Template : Custom Shortcodes
 * Incluye:
 * El short code para hacer cambio de imágenes 
 * con un botón
 */

/* ----------------------------------------------
 * SHORTCODE : CAMBIAR IMAGENES
 *----------------------------------------------*/

function shortcodeChangeImages( $atts , $content = null ){

	//Crear Nuevo Documento obtenido por el contenido
	$doc = new DOMDocument();
	@$doc->loadHTML($content);

	//Obtener solo las Imágenes
	$images = $doc->getElementsByTagName('img');

	if( !empty($images) && count($images) >= 1 ):

	//Nuevo arreglo para obtener su ruta y su texto
	//alternativo
	$array_images = array();

	//loop para obtener estos valores
	$i = 0;
	foreach ($images as $image ) :

		$array_images[$i]['src'] = $image->getAttribute('src');
		$array_images[$i]['alt'] = $image->getAttribute('alt');

	$i++; endforeach;

	/*
	 *  Hacer el renderizado del contenedor con parametros 
	 * de Imágen y agregar un botón interno para poder 
	 * cambiar las imágenes
	 */

	/*
	 * Variables 
	 */
	//Primera image url
	$first_img_url = $array_images[0]['src'];

	ob_start();
?>
	
	<!-- Estilos del shortcode -->
	<style>
		.shortcode-chage-images{ 
			height  : 300px; max-width: 300px; 
			width   : 100%; display: inline-block;
			border  : 3px solid #0075BA;
			position: relative;
		}
		
		.shortcode-chage-images figure{
			background-size: cover;
			height         : 100%;
			width          : 100%;
			margin         : 0;
		}

		button#btn-change-img{
			background   : #0075ba;
			border       : none;
			border-radius: 4px;
			bottom       : 10px;
			color        : white;
			padding      : 5px 10px;
			position     : absolute;
			right        : 10px;
		}

	</style>

	<!-- Figure -->
	<div class="shortcode-chage-images">
		
		<figure data-number="<?= count($array_images) ?>" <?php $i = 1; foreach($array_images as $images){ echo "data-image-". $i . "=".$images['src']." "; $i++; } ?> style="background-image: url(<?= $first_img_url; ?>);"> </figure>
		
		<button id="btn-change-img"> Cambiar </button>
		
	</div>

<?php

	$new_content = ob_get_contents(); ob_clean();

	endif;

	$new_content = !empty($new_content) ? $new_content : '';

	return $new_content;
}

add_shortcode( 'change-images' , 'shortcodeChangeImages' );

/*
 * Utilizar JavaScript
 */
add_action( 'wp_footer', 'add_js_shortc_change_img' );

function add_js_shortc_change_img() {

    wp_enqueue_script('shortc_change_img', THEMEROOT . '/functions/shortcode/js/change-img.js', array('jquery'), false , true );
}