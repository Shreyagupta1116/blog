<?php
/**
 * Sidebar template Chained WordPress theme
 *
 *
 * @package Chained
 * @subpackage Chained
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} 
?>

<aside class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- .widget-area -->
