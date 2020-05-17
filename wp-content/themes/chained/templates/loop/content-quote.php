<?php
/**
 * The template for displaying the quote post format on archives.
 *
 * @package chained
 * @since Chained 1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="masonry-panel">

	<div class="masonry-panel__content">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php chained_card_categories(); ?>

			<div class="entry-content">

				<?php if ( has_post_thumbnail() ) : ?>

					<a href="<?php the_permalink(); ?>" class="entry-image">

						<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
							<span class="sticky-post accent-color"></span>
						<?php endif; ?>
						
						<span class="hover" role="presentation"><?php esc_html_e( 'Read More', 'chained' ); ?></span>

						<div class="entry-image-wrapper">
							
							<?php the_post_thumbnail( 'chained-masonry-image', array( 'itemprop' => 'image' ) ); ?>
							
							<div class="content-quote" itemprop="citation" itemscope itemtype="http://schema.org/Book">
								<div class="content-quote-wrapper">
									<div class="quote">
										<?php echo wp_kses(get_template_part('assets/images/svg/quote'), 'svg');?>
									</div>
									<blockquote>
										<?php the_post_thumbnail_caption(); ?>
										<cite>
											<?php echo wp_kses_post(get_post(get_post_thumbnail_id())->post_content); ?>
										 </cite>
									</blockquote>
								</div>
							</div>
						</div>

					</a>
				<?php endif; ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php chained_entry_footer(); ?>

				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="sticky-post accent-color">
						<?php esc_html_e('Featured', 'chained'); ?>
					</span>
				<?php endif; ?>
			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->
		
	</div>

</div><!-- .grid__item -->