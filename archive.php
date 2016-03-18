<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Zap 1.0
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
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
	<section id="primary" class="content-area <?php echo esc_attr($zap_site_width); ?>">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: <span>%s</span>', 'zap' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: <span>%s</span>', 'zap' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'zap' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: <span>%s</span>', 'zap' ), get_the_date( _x( 'Y', 'yearly archives date format', 'zap' ) ) );

						else :
							_e( 'Archives', 'zap' );

						endif;
					?>
				</h1>
			</header><!-- .page-header -->

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
					// Previous/next page navigation.
					zap_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();