<?php /* Template Name: Página Contacto Plantilla */ ?>

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

	<!-- Sección Información -->
	<section class="pageContacto__information">
		<div class="container">
			<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e('dónde encontrarnos?' ); ?></h2>

			<!-- Contenedor -->
			<section class="pageContacto__information__content">

				<div class="row text-xs-center">

					<!-- Local Surco -->
					<div class="col-xs-4">
						<!-- Titulo --> <h3 class="text-uppercase"><?php _e('surco',LANG); ?></h3>

						<!-- Direccion -->
						<?php if( isset($options['contact_address_surco']) && !empty($options['contact_address_surco']) ) : ?>
						<p><?= $options['contact_address_surco'];  ?> </p> <?php endif; ?>

						<!-- Tel -->
						<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : ?>
							<p> Tlf: <?= $options['contact_tel']; ?></p> <?php endif; ?>					
						<!-- RPC -->
						<?php if( isset($options['contact_cel_rpc']) && !empty($options['contact_cel_rpc']) ) : ?>
							<p> RPC: <?= $options['contact_cel_rpc']; ?></p> <?php endif; ?>							
						<!-- RPM -->
						<?php if( isset($options['contact_cel_rpm']) && !empty($options['contact_cel_rpm']) ) : ?>
							<p>RPM: <?= $options['contact_cel_rpm']; ?></p> <?php endif; ?>							
						<!-- Email -->
						<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?>
							<p class="text-featured"><?= $options['contact_email']; ?></p>
						<?php endif; ?>
					</div> <!-- /.col-xs-4 -->
					
					<!-- Local centrolima -->
					<div class="col-xs-4">
						<!-- Titulo --> <h3 class="text-uppercase"><?php _e('centro de lima',LANG); ?></h3>
						<!-- Direccion -->
						<?php if( isset($options['contact_address_centrolima']) && !empty($options['contact_address_centrolima']) ) : ?>
							<p><?= $options['contact_address_centrolima'];  ?> </p> <?php endif; ?>							
						<!-- Tel -->
						<?php if( isset($options['contact_tel_2']) && !empty($options['contact_tel_2']) ) : ?>
							<p> Tlf: <?= $options['contact_tel_2']; ?></p> <?php endif; ?>					
						<!-- RPC -->
						<?php if( isset($options['contact_cel_rpc']) && !empty($options['contact_cel_rpc']) ) : ?>
							<p> RPC: <?= $options['contact_cel_rpc']; ?></p> <?php endif; ?>							
						<!-- RPM -->
						<?php if( isset($options['contact_cel_rpm']) && !empty($options['contact_cel_rpm']) ) : ?>
							<p>RPM: <?= $options['contact_cel_rpm']; ?></p> <?php endif; ?>

					</div> <!-- /.col-xs-4 -->

					<!-- Redes Sociales -->
					<div class="col-xs-4">
		
						<!-- Seccion redes sociales -->

						<!-- Titulo --> <h3 class="text-uppercase"><?php _e('redes sociales',LANG); ?></h3>

						<ul class="mainFooter__social-links text-xs-center">

							<!-- Facebook -->
							<?php if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_fb']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/ingenioart_facebook.png" alt="red-social-facebook-ingenioart" class="img-fluid" />
							</a></li> <?php endif; ?>

							<!-- Twitter -->
							<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_twitter']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/ingenioart_twitter.png" alt="red-social-twitter-ingenioart" class="img-fluid" />
							</a></li>	<?php endif; ?>						

							<!-- Youtube -->
							<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_ytube']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/ingenioart_youtube.png" alt="red-social-youtube-ingenioart" class="img-fluid" />
							</a></li> <?php endif; ?>

						</ul> <!-- /.mainFooter__social-links -->

						<!-- Seccion Web -->
						<!-- Titulo --> <h3 class="text-uppercase"><?php _e('web',LANG); ?></h3>
						<!-- Web Link -->
						<a href="<?= site_url(); ?> " class="text-featured--web"><strong> www.Ingenioart.com 
						</strong></a>		

					</div> <!-- /.col-xs-4 -->

				</div> <!-- /.row -->

			</section> <!-- /.pageContacto__information__content -->

		</div> <!-- /.container -->
	</section> <!-- /.pageContacto__information -->

	<!-- Sección Consulta  -->
	<section class="pageContacto__consulta">
		<div class="container">
			<div class="row">
				
				<!-- Seccion envienos su consulta -->
				<div class="col-xs-6">
					<!-- Titulo --> <h2 class="pageCommon__title text-xs-left text-uppercase"><?php _e('envíenos su consulta' ); ?></h2>
					<!-- Formulario -->
					<form action="" class="pageInicio__contact__form">
						<p class="description"><?php _e('A la brevedad nos estaremos comunicando con usted', LANG ); ?></p>

						<div class="row">

							<!-- Nombre --> 
							<div class="col-xs-12">
								<input type="text" name="input_nombre" placeholder="Nombre">
							</div> <!-- /col-xs-12 -->						

							<!-- Correo --> 
							<div class="col-xs-6">
								<input type="email" name="input_email" placeholder="Correo">
							</div> <!-- /col-xs-12 -->						

							<!-- Telefono --> 
							<div class="col-xs-6">
								<input type="text" name="input_phone" placeholder="Teléfono">
							</div> <!-- /col-xs-12 -->						

							<!-- Mensaje --> 
							<div class="col-xs-12">
								<textarea name="input_message" id="" placeholder="Mensaje"></textarea>
							</div> <!-- /col-xs-12 -->

						</div> <!-- /.row -->
						
						<!-- Boton Enviar -->
						<a href="#" class="btn__show-more btn__show-more--orange"><?php _e('Enviar',LANG); ?></a>

					</form> <!-- /.pageInicio__contact__form -->

				</div> <!-- /.col-xs-6 -->
			
				<!-- Seccion Cuentas de banco -->
				<div class="col-xs-6">
					<section class="center-block">
						<!-- Titulo  --><h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e('cuentas bancarias' , LANG ); ?></h2>
					</section> <!-- /.center-block -->
				</div> <!-- /.col-xs-6 -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.pageContacto__consulta -->

</main> <!-- /.pageWrapper -->


<!-- Get Footer -->
<?php get_footer(); ?>