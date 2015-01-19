<div class="wrapper">

	<header id="header-post">
		<time>	<?php echo curated_human_time_diff(get_the_time('U'), current_time('timestamp')); ?></time>
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
				     ?>

					<div style="background: #111 url(<?php echo $image_url ?>) center center no-repeat; background-size: cover;">&nbsp;</div>
					<?php if(!empty($image_alt)) { echo '<p>'.$image_alt.'</p>'; } ?>
				
				<?php } ?>

				</div>
				<div class="clear">
					<div id="metadata">
						<?php if(get_field('mostrar_autor')) { ?><div class="left avatar-author"><?php $author_email = get_the_author_meta('user_email'); echo get_avatar($author_email, 50) ?></div><?php } ?>
						<div class="time-post left">
							<time><?php the_time('l j') ?> de <?php the_time('F') ?><?php if(get_the_time('Y') !== date('Y')) { ?> de <?php the_time('Y'); } ?>, <?php the_time('G:i') ?> hs.</time>
							<span>
								<?php 
								//$location_user_det = explode(',', $_SESSION['location_user']);
								//echo distancia(get_field('coordenadas')['lat'], get_field('coordenadas')['lng'], $location_user_det[0], $location_user_det[1]) 
								echo 'A 8';
								?>km de distancia
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
							the_sub_field('shareline');
							echo '</p><div class="right">
								<a href="https://www.facebook.com/dialog/share?app_id=1479463332330420&display=page&href=<?php the_permalink() ?>&redirect_uri=<?php the_permalink() ?>"><i class="icon-facebook" title="Facebook"></i></a>
								<a href="#"><i class="icon-twitter" title="Twitter"></i></a>
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

					        echo '<li><p><strong>'.get_sub_field('valor').'</strong> <span>';
					        $term = get_term( get_sub_field('dato'), 'datos');
					        $subterm_adaptacion = get_sub_field('adaptacion');
					        if(!empty($subterm_adaptacion)) {
					        	echo $subterm_adaptacion;
					        } elseif( $term->name == 'Otro' ) {
					        	echo get_sub_field('otro');
					        } else {
					        	echo $term->name;
					    	}

					    	echo '</span></p><div class="right">
								<a target="_blank" href="https://www.facebook.com/dialog/share?app_id=1479463332330420&display=popup&href=http://google.com&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer"><i class="icon-facebook" title="Facebook"></i></a>
								<a target="_blank" href="https://twitter.com/share?text=<?php the_title() ?>&via=diarioporven&url=<?php the_permalink() ?>"><i class="icon-twitter" title="Twitter"></i></a>
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
								<?php include'social-share.php' ?>		
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!--the-post-->

			<?php if(get_field('permitir_comentarios')) { ?><?php comments_template() ?><?php } ?>

			<ul id="related-posts">
				<li>
					<a href="#" class="box-post">
						<div style="background: #111 url(images/_image2.jpg) center center no-repeat; background-size: cover; height: 219px; margin-bottom: 10px;">&nbsp;</div>
						<span>Hace una semana</span>
						<h3>Buscan simplificar los tr&aacute;mites para alquilar en Rosario</h3>
					</a>
				</li>
				<li>
					<a href="#" class="box-post">
						<div style="background: #111 url(images/_image2.jpg) center center no-repeat; background-size: cover; height: 219px; margin-bottom: 10px;">&nbsp;</div>
						<span>Ayer por la tarde</span>
						<h3>Los festejos por el fin del ciclo lectivo dejaron al Monumento hecho un basural</h3>
					</a>
				</li>
			</ul>
		</div>
		<!--content-->
		<?php include'sidebar.php' ?>
	</div>
</div>
<!--wrapper-->