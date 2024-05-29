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

				<div class="base-list article-list search-list mb-20">
					<div class="base-list-nav" itemscope="">
						<a itemprop="breadcrumb" href="/">首页</a> <em> &gt; </em> <span class="current">搜索：酱茄</span>
					</div>
					<h5 class="mb-10">
						<a href="javascript:void(0)">搜索：酱茄</a>
					</h5>
					<?php if (have_posts()) { ?>
						<div class="base-box">
							<!-- 文章列表 -->
							<?php 
							while (have_posts()) {
							the_post();
							?>
							<div class="post-div simple-item simple-left-side slide-in post-div-stick">
								<div class="simple-img simple-left-img">
									<a class="simple-left-img-a" href="<?php the_permalink() ?>" title="<?php the_title() ?>">
										<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/jiangqie.png' ?>">
									</a>
									<?php $the_cat= get_the_category()[0] ?>
									<a class="simple-left-img-cat-a" href="<?php echo get_category_link($the_cat->cat_ID) ?>" title="<?php echo $the_cat->cat_name ?>">
										<strong><?php echo $the_cat->cat_name ?></strong>
									</a>
								</div>
								<div class="simple-content">
									<h2>
										<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
									</h2>
									<p><a href="<?php the_permalink() ?>" title="<?php the_excerpt() ?>"><?php the_excerpt() ?></a></p>
									<p class="simple-info">
										<a href="javascript:void(0)" title="酱茄小助理">
											<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/default_avatar.jpg' ?>"><em>酱茄小助理</em>
										</a> · <cite>浏览 11356</cite> · <cite>点赞 38</cite> · <cite>评论 10</cite> ·
										<cite>1年前 (2022-10-11)</cite>
									</p>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					<?php } else { ?>
						<div class="content-wrap">
							<div class="content-view mb-20">
								没有找到文章！
							</div>
						</div>
					<?php } ?>

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

<!-- 页脚 -->
<?php get_footer(); ?>