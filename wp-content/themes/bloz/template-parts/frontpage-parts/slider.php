<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bloz
 */

// Get the content type.
$slider = get_theme_mod( 'bloz_slider', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $slider ) {
	return;
}

$get_content = bloz_get_section_content( 'slider', $slider, 3 );

?>

<div id="hero-slider" class="container" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>

 <?php foreach ( $get_content as $content ): ?>

    <article style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-slider-wrapper">
                <div class="entry-meta">
                    <span class="cat-links">
                        <?php the_category( '', '', $content['id'] ) ?>
                    </span>
                </div><!-- .entry-meta -->

                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
                    <div class="seperator"></div>
                </header>

                <div class="entry-content">
                    <div class="footer-meta">
                        <?php 

                        bloz_post_author() ;

                        bloz_posted_on( $content['id'] );

                        ?>

                        <span class="comment"><a class="url fn n" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo get_comments_number( $content['id'] ); ?></a></span>
                    
                    </div><!-- .entry-meta -->
                </div><!-- .entry-content -->

            </div><!-- .hero-slider-wrapper -->
        </div><!-- .container -->
    </article>

<?php endforeach;  ?>

</div><!-- #featured-slider -->

