<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_login.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<?php
if(!has_admin_user())
{
	$arr['username'] = "admin";
	$arr['password'] = "admin888";
	$err = "";
	$ret = create_user($arr, $err);
	if(ret == false){
		
	}
}
?>
<script>
function loginok(form){
	if (form.login_name.value==""){
		alert("用户名不能为空！");
		form.login_name.focus();
		return (false);
	}
	if (form.login_pwd.value==""){
		alert("密码不能为空！");
		form.login_pwd.focus();
		return (false);
	}
	return (true);
}
if(self!=top){
	top.location=self.location;
}
</script>
</head>
<body>
<div class="main">
  <div class="title">&nbsp;</div>
  <div class="login">
    <form action="?s=Admin/Login/Check" method="post" name="gxcms" onSubmit="return loginok(this)">
      <div class="inputbox">
        <dl>
          <dd>用户名：</dd>
          <dd>
            <input type="text" name="login_name" id="login_name" size="25" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'" />
          </dd>
          <dd>密码：</dd>
          <dd>
            <input type="password" name="login_pwd" id="login_pwd" size="25" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'" />
          </dd>
          <dd>
            <input name="submit" type="submit" value="" class="input" />
          </dd>
        </dl>
      </div>
      <div class="butbox">
        <dl>
          <dd>流媒体服务器管理平台</dd>
        </dl>
      </div>
      <div style="clear:both"></div>
    </form>
  </div>
</div>
<div class="copyright">
	Powered by 管理系统 <?php echo C("cms_var");?></a> Copyright &copy;2015-2016
</div>
<!--请勿删除以下代码 -->
<div style="display:none"><script language="javascript" type="text/javascript" src="http://js.users.51.la/15543762.js"></script></div>
</body>
</html>