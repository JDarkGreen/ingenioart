<?php  

//Archivo que contiene todos los nuevos tipos creados en el tema

function create_post_type(){

	/*|>>>>>>>>>>>>>>>>>>>> BANNERS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels = array(
		'name'               => __('Banners'),
		'singular_name'      => __('Banner'),
		'add_new'            => __('Nuevo Banner'),
		'add_new_item'       => __('Agregar nuevo Banner'),
		'edit_item'          => __('Editar Banner'),
		'view_item'          => __('Ver Banner'),
		'search_items'       => __('Buscar Banners'),
		'not_found'          => __('Banner no encontrado'),
		'not_found_in_trash' => __('Banner no encontrado en la papelera'),
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => true,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','banner_category'),
		'menu_icon'   => 'dashicons-nametag',
	);

	/*|>>>>>>>>>>>>>>>>>>>> SERVICIOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels2 = array(
		'name'               => __('Servicios'),
		'singular_name'      => __('Servicio'),
		'add_new'            => __('Nuevo Servicio'),
		'add_new_item'       => __('Agregar nuevo Servicio'),
		'edit_item'          => __('Editar Servicio'),
		'view_item'          => __('Ver Servicio'),
		'search_items'       => __('Buscar Servicios'),
		'not_found'          => __('Servicio no encontrado'),
		'not_found_in_trash' => __('Servicio no encontrado en la papelera'),
	);

	$args2 = array(
		'labels'      => $labels2,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category','servicio_category'),
		'menu_icon'   => 'dashicons-exerpt-view',
	);	

	/*|>>>>>>>>>>>>>>>>>>>> CLIENTES  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels3 = array(
		'name'               => __('Clientes'),
		'singular_name'      => __('Cliente'),
		'add_new'            => __('Nuevo Cliente'),
		'add_new_item'       => __('Agregar nuevo Cliente'),
		'edit_item'          => __('Editar Cliente'),
		'view_item'          => __('Ver Cliente'),
		'search_items'       => __('Buscar Clientes'),
		'not_found'          => __('Cliente no encontrado'),
		'not_found_in_trash' => __('Cliente no encontrado en la papelera'),
	);

	$args3 = array(
		'labels'      => $labels3,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-money',
	);	

	/*|>>>>>>>>>>>>>>>>>>>> TESTIMONIOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels4 = array(
		'name'               => __('Testimonios'),
		'singular_name'      => __('Testimonio'),
		'add_new'            => __('Nueva Testimonio'),
		'add_new_item'       => __('Agregar nueva Testimonio'),
		'edit_item'          => __('Editar Testimonio'),
		'view_item'          => __('Ver Testimonio'),
		'search_items'       => __('Buscar Testimonio'),
		'not_found'          => __('Testimonio no encontrada'),
		'not_found_in_trash' => __('Testimonio no encontrad en la papelera'),
	);

	$args4 = array(
		'labels'      => $labels4,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category'),
		'menu_icon'   => 'dashicons-index-card',
	);
	/*|>>>>>>>>>>>>>>>>>>>> PROYECTOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels5 = array(
		'name'               => __('Portafolio'),
		'singular_name'      => __('Proyecto'),
		'add_new'            => __('Nueva Proyecto'),
		'add_new_item'       => __('Agregar nuevo Proyecto'),
		'edit_item'          => __('Editar Proyecto'),
		'view_item'          => __('Ver Proyecto'),
		'search_items'       => __('Buscar Proyecto'),
		'not_found'          => __('Proyecto no encontrado'),
		'not_found_in_trash' => __('Proyecto no encontrado en la papelera'),
	);

	$args5 = array(
		'labels'      => $labels5,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category'),
		'menu_icon'   => 'dashicons-portfolio',
	);


	/*|>>>>>>>>>>>>>>>>>>>> REGISTRAR  <<<<<<<<<<<<<<<<<<<<|*/
	register_post_type( 'banner'   , $args  );
	register_post_type( 'servicio' , $args2 );
	register_post_type( 'cliente' , $args3 );
	register_post_type( 'testimonio' , $args4 );
	register_post_type( 'proyecto' , $args5 );

	
	flush_rewrite_rules();
}

add_action( 'init', 'create_post_type' );



?>