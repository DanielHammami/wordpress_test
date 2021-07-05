<?php
/**
* Template part for displaying front page introduction.
*
* @package Bloz
*/

// Get the content type.
$blog_posts = get_theme_mod( 'bloz_blog_posts', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $blog_posts ) {
    return;
}

$blog_posts_title    = get_theme_mod( 'bloz_blog_posts_title', __( 'Latest Blog', 'bloz') );

$get_content = bloz_get_section_content( 'blog_posts', $blog_posts, 3 );
?>

<div id="our-blog" class="pt padding">
    <?php if( !empty( $blog_posts_title ) ): ?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html( $blog_posts_title ); ?></h2>
        </div><!-- .section-header -->
    <?php endif; ?>

    <div class="blog-post-wrapper grid-view col-1 clear">

        <?php foreach ( $get_content as $content ): ?>

            <article class="hentry">
                <div class="featured-image" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>')">
                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                </div>

                <div class="entry-container">
                    <div class="entry-meta">
                        <span class="cat-links">
                            <?php the_category( '', '', $content['id'] ); ?>
                        </span>
                    </div><!-- .entry-meta -->

                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
                    </header>

                    <div class="entry-content">
                        <p><?php echo esc_html( wp_trim_words( $content['content'], 20 ) ); ?></p>
                    </div>

                    <div class="footer-meta">
                        <?php 

                        bloz_post_author() ;

                        bloz_posted_on( $content['id'] );

                        ?>

                        <span class="comment"><a class="url fn n" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo get_comments_number( $content['id'] ); ?></a></span>

                    </div><!-- .entry-meta -->
                </div><!-- .entry-container -->
            </article>

        <?php endforeach; ?>

    </div><!-- .blog-posts-wrapper -->
</div>