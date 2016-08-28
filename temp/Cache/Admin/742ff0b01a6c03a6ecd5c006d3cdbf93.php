<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加/编辑视频</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css?v=1.0.2'>

<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js?v1.0.4"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/kindeditor.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/lang/zh_CN.js"></script>

</head>
<body>

<table cellpadding="0" cellspacing="0" class="boxadd" >
  <tr>
    <td colspan="10" class="table_title">
    	<span class="fl">文件管理</span> 
    </td>
  </tr>
	<tr class="tabs_title">
		<td>
			<span id="tabs" class="fl">
				<a class="on" href="javascript:void(0)" name="1,2" id="t1" hideFocus='true'>上传文件</a>
				<a class="tab2" href="javascript:void(0)" name="2,2" id="t2" hideFocus='true'>转码</a>
				<!--  
				<a class="tab2" href="javascript:void(0)" name="3,2" id="t3" hideFocus='true'>已转码</a>
				-->
			</span>
		</td>
	</tr>
	<tr>
		<td>
			<div id="showtab_1" style="border-top:1px solid #C6DCF2;">
				<form name="form1" action="?s=Admin/Video/Update" method="post" id="gxform1">
					<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
						<tr align="center" class="list_head">
							<td style="text-align:left;" width="100">文件名</td>	
						      <td width="70">大小
						        <?php if(($order)  ==  "hits desc"): ?><a href="?s=Admin/Video/Show/type/hits/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按人气升序排列"></a>
						          <?php else: ?>
						          <a href="?s=Admin/Video/Show/type/hits/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按人气降序排列"></a><?php endif; ?></td>
						      <td width="90">时长
						        <?php if(($order)  ==  "stars desc"): ?><a href="?s=Admin/Video/Show/type/stars/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按星级升序排列"></a>
						          <?php else: ?>
						          <a href="?s=Admin/Video/Show/type/stars/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按星级降序排列"></a><?php endif; ?></td>
						      <td width="90">上传时间
						        <?php if(($order)  ==  "addtime desc"): ?><a href="?s=Admin/Video/Show/type/addtime/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按时间升序排列"></a>
						          <?php else: ?>
						          <a href="?s=Admin/Video/Show/type/addtime/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按时间降序排列"></a><?php endif; ?></td>
						      <td width="105">操作</td>
						  </tr>
						  <?php if(is_array($sources)): $i = 0; $__LIST__ = $sources;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><?php
							  	  	$duration = get_duration_readable($gxcms['duration']);
									$mtime    = get_time_readable($gxcms['mtime']);
									$isdir     = $gxcms["type"]=="dir"?true:false;
									$shortname= $sub_path . "/" . $gxcms['name'];
									if($isdir===false){
				  	  			?>
							  	<tr class="tr" align="center" onmouseover="this.style.backgroundColor='#E6FBDB';" onmouseout="this.style.backgroundColor='#FFFFFF';">
									<td class="td" style="text-align:left;padding-left:30px;"><span ><a href="<?php echo ($gxcms["channelurl"]); ?>">  <?php echo ($gxcms["name"]); ?></a></span></td>
									<td class="td" style="text-align:right;padding-right:30px;">
									<?php 
										$num = $gxcms['size']/(1024*1024);
										echo sprintf("%.2f", $num); 
									?>MB
									</td>
									<td class="td"><?php echo $duration;?></td>
									<td class="td"><?php echo $mtime;?></td>
									<td class="td">
										<a href="?s=Admin/Mserver/Transcode/filename/<?php echo ($gxcms["name"]); ?>" title="点击进行转码" class="operator_success">转码</a> &nbsp;|&nbsp;
										<a href="javascript:do_delete('<?php echo $shortname;?>')" title="点击删除视频" class="operator_danger">删除</a>
									</td>
							  </tr>	
							  <?php
							  	}
					  		  ?><?php endforeach; endif; else: echo "" ;endif; ?>		
				   		<tr style="border:#FF0000 solid 0px;">
				     		<td colspan="10"><input type="button" value="上传文件" class="bginput" onClick="window.location ='?s=Admin/Mserver/Add';" /></td>
				    	</tr>						 				  
					</table>
				</form>
			</div>
			<div id="showtab_2" style="display:none;border-top:1px solid #C6DCF2;text-align:left">
				<form name="refresh" action="?s=Admin/Mserver/Show" method="post" id="gxform_waiting">
					<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
				   		<tr align="center" class="list_head">
				   			<td width="105">资源编号</td>
				   			<td width="105">源文件</td>
				   			<td width="105">发布频道</td>
				   			<td width="105">编码参数</td>
				   			<td width="80">耗时</td>
				   			<td width="80">添加时间</td>
				   			<td width="105">开始时间</td>
				   			<td width="105">进度</td>
				   			<td width="80">状态</td>
				   		</tr>						   						

			   		<?php
			   			$index = 0;
					?>
					<?php if(is_array($stream_array)): $i = 0; $__LIST__ = $stream_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><tr class="tr" align="center" onmouseover="this.style.backgroundColor='#E6FBDB';" onmouseout="this.style.backgroundColor='#FFFFFF';">
			   				<?php
			   					$encparas  = get_encode_paras($gxcms);
								$work_dur  = intval(@$gxcms['work_duration']);
								$time_span = get_duration_readable($work_dur);
								$result    = @$gxcms['result'];

								$status = @$gxcms['status'];
								if($status === "working"){
									$status_str= "正在转码";
								}else{
									$status_str = "等待转码";
								}
								
							?>
			   				<td class="td"><?php  echo $index++;?></td>
			   				<td class="td"><?php echo $gxcms['src_file'];?></td>
			   				<td class="td"><?php echo $gxcms['application'];?></td>
			   				<td class="td"><?php echo $encparas;?></td>
			   				<td class="td"><?php echo $time_span;?></td>
			   				<td class="td"><?php echo get_date_str(@$gxcms['add_time']);?></td>
			   				<td class="td"><?php echo get_date_str(@$gxcms['start_time']);?></td>
			   				<td class="td"><?php  echo @$gxcms['encode_progress'];?></td>
			   				<td class="td"><font size="2" <?php if($result!="ok") echo "color=red";?>> <?php echo $status_str;?></font></td>
			   				
			   			</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
			   		</table>
			   		 <ul>
						<li style="margin-left:70px;text-align:left;padding-top:5px">
							<input class="bginput" type="button" name="button" value=" 刷新 " onClick="location.href='?s=Admin/Mserver/Show/sflag/1';">
						</li>
					</ul>
				</form>
			</div>
			<!--  
			<div id="showtab_3" style="display:none;border-top:1px solid #C6DCF2;text-align:left">
				<form name="refresh" action="?s=Admin/Mserver/Show" method="post" id="gxform_waiting">
					<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
				   		<tr align="center" class="list_head">
				   			<td width="105">文件名称</td>
				   			<td width="105">转码时间</td>
				   			<td width="105">所属频道</td>
				   			<td width="105">流名称</td>
				   			<td width="105">支持格式</td>
				   			<td width="105">版本</td>
				   		</tr>	
				   	</table>
				</form>			
			</div>
			-->
			<ul>
				<li style="margin-left:70px;text-align:left;padding-top:5px">
					
				</li>
			</ul>
		</td>
	</tr>
</table>

<script type="text/javascript">
var cid = '<?php echo ($cid); ?>';
var stype_mcid = '<?php echo ($stype_mcid); ?>';
var sflag = '<?php echo ($sflag); ?>';

window.onload = function(){
	if (isNaN(parseInt(cid)) == true) cid = 1;
	changeCat(cid,stype_mcid);	
	choosetab(sflag);
};
//
var editor;
KindEditor.ready(function(K){
    editor = K.create('#content', {
	resizeType : 1,
	allowPreviewEmoticons : false,
	allowImageUpload : false,
	items : [
	'source', '|', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
	'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
	'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'unlink', 'about']
})});
var $content = $('#content').val();
	document.getElementById("gxform").onreset = function(){
	KindEditor.html('content', $content);
}

function changeCat(id,mcid){
	$.ajax({
		type:'get',
		url:'?s=Admin/video/ajaxstype/id/'+id+'/mcid/'+mcid,
		success:function(html){
			$("#stype_list").html(html);
		}
	})
}

function do_delete(src)
{
	var url = "?s=Admin/Mserver/Show/sub_path/<?php echo $sub_path;?>/delf" + src;
	if(confirm("您确定要删除这条视频吗?!")==true)
	{
		 location.href = url;
	}
}

function choosetab(sf){
	if(sf == 1){
		$("#t1").removeClass("on");
		$("#t2").addClass("on");
		$('#showtab_1').hide();
		$('#showtab_2').show();
	}
}

</script>
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