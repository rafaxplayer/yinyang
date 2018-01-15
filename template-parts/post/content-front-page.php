<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yinyang-theme
 */

?>

<article id="post-<?php the_ID(); ?>"  data-aos="<?php echo get_theme_mod('yinyang_blog_items_animation','fade-up') ?>" data-aos-duration="1000" data-aos-once="true" data-aos-anchor-placement="top-bottom">
		
	<header  class="entry-header">
			
		<?php the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>');?>
		
	</header><!-- .entry-header -->
	
	<div  class="entry-content" >
	
		<div class="date">
			<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));?>">
				<span class="day"><?php the_time('d') ?></span>
			</a>
			<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));?>">
				<span class="moth"><?php the_time('M') ?> <?php the_time('Y') ?></span>
			</a>
		</div>
		<?php get_template_part('template-parts/partials/share-icons');?>
			
		<figure><img src="<?php esc_url(yinyang_get_thumbnail($post,'post-thumb'));?>" alt="post image"/></figure>
		<?php yinyang_the_excerpt('yinyang_short_post');?>
				
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->


