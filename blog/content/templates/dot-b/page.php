<?php 
/*
* 自建页面模板
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
<div id="content">
	<div class="post" id="post-<?php echo $logid; ?>">
		<h2 class="post_title_h2"><?php echo $log_title; ?></h2>
		<div class="post_content">
			<?php echo $log_content; ?>
			<?php blog_comments($comments); ?>
			<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
		</div>
		<div style="clear:both;"></div>
	</div>
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>