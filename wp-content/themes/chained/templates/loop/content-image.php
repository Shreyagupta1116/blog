<?php
/**
 * The template for displaying the image post format on archives.
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

			<?php if ( has_post_thumbnail() ) : ?>

				<a class="entry-image entry-image--landscape" href="<?php the_permalink(); ?>">

					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<span class="sticky-post accent-color"></span>
					<?php endif; ?>

					<div class="entry-image-wrapper">
						<?php the_post_thumbnail( 'chained-masonry-image', array( 'itemprop' => 'image' ) ); ?>
					</div>
				</a>

				<div class="entry-meta"><?php chained_card_meta(); ?></div><!-- .entry-meta -->

			<?php endif; ?>
		
		</article><!-- #post-## -->
		
	</div>

</div><!-- .grid__item -->