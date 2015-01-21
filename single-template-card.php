<div class="wrapper">

	<header id="header-post" class="header-post-card">
		<time><?php echo curated_human_time_diff(get_the_time('U'), current_time('timestamp')); ?></time>
		<h1><?php the_title() ?></h1>
	</header>

	<div id="content" class="full-content">
		<div id="the-post" class="post template-card">
			
			<div id="the-content">

				<div class="post-content">
					<?php the_content() ?>
				</div>

			</div>
			<!--the-content-->

			<hr class="hr-bar" />
			<div class="clear">
				<div id="metadata">
					<div class="left">
						<time><?php the_time('l j') ?> de <?php the_time('F') ?><?php if(get_the_time('Y') !== date('Y')) { ?> de <?php the_time('Y'); } ?>, <?php the_time('G:i') ?> hs.</time>
					</div>
				</div>
				<div id="social-share-card">
					<?php include( TEMPLATEPATH . '/social-share.php' ); ?>
				</div>
			</div>
			<hr class="hr-bar hr-bar-margin" />

		</div>
		<!--the-post-->
	</div>
	<!--content-->
</div>
<!--wrapper-->