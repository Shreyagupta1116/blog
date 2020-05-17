<?php
/*-----------------------------------------------------------------------------------------------
    Widget About Me
    @package v1.0.5
------------------------------------------------------------------------------------------------- */
/* *
 * @package chained
 */

if ( ! function_exists( 'Chained_about_me_widget_init' ) ) :
    /**
     * Register the widget for use in Appearance -> Widgets
     */
    add_action( 'widgets_init', 'Chained_about_me_widget_init' );
    function Chained_about_me_widget_init() {
        register_widget( 'Chained_about_me_widget' );
    }
endif;

if ( ! class_exists( 'Chained_about_me_widget' ) ) :

    class Chained_about_me_widget extends WP_Widget {
        var $defaults = array(
            'title'    => '',
            'name'     => '',
            'text'     => '',
            'image_id' => 0,
            'filter'   => 0,
        );

        /**
         * Register widget with WordPress.
         */
        public function __construct() {
            parent::__construct(
                'chained-about-me',
                apply_filters( 'chained_widget_name', esc_html__( 'Chained About Me', 'chained' ) ),
                array(
                    'classname'   => 'widget_chained_about_me',
                    'description' => esc_html__( 'Display some info about you with an image.', 'chained' )
                )
            );

            add_action( 'admin_init', array( $this, 'admin_init' ) );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {

            $placeholders = $this->get_placeholder_strings();
            //only put in the default title if the user hasn't saved anything in the database e.g. $instance is empty (as a whole)
            $title = apply_filters( 'widget_title', empty( $instance ) ? $placeholders['title'] : $instance['title'], $instance, $this->id_base );
            $name = empty( $instance ) ? $this->defaults['name'] : $instance['name'];
            $text = empty( $instance ) ? $this->defaults['text'] : $instance['text'];
            $image_ID = empty( $instance ) ? $this->defaults['image_id'] : $instance['image_id'];
            $filter_wpautop = empty( $instance['filter'] ) ? $this->defaults['filter'] : $instance['filter'];

            $args['before_widget'] = substr( $args['before_widget'], 0, -1 ) . ' tabindex="0">';
            echo wp_kses_post($args['before_widget']) . "\n";

            // The Background Image - empty string in case of error
            $thumb = wp_get_attachment_image_src( $image_ID, 'chained-masonry-image' );
            if ( false !== $thumb ) {
                $thumb = $thumb[0];
            } else {
                $thumb = '';
            }
            echo '<div class="widget_chained-about-me-widget__image">' . "\n";
            echo '<img src="'. wp_kses_post($thumb) .'">';
            // The widget title
            if ( ! empty( $title ) ) {
                echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']) . "\n";
            }
            echo '</div>';
            echo '<div class="widget_chained-about-me-widget__container">' . "\n";

            // The author's name
            if ( ! empty( $name ) ) {
                echo '<div class="widget_chained-about-me-widget__name">' . wp_kses_post($name) . '</div>' . "\n";
            }

            // About the author - to add paragraphs or not to add, that is the question
            // If the user gave us nothing to work with, let him know
            if ( empty( $title ) && empty( $name ) && empty( $text ) ) {
                $text = $placeholders['no_content'];
            }
            if ( ! empty( $filter_wpautop ) ) {
                $text = wpautop( $text );
            }

            echo '<div class="widget_chained-about-me__text">' . wp_kses_post($text) . '</div>' . "\n";

            echo '</div>' . "\n";

            echo wp_kses_post($args['after_widget']) . "\n";

        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {

            $instance = $old_instance;

            $instance['title']    = wp_strip_all_tags( $new_instance['title'] );
            $instance['name']     = wp_strip_all_tags( $new_instance['name'] );
            $instance['image_id'] = absint( $new_instance['image_id'] );
            $instance['text']     = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
            $instance['filter']   = isset( $new_instance['filter'] );

            return $instance;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {
            $original_instance = $instance;

            //Defaults
            $instance = wp_parse_args(
                (array) $instance,
                $this->defaults );

            $placeholders = $this->get_placeholder_strings();

            $title = $instance['title'];
            //if the user is just creating the widget ($original_instance is empty)
            if ( empty( $original_instance ) && empty( $title ) ) {
                $title = $placeholders['title'];
            }

            $image_id = $instance['image_id'];
            $name = $instance['name'];
            $text = $instance['text'];
            ?>

            <div class="chained-about-me-widget-form">
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title:', 'chained' ); ?></label>
                    <input class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
                </p>

                <p class="chained-about-me-widget-image-control<?php echo ( $image_id ) ? ' has-image' : ''; ?>"
                   data-title="<?php esc_attr_e( 'Choose an Background Image', 'chained' ); ?>"
                   data-update-text="<?php esc_attr_e( 'Update Image', 'chained' ); ?>">
                    <?php
                    if ( ! empty( $image_id ) ) {
                        echo wp_get_attachment_image( $image_id, 'medium', false );
                    }
                    ?>
                    <input class="chained-about-me-image-id" type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'image_id' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'image_id' ) ); ?>" value="<?php echo esc_attr( $image_id ); ?>">
                    <a class="button chained-about-me-widget-image-control__choose" href="#"><?php esc_html_e( 'Choose an Background Image', 'chained' ); ?></a>
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Your Name:', 'chained' ); ?></label>
                    <input class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" value="<?php echo esc_attr( $name ); ?>">
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Something About You:', 'chained' ); ?></label>

                    <input maxlength="250" type="text" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" id="
                    <?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" value="<?php echo esc_attr( $text ); ?>">
                </p>

                <p>
                    <?php echo esc_html_e( 'Max. 250 characters', 'chained' ); ?>
                </p>

            </div>
        <?php
        }

        public function admin_init() {
            global $pagenow;

            if ( 'widgets.php' == $pagenow ) {
                //the scripts are enqueued on wp_enqueue_media - see functions.php
                wp_enqueue_media();

                if ( is_rtl() ) {
                    wp_enqueue_style( 'chained-about-me-widget-admin', get_template_directory_uri() . '/includes/widgets/widget-about-me/widget-about-me-rtl.css' );
                } else {
                    wp_enqueue_style( 'chained-about-me-widget-admin', get_template_directory_uri() . '/includes/widgets/widget-about-me/widget-about-me.css' );
                }
            }
        }

        private function get_placeholder_strings() {
            $placeholders = apply_filters( 'Chained_about_me_widget_backend_placeholders', array() );

            $placeholders = wp_parse_args(
                (array) $placeholders,
                array(
                    'title'    => esc_html__( 'About Me', 'chained' ),
                    'no_content' => esc_html__( 'You should really tell the world something about you. They want to know!', 'chained' ),
                ) );

            return $placeholders;
        }

    } // Class chained About Me Widget

endif; ?>