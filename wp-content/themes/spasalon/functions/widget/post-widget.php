<?php 
add_action( 'widgets_init','spasalon_post_widget'); 
function spasalon_post_widget() 
{ 
	return   register_widget( 'spasalon_post_widget' );
}

class spasalon_post_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'spasalon_post_widget', // Base ID
			esc_html__('WBR : Latest Posts', 'spasalon'), // Name
			array( 'description' => esc_html__( 'Latest posts widget', 'spasalon' ), ) // Args
		);
	}

	public function widget( $args , $instance ) {
		
		echo $args['before_widget'];
		if(empty($instance['title']))
		{
			$instance['title']= esc_html__('Latest News','spasalon');
		}
		if(empty($instance['post_show']))
		{
			$instance['post_show']='';
		}
		if($instance['title']){
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}
		
		$loop = new WP_Query(array( 'post_type' => 'post', 'showposts' => $instance['post_show'] ));
		
		if( $loop->have_posts() ) :
		
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="media post">
				<a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
				<div class="media-body">
					<div class="entry-header">
						<h5 class="entry-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h5>
					</div>
					<span class="entry-date"><?php echo esc_html(get_the_date()); ?></span>
				</div>
			</div>
			<?php
			endwhile;
		
		endif;
		wp_reset_postdata();
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['post_show'] = ( isset($instance['post_show'] ) ? $instance['post_show'] : 3 );
		?>
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title','spasalon' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'post_show' )); ?>"><?php esc_html_e('No posts to show','spasalon' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'post_show' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_show' )); ?>" type="text" value="<?php echo esc_attr( $instance['post_show'] ); ?>" />
		</p>
		
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field($new_instance['title']) : '';
		$instance['post_show'] = ( ! empty( $new_instance['post_show'] ) ) ? intval($new_instance['post_show']) : '';
		
		return $instance;
	}

} ?>