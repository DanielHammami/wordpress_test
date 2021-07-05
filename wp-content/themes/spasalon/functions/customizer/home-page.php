<?php 
// Home page section settings

add_action('customize_register','spasalon_homepage_customizer');

function spasalon_homepage_customizer($wp_customize)
{
	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Homepage section settings', 'spasalon'),
	) );

	// Header logo text checkbox
    $wp_customize->add_setting(
            'header_text',
            array(
                'theme_supports'    => array( 'custom-logo', 'header-text' ),
                'default'           => false,
                'sanitize_callback' => 'absint',
            )
        );
    $wp_customize->add_control(
        'header_text',
        array(
            'label'    => esc_html__( 'Display Site Title and Tagline', 'spasalon'),
            'section'  => 'title_tagline',
            'settings' => 'header_text',
            'type'     => 'checkbox',
        )
    ); 

	/* settings */
		$wp_customize->add_section( 'news_settings' , array(
			'title'      => esc_html__('News section', 'spasalon'),
			'panel'  => 'section_settings',
			'priority'       => 4,
		) );
			
			// news enable / disable 
			$wp_customize->add_setting( 'spa_theme_options[enable_news]' , array(
			'default' => true,
			'sanitize_callback' => 'spasalon_sanitize_checkbox',
			'type'=>'option'
			) );
			
			$wp_customize->add_control('spa_theme_options[enable_news]' , array(
			'label'          => esc_html__('Enable News section', 'spasalon' ),
			'section'        => 'news_settings',
			'type'           => 'checkbox',
			) );
			
			// news layout
			$wp_customize->add_setting( 'spa_theme_options[news_layout]' , array(
			'default' => 2,
			'sanitize_callback' => 'spasalon_sanitize_select',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[news_layout]' , array(
			'label'          => esc_html__('Select column layout', 'spasalon' ),
			'section'        => 'news_settings',
			'type'           => 'select',
			'choices' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
			) ) );
			
			// news title
			$wp_customize->add_setting( 'spa_theme_options[news_title]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			'default' => esc_html__('Aliquam et nulla id metus','spasalon'),
			) );
			$wp_customize->add_control('spa_theme_options[news_title]' , array(
			'label'          => esc_html__( 'Title', 'spasalon' ),
			'section'        => 'news_settings',
			'type'           => 'text'
			) );
			
			// news desc
			$wp_customize->add_setting( 'spa_theme_options[news_contents]' , array(
			'type'=>'option',
			'sanitize_callback' => 'sanitize_textarea_field',
			'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','spasalon'),
			
			) );
			$wp_customize->add_control('spa_theme_options[news_contents]' , array(
			'label'          => esc_html__( 'Description', 'spasalon' ),
			'section'        => 'news_settings',
			'type'           => 'textarea'
			) );
}
			
/**
 * Add selective refresh for Front page section section controls.
 */
function spasalon_register_news_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'spa_theme_options[news_title]', array(
		'selector'            => '.home-post .section-header h1',
		'settings'            => 'spa_theme_options[news_title]',
	
	) );

$wp_customize->selective_refresh->add_partial( 'spa_theme_options[news_contents]', array(
		'selector'            => '.home-post .section-subtitle',
		'settings'            => 'spa_theme_options[news_contents]',
	
	) );
	
	
}
add_action( 'customize_register', 'spasalon_register_news_section_partials' );	