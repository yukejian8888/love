<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div class="single single-post postid- single-format-standard nav_fixed">
<div class="container container-page">
	<div class="pageside">
	<?php
     include View::getView('page-side-menu');
    ?>
</div>	<div class="content">
				<header class="article-header">
			<h1 class="article-title"><?php echo $log_title; ?></h1>
		</header>
		<div class="page_content_container">
                <header class="page_header"></header>
                <article class="page_content article_content">
                                    </article>

                <div class="page_archive">
                    <?php echo displayRecord1();?>             </div>

            </div>
		<article class="article-content"><?php echo $log_content; ?>
					</article>
		

			<?php 
			if(isShowComment($comnum)) {
				echo "</br></br></br></br></br>";}
			?>

			<div class="article_post_comment" id="comment-place">

				<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
			</div>
			<a name="comments"></a>
			<?php 
			if(isShowComment($comnum)) {
				echo '<h3 class="comment-header">网友评论<b>（'.$comnum.'）</b></h3>';
				echo '<div class="article_comment_list">';}
			?>
			<?php blog_comments($comments,$comnum); ?>
			<?php
			if(isShowComment($comnum)) {
				echo '</div>';}
			?>
	</div>
</div>
</div>
<?php
 include View::getView('footer');
?>
