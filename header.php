<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package smg
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
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'smg' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
			<div class="header-menu-area">
			<?php if(!is_user_logged_in()): ?>
				<a href="#site-navigation" class="header-navigation logout-navigation"><i class="fa fa-align-justify header-menu"></i><a href="http://jesuswalkswith.me/wp-login.php?loginFacebook=1&redirect=http://jesuswalkswith.me/" onclick="window.location = 'http://jesuswalkswith.me/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;" class="header-profile"><i class="fa fa-user logout-user-avatar"></i><i class="fa fa-heart"></i></a>
			<?php else: ?>
				<a href="#site-navigation" class="header-navigation login-navigation"><i class="fa fa-align-justify header-menu"></i><a href="/profile" class="header-profile">
				<?php echo get_avatar( get_current_user_id( ), 32 ); ?><i class="fa fa-heart"></i></a>
			<?php endif; ?>
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">