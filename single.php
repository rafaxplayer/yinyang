<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yinyang-theme
 */

get_header(); ?>
	
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/post/content', get_post_type() );
			
			yinyang_get_posts_navigation();
			
			do_action( 'yinyang_related_posts' );
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number()) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

<?php
get_template_part( 'template-parts/partials/sidebar', 'side' );
get_footer();
