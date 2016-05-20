<?php /* Template Name: Página Mantenimiento Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('constructec_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenido Principal -->
<section class="pageMantenimiento">
	<div class="container">
		<!-- Titulo -->
		<h2 class="sectionCommon__subtitle text-uppercase">
			<strong><?php _e( 'Mantenimiento y' . "<br/>" . 'servicios generales' , LANG ); ?></strong>
		</h2> <!-- /. -->

		<!-- Contenido -->
		<div class="pageMantenimiento__content">
			<?= apply_filters('the_content' , $post->post_content ); ?>

			<!-- Imagen -->
			<?php $thumbnail = get_the_post_thumbnail( $post->ID, 'full' , array('class'=>'img-fluid'));
				if( !empty($thumbnail) ) :
			?>
			<figure class="pageMantenimiento__content__image">
				<?= $thumbnail; ?>
			</figure> <!-- /.pageMantenimiento__content__image -->
			<?php endif; ?>
		</div> <!-- /.pageMantenimiento__content -->

	</div> <!-- /.container -->
</section> <!-- /.pageMantenimiento -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>