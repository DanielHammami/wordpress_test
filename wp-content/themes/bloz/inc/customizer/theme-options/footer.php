<?php
/**
 *
 *
 * Footer copyright
 *
 *
 */
// Footer copyright
$wp_customize->add_section(
	'bloz_footer_section',
	array(
		'title' => esc_html__( 'Footer', 'bloz' ),
		'panel' => 'bloz_general_panel',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'bloz_copyright_txt',
	array(
		'sanitize_callback' => 'bloz_sanitize_html',
		'default' => $default['bloz_copyright_txt'],
	)
);

$wp_customize->add_control(
	'bloz_copyright_txt',
	array(
		'section'		=> 'bloz_footer_section',
		'label'			=> esc_html__( 'Copyright text:', 'bloz' ),
		'type'			=> 'textarea',
	)
);