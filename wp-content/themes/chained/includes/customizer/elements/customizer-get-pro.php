<?php

//////////////===================Get PRO
// Add Get Pro Section

//Intersection
Kirki::add_section( 'intersection', array(
	'capability'     => 'edit_theme_options',
	'type' => 'expanded',
	'priority' => 1000
) );

// Add new control
add_action( 'customize_register', function( $wp_customize ) {
	/**
	 * The custom control class
	 */
	class Kirki_Controls_Get_PRO extends Kirki_Control_Base {
		public $type = 'notice';
		public function render_content() { ?>
			<div class="get-pro-section">
				<div class="text">
					<?php echo esc_html_e('More options are available in Chained PRO', 'chained'); ?>
				</div>
				<a target="_blank" href="<?php echo esc_url("https://ancientcoders.com/chained-pro");?>" class="button button-primary "><?php echo esc_html_e('DOWNLOAD', 'chained'); ?></a>
			</div>
			<?php
		}
	}
	// Register our custom control with Kirki
	add_filter( 'kirki_control_types', function( $controls ) {
		$controls['notice'] = 'Kirki_Controls_Get_PRO';
		return $controls;
	} );

} );


// if you are using nested panels or sections then a blank field is needed
Kirki::add_field( 'chainget_get_pro_version', array(
    'type'     => 'notice',
    'section'  => 'intersection',
   
));