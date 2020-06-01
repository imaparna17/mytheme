<?php
/**
 * GutenBook Theme Customizer
 *
 * @package GutenBook
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gutenbook_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'gutenbook_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'gutenbook_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section(
		'gutenbook_theme_options',
		array(
			'title'    => __( 'GutenBook - Theme Options', 'gutenbook' ),
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'gutenbook_style_option',
		array(
			'default'           => 'theme1',
			'sanitize_callback' => 'gutenbook_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'gutenbook_style_option',
		array(
			'label'    => __( 'Select Style', 'gutenbook' ),
			'type'     => 'select',
			'section'  => 'gutenbook_theme_options',
			'setting'  => 'gutenbook_style_option',
			'priority' => 1,
			'choices'  => array(
				'theme1' => __( 'Theme 1 (Dark Theme)', 'gutenbook' ),
				'theme2' => __( 'Theme 2 (Light Theme)', 'gutenbook' ),
			),
		)
	);

	$wp_customize->add_setting(
		'gutenbook_hero_title',
		array(
			'default'           => __( 'WordPress blog theme made for Gutenberg.', 'gutenbook' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'gutenbook_hero_title',
		array(
			'label'    => __( 'Hero Section Title', 'gutenbook' ),
			'type'     => 'text',
			'section'  => 'gutenbook_theme_options',
			'setting'  => 'gutenbook_hero_title',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting(
		'gutenbook_hero_desc',
		array(
			'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.', 'gutenbook' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);

	$wp_customize->add_control(
		'gutenbook_hero_desc',
		array(
			'label'    => __( 'Hero Section Sub-title', 'gutenbook' ),
			'type'     => 'textarea',
			'section'  => 'gutenbook_theme_options',
			'setting'  => 'gutenbook_hero_desc',
			'priority' => 3,
		)
	);

}
add_action( 'customize_register', 'gutenbook_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function gutenbook_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function gutenbook_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gutenbook_customize_preview_js() {
	wp_enqueue_script( 'gutenbook-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gutenbook_customize_preview_js' );

/**
 * Sanitize select field.
 *
 * @param  mixed $input input.
 * @param  mixed $setting settings.
 */
function gutenbook_sanitize_select( $input, $setting ) {

	// Input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	$input = sanitize_key( $input );

	// Get the list of possible select options.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// Return input if valid or return default option.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}


/**
 * For premium version
 */
// This IF block will be auto removed from the Free version.
if ( gutenbook_fs()->is__premium_only() ) {
	// This IF will be executed only if the user in a trial mode or have a valid license.
	if ( gutenbook_fs()->can_use_premium_code() ) {
		/**
		 * Gutenbook_customize_register.
		 *
		 * @param mixed $wp_customize wp_customize.
		 * @return void
		 */
		function gutenbook_customize_register_pro( $wp_customize ) {
			$wp_customize->add_control(
				'gutenbook_style_option',
				array(
					'label'    => __( 'Select Style', 'gutenbook' ),
					'type'     => 'select',
					'section'  => 'gutenbook_theme_options',
					'setting'  => 'gutenbook_style_option',
					'priority' => 1,
					'choices'  => array(
						'theme1' => __( 'Theme 1 (Dark Theme)', 'gutenbook' ),
						'theme2' => __( 'Theme 2 (Light Theme)', 'gutenbook' ),
						'theme3' => __( 'Theme 3', 'gutenbook' ),
						'theme4' => __( 'Theme 4', 'gutenbook' ),
					),
				)
			);

			$wp_customize->add_setting(
				'gutenbook_footer_text',
				array(
					'default'           => __( 'All Rights Reserved.', 'gutenbook' ),
					'sanitize_callback' => 'wp_kses_post',
				)
			);

			$wp_customize->add_control(
				'gutenbook_footer_text',
				array(
					'label'    => __( 'Footer Branding Text', 'gutenbook' ),
					'type'     => 'textarea',
					'section'  => 'gutenbook_theme_options',
					'setting'  => 'gutenbook_footer_text',
					'priority' => 4,
				)
			);
		}

		add_action( 'customize_register', 'gutenbook_customize_register_pro' );
	}
}
