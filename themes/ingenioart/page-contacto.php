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
								<img src="<?= IMAGES ?>/redes-sociales/redes_color_ingenioart_facebook.png" alt="red-social-facebook-ingenioart" class="img-fluid" />
							</a></li> <?php endif; ?>

							<!-- Twitter -->
							<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_twitter']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/redes_color_ingenioart_twitter.png" alt="red-social-twitter-ingenioart" class="img-fluid" />
							</a></li>	<?php endif; ?>						

							<!-- Youtube -->
							<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : ?>
							<li><a target="_blank" href="<?= $options['red_social_ytube']; ?>">
								<img src="<?= IMAGES ?>/redes-sociales/redes_color_ingenioart_youtube.png" alt="red-social-youtube-ingenioart" class="img-fluid" />
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

						<!-- Lista de Cuentas bancarias  -->
						<ul class="pageContacto__list-bank">
							
						<!-- Interbank -->
						<?php if( ( isset($options['ingenioart_bank_interbank_dolars']) && !empty($options['ingenioart_bank_interbank_dolars']) ) || ( isset($options['ingenioart_bank_interbank_soles']) && !empty($options['ingenioart_bank_interbank_soles']) )  ) : ?>
							<li>
								<!-- Imagen -->
								<img src="<?= IMAGES ?>/cuentas-bancarias/interbank-ingenioart.jpg" alt="interbank-ingenioart" class="img-fluid" />
								
								<p><?= !empty($options['ingenioart_bank_interbank_dolars']) ? "Cuenta en dólares: " . $options['ingenioart_bank_interbank_dolars'] : ""; ?>	</p>

								<p><?= !empty($options['ingenioart_bank_interbank_soles']) ? "Cuenta en soles: " . $options['ingenioart_bank_interbank_soles'] : ""; ?> </p>
							</li>	
						<?php endif; ?>					

						<!-- BCP -->
						<?php if( isset($options['ingenioart_bank_bcp']) && !empty($options['ingenioart_bank_bcp']) ) : ?>
							<li>
								<!-- Imagen -->
								<img src="<?= IMAGES ?>/cuentas-bancarias/via-bcp-ingenioart.jpg" alt="via-bcp-ingenioart" class="img-fluid" />
								<p><?= "Cuenta en soles: " . $options['ingenioart_bank_bcp']; ?></p>
							</li>
						<?php endif; ?>								

						<!-- BBVA -->
						<?php if( isset($options['ingenioart_bank_bbva']) && !empty($options['ingenioart_bank_bbva']) ) : ?>
							<li>
								<!-- Imagen -->
								<img src="<?= IMAGES ?>/cuentas-bancarias/continental-ingenioart.jpg" alt="continental-ingenioart" class="img-fluid" />
								<p><?= "Cuenta en soles: " . $options['ingenioart_bank_bbva']; ?> </p>
							</li>
						<?php endif; ?>					
						
						</ul> <!-- /.pageContacto__list-bank -->

					</section> <!-- /.center-block -->
				</div> <!-- /.col-xs-6 -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.pageContacto__consulta -->

	<!-- Sección de Mapas -->
	<section class="pageContacto__maps">
		<!-- Titulo --> <h2 class="pageCommon__title text-xs-center text-uppercase"><?php _e('mapa' ); ?></h2>
		<!-- Contenedor de Mapas -->

		<!-- Centrolima -->
		<section class="pageContacto__maps__container">
			<div class="container">
			<!-- Titulo --> <h2 class="text-uppercase">Centro Lima</h2>
			</div> <!-- /.container -->

			<!-- Mapa --> <div id="canvas-map" class="canvas-map"></div>
		</section> <!-- /.pageContacto__maps__container -->

		<!-- Surco -->
		<section class="pageContacto__maps__container">
			<div class="container">
				<!-- Titulo --> <h2 class="text-uppercase">Surco</h2>
			</div> <!-- /.container -->

			<!-- Mapa --> <div id="canvas-map2" class="canvas-map"></div>
		</section> <!-- /.pageContacto__maps__container -->

	</section> <!-- /.pageContacto__maps -->

</main> <!-- /.pageWrapper -->

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- Scripts Solo para esta plantilla CENTROLIMA -->
<?php 
	if( !empty($options['contact_mapa']) ) : 
	$mapa_central = explode(',', $options['contact_mapa'] ); 
?>
	<script type="text/javascript">	

		<?php  
			$lat_central = $mapa_central[0];
			$lng_central = $mapa_central[1];
		?>

	    var map;
	    var lat_central = <?= $lat_central ?>;
	    var lng_central = <?= $lng_central ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat_central , lng: lng_central },
	        zoom  : 18
	      });

			var texto1 = "Av Bolivia 148 - C.C Centrolima Stand 2281 <br/>";
			texto1     += "Tlf: 433-0250 <br/>";
			texto1     += "RPC: 940 170 365 <br/>";
			texto1     += "RPM: 942 016 105";

	      //infowindow
	      var infowindow1    = new google.maps.InfoWindow({
	        content: texto1
	      });

	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker1 = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat_central , lng: lng_central },
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/ingenioart_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker1.addListener('click', function() {
	        infowindow1.open( map, marker1 );
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>
<?php endif; ?>

<!-- Script Google Mapa 2 -->
<?php 
	if( !empty($options['contact_mapa_surco']) ) : 
	$mapa = explode(',', $options['contact_mapa_surco'] ); 
?>
	<script type="text/javascript">	

		<?php  
			$lat = $mapa[0];
			$lng = $mapa[1];
		?>

	    var map2;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map2 = new google.maps.Map(document.getElementById('canvas-map2'), {
	        center: {lat: lat, lng: lng},
	        zoom  : 17
	      });

	     	var texto2 = "Calle Monserrate 396 - Of. 203 A <br/>";
			texto2     += "Tlf: 746-2934 <br/>";
			texto2     += "RPC: 940 170 365 <br/>";
			texto2     += "RPM: 942 016 105";

	      //infowindow
	      var infowindow2    = new google.maps.InfoWindow({
	        content: texto2
	      });

	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker2 = new google.maps.Marker({
	        map      : map2,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/ingenioart_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker2.addListener('click', function() {
	        infowindow2.open( map2, marker2 );
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>
<?php endif; ?>



<!-- Get Footer -->
<?php get_footer(); ?>