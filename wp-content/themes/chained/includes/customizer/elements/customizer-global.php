<?php


//////////////////==========================
// Global Settings
Kirki::add_section( 'chained_global_settings', array(
	'panel'          => 'chained_theme_settings',
	'title'    => __( 'Global', 'chained' ),
	'priority' => 30,
) );

Kirki::add_field( 'theme_settings', [
	'type'        => 'color',
	'settings'    => 'chained_global_accent_color',
	'label'       => esc_html__( 'Accent Color', 'chained' ),
	'description' => esc_html__( 'This is accent color control used for some design elements and hovers', 'chained' ),
	'section'     => 'chained_global_settings',
	'default'     => '#f04e39',
	'output' => array(
		array(
			'element'  => '
				.masonry .wrapper .masonry-panel__content .post-design-default.entry-card.format-gallery:hover .entry-gallery-navigation button,
				.masonry .wrapper .masonry-panel__content .post-design-papyrus.entry-card:after,
				blockquote cite:before,
				.single-content .single-content-wrapper .single-content-inner .post .entry-header .entry-meta .category-links a,
				.widget-area .widget h4.widget-title:before,
				button:not(.reset):not(.slick-prev):not(.slick-next):hover, .single-content .single-content-wrapper .single-content-inner .comment-respond .comment-form p.form-submit .submit:hover, .single-content .single-content-wrapper .single-content-inner .comments-area .comments-area-title .comments_add-comment:hover,
				.single-content .single-content-wrapper .single-content-inner .post .entry-footer .tags-links > a, .site-header .main-navigation .nav--main li a:before, 
				.masonry .wrapper .masonry-panel__content article .category-links a, button:not(.reset):hover,.masonry #infinite-handle span button:hover, #sb_instagram #sbi_load .sbi_load_btn:hover, #sb_instagram #sbi_load .sbi_load_btn:focus,#sb_instagram #sbi_load .sbi_follow_btn a:hover, #sb_instagram #sbi_load .sbi_follow_btn a:focus,
				.single-content .single-content-wrapper .single-content-inner .post .content-with-socials .sharedaddy .sd-social .sd-title:before, .single-content .single-content-wrapper .single-content-inner .attachment .content-with-socials .sharedaddy .sd-social .sd-title:before, .single-content .single-content-wrapper .single-content-inner .author-info .author-info-inner .author-description .author-name:before,.single-content .single-content-wrapper .single-content-inner .comments-area .comments-area-title h3:before,
				.single-content .single-content-wrapper .single-content-inner .related-posts h3:before,
				.masonry .wrapper .masonry-panel__content article.sticky .sticky-post,
				.masonry .wrapper .masonry-panel__content article.format-quote .category-links a,
				::selection,
				.widget-area .widget.widget_search form button.search-offcanvas,
				input[type=submit]:hover
	
				',
			'property' => 'background-color',
		),

		array(
			'element'  => '
				.masonry .wrapper .masonry-panel__content article .entry-content-inner .entry-header .entry-title a:hover, .widget-area .widget a:hover, .single-content .single-content-wrapper .single-content-inner .post .entry-content a:not(.wp-block-button__link):not(.wp-block-file__button), .single-content .single-content-wrapper .single-content-inner .attachment .entry-content a:not(.wp-block-button__link):not(.wp-block-file__button), .site-footer .nav--footer li a:hover,.site-footer .site-info a:hover ',
			'property' => 'color',
			// 'suffix'   => '!important',
		),

		array(
			'element'  => '
				.single-content .single-content-wrapper .single-content-inner .post .content-with-socials .sharedaddy .sd-social .sd-content ul li:hover a, .single-content .single-content-wrapper .single-content-inner .attachment .content-with-socials .sharedaddy .sd-social .sd-content ul li:hover a ',
			'property' => 'color',
			'suffix'   => '!important',
		),

		array(
			'element'  => '
				.masonry .wrapper .masonry-panel__content .entry-card:not(.post-design-magazine) .entry-meta a.accent-color',
			'property' => 'background',
			'suffix'   => '!important',
		),

	
		array(
			'element'  => '.masonry .pagination .nav-links .current',
			'property' => 'border-bottom-color',
		),

		array(
			'element'  => '.wp-block-quote',
			'property' => 'border-left-color',
		),

		array(
			'element'  => 'a:hover, .masonry .infinite-loader .spinner,
			.single-content .single-content-wrapper .single-content-inner .comments-area .commentlist .comment .comment-article .media__body .comment-author .comment__links a,
			.single-content .single-content-wrapper .single-content-inner .comment-respond .comment-reply-title small #cancel-comment-reply-link,.masonry .wrapper .masonry-panel__content article .entry-meta .meta-information span a:hover',
			
			'property' => 'color',
		),

		array(
			'element'  => '.site-header .social-navigation .nav--social .menu-item a:hover svg, .masonry .wrapper .masonry-panel__content article.sticky .sticky-post svg,.masonry .wrapper .masonry-panel__content article.format-quote .content-quote .content-quote-wrapper .quote svg',
			'property' => 'fill',
		),
		
	),
] );


Kirki::add_field( 'theme_settings', [
	'type'        => 'toggle',
	'settings'    => 'changed_global_enable_breadcrumb',
	'label'       => esc_html__( 'Enable Breadcrumb', 'chained' ),
	'description' => esc_html__( 'This will be shown in single post and page', 'chained' ),
	'section'     => 'chained_global_settings',
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( 'theme_settings', [
	'type'        => 'typography',
	'settings'    => 'chained_single_breadcrumb_typography',
	'label'       => esc_html__( 'Breadcrumb Appearance', 'chained' ),
	'section'     => 'chained_global_settings',
	'default'     => [
		'font-family'    => 'Roboto Condensed',
		'variant'        => 'normal',
		'font-size'      => '14px',
		'letter-spacing' => '0',
		'color'          => '#121212',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.breadcrumbs .trail-items .trail-item',
		],
	],
	'active_callback' => [
	[
		'setting'  => 'changed_global_enable_breadcrumb',
		'operator' => '==',
		'value'    => true,
	]
],
] );
