<?php 
/*
* 自建页面模板
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="postwrapper box wid700  ">
            <div class="block article">
                    <div class="side">
                        <div class="day"><a href="http://tod.cc/post/120745_390e65">28</a></div>
                        <div class="month"><a href="http://tod.cc/post/120745_390e65">12</a></div>
                    </div>
                <div class="main">
                    <div class="content">
                        <div class="text">
                            <h2><?php topflg($top); ?><a href="<?php echo Url::log($logid); ?>"><?php echo $log_title; ?></a></h2>
                                <p><?php echo $log_content; ?></p>
                        </div>
                    </div>                
                </div>
            </div>
</div>
<?php
 include View::getView('footer');
?>