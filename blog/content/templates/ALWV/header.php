<?php
/*
Template Name:ALWV
Description:响应式主题
Version:1.1
Author:安乐窝
Author Url:http://www.alw.pw
Sidebar Amount:
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $site_title; ?></title>
		<meta charset="utf-8" />
		<meta name="keywords" content="<?php echo $site_key; ?>" />
		<meta name="description" content="<?php echo $site_description; ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="<?php echo TEMPLATE_URL; ?>assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>assets/css/ie8.css" /><![endif]-->
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
		<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
		<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
		<script src="<?php echo TEMPLATE_URL; ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo TEMPLATE_URL; ?>assets/js/jquery.dropotron.min.js"></script>
		<script src="<?php echo TEMPLATE_URL; ?>assets/js/skel.min.js"></script>
		<script src="<?php echo TEMPLATE_URL; ?>assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="<?php echo TEMPLATE_URL; ?>assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="<?php echo TEMPLATE_URL; ?>assets/js/main.js"></script>
		<?php doAction('index_head'); ?>
	</head>
<body class="homepage">
		<div id="page-wrapper">
			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h1>
								<span><?php echo $bloginfo; ?></span>
							</div>

						<!-- Nav -->
							<nav id="nav">
							<?php blog_navi()?>
							</nav>

					</header>
				</div>
				
			
			