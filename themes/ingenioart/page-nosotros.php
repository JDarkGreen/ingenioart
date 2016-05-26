<?php /* Template Name: Página Nosotros Plantilla */ ?>

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
	
	<div class="container">
		<!-- Titulo Slogan  -->
		<?php if( !empty( $post->post_excerpt ) ) : ?>
		<h2 class="text-featured--blue text-xs-center">
			<?php _e( $post->post_excerpt , LANG ); ?>
		</h2> <!-- /.text-featured--blue -->
		<?php endif; ?>
		
		<!-- Quienes Somos -->
		<section class="pageNosotros__description">
			<div class="row">

				<div class="col-xs-12 col-md-6">
					<section class="">
						<!-- Titulo --> <h2 class="pageCommon__title text-uppercase"> <?php _e( 'quienes somos?' , LANG ); ?></h2> <!-- /.pageCommon__title -->
						<!-- Contenido -->
						<?php if( !empty($post->post_content) ) : ?>
						<div class="text-justify">
							<?= apply_filters( 'the_content', $post->post_content ); ?>
						</div> <!-- /.text-justify -->
						<?php else: echo "Actualizando Contenido." ; endif; ?>	
					</section> <!-- /. -->
				</div> <!-- /.col-xs-12 col-md-6 -->
				<div class="col-xs-12 col-md-6 text-xs-center">
					<!-- Imagen  Destacada -->
					<?php if( has_post_thumbnail( $post->ID ) ) : ?>
					<figure class="pageNosotros__image">
						<?= get_the_post_thumbnail( $post->ID,'full',array('class'=>'img-fluid')); ?>	
					</figure> <!-- /.pageNosotros__image -->
					<?php else: echo "Actualizando Imágen"; endif;  ?>
				</div><!-- /.col-xs-12 col-md-6 --> 

			</div> <!-- /.row -->
		</section> <!-- /.pageNosotros__description -->
		
	</div> <!-- /.container -->


	<!-- Sección Mision . Visión y Valores -->
	<section class="pageNosotros__aptitudes">
		<div class="container">

			<div class="row">
				<div class="col-xs-4">
					<!-- Misión -->
					<article class="item-aptitud text-xs-center">
						<!-- Imagen <-->
						<figure class="item-aptitud__image relative container-flex align-content">
							<img src="<?= IMAGES ?>/icon/nosotros_icono_mision.png" alt="nosotros_icono_vision" class="img-fluid center-block" />
						</figure> <!-- /.item-aptitud__image" -->
						<!-- Titulo -->
						<h2 class="item-aptitud__title text-uppercase"><?php _e('misión',LANG); ?></h2>
						<!-- Contenido -->
						<?php if( isset($options['text_mision']) && !empty($options['text_mision']) ) : echo apply_filters('the_content' , $options['text_mision'] );
						else: "Actualizando Contenido" ; endif; ?>
					</article> <!-- /.item-aptitud -->
				</div> <!-- /.col-xs-4 -->
				<div class="col-xs-4">
					<!-- Visión -->
					<article class="item-aptitud text-xs-center">
						<!-- Imagen <-->
						<figure class="item-aptitud__image relative container-flex align-content">
							<img src="<?= IMAGES ?>/icon/nosotros_icono_vision.png" alt="nosotros_icono_vision" class="img-fluid center-block" />
						</figure> <!-- /.item-aptitud__image" -->
						<!-- Titulo -->
						<h2 class="item-aptitud__title text-uppercase"><?php _e('visión',LANG); ?></h2>
						<!-- Contenido -->
						<?php if( isset($options['text_vision']) && !empty($options['text_vision']) ) : echo apply_filters('the_content' , $options['text_vision'] );
						else: "Actualizando Contenido" ; endif; ?>
					</article> <!-- /.item-aptitud -->
				</div> <!-- /.col-xs-4 -->
				<div class="col-xs-4">
					<!-- Visión -->
					<article class="item-aptitud text-xs-center">
						<!-- Imagen <-->
						<figure class="item-aptitud__image relative container-flex align-content">
							<img src="<?= IMAGES ?>/icon/nosotros_icono_valores.png" alt="nosotros_icono_vision" class="img-fluid center-block" />
						</figure> <!-- /.item-aptitud__image" -->
						<!-- Titulo -->
						<h2 class="item-aptitud__title text-uppercase"><?php _e('valores',LANG); ?></h2>
						<!-- Contenido -->
						<?php if( isset($options['text_valores']) && !empty($options['text_valores']) ) : echo apply_filters('the_content' , $options['text_valores'] );
						else: "Actualizando Contenido" ; endif; ?>
					</article> <!-- /.item-aptitud -->
				</div> <!-- /.col-xs-4 -->
			</div> <!-- /.row -->

			<!-- Sección de Frases  -->
			<div class="pageNosotros__frase">
				<?php  
					$args = array(
						'orderby'        => 'rand',
						'post_status'    => 'publish', 
						'post_type'      => 'frase',
						'posts_per_page' => 1,
					);
					$frases = get_posts( $args );
					$frase  = $frases[0];
					if( !empty($frase) ) :
				?> <!-- título -->
				<h2 class="text-featured--blue text-xs-center"><?php  _e( '"' . $frase->post_content . '"' ,LANG); ?></h2>
				<!-- Excerpt --> <h3 class="text-author text-xs-right"><?php _e($frase->post_excerpt,LANG); ?></h3>
				<?php endif; ?>
			</div> <!-- /.pageNosotros__frase -->

		</div> <!-- /.container -->
	</section> <!-- /.pageNosotros__aptitudes -->

	<!-- Sección Team -->
	<section class="pageNosotros__team">
		<div class="container">
			<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e('team', LANG ); ?></h2>
			<!-- Subtitulo --> <h3 class="pageCommon__subtitle text-xs-center"> <?php _e('Tener los profesionales más cualificados y dedicado es grande, pero excelencia sólo se puede lograr mediante el trabajo organizado.' , LANG ); ?> </h3>

			<!-- Contenedor de Team -->
			<section class="pageNosotros__team__content container-flex align-content">
				<?php  
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    =>'publish',
						'post_type'      => 'team',
						'posts_per_page' => -1,
					);
					$personas = get_posts( $args );
					foreach( $personas as $persona ) :
				?>
				<article class="item-team text-xs-center">
					<?= get_the_post_thumbnail($persona->ID,'full',array('class'=>'img-fluid') ); ?>
					<!-- Nombre --> <h2 class="item-team__title"><strong><?php _e($persona->post_title,LANG ); ?></strong></h2>
					<!-- Cargo --> <p><?php _e($persona->post_excerpt,LANG); ?></p>
				</article> <!-- /.item-team -->
				<?php endforeach; ?>
			</section> <!-- /. pageNosotros__team__content-->

		</div> <!-- /container -->
	</section> <!-- /.pageNosotros__team -->

	<!-- Incluir Seccion banner de servicios -->
	<?php include(locate_template("partials/banner-services.php") ); ?>

</main> <!-- /.pageWrapper -->



<!-- Get Footer -->
<?php get_footer(); ?>