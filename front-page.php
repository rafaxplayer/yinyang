<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yinyang-theme
 */
get_header(); ?>
	<main id="main" class="site-main">
       
        <?php // Show the selected frontpage content.
            if ( have_posts() ) :
                 while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/page/page', 'front-page' );
                endwhile;
            else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
                    get_template_part( 'template-parts/post/content', 'none' );
            endif; 
        ?>

        

        <?php
		// Get each of our panels and show the post data.
		if ( 0 !== yinyang_panel_count() || is_customize_preview() ) : // If we have pages to show.

			
			$num_sections = apply_filters( 'yinyang_front_page_sections', 4 );
			global $yinyangcounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$yinyangcounter = $i;
				yinyang_front_page_section( null, $i );
			}

        endif;
        ?>
        
        
    </main>
		
<?php

get_footer();
