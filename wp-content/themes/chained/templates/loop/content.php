<?php
/**
 * The default template for displaying individual posts on archives
 *
 * @package chained
 * @since chained 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
	

<div class="masonry-panel">

	<div class="masonry-panel__content">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

			<?php chained_card_categories(); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" class="entry-image">
					<span class="hover" role="presentation"><?php esc_html_e( 'Read More', 'chained' ); ?></span>
					<div class="entry-image-wrapper">
						<?php the_post_thumbnail( 'chained-masonry-image', array( 'itemprop' => 'image' ) ); ?>
						<span class="icon-round"></span>
					</div>
				</a>
			<?php endif; ?>

			<div class="entry-content-inner">
				
				<?php
				//just in case there is no title, no need for the <header>
				$chained_temp_title = get_the_title();

				if ( ! empty( $chained_temp_title ) ) : ?>

					<header <?php chained_post_title_class(); ?>>

						<?php if ( is_sticky() && ! has_post_thumbnail() && is_home() && ! is_paged() ) : ?>
							<span class="sticky-post"></span>
						<?php endif; ?>

						<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

					</header><!-- .entry-header -->

					<div class="entry-meta">
						<?php chained_card_meta(); ?>
						<?php if (get_theme_mod('chained_single_reading_time', true)) : ?>
							<span class="entry-reading-time">
								<?php echo wp_kses(get_template_part('assets/images/svg/reading-time'), 'svg');?>
								<?php chained_count_content_words(get_the_ID()); 
								?>
							</span>
						<?php endif; ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				
				<div <?php chained_post_excerpt_class(); ?> itemprop="text">
					<?php 

					if ( get_theme_mod('chained_masonry_blog_excerpt_visibility', true) ) {
						chained_post_excerpt();
					}

					wp_link_pages( array(
						'before' => '<div class="page-links"><span class="pagination-title">' . esc_html__( 'Pages:', 'chained' ),
						'after'  => '</span></div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'chained' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) ); ?>

				</div><!-- .entry-content -->

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