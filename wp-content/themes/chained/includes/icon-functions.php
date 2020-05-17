<?php

/*-----------------------------------------------------------------------------------------------
	Icons Functions
	@package v1.0.5
------------------------------------------------------------------------------------------------- */
/**
 * Icon functions for Chained theme.
 * Adapted from the TwentySeventeen theme.
 * thx to https://jackiedelia.com/adding-svg-icons-graphics-wordpress-theme/
 * @since 1.0.0
 * @package Chained
 * @author  Chained
 * @license GPL-2.0+
 */

function jdd_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_stylesheet_directory()  . '/assets/images/svg-icons.min.svg';
	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'jdd_include_svg_icons', 9999 );
/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function jdd_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'chained' );
	}
	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'chained' );
	}
	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
		'class'       => '',
	);
	// Parse args.
	$args = wp_parse_args( $args, $defaults );
	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';
	// Set ARIA.
	$aria_labelledby = '';
	/*
	 * Theme doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo jdd_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo jdd_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';
		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}
	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . ' ' . esc_attr( $args['class'] ) .'"' . $aria_hidden . $aria_labelledby . ' role="img">';
	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';
		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}
	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_attr( $args['icon'] ) . '" xlink:href="#icon-' . esc_attr( $args['icon'] ) . '"></use> ';
	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}
	$svg .= '</svg>';
	return $svg;
}
/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function jdd_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	$menu_object = wp_get_nav_menu_object( 'social-menu' );
	$made_replacement = false;
	if ( $menu_object ) {
		$social_menu_id = $menu_object->term_id;
		if ( is_object( $args->menu ) ) {
			$cur_obj = $args->menu;
			$cur_menu = $cur_obj->term_id;
		} else {
			$cur_menu = $args->menu;
		}
		// Change SVG icon inside social links menu if there is supported URL.
		if ( $social_menu_id === $cur_menu ) {
			// Load the social icons.
			$social_icons = jdd_social_links_icons();
			$is_menu_assigned = $args->theme_location;
			$item_output = str_replace( 'itemprop="url">', 'itemprop="url"><span class="screen-reader-text">' , $item_output );
			$item_output = str_replace( '</a>', '</span></a>' , $item_output );
			foreach ( $social_icons as $attr => $value ) {
				if ( false !== strpos( $item_output, $attr ) ) {
					$made_replacement = true;
					if ( $is_menu_assigned ) {
						$item_output = str_replace( '</span></span>', '</span></span>' . jdd_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
					} else {
						$item_output = str_replace( '</span>', '</span>' . jdd_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
					}
				}
			}
			if ( ! $made_replacement ) {
				if ( $is_menu_assigned ) {
					$item_output = str_replace( '</span></span>', '</span></span>' . jdd_get_svg( array( 'icon' => esc_attr( 'chain' ) ) ), $item_output );
				} else {
					$item_output = str_replace( '</span>', '</span>' . jdd_get_svg( array( 'icon' => esc_attr( 'chain' ) ) ), $item_output );
				}
			}
		}
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'jdd_nav_menu_social_icons', 10, 4 );
/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function jdd_social_links_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'behance.net'     => 'behance',
		'codepen.io'      => 'codepen',
		'deviantart.com'  => 'deviantart',
		'digg.com'        => 'digg',
		'dribbble.com'    => 'dribbble',
		'dropbox.com'     => 'dropbox',
		'facebook.com'    => 'facebook',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'plus.google.com' => 'google-plus',
		'github.com'      => 'github',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'envelope-o',
		'medium.com'      => 'medium',
		'pinterest.com'   => 'pinterest-p',
		'getpocket.com'   => 'get-pocket',
		'reddit.com'      => 'reddit-alien',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'slideshare.net'  => 'slideshare',
		'snapchat.com'    => 'snapchat-ghost',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'stumbleupon.com' => 'stumbleupon',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'vine.co'         => 'vine',
		'vk.com'          => 'vk',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'yelp.com'        => 'yelp',
		'youtube.com'     => 'youtube',
	);
	/**
	 * Filter JDD Starter Themesocial links icons.
	 *
	 * @since JDD Starter Theme1.0
	 *
	 * @param array $social_links_icons
	 */
	return apply_filters( 'jdd_social_links_icons', $social_links_icons );
}