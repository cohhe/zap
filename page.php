<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
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
		// Page title and breadcrumbs.
		if ( !is_front_page() || is_archive() ) {
			echo '<header class="entry-header">';
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo zap_breadcrumbs();
			echo '</header><!-- .entry-header -->';
		}
	?>
	<?php if ( $zap_layout_type == 'left' ) {
		get_sidebar( 'content' );
	} ?>
	<div id="primary" class="content-area <?php echo esc_attr($zap_site_width); ?>">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php if ( $zap_layout_type == 'right' ) {
		get_sidebar( 'content' );
	} ?>
</div><!-- #main-content -->

<?php
get_footer();