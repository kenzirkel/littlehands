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


// for this to work you have to add ID's to the parent theme, unfortunately
function remove_some_widgets(){

	// Unregister some of the Pinboard sidebars
	unregister_sidebar( 'sidebar-bottom' );
	unregister_sidebar( 'sidebar-left' );
	unregister_sidebar( 'header-1' );
	unregister_sidebar( 'boxes' );

}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

//Removing some font choices

if ( ! function_exists( 'pinboard_available_fonts' ) ) :

function pinboard_available_fonts() {
	return array(
		'open-sans' => '"Open Sans", sans-serif',
	);
}
endif;

