<?php

add_action('widgets_init', 'the_first_widget_rand_list');

function the_first_widget_rand_list()
{
	register_widget('The_First_Widget_RandList');
}

class The_First_Widget_RandList extends WP_Widget
{
	function __construct()
	{
		parent::__construct('the_first-widget-rand-list', 'TheFirst-猜你喜欢', ['description' => '随机文章']);
	}

	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);

		$title        = apply_filters('widget_name', isset($instance['title']) ? $instance['title'] : '猜你喜欢');
		$limit        = isset($instance['limit']) ? $instance['limit'] : 4;
		$cat          = isset($instance['cat']) ? $instance['cat'] : '';
		$orderby      = isset($instance['orderby']) ? $instance['orderby'] : '';
		$more = isset($instance['more']) ? $instance['more'] : '';
		$link = isset($instance['link']) ? $instance['link'] : '';

		$mo = '';
		if ($more != '' && $link != '') {
			$mo = '<a class="btn" href="' . $link . '">' . $more . '</a>';
		}
		echo $before_widget;
		echo $before_title . $title . $mo . $after_title;
		echo $this->the_first_rand_posts_list($orderby, $limit, $cat);
		echo $after_widget;
	}

	/**
	 * 输出小工具设置表单
	 *
	 * @param array $instance 现有设置值
	 */
	function form($instance)
	{
		// 输出小工具设置表单
		// TODO:这里是小工具的设置表单，可以让用户自定义小工具的显示内容
?>
		<p>
			<label>
				标题：
				<input style="width:100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo (isset($instance['title']) ? $instance['title'] : ''); ?>" />
			</label>
		</p>
		<p>
			<label>
				排序：
				<?php $orderby = isset($instance['orderby']) ? $instance['orderby'] : ''; ?>
				<select style="width:100%;" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" style="width:100%;">
					<option value="comment_count" <?php selected('comment_count', $orderby); ?>>评论数</option>
					<option value="date" <?php selected('date', $orderby); ?>>发布时间</option>
					<option value="rand" <?php selected('rand', $orderby); ?>>随机</option>
				</select>
			</label>
		</p>
		<p>
			<label>
				分类限制：
				<a style="font-weight:bold;color:#f60;text-decoration:none;" href="javascript:;" title="格式：1,2 &nbsp;表限制ID为1,2分类的文章&#13;格式：-1,-2 &nbsp;表排除分类ID为1,2的文章&#13;也可直接写1或者-1；注意逗号须是英文的">？</a>
				<input style="width:100%;" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo isset($instance['cat']) ? $instance['cat'] : ''; ?>" size="24" />
			</label>
		</p>
		<p>
			<label>
				显示数目：
				<input style="width:100%;" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo isset($instance['limit']) ? $instance['limit'] : 0; ?>" size="24" />
			</label>
		</p>
		<p>
			<label>
				More 显示文字：
				<input style="width:100%;" id="<?php echo $this->get_field_id('more'); ?>" name="<?php echo $this->get_field_name('more'); ?>" type="text" value="<?php echo isset($instance['more']) ? $instance['more'] : ''; ?>" size="24" />
			</label>
		</p>
		<p>
			<label>
				More 链接：
				<input style="width:100%;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="url" value="<?php echo isset($instance['link']) ? $instance['link'] : ''; ?>" size="24" />
			</label>
		</p>
		<?php
	}

	/**
	 * 保存小工具设置
	 *
	 * @param array $new_instance 新设置值
	 * @param array $old_instance 旧设置值
	 * @return array 处理后的新设置值
	 */
	function update($new_instance, $old_instance)
	{
		// TODO:处理小工具设置的参数,比如屏蔽某些值
		if ($new_instance['limit'] < 0 || $new_instance['limit'] > 99) {
			$new_instance['limit'] = 4;
		}
		return $new_instance;
	}

	function the_first_rand_posts_list($orderby, $limit, $cat)
	{
		$args = array(
			'order'            => 'DESC',
			'cat'              => $cat,
			'orderby'          => $orderby,
			'showposts'        => $limit,
			'ignore_sticky_posts' => 1
		);
		query_posts($args);
		while (have_posts()) : the_post();
			$thumbnail = the_first_thumbnail_src(get_the_ID(), get_the_content());
			if (!empty($thumbnail)) :
		?>
				<div class="simple-item simple-left-side">
					<div class="simple-img simple-left-img">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<img alt="picture loss" src="<?php echo $thumbnail; ?>" />
						</a>
					</div>
					<div class="simple-content">
						<p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</p>
						<p class="simple-time"><?php the_time('Y-m-d'); ?></p>
					</div>
				</div>
			<?php else : ?>
				<div class="simple-item">
					<!--无图单文字列表块-->
					<div class="simple-content">
						<p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</p>
						<p class="simple-time"><?php the_time('Y-m-d'); ?></p>
					</div>
				</div>
<?php
			endif;

		endwhile;
		wp_reset_query();
	}
}
