<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div class="g-mn">
		<div class="g-mnc box">
			
			<div class="m-postlst box">
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
				
				<div class="m-post  m-post-txt  ">
					<div class="ct">
						<div class="ctc box">
							<h2 class="ttl"><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
<?php
$thum_src = getThumbnail($value['logid']);
if(!empty($thum_src)){ ?>
<a class="img thumbnail" href="<?php echo $value['log_url']; ?>"><img src="<?php echo $thum_src; ?>" /></a>
<?php
}else{
?>
<div class="text"><p><?php echo $value['log_description']; ?></p></div>
<?php
}
?>							
							<div class="more">
								<a href="<?php echo $value['log_url']; ?>">→ Read more</a>
							</div>
						</div>
					</div>
				</div>	
<?php 
endforeach;
else:
?>
	<h2>未找到</h2>
	<p>抱歉，没有符合您查询条件的结果。</p>
<?php endif;?>
			</div>
			<!-- Pager -->
<div class="m-pager m-pager-idx box">
	<?php echo $page_url;?>
</div>			
			
			
			
		</div>
	</div>
</div>
<?php
 include View::getView('footer');
?>