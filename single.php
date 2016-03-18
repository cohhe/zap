<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */

get_header();

global $zap_site_width, $zap_layout_type;
?>

<div id="main-content" class="main-content row">
	<?php
			echo '<header class="entry-header">';
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo zap_breadcrumbs();
			echo '</header><!-- .entry-header -->';
	?>
	<?php if ( $zap_layout_type == 'left' ) {
		get_sidebar( 'post' );
	} ?>
	<div id="primary" class="content-area <?php echo esc_attr($zap_site_width); ?>">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */

					get_template_part( 'content', get_post_format() ? get_post_format() : get_post_type() );

					?><div class="clearfix"></div><?php

					if ( get_the_author_meta( 'description' ) ) :
						get_template_part( 'author-bio' );
					endif;

					// More posts like this
					echo zap_the_related_posts();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php if ( $zap_layout_type == 'right' ) {
		get_sidebar( 'post' );
	} ?>
</div><!-- #main-content -->

<?php
get_footer();