<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content_header"></div>
    <div id="site_content">
<?php
 include View::getView('side');
?>
	<div id="content">
	<h2><?php echo $log_title; ?></h2>
	<?php echo $log_content; ?>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div style="clear:both;"></div>
</div><!--end #contentleft-->
<?php
 include View::getView('footer');
?>