<?php /* Template Name: Página Flota Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('timco_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $post;
	$banner_title = "Nuestra Flota";
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- CONTENEDOR COMUN -->
<div class="container">
	<main class="pageCommon__wrapper pageFlota">
		<!-- Descripcion -->
		<p class="pageFlota__description text-center"><?php _e( 'Contamos con una variedad de flota a tu servicio' , LANG ); ?></p>

		<!-- Contenedor Flexible -->
		<section class="pageFlota__content">
			<?php //Extraer todos los posts type "Flota"
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'post_status'    => 'publish',
					'post_type'      => 'flota',
					'posts_per_page' => -1,
				);  
				$flotas = get_posts( $args );
				if( count($flotas) > 0 ) : foreach( $flotas as $flota ) : 
			?>
				<article class="item-flota">
					<?php  
						//Obtener url de la imagen 
						$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $flota->ID ) );
					?>
					<a class="gallery-fancybox" rel="group" href="<?= $feat_img ?>">
						<!-- Titulo --> <h3 class="text-uppercase"><?= $flota->post_title; ?></h3>
						<!-- Imagen --> 
						<?php $image = get_the_post_thumbnail( $flota->ID , 'full' , array('class'=>'img-responsive') ); if( !empty( $image ) ) : 
							echo $image; else : 
						?>
							<img src="" alt="flota-<?= $flota->post_title ?>" class="img-responsive" />
						<?php endif; ?>
					</a>
				</article> <!-- /.item-flota -->
			<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
		</section> <!-- /.pageFlota__content -->
		
	</main> <!-- /.pageCommon__wrapper -->
</div> <!-- /.container -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>