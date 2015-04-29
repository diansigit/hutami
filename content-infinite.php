<?php
/**
 * The template for displaying content infinite scroll
 *
 * Used for front page.
 *
 * @package Hutami Theme
 * @subpackage Hutami
 * @since Hutami 1.0
 */
?>
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<?php 
				$feature_image = theme_get_image(get_post_thumbnail_id(), '500', '345', true);;
				$feature_image = !empty($feature_image) ? $feature_image : theme_thumb_fb('500', '345');
			?>
			<a href="<?php echo get_permalink(); ?>" class="meta-image">
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
					<!--<div class="meta-item comments">
						<a href="<?php echo get_permalink(); ?>#respond"><?php _e('Add Comment','theme_front'); ?></a>
					</div>-->
					<div class="meta-item views">
						<?php echo getPostViews(get_the_ID()); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>