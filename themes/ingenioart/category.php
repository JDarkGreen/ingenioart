<?php /* Categoría Plantilla */ ?>

<!-- Global Post -->
<?php 
	$category = get_queried_object(); #var_dump($category);
	$options  = get_option('ingenioart_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $category; 
	$banner_title = $category->name; 
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Global -->
<main class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row">
			<!--  Sección Artículos - Previews  -->
			<div class="col-xs-8">
				<div class="row pageCommon__preview-blog">
					<!-- Artículos -->
					<?php  
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'post',
							'posts_per_page' => -1,
							'category_name'  => $category->slug,
						);
						$articulos = get_posts( $args );
						if( !empty($articulos) ) : foreach( $articulos as $articulo ) :
					?>
					<div class="col-xs-6">
						<!-- Articulo -->
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
					</div> <!-- /.col-xs-6 -->

					<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
				</div> <!-- /.row -->
			</div> <!-- /.col-xs-8 -->

			<!-- Aside Categorías-->
			<div class="col-xs-4">
				<!-- Incluir template categorias -->
				<?php include( locate_template("partials/sidebar-categories.php" ) ); ?>
			</div> <!-- /.col-xs-4 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->

</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>