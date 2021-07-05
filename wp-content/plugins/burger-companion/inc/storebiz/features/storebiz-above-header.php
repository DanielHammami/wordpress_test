<?php
function storebiz_abv_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'storebiz'),
		) 
	);

	// Logo Width // 
	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'storebiz_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Burger_Customizer_Range_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'storebiz' ),
				'section'  => 'title_tagline',
				  'input_attrs' => array(
					'min'    => 1,
					'max'    => 500,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
	}
	
	/*=========================================
	Above Header Section
	=========================================*/	
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','storebiz'),
			'panel'  		=> 'header_section',
		)
    );

	// Header First Info Section
	$wp_customize->add_setting(
		'abv_hdr_first_nfo_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'abv_hdr_first_nfo_head',
		array(
			'type' => 'hidden',
			'label' => __('First Info','storebiz'),
			'section' => 'above_header',
			'priority'  => 2,
		)
	);	
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_first_info' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_first_info', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storebiz' ),
			'section'     => 'above_header',
			'type'        => 'checkbox',
			'priority' => 2,
		) 
	);	
	
	
	// icon // 
	$wp_customize->add_setting(
    	'abv_hdr_first_info_icon',
    	array(
	        'default' => 'fa-truck',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Storebiz_Icon_Picker_Control($wp_customize, 
		'abv_hdr_first_info_icon',
		array(
		    'label'   		=> __('Icon','storebiz'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			'priority'  => 3,
			
		))  
	);		
	
	// above header Info title // 
	$wp_customize->add_setting(
    	'abv_hdr_first_info_ttl',
    	array(
			'default' => __('Free Delivery','storebiz'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_first_info_ttl',
		array(
		    'label'   		=> __('Title','storebiz'),
		    'section'		=> 'above_header',
			'type' 			=> 'text',
			'priority'      => 3,
		)  
	);	
	
	// Header Second Info Section
	$wp_customize->add_setting(
		'abv_hdr_second_info_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'abv_hdr_second_info_head',
		array(
			'type' => 'hidden',
			'label' => __('Second Info','storebiz'),
			'section' => 'above_header',
			'priority'  => 5,
		)
	);	
	
	$wp_customize->add_setting( 
		'hide_show_hdr_info2' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_hdr_info2', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storebiz' ),
			'section'     => 'above_header',
			'type'        => 'checkbox',
			'priority'  => 6,
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'hdr_info2_icon',
    	array(
	        'default' => 'fa-arrow-circle-right',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Storebiz_Icon_Picker_Control($wp_customize, 
		'hdr_info2_icon',
		array(
		    'label'   		=> __('Icon','storebiz'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			'priority'  => 7,
			
		))  
	);	

	// Support Title // 
	$wp_customize->add_setting(
    	'hdr_info2_ttl',
    	array(
	        'default'			=> __('Return Policy','storebiz'),
			'sanitize_callback' => 'storebiz_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'hdr_info2_ttl',
		array(
		    'label'   		=> __('Text','storebiz'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text',
			'priority' => 8,
		)  
	);	
	
	
	// Header Menu Section
	$wp_customize->add_setting(
		'abv_hdr_menu_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'abv_hdr_menu_head',
		array(
			'type' => 'hidden',
			'label' => __('Menus','storebiz'),
			'section' => 'above_header',
			'priority'  => 9,
		)
	);	
	
	$wp_customize->add_setting( 
		'hide_show_abv_hdr_menus' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_abv_hdr_menus', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storebiz' ),
			'section'     => 'above_header',
			'type'        => 'checkbox',
			'priority'  => 10,
		) 
	);	
	
	
	/*=========================================
	Header Navigation
	=========================================*/	
	
	// Offer
	$wp_customize->add_setting(
		'hdr_nav_offer'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_offer',
		array(
			'type' => 'hidden',
			'label' => __('Offer','storebiz'),
			'section' => 'hdr_navigation',
			'priority' => 2,
		)
	);

	// hide/show
	$wp_customize->add_setting( 
		'hide_show_offer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storebiz_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_offer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storebiz' ),
			'section'     => 'hdr_navigation',
			'type'        => 'checkbox',
			'priority' => 2,
		) 
	);
	
	// icon // 
	$wp_customize->add_setting(
    	'hdr_nav_offer_icon',
    	array(
	        'default' => 'fa-gift',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Storebiz_Icon_Picker_Control($wp_customize, 
		'hdr_nav_offer_icon',
		array(
		    'label'   		=> __('Icon','storebiz'),
		    'section' 		=> 'hdr_navigation',
			'iconset' => 'fa',
			'priority'  => 2,
			
		))  
	);	


	
	/**
	 * Customizer Repeater for add Offer
	 */
	
		$wp_customize->add_setting( 'hdr_nav_offer_content', 
			array(
			 'sanitize_callback' => 'burger_companion_repeater_sanitize',
			  'default' => storebiz_get_nav_offer_default()
			)
		);
		
		$wp_customize->add_control( 
			new Burger_Companion_Repeater( $wp_customize, 
				'hdr_nav_offer_content', 
					array(
						'label'   => esc_html__('Offer','storebiz'),
						'section' => 'hdr_navigation',
						'priority' => 2,
						'add_field_label'                   => esc_html__( 'Add New', 'storebiz' ),
						'item_name'                         => esc_html__( 'Offer', 'storebiz' ),
						
						
						'customizer_repeater_title_control'=> true,
						'customizer_repeater_link_control' => true,	
					) 
				) 
			);
}
add_action( 'customize_register', 'storebiz_abv_header_settings' );


// Header selective refresh
function storebiz_abv_header_partials( $wp_customize ){

	// abv_hdr_first_info_ttl
	$wp_customize->selective_refresh->add_partial( 'abv_hdr_first_info_ttl', array(
		'selector'            => '.above-header .widget-contact.first p',
		'settings'            => 'abv_hdr_first_info_ttl',
		'render_callback'  => 'storebiz_abv_hdr_first_info_ttl_render_callback',
	) );
	
	// hdr_info2_ttl
	$wp_customize->selective_refresh->add_partial( 'hdr_info2_ttl', array(
		'selector'            => '.above-header .widget-contact.second p',
		'settings'            => 'hdr_info2_ttl',
		'render_callback'  => 'storebiz_hdr_info2_ttl_render_callback',
	) );	
}
add_action( 'customize_register', 'storebiz_abv_header_partials' );


// abv_hdr_first_info_ttl
function storebiz_abv_hdr_first_info_ttl_render_callback() {
	return get_theme_mod( 'abv_hdr_first_info_ttl' );
}

// hdr_info2_ttl
function storebiz_hdr_info2_ttl_render_callback() {
	return get_theme_mod( 'hdr_info2_ttl' );
}
