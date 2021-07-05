<?php
$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
$spasalon_news_layout = 12 / $spasalon_current_options['news_layout'];

if( $spasalon_current_options['enable_news'] == true):
?>
<!-- Blog Section -->
<section id="section" class="home-post">
	<div class="container" id="wrapper">
		
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<?php if( $spasalon_current_options['news_title'] != '' || $spasalon_current_options['news_contents'] != '' ) { ?>
				<div class="section-header">					
					<?php if( $spasalon_current_options['news_title'] != '' ): ?>
					<h1 class="section-title">
						<?php echo esc_html($spasalon_current_options['news_title']); ?>
					</h1>
					<?php endif; ?>					
					<?php if( $spasalon_current_options['news_contents'] != '' ): ?>
					<p class="section-subtitle">
						<?php echo esc_html($spasalon_current_options['news_contents']); ?>
					</p>
					<?php endif; ?>					
				</div>
			    <?php } ?>
			</div>
		</div>
		<!-- /Section Title -->	
		
		
		<?php if( is_active_sidebar('news-widget-section') ): ?>
		
		<div class="row">
		
			<?php dynamic_sidebar('news-widget-section'); ?>
			
		</div>
		
		<?php else: ?>
			
			<!-- Blog Post -->	
			<div class="row">
				
				<?php 
				
				$spasalon_i = 1;
				
				
				//$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				
				$spasalon_args = array(
				 'post_type' => 'post',
				 'ignore_sticky_posts' => 1 ,
				  'posts_per_page' => 4,
				  //'paged' => $paged 
				);
				
				$spasalon_post_type_data = new WP_Query( $spasalon_args );
				
				if( $spasalon_post_type_data->have_posts() ):
				
					while( $spasalon_post_type_data ->have_posts() ): $spasalon_post_type_data ->the_post();
				?>
				<div class="col-md-<?php echo $spasalon_news_layout; ?>">
					<article class="post">
					<?php if( has_post_thumbnail() ): ?>
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
				if($spasalon_i==$spasalon_current_options['news_layout'])
				{ 
					echo '<div class="clearfix"></div>';
					$spasalon_i=0;
				}
				 
				$spasalon_i++;
				  
				endwhile;

				endif;
				wp_reset_postdata();
				?>
				
			<!-- /Blog Post -->	
			</div>
		
		<?php endif; ?>
		
		
	</div>
</section>
<!-- End of Blog Section -->

<div class="clearfix"></div>
<?php endif; ?>