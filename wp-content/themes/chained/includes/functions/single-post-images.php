<?php

/*-----------------------------------------------------------------------------------------------
	Single Post Images Sizes
--------------------------------------------------------------------------------------------------- */
/**
 *
 * @since chained 1.2.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function chained_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	//only do this for single posts, not the archives
	if ( is_single() ) {
		764 <= $width && $sizes = '(max-width: 620px) 100vw, (max-width: 899px) 620px, 764px';
		764 > $width && 620 <= $width && $sizes = '(max-width: 620px) 100vw, (max-width: 899px) 620px, ' . $width . 'px';
		620 > $width && $sizes = '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
	}
	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'chained_content_image_sizes_attr', 10 , 2 );