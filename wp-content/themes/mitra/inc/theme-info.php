<?php

//add admin page
add_action( 'admin_menu', 'mitra_admin_menu' );

function mitra_admin_menu() {
	add_theme_page( 
        __( 'About Mitra', 'mitra' ),
        __( 'About Mitra', 'mitra' ),
        'edit_theme_options',
        'about-mitra',
        'mitra_theme_info_page'   
    );

}

function mitra_theme_info_page(){

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'mitra' ) );
	}

	$theme_info = wp_get_theme(); ?>

	<div class="wrap about-wrap theme-info-wrap">
		<h1>
			<?php 
			/* translators: 1: Theme Name 2: Version of the theme */
			echo sprintf( esc_html__( 'Welcome to %1$s - %2$s', 'mitra' ), esc_html( $theme_info->get( 'Name' ) ), esc_html( $theme_info->get( 'Version' ) ) ); 
			?>
		</h1>

		<div class="about-text">
			<?php echo esc_html( $theme_info->get( 'Description' ) ); ?>
		</div>

		<p>
			<a href="https://wpconcern.com/demo/mitra/" class="button" target="_blank"><?php echo esc_html__( ' View Demo', 'mitra' ); ?></a>
			<a href="https://www.wpconcern.com/downloads/mitra/" class="button button-primary" target="_blank"><?php echo esc_html__( 'Buy Pro', 'mitra' ); ?></a>
		</p>

		<div class="feature-section has-2-columns alignleft">
			<div class="card">
				<h3><?php echo esc_html__( 'Customize Everything', 'mitra' ); ?></h3>
				<p><?php echo esc_html__( 'Start customizing every aspect of the website with customizer.', 'mitra' ); ?></p>
				<p><a target="_self" href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary"><?php echo esc_html__( 'Go to Customizer', 'mitra' ); ?></a></p>
			</div>

			<div class="card">
				<h3><?php echo esc_html__( 'Get Support', 'mitra' ); ?></h3>
				<p><?php echo esc_html__( 'Have any queries, feedback or suggestions?', 'mitra' ); ?></p>
				<p><a target="_blank" href="https://support.wpconcern.com/" class=""><?php echo esc_html__( 'Get Support', 'mitra' ); ?></a></p>
			</div>

		</div>

	</div>
	<?php
}