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
    <link href='http://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700,300italic,400italic,500italic,700italic|Asap:400,700,700italic,400italic' rel='stylesheet' type='text/css'>

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
			<meta property="og:image" content="<?php echo $image_url ?>" /> <!-- Colocar aca el thumb . Averiguar para hacerlo grande -->
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

</head>
<body>

<div class="container">
<div class="page">

<div id="top">
	<nav>
		<!--<ul>
			<li><a href="#">Contacto</a></li>
			<li><a href="#">Publicite</a></li>
			<li><a href="#">Sobre Porven</a></li>
		</ul>-->
	</nav>
</div>

<header id="site-header">

	<a class="site-logo" href="<?php bloginfo('url') ?>">
		<svg version="1.1" id="logo-header" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 418.271 56.413" enable-background="new 0 0 418.271 56.413"
			 xml:space="preserve">
		<g>
			<g>
				<path fill="#ffffff" d="M24.895,35.304v8.953c0,2.233,2.693,3.349,8.08,3.349v7.643H0v-7.643c4.318,0,6.479-1.116,6.479-3.349
					V12.156c0-2.231-2.16-3.349-6.479-3.349V1.165h33.193c3.203,0,6.017,0.219,8.443,0.655c2.426,0.437,4.452,1.237,6.078,2.402
					c1.625,1.165,2.839,2.766,3.64,4.804s1.201,4.684,1.201,7.934c0,6.503-1.614,11.186-4.841,14.049
					c-3.228,2.864-8.068,4.294-14.521,4.294h-8.298V35.304z M24.895,25.841h2.693c1.601,0,2.912-0.146,3.931-0.437
					c1.019-0.292,1.844-0.776,2.475-1.456c0.63-0.679,1.067-1.589,1.311-2.729c0.242-1.14,0.364-2.559,0.364-4.258
					c0-1.989-0.558-3.542-1.674-4.659c-1.117-1.116-3.251-1.674-6.405-1.674h-2.693v15.213H24.895z"/>
				<path fill="#ffffff" d="M111.225,28.17c0,4.416-0.559,8.371-1.674,11.865c-1.117,3.494-2.828,6.455-5.132,8.88
					c-2.306,2.427-5.229,4.284-8.771,5.569c-3.542,1.285-7.741,1.929-12.593,1.929c-4.028,0-7.692-0.449-10.991-1.347
					c-3.301-0.897-6.14-2.402-8.517-4.513c-2.378-2.111-4.222-4.901-5.532-8.371c-1.31-3.469-1.965-7.752-1.965-12.848
					c0-4.659,0.509-8.808,1.528-12.447s2.657-6.708,4.914-9.208c2.256-2.499,5.168-4.404,8.735-5.714C74.792,0.655,79.099,0,84.146,0
					c3.979,0,7.631,0.462,10.955,1.383c3.324,0.922,6.188,2.475,8.589,4.658c2.402,2.184,4.258,5.072,5.569,8.663
					C110.569,18.295,111.225,22.784,111.225,28.17z M83.054,46.877c1.649,0,3.118-0.242,4.404-0.728
					c1.285-0.484,2.366-1.383,3.239-2.693c0.874-1.311,1.529-3.154,1.965-5.532c0.437-2.377,0.655-5.459,0.655-9.245
					c0-3.931-0.218-7.145-0.655-9.645c-0.437-2.499-1.031-4.464-1.783-5.896c-0.753-1.431-1.674-2.413-2.766-2.948
					c-1.092-0.533-2.293-0.8-3.603-0.8c-1.65,0-3.119,0.255-4.404,0.764c-1.287,0.51-2.378,1.396-3.276,2.657
					c-0.898,1.262-1.578,2.96-2.038,5.095c-0.462,2.136-0.691,4.829-0.691,8.08c0,4.465,0.218,8.069,0.655,10.81
					c0.437,2.742,1.056,4.853,1.856,6.333c0.801,1.481,1.747,2.475,2.839,2.984C80.543,46.623,81.744,46.877,83.054,46.877z"/>
				<path fill="#ffffff" d="M166.399,55.758c-2.718,0-5.035-0.353-6.952-1.056c-1.917-0.703-3.494-1.649-4.731-2.839
					c-1.237-1.188-2.136-2.584-2.693-4.186c-0.558-1.602-0.837-3.299-0.837-5.095V38.58c0-1.698-0.085-3.082-0.255-4.149
					s-0.462-1.893-0.874-2.475c-0.413-0.583-0.995-0.97-1.747-1.165c-0.753-0.193-1.71-0.291-2.875-0.291h-5.75v13.757
					c0,2.233,2.693,3.349,8.08,3.349v7.643h-32.974v-7.57c4.318,0,6.479-1.118,6.479-3.355v-32.16c0-2.236-2.16-3.355-6.479-3.355
					V1.165h37.924c2.377,0,4.706,0.158,6.988,0.473c2.28,0.316,4.306,0.959,6.078,1.929c1.771,0.971,3.19,2.342,4.258,4.113
					c1.067,1.772,1.601,4.112,1.601,7.024c0,1.892-0.291,3.555-0.874,4.986c-0.582,1.432-1.346,2.657-2.292,3.676
					s-2.027,1.845-3.239,2.475c-1.214,0.631-2.475,1.092-3.785,1.383c2.62,0.682,4.633,1.948,6.042,3.799
					c1.407,1.852,2.111,4.651,2.111,8.4v5.041c0,1.072,0.219,1.863,0.655,2.375s0.994,0.767,1.674,0.767
					c0.728,0,1.31-0.257,1.747-0.772s0.655-1.312,0.655-2.392v-3.533h5.314v3.348c0,1.602-0.255,3.106-0.764,4.513
					c-0.51,1.408-1.311,2.621-2.402,3.64s-2.463,1.833-4.113,2.438C170.718,55.455,168.729,55.758,166.399,55.758z M139.685,23.22
					h6.624c1.31,0,2.39-0.12,3.239-0.364c0.848-0.242,1.528-0.643,2.038-1.201c0.509-0.557,0.861-1.31,1.055-2.256
					c0.193-0.946,0.292-2.123,0.292-3.53c0-1.649-0.462-2.936-1.383-3.858c-0.922-0.921-2.669-1.383-5.241-1.383h-6.624V23.22z"/>
				<path fill="#ffffff" d="M234.313,8.808c-2.184,0-3.712,0.182-4.586,0.546c-0.873,0.364-1.455,0.886-1.747,1.565l-14.412,44.33
					h-18.78l-13.394-44.257c-0.583-1.456-2.524-2.184-5.823-2.184V1.165h31.737v7.643h-4.805c-1.408,0-2.111,0.413-2.111,1.238
					c0,0.146,0.024,0.291,0.073,0.437c0.048,0.146,0.097,0.316,0.146,0.51l9.099,33.12l10.046-32.538
					c0.146-0.339,0.218-0.679,0.218-1.019c0-1.165-1.092-1.747-3.275-1.747h-3.858V1.165h21.401L234.313,8.808z"/>
				<path fill="#ffffff" d="M358.568,8.808c-4.319,0-6.479,1.117-6.479,3.349v43.092h-21.765l-18.197-37.852v26.86
					c0,2.233,2.158,3.349,6.479,3.349v7.643h-22.42v-7.643c4.318,0,6.479-1.116,6.479-3.349V12.156c0-2.231-2.16-3.349-6.479-3.349
					V1.165h27.733l18.707,38.871v-27.88c0-2.231-2.159-3.349-6.479-3.349V1.165h22.42v7.643H358.568z"/>
			</g>
			<path fill="#ffffff" d="M273.839,10.264c4.609,0,6.915,2.548,6.915,7.643l9.463-0.005V1.165H237.88v7.643
				c4.319,0,6.479,1.117,6.479,3.349v14.079v3.929v14.079c0,2.231-2.16,3.349-6.479,3.349v7.643h52.337v-16.75l-9.463,0.008
				c0,5.095-2.306,7.643-6.915,7.643h-12.064V33.18h3.766c1.649,0,2.693,2.522,3.131,7.57h8.152l-0.043-10.585v-3.929l0.043-10.585
				h-8.152c-0.438,5.048-1.481,7.57-3.131,7.57h-3.766V10.264H273.839z"/>
		</g>
		<path fill="#ffffff" d="M363.656,55.562c0,0,17.721-56.651,54.616-54.328c0,0-4.576,7.41-16.124,9.805c0,0,5.376,0.656,9.733-0.798
			c0,0-2.615,8.428-16.849,9.587c0,0,7.844,2.034,11.33,0.871c0,0-0.946,6.283-15.438,9.405c-0.859,0.183-6.643,1.631-1.996,2.213
			c0,0,6.68,1.166,8.425,0.582c0,0-5.722,8.569-19.755,7.843c-1.38-0.072-2.036,0-2.036,0L363.656,55.562z"/>
		</svg>
		<time>Rosario, <span><?php the_time('l j') ?></span> de <?php the_time('F') ?> de <?php the_time('Y') ?></time>
	</a>
	
	<ul id="site-options">
		<li class="search-option"><a href="#"><i class="icon-search" title="Buscar"></i></a></li>
		<li><a href="#"><i class="icon-location" title="Ubicaci&oacute;n"></i></a></li>
		<li><a href="#"><i class="icon-menu" title="Navegaci&oacute;n"></i></a></li>
	</ul>			
	<form>
		<input disabled="disabled" class="input-search" type="text" placeholder="Buscar noticias o temas" />
		<input disabled="disabled" class="input-submit-search" type="submit" value=""/>
	</form>
	<ul id="social-profiles">
		<li><a target="_blank" href="http://facebook.com/diarioporven"><i class="icon-facebook" title="Facebook"></i></a></li>
		<li><a target="_blank" href="http://twitter.com/diarioporven"><i class="icon-twitter" title="Twitter"></i></a></li>
		<li><a target="_blank" href="https://plus.google.com/u/0/b/108788771068142445588/108788771068142445588/posts"><i class="icon-gplus" title="Google Plus"></i></a></li>
		<li><a target="_blank" href="http://porven.me/feed"><i  class="icon-rss" title="RSS"></i></a></li>
	</ul>

</header>