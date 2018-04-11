<?php
/*
 * 首页日志列表部分
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="container">
    <!--leftSide begin-->
    <div class="main">
        <div class="posts">
            <?php include_once 'list.php'; ?>
        </div>
        <?php if (count($logs) >= $index_lognum) {
            ?>
            <div class="pageNo">正在加载中请稍候....</div>
        <?php } ?>                     
    </div>
    <!--leftSide end-->
    <!-- rightSide begin -->
    <div class="aside">
        <?php include View::getView('side'); ?>
    </div>
    <!-- rightSide end -->
    <div style="clear: both"></div>
</div>
<?php
if (count($logs) >= $index_lognum) {
    $page = empty($_GET['page']) ? 1 : (int) $_GET['page'];
    $page = $page == 0 ? 1 : $page;
    ?>
    <script type="text/javascript">
        var page=<?php echo $page ?>;
        var _ajax=1;
        var _winH=$(window).height();
        var _run=1;
        $(window).scroll(function() {
            //        return;
            var _body=$("body").height();
            var _obj = $(".pageNo").offset();
            var _position=document.body.scrollTop?document.body.scrollTop:document.documentElement.scrollTop;
            if((_obj.top-_position)<_winH&&_ajax==1){
                if(_run==1){
                    _run=0;                
                    page++;
                    var sortid='<?php echo $sortid; ?>';
                    var _url="<?php echo CURRENT_TEMPLATE_PATH; ?>ajax.php?page="+page;
                    _url=sortid==""?_url:_url+"&sortid="+sortid;
                    $.get(_url, function(data){
                        if($.trim(data)=="nodata"){
                            $(".pageNo").hide();
                            _ajax=0;
                        }else{
                            $(".posts").append(data);
                        }
                    });
                    setTimeout(function(){_run=1},1000);
                }
            }
        });
    </script>
<?php } ?>  
<?php
include View::getView('footer');
?>