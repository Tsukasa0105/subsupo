<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function subsupo_handle_contact_form() {
	if ( ! isset( $_POST['subsupo_contact_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['subsupo_contact_nonce'] ), 'subsupo_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', trailingslashit( home_url( '/' ) ) . '#contact' ) );
		exit;
	}

	$company_name      = isset( $_POST['company_name'] ) ? sanitize_text_field( wp_unslash( $_POST['company_name'] ) ) : '';
	$company_name_kana = isset( $_POST['company_name_kana'] ) ? sanitize_text_field( wp_unslash( $_POST['company_name_kana'] ) ) : '';
	$department        = isset( $_POST['department'] ) ? sanitize_text_field( wp_unslash( $_POST['department'] ) ) : '';
	$name              = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$name_kana         = isset( $_POST['name_kana'] ) ? sanitize_text_field( wp_unslash( $_POST['name_kana'] ) ) : '';
	$phone             = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email             = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$message           = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $company_name || '' === $name || '' === $phone || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', trailingslashit( home_url( '/' ) ) . '#contact' ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = sprintf( '【サイトお問合せ】%s様よりご相談', $company_name );
	$body    = "Webサイトのお問い合わせフォームより送信がありました。\n\n"
		. "メールアドレス: {$email}\n"
		. "企業名・団体名: {$company_name}\n"
		. "企業名・団体名(かな): {$company_name_kana}\n"
		. "部署/役職: {$department}\n"
		. "氏名: {$name}\n"
		. "氏名(かな): {$name_kana}\n"
		. "電話番号: {$phone}\n\n"
		. "お問い合わせ内容:\n{$message}\n";
	$headers = array( 'Reply-To: ' . $email );

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contact', 'success', trailingslashit( home_url( '/' ) ) . '#contact' ) );
	exit;
}
add_action( 'admin_post_subsupo_contact', 'subsupo_handle_contact_form' );
add_action( 'admin_post_nopriv_subsupo_contact', 'subsupo_handle_contact_form' );
