<?php 
/*
* template tag file
*/

// banner strip tag
function spasalon_page_banner_strip(){
	
	$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
	$spasalon_call_us         = $spasalon_current_options['call_us'];
	$spasalon_call_us_text    = $spasalon_current_options['call_us_text']; 
	
	$spasalon_h1 = '';
	$spasalon_h2 = '';
	
	Global $post;
	
	$spasalon_meta = array();
	
	if( is_front_page() || is_home() ){
		$spasalon_meta         = get_post_meta( get_option('page_for_posts') ,'_spasalon_meta', TRUE );
	}else{
	$spasalon_meta         = get_post_meta( get_the_ID() ,'_spasalon_meta', TRUE );
	}
	
	if( is_404() ){
		$spasalon_h1              = $spasalon_current_options['banner_title_one_404'];
		$spasalon_h2              = $spasalon_current_options['banner_title_two_404'];
		$spasalon_bd              = $spasalon_current_options['banner_description_404'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	elseif( is_category() ){
		$spasalon_h1              = $spasalon_current_options['banner_title_one_category'];
		$spasalon_h2              = $spasalon_current_options['banner_title_two_category'];
		$spasalon_bd              = $spasalon_current_options['banner_description_category'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	elseif( is_search() ){
		$spasalon_h1              = $spasalon_current_options['banner_title_one_search'];
		$spasalon_h2              = $spasalon_current_options['banner_title_two_search'];
		$spasalon_bd              = $spasalon_current_options['banner_description_search'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	elseif( is_tag() ){
		$spasalon_h1              = $spasalon_current_options['banner_title_one_tag'];
		$spasalon_h2              = $spasalon_current_options['banner_title_two_tag'];
		$spasalon_bd              = $spasalon_current_options['banner_description_tag'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	elseif( is_archive() ){
		
		if( get_post_type( get_the_ID() )=='product'){
			$spasalon_h1              = $spasalon_current_options['banner_title_one_woo'];
			$spasalon_h2              = $spasalon_current_options['banner_title_two_woo'];
			$spasalon_bd              = $spasalon_current_options['banner_description_woo'];
		}
		else{
			$spasalon_h1              = $spasalon_current_options['banner_title_one_author'];
			$spasalon_h2              = $spasalon_current_options['banner_title_two_author'];
			$spasalon_bd              = $spasalon_current_options['banner_description_author'];
		}
		
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	else{
		
			if ( class_exists( 'WooCommerce' ) ) {
			
				if( is_woocommerce() ){
					$spasalon_h1              = $spasalon_current_options['banner_title_one_woo'];
					$spasalon_h2              = $spasalon_current_options['banner_title_two_woo'];
					$spasalon_bd              = $spasalon_current_options['banner_description_woo'];
					//$spasalon_meta['banner_enable']=true;
					$spasalon_meta=true;
				}
				else{
					
					if(!empty($spasalon_meta)){
						$spasalon_h1              = ( array_key_exists("heading_one",$spasalon_meta) ? $spasalon_meta['heading_one']        : '' );
						$spasalon_h2              = ( array_key_exists("heading_two",$spasalon_meta) ? $spasalon_meta['heading_two']        : '' );
						$spasalon_bd              = ( array_key_exists("banner_description",$spasalon_meta) ? $spasalon_meta['banner_description'] : '' );
						}
						else{
							//$spasalon_meta['banner_enable']=false;
							$spasalon_meta=true;
						}
				}
				
			}else{
					
					if(!empty($spasalon_meta)){
						$spasalon_h1              = ( array_key_exists("heading_one",$spasalon_meta) ? $spasalon_meta['heading_one']        : '' );
						$spasalon_h2              = ( array_key_exists("heading_two",$spasalon_meta) ? $spasalon_meta['heading_two']        : '' );
						$spasalon_bd              = ( array_key_exists("banner_description",$spasalon_meta) ? $spasalon_meta['banner_description'] : '' );
						}
						else{
							//$spasalon_meta['banner_enable']=false;
							$spasalon_meta=true;
						}
				}
		
	}
	
	if( $spasalon_current_options['spa_bannerstrip_enable']=='yes' )
	{
		//if( isset($spasalon_meta['banner_enable'])==true && ( $h1 != '' || $h2 != '' ) ) {
	if( $spasalon_meta ==true && ( $spasalon_h1 != '' || $spasalon_h2 != '' ) ) {
		echo '<section id="spa-page-header">';
			echo '<div class="container">';
			
				echo '<div class="topbar-detail">';
				
					echo '<div class="col-md-3">';
						echo '<div class="title">';
							echo '<h4>'.esc_html($spasalon_h1).'</h4><h1>'.esc_html($spasalon_h2).'</h1>';
						echo '</div>';
					echo '</div>';
					
					echo '<div class="col-md-6">';
						echo '<p class="description">'.esc_html($spasalon_bd).'</p>';
					echo '</div>';
					
					echo '<div class="col-md-3">';
						echo '<div class="addr-detail">';
							echo '<address>'.esc_html($spasalon_call_us_text).' <strong>'.esc_html($spasalon_call_us).'</strong></address>';
						echo '</div>';
					echo '</div>';		
				echo '</div>';
				
			echo '</div>';
		echo '</section>';

		echo '<div class="clearfix"></div>';
		
		}
	}
	
	
}


if ( ! function_exists( 'spasalon_post_thumbnail' ) ) :
function spasalon_post_thumbnail() {
	if(has_post_thumbnail()) {
	if ( is_singular() ) : ?>
		<figure class="post-thumbnail-full">
		<?php the_post_thumbnail(); ?>
		</figure>
		<?php else :
		$spasalon_post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'img-responsive' );
		if ( !empty( $spasalon_post_thumbnail_url ) ) {
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-thumbnail width-sm">
				<?php echo wp_kses_post($spasalon_post_thumbnail_url); ?>
		</a>
		<?php
		}
	endif; // End is_singular()
	}}
endif;



function spasalon_get_homepage_product_excerpt($spasalon_content)
{
		$spasalon_excerpt = $spasalon_content;
		$spasalon_excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$spasalon_excerpt));
		$spasalon_excerpt = strip_shortcodes($spasalon_excerpt);
		$spasalon_original_len = strlen($spasalon_excerpt);
		$spasalon_excerpt = substr($spasalon_excerpt, 0, 80);
		$spasalon_len = strlen($spasalon_excerpt);
		if($spasalon_original_len > 80) {
			$spasalon_excerpt = $spasalon_excerpt;
		return $spasalon_excerpt.'...';
		}
		else
		{ 
			return $spasalon_excerpt; 
		}
}

function spasalon_pink_banner_strip() 
{
	
$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
$spasalon_call_us         = $spasalon_current_options['call_us'];
$spasalon_call_us_text    = $spasalon_current_options['call_us_text']; 	
if( $spasalon_current_options['spa_bannerstrip_enable']=='yes' )
	{	
global $wp_query;
$spasalon_postid = $wp_query->post->ID;
if( is_home() ){
$spasalon_postid = ( 'page' == get_option( 'show_on_front' ) ? get_option( 'page_for_posts' ) : get_the_ID() );
}
wp_reset_query(); 
if ( get_post_meta($spasalon_postid, 'spa-page-banner-h1', true) || get_post_meta($spasalon_postid, 'spa-page-banner-h2', true) || get_post_meta($spasalon_postid, 'spa-page-description', true) )
{ ?>
<section id="spa-page-header">
		<div class="container">
			<div class="topbar-detail">
			
				<div class="col-md-3">
					<div class="title">
						<?php if( get_post_meta($spasalon_postid, 'spa-page-banner-h1', true)) : ?>
						<h4><?php echo esc_html(get_post_meta($spasalon_postid, 'spa-page-banner-h1', true)); ?></h4>
						<?php endif; ?>
						<?php if(get_post_meta($spasalon_postid,'spa-page-banner-h2', true)): ?>
						<h1><?php echo esc_html(get_post_meta($spasalon_postid,'spa-page-banner-h2', true)); ?></h1>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="col-md-6">
					<?php if(get_post_meta($spasalon_postid, 'spa-page-description', true)) :?>
					<p class="description">
					<?php echo esc_html(get_post_meta($spasalon_postid, 'spa-page-description', true));?>
					</p>
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<div class="addr-detail">
					<address><?php echo esc_html($spasalon_call_us_text); ?><strong><?php echo esc_html($spasalon_call_us); ?></strong></address>
					</div>
				</div>		
			</div>
		</div>
</section>
<div class="clearfix"></div>
<?php
}
} }?>