<?php
/**
 * The template for displaying single quote post format posts.
 *
 * @package chained
 * @since chained 1.0.2
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
			?>
			<?php if ( function_exists( 'breadcrumb_trail' ) && true == get_theme_mod( 'changed_global_enable_breadcrumb', true ) ) {
				breadcrumb_trail(); 
			}?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-posted-on">
			<?php chained_posted_on(); ?>
		</div>
	</header><!-- .entry-header -->
	<?php if ( has_post_thumbnail()) : ?>
		<div class="entry-featured  entry-thumbnail">
			<?php the_post_thumbnail( 'chained-single-image',  array( 'itemprop' => 'image' )  );
			 ?>
			<div class="content-quote" itemprop="citation" itemscope itemtype="http://schema.org/Book">
				<div class="content-quote-wrapper">
					<div class="quote">
						<?php echo wp_kses(get_template_part('assets/images/svg/quote'), 'svg');?>
					</div>
					<blockquote>
						<?php the_post_thumbnail_caption(); ?>
						<cite><?php echo wp_kses_post(get_post(get_post_thumbnail_id())->post_content); ?> </cite>
					</blockquote>
				</div>
			</div>
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