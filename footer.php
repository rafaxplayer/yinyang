<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yinyang-theme
 */

?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer">

		<?php get_template_part( './template-parts/partials/sidebar', 'bottom' ); ?>
		
		<?php if(has_nav_menu( 'menu-bottom' )):?>
			
				<?php wp_nav_menu( array(
					'theme_location' => 'menu-bottom',
					'menu_id'        => 'menu-footer',
					'menu_class'=> 'footer-menu'
				));?>
			
		<?php endif;?>

		<div class="site-info">
			<?php 
				$default = sprintf('yin-yang Theme');
				$textinfo = strlen(get_option('yinyang_footer_copy_text', $default)) > 0 ? get_option('yinyang_footer_copy_text', $default ) : $default;
				echo sprintf('&copy;%1$s <span class="copy">%2$s</span>', date('Y') ,$textinfo)
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<div class="button-up"><span class="icon-angle_up"></span></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
