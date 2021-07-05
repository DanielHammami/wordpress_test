<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function spasalon_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Lato:100,300,400,700,900','Raleway:300,400,600,700,800','italic','Roboto:100,300,400,500,700,900', 'Droid Serif:400,700' );
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}
function spasalon_scripts_styles() {
    wp_enqueue_style( 'spasalon-fonts', spasalon_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'spasalon_scripts_styles' );?>