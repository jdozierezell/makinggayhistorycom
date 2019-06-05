<?php

add_action( 'after_setup_theme', 'making_gay_history_images' );

function making_gay_history_images() {
    add_image_size( 'sixteen-by-nine', 768, 432, true );
    add_image_size( 'seven-by-five', 768, 548, true );
    add_image_size( 'square', 768, 768, true );
}

add_filter( 'image_size_names_choose', 'making_gay_history_image_size_choose' );
 
function making_gay_history_image_size_choose( $sizes ) {
    return array_merge( $sizes, array(
        'sixteen-by-nine' => __( '16x9' ),
        'seven-by-five' => __( '7x5' ),
        'square' => __( 'Square' )
    ) );
}



?>