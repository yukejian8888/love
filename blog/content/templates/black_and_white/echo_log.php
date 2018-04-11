<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content_header"></div>
    <div id="site_content">

<?php
 include View::getView('side');
?>	  
	<div id="content">
	<!-- insert the page content here -->
	 <h1><?php topflg($top); ?><?php echo $log_title; ?></h1>
	<p class="date">作者：<?php blog_author($author); ?> 发布于：<?php echo gmdate('Y-n-j G:i', $date); ?> 
	<?php blog_sort($logid); ?> <?php editflg($logid,$author); ?>
	</p>
	<?php echo $log_content; ?>
	<p class="tag"><?php blog_tag($logid); ?></p>
	<?php doAction('log_related', $logData); ?>
	<br/><?php neighbor_log($neighborLog); ?>
	<div id="contentleft">
	<?php blog_comments($comments); ?>
	</div>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	</div><!--end #contentleft-->
<?php
 include View::getView('footer');
?>	