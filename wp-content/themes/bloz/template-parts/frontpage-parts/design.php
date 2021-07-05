<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bloz
 */

// Get the content type.
$design = get_theme_mod( 'bloz_design', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $design ) {
	return;
}

$design_title    = get_theme_mod( 'bloz_design_title', __( 'DESIGN AND FASHION', 'bloz') );

$get_content = bloz_get_section_content( 'design', $design, 4 );

?>

<div id="design" class="pt padding">
    <div class="container">
        <?php if( !empty( $design_title ) ): ?>
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $design_title ); ?></h2>
            </div><!-- .section-header -->
        <?php endif; ?>

        <div class="regular" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>

            <?php foreach ( $get_content as $content ): ?>

                <article style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
                    <div class="overlay"></div>
                    <div class="post-wrapper">
                        <div class="entry-container">
                            <div class="entry-meta">
                                <span class="cat-links">
                                    <?php the_category( '', '', $content['id'] ) ?>
                                </span>
                            </div><!-- .entry-meta -->

                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
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

                        </div><!-- .entry-container -->
                    </div>
                </article>

            <?php endforeach;  ?>

        </div>
    </div><!-- .container -->
</div><!-- #design -->

