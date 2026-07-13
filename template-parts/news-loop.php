<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$subsupo_news_terms = get_terms(
	array(
		'taxonomy'   => 'news_category',
		'hide_empty' => false,
	)
);
?>

<div class="flex gap-2 mb-8 border-b border-gray-200 pb-4 overflow-x-auto">
	<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="px-4 py-1 rounded-full text-sm font-medium whitespace-nowrap transition <?php echo is_post_type_archive( 'news' ) ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'; ?>">すべて</a>
	<?php foreach ( $subsupo_news_terms as $subsupo_term ) : ?>
		<a href="<?php echo esc_url( get_term_link( $subsupo_term ) ); ?>" class="px-4 py-1 rounded-full text-sm font-medium whitespace-nowrap transition <?php echo is_tax( 'news_category', $subsupo_term->slug ) ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'; ?>"><?php echo esc_html( $subsupo_term->name ); ?></a>
	<?php endforeach; ?>
</div>

<div class="bg-white">
	<?php if ( have_posts() ) : ?>
		<ul class="divide-y divide-gray-200">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<li class="py-6">
					<a href="<?php the_permalink(); ?>" class="group flex flex-col md:flex-row md:items-start gap-4">
						<div class="flex items-center gap-3 w-full md:w-48 shrink-0 pt-1">
							<span class="text-gray-500 text-sm"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
							<span class="<?php echo esc_attr( subsupo_news_badge_class( get_the_ID() ) ); ?> text-white text-xs font-bold px-2 py-1 rounded"><?php echo esc_html( subsupo_news_badge_label( get_the_ID() ) ); ?></span>
						</div>
						<div>
							<h3 class="text-lg font-bold text-gray-900 group-hover:text-primary transition mb-2"><?php the_title(); ?></h3>
							<p class="text-gray-600 text-sm line-clamp-2"><?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?></p>
						</div>
					</a>
				</li>
				<?php
			endwhile;
			?>
		</ul>

		<?php
		$subsupo_page_links = paginate_links(
			array(
				'prev_text' => '<i class="fas fa-angle-left"></i>',
				'next_text' => '<i class="fas fa-angle-right"></i>',
				'type'      => 'array',
			)
		);
		if ( ! empty( $subsupo_page_links ) ) :
			?>
			<div class="mt-12 flex justify-center">
				<nav class="flex items-center gap-1">
					<?php foreach ( $subsupo_page_links as $subsupo_link ) : ?>
						<?php
						$subsupo_is_current = false !== strpos( $subsupo_link, 'current' );
						$subsupo_classes    = $subsupo_is_current
							? 'w-10 h-10 flex items-center justify-center rounded border border-primary text-white bg-primary'
							: 'w-10 h-10 flex items-center justify-center rounded border border-gray-300 text-gray-700 hover:bg-gray-50 transition';
						echo str_replace(
							array( "class='page-numbers", 'class="page-numbers' ),
							array( "class='" . esc_attr( $subsupo_classes ), 'class="' . esc_attr( $subsupo_classes ) ),
							$subsupo_link
						);
						?>
					<?php endforeach; ?>
				</nav>
			</div>
		<?php endif; ?>
	<?php else : ?>
		<p class="text-gray-500 text-center py-12">該当するお知らせはありません。</p>
	<?php endif; ?>
</div>
