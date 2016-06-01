<?php /*Obtener página de Servicios*/ 
	$page_servicios = get_page_by_title('Servicios');
?>

<!-- Incluir Seccion banner de servicios -->
<section class="pageCommon__banner-services container-flex align-content">
	<!-- Titulo --> <h2><?php _e('Consulta sobre nuestros servicios' , LANG ); ?></h2>
	<!-- Boton --> <a href="<?= get_permalink($page_servicios->ID); ?>" class="btn__show-more"><?php _e('Click aquí' , LANG ); ?></a>
</section> <!-- /.pageCommon__banner-services -->