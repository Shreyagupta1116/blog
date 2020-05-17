<?php
/**
 * Sidebar template Chained WordPress theme
 *
 *
 * @package Chained
 * @since Chained 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
} 
?>

<aside class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- .widget-area -->
