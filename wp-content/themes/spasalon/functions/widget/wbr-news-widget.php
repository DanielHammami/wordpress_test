<?php
/**
 * Feature news Widget
 *
 */
 
add_action('widgets_init','spasalon_news_widget');

function spasalon_news_widget(){
	
	return register_widget('spasalon_news_widget');
	
}

class spasalon_news_widget extends WP_Widget{
	
	function __construct() {
		
		parent::__construct(
		
			'spasalon_news_widget', // Base ID
			
			esc_html__('WBR: Recent news widget', 'spasalon'), // Name
			
			array( 'description' => esc_html__( 'To display your recent post', 'spasalon'), ) // Args
			
		);
	}
	
	
	public function widget( $args , $instance ) {
		
		$instance['news_cat'] = (isset($instance['news_cat'])?$instance['news_cat']:'');
		
		$instance['exclude_post_id'] = isset($instance['exclude_post_id']) ? $instance['exclude_post_id'] : '';
		
		$instance['news_column'] = isset($instance['news_column']) && $instance['news_column']!='' ? $instance['news_column'] : 2;
		
		$excludepost_id =  explode(',',$instance['exclude_post_id']);
		
		
		$news_layout = 12 / $instance['news_column'];

				$i = 1;

				$args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'cat' => $instance['news_cat'] , 'post__not_in' => $excludepost_id );
				
				$post_type_data = new WP_Query( $args );
				
				
				echo '<div class="col-md-12">';
				
				if( $post_type_data->have_posts() ):
				
					while( $post_type_data ->have_posts() ): $post_type_data ->the_post();
					
				?>
				<div class="col-md-<?php echo $news_layout; ?> wbr-news">
				
					<article class="post">
					
						<?php  if( has_post_thumbnail() ):  ?>
						
						<figure class="post-thumbnail">
						
							<span class="entry-date">
							<?php echo esc_html(get_the_date()); ?>			
							</span>
							
							<?php 
							
							the_post_thumbnail(); 
							
							?>
							
						</figure>
						
						<?php endif; ?>
						
						<div class="entry-header">
						
							<h4 class="entry-title">
							
								<a href="<?php the_permalink(); ?>">
								
									<?php the_title(); ?>
									
								</a>
								
							</h4>
							
						</div>
						
						
						<div class="entry-content">
						
							<?php the_content( __('Read More','spasalon') ); ?>
							
						</div>
						
					</article>	
					
				</div>
				
				<?php 
				
				if( $i==$instance['news_column'] ){ 
				
					// echo '<div class="clearfix"></div>';
					
					$i=0;
					
				}
				 
				$i++;
				  
				endwhile;

			endif;
			wp_reset_postdata();
			echo '</div>';
	}
	
	public function form( $instance ) {
		
		$instance['news_cat'] = isset($instance['news_cat']) ? $instance['news_cat'] : '';
		
		$instance['exclude_post_id'] = isset($instance['exclude_post_id']) ? $instance['exclude_post_id'] : '';
		
		$instance['news_column'] = isset($instance['news_column']) ? $instance['news_column'] : 2;
		
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'news_cat' )); ?>"><?php esc_html_e( 'Select post category','spasalon' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'news_cat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'news_cat' )); ?>">
				<option value>--Select--</option>
				<?php

					$args = array("hide_empty" => 0,
                    "type"      => "post",      
                    "orderby"   => "name",
                    "order"     => "ASC" ,
					'taxonomy'=> 'category'
					);
					
					$news_cat = $instance['news_cat'];
					
					$cats = get_categories($args);
					
					foreach ( $cats as $cat ) {
						$option = '<option value="' . $cat->term_id . '" ';
						$option .= ( $cat->term_id == $news_cat ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $cat->name;
						$option .= '</option>';
						echo $option;
					}
				?>
						
			</select>
			
			<br/>
			
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'news_column' )); ?>"><?php esc_html_e( 'Select column layout','spasalon' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'news_column' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'news_column' )); ?>">
				<option value> -- Select Column -- </option>
				<?php
					for( $i = 1; $i<=4; $i++ ) {
						$option = '<option value="' . $i . '" ';
						$option .= ( $i == $instance['news_column'] ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $i .' Column';
						$option .= '</option>';
						echo $option;
					}
				?>
						
			</select>
			<br/>
			
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'exclude_post_id' )); ?>"><?php esc_html_e( 'Exclude post id ( like : 1,2,3 )', 'spasalon' ); ?></label> 
		<textarea style="width:100%;" rows="5" id="<?php echo esc_attr($this->get_field_id( 'exclude_post_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'exclude_post_id' )); ?>"><?php echo esc_html($instance['exclude_post_id']); ?></textarea>
		</p>
		
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		
		$instance['news_cat'] = ( ! empty( $new_instance['news_cat'] ) ) ? intval($new_instance['news_cat']) : '';
		
		$instance['exclude_post_id'] = ( ! empty( $new_instance['exclude_post_id'] ) ) ? sanitize_textarea_field($new_instance['exclude_post_id']) : '';
		
		$instance['news_column'] = ( ! empty( $new_instance['news_column'] ) ) ? intval($new_instance['news_column']) : '';
		
		return $instance;
	}
}?>