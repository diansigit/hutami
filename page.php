<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the Hutami Theme construct of pages and that
 * other "pages" on your Hutami Theme site will use a different template.
 *
 * @package Hutami Theme
 * @subpackage Hutami
 * @since Hutami 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<div class="col-xs-12 col-md-9">

					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					// End the loop.
					endwhile;
					?>
				</div>
				<div class="col-xs-12 col-md-3">
					<?php if ( is_active_sidebar( 'blog' ) ) : ?>
						<div id="widget-area-1st" class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'blog' ); ?>
						</div><!-- .widget-area -->
					<?php endif; ?>
				</div>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
