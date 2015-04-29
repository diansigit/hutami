<?php
/**
 * Template Name: Home Page
 *
 * @package Hutami Theme
 * @subpackage Hutami
 * @since Hutami 1.0
 */

?>

<?php get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
			<section class="hot-news-section">
				<?php theme_hot_news() ?>
			</section>
			<section class="home-banner">
				<?php theme_banner(); ?>
			</section>
			<section class="home-content">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="latest-news panel">
							<h2 class="panel-title">
								<?php echo theme_options('home', 'latest_title'); ?> Latest Article
							</h2>
							<div id="latest-content" class="panel-content">
								<?php 
									$args = array(
										'post_type'		=> 'post',
										'post_status' 	=> 'publish',
									);

									query_posts($args);
									if (have_posts()) : 
										while (have_posts()) : the_post();
										get_template_part( 'content', 'infinite' );
										endwhile;
									endif;
									wp_reset_query();
								?>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<?php if ( is_active_sidebar( 'home-1st' ) ) : ?>
									<div id="widget-area-1st" class="widget-area" role="complementary">
										<?php dynamic_sidebar( 'home-1st' ); ?>
									</div><!-- .widget-area -->
								<?php endif; ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?php if ( is_active_sidebar( 'home-2nd' ) ) : ?>
									<div id="widget-area-2nd" class="widget-area" role="complementary">
										<?php dynamic_sidebar( 'home-2nd' ); ?>
									</div><!-- .widget-area -->
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>