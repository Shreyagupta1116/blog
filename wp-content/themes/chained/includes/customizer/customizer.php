<?php

if ( class_exists( 'Kirki' ) ) {
	// Kirki fields etc here.

	// Config
	Kirki::add_config( 'theme_settings', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	) );

	// Main Theme Settings
	Kirki::add_panel( 'chained_theme_settings', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Settings', 'chained' ),
	    'description' => esc_html__( 'Change the theme settings', 'chained' ),
	) );

	get_template_part('/includes/customizer/elements/customizer', 'get-pro'); 
	get_template_part('/includes/customizer/elements/customizer', 'topbar'); 
	get_template_part('/includes/customizer/elements/customizer', 'header'); 
	get_template_part('/includes/customizer/elements/customizer', 'loop'); 
	get_template_part('/includes/customizer/elements/customizer', 'single'); 
	get_template_part('/includes/customizer/elements/customizer', 'footer'); 
	get_template_part('/includes/customizer/elements/customizer', 'global'); 
}
