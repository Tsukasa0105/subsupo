<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'font-sans text-gray-800 bg-gray-50 flex flex-col min-h-screen' ); ?>>
<?php wp_body_open(); ?>

<header class="bg-white shadow-md fixed w-full top-0 z-50">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex justify-between items-center h-20">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex-shrink-0">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/subsupo-logo.png' ); ?>" alt="株式会社サブサポ" class="h-10 md:h-12 w-auto">
			</a>

			<nav class="hidden lg:flex space-x-6 items-center">
				<a href="<?php echo esc_url( subsupo_anchor_url( 'reasons' ) ); ?>" class="text-gray-600 hover:text-primary font-medium text-sm transition">当社の強み</a>
				<a href="<?php echo esc_url( subsupo_anchor_url( 'equipment' ) ); ?>" class="text-gray-600 hover:text-primary font-medium text-sm transition">対象設備</a>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="text-gray-600 hover:text-primary font-medium text-sm transition">お知らせ</a>
				<a href="<?php echo esc_url( subsupo_anchor_url( 'company' ) ); ?>" class="text-gray-600 hover:text-primary font-medium text-sm transition">会社概要</a>
				<a href="<?php echo esc_url( subsupo_anchor_url( 'faq' ) ); ?>" class="text-gray-600 hover:text-primary font-medium text-sm transition">よくある質問</a>
			</nav>

			<div class="hidden lg:flex items-center space-x-4">
				<div class="text-right">
					<p class="text-xs text-gray-500 mb-1">お電話でのご相談</p>
					<a href="tel:08043468593" class="text-xl font-bold text-primary flex items-center">
						<i class="fas fa-phone-alt mr-2"></i> 080-4346-8593
					</a>
				</div>
				<a href="<?php echo esc_url( subsupo_anchor_url( 'contact' ) ); ?>" class="bg-accent hover:bg-orange-600 text-white font-bold py-3 px-6 rounded shadow-lg transition duration-300 transform hover:-translate-y-1">
					無料相談・お問合せ
				</a>
			</div>

			<div class="lg:hidden flex items-center">
				<button id="mobile-menu-btn" class="text-gray-600 hover:text-primary focus:outline-none">
					<i class="fas fa-bars text-2xl"></i>
				</button>
			</div>
		</div>
	</div>

	<div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-200">
		<div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
			<a href="<?php echo esc_url( subsupo_anchor_url( 'reasons' ) ); ?>" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-blue-50">当社の強み</a>
			<a href="<?php echo esc_url( subsupo_anchor_url( 'equipment' ) ); ?>" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-blue-50">対象設備</a>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-blue-50">お知らせ</a>
			<a href="<?php echo esc_url( subsupo_anchor_url( 'company' ) ); ?>" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-blue-50">会社概要</a>
			<a href="<?php echo esc_url( subsupo_anchor_url( 'faq' ) ); ?>" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-blue-50">よくある質問</a>
			<div class="mt-4 p-4 bg-gray-50 rounded-lg">
				<a href="tel:08043468593" class="block text-center text-primary font-bold text-xl mb-3 border-2 border-primary rounded py-2">
					<i class="fas fa-phone-alt mr-2"></i> 080-4346-8593
				</a>
				<a href="<?php echo esc_url( subsupo_anchor_url( 'contact' ) ); ?>" class="block text-center bg-accent text-white font-bold rounded py-3">
					<i class="far fa-envelope mr-2"></i> お問合せフォーム
				</a>
			</div>
		</div>
	</div>
</header>

<main class="flex-grow pt-20">
