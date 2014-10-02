<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SMG
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="container hfeed site">
		<!-- Push Wrapper -->
		<div class="mp-pusher" id="mp-pusher">

			<!-- mp-menu -->
			<nav id="mp-menu" class="mp-menu">
				<?php    /**
					* Displays a navigation menu
					* @param array $args Arguments
					*/
					$args = array(
						'theme_location' => 'primary',
						'menu' => '',
						'container' => 'div',
						'container_class' => 'mp-level',
						'container_id' => '',
						'menu_class' => '',
						'menu_id' => '',
						'echo' => true,
						'fallback_cb' => 'wp_page_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'items_wrap' => '<h2 class="icon icon-world">All Categories</h2><ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth' => 0,
						'walker' => new hwangc_nav_walker
					);
				
					wp_nav_menu( $args ); ?>
					
			</nav>
			
			<div class="scroller"><!-- this is for emulating position fixed of the nav -->
				<div class="scroller-inner">
					
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'hwangc' ); ?></a>

					<header id="masthead" class="header--fixed site-header" role="banner">
						<div class="site-branding">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="feature__title"><?php bloginfo( 'description' ); ?></h2>
							<p class="feature__subtitle">
								<abbr class="loaded timeago">when you opened the page</abbr>
							</p>
							<p><a href="#" id="trigger" class="menu-trigger">Open/Close Menu</a></p>
						</div>
					</header><!-- #masthead -->
					
					<div class="clear"></div>

					<div id="content" class="site-content">
