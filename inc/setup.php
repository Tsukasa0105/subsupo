<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Auto-assign the "privacy-policy" page as the site's designated Privacy
 * Policy page once it exists, so get_privacy_policy_url() in footer.php
 * resolves without requiring a manual step in Settings > Privacy.
 */
function subsupo_maybe_set_privacy_policy_page() {
	if ( get_option( 'wp_page_for_privacy_policy' ) ) {
		return;
	}

	$page = get_page_by_path( 'privacy-policy' );
	if ( $page instanceof WP_Post ) {
		update_option( 'wp_page_for_privacy_policy', $page->ID );
	}
}
add_action( 'init', 'subsupo_maybe_set_privacy_policy_page' );
