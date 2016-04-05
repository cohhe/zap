<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div id="entry-content-wrapper">
			<?php
				the_content();
			?>
		</div>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'zap-lite' ) . '</span>',
				'after'       => '<div class="clearfix"></div></div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->