<?php
/*
 * Template Name: Boxed
 * Template Post Type: page
 *
 * @package Chained
 * @since Chained 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<main id="site-content" role="main">
		<div class="single-content boxed">
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
