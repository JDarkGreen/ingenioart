<!-- Global Post -->
<?php 
	$options  = get_option('constructec_custom_settings'); 
	$category = get_queried_object(); #var_dump($category);
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $category;
	$banner_title = $category->name;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenido Principal -->
<section class="pageBlog">
	<div class="container">
		<div class="row">
			<!-- Seccion de Blogs -->
			<div class="col-xs-12 col-sm-8">
				<section class="pageBlog__content">
					<!-- Extraer los posts -->
					<?php //el query
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'post',
							'posts_per_page' => -1,
							'category_name'  => $category->slug,
						);
						$query = new WP_Query( $args );

						if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
					?>
					<!-- Artículo flexible -->
					<article class="pageBlog__content__article container-flex-center">
						<!-- Imagen -->
						<figure>
						<?php if( has_post_thumbnail() ) : the_post_thumbnail('full',array('class'=>'img-fluid')); ?>
						<?php else: ?>
							<img src="<?= IMAGES ?>/no-disponible.jpg" alt="no-disponible" class="img-fluid" />
						<?php endif; ?>	
						</figure>
						<!-- Extracto o contenido -->
						<div class="pageBlog__content__article__text">
							<h2 class="sectionCommon__subtitle text-uppercase">
								<strong><?php _e( get_the_title() , LANG ); ?></strong>
							</h2><!-- /.sectionCommon__subtitle --> <br/>
							<!-- Contenido -->
							<?= wp_trim_words( get_the_content() , 30 , '...' ) . "<br/>"; ?>
							<!-- Botón ver más -->
							<a href="<?php the_permalink() ?>" class="btn__show-more-post text-uppercase">
								<?php _e('leer más' , LANG ); ?>
							</a>
						</div> <!-- /.pageBlog__content__article__text -->
					</article> <!-- /.pageBlog__content__article -->
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</section> <!-- /.pageBlog__content -->
			</div> <!-- /.col-xs-8 -->
			<!-- Aside de red social -->
			<div class="col-xs-12 col-sm-4">

				<!-- Incluir las categorias de los posts -->
				<?php 
					$category_slug = $category->slug;
					include( locate_template("partials/categories-post.php") ); 
				?>		

				<!-- Facebook -->
				<?php $link_facebook = $options['red_social_fb']; 
					if( !empty($link_facebook) ) :
				?>
				<section class="pageInicio__miscelaneo__facebook">
					<!-- Contebn -->
					<div id="fb-root" class=""></div>

					<!-- Script -->
					<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

					<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false"  data-adapt-container-width="true" data-height="420" data-hide-cover="false" data-show-facepile="true">
						<div class="fb-xfbml-parse-ignore">
							<blockquote cite="<?= $link_facebook ?>">
								<a href="<?= $link_facebook ?>"><?php bloginfo('name'); ?></a>
							</blockquote>
						</div>
					</div>
				</section> <!-- /.pageInicio__miscelaneo__facebook text-xs-center -->

				<?php endif; ?>
			</div> <!-- /.col-xs-4 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageBlog -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>