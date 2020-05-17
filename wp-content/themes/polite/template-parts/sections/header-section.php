<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Polite
 */
$GLOBALS['polite_theme_options'] = polite_get_options_value();
global $polite_theme_options;
$offcanvas = absint($polite_theme_options['polite_enable_offcanvas']);
$search_header = absint($polite_theme_options['polite_enable_search']);
?>
<?php if( 1 == $offcanvas ){ ?>
<div class="myCanvasNav canvi-navbar">
	<div class="canvi-user-info">
	    <div class="canvi-user-info__data">
	        <span class="canvi-user-info__title"><?php bloginfo( 'name' ); ?></span>
	        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="canvi-user-info__meta"><?php esc_html_e('View site', 'polite'); ?></a>
	        <div class="canvi-user-info__close closebtn"></div>
	    </div>
	</div>
	<?php if ( is_active_sidebar('offcanvas') ) { ?>
		<div class="offcanvas-sidebar-area">
			<?php dynamic_sidebar('offcanvas'); ?>
		</div>
	<?php }else{ ?>	
	<div class="default-widgets">
		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
		<div class="widget widget_categories">
			<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'polite' ); ?></h2>
			<ul>
				<?php
				wp_list_categories( array(
					'orderby'    => 'count',
					'order'      => 'DESC',
					'show_count' => 1,
					'title_li'   => '',
					'number'     => 10,
				) );
				?>
			</ul>
		</div>
	</div>
	<?php } ?>
</div>
<?php } ?>
<div class="js-canvi-content canvi-content">
<header class="header-1">		
	<?php $header_image = esc_url(get_header_image());
	$header_class = ($header_image == "") ? '' : 'header-image';
	?>
	<section class="main-header <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<div class="head_one clearfix">
			<div class="container">
				<div class="logo">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				endif;
				$polite_description = get_bloginfo( 'description', 'display' );
				if ( $polite_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $polite_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-logo -->
		</div>
	</div>
	<div class="menu-area">
		<div class="container">					
			<nav id="site-navigation">
				<?php if( 1 == $offcanvas ){ ?>
					<button class="js-canvi-open-button--left mobile-menu"><span></span></button>
				<?php } ?>
				<?php if( 1 == $search_header ){ ?>
					<div class="search-wrapper">					
						<div class="search-box">
							<a href="javascript:void(0);" class="s_click"><i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i></a>
							<a href="javascript:void(0);" class="s_click"><i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i></a>
						</div>
						<div class="search-box-text">
							<?php echo get_search_form(); ?>
						</div>				
					</div>
				<?php } ?>

				<button class="bar-menu">
					<div class="line-menu line-half first-line"></div>
					<div class="line-menu"></div>
					<div class="line-menu line-half last-line"></div>
					<a><?php _e('Menu', 'polite'); ?></a>
				</button>
				<div class="main-menu menu-caret">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container' => 'ul',
						'menu_class'      => ''
					));
					?>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</div>
</setion><!-- #masthead -->
</header>

