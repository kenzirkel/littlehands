<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


add_post_type_support( 'page', 'excerpt' );

function pinboard_child_scripts() {
    	wp_enqueue_style( 'pinboard-child-fonts', 'https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400italic,700,700italic|Alegreya+Sans+SC:500italic,800,800italic,500' );
}

add_action( 'wp_enqueue_scripts', 'pinboard_child_scripts', 11 );


function remove_pinboard_theme_font_style() {
    wp_deregister_style( 'pinboard_register_styles' );
    wp_dequeue_style( 'pinboard_register_styles' );
}
add_action( 'wp_dequeue_scripts', 'remove_pinboard_theme_font_style', 11 );


//try this

function pinboard_deregister_styles() {
	$web_fonts = array(
		'droid-sans' => 'Droid+Sans',
		'lato' => 'Lato',
		'pt-sans' => 'PT+Sans',
		'cantarell' => 'Cantarell',
		'open-sans' => 'Open+Sans',
		'oswald' => 'Oswald',
		'yanone-kaffeesatz' => 'Yanone+Kaffeesatz',
		'quattrocento-sans' => 'Quattrocento+Sans',
		'droid-serif' => 'Droid+Serif',
		'lora' => 'Lora',
		'pt-serif' => 'PT+Serif'
	);
	if( array_key_exists( pinboard_get_option( 'body_font' ), $web_fonts ) || in_array( pinboard_get_option( 'headings_font' ), $web_fonts )|| in_array( pinboard_get_option( 'content_font' ), $web_fonts ) ) {
		$web_fonts_stylesheet = 'http' . ( is_ssl() ? 's' : '' ) . '://fonts.googleapis.com/css?family=';
		if( array_key_exists( pinboard_get_option( 'body_font' ), $web_fonts ) ) {
			$web_fonts_stylesheet .= $web_fonts[pinboard_get_option( 'body_font' )] . ':300,300italic,regular,italic,600,600italic';
		}
		if( ( pinboard_get_option( 'headings_font' ) != pinboard_get_option( 'body_font' ) ) && array_key_exists( pinboard_get_option( 'headings_font' ), $web_fonts ) ) {
			$web_fonts_stylesheet .= '|' . $web_fonts[pinboard_get_option( 'headings_font' )] . ':300,300italic,regular,italic,600,600italic';
		}
		if( ( pinboard_get_option( 'content_font' ) != pinboard_get_option( 'body_font' ) ) && ( pinboard_get_option( 'content_font' ) != pinboard_get_option( 'headings_font' ) ) && array_key_exists( pinboard_get_option( 'content_font' ), $web_fonts ) ) {
			$web_fonts_stylesheet .= '|' . $web_fonts[pinboard_get_option( 'content_font' )] . ':300,300italic,regular,italic,600,600italic';
		}
		$web_fonts_stylesheet .= '&subset=latin';
	} else
		$web_fonts_stylesheet = false;
	if( false !== $web_fonts_stylesheet ) {
		wp_register_style( 'pinboard-web-font', $web_fonts_stylesheet, false, null );
		$pinboard_deps = array( 'pinboard-web-font' );
	} else
		$pinboard_deps = false;

}


add_action( 'wp_deregister_style', 'pinboard_deregister_styles', 11 );