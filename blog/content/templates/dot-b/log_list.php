<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
<div id="content">
<?php doAction('index_loglist_top'); ?>
<?php foreach($logs as $value): ?>
	<div class="post" id="post-<?php echo $value['logid']; ?>">
		<h2 class="post_title_h2"><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
		<div class="post_info_top">
			<div class="post_info_date">发布于 <?php echo gmdate('Y 年 n 月 j 日', $value['date']); ?></div>
			<div class="post_info_author"> by <?php blog_author($value['author']); ?></div>
		</div>
		<div class="post_content">
			<?php echo ''.subString(strip_tags($value['log_description'],$img),0,200).''; ?>...
		</div>
	</div>
	<div class="post_info_bootom">
		<div class="post_meta">
		<ul><?php blog_tag($value['logid']); ?></ul>
		</div>
		<div class="post_readmore"><a href="<?php echo $value['log_url']; ?>#comments" title="《<?php echo $value['log_title']; ?>》上的评论">[ <?php echo $value['comnum']; ?> 条评论 ]</a></div>	
	</div>
<?php endforeach; ?>
	<div class="page_navi">
		<ul class="page-numbers">
			<li><?php echo $page_url;?></li>
		</ul>
	</div>
</div><!--end #content-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>