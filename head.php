<!DOCTYPE html>
<html lang="es" xmlns:og="http://opengraphprotocol.org/schema/"
xmlns:fb="http://www.facebook.com/2008/fbml">
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="fb:app_id" content="1479463332330420">
	<title>
	<?php 	if (is_front_page()) { bloginfo('name'); echo ' &mdash; '; bloginfo('description'); }
			else {
				if (function_exists('is_tag') && is_tag()) { echo 'Etiqueta &quot;'.$tag.'&quot; &mdash; '; } 
				elseif (is_archive()) { wp_title(''); echo ' Archivo &mdash; '; } 
				elseif (is_search()) { echo 'B&uacute;squeda para &quot;'.wp_specialchars($s).'&quot; &mdash; '; } 
				elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' &mdash; '; } 
				elseif (is_404()) { echo 'No encontrado &mdash; '; }
				bloginfo('name');
			}	
	?>
	</title>
	<link href="<?php bloginfo('template_url') ?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url') ?>/css/screen.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700,700italic,400italic|Roboto:400,400italic,700,700italic,300,300italic,500,500italic' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url') ?>/images/favicon.ico">

			<?php // Llamamos al thumbnail
			if(has_post_thumbnail()) {
			     $image_id = get_post_thumbnail_id();
			     $image_info = wp_get_attachment_image_src($image_id,'large', true);
			     $image_url = $image_info[0];
			} else {
			     $image_url = get_bloginfo('template_url').'/images/thumb-default.png'; // Imagen por defecto 
			} ?>

			<meta property="og:title" content="<?php the_title() ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:url" content="<?php the_permalink() ?>" />
			<meta property="og:image" content="<?php echo $image_url ?>" />
			<meta property="og:site_name" content="Porven"/>
			<meta property="fb:admins" content="589757944" />
			<meta property="og:description" content="<?php echo get_the_excerpt() ?>" />

			<meta name="author" content="Porven">
			<meta name="description" content="<?php the_excerpt() ?>">
			<meta name="tags" content="<?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo $tag->name . ', ';  } }?>">

			<meta name="twitter:card" content="summary_large_image">
			<meta name="twitter:site" content="@diarioporven">
			<meta name="twitter:title" content="<?php the_title() ?>">
			<meta name="twitter:description" content="<?php echo get_the_excerpt() ?>">
			<meta name="twitter:image:src" content="<?php echo $image_url ?>">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

		<?php wp_head() ?>	

</head>