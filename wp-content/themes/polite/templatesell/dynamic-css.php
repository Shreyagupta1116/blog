<?php
/**
 * Dynamic css
 *
 * @since Polite 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('polite_dynamic_css')) :

    function polite_dynamic_css()
    {
        global $polite_theme_options;

        /* Color Options Options */
        $polite_primary_color              = esc_attr($polite_theme_options['polite_primary_color']);

        $custom_css = '';

        //Primary  Background 
        if (!empty($polite_primary_color)) {
            $custom_css .= "
            #toTop:hover,
            a.effect:before,
            .show-more,
            a.link-format,
            .tabs-nav li:before,
            .post-slider-section .s-cat,
            .sidebar-3 .widget-title:after,
            .bottom-caption .slick-current .slider-items span,
            aarticle.format-status .post-content .post-format::after,
            article.format-chat .post-content .post-format::after, 
            article.format-link .post-content .post-format::after,
            article.format-standard .post-content .post-format::after, 
            article.format-image .post-content .post-format::after, 
            article.hentry.sticky .post-content .post-format::after, 
            article.format-video .post-content .post-format::after, 
            article.format-gallery .post-content .post-format::after, 
            article.format-audio .post-content .post-format::after, 
            article.format-quote .post-content .post-format::after{ 
                background-color: ". $polite_primary_color."; 
                border-color: ".$polite_primary_color.";
            }";

        }

        //Primary Color
        if (!empty($polite_primary_color)) {
            $custom_css .= "
            .main-header a:hover, 
            .main-header a:focus, 
            .main-header a:active,
            .top-menu > ul > li > a:hover,
            .main-menu ul li.current-menu-item > a, 
            .header-2 .main-menu > ul > li.current-menu-item > a,
            .main-menu ul li:hover > a,
            .post-navigation .nav-links a:hover, 
            .post-navigation .nav-links a:focus,
            .tabs-nav li.tab-active a, 
            .tabs-nav li.tab-active,
            .tabs-nav li.tab-active a, 
            .tabs-nav li.tab-active,
            ul.trail-items li a:hover span,
            .author-socials a:hover,
            .post-date a:focus, 
            .post-date a:hover,
            .post-excerpt a:hover, 
            .post-excerpt a:focus, 
            .content a:hover, 
            .content a:focus,
            .post-footer > span a:hover, 
            .post-footer > span a:focus,
            .widget a:hover, 
            .widget a:focus,
            .footer-menu li a:hover, 
            .footer-menu li a:focus,
            .footer-social-links a:hover,
            .footer-social-links a:focus,
            .site-footer a:hover, 
            .site-footer a:focus, .content-area p a{ 
                color : ". $polite_primary_color."; 
            }";
        }

        wp_add_inline_style('polite-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'polite_dynamic_css', 99);