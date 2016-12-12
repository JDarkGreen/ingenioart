<?php /* Template Name: Página Media Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenedor Global -->
<main class="pageWrapper">

		<!-- Sección de Galería -->
		<section class="pageMedia__multimedia">
			<div class="container">
				<!-- Título -->
				<h2 class="pageCommon__title text-xs-left text-uppercase">
					<?php _e('galería',LANG); ?>
				</h2> <!-- /. -->
				<!-- Contenedor Imágen -->
				<section class="pageMedia__multimedia__content container-flex align-content">
					<?php  
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'galery-images',
							'posts_per_page' => -1,
						);
						$imagenes = get_posts( $args );
						if( !empty($imagenes) ) : foreach( $imagenes as $imagen ) :
					?> <!-- Artículos -->
						
						<article class="multimedia__item text-xs-center">
							<?php  
								//Obtener url de la imagen 
								$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $imagen->ID ) );
							?>
							<a href="<?= $feat_img; ?>" rel="group" class="gallery-fancybox">
								<!-- Imagen --> <figure> 
									<?= get_the_post_thumbnail($imagen->ID,'full',array('class'=>'img-fluid') ); 
									?>
								</figure>
							</a>
							<!-- Título -->
							<h2 class="multimedia__item__title"><?php _e( $imagen->post_title, LANG ); ?></h2>
							<!-- Compartir Links -->
							<div class="multimedia__item__share">
								<!-- Facebook -->
								<a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $feat_img; ?>' , '_blank' , 'width=400 , height=500' ); void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<!-- Twitter -->
								<a href="javascript:window.open('https://twitter.com/intent/tweet?text=<?= '!Hola! ésta imagen me pareció interesante: ' . $feat_img; ?>' , '_blank' , 'width=400 , height=500' ); void(0);" ><i class="fa fa-twitter" aria-hidden="true"></i></a>							
								<!-- Mensajes -->
								<a href="" ><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
							</div> <!-- /.multimedia__item__share -->
	 					</article> <!-- /.pageMedia__multimedia__item -->

					<?php endforeach; else: echo "Actualizando Contenido" ; endif; ?>
				</section> <!-- /.pageMedia__multimedia__content -->

			</div> <!-- /.container -->
		</section> <!-- /.pageMedia__multimedia -->

		<!-- Sección de Videos -->
		<section class="pageMedia__multimedia pageMedia__multimedia--bg-gray">
			<div class="container">
				<!-- Título -->
				<h2 class="pageCommon__title text-xs-left text-uppercase">
					<?php _e('videos',LANG); ?>
				</h2> <!-- /. -->
				<!-- Contenedor Imágen -->
				<section class="pageMedia__multimedia__content container-flex align-content">
					<?php  
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'galery-videos',
							'posts_per_page' => -1,
						);
						$videos = get_posts( $args );
						if( !empty($videos) ) : foreach( $videos as $video ) :
					?> <!-- Artículos -->
						
						<article class="multimedia__item text-xs-center">
							<!-- video -->
							<?php 
								$link_video = $video->post_content;
								$link_video = str_replace( 'watch?v=' , 'embed/' , $link_video);
							?> 
							<iframe src="<?= $link_video; ?>" frameborder="0" allowfullscreen ></iframe>

							<!-- Título -->
							<h2 class="multimedia__item__title"><?php _e( $video->post_title, LANG ); ?></h2>
							<!-- Compartir Links -->
							<div class="multimedia__item__share">
								<!-- Facebook -->
								<a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $video->post_content; ?>' , '_blank' , 'width=400 , height=500' ); void(0);" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>

								<!-- Twitter -->
								<a href="javascript:window.open('https://twitter.com/intent/tweet?text=<?= '!Hola! ésta video me pareció interesante: ' . $video->post_content; ?>' , '_blank' , 'width=400 , height=500' ); void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a>					

								<!-- Mensajes -->
								<a href="" ><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
							</div> <!-- /.multimedia__item__share -->
	 					</article> <!-- /.pageMedia__multimedia__item -->

					<?php endforeach; else: echo "Actualizando Contenido" ; endif; ?>
				</section> <!-- /.pageMedia__multimedia__content -->
			</div> <!-- /.container -->
		</section> <!-- /.pageMedia__multimedia -->

</main> <!-- /.pageWrapper -->

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>