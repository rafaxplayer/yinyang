<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yinyang-theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<h3 class="title-section"><?php echo __('Comments','yinyang'); ?><h3>
		<div class="separator-bis">
        	<span class="icon-color-mode"></span>
    	</div>
<div id="comments" class="comments-area">
	
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php
				$comment_count = get_comments_number();
				if ( 1 === $comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html(_x( '%s One thought','icon', 'yinyang' ),'<span class="icon-bubbles4"></span>'));
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%2$s %1$s thought', '%2$s %1$s thoughts', $comment_count, 'icon','yinyang' ) ),
						number_format_i18n( $comment_count ),'<span class="icon-bubbles4"></span>');
				}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'yinyang' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
