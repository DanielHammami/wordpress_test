<?php
/**
 * General settings
 */
// General settings
$wp_customize->add_section(
	'bloz_general_section',
	array(
		'title' => esc_html__( 'General', 'bloz' ),
		'panel' => 'bloz_general_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'bloz_breadcrumb_enable',
	array(
		'sanitize_callback' => 'bloz_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'bloz_breadcrumb_enable',
	array(
		'section'		=> 'bloz_general_section',
		'label'			=> esc_html__( 'Enable breadcrumb.', 'bloz' ),
		'type'			=> 'checkbox',
	)
);
