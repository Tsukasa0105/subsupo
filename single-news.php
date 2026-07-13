<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<div class="bg-gray-800 text-white py-12">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<h1 class="text-2xl md:text-3xl font-bold text-center"><?php the_title(); ?></h1>
			<div class="text-center mt-4 text-sm text-gray-400">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition">ホーム</a>
				<span class="mx-2">&gt;</span>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="hover:text-white transition">お知らせ</a>
				<span class="mx-2">&gt;</span>
				<span>お知らせ詳細</span>
			</div>
		</div>
	</div>

	<section class="py-12 bg-white min-h-[500px]">
		<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex items-center gap-3 mb-6">
				<span class="text-gray-500 text-sm"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
				<span class="<?php echo esc_attr( subsupo_news_badge_class( get_the_ID() ) ); ?> text-white text-xs font-bold px-2 py-1 rounded"><?php echo esc_html( subsupo_news_badge_label( get_the_ID() ) ); ?></span>
			</div>

			<article class="prose max-w-none text-gray-700 leading-relaxed">
				<?php the_content(); ?>
			</article>

			<div class="mt-12 pt-8 border-t border-gray-200">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="inline-flex items-center text-primary hover:underline font-medium">
					<i class="fas fa-chevron-left mr-2 text-sm"></i> お知らせ一覧に戻る
				</a>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
