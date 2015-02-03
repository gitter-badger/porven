<div class="wrapper dossier">
	<?php // Llamamos al thumbnail
	if(has_post_thumbnail()) {
	     $image_id = get_post_thumbnail_id();
	     $image_info = wp_get_attachment_image_src($image_id,'large', true);
	     $image_url = $image_info[0];
	} ?>

	<header id="header-post" class="header-post-dossier filter-grayscale">
		<div class="img-grayscale" style="background: #111 url(<?php echo $image_url ?>) center center no-repeat; background-size: cover;">&nbsp;</div>
		<div class="title-dossier">
			<div class="bg-gradient">&nbsp;</div>
			<h1><?php the_title() ?></h1>
		</div>
	</header>

	<div class="clear">
		<div id="content" class="content-dossier">
			<div id="the-post" class="post dossier">

				<div class="clear metadata-content metadata-entrada">
					<div id="metadata">
						<div class="left avatar-author"><?php $author_email = get_the_author_meta('user_email'); echo get_avatar($author_email, 50) ?></div>
						<div class="time-post left">
							<time>Actualizado hace <?php echo curated_human_time_diff(get_the_modified_date('U'), current_time('timestamp'), 'clear') ?></time>
							<span><em>por</em> <?php the_author() ?></span>
						</div>
					</div>
					<div id="social-share-top">
						<?php include( TEMPLATEPATH . '/social-share.php' ); ?>
					</div>
				</div>

				<div id="the-content">
					<div class="post-content">

						<?php $is_dossier = 1; the_content() ?>

					</div>
				</div>
				<!--the-content-->

				<div id="interaccion" class="post-list">
					<span>Interaccion</span>
					<ul>
						<li>
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
		</div>
		<!--content-->
		<?php include( TEMPLATEPATH . '/sidebar-dossier.php' ); ?>	
	</div>
</div>
<!--wrapper-->