<?php /* Pagina Single */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	/** Obtener Página de Blog **/
	$banner       = get_page_by_title("blog"); 
	$banner_title = "Artículo";
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Global -->
<main class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row pageCommon__preview-blog">

			<!--  Sección Artículo  -->
			<div class="col-xs-12 col-sm-8">
				<article class="item-blog">
					<!-- Imagen -->
					<figure class="pageBlog__image-featured">

						<?php if( has_post_thumbnail($post->ID) ): ?>
							
							<?= get_the_post_thumbnail( $post->ID ,'full', array('class'=>'img-fluid') ); ?>
							
						<?php else: ?>

							<img src="<?= IMAGES . '/no-disponible.jpg'; ?>" alt="<?= $post->post_name; ?>" class="img-fluid" />

						<?php endif; ?>

						<!-- Figcaption fecha -->
						<figcaption class="container-flex align-content text-xs-center text-uppercase"><?= mysql2date('j M', $post->post_date); ?></figcaption>
					</figure> <!-- /.pageBlog__image-featured -->

					<!-- Titulo -->
					<h2 class="pageCommon__title text-uppercase"> <?php _e( $post->post_title , LANG ); ?></h2>

					<!-- Contenido -->
					<div class="item-blog__content">
						<?= apply_filters('the_content', $post->post_content ); ?>
					</div> <!-- /.item-blog__content -->

					<!-- Galería  -->
					<?php  
						/* Obtener Galería de Imágenes */
						$mb_gallery = get_post_meta( $post->ID, 'imageurls_'.$post->ID , true);

						if( !empty($mb_gallery) ): 

						$mb_gallery = explode( ',' , $mb_gallery );  
						$mb_gallery = array_diff( $mb_gallery , array('-1',1,'') ); 
						$mb_gallery = array_filter($mb_gallery); ?>

						<div id="carousel-single-post" class="js-carousel-gallery">
							
							<?php 
								foreach( $mb_gallery as $item ): 
								$image = get_post( $item ); 
							?>

							<img src="<?= $image->guid ?>" alt="<?= $image->post_title ?>" class="img-fluid" />

							<?php endforeach; ?>

						</div> <!-- /#carousel-single-post -->

					<?php endif; ?>

					<!-- Sección Compartir Noticia -->
					<section class="item-blog__share">
						<!-- Titulo --> <h3 class="text-uppercase"><?php _e('comparte esta noticia'  , LANG ); ?></h3>
						<!-- Compartir --> 
						<div class="multimedia__item__share">

							<!-- Facebook -->
							<a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink( $post->ID ); ?>' , '_blank' , 'width=400 , height=500' ); void(0);">
								
								<img src="<?= IMAGES . '/redes-sociales/facebook.jpg' ?>" alt="share-facebook-<?= $post->post_title; ?>" class="img-fluid" />

							</a>

							<!-- Twitter -->
							<a href="javascript:window.open('https://twitter.com/intent/tweet?text=<?= '!Hola! este artículo me pareció interesante: ' . get_permalink( $post->ID ) . ' !Visítalo!' ; ?>' , '_blank' , 'width=400 , height=500' ); void(0);">
								
								<img src="<?= IMAGES . '/redes-sociales/twitter.jpg' ?>" alt="share-twitter-<?= $post->post_title; ?>" class="img-fluid" />

							</a>	

						</div>
					</section> <!-- /.item-blog__share -->

					<!-- Sección Comentarios -->
					<section class="item-blog__comments-area" id="comments">
						<?php comments_template('', true); ?>
					</section> <!-- end comments-area -->

				</article> <!-- /.article -->
			</div> <!-- /.col-xs-12 col-sm-8 -->

			<!-- Aside Categorías-->
			<div class="col-sm-4 hidden-xs-down">
				<!-- Incluir template categorias -->
				<?php include( locate_template("partials/sidebar-categories.php" ) ); ?>
			</div> <!-- /.col-xs-12 col-sm-4 -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->

</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>