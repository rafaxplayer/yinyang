<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package yinyang-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function yinyang_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'yinyang_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function yinyang_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'yinyang_pingback_header' );

function yinyang_get_thumbnail($post,$size){

	if(is_single()){
		$size='post_single';
	}else{
		$size='post_thumb';
	}
	
	if(has_post_thumbnail( $post )){
		echo the_post_thumbnail_url( $size );
	}else{
		if('post_thumb'== $size){
			echo get_template_directory_uri().'/assets/images/placeholder-post.jpg';
		}else{
			echo get_template_directory_uri().'/assets/images/placeholder.jpg';
		}
		
	}
	
}

function yinyang_get_posts_navigation(){
	if(is_single( )):?>
		<nav class="pagination">
			<div class="nav-links prev">
				<?php if($prev = get_previous_post(TRUE)):?>
				<?php previous_post_link('%link','<span class="icon-angle_left"></span>',TRUE);?>
					<div class="info-pagin">
						<img src="<?php echo esc_url(yinyang_get_image_url($prev));?>" alt=""/>
						<h3><?php echo wp_trim_words($prev->post_title,3); ?></h3>
					</div> 
					
				<?php endif;?>
			
			</div>
			<div class="nav-links next">
				<?php if($next = get_next_post(TRUE)):?>
				<?php next_post_link('%link','<span class="icon-angle_right"></span>',TRUE); ?>
					<div class="info-pagin">
						<img src="<?php echo esc_url(yinyang_get_image_url($next));?>" alt=""/>
						<h3><?php echo wp_trim_words($next->post_title,3); ?></h3>
					</div> 
					
				<?php endif;?>
			</div>
		</nav>
		
	<?php else:
		the_posts_navigation(array(
				'prev_text'          => sprintf('<span class="icon-angle_left"></span> %s',__( 'Older posts' ,'yinyang')),
				'next_text'          => sprintf('%s <span class="icon-angle_right"></span>',__( 'Newer posts' ,'yinyang')),
				'screen_reader_text' => __( 'Posts navigation', 'yinyang'),
				));
		endif;
}

function trim_title($title=''){
	return wp_trim_words($title, 2,'...');
}

function yinyang_get_image_url($post){
    if(has_post_thumbnail($post)){
        return get_the_post_thumbnail_url($post);
    }
    return get_theme_file_uri('/images/placeholder-post.jpg');
}

function yinyang_panel_count() {

	$panel_count = 0;

	/**
	 * Filter number of front page sections in Twenty Seventeen.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'yinyang_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}

	return $panel_count;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function yinyang_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}