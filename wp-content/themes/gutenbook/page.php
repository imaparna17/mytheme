<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GutenBook
 */

get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
	?>

	<div class="container-fluid">
		<div class="row justify-content-center page-header-row">
			<div class="col-md-7">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row justify-content-center post-thumb-row">
			<div class="col-md-7">
				<?php gutenbook_post_thumbnail(); ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main">

				<?php
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>

	<?php
endwhile;
get_footer();
