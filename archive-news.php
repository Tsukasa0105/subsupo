<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="bg-gray-800 text-white py-12">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<h1 class="text-3xl font-bold text-center">お知らせ一覧</h1>
		<div class="text-center mt-4 text-sm text-gray-400">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition">ホーム</a>
			<span class="mx-2">&gt;</span>
			<span>お知らせ</span>
		</div>
	</div>
</div>

<section class="py-12 bg-white min-h-[500px]">
	<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
		<?php get_template_part( 'template-parts/news-loop' ); ?>
	</div>
</section>

<?php get_footer(); ?>
