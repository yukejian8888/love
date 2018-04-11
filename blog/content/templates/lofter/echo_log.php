<?php 
/*
* 阅读日志页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="box wid700">
	<div class="block article">
		<div class="side">
			<div class="day"><a href="<?php echo Url::log($logid); ?>"><?php echo gmdate('j', $date); ?></a></div>
			<div class="month"><a href="<?php echo Url::log($logid); ?>"><?php echo gmdate('n', $date); ?></a></div>
		</div>
		<div class="main">
			<div class="content">
				<div class="text">
					<h2><?php topflg($top); ?><a href="<?php echo Url::log($logid); ?>"><?php echo $log_title; ?></a></h2>
					<p><?php echo $log_content; ?></p>
					<div class="tag"><?php blog_tag($logid); ?></div>
					<div class="sort"><?php blog_sort($logid); ?></div>
				</div>
			</div>                
		</div>
	</div>
    <div class="page">
		<?php neighbor_log($neighborLog); ?>
	</div>
	<div id="blog_commnets">	
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	</div>
</div>
<?php
 include View::getView('footer');
?>