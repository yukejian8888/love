<?php
/*
Template Name:lofter
Description:仿lofter模板
Version:1.0
Author:lofter
Author Url:http://aisheji.org
Sidebar Amount:0
ForEmlog:5.1.2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta content="<?php echo $site_key; ?>" name="Keywords">
<meta content="<?php echo $site_description; ?>" name="Description">
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>jquery.min.js" type="text/javascript"></script>
<?php doAction('index_head'); ?>
</head>
<body>
<div id="control" class="boprt">
	<ul>
		<li><form><a target="_top" class="boprt02" href="http://t.qq.com/todlog"><em>关注</em></a></form></li>
		<li><form><a target="_top" class="boprt11" href="<?php echo BLOG_URL; ?>admin/"><em>控制面板</em></a></form></li>
    </ul>
</div>
<div class="h95"></div>
<div class="box wid700"> 
    <div class="selfinfo">
        	<div class="logo">
                <a title="<?php echo $blogname; ?>" href="<?php echo BLOG_URL; ?>" style="cursor:pointer;"><img src="<?php echo TEMPLATE_URL; ?>images/logo.jpg" alt="<?php echo $blogname; ?>"/><i></i></a>
            </div>
        	<h1><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h1>
            <div class="text"><?php echo $bloginfo; ?></div>    
    </div>
    <div class="sch">
        <form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
            <input type="text" class="txt" onblur="if(this.value==''){this.value='搜索';}" onfocus="if(this.value=='搜索'){this.value='';}" name="keyword" value="搜索">
        </form>
    </div>
    <ul class="sidelist">
        <li><a title="RSS" class="list_1" href="<?php echo BLOG_URL; ?>rss.php"></a></li>
        <li><a title="碎语" class="list_2" href="<?php echo BLOG_URL; ?>t/"></a></li>
		<li><a title="私信" class="list_4" rel="nofollow" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=OEJJW1Z4XldAVVlRVBZbV1U"></a></li>
    </ul>
</div>
<!--侧边栏浮动导航-->
<div class="rightNav">
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>0</em>返回首页</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>1</em>书签切换</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>2</em>幻灯片</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>3</em>图片滚动-左</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>4</em>图片滚动-上</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>5</em>图片无缝滚动-左</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>6</em>图片无缝滚动-上</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>7</em>文字滚动-左</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>8</em>文字滚动-上</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>9</em>文字无缝滚动-左</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>10</em>文字无缝滚动-上</a>
	<a href="<?php echo TEMPLATE_URL; ?>" style="right: -110px;"><em>11</em>其它基础效果</a>
</div>
<script type="text/javascript">
	var btb=$(".rightNav");
	var tempS;
	$(".rightNav").hover(function(){
			var thisObj = $(this);
			tempS = setTimeout(function(){
			thisObj.find("a").each(function(i){
				var tA=$(this);
				setTimeout(function(){ tA.animate({right:"0"},300);},50*i);
			});
		},200);

	},function(){
		if(tempS){ clearTimeout(tempS); }
		$(this).find("a").each(function(i){
			var tA=$(this);
			setTimeout(function(){ tA.animate({right:"-110"},300,function(){
			});},50*i);
		});

	});
	var isIE6 = !!window.ActiveXObject&&!window.XMLHttpRequest;
	if( isIE6 ){ $(window).scroll(function(){ btb.css("top", $(document).scrollTop()+100) }); }
</script>