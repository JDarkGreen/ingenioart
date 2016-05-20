<?php /* Archivo que contiene el partial de carousel clientes */ ?>

<!-- Sección de Clientes -->
<div class="container">
	<section class="pageWrapper__clientes">
		<div class="relative">
			<!-- Contenedor -->
			<div id="carousel-clientes" class="pageWrapper__clientes__content">
				<?php //extraer todos los clientes 
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_type' => -1,
					);
					$query = new WP_Query( $args );
					if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
				?>
					<article class="item">
						<?php if( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('full', array('class'=>'img-responsive') ); ?>
						<?php else: ?> <p>Image no disponible</p>
						<?php endif; ?>
					</article> <!-- /.item -->
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div> <!-- /.pageWrapper__clientes__content -->

			<!-- Flechas -->
			<div id="arrow__cliente--prev" class="arrow__cliente arrow__cliente--prev">
				<i class="fa fa-chevron-left" aria-hidden="true"></i>
			</div> <!-- /.arrow__cliente -->

			<div id="arrow__cliente--next" class="arrow__cliente arrow__cliente--next">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div> <!-- /.arrow__cliente -->

		</div> <!-- /.relative -->
	</section> <!-- /.pageWrapper__clientes -->
</div> <!-- /.container -->