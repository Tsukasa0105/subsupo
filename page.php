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
				<span><?php the_title(); ?></span>
			</div>
		</div>
	</div>

	<section class="py-12 bg-white min-h-[400px]">
		<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
			<article class="prose max-w-none text-gray-700 leading-relaxed">
				<?php the_content(); ?>
			</article>
		</div>
	</section>

	<?php
endwhile;

get_footer();
