<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package understrap
 */
/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function understrap_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'understrap_infinite_scroll_render',
		'footer'    => 'wrapper-footer',
	) );
	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'understrap_jetpack_setup' );
/**
 * Custom render function for Infinite Scroll.
 */
function understrap_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
		    get_template_part( 'loop-templates/content', 'search' );
		else :
		    get_template_part( 'loop-templates/content', get_post_format() );
		endif;
	}
}

