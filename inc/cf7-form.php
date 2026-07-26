<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SUBSUPO_CF7_FORM_TITLE', 'サブサポお問い合わせフォーム' );

/**
 * Creates the Contact Form 7 form used on the front page if it doesn't
 * exist yet. Runs on admin_init (the next time an administrator loads
 * wp-admin) so this is provisioned locally by WordPress itself — no
 * external network call is involved.
 */
function subsupo_create_cf7_form() {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		return;
	}

	$existing = get_posts(
		array(
			'post_type'   => 'wpcf7_contact_form',
			'title'       => SUBSUPO_CF7_FORM_TITLE,
			'post_status' => 'any',
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);

	if ( ! empty( $existing ) ) {
		return;
	}

	$contact_form = WPCF7_ContactForm::get_template( array( 'title' => SUBSUPO_CF7_FORM_TITLE ) );

	$form_html = <<<'FORM'
<div>
	<label for="email" class="block text-sm font-medium text-gray-700 mb-1">メールアドレス <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
	[email* email id:email class:subsupo-cf7-input]
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
	<div>
		<label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">企業名・団体名 <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
		[text* company_name id:company_name class:subsupo-cf7-input]
	</div>
	<div>
		<label for="company_name_kana" class="block text-sm font-medium text-gray-700 mb-1">企業名・団体名(かな) <span class="text-gray-500 text-xs ml-1">任意</span></label>
		[text company_name_kana id:company_name_kana class:subsupo-cf7-input]
	</div>
</div>

<div>
	<label for="department" class="block text-sm font-medium text-gray-700 mb-1">部署/役職 <span class="text-gray-500 text-xs ml-1">任意</span></label>
	[text department id:department class:subsupo-cf7-input]
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
	<div>
		<label for="name" class="block text-sm font-medium text-gray-700 mb-1">氏名 <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
		[text* name id:name class:subsupo-cf7-input]
	</div>
	<div>
		<label for="name_kana" class="block text-sm font-medium text-gray-700 mb-1">氏名(かな) <span class="text-gray-500 text-xs ml-1">任意</span></label>
		[text name_kana id:name_kana class:subsupo-cf7-input]
	</div>
</div>

<div>
	<label for="phone" class="block text-sm font-medium text-gray-700 mb-1">電話番号 <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
	[tel* phone id:phone class:subsupo-cf7-input]
</div>

<div>
	<label for="message" class="block text-sm font-medium text-gray-700 mb-1">お問い合わせ内容 <span class="text-gray-500 text-xs ml-1">任意</span></label>
	[textarea message id:message class:subsupo-cf7-input placeholder "例：工場の空調を最新のものに入れ替えたいのですが、使える補助金はありますか？"]
</div>

<div class="text-center pt-4">
	[submit "上記の内容で送信する" class:subsupo-cf7-submit]
</div>
FORM;

	$site_host = wp_parse_url( home_url(), PHP_URL_HOST );

	$contact_form->set_properties(
		array(
			'form' => $form_html,
			'mail' => array(
				'active'             => true,
				'subject'            => '【サイトお問合せ】[company_name] 様よりご相談',
				'sender'             => '[company_name] <wordpress@' . $site_host . '>',
				'recipient'          => get_option( 'admin_email' ),
				'body'               => "Webサイトのお問い合わせフォームより送信がありました。\n\nメールアドレス: [email]\n企業名・団体名: [company_name]\n企業名・団体名(かな): [company_name_kana]\n部署/役職: [department]\n氏名: [name]\n氏名(かな): [name_kana]\n電話番号: [phone]\n\nお問い合わせ内容:\n[message]",
				'additional_headers' => 'Reply-To: [email]',
				'attachments'        => '',
				'use_html'           => false,
				'exclude_blank'      => true,
			),
			'mail_2' => array(
				'active'             => false,
				'subject'            => '',
				'sender'             => '',
				'recipient'          => '',
				'body'               => '',
				'additional_headers' => '',
				'attachments'        => '',
				'use_html'           => false,
				'exclude_blank'      => false,
			),
		)
	);

	$contact_form->save();
}
add_action( 'admin_init', 'subsupo_create_cf7_form' );

/**
 * Renders the contact form via its shortcode, or an empty string if
 * Contact Form 7 isn't active yet / the form hasn't been provisioned.
 */
function subsupo_render_contact_form() {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		return '';
	}

	$posts = get_posts(
		array(
			'post_type'   => 'wpcf7_contact_form',
			'title'       => SUBSUPO_CF7_FORM_TITLE,
			'post_status' => 'any',
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);

	if ( empty( $posts ) ) {
		return '';
	}

	return do_shortcode( '[contact-form-7 id="' . (int) $posts[0] . '" title="' . esc_attr( SUBSUPO_CF7_FORM_TITLE ) . '"]' );
}
