<?php
/*
Template Name:芬
Description:尼玛制作，简洁优雅
Version:1.2
Author:吴尼玛
Author Url:http://nimaboke.com
Sidebar Amount:0
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="themename" content="126001"/>
<meta charset="utf-8"/>
<title><?php echo $site_title; ?></title>
<meta name="Keywords" content="<?php echo $site_key; ?>"/>
<meta name="Description" content="<?php echo $site_description; ?>"/>
<meta name="color:背景" content="#DBD9D4"/>
<meta name="image:背景" content="" /> 
<meta name="if:固定背景" content="1"/>
<meta name="group1:" content="正文字号12px#正文字号12px|正文字号14px|正文字号16px"/>
<link type="text/css" rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>main.css"/>
<style>
/* 
 * 自定义主题
 */
body{background-color:#DBD9D4;}


body{background-attachment:fixed;}


/* 正文字号12px 默认 */
 
 
</style>
<!--[if gte IE 8]>
<style>
/* 以下代码只对有环绕需求的内容使用。副作用：导致ul和ol的每一个li只有一行 */
.m-post-leftimg .text ul,
.m-post-leftimg .text ol,
.m-detail-leftimg .text ul,
.m-detail-leftimg .text ol{padding-left:0;}
.m-post-leftimg .text ul li,
.m-detail-leftimg .text ul li{list-style:disc inside none;}
.m-post-leftimg .text ol li,
.m-detail-leftimg .text ol li{list-style:decimal inside none;}
.m-post-leftimg .text ul li p,
.m-post-leftimg .text ol li p,
.m-detail-leftimg .text ul li p,
.m-detail-leftimg .text ol li p{vertical-align:bottom;*vertical-align:baseline;display:-moz-inline-box;display:inline-block;*display:inline;zoom:1;margin:0;}
.m-post-leftimg .text ul li,
.m-post-leftimg .text ol li,
.m-detail-leftimg .text ul li,
.m-detail-leftimg .text ol li{overflow:hidden;height:27px;line-height:27px;padding-left:2px;}
.m-post-leftimg .text ul li p,
.m-post-leftimg .text ol li p,
.m-detail-leftimg .text ul li p,
.m-detail-leftimg .text ol li p{overflow:hidden;width:90%;white-space:nowrap;text-overflow:ellipsis;-o-text-overflow:ellipsis;word-break:keep-all;}
</style>
<![endif]-->
</head>
<body class="p-homepage">
<div class="g-doc box">
	<div class="g-hd0">
		<div class="g-hdc box">
			<div class="m-hdimg">
				<a class="hdimg img" href="/">
					<img src="<?php echo TEMPLATE_URL; ?>img/logo.jpg" width="100" height="100" />
				</a>
			</div>
			<ul id="m-nav" class="m-nav box">
				<?php blog_navi();?><li class="m-sch"><a id="j-lnksch" href="#">搜索</a><form id="j-schform" class="form" method="get" action="index.php"><input type="text" name="keyword" class="txt"/></form></li>
			</ul>
		</div>
	</div>
	<div class="g-hd1">
		<div class="g-hdc box">
			<h1 class="m-ttl">
				<a href="/"><?php echo $blogname; ?></a>
			</h1>
			<!-- “个人信息” -->
			
			<p class="m-about"><?php echo $bloginfo; ?></p>
			
		</div>
	</div>