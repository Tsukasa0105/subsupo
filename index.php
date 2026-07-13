<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="py-12 bg-white min-h-[400px]">
	<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
		<?php if ( have_posts() ) : ?>
			<ul class="divide-y divide-gray-200">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<li class="py-6">
						<a href="<?php the_permalink(); ?>" class="block group">
							<h2 class="text-lg font-bold text-gray-900 group-hover:text-primary transition mb-2"><?php the_title(); ?></h2>
							<p class="text-gray-600 text-sm"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
						</a>
					</li>
					<?php
				endwhile;
				?>
			</ul>
		<?php else : ?>
			<p class="text-gray-500 text-center py-12">コンテンツが見つかりませんでした。</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
