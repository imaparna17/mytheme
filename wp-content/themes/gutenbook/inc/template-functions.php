<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package GutenBook
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gutenbook_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'gutenbook_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gutenbook_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'gutenbook_pingback_header' );

/**
 * Add admin styles.
 */
function gutenbook_admin_style() {
	wp_enqueue_style( 'gutenbook-admin', get_template_directory_uri() . '/css/gutenbook-admin.css', array(), '1.0.10', 'all' );
}
add_action( 'admin_init', 'gutenbook_admin_style' );

/**
 * Add about page.
 */
function gutenbook_add_about_page() {
	$_name = __( 'About GutenBook', 'gutenbook' );

	$theme_page = add_theme_page(
		$_name,
		$_name,
		'edit_theme_options',
		'about-gutenbook',
		'gutenbook_about_page'
	);
}
add_action( 'admin_menu', 'gutenbook_add_about_page' );

/**
 * Add about page view.
 */
function gutenbook_about_page() {
	require get_template_directory() . '/inc/about-view.php';
}
