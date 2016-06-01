<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

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
		<div class="row hidden-xs-down">
			<div class="col-xs-6">
				<!-- Logo -->
				<h1 class="logo">
					<a href="<?= site_url() ?>">
						<?php if( !empty($options['logo']) ) : ?>
							<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive" />
						<?php else: ?>
							<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive" />
						<?php endif; ?>
					</a>
				</h1> <!-- /.lgoo -->				
			</div> <!-- /.col-xs-6 -->
			<div class="col-xs-6">
				<!-- Informacion -->
				<section class="mainHeader__info text-xs-right">
					<p>
						<i class="fa fa-mobile" aria-hidden="true"></i>
						<!-- Telefono -->
						<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : ?> <?= $options['contact_tel'] . " | " ; ?>
						<?php endif; ?>
						<!-- RPC -->
						<?php if( isset($options['contact_cel_rpc']) && !empty($options['contact_cel_rpc']) ) : ?> <?= "RPC: " . $options['contact_cel_rpc'] . " | " ; ?>
						<?php endif; ?>
						<!-- RPM -->
						<?php if( isset($options['contact_cel_rpm']) && !empty($options['contact_cel_rpm']) ) : ?> <?= "RPM: " . $options['contact_cel_rpm']; ?>
						<?php endif; ?>
					</p>
					<!-- Email -->
					<p>
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?> <i></i> <?= $options['contact_email']; ?>
						<?php endif; ?>
					</p>
				</section> <!-- /.mainHeader__info -->
			</div> <!-- /.col-xs-6 -->
		</div> <!-- /.row -->

		<!-- Navegacion principal -->
		<nav class="mainNav text-xs-center">
			<?php wp_nav_menu(
				array(
					'menu_class'     => 'main-menu',
					'theme_location' => 'main-menu'
				));
			?>						
		</nav> <!-- /.mainNav -->  
		
		<!-- Solo en version mobile -->
		<section class="hidden-xs-up">
			<div class="mainHeader__mobile ">

					<!-- Icono abrir menu lateral -->
					<div class="icon-header">
						<i id="toggle-left-nav" class="fa fa-bars" aria-hidden="true"></i>
					</div><!-- /.icon-header -->

					<!-- Logo -->
					<h1 class="logo">
						<a href="<?= site_url() ?>">
							<?php if( !empty($options['logo']) ) : ?>
								<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
							<?php else: ?>
								<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
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
	<nav class="mainNav">
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
</aside> <!-- /.sb-slidebar sb-right sb-style-push -->


<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">








