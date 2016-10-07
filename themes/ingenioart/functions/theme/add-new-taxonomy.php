<?php  

//Archivo que agrega nuevas taxonomias al tema

//create a custom taxonomy
add_action( 'init', 'create_category_taxonomy', 0 );

function create_category_taxonomy() {

/* categorias servicio */
  $labels = array(
    'name'             => __( 'Categoría Servicio'),
    'singular_name'    => __( 'Categoría Servicio'),
    'search_items'     => __( 'Buscar Categoría Servicio'),
    'all_items'        => __( 'Todas Categorías del Servicio' ),
    'parent_item'      => __( 'Categoría padre del Servicio' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Servicio' ), 
    'update_item'      => __( 'Actualizar categoría de Servicio' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Servicio' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Servicio' ),
    'menu_name'        => __( 'Categoria Servicio' ),
  ); 

// Now register the taxonomy
  register_taxonomy('servicio_category',array('servicio'), array(
    'hierarchical'     => true,
    'labels'           => $labels,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'servicios-web' ),
  ));

/* categorias clientes */
  $labels2 = array(
    'name'             => __( 'Categoría Cliente'),
    'singular_name'    => __( 'Categoría Cliente'),
    'search_items'     => __( 'Buscar Categoría Cliente'),
    'all_items'        => __( 'Todas Categorías del Cliente' ),
    'parent_item'      => __( 'Categoría padre del Cliente' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Cliente' ), 
    'update_item'      => __( 'Actualizar categoría de Cliente' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Cliente' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Cliente' ),
    'menu_name'        => __( 'Categoria Cliente' ),
  ); 

// Now register the taxonomy
  register_taxonomy('cliente_category',array('cliente'), array(
    'hierarchical'     => true,
    'labels'           => $labels2,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'cliente-category' ),
  ));

  /* categorias portafolio */
  $labels3 = array(
    'name'             => __( 'Categoría Portafolio'),
    'singular_name'    => __( 'Categoría Portafolio'),
    'search_items'     => __( 'Buscar Categoría Portafolio'),
    'all_items'        => __( 'Todas Categorías del Portafolio' ),
    'parent_item'      => __( 'Categoría padre del Portafolio' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Portafolio' ), 
    'update_item'      => __( 'Actualizar categoría de Portafolio' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Portafolio' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Portafolio' ),
    'menu_name'        => __( 'Categoria Portafolio' ),
  ); 

  // Now register the taxonomy
  register_taxonomy('portafolio_category',array('proyecto'), array(
    'hierarchical'     => true,
    'labels'           => $labels3,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'portafolio-category' ),
  ));  

  /* categorias preguntas */
  $labels4 = array(
    'name'             => __( 'Categoría Preguntas'),
    'singular_name'    => __( 'Categoría Preguntas'),
    'search_items'     => __( 'Buscar Categoría Preguntas'),
    'all_items'        => __( 'Todas Categorías de Preguntas' ),
    'parent_item'      => __( 'Categoría padre de Preguntas' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Preguntas' ), 
    'update_item'      => __( 'Actualizar categoría de Preguntas' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Preguntas' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Preguntas' ),
    'menu_name'        => __( 'Categoria Preguntas' ),
  ); 

  // Now register the taxonomy
  register_taxonomy('preguntas_category',array('pregunta'), array(
    'hierarchical'     => true,
    'labels'           => $labels4,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'preguntas-category' ),
  ));

}


?>