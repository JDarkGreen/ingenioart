
<!-- Si existe el post  -->
<?php if( isset($banner) ) : ?>
	
	<!-- BANNER DE LA PAGINA -->
	<section class="pageCommon__banner relative">
		<figure>
			<!-- Conseguir el banner por defecto -->
			<?php $img_banner = get_post_meta($banner->ID, 'input_img_banner_'.$banner->ID , true); 
				if( !empty($img_banner) && $img_banner != -1 ) :
			?>
				<img src="<?= $img_banner ?>" alt="banner-nosotros-empresa-pbg" class="img-responsive" />
			<?php else: ?>
				<img src="http://placekitten.com/1920/316" alt="banner-nosotros-empresa-pbg" class="img-responsive" />
			<?php endif; ?>
		</figure>

		<!-- Título de la pagina posicion absoluta -->
		<h2 class="pageCommon__banner__title text-uppercase">
			<strong> 
				<?php
					if( isset($banner_title) && !empty($banner_title) ){
					 _e(  $banner_title , LANG ); 
					}else{
					 _e(  $banner->post_title , LANG ); 
					}
				?>
			</strong>
		</h2>

	</section> <!-- /.pageCommon__banner -->

<?php endif; ?>