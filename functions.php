<?php
/**
 * yinyang-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yinyang-theme
 */

if ( ! function_exists( 'yinyang_setup' ) ){
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yinyang_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yinyang-theme, use a find and replace
		 * to change 'yinyang' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yinyang', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size('post_thumb', 400, 200, true);
		add_image_size('post_single', 600, 300, true);
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-header' => __( 'Primary menu', 'yinyang' ),
			'menu-bottom' => __( 'Bottom menu', 'yinyang' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		
		add_theme_support('custom-header', array(
			'default-image'			=> get_template_directory_uri() . '/assets/images/bg.jpg',
			'header-text'			=> false,
			'default-text-color'		=> '000',
			'width'				=> 2500,
			'height'			=> 600,
			'flex-height'        => true,
			'uploads'       => true,
			
		));

		register_default_headers( array(
			'default-image' => array(
				'url'           => '%s/assets/images/bg.jpg',
				'thumbnail_url' => '%s/assets/images/bg.jpg',
				'description'   => __( 'Default Header Image', 'yinyang' ),
			),
		) );

		add_theme_support(  'custom-background', array(
			'default-color' => 'fff',
			'default-image' => '',
			) );

		add_theme_support( 'infinite-scroll', array(
			'type'           => 'scroll',
    		'footer_widgets' => false,
			'container'      => 'main',
			'wrapper'        => true,
			'render'         => 'yinyang_infinite_scroll_render',
			'posts_per_page' => false,
		));
		add_theme_support('starter-content', [

			'widgets' => [
				'sidebar-bottom' => [
					'calendar' => array( 'calendar', array(
						'title' => __( 'Calendar','yinyang'),
					) ),
					'search' => array( 'search', array(
						'title' => __( 'Search','yinyang'),
					) ),
				],
			],
			'options' => [
                'show_on_front' => 'page',
                'page_on_front' => '{{home}}',
                'page_for_posts' => '{{myblog}}',
            ],
            // Starter pages to include
            'posts' => [
                'home' =>[
					'post_type' => 'page',
					'post_title' 	=>	__('Home','yinyang'),
                    'thumbnail'		=>	'{{image-home}}',
                    'post_content' 	=> '<p>'.__('To show front page, you must set a home page','yinyang').'</p>',
                ],
                'myblog' =>[
					'post_type' 	=> 'page',
					'post_title' 	=>	__('Blog','yinyang'),
					'thumbnail'		=> '{{image-blog}}',
					
				],
				'about'=>[
					'post_type' 	=> 'page',
					'post_title' 	=>	__('About','yinyang'),
					'thumbnail'		=> '{{image-about}}',
					
				],
				'contact'=>[
					'post_type' 	=> 'page',
					'post_title' 	=>	__('Contact','yinyang'),
					'thumbnail'		=> '{{image-contact}}',
					
				],
                
			],
			// starter attachments
            'attachments' => [
                'image-home' => [
					'post_title' => _x( 'Home Image', 'Theme starter content', 'yinyang' ),
					'post_content' => 'Attachment Description',
                    'post_excerpt' => 'Attachment Caption',
                    'file' 			=> 'assets/images/home.jpg',
				],
                'image-blog' => [
					'post_title' => _x( 'Blog Image', 'Theme starter content', 'yinyang' ),
					'post_content' => 'Attachment Description',
                    'post_excerpt' => 'Attachment Caption',
                    'file' 			=> 'assets/images/blog.jpg',
				],
				'image-contact' => [
					'post_title' => _x( 'Contact Image', 'Theme starter content', 'yinyang' ),
					'post_content' => 'Attachment Description',
                    'post_excerpt' => 'Attachment Caption',
                    'file' 			=> 'assets/images/contact.jpg',
				],
				'image-about' => [
					'post_title' => _x( 'About Image', 'Theme starter content', 'yinyang' ),
					'post_content' => 'Attachment Description',
                    'post_excerpt' => 'Attachment Caption',
                    'file' 			=> 'assets/images/about.jpg',
				],
			],
			//starter menu
			'nav-menus'=> [
				'menu-header' => [
					'name' => __( 'Primary menu', 'yinyang' ),
					'items'=> [
						'page_contact',
						'page_about',
						'page_blog',
						'home_link'
					],
				],
			],
			// Customizer pannels
			'theme_mods' => array(
				'panel_1' => '{{myblog}}',
				'panel_2' => '{{about}}',
				'panel_3' => '{{contact}}',
			),
			
		]);
		
	}
}
add_action( 'after_setup_theme', 'yinyang_setup' );

function yinyang_infinite_scroll_render() {
	get_template_part( 'loop' );
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yinyang_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yinyang_content_width', 640 );
}
add_action( 'after_setup_theme', 'yinyang_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yinyang_widgets_init() {

	if(function_exists('register_sidebar')){

		register_sidebar( array(
			'name'          => esc_html__( 'Bar Right', 'yinyang' ),
			'id'            => 'sidebar-side',
			'description'   => esc_html__( 'Add widgets here.', 'yinyang' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Bar Bottom', 'yinyang' ),
			'id'            => 'sidebar-bottom',
			'description'   => esc_html__( 'Add widgets here.', 'yinyang' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	
}
add_action( 'widgets_init', 'yinyang_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yinyang_scripts() {

	/* css */
	wp_enqueue_style( 'googlefont', 'https://fonts.googleapis.com/css?family=Courgette|Roboto:100,400,500,500i,700,700i' );
			
	wp_enqueue_style( 'icomoon',  get_template_directory_uri() . '/assets/css/icomoon.css' ,array(), '1.0','all');

	wp_enqueue_style( 'aos-animations',  get_template_directory_uri() . '/assets/css/aos.css' ,array(), '2.4.0','all');

	wp_enqueue_style( 'bxslider-css',  get_template_directory_uri() . '/assets/css/jquery.bxslider.min.css' ,array(), '4.2.12','all');

	wp_enqueue_style( 'lightbox',  get_template_directory_uri() . '/assets/css/lightbox.min.css' ,array(), '3.2.1','all');

	wp_enqueue_style( 'normalize',  get_template_directory_uri() . '/assets/css/normalize.css' ,array(), '7.0.0','all');
	
	wp_enqueue_style( 'yinyang-style', get_stylesheet_uri() ,array('normalize'),'1.0','all');

	/* scripts */

	wp_enqueue_script( 'aos',  get_template_directory_uri() . '/assets/js/aos.js' ,array('jquery'),'2.4.0',true);

	wp_enqueue_script( 'bxslider',  get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js' ,array('jquery'),'4.2.12',true);
		
	wp_enqueue_script( 'lightbox',  get_template_directory_uri() . '/assets/js/lightbox.min.js' ,array('jquery'),'3.2.1',true);

	wp_enqueue_script( 'scrollto',  get_template_directory_uri() . '/assets/js/jquery.scrollTo.js' ,array('jquery'),'2.1.2',true);

	wp_enqueue_script( 'yinyang-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'yinyang-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
	
	wp_enqueue_script( 'yinyang-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yinyang_scripts' );

/**
 * Filters.
 */
function yinyang_get_the_author_posts_link() {
    global $authordata;
    if ( ! is_object( $authordata ) ) {
        return;
    }
 
    $link = sprintf( '<a href="%1$s" title="%2$s" rel="author"><span class="user"></span>&nbsp;%3$s&nbsp;</a>&nbsp;',
        esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
        /* translators: %s: author's display name */
        esc_attr( sprintf('Posts by %s', get_the_author() ) ),
        get_the_author()
    );
	return $link;
    
    
}
add_filter( 'the_author_posts_link','yinyang_get_the_author_posts_link' );

// Custom Excerpts
// Create 20 Word Callback for Index page Excerpts, call using yinyang_excerpt('yinyang_short_post');
function yinyang_short_post($length){
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using yinyang_excerpt('yinyang_medium_post');
function yinyang_medium_post($length){
    return 40;
}
// Create 40 Word Callback for Custom Post Excerpts, call using yinyang_excerpt('yinyang_large_post');
function yinyang_large_post($length){
    return 100;
}

// Create the Custom Excerpts callback
function yinyang_the_excerpt($length_callback = '')
{
    global $post;
    
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    

    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output); 
    $output = '<p class=="ex">' . $output . '</p>';
    echo $output;
}


function yinyang_custom_excerpt_more( $more ) {
	global $post;
	return sprintf('<a class="moretag" href="%1$s">%2$s</a>',esc_url(get_permalink($post->ID)),__( 'Read More <span class="icon-long_arrow_right"></span>', 'yinyang' ));
	
}
add_filter( 'excerpt_more', 'yinyang_custom_excerpt_more' );


function yinyang_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'yinyang_front_page_template' ); 

function remove_admin_bar(){

	return false;
}


//add_filter('show_admin_bar', 'remove_admin_bar');
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/options.php';

/**
 * hooks.
 */
require get_template_directory() . '/inc/hooks.php';


