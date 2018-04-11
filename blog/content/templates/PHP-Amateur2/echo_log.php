<?php
/*
 * 阅读日志页面
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="container">
    <!--leftSide begin-->
    <div class="main">
        <div class="posts">
            <div class="post-box radius">
                <div class="post-box-container"><div class=""><span style="float: right;">分享到：<!-- Baidu Button BEGIN -->
                            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" style="float: right;">
                                <a class="bds_tsina"></a>
                                <a class="bds_tqq"></a>
                                <a class="bds_qzone"></a>
                                <a class="bds_renren"></a>
                                <a class="bds_t163"></a>
                                <a class="bds_tqf"></a>
                                <a class="bds_bdhome"></a>
                                <a class="bds_fx"></a>
                                <a class="bds_diandian"></a>
                                <a class="shareCount"></a>
                            </div>
                            <script type="text/javascript" id="bdshare_js" data="type=tools&uid=360809" ></script>
                            <script type="text/javascript" id="bdshell_js"></script>
                            <script type="text/javascript">
                                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                            </script>
                            <!-- Baidu Button END --></span><h2 class="con_title"><?php topflg($top); ?><?php echo $log_title; ?></h2></div>
                    <div class="con_info">
                        <span class="fl">博文日期：&nbsp;</span><span class="fl"><?php echo gmdate('Y-n-j H:i:s', $date); ?></span><span class="fl">&nbsp;&nbsp;分类：&nbsp;</span><?php blog_sort($logid); ?>
                        <?php editflg($logid, $author); ?>
                        <span class="fr">
                            <?php echo $views; ?> 次访问
                        </span>
                        <a class="fr" href="<?php echo $value['log_url']; ?>#comments">
                            <?php echo $comnum; ?> 条评论 &nbsp; | &nbsp;
                        </a>
                    </div>
                    <div class="entry rich-content">
                        <?php
                        echo $log_content;
                        blog_att($logid);
                        ?>
                    </div>
                    <div class="meta"><?php doAction('log_related', $logData); ?>
                        <div class="post-tags">
                            <?php blog_tag($logid); ?>
                        </div>
                        <?php neighbor_log($neighborLog); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--pageList begin-->
        <div id="notes" class="notes radius">
            <?php
            blog_comments($comments);
            blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark);
            ?>
        </div>
        <!--pageList end-->
    </div>
    <!--leftSide end-->
    <!--rightSide begin -->
    <div class="aside">
        <?php
        include View::getView('side');
        ?>
    </div>
    <!--rightSide end -->
</div>
<?php
include View::getView('footer');
?>