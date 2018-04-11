<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
	<div id="main">
		<?php doAction('index_loglist_top'); ?>
		<?php foreach($logs as $value): ?>
		<div class="post_list" id="post_<?php echo $value['logid']; ?>">
			<h2><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
			<div class="info"><?php blog_author($value['author']); ?> | <?php blog_sort($value['logid']); ?> | <?php echo gmdate('Y-n-j', $value['date']); ?> | <?php editflg($value['logid'],$value['author']); ?>
			</div>
			<div class="excerpt"><?php echo subString(strip_tags($value['log_description']),0,200,"..."); ?><span class="more">[<a href="<?php echo $value['log_url']; ?>" title="详细阅读 <?php echo $value['log_title']; ?>" rel="bookmark">阅读全文</a>]</span>
			</div>
			<div class="meta">
				<span class="meat_span"><i class="iconfont">ė</i><?php echo $value['views']; ?> 次查看</span>
				<span class="meat_span"><i class="iconfont">6</i><a href="<?php echo $value['log_url']; ?>" title="《<?php echo $value['log_title']; ?>》上的评论"><?php echo $value['comnum']; ?>条评论</a></span>
				<span class="meat_span meat_max"><i class="iconfont">0</i>
				<?php blog_tag($value['logid']); ?>
				</span>
			</div>
		</div>
		<?php endforeach; ?>
	<div class="navigation">
		<div class="pagination">
			<?php echo $page_url;?>
		</div>
	</div>
	</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>