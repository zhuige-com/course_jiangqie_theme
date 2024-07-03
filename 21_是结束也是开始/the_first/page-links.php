<?php
/*
Template Name: 追格-网址导航
*/
?>

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

				<div class="base-list search-list mb-20">
					<?php the_first_breadcrumbs(); ?>
					<div class="content-wrap">
						<?php wp_list_bookmarks(['show_name' => true]); ?>
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