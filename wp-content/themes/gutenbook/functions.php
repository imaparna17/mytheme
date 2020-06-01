<?php
/**
 * GutenBook functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GutenBook
 */

if ( ! function_exists( 'gutenbook_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gutenbook_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GutenBook, use a find and replace
		 * to change 'gutenbook' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gutenbook', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'gutenbook' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'gutenbook_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for wide images in block editor.
		add_theme_support( 'align-wide' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'gutenbook_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gutenbook_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gutenbook_content_width', 640 );
}
add_action( 'after_setup_theme', 'gutenbook_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gutenbook_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gutenbook' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gutenbook' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gutenbook_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gutenbook_scripts() {
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.4.1', 'all' );
	wp_enqueue_style( 'gutenbook-fonts', '//fonts.googleapis.com/css?family=Poppins:700|Open+Sans:400,600&display=swap', array(), '1.0' );
	wp_enqueue_style( 'gutenbook-style', get_stylesheet_uri(), array(), '1.0.10', 'all' );

	if ( get_theme_mod( 'gutenbook_style_option' ) === 'theme2' ) {
		wp_enqueue_style( 'gutenbook-theme2', get_template_directory_uri() . '/css/theme2.css', array( 'gutenbook-style' ), '1.0.10', 'all' );
	}

	if ( gutenbook_fs()->is__premium_only() ) {
		if ( gutenbook_fs()->can_use_premium_code() ) {
			if ( get_theme_mod( 'gutenbook_style_option' ) === 'theme3' ) {
				wp_enqueue_style( 'gutenbook-theme3', get_template_directory_uri() . '/css/theme3.css', array( 'gutenbook-style' ), '1.0.10', 'all' );
			}

			if ( get_theme_mod( 'gutenbook_style_option' ) === 'theme4' ) {
				wp_enqueue_style( 'gutenbook-theme4', get_template_directory_uri() . '/css/theme4.css', array( 'gutenbook-style' ), '1.0.10', 'all' );
			}
		}
	}

	wp_enqueue_script( 'gutenbook-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'gutenbook-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gutenbook_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backword compatibility.
	 *
	 * @return void
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Create a helper function for easy SDK access.
 */
function gutenbook_fs() {
	global $gutenbook_fs;

	if ( ! isset( $gutenbook_fs ) ) {
		// Include Freemius SDK.
		require_once dirname( __FILE__ ) . '/freemius/start.php';

		$gutenbook_fs = fs_dynamic_init(
			array(
				'id'                  => '5503',
				'slug'                => 'gutenbook',
				'type'                => 'theme',
				'public_key'          => 'pk_0bcaab6af7d316384603745c1e118',
				'is_premium'          => true,
				// If your theme is a serviceware, set this option to false.
				'has_premium_version' => true,
				'has_addons'          => false,
				'has_paid_plans'      => true,
				'menu'                => array(
					'slug'   => 'about-gutenbook',
					'parent' => array(
						'slug' => 'themes.php',
					),
				),
				// Set the SDK to work in a sandbox mode (for development & testing).
				// IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
				'secret_key'          => 'sk_MyJ[sRyV&W]w91%vsWi0ebYgM~T3N',
			)
		);
	}

	return $gutenbook_fs;
}

// Init Freemius.
gutenbook_fs();
// Signal that SDK was initiated.
do_action( 'gutenbook_fs_loaded' );


// This IF block will be auto removed from the Free version.
if ( gutenbook_fs()->is__premium_only() ) {
	// This IF will be executed only if the user in a trial mode or have a valid license.
	if ( gutenbook_fs()->can_use_premium_code() ) {
		/**
		 * Register widget area.
		 */
		function gutenbook_widgets_init_pro() {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer 1', 'gutenbook' ),
					'id'            => 'footer-1',
					'description'   => esc_html__( 'Add widgets here for footer 1st column.', 'gutenbook' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);

			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer 2', 'gutenbook' ),
					'id'            => 'footer-2',
					'description'   => esc_html__( 'Add widgets here for footer 2nd column.', 'gutenbook' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);

			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer 3', 'gutenbook' ),
					'id'            => 'footer-3',
					'description'   => esc_html__( 'Add widgets here for footer 3rd column.', 'gutenbook' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);
		}
		add_action( 'widgets_init', 'gutenbook_widgets_init_pro' );
	}
}
