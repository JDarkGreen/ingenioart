<?php  

/* archivo que contiene los sidebar del tema en cuestion */

/***********************************************************************************************/
/* Agregando nuevos SIDEBARS y secciones para widgets */
/***********************************************************************************************/	

if (function_exists('register_sidebar') ) {
	register_sidebar(
		array(
			'name'          => __('PreHeaderBanner Sidebar', LANG ),
			'id'            => 'pre-header-banner',
			'description'   => __('Sidebar para preheader colocar widgets de banner', LANG ),
			'before_widget' => '<div class="sidebar-widget-preheader">',
			'after_widget'  => '</div> <!-- end sidebar-widget-preheader -->',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		)
	);	
}






?>