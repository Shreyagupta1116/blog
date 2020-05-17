<?php 
/*Extra Options*/

        $wp_customize->add_section( 'polite_extra_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Breadcrumb Settings', 'polite' ),
            'panel'          => 'polite_panel',
        ) );



        /*Breadcrumb Enable*/
        $wp_customize->add_setting( 'polite_options[polite-extra-breadcrumb]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['polite-extra-breadcrumb'],
            'sanitize_callback' => 'polite_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'polite_options[polite-extra-breadcrumb]', array(
            'label'     => __( 'Enable Breadcrumb', 'polite' ),
            'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'polite' ),
            'section'   => 'polite_extra_options',
            'settings'  => 'polite_options[polite-extra-breadcrumb]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );