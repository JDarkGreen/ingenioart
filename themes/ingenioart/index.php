
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('ingenioart_custom_settings'); 
?>

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>


<!-- Footer -->
<?php get_footer(); ?>