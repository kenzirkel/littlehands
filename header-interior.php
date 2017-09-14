<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php if( ! function_exists( '_wp_render_title_tag' ) ) : ?>
<title><?php wp_title( '&#124;', true, 'right' ); ?></title>
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
	<div id="wrapper">
		<header id="header">
			<div id="masthead">
				<h1 class="site-title"><a class="home" href="<?php echo home_url( '/' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<<?php pinboard_title_tag( 'desc' ); ?> id="site-description"><h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div><!-- masthead -->
			</div>  <!-- end wrapper div -->
		<?php get_sidebar( 'header' ); ?>
			
			<nav id="access"><!-- main nav -->
				<a class="nav-show" href="#access">Show Navigation</a>
				<a class="nav-hide" href="#nogo">Hide Navigation</a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary_nav' ) ); ?>
				<div class="clear"></div>
			</nav><!-- #access -->
			
<!--	header code would go here -->

            

<!-- start secondary nav -->			
<?php
function get_menu_by_location( $location ) {
    if( empty($location) ) return false;
    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;
    $menu_obj = get_term( $locations[$location], 'nav_menu' );
    return $menu_obj;
}
?>
<?php $location = 'secondary_nav';
if (has_nav_menu($location)) :
    $menu_obj = get_menu_by_location($location); 
    wp_nav_menu( array( 
        'theme_location'  => $location,
        'items_wrap'=> '<nav id="secondary">
<span class="menu-name">'.esc_html($menu_obj->name).'</span><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
    )); 
endif;
?><!-- end secondary nav -->						
			<div class="clear"></div>

		
				
								</header><!-- #header -->