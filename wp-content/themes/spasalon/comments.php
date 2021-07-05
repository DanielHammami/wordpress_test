<?php 
if ( post_password_required() ) {
	return;
}
?>

<?php
if( !function_exists('spasalon_comments') ):
function spasalon_comments( $spasalon_comment, $spasalon_args, $spasalon_depth ){
	
	//get theme data
	global $comment_data;
	
	//translations
	$spasalon_leave_reply = isset($comment_data['translation_reply_to_coment']) ? $comment_data['translation_reply_to_coment'] : esc_html__('Reply','spasalon');
	?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('media comments'); ?>>
	
		<figure class="comment-author">
			<?php echo get_avatar( $spasalon_comment , $spasalon_size = 70 ); ?>
		</figure>
		
		<div class="media-body">
			<div class="comment-content">
			
				<h5 class="fn"><?php esc_html(comment_author()); ?> 
				
					<a href="#" class="datetime">
						<time datetime="<?php  echo esc_html(comment_time('g:i a')); ?>">
						<?php echo esc_html(comment_date('M j, Y'));?> <?php esc_html_e('at','spasalon') ?> <?php  echo esc_html(comment_time('g:i a')); ?>
						</time>
					</a>
			
					<div class="reply">
						<?php comment_reply_link( array_merge( $spasalon_args, array('reply_text' => $spasalon_leave_reply,'depth' => $spasalon_depth, 'max_depth' => $spasalon_args['max_depth'], 'per_page' => $spasalon_args['per_page']))) ?>
					</div>
				</h5>
				
				<?php comment_text(); ?>
			</div>
								
		</div>
	</div>
	<?php
}
endif; 
?>


<?php if ( have_comments() ) : ?>

<!--Comments-->
<div class="comments-area">
	
	<h3 class="comment-title">
	<?php 
	$spasalon_comments_number = get_comments_number();
	
	if ( 1 === $spasalon_comments_number ) {
		printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'spasalon' ), get_the_title() );
	}
	else{
		printf(
				_nx(
					'%1$s thought on &ldquo;%2$s&rdquo;',
					'%1$s thoughts on &ldquo;%2$s&rdquo;',
					$spasalon_comments_number,
					'comments title',
					'spasalon'
				),
				number_format_i18n( $spasalon_comments_number ),
				get_the_title()
			);
	}
	?>
	</h3>
	
	<?php wp_list_comments( array( 'callback' => 'spasalon_comments' ) ); ?>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_html_e('Comment navigation','spasalon'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'spasalon' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'spasalon' ) ); ?></div>
		</nav>
		<?php }  
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
	<p class="no-comments"><?php esc_html_e('Comments are closed.', 'spasalon' ); ?></p>
	<?php endif; ?>				
</div>
<!--/End of Comments-->
<?php endif; ?>

<?php
		comment_form( array(
			'title_reply_before' => '<h3 class="comment-title">',
			'title_reply_after'  => '</h3>',
		) );
	?>