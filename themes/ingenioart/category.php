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

	#Variable paged paginación
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	#Posts por página
	$posts_per_page = 4;
?>

<!-- Contenedor Global -->
<main class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row">
			<!--  Sección Artículos - Previews  -->
			<div class="col-xs-12 col-sm-8">

				<div class="row pageCommon__preview-blog">
					<!-- Artículos -->
					<?php  
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'post',
							'paged'          => $paged,
							'posts_per_page' => $posts_per_page,
							'category_name'  => $category->slug,
						);

						$the_query = new WP_Query( $args );

						if( $the_query->have_posts() ) : 

						while( $the_query->have_posts() ) : $the_query->the_post();
					?>
					<div class="col-xs-12 col-sm-6">
						<!-- Articulo -->
						<article class="item-blog">
							<!-- Imagen Preview --> <figure class="relative"> <?= get_the_post_thumbnail( get_the_ID() ,'full', array('class'=>'img-fluid') ) ?> 

							<!-- Fecha -->
							<figcaption class="container-flex align-content text-xs-center text-uppercase">
								<?php 
									#mysql2date('j M', get_the_date() ); 
									echo get_the_date( 'j M' , get_the_ID() );
								?>
							</figcaption> 

							</figure> <!-- /figure -->

							<!-- Titulo -->
							<h2 class="text-uppercase"><?php _e( get_the_title() , LANG ); ?></h2>
							<!-- Extracto -->
							<div class="item-blog__excerpt"> 
								<?php  
									$contenido = wp_strip_all_tags( get_the_content() );
									$contenido = wp_trim_words( $contenido , 30 , '' );

									echo apply_filters( 'the_content' , $contenido ); 
								?> 
							</div> <!-- /.item-blog__excerpt -->

							<!-- Boton al articulo [derecha] -->
							<a href="<?= get_permalink( get_the_ID()  ); ?>" class="pull-xs-right btn__show-more btn__show-more--orange"><?php _e( 'Ver más', LANG ); ?></a>

							<!-- Limpiar floats --> <div class="clearfix"></div>

						</article> <!-- /.item-blog -->
					</div> <!-- /.col-xs-6 -->

					<?php endwhile; ?>

				</div> <!-- /.row pageCommon__preview-blog-->

				<!-- PAGINACIÓN AQUI -->
				<section class="sectionPagination text-xs-center">
					<!-- Link to Home -->
					<?php $current_item_page = ($paged - 1) * $posts_per_page; ?>
					<span> <?= "Página ( $current_item_page / $the_query->found_posts )" ?></span>
					<!-- Enlaces a página -->
					<?php  
						/*
						Numero total de páginas. Is the result of $found_posts / $posts_per_page 
						*/
						$pages = $the_query->max_num_pages;
						for ( $i=1 ; $i <= $pages ; $i++ ) { ?>
						<a class="<?= $i == $paged ? 'active current' : '' ?>" href="<?= get_pagenum_link( $i ); ?>"> <?= $i; ?> </a>
					<?php } /* endfor */ ?>
				</section> <!-- /.sectionPagination -->

			<?php 
				#Si no hay contenido
				else: echo "Actualizando Contenido";
				#Finalizar condicional y resetear la consulta 
				endif; wp_reset_postdata();
			?>
			</div> <!-- /.col-xs-8 -->

			<!-- Aside Categorías-->
			<div class="col-xs-4 hidden-xs-down">
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