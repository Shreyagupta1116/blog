<?php

//////////////===================FOOTER
// Add Section FOOTER.
Kirki::add_section( 'chained_footer', array(
	'panel'          => 'chained_theme_settings',
	'title'    => __( 'Footer', 'chained' ),
	'priority' => 30,
) );

Kirki::add_field( 'theme_settings', [
	'type'        => 'textarea',
	'settings'    => 'chained_footer_copyright',
	'label'       => esc_html__( 'Footer Copyright Text', 'chained' ),
	'description' => esc_html__( 'Set the text that will appear in the footer area.', 'chained' ),
	'section'     => 'chained_footer',
	'default'     => '&copy; 2020 All rights reserved',
	'priority'    => 10,
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_footer_instagram_enable',
	'label'       => esc_html__( 'Enable Instagram', 'chained' ),
	'section'     => 'chained_footer',
	'default'     => '0',
	'priority'    => 10,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'custom_footer_separator_1',
	'section'     => 'chained_footer',
	'default'     => '<div style="padding: 12px;background-color: #333; color: #fff;">' . esc_html__( 'Default: [instagram-feed num=6 cols=6 showheader=false showbutton=false showfollow=false]', 'chained' ) . '</div>',
	'priority'    => 10,
	'active_callback' => [
		[
			'setting'  => 'chained_footer_instagram_enable',
			'operator' => '==',
			'value'    => true,
		]
	],
] );

Kirki::add_field( 'theme_settings', [
	'type'     		=> 'text',
	'settings' 		=> 'chained_footer_instagram_shortcode',
	'label'    		=> esc_html__( 'Enter Instagram Shortcode', 'chained' ),
	'description'   => esc_html__( ' - For more details please check out the Instagram Feed plugin settings.', 'chained' ),
	'section'  		=> 'chained_footer',
	'default'  		=> esc_html__( '[instagram-feed showheader=false showbutton=false showfollow=false]', 'chained' ),
	'priority' => 10,
	'active_callback' => [
		[
			'setting'  => 'chained_footer_instagram_enable',
			'operator' => '==',
			'value'    => true,
		]
	],
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chainge_footer_menu_typography',
	'label'       => esc_html__( 'Footer Menu Settings', 'chained' ),
	'section'     => 'chained_footer',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => '700',
		'font-size'      => '14px',
		'line-height'    => 'inherit',
		'letter-spacing' => '0',
		'color'          => '#121212',
		'text-transform' => 'uppercase',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.site-footer .nav--footer li a',
		],
	],
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chainge_footer_copyright_typography',
	'label'       => esc_html__( 'Footer Copyright Settings', 'chained' ),
	'section'     => 'chained_footer',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => 'normal',
		'font-size'      => '12px',
		'line-height'    => 'inherit',
		'letter-spacing' => '0',
		'color'          => '#121212',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.site-footer .site-info, .site-footer .site-info a',
		],
	],
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'background',
	'settings'    => 'chainged_footer_backgrond_settings',
	'label'       => esc_html__( 'Footer Background', 'chained' ),
	'description' => esc_html__( 'Change Footer Background', 'chained' ),
	'section'     => 'chained_footer',
	'default'     => [
		'background-color'      => '#FFFFFF',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.site-footer',
		],
	],
] );