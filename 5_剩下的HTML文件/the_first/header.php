<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<title>酱茄Free主题</title>
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
			<a class="logo" href="https://www.zhuige.com"><img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/xlogo.png' ?>"></a>
			<div class="nav-box">
				<ul class="nav-items">
					<li><a href="javascript:void(0)" aria-current="page">首页</a></li>
					<li><a href="javascript:void(0)">主题下载</a></li>
					<li><a href="javascript:void(0)">小程序下载</a></li>
					<li><a href="javascript:void(0)">社区</a></li>
					<li><a href="javascript:void(0)">网址导航</a></li>
					<li><a href="javascript:void(0)">标签云</a></li>
					<li><a href="javascript:void(0)">关于</a></li>
				</ul>
			</div>
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