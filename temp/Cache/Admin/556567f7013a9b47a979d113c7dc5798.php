<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>站点安装-许可协议</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/install.css'>
<script type="text/javascript">
<!--
function checkebut(){
	    var setup=document.getElementById('setup');
	    if(setup.checked==true){
		document.getElementById('install').disabled='';
		}else{
		document.getElementById('install').disabled='disabled';
		}
	}
-->
</script>
</head>
<body  onLoad="checkebut();">
<form action="<?php echo C("cms_admin");?>?s=Admin/Install/Second" method="post" id="gxform">
<div id='installbox'>
<div class='msgtitle'><?php echo C("cms_name");?><?php echo C("cms_var");?> 安装向导</div>
<table width="573" height="23" border="0" cellpadding="0" cellspacing="0" style="text-align:center; font-weight:bold;font-size:12pt;background:url(views/images/install/set01_top_nav.gif); margin:10px 0 0 10px;">
  <tr>
    <td style="color:#666; text-align:center">
        <span style="display:block;float:left;width:20%;font-size:12px;color:#FFF;">1. 许可协议</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">2. 环境检测</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">3. 数据库设置</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">4. 安装完成</span>        </td>
  </tr>
</table>
<div id='msgbody'>
  <h3><?php echo C("cms_name");?>使用许可协议</h3>
  <div style="text-align:center;">
    <textarea name="textarea" rows="15" style="width:570px;border:1px solid #ccc;font-size:12px;">本软件产品为方讯视频流媒体服务器的管理系统。本软件必须配合方讯视频流媒体服务器使用。
    </textarea>
  </div>
  <br />
  <div style="text-align:center;">
    <input type="checkbox" name="setup" id="setup" valeu="1" onClick="if(this.checked){document.getElementById('install').disabled=''}else{document.getElementById('install').disabled='disabled'}" style="border:none">
    <label for="Compact">接受许可协议</label>
    <h5><input id="install" type="submit" class="btn" style="width:120px;height:30px;" value="开始安装" disabled="disabled"></h5>
  </div>
</div>
<div id='msgbottom'>Powered By <?php echo C("cms_name");?> <?php echo C("cms_var");?></div>
</div>
<div style="display:none;">
<script language="javascript" type="text/javascript" src="http://js.users.51.la/15692539.js"></script>
<noscript><a href="http://www.51.la/?15692539" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/15692539.asp" style="border:none" /></a></noscript>
</div>


</form>
</body>
</html>