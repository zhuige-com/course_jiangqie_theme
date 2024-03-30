<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.
?>
	
	<!--页脚-->
	<footer class="cont-footer">
		<!--页脚图标链接-->
		<?php $footer_icons = the_first_option('footer_icons');
		if (is_array($footer_icons) && !empty($footer_icons)) { ?>
			<div class="container ta-c pb-30 main-footer-links">
				<?php
				foreach ($footer_icons as $icon) : ?>
					<a style="color: white;" href="<?php echo $icon['url'] ?>" title="" target="_blank">
						<img alt="picture loss" src="<?php echo $icon['image']['url'] ?>" width="50" height="50" />
					</a>
				<?php endforeach; ?>
			</div>
		<?php } ?>

		<div class="container ta-c main-footer">
			<!--页脚分栏-->
			<div class="row d-flex flex-wrap">
				<!--关于我们-->
				<div class="column xs-12 sm-6 md-4 pt-30 pb-30">
					<h3 class="mb-30">关于我们</h3>
					<?php
					$footer_about = the_first_option('footer_about');
					if (empty($footer_about)) {
						$footer_about = '请到后台设置此处信息';
					}
					echo $footer_about;
					?>
				</div>

				<!--页脚导航-->
				<div class="column xs-12 sm-6 md-4 pt-30 pb-30">
					<h3 class="mb-30">快速导航</h3>
					<?php
					$footer_nav = the_first_option('footer_nav');
					if (is_array($footer_nav) && !empty($footer_nav)) {
						foreach ($footer_nav as $nav) :
							echo '<p><a href="' . $nav['url'] . '" title="' . $nav['title'] . '">' . $nav['title'] . '</a></p>';
						endforeach;
					}
					?>
				</div>

				<!--页脚资讯列表-->
				<div class="column xs-12 md-4 hidden-mdw pt-30 pb-30">
					<h3 class="mb-30">热门推荐</h3>
					<p><a href="javascript:void(0)" title="酱茄小程序11.11提前购，买1送1">酱茄小程序11.11提前购，买1送1</a>
					</p>
					<p><a href="javascript:void(0)" title="酱茄Pro小程序新版发布之订阅消息">酱茄Pro小程序新版发布之订阅消息</a>
					</p>
					<p><a href="javascript:void(0)" title="酱茄CMS小程序（资讯版）正式发布">酱茄CMS小程序（资讯版）正式发布</a>
					</p>
				</div>
			</div>
		</div>

		<!--页脚版权-->
		<div class="container ta-c pt-40 main-footer-copyinfo">
			<?php
			$footer_copyright = the_first_option('footer_copyright');
			if (empty($footer_copyright)) {
				$footer_copyright = '主题设计 <a href="https://www.zhuige.com" target="_blank" title="追格" style="color:#7F7F7F;">追格（zhuige.com）</a>';
			}
			echo $footer_copyright; ?>
		</div>
	</footer>

	<div id="toTop" style="display: none;">
		<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/toTop.png' ?>">
	</div>

	<div style="display: none;">
		<script>
			<?php echo the_first_option('footer_statistics'); ?>
		</script>
	</div>

	<?php wp_footer(); ?>

	</body>

	</html>