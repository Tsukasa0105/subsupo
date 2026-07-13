<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function subsupo_handle_contact_form() {
	if ( ! isset( $_POST['subsupo_contact_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['subsupo_contact_nonce'] ), 'subsupo_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', trailingslashit( home_url( '/' ) ) . '#contact' ) );
		exit;
	}

	$company_name = isset( $_POST['company_name'] ) ? sanitize_text_field( wp_unslash( $_POST['company_name'] ) ) : '';
	$name         = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone        = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email        = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$message      = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $company_name || '' === $name || '' === $phone || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', trailingslashit( home_url( '/' ) ) . '#contact' ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = sprintf( '【サイトお問合せ】%s様よりご相談', $company_name );
	$body    = "Webサイトのお問い合わせフォームより送信がありました。\n\n"
		. "会社名: {$company_name}\n"
		. "ご担当者名: {$name}\n"
		. "電話番号: {$phone}\n"
		. "メールアドレス: {$email}\n\n"
		. "ご相談内容:\n{$message}\n";
	$headers = array( 'Reply-To: ' . $email );

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contact', 'success', trailingslashit( home_url( '/' ) ) . '#contact' ) );
	exit;
}
add_action( 'admin_post_subsupo_contact', 'subsupo_handle_contact_form' );
add_action( 'admin_post_nopriv_subsupo_contact', 'subsupo_handle_contact_form' );
