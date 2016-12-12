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
	
		<ul style="padding:0; margin:0; list-style-type: none;">

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
					//Extraer metabox de imágenes
					$extra_images = get_post_meta($post->ID, 'slider_home_extra_images' , true); 

					//Variable de start
					$start = 1000;

					if( !empty($extra_images) ) : 

					foreach( $extra_images as $extra_image ) :

					/* Posicion de Imagen extra */
					$pos_x_img = !empty( $extra_image['posx'] ) ? $extra_image['posx'] : "550";					

					$pos_y_img = !empty( $extra_image['posy'] ) ? $extra_image['posy'] : "40";  ?>
					
					<div class="caption <?= $from ?> big_white" data-x="<?= $pos_x_img; ?>" data-y="<?= $pos_y_img; ?>" data-speed="3000" data-start="<?= $start ?>" data-easing="easeOutBack">

						<img src="<?= $extra_image['url']; ?>" alt="ingenioart" class="img-fluid" />

					</div> <!-- /. -->

				<?php 
				//Aumentar en 500 
				$start+= 500; endforeach; endif; //fin de imágenes extra ?>


				<!-- Caption Titulo y contenido -->
				<div class="caption sft big_white" data-x="50" data-y="90" data-speed="3000" data-start="3000" data-easing="easeOutBack">
					<section class="pageInicio__slider__content">
						<h2 class="text-uppercase">
							<?php _e( get_the_title() , LANG ); ?>
						</h2> <!-- /.pageInicio__slider__title -->
						
						<!-- Contenido o texto -->
						<?php the_content(); ?>

					</section> <!-- /.pageInicio__slider__content -->
				</div> <!-- /. -->	
		
			</li> <!-- /.item-slider -->
		<?php $i++; endwhile; ?>
		</ul> <!-- /. ul -  -->
	</section> <!-- /.carousel-home -->

</div> <!-- /.banner-container relative -->

<?php endif; wp_reset_postdata(); ?>

