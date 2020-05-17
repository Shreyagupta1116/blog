<?php
/**
 * The template for displaying all single posts.
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
						<?php while ( have_posts() ) : the_post();

							/* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/

							get_template_part( '/templates/single/content-single', get_post_format() );

							if ( false == get_theme_mod('chained_single_hide_author_details', false) ) {
								get_template_part( '/templates/single/author' );
							}

							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							if ( false == get_theme_mod('chained_single_hide_related_posts', false )) : 
								get_template_part( 'templates/single/related', 'posts' );
							endif; 

						endwhile; // end of the loop. ?>
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
