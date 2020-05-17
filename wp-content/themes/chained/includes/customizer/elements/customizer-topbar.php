<?php


//////////////////==========================
// Topbar Settings

// Add Section TopBar.
Kirki::add_section( 'chained_topbar', array(
	'panel'          => 'chained_theme_settings',
	'title'    => __( 'Topbar', 'chained' ),
	'priority' => 10,
) );

//////////////===================Custom Title ( description progress bar)
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'custom_title_topbar',
	// 'label'       => esc_html__( 'Header Section', 'chained' ),
	'section'     => 'chained_topbar',
	'default'     => '<div style="padding: 12px;background-color: #333; color: #fff;">' . esc_html__( 'TopBar Section. Here you can enable / disable the loading bar, control the background color, typography settings and up and down spacing.', 'chained' ) . '</div>',
	'priority'    => 10,
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_show_top_bar',
	'label'       => esc_html__( 'Show Top Bar?', 'chained' ),
	'section'     => 'chained_topbar',
	'default'     => '0',
	'priority'    => 10,
] );

// TopBar Background Color
Kirki::add_field( 'theme_settings', [
	'type'        => 'background',
	'settings'    => 'chained_topbar_background_color',
	'label'       => esc_html__( 'TopBar Background Color', 'chained' ),
	'description' => esc_html__( 'Change TopBar Background Color. Default: #f04e39', 'chained' ),
	'section'     => 'chained_topbar',
	'default'     => [
		'background-color'      => '#f04e39',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.topbar',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'chained_show_top_bar',
			'operator' => '==',
			'value'    => true,
		]
	],
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'color',
	'settings'    => 'chained_topbar_links_hover',
	'label'       => __( 'Link Color Hover', 'chained' ),
	'section'     => 'chained_topbar',
	'default'     => '#121212',
	'output' => array(
		array(
			'element'  => '.topbar .wrapper a:hover',
			'property' => 'color',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'chained_show_top_bar',
			'operator' => '==',
			'value'    => true,
		]
	],
] );

// TopBar Typography.
Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_topbar_typography',
	'label'       => esc_html__( 'TopBar Typography', 'chained' ),
	'section'     => 'chained_topbar',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'letter-spacing' => '0',
		'color'          => '#FFFFFF',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.topbar .wrapper a, .topbar .wrapper .topbar-date',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'chained_show_top_bar',
			'operator' => '==',
			'value'    => true,
		]
	],
] );

//Topbar Spacing
Kirki::add_field( 'theme_settings', [
	'type'        => 'slider',
	'settings'    => 'chained_topbar_paddings',
	'label'       => esc_html__( 'Topbar Spacing', 'chained' ),
	'description' => esc_html__( 'Set padding top and bottom: Default: 7px;', 'chained' ),
	'section'     => 'chained_topbar',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 30,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.topbar',
			'property' => 'padding-top',
			'units'		=> 'px',
		),
		array(
			'element'  => '.topbar',
			'property' => 'padding-bottom',
			'units'		=> 'px',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'chained_show_top_bar',
			'operator' => '==',
			'value'    => true,
		]
	],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_top_bar_show_date',
	'label'       => esc_html__( 'Show Date?', 'chained' ),
	'section'     => 'chained_topbar',
	'default'     => '0',
	'priority'    => 10,
] );