<?php
/* Notifications in customizer */

require SPASALON_TEMPLATE_DIR . '/functions/customizer-notify/spasalon-customizer-notify.php';

$spasalon_config_customizer = array(
	'recommended_plugins'       => array(
		'webriti-companion' => array(
			'recommended' => true,
			'description' => sprintf( esc_html__( 'Install and activate the %s plugin to take full advantage of all the features this theme has to offer.', 'spasalon' ), sprintf( '<strong>%s</strong>', 'Webriti Companion' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'spasalon' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'spasalon' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'spasalon' ),
	'activate_button_label'     => esc_html__( 'Activate', 'spasalon' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'spasalon' ),
);
Spasalon_Customizer_Notify::init( apply_filters( 'spasalon_customizer_notify_array', $spasalon_config_customizer ) );