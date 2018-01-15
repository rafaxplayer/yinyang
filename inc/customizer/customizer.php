<?php
/**
 * yinyang-theme Theme Customizer
 *
 * @package yinyang-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yinyang_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	 

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'yinyang_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'yinyang_customize_partial_blogdescription',
		) );
	}

	if(file_exists(get_template_directory().'/inc/customizer/customizer-front-page.php')){

		require get_template_directory().'/inc/customizer/customizer-front-page.php';
	}

	if(file_exists(get_template_directory().'/inc/customizer/customizer-animations.php')){

		require get_template_directory().'/inc/customizer/customizer-animations.php';
	}

}
add_action( 'customize_register', 'yinyang_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function yinyang_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function yinyang_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function yinyang_is_static_front_page() {
	
	return ( is_front_page() && ! is_home() );
}

function yinyang_customize_js() {
	wp_enqueue_script( 'yinyang-customize-js', get_theme_file_uri( '/js/customize.js' ), array( ), '1.0', true );
}
add_action( 'customize_preview_init', 'yinyang_customize_js' );
