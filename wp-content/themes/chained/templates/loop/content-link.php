<?php
/**
 * The template for displaying the link post format on archives.
 *
 * @package chained
 * @since Chained 1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="masonry-panel">

	<div class="masonry-panel__content">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php chained_card_categories(); ?>

			<?php $first_link = chained_get_post_first_link(); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php echo esc_url($first_link); ?>" class="entry-image">
					<?php the_post_thumbnail( 'chained-masonry-image' ); ?>
					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<span class="sticky-post accent-color"></span>
					<?php endif; ?>
					<span class="link-icon">
						<?php echo wp_kses(get_template_part('assets/images/svg/link-icon'), 'svg');?>
					</span>
				</a>
			<?php endif; ?>

			<div class="entry-content-inner">

				<header <?php chained_post_title_class(); ?>>
					<?php the_title( sprintf( '
					<h1 class="entry-title">
						<a itemprop="url" href="%s" rel="bookmark">', esc_url( $first_link ) ), '</a>
					</h1>' ); ?>
					<span class="link-icon">
						<?php echo wp_kses(get_template_part('assets/images/svg/link-icon'), 'svg');?>
					</span>
				</header><!-- .entry-header -->
				
				<footer class="entry-footer">
					<?php chained_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>

		</article><!-- #post-## -->

	</div> <!-- .masonry-panel__content -->

</div><!-- .masonry-panel -->