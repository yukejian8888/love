<?php
/*
Template Name:Dot-B
Description:移植自wordpress，作者hzlzh
Version:1.2
Author:LaoLuo
Author Url:http://blog.11ri.net
Sidebar Amount:1
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
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo TEMPLATE_URL; ?>style.css">
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>all.js" type="text/javascript"></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<meta name="generator" content="emlog" />
<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<?php doAction('index_head'); ?>
</head>
<body id=body >
<div id="top-bar"></div>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<a href="<?php echo BLOG_URL; ?>" title="<?php echo $bloginfo; ?>" rel="home" style="opacity: 1; "><?php echo $blogname; ?></a>
			<div id="description"><?php echo $bloginfo; ?></div>
		</div>
		<div id="header_right">
			<div id="header_meta">
				<div id="header_search_area">				
				<form id="searchform" method="get" action="<?php echo BLOG_URL; ?>index.php">
					<input type="text" value="敲击Enter搜索" onfocus="if (this.value == '敲击Enter搜索') {this.value = '';}" onblur="if (this.value == '') {this.value = '敲击Enter搜索' ;}" size="35" maxlength="50" name="keyword" id="s" x-webkit-speech lang="zh-CN">
					<input type="submit" id="searchsubmit" value="搜索">
				</form>
				</div>
				<a id="rss" rel="external nofollow" href="<?php echo BLOG_URL; ?>rss.php" title="RSS Feed">RSS Feed</a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_menu"><?php blog_navi();?></div>
	</div>