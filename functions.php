<?php

// Remove inline style 'width' attribute from captions.
add_filter( 'img_caption_shortcode_width', '__return_false' );

add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}
