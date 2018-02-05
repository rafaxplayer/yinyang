<?php
/**
 * Template part for displaying posts audio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yinyang-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="<?php echo get_theme_mod('yinyang_blog_items_animation','fade-up') ?>" data-aos-duration="1200" data-aos-once="true" data-aos-anchor-placement="top-bottom">
		
	<header class="entry-header">
			
		<?php the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>');?>
		<?php yinyang_get_post_tag(); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
	
		<div class="date">
			
		<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));?>">
			<span class="day"><?php the_time('d') ?></span>
		</a>
		<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));?>">
			<span class="moth"><?php the_time('M') ?> <?php the_time('Y') ?></span>
		</a>
		</div>
		<?php get_template_part('template-parts/partials/share-icons');?>
        <?php
            $content = apply_filters( 'the_content', get_the_content() );
            $audio = false;

                // Only get video from the content if a playlist isn't present.
                if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                    $audio = get_media_embedded_in_content( $content, array( 'audio') );
                }
                
                if ( ! is_single() ) :
        
                    if ( ! empty( $audio ) ) {
                        foreach ( $audio as $audio_html ) {
                            echo '<div class="entry-audio">';
                                echo $audio_html;
                            echo '</div>';
                        }
                    };
                    the_excerpt();
			    else:?>
					<figure><img src="<?php esc_url(yinyang_get_thumbnail($post,'post-single'));?>" alt="post image"/></figure>
					<div class="article_content">
						<?php the_content(); ?>
					</div>
					
			<?php endif; ?>
	</div><!-- .entry-content -->
	<div class="entry-meta">
        <?php printf('%1$s&nbsp;<span class="folder"> %2$s</span>&nbsp;',the_author_posts_link(),get_the_category_list(', ')); yinyang_get_edit_link()?>
		<div class="comments"><?php comments_popup_link('&nbsp;0 <span class="icon-bubbles4"></span>','&nbsp;1 <span class="icon-bubbles4"></span>','&nbsp;% <span class="icon-bubbles4"></span>'); ?></div>
	</div><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<div class="separator"></div>
