<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
?>

<section class="relative bg-white overflow-hidden">
	<div class="max-w-7xl mx-auto">
		<div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-10 sm:pt-16 lg:pt-20">
			<div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
				<div class="sm:text-center lg:text-left">
					<span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-primary text-sm font-bold mb-4 border border-blue-200">
						相談実績500件以上！採択率90%超
					</span>
					<h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl leading-tight">
						<span class="block mb-2">面倒な省エネ補助金の</span>
						<span class="block text-primary">申請を丸ごとサポート！</span>
						<span class="block text-2xl sm:text-3xl mt-4 text-gray-700">設備投資のコストを大幅削減しませんか？</span>
					</h1>
					<p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
						補助金のプロが、最適な設備選定から複雑な申請書類の作成、採択後の実績報告までトータルでコンサルティングいたします。
					</p>
					<div class="mt-8 sm:mt-12 sm:flex sm:justify-center lg:justify-start">
						<div class="rounded-md shadow">
							<a href="<?php echo esc_url( subsupo_anchor_url( 'contact' ) ); ?>" class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-md text-white bg-accent hover:bg-orange-600 md:text-lg transition duration-300 transform hover:scale-105">
								まずは無料相談！お問い合わせはこちら
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
		<img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full opacity-90" src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&amp;fit=crop&amp;w=1000&amp;q=80" alt="工場設備">
		<div class="absolute inset-0 bg-gradient-to-r from-white via-white/50 to-transparent lg:block hidden"></div>
	</div>
</section>

<section class="py-12 bg-gray-50 border-y border-gray-200">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col md:flex-row justify-between items-end mb-6">
			<h2 class="text-2xl font-bold text-gray-800 border-l-4 border-primary pl-3">お知らせ・新着情報</h2>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="text-primary hover:underline font-medium mt-4 md:mt-0 flex items-center">
				一覧を見る <i class="fas fa-chevron-right ml-1 text-sm"></i>
			</a>
		</div>
		<div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
			<ul class="divide-y divide-gray-200">
				<?php
				$subsupo_top_news = new WP_Query(
					array(
						'post_type'      => 'news',
						'posts_per_page' => 3,
					)
				);
				if ( $subsupo_top_news->have_posts() ) :
					while ( $subsupo_top_news->have_posts() ) :
						$subsupo_top_news->the_post();
						?>
						<li class="p-4 hover:bg-gray-50 transition">
							<a href="<?php the_permalink(); ?>" class="flex flex-col md:flex-row md:items-center gap-3">
								<div class="flex items-center gap-3 w-full md:w-auto">
									<span class="text-gray-500 text-sm whitespace-nowrap"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
									<span class="<?php echo esc_attr( subsupo_news_badge_class( get_the_ID() ) ); ?> text-white text-xs font-bold px-2 py-1 rounded whitespace-nowrap"><?php echo esc_html( subsupo_news_badge_label( get_the_ID() ) ); ?></span>
								</div>
								<span class="text-gray-800 font-medium md:ml-4"><?php the_title(); ?></span>
							</a>
						</li>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					?>
					<li class="p-4 text-gray-500">現在お知らせはありません。</li>
					<?php
				endif;
				?>
			</ul>
		</div>
	</div>
</section>

<section class="py-16 bg-white bg-pattern">
	<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
		<h2 class="text-3xl font-bold mb-8">こんな<span class="text-primary border-b-4 border-secondary pb-1">お悩み</span>、ありませんか？</h2>

		<div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 text-left">
			<ul class="space-y-6">
				<li class="flex items-start">
					<div class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-red-100 text-red-500 mt-1">
						<i class="fas fa-check"></i>
					</div>
					<p class="ml-4 text-lg text-gray-700 font-medium pt-1">電気代などのエネルギーコストが高騰して利益を圧迫している</p>
				</li>
				<li class="flex items-start">
					<div class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-red-100 text-red-500 mt-1">
						<i class="fas fa-check"></i>
					</div>
					<p class="ml-4 text-lg text-gray-700 font-medium pt-1">老朽化した設備を更新したいが、初期費用が高くて手が出ない</p>
				</li>
				<li class="flex items-start">
					<div class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-red-100 text-red-500 mt-1">
						<i class="fas fa-check"></i>
					</div>
					<p class="ml-4 text-lg text-gray-700 font-medium pt-1">「省エネ補助金」があるのは知っているが、自社が対象になるか分からない</p>
				</li>
				<li class="flex items-start">
					<div class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-red-100 text-red-500 mt-1">
						<i class="fas fa-check"></i>
					</div>
					<p class="ml-4 text-lg text-gray-700 font-medium pt-1">申請書類が複雑すぎて、自社だけでは対応しきれない</p>
				</li>
			</ul>
		</div>

		<div class="mt-8">
			<div class="triangle-down"></div>
			<div class="bg-secondary text-white p-6 rounded-lg shadow-md mt-2">
				<h3 class="text-2xl font-bold">そのお悩み、株式会社サブサポの<br class="sm:hidden"><span class="text-yellow-300 text-2xl sm:text-3xl mx-2">【補助金活用サポート】</span>で解決できます！</h3>
			</div>
		</div>
	</div>
</section>

<section class="py-16 bg-blue-50">
	<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center mb-12">
			<h2 class="text-3xl font-bold text-gray-900">補助金活用の<span class="text-primary">大きなメリット</span></h2>
			<p class="mt-4 text-lg text-gray-600">補助金を活用することで、実質的な負担を減らし、早期の投資回収が可能になります。</p>
		</div>

		<div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-4 lg:gap-12">
			<div class="w-full md:w-5/12 bg-white rounded-xl shadow-lg p-6 border-t-8 border-gray-400 relative">
				<div class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-gray-500 text-white font-bold py-1 px-6 rounded-full">導入前</div>
				<h4 class="text-center font-bold text-xl mb-4 mt-2">古い設備での高いランニングコスト</h4>
				<div class="flex justify-center mb-4">
					<i class="fas fa-industry text-6xl text-gray-400"></i>
				</div>
				<div class="space-y-3">
					<div class="flex justify-between items-center bg-gray-100 p-3 rounded">
						<span class="font-medium text-gray-600">設備投資額</span>
						<span class="font-bold text-xl">0円</span>
					</div>
					<div class="flex justify-between items-center bg-red-50 p-3 rounded border border-red-100">
						<span class="font-medium text-red-600">年間電気代</span>
						<span class="font-bold text-xl text-red-600">大幅な負担増</span>
					</div>
				</div>
			</div>

			<div class="text-center hidden md:block">
				<i class="fas fa-chevron-right text-5xl text-secondary"></i>
				<p class="text-secondary font-bold mt-2">最新設備へ</p>
			</div>
			<div class="text-center md:hidden">
				<i class="fas fa-chevron-down text-4xl text-secondary"></i>
			</div>

			<div class="w-full md:w-5/12 bg-white rounded-xl shadow-lg p-6 border-t-8 border-secondary relative transform scale-105">
				<div class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-secondary text-white font-bold py-1 px-6 rounded-full shadow">導入後</div>
				<h4 class="text-center font-bold text-xl mb-4 mt-2">新しい省エネ設備 ＋ 補助金</h4>
				<div class="flex justify-center mb-4 space-x-4">
					<i class="fas fa-solar-panel text-5xl text-primary"></i>
					<i class="fas fa-leaf text-5xl text-secondary"></i>
				</div>
				<div class="space-y-3">
					<div class="flex justify-between items-center bg-blue-50 p-3 rounded border border-blue-100">
						<span class="font-medium text-primary">設備投資額</span>
						<span class="font-bold text-lg"><span class="line-through text-gray-400 mr-2">100%</span> → 補助金で大幅減!</span>
					</div>
					<div class="flex justify-between items-center bg-green-50 p-3 rounded border border-green-100">
						<span class="font-medium text-secondary">年間電気代</span>
						<span class="font-bold text-xl text-secondary"><i class="fas fa-arrow-down mr-1"></i>大幅コスト削減</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="reasons" class="py-16 bg-white">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center mb-16">
			<h2 class="text-3xl font-bold text-gray-900">株式会社サブサポが選ばれる<span class="text-primary text-4xl">4</span>つの理由</h2>
			<div class="w-24 h-1 bg-secondary mx-auto mt-4"></div>
		</div>

		<div class="grid md:grid-cols-2 gap-8">
			<div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-xl transition duration-300 border border-gray-100">
				<div class="w-20 h-20 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-6">
					<i class="fas fa-hands-helping text-4xl text-primary"></i>
				</div>
				<h3 class="text-xl font-bold mb-4 text-gray-800">申請から完了報告まで<br>トータルサポート</h3>
				<p class="text-gray-600 text-left">
					面倒な書類作成や行政とのやり取り、手続きをすべて丸投げ可能です。お客様は貴重な時間を割くことなく、本業に専念していただけます。
				</p>
			</div>

			<div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-xl transition duration-300 border border-gray-100">
				<div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-6">
					<i class="fas fa-chart-line text-4xl text-secondary"></i>
				</div>
				<h3 class="text-xl font-bold mb-4 text-gray-800">最新動向を熟知した<br>専門家による提案</h3>
				<p class="text-gray-600 text-left">
					最新の補助金情報に基づき、お客様の事業状況に最適な補助金(省エネ、事業再構築など)を選定。採択率を極限まで高める説得力のある事業計画を作成します。
				</p>
			</div>

			<div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-xl transition duration-300 border border-gray-100 relative overflow-hidden">
				<div class="absolute top-0 right-0 bg-accent text-white text-xs font-bold px-3 py-1 rounded-bl-lg">安心の完全成功報酬</div>
				<div class="w-20 h-20 mx-auto bg-orange-100 rounded-full flex items-center justify-center mb-6">
					<i class="fas fa-yen-sign text-4xl text-accent"></i>
				</div>
				<h3 class="text-xl font-bold mb-4 text-gray-800">分かりやすく<br>安心の料金体系</h3>
				<p class="text-gray-600 text-left">
					着手金不要の完全成功報酬型など、リスクを抑えた明確な料金体系をご提示します。後から追加費用が発生するようなことは一切ありません。
				</p>
			</div>

			<div class="bg-gray-50 rounded-lg p-8 text-center hover:shadow-xl transition duration-300 border border-gray-100 relative overflow-hidden">
				<div class="absolute top-0 right-0 bg-primary text-white text-xs font-bold px-3 py-1 rounded-bl-lg">全国対応OK</div>
				<div class="w-20 h-20 mx-auto bg-teal-100 rounded-full flex items-center justify-center mb-6">
					<i class="fas fa-globe-asia text-4xl text-teal-600"></i>
				</div>
				<h3 class="text-xl font-bold mb-4 text-gray-800">全国対応＆<br>スピーディーな対応力</h3>
				<p class="text-gray-600 text-left">
					オンライン面談を活用し、北海道から沖縄まで全国どこでも対応可能。お問い合わせには原則24時間以内にご返信し、補助金の公募締切までスピード感をもってご支援いたします。
				</p>
			</div>
		</div>
	</div>
</section>

<section id="equipment" class="py-16 bg-gray-800 text-white">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center mb-12">
			<h2 class="text-3xl font-bold">対象となる主な設備・補助金</h2>
			<p class="mt-4 text-gray-400">以下のような設備の導入・更新で補助金が活用できます。</p>
		</div>

		<div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6 mb-12">
			<div class="bg-gray-700 p-6 rounded-lg text-center border border-gray-600 hover:border-primary transition">
				<i class="fas fa-wind text-4xl text-primary mb-3"></i>
				<h4 class="font-bold">空調設備<br><span class="text-xs font-normal text-gray-300">(業務用エアコン等)</span></h4>
			</div>
			<div class="bg-gray-700 p-6 rounded-lg text-center border border-gray-600 hover:border-primary transition">
				<i class="far fa-lightbulb text-4xl text-yellow-400 mb-3"></i>
				<h4 class="font-bold">照明設備<br><span class="text-xs font-normal text-gray-300">(LED化等)</span></h4>
			</div>
			<div class="bg-gray-700 p-6 rounded-lg text-center border border-gray-600 hover:border-primary transition">
				<i class="fas fa-hot-tub text-4xl text-red-400 mb-3"></i>
				<h4 class="font-bold">給湯設備<br><span class="text-xs font-normal text-gray-300">(高効率ボイラー等)</span></h4>
			</div>
			<div class="bg-gray-700 p-6 rounded-lg text-center border border-gray-600 hover:border-primary transition">
				<i class="fas fa-solar-panel text-4xl text-blue-300 mb-3"></i>
				<h4 class="font-bold">太陽光・蓄電池<br><span class="text-xs font-normal text-gray-300">(自家消費型)</span></h4>
			</div>
			<div class="bg-gray-700 p-6 rounded-lg text-center border border-gray-600 hover:border-primary transition col-span-2 md:col-span-1">
				<i class="fas fa-cogs text-4xl text-gray-300 mb-3"></i>
				<h4 class="font-bold">生産・工作機械<br><span class="text-xs font-normal text-gray-300">(高効率機器)</span></h4>
			</div>
		</div>

		<div class="bg-gray-900 rounded-lg p-8 border border-gray-700">
			<h3 class="text-xl font-bold mb-4 text-center border-b border-gray-700 pb-4"><i class="fas fa-file-invoice-dollar mr-2 text-secondary"></i> 活用できる主な補助金</h3>
			<ul class="grid md:grid-cols-3 gap-4 text-center">
				<li class="bg-gray-800 py-3 px-4 rounded">省エネ補助金<br><span class="text-xs text-gray-400">(先進的省エネルギー投資促進等)</span></li>
				<li class="bg-gray-800 py-3 px-4 rounded">事業再構築補助金</li>
				<li class="bg-gray-800 py-3 px-4 rounded">ものづくり補助金</li>
			</ul>
		</div>
	</div>
</section>

<section id="faq" class="py-16 bg-gray-50">
	<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center mb-12">
			<h2 class="text-3xl font-bold text-gray-900">よくある質問</h2>
		</div>

		<div class="space-y-4">
			<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
				<button type="button" class="js-faq-toggle w-full text-left px-6 py-4 flex justify-between items-center focus:outline-none" aria-expanded="false" aria-controls="faq1">
					<span class="font-bold text-lg text-gray-800"><span class="text-primary mr-2">Q.</span>相談には料金がかかりますか？</span>
					<i class="js-faq-icon fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
				</button>
				<div id="faq1" class="hidden px-6 pb-4 text-gray-600 border-t border-gray-100 pt-4">
					<p><span class="text-secondary font-bold mr-2">A.</span>初回のご相談は完全無料です。自社が補助金の対象になるかどうかの簡易診断も無料で行っておりますので、まずはお気軽にお問い合わせください。</p>
				</div>
			</div>

			<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
				<button type="button" class="js-faq-toggle w-full text-left px-6 py-4 flex justify-between items-center focus:outline-none" aria-expanded="false" aria-controls="faq2">
					<span class="font-bold text-lg text-gray-800"><span class="text-primary mr-2">Q.</span>地方の企業ですが対応可能ですか？</span>
					<i class="js-faq-icon fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
				</button>
				<div id="faq2" class="hidden px-6 pb-4 text-gray-600 border-t border-gray-100 pt-4">
					<p><span class="text-secondary font-bold mr-2">A.</span>全国対応可能です。ZoomなどのWeb会議システムを活用したオンラインでの面談を実施しておりますので、遠方のお客様でもスムーズにサポートさせていただきます。</p>
				</div>
			</div>

			<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
				<button type="button" class="js-faq-toggle w-full text-left px-6 py-4 flex justify-between items-center focus:outline-none" aria-expanded="false" aria-controls="faq3">
					<span class="font-bold text-lg text-gray-800"><span class="text-primary mr-2">Q.</span>確実に補助金をもらえますか？</span>
					<i class="js-faq-icon fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
				</button>
				<div id="faq3" class="hidden px-6 pb-4 text-gray-600 border-t border-gray-100 pt-4">
					<p><span class="text-secondary font-bold mr-2">A.</span>補助金は国や自治体の審査があるため、100%の採択を保証するものではありません。しかし、当社の豊富な実績とノウハウに基づき、審査員に評価される事業計画書を作成し、最大限採択率を高めるサポートを全力で行います。</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="company" class="py-16 bg-white">
	<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center mb-12">
			<h2 class="text-3xl font-bold text-gray-900">会社概要</h2>
			<div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
		</div>

		<div class="bg-white shadow overflow-hidden sm:rounded-lg border border-gray-200 overflow-x-auto">
			<table class="min-w-full divide-y divide-gray-200">
				<tbody class="bg-white divide-y divide-gray-200">
					<tr class="flex flex-col sm:table-row">
						<th class="px-6 py-4 bg-gray-50 text-left text-sm font-bold text-gray-700 sm:w-1/3">会社名</th>
						<td class="px-6 py-4 text-sm text-gray-900">株式会社サブサポ</td>
					</tr>
					<tr class="flex flex-col sm:table-row">
						<th class="px-6 py-4 bg-gray-50 text-left text-sm font-bold text-gray-700">代表者名</th>
						<td class="px-6 py-4 text-sm text-gray-900">岩月 政明</td>
					</tr>
					<tr class="flex flex-col sm:table-row">
						<th class="px-6 py-4 bg-gray-50 text-left text-sm font-bold text-gray-700">所在地</th>
						<td class="px-6 py-4 text-sm text-gray-900">愛知県名古屋市名東区</td>
					</tr>
					<tr class="flex flex-col sm:table-row">
						<th class="px-6 py-4 bg-gray-50 text-left text-sm font-bold text-gray-700">連絡先</th>
						<td class="px-6 py-4 text-sm text-gray-900">
							TEL: 080-4346-8593<br>
							Email: iwatsuki@sub-sup.com
						</td>
					</tr>
					<tr class="flex flex-col sm:table-row">
						<th class="px-6 py-4 bg-gray-50 text-left text-sm font-bold text-gray-700">事業内容</th>
						<td class="px-6 py-4 text-sm text-gray-900">省エネ補助金コンサルティング事業など</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

<section id="contact" class="py-16 bg-blue-50 relative">
	<div class="absolute top-0 left-0 w-full overflow-hidden leading-none transform rotate-180">
		<svg class="relative block w-full h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
			<path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
		</svg>
	</div>

	<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
		<div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 border border-gray-100">
			<div class="text-center mb-8">
				<h2 class="text-3xl font-bold text-gray-900 mb-4">無料相談・お問い合わせ</h2>
				<p class="text-gray-600">補助金に関するご相談、自社が対象になるかの確認など、<br class="hidden md:block">まずはお気軽にお問い合わせください。</p>
			</div>

			<?php if ( 'success' === $contact_status ) : ?>
				<div class="mb-6 p-4 rounded-md bg-green-50 border border-green-200 text-secondary font-medium text-center">
					お問い合わせを受け付けました。担当者よりご連絡いたします。
				</div>
			<?php elseif ( 'error' === $contact_status ) : ?>
				<div class="mb-6 p-4 rounded-md bg-red-50 border border-red-200 text-red-600 font-medium text-center">
					入力内容に誤りがあります。必須項目をご確認のうえ、再度送信してください。
				</div>
			<?php endif; ?>

			<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="space-y-6">
				<input type="hidden" name="action" value="subsupo_contact">
				<?php wp_nonce_field( 'subsupo_contact', 'subsupo_contact_nonce' ); ?>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
					<div>
						<label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">会社名 <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
						<input type="text" id="company_name" name="company_name" required class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 bg-gray-50 outline-none transition">
					</div>
					<div>
						<label for="name" class="block text-sm font-medium text-gray-700 mb-1">ご担当者名 <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
						<input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 bg-gray-50 outline-none transition">
					</div>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
					<div>
						<label for="phone" class="block text-sm font-medium text-gray-700 mb-1">電話番号 <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
						<input type="tel" id="phone" name="phone" required class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 bg-gray-50 outline-none transition">
					</div>
					<div>
						<label for="email" class="block text-sm font-medium text-gray-700 mb-1">メールアドレス <span class="text-red-500 text-xs ml-1 bg-red-50 px-2 py-0.5 rounded">必須</span></label>
						<input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 bg-gray-50 outline-none transition">
					</div>
				</div>

				<div>
					<label for="message" class="block text-sm font-medium text-gray-700 mb-1">ご検討中の設備・ご相談内容 <span class="text-gray-500 text-xs ml-1">任意</span></label>
					<textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-20 bg-gray-50 outline-none transition" placeholder="例：工場の空調を最新のものに入れ替えたいのですが、使える補助金はありますか？"></textarea>
				</div>

				<div class="text-center pt-4">
					<button type="submit" class="inline-flex justify-center items-center w-full md:w-auto px-12 py-4 border border-transparent text-lg font-bold rounded-md text-white bg-accent hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent shadow-lg transition duration-300 transform hover:-translate-y-1">
						<i class="far fa-paper-plane mr-2"></i> 上記の内容で送信する
					</button>
					<p class="mt-4 text-xs text-gray-500">送信ボタンを押すことで、プライバシーポリシーに同意したものとみなします。</p>
				</div>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
