<?php
add_action( 'init', 'register_taxonomy_formatos' );

function register_taxonomy_formatos() {

    $labels = array( 
        'name' => _x( 'Formatos', 'formatos' ),
        'singular_name' => _x( 'formato', 'formatos' ),
        'search_items' => _x( 'Buscar formatos', 'formatos' ),
        'popular_items' => _x( 'formatos populares', 'formatos' ),
        'all_items' => _x( 'Todas las formatos', 'formatos' ),
        'parent_item' => _x( 'Parent formato', 'formatos' ),
        'parent_item_colon' => _x( 'Parent formato:', 'formatos' ),
        'edit_item' => _x( 'Editar formato', 'formatos' ),
        'update_item' => _x( 'Actualizar formato', 'formatos' ),
        'add_new_item' => _x( 'Añadir formato', 'formatos' ),
        'new_item_name' => _x( 'Nuevo formato', 'formatos' ),
        'separate_items_with_commas' => _x( 'Separar formatos con comas', 'formatos' ),
        'add_or_remove_items' => _x( 'Agragar o quitar formatos', 'formatos' ),
        'choose_from_most_used' => _x( 'Selecciona de los formatos más usadas', 'formatos' ),
        'menu_name' => _x( 'Formatos', 'formatos' ),
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

    register_taxonomy( 'formatos', array('post'), $args );
}
    
?>