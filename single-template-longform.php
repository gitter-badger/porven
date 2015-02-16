 <div id="header-post">
			<div class="title">
				<h1><?php the_title() ?></h1>
				<strong><?php echo get_field('bajada') ?></strong>
		    </div>

		    <div class="author">
		    	<div class="hr-icon">
		    		<span>&nbsp;</span>
		    		<i class="icon-porven">&nbsp;</i>
		    		<span>&nbsp;</span>
		    	</div>
		    	<div class="author-name">
					<?php $author_id = get_the_author_meta('ID'); echo get_avatar( get_the_author_meta('user_email', $author_id), 50 ); ?>
					<p><em>por</em> <?php the_author(); ?></p>
				</div>
		    </div>
		</div>

	</div>
</div>

</header>

<div class="wrapper longform">

	<div id="content">

		<div id="the-post" class="post">	

			<div id="the-content">

				<div class="container">

					<div id="metadata-longform">
						<div id="metadata">
							<div class="time-post left">
								<time><?php the_time('l j') ?> de <?php the_time('F') ?><?php if(get_the_time('Y') !== date('Y')) { ?> de <?php the_time('Y'); } ?></time>
								<span><em>fotograf&iacute;a por</em> <?php echo get_field('fotografia') ?></span>
							</div>
						</div>
						<div id="social-share-longform">
							<?php include'social-share.php' ?>	
						</div>
					</div>


				<div class="post-content">
					<?php the_content() ?>
				</div>

				<div id="interaccion" class="post-list">
					<span>Interaccion</span>
					<ul>
						<li>
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

			</div>

		</div>

	</div>

</div>