<?php /* Single Servicios Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('timco_custom_settings'); 

	//Conseguir el id de su pagina padre servicios
	//$parent_page  = get_page_by_title( 'Servicios' ); #var_dump($parent_page);

	$banner = $post;

	//Comprobar si el except esta vacio si no colocar como nombre el titulo de la página
	if( !empty($post->post_excerpt) ):  
		$banner_title = $post->post_excerpt;
	else: 
		$banner_title = $post->post_title;
	endif; 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- CONTENEDOR COMUN -->
<div class="container">
	<main class="pageCommon__wrapper pageServices">
			<div class="row">

				<!-- SECCION DE CONTENEDORA DE INFORMACION -->
				<div class="col-xs-12 col-md-8">

					<!-- Información -->
					<div class="pageServicio__text text-justify">
						<?= apply_filters('the_content', $post->post_content ); ?>
					</div> <!-- /.pageServicio__article__text -->

					<!-- Galería de Imágenes -->
					<section class="relative">

						<!-- Imagenes Galeria -->
						<section id="carousel-gallery-service" class="js-carousel-gallery pageServicio__gallery">
							<?php  
								//Obtener imagenes de la galería
								$input_ids_img  = get_post_meta( $post->ID, 'imageurls_'.$post->ID , true);
								//convertir en arreglo
								$input_ids_img  = explode(',', $input_ids_img );
								//eliminar valores duplicados - sigue siendo array
								$input_ids_img  = array_unique( $input_ids_img );
								//colocar en una sola cadena para el input
								$string_ids_img = "";
								$string_ids_img = implode(',', $input_ids_img);

								$args  = array(
									'post_type'      => 'attachment',
									'post__in'       => $input_ids_img,
									'posts_per_page' => -1,
								);
								$attachment = get_posts($args);
								
								if( !empty($attachment) ) :
								foreach( $attachment as $atta ) :

								/* Datos de la imgen */
								$contenido = $atta->post_content;					
							?>
								<div class="item">
									<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="img-responsive" />
								</div><!-- /.item -->
	
							<?php endforeach; else: ?>
								<p><?php _e( 'No imágenes para mostrar' , LANG ); ?></p>
							<?php endif;  ?>

						</section> <!-- ./pageEmpresa__gallery -->

					</section> <!-- /.relative -->

				</div> <!-- /.col-xs-9 -->

				<!-- ASIDE DE SERVICIOS -->
				<div class="col-md-4 hidden-xs">
					<aside class="pageServicio__sidebar">
						<!-- Título --> <h2 class="text-uppercase pageCommon__title-sidebar">
							<?php _e('servicios', LANG ); ?>
						</h2> <!-- /. pageCommon__title-sidebar -->
						<!-- Obtener la query-->
						<ul class="pageServicio__sidebar__menu">
							<?php  
								$args = array(
									'order'          => 'ASC',
									'orderby'        => 'menu_order',
									'post_status'    => 'publish',
									'post_type'      => 'servicio',
									'posts_per_page' => -1,
								);
								$servicios = get_posts( $args );
								foreach( $servicios as $servicio ) :
							?>
								<li class="<?= $post->ID == $servicio->ID ? 'active' : '' ?> ">
									<a href="<?= $servicio->guid ?>"><?php  
										if( !empty( $servicio->post_excerpt ) ) : echo $servicio->post_excerpt;
										else: echo $servicio->post_title;
										endif;
									?></a>
								</li>
							<?php endforeach; ?>
						</ul> <!-- /.pageServicio__sidebar__menu -->

					</aside> <!-- /.pageServicio__sidebar -->
 				</div> <!-- /.col-xs-3 -->

			</div> <!-- /.row -->
	</main> <!-- /.pageCommon__wrapper -->
</div> <!-- /.container -->


<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>