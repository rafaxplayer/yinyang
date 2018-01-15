<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yinyang-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yinyang' ); ?></a>

	<header id="masthead" class="site-header" style="background-image:url(<?php header_image();?>);">
		<div class="site-branding">
			<div id="logo">
				<?php the_custom_logo(); ?>
			</div>
			<div class="titles">
				<h1 data-aos="<?php echo get_theme_mod('yinyang_header_title_animation','fade-up') ?>" data-aos-duration="1200" class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
				<?php
					$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p data-aos="<?php echo get_theme_mod('yinyang_header_subtitle_animation','fade-up') ?>" data-aos-duration="1200" class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div>
			
			<span class="toggle-button icon-signal"></span>
		</div><!-- .site-branding -->
		
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="icon-align_justify"></span></button>
						
			<h1 class="site-title-small"><?php echo wp_trim_words(get_bloginfo( 'name' ), $num_words = 3);?></h1>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-header'
					
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	<div id="content" class="site-content">
	