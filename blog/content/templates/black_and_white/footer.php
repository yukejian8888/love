<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Powered by <a href="http://www.emlog.net" title="采用emlog系统">emlog</a>  design from <a href="http://www.geluli.net">geluli</a> <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?>
	  <?php doAction('index_footer'); ?>
    </div>
  </div>
 <script>prettyPrint();</script>
</body>
</html>