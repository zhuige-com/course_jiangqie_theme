<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.
?>

<?php

/**
 * 追格WordPress主题开发教程
 */

require_once TEMPLATEPATH . '/inc/codestar-framework/codestar-framework.php';
require_once TEMPLATEPATH . '/inc/admin-options.php';
require_once TEMPLATEPATH . '/inc/fun-widgets.php';
require_once TEMPLATEPATH . '/inc/fun-ajax.php';
require_once TEMPLATEPATH . '/inc/widgets/rand-list.php';
require_once TEMPLATEPATH . '/inc/widgets/hot-list.php';
require_once TEMPLATEPATH . '/inc/widgets/tags.php';

// 开启文章缩略图功能
add_theme_support( 'post-thumbnails' );


function the_first_scripts()
{
    $url = get_template_directory_uri();
    wp_register_script('lib-script', $url . '/js/lib/lb.js', [], '0.1');
    wp_register_script('lib-layer', $url . '/js/layer/layer.js', ['jquery'], '1.0', false);
    // wp_register_script('the-footer-script', $url . '/js/footer.js', ['jquery'], '0.1', true);
    wp_register_script('the-index-script', $url . '/js/index.js', ['lib-script'], '0.1', true);
    wp_register_script('the-single-script', $url . '/js/single.js', ['lib-layer'], '0.3', true);

    // wp_enqueue_script('the-footer-script');

    wp_enqueue_script('jquery');

    if (is_home()) {
        wp_enqueue_script('lib-script');
        wp_enqueue_script('the-index-script');
    } else if (is_single()) {
        wp_enqueue_script('lib-layer');
        wp_enqueue_script('the-single-script');
    }
}
add_action('wp_enqueue_scripts', 'the_first_scripts');


/**
 * 读取设置项的值
 */
$the_first_options = null;
function the_first_option($key, $default = '')
{
    global $the_first_options;
    if (!$the_first_options) {
        $the_first_options = get_option('zhuige_the_first');
    }

    if (isset($the_first_options[$key])) {
        return $the_first_options[$key];
    }

    return $default;
}

/**
 * 显示网站LOGO
 */
function the_first_site_logo()
{
    $logo = the_first_option('site_logo');
    if ($logo && $logo['url']) {
        $logo_src = $logo['url'];
    } else {
        $logo_src = get_stylesheet_directory_uri() . '/images/xlogo.png';
    }

    echo '<img alt="picture loss" src="' . $logo_src . '">';
}


add_action('after_setup_theme', 'register_the_first_menu');
function register_the_first_menu()
{
    register_nav_menu('main-menu', '主菜单');
}


/**
 * 首页精选文章
 */
function home_post_recommend()
{
    $hot_ids = the_first_option('home_post_recommend');
    if (empty($hot_ids)) {
        return false;
    }

    $args = [
        'post__in' => $hot_ids,
        'orderby' => 'post__in',
        'posts_per_page' => -1,
        'ignore_sticky_posts' => 1
    ];

    $hots = [];
    $query = new WP_Query();
    $result = $query->query($args);
    foreach ($result as $post) {
        $thumbnail = the_first_thumbnail_src($post->ID, $post->post_content);
        if (empty($thumbnail)) {
            $thumbnail = get_stylesheet_directory_uri() . '/images/jiangqie.png';
        }
        $hots[] = [
            'id' => $post->ID,
            'title' => $post->post_title,
            'thumbnail' => $thumbnail
        ];
    }

    if (empty($hots)) {
        return false;
    }

    return $hots;
}

/**
 * 获取文章缩略图
 */
function the_first_thumbnail_src($post_id, $post_content)
{
    $post_thumbnail_src = '';

    //如果有特色缩略图，则直接使用
    if (has_post_thumbnail($post_id)) {    
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
        if ($thumbnail_src) {
            $post_thumbnail_src = $thumbnail_src[0];
        }
    } 
    
    // 没有特色缩略图，则使用文中的第一个图片
    if (empty($post_thumbnail_src)) {
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
        if ($matches && isset($matches[1]) && isset($matches[1][0])) {
            $post_thumbnail_src = $matches[1][0];   //获取该图片 src
        }
    }

    return $post_thumbnail_src;
}

/**
 * 首页显示分类
 */
function the_first_nav_catsegories()
{
    $home_cat_show = the_first_option('home_cat_show');
    $categories = [];
    if (!empty($home_cat_show)) {
        $include = implode(",", $home_cat_show);
        $args = ['include' => $include];
        $result = get_categories($args);
        foreach ($home_cat_show as $cat_id) {
            foreach ($result as $cat) {
                if ($cat_id == $cat->term_id) {
                    $categories[] = $cat;
                }
            }
        }
    } else {
        $categories = get_categories();
    }

    return $categories;
}

/**
 * 面包屑导航
 */
function the_first_breadcrumbs()
{
    if ((is_category() || is_tag()) && !the_first_option('list_switch_bread')) {
        return '';
    }

    if (is_single() && !the_first_option('detail_switch_bread')) {
        return '';
    }

    $delimiter = '<em> > </em>'; // 分隔符
    $before = '<span class="current">'; // 在当前链接前插入
    $after = '</span>'; // 在当前链接后插入
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<div class="base-list-nav" itemscope="">' . __('', 'cmp');
        global $post;
        $homeLink = home_url() . '/';
        echo '<a itemprop="breadcrumb" href="' . $homeLink . '">' . __('首页', 'cmp') . '</a> ' . $delimiter . ' ';
        if (is_404()) { // 404 页面
            echo $before;
            _e('404', 'cmp');
            echo $after;
        } else if (is_category()) { // 分类 存档
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) {
                $cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace('<a', '<a itemprop="breadcrumb"', $cat_code);
            }
            echo $before . '' . single_cat_title('', FALSE) . '' . $after;
        } elseif (is_day()) { // 天 存档
            echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) { // 月 存档
            echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) { // 年 存档
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) { // 文章
            if (get_post_type() != 'post') { // 自定义文章类型
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else { // 文章 post
                $cat = get_the_category();
                $cat = $cat[0];
                $cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace('<a', '<a itemprop="breadcrumb"', $cat_code);
                echo $before . '正文' . $after;
            }
        } elseif (is_attachment()) { // 附件
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            if (is_array($cat) && count($cat) > 0) {
                $cat = $cat[0];
            } else {
                $cat = '未分类';
            }
            echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) { // 页面
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) { // 父级页面
            $parent_id = $post->post_parent;
            $breadcrumbs = [];
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_search()) { // 搜索结果
            printf(__('搜索：%s', 'cmp'), get_search_query());
        } elseif (is_tag()) { //标签 存档
            echo $before;
            printf(__('标签：%s', 'cmp'), single_tag_title('', FALSE));
            echo $after;
        } elseif (is_author()) { // 作者存档
            global $author;
            $userdata = get_userdata($author);
            echo $before;
            printf(__('作者：%s', 'cmp'), $userdata->display_name);
            echo $after;
        } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        }

        if (get_query_var('paged')) { // 分页
            if (is_category() || is_day() || is_month() || is_year()  || is_tag() || is_author())
                echo sprintf(__('( Page %s )', 'cmp'), get_query_var('paged'));
        }
        echo '</div>';
    }
}

/**
 * 头像
 */
function the_first_avatar($user_id)
{
    $avatar = get_user_meta($user_id, 'the_first_avatar', true);
    if (empty($avatar)) {
        $avatar = get_stylesheet_directory_uri() . '/images/default_avatar.jpg';
    }

    echo '<img alt="picture loss" src="' . $avatar . '" />';
}

/**
 * 详情-浏览数
 */
function the_first_post_detail_view_count()
{
    global $post;
    if (the_first_option('detail_switch_view_count')) {
        $count = get_post_meta($post->ID, "views", true);
        if (!$count) {
            $count = 0;
        }
        echo '<cite>浏览 ' . $count . '</cite> ·';
    }

    echo '';
}

/**
 * 详情-点赞数
 */
function the_first_post_detail_thumbup_count()
{
    global $post;
    if (the_first_option('detail_switch_thumbup_count')) {
        $count = get_post_meta($post->ID, "the_first_thumbup", true);
        if (!$count) {
            $count = 0;
        }
        echo '<cite>点赞 ' . $count . '</cite> ·';
    }

    echo '';
}

/**
 * 详情-评论数
 */
function the_first_post_detail_comment_count()
{
    if (the_first_option('detail_switch_comment_count')) {
        echo '<cite>评论 ' . get_comments_number() . '</cite> ·';
    }

    echo '';
}

/**
 * 美化时间
 */
function the_first_time_ago($ptime)
{
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return '刚刚';
    $interval = array(
        12 * 30 * 24 * 60 * 60  =>  '年前 (' . wp_date('Y-m-d', $ptime) . ')',
        30 * 24 * 60 * 60       =>  '个月前 (' . wp_date('m-d', $ptime) . ')',
        7 * 24 * 60 * 60        =>  '周前 (' . wp_date('m-d', $ptime) . ')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

/**
 * 打赏图片
 */
function the_first_reward_image()
{
    $image = the_first_option('detail_reward_image');
    if ($image && $image['url']) {
        echo '<img src="' . $image['url'] . '" alt="' . get_bloginfo('name') . '" />';
    } else {
        echo '请在后台配置打赏二维码';
    }
}

/**
 * 评论样式
 */
function the_first_comment_list($comment, $args, $depth)
{
    echo '<div class="content-comment-item content-comment-item-depth-' . $depth . '">';
    echo '<p class="simple-info">';
    echo '<a href="' . ($comment->comment_author_url ? $comment->comment_author_url : '#') . '" title="">';

    the_first_avatar($comment->user_id);

    $comment_author = get_user_meta($comment->user_id, 'nickname', true);
    if (empty($comment_author)) {
        $comment_author = $comment->comment_author;
    }

    echo '<em>' . $comment_author  . '</em>';

    echo '</a>';
    echo comment_reply_link(array_merge($args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'])));
    echo edit_comment_link();
    echo get_comment_time('Y-m-d H:i ');
    echo '</p>';
    echo '<div class="content-comment-info">';
    echo '<p class="content-comment-text">' . get_comment_text() . '</p>';
    echo '</div>';
    echo '</div>';
}