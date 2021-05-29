<?php

namespace RemoveOversizedSrcsetValues;

add_filter( 'wp_calculate_image_srcset', __NAMESPACE__ . '\filter_image_srcset', 10, 2 );

/**
 * Filter the srcset values passed for an image so that only those the requested
 * size or smaller are included.
 *
 * @param array  $sources {
 *     One or more arrays of source data to include in the 'srcset'.
 *
 *     @type array $width {
 *         @type string $url        The URL of an image source.
 *         @type string $descriptor The descriptor type used in the image candidate string,
 *                                  either 'w' or 'x'.
 *         @type int    $value      The source width if paired with a 'w' descriptor, or a
 *                                  pixel density value if paired with an 'x' descriptor.
 *     }
 * }
 * @param array $size_array     {
 *     An array of requested width and height values.
 *
 *     @type int $0 The width in pixels.
 *     @type int $1 The height in pixels.
 * }
 */
function filter_image_srcset( $sources, $size_array ) {
	foreach ( $sources as $key => $source ) {
		if ( $size_array[0] < $source['value'] ) {
			unset ( $sources[ $key ] );
		}
	}

	return $sources;
}
