<?php
/**
 * Blog/Archive section 
 */
// Blog/Archive section 
$wp_customize->add_section(
	'bloz_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog', 'bloz' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'bloz' ),
		'panel' => 'bloz_general_panel',
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'bloz_archive_excerpt_length',
	array(
		'sanitize_callback' => 'bloz_sanitize_number_range',
		'default' => 20,
	)
);

$wp_customize->add_control(
	'bloz_archive_excerpt_length',
	array(
		'section'		=> 'bloz_archive_settings',
		'label'			=> esc_html__( 'Excerpt more length:', 'bloz' ),
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);

// Pagination type setting
$wp_customize->add_setting(
	'bloz_archive_pagination_type',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'numeric',
	)
);

$archive_pagination_description = '';

$archive_pagination_choices = array( 
			'disable' => esc_html__( '--Disable--', 'bloz' ),
			'numeric' => esc_html__( 'Numeric', 'bloz' ),
			'older_newer' => esc_html__( 'Older / Newer', 'bloz' ),
		);

$wp_customize->add_control(
	'bloz_archive_pagination_type',
	array(
		'section'		=> 'bloz_archive_settings',
		'label'			=> esc_html__( 'Pagination type:', 'bloz' ),
		'description'	=>  $archive_pagination_description,
		'type'			=> 'select',
		'choices'		=> $archive_pagination_choices,
	)
);

$wp_customize->add_setting(
	'bloz_archive_layout',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'col-2',
	)
);

$wp_customize->add_control(
	'bloz_archive_layout',
	array(
		'section'		=> 'bloz_archive_settings',
		'label'			=> esc_html__( 'Archive Layout', 'bloz' ),
		'type'			=> 'select',
		'choices'		=> array(
				'col-1' 		=> esc_html__( 'Column One', 'bloz' ),
				'col-2' 		=> esc_html__( 'Column Two', 'bloz' ),
				'col-3' 		=> esc_html__( 'Column Three', 'bloz' ),
		),
	)
);