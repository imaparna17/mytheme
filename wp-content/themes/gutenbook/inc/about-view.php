<?php
/**
 * View for about page.
 *
 * @package GutenBook
 */

?>

<div class="wrap">
	<h1><?php esc_html_e( 'GutenBook - A Perfect Blog Theme', 'gutenbook' ); ?></h1>

	<div class="welcome-panel">
		<div class="welcome-panel-content">
			<h2 class="gb-panel-title"><?php esc_html_e( 'Thank you for using our theme!', 'gutenbook' ); ?>  </h2>

			<p class="about-description">
				<?php echo wp_kses( 'GutenBook is an uncomplicated blog theme that works perfectly with Gutenberg as well as the WordPress classic editor. GutenBook is a fast, secure & straightforward theme that works smoothly & perfectly. It is a search engine friendly theme.', 'gutenbook' ); ?>
			</p>

			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<h3><?php esc_html_e( 'Getting Started', 'gutenbook' ); ?></h3>
					<ul>
						<li>
							<span class="dashicons dashicons-admin-multisite gb-admin-icon"></span>
							<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php?autofocus[section]=gutenbook_theme_options"><?php esc_html_e( 'Edit Hero Section Content', 'gutenbook' ); ?></a>
						</li>
						<li>
							<span class="dashicons dashicons-admin-appearance gb-admin-icon"></span>
							<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php?autofocus[section]=gutenbook_theme_options"><?php esc_html_e( 'Change Color Theme', 'gutenbook' ); ?></a>
						</li>
						<?php if ( ! gutenbook_fs()->can_use_premium_code() ) { ?>
						<li>
							<span class="dashicons dashicons-star-filled gb-admin-icon"></span>
							<a href="https://wordpress.org/support/theme/gutenbook/reviews/#new-post" target="_blank"><?php esc_html_e( 'Rate us 5-Star', 'gutenbook' ); ?></a>
						</li>
						<?php } else { ?>
						<li>
							<span class="dashicons dashicons-welcome-widgets-menus gb-admin-icon"></span>
							<a href="<?php echo esc_url( self_admin_url() ); ?>widgets.php"><?php esc_html_e( 'Add Footer Widgets', 'gutenbook' ); ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>

				<div class="welcome-panel-column">

					<h3><?php esc_html_e( 'Support', 'gutenbook' ); ?></h3>
					<ul style="margin-bottom: 15px;">
						<li>
							<span class="dashicons dashicons-admin-comments gb-admin-icon"></span>
							<a href="<?php echo esc_url( self_admin_url() ); ?>themes.php?page=about-gutenbook-contact"><?php esc_html_e( 'Contact Us', 'gutenbook' ); ?></a>
						</li>
						<li>
							<span class="dashicons dashicons-feedback gb-admin-icon"></span>
							<a href="https://wordpress.org/support/theme/gutenbook/" target="_blank"><?php esc_html_e( 'Support Forum', 'gutenbook' ); ?></a>
						</li>
						<li>
							<span class="dashicons dashicons-admin-users gb-admin-icon"></span>
							<a href="<?php echo esc_url( self_admin_url() ); ?>themes.php?page=about-gutenbook-account"><?php esc_html_e( 'My Account', 'gutenbook' ); ?></a>
						</li>
					</ul>
				</div>

				<?php
				// This IF will be executed only if the user in a trial mode or have a valid license.
				if ( ! gutenbook_fs()->can_use_premium_code() ) {
					?>
					<div class="welcome-panel-column">
						<h3><?php esc_html_e( 'Upgrade', 'gutenbook' ); ?></h3>
						<p>
							<?php esc_html_e( 'You can convert your blog into the professional blog with pur premium version. You get more customization settings and a priority support with the upgraded plan.', 'gutenbook' ); ?>
						</p>
						<a href="<?php echo esc_url( self_admin_url() ); ?>themes.php?page=about-gutenbook-pricing" class="button button-primary "><?php esc_html_e( 'Upgrade Now', 'gutenbook' ); ?></a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
