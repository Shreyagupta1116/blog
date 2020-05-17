<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chained
 * @since Chained 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<main id="site-content" role="main">

	<div id="posts" <?php chained_blog_class( '' ); ?>>

		<div class="wrapper" id="masonry-content">
			<div class="grid-gutter"></div>
			<?php chained_the_secondary_page_title(); ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				?>
				<?php get_template_part( 'templates/loop/content', get_post_format() ); ?>
				
			<?php endwhile; ?>

		</div>

		<?php chained_paging_nav(); ?>
	
	</div><!-- #posts -->
</main><!-- #site-content -->

<?php get_footer();