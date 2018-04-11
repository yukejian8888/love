<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}

if(isset($_GET["setting"])){
	require_once View::getView('setting');
	exit;
}
$view='';
$view='module/m_gfs';

include View::getView($view);
?>
