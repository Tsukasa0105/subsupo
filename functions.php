<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SUBSUPO_VERSION', '1.0.0' );

/**
 * Theme setup
 */
function subsupo_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'subsupo_setup' );

/**
 * Scripts and styles
 */
function subsupo_enqueue_assets() {
	// Google Fonts
	wp_enqueue_style( 'subsupo-google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap', array(), null );

	// Font Awesome
	wp_enqueue_style( 'subsupo-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	// Tailwind CSS (Play CDN) + inline config
	wp_enqueue_script( 'subsupo-tailwind', 'https://cdn.tailwindcss.com?plugins=typography', array(), null, false );
	wp_add_inline_script(
		'subsupo-tailwind',
		"tailwind.config = {
			theme: {
				extend: {
					fontFamily: {
						sans: ['\"Noto Sans JP\"', 'sans-serif'],
					},
					colors: {
						primary: '#0087CD',
						secondary: '#36A852',
						accent: '#FF7A00',
					}
				}
			}
		}"
	);

	// Theme stylesheet (custom rules that Tailwind utilities can't express)
	wp_enqueue_style( 'subsupo-style', get_template_directory_uri() . '/assets/css/style.css', array(), SUBSUPO_VERSION );

	// Theme JS (mobile menu, FAQ accordion, contact form UX)
	wp_enqueue_script( 'subsupo-main', get_template_directory_uri() . '/assets/js/main.js', array(), SUBSUPO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'subsupo_enqueue_assets' );

/**
 * News custom post type + taxonomy
 */
require get_template_directory() . '/inc/news-post-type.php';

/**
 * Template helper functions (anchor links, badges, contact form handler)
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/contact-form.php';
require get_template_directory() . '/inc/setup.php';
