<?php

add_action('widgets_init', 'the_first_widget_tags');

function the_first_widget_tags()
{
	register_widget('The_First_Widget_Tags');
}

class The_First_Widget_Tags extends WP_Widget
{
	function __construct()
	{
		parent::__construct('the_first-widget-tags', 'TheFirst-标签云', ['description' => '显示热门标签']);
	}

	function widget($args, $instance)
	{
		extract($args);

		$title = apply_filters('widget_name', isset($instance['title']) ? $instance['title'] : '标签云');
		$count = isset($instance['count']) ? $instance['count'] : 9;
		$offset = isset($instance['offset']) ? $instance['offset'] : 0;
		$more = isset($instance['more']) ? $instance['more'] : '';
		$link =  isset($instance['link']) ? $instance['link'] : '';

		$mo = '';
		if ($more != '' && $link != '') {
			$mo = '<a class="btn-more" href="' . $link . '">' . $more . '</a>';
		}

		echo $before_widget;

		echo $before_title . $title . $mo . $after_title;
		echo '<div class="tag-list">';
		$tags_list = get_tags('orderby=count&order=DESC&number=' . $count . '&offset=' . $offset);
		if ($tags_list) {
			foreach ($tags_list as $tag) {
				echo '<a title="' . $tag->count . '个话题" href="' . get_tag_link($tag) . '">' . $tag->name . ' (' . $tag->count . ')</a>';
			}
		} else {
			echo '暂无标签！';
		}
		echo '</div>';

		echo $after_widget;
	}

	function form($instance)
	{
?>
		<p>
			<label>
				名称：
				<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo isset($instance['title']) ? $instance['title'] : '' ?>" class="widefat" />
			</label>
		</p>
		<p>
			<label>
				显示数量：
				<input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" value="<?php echo isset($instance['count']) ? $instance['count'] : 0 ?>" class="widefat" />
			</label>
		</p>
		<p>
			<label>
				去除前几个：
				<input id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="number" value="<?php echo isset($instance['offset']) ? $instance['offset'] : 0 ?>" class="widefat" />
			</label>
		</p>
		<p>
			<label>
				More 显示文字：
				<input style="width:100%;" id="<?php echo $this->get_field_id('more'); ?>" name="<?php echo $this->get_field_name('more'); ?>" type="text" value="<?php echo isset($instance['more']) ? $instance['more'] : '' ?>" size="24" />
			</label>
		</p>
		<p>
			<label>
				More 链接：
				<input style="width:100%;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="url" value="<?php echo isset($instance['link']) ? $instance['link'] : '' ?>" size="24" />
			</label>
		</p>
<?php
	}
}

?>