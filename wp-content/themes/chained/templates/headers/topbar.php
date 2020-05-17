<?php
/**
 * Top Bar
 *
 * @package Chained
 * @since Chained 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="topbar">
	<div class="wrapper">

		<div class="topbar-left">
			<?php
			//the topbar left menu
			wp_nav_menu( array(
				'theme_location' => 'topbar-left',
				'container'      => '',
				'depth'			 => 1,
				'menu_class'     => 'nav nav--topbar-left',
				'fallback_cb' 	 => false,
			) ); 
			?>
		</div>

		<div class="topbar-right">
			<?php
				wp_nav_menu( array(
				'theme_location' => 'topbar-right',
				'container'      => '',
				'depth'			 => 1,
				'menu_class'     => 'nav nav--topbar-right',
				'fallback_cb' 	 => false,
			) ); 

			?>
			<?php if ( true == get_theme_mod('chained_top_bar_show_date', false) ) : ?>
				<div class="topbar-date">
					<span class="date">
						<?php echo get_the_date(); ?>
					</span>
				</div>
			<?php endif; ?>
		</div>	
	</div>
</div>