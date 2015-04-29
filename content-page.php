<?php
/**
 * The template used for displaying page content
 *
 * @package Hutami Theme
 * @subpackage Hutami
 * @since Hutami 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
	<?php
		// Post thumbnail.
		$feature_image = theme_get_image(get_post_thumbnail_id(), '858', '595', true);
	?>

	<header class="entry-header">
		<figure class="figure-header">
			<?php if (!empty($feature_image)) : ?>
			<div class="meta-image">
				<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
			</div>
			<?php endif; ?>
			<figcaption>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</figcaption>
		</figure>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
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

	<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
