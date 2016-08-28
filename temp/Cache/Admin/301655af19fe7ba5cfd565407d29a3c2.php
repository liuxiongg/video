<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>访问路径设置</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>

<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>

<style type="text/css">.input{ font-size:14px}</style> 

<script language="javascript">

function showtab(mid,val,n){

    if(val>0){

		for(var i=1;i<=n;i++){

			$('#'+mid+i).show();

		//	alert(i);

		}

	}else{

		for(var i=1;i<=n;i++){

			$('#'+mid+i).hide();

		}

	}

	//$('#'+mid+val).show();

}

function showtabs(mid,val,n){

    if(val>0){

		for(var i=1;i<=n;i++){

			$('#'+mid+i).show();

		}

	}else{

		for(var i=1;i<=n;i++){

			$('#'+mid+i).hide();

		}

	}

}

$(document).ready(function(){

	$('#url_rewrite').change(function(){

		showtab('rewrite',$(this).val(),15);

	});

	

	<?php if(($url_rewrite)  ==  "1"): ?>showtab('rewrite',1,15);<?php endif; ?>

});

</script>

</head>

<body>

<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">

<form action="?s=Admin/Config/Updaterewrite" method="post" id="gxform"> 

<tr class="table_title">

  <td colspan="4"><table width="200" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td align="center"><a href="?s=Admin/Config/Conf/id/url">网页静态化</a></td>

        <td  align="center" bgcolor="#339900" style="color:#FFF;">伪静态设置</td>

      </tr>

    </table></td></tr>

<tr class="tr">

  <td class="left">伪静态重写功能</td>

  <td colspan="3"><select name="con[url_rewrite]" id="url_rewrite" class="w100"><option value="1">开启</option><option value="0" <?php if(($url_rewrite)  ==  "0"): ?>selected<?php endif; ?>>关闭</option></select>　<span id="rewrite1" style="display:none">后缀名：<select name="con[url_html_suffix]"><option value=".html">.html</option><?php if(($url_html_suffix)  ==  ".htm"): ?><option value=".htm" selected>.htm</option><?php else: ?><option value=".htm">.htm</option><?php endif; ?><?php if(($url_html_suffix)  ==  ".shtml"): ?><option value=".shtml" selected>.shtml</option><?php else: ?><option value=".shtml">.shtml</option><?php endif; ?><?php if(($url_html_suffix)  ==  ".shtm"): ?><option value=".shtm" selected>.shtm</option><?php else: ?><option value=".shtm">.shtm</option><?php endif; ?></select></span>

    </td>

</tr>

<tr class="ji" id="rewrite13" style="display:none">

  <td class="left">视频栏目页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_videolist]" value="<?php echo ($rewrite_videolist); ?>" style="width:300px;"/>

    变量: $id，$page

    <label>附加变量: $wd，$area，$language，$actor，$director，$year，$letter，$order，$sid</label></td>

</tr>

<tr class="ji" id="rewrite2" style="display:none">

  <td class="left">视频内容页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_videodetail]"  value="<?php echo ($rewrite_videodetail); ?>" style="width:300px;"/>

    变量: $id(影片ID)</td>

</tr> 

 <tr class="ji" id="rewrite3" style="display:none">

  <td class="left">视频播放页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_videoplay]"  value="<?php echo ($rewrite_videoplay); ?>" style="width:300px;"/></td>

</tr>         

<tr class="tr" id="rewrite4" style="display:none">

  <td class="left">视频搜索页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_videosearch]"  value="<?php echo ($rewrite_videosearch); ?>" style="width:300px;"/>

    变量: $wd(搜索关键字)，$page(分页)</td>

</tr>

<tr class="ji" id="rewrite6" style="display:none;">

  <td class="left">新闻栏目页规则：  </td>

  <td colspan="3"><input type="text" name="con[rewrite_newslist]"  value="<?php echo ($rewrite_newslist); ?>" style="width:300px;"/></td>

</tr>



<tr class="ji" id="rewrite7" style="display:none">

  <td class="left">新闻内容页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_newsinfo]"  value="<?php echo ($rewrite_newsinfo); ?>" style="width:300px;"/>

    变量: $id(文章ID)</td>

</tr>

<tr class="ji" id="rewrite8" style="display:none">

  <td class="left">新闻搜索页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_newssearch]"  value="<?php echo ($rewrite_newssearch); ?>" style="width:300px;"/></td>

</tr>

<tr class="ji" id="rewrite10" style="display:none">

  <td class="left">专题栏目页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_speciallist]"  value="<?php echo ($rewrite_speciallist); ?>" style="width:300px;"/>

    变量: $page(分页)</td>

</tr> 

<tr class="ji" id="rewrite11" style="display:none">

  <td class="left">专题内容页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_specialdetail]"  value="<?php echo ($rewrite_specialdetail); ?>" style="width:300px;"/>

    变量: $id(专题ID)</td>

</tr>

<tr class="ji" id="rewrite14" style="display:none">

  <td class="left">留言本规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_guestbook]"  value="<?php echo ($rewrite_guestbook); ?>" style="width:300px;"/></td>

</tr>

<tr class="ji" id="rewrite15" style="display:none">

  <td class="left">最近更新规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_top10]"  value="<?php echo ($rewrite_top10); ?>" style="width:300px;"/></td>

</tr>


<tr class="ji" id="rewrite12" style="display:none">

  <td class="left">地图页规则：</td>

  <td colspan="3"><input type="text" name="con[rewrite_map]"  value="<?php echo ($rewrite_map); ?>" style="width:300px;"/>

变量: $id(地图ID)，$limit(数量)</td>

</tr>

<tr class="tr">

  <td colspan="4"><input type="hidden" name="setting_sub" value="true">

    <input class="bginput" type="submit" name="submit" value="提交">

    <input class="bginput" type="reset" name="Input" value="重置" >

  </td>

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