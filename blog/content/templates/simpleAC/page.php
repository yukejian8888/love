<?php 
/*
* 自建页面模板
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
	<div id="main">
		<div id="article">
			<h1><?php echo $log_title; ?></a></h1>
			<div class="info">
            	<div class="text"><?php echo $log_content; ?></div>
            </div>
		</div>
		<div id="comments">      
		<?php blog_comments($comments); ?>
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
		</div>
	</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>