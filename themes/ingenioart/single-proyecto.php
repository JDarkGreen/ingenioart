<?php /* Single Página Portafolio  */
	
	/* Global Post */ 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 

	
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	/*Buscar Página portafolio*/
	$page         = get_page_by_title('Portafolio'); #var_dump($page);
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
				<div class="col-xs-12 col-sm-8">

					<?php  
						#1.- Obtener galería de imagenes 
						# Si hay mas de dos hacer galería sino solo mostrar
						#Imágen Destacada

						$carousel_img    = get_post_meta( $post->ID, 'imageurls_'.$post->ID , true);
						#convertir en arreglo
						$carousel_img    = explode(',', $carousel_img ); 
						#Eliminar elementos negativos
						$carousel_img    = array_diff( $carousel_img , array(-1) );
						#Contar elementos
						$number_elements = count( $carousel_img );

						#Si hay más de dos imágenes hacer carousel
						if( $number_elements >= 2 ) :
					?>
						
						<!-- Carousel de Proyecto  -->
						<section id="slider-proyecto-<?= $post->ID ?>" class="js-carosel-proyect">
							<?php
								//Hacer loop por cada item de arreglo
								foreach ( $carousel_img as $item_img ) : 
									//Si es diferente de null o tiene elementos
									if( !empty( $item_img ) ) :  
									//Conseguir todos los datos de este item
									$item = get_post( $item_img  ); 
							?> <!-- Imagen -->
								<a href="<?= $item->guid; ?>" rel="group" class="gallery-fancybox" >
									<figure>	
										<img src="<?= $item->guid; ?>" alt="<?= $item->post_name; ?>" class="img-fluid" />
									</figure> <!-- /figure -->
								</a>
							<?php endif; endforeach; ?>

						</section> <!-- /. -->

					<?php else:  ?>
						
						<!-- Mostrar Solo La Imagen Destacada -->
						<figure class="pagePortafolio__featured-image">
							<?php 
								if( has_post_thumbnail( $post->ID ) ) : 
								echo get_the_post_thumbnail( $post->ID ,'full', array('class'=>'img-fluid') ); 
								else: 
							?>
								<img src="<?= IMAGES ?>/actualizando-info.jpg" alt="actualizando-ingenioart-info" class="img-fluid" />
							<?php endif; ?>
						</figure> <!-- /.pagePortafolio__featured-image -->
					
					<?php endif; ?>

				</div> <!-- /.col-xs-12 col-sm-8 -->

				<!-- Espacio --> <p class="clearfix hidden-sm-up"></p>

				<!-- Detalles de Proyecto -->
				<div class="col-xs-12 col-sm-4">
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
						<?php else: _e('',LANG); ?>
						<?php endif; ?>
						</div> <!-- /.text-featured--blue -->

						<!-- Todos los Proyectos -->
						<br/>
						<a href="<?= get_permalink( $page->ID ); ?>" class="btn__show-more btn__show-more--orange text-uppercase">
							<?php _e('ver todos' , LANG ); ?>
						</a>

					</section> <!-- /.pagePortafolio__details -->
				</div> <!-- /.col-xs-12 col-sm-4 -->

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