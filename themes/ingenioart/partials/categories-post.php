
<!-- Tener las categorias -->
<section class="pageArticle__sidebar__categories">
	<!-- Titulo -->
	<h2 class="sectionCommon__subtitle text-uppercase">
	<strong><?php _e( 'categorías' , LANG ); ?></strong>
	</h2> <!-- /.sectionCommon__subtitle -->
	<!-- Lista Categorias-->
	<?php $categories = get_categories(); #var_dump($categories);
	if( !empty($categories) ) : ?>
	<ul class="menu-categories">		
	<?php foreach( $categories as $cat ) : ?>
		<li>
			<!-- Comparar si es una categoria y si lo es recibir como parametro -->
			<!-- Su slug -->
			<?php if( isset($category_slug) &&  !empty($category_slug) ){
				$category_name = $category_slug;
			}else{
				$category_name = "";
			}
			?>

			<a class="text-uppercase <?= $category_name == $cat->slug ? 'active' : '' ?>" href="<?= get_category_link( $cat->term_id ) ?>">
			<?php _e( $cat->name , LANG ); ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
	<?php else: ?>
		<p> <?php _e( 'No hay categorias disponibles' , LANG ); ?></p>
	<?php endif; ?>
</section> <!-- /.pageArticle__sidebar__categories -->