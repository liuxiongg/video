<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>连接</title>
<meta http-equiv="refresh" content="10">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css?v=1.0.2'>

<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js?v1.0.4"></script>
<?php
	$node = get_connections($app, $stream);

	if($node===FALSE)
	{
		$nodeList  = FALSE;
		$nodeList2 = FALSE;
	}
	else
	{
		$nodeList  = get_static_nodelist($node,"live_statistic");
		$nodeList2 = get_static_nodelist($node,"vod_statistic");
	}

function get_color($c)
{
	if($c>0)
	{
		return  '#00FF00';
	}
	else
	{
		return  '#C0C0C0';
	}
}
?>

</head>
<body>
<div style="clear:both;">
<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
  <tr>
    <td colspan="10" class="table_title">
    	<span class="fl">播放统计</span> 
    </td>
  </tr>
  <!-- there are live streams -->	
  <tr>
    <td colspan="10" class="table_title">
    	<span class="fl">直播</span> 
    </td>
  </tr>
    <tr align="center" class="list_head">
      <td width="200">频道</td>
      <td width="200">视频</td>
      <td width="108">HLS</td>
      <td width="264">HTTP</td>
      <td width="151">RTMP</td>
      <td width="284">总连接数</td>
    </tr>
	
	<?php
		if($nodeList!==FALSE){
			for ($i = 0; $i < $nodeList->length; $i++){
			//stat_item application="liveshow" stream="livej" rtmp_connect_count="1" http_connect_count="0" hls_connnect_count="0"
			$sub_node = $nodeList->item($i);
			$app      = $sub_node-> getAttribute('application');
			$stream   = $sub_node-> getAttribute('stream');
			$hlsc     = $sub_node-> getAttribute('hls_connnect_count');
			$httpc    = $sub_node-> getAttribute('http_connect_count');
			$rtmpc    = $sub_node-> getAttribute('rtmp_connect_count');
			$total    = $hlsc + $httpc + $rtmpc;
			$bgcolor  = '#C0C0C0';
			?>	
				
	<tr class="tr" align="center" onmouseover="this.style.backgroundColor='#E6FBDB';" onmouseout="this.style.backgroundColor='#FFFFFF';">
		<td height="22">&nbsp;<?php echo $app;?></td>
		<td height="22"><?php echo $stream;?></td>
		<td height="22" bgcolor="<?php echo get_color($hlsc);?>"><?php echo $hlsc;?></td>
		<td height="22" bgcolor="<?php echo get_color($httpc);?>"><?php echo $httpc;?></td>
		<td height="22" bgcolor="<?php echo get_color($rtmpc);?>"><?php echo $rtmpc;?></td>
		<td height="22" bgcolor="<?php echo get_color($total);?>"><?php echo $total;?></td>
	</tr>
	<?php
			}
		}
	?>	
	<!-- there are vod streams -->	
  <tr >
    <td colspan="10" class="table_title">
    	<span class="fl">点播</span> 
    </td>
  </tr>
  </tr>
    <tr align="center" class="list_head">
      <td width="200">频道</td>
      <td width="200">视频</td>
      <td width="108">HLS</td>
      <td width="264">HTTP</td>
      <td width="151">RTMP</td>
      <td width="284">总连接数</td>
    </tr>
	<?php
		if($nodeList2!==FALSE){
			for ($i = 0; $i < $nodeList2->length; $i++){
			//stat_item application="liveshow" stream="livej" rtmp_connect_count="1" http_connect_count="0" hls_connnect_count="0"
			$sub_node = $nodeList2->item($i);
			$app      = $sub_node-> getAttribute('application');
			$stream   = $sub_node-> getAttribute('stream');
			$hlsc     = $sub_node-> getAttribute('hls_connnect_count');
			$httpc    = $sub_node-> getAttribute('http_connect_count');
			$rtmpc    = $sub_node-> getAttribute('rtmp_connect_count');
			$total    = $hlsc + $httpc + $rtmpc;
			$bgcolor  = '#C0C0C0';
			?>  
	<tr class="tr" align="center" onmouseover="this.style.backgroundColor='#E6FBDB';" onmouseout="this.style.backgroundColor='#FFFFFF';">
		<td height="22">&nbsp;<?php echo $app;?></td>
		<td height="22"><?php echo $stream;?></td>
		<td height="22"><?php echo $hlsc;?></td>
		<td height="22"><?php echo $httpc;?></td>
		<td height="22"><?php echo $rtmpc;?></td>
		<td height="22"><?php echo $total;?></td>
	</tr>
	<?php
			}
		}
	?>	
	
	<tr class="tr">
      <td colspan="10">
        &nbsp;&nbsp;
        <input type="button" value="刷新" class="bginput" onClick="location.reload();" />
    	</td>
    </tr>											 				  
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