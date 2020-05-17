<?php


//////////////////==========================
// Blog Settings

// Add Section Blog Masonry.
Kirki::add_section( 'chained_blog_masonry', array(
	'panel'          => 'chained_theme_settings',
	'title'    => __( 'Loop', 'chained' ),
	'priority' => 30,
) );

//////////////===================Custom Title ( Blog Settings Loop)
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'custom_title_blog',
	'section'     => 'chained_blog_masonry',
	'default'     => '<div style="padding: 12px;background-color: #333; color: #fff;">' . esc_html__( 'Settings for the main loop.', 'chained' ) . '</div>',
	'priority'    => 10,
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_loop_post_title_typography',
	'label'       => esc_html__( 'Post Title Typography', 'chained' ),
	'description' => esc_html__( 'Typography options for post title. We recommend adjusting these settings according with the number of columns.', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => 'bold',
		'font-size'      => '24px',
		'line-height'	 => '28px',
		'letter-spacing' => '0',
		'color'          => '#121212',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.masonry .wrapper .masonry-panel__content article .entry-content-inner .entry-header .entry-title',
		],
	],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_loop_post_excerpt_typography',
	'label'       => esc_html__( 'Post Excerpt Typography', 'chained' ),
	'description' => esc_html__( 'Typography options for post excerpt. We recommend adjusting these settings according with the number of columns.', 'chained' ),
	'section'     => 'chained_blog_masonry',
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
			'element' => '.masonry .wrapper .masonry-panel__content article .entry-content-inner .entry-content p',
		],
	],
] );

// Separator
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'chained_blog_separator_1',
	'section'     => 'chained_blog_masonry',
	'default'     => '<div style="height: 2px; border: 2px solid #333;"></div>',
] );


// Separator
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'chained_blog_separator_2',
	'section'     => 'chained_blog_masonry',
	'default'     => '<div style="height: 2px; border: 2px solid #333;"></div>',
] );


// Separator
Kirki::add_field( 'theme_settings', [
	'type'        => 'custom',
	'settings'    => 'chained_blog_separator_3',
	'section'     => 'chained_blog_masonry',
	'default'     => '<div style="height: 2px; border: 2px solid #333;"></div>',
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'slider',
	'settings'    => 'chained_loop_post_format_gallery',
	'label'       => esc_html__( 'Post Format Gallery:', 'chained' ),
	'description' => esc_html__( 'Number of slides for the gallery posts in Blog page:', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => 3,
	'choices'     => [
		'min'  => 2,
		'max'  => 10,
		'step' => 1,
	],
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'checkbox',
	'settings'    => 'chained_masonry_blog_excerpt_visibility',
	'label'       => esc_html__( 'Show excerpt?', 'chained' ),
	'description' => esc_html__( 'If checked, the excerpt will be shown in loop. - default checked', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => true,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'checkbox',
	'settings'    => 'chained_masonry_blog_category_visibility_first',
	'label'       => esc_html__( 'Show only the first category?', 'chained' ),
	'description' => esc_html__( 'If checked, only the first category will be shown in loop. - default checked ', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => true,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'checkbox',
	'settings'    => 'chained_masonry_blog_category_visibility_all',
	'label'       => esc_html__( 'Show all categories', 'chained' ),
	'description' => esc_html__( 'If checked, all the categories will be shown in loop. - default unchecked', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => false,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'checkbox',
	'settings'    => 'chained_masonry_blog_author_visibility',
	'label'       => esc_html__( 'Show the author name?', 'chained' ),
	'description' => esc_html__( 'If checked, the author name will be shown in loop. - default unchecked', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => true,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'checkbox',
	'settings'    => 'chained_masonry_blog_date_visibility',
	'label'       => esc_html__( 'Show the date?', 'chained' ),
	'description' => esc_html__( 'If checked, the date of publishing will be shown in loop. - default checked', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => true,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'checkbox',
	'settings'    => 'chained_masonry_blog_comments',
	'label'       => esc_html__( 'Number of Comments', 'chained' ),
	'description' => esc_html__( 'If checked, the number of comments will be shown. - default checked ', 'chained' ),
	'section'     => 'chained_blog_masonry',
	'default'     => true,
] );
