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

if ( !is_single() ) {
	$header_class = 'simple';
} else {
	$header_class = '';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div id="entry-content-wrapper">
			<div class="single-service-top">
				<?php
					$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'zap-medium-thumbnail' );
					if ( !empty($img) ) {
						echo '<img src="'.$img['0'].'" class="single-service-image" alt="'.__('Service image', 'zap-lite').'">';
					}
					echo '<h2 class="single-service-title">'.get_the_title().'</h2>';
				?>
			</div>
			<?php the_content( __( 'Continue reading', 'zap-lite' ).' '.'<span class="meta-nav">&rarr;</span>' ); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
