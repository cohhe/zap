<?php
/**
 * The Footer Sidebar
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */

if ( ! is_active_sidebar( 'zap-sidebar-3' ) ) {
	return;
}
?>

<div id="supplementary">
	<div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
		<div class="footer-column-1 col-sm-4 col-md-4 col-lg-4"><?php dynamic_sidebar( 'zap-sidebar-3' ); ?></div>
		<div class="footer-column-2 col-sm-4 col-md-4 col-lg-4"><?php dynamic_sidebar( 'zap-sidebar-4' ); ?></div>
		<div class="footer-column-3 col-sm-4 col-md-4 col-lg-4"><?php dynamic_sidebar( 'zap-sidebar-5' ); ?></div>
	</div><!-- #footer-sidebar -->
</div><!-- #supplementary -->
