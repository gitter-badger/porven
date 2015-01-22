<aside id="sidebar" class="sidebar-dossier">

	<div class="clear metadata-entrada">
		<div id="metadata">
			<div class="left avatar-author"><?php $author_email = get_the_author_meta('user_email'); echo get_avatar($author_email, 50) ?></div>
			<div class="time-post left">
				<time>Actualizado hace <?php echo curated_human_time_diff(get_the_modified_date('U'), current_time('timestamp'), 'clear') ?></time>
				<span><em>por</em> <?php the_author() ?></span>
			</div>
		</div>

		<div id="social-share-sidebar">
			<?php include( TEMPLATEPATH . '/social-share.php' ); ?>
		</div>
	</div>

	<p><?php echo get_the_excerpt() ?></p>

	<div id="dossier-sumary" class="menu-fixed">
		<header><span>Sumario del dossier</span></header>
		<ul>
			<?php 
				$sumary = explode('[card id="', get_the_content());
				//$sumary = strstr($sumary, '"', true);
				//print_r($sumary);
				$number_card = 0;
				foreach ($sumary as $sum) {
					if (!empty($sum)) {
						$id = strstr($sum, '"', true);
						echo '<li><a href="#card-'.$id.'"><small>'.$number_card.'.</small><span>'.get_the_title($id).'</span></a></li>';
					}
					$number_card++;
				}
			?>
		</ul>
	</div>

</aside>