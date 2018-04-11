<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>


<?php
function getGravatar_($email, $s = 40, $d = 'mm', $g = 'g') {
$hash = md5($email);
$avatar = "http://gravatar.duoshuo.com/avatar/$hash?s=$s&d=$d&r=$g";
return $avatar;
}

function get_author($uid){//获取用户/管理员信息
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	/*$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];*/
	return $user_cache[$uid];
}

function getavatar_admin(){//获取管理员头像
	$author = get_author(1);
	return getGravatar_($author['mail']);
}
?>
<?php
//获取文章标签
function get_tags($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	$tag = "";
	if (!empty($log_cache_tags[$blogid])){
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "<span><a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a></span>';
		}
		if($tag == "") $tag = "暂无标签";
		return $tag;
	}
}

?>
<?php
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul>
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }

		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>

		<li class="item <?php echo $current_tab;?>">
			
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
			<?php if($current_tab == "current"): ?>
			<div class="arrow" ></div>
			<?php endif;?>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

		</li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php else:?>
	暂无分类
	<?php endif;?>
<?php }?>
<?php
//置顶图标
function topflg($top, $sortop='n', $sortid=null){
   /* if(ishome()) {
       echo $top == 'y' ? "<img src=\"".TEMPLATE_URL."/images/top.png\" title=\"首页置顶文章\" /> " : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/sortop.png\" title=\"分类置顶文章\" /> " : '';
    }*/
	echo $top == 'y' ? "<span class='topflag'>[推荐]</span>" : "";
	echo $sortop == 'y' ? "<span class='topflag'>[推荐]</span>" : "";
}
?>
<?php
//判断是否是首页
function ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>
<?php 
//blog：自定义分页函数 
function my_page($count, $perlogs, $page, $url, $anchor = '') { 
 $pnums = @ceil($count / $perlogs); 
 $re = ''; 
 $urlHome = preg_replace("|[?&/][^./?&=]*page[=/-]|", "", $url); 
 if($page > 1) { 
  $i = $page - 1; 
  $re = " <a href='".$url.$i."'>上一页</a> " . $re; 
 } 
  $re .= "$page / ".(is_numeric($pnums) ? $pnums : '1');
 if($page < $pnums) { 
  $i = $page + 1; 
  $re .= " <a href='".$url.$i."'>下一页</a> "; 
 } 
 return $re; 
} 
?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<div class="tags">
	<?php foreach($tag_cache as $value): ?>
		<span>
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</div>
	</section>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="blogsort">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li>
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<?php if (!empty($value['children'])): ?>
		<ul>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li>
			<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
		</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	</li>
	<?php endforeach; ?>
	</ul>
	</section>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?><span><?php echo smartDate($value['date']); ?></span></li>
	<?php endforeach; ?>
	<div class="clear"></div>
    <?php if ($istwitter == 'y') :?>
	<a id="twitter_more" href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a>
	<?php endif;?>
	<div class="clear"></div>
	</ul>
	</section>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="newcomment">
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
	<li id="comment"><img class="avatar" src="<?php echo getGravatar_($value["mail"])?>"><span><?php echo $value['name']; ?>:</span><br/>
	<a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
	<div class="clear"></div>
	</ul>
	</section>
<?php }?>

<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="newlog">
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</section>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="hotlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</section>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</section>
<?php }?>

<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
	</section>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<?php echo $content; ?>
	</section>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	<section>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	<div class="clear"></div>
	</ul>
	</section>
<?php }?> 
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="comment-place">
	<div class="comment-post" id="comment-post">
		<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
		<div class="comment-header"><b>发表评论：</b></div>
		<form method="post" id="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == ROLE_VISITOR): ?>
			<div>
				<span><i>*</i> 昵称:</span>
				<input type="text" name="comname" id="comname" value="<?php echo $ckname; ?>" required >
			</div>
			<div>
				<span><i>*</i> 邮箱:</span>
				<input type="email" name="commail"  id="commail" value="<?php echo $ckmail; ?>" required >
			</div>
			<div>
				<span>网站:</span>
				<input type="text" name="comurl" id="comurl" value="<?php echo $ckurl; ?>"  >
			</div>
			<?php endif; ?>
			<textarea name="comment" id="comment_content" rows="5" required></textarea>
			<div class="comment_error"></div>
			<?php echo $verifyCode; ?> <input type="submit" id="comment_submit" value="发表评论" />
			<div class="clear"></div>
			<input type="hidden" name="pid" id="comment-pid" value="0" />
		</form>
	</div>
	</div>
	<?php endif; ?>
<?php }?>

<?php
//评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
	<a name="comments"></a>
	<span class="comment-header"><i class="fa fa-comments"></i>已<?php echo sizeof($commentStacks);?>有条评论：</span>
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment clearfix" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php //if($isGravatar == 'y'): ?><img class="avatar" src="<?php echo getGravatar_($comment['mail']); ?>" /><?php //endif; ?>
		<div class="comment-info">
			<span class="comment-poster"><?php echo $comment['poster']; ?> </span><span class="comment-time"><?php echo $comment['date']; ?></span>
			<div class="comment-content"><?php echo $comment['content']; ?></div>
			<div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</div>
	
	<?php endforeach; ?>
    <div id="pagenavi">
	    <?php echo $commentPageUrl;?>
    </div>
<?php }?>
<?php
//子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<div class="comment clearfix comment-children" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php //if($isGravatar == 'y'): ?><img class="avatar" src="<?php echo getGravatar_($comment['mail']); ?>" /><?php //endif; ?>
		<div class="comment-info">
			<span class="comment-poster"><?php echo $comment['poster']; ?> </span><span class="comment-time"><?php echo $comment['date']; ?></span>
			<div class="comment-content"><?php echo $comment['content']; ?></div>
			<div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</div>
	<?php endforeach; ?>
<?php }?>