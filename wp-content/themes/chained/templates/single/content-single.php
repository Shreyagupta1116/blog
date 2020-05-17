<?php
/**
 * The template for displaying the post content on single post view
 *
 * @package chained
 * @since chained 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-meta">
			<?php if ( false == get_theme_mod('chained_single_hide_categories', false) ) {
				chained_cats_list();
			}
			if ( function_exists( 'breadcrumb_trail' ) && true == get_theme_mod( 'changed_global_enable_breadcrumb', true ) ) {
				breadcrumb_trail(); 
			}
			?>
		</div><!-- .entry-categories -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-posted-on">
			<?php chained_posted_on(); ?>
		</div>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail()) : ?>
		<div class="entry-featured  entry-thumbnail">
			<?php the_post_thumbnail( 'chained-single-image',  array( 'itemprop' => 'image' )  ); ?>
		</div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'chained' ),
			'after'  => '</div>',
		) ); ?>
	</div><!-- .entry-content -->
	 
	<footer class="entry-footer">
		<?php chained_single_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->