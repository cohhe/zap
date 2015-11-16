<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */

global $zap_article_width;
if ( !is_single() ) {
	$post_class = 'not-single-post';
	$header_class = 'simple';
} else {
	$post_class = 'single-post';
	$header_class = '';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($zap_article_width.$post_class); ?>>
	<header class="entry-header <?php echo $header_class; ?>">
		<?php

			if ( !is_single() && ( is_home() || is_archive() || is_search() ) ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'zap-medium-thumbnail' );
				echo '<div class="single-image-container">';
				if ( !empty($img) ) {
					echo '<img src="'.$img['0'].'" class="single-post-image" alt="Post with image">';
				} else {
					echo '<span class="post-no-image"></span>';
				}
				echo '<div class="single-post-share">
					<a href="http://www.facebook.com/sharer.php?u=' . urlencode( get_the_permalink() ) . '" class="single-share-facebook icon-facebook"></a>
					<a href="http://twitter.com/share?url=' . urlencode( get_the_permalink() ) . '&amp;text=' . urlencode( get_the_title() ) . '" class="single-share-twitter icon-twitter"></a>
					<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=' . urlencode( get_the_permalink() ) . '&title=' . urlencode( get_the_title() ) . '" class="single-share-linkedin icon-linkedin"></a>
					<a href="http://tumblr.com/widgets/share/tool?canonicalUrl=' . urlencode( get_the_permalink() ) . '" class="single-share-tumblr icon-tumblr"></a>
				</div>';
				echo '<span class="single-post-date icon-clock">'.human_time_diff(get_the_time('U',get_the_ID()),current_time('timestamp')) .  ' '.__('ago', 'zap').'</span>';
				echo '</div>';
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				echo '</header><!-- .entry-header -->';
			} elseif ( is_single() && !is_home() ) {
				echo '</header><!-- .entry-header -->';
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'zap-full-width' );
				echo '<div class="single-post-image-container">';
				if ( !empty($img) ) {
					echo '<img src="'.$img['0'].'" class="single-post-image" alt="Post with image">';
				}
				echo '<div class="single-post-meta">';
					zap_posted_on();
					echo '<span class="single-post-date icon-clock">'.get_the_time('F d, Y',get_the_ID()).'</span>';
					zap_comment_count(get_the_ID());
					zap_category_list();
					if( function_exists('the_views') ) {
						echo '<span class="single-post-views icon-eye">'.do_shortcode('[views]').'</span>';
					}
					echo zap_like_button();
				echo '</div>';
				echo '</div>';
			}
		?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_home() || is_archive() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<div class="entry-meta">
		<?php
		zap_category_list();
		zap_posted_on();
		zap_comment_count(get_the_ID());
		?>
	</div><!-- .entry-meta -->
	<a href="<?php the_permalink(); ?>" class="single-post-readmore"><?php _e('Read more..', 'zap'); ?></a>
	<?php else : ?>
	<div class="entry-content">
		<div id="entry-content-wrapper">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'zap' ) ); ?>
			<div class="single-post-bottom-meta">
			<?php
				zap_tag_list();
				zap_share_icons();
			?>
				<div class="clearfix"></div>
			</div>
			<div class="single-post-prev-next">
				<?php zap_prev_next_links(); ?>
			</div>
		</div>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'zap' ) . '</span>',
				'after'       => '<div class="clearfix"></div></div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			// edit_post_link( __( 'Edit', 'zap' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
