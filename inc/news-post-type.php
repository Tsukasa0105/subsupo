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
			'title'   => '令和8年度 省エネ補助金の公募スケジュールが発表されました。',
			'content' => '経済産業省より、令和8年度の「先進的省エネルギー投資促進需要創出等支援事業」の公募スケジュールが公開されました。第1次公募は来月より開始される見込みです。準備に関するご相談はお早めにどうぞ。',
			'date'    => '2026-05-20 10:00:00',
			'term'    => $hojokin_id,
		),
		array(
			'title'   => '株式会社サブサポのコーポレートサイトをリニューアルいたしました。',
			'content' => '平素は格別のお引き立てを賜り、厚く御礼申し上げます。この度、当社のサービス内容をより分かりやすくお伝えするため、Webサイトを全面リニューアルいたしました。',
			'date'    => '2026-04-15 10:00:00',
			'term'    => $oshirase_id,
		),
		array(
			'title'   => '事業再構築補助金 第12回公募の採択結果について',
			'content' => '当社がご支援させていただいた企業様のうち、多数が事業再構築補助金の第12回公募にて無事採択されました。誠におめでとうございます。',
			'date'    => '2026-03-10 10:00:00',
			'term'    => $hojokin_id,
		),
		array(
			'title'   => '新年のご挨拶',
			'content' => '新年あけましておめでとうございます。旧年中は格別のご厚情を賜り、誠にありがとうございました。本年も皆様の設備投資・補助金活用を全力でサポートしてまいります。',
			'date'    => '2026-01-05 10:00:00',
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
