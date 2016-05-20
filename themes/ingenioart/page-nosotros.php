<?php /* Template Name: Página Nosotros Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('timco_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- CONTENEDOR COMUN -->
<div class="container">
	<main class="pageCommon__wrapper pageNosotros">
		<!-- SECCION QUIENES SOMOS -->
		<section>
			<!-- Titulo --> <h2 class="text-uppercase sectionCommon__subtitle">
			<?php _e('quienes somos' , LANG ); ?></h2>

			<div class="row container-flex align-content">
				<div class="col-xs-12 col-md-6">
					<!-- DESCRIPCION QUIENES SOMOS -->
					<?php 
						$text_nosotros = $post->post_content; if( !empty($text_nosotros) ) :
						echo apply_filters('the_content' , $text_nosotros );
						else: _e( 'Actualizando Contenido' , LANG  );
						endif;
					?>
				</div> <!-- /col-xs-12 col-md-6-->

				<div class="col-xs-12 col-md-6">
					<!-- GALERÍA QUIENES SOMOS -->
					<section class="pageNosotros__gallery js-carousel-gallery">
						<?php 
							$input_ids_img  = -1;
							$input_ids_img  = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
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
							foreach( $attachment as $atta ) :
						?>
							<div class="item">
								<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="img-responsive" />
							</div> <!-- /.item -->
						<?php endforeach; ?>
					</section> <!-- /.pageNosotros__gallery -->
				</div> <!-- /.col-xs-12 col-md-6 -->
			</div> <!-- /.row -->
		</section> <!-- /.section -->

		<!-- LINEA SEPARADORA  --> <div class="line-separation--gray"></div>

		<!-- SECCION DE HISTORIA , VISIÓN Y MISIÓN -->
		<section>
			<!-- Titulo --> <h2 class="text-uppercase sectionCommon__subtitle">
			<?php _e('nuestra historia' , LANG ); ?></h2>

			<!-- Contenido Historia -->	
			<div class="pageNosotros__text text-justify">
				<?php if( isset( $options['text_historia'] ) && !empty($options['text_historia']) ) : ?>
					<?php 
						$text_historia = $options['text_historia'];
						echo apply_filters('the_content' , $text_historia ); 
						else: _e( 'Actualizando Contenido' , LANG );
					?>
				<?php endif; ?>
			</div> <!-- /.pageNosotros__text -->

			<!-- Contenido Mision y Visión -->
			<section class="pageNosotros__aptitudes">
				<div class="row">
					<div class="col-xs-12 col-md-6">

						<!-- Mision -->
						<article class="pageNosotros__aptitudes__item">
							<!-- Titulo --> <h2 class="text-uppercase sectionCommon__subtitle sectionCommon__subtitle--white">
							<?php _e('misión' , LANG ); ?></h2>
							<!-- Texto -->
							<?php if( isset( $options['text_mision'] ) && !empty($options['text_mision']) ) : ?>
								<?php 
									$text_mision = $options['text_mision'];
									echo apply_filters('the_content' , $text_mision ); 
									else: _e( 'Actualizando Contenido' , LANG );
								?>
							<?php endif; ?>						
						</article> <!-- /.pageNosotros__aptitudes__item -->

						<!-- Vision -->
						<article class="pageNosotros__aptitudes__item">
							<!-- Titulo --> <h2 class="text-uppercase sectionCommon__subtitle sectionCommon__subtitle--white">
							<?php _e('visión' , LANG ); ?></h2>
							<!-- Texto -->
							<?php if( isset( $options['text_vision'] ) && !empty($options['text_vision']) ) : ?>
								<?php 
									$text_vision = $options['text_vision'];
									echo apply_filters('the_content' , $text_vision ); 
									else: _e( 'Actualizando Contenido' , LANG );
								?>
							<?php endif; ?>						
						</article> <!-- /.pageNosotros__aptitudes__item -->

					</div> <!-- /.col-xs-12 col-md-6 -->
					<div class="col-xs-12 col-md-6">

						<!-- Vision -->
						<article class="pageNosotros__aptitudes__item pull-right">
							<!-- Titulo --> <h2 class="text-uppercase sectionCommon__subtitle sectionCommon__subtitle--white">
							<?php _e('pilares estratégicos' , LANG ); ?></h2>
							<!-- Texto -->
							<?php if( isset( $options['text_pilares'] ) && !empty($options['text_pilares']) ) : ?>
								<?php 
									$text_pilares = $options['text_pilares'];
									echo apply_filters('the_content' , $text_pilares ); 
									else: _e( 'Actualizando Contenido' , LANG );
								?>
							<?php endif; ?>						
						</article> <!-- /.pageNosotros__aptitudes__item -->

						<!-- Limpiar Float --> <div class="clearfix"></div>

					</div> <!-- /.col-xs-12 col-md-6 -->
				</div> <!-- /-row -->
			</section> <!-- /.pageNosotros__aptitudes -->

		</section> <!-- /.section -->

	</main> <!-- /.pageCommon__wrapper -->
</div> <!-- /.container -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>