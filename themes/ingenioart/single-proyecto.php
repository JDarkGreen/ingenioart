<?php /* Single Página Portafolio  */
	
	/* Global Post */ 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 

	/*Buscar Página portafolio*/
	$page = get_page_by_title('portafolio'); #var_dump($page);
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $page;
	$banner_title = "portafolio";
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenedor Global -->
<main class="pageWrapper">
	
	<!-- Slogan -->
	<h3 class="pageCommon__subtitle text-xs-center"> Les ofrecemos el mejor servicio en todas las áreas de <strong>DISEÑO</strong> y <strong>PROGRAMACIÓN DIGITAL</strong> </h3>

	<!-- Contenedor de proyectos -->
	<section class="pagePortafolio__content pageInicio__portafolio__content">

		<!-- Sección Contenido Post Content -->
		<div class="container">
			<div class="row">
				<!-- Imagen de Proyecto -->
				<div class="col-xs-8">
					<figure class="pagePortafolio__featured-image">
						<?php 
							if( has_post_thumbnail( $post->ID ) ) : 
							echo get_the_post_thumbnail( $post->ID ,'full', array('class'=>'img-fluid') ); 
							else: 
						?>
							<img src="<?= IMAGES ?>/actualizando-info.jpg" alt="actualizando-ingenioart-info" class="img-fluid" />
						<?php endif; ?>
					</figure> <!-- /.pagePortafolio__featured-image -->
				</div> <!-- /.col-xs-7 -->
				<!-- Detalles de Proyecto -->
				<div class="col-xs-4">
					<section class="pagePortafolio__details">
						<!-- Titulo -->
						<h2 class="text-uppercase"><?php _e( $post->post_title , LANG ); ?></h2>
						<!-- Categoría -->
						<?php 
							$cats = wp_get_post_terms( $post->ID, 'portafolio_category',  array("fields" => "names") ); #var_dump($cats); 
							$cats = implode( ',', $cats );
						?>
						<p class=""><?php _e( 'Categorías: ', LANG ); ?><?= !empty($cats) ? $cats : "No disponible actualmente";  ?></p>
						<!-- Publicación -->
						<p class=""><?php _e('Publicado: ' . mysql2date( 'd M Y' , $post->post_date ) , LANG ); ?></p>
						<!-- Descripción -->
						<?= !empty( $post->post_content ) ? apply_filters('the_content' , $post->post_content ) : apply_filters('the_content' , "Actualizando Contenido");  ?>
						<!-- Ver web  -->
						<div class="text-featured--blue">
						<?php if( !empty( $post->post_excerpt ) ) : ?>
							<?php _e('VER WEB',LANG); ?> <a href="<?= "http://" . $post->post_excerpt ?>" target="_blank"> <?= $post->post_excerpt; ?></a>
						<?php else: _e('Actualizando Web',LANG); ?>
						<?php endif; ?>
						</div> <!-- /.text-featured--blue -->

						<!-- Todos los Proyectos -->
						<br/>
						<a href="<?= get_permalink( $page->ID ); ?>" class="btn__show-more btn__show-more--orange text-uppercase">
							<?php _e('ver todos' , LANG ); ?>
						</a>

					</section> <!-- /.pagePortafolio__details -->
				</div> <!-- /.col-xs-5 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->

	</section><!-- /.pagePortafolio__content -->

</main> <!-- /.pageWrapper -->

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>