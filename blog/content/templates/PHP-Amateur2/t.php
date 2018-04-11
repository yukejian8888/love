<?php
/*
 * 碎语部分
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
                <div class="post-box-container">
                    <h2 class="con_title"><?php echo Option::get('twnavi'); ?></h2>
                    <div id="tw">
                        <?php if (ROLE == 'admin' || ROLE == 'writer'): ?>
                            <div class="top"><a href="<?php echo BLOG_URL . 'admin/twitter.php' ?>">发布碎语</a></div>
                        <?php endif; ?>
                        <ul>
                            <?php
                            foreach ($tws as $val):
                                $author = $user_cache[$val['author']]['name'];
                                $avatar = empty($user_cache[$val['author']]['avatar']) ? TEMPLATE_URL.'img/avatar.jpg' : BLOG_URL . $user_cache[$val['author']]['avatar'];
                                $tid = (int) $val['id'];
                                ?>
                                <li class="li">
                                    <div class="main_img"><img src="<?php echo $avatar; ?>" width="32px" height="32px" /></div>
                                    <div class="post1"><span><?php echo $author; ?></span><br /><div class="time"><?php echo $val['date']; ?> </div><br /><?php echo $val['t']; ?></div>
                                    <div class="clear"></div>
                                    <div class="bttome">
                                        <div class="post"><a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid; ?>','<?php echo $tid; ?>');">回复(<span id="rn_<?php echo $tid; ?>"><?php echo $val['replynum']; ?></span>)</a></div>
                                    </div>
                                    <div class="clear"></div>
                                    <ul id="r_<?php echo $tid; ?>" class="r"></ul>
                                    <div class="huifu" id="rp_<?php echo $tid; ?>">
                                        <textarea id="rtext_<?php echo $tid; ?>"></textarea>
                                        <div class="tbutton">
                                            <div class="tinfo" style="display:<?php
                            if (ROLE == 'admin' || ROLE == 'writer') {
                                echo 'none';
                            }
                                ?>">
                                                昵称：<input type="text" id="rname_<?php echo $tid; ?>" value="" />
                                                <span<?php
                                             if ($reply_code == 'n') {
                                                 echo ' style="display:none"';
                                             }
                                ?>>验证码：<input type="text" id="rcode_<?php echo $tid; ?>" value="" /><?php echo $rcode; ?></span>
                                            </div>
                                            <input class="button_p" type="button" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid; ?>);" value="回复" />
                                            <div class="msg"><span id="rmsg_<?php echo $tid; ?>" style="color:#FF0000"></span></div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="meta"> </div>
                </div>
            </div>
        </div>
        <div class="pageNo"> <?php echo $pageurl; ?> </div>
    </div>
    <!--leftSide end-->
    <div class="aside">
        <?php include View::getView('side'); ?>
    </div>
    <!-- rightSide end -->
</div>
<?php include View::getView('footer'); ?>