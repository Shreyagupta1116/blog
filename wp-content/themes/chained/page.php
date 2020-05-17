<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Chained
 * @since Chained 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<main id="site-content" role="main">
		<div class="single-content">
			<div class="wrapper">
				<div class="single-content-wrapper">
					<div class="single-content-inner">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'templates/page/content', 'page' ); ?>

							<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; ?>

						<?php endwhile; // end of the loop. ?>
					</div>
					<div id="sidebar">
						<?php get_template_part( 'sidebar-single' ); ?>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
