<?php 
/**
 * 日志模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<section class="container">
	<div class="content-wrap">
	<div class="content">
		<?php
if(blog_tool_ishome()&&$radio_zhiding=='2'):
?>
<article class="excerpt-see excerpt-see-index"><h2><a class="red" href="#"><?php echo $heightkey;?></a> <a href="<?php echo $top_titleurl;?>" title="<?php echo $top_title;?>"><?php echo $top_title;?></a></h2><p class="note"><?php echo $top_content;?></p></article><?php endif;?>
<?php doAction('index_loglist_top'); 
if (!empty($logs)){
		if(blog_tool_ishome() && empty($keyword)) {
			//echo '<div class="title"><h3>最新更新</h3></div>';
		}
		if(!empty($sort)) {
			//栏目页显示
			$des = $sort['description']?$sort['description']:'这家伙很懒，还没填写该栏目的介绍呢~';
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">'.$sortName.'</h2><p>'.$des.'</p></div>';
		}
		if(!empty($record)) {
			//日期记录
			$year    = substr($record,0,4);
			$month   = ltrim(substr($record,4,2),'0');
			$day     = substr($record,6,2);
			$archive = $day?$year.'年'.$month.'月'.ltrim($day,'0').'日':$year.'年'.$month.'月';
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">日志归档</h2><p>'.$archive.'发布的文章</p></div>';
		}
		if(!empty($author_name)) {
			//作者日志显示
			
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">作者</h2><p>本站作者<strong>'.$author_name.'</strong> 共计发布文章'.$lognum.'篇</p></div>';
		}
		if(!empty($keyword)) {
			//搜索
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">站内搜索</h2><p>本次搜索帮您找到有关 <strong>'.$keyword.'</strong> 的结果'.$lognum.'条</p></div>';
		}
		if(!empty($tag)) {
			//关键词
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">标签关键词</h2><p>关于 <strong>'.$tag.'</strong> 的文章共有'.$lognum.'条</p></div>';
		}
}

foreach($logs as $key=>$value): 
	$picnum = pic($value['content']);
		if($module_thum=="0"){
			$imgsrc = GetThumFromContent($value['content']);
		}else{
			$imgsrc = get_thum($value['logid']);
		}
	$keys = $key+1;
    $ishowimg = $picnum!=0;
	
?>
	<article class="excerpt <?php echo "excerpt-{$keys}";?>">
	<?php 
		echo '<p class="focus"><a class="thumbnail" href="'.$value['log_url'].'">';
 		echo "<span class=\"item\"><span class=\"thumb-span\"><img src='$imgsrc' class=\"thumb\" ></span></span>";
        echo "</a></p>";
	 ?>
	<header><?php blog_sort($value['logid']); ?> <h2><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a></h2></header><p class="meta"><time><i class="fa fa-clock-o"></i><?php echo gmdate('Y-n-j', $value['date']); ?></time><span class="pv"><i class="fa fa-eye"></i>阅读(<?php echo $value['views']; ?>)</span><span class="pc"><i class="fa fa-comments-o"></i>评论(<span id="sourceId::6312" class="cy_cmt_count"><?php echo $value['comnum']; ?></span>)</span></p>
	
	<p class="note"><?php echo $logdes = tool_purecontent($value['content'], 180); ?></p></article>
<?php 
endforeach;
?>

<div class="pagenavi"><ul>
<?php echo sheli_fy($lognum,$index_lognum,$page,$pageurl);?></ul>
</div>

</div></div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>