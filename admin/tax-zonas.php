<?php
add_action( 'init', 'register_taxonomy_zonas' );

function register_taxonomy_zonas() {

    $labels = array( 
        'name' => _x( 'Zonas', 'zonas' ),
        'singular_name' => _x( 'Zona', 'zonas' ),
        'search_items' => _x( 'Buscar zonas', 'zonas' ),
        'popular_items' => _x( 'Zonas populares', 'zonas' ),
        'all_items' => _x( 'Todas las zonas', 'zonas' ),
        'parent_item' => _x( 'Parent Zona', 'zonas' ),
        'parent_item_colon' => _x( 'Parent Zona:', 'zonas' ),
        'edit_item' => _x( 'Editar zona', 'zonas' ),
        'update_item' => _x( 'Actualizar zona', 'zonas' ),
        'add_new_item' => _x( 'Añadir zona', 'zonas' ),
        'new_item_name' => _x( 'Nueva zona', 'zonas' ),
        'separate_items_with_commas' => _x( 'Separar zonas con comas', 'zonas' ),
        'add_or_remove_items' => _x( 'Agragar o quitar zonas', 'zonas' ),
        'choose_from_most_used' => _x( 'Selecciona de las zonas más usadas', 'zonas' ),
        'menu_name' => _x( 'Zonas', 'zonas' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'zonas', array('post'), $args );
}
    
?>