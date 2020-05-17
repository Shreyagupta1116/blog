<?php

/*-----------------------------------------------------------------------------------------------
    Navigation Walker for mobile menu
--------------------------------------------------------------------------------------------------- */

add_filter( 'walker_nav_menu_start_el', 'chained_add_toggle_svg', 10, 4 );
function chained_add_toggle_svg( $item_output, $item, $depth, $args ) {

    if ( 'offcanvas-menu' == $args->container )  {

    	if ( in_array( 'menu-item-has-children', $item->classes ) ) {

    		preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $item_output, $matches);

    		ob_start(); ?>

    		<div class="has-submenu">
    		    <?php echo wp_kses_post($item_output); ?>
    		    <button class="reset toggle">
    		        <span class="plus">
    		        	<?php echo wp_kses(get_template_part('assets/images/svg/plus-icon'), 'svg');?>
    		        </span>
    		        <span class="minus">
    		        	<?php  echo wp_kses(get_template_part('assets/images/svg/minus-icon'), 'svg');?>
    		        </span>
    		    </button>
    		</div>

    		<?php

    		$item_output = \ob_get_clean();
    	}
    }

    return $item_output;
}