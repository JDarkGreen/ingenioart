<?php  
	// The Query
	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_type'      => 'banner',
		'posts_per_page' => -1,
	);

	$the_query = new WP_Query( $args );

	$i = 0; 
	// The Loop
	if ( $the_query->have_posts() ) : 

?>
<section id="carousel-home" class="pageInicio__slider carousel slide" data-ride="carousel">
  
  <div class="carousel-inner" role="listbox">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?> 
	    <div class="item carousel-item <?= $i == 0 ? 'active' : '' ?>">
	    	<?php if( has_post_thumbnail() ) : ?>
	    		<?php the_post_thumbnail('full', array('class'=>'img-responsive') ); ?>
	    	<?php else: ?>
	    		<img src="http://lorempixel.com/1920/682/business" alt="none" class="img-responsive" />
	    	<?php endif; ?>
				
				<div class="container">
		    	<!-- CAPTION O INFORMACION -->
		    	<?php  
		    		$align_text = get_post_meta( $post->ID , 'banner_text_check' , true );
		    		//Opciones on- off
		    	?>

		    	<div class="carousel-caption <?= $align_text == 'on' ? 'right-align' : '' ?>">
		    		<!-- Titulo -->
				    <h3 class="text-uppercase"><?php the_title(); ?></h3>
				    <!-- Get the content -->
				    <?= apply_filters( 'the_content' , get_the_content() ); ?>
				  </div> <!-- /carousel-caption -->
				</div><!-- /.container -->

	    </div> <!-- /carousel-item -->
		<?php $i++; endwhile; ?> 
  </div> <!-- /carousel-inner -->
	
	<!-- FLECHAS DEL CAROUSEL -->
  <a class="arrowCarouselHome arrowCarouselHome--left" href="#carousel-home" role="button" data-slide="prev">
   <img src="<?= IMAGES ?>/arrows/boton_slider_prev.png" alt="prev" class="" />
  </a>

  <a class="arrowCarouselHome arrowCarouselHome--right" href="#carousel-home" role="button" data-slide="next">
    <img src="<?= IMAGES ?>/arrows/boton_slider_next.png" alt="next" class="" />
  </a>

</section> <!-- /.carousel-home -->

<?php endif; wp_reset_postdata(); ?>

