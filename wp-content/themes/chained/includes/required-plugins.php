<?php

/*-----------------------------------------------------------------------------------------------
	Required Plugins
	@package v1.0.2
------------------------------------------------------------------------------------------------- */
get_template_part( '/includes/required-plugins/class-tgm-plugin-activation' );

function chained_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	
	$protocol = 'http:';
	if ( is_ssl() ) {
		$protocol = 'https:';
	}
	
	$plugins = array(
		array(
			'name'               => 'Kirki',
			'slug'               => 'kirki',
			'required'           => false,
			'version'            => '3.0.45',
		),
		array(
			'name'               => 'Jetpack',
			'slug'               => 'jetpack',
			'required'           => false,
		),
		array(
			'name'               => 'Smash Balloon Social Photo Feed',
			'slug'               => 'instagram-feed',
			'required'           => false,
			'version'            => '2.1.5',
		),
	);

	$config = array(
		'domain'           => 'chained', // Text domain - likely want to be the same as your theme.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'menu'             => 'install-required-plugins', // Menu slug
		'has_notices'      => true, // Show admin notices or not
		'is_automatic'     => false, // Automatically activate plugins after installation or not
		'message'          => '', // Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => __( 'Install Required Plugins', 'chained' ),
			'menu_title'                      => __( 'Install Plugins', 'chained' ),
			/* translators: Installing plugin: plugin name */
			'installing'                      => __( 'Installing Plugin: %s', 'chained' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'chained' ),
			/* translators: Theme requires: plugin name, plugin names */
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'chained' ),
			/* translators: Theme recomments: plugin name, plugin names */
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'chained' ),
			/* translators: Not enough permissions to install: plugin name */
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'chained' ),
			/* translators: Required Plugin currently inactive: plugin name */
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'chained' ),
			/* translators: Recommented Plugin currently inactive: plugin name */
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'chained' ),
			/* translators: Not enough permissions to activate: plugin name */
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'chained' ),
			/* translators: Needs to be updated to the last version to ensure compatibility: plugin name */
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'chained' ),
			/* translators: Not enough permissions to activate: plugin name */
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'chained' ),
			/* translators: Begin installing plugin, plugins */
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'chained' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'chained' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'chained' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'chained' ),
			/* translators: All pluggins activated sucesfully: plugin names */
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'chained' )
		)
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'chained_register_required_plugins', 999 );