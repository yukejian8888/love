<?php 
/*
* 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="bloggerinfo">
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<p><b><?php echo $name; ?></b>
	<?php echo $user_cache[1]['des']; ?></p>
	</ul>
	</li>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<li class="widget widget_calendar">
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<div id="calendar_wrap">
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</div>
	</li>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="blogtags">
	<?php foreach($tag_cache as $value): ?>
		<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇日志"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="blogsort">
	<?php foreach($sort_cache as $value): ?>
	<li>
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<a href="<?php echo BLOG_URL; ?>rss.php?sort=<?php echo $value['sid']; ?>"><img src="<?php echo TEMPLATE_URL; ?>images/rss.png" alt="订阅该分类"/></a>
	</li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：最新碎语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?><p><?php echo smartDate($value['date']); ?></p></li>
	<?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
	<p><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
	<?php endif;?>
	</ul>
	</li>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<li id="recent-comments" class="widget">
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="newcomment">
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
	<li id="comment"><?php echo $value['name']; ?>说:
	<a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：最新日志
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="newlog">
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：热门日志
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="hotlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：随机日志
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="logserch">
	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="keyword" class="search" type="text" />
	</form>
	</ul>
	</li>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul>
	<?php echo $content; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
	<li>
	<h3 class="widget_title"><?php echo $title; ?></h3>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul>
	<?php 
	foreach($navi_cache as $value):
		if($value['url'] == 'admin' && (ROLE == 'admin' || ROLE == 'writer')):
			?>
			<li class="common"><a href="<?php echo BLOG_URL; ?>admin/write_log.php">写日志</a></li>
			<li class="common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li class="common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
		$value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
		$current_tab = (BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url']) ? 'current' : 'common';
		?>
		<li class="<?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a></li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//blog：置顶
function topflg($istop){
	$topflg = $istop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/import.gif\" title=\"置顶日志\" /> " : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>" title="查看 <?php echo $log_cache_sort[$blogid]['name']; ?> 中的全部文章"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：日志标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<li><a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a></li>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：日志作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<div class="previous_post"><a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></div>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
	<?php endif;?>
	<?php if($nextLog):?>
		 <div class="next_post"><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a></div>
	<?php endif;?>
<?php }?>
<?php
//blog：引用通告
function blog_trackback($tb, $tb_url, $allow_tb){
    if($allow_tb == 'y' && Option::get('istrackback') == 'y'):?>
	<div id="trackback_address">
	<p>引用地址: <input type="text" style="width:350px" class="input" value="<?php echo $tb_url; ?>">
	<a name="tb"></a></p>
	</div>
	<?php endif; ?>
	<?php foreach($tb as $key=>$value):?>
		<ul id="trackback">
		<li><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a></li>
		<li>BLOG: <?php echo $value['blog_name'];?></li><li><?php echo $value['date'];?></li>
		</ul>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
	extract($comments);
	if($commentStacks): ?>
	<div id="comments">
		<a name="comments"></a>
		<h2 id="comments-title"><span>{发表评论?}</span></h2>
		<ol class="commentlist" id="thecomments">
		<?php
			$isGravatar = Option::get('isgravatar');
			foreach($commentStacks as $cid):
			$comment = $comments[$cid];
			$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
		?>
			<li class="comment" id="comment-<?php echo $comment['cid']; ?>">
			<a name="<?php echo $comment['cid']; ?>"></a>
			<div id="comment-<?php echo $comment['cid']; ?>" class="by-vistor">
				<div class="comment-author vcard">
					<?php if($isGravatar == 'y'): ?><img class="avatar" src="<?php echo getGravatar($comment['mail']); ?>" alt="" height="40" width="40" /><?php endif; ?>
					<cite class="fn"><?php echo $comment['poster']; ?></cite>
					<span class="comment-meta commentmetadata"><?php echo $comment['date']; ?></span><!-- .comment-meta .commentmetadata -->
				</div><!-- .comment-author .vcard -->
				<div class="comment-content"><p><?php echo $comment['content']; ?></p></div>
				<div class="reply">
						<a class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" style="opacity: 1; ">回复</a>
				</div>
			</div><!-- #comment-##  -->
			<?php blog_comments_children($comments, $comment['children']); ?>
			</li>
		<?php endforeach; ?>
		</ol>
		<div class="navigation"><?php echo $commentPageUrl;?></div>
	</div>
	<?php endif; ?>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	if(count($children) > 0):?>
	<ul class="children">
	<?php
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
		<li class="comment" id="comment-<?php echo $comment['cid']; ?>">
			<a name="<?php echo $comment['cid']; ?>"></a>
			<div id="comment-49239" class="by-vistor">
			<div class="comment-author vcard">
				<?php if($isGravatar == 'y'): ?><img class="avatar" src="<?php echo getGravatar($comment['mail']); ?>" alt="" height="40" width="40" /><?php endif; ?>
				<cite class="fn"><?php echo $comment['poster']; ?></cite>
				<span class="comment-meta commentmetadata"><?php echo $comment['date']; ?></span><!-- .comment-meta .commentmetadata -->
			</div><!-- .comment-author .vcard -->	
			<div class="comment-content"><p><?php echo $comment['content']; ?></p></div>
			<?php if($comment['level'] < 4): ?>
			<div class="reply">
				<a class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" style="opacity: 1; ">回复</a>
			</div>
			<?php endif; ?>
			</div><!-- #comment-##  -->
			<?php blog_comments_children($comments, $comment['children']);?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="comment-place">
	<div class="comment-post" id="comment-post">
	<div id="respond">
		<h3 id="reply-title">发表评论<a name="respond"></a> <small class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></small></h3>
		<form action="<?php echo BLOG_URL; ?>index.php?action=addcom" method="post" id="commentform">
			<p class="comment-notes">电子邮件地址不会被公开。 必填项已用 <span class="required">*</span> 标注</p>
			<?php if(ROLE == 'visitor'): ?>
			<p class="comment-form-author"><label for="author">姓名</label> <span class="required">*</span><input id="author" name="comname" type="text" value="<?php echo $ckname; ?>" size="30" aria-required="true"></p>
			<p class="comment-form-email"><label for="email">电子邮件</label> <span class="required">*</span><input id="email" name="commail" type="text" value="<?php echo $ckmail; ?>" size="30" aria-required="true"></p>
			<p class="comment-form-url"><label for="url">站点</label><input id="url" name="comurl" type="text" value="<?php echo $ckurl; ?>" size="30"></p>
			<?php endif; ?>
			<p class="comment-form-comment"><label for="comment">评论</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>
			<p><?php echo $verifyCode; ?></p>
			<p class="form-submit">
				<input name="submit" type="submit" id="submit" value="发表评论">
				<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
				<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
			</p>
		</form>
	</div>
	</div>
	</div>
	<?php endif; ?>
<?php }?>