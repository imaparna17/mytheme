<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package mytheme
 */

?>

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package mytheme
 */
function themeslug_enqueue_style() {
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'blog-home', get_template_directory_uri() . '/css/blog-home.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'blog-home' );
}
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package mytheme
 */
function themeslug_enqueue_script() {
	wp_register_script( 'bootstrap', get_template_directory_uri() . 'vendor/bootstrap/js/bootstrap.bundle.min.js', '', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap' );
}
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package mytheme
 */

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package mytheme
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'header' => 'Header Menu',
			'footer' => 'Extra Menu',
		)
	);
}
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package mytheme
 */
function authors() {
	if ( is_author() || wp_doing_ajax() ) {
		return;
	}
	if ( ! is_user_logged_in() ) {
		wp_safe_redirect( esc_url( wp_login_url() ), 307 );
	}
}
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package mytheme
 */
function subscribers() {
	global $post;
	$page_id = 387;
	if ( is_page() && ( $post->post_parent === $page_id || is_page( $page_id ) ) ) {
		$redirect = true;
	}
	if ( is_user_logged_in() ) {
		$redirect = false;
	}
	if ( $redirect ) {
		wp_safe_redirect( esc_url( wp_login_url() ), 307 );
	}
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );
add_action( 'init', 'register_my_menus' );

// post thumbnail.
add_theme_support( 'html5', array( 'gallery' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );
add_action( 'template_redirect', 'authors' );
add_action( 'template_redirect', 'subscribers' );












