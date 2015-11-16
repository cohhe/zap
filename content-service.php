<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
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
	<div class="entry-content">
		<div id="entry-content-wrapper">
			<div class="single-service-top">
				<?php
					$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'zap-medium-thumbnail' );
					if ( !empty($img) ) {
						echo '<img src="'.$img['0'].'" class="single-service-image" alt="Service image">';
					}
					echo '<h2 class="single-service-title">'.get_the_title().'</h2>';
				?>
			</div>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'zap' ) ); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
