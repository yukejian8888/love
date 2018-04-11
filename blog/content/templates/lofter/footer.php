<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="footer"><span style="cursor:pointer;" title="Copyright">&copy;</span>&nbsp;<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>&nbsp;|&nbsp;Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION;?>">emlog</a>&nbsp;|&nbsp;Theme by <a href="<?php echo BLOG_URL; ?>">Tod.</a></div>
<script type="text/javascript">
$(function(){
	$(".active a").each(function(){	
		$(this).hover(
			function(){
				$(this).css("cursor","pointer");
				$(this).stop();
		   		$(this).animate({width:90},400,function(){$(this).children(".title").css("display","block");})},
			function(){
				$(this).stop();	
				$(this).children(".title").css("display","none");
				$(this).animate({width:20},400)})
	})
});
</script>
<?php echo $footer_info; ?>
<?php doAction('index_footer'); ?>
</body>
</html>