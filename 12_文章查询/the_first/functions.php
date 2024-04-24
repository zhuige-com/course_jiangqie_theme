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

// 开启文章缩略图功能
add_theme_support( 'post-thumbnails' );


function the_first_scripts()
{
    $url = get_template_directory_uri();
    wp_register_script('lib-script', $url . '/js/lib/lb.js', [], '0.1');
    // wp_register_script('the-footer-script', $url . '/js/footer.js', ['jquery'], '0.1', true);
    wp_register_script('the-index-script', $url . '/js/index.js', ['lib-script'], '0.1', true);

    // wp_enqueue_script('the-footer-script');

    if (is_home()) {
        wp_enqueue_script('lib-script');
        wp_enqueue_script('the-index-script');
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