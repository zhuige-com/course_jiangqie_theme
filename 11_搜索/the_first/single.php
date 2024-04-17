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
                        <div class="base-list-nav" itemscope="">
                            <a itemprop="breadcrumb" href="/">首页</a> <em> &gt; </em>
                            <a itemprop="breadcrumb" href="javascript:void(0)">追格快讯</a> <em> &gt; </em>
                            <span class="current">正文</span>
                        </div>
                        <div class="content-wrap">
                            <div class="content-author mb-20">
                                <h1><?php the_title() ?></h1>
                                <p class="simple-info mb-10-xs">
                                    <a href="javascript:void(0)" title="酱茄小助理">
                                        <img alt="picture loss" src="images/default_avatar.jpg">
                                        <em>酱茄小助理</em>
                                    </a> ·
                                    <!-- 浏览数 -->
                                    <cite>浏览 11359</cite> ·
                                    <!-- 点赞数 -->
                                    <cite>点赞 38</cite> ·
                                    <!-- 评论数 -->
                                    <cite>评论 10</cite> ·
                                    <!-- 发布时间 -->
                                    <cite>1年前 (2022-10-11)</cite>
                                </p>
                            </div>
                            <div class="content-view mb-20">
                                <?php the_content() ?>
                            </div>

                            <div class="content-tag mb-20">
                                <div class="tag-list">
                                    <a href="https://xcx.jiangqie.com/tag/%e5%b0%8f%e7%a8%8b%e5%ba%8f" rel="tag">小程序</a><a href="https://xcx.jiangqie.com/tag/%e8%b5%84%e8%ae%af%e5%b0%8f%e7%a8%8b%e5%ba%8f" rel="tag">资讯小程序</a><a href="https://xcx.jiangqie.com/tag/%e8%bf%bd%e6%a0%bc" rel="tag">追格</a><a href="https://xcx.jiangqie.com/tag/%e8%bf%bd%e6%a0%bc%e8%b5%84%e8%ae%af%e5%b0%8f%e7%a8%8b%e5%ba%8f" rel="tag">追格资讯小程序</a>
                                </div>
                            </div>

                            <div class="content-copy mb-20">
                                <p>版权声明：酱茄所提供的文章、图片等内容均为用户发布或互联网整理而来，仅供学习参考，如有侵犯您的版权，请联系：help@jiangqie.com，我们将在3日内删除。
                                </p>
                            </div>

                            <div class="content-opt mb-20">
                                <div class="content-opt-wap">
                                    <div>
                                        <a href="javascript:;" data-action="jaingqie_thumbup" data-id="3142" class="btn-thumbup ">
                                            <img alt="picture loss" src="images/zan.png">
                                            <p>已有<cite class="count">38</cite>人点赞</p>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:;" class="btn-reward">
                                            <img alt="picture loss" src="images/shang.png">
                                            <p>打赏一下作者</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div id="reward-div" style="display: none;">
                                <img src="images/zan.png" alt="The First 主题">
                            </div>

                            <div class="content-nav row d-flex flex-wrap mb-20">
                                <div class="content-block column md-6">
                                    <h6>
                                        <a href="javascript:void(0)" rel="prev">上一篇</a>
                                    </h6>
                                    <p>
                                        <a href="javascript:void(0)" rel="prev">追格资讯小程序（开源版）百度小程序登录问题更新发布</a>
                                    </p>
                                </div>
                                <div class="content-block column md-6">
                                    <h6>
                                        <a href="javascript:void(0)" rel="next">下一篇</a>
                                    </h6>
                                    <p>
                                        <a href="javascript:void(0)" rel="next">代码高亮演示（代码高亮html、css、javascript）</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h5 class="mb-20">猜你喜欢</h5>
                        <div class="row d-flex flex-wrap mb-20">
                            <div class="column md-4 easy-item">
                                <figure class="relative">
                                    <div>
                                        <a href="javascript:void(0)">
                                            <img alt="picture loss" src="images/jiangqie.png">
                                        </a>
                                    </div>
                                </figure>
                                <figcaption class="title">
                                    <h3><a href="javascript:void(0)">追格资讯小程序（开源版）百度小程序登录问题更新发布</a>
                                    </h3>
                                </figcaption>
                            </div>
                            <div class="column md-4 easy-item">
                                <figure class="relative">
                                    <div>
                                        <a href="javascript:void(0)">
                                            <img alt="picture loss" src="images/jiangqie.png">
                                        </a>
                                    </div>
                                </figure>
                                <figcaption class="title">
                                    <h3><a href="javascript:void(0)">微信流量主小程序之追格资讯小程序（开源版）V1.8.0发布</a>
                                    </h3>
                                </figcaption>
                            </div>
                            <div class="column md-4 easy-item">
                                <figure class="relative">
                                    <div>
                                        <a href="javascript:void(0)">
                                            <img alt="picture loss" src="images/jiangqie.png">
                                        </a>
                                    </div>
                                </figure>
                                <figcaption class="title">
                                    <h3><a href="javascript:void(0)">追格资讯小程序（开源版）V1.7.0流量主功能发布</a>
                                    </h3>
                                </figcaption>
                            </div>
                        </div>

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