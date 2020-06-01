<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<div class="entry-meta-cats">
						<?php the_category( ' ' ); ?>
					</div>
					<?php
					the_title( '<h1 class="entry-title">', '</h1>' );

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
								gutenbook_posted_on();
								gutenbook_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
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
			<div id="primary" class="content-area col-md-9">
				<main id="main" class="site-main">

				<?php
				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation(
					array(
						'prev_text' => __( '&larr;<span>Previous Article</span>', 'gutenbook' ),
						'next_text' => __( '<span>Next Article</span>&rarr;', 'gutenbook' ),
					)
				);

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
