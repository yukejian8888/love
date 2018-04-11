<?php
!defined('EMLOG_ROOT') && exit('access deined!');
function plugin_setting_view(){require_once 'lanye_videobg_config.php';?>
<link href="<?php echo BLOG_URL;?>content/plugins/lanye_videobg/admin.css" rel="stylesheet" type="text/css" />
<div class="containertitle"><b>蓝叶视频背景设置</b><?php if(isset($_GET['setting'])):?><span class="actived">设置成功</span><?php endif;?></div>
<div class=line></div>
<div class="videobg_tips"><p>填写视频背景的网址时，需要填写webm格式和mp4格式两个地址，手机端不会显示视频背景。</p>
<p>如果插件不起作用，请检查模版文件footer.php里有没有&lt;?php doAction('index_footer');?&gt;代码。</p>
<p>一定要设置插件文件lanye_videobg_config.php有可写权限，否则无法保存设置。</p>
<p>建议上传视频背景到七牛存储，免费10G容量每月10G流量，<a style="font-weight:bold;color:#714312;" href="https://portal.qiniu.com/signup?code=3ln23utbw16c2" target="_blank">点击注册</a>。</p>
</div>
<form action="./plugin.php?plugin=lanye_videobg&action=setting" method="POST" enctype="multipart/form-data">
<div class="videobg_set_box">
 <div class="set_name">加载JQUERY库<div class="set_desc">默认不加载，一般情况下模版都带有jquery库。</div></div>
 <div class="set_body"><select name="videobg_jq"><option value="1" <?php if($config["videobg_jq"]=="1") echo "selected"; ?>>加载JQ库</option><option value="2" <?php if($config["videobg_jq"]=="2") echo "selected"; ?>>不加载JQ库</option></select></div>
</div>
<div class="videobg_set_box">
 <div class="set_name">开启视频遮罩<div class="set_desc">设置视频背景上加载一个透明的遮罩图层。</div></div>
 <div class="set_body"><select name="videobg_bg"><option value="1" <?php if($config["videobg_bg"]=="1") echo "selected"; ?>>开启遮罩</option><option value="2" <?php if($config["videobg_bg"]=="2") echo "selected"; ?>>关闭遮罩</option></select></div>
</div>
<div class="videobg_set_box">
 <div class="set_name">视频遮罩透明度<div class="set_desc">透明度请设置0.1到1之间的数值。</div></div>
 <div class="set_body"><input type="text" name="videobg_tm" value="<?php echo $config['videobg_tm'];?>"></div>
</div>
<div class="videobg_set_box">
 <div class="set_name">webm格式视频地址<div class="set_desc">webm格式视频只支持谷歌、火狐等浏览器。</div></div>
 <div class="set_body"><input type="text" name="videobg_webm" value="<?php echo $config['videobg_webm'];?>"></div>
</div>
<div class="videobg_set_box">
 <div class="set_name">mp4格式视频地址<div class="set_desc">mp4格式视频支持IE9以上的所有浏览器。</div></div>
 <div class="set_body"><input type="text" name="videobg_mp4" value="<?php echo $config['videobg_mp4'];?>"></div>
</div>

<div class="videobg_set_submit"><input type="submit" value="保存设置" /></div>
</form>
<?php
}
function plugin_setting(){
$newConfig = '<?php
$config = array(
"videobg_jq" => "'.addslashes($_POST["videobg_jq"]).'",
"videobg_bg" => "'.addslashes($_POST["videobg_bg"]).'",
"videobg_tm" => "'.addslashes($_POST["videobg_tm"]).'",
"videobg_webm" => "'.addslashes($_POST["videobg_webm"]).'",
"videobg_mp4" => "'.addslashes($_POST["videobg_mp4"]).'"
);';
	@file_put_contents(EMLOG_ROOT.'/content/plugins/lanye_videobg/lanye_videobg_config.php', $newConfig);
}
?>