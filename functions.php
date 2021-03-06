<?php
/**
 * SMG functions and definitions
 *
 * @package SMG
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'smg_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function smg_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SMG, use a find and replace
	 * to change 'smg' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'smg', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'smg' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'smg_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // smg_setup
add_action( 'after_setup_theme', 'smg_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function smg_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'smg' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'smg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function smg_scripts() {
	wp_enqueue_style( 'smg-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'smg-vendor', get_template_directory_uri() . '/css/vendor.css', array('smg-style'), null );
	
	wp_enqueue_style( 'smg-main', get_template_directory_uri() . '/css/main.css', array('smg-style'), null );

	wp_enqueue_style( 'smg-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array('smg-style'), null );

	// wp_enqueue_script( 'smg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'smg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'smg-appear', get_template_directory_uri() . '/vendor/card/js/jquery.appear.js', array('jquery'), null, true );

	wp_enqueue_script( 'smg-fluid', get_template_directory_uri() . '/vendor/fluid/js/jquery.fluidbox.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'smg-mmenu', get_template_directory_uri() . '/vendor/mmenu/js/jquery.mmenu.min.all.js', array('jquery'), null, true );

	wp_enqueue_script( 'smg-flowtype', get_template_directory_uri() . '/vendor/flowtype/js/flowtype.js', array('jquery'), null, true );
	
	// wp_enqueue_script( 'smg-modernizr', get_template_directory_uri() . '/vendor/modallogin/js/modernizr.custom.js', array(), null, true );

	// wp_enqueue_script( 'smg-modallogin', get_template_directory_uri() . '/vendor/modallogin/js/modallogin.js', array('smg-modernizr'), null, true );

	wp_enqueue_script( 'smg-classie', get_template_directory_uri() . '/vendor/articleeffect/js/classie.js', array(), null, true );

	wp_enqueue_script( 'smg-plugin', get_template_directory_uri() . '/js/plugin.js', array('jquery','smg-appear','smg-classie'), null, true );
	
	if ( is_single() && has_post_thumbnail( )) {
		wp_enqueue_script( 'smg-articleeffect', get_template_directory_uri() . '/vendor/articleeffect/js/articleeffect.js', array('smg-classie'), null, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'smg_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * SMG custom functions
 */
require get_template_directory() . '/vendor/vendor.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';