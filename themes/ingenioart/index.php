
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
				<?php /*Extraer categorias de servicios [ taxonomías ]*/ 
					/*$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'servicio',
						'posts_per_page' => -1,
					);
					$servicios = get_posts( $args ); */

					$servicios = get_terms( array(
						'taxonomy'   => 'servicio_category',
						'hide_empty' => false,
					) );
					foreach( $servicios as $servicio ) : 
				?>
					<article class="item-service text-xs-center">
						<!-- Imagen --> 
						<?php //$image = wp_get_attachment_url( get_post_thumbnail_id( $servicio->ID ) );
							$term_meta = get_option( "taxonomy_term_$servicio->term_id");
							$image     = $term_meta["theme_tax_img_$servicio->term_id"]; 
						?>
						<figure style="background-image: url('<?= $image ?>')">
						</figure>
						<!-- Titulo --> <h2 class="text-uppercase"><?= $servicio->name ?></h2>
						<!-- Botón ver Detalle --> <a href="<?= get_term_link($servicio ); ?>" class="btn__read-more">Leer más</a>
					</article> <!-- /.item-service -->
				<?php endforeach; ?>
			</div> <!-- /.pageInicio__services__gallery -->

			<!-- Flechas de Carousel -->
			<div class="hidden-xs-down">
	
				<a href="#" id="arrow__serv--prev" class="arrow__common-slider arrow__common-slider--prev">
					<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
				</a>

				<a href="#" id="arrow__serv--next" class="arrow__common-slider arrow__common-slider--next">
					<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
				</a>
				
			</div> <!-- /.hidden-xs-down -->

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

				<?php  
					/* Obtener páginas nosotros */
					$page_nosotros = get_page_by_title('Nosotros');
				?>

				<!-- Boton leer más --> <a href="<?= get_permalink( $page_nosotros->ID ); ?>" class="btn__read-more"><?php _e('Leer más', LANG ); ?></a>

				<!-- Espacio --> <p class="hidden-sm-up"></p>

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

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template("partials/banner-services.php") ); ?>

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

<!-- Incluir Seccion de Clientes -->
<?php include(locate_template("partials/carousel-clientes.php") ); ?>

<!-- Seccion Portafolio -->
<section class="pageInicio__portafolio">
	<div class="container">
		<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e( 'portafolio' , LANG ) ?></h2>
		<!-- Subtitle --> <h3 class="pageCommon__subtitle text-xs-center"> Les ofrecemos el mejor servicio en todas las áreas de <strong>DISEÑO</strong> y <strong>PROGRAMACIÓN DIGITAL</strong> </h3>	
	</div> <!-- /.container -->

	<!-- Obtener todos las imágenes destacadas del Portafolio - maximo 12  de preferencia web -->
	<section class="pageInicio__portafolio__content container-flex">
		<?php 
			$args = array(
				'order'          => 'DESC',
				'orderby'        => 'date',
				'post_status'    => 'publish',
				'post_type'      => 'proyecto',
				'posts_per_page' => 6,
				'tax_query' => array(
					array(
						'taxonomy' => 'portafolio_category',
						'field'    => 'slug',
						'terms'    => 'diseno-web',
					),
				),
			);
			$proyectos = get_posts( $args );
			if( !empty($proyectos) ) :
			foreach( $proyectos as $proyecto ) :
		?>  <!-- Article -->
		<article class="item-proyecto relative">
			<!-- Imagen -->
			<figure>
				<?php if( has_post_thumbnail( $proyecto->ID ) ) :  
					echo get_the_post_thumbnail($proyecto->ID,'full',array('class'=>'img-fluid'));
					else : 
				?>
					<img src="<?= IMAGES ?>/actualizando-info.jpg" alt="actualizando-ingenioart-info" class="img-fluid" />
				<?php endif;  ?>
			</figure> <!-- /figure -->
			<!-- Links del Artículo -->
			<section class="item-proyecto__links container-flex align-content text-xs-center">
				<!-- Link de vista --> 
				<?php  
					//Obtener url de la imagen 
					$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $proyecto->ID ) );
				?>
				<a href="<?= $feat_img; ?>" class="gallery-fancybox btn__link"><i class="fa fa-search" aria-hidden="true"></i></a>
				<!-- Link al proyecto -->
				<a href="<?= get_permalink( $proyecto->ID ); ?>" class="btn__link"><i class="fa fa-external-link" aria-hidden="true"></i></a>
				<!-- Titulo del artículo -->
				<h3 class="text-uppercase"><?php _e( $proyecto->post_title , LANG ); ?></h3>
			</section> <!-- /.item-proyecto__links -->
		</article> <!-- /.item-proyecto -->
		<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
	</section> <!-- /.pageInicio__portafolio__content -->

</section> <!-- /.pageInicio__portafolio -->


<!-- Banner A Portafolio -->
<section class="pageInicio__portafolio__banner container-flex align-content">
	<!-- Titulo --> <h2 class="text-xs-center"> <strong class="text-uppercase"> <?php _e( 'deseas ver más' , LANG ); ?> </strong>
	<?php _e( 'de nuestros trabajos realizados' , LANG ); ?> </h2>
	<!-- Link -->
	<?php  
		/* Obtener pagina portafolio */
		$page_portafolio = get_page_by_title('Portafolio');
	?>
	<a href="<?= get_permalink($page_portafolio->ID); ?>" class="btn__show-more btn__show-more--orange"><?php _e('Click aquí' , LANG ); ?></a>
</section> <!-- /.pageInicio__portafolio__banner -->


<!-- Sección Blog Carousel -->
<section class="pageCommon__preview-blog">
	<div class="container">
		<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e( 'blog' , LANG ); ?></h2>

		<!-- Contenedor Relativo -->
		<div class="relative">
			<!-- Contenedor de Carousel -->
			<section id="carousel-blog" class="pageCommon__preview-blog__carousel">
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

					<!-- Imagen Preview --> 
					<figure class="relative"> 

						<a href="<?= get_the_permalink($articulo->ID); ?>" title="<?= $articulo->post_title; ?>">

							<?= get_the_post_thumbnail( $articulo->ID ,'full', array('class'=>'img-fluid') ) ?> <!-- Flecha -->

							<figcaption class="container-flex align-content text-xs-center text-uppercase"><?= mysql2date('j M', $articulo->post_date); ?></figcaption> 

						</a> <!-- /. -->
					
					</figure> <!-- /figure -->

						<!-- Titulo -->
						<h2 class="text-uppercase"><?php _e( $articulo->post_title , LANG ); ?></h2>
						<!-- Extracto -->
						<div class="item-blog__excerpt"> 
							<?= apply_filters('the_content' , wp_trim_words( $articulo->post_content , 30 , '' ) ); ?> 
						</div> <!-- /.item-blog__excerpt -->

						<!-- Boton al articulo [derecha] -->
						<a href="<?= get_permalink($articulo->ID); ?>" class="pull-xs-right btn__show-more btn__show-more--orange"><?php _e( 'Ver más', LANG ); ?></a>

						<!-- Limpiar floats --> <div class="clearfix"></div>

				</article> <!-- /.item-blog -->
				<?php endforeach; ?>
			</section> <!-- /.pageCommon__preview-blog__carousel -->

			<!-- Flechas de Carousel -->
			<div class="hidden-xs-down">

				<a href="#" id="arrow__blog--prev" class="arrow__common-slider arrow__common-slider--prev">
					<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
				</a>

				<a href="#" id="arrow__blog--next" class="arrow__common-slider arrow__common-slider--next">
					<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
				</a>

			</div> <!-- /.hidden-xs-down -->

		</div> <!-- /.relative -->

	</div> <!-- /.container -->
</section> <!-- /.pageCommon__preview-blog -->

<!-- Sección Miscelanea -->
<section class="pageInicio__miscelaneo">
	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-8">
				<!-- Sección Suscribirse -->
				<section class="pageInicio__miscelaneo__content">
					<!-- Título --> <h2 class="pageCommon__title text-xs-center text-uppercase"><?php _e('suscribete',LANG ); ?></h2>

					<!-- Formulario -->
					<form id="form__suscribirse" action="" class="pageInicio__miscelaneo__form">
						
						<p class="description"><?php _e('Para obtener promociones e información interesante para tu negocio.', LANG ) ?> </p> 

						<!-- Nombre  -->
						<label for=""> <?php _e('Nombre:' , LANG ); ?></label>
						<input type="text" name="input_name" />

						<!-- Email  -->
						<label for=""> <?php _e('Email:' , LANG ); ?></label>
						<input type="email" name="input_email" />

						<!-- Boton Suscribirse -->
						<div class="text-xs-center">
							<button type="submit" class="btn__show-more btn__show-more--orange"><?php _e('Suscríbete', LANG ); ?></button>
						</div> <!-- /.text-xs-center -->

					</form> <!-- /.pageInicio__miscelaneo__form -->
				</section> <!-- /.pageInicio__miscelaneo__content -->
			</div> <!-- /col-xs-9 -->

			<div class="col-xs-12 col-sm-4">
				<!-- Sección Facebook -->
				<section class="pageInicio__miscelaneo__content">
					<!-- Título --> <h2 class="pageCommon__title text-xs-center text-uppercase"><?php _e('facebook',LANG ); ?></h2>

					<!-- Facebook -->
					<?php $link_facebook = $options['red_social_fb']; 
						if( !empty($link_facebook) ) :
					?>
						<section class="container__facebook">
							<!-- Contebn -->
							<div id="fb-root" class=""></div>

							<!-- Script -->
							<script>(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>

							<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-height="380" data-hide-cover="false" data-show-facepile="true">
							</div> <!-- /. fb-page-->
						</section> <!-- /.container__facebook -->
					<?php else: ?>
						<p class="text-xs-center">Opcion no habilitada temporalmente</p>
					<?php endif; ?>

				</section> <!-- /.pageInicio__miscelaneo__content -->
			</div>  <!-- /col-xs-4 -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /container -->

<!-- Sección Formulario de Contacto -->
<section class="pageInicio__contact">
	<div class="container">

		<div class="row">
	
			<div class="col-xs-12 col-sm-6">
				<!-- Imagen -->
				<figure class="pageInicio__contact__image">
					<img src="<?= IMAGES ?>/pages/inicio/inicio_vector_formulario.png" alt="inicio-formulario-contacto-ingenioart" class="img-fluid" />
				</figure> <!-- /.pageInicio__contact__image -->
			</div> <!-- /col-xs-6 -->

			<div class="col-xs-12 col-sm-6">
				<section class="pageInicio__contact__content">
					<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"><?php _e('formulario',LANG ); ?></h2>
					<!-- Formulario -->
					<form action="" class="pageInicio__contact__form">
						<p class="description"><?php _e('Para mayor información comuníquese con nosotros', LANG ); ?></p>

						<div class="row">

							<!-- Nombre --> 
							<div class="col-xs-12">
								<input type="text" name="input_nombre" placeholder="<?php _e('Nombre',LANG); ?>" />
							</div> <!-- /col-xs-12 -->						

							<!-- Correo --> 
							<div class="col-xs-12 col-sm-6">
								<input type="email" name="input_email" placeholder="<?php _e('Correo',LANG); ?>" />
							</div> <!-- /col-xs-12 -->						

							<!-- Telefono --> 
							<div class="col-xs-12 col-sm-6">
								<input type="text" name="input_phone" placeholder="<?php _e('Teléfono',LANG); ?>" />
							</div> <!-- /col-xs-12 -->						

							<!-- Mensaje --> 
							<div class="col-xs-12">
								<textarea name="input_message" id="" placeholder="<?php _e('Mensaje',LANG); ?>" ></textarea>
							</div> <!-- /col-xs-12 -->

						</div> <!-- /.row -->
						
						<!-- Boton Enviar -->
						<div class="text-xs-center">
							<a href="#" class="btn__show-more btn__show-more--orange"><?php _e('Enviar',LANG); ?></a>
						</div> <!-- /.text-xs-center -->

					</form> <!-- /.pageInicio__contact__form -->
				</section>	
			</div>  <!-- /col-xs-6 -->
			
		</div> <!-- /.row -->

	</div> <!-- /.container -->
</section> <!-- /.pageInicio__contact -->

<!-- Footer -->
<?php get_footer(); ?>