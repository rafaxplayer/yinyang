<?php
    $wp_customize->add_section('yinyang_animations_section', array(
            'title' => esc_html__( 'Theme Animations', 'yinyang' ),
            'priority' => 32,
            'description' => esc_html__('Customize theme animations', 'yinyang'),
    ));
    // animation for title theme
    $wp_customize->add_setting( 'yinyang_header_title_animation' , array(
		'default' =>  'fade-up',
		'transport' => 'refresh',
		'sanitize_callback' => 'yinyang_sanitize_select',
	)); 
	
	$wp_customize->add_control( 'yinyang_header_title_animation', array(
		'label'      => __( 'Title animation', 'yinyang' ),
		'section'    => 'yinyang_animations_section',
		'settings'   => 'yinyang_header_title_animation',
        'description'=> esc_html__('Set animation for header title','yinyang'),
        'type' => 'select',
        'choices' => yinyang_animations_css(),
    ));

    // animation for subtitle
    $wp_customize->add_setting( 'yinyang_header_subtitle_animation' , array(
		'default' =>  'fade-up',
		'transport' => 'refresh',
		'sanitize_callback' => 'yinyang_sanitize_select',
	)); 
	
	$wp_customize->add_control( 'yinyang_header_subtitle_animation', array(
		'label'      => __( 'Sub Title animation', 'yinyang' ),
		'section'    => 'yinyang_animations_section',
		'settings'   => 'yinyang_header_subtitle_animation',
        'description'=> esc_html__('Set animation for header subtitle','yinyang'),
        'type' => 'select',
        'choices' => yinyang_animations_css(),
    ));

    // animation for blog items
    $wp_customize->add_setting( 'yinyang_blog_items_animation' , array(
		'default' =>  'fade-up',
		'transport' => 'refresh',
		'sanitize_callback' => 'yinyang_sanitize_select',
	)); 
	
	$wp_customize->add_control( 'yinyang_blog_items_animation', array(
		'label'      => __( 'Blog items animation', 'yinyang' ),
		'section'    => 'yinyang_animations_section',
		'settings'   => 'yinyang_blog_items_animation',
        'description'=> esc_html__('Set animation for blog items','yinyang'),
        'type' => 'select',
        'choices' => yinyang_animations_css(),
    ));


    function yinyang_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );
      
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;
      
        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

    function yinyang_animations_css(){

        return array( 
            ''=>'none',
            'fade-up' => 'fade-up', 
            'fade-down' => 'fade-down',
            'fade-left' => 'fade-left',
            'fade-right' => 'fade-right',
            'flip-up' => 'flip-up', 
            'flip-left' => 'flip-left',
            'flip-right' => 'flip-right',
            'flip-down'=> 'flip-down',
            'slide-up' => 'slide-up',
            'slide-down' => 'slide-down',
            'slide-left' => 'slide-left',
            'slide-right' => 'slide-right',
        );
    }