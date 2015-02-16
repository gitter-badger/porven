<?php 

// Llamadas

	// CPT
	require_once( TEMPLATEPATH . '/admin/cpt-cards.php');
  require_once( TEMPLATEPATH . '/admin/cpt-hechos.php');

	// Taxonomy
	require_once( TEMPLATEPATH . '/admin/tax-zonas.php');
	require_once( TEMPLATEPATH . '/admin/tax-datos.php');
	require_once( TEMPLATEPATH . '/admin/tax-formatos.php');

	// Librerias
    require_once( TEMPLATEPATH . '/admin/shortcodes.php');

    // Pages
    require_once( TEMPLATEPATH . '/admin/pag-ingresos.php');    


// Thumbs
if (function_exists('add_theme_support')) {
     add_theme_support( 'post-thumbnails' );
}  
if ( function_exists( 'add_image_size' ) ) { 
     add_image_size( 'header-thumb', 740, 300, true );
}

// Columnas a cards
add_filter('manage_edit-card_columns', 'add_new_card_columns');
add_action('manage_posts_custom_column', 'posts_custom_id_columns_card', 5, 2);

function posts_custom_id_columns_card($column_name, $id){
    if($column_name === 'id'){
      echo $id;
    }
}

function add_new_card_columns($card_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    $new_columns['title'] = _x('Card', 'column name');
    //$new_columns['id'] = __('Author');   
    $new_columns['id'] = __('ID');
    $new_columns['author'] = __('Author'); 

    //$new_columns['tags'] = __('Tags');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

// Columnas a hechos
add_filter('manage_edit-hecho_columns', 'add_new_hecho_columns');
add_action('manage_posts_custom_column', 'posts_custom_content_columns_hecho', 5, 2);

function posts_custom_content_columns_hecho($column_name, $id){
global $wpdb;
  if($column_name === 'content'){
    echo get_the_excerpt();
  }
}

function add_new_hecho_columns($hecho_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    $new_columns['title'] = _x('Hecho', 'column name');
    $new_columns['content'] = __('Content');     
    $new_columns['id'] = __('ID');


    $new_columns['categories'] = __('Categories');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

// Cambiar nombre a hechos 
function custom_post_type_title ( $post_id ) {
    global $wpdb;
    if ( get_post_type( $post_id ) == 'hecho' ) {
        $title = 'Hecho #'.$post_id;
        $where = array( 'ID' => $post_id );
        $wpdb->update( $wpdb->posts, array( 'post_title' => $title ), $where );
    }
}
add_action( 'save_post', 'custom_post_type_title' );

// Human diff time
function curated_human_time_diff( $from, $to = '', $format = '' ) {
  if ( empty( $to ) ) {
    $to = time();
  }

  $diff = (int) abs( $to - $from );

  if ( $diff < HOUR_IN_SECONDS ) {
    $mins = round( $diff / MINUTE_IN_SECONDS );
    if ( $mins <= 1 )
      $mins = 1;
    /* translators: min=minute */
    if($format == 'clear') {
      $since = sprintf( _n( 'instantes', '%s minutos', $mins ), $mins );
    } else {
      $since = 'Hace '.sprintf( _n( 'instantes', '%s minutos', $mins ), $mins );
    }
  } elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
    $hours = round( $diff / HOUR_IN_SECONDS );
    if ( $hours <= 1 )
      $hours = 1;
    if($format == 'clear') {
      $since = sprintf( _n( 'una hora', '%s horas', $hours ), $hours );
    } else {
      $since = 'Hace '.sprintf( _n( 'una hora', '%s horas', $hours ), $hours );
    }
  } elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
    $days = round( $diff / DAY_IN_SECONDS );
    if ( $days <= 1 )
      $days = 1;
    if($format == 'clear') {
      $since = sprintf( _n( 'ayer', '%s d&iacute;as', $days ), $days );
    } else {
      $since = sprintf( _n( 'Ayer', 'Hace %s d&iacute;as', $days ), $days );
    }
  } elseif ( $diff < 30 * DAY_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
    $weeks = round( $diff / WEEK_IN_SECONDS );
    if ( $weeks <= 1 )
      $weeks = 1;
    if($format == 'clear') {
      $since = sprintf( _n( 'una semana', '%s semanas', $weeks ), $weeks );
    } else {
      $since = 'Hace '.sprintf( _n( 'una semana', '%s semanas', $weeks ), $weeks );
    }
  } elseif ( $diff < YEAR_IN_SECONDS && $diff >= 30 * DAY_IN_SECONDS ) {
    $months = round( $diff / ( 30 * DAY_IN_SECONDS ) );
    if ( $months <= 1 )
      $months = 1;
    if($format == 'clear') {
      $since = sprintf( _n( 'un mes', '%s meses', $months ), $months );
    } else {
      $since = 'Hace '.sprintf( _n( 'un mes', '%s meses', $months ), $months );
    }
  } elseif ( $diff >= YEAR_IN_SECONDS ) {
    $years = round( $diff / YEAR_IN_SECONDS );
    if ( $years <= 1 )
      $years = 1;
    if($format == 'clear') {
      $since = sprintf( _n( 'un a&ntilde;o', '%s a&ntilde;os', $years ), $years );
    } else {
      $since = 'Hace '.sprintf( _n( 'un a&ntilde;o', '%s a&ntilde;os', $years ), $years );
    }
  }

  return $since;
}

// Saca el P si la imagen está sola
function filter_ptags_on_images($content) {
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


// Calcular distancias
function distancia($lat1, $long1, $lat2, $long2){ 

    $degtorad = 0.01745329; 
    $radtodeg = 57.29577951; 

    $dlong = ($long1 - $long2); 
    $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) 
    + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) 
    * cos($dlong * $degtorad)); 

    $dd = acos($dvalue) * $radtodeg; 

    $miles = ($dd * 69.16); 
    $km = ($dd * 111.302);

    if($km < 1) { $km = 'Menos de 1'; }
    else { $km = round($km); }

    return $km; 
} 

?>