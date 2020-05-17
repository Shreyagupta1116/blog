<?php
/*Footer Options*/
$wp_customize->add_section('polite_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'polite'),
    'panel' => 'polite_panel',
));


/*Header Search Enable Option*/
$wp_customize->add_setting( 'polite_options[polite_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['polite_enable_search'],
    'sanitize_callback' => 'polite_sanitize_checkbox'
) );

$wp_customize->add_control( 'polite_options[polite_enable_search]', array(
    'label'     => __( 'Enable Search', 'polite' ),
    'description' => __('It will help to display the search in Menu.', 'polite'),
    'section'   => 'polite_header_section',
    'settings'  => 'polite_options[polite_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );


/*Header Offcanvas Enable Option*/
$wp_customize->add_setting( 'polite_options[polite_enable_offcanvas]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['polite_enable_offcanvas'],
    'sanitize_callback' => 'polite_sanitize_checkbox'
) );

$wp_customize->add_control( 'polite_options[polite_enable_offcanvas]', array(
    'label'     => __( 'Enable Offcanvas Sidebar', 'polite' ),
    'description' => __('It will help to display the Offcanvas sidebar in Menu.', 'polite'),
    'section'   => 'polite_header_section',
    'settings'  => 'polite_options[polite_enable_offcanvas]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );