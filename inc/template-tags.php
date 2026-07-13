<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns a link to an in-page anchor. On the front page it's a plain
 * "#anchor" hash link; anywhere else it points back to the front page
 * first so the browser scrolls to that section after loading.
 */
function subsupo_anchor_url( $anchor ) {
	if ( is_front_page() ) {
		return '#' . $anchor;
	}
	return trailingslashit( home_url( '/' ) ) . '#' . $anchor;
}

/**
 * Tailwind badge classes for a news_category term slug.
 */
function subsupo_news_badge_class( $post_id ) {
	$terms = get_the_terms( $post_id, 'news_category' );
	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return 'bg-secondary';
	}
	return ( '補助金情報' === $terms[0]->name ) ? 'bg-primary' : 'bg-secondary';
}

function subsupo_news_badge_label( $post_id ) {
	$terms = get_the_terms( $post_id, 'news_category' );
	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return 'お知らせ';
	}
	return esc_html( $terms[0]->name );
}
