<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Hutami Theme
 * @subpackage Hutami
 * @since Hutami 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<a href="<?php echo get_permalink(); ?>" class="meta-image">
				<?php 
					$feature_image = theme_get_image(get_post_thumbnail_id(), '500', '250', true);
					$feature_image = !empty($feature_image) ? $feature_image : theme_thumb_fb('500', '250');
				?>
				<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
			</a>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="entry-header">
				<span class="meta-category">
					<?php the_category('<span>•</span>'); ?>
				</span>
				<h2 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-meta">
					<div class="meta-item date">
						<span class="updated"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
					</div>
					<div class="meta-item views">
						<?php echo getPostViews(get_the_ID()); ?>
					</div>
					<div class="meta-item comments">
						<?php comments_popup_link(__('Add Comment', 'hutamithemes'), __('1 Comment', 'hutamithemes'), __('% Comments', 'hutamithemes')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
