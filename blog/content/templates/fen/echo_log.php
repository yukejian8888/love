<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div class="g-mn">
		<div class="g-mnc box">
			
			
			
			<div class="m-postdtl box">	
				
				<div class="m-detail  m-detail-txt  ">
					<div class="m-cont box">
						
						
						<div class="ct">
							<div class="ctc box">
								
								<div class="txtcont"><?php echo $log_content; ?></div>
							</div>
						</div>
						
						
						
						
						
						<div class="info">
							<div class="tags box">
<div class="tag">											
<?php blog_tag($logid); ?>								
								
								</div>
								
							</div>
							<div class="lnks box">
								<a class="date" href="#"><?php echo gmdate('Y-n-j', $date); ?></a>
								
								
								
							</div>
						</div>
						
						
						
					</div>
				</div>
				
				
				
				<!-- Pager -->
				
				<div class="m-pager m-pager-dtl box">
<?php extract($neighborLog);if($prevLog){
echo '<a class="next" id="__next_permalink__" href="'.Url::log($prevLog['gid']).'" title="'.$prevLog['title'].'">下一篇</a>';}
else{
echo '';};
if($nextLog){
echo '<a class="prev" id="__prev_permalink__" href="'.Url::log($nextLog['gid']).'" title="'.$nextLog['title'].'">上一篇</a>';}
else{
echo '';};?>
				</div>
				
				<!-- 内页评论和热度 -->
				<div class="m-cmthot">
					<div class="cmthotc box">
						
						<div class="m-cmt">
							<div class="box">
								<div class="nctitle" style="">评论</div>
<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="<?php echo $logData['logid'] ; ?>" data-title="<?php echo $log_title; ?>" data-url="<?php echo $log_url; ?>"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"nimabk"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->

							</div>
						</div>
						
						
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
</div>

<?php
 include View::getView('footer');
?>