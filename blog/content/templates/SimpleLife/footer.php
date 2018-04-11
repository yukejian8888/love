<?php 
/**
 * 页面底部信息
 * Template Name:Simple Life
 * Description:仿LNMP官网简单风格
 * Author:叶雨梧桐
 * Author Url:http://blog.gt520.com
 * Sidebar Amount:1
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div><!--end #content-->
<!--返回顶部-->
<div style="display: none" id="goTopBtn"></div> 
<script type=text/javascript>goTopEx();</script> 
<!--footer-->
<div style="clear:both;"></div>
<div id="footerbar">
	Copyright &copy;  2013 <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>. Powered by <a href="http://www.emlog.net/" rel="external">emlog</a>.
 Theme by <a href="http://blog.gt520.com/" rel="external">叶雨梧桐</a>.
	<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?>
	<?php doAction('index_footer'); ?>
</div><!--end #footerbar-->
</div><!--end #wrap-->
<script>prettyPrint();</script>
</body>
</html>