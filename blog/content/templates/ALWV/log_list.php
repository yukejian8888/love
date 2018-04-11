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
									<?php 
										if (!empty($logs)):
										foreach($logs as $value): 
									?>
										<article>

										<hgroup><h2><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?> "><?php echo $value['log_title']; ?></a> <span class="view"><?php echo $value['views']; ?> views</span></h2></hgroup>

											<div class="article-content"><?php echo  $value['log_description'];?></div>
											<?php $author = get_author($value["author"])?>
										<footer class="article-footer">由 <?php echo $author['name']?> 于 
										<?php  echo gmdate('Y-n-j G:i', $value['date']);?> 发布  
										&nbsp;&nbsp; 属于分类:<?php  blog_sort($value['logid']); ?>  &nbsp;&nbsp; 
										共有评论：<a href="<?php echo $value['log_url']."#comments"?>"><?php echo $value['comnum']; ?>条</a>
										<a class="readmore" href="<?php echo $value['log_url']; ?> ">阅读全文&gt;&gt;</a>
										</footer>
										</article>
									<?php 
										endforeach;?>
										<div class="page_nav">
										<?php  
											$page_loglist = my_page($lognum, $index_lognum, $page, $pageurl); 
											echo $page_loglist; 
										?>
										</div>
										<?php
										else:
									?>
									<h2>未找到</h2>
									<p>抱歉，没有符合您查询条件的结果。</p>
									<?php endif;?>
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