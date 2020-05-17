<?php
/**
 * The template for displaying the video post format on archives.
 *
 * @package chained
 * @since chained 1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//get the media objects from the content and bring up only the first one
$media = chained_video_attachment();

?>

<div class="masonry-panel">

	<div class="masonry-panel__content">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php chained_card_categories(); ?>

			<?php if ( ! empty( $media ) ) : ?>

				<div class="entry-media" itemprop="video">
					<?php echo wp_kses_post($media); ?>
				</div><!-- .entry-media -->

			<?php endif; ?>

			<div class="entry-content-inner">

				<header <?php chained_post_title_class(); ?>>

					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

				</header><!-- .entry-header -->

				<div class="entry-meta"><?php chained_card_meta(); ?></div><!-- .entry-meta -->
				
				<?php if ( get_theme_mod('chained_masonry_blog_excerpt_visibility', true) ) : ?>
						
					<div <?php chained_post_excerpt_class(); ?>>
						
						<?php the_excerpt();

						wp_link_pages( array(
							'before' => '<div class="page-links"><span class="pagination-title">' . esc_html__( 'Pages:', 'chained' ),
							'after'  => '</span></div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'chained' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) ); ?>

					</div><!-- .entry-content -->
				<?php endif; ?>

				<footer class="entry-footer">
					<?php chained_entry_footer(); ?>

					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<span class="sticky-post accent-color">
							<?php esc_html_e('Featured', 'chained'); ?>
						</span>
					<?php endif; ?>
				</footer><!-- .entry-footer -->

			</div>

		</article><!-- #post-## -->
		
	</div>

</div><!-- .grid__item -->