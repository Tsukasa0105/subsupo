<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="py-24 bg-white text-center min-h-[400px]">
	<div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
		<p class="text-primary font-bold text-lg mb-2">404</p>
		<h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">お探しのページが見つかりませんでした</h1>
		<p class="text-gray-600 mb-8">URLが間違っているか、ページが削除された可能性があります。</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-md text-white bg-accent hover:bg-orange-600 transition">
			トップページへ戻る
		</a>
	</div>
</section>

<?php get_footer(); ?>
