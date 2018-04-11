<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main-wrapper">
<div class="container">
<div class="row 200%">	
<div id="tw" class="8u 12u$(medium)">

    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
    <section>
    <header id="tw_header"><img class="avatar" src="<?php echo $avatar; ?>" /> <span><?php echo $author; ?>:</span><span class="time"><?php echo $val['date'];?> </span></header>
    <div class="post1"><?php echo $val['t'].'<br/>'.$img;?></div>
    <div class="clear"></div>
    <footer id="tw_footer"></footer>
	<div class="clear"></div>
    </section>
    <?php endforeach;?>
						<div class="page_nav">
										<?php  
											$page_loglist = my_page($lognum, $index_lognum, $page, $pageurl); 
											echo $page_loglist; 
										?>
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