<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GutenBook
 */

get_header();
?>

<?php if ( is_home() ) : ?>
	<?php if ( has_header_image() ) : ?>
	<div class="container-fluid" role="banner" style="background-image: url(<?php header_image(); ?>);background-size: cover; background-position:center;">
		<div class="row justify-content-center hero-row has-header-image">
	<?php else : ?>
	<div class="container-fluid" role="banner">
		<div class="row justify-content-center hero-row">
	<?php endif; ?>
			<div class="col-md-7 text-center">
				<h1 class="hero-title">
					<?php echo esc_html( get_theme_mod( 'gutenbook_hero_title', __( 'WordPress blog theme made for Gutenberg.', 'gutenbook' ) ) ); ?>
				</h1>
				<p class="hero-desc">
					<?php echo esc_html( get_theme_mod( 'gutenbook_hero_desc', __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.', 'gutenbook' ) ) ); ?>
				</p>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="container">
	<div class="row justify-content-center">
		<div id="primary" class="content-area col-md-8">
			<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>

<?php
get_footer();
