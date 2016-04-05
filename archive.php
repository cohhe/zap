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
	<header class="entry-header">
		<h1 class="entry-title">
			<?php
				if ( is_day() ) :
					printf( __( 'Daily Archives: <span>%s</span>', 'zap-lite' ), get_the_date() );

				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: <span>%s</span>', 'zap-lite' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'zap-lite' ) ) );

				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: <span>%s</span>', 'zap-lite' ), get_the_date( _x( 'Y', 'yearly archives date format', 'zap-lite' ) ) );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'zap-lite' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'zap-lite' );

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'zap-lite' );

				elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
					_e( 'Audio', 'zap-lite' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'zap-lite' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'zap-lite' );

				elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
					_e( 'Galleries', 'zap-lite' );

				else :
					_e( 'Archives', 'zap-lite' );

				endif;
			?>
		</h1>
		<?php echo zap_breadcrumbs(); ?>
	</header><!-- .archive-header -->
	<section id="primary" class="content-area <?php echo esc_attr($zap_site_width); ?>">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : 

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