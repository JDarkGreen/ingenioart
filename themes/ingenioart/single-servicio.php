<?php /* Single Servicios Plantilla */ 
	
	global $post;

	/* Obtener página padre servicios */
	$page = get_page_by_title('Servicios');

	/* Obtener todos los terminos del servicio */
	$terms_post = wp_get_post_terms( $post->ID, 'servicio_category' );

	/* Opciones de Banner */ 
	$banner       = $page; 
	$banner_title = $post->post_title;
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Contenedor Global -->
<main class="pageWrapper">
	<div class="container">

		<!-- Sección De Descripción -->
		<div class="row">
			<!-- Descripción -->
			<div class="col-xs-12 col-md-6">
				<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-sm-left text-uppercase"><?php _e( $post->post_title , LANG ); ?></h2>

				<!-- Descripción Completa -->
				<div class="text-justify">
					<?= apply_filters('the_content' , $post->post_content ); ?>
				</div> <!-- /."text-justify -->
				
			</div> <!-- /.col-xs-12 col-md-6 -->
			<!-- Imagen -->
			<div class="col-xs-12 col-md-6">
				<!-- Imagen -->
				<?php if( has_post_thumbnail( $post->ID ) ) : ?>
					<figure class="pageServicio__image">
						<?= get_the_post_thumbnail($post->ID , 'full' , array('class'=>'img-fluid') ); ?>
					</figure> <!-- /.pageServicio__image -->
				<?php else: echo "Imagen Actualmente No Disponible"; endif; ?>
			</div><!-- /.col-xs-12 col-md-6 -->
		</div> <!-- /.row -->
		
		<!-- Separación  -->
		<br><br>

		<!-- Sección Relacionados -->
		<div class="row">

			<!-- Seccion Tabs Descripción detallada de servicio -->
			<div class="col-xs-12 col-md-8">
				<section class="pageServicios__single-tabs">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs text-uppercase" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#serv-characters" role="tab">
								<?php _e( 'características' , LANG ); ?>
							</a>
						</li> <!-- /.nav-item --> 
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#serv-requirements" role="tab">
								<?php _e( 'requerimientos' , LANG ); ?>
							</a>
						</li> <!-- /.nav-item --> 
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#serv-estimated-time" role="tab">
								<?php _e( 'tiempo estimado' , LANG ); ?>
							</a>
						</li> <!-- /.nav-item --> 
					</ul> <!-- /.nav nav-tabs -->

					<!-- Tab panes -->
					<div class="tab-content">
						<!-- Caracteristicas -->
						<div class="tab-pane fade in active" id="serv-characters" role="tabpanel">
							<?php $characters = get_post_meta( $post->ID , 'custom_theme_'.$post->ID.'_characters' , true ); 
								if( !empty($characters) ) : echo apply_filters('the_content' , $characters );
								else : echo "Actualizando Contenido"; endif;
							?>
						</div> <!-- /.tab-pane -->
						<!-- Requerimientos -->
						<div class="tab-pane fade" id="serv-requirements" role="tabpanel">
							<?php $requirements = get_post_meta( $post->ID , 'custom_theme_'.$post->ID.'_requirements' , true ); 
								if( !empty($requirements) ) : echo apply_filters('the_content' , $requirements );
								else : echo "Actualizando Contenido"; endif;
							?>							
						</div> <!-- /.tab-pane -->
						<!-- Tiempo estimado -->
					  <div class="tab-pane fade" id="serv-estimated-time" role="tabpanel">
							<?php $time = get_post_meta( $post->ID , 'custom_theme_'.$post->ID.'_time' , true ); 
								if( !empty($time) ) : echo apply_filters('the_content' , $time );
								else : echo "Actualizando Contenido"; endif;
							?>						  	
					  </div> <!-- /.tab-pane -->
					</div> <!-- /.tab-content -->
					
				</section> <!-- /.pageServicios__single-tabs" -->
			</div> <!-- /.col-xs-12 col-md-8 -->	

			<!-- Espacio --> <p class="clearfix hidden-sm-up"></p>

			<!-- Seccion Servicios Relacionados -->
			<div class="col-xs-12 col-md-4">
				<section class="pageService__related text-xs-center">
					<!-- Titulo --> <h3 class="text-uppercase"><?php _e('servicios relacionados' , LANG ); ?></h3>

					<!-- Obtener los servicios relacionados por tags -->
					<?php 
						$tags    = wp_get_post_tags( $post->ID ); 
						$tag_ids = array();
						if( !empty($tags) ) : 
							foreach( $tags as $tag ){ $tag_ids[] = $tag->term_id; };

							//Obtener el query
							$args = array(
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
								'post__not_in'   => array( $post->ID ),
								'post_status'    => 'publish',
								'post_type'      => 'servicio',
								'posts_per_page' => -1,
								'tag__in'        => $tag_ids,
							);

							$relacionados = get_posts( $args ); #var_dump($relacionados); 

							if( !empty($relacionados) ) :
							foreach( $relacionados as $rel ) : 
					?>
						<a class="item-related center-block text-capitalize" href="<?= get_permalink( $rel->ID ); ?>"><?= $rel->post_title; ?></a>
					<?php endforeach; else: ?> 
						<p class="text-featured--blue"><?= _e("Ningún Servicio relacionado Actualmente", LANG); ?> </p> 
					<?php endif; endif; ?> 

				</section> <!-- /.pageService__related" -->
			</div> <!-- /.col-xs-12 col-md-4 -->

		</div> <!-- /.row -->

		<!-- Carousel Ejemplos de Servicio -->
		<section class="pageServicio__demos">
			<div class="row">

				<!-- Información -->
				<div class="col-xs-12 col-md-3">
					<!-- Titulo --> <h3 class="demo__title"> <?php _e('algunos ejemplos de ' . $post->post_title , LANG ); ?></h3>
					<!-- Descripcion --> <p class="demo__content"><?php _e('Estos son algunos ejemplos de ' . $post->post_title . ' en el portafolio de la empresa realizados para nuestros clientes.' ); ?></p>
					<!-- Flechas de Carousel -->
					<section class="demo__arrows relative">
						<!--  -->
						<a href="#" id="demo__arrows--prev" class="arrow__common-slider demo__arrows--prev">
							<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
						</a> 						
						<!--  -->
						<a href="#" id="demo__arrows--next" class="arrow__common-slider demo__arrows--next">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
						</a> 
					</section>
				</div> <!-- /.col-xs-12 col-md-3 -->

				<!-- Carousel -->
				<div class="col-xs-12 col-md-9">
					<!-- Carousel seccion -->
					<section id="carousel-single-servicio" class="pageServicio__demos-carousel">
						<?php  
							$input_ids_img  = get_post_meta( $post->ID, 'imageurls_'.$post->ID , true);
							//convertir en arreglo
							$input_ids_img  = explode(',', $input_ids_img ); 
							//Hacer loop por cada item de arreglo
							foreach ( $input_ids_img as $item_img ) : 
								//Si es diferente de null o tiene elementos
								if( !empty( $item_img ) ) :  
								//Conseguir todos los datos de este item
								$item = get_post( $item_img  ); 
						?> <!-- Imagen -->
							<a href="<?= $item->guid; ?>" rel="group" class="gallery-fancybox" >
								<figure>	
									<img src="<?= $item->guid; ?>" alt="<?= $item->post_name; ?>" class="img-fluid" />
								</figure> <!-- /figure -->
							</a>
						<?php endif; endforeach; ?>
					</section> <!-- /.pageServicio__demos-carousel -->

					<!-- Botón Regresar -->
					<?php 
						//Obtener el link del primer termino de este servicio
						$link_term_post = get_term_link( $terms_post[0] );
					?>
					<a href="<?= $link_term_post; ?>" class="pull-xs-right btn__show-more btn__show-more--orange"><?php _e('Regresar' , LANG ); ?></a>
					
				</div><!-- /.col-xs-12 col-md-9 -->

			</div> <!-- /.row -->
		</section> <!-- /. pageServicio__demos -->

	</div> <!-- /.container -->
</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion de Clientes -->
<?php include(locate_template("partials/carousel-clientes.php") ); ?>

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>