<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="refresh" content="30">
<title>流管理</title> 
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/kindeditor.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/lang/zh_CN.js"></script>
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>

<?php
	$nodeList = get_active_streams($app, $stream);
?>

<script type="text/javascript">
function play(paras,html5)
{
     var url = "<?php echo ($webpath); ?>ntvplayer/autoplayer.php?" + paras;
     var tl  = paras;
		
     if(html5==1)
     {
         window.open(url,"ntv_player","location=no,status=no,z-look=yes");
     }
     else
     {
     	window.open(url,"ntv_player","resizable=yes,z-look=yes");
     }
}

</script>
</head> 
<body>
<div style="clear:both;">
<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
  <tr>
    <td colspan="10" class="table_title">
    	<span class="fl">推流统计</span> 
    </td>
  </tr>
    <tr align="center" class="list_head">
      <td width="200">频道</td>
      <td width="200">视频</td>
      <td width="108">类型</td>
      <td width="264">开始时间</td>
      <td width="151">时长</td>
      <td width="284">播放</td>
    </tr>
	<?php
	$stream = "";
	$active = "unknown";
	$mtime  = "";
	$paras  = "";

	if($nodeList===FALSE)
	{
		goto END;
	}

	$nodeArray   = sort_active_items($nodeList);
	foreach ($nodeArray as $key => $sub_node)
	{
		$ns       = $sub_node->getAttribute('application');
		$stream   = $sub_node->getAttribute('stream');
		$active   = $sub_node->getAttribute('active');
		$mtime    = $sub_node->getAttribute('starttime');
		$type     = $sub_node->getAttribute('type');
		$duration = $sub_node->getAttribute('duration');
		$protocol = @$sub_node->getAttribute('protocol');
		$port     = @$sub_node->getAttribute('port');
		$durtext  = get_duration_readable($duration);
		$mtime    = get_time_readable($mtime);
		$active   = "活动";
		$paras    = "ns=$ns&id=$stream&live=1";
		$fparas   =  $paras . "&port=$port&protocol=$protocol";
		$playtext = "Flash";
		$bgcolor  = '#00FF00';
		 
		$control  = "javascript:close_stream('$ns','$stream')";
	?>
	<tr class="tr" align="center" onmouseover="this.style.backgroundColor='#E6FBDB';" onmouseout="this.style.backgroundColor='#FFFFFF';">
		<td width="200"><a href="streams.php?application=<?php echo $ns;?>"><?php echo $ns;?></a></td>
		<td width="200"><a href="streams.php?application=<?php echo $ns;?>"><?php echo $stream;?></a></td>
		<td width="108" bgcolor="<?php echo $bgcolor;?>" align="center">活动</td>
		<td width="264" align="center"><?php echo $mtime;?></td>
		<td width="151" align="center"><?php echo $durtext;?></td>
		<td width="284" align="center">
			<a href="javascript:play('<?php echo $fparas;?>',0)" ><?php echo $playtext ;?></a>|
			<?php
			$playtext= "HLS";
			$hparas  = $paras . "&format=hls&protocol=hls";
			?> 
			<a href="javascript:play('<?php echo $hparas;?>',1)" ><?php echo $playtext ;?></a>
		</td> 
	</tr>
	<?php
	}
	END:
	?>
	<tr class="tr">
      <td colspan="10">
        &nbsp;&nbsp;
        <input type="button" value="刷新" class="bginput" onClick="location.reload();" />
    	</td>
    </tr>	
</table>
</div>
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