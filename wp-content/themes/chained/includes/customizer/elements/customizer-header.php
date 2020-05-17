<?php

//////////////===================HEADER

Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_site_identity_show_title',
	'label'       => esc_html__( 'Show Site Title?', 'chained' ),
	'section'     => 'title_tagline',
	'default'     => '0',
	'priority'    => 10,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_site_identity_show_desc',
	'label'       => esc_html__( 'Show Site Description?', 'chained' ),
	'section'     => 'title_tagline',
	'default'     => '1',
	'priority'    => 10,
] );


// Add Section HEADER.
Kirki::add_section( 'chained_header', array(
	'panel'          => 'chained_theme_settings',
	'title'    => __( 'Header', 'chained' ),
	'priority' => 30,
) );

//////////////===================Custom Title ( description header)
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'custom_title_header',
	'section'     => 'chained_header',
	'default'     => '<div style="padding: 12px;background-color: #333; color: #fff;">' . esc_html__( 'Header Section. Here you can adjust the header width, header style (3 variants) top and bottom spacing (desktop and mobile)...etc. ', 'chained' ) . '</div>',
	'priority'    => 10,
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'radio',
	'settings'    => 'chained_select_header_style',
	'label'       => esc_html__( 'Header Style', 'chained' ),
	'section'     => 'chained_header',
	'default'     => 'style-1',
	'priority'    => 10,
	'choices'     => [
		'style-1'	=> esc_html__('Header Style 1', 'chained'),
	],
] );

// Disable Sticky Header
Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_hide_sticky_header',
	'label'       => esc_html__( 'Hide Sticky Header', 'chained' ),
	'section'     => 'chained_header',
	'default'     => false,
] );

//////////////===================Custom Title ( description navigation)
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'custom_title_navigation',
	'section'     => 'chained_header',
	'default'     => '<div style="padding: 12px;background-color: #333; color: #fff;">' . esc_html__( 'Navigation Section. Here you can modify the navigation typography options, social icons size, enable / disable search icon', 'chained' ) . '</div>',
	'priority'    => 10,
] );


// Navigation Typography.
Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_navigation_typography',
	'label'       => esc_html__( 'Navigation Typography', 'chained' ),
	'section'     => 'chained_header',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'color'          => '#121212',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.site-header .main-navigation .nav--main li > a',
		],
	],
] );

// Navigation social icons color 
Kirki::add_field( 'theme_settings', array(
	'type'      => 'color',
	'settings'  => 'chained_navigation_icons_color',
	'label'     => esc_html__( 'Navigation Social Menu Icons', 'chained' ),
	'section'   => 'chained_header',
	'default'   => '#121212',
	'priority'  => 10,
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-header .social-navigation .nav--social li svg',
			'property' => 'fill'
		),
	),
) );

// Social Icons Size
Kirki::add_field( 'theme_settings', [
	'type'        => 'slider',
	'settings'    => 'chained_social_icons_size',
	'label'       => esc_html__( 'Social Icons Size', 'chained' ),
	'description' => esc_html__( 'Description', 'chained' ),
	'section'     => 'chained_header',
	'default'     => 24,
	'choices'     => [
		'min'  => 16,
		'max'  => 48,
		'step' => 1,
	],
	'output'    => array(
		array(
			'element'  => '.site-header .social-navigation .nav--social li svg',
			'property' => 'width',
			'units'		=> 'px',
		),
		array(
			'element'  => '.site-header .social-navigation .nav--social li svg',
			'property' => 'height',
			'units'		=> 'px',
		),
	),
] );


//////////////===================Custom Title ( description logo)
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'custom_title_logo',
	'section'     => 'chained_header',
	'default'     => '<div style="padding: 12px;background-color: #333; color: #fff;">' . esc_html__( 'Logo Section. Here you can change the logo height', 'chained' ) . '</div>',
	'priority'    => 10,
] );

// Logo max height
Kirki::add_field( 'theme_settings', [
	'type'        => 'slider',
	'settings'    => 'chained_logo_height',
	'label'       => esc_html__( 'Logo Height', 'chained' ),
	'description' => esc_html__( 'Adjust the logo height. Keep in mind that adjusting the height, the width will also be adjusted. Default ', 'chained' ),
	'section'     => 'chained_header',
	'default'	  => 37,	
	'choices'     => [
			'min'  => 30,
			'max'  => 200,
			'step' => 1,
		],
	'output' => array(
		array(
			'element'  => '.site-header .site-branding .custom-logo-link .custom-logo',
			'property' => 'max-height',
			'units'		=> 'px',
		),
	),
] );