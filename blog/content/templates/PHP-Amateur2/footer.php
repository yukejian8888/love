<?php
/*
 * footer
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<!--footer begin-->
<script type="text/javascript">
    $(function(){
        init();
    });
</script>
<div id="footer">
    <?php
    global $CACHE;
    $link_cache = $CACHE->readCache('link');
    ?>
    <div class="link"><b>友情链接：</b>
        <?php foreach ($link_cache as $value): ?>
            <a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a>
        <?php endforeach; ?>
    </div>
    <p align="center">CopyRight &copy; 2009-2012&nbsp;<?php echo $blogname; ?>.&nbsp;&nbsp;All rights reserved.&nbsp;<?php echo $icp; ?> Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION; ?>" target="_blank">Emlog</a> & <a href="http://blog.51edm.org" tanget="_blank">PHP-Amateur Theme2</a></p>
    <?php doAction('index_footer'); ?>
</div>
<!--footer end-->
<?php  echo $footer_info;  ?>
</body>
</html>