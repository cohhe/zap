<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */

get_header();
global $zap_site_width;
?>
<div id="main-content" class="main-content row">
	<header class="entry-header">
		<h1 class="entry-title"><?php printf( __( 'Category Archives: <span>%s</span>', 'zap-lite' ), single_cat_title( '', false ) ); ?></h1>
		<?php echo zap_breadcrumbs(); ?>
	</header><!-- .archive-header -->
	<section id="primary" class="content-area <?php echo esc_attr($zap_site_width); ?>">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>
			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					endwhile;
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->
	<?php
	// Previous/next page navigation.
	zap_paging_nav();
	?>
</div>
<?php
get_footer();
