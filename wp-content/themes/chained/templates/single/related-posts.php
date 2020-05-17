<?php
/**
 * The template for displaying related posts in single post
 *
 * @package chained
 * @since chained 1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<section class="related-posts">
    <?php 
    $chained_categories = get_the_category($post->ID);

    if ( $chained_categories ) {
        $chained_category_ids = array();
        foreach($chained_categories as $chained_individual_category) $chained_category_ids[] = $chained_individual_category->term_id;
        $chained_args=array(
        'category__in' => $chained_category_ids,
        'orderby' => 'date',
        'post__not_in' => array($post->ID),
        'posts_per_page'=> get_theme_mod('chained_single_count_related_posts', 8),
        'ignore_sticky_posts'=>1
        );

        $chained_my_query = new wp_query( $chained_args );

        // Get total number of posts
        $chained_num_of_posts = $chained_my_query->found_posts;

        if( $chained_my_query->have_posts() ) { ?> 
            
            <div class="related-posts-intro">
                <h3>
                   <?php echo esc_html(get_theme_mod('chained_single_related_posts_title',__('Related News','chained'))); ?>
                </h3>
                
                <!-- Show arrows only when we need them -->
                <?php if ($chained_num_of_posts > 4) : ?>
                    <div class="entry-related-navigation">  
                        <button id="related_prev_button" class="gallery-navigation-button reset">
                            <?php echo wp_kses(get_template_part('assets/images/svg/arrow-left'), 'svg');?>
                        </button>
                        <button id="related_next_button" class="gallery-navigation-button reset">
                            <?php echo wp_kses(get_template_part('assets/images/svg/arrow-left'), 'svg');?>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
           
            <div class="related-posts-wrapper">

                <?php while( $chained_my_query->have_posts() ) {
                    $chained_my_query->the_post();?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php   
                        if ( has_post_thumbnail() ) : ?>
                            <a class="entry-image" href="<?php the_permalink();?>">
                                <span class="hover" role="presentation"><?php esc_html_e( 'Read More', 'chained' ); ?></span>
                                <img itemprop="image" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'chained-related-post')); ?>">
                            </a>
                        <?php else: ?>
                            <a class="entry-image" href="<?php the_permalink();?>">
                                <span class="hover" role="presentation"><?php esc_html_e( 'Read More', 'chained' ); ?></span>
                                <img itemprop="image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/chained_placeholder.jpg">
                            </a>
                         <?php endif; ?>
                        <h5 class="related-post-title">
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                        </h5>
                    </article>
                <?php } 
                wp_reset_postdata(); ?>
            </div>
        <?php }
    }
?></section>