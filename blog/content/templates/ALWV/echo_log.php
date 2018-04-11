<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>

	<div id="main-wrapper">
		<div class="container">
<?php doAction('index_loglist_top'); ?>
						<div class="row 200%">			
							<div class="8u 12u$(medium)">
								<div id="content">
								
									<!-- Content -->
								
										<article class="log" style="margin-bottom:2em;">

										<hgroup><h2><?php echo $log_title; ?> <span class="view"><?php echo $views; ?> views</span></h2></hgroup>

											<div class="article-content"><?php echo $log_content;?></div>
											<?php $author = get_author($author)?>
										<footer class="article-footer">由 <?php echo $author['name']?> 于 
										<?php  echo gmdate('Y-n-j G:i', $date);?> 发布  
										&nbsp;&nbsp; 属于分类:<?php  blog_sort($logid); ?>  &nbsp;&nbsp; 
										共有评论：<a href="#comments"><?php echo $comnum; ?>条</a>
										拥有标签：<div class="tags"><?php echo get_tags($logid);?></div>
										</footer>
										</article>
										<div id="comments">
										<?php blog_comments($comments); ?>
										<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
										</div>
									
								</div>
							</div>
							<div class="4u 12u$(medium)">
								<?php include View::getView('side');?>
								
							</div>
						</div>
						
					</div>
				</div>
<?php
 include View::getView('footer');
?>