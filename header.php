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
				<?php if ( ( '' != get_header_image() ) &&  ( false != get_header_image() ) ) : ?>
					<div class="site-header-banner">
					<a href="<?php echo home_url( '/' ); ?>" rel="home">
						<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" ?>
					</a>
					</div>
				<?php endif; ?>
				
		<?php get_sidebar( 'header' ); ?>
			<div class="clear"></div>
			<nav id="access">
				<a class="nav-show" href="#access">Show Navigation</a>
				<a class="nav-hide" href="#nogo">Hide Navigation</a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary_nav' ) ); ?>
				<div class="clear"></div>
			</nav><!-- #access -->
		</header><!-- #header -->