<?php
/**
 * The template part for displaying the content in image.php.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package chained
 * @since Chained 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="entry-attachment" itemprop="image">

			<?php chained_card_categories(); ?>

			<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>

			<?php if ( has_excerpt() ) : ?>

				<div class="entry-caption">

					<?php the_excerpt(); ?>

				</div><!-- .entry-caption -->

			<?php endif; ?>

		</div><!-- .entry-attachment -->

		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links"><span class="pagination-title">' . esc_html__( 'Pages:', 'chained' ),
			'after'  => '</span></div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'chained' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'chained' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->