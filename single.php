<?php 
// Si existe la variable &image=1 redirecciono al thumbnail
if($_GET['image'] == 1) {
	if(has_post_thumbnail()) {
		$image_id = get_post_thumbnail_id();
		$image_info = wp_get_attachment_image_src($image_id, 'large', true);
		$image_url = $image_info[0];
		wp_redirect( $image_url );
		exit;
	}
} ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 

	if ( get_post_type() == 'card' ) {

		get_header();
		require_once( TEMPLATEPATH . '/single-template-card.php');
		get_footer();

	} else {

		if( has_term( 'multimedia', 'formatos' ) ) {
			get_header();
			require_once( TEMPLATEPATH . '/single-template-multimedia.php');
			get_footer();			
		}
		elseif( has_term( 'dossier', 'formatos' ) ) {
			get_header();
			require_once( TEMPLATEPATH . '/single-template-dossier.php');
			get_footer();
		}
		elseif( has_term( 'longform', 'formatos' ) ) {
			require_once( TEMPLATEPATH . '/header-longform.php');
			require_once( TEMPLATEPATH . '/single-template-longform.php');
			require_once( TEMPLATEPATH . '/footer-longform.php');
		}		
		else {
			get_header();
			require_once( TEMPLATEPATH . '/single-template-entrada.php');
			get_footer();
		}
	}

endwhile; else: endif; ?>