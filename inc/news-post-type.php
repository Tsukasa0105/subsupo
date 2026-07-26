<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function subsupo_register_news_post_type() {
	register_post_type(
		'news',
		array(
			'labels'       => array(
				'name'          => 'お知らせ',
				'singular_name' => 'お知らせ',
				'add_new_item'  => '新規お知らせを追加',
				'edit_item'     => 'お知らせを編集',
				'all_items'     => 'お知らせ一覧',
			),
			'public'       => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-megaphone',
			'rewrite'      => array( 'slug' => 'news' ),
			'supports'     => array( 'title', 'editor', 'excerpt' ),
		)
	);

	register_taxonomy(
		'news_category',
		'news',
		array(
			'labels'            => array(
				'name'          => 'お知らせカテゴリー',
				'singular_name' => 'カテゴリー',
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'news-category' ),
		)
	);
}
add_action( 'init', 'subsupo_register_news_post_type' );

function subsupo_news_archive_query( $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( $query->is_post_type_archive( 'news' ) || $query->is_tax( 'news_category' ) ) ) {
		$query->set( 'posts_per_page', 6 );
	}
}
add_action( 'pre_get_posts', 'subsupo_news_archive_query' );

/**
 * News posts to keep in sync with the current copy deck. Each item is
 * looked up by slug and only created if missing, so this is safe to run
 * on every wp-admin page load (see subsupo_seed_news_content() below) —
 * it never duplicates or overwrites a post that already exists.
 */
function subsupo_news_seed_items() {
	return array(
		array(
			'slug'    => 'hp-shinsetsu',
			'title'   => 'HP新設いたしました。',
			'content' => 'HP新設いたしました。',
			'date'    => '2026-07-23 10:00:00',
			'term'    => 'お知らせ',
		),
		array(
			'slug'    => 'koubo-shimekiri-0427',
			'title'   => '経産省 省エネ・非化石転換補助金の公募締め切りました。',
			'content' => '経産省 省エネ・非化石転換補助金の公募締め切りました。次回の2次公募は6月上旬より公募開始予定となります。',
			'date'    => '2026-04-27 10:00:00',
			'term'    => '補助金情報',
		),
		array(
			'slug'    => 'koubo-kaishi-0330',
			'title'   => '経産省 省エネ・非化石転換補助金の公募開始しました。',
			'content' => '経産省 省エネ・非化石転換補助金の公募開始しました。',
			'date'    => '2026-03-30 10:00:00',
			'term'    => '補助金情報',
		),
		array(
			'slug'    => 'setsuritsu',
			'title'   => '設立',
			'content' => '設立',
			'date'    => '2026-01-14 10:00:00',
			'term'    => 'お知らせ',
		),
	);
}

function subsupo_get_or_create_news_term( $name ) {
	$term = get_term_by( 'name', $name, 'news_category' );
	if ( $term instanceof WP_Term ) {
		return $term->term_id;
	}
	$inserted = wp_insert_term( $name, 'news_category' );
	return is_wp_error( $inserted ) ? 0 : $inserted['term_id'];
}

/**
 * Creates any missing news posts (and their terms). Runs on admin_init so
 * it happens the next time an administrator loads wp-admin — no external
 * network call is involved, since it all runs locally in PHP on the site.
 */
function subsupo_seed_news_content() {
	foreach ( subsupo_news_seed_items() as $item ) {
		if ( get_page_by_path( $item['slug'], OBJECT, 'news' ) ) {
			continue;
		}

		$term_id = subsupo_get_or_create_news_term( $item['term'] );

		$post_id = wp_insert_post(
			array(
				'post_type'    => 'news',
				'post_name'    => $item['slug'],
				'post_title'   => $item['title'],
				'post_content' => $item['content'],
				'post_status'  => 'publish',
				'post_date'    => $item['date'],
			)
		);

		if ( $post_id && ! is_wp_error( $post_id ) && $term_id ) {
			wp_set_post_terms( $post_id, array( $term_id ), 'news_category' );
		}
	}
}
add_action( 'admin_init', 'subsupo_seed_news_content' );
