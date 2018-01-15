<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yinyang-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-post'); ?> data-aos="<?php echo get_theme_mod('yinyang_blog_items_animation','fade-up') ?>" data-aos-duration="800" data-aos-once="true">

	<header class="entry-header">

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
		<?php yinyang_get_post_tag(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="date">
			<span class="day"><?php the_time('d') ?></span>
			<span class="moth"><?php the_time('M') ?> <?php the_time('Y') ?></span>
		</div>

		<?php yinyang_the_excerpt('yinyang_short_post'); ?>

	</div><!-- .entry-content -->
	<?php if(is_page()):?>
		<div class="entry-meta">
			<?php printf('%1$s&nbsp;<span class="folder"> %2$s</span>&nbsp;',the_author_posts_link(),get_the_category_list(', ')); yinyang_get_edit_link()?>
			<div class="comments"><?php comments_popup_link('&nbsp;0 <span class="icon-bubbles4"></span>','&nbsp;1 <span class="icon-bubbles4"></span>','&nbsp;% <span class="icon-bubbles4"></span>'); ?></div>
		</div><!-- .entry-meta -->
	<?php endif;?>
</article><!-- #post-<?php the_ID(); ?> -->

<div class="separator"></div>

