<?php
/*
  Template Name: PHP-Amateur Theme2
  Description:本模板同我发布的<a href="http://www.emlog.net/template/237" target="_blank">上一个模板</a>一样采用了minify压缩缓存js、css文件功能，右侧浮动便捷操作按钮，页面下拉时导航栏固定在顶端以半透明状态显示等特性，新增加了右侧内容隐藏功能，页面下拉到底部自动ajax加载下一页内容等功能
  Version:1.2
  Author:PHP爱好者
  Author Url:http://blog.51edm.org
  Sidebar Amount:1
  For emlog:5.0
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
//BLOG_URL
require_once View::getView('module');
$basePath = str_replace("http://" . $_SERVER['HTTP_HOST'], "", BLOG_URL);
define('CURRENT_TEMPLATE_PATH', $basePath . "content/templates/" . Option::get('nonce_templet') . '/');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $site_title; ?></title>
        <meta name="keywords" content="<?php echo $site_key; ?>" />
        <meta name="description" content="<?php echo $site_description; ?>" />
        <meta http-equiv="X-UA-Compatible" content="chrome=1" />
        <meta name="generator" content="emlog" />
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
        <link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
        <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>min/?f=<?php echo CURRENT_TEMPLATE_PATH ?>main.css" type="text/css" media="screen" />
        <script src="<?php echo TEMPLATE_URL; ?>min/?f=<?php echo CURRENT_TEMPLATE_PATH ?>js/jquery.js,<?php echo CURRENT_TEMPLATE_PATH ?>js/base.js,/include/lib/js/common_tpl.js" type="text/javascript"></script>
        <?php
        doAction('index_head');
        header('X-Powered-By:hengqin2008@qq.com');
        ?>
    </head>
    <body>
        <div id="toplogo">
            <div class="header">
                <div class="bloginfo"><?php echo $bloginfo; ?></div>
                <div id="logo-holder">
                    <h1 id="logo"><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h1>
                </div>
                <div id="my_banner"><img src="<?php echo TEMPLATE_URL; ?>img/my_banner.png" height="112" width="697" /></div>
            </div>
        </div>
        <?php
        global $CACHE;
        $navi_cache = $CACHE->readCache('navi');
        ?>
        <!--nav begin-->
        <form id="side-title-form"  name="keyform" method="get"  action="<?php echo BLOG_URL; ?>index.php" onsubmit="if($('#side-title-input').val()=='输入后按回车搜索...'||$('#side-title-input').val()=='') return false;">
            <div id="topnav">
                <div id="tophead" class="clearfix">
                    <ul id="nav">
                        <?php
                        foreach ($navi_cache as $value):
                            if ($value['url'] == 'admin' && (ROLE == 'admin' || ROLE == 'writer')):
                                ?>
                                <li class="nav-item"><a href="<?php echo BLOG_URL; ?>admin/write_log.php">写日志</a></li>
                                <li class="nav-item"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
                                <li class="nav-item"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
                                <?php
                                continue;
                            endif;
                            $newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
                            $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
                            $current_tab = (BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url']) ? 'current' : 'nav-item';
                            ?>
                            <li class="<?php echo $current_tab; ?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab; ?>><?php echo $value['naviname']; ?></a></li>
                        <?php endforeach; ?>
                        <li class="topSearch"><input style="" type="text" id="side-title-input" autocomplete="off" value='输入后按回车搜索...' onblur="if(this.value == '')this.value='输入后按回车搜索...'" onfocus="if(this.value == '输入后按回车搜索...')this.value = ''"  name="keyword" /></li>
                    </ul>
                </div>
            </div>
        </form>
        <!--nav end-->
