<?php
/**
 * The template for displaying the footer
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chained
 * @since Chained 1.0.1
 */

?>
    </div> <!-- site -->
    
    <!-- Offcanvas Search -->
    <aside class="offcanvas-search">
        <button class="reset" id="offcanvas-search-close">
            <?php echo wp_kses(get_template_part('assets/images/svg/close-icon'), 'svg');?>
        </button>
        <div class="offcanvas-search-content">
            <?php get_search_form(); ?>
        </div>
    </aside><!-- Offcanvas Search -->
    <!-- Instagram Section -->
    <?php if ( true == get_theme_mod( 'chained_footer_instagram_enable', false ) && is_home() ) : ?>
         <section id="block-instagram" class="block-instagram">
            <?php echo wp_kses(apply_shortcodes( get_theme_mod( 'chained_footer_instagram_shortcode', '[instagram-feed num=6 cols=6 showheader=false showbutton=false showfollow=false]' ) ), 'post'); ?>
        </section>
    <?php endif; ?><!-- Instagram Section -->

         <!-- Footer -->
    <footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    	<div class="wrapper">
    		<?php
    		wp_nav_menu( array(
    			'theme_location' => 'footer',
    			'container'      => '',
    			'menu_class'     => 'nav nav--footer',
    			'depth'          => 1,
    			'fallback_cb'    => '',
    		) ); ?>
            <?php chained_footer_the_copyright(); ?>
    	</div>
    	<div class="back-to-top">
    		<a href="#back_to_top" class="back-to-top-button">
    			<?php wp_kses(get_template_part( 'assets/images/svg/arrow-up' ), 'svg'); ?>
    		</a>
    	</div>
    </footer><!-- #colophon -->

	<?php wp_footer(); ?>
	</body>
</html>