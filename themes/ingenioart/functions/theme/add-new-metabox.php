<?php 
	global $post; 
	
/*
* Archivo que se encargará de agregar nuevos metabox segun el tipo de 
* contenido que se disponga
*/


/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE BANNER PARA TODAS LAS PAGINAS -----------------|*/
/*|-------------------------------------------------------------------------|*/
add_action( 'add_meta_boxes', 'add_banner_page' );

function add_banner_page() {
  //add more in here as you see fit
  $screens = array( 'page' , 'servicio' ); 
  foreach ($screens as $screen) {
  	add_meta_box(
      'attachment_banner_page', //this is the id of the box
      'Imagen Banner Página', //this is the title
      'add_banner_page_meta_box', //the callback
      $screen, //the post type
      'side' //the placement
    );
  }
}

function add_banner_page_meta_box($post){ 
	$input_banner = get_post_meta($post->ID, 'input_img_banner_'.$post->ID , true);
?>

	<!-- Input guarda valor de metabox -->
	<input type="hidden" id="input_img_banner_<?= $post->ID ?>" name="input_img_banner_<?= $post->ID ?>" value="<?= $input_banner ?>" />
	
	<!-- Boton Agregar eliminar banner -->
	<?php if( $input_banner != -1 && !empty($input_banner) ) : ?>
		<a id="btn_add_banner" data-id-post="<?= $post->ID; ?>" class="js-link_banner" href="#" style="display: block">
			<img src="<?= $input_banner; ?>" alt="banner-page" style="width: 200px; height: 100px; margin: 0 auto;" />
		</a>
		<a id="delete_banner" data-id-post="<?= $post->ID; ?>" href="#">Quitar Banner</a>
	<?php else: ?>
		<a id="btn_add_banner" data-id-post="<?= $post->ID; ?>" class="js-link_banner" href="#" style="display: block">
		Insertar Banner
		</a>
	<?php endif; ?>

	<p class="description">Al agregar/eliminar elemento dar clic en actualizar</p>

<?php 
}

/* Guardamos la Data */
add_action('save_post', 'add_banner_page_save_postdata');

function add_banner_page_save_postdata($post_id){
	if ( !empty($_POST['input_img_banner_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['input_img_banner_'.$post_id] );
 		update_post_meta($post_id, 'input_img_banner_'.$post_id , $data);
 	}
}

/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX DE AGREGAR IMAGEN EXTRA PARA BANNER HOME -----------|*/
/*|-------------------------------------------------------------------------|*/

require_once( dirname(dirname(__FILE__)) . '/metabox/slider-home/metabox-add-extra-images.php');

/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE GALERÍA PARA TODAS LAS PAGINAS -----------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'attached_images_meta' );

function attached_images_meta() {
  $screens = array( 'post', 'page' , 'servicio' , 'proyecto' , 'works' ); //add more in here as you see fit

  foreach ($screens as $screen) {
    add_meta_box(
    	'attached_images_meta_box', //this is the id of the box
      'Galería de Imagenes', //this is the title
      'attached_images_meta_box', //the callback
      $screens, //the post type
      'normal' //the placement
    );
  }
}

function attached_images_meta_box($post){
	
	$input_ids_img  = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
	//convertir en arreglo
	$input_ids_img  = explode(',', $input_ids_img ); 
	//eliminar valores duplicados - sigue siendo array
	#$input_ids_img  = array_unique( $input_ids_img );
	//colocar en una sola cadena para el input
	$string_ids_img = "";
	$string_ids_img = implode(',', $input_ids_img); 

	echo "<section style='display:flex; flex-wrap: wrap;'>";

	//Hacer loop por cada item de arreglo
	foreach ( $input_ids_img as $item_img ) : 
		//Si es diferente de null o tiene elementos
		if( !empty($item_img) ) : 
		//Conseguir todos los datos de este item
		$item = get_post( $item_img  ); 
	?>
		<figure style="width: 25%;height: 120px; margin: 0 10px 20px; display: inline-block; vertical-align: top; position: relative;">
			<a href="#" class="js-delete-image" data-id-post="<?= $post->ID; ?>" data-id-img="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid red; color: red; position: absolute; top: -10px; right: -8px; text-decoration: none; text-align: center; background: black; font-weight: 700;">X</a>
			
			<!-- Abrir frame del contenedor de imagen -->
			<a href="#" class="js-update-image" data-id-post="<?= $post->ID; ?>" data-id-img="<?= $item->ID ?>" style="display: block; height: 100%; width: 100%;">
				<img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="" style="width: 100%; height: 100%; margin: 0 auto;" />
			</a> 
		</figure>
	<?php endif; endforeach; 
	echo "</section>";

	/*----------------------------------------------------------------------------------------------*/
	echo "<div style='display:block; margin: 0 0 10px;'></div>";
	/*----------------------------------------------------------------------------------------------*/
	echo '<input id="imageurls_'.$post->ID.'" type="hidden" name="imageurls_'.$post->ID.'" value="'.$string_ids_img. '" />';

    echo '<a id="add_image_btn" data-id-post="'.$post->ID.'" href="#" class="button button-primary button-large" data-editor="content">Agregar Imagen</a>'; 

    echo '<a id="remove_all_image_btn" data-id-post="'.$post->ID.'" href="#" class="button button-primary" style="margin: 0 10px;" >Eliminar Todo </a>';

    echo "<p class='description'>Después de Agregar/Eliminar elemento dar click en actualizar<p>";
}

function attached_images_save_postdata($post_id){
	if ( !empty($_POST['imageurls_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['imageurls_'.$post_id] );
 		update_post_meta($post_id, 'imageurls_'.$post_id , $data);
 	}
}
add_action('save_post', 'attached_images_save_postdata');


/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE VIDEO -----------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_meta_box_url_video_add' );

//llamar funcion 
function cd_meta_box_url_video_add()
{	
	//solo en testimonios
	add_meta_box( 'mb-video-url', 'Link - Url del Video', 'cd_meta_box_url_video_cb', array('galeria-videos') , 'normal', 'high' );
}
//customizar box
function cd_meta_box_url_video_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	$values = get_post_custom( $post->ID );
	$text   = isset( $values['mb_url_video_text'] ) ? $values['mb_url_video_text'][0] : '';

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>
        <label for="mb_url_video_text">Escribe la url del video : </label>
        <input size="45" type="text" name="mb_url_video_text" id="mb_url_video_text" value="<?php echo $text; ?>" />
    </p>
    <?php    
}
//guardar la data
add_action( 'save_post', 'cd_meta_box_url_video_save' );

function cd_meta_box_url_video_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mb_url_video_text'] ) )
        update_post_meta( $post_id, 'mb_url_video_text', wp_kses( $_POST['mb_url_video_text'], $allowed ) );
}


/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX BANNER CONTENIDO  -----------------|*/
/*|-------------------------------------------------------------------------|*/

//Este metabox al darle check agrega una clase en el banner Home
//que permite alinear contenido a la izquierda o derecha respectivamente

add_action( 'add_meta_boxes', 'cd_banner_text_add' );
function cd_banner_text_add()
{
    add_meta_box( 'mb-text-banner', 'Alinear Contenido de Banner', 'cd_banner_text_cb', 'banner', 'side', 'high' );
}

//Llamar funcion
function cd_banner_text_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$check = isset( $values['banner_text_check'] ) ? esc_attr( $values['banner_text_check'][0] ) : '';
	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
	<p>
        <input type="checkbox" id="banner_text_check" name="banner_text_check" <?php checked( $check, 'on' ); ?> />
        <label for="banner_text_check">Dale Check si el texto del Banner Se Alinea A la Derecha por defecto a la izquieda.</label>
    </p>
    <?php        
}

//Guardando la data
add_action( 'save_post', 'cd_banner_text_save' );
function cd_banner_text_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // This is purely my personal preference for saving check-boxes
    $chk = isset( $_POST['banner_text_check'] ) && $_POST['banner_text_check'] ? 'on' : 'off';
    update_post_meta( $post_id, 'banner_text_check', $chk );
}


/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX EDITOR WYSIWYG PARA CADA SERVICIO  -----------------|*/
/*|-------------------------------------------------------------------------|*/

//Este metabox permite obtener campos personalizados para 
//editar los servicios como las características, el requerimiento y el
//tiempo estimado

add_action('add_meta_boxes', 'theme_register_add_editors');

function theme_register_add_editors(){
	add_meta_box('WYSIWG_THEME_PERF' , __('Información Servicio: Detalles' , LANG ) , 'custom_theme_cb' , array('servicio') );
}

function custom_theme_cb(){
	global $post;
	$option_content = array('editor_height'=>'200');

	echo "<h2><strong> Características de Servicio: </strong></h2>";
	$text1 = get_post_meta( $post->ID , 'custom_theme_'.$post->ID.'_characters' , true );
	wp_editor( htmlspecialchars_decode( $text1 ), 'custom_theme_'.$post->ID.'_characters' , $option_content );	

	echo "<h2><strong> Requerimientos de Servicio: </strong></h2>";
	$text2 = get_post_meta( $post->ID , 'custom_theme_'.$post->ID.'_requirements' , true );
	wp_editor( htmlspecialchars_decode( $text2 ), 'custom_theme_'.$post->ID.'_requirements' , $option_content );	

	echo "<h2><strong> Tiempo Estimado de Servicio: </strong></h2>";
	$text3 = get_post_meta( $post->ID , 'custom_theme_'.$post->ID.'_time' , true );
	wp_editor( htmlspecialchars_decode( $text3 ), 'custom_theme_'.$post->ID.'_time' , $option_content );
}

function custom_theme_save_postdata( $post_id ){

	if( !empty( $_POST['custom_theme_'.$post_id.'_characters'] ) ){
		$data = htmlspecialchars( $_POST['custom_theme_'.$post_id.'_characters'] );
		update_post_meta( $post_id, 'custom_theme_'.$post_id.'_characters' , $data );
	}	

	if( !empty( $_POST['custom_theme_'.$post_id.'_requirements'] ) ){
		$data = htmlspecialchars( $_POST['custom_theme_'.$post_id.'_requirements'] );
		update_post_meta( $post_id, 'custom_theme_'.$post_id.'_requirements' , $data );
	}	

	if( !empty( $_POST['custom_theme_'.$post_id.'_time'] ) ){
		$data = htmlspecialchars( $_POST['custom_theme_'.$post_id.'_time'] );
		update_post_meta( $post_id, 'custom_theme_'.$post_id.'_time' , $data );
	}
}

//Save the Data
add_action( 'save_post', 'custom_theme_save_postdata' );


?>