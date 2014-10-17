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
	<div id="container" class="hfeed site container intro-effect-push">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'smg' ); ?></a>
		<?php 
			global $post;
			$author_id = $post->post_author;
			$user_id = get_current_user_id( );
		?>
		<header id="masthead" class="site-header-single" role="banner">
			<div class="header-wrapper">
				<div class="header-sub-wrapper">
					<div class="site-branding">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div>
					<div class="header-menu-area">
					<?php if(!is_user_logged_in()): ?>
						<a href="#site-navigation" class="header-navigation logout-navigation">
							<i class="fa fa-align-justify header-menu"></i>
						</a>
						<!-- <a href="http://jesuswalkswith.me/wp-login.php?loginFacebook=1&redirect=http://jesuswalkswith.me/" onclick="window.location = 'http://jesuswalkswith.me/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;" class="logout-user-avatar userpro-tip" original-title="Login with Facebook"> -->
						<a href="/profile/login" class="logout-user-avatar userpro-tip" original-title="Login">
							<i class="fa fa-user logout-avatar-icon"></i><i class="fa fa-heart avatar-heart"></i>
						</a>
					<?php else: ?>
						<a href="#site-navigation" class="header-navigation login-navigation">
							<i class="fa fa-align-justify header-menu"></i>
						</a>
						<a href="/submit-post" class="login-user-avatar userpro-tip" original-title="Submit Post">
						<?php echo get_avatar( $user_id, 32 ); ?><i class="fa fa-heart avatar-heart"></i>
						</a>
					<?php endif; ?>
					</div>
					<div class="title">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="entry-meta">
							<?php smg_posted_on($author_id); ?>
						</div><!-- .entry-meta -->
					</div>
				</div>
			</div>
			<div class="bg-img">
				<?php 
					if(has_post_thumbnail()) {
						// $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						the_post_thumbnail( 'full', array( 'class' => 'aligncenter' ) );
					}
				?>
			</div>
		</header><!-- #masthead -->
		<button class="trigger" data-info="Click to See the article"><span>Trigger</span></button>
		<div class="title after-trigger-title">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
				<?php smg_posted_on($author_id); ?>
			</div><!-- .entry-meta -->
		</div>
		<div id="content" class="site-content-single">