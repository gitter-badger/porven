<?php

function sc_twitter($atts) {
     $sc_return = '<div class="card card_twitter"><i class="icon-twitter"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content"><div class="tweet-container">';
     $sc_return .= '<blockquote class="twitter-tweet" lang="es"><a href="'.$atts['url'].'"></a></blockquote>';
     $sc_return .= '</div></div></div>';

     return $sc_return;
}
add_shortcode('twitter', 'sc_twitter');

function sc_facebook($atts) {
     $sc_return = '<div class="card card_facebook"><i class="icon-facebook-squared"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
     $sc_return .= '<div id="fb-root"></div><div class="fb-post" data-href="';
     $sc_return .= $atts['url'];
     $sc_return .= '" data-width="500px"><div class="fb-xfbml-parse-ignore"></div></div>';
     $sc_return .= '</div></div>';


     return $sc_return;
}
add_shortcode('facebook', 'sc_facebook');

function sc_youtube($atts) {
     $video_code = explode('?v=', $atts['url']);

     if($atts['type'] == "full") {
          $sc_return = '<div class="youtube-full"><div class="youtube-embed-container"><iframe width="100%" src="//www.youtube.com/embed/';
          $sc_return .= $video_code[1];
          $sc_return .= '" frameborder="0" allowfullscreen></iframe></div></div>';
     }

     else {
          $sc_return = '<div class="card card_youtube"><i class="icon-play"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
          $sc_return .= '<div class="youtube-embed-container"><iframe width="100%" src="//www.youtube.com/embed/';
          $sc_return .= $video_code[1];
          $sc_return .= '" frameborder="0" allowfullscreen></iframe></div>';
          $sc_return .= '</div></div>';
     }     

     return $sc_return;
}
add_shortcode('youtube', 'sc_youtube');

function sc_img($atts) {
     if(empty($atts['url'])) {$atts['url'] = $atts['src'];}
     $sc_return = '<div class="card card_img"><i class="icon-picture"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
     $sc_return .= '<img width="100%" src="'.$atts['src'].'" />';
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('img', 'sc_img');

function sc_vine($atts) {
     $video_code = explode('/v/', $atts['url']);
     $sc_return = '<div class="card card_vine"><i class="icon-play"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
     $sc_return .= '<div class="vine-embed-container"><iframe class="vine-embed" src="https://vine.co/v/'.$video_code[1].'/embed/simple?related=0" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>';
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('vine', 'sc_vine');

function sc_instagram($atts) {
     $sc_return = '<div class="card card_instagram"><i class="icon-instagramm"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
     //$sc_return .= '<img src="'.$atts['url'].'media/?size=l" width="100%" alt="" />';
     $sc_return .= '<div class="instagram-embed-container"><iframe src="'.$atts['url'].'/embed" width="100%" scrolling="no" allowtransparency="true"></iframe></div>';
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('instagram', 'sc_instagram');

function sc_googleplus($atts) {
     $sc_return = '<div class="card card_googleplus"><i class="icon-gplus"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
     $sc_return .= '<div class="g-post" data-href="'.$atts['url'].'"></div>';
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('googleplus', 'sc_googleplus');

function sc_soundcloud($atts) {
     $sc_return = '<div class="card card_soundcloud"><i class="icon-soundcloud"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
     $sc_return .= '<iframe width="100%" height="130" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$atts['url'].'&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false&amp;visual=false"></iframe>';
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('soundcloud', 'sc_soundcloud');

function sc_pinterest($atts) {
     $sc_return = '<div class="card card_pinterest"><i class="icon-pinterest-circled"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$atts['url'].'">Enlace permanente</a><div class="card_content">';
     $sc_return .= '<a data-pin-do="embedPin" href="'.$atts['url'].'"></a>';
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('pinterest', 'sc_pinterest');

function sc_trend($atts) {
     $q = str_replace(' ', '+', $atts['q']);
     if(!empty($atts['months'])) { $date = '&date=today+'.$atts['months'].'-m'; }
     if(!empty($atts['geo'])) { $geo = '&geo='.$atts['geo']; }
     $url = '//www.google.com.ar/trends/fetchComponent?hl=es-419&q='.$q.$date.$geo;
     $permalink = 'http://www.google.com.ar/trends/explore#q='.$q.$date.$geo.'&hl=es-419';
     $sc_return = '<div class="card card_trend"><i class="icon-trend"></i><a rel="nofollow" target="_blank" class="permalink" href="'.$permalink.'">Enlace permanente</a><div class="card_content">';
     $sc_return .= '<iframe scrolling="auto" style="border:none;" width="100%" height="380" src="'.$url.'&content=1&cid=TIMESERIES_GRAPH_0&export=5"></iframe>';
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('trend', 'sc_trend');

// Quote

function sc_quote($atts, $content = null) {
     if (isset($atts['url'])) {
          $url_quote = $atts['url'];
     } else {
          $url_quote = "";
     }     
     $sc_return = '<div class="card card_quote"><span>'.$atts['source'].'</span><a rel="nofollow" target="_blank" class="permalink" href="'.$url_quote.'">Enlace permanente</a><hr class="divider" /><div class="card_content">';
     $sc_return .= $content;
     $sc_return .= '</div></div>';

     return $sc_return;
}
add_shortcode('quote', 'sc_quote');

// Card

function sc_card($atts, $content = null) {
     $id = $atts['id'];
     query_posts("p=$id&post_type=card"); while (have_posts()) : the_post();
     //$dossier_numbers = '<span><strong>'.get_the_ID().'</strong> / '.$number_card.'5</span>';
     $sc_return = '<div class="card card_element" id="card-'.$id.'"><header><!--1/3--><h3>'.get_the_title().'</h3></header><div class="card_content">';
     $sc_return .= '<a target="_blank" class="permalink" href="'.get_the_permalink().'"><time title="'.get_the_time('l j \d\e F \d\e Y \a \l\a\s H:i').'">'.curated_human_time_diff(get_the_time('U'), current_time('timestamp')).'</time></a>';
     $sc_return .= apply_filters('the_content',get_the_content());
     $sc_return .= '</div></div>';        
     endwhile; wp_reset_query();

     return $sc_return; the_content();
}
add_shortcode('card', 'sc_card');



// Pictures

function sc_pic($atts, $content = null) {

     $image_full = wp_get_attachment_image_src($atts['id'],'full', true); $image_full = $image_full[0];
     $image_large = wp_get_attachment_image_src($atts['id'],'large', true); $image_large = $image_large[0];
     $image_medium = wp_get_attachment_image_src($atts['id'],'medium', true); $image_medium = $image_medium[0];
     $image_alt = get_post_meta($atts['id'], '_wp_attachment_image_alt', true);

     if($atts['type'] == "full") {
          $sc_return = '<figure class="longform-picture longform-full"><picture>';
          $sc_return .= '<source srcset="'.$image_medium.'" media="(max-width: 480px)">';
          $sc_return .= '<source srcset="'.$image_large.'" media="(max-width: 768px)">';
          $sc_return .= '<source srcset="'.$image_full.'"">';
          $sc_return .= '<img src="'.$image_large.'" alt="">';
          if(!empty($image_alt)) { $sc_return .= '<figcaption>'.$image_alt.'</figcaption>'; }
          $sc_return .= '</picture></figure>';
     }    

     elseif($atts['type'] == "medium") {
          $sc_return = '<figure class="longform-picture longform-medium"><picture>';
          $sc_return .= '<source srcset="'.$image_medium.'" media="(max-width: 480px)">';
          $sc_return .= '<source srcset="'.$image_large.'">';
          $sc_return .= '<img src="'.$image_large.'" alt="">';
          if(!empty($image_alt)) { $sc_return .= '<figcaption>'.$image_alt.'</figcaption>'; }
          $sc_return .= '</picture></figure>';

     }    

     elseif($atts['type'] == "background") {
          $sc_return = '<div class="longform-picture longform-background" style="background: url('.$image_large.') center center no-repeat; background-size: cover"><div class="background-section"><section>';
          $sc_return .= $content;
          $sc_return .= '</section></div></div>';
     }   

     return $sc_return;            

}
add_shortcode('pic', 'sc_pic');


?>