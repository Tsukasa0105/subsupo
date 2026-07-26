<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<section class="py-24 bg-white min-h-[500px]">
		<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
			<div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-6">
				<i class="fas fa-check text-4xl text-secondary"></i>
			</div>
			<h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8"><?php the_title(); ?></h1>
			<div class="prose max-w-none text-gray-700 leading-relaxed text-left mx-auto">
				<?php the_content(); ?>
			</div>
			<div class="mt-10">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-md text-white bg-accent hover:bg-orange-600 transition">
					トップページへ戻る
				</a>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
