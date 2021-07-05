<?php 
function spasalon_general_settings_customizer( $wp_customize ){

// list contro categories

	/* general settings */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('General settings', 'spasalon'),
	) );
	
	/* Banner section */
		$wp_customize->add_section( 'banner_section' , array(
			'title'      => esc_html__('Banner settings', 'spasalon'),
			'panel'  => 'general_settings'
		) );
		
			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[spa_bannerstrip_enable]' , array(
			'default' => 'yes',
			'sanitize_callback' => 'spasalon_sanitize_radio',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[spa_bannerstrip_enable]' , array(
			'label'          => esc_html__('Menu Banner', 'spasalon' ),
			'section'        => 'banner_section',
			'type'           => 'radio',
			'choices'        => array(
				'yes' => esc_html__('ON','spasalon'),
				'no'  => esc_html__('OFF','spasalon'),
			) ) );
			
			// banner call us no
			$wp_customize->add_setting( 'spa_theme_options[call_us]' , array(
			'default' => esc_html__('201 567 89785','spasalon'),
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[call_us]' , array(
			'label' => esc_html__('Call us at','spasalon'),
			'section'        => 'banner_section',
			'type'           => 'text'
			) );
			
			// banner call us text
			$wp_customize->add_setting( 'spa_theme_options[call_us_text]' , array(
			'default' => esc_html__('Call us on','spasalon'),
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[call_us_text]' , array(
			'label'          => esc_html__( 'Call us field text', 'spasalon' ),
			'section'        => 'banner_section',
			'type'           => 'text'
			) );
			
			/* footer copyright section */
			$wp_customize->add_section( 'copyright_section' , array(
			'title'      => esc_html__('Footer copyright settings', 'spasalon'),
			'panel'  => 'general_settings'
			) );
		
			// Enable Footer menu settings
		    $wp_customize->add_setting('spa_theme_options[footer_menu_enabled]', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'spasalon_sanitize_checkbox',
            'type' => 'option'
       		 ));
		    $wp_customize->add_control('spa_theme_options[footer_menu_enabled]',array(
            'label' => esc_html__('Show footer menu', 'spasalon'),
            'section' => 'copyright_section',
            'type' => 'checkbox',
        	));

			// banner settings
			$wp_customize->add_setting( 'spa_theme_options[footer_tagline]' , array(
			'sanitize_callback' => 'spasalon_copyright_sanitize_text',
			'default' => __( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Spasalon</a> by Webriti', 'spasalon' ),
			'type'=>'option',
			) );
			$wp_customize->add_control('spa_theme_options[footer_tagline]' , array(
			'label'          => esc_html__('Copyright text', 'spasalon' ),
			'section'        => 'copyright_section',
			'type'           => 'textarea'
			) );
	
}
add_action( 'customize_register', 'spasalon_general_settings_customizer' );

function spasalon_copyright_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

}

function spasalon_register_copyright_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'spa_theme_options[footer_tagline]', array(
		'selector'            => '.site-info p',
		'settings'            => 'spa_theme_options[footer_tagline]',
	
	) );
$wp_customize->selective_refresh->add_partial( 'spa_theme_options[call_us_content]', array(
		'selector'            => '#spa-page-header address strong',
		'settings'            => 'spa_theme_options[call_us_content]',
	
	) );
$wp_customize->selective_refresh->add_partial( 'spa_theme_options[call_us_text_content]', array(
		'selector'            => '#spa-page-header address',
		'settings'            => 'spa_theme_options[call_us_text_content]',
	
	) );
$wp_customize->selective_refresh->add_partial( 'header_site_title', array(
        'selector' => '.navbar-brand',
        'settings' => array( 'blogname' ),
        'render_callback' => function() {
            return get_bloginfo( 'name', 'display' );
        },
    ) );	
}
add_action( 'customize_register', 'spasalon_register_copyright_partials' );