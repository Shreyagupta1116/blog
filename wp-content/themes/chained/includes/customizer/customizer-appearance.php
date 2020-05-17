<?php

/**
 * This function adds some styles to the WordPress Customizer
 */
function chained_customizer_styles() { ?>
	<style>
		
		#customize-controls img {
			max-width: 50px; 
		}

		.control-section-kirki-expanded .get-pro-section
		{
			display: flex;
			align-items: center;
			-webkit-justify-content: space-between;
			        justify-content: space-between;
		}

		.control-section-kirki-expanded .customize-section-description-container .section-meta 
		{
			display: none;
		}

		.control-section-kirki-expanded .customize-control-notice
		{
			padding: 0px 10px 7px 14px;
			box-sizing: border-box;
		}

		#customize-theme-controls .customize-pane-child.control-section-kirki-expanded
		{
			padding: 0;
			background: #FFF;
		}

		.control-section-kirki-expanded .text
		{
			font-weight: bold;
		}

	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'chained_customizer_styles', 999 );

?>