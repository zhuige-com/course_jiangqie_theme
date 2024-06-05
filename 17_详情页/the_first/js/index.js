/**
 * 首页幻灯片
 */
{
    window.onload = function () {
        const options = {
            id: 'lb-1',              // 轮播盒ID
            speed: 600,              // 轮播速度(ms)
            delay: 3000,             // 轮播延迟(ms)
            direction: 'left',       // 图片滑动方向
            moniterKeyEvent: true,   // 是否监听键盘事件
            moniterTouchEvent: true  // 是否监听屏幕滑动事件
        }
        const lb = new Lb(options);
        lb.start();
    }
}

jQuery(document).ready(function ($) {

    var gCatId = '';
    var loading = false;
    var nomore = false;

    function loadPosts() {
        if (nomore) {
            return;
        }

        if (loading) {
            return;
        }
        loading = true;
        $('.spinner').show();

        let start = $('.post-div').length - $('.post-div-stick').length;
        $.post("/wp-admin/admin-ajax.php",
            {
                action: 'ajax_more_posts',
                catid: gCatId,
                start: start
            },
            function (posts, status) {
                nomore = posts.length < 10;

                let tabbox = $('.tabBox_active');

                let content = '';
                for (let i = 0; i < posts.length; i++) {
                    let post = posts[i];
                    let element = '';
                    if (post.thumbnail) {

                        if (post.stick) {
                            element += '<div class="post-div simple-item simple-left-side slide-in post-div-stick">'
                        } else {
                            element += '<div class="post-div simple-item simple-left-side slide-in">'
                        }

                        element += '<div class="simple-img simple-left-img">'
                        element += '<a class="simple-left-img-a" href="' + post.link + '" title="' + post.title + '">'
                        element += '<img alt="picture loss" src="' + post.thumbnail + '" />'
                        element += '</a>'
                        element += '<a class="simple-left-img-cat-a" href="' + post.cat_link + '" title="' + post.cat_name + '"><strong>' + post.cat_name + '</strong></a>'
                        element += '</div>'
                        element += '<div class="simple-content">'
                        element += '<h2>'

                        if (post.stick) {
                            element += '<strong>置顶</strong>'
                        }

                        element += '<a href="' + post.link + '" title="">' + post.title + '</a>'
                        element += '</h2>'
                        element += '<p><a href="' + post.link + '" title="">' + post.excerpt + '</a></p>'
                        element += '<p class="simple-info">'

                        if (post.author_avatar != '' || post.author_name != '') {
                            element += '<a href="' + post.author_link + '" title="' + post.author_name + '">'

                            if (post.author_avatar != '') {
                                element += post.author_avatar
                            }

                            if (post.author_name != '') {
                                element += '<em>' + post.author_name + '</em>'
                            }

                            element += '</a> · '
                        }

                        if (post.views_count != '') {
                            element += '<cite>浏览 ' + post.views_count + '</cite> · '
                        }

                        if (post.thumbup_count != '') {
                            element += '<cite>点赞 ' + post.thumbup_count + '</cite> · '
                        }

                        if (post.comment_count != '') {
                            element += '<cite>评论 ' + post.comment_count + '</cite> · '
                        }

                        element += '<cite>' + post.time + '</cite>'

                        element += '</p></div></div>'
                    } else {
                        element += '<div class="post-div simple-item slide-in">'
                        element += '<div class="simple-content">'
                        element += '<h2>'

                        if (post.stick) {
                            element += '<strong>置顶</strong>'
                        }

                        element += '<a href="' + post.link + '" title="">' + post.title + '</a>'
                        element += '</h2>'
                        element += '<p><a href="' + post.link + '" title="">' + post.excerpt + '</a></p>'
                        element += '<p class="simple-info">'

                        if (post.author_avatar != '' || post.author_name != '') {
                            element += '<a href="' + post.author_link + '" title="' + post.author_name + '">'

                            if (post.author_avatar != '') {
                                element += post.author_avatar
                            }

                            if (post.author_name != '') {
                                element += '<em>' + post.author_name + '</em>'
                            }

                            element += '</a> · '
                        }

                        if (post.views_count != '') {
                            element += '<cite>浏览 ' + post.views_count + '</cite> · '
                        }

                        if (post.thumbup_count != '') {
                            element += '<cite>点赞 ' + post.thumbup_count + '</cite> · '
                        }

                        if (post.comment_count != '') {
                            element += '<cite>评论 ' + post.comment_count + '</cite> · '
                        }

                        element += '<cite>' + post.time + '</cite>'

                        element += '</p></div></div>'
                    }

                    // tabbox.append(element);

                    content += element;
                }

                tabbox.append(content);

                loading = false;
                $('.spinner').hide();
            });
    }

    loadPosts();

    let tabNavs = $('.tab_nav>li');
    let tabActive = $(".tabNav_active");
    tabNavs.mouseenter(function () {
        $(".tabNav_active").removeClass('tabNav_active');
        $(this).addClass('tabNav_active');
    });

    tabNavs.mouseleave(function () {
        $(this).removeClass('tabNav_active');
        tabActive.addClass('tabNav_active');
    });

    tabNavs.click(function () {
        $(".tabNav_active").removeClass('tabNav_active');
        $(this).addClass('tabNav_active');
        tabActive = $(this);

        nomore = false;
        $('.tabBox_active').empty();
        gCatId = $(this).data('catid');
        loadPosts();
    });

    $(window).scroll(function (event) {
        if ($(this).scrollTop() + $(window).height() + 200 > $(document).height()) {
            // load data
            loadPosts();
        }
    });

});