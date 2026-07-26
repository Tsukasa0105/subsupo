</main>

<footer class="bg-gray-900 text-white pt-12 pb-6">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 border-b border-gray-700 pb-8">
			<div>
				<h3 class="text-2xl font-bold text-primary mb-4 tracking-wider">株式会社サブサポ</h3>
				<p class="text-gray-400 text-sm mb-4">
					〒453-0811<br>
					愛知県名古屋市中村区太閤通8丁目30<br>
					ARK中村公園5階D<br>
					TEL: 080-4346-8593
				</p>
			</div>

			<div>
				<h4 class="text-lg font-bold mb-4 border-l-2 border-primary pl-2">サイトマップ</h4>
				<ul class="space-y-2 text-sm text-gray-400">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition">ホーム</a></li>
					<li><a href="<?php echo esc_url( subsupo_anchor_url( 'reasons' ) ); ?>" class="hover:text-white transition">当社の強み</a></li>
					<li><a href="<?php echo esc_url( subsupo_anchor_url( 'equipment' ) ); ?>" class="hover:text-white transition">対象設備・補助金</a></li>
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="hover:text-white transition">お知らせ一覧</a></li>
					<li><a href="<?php echo esc_url( subsupo_anchor_url( 'company' ) ); ?>" class="hover:text-white transition">会社概要</a></li>
					<li><a href="<?php echo esc_url( subsupo_anchor_url( 'faq' ) ); ?>" class="hover:text-white transition">よくある質問</a></li>
				</ul>
			</div>

			<div>
				<h4 class="text-lg font-bold mb-4 border-l-2 border-primary pl-2">お問い合わせ</h4>
				<a href="tel:08043468593" class="block bg-gray-800 text-center py-3 rounded border border-gray-700 hover:border-primary transition mb-3">
					<span class="text-xs text-gray-400 block mb-1">お電話でのご相談</span>
					<span class="text-xl font-bold"><i class="fas fa-phone-alt mr-2 text-primary"></i>080-4346-8593</span>
				</a>
				<a href="<?php echo esc_url( subsupo_anchor_url( 'contact' ) ); ?>" class="block bg-accent hover:bg-orange-600 text-white text-center py-3 rounded font-bold transition">
					<i class="far fa-envelope mr-2"></i>メールでのお問い合わせ
				</a>
			</div>
		</div>

		<div class="flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
			<a href="<?php echo esc_url( subsupo_privacy_policy_url() ); ?>" class="hover:text-gray-300 transition mb-2 md:mb-0">プライバシーポリシー</a>
			<p>&copy; Sub-sup Co., Ltd. All Rights Reserved.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
