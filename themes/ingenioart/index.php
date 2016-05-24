
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

<!-- Sección Servicios -->
<section class="pageInicio__services">
	<div class="container">
		<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e( 'nuestros servicios' , LANG ) ?></h2>
		<!-- Subtitle --> <h3 class="pageCommon__subtitle text-xs-center"> Les ofrecemos el mejor servicio en todas las áreas de <strong>DISEÑO</strong> y <strong>PROGRAMACIÓN DIGITAL</strong> </h3>
		<!-- Contenedor de Servicios -->
		<section class="relative">
			<div id="pageInicio__services__gallery" class="pageInicio__services__gallery">
				<?php /*Extraer servicios*/ 
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
					<article class="item-service text-xs-center">
						<!-- Imagen --> 
						<?php 
							$image = wp_get_attachment_url( get_post_thumbnail_id( $servicio->ID ) );
						?>
						<figure style="background-image: url('<?= $image ?>')">
							
						</figure>
						<!-- Titulo --> <h2 class="text-uppercase"><?= $servicio->post_title ?></h2>
						<!-- Botón ver Detalle --> <a href="<?= $servicio->guid ?>" class="btn__read-more">Leer más</a>
					</article> <!-- /.item-service -->
				<?php endforeach; ?>
			</div> <!-- /.pageInicio__services__gallery -->
		</section> <!-- /.relative -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__services -->

<!-- Sección Estrategia y Creatividad -->
<section class="pageInicio__our">
	<div class="container">
		<div class="row container-flex">
			<div class="col-xs-12 col-md-6 text-xs-center">
				<!-- Titulo --> <h2 class="pageCommon__title text-uppercase"> <?php _e( 'estratégia & creatividad' , LANG ); ?> </h2>
				<!-- Contenido --> 
				<div class="">
					<?php if( isset($options['widget_nosotros']) && !empty($options['widget_nosotros']) ) : echo apply_filters('the_content' , $options['widget_nosotros'] ); else: echo "Actualizando Contenido";
						endif;
					?>
				</div> <!-- /.text-xs-center -->

				<!-- Boton leer más --> <a href="#" class="btn__read-more"><?php _e('Leer más', LANG ); ?></a>

			</div> <!-- /.col-xs-12 -->
			<div class="col-xs-12 col-md-6">
				<!-- Imagen -->
				<figure class="pageInicio__our__image">
					<?php if( isset($options['image_nosotros']) && !empty($options['image_nosotros']) ) : ?>
						<img src="<?= $options['image_nosotros']; ?>" alt="image-equipo-nosotros-ingenioart" class="img-fluid" />
					<?php else: echo "Actualizando Image" ; endif;?>
				</figure> <!-- /.pageInicio__our__image -->
			</div> <!-- /.col-xs-12 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__our -->

<!-- Footer -->
<?php get_footer(); ?>