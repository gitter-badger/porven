<?php
require('./wp-blog-header.php');
if (have_posts()) : the_post();
header("location: ".get_permalink());
exit;
endif;
?>