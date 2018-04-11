<?php
/*
 Plugin Name: 蓝叶视频背景插件
 Version: 1.0
 Plugin URL: http://lanyes.org
 Description: 设置一个炫酷的视频，作为网站的背景。’。
 ForEmlog:5.3.x
 Author: 蓝叶
 Author Email: w@lanyes.org
 Author URL: http://lanyes.org
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function lanye_videobg_menu(){
 echo '<div class="sidebarsubmenu" id="lanye_videobg_menu"><a href="./plugin.php?plugin=lanye_videobg">视频背景</a></div>';}
addAction('adm_sidebar_ext', 'lanye_videobg_menu');
function lanye_videobg_mobile(){static $is_mobile;if(isset($is_mobile))return $is_mobile;if(empty($_SERVER['HTTP_USER_AGENT'])){$is_mobile = false;}elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){$is_mobile = true;}else{$is_mobile = false;} return $is_mobile;} 
function lanye_videobg_echo(){
 require_once 'lanye_videobg_config.php';
 if(lanye_videobg_mobile()==false){
 if($config["videobg_jq"]=="1"){echo '<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>';}
 if($config["videobg_bg"]=="1"){$overlay = 'true';}else{$overlay = 'false';}
 echo '<script type="text/javascript" src="'.BLOG_URL.'content/plugins/lanye_videobg/vidbg.js"></script>';
 echo '<div id="lanye_videobg"></div>';
 echo '<script type="text/javascript">jQuery(function($){$("#lanye_videobg").vidbg({"mp4":"'.$config["videobg_mp4"].'","webm":"'.$config["videobg_webm"].'"},{muted:true,loop: true,overlay:'.$overlay.',overlayColor:"#000",overlayAlpha:"'.$config["videobg_tm"].'",});});</script>';
 }
}
addAction('index_footer', 'lanye_videobg_echo');