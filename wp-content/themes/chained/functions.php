<?php
/**
 * Chained functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chained
 * @since Chained 1.0.3
 */

// theme path
$chained_path = get_template_directory();

/*---------------------------------------------------------------------------------------------------
	 	* Add theme support
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/functions/theme-support.php';


/*---------------------------------------------------------------------------------------------------
	 	* Add custom image sizes attribute to enhance responsive image functionality
 		for content images
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/functions/single-post-images.php';


/*---------------------------------------------------------------------------------------------------
	 	* Add custom image sizes attribute to enhance responsive image functionality
	 	* for post thumbnails
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/functions/featured-image-sizes.php';


/*---------------------------------------------------------------------------------------------------
	 	* Register Widgets Areas
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/functions/widget-areas.php';


/*---------------------------------------------------------------------------------------------------
	 	* Register and Enqueue Scripts.
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/functions/enqueue-assets.php';


/*---------------------------------------------------------------------------------------------------
	 	* Get the archive title
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/functions/archive-title.php';


/*---------------------------------------------------------------------------------------------------
 		* Custom template tags for this theme.
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/template-tags.php';


/*---------------------------------------------------------------------------------------------------
 		* Custom functions that act independently of the theme templates.
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/custom-functions.php';


/*---------------------------------------------------------------------------------------------------
 		* Load the Hybrid Media Grabber class
 --------------------------------------------------------------------------------------------------- */


require $chained_path . '/includes/hybrid-media-grabber.php';

/*---------------------------------------------------------------------------------------------------
 * 		Add the SVG icons functions.
 --------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/icon-functions.php';


/*---------------------------------------------------------------------------------------------------
 * 		Load various plugin integrations
 --------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/required-plugins.php';


/*---------------------------------------------------------------------------------------------------
 		* Widgets - About us
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/widgets/widget-about-me/widget-about-me.php';


/*---------------------------------------------------------------------------------------------------
 		* Widgets - Popular Posts
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/widgets/widget-popular-posts.php';



/*---------------------------------------------------------------------------------------------------
 		* Widgets - Recent Posts
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/widgets/widget-recent-posts.php';


/*---------------------------------------------------------------------------------------------------
 		* Widgets - Facebook
--------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/widgets/widget-facebook.php';



/*---------------------------------------------------------------------------------------------------
 		* Customizer
 --------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/customizer/customizer.php';


/*---------------------------------------------------------------------------------------------------
 		* Customizer appearance (Actual customizer styling)
 ---------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/customizer/customizer-appearance.php';


/*---------------------------------------------------------------------------------------------------
 		* Navigation custom walker for mobile toggler
 ---------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/functions/navigation.php';


/*---------------------------------------------------------------------------------------------------
 		* Breadcrumb
 ---------------------------------------------------------------------------------------------------- */
require $chained_path . '/includes/breadcrumb/inc/breadcrumbs.php';


/*-------------------------------------------------------------------------------------------------
	Jetpack Configurations
--------------------------------------------------------------------------------------------------- */
function chained_jetpack_setup() {
	/**
	 * Add theme support for Infinite Scroll
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'type'           => 'scroll',
		'container'      => 'masonry-content',
		'wrapper'        => '.masonry-load',
		'footer'         => 'page',
		'render'         => 'chained_infinite_scroll_render',
	) );

	function chained_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'templates/loop/content', get_post_format() );
		}
	}
	/**
	 * Add theme support for Jetpack responsive videos
	 */
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'chained_jetpack_setup' );

function chained_jetpack_responsive_videos_should_wrap_videopress_also( $video_patterns ) {
	$video_patterns[] = 'https?://(.+\.)?videopress\.com/';

	return $video_patterns;
}

add_filter( 'jetpack_responsive_videos_oembed_videos', 'chained_jetpack_responsive_videos_should_wrap_videopress_also');