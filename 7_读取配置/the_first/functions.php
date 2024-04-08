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
			