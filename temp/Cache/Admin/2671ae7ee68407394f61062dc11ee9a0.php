<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>幻灯管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<style>input{ height:25px;line-height:20px};</style>
</head>
<body>
<table width="98%" cellpadding="4" cellspacing="1" class="table" style="border:1px;">
<?php if(($id)  >  "0"): ?><form id="gxform" name="update" action="?s=Admin/Slide/typeUpdate" method="post">
<input type="hidden" name="id" value="<?php echo ($id); ?>">
<?php else: ?>
<form id="gxform" action="?s=Admin/Slide/typeInsert" method="post" name="gxform"><?php endif; ?>
<tr class="table_title">
  <td colspan="2"><?php echo ($tpltitle); ?>首页幻灯分类</td>
</tr>
<tr class="tr">
  <td width="130" class="rt">幻灯分类名称：</td>
  <td width="1076"><input name="name" type="text" maxlength="50" value="<?php echo ($name); ?>" style="width:300px"> *</td>
</tr>
<tr class="tr">
  <td colspan="2"><input class="bginput" type="submit" name="submit" value="提交"></td>
</tr>
</form>
</table>
<style>
#footer, #footer a:link, #footer a:visited {
	clear:both;
	color:#0072e3;
	font:12px/1.5 Arial;
	margin-top:10px;
	text-align:center;
	white-space:nowrap;
}
</style>
<div id="footer">程序版本：<?php echo C("cms_var");?>&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2015-2016 All rights reserved</div>
</body>
</html>