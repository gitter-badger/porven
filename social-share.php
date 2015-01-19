<ul class="social-share">
	<li><a class="share-facebook" href="https://www.facebook.com/dialog/share?app_id=1479463332330420&display=page&href=<?php the_permalink() ?>&redirect_uri=<?php the_permalink() ?>"><i class="icon-facebook" title="Facebook"></i><span>Compartir</span></a></li>
	<li><a class="share-twitter" target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title() ?>&via=diarioporven&url=<?php the_permalink() ?>"><i class="icon-twitter" title="Twitter"></i><span>Twittear</span></a></li>
	<li><a class="share-gplus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink() ?>"><i class="icon-gplus" title="Google+"></i></a></li>
	<li class="hidden-computer"><a class="share-whatsapp" href="whatsapp://send?text=<?php the_title(); ?>+&#8212;+<?php urlencode(the_permalink()); ?>" data-action="share/whatsapp/share"><i class="icon-logo-whatsapp" title="WhatsApp"></i></a></li>
	<li><a class="share-mail" href="mailto:?subject=<?php the_title() ?>&amp;body=Te recomiendo leer: <?php the_title() ?> <?php the_permalink() ?>"><i class="icon-mail-alt" title="Email"></i></a></li>
</ul>