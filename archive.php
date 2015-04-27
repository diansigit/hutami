<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.Hutami Theme.org/Template_Hierarchy
 *
 * @package Hutami Theme
 * @subpackage Hutami
 * @since Hutami 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<div class="col-xs-12 col-md-9">
					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title panel-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						<div class="panel-content">
						<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content-loop', get_post_format() );

						// End the loop.
						endwhile;
						?>
						</div><!-- .panel-content -->
						<?php

						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
							'next_text'          => __( 'Next page', 'twentyfifteen' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
						) );

					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'content', 'none' );

					endif;
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
	</section><!-- .content-area -->

<?php get_footer(); ?>
