<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">

	<?php if ( !defined( 'WPSEO_VERSION' ) ) : ?>
		
		<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		
		<meta name="description" content="Estrategias para Publicidad por Internet. Diseño Paginas Web, Posicionamiento Google. Contamos con un equipo creativo e innovador buscando el éxito de venta">
		
		<meta name="author" content="" />

	<?php endif; ?>

	<meta name="google-site-verification" content="T1cjIKt86nym_QtXqW1c-lwMG5CRL-EdGTYfuxxtYmM" />
	
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link href="<?= IMAGES ?>/icon/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<?php 
		$options = get_option('ingenioart_custom_settings'); 
		global $post;

		//Comprobar si esta desplegada la barra de Navegación
		$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
	?>

<!-- Header -->
<header class="mainHeader <?= $admin_bar ?>">
	<div class="container">
		
		<!-- Solo en version de escritorio -->
		<div class="hidden-xs-down">
			
			<!-- Primera parte -->
			<div class="row">
				<div class="col-xs-6">
					<!-- Logo -->
					<h1 class="logo">
						<a href="<?= site_url() ?>">
							<?php if( !empty($options['logo']) ) : ?>
								<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid" />
							<?php else: ?>
								<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid" />
							<?php endif; ?>
						</a>
					</h1> <!-- /.lgoo -->				
				</div> <!-- /.col-xs-6 -->
				<div class="col-xs-6">
					<!-- Informacion -->
					<section class="mainHeader__info text-xs-right">
						<p>
							<!-- Icono  -->
							<i class="icon">
								<img src="<?= IMAGES ?>/icon/whatsapp-icon.png" alt="whatsapp-ingenioart-paginas-web" class="img-fluid" />
							</i>

							<!-- RPC -->
							<?php if( isset($options['contact_cel_rpc']) && !empty($options['contact_cel_rpc']) ) : ?> <?= "RPC: " . $options['contact_cel_rpc'] . " | " ; ?>
							<?php endif; ?>

							<!-- RPM -->
							<?php if( isset($options['contact_cel_rpm']) && !empty($options['contact_cel_rpm']) ) : ?> <?= "RPM: " . $options['contact_cel_rpm'] . " | " ; ?>
							<?php endif; ?>

							<i class="fa fa-mobile" aria-hidden="true"></i>
							<!-- Telefono -->
							<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : ?> <?= $options['contact_tel']; ?>
							<?php endif; ?>
						</p>
						<!-- Email -->
						<p>
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?> <?= $options['contact_email']; ?>
							<?php endif; ?>
						</p>
					</section> <!-- /.mainHeader__info -->
				</div> <!-- /.col-xs-6 -->
			</div> <!-- /.row -->

			<!-- Navegacion principal -->
			<nav class="mainNav text-xs-center text-uppercase">
				<?php wp_nav_menu(
					array(
						'menu_class'     => 'main-menu',
						'theme_location' => 'main-menu'
					));
				?>						
			</nav> <!-- /.mainNav -->  
			
		</div> <!-- /.hidden-xs-down -->
		
		<!-- Solo en version mobile -->
		<section class="hidden-sm-up sb-slide">
			<div class="mainHeader__mobile ">

					<!-- Icono abrir menu lateral -->
					<div class="icon-header">
						<i id="toggle-left-nav" class="fa fa-bars" aria-hidden="true"></i>
					</div><!-- /.icon-header -->

					<!-- Logo -->
					<h1 class="logo">
						<a href="<?= site_url() ?>">
							<?php if( !empty($options['logo']) ) : ?>
								<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
							<?php else: ?>
								<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
							<?php endif; ?>
						</a>
					</h1> <!-- /.lgoo -->	

					<!-- Icono abrir menu lateral derecha -->
					<div class="icon-header">
						<i id="toggle-right-nav" class="fa fa-bars" aria-hidden="true"></i>
					</div><!-- /.icon-header -->	

			</div> <!-- /.mainHeader__mobile -->
		</section> <!-- /.visible-xs-block -->

	</div><!-- /.container -->
</header> <!-- /.mainHeader -->

<!-- Contenedor Izquierda Version Mobile -->
<aside class="sb-slidebar sb-left sb-style-push">
	<!-- Navegación Principal -->
	<nav class="mainNav text-uppercase">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'main-menu text-center',
				'theme_location' => 'main-menu'
			));
		?>						
	</nav> <!-- /.mainNav -->  
</aside> <!-- /.sb-slidebar sb-left sb-style-push -->

<!-- Contenedor Derecha version mobile -->
<aside class="sb-slidebar sb-right sb-style-push">
	
	<!-- Incluir template categorias -->
	<?php include( locate_template("partials/sidebar-categories.php" ) ); ?>

</aside> <!-- /.sb-slidebar sb-right sb-style-push -->


<!-- Flecha Indicador hacia arriba -->
<a href="#" id="arrow-up-page"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">








