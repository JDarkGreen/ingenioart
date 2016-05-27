<?php /* Sidebar Categorias  y artículos relacionados para el Blog */ ?>

<aside class="pageBlog__sidebar">

	<!-- Sección Categorías -->
	<section class="pageBlog__sidebar__categories">
		<!-- Título --> <h2 class="text-uppercase"><strong><?php _e('categorías',LANG); ?></strong></h2>
		<!-- Categorias -->
		<?php 
			$categories = get_terms( 'category', 'orderby=count&hide_empty=0' ); 
			#var_dump($categories);
			foreach( $categories as $cat ) : 
		?> <!-- Item categoría -->
		<div class="item-category">
			<?php 
				$class =  isset($category) && $category->term_id == $cat->term_id ? 'active' : ''; 
			?>
			<a class="<?= $class ?>" href="<?= get_category_link( $cat->term_id ); ?>"><?= $cat->name . " " . "(".$cat->count.")" ; ?></a>
		</div> <!-- /.item-category -->
		<?php endforeach; ?>
	</section> <!-- /.pageBlog__sidebar__categories -->

	<!-- Sección Artículos Destacados -->
	<section class="pageBlog__sidebar__features">
		<!-- Botones -->
		<div class="group-buttons-tabs">
			<a href="#articles-popular" class="active"><?php _e('Popular',LANG ); ?></a>
			<a href="#articles-recient"><?php _e('Reciente',LANG ); ?></a>
		</div> <!-- /.group-buttons-features -->
	
		<!-- Articulos -->
		<section class="articles-features">

			<!-- Populares -->
			<div id="articles-popular" class="articles-features__item active">
				<?php  
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'rand',
						'post_status'    => 'publish',
						'posts_per_page' => 4,
					);
					$populares = get_posts( $args );
					if( !empty($populares) ) :
					foreach( $populares as $popular ) : 
				?> <!-- Articulo -->
					<article class="item-article">
						<a href="<?= $popular->guid; ?>">
						<!-- Imagen --> <figure class="pull-xs-left"><?= get_the_post_thumbnail($popular->ID,'full',array('class'=>'img-fluid') ); ?> </figure>
						</a> <!-- /. -->

						<div class="">
							<!-- Texto -->
							<h3><?php _e( $popular->post_title , LANG ); ?></h3>
							<!-- Fecha <--></-->
							<p><?= mysql2date('M j Y', $popular->post_date); ?></p>
						</div>

						<!-- Limpiar Floats  --> <div class="clearfix"></div>
					</article> <!-- /.item-article -->
				<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
			</div><!-- /# -->

			<!-- Reciente -->
			<div id="articles-recient" class="articles-features__item">
				<?php  
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_status'    => 'publish',
						'posts_per_page' => 4,
					);
					$recientes = get_posts( $args );
					if( !empty($recientes) ) :
					foreach( $recientes as $recient ) : 
				?> <!-- Articulo -->
					<article class="item-article">
						<a href="<?= $recient->guid; ?>">
						<!-- Imagen --> <figure class="pull-xs-left"><?= get_the_post_thumbnail($recient->ID,'full',array('class'=>'img-fluid') ); ?> </figure>
						</a> <!-- /. -->

						<div class="">
							<!-- Texto -->
							<h3><?php _e( $recient->post_title , LANG ); ?></h3>
							<!-- Fecha <--></-->
							<p><?= mysql2date('M j Y', $recient->post_date); ?></p>
						</div>

						<!-- Limpiar Floats  --> <div class="clearfix"></div>
					</article> <!-- /.item-article -->
				<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
			</div><!-- /# -->

		</section> <!-- /.articles-features -->

	</section> <!-- /.pageBlog__sidebar__features -->

</aside> <!-- /.pageBlog__sidebar -->