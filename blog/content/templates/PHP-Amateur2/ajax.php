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
if (isset($_GET['page'])) {
    require_once '../../../init.php';
    require_once 'module.php';
    $Log_Model = new Log_Model();
    $CACHE = Cache::getInstance();
    $options_cache = Option::getAll();
    extract($options_cache);
    $page = empty($_GET[page]) ? 1 : (int) $_GET[page];
    $start_limit = ($page - 1) * $index_lognum;
    $sqlSegment = 'ORDER BY top DESC ,date DESC';
    $sortid = empty($_GET[sortid]) ? 0 : (int) $_GET[sortid];
    $sqlSegment = $sortid == 0 ? $sqlSegment : " and `sortid`='$sortid'";
    $logs = $Log_Model->getLogsForHome($sqlSegment, $page, $index_lognum);
    if (count($logs) == 0) {
        echo "nodata";
        exit;
    } else {
        include_once 'list.php';
    }
}
?>