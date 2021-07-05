<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> >
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : 
           echo '<link rel="pingback" href=" '.esc_url(get_bloginfo( 'pingback_url' )).' ">';
        endif;
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link spasalon-screen-reader" href="#wrapper"><?php esc_html_e('Skip to content', 'spasalon'); ?></a>

<?php 
$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
?>
<!-- Navbar -->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
				<?php
				
				if( has_custom_logo() ) {
					
					the_custom_logo();  // Spasaloon custom logo support
					if(get_theme_mod('header_text')==true) {
							if((get_option('blogname')!='') || (get_option('blogdescription')!='')):
								if(get_option('blogname')!=''):
							    	echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'">';
							    	bloginfo( 'name' );
							    	echo '</a>';
						    	endif;
								$spasalon_description = get_bloginfo( 'description', 'display' );
								if(get_option('blogdescription')!='')
								{
									if ( $spasalon_description || is_customize_preview() ) : ?>
										<p class="site-description"><?php echo $spasalon_description; ?></p>
									<?php endif;
								}
							endif;
						}	 
					
				}
				elseif(get_theme_mod('header_text')==true) {
						if((get_option('blogname')!='') || (get_option('blogdescription')!='')):
							if(get_option('blogname')!=''):
						    	echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'">';
						    	bloginfo( 'name' );
						    	echo '</a>';
					    	endif;
							$spasalon_description = get_bloginfo( 'description', 'display' );
							if(get_option('blogdescription')!='')
							{
								if ( $spasalon_description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $spasalon_description; ?></p>
								<?php endif;
							}
						endif;
					}
				elseif( $spasalon_current_options['upload_image']!='' && !(has_custom_logo()) ) {
						
					$spasalon_current_options['upload_image'] = ( $spasalon_current_options['upload_image'] != '' ? $spasalon_current_options['upload_image'] : get_template_directory_uri() . '/images/logo.png' );
					
					$spasalon_current_options['width'] = ( $spasalon_current_options['width'] != '' ? $spasalon_current_options['width'] : 150 );
					
					$spasalon_current_options['height'] = ( $spasalon_current_options['height'] != '' ? $spasalon_current_options['height'] : 35 );
						echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'">';
						echo '<img alt="'.esc_attr(get_bloginfo("name")).'" src="'.esc_url($spasalon_current_options['upload_image']).'" class="img-responsive" style="width:'.esc_html($spasalon_current_options['width']).'px; height:'.esc_html($spasalon_current_options['height']).'px;">';
						echo '</a>';
					}
					
				elseif(!(has_custom_logo()) && get_theme_mod('header_text')==false && $spasalon_current_options['upload_image']=='') {
						
						echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'">';
						bloginfo('name');   // if no custom logo than print bloginfo name
						echo '</a>';
						
					}
				?>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php esc_html_e('Toggle navigation','spasalon'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php 
			
				wp_nav_menu( array(				
				'theme_location' => 'primary',				
				'container'  => 'nav-collapse collapse navbar-inverse-collapse',				
				'menu_class' => 'nav navbar-nav navbar-right',				
				'fallback_cb' => 'spasalon_fallback_page_menu',				
				'walker' => new spasalon_nav_walker()) 				
				);  // primary support menu
				
			?>
		</div>
	</div>
</nav>	
<!-- End of Navbar -->

<div class="clearfix"></div>