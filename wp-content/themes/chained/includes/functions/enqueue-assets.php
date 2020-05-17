<?php

/*-----------------------------------------------------------------------------------------------
   Enqueue Assets
--------------------------------------------------------------------------------------------------- */

function chained_scripts() {

	/*-----------------------------------------------------------------------------------------------
	   Utilities
	--------------------------------------------------------------------------------------------------- */
	if ( !is_home() && !is_front_page() ) {
		wp_enqueue_style( 'simplelightbox-css', get_template_directory_uri() . '/assets/src/simple-lightbox/simplelightbox.min.css', array() );
		wp_enqueue_script( 'simplelightbox-js', get_template_directory_uri() . '/assets/src/simple-lightbox/simple-lightbox.min.js', array('jquery'), '1.17.3', true );
	}

	if ( !is_404() || !is_page() ) {
		wp_enqueue_style(  'slick', get_template_directory_uri() . '/assets/src/slick/slick.css', array() );
		wp_enqueue_style(  'slick-theme', get_template_directory_uri() . '/assets/src/slick/slick-theme.css', array() );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/src/slick/slick.min.js', array('jquery'), '1.8.1', true );
	}

	/*-----------------------------------------------------------------------------------------------
	   Chained Main Styles
	--------------------------------------------------------------------------------------------------- */
	wp_enqueue_style('chained-style', get_stylesheet_uri());


	/*-----------------------------------------------------------------------------------------------
	   Chained Script File
	--------------------------------------------------------------------------------------------------- */
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/src/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'chained-scripts', get_template_directory_uri() . '/assets/dist/js/main.js', 
		array(
		'jquery', 'masonry'), '1.0.0', true );

	$js_url = ( is_ssl() ) ? 'https://v0.wordpress.com/js/videopress.js' : 'http://s0.videopress.com/js/videopress.js';
	wp_enqueue_script( 'videopress', $js_url, array( 'jquery', 'swfobject' ), '1.09' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chained_scripts' );


/**
 * Registers/enqueues the scripts related to media JS APIs - About me Widget
 *
 */
function chained_wp_enqueue_media() {
	/*
	 * Register the widget-about-me.js here so we can upload images in the customizer
	 */
	if ( ! wp_script_is( 'chained-about-me-widget-admin', 'registered' ) ) {
		wp_register_script( 'chained-about-me-widget-admin', get_template_directory_uri() . '/includes/widgets/widget-about-me/widget-about-me.js', array(
			'media-upload',
			'media-views',
		) );
	}

	wp_enqueue_script( 'chained-about-me-widget-admin' );

	wp_localize_script(
		'chained-about-me-widget-admin',
		'chainedAboutMeWidget',
		array(
			'l10n' => array(
				'frameTitle'      => esc_html__( 'Choose a Background Image', 'chained' ),
				'frameUpdateText' => esc_html__( 'Update Background Image', 'chained' ),
			),
		)
	);
}

add_action( 'wp_enqueue_media', 'chained_wp_enqueue_media' );

/*-----------------------------------------------------------------------------------------------
	   Chained Gutenberg Styles
--------------------------------------------------------------------------------------------------- */

function chained_gutenberg_styles() {
	wp_enqueue_style( 'chained-gutenberg', get_theme_file_uri() . '/assets/dist/css/gutenberg.css', array() );
}
add_action( 'enqueue_block_editor_assets', 'chained_gutenberg_styles' );