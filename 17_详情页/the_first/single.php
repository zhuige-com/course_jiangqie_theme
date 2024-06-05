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


                <?php
                if (have_posts()) :
                    the_post();
                    // 文章信息
                ?>
                    <div class="base-list search-list mb-20">
                        <?php the_first_breadcrumbs() ?>
                        <div class="content-wrap">
                            <div class="content-author mb-20">
                                <h1><?php the_title() ?></h1>
                                <p class="simple-info mb-10-xs">
                                    <?php
                                    //作者头像和名称
                                    $detail_switch_author_avatar = the_first_option('detail_switch_author_avatar');
                                    $detail_switch_author_name = the_first_option('detail_switch_author_name');
                                    if ($detail_switch_author_avatar || $detail_switch_author_name) : ?>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php the_author() ?>">
                                            <?php if ($detail_switch_author_avatar) :
                                                the_first_avatar(get_the_author_meta('ID'));
                                            endif; ?>
                                            <?php if ($detail_switch_author_name) : ?>
                                                <em><?php the_author() ?></em>
                                            <?php endif; ?>
                                        </a> ·
                                    <?php endif; ?>
									<!-- 浏览数 -->
									<?php the_first_post_detail_view_count(); ?>
									<!-- 点赞数 -->
									<?php the_first_post_detail_thumbup_count(); ?>
									<!-- 评论数 -->
									<?php the_first_post_detail_comment_count(); ?>
									<!-- 发布时间 -->
									<cite><?php echo the_first_time_ago(get_the_time('Y-m-d G:i:s')); ?></cite>
								</p>
                            </div>
                            <div class="content-view mb-20">
                                <?php the_content() ?>
                            </div>

                            <?php
                            //标签信息
                            $detail_switch_tag = the_first_option('detail_switch_tag');
                            if ($detail_switch_tag) : ?>
                                <div class="content-tag mb-20">
                                    <div class="tag-list">
                                        <?php the_tags('', '', '') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
							//版权信息
							$detail_switch_copyright = the_first_option('detail_switch_copyright');
							if ($detail_switch_copyright) : ?>
								<div class="content-copy mb-20">
									<p><?php echo the_first_option('detail_copyright'); ?></p>
								</div>
							<?php endif; ?>

                            <?php
                            //点赞和打赏
                            $detail_switch_thumbup = the_first_option('detail_switch_thumbup');
                            $detail_switch_reward = the_first_option('detail_switch_reward');
                            if ($detail_switch_thumbup || $detail_switch_reward) : ?>
                                <div class="content-opt mb-20">
                                    <div class="content-opt-wap">
                                        <?php if ($detail_switch_thumbup) : ?>
                                            <div>
                                                <a href="javascript:;" data-action="the_first_thumbup" data-id="<?php the_ID(); ?>" class="btn-thumbup <?php if (isset($_COOKIE['the_first_thumbup_' . $post->ID])) echo ' done'; ?>">
                                                    <img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/zan.png'; ?>" />
                                                    <?php $thumbup = get_post_meta($post->ID, 'the_first_thumbup', true); ?>
                                                    <p>已有<cite class="count"><?php echo $thumbup ? $thumbup : '0'; ?></cite>人点赞</p>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($detail_switch_reward) : ?>
                                            <div>
                                                <a href="javascript:;" class="btn-reward">
                                                    <img alt="picture loss" src="<?php echo get_stylesheet_directory_uri() . '/images/shang.png'; ?>" />
                                                    <p>打赏一下作者</p>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div id="reward-div" style="display: none;">
                                    <?php the_first_reward_image() ?>
                                </div>
                            <?php endif; ?>

                            <?php
                            //上一篇 下一篇
                            $detail_switch_pre_next = the_first_option('detail_switch_pre_next');
                            if ($detail_switch_pre_next) : ?>
                                <div class="content-nav row d-flex flex-wrap mb-20">
                                    <div class="content-block column md-6">
                                        <h6>
                                            <?php if (get_previous_post()) {
                                                previous_post_link('%link', '上一篇');
                                            } else {
                                                echo '<a href="javascript:void(0)">上一篇</a>';
                                            } ?>
                                        </h6>
                                        <p>
                                            <?php if (get_previous_post()) {
                                                previous_post_link('%link');
                                            } else {
                                                echo "没有了";
                                            } ?>
                                        </p>
                                    </div>
                                    <div class="content-block column md-6">
                                        <h6>
                                            <?php if (get_next_post()) {
                                                next_post_link('%link', '下一篇');
                                            } else {
                                                echo '<a href="javascript:void(0)">下一篇</a>';
                                            } ?>
                                        </h6>
                                        <p>
                                            <?php if (get_next_post()) {
                                                next_post_link('%link');
                                            } else {
                                                echo "没有了";
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php
                        //猜你喜欢
                        $detail_switch_recommend = the_first_option('detail_switch_recommend');
                        if (0 && $detail_switch_recommend) : ?>
                            <h5 class="mb-20">猜你喜欢</h5>
                            <div class="row d-flex flex-wrap mb-20">
                                <?php
                                $args = array(
                                    'post_status' => 'publish',
                                    'post__not_in' => [$post->ID],
                                    'ignore_sticky_posts' => 1,
                                    'orderby' => 'comment_date',
                                    'posts_per_page' => 3
                                );

                                $posttags = get_the_tags();
                                if ($posttags) {
                                    $tags = '';
                                    foreach ($posttags as $tag) {
                                        $tags .= $tag->term_id . ',';
                                    }
                                    $args['tag__in'] = explode(',', $tags);
                                }
                                
                                $the_query = new WP_Query($args);
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    global $post;
                                    $thumbnail = the_first_thumbnail_src($post->ID, $post->post_content);
                                    if (empty($thumbnail)) {
                                        $thumbnail = get_stylesheet_directory_uri() . '/images/jiangqie.png';
                                    }
                                ?>
                                    <div class="column md-4 easy-item">
                                        <figure class="relative">
                                            <div>
                                                <a href="<?php the_permalink(); ?>">
                                                    <img alt="picture loss" src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" />
                                                </a>
                                            </div>
                                        </figure>
                                        <figcaption class="title">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        </figcaption>
                                    </div>
                                <?php
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php endif; ?>

                        <!-- 评论 -->

                        <h5 class="mb-20 mt-40">发表评论</h5>
                        <div class="content-post mb-20">
                            <p>电子邮件地址不会被公开。 必填项已用*标注</p>
                        </div>

                        <div id="respond" class="comment-respond mb-20-xs">

                            <form action="https://xcx.jiangqie.com/wp-comments-post.php" method="post" id="commentform">
                                <div class="comment-form-box ">
                                    <p class="comment-form-comment">
                                        <label for="comment">评论</label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" placeholder="请回复有价值的信息，无意义的评论讲很快被删除，账号将被禁止发言。" required="required"></textarea>
                                    </p>

                                    <ul>
                                        <li class="comment-form-author"><label for="author">姓名 *</label> <input id="author" name="author" type="text" value="" size="30" maxlength="245"></li>
                                        <li class="comment-form-email"><label for="email">电子邮件 *</label> <input id="email" name="email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes"></li>
                                        <li class="comment-form-url"><label for="url">站点</label> <input id="url" name="url" type="text" value="" size="30" maxlength="200"></li>
                                    </ul>
                                    <p class="form-submit">
                                        <input name="submit" type="submit" id="submit" class="submit" value="发表评论">
                                    </p>
                                    <input type="hidden" name="comment_post_ID" value="3142" id="comment_post_ID">
                                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                </div>
                            </form>

                        </div>

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
                    </div>
                <?php else :
                // 没有找到文章
                endif;
                ?>
            </article>

            <!--侧边栏-->
            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<!-- 页脚 -->
<?php get_footer(); ?>