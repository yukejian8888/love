<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?> 
</div>
<div id="totop" class="totop"><i class="iconfont">&#404;</i>回顶部</div>
<script type="text/javascript">
	$(window).scroll(function () {
        var dt = $(document).scrollTop();
        var wt = $(window).height();
        if (dt <= 0) {
            $("#totop").hide();
            return;
        }
        $("#totop").show();
        if ($.browser.msie && $.browser.version == 6.0) {//IE6返回顶部
            $("#totop").css("top", wt + dt - 110 + "px");
        }
    });
    $("#totop").click(function () { $("html,body").animate({ scrollTop: 0 }, 200) });
</script> 
</div>

<div id="footer">
	©<?php echo $blogname; ?>.
	Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION;?>">Emlog</a>.
    Theme by <a href="http://www.alvinac027.com" title="www.alvinac027.com" target="_blank">刹那</a>.
    Design by <a href="http://tangjie.me/" title="http://tangjie.me/" target="_blank">唐杰</a>.
	<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?>
<?php doAction('index_footer'); ?>
</div>
