<?php
/**
 * Header Style 1 for the Chained WordPress theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chained
 * @since Chained 1.0.4
 */

?><!DOCTYPE html>


<header id="masthead" class="site-header header-style-1" itemscope itemtype="http://schema.org/WPHeader">

	<div class="wrapper">
		<div class="header-left">
		 	<div class="site-offcanvas-opener">
				<button class="reset" id="offcanvas-navigation-open">
					<span class="screen-reader-text"><?php echo esc_html_e('Menu', 'chained');?></span>
					<?php echo wp_kses(get_template_part('assets/images/svg/menu-icon'), 'svg');?>
				</button>
				<!-- Offcanvas Navigation and Sidebar -->
				<aside class="offcanvas-navigation">
				    <div class="offcanvas-content">
				        <button class="reset" id="offcanvas-navigation-close">
				            <?php echo wp_kses(get_template_part('assets/images/svg/close', 'icon'), 'svg');?>
				        </button>
				        <nav class="offcanvas-navigation-wrapper">
				            <?php 
				            // the nav menu
				             wp_nav_menu( array(
				                'theme_location' => 'primary',
				                'container'      => 'offcanvas-menu',
				                'menu_class'     => 'nav nav--main offcanvas',
				                'fallback_cb' => false,
				            ) ); 
				            ?>
				            <?php
				            // the social menu
				            wp_nav_menu( array(
				                'theme_location' => 'social',
				                'container'      => '',
				                'menu_class'     => 'nav nav--social',
				                'link_before'     => '<span class="screen-reader-texts">',
				                'link_after'      => '</span>',
				                'fallback_cb' => false,
				             ) ); ?>
				        </nav>
				        <div class="sidebar widget-area">
				            <?php get_sidebar(); ?>
				        </div>
				    </div>
				</aside><!-- Offcanvas Navigation and Sidebar -->
			</div>


			<nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php
				//the primary menu
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => '',
					'menu_class'     => 'nav nav--main',
					'fallback_cb' 	 => false,
				
				) ); ?>
				
			</nav>
		</div>

		<div class="site-branding" itemscope itemtype="http://schema.org/Organization">
		
			<?php if ( function_exists( 'jetpack_the_site_logo' ) ) { // display the Site Logo if present
				jetpack_the_site_logo();
			} else {
				the_custom_logo();
			} ?>

			<?php 
				$chained_is_site_title = get_theme_mod('chained_site_identity_show_title', true); 
			?>

			<?php if ( $chained_is_site_title ) : ?>

				<!-- on the front page and home page we use H1 for the title  -->
				<?php echo ( is_front_page() && is_home() ) ? '<h1 class="site-title">' : '<div class="site-title">'; ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				<?php echo ( is_front_page() && is_home() ) ? '</h1>' : '</div>'; ?>

			<?php endif; ?>

			<?php 
				$chained_is_description = get_theme_mod('chained_site_identity_show_desc', true);
			 ?> 

			<?php if ( $chained_is_description ) : 
				$chained_description = get_bloginfo( 'description', 'display' );
				if ( $chained_description || is_customize_preview() ) : ?>
					<div class="site-description">
						<span class="site-description-text"><?php bloginfo( 'description' ); ?></span>
					</div>
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .site-branding -->

		<nav id="social-navigation" class="social-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php
			// the social menu
			wp_nav_menu( array(
				'theme_location' => 'social',
				'container'      => '',
				'menu_class'     => 'nav nav--social',
				'link_before'     => '<span class="screen-reader-texts">',
				'link_after'      => '</span>',
				'fallback_cb' => false,
			 ) ); ?>
			
			 <div class="site-search-opener">
			 	<button class="reset" id="offcanvas-search-open">
			 		<?php echo wp_kses(get_template_part('assets/images/svg/search-icon'), 'svg');?>
			 	 </button>
			 </div>
			
		</nav>
	</div>

</header><!-- #masthead -->