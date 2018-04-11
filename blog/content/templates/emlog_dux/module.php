﻿<?php 
/*
 * @Emlog大前端4.3
 * @authors 小草 (blog.yesfree.pw)
 * @date    2016-7-21
 * @version 4.3
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<?php
//widget：blogger
function widget_blogger($title){
 }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<div class="widget widget_calendar">
	<div id="calendar_wrap" class="calendar_wrap">
	<span class="icon"><i class="fa fa-calendar fa-fw"></i></span>
	<h3><?php echo $title; ?></h3>
    <div id="calendar" class="f_calendar">
    </div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</div></div>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<div class="widget widget_ui_tags"><span class="icon"><i class="fa fa-tags"></i></span><h3><?php echo $title; ?>云</h3><div class="items">
	<?php foreach($tag_cache as $value): ?>
	<a href="<?php echo Url::tag($value['tagurl']); ?>"><?php echo $value['tagname']; ?> (<?php echo $value['usenum']; ?>)</a>
	<?php endforeach; ?>
	</div>
	</div>
<?php }?>
<?php
//page-tags：标签云
function page_tags(){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<?php foreach($tag_cache as $value): ?>
	<a href="<?php echo Url::tag($value['tagurl']); ?>" target="_blank"><?php echo $value['tagname']; ?><em>(<?php echo $value['usenum']; ?>)</em></a>
	<?php endforeach; ?>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	global $arr_sortico1; 
	$sort_cache = $CACHE->readCache('sort'); 
	?>
	<div class="widget widget_ui_sort"><h3 class="widget-title"><i class="fa fa-sort"></i><?php echo $title; ?></h3><div class="items"> <ul id="blogsort"> 

	<?php
	foreach($sort_cache as $value):
		$sid=$value["sid"];
		if ($value['pid'] != 0) continue;
	?>
		<li> <a title="<?php echo $value['lognum'] ?> 篇文章" href="<?php echo Url::sort($value['sid']); ?>"><i class="<?php if(empty($arr_sortico1[$sid])){echo "fa fa-code";}else{echo $arr_sortico1[$sid];}?>"></i> <?php echo $value['sortname']; ?></a> </li> 
	<?php endforeach; ?>
	</ul> </div> </div>
<?php }?>
<?php
//widget：最新微语 
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div class="widget widget_ui_textads widget_twitter"><a class="style01"><strong>最新微语</strong>
	<?php //foreach($newtws_cache as $value): ?>
	<br><br><font size="2" color="#999">	
	<?php echo comment2emoji($newtws_cache[0]['t']); ?>
	</font><br><br>
	<font color="#999"><?php echo smartDate($newtws_cache[0]['date']); ?></font>
	<?php //endforeach; ?>
	</a>
	</div>
<?php }?>
<?php
function commtent_title($gid){
 $db = MySql::getInstance();
 $sql = "SELECT title FROM ".DB_PREFIX."blog WHERE hide='n' and gid in ($gid) ORDER BY `date` DESC LIMIT 0,1";
 $list = $db->query($sql);while($row = $db->fetch_array($list)){return $row['title'];}}?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	//取前6个评论
	$com_cache_slice = array_slice($com_cache, 0,6);
	//if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
<div class="widget widget_ui_comments"> <span class="icon"><i class="fa fa-pencil-square-o"></i></span><h3> 最新评论</h3> <ul> 
	<?php
	foreach($com_cache_slice as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	$imgaa=getqqxx($value['mail'],'');
	$title = commtent_title($value['gid']);
			?>
	<li><a href="<?php echo $url; ?>" title="<?php echo $title." 上的评论"; ?>"><img class="avatar avatar-50 photo avatar-default" height="50" width="50" src="<?php echo $imgaa; ?>" style="display: block;" /> <strong><?php echo $value['name']; ?></strong> <?php echo sydate($value['date'],true);?> 说<br /><?php echo comment2emoji($value['content']); ?></a></li>
	<?php endforeach; ?>
</ul> </div>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
$index_newlognum = Option::get('index_newlognum');?>
	<div class="widget widget_ui_posts"><span class="icon"><i class="fa fa-pencil-square-o"></i></span><h3><?php echo $title; ?></h3><ul>
<?php 
$db = MySql::getInstance();
$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by date DESC limit 0,$index_newlognum"); 

while($row = $db->fetch_array($sql)){
	if($module_thum==0){
		$imgsrc = GetThumFromContent($row['content']);
	}else{
		$imgsrc = get_thum($row['gid']);
	}
?>
	<li><a href="<?php echo Url::log($row['gid']);?>"><span class="thumbnail"><img class="thumb" src="<?php echo $imgsrc;?>" style="display: block;"></span><span class="text"><?php echo $row['title'];?></span><i class="fa fa-clock-o fa-fw"></i><span class="muted"><?php echo gmdate('Y-m-d', $row['date']);?></span></a></li>
	<?php }?>
</ul></div>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$db = MySql::getInstance();
	$hot_num = Option::get('index_hotlognum');
	?>
	<div class="widget widget_ui_comments"><span class="icon"><i class="fa fa-fire"></i></span><h3><?php echo $title; ?></h3><ul>
		<?php
	$time = time();
	$sql = "SELECT gid,title,date,views,comnum,content FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog' AND date > $time - 60*24*60*60 order by `views` DESC limit 0,$hot_num";
	$list = $db->query($sql);
	while($row = $db->fetch_array($list)){
		if($module_thum==0){
			$imgsrc = GetThumFromContent($row['content']);
		}else{
			$imgsrc = get_thum($row['gid']);
		}
	?> 	
	<li><a href="<?php echo Url::log($row['gid']);?>" title="<?php echo $title." 上的评论"; ?>"><img class="avatar avatar-50 photo avatar-default" height="50" width="50" src="<?php echo $imgsrc;?>" style="display: block;" /> <strong><?php echo $row['title'];?></strong><br /><?php echo $row['comnum'];?>则留言 / <?php echo $row['views'];?>次浏览</a></li>
	<?php }?>
</ul></div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$db = MySql::getInstance();
	$sj_num = Option::get('index_randlognum');
	?>
	<div class="widget widget_ui_posts widget_fix"><span class="icon"><i class="fa fa-pencil-square-o"></i></span><h3>猜你喜欢</h3><ul>
<?php
	$sql = "SELECT gid,title,date,views,content FROM ".DB_PREFIX."blog ORDER BY RAND() LIMIT $sj_num";
	$list = $db->query($sql);
	while($row = $db->fetch_array($list)){
		if($module_thum=="0"){
			$imgsrc = GetThumFromContent($row['content']);
		}else{
			$imgsrc = get_thum($row['gid']);
		}
	?> 	
	<li><a href="<?php echo Url::log($row['gid']);?>"><span class="thumbnail"><img  class="thumb" src="<?php echo $imgsrc;?>" style="display: block;"></span><span class="text"><?php echo $row['title'];?></span><i class="fa fa-clock-o fa-fw"></i><span class="muted"><?php echo gmdate('Y-m-d', $row['date']);?></span></a></li>
	<?php }?>
</ul></div>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div class="widget widget_ui_tags"><span class="icon"><i class="fa fa-pencil"></i></span><h3><?php echo $title; ?>云</h3><div class="items">
	<?php foreach($record_cache as $value): ?>
	<a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?> (<?php echo $value['lognum']; ?>)</a>
	<?php endforeach; ?>
	</div>
	</div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
<div class="widget widget_ui_textads"><a class="style01" href="#"><strong><?php echo $title; ?></strong><h2></h2><p><?php echo $content; ?></p></a></div>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	<div class="widget widget_links"><span class="icon"><i class="fa fa-link"></i></span> <h3> 友情链接</h3><ul>
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><i class="fa fa-link fa-fw"></i><?php echo $value['link']; ?></a></li>  
	<?php endforeach; ?></ul>
 </div>
<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	global $arr_navico1;
	$navi_cache = $CACHE->readCache('navi');
	foreach($navi_cache as $num=>$value):
		$id=$value["id"];
        if ($value['pid'] != 0) {
            continue;
        }
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<?php if(ROLE == ROLE_ADMIN):?>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>?setting">站点配置</a></li>
			<?php endif;?>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<li class="item <?php echo $current_tab;?>">
		
					<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>> <?php
					//print_r($arr_navico);
					//die();
					if(empty($arr_navico1[$id])) {echo $value['naviname'];}else {echo "<i class='".$arr_navico1[$id]."'></i> ".$value['naviname']."";} ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-menu">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>
            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-menu">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>
		</li>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "<img src=\"".TEMPLATE_URL."/images/top.png\" title=\"首页置顶文章\" /> " : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/sortop.png\" title=\"分类置顶文章\" /> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
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
    <a class="cat" href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：面包屑导航
function mianbao_sort($blogid,$log_title){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<div class="article_position">
	<ul class="breadcrumb" style="background-color:#FFFFFF;margin-bottom: 0px;padding: 8px 15px 8px 0;">
	<li>
		<a href="<?php echo BLOG_URL; ?>" title="<?php echo $blogname; ?>">主页</a> <span class="divider"></span>
	</li>			
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	<li><a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a> <span class="divider"></span></li>
	<?php else:?>
	<li>
		未分类<span class="divider"></span>
	</li>
	<?php endif;?>
	<li class="active"><?php echo $log_title; ?></li></ul></div>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
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
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<span class="article-nav-prev">上一篇<br><a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></span>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
	<?php endif;?>
	<?php if($nextLog):?>
		 <span class="article-nav-next">下一篇<br><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a></span>
	<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments,$comnum){
    extract($comments);
    if($commentStacks): ?>
	<?php endif; ?>
	<?php
	$isGravatar 	   = Option::get('isgravatar');
	global $CACHE;$user_cache = $CACHE->readCache('user');
	foreach($commentStacks as $cid):
	$ls_role='';
    $comment 		   = $comments[$cid];
	$isNofollow   	   = $comment['url'] && $comment['url'] != BLOG_URL ? 'rel="nofollow"':'';
	foreach($user_cache as $k=>$a){
		$role = $a["role"];
		$name = $a["name"];
		$mail = $a["mail"];
		if($comment['poster']==$name&&$comment['mail']==$mail){
			if($role=="admin"){
				//class="comment-poster c_admin" title="管理员"
				$ls_role='class="comment-poster c_admin" title="管理员"';
				$imgavatar = empty($user_cache[$k]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$k]['avatar'];
			}
			if($role=="writer"){
				$ls_role='class="comment-poster c_user" title="本站会员"';
				$imgavatar = empty($user_cache[$k]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$k]['avatar'];
			}
			break;
		}
	}
	if(empty($ls_role)){
		$imgavatar='';
		$ls_role='class="c_visiter" title="游客"';
	}
	
				
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank" '.$isNofollow.'>'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment dpt_line" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php
			
				echo '<div class="avatar"><img src="'.getqqxx($comment['mail'],$imgavatar).'" /></div>';
			
		?>   
		<div class="comment-info">
			<div class="comment-content" ><?php echo comment2emoji($comment['content']); ?></div>  
			<div class="comment-meata">
			<span <?php echo $ls_role;?>><?php echo $comment['poster']; ?> </span> <span class="comment-time"><?php if(strtotime($comment['date'])) { echo sydate($comment['date']);}else {echo str_replace(' ','',$comment['date']);} ?></span> <a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" class="comment-reply-btn">回复</a></div>
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</div>
	<?php endforeach; ?>
    <div class="page comment-page">
	    <?php echo $commentPageUrl;?>
    </div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	global $CACHE;$user_cache = $CACHE->readCache('user');
	foreach($children as $child):
	$comment 		   = $comments[$child];
	$isNofollow   	   = $comment['url'] && $comment['url'] != BLOG_URL ? 'rel="nofollow"':'';
	$ls_role='';
	foreach($user_cache as $k=>$a){
		$role = $a["role"];
		$name = $a["name"];
		$mail = $a["mail"];
		if($comment['poster']==$name&&$comment['mail']==$mail){
			if($role=="admin"){
				//class="comment-poster c_admin" title="管理员"
				$ls_role='class="comment-poster c_admin" title="管理员"';
				$imgavatar = empty($user_cache[$k]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$k]['avatar'];
			}
			if($role=="writer"){
				$ls_role='class="comment-poster c_user" title="本站会员"';
				$imgavatar = empty($user_cache[$k]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$k]['avatar'];
			}
			break;
		}
	}
	if(empty($ls_role)){
		$imgavatar='';
		$ls_role='class="c_visiter" title="游客"';
	}
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank" '.$isNofollow.'>'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment comment-children" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php
			
				echo '<div class="avatar"><img src="'.getqqxx($comment['mail'],$imgavatar).'" /></div>';
			
		?> 
		<div class="comment-info">
			<div class="comment-content" ><?php echo comment2emoji($comment['content']); ?></div>
			<div class="comment-meata">
				<span <?php echo $ls_role;?>><?php echo $comment['poster']; ?> </span> 
				<span class="comment-time"><?php if(strtotime($comment['date'])) { echo sydate($comment['date']);}else {echo str_replace(' ','',$comment['date']);} ?></span>
				<?php if($comment['level']<3){ echo '<a href="#comment-'.$comment['cid'].'" onclick="commentReply('.$comment['cid'].',this)" class="comment-reply-btn">回复</a>';}?>
			</div>
		</div>
		
	</div>
	<?php blog_comments_children($comments, $comment['children']);?>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div class="comment_post_wrap comment_post comment-open" id="comment-post">
		<h3 class="comment-header"><span class="cancel-reply" id="cancel-reply" style="display:none;"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></span>发表评论<a name="respond"></a></h3>
		<form method="post" name="commentform" id="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom">
			<input type="hidden" name="gid" id="comment-gid" value="<?php echo $logid; ?>" />
			<input type="hidden" name="pid" id="comment-pid" value="0"/>
			
			<div class="comment_user_info" style="
    margin-top: 15px;
"><div id="loging"></div>
			<?php if(ROLE == ROLE_VISITOR): ?>
				<div class="form-group">
					<div class="comment-form-author form-group has-feedback"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-qq"></i></div> <input class="form-control" placeholder="输入QQ号码可以快速填写" id="qqnum" name="qqnum" type="text" size="30" value="" onblur="huoquqq()"> </div> </div> 
				</div>
				<div class="form-group">
					<div class="comment-form-author form-group has-feedback"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-user"></i></div> <input class="form-control" placeholder="昵称" id="comname" name="comname" type="text" size="30" required="required" value="<?php echo $ckname; ?>"> <span class="form-control-feedback required" style="color:#F00">*</span> </div> </div> 
				</div>
				<div class="form-group">
					<div class="comment-form-email form-group has-feedback"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div> <input class="form-control" placeholder="邮箱" id="commail" name="commail" type="text" size="30" required="required" value="<?php echo $ckmail; ?>"> <span class="form-control-feedback required" style="color:#F00">*</span> </div> </div>
				</div>
				
			<?php endif; ?>
			<div class="form-group">
					<div class="comment-form-email form-group has-feedback"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-link"></i></div> <input class="form-control" placeholder="网址（选填）" id="comurl" name="comurl" type="text" size="30"  value="<?php echo $ckurl; ?>"> </div> </div>
				</div>
			
			
			
			</div>
			
			
			<div class="form-group form_textarea">
				<div class="comment_textare"><textarea name="comment" id="comment" placeholder="说点什么吧~" title="说点什么吧~"></textarea>
				
				</div>
				<div class="form-group submit_container">
					<div class="comment_tools">
						<?php 
							if(ROLE==ROLE_VISITOR) {
								echo '<span class="comment_avator"><img id="toux" src="'.TEMPLATE_URL.'images/noAvator.jpg" title="路人甲"><em class="commentUser_type none_user" title="游客">路人甲</em></span>';
							}else{
								global $userData;
								$imgavatar = empty($user_cache[$k]['avatar']) ? 
								BLOG_URL . 'admin/views/images/avatar.jpg' : 
								BLOG_URL . $user_cache[$k]['avatar'];
								echo '<span class="comment_avator"><img id="toux" src="'.getqqxx($userData["mail"],$imgavatar).'" title="'.$userData["nickname"].'"><em>'.$userData["nickname"].'</em></span>';
							}
						?>
						<span class="comment_face_btn"><i class="fa fa-smile-o"></i> 表情</span>
						<div class="comment_submit_wrap">
							<?php if(!empty($verifyCode)) {echo '<span class="comment_verfiy_container"><img src="'.BLOG_URL.'include/lib/checkcode.php" class="c_code" alt="看不清楚？点图切换" title="看不清楚？点图切换" ><input type="text" name="imgcode" class="comment_verfiy_code" placeholder="输入验证码" autocomplete="off" title="看不清楚？点图切换"></span>';}; ?>
							<span class="comment_info">Ctrl+Enter快速提交</span>
							<button type="submit" name="submit" id="comment_submit" class="sub_btn"><i class="fa fa-check-circle-o"></i> 提交评论</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div id="Face" class="faceContainer"><p><?php GetFaceImg();?></p></div>
	</div>
	<?php endif; ?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>
<?php
//blog-tool:获取Gravatar头像
function myGravatar($email,$role='' ,$s = 50, $d = 'wavatar', $g = 'g') {
	if(!empty($role)){
		return $role;
	}
$hash = md5($email);
$avatar = "https://secure.gravatar.com/avatar/$hash?s=$s&d=$d&r=$g";
return $avatar;
}?>
<?php //分页函数
function sheli_fy($count,$perlogs,$page,$url,$anchor=''){
$pnums = @ceil($count / $perlogs);
$page = @min($pnums,$page);
$prepg=$page-1;                 //shuyong.net上一页
$nextpg=($page==$pnums ? 0 : $page+1); //shuyong.net下一页
$urlHome = preg_replace("|[\?&/][^\./\?&=]*page[=/\-]|","",$url);
//开始分页导航内容
$re = "";
if($pnums<=1) return false;	//如果只有一页则跳出	
if($page!=1) $re .=" <a href=\"$urlHome$anchor\">首页</a> "; 
if($prepg) $re .=" <a href=\"$url$prepg$anchor\" >‹‹</a> ";
for ($i = $page-2;$i <= $page+2 && $i <= $pnums; $i++){
if ($i > 0){if ($i == $page){$re .= " <span class='page now-page'>$i</span> ";
}elseif($i == 1){$re .= " <a href=\"$urlHome$anchor\">$i</a> ";
}else{$re .= " <a href=\"$url$i$anchor\">$i</a> ";}
}}
if($nextpg) $re .=" <a href=\"$url$nextpg$anchor\" class='nextpages'>››</a> "; 
if($page!=$pnums) $re.=" <a href=\"$url$pnums$anchor\" title=\"尾页\">尾页</a>";
return $re;}
?>
<?php
function getrandomim(){
	$imgsrc = TEMPLATE_URL."images/random/".rand(1,24).".jpg";
	return $imgsrc;
}
?>
<?php
//获取图片
function get_thum($logid){
 $db = MySql::getInstance();

	$sqlimg = "SELECT * FROM ".DB_PREFIX."attachment WHERE blogid=".$logid." AND (`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') ORDER BY `aid` ASC LIMIT 0,1";
//    die($sql);
	$img = $db->query($sqlimg);
    while($roww = $db->fetch_array($img)){
	 $thum_url=BLOG_URL.substr($roww['filepath'],3,strlen($roww['filepath']));
    }
    if (empty($thum_url)) {
            $thum_url = getrandomim();
        }
  
return $thum_url;
}
?>
<?php
function GetThumFromContent($content){
	/*图片和摘要*/
	preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content, $img);
	if($imgsrc = !empty($img[1])){
		 $imgsrc = $img[1][0];}else{ 
			preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content ,$img);
			if($imgsrc = !empty($img[1])){ $imgsrc = $img[1][0];  }else{
				$imgsrc =getrandomim();	
			}
	}
	return $imgsrc;
}
?>
<?php
//格式化内容工具
function tool_purecontent($content, $strlen = null){
        $content = str_replace('继续阅读&gt;&gt;', '', $content);
		$content = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '|*********此处内容回复可见*********|', strip_tags($content));
        if ($strlen) {
            $content = subString($content, 0, $strlen);
        }
        return $content;
}
?>
<?php
function sydate($ptime,$isunix=false){
	if(!$isunix){
		$ptime = strtotime($ptime);
	}
	$etime = time() - $ptime;
	if($etime < 1){return '刚刚';}
	$interval = array(
		12 * 30 * 24 * 60 * 60 => '年前 ('.date('Y-m-d', $ptime).')',
		30 * 24 * 60 * 60      => '个月前 ('.date('Y-m-d', $ptime).')',
		7 * 24 * 60 * 60       => '周前 ('.date('Y-m-d', $ptime).')',
		24 * 60 * 60           => '天前',
		60 * 60                => '小时前',
		60                     => '分钟前',
		1                      => '秒前',
	);
foreach ($interval as $secs => $str) {
		$d = $etime / $secs;
		if ($d >= 1){
			$r = round($d);
			return $r . $str ;
		}
	}
}
?>
<?php
//widget：pages_links
function pages_links(){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
    foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank" rel="nofollow"><?php echo $value['link']; ?></a></li>
	<?php endforeach;}?>
<?php
/**
 * @des 显示评论列表与否的判定方法
 * @param $comnum 评论内容体
 * @return string 
 */
function isShowComment($comnum) {
	return !!$comnum;
} 
?>
<?php
function GetFaceImg(){
	$Face = array(array('url' => 'images/face/1.png',
						'title' =>  "微笑") ,
				  array('url' => 'images/face/5.png',
						'title' => "得意" ) ,
				  array('url' => 'images/face/6.png',
						'title' =>"愤怒") ,
				  array('url' => 'images/face/7.png',
						'title' => "调戏" ) ,
				  array('url' => 'images/face/9.png',
						'title' => "大哭" ) ,
				  array('url' => 'images/face/10.png',
						'title' =>"汗"  ) ,
				  array('url' => 'images/face/11.png',
						'title' => "鄙视" ) ,
				  array('url' => 'images/face/13.png',
						'title' =>  "真棒") ,
				  array('url' => 'images/face/14.png',
						'title' => "金钱" ) ,
				  array('url' => 'images/face/16.png',
						'title' => "瞧不起" ) ,
				  array('url' => 'images/face/19.png',
						'title' =>  "委屈") ,
				  array('url' => 'images/face/21.png',
						'title' =>"惊讶") ,
				  array('url' => 'images/face/24.png',
						'title' =>"可爱") ,
				  array('url' => 'images/face/25.png',
						'title' => "滑稽" ) ,
				  array('url' => 'images/face/26.png',
						'title' => "调皮") ,
				  array('url' => 'images/face/27.png',
						'title' => "大汉") ,
				  array('url' => 'images/face/28.png',
						'title' =>"可怜") ,
				  array('url' => 'images/face/29.png',
						'title' => "睡觉" ) ,
				  array('url' => 'images/face/30.png',
						'title' => "流泪" ) ,
				  array('url' => 'images/face/31.png',
						'title' => "气出泪" ) ,
				  array('url' => 'images/face/33.png',
						'title' =>"喷") ,
				  array('url' => 'images/face/39.png',
						'title' => "月亮")  ,
				  array('url' => 'images/face/40.png',
						'title' => "太阳")  ,
		 		  array('url' => 'images/face/43.png',
						'title' => "咖啡")  ,
				  array('url' => 'images/face/44.png',
						'title' => "蛋糕")  ,
				  array('url' => 'images/face/45.png',
						'title' => "音乐")  ,
				  array('url' => 'images/face/47.png',
						'title' => "yes")  ,
				  array('url' => 'images/face/48.png',
						'title' => "大拇指")  ,
				  array('url' => 'images/face/49.png',
						'title' => "鄙视你"),
				  array('url' => 'images/face/50.png',
						'title' => "程序猿"),
				  );
	foreach ($Face as $key => $value) {
			$faceimg=TEMPLATE_URL.$value["url"];
			$tooltip='['.$value["title"].']';
			echo "<a href='javascript:;' title='$tooltip' data-title='$tooltip'><img src='{$faceimg}'></a>";
	}
}
?>
<?php
/**
 * @des emoji 标签处理评论并输出
 * @param $str 评论数据
 * @return string
 */
function comment2emoji($str) {
		$data = array(array('url' => 'images/face/1.png',
						'title' =>  "微笑") ,
				  array('url' => 'images/face/5.png',
						'title' => "得意" ) ,
				  array('url' => 'images/face/6.png',
						'title' =>"愤怒") ,
				  array('url' => 'images/face/7.png',
						'title' => "调戏" ) ,
				  array('url' => 'images/face/9.png',
						'title' => "大哭" ) ,
				  array('url' => 'images/face/10.png',
						'title' =>"汗"  ) ,
				  array('url' => 'images/face/11.png',
						'title' => "鄙视" ) ,
				  array('url' => 'images/face/13.png',
						'title' =>  "真棒") ,
				  array('url' => 'images/face/14.png',
						'title' => "金钱" ) ,
				  array('url' => 'images/face/16.png',
						'title' => "瞧不起" ) ,
				  array('url' => 'images/face/19.png',
						'title' =>  "委屈") ,
				  array('url' => 'images/face/21.png',
						'title' =>"惊讶") ,
				  array('url' => 'images/face/24.png',
						'title' =>"可爱") ,
				  array('url' => 'images/face/25.png',
						'title' => "滑稽" ) ,
				  array('url' => 'images/face/26.png',
						'title' => "调皮") ,
				  array('url' => 'images/face/27.png',
						'title' => "大汉") ,
				  array('url' => 'images/face/28.png',
						'title' =>"可怜") ,
				  array('url' => 'images/face/29.png',
						'title' => "睡觉" ) ,
				  array('url' => 'images/face/30.png',
						'title' => "流泪" ) ,
				  array('url' => 'images/face/31.png',
						'title' => "气出泪" ) ,
				  array('url' => 'images/face/33.png',
						'title' =>"喷") ,
				  array('url' => 'images/face/39.png',
						'title' => "月亮")  ,
				  array('url' => 'images/face/40.png',
						'title' => "太阳")  ,
		 		  array('url' => 'images/face/43.png',
						'title' => "咖啡")  ,
				  array('url' => 'images/face/44.png',
						'title' => "蛋糕")  ,
				  array('url' => 'images/face/45.png',
						'title' => "音乐")  ,
				  array('url' => 'images/face/47.png',
						'title' => "yes")  ,
				  array('url' => 'images/face/48.png',
						'title' => "大拇指")  ,
				  array('url' => 'images/face/49.png',
						'title' => "鄙视你"),
			    	array('url' => 'images/face/50.png',
						'title' => "程序猿")
				  );
	foreach($data as $key=>$value) {
		$str = str_replace('['.$value['title'].']','<img class="comment_face" src="'.TEMPLATE_URL.$value['url'].'" title="'.$value['title'].'">',$str);
	}
	return $str;
}
?>
<?php 
function sort_name($arrsort){ 
global $arr_sortico1; 
foreach($arrsort as $key => $value){
	$sortid = $value;
	?>
	<div class="col-sm-4 0">
	 <div class="cmslist">
    	<div class="xyti">
            <h3><i class="<?php if(empty($arr_sortico1[$sortid])){echo "fa fa-list-ul";}else{echo $arr_sortico1[$sortid];}?>"></i><a href="<?php echo Url::sort($sortid);?>" class="mcolor"><?php echo getsotrnamefromsid($sortid);?></a></h3>
        </div>
        <ul><?php Get_newlogs($sortid,6);?></ul>
     </div>
	</div>
<?php }}?>
<?php
function Get_newlogs($sortid,$log_num) {
    $db = MySql::getInstance();
    $sql = 	"SELECT gid,title,date,content,views FROM ".DB_PREFIX."blog WHERE type='blog' and hide='n' and sortid='$sortid' ORDER BY `date` DESC LIMIT 0,$log_num";
    $list = $db->query($sql);
	$i=0;
    while($row = $db->fetch_array($list)){$i++; 
    	if($module_thum=="0"){
    		$imgsrc = GetThumFromContent($row['content']);
    	}else{
    		$imgsrc = get_thum($row['gid']);
    	}?>
<?php if($i==1):?>
	<li class="first"><a href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['title']; ?>" class="pic"><img src="<?php echo $imgsrc;?>" alt="<?php echo $row['title']; ?>" style="display: inline;"></a><a href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['title']; ?>" class="text"><?php echo $row['title']; ?></a><div class="des">
	<?php echo $logdes = tool_purecontent($row['content'], 120); ?></div></li>
<?php else:?>
<li><i class="fa fa-caret-right"></i><a href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></li>
<?php endif;}}?>
<?php
function islogin(){
if(ROLE == 'admin' || ROLE == 'writer'){
	return true;
	}
	return false;
}
?>