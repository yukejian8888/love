<?php 
/**
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 

?>
<div class="sidebar">
<?php 
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array(); //网站原内容
doAction('diff_side');
foreach ($widgets as $val)
{
	$widget_title = @unserialize($options_cache['widget_title']);
	$custom_widget = @unserialize($options_cache['custom_widget']);
	if(strpos($val, 'custom_wg_') === 0)
	{
		$callback = 'widget_custom_text';
		if(function_exists($callback))
		{
			call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
		}
	}else{
		$callback = 'widget_'.$val;
		if(function_exists($callback))
		{
			preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
			call_user_func($callback, htmlspecialchars($wgTitle));
		}
	}
}
?>

<?php if(!empty($ad_side)):?>
<div class="widget widget_ui_adsf widget_fix"></span><h3> AD</h3>	
<?php echo $ad_side;?>
</div>
<?php endif;?>

<?php if($timehide==1):?>
<div class="widget widget_tit">
<span class="icon"><i class="fa fa-bar-chart"></i></span>
	<h3>站点统计</h3>
    <ul>
    <?php $sta_cache = Cache::getInstance()->readCache('sta');?>
    <li><a>文章总数：<?php echo $sta_cache['lognum']; ?>篇</a></li>
    <li><a>微语总数：<?php echo $sta_cache['twnum']; ?>条</a></li>
    <li><a>评论总数：<?php echo $sta_cache['comnum']; ?>条</a></li>
	
	<li><a>运行天数: <?php echo floor((time()-strtotime($timedate))/86400); ?>天</a></li>
    </ul>
</div>
<?php endif;?>
</div>
