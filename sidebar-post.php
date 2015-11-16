<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */

if ( ( LONGFORM_LAYOUT == 'sidebar-right' || LONGFORM_LAYOUT == 'sidebar-left' ) && is_active_sidebar( 'sidebar-1' ) ) {
?>
<div id="content-sidebar" class="content-sidebar widget-area col-sm-3 col-md-3 col-lg-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #content-sidebar -->
<?php
}