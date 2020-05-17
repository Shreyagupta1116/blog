<?php

/*-----------------------------------------------------------------------------------------------
    Widget Recent Posts
    @package v1.0.5
------------------------------------------------------------------------------------------------- */

if ( ! function_exists('chained_recent_posts_widget') ) :
    add_action( 'widgets_init', 'chained_recent_posts_widget' );

    function chained_recent_posts_widget() {
        register_widget( 'chained_recent_posts_with_images' );
    }
endif;

if ( ! class_exists('chained_recent_posts_with_images') ) :
    class chained_recent_posts_with_images extends WP_Widget {
       
        /**
         * Widget setup.
         */
        function __construct() {
            /* Widget settings. */
            $widget_ops = array(
                'classname'                   => 'widget_chained_recentpost_widget',
                'description'                 => __( 'Your site&#8217;s most recent Posts with featured images', 'chained' ),
                'customize_selective_refresh' => true,
            );
            /* Create the widget. */
            parent::__construct( 'chained_recent_posts_with_images', __( 'Chained Recent Posts With Images','chained' ), $widget_ops );
            $this->alt_option_name = 'chained_recentposts_widget';
        }
       
        function widget( $args, $instance ) {
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }
            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'chained' );
            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number ) {
                $number = 5;
            }
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
            $recents = new WP_Query(
               
                apply_filters(
                    'chained_widget_posts_args',
                    array(
                        'posts_per_page'      => $number,
                        'no_found_rows'       => true,
                        'post_status'         => 'publish',
                        'ignore_sticky_posts' => true,
                    ), $instance)
            );
            if ( ! $recents->have_posts() ) {
                return;
            }
            ?>
            <?php echo wp_kses_post($args['before_widget']); ?>
            <?php
            if ( $title ) {
                echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);
            }
            ?>
            <div class="widget-post">
                <ul>
                    <?php foreach ( $recents->posts as $recent_post ) : ?>
                        <?php
                        $post_title   = get_the_title( $recent_post->ID );
                        $title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', 'chained' );
                        $aria_current = '';
                        if ( get_queried_object_id() === $recent_post->ID ) {
                            $aria_current = ' aria-current="page"';
                        }
                        ?>
                        <li class="post-wrap">
                            <a class="image" href="<?php the_permalink( $recent_post->ID ); ?>"<?php echo esc_attr($aria_current); ?>>
                                <?php if (has_post_thumbnail($recent_post->ID)) :?>
                                   <?php echo get_the_post_thumbnail($recent_post->ID); 
                                ?>
                                <?php else: ?>
                                   <img src="<?php echo esc_attr(get_template_directory_uri());?>/assets/images/chained_placeholder.jpg" alt="Chained Placeholder">
                                <?php endif; ?>
                            </a>
                            <div class="content">
                                <h6 class="title">
                                    <a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo esc_html($title); ?></a>
                                </h6>
                                <?php if ( $show_date ) : ?>
                                    <span class="entry-date">
                                        <?php echo get_the_date( '', $recent_post->ID ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                           
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
          
            <?php
            echo wp_kses_post($args['after_widget']);
        }
        
        function update( $new_instance, $old_instance ) {
            $instance              = $old_instance;
            $instance['title']     = sanitize_text_field( $new_instance['title'] );
            $instance['number']    = (int) $new_instance['number'];
            $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
            return $instance;
        }
        
        function form( $instance ) {
            $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
            $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
            ?>
            <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html__( 'Title:', 'chained' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" placeholder="<?php echo esc_attr__( 'Recent Posts', 'chained' ); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

            <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html__( 'Number of posts to show:', 'chained' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3" /></p>

            <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php echo esc_html__( 'Display post date?', 'chained' ); ?></label></p>
            <?php
        }
    }

endif; ?>