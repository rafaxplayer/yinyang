<?php 

	global $yinyangcounter; 
	$class = '';
	if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : 
		$class = 'front-posts';
	endif;
?>


<article id="panel<?php echo $yinyangcounter; ?>" <?php post_class('yinyang-panel '.$class); ?>>
	<div class="panel-content">
		<header class="entry-header" >
			<?php if(has_post_thumbnail()):?>
    			<div class="image-panel" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
			<?php endif; ?>post
			<a href="<?php echo esc_url(get_page_link()); ?>">
				<?php the_title( '<h2 class="title-section">', '</h2>' ); ?>
			</a>
			<div class="separator-bis dark">
				<span class="icon-color-mode"></span>
			</div>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'yinyang' ),
					get_the_title()
				) );
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yinyang' ),
					'after'  => '</div>',
				) );
			?>

	<?php
		// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
		if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>
			<?php // Show four most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
			?>
			<?php if ( $recent_posts->have_posts() ) : ?>
				
				<div class="recent-posts">
					<?php
					while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
						get_template_part( 'template-parts/post/content', 'front-page' );
					endwhile;
					wp_reset_postdata();
					?>
				</div><!-- .recent-posts -->
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					yinyang_get_edit_post_link();
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->