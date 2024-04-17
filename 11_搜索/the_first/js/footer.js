jQuery(document).ready(function ($) {

    /* 二级菜单 -- start -- */
    $('.nav-box>.nav-items .menu-item').each(function () {
        let submenu = $(this).children('.sub-menu');
        if (submenu.length > 0) {
            let a = $(this).children('a');
            if (a.length > 0) {
                a.attr('href', '#');
                a.attr('target', '_self');
            }
        }
    });

    $('.nav-box>.nav-items .menu-item').mouseenter(function () {
        if ($(document).width() >= 1140) {
            $(this).children('.sub-menu').show();
        }
    });

    $('.nav-box>.nav-items .menu-item').mouseleave(function () {
        if ($(document).width() >= 1140) {
            $(this).children('.sub-menu').hide();
        }
    });

    $('.nav-box>.nav-items .menu-item').click(function () {
        if ($(document).width() < 1140) {
            $(this).children('.sub-menu').toggle();
        }
    });

    /* 二级菜单 -- start -- */

});