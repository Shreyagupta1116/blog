<?php

/*-----------------------------------------------------------------------------------------------
	   Featured Image Sizes
--------------------------------------------------------------------------------------------------- */
/**
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array
 */
function chained_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	//only do this for featured images, not all images
	if ( 'post-thumbnail' === $size || 'chained-single-image' === $size ) {
		$attr['sizes'] = '(max-width: 679px) 100vw, (max-width: 899px) 668px, (max-width: 1079px) 50vw, (max-width: 1259px) 620px, (max-width: 1449px) 66vw, 980px';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'chained_post_thumbnail_sizes_attr', 10 , 3 );