
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
		<div class="row container-flex align-content">
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

<!-- Banner Común de Servicios -->
<section class="pageCommon__banner-services container-flex align-content">
	<!-- Titulo --> <h2><?php _e('Consulta sobre nuestros servicios' , LANG ); ?></h2>
	<!-- Boton --> <a href="#" class="btn__show-more"><?php _e('Click aquí' , LANG ); ?></a>
</section> <!-- /.pageCommon__banner-services -->

<!-- Sección Testimonio -->
<section class="pageInicio__testimonio">
	<div class="container">
		<!-- Contenedor Testimonios -->
		<div id="pageInicio__testimonio__gallery" class="pageInicio__testimonio__gallery">
			<?php 
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'post_status'    => 'publish',
					'post_type'      => 'testimonio',
					'posts_per_page' => -1,
				);
				$servicios = get_posts( $args );
				foreach( $servicios as $servicio ) :
			?>
				<!-- Artículo -->
				<article class="articleTestimonio text-xs-center">
					<!-- Imagen --> <figure class="articleTestimonio__image relative">
						<?= get_the_post_thumbnail($servicio->ID,'full', array('class'=>'img-fluid center-block') ); ?>
					</figure>
					<!-- Mensaje --> <div class="articleTestimonio__content">
						<?= apply_filters('the_content' , $servicio->post_content ); ?>
					</div> <!-- /.text-xs-center -->
					<!-- Título -->
					<h2> <span><?= $servicio->post_title; ?></span> | <?= $servicio->post_excerpt; ?></h2>
				</article> <!-- /.article -->
			<?php endforeach; ?>
		</div> <!-- /.pageInicio__testimonio__gallery -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__testimonio -->

<!-- Seccion Clientes  -->
<section class="pageInicio_clientes">
	<div class="container">
		<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e( 'nuestros clientes' , LANG ) ?></h2>
		<!-- Subtitle --> <h3 class="pageCommon__subtitle text-xs-center"> Les ofrecemos el mejor servicio en todas las áreas de <strong>DISEÑO</strong> y <strong>PROGRAMACIÓN DIGITAL</strong> </h3>		

		<!-- Contenedor relativo -->
		<div class="relative">

			<!-- Wrapper de clientes -->
			<div id="carousel-clientes" class="pageInicio_clientes__gallery">
				<?php /*Extraer los clientes*/ 
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_page' => -1,
					);
					$clientes = get_posts( $args );
					foreach( $clientes as $cliente ) :
				?> <!-- Imagen -->
					<figure>
						<?= get_the_post_thumbnail( $cliente->ID,'full',array('class'=>'img-fluid') ); ?>
					</figure> <!-- /figure -->
				<?php endforeach; ?> 
			</div> <!-- /.pageInicio_clientes__gallery -->

			<!-- Flechas de Carousel  -->
			<a href="#" id="arrow__cliente--prev" class="arrow__common-slider arrow__common-slider--prev">
				<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
			</a>

			<a href="#" id="arrow__cliente--next" class="arrow__common-slider arrow__common-slider--next">
				<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
			</a>

		</div> <!-- /.relative -->

	</div> <!-- /.container -->
</section> <!-- /.pageInicio_clientes -->

<!-- Seccion Portafolio -->
<section class="pageInicio__portafolio">
	<div class="container">
		<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e( 'portafolio' , LANG ) ?></h2>
		<!-- Subtitle --> <h3 class="pageCommon__subtitle text-xs-center"> Les ofrecemos el mejor servicio en todas las áreas de <strong>DISEÑO</strong> y <strong>PROGRAMACIÓN DIGITAL</strong> </h3>	
	</div> <!-- /.container -->

	<!-- Obtener todos las imágenes destacadas del Portafolio -->
	<section class="pageInicio__portafolio__content container-flex">
		<?php 
			$args = array(
				'order'          => 'DESC',
				'orderby'        => 'date',
				'post_status'    => 'publish',
				'post_type'      => 'proyecto',
				'posts_per_page' => -1,
			);
			$proyectos = get_posts( $args );
			if( !empty($proyectos) ) :
			foreach( $proyectos as $proyecto ) :
		?>  <!-- Article -->
		<article class="item-proyecto relative">
			<!-- Imagen -->
			<figure>
				<?= get_the_post_thumbnail($proyecto->ID,'full',array('class'=>'img-fluid')); ?>
			</figure> <!-- /figure -->
			<!-- Links del Artículo -->
			<section class="item-proyecto__links container-flex align-content text-xs-center">
				<!-- Link de vista --> 
				<a href="#" class="btn__link"><i class="fa fa-search" aria-hidden="true"></i></a>
				<!-- Link al proyecto -->
				<a href="#" class="btn__link"><i class="fa fa-external-link" aria-hidden="true"></i></a>
				<!-- Titulo del artículo -->
				<h3 class="text-uppercase"><?php _e( $proyecto->post_title , LANG ); ?></h3>
			</section> <!-- /.item-proyecto__links -->
		</article> <!-- /.item-proyecto -->
		<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
	</section> <!-- /.pageInicio__portafolio__content -->

</section> <!-- /.pageInicio__portafolio -->

<!-- Banner A Portafolio -->
<section class="pageInicio__portafolio__banner container-flex align-content">
	<!-- Titulo --> <h2 class=""> <strong class="text-uppercase"> <?php _e( 'deseas ver más' , LANG ); ?> </strong>
	<?php _e( 'de nuestros trabajos realizados' , LANG ); ?> </h2>
	<!-- Link -->
	<a href="#" class="btn__show-more btn__show-more--orange"><?php _e('Click aquí' , LANG ); ?></a>
</section> <!-- /.pageInicio__portafolio__banner -->

<!-- Sección Blog Carousel -->
<section class="pageInicio__blog">
	<div class="container">
		<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e( 'blog' , LANG ); ?></h2>

		<!-- Contenedor Relativo -->
		<div class="relative">
			<!-- Contenedor de Carousel -->
			<section id="carousel-blog" class="pageInicio__blog__carousel">
				<?php  
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_status'    => 'publish',
						'post_type'      => 'post',
						'posts_per_page' => -1,
					);
					$articulos = get_posts( $args );
					foreach( $articulos as $articulo ) :
				?> <!-- Articulos -->
				<article class="item-blog">
					<!-- Imagen Preview --> <figure class="relative"> <?= get_the_post_thumbnail( $articulo->ID ,'full', array('class'=>'img-fluid') ) ?> <!-- Flecha -->
						<figcaption class="container-flex align-content text-xs-center text-uppercase"><?= mysql2date('j M', $articulo->post_date); ?></figcaption> 
						</figure> <!-- /figure -->

						<!-- Titulo -->
						<h2 class="text-uppercase"><?php _e( $articulo->post_title , LANG ); ?></h2>
						<!-- Extracto -->
						<div class="item-blog__excerpt"> 
							<?= apply_filters('the_content' , wp_trim_words( $articulo->post_content , 30 , '' ) ); ?> 
						</div> <!-- /.item-blog__excerpt -->

						<!-- Boton al articulo [derecha] -->
						<a href="<?= $articulo->guid; ?>" class="pull-xs-right btn__show-more btn__show-more--orange"><?php _e( 'Ver más', LANG ); ?></a>

						<!-- Limpiar floats --> <div class="clearfix"></div>

				</article> <!-- /.item-blog -->
				<?php endforeach; ?>
			</section> <!-- /.pageInicio__blog__carousel -->

			<!-- Flechas de Carousel -->
			<a href="#" id="arrow__blog--prev" class="arrow__common-slider arrow__common-slider--prev">
				<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
			</a>

			<a href="#" id="arrow__blog--next" class="arrow__common-slider arrow__common-slider--next">
				<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
			</a>

		</div> <!-- /.relative -->


	</div> <!-- /.container -->
</section> <!-- /.pageInicio__blog -->

<!-- Footer -->
<?php get_footer(); ?>