<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div style="clear:both;"></div>
</div><!-- #main -->
<div id="footer">
	<div id="copyright">
		<div id="site-info">
			Copyright &copy; 2013 <a href="<?php echo BLOG_URL; ?>" title="<?php echo $bloginfo; ?>" rel="home"><?php echo $blogname; ?></a>
			 | Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION;?>">emlog</a>
			 | <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a>
		</div>
		<div id="site-generator">
			Theme <abbr title="Dot-B v1.8.8">Dot-B</abbr> by <a href="//zlz.im/">hzlzh</a>| Don't forget transplant by <a href="http://blog.11ri.net">LaoLuo</a> <?php echo $footer_info; ?>
		</div>
	</div><!-- #copyright -->
	<a id="return_top" href="#wrapper" rel="nofollow" title="Back to top" style="display: block; "> Δ  Top</a>
	<?php doAction('index_footer'); ?>
</div><!-- #footer -->
</div><!-- #wrapper -->
<div id="bottom-bar"></div>
</body>
</html>