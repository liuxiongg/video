<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>左侧导航-<?php echo C("web_name");?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' href='./views/css/admin_left.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="javascript">
function show(url){
	location.href = url;
    
}
</script>
<base target="main" />
</head>
<body>
<div class="menu">
<?php if($_GET['id'] == 'config'): ?><dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">系统管理</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Index/main" >系统信息</a></li>
        <li><a href="?s=Admin/Config/Conf/id/web" >前台信息设置</a></li>
        <!--
        <li><a href="?s=Admin/Config/Conf/id/upload" >附件参数设置</a></li>  
        <li><a href="?s=Admin/Config/Conf/id/cache" >网站缓存设置</a></li>
        
        <li><a href="?s=Admin/Config/Conf/id/url" >访问路径设置</a></li>
        -->
        <li><a href="?s=Admin/Config/Conf/id/user" >用户中心设置</a></li>
       <!--
        <li><a href="?s=Admin/upload/upload_img" >图片上传</a></li>
        
        <li><a href="?s=Admin/Config/Conf/id/nav" >快捷菜单设置</a></li>  
        <li><a href="?s=Admin/Config/Conf/id/player" >播放器设置</a></li>
        <li><a href="?s=Admin/Config/Conf/id/db" >数据库设置</a></li>
        -->
      </ul>
    </dd>
  </dl>
<?php elseif($_GET['id'] == 'content'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">资源管理</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Channel/Show" >频道管理</a></li>
        <!--  
        <li><a href="?s=Admin/Channel/Add" >添加频道</a></li>
        -->
        <li><a href="?s=Admin/Video/Show" ><font color="">内容管理</font></a></li>
        <!--  
        <li><a href="?s=Admin/Video/Add/type/vod" >添加点播视频</a></li>
        <li><a href="?s=Admin/Video/Add/type/live" >添加直播视频</a></li>
        <li><a href="?s=Admin/Info/Show" >文章资讯管理</a></li>
        <li><a href="?s=Admin/Info/Add" >添加文章资讯</a></li>
        <li><a href="?s=Admin/Special/Show" >网站专题管理</a></li>
        <li><a href="?s=Admin/Special/Add" >添加网站专题</a></li>
        <li><a href="?s=Admin/Video/Show/serial/1" >连载中的视频</a></li>
        <li><a href="?s=Admin/Video/Show/status/0" >待审核的视频</a></li>
        <li><a href="?s=Admin/Video/Show/status/-1" >相似未审核的视频</a></li>
        <li><a href="?s=Admin/Video/Show/picurl/fail" >图片下载失败视频</a></li>
        
        <li><a href="?s=Admin/Stype/Add" >添加分类</a></li>
        <li><a href="?s=Admin/Stype/Show" >管理分类</a></li>
        -->
        
        <li><a href="?s=Admin/Mserver/Show/sflag/0" >文件管理</a></li> 
        <li><a href="?s=Admin/Mserver/Streaming/">串流管理</a></li>
        <li><a href="?s=Admin/Mserver/Activestreams/">直播统计</a></li>
        <li><a href="?s=Admin/Mserver/Connections/">观看统计</a></li>
        <!--<li><a href="?s=Admin/Aws/Show/">云存储</a></li>-->
        <!--  
        <li><a href="?s=Admin/Mserver/Streaming/sflag/0" >串流管理</a></li> 
                
        <li><a href="?s=Admin/Self/TypeMana" >手工分类管理</a></li>   
		-->

      </ul>
    </dd>
  </dl>
<?php elseif($_GET['id'] == 'tool'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">扩展工具</a></dt>
    <dd>
      <ul id="items">
      <!--  
      	<li><a href="?s=Admin/Cache/Show" >静态缓存管理</a></li>
      	-->
        <li><a href="?s=Admin/Slide/Show" >幻灯片管理</a></li>
        <li><a href="?s=Admin/Slide/Add" >添加幻灯片</a></li>
        <li><a href="?s=Admin/Slide/showType" >幻灯片分类管理</a></li>
        <!--  
        <li><a href="?s=Admin/Adsense/Show" >前台广告管理</a></li>
        -->
        <li><a href="?s=Admin/Self/Mana" >前台广告管理</a></li>  
        <li><a href="?s=Admin/Link/Show" >友情链接管理</a></li>
        <!--  
        <li><a href="?s=Admin/Upload/Fileshow" >上传附件管理</a></li>
        <li><a href="?s=Admin/Video/Downimg"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')">下载影视图片</a></li>
        <li><a href="?s=Admin/Info/Downimg"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')">下载文章图片</a></li>
        <li><a href="?s=Admin/Video/Downimg/picurl/fail"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')" title="重新尝试下载">检测视频失败图片</a></li>
        <li><a href="?s=Admin/Info/Downimg/picurl/fail"  onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')" title="重新尝试下载">检测文章失败图片</a></li>    
        <li><a href="?s=Admin/Datacheck/VideoCheck/" >视频重名检测</a></li> 
        <li><a href="?s=Admin/Datacheck/ImgClear/" >无效图片清除</a></li>   
        -->
         
      </ul>
    </dd>
  </dl>
<?php elseif($_GET['id'] == 'tpl'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">模板管理</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Tpl/Show" >网站模板管理</a></li>
        <li><a href="?s=Admin/Tpl/Show/id/.*template*<?php echo C("default_theme");?>*Home/mytpl/1" >自定义模板</a></li>
      </ul>
    </dd>
  </dl>
<?php elseif($_GET['id'] == 'html'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">静态网页生成</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Html/Show" >静态网页选项</a></li>
        <li><a href="?s=Admin/Html/Videoday/mday/1" >生成当天影视</a></li>
        <li><a href="?s=Admin/Html/Infoday/aday/1" >生成当天新闻</a></li>
        <li><a href="?s=Admin/Html/Maps" >生成地图索引</a></li>
      </ul>
    </dd>
  </dl> 
<?php elseif($_GET['id'] == 'user'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">用户信息管理</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Master/Show" >后台用户管理</a></li>
        <!--  
        <li><a href="?s=Admin/Master/Add" >添加后台用户</a></li>    
        -->  
        <li><a href="?s=Admin/User/Show" >用户管理中心</a></li>
        
        <!--  
        <li><a href="?s=Admin/User/Add" >添加新用户</a></li>
        -->
        <li><a href="?s=Admin/Group/Show">群组管理</a></li>
        
        <!--  
        <li><a href="?s=Admin/User/Groupadd">添加群组</a></li>     
        
        -->  
        <li><a href="?s=Admin/Comment/Show" >评论管理</a></li>
        
        <!--  
        <li><a href="?s=Admin/Comment/Show/status/1" >未审核评论</a></li>
        -->
        
        <li><a href="?s=Admin/Guestbook/Show" >留言管理</a></li>
        
        <!--  
        <li><a href="?s=Admin/Guestbook/Show/status/1" >未审核留言</a></li>
        -->
        <li><a href="?s=Admin/Guestbook/Show/eid/1" >视频报错管理</a></li>
        <li><a href="?s=Admin/Userview/Show" >收费点播记录</a></li>
      </ul>
    </dd>
  </dl> 
<?php elseif($_GET['id'] == 'collect'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">数据采集管理</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Collect/Show" >一键采集视频</a></li>
        <li style="background:#e8f3fd;font-weight:600;"><a  href="?s=Admin/CustomCollect/ListShow"  style="background:none;">自定义采集</a></li>
        <li><a href="?s=Admin/CustomCollect/ListShow" >采集节点管理</a></li>
        <li><a href="?s=Admin/CustomCollect/Add" >添加采集节点</a></li>
        <li><a href="?s=Admin/CustomCollect/ColVideo" >采集视频入库</a></li>
        <li><a href="?s=Admin/CustomCollect/AutoChannel" >自定义转换</a></li>
        
        
        <li></li>
        
        <li><a href="?s=Admin/CustomCollectinfo/ListShow" >资讯采集节点管理</a></li>
		<li><a href="?s=Admin/CustomCollectinfo/Add">添加资讯采集节点</a></li>
		<li><a href="?s=Admin/CustomCollectinfo/ColInfo">采集资讯入库</a></li>
      </ul>
    </dd>
  </dl>
<?php elseif($_GET['id'] == 'data'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">数据库操作</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Data/Showtable" >数据库备份</a></li>
        <li><a href="?s=Admin/Data/Showback" >数据库还原</a></li>
        <!--  
        <li><a href="?s=Admin/Data/Showsql" >高级SQL语句</a></li>
        <li><a href="?s=Admin/Data/Showtable/id/field" >数据批量替换</a></li>
        -->       
      </ul>
    </dd>
  </dl>       
<?php elseif($_GET['id'] == 'wei'): ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">伪原创</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Wei/linkkeyadd" >添加内链关键字</a></li>
        <li><a href="?s=Admin/Wei/linkkey" >内链关键字管理</a></li>
        <li><a href="?s=Admin/Wei/replaceKeyAdd" >添加替换关键词库</a></li>
        <li><a href="?s=Admin/Wei/replaceKey" >管理替换关键词库</a></li>
        <li><a href="?s=Admin/Wei/movieSeo" >视频SEO伪原创</a></li>
      </ul>
    </dd>
  </dl>       
       
<?php else: ?>
  <dl>
    <dt><a onClick="showHide('items');" href="#" target="_self">系统管理</a></dt>
    <dd>
      <ul id="items">
        <li><a href="?s=Admin/Index/main" >系统信息</a></li>
        <li><a href="?s=Admin/Config/Conf/id/web" >前台信息设置</a></li>
        <!--
        <li><a href="?s=Admin/Config/Conf/id/upload" >附件参数设置</a></li>  
        <li><a href="?s=Admin/Config/Conf/id/cache" >网站缓存设置</a></li>
        
        <li><a href="?s=Admin/Config/Conf/id/url" >访问路径设置</a></li>
        -->
        <li><a href="?s=Admin/Config/Conf/id/user" >用户中心设置</a></li>
        <!--
        <li><a href="?s=Admin/Config/Conf/id/dvr" >DVR设置</a></li>
       
        <li><a href="?s=Admin/Config/Conf/id/nav" >快捷菜单设置</a></li>  
        <li><a href="?s=Admin/Config/Conf/id/player" >播放器设置</a></li>
        <li><a href="?s=Admin/Config/Conf/id/db" >数据库设置</a></li>
        -->
      </ul>
    </dd>
  </dl>
  
  <!--  
  <dl>
    <dt><a onClick="showHide('items');" href="#" target=_self>自定义快捷菜单</a></dt>
    <dd>
      <ul id="items"><?php if(is_array(C("web_admin_nav"))): $i = 0; $__LIST__ = C("web_admin_nav");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo ($gxcms); ?>" ><?php echo (get_replace_html($key,0,10)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
    </dd>
  </dl>
  --><?php endif; ?>
</div>
<script language="javascript">
function showHide(objname){
	$("#items").toggleClass("none"); 
}
</script>
</body>
</html>