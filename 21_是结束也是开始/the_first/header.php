<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<title><?php the_first_seo_title(); ?></title>
	<?php wp_head(); ?>
	<!-- <link rel="stylesheet" href="style.css"> -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>

<body>
	<header id="top-nav-wraper">
		<!--主导航-->
		<nav class="container">
			<div class="menu-icon">
				<span class="fas">
					<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/fa-menu.png' ?>">
				</span>
			</div>
			<a class="logo" href="<?php echo home_url(); ?>"><?php the_first_site_logo() ?></a>
			<?php
			$menus = get_nav_menu_locations();
			if (isset($menus['main-menu'])) {
				wp_nav_menu([
					'theme_location' => 'main-menu',
					'container' => 'div',
					'container_class' => 'nav-box',
					'menu_class' => 'nav-items',
				]);
			} else { ?>
				<div class="nav-box">
					<ul class="nav-items">
						<li class="menu-item"><a href="https://www.zhuige.com/docs/ztfree" target="_blank">新朋友请参考酱茄主题安装文档</a></li>
						<li class="menu-item"><a href="https://www.zhuige.com/product.html?cat=23" target="_blank">更多开源主题</a></li>
					</ul>
				</div>
			<?php }
			?>
			<div class="search-icon">
				<span class="fas">
					<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/fa-search.png' ?>">
				</span>
			</div>
			<div class="cancel-icon">
				<span class="fas">
					<img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/fa-close.png' ?>">
				</span>
			</div>
			<form method="get" action="/">
				<input type="search" class="search-data" placeholder="输入搜索内容" value="" name="s" id="s" required="" style="color:black;">
				<button type="submit">搜索</button>
			</form>
		</nav>
	</header>