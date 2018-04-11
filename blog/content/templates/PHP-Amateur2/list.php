<?php
/*
  Template Name: PHP-Amateur Theme2
  File Name：ajax.php
  Description:本文件为下拉自动ajax读取下一页内容的接口文件，同时也是日志列表页面调用页面，如无特别的需求请勿修改本文件内容
  Version:1.0
  Author:PHP爱好者
  Author Url:http://blog.51edm.org
  For emlog:5.0
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
foreach ($logs as $key => $value):preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);
    $imgsrc = !empty($img[1]) ? $img[1][0] : '';
    ?>
    <div class="post-box radius">
        <div class="post-box-container">
            <div><h2 class="title"><span style="float: right;"><?php echo gmdate('Y-n-j H:i:s', $value['date']); ?></span><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2></div>
            <div class="entry rich-content">
                <a class="indexlist" href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
                    <?php if ($imgsrc): ?><img src="<?php echo $imgsrc; ?>" alt="<?php echo $value['log_title']; ?>" />
                    <?php endif; ?></a>
                    <?php
                    if ($value['excerpt'] == '') {
                        echo '' . subString(strip_tags($value['log_description'], $img), 0, 200) . '...';
                    } else {
                        echo $value['excerpt'];
                    }
                    ?>
            </div>
            <div class="meta">
                <div class="post-tags"> <?php blog_tag($value['logid']); ?> </div>
                <a class="fr" href="<?php echo $value['log_url']; ?>" title="阅读全文">阅读全文+</a>
                <a class="fr" href="<?php echo $value['log_url']; ?>"><?php echo $value['views']; ?> 次访问&nbsp;/&nbsp;</a>
                <a class="fr" href="<?php echo $value['log_url']; ?>#comments"><?php echo $value['comnum']; ?> 条评论&nbsp;/&nbsp;</a>
                <span class="fl"><b>博文日期：</b>&nbsp;<?php echo gmdate('Y-n-j H:i:s', $value['date']); ?></span>
                <span class="fl">&nbsp;&nbsp;<b>分类：</b>&nbsp;</span><?php blog_sort($value['logid']); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>