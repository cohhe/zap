<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */



/* Footer */
$page_load_time = timer_stop();
$ps_page_load_times = get_option('ps_page_load_times', array());
$todays_date = date('d-m-Y');
if ( !isset( $ps_page_load_times[$todays_date] ) ) {
	$ps_page_load_times[$todays_date] = array( $page_load_time );
} else {
	$ps_page_load_times[$todays_date][] = $page_load_time;
}
update_option('ps_page_load_times', $ps_page_load_times);
?>

		</div><!-- #main -->

		<div class="site-footer-wrapper">
			<div class="site-info col-sm-12 col-md-12 col-lg-12">
				<div class="site-info-content">
					<?php $footer_logo = get_theme_mod('zap_footerlogo', array());
						if ( !empty($footer_logo) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" rel="home"><img src="<?php echo esc_url($footer_logo); ?>" alt="<?php _e('Footer logo', 'zap-lite'); ?>"></a>
						<?php } ?>
					<div class="footer-menu-wrapper">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer',
									'menu_class'     => 'footer-menu',
									'depth'          => 1
								)
							);
						?>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php
				$show_scroll_to_top = get_theme_mod('zap_scrolltotop', false);

				if ( $show_scroll_to_top ) {
				?>
					<a class="scroll-to-top" href="#"><?php _e( 'Up', 'zap-lite' ); ?></a>
				<?php
				}
				?>
				<div class="clearfix"></div>
			</div><!-- .site-info -->
			<div class="clearfix"></div>
			<div class="site-footer-container">
				<footer id="colophon" class="site-footer" role="contentinfo">
					<?php get_sidebar( 'footer' ); ?>
				</footer><!-- #colophon -->
			</div>
			<div class="clearfix"></div>
			<div class="copyright">
				&copy; <?php echo date('Y') ?> <a href="https://cohhe.com" target="_blank">Cohhe Themes</a>. All rights reserved.
			</div>
			<div class="clearfix"></div>
		</div>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>