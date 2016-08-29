<?php /* Template Name: Página Servicios Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 
	$banner  = $post;
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Contenedor Global -->
<main class="pageWrapper">
	<div class="container">
		<?php  
			//Argumentos y query
			$args = array(
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_status'    => 'publish',
				'post_type'      => 'servicio',
				'posts_per_page' => -1,
			);
			$servicios = get_posts( $args );
			
			//control 
			$i = 0;
			if( !empty($servicios) ) : foreach( $servicios as $servicio ) : 
		?> <!-- Articulo de Servicio -->		
			<?php 
				/* Controles de Clases */
				$image_class = ( ($i%2) == 0 ) ? 'image-left' : ""; 
			?>
			<article class="pageServicios__item <?= $first_class ?>">

				<!-- Sección Imagen --> <figure class="pageServicios__item__image <?= $image_class; ?>">
					<?= get_the_post_thumbnail($servicio->ID,'full',array('class'=>'img-fluid')); ?>
				</figure> <!-- /.pageServicios__item__image -->

				<!-- Sección Detalles -->
				<section class="pageServicios__item__details">

					<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-sm-left text-uppercase"><?php _e($servicio->post_title,LANG); ?></h2>

					<!-- Contenido --> <div class="text-justify">
					<?php if( !empty($servicio->post_content) ) :
						echo apply_filters('the_content', $servicio->post_content); ?>

						<!-- Botón ver más -->
						<a href="<?= $servicio->guid ?>" class="btn__show-more btn__show-more--orange text-xs-center"><?php _e( "Ver más" , LANG ); ?></a>
					<?php else: echo "Actualizando Contenido"; endif;
					?></div> <!-- /.text-jsutify -->
				</section> <!-- /.pageServicios__item__details -->
				
				<!-- Limpiar Floats --> <div class="clearfix"></div>

			</article> <!-- /.pageServicios__item -->
		<?php $i++; endforeach; endif; ?>
	</div> <!-- /.container -->
</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion de Clientes -->
<?php include(locate_template("partials/carousel-clientes.php") ); ?>

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>