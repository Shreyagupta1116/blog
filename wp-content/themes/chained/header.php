<?php
/**
 * Header file for the Chained WordPress theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chained
 * @since Chained 1.0.4
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'chained' ); ?>
		</a>

		<div class="body__before"></div>
		
		<div id="page" class="site">

		<?php if ( true == get_theme_mod('chained_show_top_bar', false ) ) {
			echo wp_kses_post(get_template_part('templates/headers/topbar'));
		}
		?>

		<?php
			wp_kses_post(get_template_part( 'templates/headers/header', 'style-1')); 
		?>