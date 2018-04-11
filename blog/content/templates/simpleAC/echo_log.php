<?php 
/*
* 阅读日志页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
	<div id="main">
		<div id="article">
			<h1><?php topflg($top); ?><?php echo $log_title; ?></a></h1>
			<div class="info">
				<span class="meat_span">作者: <?php blog_author($author); ?></span>
				<span class="meat_span">分类: <?php blog_sort($logid); ?></span>
				<span class="meat_span">发布时间: <?php echo gmdate('Y-n-j G:i l', $date); ?></span>
				<span class="meat_span"><i class="iconfont">ė</i><?php echo $views; ?> 次查看</span>
				<span class="meat_span"><i class="iconfont">6</i><?php echo $comnum; ?>条评论</span>
				<span class="meat_span"><?php editflg($logid,$author); ?></span>			
			</div>
			<div class="text"><?php echo $log_content; ?></div>
			<div class="meta"><i class="iconfont">0</i><?php blog_tag($logid); ?></div>
			<?php doAction('log_related', $logData); ?>
		</div>
		<div class="post_link">
			<?php neighbor_log($neighborLog); ?>
		</div>
		<div id="comments">  
		<h3><?php echo $comnum; ?>条评论</h3>	  
		<?php blog_comments($comments); ?>
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
		<?php blog_trackback($tb, $tb_url, $allow_tb); ?>
		</div>
	</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>