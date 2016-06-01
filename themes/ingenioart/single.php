<?php /* Pagina Single */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  $banner = $post; 
	$banner_title = "Artículo";
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Global -->
<main class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row pageCommon__preview-blog">
			<!--  Sección Artículo  -->
			<div class="col-xs-8">
				<article class="item-blog">
					<!-- Imagen -->
					<figure class="pageBlog__image-featured">
						<?= get_the_post_thumbnail( $post->ID ,'full', array('class'=>'img-fluid') ); ?>
						<!-- Figcaption fecha -->
						<figcaption class="container-flex align-content text-xs-center text-uppercase"><?= mysql2date('j M', $post->post_date); ?></figcaption>
					</figure> <!-- /.pageBlog__image-featured -->

					<!-- Titulo -->
					<h2 class="pageCommon__title text-uppercase"> <?php _e( $post->post_title , LANG ); ?></h2>

					<!-- Contenido -->
					<div class="item-blog__content">
						<?= apply_filters('the_content', $post->post_content ); ?>
					</div> <!-- /.item-blog__content -->

					<!-- Sección Compartir Noticia -->
					<section class="item-blog__share">
						<!-- Titulo --> <h3 class="text-uppercase"><?php _e('comparte esta noticia'  , LANG ); ?></h3>
						<!-- Compartir --> 
						<div class="multimedia__item__share">
							<!-- Facebook -->
							<a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink( $post->ID ); ?>' , '_blank' , 'width=400 , height=500' ); void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<!-- Twitter -->
							<a href="javascript:window.open('https://twitter.com/intent/tweet?text=<?= '!Hola! este artículo me pareció interesante: ' . get_permalink( $post->ID ) . ' !Visítalo!' ; ?>' , '_blank' , 'width=400 , height=500' ); void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a>	
						</div>
					</section> <!-- /.item-blog__share -->

					<!-- Sección Comentarios -->
					<section class="item-blog__comments-area" id="comments">
						<?php comments_template('', true); ?>
					</section> <!-- end comments-area -->

				</article> <!-- /.article -->
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