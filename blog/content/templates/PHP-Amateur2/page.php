<?php
/*
 * 自建页面模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="container">
    <!-leftSide begin-->
    <div class="main">
        <div class="posts">
            <div class="post-box-header"></div>
            <div class="post-box radius">
                <div class="post-box-container">
                    <h2 class="con_title"><?php topflg($top); ?><?php echo $log_title; ?></h2>
                    <div class="entry rich-content">
                        <?php echo $log_content; ?>
                        <?php blog_att($logid); ?>
                    </div>
                    <div class="meta"></div>
                </div>
            </div>
            <div class="post-box-footer"></div>
        </div>
        <div id="notes" class="notes radius"> <?php blog_comments($comments); ?>
            <?php blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark); ?>
        </div>
    </div>
    <!--leftSide end-->
    <!-- rightSide begin -->
    <div class="aside">
        <?php include View::getView('side'); ?>
    </div>
    <!-- rightSide end -->
</div>
<?php include View::getView('footer'); ?>