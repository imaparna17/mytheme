<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GutenBook
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<?php
		if ( gutenbook_fs()->is__premium_only() ) {
			if ( gutenbook_fs()->can_use_premium_code() ) {
				?>
				<div class="gb-footer-widgets container">
					<div class="row">
						<div class="col-md-4 widget-area">
						<?php
						if ( is_active_sidebar( 'footer-1' ) ) {
							dynamic_sidebar( 'footer-1' );
						}
						?>
						</div>
						<div class="col-md-4 widget-area">
						<?php
						if ( is_active_sidebar( 'footer-2' ) ) {
							dynamic_sidebar( 'footer-2' );
						}
						?>
						</div>
						<div class="col-md-4 widget-area">
						<?php
						if ( is_active_sidebar( 'footer-3' ) ) {
							dynamic_sidebar( 'footer-3' );
						}
						?>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>

		<div class="site-info">
			<?php echo wp_kses_post( get_theme_mod( 'gutenbook_footer_text', __( 'All Rights Reserved.', 'gutenbook' ) ) ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
