<?php

/*-----------------------------------------------------------------------------------------------
	   Chained Theme Setup
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'chained_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chained_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on chained, use a find and replace
		 * to change 'chained' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'chained', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */

		add_theme_support( 'post-thumbnails' );
		//used as featured image for posts on home page and archive pages
		add_image_size( 'chained-masonry-image', 640, 9999, false );
		//used for the single post featured image
		add_image_size( 'chained-single-image', 1024, 9999, false );
		//used for the single related posts
		add_image_size( 'chained-related-post', 300, 9999, false );
		//used for the post thumbnail of the featured posts in the home slider
		add_image_size( 'chained-slider-image', 1140, 430, true );

		/*
		 * Add editor custom style to make it look more like the frontend
		 */
		add_editor_style( array( get_theme_file_uri( '/assets/dist/css/editor-style.css' ) ) );

		// This theme uses wp_nav_menu() in three locations.
		register_nav_menus( array(
			'primary' 		=> __( 'Primary Menu', 'chained' ),
			'social' 		=> __( 'Social Menu', 'chained' ),
			'footer'    	=> __( 'Footer Menu', 'chained' ),
			'topbar-left'   => __( 'Topbar Menu Left', 'chained' ),
			'topbar-right'  => __( 'Topbar Menu Right', 'chained' ),
		) );

		/*
		 * Switch default core markup for comment form, galleries and captions
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'gallery',
			'caption',
		) );
		/*
		 * Enable support for custom logo.
		 *
		 *  @since chained 1.2.2
		 */
		add_theme_support( 'custom-logo', array(
			'width'       => 1000,
			'height'      => 500,
			'flex-height' => true,
		) );

		if ( ! function_exists( 'the_custom_logo' ) ) {
			//in case we are on a WP version older than 4.5, try to use Jetpack's Site Logo feature
			/**
			 * Add theme support for site logo
			 *
			 * First, it's the image size we want to use for the logo thumbnails
			 * Second, the 2 classes we want to use for the "Display Header Text" Customizer logic
			 */
			add_theme_support( 'site-logo', array(
				'size'        => 'chained-site-logo',
				'header-text' => array(
					'site-title',
					'site-description-text',
				)
			) );
		}

		add_image_size( 'chained-site-logo', 1000, 500, false );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'link',
			'image',
			'quote',
			'audio',
			'video',
		) );
	}
endif;
add_action( 'after_setup_theme', 'chained_setup' );