<?php

//////////////===================Single Post

// Add Section Single.
Kirki::add_section( 'chained_single_masonry', array(
	'panel'          => 'chained_theme_settings',
	'title'    => __( 'Single', 'chained' ),
	'priority' => 30,
) );

//////////////===================Custom Title ( single post)
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'custom_title_single',
	'section'     => 'chained_single_masonry',
	'default'     => '<div style="padding: 12px;background-color: #333; color: #fff;">' . esc_html__( 'Settings for the single post', 'chained' ) . '</div>',
	'priority'    => 10,
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_single_hide_categories',
	'label'       => esc_html__( 'Hide Post Categories?', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '0',
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_single_hide_written_by_author',
	'label'       => esc_html__( 'Hide Written by author?', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '0',
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_single_hide_post_date',
	'label'       => esc_html__( 'Hide Published Info\'s (publish and modified date)?', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '0',
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_single_hide_author_details',
	'label'       => esc_html__( 'Hide Author Bio', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '0',
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_single_hide_comments_number',
	'label'       => esc_html__( 'Post Hide Comments Number', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '0',
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_single_hide_avatar',
	'label'       => esc_html__( 'Post Hide Avatar', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '0',
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'chained_single_hide_related_posts',
	'label'       => esc_html__( 'Post Hide Related Posts', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '0',
] );

Kirki::add_field( 'theme_settings', [
'type'        => 'number',
'settings'    => 'chained_single_count_related_posts',
'label'       => esc_html__( 'How many related posts you want to show?', 'chained' ),
'section'     => 'chained_single_masonry',
'default'     => 4,
'choices'     => [
	'min'  => 4,
	'max'  => 8,
	'step' => 1,
],
'active_callback' => [
	[
		'setting'  => 'chained_single_hide_related_posts',
		'operator' => '==',
		'value'    => false,
	]
],
] );

Kirki::add_field( 'theme_settings', [
'type'     => 'text',
'settings' => 'chained_single_related_posts_title',
'label'    => esc_html__( 'Related Posts Title', 'chained' ),
'section'  => 'chained_single_masonry',
'default'  => esc_html__( 'Related News', 'chained' ),
'priority' => 10,
'active_callback' => [
	[
		'setting'  => 'chained_single_hide_related_posts',
		'operator' => '==',
		'value'    => false,
	]
],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_single_title_typography',
	'label'       => esc_html__( 'Single Post Title Appearance', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => '700',
		'font-size'      => '48px',
		'line-height'    => '1.1',
		'letter-spacing' => '2.5px',
		'color'          => '#121212',
		'text-transform' => 'uppercase',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.single-content .single-content-wrapper .single-content-inner .post .entry-header .entry-title, .single-content .single-content-wrapper .single-content-inner .attachment .entry-header .entry-title',
		],
	],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_single_content_typography',
	'label'       => esc_html__( 'Single Post Content Appearance', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => 'normal',
		'font-size'      => '18px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#121212',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.single-content .single-content-wrapper .single-content-inner .post .content-with-socials .content-and-image .entry-content, .single-content .single-content-wrapper .single-content-inner .attachment .content-with-socials .content-and-image .entry-content',
		],
	],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_single_share_this_typography',
	'label'       => esc_html__( 'Share This Appearance', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => 'italic',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'color'          => '#121212',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.single-content .single-content-wrapper .single-content-inner .post .content-with-socials .sharedaddy .sd-social .sd-content ul li a, .single-content .single-content-wrapper .single-content-inner .attachment .content-with-socials .sharedaddy .sd-social .sd-content ul li a',
		],
	],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_widgets_titles_typography',
	'label'       => esc_html__( 'Widgets Titles Appearance', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => '700',
		'font-size'      => '18px',
		'letter-spacing' => '0.1em',
		'color'          => '#121212',
		'text-transform' => 'uppercase',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.widget-area .widget h4.widget-title,
			.single-content .single-content-wrapper .single-content-inner .post .content-with-socials .sharedaddy .sd-social .sd-title, .single-content .single-content-wrapper .single-content-inner .attachment .content-with-socials .sharedaddy .sd-social .sd-title,
			.single-content .single-content-wrapper .single-content-inner .author-info .author-info-inner .author-description .author-name,.single-content .single-content-wrapper .single-content-inner .comments-area .comments-area-title h3,.single-content .single-content-wrapper .single-content-inner .related-posts h3',
		],
	],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'color',
	'settings'    => 'chained_widgets_colors',
	'label'       => __( 'Widgets Color Settings', 'chained' ),
	'description' => esc_html__( 'Color for all widgets texts', 'chained' ),
	'section'     => 'chained_single_masonry',
	'default'     => '#121212',
	'output' => array(
		array(
			'element'  => '.widget-area .widget, .widget-area .widget a, .offcanvas-navigation .offcanvas-content .offcanvas-navigation-wrapper .nav--main li.menu-item a',
			'property' => 'color',
		),

		array(
			'element'  => '.offcanvas-navigation .offcanvas-content .offcanvas-navigation-wrapper .nav--social li a svg',
			'property' => 'fill',
		),
	),
] );