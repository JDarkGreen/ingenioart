<?php  
	// The Query
	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_status'    => 'publish',
		'post_type'      => 'banner',
		'posts_per_page' => -1,
	);

	$the_query = new WP_Query( $args );

	$i = 0; 
	$transition = ""; //para las transiciones control que guarda una variable
	$from       = ""; //para las transiciones control que guarda una variable
	// The Loop
	if ( $the_query->have_posts() ) : 

?>

<!-- Contenedor de bannner para responsive no full width  -->
<div id="" class="banner-container relative"> <span class="Apple-tab-span"> </span>

	<section id="carousel-home" class="pageInicio__slider">
		<ul class="">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<!-- Clase Control i  -->
			<?php  
				switch ( $i ) {
					case 0:
						$transition = "boxslide";
						$from       = "sfr";
						break;
					case 1:
						$transition = "curtain-3";
						$from       = "sft";
						break;
					case 2:
						$transition = "curtain-2";
						$from       = "sfb";
						break;
					default:
						$transition = "papercut";
						$from       = "sfl";
						break;
				}
			?>

			<li class="item-slider" data-transition="<?= $transition ?>" data-slotamount="15">
				<!-- Imagen -->
				<?php if( has_post_thumbnail() ) :  ?>
					<?php the_post_thumbnail('full', array('class'=>'img-fluid') ); ?>
				<?php endif; ?>

				<!-- Caption Imagen Extra -->
				<?php 
					$extra_img = get_post_meta($post->ID, 'input_img_banner_'.$post->ID , true); 
					if( !empty($extra_img) ) : 

					/* Posicion de Imagen extra */
					$pos_x_img = get_post_meta($post->ID, 'input_posx_img_'.$post->ID , true);
					$pos_x_img = !empty( $pos_x_img ) ? $pos_x_img : "550";					

					$pos_y_img = get_post_meta($post->ID, 'input_posy_img_'.$post->ID , true);
					$pos_y_img = !empty( $pos_y_img ) ? $pos_y_img : "40";
				?>
					<div class="caption <?= $from ?> big_white" data-x="<?= $pos_x_img; ?>" data-y="<?= $pos_y_img; ?>" data-speed="3000" data-start="1500" data-easing="easeOutBack">
						<figure class="item-slider__extra-img">
							<img src="<?= $extra_img; ?>" alt="image-extra-ingenioart" class="img-fluid" />
						</figure> <!-- /.item-slider__extra-img -->
					</div>
				<?php endif; ?>


				<!-- Caption Titulo y contenido -->
				<div class="caption sft big_white" data-x="50" data-y="90" data-speed="3000" data-start="3000" data-easing="easeOutBack">
					<section class="pageInicio__slider__content">
						<h2 class="text-uppercase">
							<?php _e( get_the_title() , LANG ); ?>
						</h2> <!-- /.pageInicio__slider__title -->
						<p class="">
							<?php _e( get_the_content() , LANG ); ?>
						</p> <!-- /.pageInicio__slider__content -->
					</section> <!-- /.pageInicio__slider__content -->
				</div> <!-- /. -->	
		
			</li> <!-- /.item-slider -->
		<?php $i++; endwhile; ?>
		</ul> <!-- /. ul -  -->
	</section> <!-- /.carousel-home -->

</div> <!-- /.banner-container relative -->

<?php endif; wp_reset_postdata(); ?>

