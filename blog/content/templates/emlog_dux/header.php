<?php
/*
Template Name:Emlog大前端F3.0
Description:<span style="color:red">有空多到我的博客做客哈~</span>>><a href="http://blog.yesfree.pw">草窝</a></br>模板设置：>><a href="../?setting">设置</a>
Version:F3.0
Author:小草
Author Url:http://blog.yesfree.pw/
Sidebar Amount:2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}

define("THEME_VER","F3.0");

ini_set('date.timezone','Asia/Shanghai');

require_once View::getView('config');

global $arr_navico1;
$arr_navico1 = unserialize($arr_navico);
global $arr_sortico1;
$arr_sortico1 = unserialize($arr_sortico);

require_once View::getView('module');

require_once View::getView('function');

require_once View::getView('module/m-header');
?>
