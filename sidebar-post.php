<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */

if ( ( ZAP_LAYOUT  == 'sidebar-right' || ZAP_LAYOUT  == 'sidebar-left' ) && is_active_sidebar( 'zap-sidebar-1' ) ) {
?>
<div id="content-sidebar" class="content-sidebar widget-area col-sm-3 col-md-3 col-lg-3" role="complementary">
	<?php dynamic_sidebar( 'zap-sidebar-1' ); ?>
</div><!-- #content-sidebar -->
<?php
}