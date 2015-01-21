<div class="wrapper">

	<header id="header-post" class="header-post-multimedia">
		<h1><?php the_title() ?></h1>

		<?php 
            $images = get_field('galeria_multimedia');
            if( $images ) {

				if (count($images) == 1 ) {

	            	$multimedia_type = 'single-image';

	            	// Imprimo la imagen individual
	            	foreach( $images as $image ) {
	      				$first_alt = $image['alt'];

	            		$image_orientation_number = $image['width'] - $image['height'];
	            		if($image_orientation_number > 0) {
	            			$image_orientation = 'horizontal';
	            		} elseif($image_orientation_number < 0) {
	            			$image_orientation = 'vertical';
	            		} elseif($image_orientation_number == 0) {
	            			$image_orientation = 'none';
	            		}

	            		echo '<div class="header-thumb"><img class="single-image orientation-'.$image_orientation.'" src="'. $image['sizes']['large'].'" alt="'.$image['alt'].'" /></div>';	      				
	      				
	      			}

            	} else {

            		$multimedia_type = 'gallery';

            		echo '<ul class="bxslider">';

            		foreach( $images as $image ) {
	            		$first_alt = $image['alt'];

	            		$image_orientation_number = $image['width'] - $image['height'];
	            		if($image_orientation_number > 0) {
	            			$image_orientation = 'horizontal';
	            		} elseif($image_orientation_number < 0) {
	            			$image_orientation = 'vertical';
	            		} elseif($image_orientation_number == 0) {
	            			$image_orientation = 'none';
	            		} ?>

						  <li>
							<div class="header-thumb">
								<img class="orientation-<?php echo $image_orientation; ?>" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt'] ?>" />
							</div>
						  </li>

						<?php } ?>

						</ul>

				<?php } 

				} else { // Si no hay imágenes y hay un video

					$multimedia_type = 'video';

					$multimedia_video = get_field('multimedia_video');
            		$video_code = explode('?v=', $multimedia_video);
            		echo '<div class="header-thumb"><div class="video-embed-container"><iframe width="100%" src="//www.youtube.com/embed/'.$video_code[1].'" frameborder="0" allowfullscreen></iframe></div></div>';
            		$first_alt = get_field('multimedia_texto_alternativo');

			 	} ?>

				<div class="clear">
					<p class="right" id="alt-description"><?php echo $first_alt; ?></a></p>
					<div id="social-share-multimedia" class="left">
						<?php include( TEMPLATEPATH . '/social-share.php' ); ?>		
					</div>
				</div>			 	
		
	</header>

	<div id="content">
		<div id="the-post" class="post multimedia">
			<div id="metadata">
				<time><?php the_time('l j') ?> de <?php the_time('F') ?><?php if(get_the_time('Y') !== date('Y')) { ?> de <?php the_time('Y'); } ?>, <?php the_time('G:i') ?> hs.</time>
			</div>
			
			<div id="the-content">
				<div class="post-content">
					<?php the_content() ?>
				</div>
			</div>
			<!--the-content-->

			<?php if(!empty(get_field('fuente'))) { ?>
				<div id="fuente" class="post-list">
					<span>Fuente</span>
					<ul>
						<li>
							<p><?php echo get_field('fuente') ?></p>
							<div class="right">
								<?php if(!empty(get_field('fuente_url'))) { ?><a href="<?php echo get_field('fuente_url') ?>"><i class="icon-link" title="Link"></i></a><?php } ?>
							</div>
						</li>
					</ul>
				</div>
				<?php } ?>
				<div id="interaccion" class="post-list">
					<span>Interaccion</span>
					<ul>
						<li>
							<?php if(get_field('permitir_comentarios')) { ?>
							<div class="comments-share">
								<i class="icon-chat"></i>
								<span><fb:comments-count href="<?php echo get_permalink($post->ID); ?>"></fb:comments-count></span>
							</div>
							<?php } ?>
							<div class="comments-share">
								<i class="icon-share"></i>
								<span><?php echo get_post_meta( get_the_ID(), 'socialcount_TOTAL' )[0]; ?></span>
							</div>
							<div id="social-share-bottom" class="right">
								<?php include( TEMPLATEPATH . '/social-share.php' ); ?>	
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!--the-post-->

			<?php if(get_field('permitir_comentarios')) { ?><?php comments_template() ?><?php } ?>

			<?php include( TEMPLATEPATH . '/related-posts-multimedia.php' ); ?>

	</div>
	<!--content-->
	<?php include'sidebar.php' ?>
	<div class="clear">&nbsp;</div>

</div>