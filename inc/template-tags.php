<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package yinyang-theme
 */

if ( ! function_exists( 'yinyang_get_edit_link' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function yinyang_get_edit_link(){
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'yinyang' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'yinyang_get_post_tags' ) ) :

	function yinyang_get_post_tag(){
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'yinyang' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged in: %1$s', 'yinyang' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
endif;

function yinyang_front_page_section( $partial = null, $id = 0 ) {

	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {
		// Find out the id and set it up during a selective refresh.
		global $yinyangcounter;
		$id = str_replace( 'panel_', '', $partial->id );
		$yinyangcounter = $id;
	}

	global $post; // Modify the global post object before setting up post data.

	if ( get_theme_mod( 'panel_' . $id ) ) {
		$post = get_post( get_theme_mod( 'panel_' . $id ) );
		setup_postdata( $post );
		set_query_var( 'panel', $id );

		get_template_part( 'template-parts/page/page', 'front-page' );

		wp_reset_postdata();
	} elseif ( is_customize_preview() ) {
		// The output placeholder anchor.
		echo '<article class="panel-placeholder panel yinyang-panel yinyang-panel' . $id . '" id="panel' . $id . '"><span class="yinyang-panel-title">' . sprintf( __( 'Front Page Section %1$s Placeholder', 'yinyang' ), $id ) . '</span></article>';
	}
}

function yinyang_get_edit_post_link(){
	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'yinyang' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
?>
