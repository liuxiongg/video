<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>用户评论修改</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
</head>
<body>     
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" class="table">
<form name="update" action="?s=Admin/Comment/Update" method="post" id="gxform">
<input type="hidden" name="id" value="<?php echo ($id); ?>"> 
<tr class="table_title"><td>修改评论</td></tr>  
<tr class="tr">
<td colspan="2"><textarea id="content" name="content" style="width:99%;height:250px;"><?php echo (remove_xss($content)); ?></textarea></td>
</tr>
<tr class="tr">
<td colspan="2"><input name='status' type='checkbox' value='1' class="noborder" <?php if(($status)  ==  "1"): ?>checked<?php endif; ?>>是否审核 <input class="bginput" type="submit" name="submit" value="提交"> <input class="bginput" type="reset" name="Input" value="重置" ></td>
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