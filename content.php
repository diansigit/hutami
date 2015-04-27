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
setPostViews(get_the_ID());

$args = array(
	'post_type' 		=> 'post',
	'posts_per_page' 	=> '-1'
);
$pagelist = get_posts( $args );

$pages = array();
foreach ($pagelist as $page) {
   $pages[] += $page->ID;
}

//print_r($pages);

$current = array_search(get_the_ID(), $pages);
$prevID = $pages[$current-1];
$nextID = $pages[$current+1];

if (empty($prevID)){
	//$prevID = $pages[count($pages)-1];
}

if (empty($nextID)){
	//$nextID = $pages[0];
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
	<?php
		// Post thumbnail.
		$feature_image = theme_get_image(get_post_thumbnail_id(), '858', '595', true);
		$feature_image = !empty($feature_image) ? $feature_image : theme_thumb_fb('858', '595');
		$author_image = get_avatar( get_the_author_meta( 'ID' ), 100 );
	?>
	
	<header class="entry-header">
		<figure class="figure-header">
			<div class="meta-image">
				<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
			</div>
			<!--<div class="meta-author">
				<?php echo $author_image; ?>
				<div class="meta-author-wrapped">
					<?php _e('Oleh','theme_front'); ?>
					<span class="vcard author"><span class="fn">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">
							<?php the_author_link(); ?>
						</a>
					</span></span>
				</div>
			</div>-->
			<figcaption>
				<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
				<div class="entry-meta">
					<div class="meta-item author">
						<?php _e('Posted By ','theme_front'); ?>
						<span class="vcard author"><span class="fn">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php echo get_the_author(); ?>
							</a>
						</span></span>
					</div>
					<div class="meta-item date">
						<span class="updated"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
					</div>
					<div class="meta-item comments">
						<?php comments_popup_link(__('Add Comment', 'hutamithemes'), __('1 Comment', 'hutamithemes'), __('% Comments', 'hutamithemes')); ?>
					</div>
					<div class="meta-item cat">
						<?php _e('In ', 'theme_front'); the_category(', '); ?>
					</div>
					<div class="meta-item views">
						<?php echo getPostViews(get_the_ID()); ?>
					</div>
				</div>
			</figcaption>
		</figure>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="meta-tags">
			<?php the_tags('','',''); ?>
		</div>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
<!-- Previous/next post navigation. -->
<nav class="navigation post-navigation">
	<div class="navigation-wrapper row">
		<div class="col-xs-12 col-sm-6 navigation-prev">
		<?php if (!empty($prevID)) { ?>
			<?php 
				$feature_image = theme_get_image(get_post_thumbnail_id($prevID), '500', '250', true);
					$feature_image = !empty($feature_image) ? $feature_image : theme_thumb_fb('500', '250');
			?>
			<a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">
				<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
				<div class="navigation-arrow"><i class="fa fa-angle-left"></i></div>
			</a>
			<h4 class="navigation-title"><a href="<?php echo get_permalink($prevID); ?>"><?php echo get_the_title($prevID); ?></a></h4>
		<?php } ?>
		</div>
		<div class="col-xs-12 col-sm-6 navigation-next">
		<?php if (!empty($nextID)) { ?>
			<?php 
				$feature_image = theme_get_image(get_post_thumbnail_id($nextID), '500', '250', true);
				$feature_image = !empty($feature_image) ? $feature_image : theme_thumb_fb('500', '250');
			?>
			<a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>">
				<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
				<div class="navigation-arrow"><i class="fa fa-angle-right"></i></div>
			</a>
			<h4 class="navigation-title"><a href="<?php echo get_permalink($prevID); ?>"><?php echo get_the_title($nextID); ?></a></h4>
		<?php } ?>
		</div>
	</div>
</nav><!-- .navigation -->	

<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'author-bio' );
	endif;
?>
