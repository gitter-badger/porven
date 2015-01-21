<aside id="sidebar">

	<div class="ad hidden-ad">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Porven — Sidebar 300x600 -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:600px"
		     data-ad-client="ca-pub-7051595016665151"
		     data-ad-slot="1756639439"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

	<ul id="custom-post-list">

		<?php 
		$post_id = get_the_ID(); 
		$args = array(
				'post_type' => 'post',
		        'posts_per_page' => 8,
		        'post__not_in' => array($post_id),
		        'ignore_sticky_posts' => 0
		);
		query_posts($args); while (have_posts()) : the_post(); 

			// Llamamos al thumbnail
			if(has_post_thumbnail()) {
			     $image_id = get_post_thumbnail_id();
			     $image_info = wp_get_attachment_image_src($image_id,'medium', true);
			     $image_url = $image_info[0];
			} else {
			     $image_url = get_bloginfo('template_url').'/images/thumb-default.jpg'; // Imagen por defecto 
			} ?>

			<li>
				<a href="<?php the_permalink() ?>" class="custom-post filter-grayscale">
					<div class="custom-post-img" style="background: #111 url(<?php echo $image_url ?>) center center no-repeat; background-size: cover; height: 170px;">&nbsp;</div>
					<div class="bg-gradient">
						<span><?php
							$category = get_the_category(); 
							$name = $category[0]->cat_name;
							echo $name;
						?></span>
						<h3><?php the_title() ?></h3>
					</div>
				</a>
			</li>

		<?php endwhile; wp_reset_query(); ?> 
	</ul>

	<div class="ad hidden-ad">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Porven — Sidebar 300x250 -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:250px"
		     data-ad-client="ca-pub-7051595016665151"
		     data-ad-slot="3122089434"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

</aside>