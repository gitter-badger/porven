<ul id="related-posts">
				
	<?php 
	// Otras noticias multimedia
		$post_id = get_the_ID(); 
		$args = array(
		        'posts_per_page' => 6,
		        'post__not_in' => array($post_id),
		        'taxonomy' => 'formatos',
		        'term' => 'multimedia'
		);
		$cebra = 1;
		query_posts($args); while (have_posts()) : the_post();

		// Llamamos al thumbnail
		if(has_post_thumbnail()) {
		     $image_id = get_post_thumbnail_id();
		     $image_info = wp_get_attachment_image_src($image_id,'medium', true);
		     $image_url = $image_info[0];
		     ?>

		<li>
			<a href="<?php the_permalink() ?>" class="box-post">
				<div style="background: #111 url(<?php echo $image_url ?>) center center no-repeat; background-size: cover; height: 219px; margin-bottom: 10px;">&nbsp;</div>
				<span><?php echo curated_human_time_diff(get_the_time('U'), current_time('timestamp')); ?></span>
				<h3><?php the_title() ?></h3>
			</a>
		</li>



	<?php 

		if ($cebra/2 == floor($cebra/2)) {
			echo ' <div class="clear"></div>';
		}
		$cebra++;

	} endwhile; wp_reset_query(); ?>

</ul>