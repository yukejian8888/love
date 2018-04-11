<?php
/*
 Plugin Name: 浮动提示特效小人
 Version: 1.1
 Plugin URL: http://www.guihaibk.com/
 Description: 鬼孩博客浮动特效小人。
 ForEmlog:5.3.x
 Author: 鬼孩
 Author Email: 841525145@qq.com
 Author URL: http://www.guihaibk.com/
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function xiaoren_code(){?>
<script type="text/javascript" src="<?php echo BLOG_URL;?>content/plugins/xiaoren/spig.js"></script>
<link rel="stylesheet" href="<?php echo BLOG_URL;?>content/plugins/xiaoren/spigPet.css" type="text/css"/>
<script type="text/javascript">var isindex = true;var visitor = "游客";jQuery(document).ready(function($){$("#spig").mousedown(function(e){if(e.which==3){showMessage("秘密通道:<br /><a href=\"<?php echo BLOG_URL;?>rss.php\" title=\"订阅\">订阅</a> <a href=\"<?php echo BLOG_URL;?>\" title=\"首页\">首页</a>",10000);
}});$("#spig").bind("contextmenu", function(e){return false;});});</script>
<div id="spig" class="spig"><div id="message">正在加载中……</div><div id="mumu" class="mumu"></div>
</div>
<?php }
addAction('index_footer', 'xiaoren_code');