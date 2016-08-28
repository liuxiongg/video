<?php 
include '../common/interface_client.php';
include '../authentication/auth_client_func.php';

function get_stream_token(&$ini_arr,$stream)
{
	if(!array_key_exists("tokens",$ini_arr))
	{
		return "";
	}
	$tokens = $ini_arr["tokens"];
	return @$tokens[$stream];
}
session_start();
$app      =  @$_REQUEST['ns'];
$stream   =  @$_REQUEST['id'];
$ver      =  @$_REQUEST['ver'];
$token    =  @$_REQUEST['token'];
$port     =  @$_REQUEST['port'];
$title    =  @$_REQUEST['title'];
$h5       =  @$_REQUEST['h5'];
$format   =  @$_REQUEST['format'];
$live     =  @$_REQUEST['live'];
if($token=="")
{
	$auth_info= load_auth_infos($app,"play");
	if($auth_info!==FALSE)
	{
		if(@$auth_info['is_auth']=="yes")
		{
			$token = get_stream_token($auth_info,$stream);
		}
	}
}
if($port=="")
{
	$port = "1935";
}
?>
<html>

<head>
<title>media player</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript" src="./ntvplayer/lib/swfobject.js"></script>
<script type="text/javascript" src="./ntvplayer/lib/ParsedQueryString.js"></script>
<script type="text/javascript" src="./ntvplayer/lib/debug.js"></script>
<script type="text/javascript" src="./ntvplayer.js"></script>

<script type="text/javascript" src="jwplayer/jwplayer.js"></script>
<script type="text/javascript" src="../js/ntv_utils.js"></script>
<script type="text/javascript">
    
    var playbyjw = false;

    function set_localpara()
    {
        var value = "";
    	/*if(form1.chk_autoplay.checked)
    	{
    		value="autoplay=autostart";
    	}
    	else
    	{
    	    value="autoplay=no";
    	}
    	document.cookie = value;
    	*/
    	if(form1.chk_player.checked)
    	{
    	   value="player=jw";
    	}
    	else
    	{
    	   value="player=adobe";
    	}
    	document.cookie = value;
    }
    
    function is_jwplayer()
    {
        var strcookie=document.cookie;
        if(strcookie.indexOf("jw")>=0)
        {
        	return true;
        }
        else
        {
           return false;
        }
    }
    
    function is_autoplay()
    {
        var strcookie=document.cookie;
        if(strcookie.indexOf("autostart")>=0)
        {
        	return true;
        }
        else
        {
           return false;
        }
    }
    
   function set_captions(mode,title)
   {
     var modetext="Playback";
     if(mode=="live")
     {
     	modetext="直播";
     }
     var tl_text = "<font color='#FFFFFF' size='5'>" + title +"</font>";
     var tp_text = "<font color='#FFFFFF' style='font-size: 20pt; font-weight: 700'>" + modetext + "</font>";
     
   	 tl.innerHTML = tl_text;
   	 tp.innerHTML = tp_text;
   }
   
   function play_flv(w,h,url,livemode,tl)
   {
       var autoplay = true;            //is_autoplay();
	     var usejw    = true;            //is_jwplayer();
	     set_captions(livemode,tl);
	      alert("url:" + url);
	     if(usejw && livemode!="live")
	     {
	     		jwplayer('ntvplayer').setup({
		        file:   url,
		        image:  'jwplayer/jwplayer.jpg',
		        title:  tl ,
		        width:  w,
		        height: h,
		        autostart: autoplay,
		        //aspectratio: '16:9',
		        startparam: 'start'
		     });
		     playbyjw = true;
	    }
	    else
	    {
	    	//play(w,h,url,livemode,autoplay);
	    	jwplayer('ntvplayer').setup({
		        file:   url,
		        image:  'jwplayer/jwplayer.jpg',
		        title:  tl ,
		        width:  w,
		        height: h,
		        autostart: autoplay
		        //aspectratio: '16:9',
		        //startparam: 'start'
		     });
		     playbyjw = true;
	    }
	    
   }
   
   function close_player()
   {
   	 if(playbyjw)
   	 {
   	    jwplayer().stop();
   	 }
   }
   
    function getUrlParam(name) 
    { 
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); 
		var r = window.location.search.substr(1).match(reg); 
		if (r != null) 
		{
			return unescape(r[2]);
		}
		else
		{
			return null; 
		}
	} 

    function playVod(url,title)
    {
    	var h = 480;
    	var w = 640;
		  play_flv(w,h,url,"",title);
    }
    
    function playLive(url,title)
    {
    	var h = 480;
    	var w = 640;
		  play_flv(w,h,url,"live",title);
    }

    function playHTML5(url,title)
    {
        var app   = "<?php echo $app;?>";
        var stream= "<?php echo $stream;?>";
        var fmt   = "<?php echo $format;?>";
        var h5    = "<?php echo $h5;?>";
        if(h5!="" || fmt=="hls"){
	        var h5url = "../players/h5player/?application=" + app + "&stream=" + stream + "&url=" + escape(url) + "&title=" + escape(title);
    	    location.href = h5url;
        }
        
    	var text = "<video src=\"" + url + "\" controls=\"controls\" autoplay=\"autoplay\" width=\"640px\" height=\"360px\">";  //
		    text = text + "<font color='#FFFFFF'>Your browser does not support the HTML5 video tag!</font>";
	    text = text + "</video>";

	    var doc = "<body bgcolor=\"#000000\">" + 
	              "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\" >" +
	    	      "<tr>" +
	    		  "<td align=\"center\">"  + 
	    		  text +
	    		  "</td></tr></table></body>";
	    
    	ntvplayer.innerHTML = text;
	    //document.write(text);
    }
    
    function playHLS(url,title) {
      set_captions("vod",title);
      //location.href = url;
      playHTML5(url,title);
    }
    
    function playMP4(url,title)
    {
      set_captions("vod",title);
      playHTML5(url,title);
    }
    
    
    function gen_rtmp_live_url(host,app,stream,token,port)
    {
        var url   = "rtmp://"  + host + ":" + port + "/" + app + "/" + stream;
		var npos = host.indexOf(":");
		if(npos>0)
		{
			url = "rtmp://"  + host.substr(0,npos) + "/" + app + "/" + stream;
		}

        if(token!="")
        {
            url = url + "?token=" + token;
        }
        else{
        	url = url + "?token=";
        }
        return url;
    }
    
    function gen_flv_vod_url(host,app,stream,ver,token)
    {
        var url  = "http://"  + host + "/sps/" + app + "/" + stream + ".flv?ver=" + ver;
        if(token!="")
        {
            url = url + "&token=" + token;
        }
        return url;
    }
    
    function gen_mp4_url(host,app,stream,ver,token)
    {
        //var   url= "http://" + host + "/media/mp4/" + app + "/" + stream + "/" + stream;
        var   url= "http://" + host + "/mp4/" + app + "/" + stream + "/" + stream;
        if(ver>=0)
        {
           url = url + "_v" + ver;
        }
        url    = url  + ".mp4";
        if(token!="")
        {
            url = url + "?token=" + token;
        }else{
        	url = url + "?token=";
        }
        return url;
    }
    
    function gen_hls_url(host,app,stream,ver,token)
    {
    	var d = new Date();
    	var url  = "http://"  + host + "/m3u8/" + app + "/" + stream + ".m3u8?from=mgr";
    	if(ver!=null)
    	{
    	   url = url + "&ver=" + ver;
    	}
    	if(token!="")
        {
            url = url + "&token=" + token;
        }
    	return url;
    }
    
    function InitDoc()
    {
       var url    = getUrlParam("media_url");
       var app    = getUrlParam("ns");
       var stream = getUrlParam("id");
       var live   = getUrlParam("live");
       var host   = getUrlParam("host");
       var ver    = getUrlParam("ver");
       var format = getUrlParam("format");
       var tl     = "<?php echo $title;?>";//getUrlParam("title");
       var port   = getUrlParam("port");
       var token  = "<?php echo $token;?>";
       
       var autoplay = is_autoplay();
       var jwplayer = is_jwplayer();
       //form1.chk_autoplay.checked = autoplay ;
       //form1.chk_player.checked   = jwplayer;
       
       var  uid     = getUrlParam("uid");
       if(uid=="" || uid==null)
       {
    	   uid     = ntv_uuid(16,16);
       }
       //alert(uid);
       
       if(url!="" && url!=null)
       {
       		return play_stream(url);
       }
       
       if(app==null || stream==null)
	   {
		    ntvplayer.innerHTML= "<font color=\"#FFFFFF\">Load stream error!</font>";
		    return;
	   }

       if(tl==null || tl=="")
       {
           tl = app + " - " + stream;
       }

       if(port==null || port=="")
       {
           port = "1935";
       }
       
	   if(host==null)
	   {
	       	host  = document.location.host;
	  		//host  = host.replace(":8080","");
	 	  	//host  = host.replace(":80","");
		}
		if(ver==null)
		{
	        ver="-1";
	    }
		if(format==null)
		{
		     format="flv";
		}
		   
       if(live=="1")
       {
         if(format=="flv")
       	 {
       	    url  = gen_rtmp_live_url(host,app,stream,token,port);
       	    url  = url + "&live=" + live + "&uid=" + uid + "&sid=" + uid;       
       	    playLive(url,tl);
       	 }
       	 else if(format=="hls")
       	 {
       	    url = gen_hls_url(host,app,stream,null,token);
       	 		url  = url +  "&live=" + live + "&uid=" + uid + "&sid=" + uid;  
       	    playHLS(url,tl);
       	 }
       }
       else
       {
          if(format=="flv")
          {
             url = gen_flv_vod_url(host,app,stream,ver,token);
             url  = url + "&uid=" + uid + "&sid=" + uid;  
             playVod(url,tl);
          }
          else if(format=="mp4")
          {
              url = gen_mp4_url(host,app,stream,ver,token);
              url  = url + "&uid=" + uid + "&sid=" + uid;  
              playMP4(url,tl);
          }
          else if(format=="hls")
          {
              url = gen_hls_url(host,app,stream,ver,token);
              url  = url + "&uid=" + uid + "&sid=" + uid;  
              playHLS(url,tl); 
          }
       }
       window.focus();
    }
    
    function play_stream(para)
    {
        var url = para;
    	if(url=="" || url==null)
    	{
    	    url = form2.media_url.value;
    	    if(url=="" || url==null)
	    	{
	    		return;
	    	}
    	    location.href = "autoplayer.php?media_url=" + escape(url);
    	    return;
    	}
    	
    	form2.media_url.value = url;
    	if(url.indexOf('.m3u8')>=0)
    	{
    		playHLS(url,"");	
    	}
    	else if(url.indexOf('.flv')>=0)
    	{
    		playVod(url,"");
    	}
    	else if(url.indexOf('.mp4')>=0)
    	{
    		playMP4(url,"");
    	}
    	else
    	{
    		playLive(url,"Living stream");
    	}
    }

</script>
</head>

<body bgcolor="#4F647F" onLoad="InitDoc()" onUnload="close_player()" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="300" height="52" align="center" valign="center" bgcolor="#4F647F">
		<img border="0" src="../images/logo.png" width="252" height="51">
		</td>
		<td align="right" height="52" width="200" bgcolor="#4F647F">
		<font color="#FFFFFF"><span style="font-size: 22pt"><strong>Player lit </strong>| </span></font></td>
		<td id="tp" align="left" height="52" bgcolor="#4F647F" colspan="2">
	  </td>
		<td width="2" height="52" align="left" valign="top" bgcolor="#4F647F">
			
		</td>
	</tr>
	<tr>
		<td id="tl" align="center" height="33" colspan="5" bgcolor="#000000">
		<b><font color="#FFFFFF" size="5"></font></b></td>
	</tr>
	<tr>
		<td align="center" colspan="5" bgcolor="#000000">

<div id='ntvplayer'></div>

		</td>
	</tr>
	<tr>
		 <td align="left" colspan="3" height="32" valign="bottom">
			  <form name="form1">
					<!--  
					<input type="checkbox" name="chk_autoplay" value="ON" onclick="set_localpara()"><font color="#FFFFFF" style="font-size: 11pt">Auto play</font>
					
					<input type="checkbox" name="chk_player" value="ON" onclick="set_localpara()"><font color="#FFFFFF" style="font-size: 11pt">Use jwplayer</font>
			        -->
			  </form>
	   </td>
		 <td align="right" colspan="2" height="32" valign="bottom">
	   
		</td>
	</tr>
	<tr>
		<td align="center" colspan="5" height="1" bordercolor="#000080">
	    </td>
	</tr>
</table>

</body>

</html>
