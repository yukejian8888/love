<?php 
/*
* 阅读日志页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
<div id="content">
	<div class="post" id="post-<?php echo $logid; ?>">
		<h2 class="post_title_h2"><?php topflg($top); ?><?php echo $log_title; ?></h2>
		<div class="post_info_top">
			<div class="post_info_date"> 发布于 <?php echo gmdate('Y 年 n 月 j 日', $date); ?> </div>
				<div class="post_info_author"> by <?php blog_author($author); ?></div>
				<div class="post_info_cat"> 归档于 <?php blog_sort($logid); ?></div>
		</div>
			<div class="post_content">
			<?php echo $log_content; ?>
			<div style="background:#FDFDFD;border: 5px solid #EEEEEE;padding: 5px;">
				<span>»版权所有© <?php blog_author($author); ?> → 《<a title="<?php echo $log_title; ?>" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"><?php echo $log_title; ?></a>》；<br>
				»本文网址：<a title="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"><?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?></a> ；<br>
				»除特别标注,本博客所有文章均为原创. 互联分享,尊重版权,转载请以链接形式标明本文地址。</span> 
			</div>
			</div>
	</div>
	<div class="post_info_bootom">
		<div class="post_meta"><ul><?php blog_tag($logid); ?></ul></div>
		<div class="post_readmore"><a href="<?php echo $value['log_url']; ?>#comments" title="《<?php echo $log_title; ?>》上的评论" style="opacity: 1; ">[快速评论]</a></div>
	</div>
	<div class="post-nav"><?php neighbor_log($neighborLog); ?></div>
	<?php blog_trackback($tb, $tb_url, $allow_tb); ?>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div style="clear:both;"></div>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>