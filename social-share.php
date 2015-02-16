<ul class="social-share">
	<li><a rel="nofollow" class="share-facebook" href="https://www.facebook.com/dialog/share?app_id=1479463332330420&display=page&href=<?php the_permalink() ?>&redirect_uri=<?php the_permalink() ?>"><i class="icon-facebook" title="Facebook"></i><span>Compartir</span></a></li>
	<li><a rel="nofollow" class="share-twitter" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo str_replace('%', '%25', get_the_title()) ?>&via=diarioporven&url=<?php bloginfo('url') ?>/n/<?php the_ID() ?>"><i class="icon-twitter" title="Twitter"></i><span>Twittear</span></a></li>
	<li><a rel="nofollow" class="share-gplus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink() ?>"><i class="icon-gplus" title="Google+"></i></a></li>
	<li class="hidden-computer"><a class="share-whatsapp" href="whatsapp://send?text=<?php the_title(); ?>+&#8212;+<?php bloginfo('url') ?>/n/<?php the_ID() ?>" data-action="share/whatsapp/share"><i class="icon-logo-whatsapp" title="WhatsApp"></i></a></li>
	<?php if(current_user_can( 'edit_posts' )) { ?>
		<li><a rel="nofollow" class="custom" href="<?php bloginfo('url') ?>/wp-admin/post.php?post=<?php the_ID() ?>&action=edit"><i class="icon-pencil" title="Editar"></i></a></li>
	<?php } else { ?>
		<li><a rel="nofollow" class="share-mail" href="mailto:?subject=<?php the_title() ?>&amp;body=Te recomiendo leer: <?php the_title() ?> <?php the_permalink() ?>"><i class="icon-mail-alt" title="Email"></i></a></li>
	<?php } ?>
</ul>