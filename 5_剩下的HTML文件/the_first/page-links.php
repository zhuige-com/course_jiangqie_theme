<?php
/*
Template Name: 追格-网址导航
*/
?>

<!-- 页头 -->
<?php get_header(); ?>

<div class="main-body mt-20">
	<div class="container">
		<div class="row d-flex flex-wrap">
			<!--主内容区-->
			<article class="column xs-12 sm-12 md-8 mb-10-xs mb-0-md">

				<div class="base-list search-list mb-20">
					<div class="base-list-nav" itemscope="">
						<a itemprop="breadcrumb" href="/">首页</a> <em> &gt; </em> <span class="current">开源项目网址导航</span>
					</div>
					<div class="content-wrap">
						<li id="linkcat-54" class="linkcat">
							<h2>CMS</h2>
							<ul class="xoxo blogroll">
								<li>
									<a href="javascript:void(0)" rel="noopener" title="开源内容管理系统" target="_blank">
										<img src="images/jiangqie.png" alt="Drupal" title="开源内容管理系统"> Drupal
									</a>
								</li>
								<li>
									<a href="javascript:void(0)" rel="noopener" title="一个开源的博客平台" target="_blank">
										<img src="images/jiangqie.png" alt="Ghost" title="一个开源的博客平台"> Ghost
									</a>
								</li>
								<li>
									<a href="javascript:void(0)" rel="noopener" title="知名的内容管理系统" target="_blank">
										<img src="images/jiangqie.png" alt="Joomla" title="知名的内容管理系统"> Joomla
									</a>
								</li>
								<li>
									<a href="javascript:void(0)" rel="noopener" title="开源博客和 CMS 系统" target="_blank">
										<img src="images/jiangqie.png" alt="Wordpress" title="开源博客和 CMS 系统"> Wordpress
									</a>
								</li>
							</ul>
						</li>
						<li id="linkcat-49" class="linkcat">
							<h2>WordPress主题</h2>
							<ul class="xoxo blogroll">
								<li>
									<a href="javascript:void(0)" rel="noopener" title="酱茄小程序官方网站" target="_blank">
										<img src="images/jiangqie.png" alt="酱茄Free主题" title="酱茄小程序官方网站"> 酱茄Free主题
									</a>
								</li>
							</ul>
						</li>
						<li id="linkcat-55" class="linkcat">
							<h2>WordPress小程序</h2>
							<ul class="xoxo blogroll">
								<li>
									<a href="javascript:void(0)" rel="noopener" target="_blank">
										<img src="images/jiangqie.png" alt="知识付费小程序"> 知识付费小程序
									</a>
								</li>
							</ul>
						</li>
					</div>
				</div>

			</article>

			<!--侧边栏-->
			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<!-- 页脚 -->
<?php get_footer(); ?>