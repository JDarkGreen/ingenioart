<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('constructec_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $post;
	$banner_title = "artículo";
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Incluir contenido Principal -->
<main class="pageBlog__article">

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<!-- Article -->
				<article class="pageArticle__content">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle text-uppercase">
					<strong><?php _e( $post->post_title , LANG ); ?></strong>
					</h2>

					<!-- Imagen -->
					<?php if( has_post_thumbnail( $post->ID )) : ?>
						<figure class="pageArticle__image">
							<?php the_post_thumbnail('full',array('class'=>'img-responsive') ); ?>
						</figure> <!-- /.pageArticle__image -->
					<?php endif;?>

					<!-- Contenido -->
					<?php if( !empty( $post->post_content )) :  ?>
						<?= apply_filters('the_content', $post->post_content ); ?>
					<?php endif; ?>
				</article> <!-- /.pageArticle__content -->
			</div> <!-- /.col-xs-12 col-md-8 -->
			<div class="col-md-4 hidden-xs">
				<aside class="pageBlog__categories">
					<!-- Incluir template categorias -->
					<?php include( locate_template('partials/content-category-post.php') ) ?>
				</aside><!-- /.pageBlog__categories -->
			</div> <!-- /.col-xs-12 col-md-4 -->
		</div> <!--/.row -->
	</div> <!-- /.container -->

</main> <!-- /pageBlog__article -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>