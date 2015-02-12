<div class="wrapper">
	<header id="header-post">
		<time><?php echo curated_human_time_diff(get_the_time('U'), current_time('timestamp')); ?></time>
		<h1><?php the_title() ?></h1>
		<span class="categorie-post">
			<?php
				$category = get_the_category(); 
				$name = $category[0]->cat_name;
				$cat_id = get_cat_ID( $name );
				$link = get_category_link( $cat_id );
				echo '<a href="'. esc_url( $link ) .'"">'. $name .'</a>';
			?>
		</span>
	</header>

	<div class="clear">
		<div id="content">
			<div id="the-post" class="post noticia">
				<div id="header-thumb">

				<?php // Llamamos al thumbnail
				if(has_post_thumbnail()) {
				     $image_id = get_post_thumbnail_id();
				     $image_info = wp_get_attachment_image_src($image_id,'large', true);
				     $image_url = $image_info[0];
				     $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				     $no_image = 0;
				     ?>

					<div style="background: #111 url(<?php echo $image_url ?>) center center no-repeat; background-size: cover;">&nbsp;</div>
					<?php if(!empty($image_alt)) { echo '<p>'.$image_alt.'</p>'; } ?>
				
				<?php } else { $no_image = 1; } ?>

				</div>

				<div class="clear metadata-entrada<?php if($no_image == 1) { echo ' no-image'; } ?>">
					<div id="metadata"<?php if(get_field('mostrar_autor')) {} else { echo ' class="no-author"'; } ?>>
						<?php if(get_field('mostrar_autor')) { ?><?php $author_email = get_the_author_meta('user_email'); echo get_avatar($author_email, 50) ?><?php } ?>
						<div class="time-post left">
							<time><?php the_time('l j') ?> de <?php the_time('F') ?><?php if(get_the_time('Y') !== date('Y')) { ?> de <?php the_time('Y'); } ?>, <?php the_time('G:i') ?> hs.</time>
							<span>
								<?php 
								//$location_user_det = explode(',', $_SESSION['location_user']);
								//echo distancia(get_field('coordenadas')['lat'], get_field('coordenadas')['lng'], $location_user_det[0], $location_user_det[1]) 
								//echo 'A 8 km de distancia';
								?>
							</span>
							<?php if(get_field('mostrar_autor')) { ?><span><em>por</em> <?php the_author() ?></span><?php } ?>
						</div>
					</div>
					<div id="social-share-top">
						<?php include( TEMPLATEPATH . '/social-share.php' ); ?>
					</div>
				</div>

				<?php
					if( have_rows('sharelines') ):
						echo '<div id="sharelines" class="post-list"><span>Sharelines</span><ul>';
						while ( have_rows('sharelines') ) : the_row();
							echo '<li><p>';
							$the_sub_field = get_sub_field('shareline');
							echo $the_sub_field;
							echo '</p><div class="right">
								<a href="https://www.facebook.com/dialog/feed?app_id=1479463332330420&display=page&link='.get_the_permalink().'&redirect_uri='.get_the_permalink().'&description='.$the_sub_field.' &mdash; '.get_the_excerpt().'"><i class="icon-facebook" title="Facebook"></i></a>
								<a href="https://twitter.com/intent/tweet?text='.$the_sub_field.'&url='.get_bloginfo('url').'/n/'.get_the_ID().'"><i class="icon-twitter" title="Twitter"></i></a>
							</div></li>';

					   endwhile;
					   echo '</ul></div>';
					else :
					endif;
				?>

				<?php
					if( have_rows('datos') ):
						echo '<div id="datos" class="post-list"><span>Datos</span><ul>';
					    while ( have_rows('datos') ) : the_row();

					    	if(substr(get_sub_field('valor'), -6) == '000000') {
					    		$millon = 'de ';
					    		if(get_sub_field('valor') == '1000000') {
					    			$valor = '1 mill&oacute;n';
					    		} else {
					    			$valor =  substr(get_sub_field('valor'), 0, -6).' millones';
					    		}
					    	} elseif(substr(get_sub_field('valor'), -3) == '000') {
					    		unset($millon);
					    		if(get_sub_field('valor') == '1000') {
					    			$valor = 'Mil';
					    		} else {
					    			$valor =  substr(get_sub_field('valor'), 0, -3).' mil';
					    		}
					    	} else {
					    		unset($millon);
					    		$valor =  get_sub_field('valor');
					    	}
					        echo '<li><p><strong>'.$valor.'</strong> <span>';
					        $term = get_term( get_sub_field('dato'), 'datos');
					        $subterm_adaptacion = get_sub_field('adaptacion');
					        if(!empty($subterm_adaptacion)) {
					        	$dato_print = $millon.$subterm_adaptacion;
					        } elseif( $term->name == 'Otro' ) {
					        	$dato_print = get_sub_field('otro');
					        } else {
					        	$dato_print = $millon.lcfirst($term->name);
					    	}

					    	echo $dato_print;

					    	echo '</span></p><div class="right">
								<a href="https://www.facebook.com/dialog/feed?app_id=1479463332330420&display=page&link='.get_the_permalink().'&redirect_uri='.get_the_permalink().'&description='.$valor.' '.$dato_print.' &mdash; '.get_the_excerpt().'"><i class="icon-facebook" title="Facebook"></i></a>
								<a href="https://twitter.com/intent/tweet?text='.$valor.' '.$dato_print.' &mdash; '.get_the_title().'&url='.get_bloginfo('url').'/n/'.get_the_ID().'"><i class="icon-twitter" title="Twitter"></i></a>
							</div></li>';

					   endwhile;
					   echo '</ul></div>';
					else :
					endif;
				?>
				
				<div id="the-content">

					<div class="post-content">
						<?php the_content() ?>
					</div>

				</div>
				<!--the-content-->

				<?php $fuente = get_field('fuente'); if(!empty($fuente)) { ?>
				<div id="fuente" class="post-list">
					<span>Fuente</span>
					<ul>
						<li>
							<p><?php echo get_field('fuente') ?></p>
							<div class="right">
								<?php $fuente_url = get_field('fuente_url'); if(!empty($fuente)) { ?><a rel="nofollow" target="_blank" href="<?php echo get_field('fuente_url') ?>"><i class="icon-link" title="Enlace"></i></a><?php } ?>
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
								<span><?php $share_score = get_post_meta( get_the_ID(), 'socialcount_TOTAL' ); echo $share_score[0] ?></span>
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

			<?php include( TEMPLATEPATH . '/related-posts.php' ); ?>

		</div>
		<!--content-->
		<?php include'sidebar.php' ?>
	</div>
</div>
<!--wrapper-->