<?php
add_action( 'init', 'register_cpt_hecho' );

function register_cpt_hecho() {

    $labels = array( 
        'name' => _x( 'Hechos', 'hecho' ),
        'singular_name' => _x( 'Hecho', 'hecho' ),
        'add_new' => _x( 'Añadir nuevo', 'hecho' ),
        'add_new_item' => _x( 'Añadir nuevo hecho', 'hecho' ),
        'edit_item' => _x( 'Editar hecho', 'hecho' ),
        'new_item' => _x( 'Nuevo hecho', 'hecho' ),
        'view_item' => _x( 'Ver hecho', 'hecho' ),
        'search_items' => _x( 'Buscar hechos', 'hecho' ),
        'not_found' => _x( 'No se han encontrado hechos', 'hecho' ),
        'not_found_in_trash' => _x( 'Papelera vacía', 'hecho' ),
        'parent_item_colon' => _x( 'Hecho padre:', 'hecho' ),
        'menu_name' => _x( 'Hechos', 'hecho' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'editor' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'hecho', $args );
}
?>