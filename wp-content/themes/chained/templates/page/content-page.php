<?php
/**
 * The template used for displaying page content in page.php
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
		<?php if ( function_exists( 'breadcrumb_trail' ) && true == get_theme_mod( 'changed_global_enable_breadcrumb', true ) ) {
				breadcrumb_trail(); 
		}?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-featured  entry-thumbnail">
				<?php the_post_thumbnail( 'chained-single-image' ); ?>
			</div>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'chained' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'chained' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->