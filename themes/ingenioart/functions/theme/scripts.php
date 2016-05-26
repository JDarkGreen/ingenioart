<?php  

/* Archivo que solo se encargara de cargas los scripts del tema 
	http://www.ey.com/PE/es/Home
*/

function load_custom_scripts()
{
   wp_deregister_script('jquery');
   wp_register_script('jquery', "https://code.jquery.com/jquery-2.2.3.min.js", false, null);
   wp_enqueue_script('jquery');

	//jsCarousellite 
	wp_enqueue_script('jscarousel', THEMEROOT . '/js/jquery.jcarousellite.min.js', array('jquery'), false , true);

	//owl carousel /
	wp_enqueue_script('owl-carousel', THEMEROOT . '/js/owl.carousel.min.js', array('jquery'), false , true);

	//cargar tether /
	wp_enqueue_script('tether', THEMEROOT . '/js/tether.min.js', array('jquery'), '1.1.0', true);

	//cargar bootstrap v
	wp_enqueue_script('bootstrap', THEMEROOT . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);	

	//cargar fancybox
	wp_enqueue_script('fancybox', THEMEROOT . '/js/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);

	//cargar sliderevolution
	wp_enqueue_script('revslidertools', THEMEROOT . '/js/jquery.themepunch.plugins.min.js', array('jquery'), '1.0', true);	

	//cargar sliderevolution
	wp_enqueue_script('revslider', THEMEROOT . '/js/jquery.themepunch.revolution.min.js', array('jquery'), '4.3.6', true);	

	//cargar validador
	wp_enqueue_script('parsley', THEMEROOT . '/js/parsley.min.js', array('jquery'), '2.3.11', true);
	wp_enqueue_script('p_idioma_es', THEMEROOT . '/js/i18n/es.js', '' , false , true);

	//google maps
	wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0');
  	wp_enqueue_script('google-jsapi','https://www.google.com/jsapi');

  	//cargar isotope
	wp_enqueue_script('isotope', THEMEROOT . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.0', true);	
  	
  	//cargar sbslidebar js 
	wp_enqueue_script('slidebars', THEMEROOT . '/js/slidebars.min.js', array('jquery'), '0.10.3', true);	 	 

	//script
	wp_enqueue_script('custom_script', THEMEROOT . '/js/script.js', array('jquery'), false, true);

}

add_action('wp_enqueue_scripts', 'load_custom_scripts');


/*
* Cargar los archivos JS pero del administrador WP
*/

/* Add the media uploader script */
function load_admin_custom_enqueue() {
  //upload gallery banner  
	wp_enqueue_script('upload-banner-page', THEMEROOT . '/js/admin/media-lib-banner.js', array('jquery'), '', true);  
	//upload gallery a todas la paginas
	wp_enqueue_script('upload-gallery', THEMEROOT . '/js/admin/metabox-gallery.js', array('jquery'), '', true);

}

add_action('admin_enqueue_scripts', 'load_admin_custom_enqueue');

?>