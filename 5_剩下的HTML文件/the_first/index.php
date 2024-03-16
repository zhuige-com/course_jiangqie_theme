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
					<div class="column xs-12 sm-12 md-9 mb-20-xs mb-0-md">
						<div class="lb-box" id="lb-1">
							<!-- 轮播内容 -->
							<div class="lb-content">
								<div class="lb-item active">
									<a href="javascript:void(0)" target="_blank">
										<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
										<div>
											<h2>追格小程序（免费开源）</h2>
										</div>
									</a>
								</div>
							</div>
							<!-- 轮播标志 -->
							<ol class="lb-sign">
								<li class="active" slide-to="0">1</li>
							</ol>
							<!-- 轮播控件 -->
							<div class="lb-ctrl left">＜</div>
							<div class="lb-ctrl right">＞</div>
						</div>
					</div>

					<!--小图区-->
					<div class="column xs-12 sm-12 md-3">
						<!-- row start-->
						<div class="row d-flex flex-wrap lb-side">
							<!--小图区块-->
							<div class="column xs-6 sm-6 md-12 mb-20">
								<figure class="relative">
									<div>
										<a href="javascript:void(0)" target="_blank">
											<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
										</a>
									</div>
									<figcaption class="absolute bottom left">
										<a href="javascript:void(0)" target="_blank">
											<span class="title">WordPress商城小程序</span>
										</a>
									</figcaption>
								</figure>
							</div>
							<div class="column xs-6 sm-6 md-12 mb-20">
								<figure class="relative">
									<div>
										<a href="javascript:void(0)" target="_blank">
											<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
										</a>
									</div>
									<figcaption class="absolute bottom left">
										<a href="javascript:void(0)" target="_blank">
											<span class="title">WordPress资讯小程序</span>
										</a>
									</figcaption>
								</figure>
							</div>
						</div>
					</div>

				</div>

				<div class="base-list mb-20">
					<h5 class="mb-20">精选文章</h5>
					<div class="row d-flex flex-wrap mb-0-md">
						<!--横向图文列表-->
						<div class="column md-4 easy-item">
							<figure class="relative">
								<div>
									<a href="javascript:void(0)">
										<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
									</a>
								</div>
							</figure>
							<figcaption class="title">
								<h3><a href="javascript:void(0)">追格资讯小程序（开源版）V2.0.0更新</a></h3>
							</figcaption>
						</div>
						<div class="column md-4 easy-item">
							<figure class="relative">
								<div>
									<a href="javascript:void(0)">
										<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
									</a>
								</div>
							</figure>
							<figcaption class="title">
								<h3><a href="javascript:void(0)">追格商城小程序（开源版）正式发布</a></h3>
							</figcaption>
						</div>
						<div class="column md-4 easy-item">
							<figure class="relative">
								<div>
									<a href="javascript:void(0)">
										<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
									</a>
								</div>
							</figure>
							<figcaption class="title">
								<h3><a href="javascript:void(0)">酱茄OW，专为企业开发的官网小程序</a></h3>
							</figcaption>
						</div>
					</div>
				</div>

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