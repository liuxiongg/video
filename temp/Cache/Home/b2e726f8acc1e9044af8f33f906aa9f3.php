<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>友情提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<table border="0" align="center" cellpadding="5" cellspacing="1" style="font-size:14px;color:#333333;margin-top:100px;background:#70afd3;width:360px;">
<tr style="background:url(./views/images/install/top_bg.gif);color:#FFFFFF">
    <th>系统发生错误</th>
</tr>
<tr><td height="100" style="font-size:12px; background:#FFFFFF">
    <div style="font-size:16px;font-weight:bold;margin:10px;color:#025196;">访问路径或参数错误</div>
    <div style="margin:10px;">系统将在&nbsp;<span id="countDownSec" style="color:blue;font-weight:bold">10</span>&nbsp;秒后自动跳转,如果不想等待,直接 <a href="javascript:history.back(-1)"  style="color:#069;">点击这里</a></div>
</td></tr>
</table>
<script language="javascript" type="text/javascript">
var countDown = function(timer,eleId,interType){
	document.getElementById(eleId).innerHTML = timer;
	var interval = interType=='s'?1000:(interType=='m'?1000*60:1000*60*60);
	window.setInterval(function(){
		timer--;
		if (timer > 0) {
			document.getElementById(eleId).innerHTML = timer;
		}else{window.history.back(-1);}
	},interval);
};
countDown(parseInt(10),'countDownSec','s');
</script>
</body>
</html>