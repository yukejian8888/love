<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
//请保留作者的版权连接 做主题也不容易 还请手下留情 
?>
<footer>
<div id="copyright">
<ul class="menu">
	<li>&copy; 2015  All rights reserved</li><li>Design:<a href="http://www.html5up.net" target="_blank">HTML5UP</a></li><li>Powered:<a href="http://www.emlog.net" target="_blank">emlog</a></li><li>Theme:<a href="http://www.alw.pw" target="_blank">安乐窝</a></li>
	<?php if($icp !== ""):?><li><a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a></li><?php endif;?>
	<?php if($footer_info !== ""):?><li><?php echo $footer_info; ?></li><?php endif;?>
	<?php doAction('index_footer'); ?>
	</ul>
</div>
</footer>
	</body>
	</html>