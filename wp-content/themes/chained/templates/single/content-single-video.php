<?php
/**
 * The template for displaying single video post format posts.
 *
 * @package chained
 * @since chained 1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//get the media objects from the content and bring up only the first one
$media   = chained_video_attachment(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-meta">
			<?php if ( false == get_theme_mod('chained_single_hide_categories', false) ) {
				chained_cats_list();
			}?>
			<?php if ( function_exists( 'breadcrumb_trail' ) && true == get_theme_mod( 'changed_global_enable_breadcrumb', true ) ) {
				breadcrumb_trail(); 
			}?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-posted-on">
			<?php chained_posted_on(); ?>
		</div>

	</header><!-- .entry-header -->
	<?php if ( ! empty( $media ) ) : ?>
		<div class="entry-featured entry-media">
			<?php echo wp_kses_post($media); ?>
		</div><!-- .entry-media -->
	<?php endif; ?>

	<div class="entry-content" itemprop="text">
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