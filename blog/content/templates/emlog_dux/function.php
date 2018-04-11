<?php
/**
 * @version  4.5
 * @author   小草
 * @description     emlog大前端自用函数
 * @date     2016.9.1
 */

require_once View::getView('config');
$GLOBALS['mm_cms_pci'] = $m_cms_pci;
$GLOBALS['mm_cms_page'] = $m_cms_page;
$GLOBALS['m_gfs_tuijian'] = $m_gfs_tuijian;
$GLOBALS['m_gfs_div'] = $m_gfs_div;
?>
<?php
/*
 * 文章回复可见
 *
 */
 function reply_view($content,$logid){
	 if(!strstr($content,"hide")){
		 return $content;
	 }
	 if(ROLE == ROLE_ADMIN){
		 $content = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '<div class="hideConBox">\1</div>', $content);
		 return $content;
	 }
   if(ROLE != ROLE_VISITOR){
	   //是会员的时候回复可见
	   global $userData;
	   $user_mail = $userData['email'];
	   //$logid = $logData['logid'];
	   $DB = MySql::getInstance();
	   $sql = 	"SELECT * FROM ".DB_PREFIX."comment WHERE gid='$logid' and mail='$user_mail'";
	   $res = $DB->query($sql);
	   $num = $DB->num_rows($res);
	   if($num>0){
		   //已经回复过了
		   $share_view = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '<div class="hideConBox">\1</div>', $content);
	   }else{
		   //未回复
		   $share_view = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '<div class="hideConBox">此处内容已隐藏，注册会员<a href="#comment-post">评论</a>即可查看</div>', $content);
	   }
	   
	   return $share_view;
   }else{
	   //是游客的时候回复可见
	   $share_view = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '<div class="hideConBox">此处内容已隐藏，注册会员<a href="#comment-post">评论</a>即可查看</div>', $content);
	   return $share_view;
   }
 }
?>
<?php
function displayRecord1(){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	$output = '';
	foreach($record_cache as $value){
		$output .= '<div class="page_archive_item"><h2>'.$value['record'].'</h2>'.displayRecordItem1($value['date']).'</div>';
	}
	//$output = '<div class="page_archive_item">'.$output.'</div>';
	return $output;
}
function displayRecordItem1($record){
	if (preg_match("/^([\d]{4})([\d]{2})$/", $record, $match)) {
		$days = getMonthDayNum($match[2], $match[1]);
		$record_stime = emStrtotime($record . '01');
		$record_etime = $record_stime + 3600 * 24 * $days;
	} else {
		$record_stime = emStrtotime($record);
		$record_etime = $record_stime + 3600 * 24;
	}
	$sql = "and date>=$record_stime and date<$record_etime order by top desc ,date desc";
	$result = archiver_db1($sql);
	return $result;
}
function archiver_db1($condition = ''){
	$DB = MySql::getInstance();
	$sql = "SELECT gid, title, date, views FROM " . DB_PREFIX . "blog WHERE type='blog' and hide='n' $condition";
	$result = $DB->query($sql);
	$output = '';
	while ($row = $DB->fetch_array($result)) {
		$log_url = Url::log($row['gid']);
		//$output .= '<li><a href="'.$log_url.'"><span>'.date('d日',$row['date']).'</span><div class="atitle">'.$row['title'].'</div></a></li>';
		$output .= '<li><time>'.date('d日',$row['date']).'</time><a href="'.$log_url.'" target="_blank">'.$row['title'].'</a></li>';
	}
	$output = empty($output) ? '<li>暂无文章</li>' : $output;
	$output = '<ul class="page_archive_list">'.$output.'</ul>';
	return $output;
}
?>
<?php //获取QQ信息
function getqqtx($qq){
	$url="https://q.qlogo.cn/headimg_dl?bs=qq&amp;dst_uin=$qq&amp;src_uin=qq.feixue.me&amp;fid=blog&amp;spec=100";
	return $url;}
//file_get_contents抓取https地址内容
function getCurl($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$result = curl_exec($ch);
curl_close ($ch);
return $result;}

if(isset($_POST['qq'])){
	if(empty($_POST['qq'])){
		echo "@@({comname:'QQ账号错误',commail:'QQ账号错误',comurl:'QQ账号错误',toux:'https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=34109680&src_uin=qq.feixue.me&fid=blog&spec=100'})@@";
		return ;
	}
	$spurl = "http://r.pengyou.com/fcg-bin/cgi_get_portrait.fcg?uins={$_POST['qq']}";
	$data = getCurl($spurl);
	$nc=explode('"',$data);
	$s=$nc[5];
	$bm=mb_convert_encoding($s,'UTF-8','UTF-8,GBK,GB2312,BIG5');
	if(empty($bm)){echo "@@({comname:'QQ账号错误',commail:'QQ账号错误',comurl:'QQ账号错误',toux:'https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=10001&src_uin=qq.feixue.me&fid=blog&spec=100'})@@";}
	else{echo "@@({comname:'{$bm}',commail:'{$_POST['qq']}@qq.com',comurl:'http://user.qzone.qq.com/{$_POST['qq']}',toux:'https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin={$_POST['qq']}&src_uin=qq.feixue.me&fid=blog&spec=100'})@@";}
	
	}
function getqqxx($qq,$role=''){
	if(!empty($role)){
		return $role;
	}
	$ssud=explode("@",$qq,2);
	if($ssud[1]=='qq.com'){
	return getqqtx($ssud[0]);
	}else{	
	return MyGravatar($qq,$role);	
}}
?>
<?php 
function sort_name2($sortid){
$db = MySql::getInstance(); 
global $arr_sortico1; 
global $CACHE; $sort_cache = $CACHE->readCache('sort');
$sort_a = $db->query ("SELECT * FROM " . DB_PREFIX . "sort where pid=0 ORDER BY sid ASC, taxis asc");while ($row = $db->fetch_array($sort_a)){
foreach(array($row['sid']) as $key => $i){
	?>
<div class="col-sm-6 0">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="<?php if(empty($arr_sortico1[$i])){echo "fa fa-list-ul";}else{echo $arr_sortico1[$i];}?>"></i> <?php echo $sort_cache[$i]['sortname'];?><span class="more pull-right"><a target="_blank" href="<?php echo Url::sort($i);?>">更多</a></span></h3></div><div class="panel-body index_smc">
<ul><?php Get_newlog2($i,10);?>
</ul></div></div></div>
<?php }}}?>
<?php
function Get_newlog2($sortid,$log_num) {
    $db = MySql::getInstance();
    $sql = 	"SELECT gid,title,date,content,views FROM ".DB_PREFIX."blog WHERE type='blog' and hide='n' and sortid='$sortid' ORDER BY `date` DESC LIMIT 0,$log_num";
    $list = $db->query($sql);
    while($row = $db->fetch_array($list)){ 
	?>
<li><a href="<?php echo Url::log($row['gid']); ?>"><time><?php echo date("Y-m-d",$row['date']); ?></time><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<?php echo $row['title']; ?></a></li><?php }}?>
<?php 
//获取文章图片数量
function pic($content){
    if(preg_match_all("/<img.*src=[\"'](.*)[\"']/Ui", $content, $img) && !empty($img[1])){
        $imgNum = count($img[1]);
    }else{
        $imgNum = "0";
    }
    return $imgNum;
}
?>
<?php
/**
 * @version  1.0
 * @author   小草
 * @description     杂志主题相关函数
 */
 function zazhi_top(){
 	?>
 		</ul></div></div></section><?php }?>
<?php
 /**
  * @version  1.0
  * @author   小草
  * @description     2016.7.1
  */
  
  //文章分享
function get_share(){
    $shares = array(
        'qzone',
        'tsina',
        'weixin',
        'tqq',
        'sqq',
        'copy'
    );

    $html = '';
    foreach ($shares as $value) {
        $html .= '<a class="bds_'.$value.'" data-cmd="'.$value.'"></a>';
    }

    return '分享到：'.$html.'<a class="bds_more" data-cmd="more">更多</a>';
}
  ?>
<?php
  /**
   * @version  1.0
   * @author   小草
   * @description     2016.7.1
   * 文章详情页下相关文章
   */
   	function related_logs($logData = array())
   	{
   	    $related_log_type = 'sort';//相关日志类型，sort为分类，tag为日志；
   	    $related_log_sort = 'rand';//排列方式，views_desc 为点击数（降序）comnum_desc 为评论数（降序） rand 为随机 views_asc 为点击数（升序）comnum_asc 为评论数（升序）
   	    $related_log_num = '6'; //显示文章数，排版需要，只能为10
   	    $related_inrss = 'y'; //是否显示在rss订阅中，y为是，其它值为否
   	    
   	    global $value;
   	    $DB = MySql::getInstance();
   	    $CACHE = Cache::getInstance();
   	    extract($logData);
   	    if($value)
   	    {
   	        $logid = $value['id'];
   	        $sortid = $value['sortid'];
   	        global $abstract;
   	    }
   	    $sql = "SELECT gid,title FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog'";
   	    if($related_log_type == 'tag')
   	    {
   	        $log_cache_tags = $CACHE->readCache('logtags');
   	        $Tag_Model = new Tag_Model();
   	        $related_log_id_str = '0';
   	        foreach($log_cache_tags[$logid] as $key => $val)
   	        {
   	            $related_log_id_str .= ','.$Tag_Model->getTagByName($val['tagname']);
   	        }
   	        $sql .= " AND gid!=$logid AND gid IN ($related_log_id_str)";
   	    }else{
   	        $sql .= " AND gid!=$logid AND sortid=$sortid";
   	    }
   	    switch ($related_log_sort)
   	    {
   	        case 'views_desc':
   	        {
   	            $sql .= " ORDER BY views DESC";
   	            break;
   	        }
   	        case 'views_asc':
   			{
   	            $sql .= " ORDER BY views ASC";
   	            break;
   	        }
   	        case 'comnum_desc':
   	        {
   	            $sql .= " ORDER BY comnum DESC";
   	            break;
   	        }
   	        case 'comnum_asc':
   	        {
   	            $sql .= " ORDER BY comnum ASC";
   	            break;
   	        }
   	        case 'rand':
   	        {
   	            $sql .= " ORDER BY rand()";
   	            break;
   	        }
   	    }
   	    $sql .= " LIMIT 0,$related_log_num";
   	    $related_logs = array();
   	    $query = $DB->query($sql);
   	    while($row = $DB->fetch_array($query))
   	    {
   	        $row['gid'] = intval($row['gid']);
   	        $row['title'] = htmlspecialchars($row['title']);
   	        $related_logs[] = $row;
   	    }
   	    $out = '';
   	    if(!empty($related_logs))
   	    {
   	    	$out.='<div class="title"><h3>相关推荐</h3></div>
	<div class="relates">
	<ul>';
   	        foreach($related_logs as $val)
   	        {
   	            $out .= "<li><a href=\"".Url::log($val['gid'])."\">{$val['title']}</a></li>";
   	        }
   	        $out.='</ul></div>';
   	    }
   	    if(!empty($value['content']))
   	    {
   	        if($related_inrss == 'y')
   	        {
   	            $abstract .= $out;
   	        }
   	    }else{
   	        echo $out;
   	    }
   	}	 
   ?>
<?php // sotr 分类文章ID
   		 // num 文章数量
   		 //返回一个数组接收
function sheli_tw($sort, $num){
	$db = MySql::getInstance();
	$sql = "SELECT gid,title,date,content,sortid,views,comnum FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,$num";
	$go = $db->query($sql);
	$array_return = array();
	while($row = $db->fetch_array($go)){
		$row["url"] = Url::log($row['gid']);
		$row["date"] = sydate($row["date"],true);
		$array_return[] = $row;
	}
	return $array_return;
}
?>
<?php
/**
 * @version  1.0
 * @author   小草
 * @description     获取分类标题from sotrid(sid)
 */
 function getsotrnamefromsid($sid){
 	global $CACHE;
	$sort_cache = $CACHE->readCache('sort');
	foreach ($sort_cache as $key => $value) {
		# code...
		if($value["sid"]==$sid){
			return $value["sortname"];
			break;
		}
	}
	return "未分类";
 }
 
 ?>
<?php
/**
 * @version  1.0
 * @author   小草
 * @description     高富帅模式的页面
 */
 function CommonPageFromGFS(){
 	$mm_cms_pci = $GLOBALS['mm_cms_pci'];
	$mm_cms_page = $GLOBALS['mm_cms_page'];
    $mm_gfs_tuijian = $GLOBALS['m_gfs_tuijian'];
    $mm_gfs_div = $GLOBALS['m_gfs_div'];?>
 	<section class="focusbox-wrapper container"><div class="focusbox"><div class="focusmo"><ul><?php
$index_newlognum = 5;
$db = MySql::getInstance();
if($mm_cms_pci==1){
	//自定义
	$sql = $db->query ("select * from ".DB_PREFIX."blog where gid in ({$mm_cms_page}) order by find_in_set(gid, '{$mm_cms_page}')");
	
}else{
	//随机文章
	$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by RAND() limit 0,$index_newlognum"); 
}

$i=0;
while($row = $db->fetch_array($sql)){$i++;
	$imgsrc = GetThumFromContent($row['content']);
	?>
	<li <?php if($i==1){echo 'class="large"';}?>><span><a href="<?php echo Url::log($row['gid']);?>"> <img src="<?php echo $imgsrc;?>" alt="" class="thumb"/><span><h4><?php echo $row['title'];?></h4></span></a></span></li> 
	<?php }?></ul></div> <div class="most-comment-posts"><h3 class="widget_titx"><strong>我的私房菜</strong></h3><ul><?php
	$db = MySql::getInstance();
	$hot_num = 9;
    if($mm_gfs_tuijian==2){
	$sql = "SELECT gid,title,date,views,content FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND date > $time - 30*24*60*60 AND top='n' AND sortid=sid order by `views` DESC limit $hot_num";}else{
    $sql = "select * from ".DB_PREFIX."blog where gid in ({$mm_gfs_div}) order by find_in_set(gid, '{$mm_gfs_div}')";    
    }
	$list = $db->query($sql);
	$i=0;
	while($row = $db->fetch_array($list)){
		$i++;
	?> 	
	<li class="item-<?php echo $i;?>"><span class="label label-<?php echo $i;?>"><?php echo $i;?></span><span id="date">[<?php echo gmdate('m-d', $row['date']);?>]</span><a href="<?php echo Url::log($row['gid']);?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a></li>
	<?php }?></ul></div></div></section>
 <?php }
 ?>
<?php
//widget：最新文章
function zazhi_newlog($mothed="newlog"){
$index_newlognum = 9;//显示文章数目
$db = MySql::getInstance();
if($mothed=="newlog"){
	$sqlex = "SELECT title,gid,date FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog' AND top='n' order by date DESC limit 0,$index_newlognum";
}elseif($mothed=="hotlog"){
	$sqlex = "SELECT gid,title,date FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND date > $time - 7*24*60*60 AND top='n' AND sortid=sid order by `views` DESC limit $index_newlognum";
}elseif($mothed=="randlog"){
	$sqlex = "SELECT gid,title,date FROM ".DB_PREFIX."blog where hide='n' and type='blog' ORDER BY RAND() LIMIT $index_newlognum";
}
$sql = $db->query ($sqlex); 
$page_arr = array();
while($row = $db->fetch_array($sql)){
	$row["url"] = Url::log($row['gid']);
	$row["date"] = gmdate('m-d', $row['date']);
	$page_arr[] = $row;
}
return $page_arr;
}
?>
