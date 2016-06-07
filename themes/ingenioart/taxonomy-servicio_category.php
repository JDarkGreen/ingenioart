<?php /* Taxonomy Categoría de Servicio */ 
	
	/* Queried object*/
	$taxonomy = get_queried_object();
	$options  = get_option('ingenioart_custom_settings');

	/* Obtener página servicio */
	$page_servicio = get_page_by_title('Servicios');

	/* Opciones de Banner */ 
	$banner       = $page_servicio; #var_dump($taxonomy);
	$banner_title = __('Servicios - ') . __( $taxonomy->name , LANG );
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Contenedor Global -->
<main class="pageWrapper">
	<div class="container">

		<!-- Descripción del Servicios -->
		<article class="pageServicios__item first-item">
			
			<!-- Extraer Imagen de Taxonomía -->
			<?php 
				//echo $taxonomy->ID;
				$term_meta = get_option( "taxonomy_term_$taxonomy->term_id");
				$input_img = $term_meta["theme_tax_img_$taxonomy->term_id"]; 
			?>

			<!-- Sección Imagen --> <figure class="pageServicios__item__image ">
				<img src="<?= $input_img; ?>" alt="image-servicio-category-<?= $taxonomy->name ?>" class="img-fluid" />
			</figure> <!-- /.pageServicios__item__image -->

			<!-- Sección Detalles -->
			<section class="pageServicios__item__details">
				<!-- Titulo --> <h2 class="pageCommon__title text-uppercase"><?php _e( $taxonomy->name ,LANG ); ?></h2>
				<!-- Contenido --> <div class="text-justify">
				<?php if( !empty( $taxonomy->description ) ) :
					echo apply_filters('the_content', $taxonomy->description ); ?>
				<?php else: echo "Actualizando Contenido"; endif;
				?></div> <!-- /.text-jsutify -->
			</section> <!-- /.pageServicios__item__details -->
			
			<!-- Limpiar Floats --> <div class="clearfix"></div>

		</article> <!-- /.pageServicios__item -->

		<?php  
			//Argumentos y query para obtener los servicios relacionados a esa
			//taxonomía
			$args = array(
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_status'    => 'publish',
				'post_type'      => 'servicio',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'servicio_category',
						'field'    => 'slug',
						'terms'    => $taxonomy->slug,
					),
				),
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
			<article class="pageServicios__item">

				<!-- Sección Imagen --> <figure class="pageServicios__item__image <?= $image_class; ?>">
					<?= get_the_post_thumbnail($servicio->ID,'full',array('class'=>'img-fluid')); ?>
				</figure> <!-- /.pageServicios__item__image -->

				<!-- Sección Detalles -->
				<section class="pageServicios__item__details">
					<!-- Titulo --> <h2 class="pageCommon__title text-uppercase"><?php _e($servicio->post_title,LANG); ?></h2>
					<!-- Contenido --> <div class="text-justify">
					<?php if( !empty($servicio->post_content) ) :
						echo apply_filters('the_content', $servicio->post_content); ?>
						<!-- Botón ver más -->
						<a href="<?= get_permalink(  $servicio->ID ); ?>" class="btn__show-more btn__show-more--orange text-xs-center"><?php _e( "Ver más" , LANG ); ?></a>
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