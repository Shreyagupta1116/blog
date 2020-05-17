<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('polite_breadcrumb_options')) :
    function polite_breadcrumb_options()
    {
        global $polite_theme_options;
        if (1 == $polite_theme_options['polite-extra-breadcrumb']) {
            polite_breadcrumbs();
        }
    }
endif;
add_action('polite_breadcrumb_options_hook', 'polite_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('polite_breadcrumbs')):
    function polite_breadcrumbs()
    {
        if (!function_exists('polite_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        polite_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('polite_breadcrumbs_hook', 'polite_breadcrumbs');