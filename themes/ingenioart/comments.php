<?php

/***********************************************************************************************/
/* Prevent the direct loading of comments.php */
/***********************************************************************************************/
if (!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php') {
	die(__('No puedes accesar a esta página directamente.', LANG ));
}

/***********************************************************************************************/
/* If the post is password protected then display text and return */
/***********************************************************************************************/
if (post_password_required()) : ?>
	<p>
		<?php 
			_e( 'Este posts tiene password protegido. Ingresa el password para ver el post completo.', LANG );
			return;
		?>
	</p>

<?php endif;

/***********************************************************************************************/
/* If we have comments to display, we display them */
/***********************************************************************************************/
if (have_comments()) : ?>
		<a href="#respond" class="article-add-comment"></a>
		<h3><?php comments_number(__('No Comentarios', LANG), __('1 comentario', LANG), __('% Commentarios', LANG)); ?></h3>

		<ul class="commentslist">
			<?php wp_list_comments('callback=theme_comments'); ?>
		</ul>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		
			<div class="comment-nav-section clearfix">
			
				<p class="fl"><?php previous_comments_link(__( '&larr; Antiguos Comentarios', LANG)); ?></p>
				<p class="fr"><?php next_comments_link(__( 'Comentarios Recientes &rarr;', LANG)); ?></p>
				
			</div> <!-- end comment-nav-section -->
		
		<?php endif; ?>

<?php
/***********************************************************************************************/
/* If we don't have comments and the comments are closed, display a text */
/***********************************************************************************************/

	elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	
<?php endif; 

/***********************************************************************************************/
/* Display the comment form */
/***********************************************************************************************/
comment_form();

?>