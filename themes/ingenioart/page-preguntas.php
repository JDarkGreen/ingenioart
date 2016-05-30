<?php /* Template Name: Página Preguntas Frecuentes Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenedor Global -->
<main class="pageWrapper">
	<section class="pagePreguntas">
		<div class="container">
			
			<!-- Slogan -->
			<div class="text-xs-center text-featured--blue">
				<?= $post->post_content; ?>
			</div> <!-- /.text-center -->
			
			<!-- Extraer y clasificar todas las preguntas  -->
			<?php  
				$terms_question = get_terms('preguntas_category', array( 'hide_empty' => false, 'order'=>'DESC' ) );
				#var_dump($terms_question);

				//Valor i: Control 
				$i = 0;
				foreach( $terms_question as $term_question ) : 
			?>
			<!-- Contenedor de Preguntas -->
			<section class="pagePreguntas__section">
				<!-- Titulo --> <h2 class="pageCommon__title text-xs-left text-uppercase"><?php _e( "sobre " . $term_question->name , LANG ); ?></h2>

				<!-- Contenedor De Preguntas -->
				<section id="accordion_<?= $term_question->slug ?>" role="tablist" aria-multiselectable="true">
					<!-- Extraer preguntas segun categorias -->
					<?php  
						$args = array(
							'posts_per_page' => -1,
							'post_type'      => 'pregunta',
							'post_status'    => 'publish',
							'order'          => 'ASC',
							'orderby'        => 'menu_order',
							'tax_query'      => array(
								array(
									'taxonomy' => 'preguntas_category',
									'field'    => 'slug',
									'terms'    => $term_question->slug,
								),
							),
						);

						$preguntas = get_posts( $args );
						//Valor j: Control 
						$j = 0;
						foreach( $preguntas as $pregunta ) : 
					?>
					
					<!-- Panel -->
	  			<div class="panel panel-default">
	    			<div class="panel-heading" role="tab" id="heading-<?= $term_question->slug ?>">
	      			<h4 class="panel-title">
	        			<a data-toggle="collapse" data-parent="#accordion_<?= $term_question->slug ?>" href="#collapse<?= $pregunta->post_name; ?>" aria-expanded="true" aria-controls="collapse<?= $pregunta->post_name; ?>" class="relative <?= $i == 0 && $j == 0 ? 'active' : '' ?>">
	          			<?= $pregunta->post_title; ?>
	        			</a>
	      			</h4> <!-- /.panel-title -->
	    			</div> <!-- /panel-headign  -->

		    		<div id="collapse<?= $pregunta->post_name; ?>" class="panel-collapse collapse <?= $i == 0 && $j == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading-<?= $term_question->slug ?>">
		    			<?= !empty( $pregunta->post_content ) ? $pregunta->post_content : "Actualizando Contenido"; ?>
		    		</div> <!-- /.panel-collapse collapse in -->

	  			</div> <!-- /.panel panel-default -->
					
					<?php $j++; endforeach; ?>

				</section> <!-- /.accordion_ -->
			</section> <!-- /.pagePreguntas__section -->
			
			<!-- Finalizar foreach -->
			<?php $i++;  endforeach; ?>

		</div> <!-- /.container -->
	</section> <!-- /.pagePreguntas -->
</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template("partials/banner-services.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>