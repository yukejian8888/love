<?php 
/*
* 碎语部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="postwrapper box wid700  ">
<div class="block article">
<div id="tw">
    <?php if(ROLE == 'admin' || ROLE == 'writer'): ?>
    <div class="top"><a href="<?php echo BLOG_URL . 'admin/twitter.php' ?>">写碎语</a></div>
    <?php endif; ?>
    <ul>
    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
    <li class="li">
    <div class="main_img"><img src="<?php echo $avatar; ?>" width="32px" height="32px" /></div>
    <p class="post1"><span class="author"><?php echo $author; ?></span><span class="time"><?php echo $val['date'];?> </span><br /><?php echo $val['t'].'<br/>'.$img;?></p>
    <div class="clear"></div>
    <div class="bttome">
        <p class="post"><a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">回复(<span id="rn_<?php echo $tid;?>"><?php echo $val['replynum'];?></span>)</a></p>
    </div>
	<div class="clear"></div>
   	<ul id="r_<?php echo $tid;?>" class="r"></ul>
    <?php if ($istreply == 'y'):?>
    <div class="huifu" id="rp_<?php echo $tid;?>">
	<textarea id="rtext_<?php echo $tid; ?>"></textarea>
    <div class="tbutton">
        <div class="tinfo" style="display:<?php if(ROLE == 'admin' || ROLE == 'writer'){echo 'none';}?>">
        昵称：<input type="text" id="rname_<?php echo $tid; ?>" value="" />
        <span style="display:<?php if($reply_code == 'n'){echo 'none';}?>">验证码：<input type="text" id="rcode_<?php echo $tid; ?>" value="" /><?php echo $rcode; ?></span>        
        </div>
        <input class="button_p" type="button" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid;?>);" value="回复" /> 
        <div class="msg"><span id="rmsg_<?php echo $tid; ?>" style="color:#FF0000"></span></div>
    </div>
    </div>
    <?php endif;?>
    </li>
    <?php endforeach;?>
    </ul>
</div><!--end #tw-->
</div><!--end .block article-->
	        <div style="padding-bottom:10px; overflow:hidden">
			<?php 
			$page_t =  next_page($twnum, Option::get('index_twnum'), $page, BLOG_URL.'t/?page=');
            echo $page_t;
			?>
            </div>
</div><!--end .postwrapper box wid700-->
<?php
 include View::getView('footer');
?>