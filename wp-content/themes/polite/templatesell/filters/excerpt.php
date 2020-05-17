<?php
/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 */
if (!function_exists('polite_excerpt_more')) :
    function polite_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'polite_excerpt_more');

/**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if (!function_exists('polite_alter_excerpt')) :
    function polite_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }
        global $polite_theme_options;
        $excerpt_length = absint($polite_theme_options['polite-excerpt-length']);
        if (!empty($excerpt_length)) {
            return $excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'polite_alter_excerpt');
