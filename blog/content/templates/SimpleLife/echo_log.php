<?php 
/**
 * 阅读文章页面
 * Template Name:Simple Life
 * Description:仿LNMP官网简单风格
 * Author:叶雨梧桐
 * Author Url:http://blog.gt520.com
 * Sidebar Amount:1
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
	<h2><?php topflg($top); ?><?php echo $log_title; ?></h2>
	<p class="date">作者：<?php blog_author($author); ?> 发布于：<?php echo gmdate('Y-n-j G:i l', $date); ?> 
	<?php blog_sort($logid); ?>  &nbsp; 阅读：<?php echo $views; ?>次 &nbsp; 评论：<a href="<?php echo $value['log_url']; ?>#comments"><?php echo $comnum; ?>条</a> &nbsp;<?php editflg($logid,$author); ?>
	</p>
	<?php echo $log_content; ?>
	<p><br/>本文固定链接: <a title="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"><?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?></a></p>
	<!--固定连接以下-->

<div class="articles">
<div class="author_pic">
					<a href="#" title="<?php echo $name; ?>"><img src=" http://www.gravatar.com/avatar/<?php global $CACHE;
	$user_cache = $CACHE->readCache('user'); echo md5($user_cache[$author]['mail']);  ?>" width="49px" height="48px" alt="blogger" /></a>
				</div>

<div class="author_text">
			<span class="spostinfo">
				该日志由 <?php blog_author($author); ?> 于<?php echo gmdate('Y-n-j G:i l', $date); ?>发表在 <?php blog_sort($logid); ?> 下。<br/>
				版权所有：《<a href="<?php echo BLOG_URL; ?>" title="<?php echo $blogname; ?>"><?php echo $blogname; ?></a>》 → 《<a title="<?php echo $log_title; ?>" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"><?php echo $log_title; ?></a>》；<br>
				除特别标注,本博客所有文章均为原创. 互联分享,尊重版权,转载请以链接形式标明本文地址；<br/>
				本文<?php blog_tag($logid); ?>
			</span>
				</div>
</div>
<!--以上版权信息-->

	
	<?php blog_trackback($tb, $tb_url, $allow_tb); ?>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div style="clear:both;"></div>
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>