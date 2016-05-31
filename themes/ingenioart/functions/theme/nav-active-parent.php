<?php /* Funcion que activa los elementos en el menu de navegacion si 
pertenece la pagina actual a un custom post type */ 

  add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	
	function add_current_nav_class($classes, $item) {
		
		// Getting the current post details
		global $post;
		
		// Getting the post type of the current post
		$current_post_type = get_post_type_object(get_post_type($post->ID));

		
		$current_post_type_slug = $current_post_type->rewrite['slug'];

			
		// Getting the URL of the menu item
		$menu_slug = strtolower(trim($item->url));
		
		#var_dump(get_post_type($post->ID) );
		#var_dump($menu_slug );

		// If the menu item URL contains the current post types slug add the current-menu-item class
		if (strpos($menu_slug, $current_post_type_slug) !== false) {
		
		   $classes[] = 'current-menu-item';
		
		}

		//Si el tipo de post es proyecto y está en la página de articulos activar este item
		if( get_post_type($post->ID) === "proyecto" && ( strpos($menu_slug, "portafolio") !== false ) )
		{
			$classes[] = 'current-menu-item';
		}		

		//Si el tipo de post es post y está en la página de articulos activar este item
		if( get_post_type($post->ID) === "post" && ( strpos($menu_slug,"blog") !== false ) )
		{
			$classes[] = 'current-menu-item';
		}
		
		// Return the corrected set of classes to be added to the menu item
		return $classes;
	
	}

?>