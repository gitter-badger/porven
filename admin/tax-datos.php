<?php
add_action( 'init', 'register_taxonomy_datos' );

function register_taxonomy_datos() {

    $labels = array( 
        'name' => _x( 'Datos', 'datos' ),
        'singular_name' => _x( 'Dato', 'datos' ),
        'search_items' => _x( 'Buscar datos', 'datos' ),
        'popular_items' => _x( 'Datos populares', 'datos' ),
        'all_items' => _x( 'Todas los datos', 'datos' ),
        'parent_item' => _x( 'Parent Datos', 'datos' ),
        'parent_item_colon' => _x( 'Parent datos:', 'datos' ),
        'edit_item' => _x( 'Editar datos', 'datos' ),
        'update_item' => _x( 'Actualizar datos', 'datos' ),
        'add_new_item' => _x( 'Añadir datos', 'datos' ),
        'new_item_name' => _x( 'Nueva datos', 'datos' ),
        'separate_items_with_commas' => _x( 'Separar datos con comas', 'datos' ),
        'add_or_remove_items' => _x( 'Agragar o quitar datos', 'datos' ),
        'choose_from_most_used' => _x( 'Selecciona de los datos más usados', 'datos' ),
        'menu_name' => _x( 'Datos', 'datos' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'datos', array('post'), $args );
}
    
?>