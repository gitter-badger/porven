<?php
add_action( 'init', 'register_cpt_card' );

function register_cpt_card() {

    $labels = array( 
        'name' => _x( 'Cards', 'card' ),
        'singular_name' => _x( 'Card', 'card' ),
        'add_new' => _x( 'Añadir nueva', 'card' ),
        'add_new_item' => _x( 'Añadir nueva card', 'card' ),
        'edit_item' => _x( 'Editar card', 'card' ),
        'new_item' => _x( 'Nueva card', 'card' ),
        'view_item' => _x( 'Ver card', 'card' ),
        'search_items' => _x( 'Buscar cards', 'card' ),
        'not_found' => _x( 'No se han encontrado cards', 'card' ),
        'not_found_in_trash' => _x( 'Papelera vacía', 'card' ),
        'parent_item_colon' => _x( 'Card padre:', 'card' ),
        'menu_name' => _x( 'Cards', 'card' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'card', $args );
}
    
?>