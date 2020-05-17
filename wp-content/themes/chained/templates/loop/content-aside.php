<?php
/**
 * The template for displaying the Aside post format on archives.
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

			<div class="entry-content-inner">
				<?php
				the_content( sprintf(
					/* translators: Continue reading post name */
					__( 'Continue reading %s', 'chained' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) ); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="pagination-title">' . esc_html__( 'Pages:', 'chained' ),
					'after'  => '</span></div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'chained' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) ); ?>

				<footer class="entry-footer">
					
					<div class="entry-meta"><?php chained_card_meta(); ?></div><!-- .entry-meta -->
					<?php chained_entry_footer(); ?>

				</footer><!-- .entry-footer -->

			</div>
		</article><!-- #post-## -->
		
	</div>

</div><!-- .grid__item -->