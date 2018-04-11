<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="box wid700">
<?php doAction('index_loglist_top'); ?>
<?php foreach($logs as $value): ?>
    <div class="block article">
	    <div class="side">
            <div class="day"><a href="<?php echo $value['log_url']; ?>"><?php echo gmdate('j', $value['date']); ?></a></div>
            <div class="month"><a href="<?php echo $value['log_url']; ?>"><?php echo gmdate('n', $value['date']); ?></a></div>
			<div class="edit"><?php editflg($value['logid'],$value['author']); ?></div>
        </div>
        <div class="main">
            <div class="content">
                <div class="text">
                    <h2><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
                    <p><?php echo $value['log_description']; ?></p>
                    <div class="tag"><?php blog_tag($value['logid']); ?></div>
					<div class="sort"><?php blog_sort($value['logid']); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    <div class="page">
	    <?php 
	        $page_next = next_page($lognum, $index_lognum, $page, $pageurl);
             echo $page_next;
	    ?>
    </div>
</div>
<?php
 include View::getView('footer');
?>