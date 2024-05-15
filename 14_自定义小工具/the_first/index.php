<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.
?>

<!-- 页头 -->
<?php get_header(); ?>

<div class="main-body mt-20">
	<div class="container">
		<div class="row d-flex flex-wrap">
			<!--主内容区-->
			<article class="column xs-12 sm-12 md-8 mb-10-xs mb-0-md">
				<!--大图区-->
				<div class="row d-flex flex-wrap mb-20-xs mb-0-md">

					<!--幻灯片-->
					<?php
					$home_slide = the_first_option('home_slide');
					$slides = [];
					if (is_array($home_slide)) {
						foreach ($home_slide as $slide) {
							if ($slide['image']['url']) {
								$slides[] = [
									'title' => $slide['title'],
									'image' => $slide['image']['url'],
									'url' => $slide['url']
								];
							}
						}
					}
					if (empty($slides)) {
						$slides[] = [
							'title' => '请在后台设置幻灯片',
							'image' => get_stylesheet_directory_uri() . '/images/slide.png',
							'url' => 'https://www.zhuige.com/product'
						];
					}
					?>
					<div class="column xs-12 sm-12 md-9 mb-20-xs mb-0-md">
						<div class="lb-box" id="lb-1">
							<!-- 轮播内容 -->
							<div class="lb-content">
								<?php foreach ($slides as $slide) : ?>
									<div class="lb-item active">
										<a href="<?php echo $slide['url'] ?>" target="_blank">
											<img alt="picture loss" src="<?php echo $slide['image'] ?>" />
											<div>
												<h2><?php echo $slide['title'] ?></h2>
											</div>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
							<!-- 轮播标志 -->
							<ol class="lb-sign">
								<?php for ($i = 1; $i <= count($slides); $i++) :
									if ($i == 1) echo '<li class="active">' . $i . '</li>';
									else echo '<li>' . $i . '</li>';
								endfor; ?>
							</ol>
							<!-- 轮播控件 -->
							<div class="lb-ctrl left">＜</div>
							<div class="lb-ctrl right">＞</div>
						</div>
					</div>

					<!--小图区-->
					<?php
					$home_slide_ad = the_first_option('home_slide_ad');
					$slide_ads = [];
					if (is_array($home_slide_ad)) {
						foreach ($home_slide_ad as $slide_ad) {
							if ($slide_ad['image']['url']) {
								$slide_ads[] = [
									'title' => $slide_ad['title'],
									'image' => $slide_ad['image']['url'],
									'url' => $slide_ad['url']
								];
							}
						}
					}
					if (empty($slide_ads)) {
						$slide_ads = [
							[
								'title' => '请在后台设置',
								'image' => get_stylesheet_directory_uri() . '/images/jiangqie.png',
								'url' => 'https://www.zhuige.com'
							],
							[
								'title' => '请在后台设置',
								'image' => get_stylesheet_directory_uri() . '/images/jiangqie.png',
								'url' => 'https://www.zhuige.com'
							],
						];
					}
					?>
					<div class="column xs-12 sm-12 md-3">
						<!-- row start-->
						<div class="row d-flex flex-wrap lb-side">
							<!--小图区块-->
							<?php foreach ($slide_ads as $slide_ad) : ?>
								<div class="column xs-6 sm-6 md-12 mb-20">
									<figure class="relative">
										<div>
											<a href="<?php echo $slide_ad['url'] ?>" target="_blank">
												<img alt="picture loss" src="<?php echo $slide_ad['image'] ?>" />
											</a>
										</div>
										<figcaption class="absolute bottom left">
											<a href="<?php echo $slide_ad['url'] ?>" target="_blank">
												<span class="title"><?php echo $slide_ad['title'] ?></span>
											</a>
										</figcaption>
									</figure>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

				</div>

				<?php $home_post_recommend = home_post_recommend();
				if ($home_post_recommend) : ?>
					<div class="base-list mb-20">
						<h5 class="mb-20">精选文章</h5>
						<div class="row d-flex flex-wrap mb-0-md">
							<!--横向图文列表-->
							<?php foreach ($home_post_recommend as $post) : ?>
								<div class="column md-4 easy-item">
									<figure class="relative">
										<div>
											<a href="<?php echo get_permalink($post['id']) ?>">
												<img alt="picture loss" src="<?php echo $post['thumbnail'] ?>" />
											</a>
										</div>
									</figure>
									<figcaption class="title">
										<h3><a href="<?php echo get_permalink($post['id']) ?>"><?php echo $post['title'] ?></a></h3>
									</figcaption>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

				<!--列表tab-->
				<div class="article-list mb-20">
					<div class="tab_nav-wraper">
						<h1>最新文章</h1>

						<ul class="tab_nav">
							<li class="tab-nav-li tabNav_active" data-catid="">
								<text>全部</text>
							</li>
							<li class="tab-nav-li" data-catid="8">
								<text>追格快讯</text>
							</li>
							<li class="tab-nav-li" data-catid="3">
								<text>酱茄Pro</text>
							</li>
							<li class="tab-nav-li" data-catid="23">
								<text>酱茄Free小程序</text>
							</li>
							<li class="tab-nav-li" data-catid="1">
								<text>追格资讯小程序（uni专业版）</text>
							</li>
							<li class="tab-nav-li" data-catid="52">
								<text>酱茄Free WordPress主题</text>
							</li>
						</ul>
					</div>

					<!--列表面板区-->
					<ul class="tab_box">
						<li class="tabBox_active">
							<!-- 文章列表 -->
							<?php
							if (have_posts()) :
								while (have_posts()) : the_post();
							?>
									<div class="post-div simple-item simple-left-side slide-in post-div-stick">
										<div class="simple-img simple-left-img">
											<a class="simple-left-img-a" href="<?php the_permalink() ?>" title="<?php the_title() ?>">
												<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
											</a>
											<a class="simple-left-img-cat-a" href="javascript:void(0)" title="追格快讯"><strong>追格快讯</strong></a>
										</div>
										<div class="simple-content">
											<h2><strong>置顶</strong>
												<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
											</h2>
											<p><a href="javascript:void(0)" title="">追格资讯小程序Free（又称酱茄free），实现WordPress网站...</a></p>
											<p class="simple-info">
												<a href="javascript:void(0)" title="酱茄小助理">
													<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/default_avatar.jpg' ?>"><em>酱茄小助理</em>
												</a> · <cite>浏览 11356</cite> · <cite>点赞 38</cite> · <cite>评论 10</cite> ·
												<cite>1年前 (2022-10-11)</cite>
											</p>
										</div>
									</div>
							<?php
								endwhile;
							else :
								echo '没有找到文章';
							endif;
							?>
						</li>
					</ul>

					<div class="spinner" style="display: none;">
						<div class="rect1"></div>
						<div class="rect2"></div>
						<div class="rect3"></div>
						<div class="rect4"></div>
						<div class="rect5"></div>
					</div>
				</div>

			</article>

			<!--侧边栏-->
			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<!-- 首页弹框 -->
<div id="home-ad-pop" style="display: none;">
	<a class="home-ad-pop-link" href="" target="_blank">
		<img class="home-ad-pop-image" src="" style="height: 60vh;">
	</a>
</div>

<!-- 页脚 -->
<?php get_footer(); ?>