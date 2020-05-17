<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chained 1.0.0
 * @since Chained 1.0.0
 */
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

<?php
get_footer();
