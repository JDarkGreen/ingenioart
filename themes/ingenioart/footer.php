
<!-- Extraer opciones  -->
<?php $options = get_option('ingenioart_custom_settings'); ?>

	<!-- Footer -->
	<footer class="mainFooter">
		<!-- Seccion Contenido -->
		<section class="mainFooter__content">
			<div class="container">
				<div class="row">

					<div class="col-xs-4">
						<!-- Logo tipo  -->
						<h1 class="logo"><img src="<?= IMAGES ?>/footer/logotipo_ingenioart_blanco.png" alt="logotipo_ingenioart_blanco" class="img-fluid center-block" /></h1> <!-- /.logo -->

						<!-- Redes Sociales -->
						<ul class="mainFooter__social-links text-xs-center">

							<!-- Facebook -->
							<?php if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_fb']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/redes_blanco_ingenioart_facebook.png" alt="red-social-facebook-ingenioart" class="img-fluid" />
							</a></li> <?php endif; ?>

							<!-- Twitter -->
							<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_twitter']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/redes_blanco_ingenioart_twitter.png" alt="red-social-twitter-ingenioart" class="img-fluid" />
							</a></li>	<?php endif; ?>						

							<!-- Youtube -->
							<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_ytube']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/redes_blanco_ingenioart_youtube.png" alt="red-social-youtube-ingenioart" class="img-fluid" />
							</a></li> <?php endif; ?>

						</ul> <!-- /.mainFooter__social-links -->

					</div> <!-- /.col-xs-4 -->

					<div class="col-xs-4">
						<!-- Informacion -->
						<section class="mainFooter__information">
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
						</section> <!-- /.mainFooter__information -->	
					</div>  <!-- /.col-xs-4 -->
					
					<div class="col-xs-4">
						<!-- Informacion -->
						<section class="mainFooter__information">
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

							<!-- Web Link -->
							<a href="<?= site_url(); ?> " class="text-featured text-featured--web"> www.Ingenioart.com </a>		

						</section> <!-- /.mainFooter__information -->							
					</div>  <!-- /.col-xs-4 -->
				</div> <!-- ./row -->
			</div> <!-- /.container -->
		</section>
		<!-- Seccion desarrollado por: develop -->
		<section class="mainFooter__develop text-xs-center">
			<strong> &copy; <?php _e( date('Y') . " Ingenioart. Derechos reservados Design by" ); ?>
				<a href="<?= site_url(); ?>">INGENIOART</a>
			</strong>
		</section>
	</footer><!-- /.mainFooter -->

	</div> <!-- /#sb-slidebar -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>
</body>
</html>

