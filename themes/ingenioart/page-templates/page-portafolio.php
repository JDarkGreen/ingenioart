<?php /* Template Name: Página Portafolio Plantilla */ ?>

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
	<!-- Slogan -->
	<?php if( !empty($post->post_content) ) : ?>
		<div class="pagePortafolio__slogan text-xs-center">
			<?php _e( $post->post_content , LANG ); ?>
		</div> <!-- /.pagePortafolio__slogan -->
	<?php endif; ?>

	<!-- Contenedor de proyectos -->
	<section class="pagePortafolio__content text-xs-center">

		<!-- Botones que filtran los proyectos -->
		<section class="button-group filter-button-group">
			<button class="active" data-filter="*"><?php _e( 'todo', LANG ); ?></button>
			<!-- Extraer taxonomias -->
			<?php  
				$args = array(
					'taxonomy'   => 'portafolio_category',
					'hide_empty' => false,
				);
				$cats_portafolio = get_terms( $args ); #var_dump($cats_portafolio);
				foreach( $cats_portafolio as $cat_portafolio ) : 
			?>
				<button data-filter="<?= "." . $cat_portafolio->slug ?>"><?= $cat_portafolio->name ?></button>
			<?php endforeach; ?>
		</section> <!-- /. -->

		<!-- Obtener todos las imágenes destacadas del Portafolio -->
		<section id="portafolio-proyectos" class="pageInicio__portafolio__content container-flex">
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
			<!-- Obtener Terminos para Cada proyecto -->
			<?php 
				$args = array("fields"=>"slugs");
				$terms_project = wp_get_post_terms( $proyecto->ID, 'portafolio_category', $args );
				//unir los términos
				$terminos_project = "";
				$terminos_project = implode( " " , $terms_project); 
			?>
			<article class="item-proyecto <?= $terminos_project; ?> relative">
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
					<?php  
						//Obtener url de la imagen 
						$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $proyecto->ID ) );
					?>
					<!-- Link de vista --> 
					<a href="<?= !empty($feat_img) ? $feat_img : IMAGES . '/actualizando-info.jpg' ; ?>" content="<?= $proyecto->post_title ?>" class="gallery-fancybox btn__link"><i class="fa fa-search" aria-hidden="true"></i></a>
					<!-- Link al proyecto --> 
					<a href="<?= get_permalink( $proyecto->ID ); ?>" class="btn__link"><i class="fa fa-external-link" aria-hidden="true"></i></a>
					<!-- Titulo del artículo -->
					<h3 class="text-uppercase"><?php _e( $proyecto->post_title , LANG ); ?></h3>
				</section> <!-- /.item-proyecto__links -->
				
			</article> <!-- /.item-proyecto -->
			<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>

		</section> <!-- /.pageInicio__portafolio__content -->

		<!-- Limpiar floats --><div class="clearfix"></div>

		<!-- Mensaje Isotope en caso no se haya encontrado elementos -->
		<div id="message-proyecto" style="display:none;">
			<h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e('No hay proyectos en esta categoría aún' , LANG ); ?></h2>
		</div> <!-- /#message-proyecto -->

	</section><!-- /.pagePortafolio__content -->
	
	<!-- Limpiar floats --> <p class="clearfix"></p>

</main> <!-- /.pageWrapper -->

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>