<?php
/**
 * Aaron Forum Theme — functions.php
 *
 * Registers theme features, enqueues assets, and sets up navigation menus.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ---------------------------------------------------------------------------
// Theme setup
// ---------------------------------------------------------------------------
function aaron_forum_setup() {
	// Allow WordPress to manage the <title> tag.
	add_theme_support( 'title-tag' );

	// Enable featured images (not used on the front page, but good practice).
	add_theme_support( 'post-thumbnails' );

	// Custom logo support — sized to match the header logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 88,
		'width'       => 0,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// HTML5 markup for core elements.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Register the primary navigation menu.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'aaron-forum' ),
	) );
}
add_action( 'after_setup_theme', 'aaron_forum_setup' );

// ---------------------------------------------------------------------------
// Enqueue styles and scripts
// ---------------------------------------------------------------------------
function aaron_forum_scripts() {
	$version = wp_get_theme()->get( 'Version' );

	// Google Fonts: Inter (400, 500, 600, 700).
	wp_enqueue_style(
		'aaron-forum-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Main theme stylesheet (style.css in theme root).
	wp_enqueue_style(
		'aaron-forum-style',
		get_stylesheet_uri(),
		array( 'aaron-forum-fonts' ),
		$version
	);

	// Theme JavaScript (sticky-header scroll class).
	wp_enqueue_script(
		'aaron-forum-script',
		get_template_directory_uri() . '/js/main.js',
		array(),
		$version,
		true // load in footer
	);
}
add_action( 'wp_enqueue_scripts', 'aaron_forum_scripts' );

// ---------------------------------------------------------------------------
// Preconnect to Google Fonts origin for faster font loading
// ---------------------------------------------------------------------------
function aaron_forum_preconnect_fonts( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = array( 'href' => 'https://fonts.googleapis.com' );
		$hints[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'aaron_forum_preconnect_fonts', 10, 2 );

// ---------------------------------------------------------------------------
// Hide WordPress admin bar on the front end for all users
// ---------------------------------------------------------------------------
add_filter( 'show_admin_bar', '__return_false' );
