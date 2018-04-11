<?php
/*
 * 侧边栏组件、页面模块
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<?php

//widget：blogger
function widget_blogger($title) {
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:" . $user_cache[1]['mail'] . "\">" . $user_cache[1]['name'] . "</a>" : $user_cache[1]['name'];
    ?>
    <div class="sidebox">
        <div class="side-box-title"><span class="aside-icon attention_me_ico"></span>关注我</div>
        <div class="icon">
            <ul>
                <li><a class="sina_weibo" href="http://www.weibo.com/u/2189910831" target="_blank">新浪微博</a></li>
                <li><a class="t_qq" href="http://t.qq.com/baywatch" target="_blank">腾讯微博</a></li>
                <li><a class="qq"  target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=235360&site=jnfq.licai.so&menu=yes">腾讯QQ</a></li>
                <li><a class="_rss" href="<?php echo BLOG_URL; ?>rss.php" target="_blank">RSS订阅</a></li>
            </ul>
        </div>
    </div>
<?php } ?>
<?php

//widget：日历
function widget_calendar($title) {
    ?>
    <div class="sidebox">
        <div class="side-box-title"><span class="aside-icon date_ico"></span><?php echo $title; ?></div>
        <ul class="sidelist">
            <div class="sidelistpd">
                <div id="calendar">
                </div>
                <script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
            </div>
        </ul>
    </div>
<?php } ?>
<?php

//widget：标签
function widget_tag($title) {
    global $CACHE;
    $tag_cache = $CACHE->readCache('tags');
    ?>
    <div class="sidebox">
        <div class="side-box-title"> <span class="aside-icon tags_ico"></span> <?php echo $title; ?></div>
        <ul class="sidelist">
            <div class="sidelistpd">	<?php foreach ($tag_cache as $value): ?>
                    <span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
                        <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇日志"><?php echo $value['tagname']; ?></a></span>
    <?php endforeach; ?>
            </div>
        </ul>
    </div>
<?php } ?>
<?php

//widget：分类
function widget_sort($title) {
    return;
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort');
    ?>
    <div class="sidebox">
        <div class="side-box-title"> <span class="aside-icon tags_ico"></span> <?php echo $title; ?></div>
        <ul class="sidemenu">
            <?php foreach ($sort_cache as $value): ?>
                <li><a href="<?php echo Url::sort($value['sid']); ?>"><span class="sort-icon"></span>
                        <span class="sidemenu-item-extra sidemenu-item-number"><?php echo $value['lognum'] ?></span><?php echo $value['sortname']; ?></a>
                </li>
    <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php

//widget：最新碎语
function widget_twitter($title) {
    global $CACHE;
    $newtws_cache = $CACHE->readCache('newtw');
    $istwitter = Option::get('istwitter');
    ?>
    <div class="sidebox">
        <div class="side-box-title"><span class="aside-icon t_ico"></span><?php echo $title; ?></div>
        <ul class="sidelist">
            <?php foreach ($newtws_cache as $value): ?>
                <li><?php echo smartDate($value['date']); ?><p> <a href="<?php echo BLOG_URL . 't/'; ?>"><?php echo $value['t']; ?></a></p></li>
    <?php endforeach; ?>
    <?php if ($istwitter == 'y') : ?>
                <p><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
    <?php endif; ?>
        </ul>
    </div>
<?php } ?>
<?php

//widget：最新评论
function widget_newcomm($title) {
    global $CACHE;
    $com_cache = $CACHE->readCache('comment');
    ?>
    <div class="sidebox">
        <div class="side-box-title"><span class="aside-icon com_ico"></span><?php echo $title; ?></div>
        <ul class="sidelist">
            <?php
            foreach ($com_cache as $value):
                $url = Url::comment($value['gid'], $value['page'], $value['cid']);
                ?>
                <li id="comment"><?php echo $value['name']; ?>
                    <br /><a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
    <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php

//widget：最新日志
function widget_newlog($title) {
    global $CACHE;
    $newLogs_cache = $CACHE->readCache('newlog');
    ?>
    <div class="sidebox">
        <div class="side-box-title"><span class="aside-icon list-ico"></span><?php echo $title; ?></div>
        <ul class="sidelist">
    <?php foreach ($newLogs_cache as $value): ?>
                <li><a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></li>
    <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php

//widget：随机日志
function widget_random_log($title) {
    $index_randlognum = Option::get('index_randlognum');
    $Log_Model = new Log_Model();
    $randLogs = $Log_Model->getRandLog($index_randlognum);
    ?>
    <div class="sidebox">
        <div class="side-box-title"><span class="aside-icon list-ico"></span>随机日志</div>
        <ul class="sidelist">
    <?php foreach ($randLogs as $value): ?>
                <li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
    <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php

//widget：归档
function widget_archive($title) {
//    return;
    global $CACHE;
    $record_cache = $CACHE->readCache('record');
    ?>
    <div class="sidebox">
        <div class="side-box-title"> <span class="aside-icon archived_ico"></span> <?php echo $title; ?></div>
        <ul class="sidemenu">
    <?php foreach ($record_cache as $value): ?>
                <li><a href="<?php echo Url::record($value['date']); ?>"><span>发表了<?php echo $value['lognum']; ?>篇日志</span><?php echo $value['record']; ?></a></li>
    <?php endforeach; ?>
        </ul>
    </div>
            <?php } ?>
<?php

//widget：自定义组件
function widget_custom_text($title, $content) {
    ?>
    <div class="sidebox">
        <div class="side-box-title"> <span class="aside-icon custom_ico"></span> <?php echo $title; ?></div>
        <ul class="sidelist">
            <div class="sidelistpd">
    <?php echo $content; ?>
            </div>
        </ul>
    </div>
        <?php } ?>
        <?php

//widget：链接
        function widget_link($title) {
            return;
            global $CACHE;
            $link_cache = $CACHE->readCache('link');
            ?>
    <div class="sidebox">
        <div class="side-box-title"><span class="aside-icon link_ico"></span><?php echo $title; ?></div>
        <ul class="sidelist">
    <?php foreach ($link_cache as $value): ?>
                <li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
    <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<?php

//blog：置顶
function topflg($istop) {
    $topflg = $istop == 'y' ? "<img class=\"fl\" src=\"" . TEMPLATE_URL . "/img/top_ico.png\" title=\"置顶日志\" /> " : '';
    echo $topflg;
}
?>
<?php

//blog：编辑
function editflg($logid, $author) {
    $editflg = ROLE == 'admin' || $author == UID ? '<a  class="fr" href="' . BLOG_URL . 'admin/write_log.php?action=edit&gid=' . $logid . '">编辑</a>' : '';
    echo $editflg;
}
?>
<?php

//blog：分类
function blog_sort($blogid) {
    global $CACHE;
    $log_cache_sort = $CACHE->readCache('logsort');
    ?>
    <?php if (!empty($log_cache_sort[$blogid])): ?>
        <a class="fl" href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
    <?php endif; ?>
<?php } ?>
<?php

//blog：文件附件
function blog_att($blogid) {
    global $CACHE;
    $log_cache_atts = $CACHE->readCache('logatts');
    $att = '';
    if (!empty($log_cache_atts[$blogid])) {
        $att .= '';
        foreach ($log_cache_atts[$blogid] as $val) {
            $att .= '<div class="filedown"><a href="' . BLOG_URL . $val['url'] . '" target="_blank"><span>' . $val['filename'] . '&nbsp;|&nbsp;大小：' . $val['size'] . '</span></a></div> <div class="clear"></div>';
        }
    }
    echo $att;
}
?>
<?php

//blog：日志标签
function blog_tag($blogid) {
    global $CACHE;
    $log_cache_tags = $CACHE->readCache('logtags');
    if (!empty($log_cache_tags[$blogid])) {
        $tag = '<b>标签：</b>';
        foreach ($log_cache_tags[$blogid] as $value) {
            $tag .= "	<a href=\"" . Url::tag($value['tagurl']) . "\">" . '#' . $value['tagname'] . '</a>';
        }
        echo $tag;
    }
}
?>
<?php

//blog：日志作者
function blog_author($uid) {
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    $author = $user_cache[$uid]['name'];
    $mail = $user_cache[$uid]['mail'];
    $des = $user_cache[$uid]['des'];
    $title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
    echo '<a href="' . Url::author($uid) . "\" $title>$author</a>";
}
?>
<?php

//blog：相邻日志
function neighbor_log($neighborLog) {
    extract($neighborLog);
    ?>
    <?php if ($nextLog): ?>
        <a class="nextLog fr" href="<?php echo Url::log($nextLog['gid']) ?>">
            <b>下一篇：</b><?php echo $nextLog['title']; ?>
        </a>
    <?php endif; ?>
    <?php if ($nextLog && $prevLog): ?>
    <?php endif; ?>
    <?php if ($prevLog): ?><a class="prevLog fl" href="<?php echo Url::log($prevLog['gid']) ?>"><b>上一篇：</b><?php echo $prevLog['title']; ?></a>
    <?php endif; ?>
<?php } ?>
<?php

//blog：引用通告
function blog_trackback($tb, $tb_url, $allow_tb) {
    if ($allow_tb == 'y' && Option::get('istrackback') == 'y'):
        ?>
        <div id="trackback_address">
            <p>引用地址: <input type="text" style="width:350px" class="input" value="<?php echo $tb_url; ?>">
                <a name="tb"></a></p>
        </div>
    <?php endif; ?>
    <?php foreach ($tb as $key => $value): ?>
        <ul id="trackback">
            <li><a href="<?php echo $value['url']; ?>" target="_blank"><?php echo $value['title']; ?></a></li>
            <li>BLOG: <?php echo $value['blog_name']; ?></li><li><?php echo $value['date']; ?></li>
        </ul>
        <?php endforeach; ?>
<?php } ?>
<?php

//blog：博客评论列表
function blog_comments($comments) {
    extract($comments);
    if ($commentStacks): $commnum = count($comments);
        ?>
        <a name="comments"></a>
        <p class="comment-header"><b>评论(<?php echo $commnum; ?>)条</b></p>
    <?php endif; ?>
    <?php
    $isGravatar = Option::get('isgravatar');
    foreach ($commentStacks as $cid):
        $comment = $comments[$cid];
        $comment['poster'] = $comment['url'] ? '<a href="' . $comment['url'] . '" target="_blank">' . $comment['poster'] . '</a>' : $comment['poster'];
        ?>
        <div class="comment" id="comment-<?php echo $comment['cid']; ?>">
            <a name="<?php echo $comment['cid']; ?>"></a>
            <?php if ($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div><?php endif; ?>
            <span class="comment-name"><?php echo $comment['poster']; ?> </span><br /><span class="comment-time"><?php echo $comment['date']; ?></span>
            <div class="comment-info">
                <div class="comment-content"><?php echo $comment['content']; ?></div>
                <div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" style="color:#959594">回复</a></div>
            </div>
            <?php blog_comments_children($comments, $comment['children']); ?>
        </div>
    <?php endforeach; ?>
    <?php if ($commentPageUrl) : ?><div id="pagenavi"><?php echo $commentPageUrl; ?></div><?php endif; ?>
<?php } ?>
<?php

//blog：博客子评论列表
function blog_comments_children($comments, $children) {
    $isGravatar = Option::get('isgravatar');
    foreach ($children as $child):
        $comment = $comments[$child];
        $comment['poster'] = $comment['url'] ? '<a href="' . $comment['url'] . '" target="_blank">' . $comment['poster'] . '</a>' : $comment['poster'];
        ?>
        <div class="comment comment-children" id="comment-<?php echo $comment['cid']; ?>">
            <a name="<?php echo $comment['cid']; ?>"></a>
                    <?php if ($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div><?php endif; ?>
            <b style="color:#AEB468"><?php echo $comment['poster']; ?> </b><br /><span class="comment-time"><?php echo $comment['date']; ?></span>
            <div class="comment-info">
                <div class="comment-content"><?php echo $comment['content']; ?></div>
        <?php if ($comment['level'] < 4): ?><div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" style="color:#959594">回复</a></div><?php endif; ?>
            </div>
        <?php blog_comments_children($comments, $comment['children']); ?>
        </div>
    <?php endforeach; ?>
<?php } ?>
            <?php

//blog：发表评论表单
            function blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark) {
                if ($allow_remark == 'y'):
                    ?>
        <div id="comment-place">
            <p><b>对本文发表评论</b></p>
            <div class="comment-post" id="comment-post">
                <div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
                <p class="comment-header"><b></b><a name="respond"></a></p>
                <form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
                    <input type="hidden" name="gid" value="<?php echo $logid; ?>" />
        <?php if (ROLE == 'visitor'): ?>
                        <p>
                            <input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" style="" tabindex="1" placeholder="你的昵称"/>
                            <label for="author"><small>昵称（必填）</small></label>

                            <input type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2" placeholder="你的邮箱，填写后您会收到我的回复！"/>
                            <label for="email"><small>邮箱（选填）</small></label>

                            <input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3" placeholder="网址，填写后本人回访哦！"/>
                            <label for="url"><small>网址（选填）</small></label>
                        </p>
        <?php endif; ?>
                    <p><textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
                    <p><?php echo $verifyCode; ?> <input type="submit" id="comment_submit" value="提交评论" tabindex="6" /></p>
                    <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
                </form>
            </div>
        </div>
    <?php endif; ?>
<?php } ?>