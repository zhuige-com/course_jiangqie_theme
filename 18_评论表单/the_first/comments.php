<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.

if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('Please do not load this page directly. Thanks!');
}
?>

<!-- 自定义评论表单 -->
<?php 
if (post_password_required()) {
    return;
}

if (!comments_open()) {
    echo '文章评论已关闭！';
    return;
}

$closeTimer = (time() - strtotime(get_the_time('Y-m-d G:i:s'))) / 86400;
?>

<h5 class="mb-20 mt-40">发表评论</h5>
<div class="content-post mb-20">
    <p>电子邮件地址不会被公开。 必填项已用*标注</p>
</div>

<div id="respond" class="comment-respond mb-20-xs">
    <?php if (get_option('comment_registration') && !is_user_logged_in()) { ?>
        <a href="<?php echo wp_login_url(get_permalink()); ?>" class="comment-login-textarea">
            <textarea cols="45" rows="8" maxlength="65525" placeholder="请回复有价值的信息，无意义的评论讲很快被删除，账号将被禁止发言。" required="required"></textarea>
        </a>
        <h3 class="queryinfo comment-login-tip">
            <?php printf('您必须 <a href="%s">登录</a> 才能发表评论！', wp_login_url(get_permalink())); ?>
        </h3>
    <?php } elseif (get_option('close_comments_for_old_posts') && $closeTimer > get_option('close_comments_days_old')) { ?>
        <h3 class="queryinfo">
            文章评论已关闭！
        </h3>
    <?php } else { ?>

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <div class="comment-form-box <?php echo is_user_logged_in() ? 'comment-form-login' : '' ?>">
                <p class="comment-form-comment">
                    <label for="comment">评论</label>
                    <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" placeholder="请回复有价值的信息，无意义的评论讲很快被删除，账号将被禁止发言。" required="required"></textarea>
                </p>

                <?php if (!is_user_logged_in()) { ?>
                    <ul>
                        <li class="comment-form-author"><label for="author">姓名 *</label> <input id="author" name="author" type="text" value="" size="30" maxlength="245"></li>
                        <li class="comment-form-email"><label for="email">电子邮件 *</label> <input id="email" name="email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes"></li>
                        <li class="comment-form-url"><label for="url">站点</label> <input id="url" name="url" type="text" value="" size="30" maxlength="200"></li>
                    </ul>
                <?php } else { ?>
                    <p class="comment-form-user">您已登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出</a></p>
                <?php } ?>
                <p class="form-submit">
                    <input name="submit" type="submit" id="submit" class="submit" value="发表评论">
                </p>
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </div>
        </form>

    <?php } ?>
</div>
 

<!-- 使用 comment_form 函数 -->
<?php // comment_form() ?>

<h5 class="mb-20">评论信息</h5>
<div class="content-comment mb-20">

    <div class="content-comment-item content-comment-item-depth-1">
        <p class="simple-info">
            <a href="#" title="">
                <img alt="picture loss" src="images/default_avatar.jpg"><em>Luo</em>
            </a>
            <a rel="nofollow" class="comment-reply-link" href="javascript:void(0)">回复</a>2023-04-06
            17:53
        </p>
        <div class="content-comment-info">
            <p class="content-comment-text">厉害</p>
        </div>
    </div>
    <ul class="children">
        <div class="content-comment-item content-comment-item-depth-2">
            <p class="simple-info">
                <a href="#" title="">
                    <img alt="picture loss" src="images/default_avatar.jpg"><em>微信用户</em></a>
                <a rel="nofollow" class="comment-reply-link" href="javascript:void(0)">回复</a>2023-05-31
                11:41
            </p>
            <div class="content-comment-info">
                <p class="content-comment-text">很好</p>
            </div>
        </div><!-- #comment-## -->
    </ul><!-- .children -->

    <!-- #comment-## -->
    <div class="content-comment-item content-comment-item-depth-1">
        <p class="simple-info">
            <a href="#" title="">
                <img alt="picture loss" src="images/default_avatar.jpg"><em>微信用户</em></a>
            <a rel="nofollow" class="comment-reply-link" href="javascript:void(0)">回复</a>2023-04-12
            14:58
        </p>
        <div class="content-comment-info">
            <p class="content-comment-text">牛的</p>
        </div>
    </div>
    <ul class="children">
        <div class="content-comment-item content-comment-item-depth-2">
            <p class="simple-info">
                <a href="#" title="">
                    <img alt="picture loss" src="images/default_avatar.jpg"><em>微信用户</em></a>
                <a rel="nofollow" class="comment-reply-link" href="javascript:void(0)">回复</a>2023-05-29
                14:01
            </p>
            <div class="content-comment-info">
                <p class="content-comment-text">可以的</p>
            </div>
        </div><!-- #comment-## -->
        <div class="content-comment-item content-comment-item-depth-2">
            <p class="simple-info">
                <a href="#" title="">
                    <img alt="picture loss" src="images/default_avatar.jpg"><em>微信用户</em></a>
                <a rel="nofollow" class="comment-reply-link" href="javascript:void(0)">回复</a>2023-05-29
                22:02
            </p>
            <div class="content-comment-info">
                <p class="content-comment-text">确实</p>
            </div>
        </div><!-- #comment-## -->
    </ul><!-- .children -->
</div>