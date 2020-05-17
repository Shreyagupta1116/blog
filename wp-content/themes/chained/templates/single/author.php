<?php
/**
 * The template for displaying info author on single post
 *
 * @package chained
 * @since chained 1.0.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Get Author Data
$author             = get_the_author();
$author_description = get_the_author_meta( 'description' );
$author_url         = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
$author_avatar      = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'chained_author_bio_avatar_size', 128 ) );

// Only display if author has a description
if ( $author_description ) : ?>

    <div class="author-info">
        <div class="author-info-inner">
            <?php if ( $author_avatar && false == get_theme_mod('chained_single_hide_avatar', false ) ) : ?>
                <div class="author-avatar">
                    <a href="<?php echo esc_url( $author_url ); ?>" rel="author">
                        <?php echo wp_kses_post($author_avatar); ?>
                    </a>
                </div><!-- .author-avatar -->
            <?php endif; ?>
            <div class="author-description">
            	<h6 class="author-name" span itemprop="name">
            		<a href="<?php echo esc_url( $author_url ); ?>" title="<?php esc_attr( 'View all author posts', 'chained' ); ?>">
            		<?php printf(
                    /* translators: written by post author */
                     esc_html__( 'by %s', 'chained' ), esc_html( $author ) ); ?>
            		 </a>
            	</h6>
                <p><?php echo wp_kses_post( $author_description ); ?></p>
                
            </div><!-- .author-description -->
        </div><!-- .author-info-inner -->
    </div><!-- .author-info -->

<?php endif; 