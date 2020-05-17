<?php
/*-----------------------------------------------------------------------------------------------
	Widget Facebook
	@package v1.0.5
------------------------------------------------------------------------------------------------- */

if ( ! function_exists('chained_facebook_load_widgets') ) :
	add_action( 'widgets_init', 'chained_facebook_load_widgets' );

	function chained_facebook_load_widgets() {
		register_widget( 'Chained_facebook_widget' );
	}
endif;

if ( ! class_exists('Chained_facebook_widget') ) :
	class Chained_facebook_widget extends WP_Widget {

		/**
		 * Widget setup.
		 */
		function __construct() {
			/* Widget settings. */
			$widget_ops = array( 'classname' => 'chained_facebook_widget', 'description' => esc_html__('A widget that displays a Facebook Like Box.', 'chained') );

			/* Widget control settings. */
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'chained_facebook_widget' );

			/* Create the widget. */
			parent::__construct( 'chained_facebook_widget', esc_html__('Chained Facebook Widget', 'chained'), $widget_ops, $control_ops );
		}

		/**
		 * How to display the widget on the screen.
		 */
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$title = apply_filters('widget_title', $instance['title'] );
			$page_url = $instance['page_url'];
			$faces = $instance['faces'];
			$stream = $instance['stream'];
			$header = $instance['header'];
			$cover = $instance['cover'];

			/* Before widget (defined by themes). */
			echo wp_kses_post($before_widget);

			/* Display the widget title if one was input (before and after defined by themes). */
			if ( $title )
				echo wp_kses_post($before_title) . wp_kses_post($title) . wp_kses_post($after_title);
			?>
				<div class="fb-page" data-href="<?php echo esc_url( $page_url ); ?>" data-small-header="<?php if($header) { echo 'true'; } else { echo 'false'; } ?>" data-adapt-container-width="true" data-hide-cover="<?php if($faces) { echo 'false'; } else { echo 'true'; } ?>" data-show-facepile="<?php if($faces) { echo 'true'; } else { echo 'false'; } ?>" data-show-posts="<?php if($stream) { echo 'true'; } else { echo 'false'; } ?>">
					<div class="fb-xfbml-parse-ignore"></div>
				</div>
				<div id="fb-root">
					
				</div>
				<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
			<?php

			/* After widget (defined by themes). */
			echo wp_kses_post($after_widget);
		}

		/**
		 * Update the widget settings.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['page_url'] = esc_url_raw($new_instance['page_url']);
			$instance['faces'] = sanitize_text_field($new_instance['faces']);
			$instance['stream'] = sanitize_text_field($new_instance['stream']);
			$instance['header'] = sanitize_text_field($new_instance['header']);
			$instance['cover'] = sanitize_text_field($new_instance['cover']);

			return $instance;
		}

		function form( $instance ) {

			/* Set up some default widget settings. */
			$defaults = array( 'title' => 'Facebook', 'page_url' => 'https://www.facebook.com/ancientcoderscom', 'faces' => 'on', 'cover' => 'on', 'stream' => 'off', 'header' => 'off' );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__('Title:', 'chained'); ?></label>
				<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:90%;" />
			</p>

			<!-- Page URL -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>"><?php echo esc_html__('Facebook Page URL:', 'chained'); ?></label>
				<input id="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'page_url' )); ?>" value="<?php echo esc_url($instance['page_url']); ?>" style="width:90%;" />
				<small><?php echo esc_html__('Example: https://www.facebook.com/ancientcoderscom', 'chained');?></small>
			</p>

			<!-- Faces -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'faces' )); ?>"><?php echo esc_html__('Show Faces', 'chained'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'faces' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faces' )); ?>" <?php checked( (bool) $instance['faces'], true ); ?> />
			</p>

			<!-- Stream -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'stream' )); ?>"><?php echo esc_html__('Show Posts', 'chained'); ?></label>
				<input type="checkbox" id="<?php echo  esc_attr($this->get_field_id( 'stream' )); ?>" name="<?php echo  esc_attr($this->get_field_name( 'stream' )); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />
			</p>

			<!-- Header -->
			<p>
				<label for="<?php echo  esc_attr($this->get_field_id( 'header' )); ?>"><?php echo esc_html__('Show Header', 'chained'); ?></label>
				<input type="checkbox" id="<?php  echo esc_attr($this->get_field_id( 'header' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'header' )); ?>" <?php checked( (bool) $instance['header'], true ); ?> />
			</p>

			<!-- Cover -->
			<p>
				<label for="<?php echo  esc_attr($this->get_field_id( 'cover' )); ?>"><?php echo esc_html__('Show Cover', 'chained'); ?></label>
				<input type="checkbox" id="<?php echo  esc_attr($this->get_field_id( 'cover' )); ?>" name="<?php echo  esc_attr($this->get_field_name( 'cover' )); ?>" <?php checked( (bool) $instance['cover'], true ); ?> />
			</p>

		<?php
		}
	}

endif;?>