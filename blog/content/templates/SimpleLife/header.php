<?php
/**
 * Template Name:Simple Life v1.4
 * Description:仿LNMP官网简单风格
 * Author:叶雨梧桐
 * Author Url:http://blog.gt520.com
 * Sidebar Amount:1
 * Update:20131228
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
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
 <script src="<?php echo BLOG_URL; ?>include/lib/js/jquery/jquery-1.7.1.js" type="text/javascript"></script> 
 <script src="<?php echo BLOG_URL; ?>content\templates\SimpleLife\myjs.js" type="text/javascript"></script>
<?php doAction('index_head'); ?>
</head>
<body>
<div class="search">
	<form id="searchform" method="get" action="<?php echo BLOG_URL; ?>index.php">
		 <input type="text" value="" name="keyword" id="s" size="25" />
		 <button type="submit">搜索</button>
    </form>
	</div>
 <div id="header">
    <h1><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h1>
    <h3><?php echo $bloginfo; ?></h3>
	
 </div>
	
  <div id="nav"><?php blog_navi();?></div>
  <div id="wrap">