<?php



add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


add_post_type_support( 'page', 'excerpt' );

// Register Primary Navigation Menu
register_nav_menus(
    array(
        'secondary_nav' => 'Secondary Menu', // You can add more menus here
    )
);



function remove_featured_images_from_child_theme() {

    // This will remove support for post thumbnails on ALL Post Types
    remove_theme_support( 'post-formats' );
}

add_action( 'after_setup_theme', 'remove_featured_images_from_child_theme', 11 ); 


// below not working???

function remove_some_widgets(){

	// Unregister some of the Pinboard sidebars
	unregister_sidebar( 'Sidebar Bottom' );
	unregister_sidebar( 'Sidebar Left' );
	unregister_sidebar( '5' );
	unregister_sidebar( 'header-1' );

}
add_action( 'widgets_init', 'remove_some_widgets', 11 );


