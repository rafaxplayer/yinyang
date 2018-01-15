<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yinyang-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<header data-aos="<?php echo get_theme_mod('yinyang_blog_items_animation','fade-up') ?>" data-aos-duration="1200" data-aos-once="true" data-aos-anchor-placement="top-bottom" class="entry-header">
			
		<?php the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>');?>
		<?php yinyang_get_post_tag(); ?>
	</header><!-- .entry-header -->
	
	<div data-aos="<?php echo get_theme_mod('yinyang_blog_items_animation','fade-up') ?>" data-aos-duration="800" data-aos-once="true" data-aos-anchor-placement="top-bottom" class="entry-content">
	
		<div class="date">
			<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));?>">
				<span class="day"><?php the_time('d') ?></span>
			</a>
			<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));?>">
				<span class="moth"><?php the_time('M') ?> <?php the_time('Y') ?></span>
			</a>

		</div>
		<?php get_template_part('template-parts/partials/share-icons');?>
		
		<?php if(!is_single()): ?>

			<figure><a href="<?php echo get_the_permalink();?>"><img src="<?php esc_url(yinyang_get_thumbnail($post,'post-thumb'));?>" alt="post image"/></a></figure>
			<?php yinyang_the_excerpt('yinyang_short_post');?>

		<?php else: ?>

			<figure><img src="<?php esc_url(yinyang_get_thumbnail($post,'post-single'));?>" alt="post image"/></figure>
			<div class="article_content">
				<?php the_content(); ?>
			</div>
				
		<?php endif; ?>
	</div><!-- .entry-content -->
	<div class="entry-meta">
		<?php printf('%1$s&nbsp;<span class="folder"> %2$s</span>&nbsp;', the_author_posts_link(), get_the_category_list(', ')); yinyang_get_edit_link()?>
		<div class="comments"><?php comments_popup_link('&nbsp;0 <span class="icon-bubbles4"></span>','&nbsp;1 <span class="icon-bubbles4"></span>','&nbsp;% <span class="icon-bubbles4"></span>'); ?> </div>
	</div><!-- .entry-meta -->
	
</article><!-- #post-<?php the_ID(); ?> -->

<div class="separator"></div>
