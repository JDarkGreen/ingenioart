<?php /* Template Name: Página Blog Plantilla */ ?>

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
	<main class="pageCommon__wrapper pageBlog">
		<div class="row">

			<div class="col-xs-12 col-md-8">
				<!-- Seccion Contenedora de Articulos -->
				<section class="pageBlog__content">
					<?php  //Extraer los posts
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'post',
							'posts_per_type' => -1,
						);
						$articulos = get_posts( $args );

						//Control 
						$i = 0;

						if( count($articulos) > 0 ) : 
						foreach( $articulos as $articulo ) :
					?>
					<!-- Articulo -->
					<!-- Agregar Clases -->
					<?php  
						$class_article = "";
						if( $i == 0 ) 
							$class_article = "no-padding-top";
						else if( $i == count($articulos) - 1 ) 
							$class_article = "no-padding-bottom";
					?>
					<article class="pageBlog__article <?= $class_article ?>">
						<div class="row">
							<div class="col-xs-12 col-md-5">
								<figure class="pageArticle__figure">
									<?php //Imagen 
										$feat_img = get_the_post_thumbnail( $articulo->ID , 'full' , array('class'=>'img-responsive') );
										if( !empty($feat_img) ) : echo $feat_img; else:   
									?>
										<img src="" alt="" class="img-responsive" />
									<?php endif; ?>
								</figure>
							</div> <!-- /.col-xs-5 -->
							<div class="col-xs-12 col-md-7">
								<!-- Titulo --> <h2 class="pageBlog__article__title text-uppercase"><?php _e( $articulo->post_title , LANG ); ?></h2>
								<!-- Extracto --> <div class="pageBlog__article__text text-justify">
									<?= apply_filters( 'the_content' , wp_trim_words( $articulo->post_content , 40 , "" )  ); ?>
									<!-- Botón Leer Más -->
									<a href="<?= $articulo->guid ?>" class="btn__read-more text-uppercase"><?php _e('leer más', LANG ); ?></a>
								</div> <!-- /pageBlog__article__text -->
							</div> <!-- /.col-xs-7 -->
						</div> <!-- /.row -->
					</article> <!-- /.pageBlog__article -->
					<?php $i++; endforeach; else: echo "Actualizando Contenido"; endif; ?>
				</section> <!-- /.pageBlog__content -->

			</div> <!-- /.col-xs-8 -->

			<div class="col-xs-4 hidden-xs">
				<aside class="pageBlog__categories">
					<!-- Incluir template categorias -->
					<?php include( locate_template('partials/content-category-post.php') ) ?>
				</aside><!-- /.pageBlog__categories -->
			</div> <!-- /.col-xs-4 -->

		</div> <!-- ./row -->
	</main> <!-- /.pageCommon__wrapper -->
</div> <!-- /.container -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>