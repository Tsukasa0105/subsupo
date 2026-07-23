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
 * Seed demo content matching the original design on first theme activation.
 * Safe to run repeatedly: it only inserts posts when the CPT is empty.
 */
function subsupo_seed_news_content() {
	if ( ! empty( get_posts( array( 'post_type' => 'news', 'numberposts' => 1, 'fields' => 'ids' ) ) ) ) {
		return;
	}

	$hojokin = wp_insert_term( '補助金情報', 'news_category' );
	$oshirase = wp_insert_term( 'お知らせ', 'news_category' );

	$hojokin_id  = is_wp_error( $hojokin ) ? get_term_by( 'name', '補助金情報', 'news_category' )->term_id : $hojokin['term_id'];
	$oshirase_id = is_wp_error( $oshirase ) ? get_term_by( 'name', 'お知らせ', 'news_category' )->term_id : $oshirase['term_id'];

	$items = array(
		array(
			'title'   => 'HP新設いたしました。',
			'content' => 'この度、株式会社サブサポのコーポレートサイトを新設いたしました。今後とも何卒よろしくお願い申し上げます。',
			'date'    => '2026-07-23 10:00:00',
			'term'    => $oshirase_id,
		),
		array(
			'title'   => '経産省 省エネ・非化石転換補助金の公募締め切りました。',
			'content' => '経産省 省エネ・非化石転換補助金の公募締め切りました。次回の2次公募は6月上旬より公募開始予定となります。',
			'date'    => '2026-04-27 10:00:00',
			'term'    => $hojokin_id,
		),
		array(
			'title'   => '経産省 省エネ・非化石転換補助金の公募開始しました。',
			'content' => '経産省 省エネ・非化石転換補助金の公募開始しました。',
			'date'    => '2026-03-30 10:00:00',
			'term'    => $hojokin_id,
		),
		array(
			'title'   => '設立',
			'content' => '株式会社サブサポを設立いたしました。',
			'date'    => '2026-01-14 10:00:00',
			'term'    => $oshirase_id,
		),
	);

	foreach ( $items as $item ) {
		$post_id = wp_insert_post(
			array(
				'post_type'    => 'news',
				'post_title'   => $item['title'],
				'post_content' => $item['content'],
				'post_status'  => 'publish',
				'post_date'    => $item['date'],
			)
		);

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			wp_set_post_terms( $post_id, array( $item['term'] ), 'news_category' );
		}
	}
}
add_action( 'after_switch_theme', 'subsupo_seed_news_content' );
