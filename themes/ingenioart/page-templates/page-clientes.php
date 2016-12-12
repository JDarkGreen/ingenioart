<?php /* Template Name: Página Clientes Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('timco_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- CONTENEDOR COMUN -->
<div class="container">
	<main class="pageClientes">
		
		<!-- Descripción -->
		<section class="pageClientes__content">
			<h2 class="text-center"><?php _e( 'Nuestra experiencia, calidad y compromiso de servicio nos permite contar con una amplia cartera de clientes. TIMCO una parte de cada uno de ellos:' , LANG ); ?></h2>
		</section> <!-- /.pageClientes__content -->
		
		<!-- Contenido Operadores lógicos -->
		<section class="pageClientes__content">
			<h2 class="pageClientes__subtitle text-center"><strong> <?php _e( 'Operadores Logísticos' , LANG ); ?> </strong> </h2>
			<!-- Imagenes -->
			<section class="pageClientes__clientes">
				<?php //Argumentos operadores logisticos
					$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy'       => 'cliente_category',
								'field'          => 'slug',
								'terms'          => 'operadores-logisticos',
							),
						),
					);  
					$operadores = get_posts( $args );
					foreach( $operadores as $operador ) : 

					$img = get_the_post_thumbnail( $operador->ID , 'full' , array('class'=>'img-responsive') );

					if( !empty($img) ) : 
				?>
					<article class="item"><?= $img ?> </article> <!-- /.item -->
				<?php else: echo "Not Image" ; endif; endforeach; ?>
			</section> <!-- /.pageClientes__clientes -->
		</section> <!-- /.pageClientes__content -->
		
		<!-- Contenido Productoras y Comercialización -->
		<section class="pageClientes__content">
			<h2 class="pageClientes__subtitle text-center"> <strong>
				<?php _e( 'Productoras y Comercialización' , LANG ); ?> </strong>
			</h2>
				
			<!-- Imagenes -->
			<section class="pageClientes__clientes">
				<?php //Argumentos operadores logisticos
					$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy'       => 'cliente_category',
								'field'          => 'slug',
								'terms'          => 'productoras-y-comercializacion',
							),
						),
					);  
					$operadores = get_posts( $args );
					foreach( $operadores as $operador ) : 

					$img = get_the_post_thumbnail( $operador->ID , 'full' , array('class'=>'img-responsive') );

					if( !empty($img) ) : 
				?>
					<article class="item"><?= $img ?> </article> <!-- /.item -->
				<?php else: echo "Not Image" ; endif; endforeach; ?>
			</section> <!-- /.pageClientes__clientes -->
		</section> <!-- /.pageClientes__content -->
		
		<!-- Contenido Agencia de Aduanas -->
		<section class="pageClientes__content">
			<h2 class="pageClientes__subtitle text-center"> <strong>
				<?php _e( 'Agencia de Aduanas' , LANG ); ?> </strong> </h2>
			<!-- Imagenes -->
			<section class="pageClientes__clientes">
				<?php //Argumentos operadores logisticos
					$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy'       => 'cliente_category',
								'field'          => 'slug',
								'terms'          => 'agencia-de-aduanas',
							),
						),
					);  
					$operadores = get_posts( $args );
					foreach( $operadores as $operador ) : 

					$img = get_the_post_thumbnail( $operador->ID , 'full' , array('class'=>'img-responsive') );

					if( !empty($img) ) : 
				?>
					<article class="item"><?= $img ?> </article> <!-- /.item -->
				<?php else: echo "Not Image" ; endif; endforeach; ?>
			</section> <!-- /.pageClientes__clientes -->
		</section> <!-- /.pageClientes__content -->	

		<!-- Contenido Terminales Aduaneros -->
		<section class="pageClientes__content">
			<h2 class="pageClientes__subtitle text-center"> <strong>
				<?php _e( 'Terminales Aduaneros' , LANG ); ?> </strong>
			</h2>
			<!-- Imagenes -->
			<section class="pageClientes__clientes">
				<?php //Argumentos operadores logisticos
					$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy'       => 'cliente_category',
								'field'          => 'slug',
								'terms'          => 'terminales-aduaneros',
							),
						),
					);  
					$operadores = get_posts( $args );
					foreach( $operadores as $operador ) : 

					$img = get_the_post_thumbnail( $operador->ID , 'full' , array('class'=>'img-responsive') );

					if( !empty($img) ) : 
				?>
					<article class="item"><?= $img ?> </article> <!-- /.item -->
				<?php else: echo "Not Image" ; endif; endforeach; ?>
			</section> <!-- /.pageClientes__clientes -->
		</section> <!-- /.pageClientes__content -->

	</main> <!-- /.pageClientes -->
</div> <!-- /.container -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>


<!-- Get Footer -->
<?php get_footer(); ?>