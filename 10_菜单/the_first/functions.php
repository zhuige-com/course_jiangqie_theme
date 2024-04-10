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
